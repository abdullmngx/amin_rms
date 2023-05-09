@extends('layouts.staff_app')
@section('title', 'Course Upload')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                        Students
                    </h4>
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
                    <form action="" method="post">
                        @csrf
                        <div class="mb-4">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Matric Number</th>
                                            <th>Name</th>
                                            <th>CA Score</th>
                                            <th>Exam Score</th>
                                            <th>Total</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student_courses as $student_course)
                                            <tr>
                                                <input type="hidden" name="ids[]" value="{{ $student_course->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student_course->student->matric_number }}</td>
                                                <td>{{ $student_course->student->full_name }}</td>
                                                <td><input type="number" name="ca_scores[]" id="" class="form-control" value="{{ $student_course->ca_score }}"></td>
                                                <td><input type="number" name="exam_scores[]" id="" class="form-control" value="{{ $student_course->exam_score }}"></td>
                                                <td>{{ $student_course?->total_score ?? '' }}</td>
                                                <td>{{ $student_course?->grade ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection