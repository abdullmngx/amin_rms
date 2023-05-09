@extends('layouts.staff_app')
@section('title', 'Programme Courses')
@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4 card-title">Courses</h4>
                    <form action="" method="post">
                        @csrf
                        <div class="mb-4">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input type="checkbox"  id="chkall0" class="form-check-input">
                                                </div>
                                            </th>
                                            <th>S/N</th>
                                            <th>Course Title</th>
                                            <th>Course Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="course_ids[]" class="form-check-input aaa" value="{{ $course->id }}">
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $course->name }}</td>
                                                <td>{{ $course->code }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Add Course(s) to programme</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4 card-title">Programme Courses</h4>
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
                    <form action="{{ route('programme_course.remove') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input type="checkbox"  id="chkall1" class="form-check-input">
                                                </div>
                                            </th>
                                            <th>S/N</th>
                                            <th>Course Title</th>
                                            <th>Course Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($programme_courses as $course)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="prc_ids[]" class="form-check-input aa" value="{{ $course->id }}">
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $course->course_name }}</td>
                                                <td>{{ $course->course_code }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Remove Course(s)</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#chkall0').click(function (event) {
            if (this.checked) {
                $('.aaa').each(function () {
                    this.checked = true;
                });
            } else {
                $('.aaa').each(function () {
                    this.checked = false;
                });
            }
        });
        $('#chkall1').click(function (event) {
            if (this.checked) {
                $('.aa').each(function () {
                    this.checked = true;
                });
            } else {
                $('.aa').each(function () {
                    this.checked = false;
                });
            }
        });
    </script>
@endsection