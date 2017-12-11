<?php

namespace App\Http\Controllers;

use App\Models\ProjectAdvisor;
use App\Models\ProjectAward;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Advisor;
use App\Models\Awards;
use App\Models\Image;
use App\Models\Paths;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\UserProject;
use App\Models\Year;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project.create');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_types = ProjectType::all();
        $awards = Awards::all();
        $adviser = Advisor::all();
        $years = Year::all();

        $userEx = UserProject::all()->pluck('user_id')->toArray();
        $user = User::select('name', 'id', 'username')->whereNotIn('id', $userEx)->get();

        return view('project.create')
            ->with(['project_type' => $project_types, 'awards' => $awards,
                'adviser' => $adviser, 'years' => $years, 'users' => $user]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $new_project = new Project();
            $new_project->fill($request->all());
            $new_project->save();

            //--------------paths
            if (isset($new_project->id)) {
                $path = new Paths();
                $path->fill($request->all());
                $path->project_id = $new_project->id;
                $path->save();
            }

            //----------
            //create member
            if (isset($request->member) && isset($new_project->id)) {
                foreach ($request->member as $member) {
                    $project_user = new UserProject();
                    $project_user->project_id = $new_project->id;
                    $project_user->user_id = $member;
                    $project_user->save();
                }
            }

            //create main adviser
            if (isset($request->adviser_id) && isset($new_project->id)) {
                $project = new ProjectAdvisor();
                $project->project_id = $new_project->id;
                $project->advisor_id = $request->adviser_id;
                $project->status = ProjectAdvisor::STATUS_MAIN;
                $project->save();
            }

            //create sub adviser
            if (isset($request->advisers) && is_array($request->advisers) && isset($new_project->id)) {
                foreach ($request->advisers as $sub) {
                    $project = new ProjectAdvisor();
                    $project->project_id = $new_project->id;
                    $project->advisor_id = $sub;
                    $project->status = ProjectAdvisor::STATUS_SUB;
                    $project->save();
                }
            }

            //create awards
            if (isset($new_project->id) && isset($request->awards) && is_array($request->awards)) {
                foreach ($request->awards as $awards) {
                    $project = new ProjectAward();
                    $project->project_id = $new_project->id;
                    $project->award_id = $awards;
                    $project->save();
                }
            }

            $files = $request->file('file');
            if (isset($files) && count($files) > 0) {
                foreach ($files as $file) {
                    $request = $this->uploadFile($file);
                    $image = new Image();
                    $image->name_image = $request->name;
                    $image->projects_id =  $new_project->id;
                    $image->save();
                }
            }

            DB::commit();

            return redirect(url('/admin/project/' . $new_project->id));

        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $is_owner = false;

        $user = Auth::user();
        if (isset($user)) {
            $userCheck = UserProject::query()
                ->where('user_id', $user->id)
                ->where('project_id', $id)
                ->first();
            if (isset($userCheck)) {
                $is_owner = true;

            }
        }

        $project = Project::query()
            ->with(['members.memberDetail', 'awards.awardDetail', 'advisors.advisorDetail', 'paths', 'image', 'projectType' , 'projectYear'])
            ->where('id', $id)
            ->first();


        return view('project.index', ['project' => $project, 'is_owner' => $is_owner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $is_owner = false;

        $user = Auth::user();
        if (isset($user)) {
            $userCheck = UserProject::query()
                ->where('user_id', $user->id)
                ->where('project_id', $id)
                ->first();
            if (isset($userCheck)) {
                $is_owner = true;
            }
        }
        $project = Project::query()
            ->with(['members.memberDetail', 'awards.awardDetail', 'advisors.advisorDetail', 'paths', 'image', 'projectType'])
            ->where('id', $id)
            ->first();

        $project_user = UserProject::query()
            ->where('project_id', $id)
            ->pluck('user_id');

        $project_adviser_sub = ProjectAdvisor::query()
            ->where('project_id', $id)
            ->where('status', ProjectAdvisor::STATUS_SUB)
            ->pluck('advisor_id');

        $project_adviser_main = ProjectAdvisor::query()
            ->where('project_id', $id)
            ->where('status', ProjectAdvisor::STATUS_MAIN)
            ->pluck('advisor_id');

        $project_award = ProjectAward::query()
            ->where('project_id', $id)
            ->pluck('award_id');


        $project_types = ProjectType::all();
        $awards = Awards::all();
        $adviser = Advisor::all();
        $years = Year::all();
        $user = User::select('name', 'id', 'username')->get();


        if (!$is_owner) {
            return redirect("/admin/project/$id");
        }
        return view('project.edit')
            ->with(['project_type' => $project_types, 'awards' => $awards,
                'adviser' => $adviser, 'years' => $years, 'users' => $user, 'project' => $project,
                'project_user' => $project_user, 'project_adviser_main' => $project_adviser_main,
                'project_adviser_sub' => $project_adviser_sub , 'project_award' => $project_award]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $award_count = 0;

        $projectsBu = Project::query()
            ->with(['members.memberDetail', 'awards.awardDetail', 'advisors.advisorDetail', 'paths', 'image', 'projectType' , 'projectYear']);

        //search project type
        if (isset($request->projecttype) && $request->projecttype != "-1") {
            $projectsBu->whereHas('projectType', function ($query) use ($request) {
                $query->where('id', $request->projecttype);
            });
        }


        //search project award

        if (isset($request->award) && $request->award != "-1") {
            $projectsBu->whereHas('awards.awardDetail', function ($query) use ($request) {
                $query->where('award_id', $request->award);
            });
        }
        //search project year
        if (isset($request->year) && $request->year != "-1") {
            $projectsBu->whereHas('projectYear', function ($query) use ($request) {
                $query->where('id', $request->year);
            });
        }

        //search project adviser
        if (isset($request->adviser_id) && $request->adviser_id != "-1") {
            $projectsBu->whereHas('advisors', function ($query) use ($request) {
                $query->where('advisor_id',  $request->adviser_id);
                $query->where('status', ProjectAdvisor::STATUS_MAIN);
            });
        }

        //search project
        if (isset($request->projects) && $request->projects != "-1") {
            $projectsBu->where('id', $request->projects);
        }

        $projects = $projectsBu
            ->orderBy('id', 'DESC ')->get();


        if (isset($projects) && count($projects) > 0) {
            foreach ($projects as $project) {
                if ($project && $project->awards) {
                    if (count($project->awards) > 0) {
                        $award_count += 1;
                    }
                }
            }
        }

        $project_types = ProjectType::all();
        $awards = Awards::all();
        $advisor = Advisor::all();
        $years = Year::all();
        $projectAll = Project::all();

        return view('Index.Home')
            ->with(['projectHome' => $projects, 'countProject' => count($projects), 'countAwards' => $award_count
                , 'project_type' => $project_types, 'awards' => $awards, 'adviser' => $advisor, 'years' => $years,
                'projectAll' => $projectAll]);

    }

    public function postEdit(Request $request, $id)
    {

        try {
            DB::beginTransaction();

            $edit_project = Project::query()->where('id' , $id)->first();
            $edit_project->fill($request->all());
            $edit_project->save();

            $files = $request->file('file');
            if (isset($files)) {

                foreach ($files as $key => $file) {
                    if (isset($request->check_file[$key])) {
                        $old = Image::query()->where('name_image',$request->check_file[$key])->first();
                        $response = $this->uploadFile($file);
                        $old->name_image = $response->name;
                        $old->save();
                    }else {
                        $response = $this->uploadFile($file);
                        $image = new Image();
                        $image->name_image = $response->name;
                        $image->projects_id =  $edit_project->id;
                        $image->save();
                    }
                }
            }
            //--------------paths
            if (isset($edit_project->id)) {
                Paths::query()->where('project_id' , $id)->delete();
                $path = new Paths();
                $path->fill($request->all());
                $path->project_id = $edit_project->id;
                $path->save();
            }

            //----------
            //create member
            if (isset($request->member) && isset($edit_project->id)) {
                UserProject::query()->where('project_id' , $id)->delete();
                foreach ($request->member as $member) {
                    $project_user = new UserProject();
                    $project_user->project_id = $edit_project->id;
                    $project_user->user_id = $member;
                    $project_user->save();
                }
            }

            //create main adviser
            if (isset($request->adviser_id) && isset($edit_project->id)) {
                ProjectAdvisor::query()
                    ->where('project_id' , $id)
                    ->where('status' , ProjectAdvisor::STATUS_MAIN)
                    ->delete();

                $project = new ProjectAdvisor();
                $project->project_id = $edit_project->id;
                $project->advisor_id = $request->adviser_id;
                $project->status = ProjectAdvisor::STATUS_MAIN;
                $project->save();

            }

            //create sub adviser
            if (isset($request->advisers) && is_array($request->advisers) && isset($edit_project->id)) {
                ProjectAdvisor::query()
                    ->where('project_id' , $id)
                    ->where('status' , ProjectAdvisor::STATUS_SUB)
                    ->delete();

                foreach ($request->advisers as $sub) {
                    $project = new ProjectAdvisor();
                    $project->project_id = $edit_project->id;
                    $project->advisor_id = $sub;
                    $project->status = ProjectAdvisor::STATUS_SUB;
                    $project->save();
                }
            }

            //create awards
            if (isset($new_project->id) && isset($request->awards) && is_array($request->awards)) {
                ProjectAward::query()->where('project_id' , $id)->delete();
                foreach ($request->awards as $awards) {
                    $project = new ProjectAward();
                    $project->project_id = $edit_project->id;
                    $project->award_id = $awards;
                    $project->save();
                }
            }

            DB::commit();

            return redirect(url('/admin/project/' . $edit_project->id));

        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }


    public function getDelete($id)
    {
        Paths::query()->where('project_id' , $id)->delete();
        ProjectAdvisor::query()->where('project_id' , $id)->delete();
        ProjectAward::query()->where('project_id' , $id)->delete();
        UserProject::query()->where('project_id' , $id)->delete();
        Project::query()->where('id', $id)->delete();
        return redirect('/Index/home');
    }

    private function uploadFile($file, $prefix = 'images/uploads', $name = null, $extension = null)
    {
        if ($extension == null) {
            $extension = $file->getClientOriginalExtension();
        }
        if ($name == null) {
            $name = uniqid() . (($extension != '') ? '.' . $extension : '');
        } else if ($extension != '' && strpos($name, '.') === false) {
            $name .= '.' . $extension;
        }
            $filePath =  $prefix . ((substr($prefix, -strlen($prefix)) === '/' || $prefix == '') ? '' : '/');

            $res = $file->move(public_path() . '/' . $filePath, $name);

        return (object)['status' => ($res) ? true : false, 'name' => $name];
    }


}
