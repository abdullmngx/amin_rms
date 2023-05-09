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
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Course Title</th>
                                    <th>Course Code</th>
                                    <th>Course Semester</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $course->course_name }}</td>
                                        <td>{{ $course->course_code }}</td>
                                        <td>{{ $course->semester }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection