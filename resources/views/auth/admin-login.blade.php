<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name' , 'laravel') }}|adminlogin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('images/backend-image/favicon.ico') }}">


    <link rel="stylesheet" href="{{ asset('css/backend-css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend-css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend-css/libs/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend-css/fontawesome/css/fontawesome-all.css') }}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>

</head>

<body>

<!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                   <a href="/">
                        <span style="font-size: 26px; font-weight: 900;">
                              Car Store
                        </span>
                    </a>
                    <span class="splash-description">Please enter your user information.</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <input class="form-control form-control-lg" id="username" type="email" placeholder="E-mail Address" name="email" value="{{ old('email') }}" autocomplete="off" required="">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <input class="form-control form-control-lg" id="password" type="password" placeholder="Password" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="background-color: #F57F17; border: 1px solid #F57F17">Sign in
                    </button>

                </form>

            </div>

            <div class="card-footer bg-white p-0  ">

                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('admin.password.request') }}" class="footer-link">Forgot Password</a>
                </div>

                <div class="card-footer-item card-footer-item-bordered">
                    <a href="/" class="footer-link">Home Page</a>
                </div>

            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
            

    <!-- jquery 3.3.1 -->
    <script src="{{ asset('js/backend-js/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('js/backend-js/bootstrap.bundle.js') }}"></script>

</body>
</html>
