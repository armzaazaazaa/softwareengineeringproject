<?php

namespace App\Http\Controllers\Auth;

use App\Soap\AuthenSoapService;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/Index/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return redirect('/Index/home');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function validatorUP(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users,username',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return $user;
    }

    protected function createUP(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['username'] . '@up.ac.th',
            "course_code" => $data['course_code'],
            "course_name" => $data['course_name'],
            "faculty_code" =>$data['faculty_code'],
            "faculty_name" => $data['faculty_name'],
            "role" => $data['role'],
        ]);
        $user->profiles = json_encode([
                "UP" => $data['profiles']
            ]
        );
        $user->save();
        ;

        return $user;
    }

    public function registerUP(Request $request)
    {
        $this->validatorUP($request->all())->validate();
        $service = new AuthenSoapService();
        $sid = $service->getSID($request->get('username'), $request->get('password'));

        if ($sid) {
            $studentInfo = $service->getStudentInfo($sid);
            $staffInfo = $service->getStaffInfo($sid);

            if ($staffInfo->CitizenID) {
                $staffInfo->name = $staffInfo->FirstName_TH . " " . $staffInfo->LastName_TH;
                event(new Registered($user = $this->createUP([
                    "name" => $staffInfo->name,
                    "username" => $request->get('username'),
                    "profiles" => $staffInfo,
                    "course_code" => $staffInfo->CourseCode,
                    "course_name" => $staffInfo->CourseName_EN,
                    "faculty_code" => $staffInfo->FacultyCode,
                    "faculty_name" => $staffInfo->FacultyName_EN,
                    "role" => 'staff',
                ])));

                $this->guard()->login($user);


                $service->getLogOff($sid);
                return $this->registered($request, $user)
                    ?: redirect($this->redirectPath());

            } else if ($studentInfo->CitizenID) {

                $studentInfo->name = $studentInfo->FirstName_TH . " " . $studentInfo->LastName_TH;

                event(new Registered($user = $this->createUP([
                    "name" => $studentInfo->name,
                    "username" => $request->get('username'),
                    "profiles" => $studentInfo,
                    "course_code" => $studentInfo->CourseCode,
                    "course_name" => $studentInfo->CourseName_EN,
                    "faculty_code" => $studentInfo->FacultyCode,
                    "faculty_name" => $studentInfo->FacultyName_EN,
                    "role" => 'student',
                ])));

                $this->guard()->login($user);

                $service->getLogOff($sid);
                return $this->registered($request, $user)
                    ?: redirect($this->redirectPath());
            }
        }
    }
}
