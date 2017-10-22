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
//        dd($id);
        $url = "https://www.youtube.com/watch?v=FsJZH3DLjC0";
        return view('project.index' , ['url' => $url]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
