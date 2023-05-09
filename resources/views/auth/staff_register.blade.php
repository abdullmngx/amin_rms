@extends('layouts.auth')
@section('title', 'Register')
@section('content')
<div class="col-xxl-6 col-lg-6">
    <div class="card">
        <!-- Logo-->
        <div class="card-header py-4 text-center bg-primary">
            <a href="/">
                <span><img src="/assets/images/logo.png" alt="logo" height="22"></span>
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
                    <label for="username" class="form-label">Username</label>
                    <input class="form-control" type="text" id="username" name="username"  placeholder="Pick a unique username">
                    @if($errors->has('username'))
                        <span class="text-sm text-small text-danger">{{ $errors->first('username') }}</span>
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
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="phone" placeholder="Enter your phone number">
                            @if($errors->has('phone_number'))
                                <span class="text-sm text-small text-danger">{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Select Type</option>
                                <option value="academic">Academic</option>
                                <option value="non-academic">Non Academic</option>
                            </select>
                            @if($errors->has('type'))
                                <span class="text-sm text-small text-danger">{{ $errors->first('type') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
                        <div class="input-group-text" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <span class="text-sm text-small text-danger">{{ $errors->first('password') }}</span>
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
        <div class="col-12 text-center">
            <p class="text-muted">Already have account? <a href="{{ route('staff.login') }}" class="text-muted ms-1"><b>Log In</b></a></p>
        </div> <!-- end col-->
    </div>
    <!-- end row -->

</div> <!-- end col -->
@endsection