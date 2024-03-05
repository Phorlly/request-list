@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark text-uppercase">Department List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Department List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-header">
                <div class="float-sm-right">
                    <button type="button" class="btn btn-primary btn-md add">
                        <i class="fas fa-plus-circle"></i>
                        <span class="text-uppercase">Add</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover" role="grid">
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/department.js') }}"></script>
    @endpush
    @include('forms.department-form')
@endsection
