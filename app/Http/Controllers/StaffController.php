<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Level;
use App\Models\Programme;
use App\Models\Semester;
use App\Models\Staff;
use App\Models\StaffCourse;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    protected $session, $semester;

    public function __construct()
    {   
        $this->session = Configuration::where('name', 'current_session')->first()->value;
        $this->semester = Configuration::where('name', 'current_semester')->first()->value;;
    }

    public function register()
    {
        return view('auth.staff_register');
    }

    public function login()
    {
        return view('auth.staff_login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'surname' => 'required',
            'username' => 'required|unique:staff',
            'phone_number' => 'required',
            'type' => 'required',
            'email' => 'required|unique:staff',
            'password' => 'required'
        ]);

        $staff_details = $request->except('_token', 'password');
        $staff_details['password'] = Hash::make($request->password);

        $staff = Staff::create($staff_details);

        Auth::guard('staff')->login($staff);
        return redirect()->intended(route('staff.dashboard'));
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ]);

        $staff = Staff::where('username', $request->username)->orWhere('email', $request->username)->first();
        if ($staff && Hash::check($request->password, $staff->password))
        {
            Auth::guard('staff')->login($staff, $request->remember);
            return redirect()->intended(route('staff.dashboard'));
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        $staffs = Staff::count();
        $students = Student::count();
        $programmes = Programme::count();
        $courses = Course::count();
        return view('staff_dashboard', ['staffs' => $staffs, 'students' => $students, 'programmes'=>$programmes,'courses'=>$courses]);
    }

    public function courses()
    {
        $courses = Course::all();
        $levels = Level::all();
        $semesters = Semester::all();
        return view('courses', ['courses' => $courses, 'levels' => $levels, 'semesters' => $semesters]);
    }

    public function programmeCourses()
    {
        $programmes = Programme::all();
        return view('programme_courses', ['programmes' => $programmes]);
    }

    public function myCourses()
    {
        $staff_courses = StaffCourse::where('session_id', $this->session)->where('staff_id', auth('staff')->id())->pluck('course_id')->toArray();
        $courses = Course::all();

        $courses->filter(function ($course) use ($staff_courses) {
            if (in_array($course->id, $staff_courses))
            {
                $course->status = 'assigned';
            }
            else
            {
                $course->status = 'free';
            }
        });
        return view('staff_courses', ['courses' => $courses]);
    }

    public function assign($course_id)
    {
        $course = Course::find($course_id);
        StaffCourse::create([
            'staff_id' => auth('staff')->id(),
            'course_id' => $course_id,
            'session_id' => $this->session,
            'semester_id' => $course->id
        ]);
        return back()->with('success', 'course assigned');
    }

    public function unassign($course_id)
    {
        StaffCourse::where('session_id', $this->session)->where('course_id', $course_id)->delete();
        return back()->with('success', 'course unassigned');
    }

    public function scoresUpload()
    {
        $staff_courses = StaffCourse::where('session_id', $this->session)->where('staff_id', auth('staff')->id())->get();
        return view('scores_upload', ['staff_courses' => $staff_courses]);
    }

    public function upload($course_id)
    {
        $student_courses = StudentCourse::where('course_id', $course_id)->where('session_id', $this->session)->with('student')->get();
        return view('course_upload', ['student_courses' => $student_courses]);
    }

    public function config()
    {
        $configs = Configuration::all();
        return view('config', ['configs' => $configs]);
    }

    public function staffs()
    {
        $staffs = Staff::all();
        return view('staffs', ['staffs' => $staffs]);
    }

    public function students()
    {
        $students = Student::all();
        return view('students', ['students' => $students]);
    }

    public function saveScores($course_id, Request $request)
    {
        $ids = $request->ids;
        $ca_scores = $request->ca_scores;
        $exam_scores = $request->exam_scores;
        $count = count($ids);

        for ($i=0; $i<$count; $i++)
        {
            $id = $ids[$i];
            $ca_score = $ca_scores[$i];
            $exam_score = $exam_scores[$i];
            $total = $ca_score + $exam_score;
            $grade = Grade::where('min_score', '<=', $total)->where('max_score', '>=', $total)->first();

            StudentCourse::where('id', $id)->update([
                'ca_score' => $ca_score,
                'exam_score' => $exam_score,
                'total_score' => $total,
                'grade_id' => $grade->id,
                'status' => $grade->status,
            ]);
        }

        return back()->with('success', 'Scores saved!');
    }

    public function promote()
    {
        $students = Student::all();
        foreach ($students as $student)
        {
            $current_level = Level::find($student->level_id);
            $next_level = Level::where('order', $current_level->order + 1)->first();
            $level_id = $current_level->id;
            if (!is_null($next_level))
            {
                $level_id = $next_level->id;
            }

            Student::where('id', $student->id)->update(['level_id' => $level_id]);
        }

        return back()->with('msg', 'Students promoted');
    }
}
