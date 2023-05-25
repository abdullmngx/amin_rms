
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

        <style>
            .overlay{
                background: rgba(0, 0, 0, 0.7);
                height: 100vh;
            }
        </style>
    </head>

    <body style="background: url('/buk.jpeg'); background-size: cover; background-repeat: no-repeat;">
        <div class="overlay">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mr-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/about">About the Department</a>
                      </li>
                    </ul>
                </div>
              </nav>
            <div class="mt-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center mt-5">
                        <div class="col-xl-10">
                            <br> <br> <br> <br> <br> <br> <br>
                            <div class="text-center text-white">
                                <h1>BAYERO UNIVERSITY, KANO</h1>
                                <h1>FACULTY OF COMPUTING</h1>
                                <h1 class="mt-4">DEPARTMENT OF SOFTWARE ENGINEERING</h1>
                                <br><br>
                                <h3 class="">STUDENT RESULT CHECKER</h3>
                                <br><br><br>
                                <div class="text-center">
                                    <a href="{{ route('student.login') }}" class="btn btn-success btn-lg">Student Login</a>
                                    <a href="{{ route('staff.login') }}" class="btn btn-primary btn-lg">Staff Login</a>
                                </div> <!-- end row-->
                            </div> <!-- end /.text-center-->
    
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end page -->
        </div>

        <footer class="footer footer-alt">
            <script>document.write(new Date().getFullYear())</script> © BUK - RMS All rights reserved
        </footer>
        <!-- Vendor js -->
        <script src="/assets/js/vendor.min.js"></script>
        
        <!-- App js -->
        <script src="/assets/js/app.min.js"></script>

    </body>
</html>
