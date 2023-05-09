<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'faculty_id' => 'required',
            'name' => 'required'
        ]);

        $deptDetail = $request->except('_token');
        $department = Department::create($deptDetail);
        return back()->with('success', 'Department Created!');
    }
}
