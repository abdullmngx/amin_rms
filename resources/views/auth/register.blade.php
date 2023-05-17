@extends('layouts.auth')
@section('title', 'Register')
@section('content')
<div class="col-xxl-6 col-lg-6">
    <div class="card">
        <!-- Logo-->
        <div class="card-header py-4 text-center bg-primary">
            <a href="#" class="text-white">
                <span><img src="/logo.png" alt="logo" height="22"></span>
                SWE DEPARTMENT
            </a>
        </div>

        <div class="card-body p-4">
            
            <div class="text-center w-75 m-auto">
                <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign Up</h4>
                <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute </p>
            </div>

            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="firstname" name="first_name" placeholder="Enter your first name" >
                            @if($errors->has('first_name'))
                                <span class="text-sm text-small text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="midname" class="form-label">Middle Name</label>
                            <input class="form-control" type="text" id="midname" name="middle_name" placeholder="Enter your middle name" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input class="form-control" type="text" id="surname" name="surname" placeholder="Enter your surname" >
                            @if($errors->has('surname'))
                                <span class="text-sm text-small text-danger">{{ $errors->first('surname') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Matric Number</label>
                    <input class="form-control" type="text" id="username" name="matric_number"  placeholder="Enter your matric number">
                    @if($errors->has('matric_number'))
                        <span class="text-sm text-small text-danger">{{ $errors->first('matric_number') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="emailaddress" class="form-label">Email address</label>
                    <input class="form-control" type="email" id="emailaddress" name="email"  placeholder="Enter your email">
                    @if($errors->has('email'))
                        <span class="text-sm text-small text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="programme">Programme</label>
                            <select name="programme_id" class="form-control" id="programme">
                                <option value="">Select Programme</option>
                                @foreach ($programmes as $programme)
                                    <option value="{{ $programme->id }}">{{ $programme->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('programme_id'))
                                <span class="text-sm text-small text-danger">{{ $errors->first('programme_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level_id" id="level" class="form-control">
                                <option value="">Select Level</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('level_id'))
                                <span class="text-sm text-small text-danger">{{ $errors->first('level_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>

                <div class="mb-3 text-center">
                    <button class="btn btn-primary" type="submit"> Sign Up </button>
                </div>

            </form>
        </div> <!-- end card-body -->
    </div>
    <!-- end card -->

    <div class="row mt-3">
        <div class="col-12 text-center text-danger">
            <p class="">Already have account? <a href="{{ route('student.login') }}" class="text-muted ms-1"><b>Log In</b></a></p>
        </div> <!-- end col-->
    </div>
    <!-- end row -->

</div> <!-- end col -->
@endsection