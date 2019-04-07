       
      @extends('files.mainStructure')


      @section('title')
        Car Store
      @endsection
        
      

        <!-- ---------------------------------------------------------------------------------------------------------- -->
      @section('content')
       
              <div class="container-fluid padding">
                <div class="row" style="overflow: hidden;">
                     <div class="col-1" style="max-width: 5.333%;"></div>
                     <div class="main-header col-10">
                            <img class="image-fluid brush" src="images/brush.png">
                            <img class="image-fluid car-header" src="images/car1.png">
                            <p class="logo">CAR <span style="color:#B71C1C">STORE</span></p>
                            <ul class="heade-nav">
                                   <li><a href="{{ route('car.sale') }}">car for sale</a></li>
                                   <li><a href="{{ route('sell.car') }}">sell your car</a></li>
                                   <li><a href="{{ route('service.repair') }}">services & repair</a></li>
                                   <li><a href="{{ route('video.reviewws') }}">videos & reviews</a></li>
                            </ul>

                            <div class="social wow fadeInUp" data-wow-offset="0"  data-wow-duration="2s" data-wow-delay="1s">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-tumblr"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>

                                </ul>
                            </div>

                            <p class="slide-word wow fadeIn" data-wow-offset="2"  data-wow-duration="2s" data-wow-delay="1s">find your </p>
                            <p class="slide-word wow fadeInUp" data-wow-offset="-300"  data-wow-duration="2s" data-wow-delay="1s" style="padding-top: 0;width: 605px;"> next match</p>
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
                         <span style="text-decoration: underline;">top </span><br>
                         <span style="margin-left: 384px;line-height: 16px;">view</span>
                   </div>

                   {{ $i = 1 }}
@foreach($getCars['topView']->take(2) as $car)

                   <div class="col-12 photo{{$i}}-p">
                         <a href="{{ route('car.show' , $car->id) }}">
                            <img class="image-fluid" src="{{ asset($car->image) }}">
                        </a>
                        <a href="{{ route('car.show' , $car->id) }}">
                           <h2 class="title">{{ $car->name }}</h2>
                        </a>
                         <p class="body">{{ $car->description }}</p>
                   </div>
  {{ $i = $i+ 1}}
  @endforeach

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
  @foreach($getCars['newCars']->take(8) as $newCar)
                          <div>
                               <img class="image-fluid" src="{{ asset($newCar->image) }}">
                               <h2>
                                   <a href="{{ route('car.show' , $newCar->id) }}">
                                      {{ $newCar->name }} 
                                   </a>
                              </h2>
                          </div>   
                          
  @endforeach                      

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

                      @foreach($getCars['models'] as $model)
                            <div class="col-3">
                                <p>
                                  {{ $model->name }}<br />
                                  <a href="{{ route('model.show' , $model->id) }}">more details</a>
                                </p>
                            </div>
                      
                      @endforeach
                            

                    </div>

               </div>
        </div>

        @endsection

      
     <!-- -------------------------------------------------------------------------------------------------------- -->
        

           
     
      