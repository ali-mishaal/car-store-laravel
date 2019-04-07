<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}|@yield('title')</title>

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/backend-css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('style')
    
    <style type="text/css">

        .navbar-brand{
            color:  rgba(29, 25, 25, 0.7) !important;
        }
        .navbar-brand:hover
        {
            color:  rgba(29, 25, 25, 0.7) !important;
        }

        .navbar-nav li a{
             color:  rgba(29, 25, 25, 0.9) !important;
             font-size: 14px;
             letter-spacing: 1px;
             font-family: 'Exo 2', sans-serif;
        }

        .menu-car li ,.li1og{
            height: 100%;
            position: relative;
            transition: all .5s;
        }

        .li1og a{
            margin-top: 21px;
        }

        .menu-car li:before,.li1og:before
        {  
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color:#B71C1C; 
            transform: scale(0);
            transition: all .5s;
        }
        .menu-car li:hover:before,.li1og:hover:before
        {
            transform: scale(1);
        }

        .user-name li
        {

            height: 100%;
        }

        .user-name.co{
            background-color: #B71C1C;
        }

        .user-name a{
            margin-top: 21px;
        }
        
        .logout-drop{
            margin-top: 0 !important;
        }
        
       .logout-drop:hover{
        background-color: #B71C1C !important;
       }


    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg" style="height: 80px;background-color: #ffc750;box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 8px 0px, rgba(0, 0, 0, 0.19) 0px 0px 10px 0px; border:transparent">
          <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <p class="logo" style="margin: 0">CAR <span style="color:#B71C1C">STORE</span></p>
            <!-- {{ config('app.name', 'Laravel') }} -->
        </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto menu-car" style="margin-left: 35px;height: 59px;margin-top: 20px">
                   <li class="nav-item active">
                      <a class="nav-link" href="{{ route('car.sale') }}">car for sale</a>
                   </li>
                   <li class="nav-item">
                      <a class="nav-link" href="{{ route('sell.car') }}">sell your car</a>
                  </li>
                   <li class="nav-item">
                      <a class="nav-link" href="{{ route('service.repair') }}">services & repair</a>
                  </li>
                   <li class="nav-item">
                      <a class="nav-link" href="{{ route('video.reviewws') }}">videos & reviews</a>
                   </li>
                </ul>
             <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right " style="height: 80px">
                    <!-- Authentication Links -->
                    @if (Route::has('login'))

                        @if (Auth::guard('web')->check())
                        <li class="nav-item dropdown user-name">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: -78px;">
                                
                                <a class="dropdown-item logout-drop" href="{{ route('user.logout') }}">
                                    Logout
                                </a>
                                
                            </div>
                        </li>
                        @elseif(Auth::guard('admin')->check())
                          <li class="nav-item dropdown user-name">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: -78px;">
                                
                                <a class="dropdown-item logout-drop" href="{{ route('admin.guard.logout') }}">
                                    Logout
                                </a>
                                
                            </div>
                        </li>
                        
                        
                        @else
      
                           <li class="nav-item li1og">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item li1og">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endif
                </ul>
          </div>
    </nav>
      
    <div id="app">
        @yield('content')
    </div>

    <!-- jquery 3.3.1 -->
    <script src="{{ asset('js/backend-js/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('js/backend-js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            

            $(".dropdown a").click(function(){
                $(".dropdown").toggleClass("co");
            });

                   
            

     });
    </script>
    
    @yield('js')
</body>
</html>
