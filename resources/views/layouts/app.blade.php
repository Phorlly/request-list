<x-laravel-ui-adminlte::adminlte-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto mr-4">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('images/avatar.png') }}" class="user-image img-circle elevation-2"
                                alt="User Image">
                            <span class="d-none d-md-inline" id="info"
                                data-id="{{ Auth::id() }}">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right rounded-full shadow-lg">
                            <!-- User image -->
                            <li class="user-header bg-primary h-50">
                                <img src="{{ asset('images/avatar.png') }}" class="img-circle elevation-2"
                                    alt="User Image">
                                <p>
                                    <b>{{ Auth::user()->name }}</b><br>
                                    <span> {{ Auth::user()->email }}</span><br>
                                    <strong>{{ Auth::user()->phone }}</strong><br>
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <main class="content-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>

            {{-- <!-- Main Footer -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.1.0
                </div>
                <strong>Copyright &copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
                reserved.
            </footer> --}}
        </div>

        <!-- jQuery -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6/dist/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
        {{-- DatatTable --}}
        <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
        <script src="https://momentjs.com/downloads/moment.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
        <script src="{{ asset('js/global.js') }}"></script>
        <script>
            const info = $("#info").data("id")
            console.log("User id:", info)
        </script>
        @stack('scripts')
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
