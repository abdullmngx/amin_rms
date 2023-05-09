@extends('layouts.app')
@section('title', 'Result')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Levels</h4>
                    <div class="mb-4">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Level</th>
                                        <th>Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($levels as $level)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $level->level }}</td>
                                            <td>@foreach ($semesters as $semester)
                                                <a href="/student/result/{{ $level->level_id }}/{{ $semester->id }}" class="btn btn-info">{{ $semester->name }}</a>
                                            @endforeach</td>
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