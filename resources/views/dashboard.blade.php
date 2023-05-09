@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="/assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm mb-4">
                        <h4>{{ auth()->user()->full_name }}</h4>
                        <h6>{{ auth()->user()->matric_number }}</h6>
                        <hr>
                    </div>
                    <div class="mb-2">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Faculty</th>
                                    <td>{{ auth()->user()->faculty }}</td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>{{ auth()->user()->department }}</td>
                                </tr>
                                <tr>
                                    <th>Programme</th>
                                    <td>{{ auth()->user()->programme }}</td>
                                </tr>
                                <tr>
                                    <th>Level</th>
                                    <td>{{ auth()->user()->Level }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection