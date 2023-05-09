@extends('layouts.staff_app')
@section('title', 'Courses')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">@yield('title')</h4>
                    <div class="mb-4">
                        <a href="javascript:void" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod">Add Course</a>
                    </div>
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
                                        <th>Course Unit</th>
                                        <th>Course Semester</th>
                                        <th>Course Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $course->name }}</td>
                                            <td>{{ $course->code }}</td>
                                            <td>{{ $course->credit_unit }}</td>
                                            <td>{{ $course->semester }}</td>
                                            <td>{{ $course->level }}</td>
                                            <td><a href="/staff/courses/delete/{{ $course->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure you want to delete this course?')">Delete</a></td>
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

@section('modals')
    <div class="modal fade" id="mod">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Course</h4>
                    <a href="javascript:void" data-bs-dismiss="modal" class="btn-close"></a>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Course Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="code">Course Code</label>
                            <input type="text" name="code" id="code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="credit_unit">Course Unit</label>
                            <input type="number" name="credit_unit" id="credit_unit" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="level">Course Level</label>
                            <select name="level_id" id="level" class="form-control">
                                <option value="">Select Level</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="semester">Course Semester</label>
                            <select name="semester_id" id="semester" class="form-control">
                                <option value="">Select Semester</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection