@extends('layouts.app')
@section('title', 'Course Registration')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Courses</h4>
                <div class="mb-4">
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger">
                                {{ $err }}
                            </div>
                        @endforeach
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
                <div class="mb-4">
                    <div class="table-responsive">
                        <div class="mb-4">
                            <h4>First Semester Courses</h4>
                            <table class="table table-striped table-hover mb-4">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Title</th>
                                        <th>Course Code</th>
                                        <th>Course Semester</th>
                                        <th>Course Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses->where('semester_id', 1) as $course)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $course->course_name }}</td>
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->semester }}</td>
                                            <td>{{ $course->credit_unit }}</td>
                                            <td>
                                                @if ($course->status == 'registered')
                                                    <a href="{{ route('student.unregister_course', $course->course_id) }}" class="btn btn-danger">Unregister</a>
                                                @else
                                                    <a href="{{ route('student.register_course', $course->course_id) }}" class="btn btn-success">Register</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p>
                                First Semester Total Registered Units : {{ auth()->user()->first_semester_units }}
                            </p>
                        </div>
                        <div class="mb-4">
                            <h4>Second Semester Courses</h4>
                            <table class="table table-striped table-hover mb-4">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Title</th>
                                        <th>Course Code</th>
                                        <th>Course Semester</th>
                                        <th>Course Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses->where('semester_id', 2) as $course)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $course->course_name }}</td>
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->semester }}</td>
                                            <td>{{ $course->credit_unit }}</td>
                                            <td>
                                                @if ($course->status == 'registered')
                                                    <a href="{{ route('student.unregister_course', $course->course_id) }}" class="btn btn-danger">Unregister</a>
                                                @else
                                                    <a href="{{ route('student.register_course', $course->course_id) }}" class="btn btn-success">Register</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p>
                                Second Semester Total Registered Units : {{ auth()->user()->second_semester_units }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection