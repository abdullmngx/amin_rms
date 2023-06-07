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
                        @if (request()->semester_id != 0)
                        <p><b>Semester:</b> {{ $semester?->name }}</p>
                        @endif
                    </div>
                    <div class="printArea">
                        @if (request()->semester_id != 0)
                        <div class="mb-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Course Unit</th>
                                            <th>Grade</th>
                                            <th>G. P</th>
                                            <th>Points</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $tcu = 0;
                                        $tgp = 0;
    
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
                                                <td>{{ $grade->grade_point }}</td>
                                                <td>{{ $grade->grade_point * $grade->course_unit }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right">Total for the semester</td>
                                            <td>{{ $tcu }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $tgp }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p>{{ $semester?->name }} semester G. P. A: {{ $tgp > 0 && $tcu > 0 ? number_format($tgp/$tcu, 2) : '0.00' }}</p>
                        </div>
                        @else
                        <h4 class="text-center">First Semester</h4>
                        <div class="mb-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Course Unit</th>
                                            <th>Grade</th>
                                            <th>G. P</th>
                                            <th>Points</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $tcu = 0;
                                        $tgp = 0;
                                        $tcp = 0;
                                    @endphp
                                    <tbody>
                                        @foreach ($student_grades->where('semester_id', 1) as $grade)
                                            @php
                                                $tcu += $grade->course_unit;
                                                $tgp += $grade->grade_point * $grade->course_unit;
                                                if ($grade->grade_point > 0)
                                                {
                                                    $tcp += $grade->course_unit;
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $grade->course_code }}</td>
                                                <td>{{ $grade->course_name }}</td>
                                                <td>{{ $grade->course_unit }}</td>
                                                <td>{{ $grade->grade }}</td>
                                                <td>{{ $grade->grade_point }}</td>
                                                <td>{{ $grade->grade_point * $grade->course_unit }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right">Total for the semester</td>
                                            <td>{{ $tcu }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $tgp }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p>First semester G. P. A: {{ $tgp > 0 && $tcu > 0 ? number_format($tgp/$tcu, 2) : '0.00' }}</p>
                        </div>

                        <h4 class="text-center">Second Semester</h4>
                        <div class="mb-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Course Unit</th>
                                            <th>Grade</th>
                                            <th>G. P</th>
                                            <th>Points</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $tcu2 = 0;
                                        $tgp2 = 0;
                                        $tcp2 = 0;

                                        $ttcu = 0;
                                        $ttgp = 0;
    
                                        foreach ($student_courses as $course) {
                                            $ttcu += $course->course_unit;
                                            $ttgp += $course->grade_point * $course->course_unit;
                                        }
                                    @endphp
                                    <tbody>
                                        @foreach ($student_grades->where('semester_id', 2) as $grade)
                                            @php
                                                $tcu2 += $grade->course_unit;
                                                $tgp2 += $grade->grade_point * $grade->course_unit;
                                                if ($grade->grade_point > 0)
                                                {
                                                    $tcp2 += $grade->course_unit;
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $grade->course_code }}</td>
                                                <td>{{ $grade->course_name }}</td>
                                                <td>{{ $grade->course_unit }}</td>
                                                <td>{{ $grade->grade }}</td>
                                                <td>{{ $grade->grade_point }}</td>
                                                <td>{{ $grade->grade_point * $grade->course_unit }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right">Total for the semester</td>
                                            <td>{{ $tcu2 }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $tgp2 }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p>Second semester G. P. A: {{ $tgp2 > 0 && $tcu2 > 0 ? number_format($tgp2/$tcu2, 2) : '0.00' }}</p>
                            <p>C. G. P. A: {{ $ttgp > 0 && $ttcu > 0 ? number_format($ttgp/$ttcu, 2) : '0.00' }}</p>
                        </div>
                        <div class="mb-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-center" colspan="3">Cummulative Result Carried Forward (After Entering the Current One)</th>
                                    </tr>
                                    <tr>
                                        <td>Total Points Obtained: {{ $tgp + $tgp2 }}</td>
                                        <td>Total Credits Registered: {{ $tcu + $tcu2 }}</td>
                                        <td>Total Credits Passed: {{ $tcp + $tcp2 }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @endif
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
            var header = '<div class="mb-5"><h3 style="text-align:center">BAYERO UNIVERSITY, KANO<br> FACULTY OF COMPUTING <br> DEPARTMENT OF SOFTWARE ENGINEERING<br> {{ request()->semester_id != 0 ? "STUDENT SEMESTER REPORT FORM" : "STUDENT END OF SESSION REPORT FORM" }} </h3> </div>'
            var student_info = `<div class="mb-5"><table class="table table-bordered"> <tr> <th>Name: {{ auth()->user()->full_name }}</th> <th>Reg No.: {{ auth()->user()->matric_number }}</th> <th>Level: {{ $level->name }}</th> </tr> <tr> <th colspan="3">Programme: {{ auth()->user()->programme }}</th> </tr> </table></div>`
            //var result_title = '<div class="mb-3 text-center"> <h4 style="text-decoration: underline">{{ strtoupper($semester?->name) }} SEMESTER RESULTS </h4> </div>'
            var footer_str = '</body></html>';
            var new_str = $('.printArea').html();
            var old_str = document.body.innerHTML;
            document.body.innerHTML = header_str + header + student_info + new_str + footer_str;
            window.print();
            document.body.innerHTML = old_str;
            return false;
        }
    </script>
@endsection