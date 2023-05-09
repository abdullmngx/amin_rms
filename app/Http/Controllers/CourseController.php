<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'credit_unit' => 'required',
            'level_id' => 'required',
            'semester_id' => 'required'
        ]);

        $courseDetail = $request->except('_token');

        $course = Course::create($courseDetail);

        return back()->with('success', 'Course added');
    }

    public function delete($course_id)
    {
        Course::where('id', $course_id)->delete();
        return back()->with('success', 'Course deleted!');
    }
    
}
