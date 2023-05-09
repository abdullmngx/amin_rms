<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Level;
use App\Models\Programme;
use App\Models\ProgrammeCourse;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    protected $session, $semester;

    public function __construct()
    {   
        $this->session = Configuration::where('name', 'current_session')->first()->value;
        $this->semester = Configuration::where('name', 'current_semester')->first()->value;;
    }

    public function register()
    {
        $programmes = Programme::all();
        $levels = Level::all();
        return view('auth.register', ['programmes' => $programmes, 'levels' => $levels]);
    }

    public function login() 
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'surname' => 'required',
            'matric_number' => 'required|unique:students',
            'programme_id' => 'required',
            'level_id' => 'required',
            'email' => 'required|unique:students'
        ]);
        $programme = Programme::find($request->programme_id);
        $student_details = $request->except('_token');
        $student_details['faculty_id'] = $programme->faculty_id;
        $student_details['department_id'] = $programme->department_id;
        $student_details['password'] = Hash::make('0000');
        $student = Student::create($student_details);
        return back()->with('success', 'Your account has been created, please login with your matric number and password: 0000');
    }

    public function authenticate(Request $request)
    {
        $request->validate(['matric_number' => 'required']);

        $student = Student::where('matric_number', $request->matric_number)->first();
        if ($student && Hash::check($request->password, $student->password))
        {
            Auth::login($student, $request->remember);
            return redirect()->intended(route('student.dashboard'));
        }
        return back()->withErrors(['matric_number' => 'Invalid credentials']);
    }

    public function update($student_id, Request $request) 
    {
        $request->validate([
            'first_name' => 'required',
            'surname' => 'required',
            'matric_number' => 'required|unique:students',
            'gender' => 'required',
            'programme_type_id' => 'required',
            'faculty_id' => 'required',
            'department_id' => 'required',
            'programme_id' => 'required',
            'level_id' => 'required',
            'email' => 'required|unique:students'
        ]);

        Student::where('id', $student_id)->update($request->except('_token'));
        return back()->with('success', 'Update completed!');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function courses()
    {
        $student_courses = StudentCourse::where('student_id', auth()->id())->where('session_id', $this->session)->pluck('course_id')->toArray();
        $courses = ProgrammeCourse::where('programme_id', auth()->user()->programme_id)->get();
        $courses->filter(function($course) use ($student_courses) {
            if (in_array($course->course_id, $student_courses))
            {
                $course->status = 'registered';
            }
            else 
            {
                $course->status = 'unregistered';
            }
        });
        return view('student_courses', ['courses' => $courses]);
    }

    public function result()
    {
        $levels = StudentCourse::where('student_id', auth()->id())->distinct('level_id')->get(['level_id']);
        $semesters = Semester::all();
        return view('student_resultl', ['levels' => $levels, 'semesters' => $semesters]);
    }

    public function getResult($level_id, $semester_id)
    {
        $level = Level::where('id', $level_id)->first();
        $levels = Level::where('order', '<', $level->order)->pluck('id')->toArray();
        $semester = Semester::find($semester_id);
        $student_grades = Student::where('id', auth()->id())->with(['student_courses' => function ($q) use ($level_id, $semester_id) {
            $q->where('level_id', $level_id)
            ->where('semester_id', $semester_id);
        }])->first();
        if ($semester->order > 1)
        {
            $previous_semester = Semester::where('order', ($semester->order-1))->first();
            $student_courses = StudentCourse::where('student_id', auth()->id())->where('level_id', $level_id)->where('semester_id', $previous_semester?->id)->orWhere(function($qr) use ($levels){
                $qr->whereIn('level_id', $levels);
            })->get();
        }
        else 
        {
            array_push($levels, $level_id);
            $student_courses = StudentCourse::where('student_id', auth()->id())->whereIn('level_id', $levels)->get();
        }
        return view('student_result', ['student_grades' => $student_grades->student_courses, 'student_courses'=>$student_courses, 'level' => $level, 'semester' => $semester]);
    }
}
