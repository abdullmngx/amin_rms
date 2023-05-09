<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Course;
use App\Models\ProgrammeCourse;
use Illuminate\Http\Request;

class ProgrammeCourseController extends Controller
{
    protected $session, $semester;

    public function __construct()
    {   
        $this->session = Configuration::where('name', 'current_session')->first()->value;
        $this->semester = Configuration::where('name', 'current_semester')->first()->value;;
    }

    public function store($programme_id, Request $request)
    {
        $course_ids = $request->course_ids;
        foreach ($course_ids as $course_id)
        {
            $course = Course::find($course_id);
            $programme_course = [
                'programme_id' => $programme_id,
                'course_id' => $course_id,
                'session_id' => $this->session,
                'semester_id' => $course->semester_id,
                'level_id' => $course->level_id
            ];

            if (ProgrammeCourse::where('session_id', $this->session)->where('course_id', $course_id)->exists())
            {
                return back()->withErrors(['error' => 'One or more of selected course(s) already added!']);
            }
            
            ProgrammeCourse::create($programme_course);
        }

        return back()->with('success', 'Course(s) added!');
    }

    public function remove(Request $request)
    {
        $ids = $request->prc_ids;
        foreach ($ids as $id)
        {
            ProgrammeCourse::destroy($id);
        }

        return back()->with('success', 'Course(s) removed!');
    }
}
