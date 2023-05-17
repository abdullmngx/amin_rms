
<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

    <head>
        <meta charset="utf-8" />
        <title>RMS| HOME</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">
        
        <!-- Theme Config Js -->
        <script src="/assets/js/hyper-config.js"></script>

        <!-- App css -->
        <link href="/assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body style="background: url('/buk.jpeg'); background-size: cover; background-repeat: no-repeat">

        <div class="mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">

                        <div class="text-center text-danger">
                            <h1>BAYERO UNIVERSITY, KANO</h1>
                            <h1>FACULTY OF COMPUTER SCIENCE AND INFORMATION TECHNOLOGY</h1>
                            <h1 class="mt-4">DEPARTMENT OF SOFTWARE ENGINEERING</h1>
                            <h3 class="text-warning">STUDENT RESULT CHECKER</h3>

                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <a href="{{ route('student.login') }}" class="btn btn-success w-100">Student Login</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <a href="{{ route('staff.login') }}" class="btn btn-danger w-100">Staff Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end /.text-center-->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt text-danger">
            <script>document.write(new Date().getFullYear())</script> © BUK - RMS All rights reserved
        </footer>
        <!-- Vendor js -->
        <script src="/assets/js/vendor.min.js"></script>
        
        <!-- App js -->
        <script src="/assets/js/app.min.js"></script>

    </body>
</html>
