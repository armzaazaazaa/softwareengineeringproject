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

class SEProjectController extends Controller
{
    public function getIndex(Request $request, $id)
    {
        $showproject = Project::query()
            ->leftJoin('images','projects.id','=', 'images.projects_id')
            ->leftJoin('paths', 'projects.id', '=', 'paths.project_id')
            ->leftJoin('awards','projects.id', '=','awards.project_id')
            ->find($id);


        return view('seproject.Show_project')->with('show', $showproject)->with('showid', $id);
    }

    public function indix(Request $request)
    {
        return view('admin.user');
    }
    ///////////////////////////////////////////////////////////////////////////////////////
    /*startindex*/
    public function gethome(Request $request)
    {
//        $project = ProjectType::query()
//            ->rightJoin('projects','projects.project_type_id', '=', 'project_types.type_id')
//     /*       ->rightJoin('projects','projects.image_id','=','images.projects_id')*/
//            ->get();
        $award_count = 0;
        $projects = Project::query()
            ->with(['projectType','image','awards'])
            ->get();
       /* dd($project);*/
        if (isset($projects) && count($projects ) > 0) {
            foreach ($projects as $project)  {
                if ($project && $project->awards) {
                    if (count($project->awards) > 0) {
                        $award_count+=1;
                    }
                }
            }
        }

       /* return view('Index.Home')
             ->with('projectHome',$project);*/
        $project_types = ProjectType::all();
        $awards = Awards::all();
        $advisor = Advisor::all();
        $years = Year::all();
        return view('Index.Home')
            ->with(['projectHome' => $projects , 'countProject' => count($projects ),'countAwards' => $award_count
            ,'project_type' => $project_types , 'awards' => $awards, 'adviser'=> $advisor, 'years'=>$years ,   'projectAll' => $projects]);



    }

    public function getlogin(Request $request)
    {
        return view('Index.login');
    }

    public function getshow_search(Request $request)
    {
        return view('Index.show_search');
    }
    /*END Index*/
    ///////////////////////////////////////////////////////////////////////////////////////
    /* startManage_project*/
    public function getCreate_project(Request $request)
    {
        return view('Manage_project.create_project');
    }

    public function getedit(Request $request, $id)
    {

        $showproject = Project::query()
            ->leftJoin('images', 'projects.id', '=', 'images.projects_id')
            ->leftJoin('paths', 'projects.id', '=', 'paths.project_id')
            ->leftJoin('awards','projects.id', '=','awards.project_id')
            ->find($id);


        return view('Manage_project.edit')->with('show', $showproject)->with('showid', $id);;
    }

    public function getShow_project(Request $request)
    {
        return view('Manage_project.Show_project');
    }
    /*END Manage_project */
    ///////////////////////////////////////////////////////////////////////////////////////

    public function savecreate(Request $request)
    {
        $data = New Project();

        $projectType = New ProjectType();

        $awards = New Awards();
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
        $data->id_description = $request->input('abstracts');
        /*Teacher*/
        /*  $teacher->name_Teacher = $request->input('advisors');*/
        /*Image*/
        /* $image->name_image =$request->input('image1');
         $image->name_image =$request->input('image2');
         $image->name_image =$request->input('image3');
         $image->name_image =$request->input('image4');
         $image->name_image =$request->input('image5');*/

        $awards->name_award = $request->input('nname_award');
        $awards->year_award = $request->input('yyear_award');

        /*Paths*/
        $paths->path_doc = $request->input('document_archive_url');
        $paths->path_program = $request->input('url_archive_program');
        $paths->path_vdo = $request->input('embed_youTube');


        /////////////////////////////////////////
        $data->save();
        $projectType->save();
        $awards->save();
        /*$image->save();*/
        $paths->save();


        /* $students->save();
         $teacher->save();*/

    }


}
