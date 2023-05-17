@extends('layouts.auth')
@section('title', 'Login')
@section('content')
<div class="col-xxl-4 col-lg-5">
    <div class="card">

        <!-- Logo -->
        <div class="card-header py-4 text-center bg-primary">
            <a href="#" class="text-white">
                <span><img src="/logo.png" alt="logo" height="22"></span>
                SWE DEPARTMENT
            </a>
        </div>

        <div class="card-body p-4">
            
            <div class="text-center w-75 m-auto">
                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                <p class="text-muted mb-4">Enter your username/email address and password to access your account.</p>
            </div>

            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="mno" class="form-label">Matric Number</label>
                    <input class="form-control" type="text" name="matric_number" id="mno"  required="" placeholder="Enter your matric number">
                    @if($errors->has('matric_number'))
                        <span class="text-sm text-small text-danger">{{ $errors->first('matric_number') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a>
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                        <div class="input-group-text" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                </div>

                <div class="mb-3 mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                    </div>
                </div>

                <div class="mb-3 mb-0 text-center">
                    <button class="btn btn-primary" type="submit"> Log In </button>
                </div>

            </form>
        </div> <!-- end card-body -->
    </div>
    <!-- end card -->

    <div class="row mt-3">
        <div class="col-12 text-center text-danger">
            <p class="">Don't have an account? <a href="{{ route('student.register') }}" class="text-muted ms-1"><b>Sign Up</b></a></p>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- end col -->
@endsection