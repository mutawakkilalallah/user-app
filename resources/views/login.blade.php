<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User App</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/1177/1177568.png" type="image/x-icon">

    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        @error('errorLogin')
            <div id="errorLogin" data-errorLogin="{{ $message }}"></div>
        @enderror
        <div class="login-logo">
            <a href="/assets/index2.html"><b>User</b>APP</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="/auth" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            placeholder="Username" name="username" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row" <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

            </div>
            </form>
        </div>

    </div>
    </div>


    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="/assets/dist/js/adminlte.min.js?v=3.2.0"></script>
    <script>
        $(function() {
            const errorLogin = $('#errorLogin').data('errorlogin');
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            if (errorLogin) {

                Toast.fire({
                    icon: 'error',
                    title: errorLogin
                })
            }
        })
    </script>
</body>

</html>
