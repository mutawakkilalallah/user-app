<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User APP</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/1177/1177568.png" type="image/x-icon">

    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @if (session('success'))
            <div id="success" data-success="{{ session('success') }}"></div>
        @endif

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <li class="user-header bg-info">
                            <p>
                                {{ auth()->user()->name }}
                                <small>{{ '(@' . auth()->user()->username . ')' }}</small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <a href="/logout" class="btn btn-default btn-flat btn-sm float-left">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="/" class="brand-link">
                <img src="https://cdn-icons-png.flaticon.com/512/1177/1177568.png" alt="AdminLTE Logo"
                    class="brand-image" width="40" height="40">
                <span class="brand-text font-weight-bold">User APP</span>
            </a>

            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/user" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </section>

        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="https://users.enjebali.com">Users APP</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>

    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="/assets/dist/js/adminlte.min.js?v=3.2.0"></script>
    <script>
        $(function() {
            const success = $('#success').data('success');
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            if (success) {

                Toast.fire({
                    icon: 'success',
                    title: success
                })
            }
        })
    </script>
</body>

</html>
