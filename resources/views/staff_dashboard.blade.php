@extends('layouts.staff_app')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">

       <div class="row">
            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Students</h5>
                        <h3 class="mt-3 mb-3">{{ number_format($students) }}</h3>
                        
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Staff</h5>
                        <h3 class="mt-3 mb-3">{{ number_format($staffs) }}</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-book widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Courses</h5>
                        <h3 class="mt-3 mb-3">{{ number_format($courses) }}</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-book-open widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Growth">Programmes</h5>
                        <h3 class="mt-3 mb-3">{{ number_format($programmes) }}</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

    </div> <!-- end col -->

</div>
<!-- end row -->
@endsection