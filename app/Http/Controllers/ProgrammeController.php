<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Course;
use App\Models\ProgrammeCourse;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    protected $session;
    public function __construct()
    {
        $this->session = Configuration::where('name', 'current_session')->first()->value;
    }
    public function programmeCourses($programme_id)
    {
        $programme_courses = ProgrammeCourse::where('session_id', $this->session)->get();
        $courses = Course::all();
        return view('programme_course', ['programme_courses' => $programme_courses, 'courses' => $courses]);
    }
}
