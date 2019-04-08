<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!------------------------------------------------------------------------------------------------------->
                                               <!-- call css files -->

        <!-- bootstrab -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- font awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

        <!-- animate library-->
        <link rel="stylesheet" href="css/animate.min.css">

        <!-- my style -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">





    </head>
    <body>
        


        <!-- the main image fixed -->
        <div class="container-fluid">
            <div class="row photo-back-fixed">
                    <img class="img-fluid" src="images/main.jpg">
            </div>

        </div>

        <!-- ---------------------------------------------------------------------------------------------------------- -->

        <div class="container-fluid padding">
              <div class="row padding" style="padding-top: 9px;">

                  <div class="lang-lcat col-md-6 col-lg-6 col-xl-6">
                        
                         
                          <div class="location">
                            <i class="fas fa-map-marker-alt fa-x"></i>

                            <a href="#">
                                <p>{{ __('lang.location') }}</p>
                            </a>

                          </div>
                          <div class="language">
                              <i class="fas fa-language"></i>
                              <p>{{ __('lang.language') }}</p>
                              <ul>
                                <li>
                                  <a href="locale/ar" style="font-size: 13px">{{ __('lang.arabic') }}</a>
                                </li>
                                <li>
                                  <a href="locale/en" style="font-size: 13px">English</a>
                                </li>
                              </ul>
                          </div>
                  </div>


                        <div class="col-md-6 col-lg-6 col-xl-6">

                            <div class="sea-log">
                                  <img class="img-fluid" src="images/search.png">
                                  <div id="search">
                                    <form action="/search" method="get" role="form">
                                        <!-- ...... ... .... for token input.... .... .... ... -->
                                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                        
                                        <input type="search" name="search" placeholder="search here ...">
                                        <input type="submit" name="save" value="search">
                                    </form> 
                                  </div>  
                                  @if (Route::has('login'))
                                      @if (Auth::guard('web')->check())
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                       </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('user.logout') }}">
                                                    {{ __('lang.logout') }}
                                                </a>
                                            </li>
                                        </ul>
                                      @elseif(Auth::guard('admin')->check()) 
                                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                                       </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ route('admin.guard.logout') }}">
                                                    
                                                   {{ __('lang.logout') }}
                                                </a>

                                                
                                            </li>
                                        </ul>
                                      @else 
                                      <div class="lio" id="lio"> 
                                        <a href="{{ url('/login') }}" id="log">{{ __('lang.login') }}</a>
                                      </div>
                                      <div class="lio">
                                        <a href="{{ url('/register') }}">{{ __('lang.register') }}</a>
                                      </div>
                                      @endif
                                   @endif
                            </div>
                        </div>

                  </div>
        </div>

        

        @yield('content')


         <footer class="container padding">
               <div class="row footer">

                       <div class="col-8 lists">
                           <div class="list1">
                                <h3> Our Company</h3>
                                 <ul>
                                        <li><a href='#'>About carstore.com</a></li>
                                        <li><a href='#'>Investor Relations</a></li>
                                        <li><a href='#'>Contact Cars.com</a></li>
                                        <li><a href='#'>Mobile Apps</a></li>
                                        <li><a href='#'>Site Map</a></li>
                                        <li><a href='#'>Careers</a></li>
                                        <li><a href='#'>Fraud Awareness</a></li>
                                        <li><a href='#'>Licensing & Reprints</a></li>
                                 </ul>
                            </div>

                             <div class="list2">
                                <h3> Buying & Selling</h3>
                                 <ul>
                                        <li><a href='#'>Find a Car</a></li>
                                        <li><a href='#'>Certified Pre-Owned</a></li>
                                        <li><a href='#'>Sell Your Car</a></li>
                                        <li><a href='#'>Car Book Values</a></li>
                                        <li><a href='#'>Car Dealers</a></li>
                                        <li><a href='#'>Compare Car Prices</a></li>
                                        <li><a href='#'> Listings by City</a></li>
                                 </ul>
                            </div>

                             <div class="list3">
                                <h3> Our Partners</h3>
                                 <ul>
                                        <li><a href='#'>Auto.com</a></li>
                                        <li><a href='#'>NewCars.com</a></li>
                                        <li><a href='#'>RepairPal.com</a></li>
                                 </ul>
                            </div>

                       </div>
                       <div class="col-4">
                              <img src="images/map.png" style="width: 316px; height: 278px; margin-top: 40px;">
                       </div>


               </div>
        </footer>

<!--  ---------------------------------------------------------------------------------------------------  -->

        <div class="container">
              <div class="row padding">

                     <div class="col-6 tpa">
                            <ul>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Privacy Statement </a></li>
                                <li><a href="#">Ad Choices</a></li>
                            </ul>
                     </div>

                     <div class="col-6 copyright">
                            <p>&copy; 2018 carstore.com. All rights reserved</p>
                     </div>
              </div>
        </div>



        <!------------------------------------------------------------------------------------------------------->
                                           <!-- call js files -->
        <!-- bootstrab -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
        <script src="js/bootstrap.min.js"></script>

       <!-- wow library -->
        <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>

        <!-- my jsvascript file -->
        <script src=" <?php echo asset('js/style.js') ?> "></script>
    </body>
</html>
