<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');

});
Route::get('/test2', function () {
    return redirect('/Index/home');
});


Route::get('/admin', function () {
    return view('admin.index');
});
Auth::routes();
//---------------------
Route::post('/register/up', 'Auth\RegisterController@registerUP');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/Index/home');
});


/*

Route::get('/admin/user', function () {
    return view('admin.user');
});

Route::get('/admin/form', function () {
    return view('admin.form');
});

Route::get('/admin/athletes', function () {
    return view('admin.athletes');
});




Route::get('/admin/user', function () {
    $users = \App\Models\User::all();
    return view('admin.user.index')
        ->with('users',$users);
});*/


Route::get('/admin/user/create', function () {
    return view('admin..user.create');
});


Route::get('/admin/user/{id}/edit', function ($id) { /*แก้ไข*/
    $user = \App\Models\User::find($id);
    return view('admin.user.edit')
        ->with('user', $user);
});

Route::post('/admin/user/{id}/edit', function (Request $request, $id) { /*แก้ไข*/
    $user = \App\Models\User::find($id);
    $userForm = $request->get('user');
    $user->fill($userForm);
    $user->save();
    return redirect('/admin/user');
});

Route::post('/admin/user/{id}/delete', function (Request $request, $id) { /*ลบ*/
    $user = \App\Models\User::find($id);
    $user->delete();
    return redirect('/admin/user');
});

/*
use App\Http\Requests\AdminUserRequest;

Route::post('/admin/user/create', function ( AdminUserRequest  $request) {
    $userForm = $request->get('user');
    $user = new \App\Models\User();
    $user ->fill($userForm );
    $user->password = Illuminate\Support\Facades\Hash::make($userForm['password']);
    $user->save();
    return redirect('/admin/user');
});

*/


//Route::get('/login', function () {
//    return view('Index/login');
//});
//
//Route::post('/login', function (Request $request) {
//    $email = $request->get('email');
//    $password = $request->get('password');
//
//    $hash_password = \Hash::make($password);
//    if (Auth::attempt(['email' => $email, 'password' => $password])) {
//        return view('/Index/home');
//    }
//    else{
//        return redirect('login')
//            ->withErrors([
//                'loginError' => '123'
//            ]);
//    }
//
//});

/////////////////////////////////////////////////////////////////////////
Route::get('/test', function () {
    return \App\Models\Project::with(['projectType'])->get();
});

Route::get('/seproject/{id}', "SEProjectController@getIndex");
Route::get('/admin/user', "SEProjectController@indix");
/////////////////////////////////////////////////////////////////////////
/*startindex*/
Route::get('/Index/home', "SEProjectController@gethome");
Route::get('/Index/login', "SEProjectController@getlogin");
Route::get('/Index/show_search', "SEProjectController@getshow_search");
/*END Index*/
/////////////////////////////////////////////////////////////////////////
/* startManage_project*/
Route::get('/Manage_project/create_project', "projectcontroller@index");
Route::get('/Manage_project/edit/{id}', "SEProjectController@getedit");
Route::get('/Manage_project/getShow_project', "projectcontroller@getShow_project");

/*END Manage_project */
//////////////////////////////โจัดการโครงงาน///////////////////////////////////////////
Route::post('/savecreate', "projectcontroller@store"); /*เพิ่มโครงงาน*/
Route::post('/editproject/{id}', "projectcontroller@editproject"); /*แก้ไขโปรเจ็ค*/
Route::get('/Manage_project/delete/{id}', "projectcontroller@destroy"); /*ลบโครงงาน*/
/////////////////////////////////////////////////////////////////////////
Route::post('/Index/home/search', "projectcontroller@search"); /*ค้นหา*/
/////////////////////////////////////////////////////////////////////////
Route::get('/admin/type', "TypeController@index");
Route::get('/admin/type/create', "TypeController@create");
Route::post('/admin/type/create', "TypeController@postCreate");
Route::get('/admin/type/{id}/edit', "TypeController@edit");
Route::post('/admin/type/{id}/edit', "TypeController@postEdit");
Route::post('/admin/type/{id}/delete', "TypeController@postDelete");

/*Route::post('/type/type', "typesController@storetype"); /*เพิ่มโครงงาน*/
////////////////////////////////////////////////////////////////////////////////
Route::get('/admin/advisor', "AdvisorController@index");
Route::get('/admin/advisor/create', "AdvisorController@create");
Route::post('/admin/advisor/create', "AdvisorController@postCreate");
Route::get('/admin/advisor/{id}/edit', "AdvisorController@edit");
Route::post('/admin/advisor/{id}/edit', "AdvisorController@postEdit");
Route::post('/admin/branch/{id}/delete', "AdvisorController@postDelete");
////////////////////////////////////////////////////////////////////////////////
Route::get('/admin/year', "YearController@index");
Route::get('/admin/year/create', "YearController@create");
Route::post('/admin/year/create', "YearController@postCreate");
Route::get('/admin/year/{id}/edit', "YearController@edit");
Route::post('/admin/year/{id}/edit', "YearController@postEdit");
Route::post('/admin/year/{id}/delete', "YearController@postDelete");
////////////////////////////////////////////////////////////////////////////////
Route::get('/admin/award', "AwardController@index");
Route::get('/admin/award/create', "AwardController@create");
Route::post('/admin/award/create', "AwardController@postCreate");
Route::get('/admin/award/{id}/edit', "AwardController@edit");
Route::post('/admin/award/{id}/edit', "AwardController@postEdit");
Route::post('/admin/award/{id}/delete', "AwardController@postDelete");
////////////////////////////////////////////////////////////////////////////////
Route::get('/admin/project/create', "ProjectsController@create");
Route::post('/admin/project/create', "ProjectsController@postCreate");
Route::get('/admin/project/{id}' , "ProjectsController@show");
Route::post('/admin/project/save', "ProjectsController@store");
Route::get('/admin/project/{id}/edit', "ProjectsController@edit");
Route::post('/admin/project/{id}/edit', "ProjectsController@postEdit");
Route::post('/admin/project/{id}/delete', "ProjectsController@postDelete");

