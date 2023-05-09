<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Course;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    protected $session, $semester;

    public function __construct()
    {   
        $this->session = Configuration::where('name', 'current_session')->first()->value;
        $this->semester = Configuration::where('name', 'current_semester')->first()->value;;
    }

    public function register($course_id)
    {
        $course  = Course::find($course_id);
        $student_course = [
            'student_id' => auth()->id(),
            'programme_id' => auth()->user()->programme_id,
            'session_id' => $this->session,
            'semester_id' => $course->semester_id,
            'level_id' => auth()->user()->level_id,
            'course_id' => $course_id
        ];

        StudentCourse::create($student_course);
        return back()->with('success', 'Course Registered');
    }

    public function unregister($course_id)
    {
        StudentCourse::where('course_id', $course_id)->where('session_id', $this->session)->delete();
        return back()->with('success', 'Course Unregistered');
    }
}
