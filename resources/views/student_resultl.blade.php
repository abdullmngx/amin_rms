@extends('layouts.app')
@section('title', 'Result')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">My Result</h4>
                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-5">
                            <form id="result-form" method="post">
                                <div class="mb-3">
                                    <label for="level">Level</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="">Select level</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->level_id }}">{{ $level->level }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="semester">Semester</label>
                                    <select name="semester" id="semester" class="form-control">
                                        <option value="">Select Semester</option>
                                        @foreach ($semesters as $semester)
                                            <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                        @endforeach
                                        <option value="0">End of Session Report</option>
                                    </select>
                                </div>
                                <div class="err"></div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-primary w-100">Proceed</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#result-form').submit(function (e) {
            e.preventDefault()
            let level = $('#level').val()
            let sem = $('#semester').val()

            if (level != '' && sem != '' && sem != "0")
            {
                location.href='/student/result/'+level+ '/' + sem
            }
            else if (level != '' && sem == "0")
            {
                location.href='/student/result/' + level + '/' + sem
            }
            else 
            {
                $('.err').html('<div class="alert alert-danger">Level and semester are required</div>')
            }
        })
    </script>
@endsection