<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advisor;
use App\Models\Awards;
use App\Models\Image;
use App\Models\Paths;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\UserProject;
use App\Models\Year;


class projectcontroller extends Controller
{

    public function index()
    {
        return view('Manage_project.create_project');

    }


    public function editproject(Request $request,$id)
    {
        $data = Project::find($id);
        $data->name_project_th = $request->input('name_th');
        $data->save();
        return redirect('/Index/home');
    }


    public function store(Request $request) /*เพิ่มโครงงาน*/
    {
        $file = $request->file('image1');;
        $data = New Project();
        $projectType = New ProjectType();
       /* $awards = New Awards();*/
        $image = New Image();
        $paths = New Paths();


        /* $students = New Students();
         $teacher = New Teacher();*/
        ///////////////////////////////////////////
        /*projectType*/
        $projectType->name = $request->input('projecttype');
        /*Project*/
        $data->name_project_th = $request->input('project_name_th');/* ชื่อโครงงานภาษาไทย*/
        $data->name_project_eng = $request->input('project_name_eng'); /*ชื่อโครงงานภาษาอังกฤ*/
        $data->year = $request->input('year_ps');
        $data->id_description= $request->input('abstracts');
        /*Teacher*/
        /*  $teacher->name_Teacher = $request->input('advisors');*/
        /*Image*/
        /* $image->name_image =$request->input('image1');
         $image->name_image =$request->input('image2');
         $image->name_image =$request->input('image3');
         $image->name_image =$request->input('image4');
         $image->name_image =$request->input('image5');*/

     /*   $awards->name_award = $request->input('nname_award');
        $awards->year_award = $request->input('yyear_award');*/

        /*Paths*/
        $paths->path_doc =$request->input('document_archive_url');
        $paths->path_program =$request->input('url_archive_program');
        $paths->path_vdo =$request->input('embed_youTube');

        $data->project_type_id =$request->input('projecttype');

        /////////////////////////////////////////
        $data->save();
        //$projectType->save();

        $idproject = Project::where('name_project_th','=',$request->input('project_name_th'))->get();
        foreach ($idproject as $projectid){
            $id= $projectid->id;

        }
       /* $awards->project_id = $id;
        $awards->save();*/
        /*$image->save();*/
        $paths->project_id = $id;
        $paths->save();

            $file = $request->file('image1');
            $path = 'images/uploads';
            $filename = $file->getClientOriginalName();
            $file->move($path,$file->getClientOriginalName());
            $image->name_image = $filename;
            $image->projects_id = $id;
            $image->save();
        return redirect('/Index/home');

        /* $students->save();
         $teacher->save();*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)/*ลบโครงงาน*/
    {
        $data = Project::find($id);

        $data->delete();
        return redirect('/Index/home');
    }

    public function search(Request $request) {

        $type_project = $request->get('type_project');
        $name_project = $request->get('name_project');
        $award_count = 0;


        if (isset($type_project) && isset($name_project)) {
            $projects = Project::query()
                ->where('project_type_id',$type_project)
                ->with(['projectType','image','awards'])
                ->get();

            if (isset($projects) && count($projects ) > 0) {
                foreach ($projects as $project)  {
                    if ($project && $project->awards) {
                       if (count($project->awards) > 0) {
                           $award_count+=1;
                       }
                    }
                }
            }


//dd($project);


            $project_types = ProjectType::all();
            $awards = Awards::all();
            $advisor = Advisor::all();
            $years = Year::all();

            return view('Index.Home')
                ->with(['projectHome' => $projects ,'countProject' => count($projects ),'countAwards' => $award_count
                    ,'project_type' => $project_types , 'awards' => $awards, 'asvisor'=> $advisor, 'years'=>$years ]);

        }
    }

}
