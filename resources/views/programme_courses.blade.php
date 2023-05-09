@extends('layouts.staff_app')
@section('title', 'Programme Courses')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4 card-title">
                        Programmes
                    </h4>
                    <div class="mb-4">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Programme Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programmes as $programme)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $programme->name }}</td>
                                            <td><a href="/staff/programmes/courses/{{ $programme->id }}" class="btn btn-primary">View Courses</a></td>
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