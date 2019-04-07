<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="{{ app()->getLocale() }}">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Car Store">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}|404Error</title>


    <link rel="stylesheet" href="{{ asset('css/backend-css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend-css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend-css/libs/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend-css/fontawesome/css/fontawesome-all.css') }}">
</head>

<body style="font-family: 'Sniglet', cursive;">

	<!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper p-0">
       
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="error-section" style="padding: 0">
                            <img src="images/ghost.png" alt="" class="img-fluid">
                            <div class="error-section-content">
                                <h1 class="display-3" style="font-family: 'Sniglet', cursive;">Page Not Found</h1>
                                
                                <a href="/" class="btn btn-brand btn-lg">Back to homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="bg-white p-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-dark text-center">
                            Copyright © 2018 Car Store. All rights reserved
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- end wrapper -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->


	<!-- jquery 3.3.1 -->
    <script src="{{ asset('js/backend-js/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('js/backend-js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('js/backend-js/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('js/backend-js/libs/main-js.js') }}"></script>
</body>
</html>