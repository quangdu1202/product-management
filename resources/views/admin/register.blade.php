<!doctype html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="CodeLean Design">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="dashboard/main.css" rel="stylesheet">
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100 bg-heavy-rain bg-animation">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">
                    <div class="app-logo-inverse mx-auto mb-3"></div>
                    <div class="modal-dialog w-100 mx-auto">
                        <div class="modal-content">
                            <form class="" method="post" action="">
                                @csrf
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Hello there,</div>
                                            <span>Please enter your account info below.</span>
                                        </h4>
                                    </div>
                                    @include('admin.component.notification')
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="name" id="name" placeholder="Name"
                                                       type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="email" id="email" placeholder="Email"
                                                       type="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="password" id="password"
                                                       placeholder="Password" type="password"
                                                       class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <input name="password_confirmation" id="confirmPassword"
                                                       placeholder="Confirm Password" type="password"
                                                       class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer clearfix">
                                    <div class="float-left">
                                        <a class="btn btn-gradient-secondary btn-lg" href="/login">Back to Login</a>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center text-white opacity-8 mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="dashboard/assets/scripts/main.js"></script>
</body>
@if(session('notLoggedInNotification'))
    <script>
        alert('{{ session('notLoggedInNotification') }}');
    </script>
@endif
</html>
