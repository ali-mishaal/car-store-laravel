<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>car store</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!------------------------------------------------------------------------------------------------------->
                                               <!-- call css files -->

        <!-- bootstrab -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- font awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

        <!-- my style -->
        <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>">





    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

        </div>


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

                               <i class="fas fa-map-marker-alt fa-x"></i>

                                <a class="location" href="#">
                                        <p>location</p>
                                </a>


                                <i class="fas fa-language"></i>
                                <div class="language">
                                        <p>language</p>
                                        <ul>
                                            <li>arabic</li>
                                            <li>English</li>
                                        </ul>
                                </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="sea-log">
                                  <img class="img-fluid" src="images/search.png">
                                  <a href="#">login</a>
                                  <a href="#">register</a>
                            </div>
                        </div>

                  </div>
        </div>

        <!-- ---------------------------------------------------------------------------------------------------------- -->

        <div class="container-fluid padding">
                <div class="row" style="overflow: hidden;">
                     <div class="col-1" style="max-width: 5.333%;"></div>
                     <div class="main-header col-10">
                            <img class="image-fluid brush" src="images/brush.png">
                            <img class="image-fluid car-header" src="images/car1.png">
                            <p class="logo">CAR <span style="color:#B71C1C">STORE</span></p>
                            <ul class="heade-nav">
                                   <li><a href="#">car for sale</a></li>
                                   <li><a href="#">sell your car</a></li>
                                   <li><a href="#">services & repair</a></li>
                                   <li><a href="#">videos & reviews</a></li>
                            </ul>

                            <div class="social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-tumblr"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>

                                </ul>
                            </div>

                            <p class="slide-word">find your <br /> next match</p>
                            <div id="brwonLayer"></div>
                            <div id="redLayer"></div>

                     </div>

                     <div class="point-move col-1">
                            <ul>
                                <li id="c1"></li>
                                <li id="c2"></li>
                                <li id="c3"></li>
                                <li id="c4"></li>
                            </ul>
                     </div>


                </div>
        </div>

     <!-- ---------------------------------------------------------------------------------------------------------- -->

     <div class="container padding ">
            <div class="row latest-stories">
                   <!-- <img class='img-latest-stories' src="images/latest-stories.png"> -->
                   <div class="col-12 latest-stories-title">
                         <span style="text-decoration: underline;">latest </span><br>
                         <span style="margin-left: 384px;line-height: 16px;">stories</span>
                   </div>

                   <div class="col-12 photo1-p">
                         <img class="image-fluid" src="images/photo1.jpg">
                         <h2 class="title">Lorem Ipsum</h2>
                         <p class="body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                   </div>

                   <div class="col-12 photo2-p">
                          <img class="image-fluid" src="images/photo2.jpg">
                          <h2 class="title">Lorem Ipsum</h2>
                          <p class="body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>

                   </div>

           </div>
     </div>

     <!-- -------------------------------------------------------------------------------------------------------- -->


        <div class="container trending-searches-body">
               <div class="row padding trending-search">
                     <div class="col-12  trending-searches-title">
                          <p><span>trending searches</span></p>
                     </div>
                      <div class="col-8">
                            <div class=" trending-searches">
                                     <div class="trending-searches-1">
                                         <p>Lorem Ipsum</p>
                                         <img class="image-fluid" src="images/brush2.png">
                                         <img class="image-fluid" src="images/trending1.png">

                                     </div>

                                     <div>
                                         <p>Lorem Ipsum</p>
                                         <img class="image-fluid" src="images/brush2.png">
                                         <img class="image-fluid" src="images/trending2.png">

                                     </div>

                                     <div>
                                         <p>Lorem Ipsum</p>
                                         <img class="image-fluid" src="images/brush2.png">
                                         <img class="image-fluid" src="images/trending3.png">

                                     </div>

                                     <div>
                                         <p>Lorem Ipsum</p>
                                         <img class="image-fluid" src="images/brush2.png">
                                         <img class="image-fluid" src="images/trending4.png">

                                     </div>

                                     <div>
                                         <p>Lorem Ipsum</p>
                                         <img class="image-fluid" src="images/brush2.png">
                                         <img class="image-fluid" src="images/trending5.png">

                                     </div>

                                     <div>
                                         <p>Lorem Ipsum</p>
                                         <img class="image-fluid" src="images/brush2.png">
                                         <img class="image-fluid" src="images/trending6.png">

                                     </div>

                            </div>
                      </div>

                      <div class="col-4 ">
                             <div class="main-trending-searches">
                                     <p>Lorem Ipsum</p>
                                     <img class="image-fluid" src="images/brush2.png">
                                     <img class="image-fluid" src="images/maintrending.png">

                            </div>
                      </div>


               </div>
        </div>

     <!-- -------------------------------------------------------------------------------------------------------- -->

        <div class="container">
              <div class="row padding new-car-review">

                    <div class="col-12 new-car-reviews-title">
                           <p><span>new car reviews</span></p>
                    </div>


                    <div class="new-car-review-body">
                          <div>
                               <img class="image-fluid" src="images/new1.jpeg">







                               <h2>lorem ipsum</h2>
                               <p>It is a long established fact that a reader will be
                               distracted by the readable content of ....</p>
                          </div>

                           <div>
                               <img class="image-fluid" src="images/new2.jpeg">






                               <h2>lorem ipsum</h2>
                               <p>It is a long established fact that a reader will be
                               distracted by the readable content of ....</p>
                          </div>

                           <div>
                               <img class="image-fluid" src="images/new3.jpeg">








                               <h2>lorem ipsum</h2>
                               <p>It is a long established fact that a reader will be
                               distracted by the readable content of ....</p>
                          </div>



                           <div>
                               <img class="image-fluid" src="images/new4.jpeg">





                               <h2>lorem ipsum</h2>
                               <p>It is a long established fact that a reader will be
                               distracted by the readable content of ....</p>
                          </div>

                           <div>
                               <img class="image-fluid" src="images/new5.jpeg">



                               <span></span>
                               <h2>lorem ipsum</h2>
                               <p>It is a long established fact that a reader will be
                               distracted by the readable content of ....</p>
                          </div>

                           <div>
                               <img class="image-fluid" src="images/new6.jpeg">



                               <h2>lorem ipsum</h2>
                               <p>It is a long established fact that a reader will be
                               distracted by the readable content of ....</p>
                          </div>

                          <div>
                              <img class="image-fluid" src="images/new7.jpeg">


                              <h2>lorem ipsum</h2>
                              <p>It is a long established fact that a reader will be
                              distracted by the readable content of ....</p>
                         </div>

                         <div>
                             <img class="image-fluid" src="images/new8.jpeg">

                             <h2>lorem ipsum</h2>
                             <p>It is a long established fact that a reader will be
                             distracted by the readable content of ....</p>
                        </div>

                      </div>
              </div>
        </div>

     <!-- -------------------------------------------------------------------------------------------------------- -->

        <div class="container">
               <div class="row padding research-car-model">

                    <div class="col-12 research-car-model-title">
                           <p><span>Research Car Models</span></p>
                    </div>


                    <div class="col-12 research-car-model-body">
                            <div class="col-3">
                                <p>sedan<br /><a href="#">more details</a></p>
                            </div>

                            <div class="col-3">
                                <p >coupe<br /><a href="#">more details</a></p>
                            </div>

                            <div class="col-3">
                                <p>SUV/crossover<br /><a href="#">more details</a></p>
                            </div>

                            <div class="col-3">
                                <p>wagon/hatchback<br /><a href="#">more details</a></p>
                            </div>

                            <div class="col-3">
                                <p>green car/hybrid<br /><a href="#">more details</a></p>
                            </div>

                            <div class="col-3">
                                <p>convertible<br /><a href="#">more details</a></p>
                            </div>

                            <div class="col-3">
                                <p>sports car<br /><a href="#">more details</a></p>

                            </div>

                            <div class="col-3">
                                <p>pickup truck<br /><a href="#">more details</a></p>

                            </div>

                            <div class="col-3">
                                <p>minivan/van <br /><a href="#">more details</a></p>
                            </div>

                            <div class="col-3">
                                <p>luxury car<br /><a href="#">more details</a></p>
                            </div>

                            <div class="col-3">
                                <p>certified pre-owned<br /><a href="#">more details</a></p>
                            </div>

                    </div>

               </div>
        </div>

     <!-- -------------------------------------------------------------------------------------------------------- -->

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

        <!-- my jsvascript file -->
        <script src=" <?php echo asset('js/style.js') ?> "></script>
    </body>
</html>
