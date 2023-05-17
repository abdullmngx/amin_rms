@extends('layouts.app')
@section('title', 'Result')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">My Result</h4>
                    <div class="printArea">
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
                    <div class="mb-4">
                        <button class="btn btn-info" id="print-btn" onclick="return printResult()">
                            Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function printResult()
        {
            var header_str = '<html><head><title>' + document.title  + '</title></head><body style="background-color: white">';
            var header = '<h4 style="text-align:center">BAYERO UNIVERSITY, KANO<br> FACULTY OF COMPUTER SCIENCE AND INFORMATION TECHNOLOGY <br> DEPARTMENT OF SOFTWARE ENGINEERING<br> STUDENT SEMESTER REPORT FORM </h4>'
            var footer_str = '</body></html>';
            var new_str = $('.printArea').html();
            var old_str = document.body.innerHTML;
            document.body.innerHTML = header_str + header + new_str + footer_str;
            window.print();
            document.body.innerHTML = old_str;
            return false;
        }
    </script>
@endsection