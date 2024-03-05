@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark text-uppercase">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
        @can('view-dashboard')
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="small-box bg-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="m-4 text-uppercase">Users</h5>
                                <h3 class="m-4">{{ $users }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="small-box">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="m-4 text-uppercase">Departments</h5>
                                <h3 class="m-4">{{ $departments }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="small-box bg-warning">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon">
                                    <i class="fas fa-money-check"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="m-4 text-uppercase">All Requesters</h5>
                                <h3 class="m-4">{{ $requesters }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="small-box bg-gradient-gray-dark">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon">
                                    <i class="fas fa-circle-notch"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="m-4 text-uppercase">Pending</h5>
                                <h3 class="m-4">{{ $pending }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="small-box bg-success">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="m-4 text-uppercase">Approved</h5>
                                <h3 class="m-4">{{ $approved }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="small-box bg-danger">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="m-4 text-uppercase">Rejected</h5>
                                <h3 class="m-4">{{ $rejected }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endcan
        @can('view-requester')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="small-box bg-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h2 class="m-4 text-uppercase">Hello,</h2>
                                <h3 class="m-4">{{ Auth::user()->name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
