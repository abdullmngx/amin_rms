@extends('layouts.app')
@section('title', 'Result')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">My Result</h4>
                    <div class="mb-4">
                        <p><b>Level:</b> {{ $level->name }}</p>
                        <p><b>Semester:</b> {{ $semester->name }}</p>
                    </div>
                    <div class="mb-4">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Code</th>
                                        <th>Course Title</th>
                                        <th>Course Unit</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                @php
                                    $tcu = 0;
                                    $tgp = 0;

                                    $ttcu = 0;
                                    $ttgp = 0;

                                    foreach ($student_courses as $course) {
                                        $ttcu += $course->course_unit;
                                        $ttgp += $course->grade_point * $course->course_unit;
                                    }
                                @endphp
                                <tbody>
                                    @foreach ($student_grades as $grade)
                                        @php
                                            $tcu += $grade->course_unit;
                                            $tgp += $grade->grade_point * $grade->course_unit;
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $grade->course_code }}</td>
                                            <td>{{ $grade->course_name }}</td>
                                            <td>{{ $grade->course_unit }}</td>
                                            <td>{{ $grade->grade }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p>GPA: {{ $tgp > 0 && $tcu > 0 ? number_format($tgp/$tcu, 2) : '0.00' }}</p>
                        <p>CGPA: {{ $ttgp > 0 && $tcu > 0 ? number_format($ttgp/$ttcu, 2) : '0.00' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection