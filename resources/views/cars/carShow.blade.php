@extends('layouts.app')

@section('title', $cars->name)

@section('style')

  <link rel="stylesheet" href="{{ asset('css/backend-css/datatables/dataTables.bootstrap4.css') }}">
  <link href="{{ asset('css/backend-css/owl-carousel/owl.carousel.css') }}">
 <link href="{{ asset('css/backend-css/owl-carousel/owl.theme.css') }}"> 
  <link rel="stylesheet" href="{{ asset('css/backend-css/datatables/buttons.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('css/backend-css/datatables/select.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('css/backend-css/datatables/fixedHeader.bootstrap4.css') }}">
 

  <style type="text/css">
      .car-title
      {
        position: absolute;
        top: 5%;
        left: 50%;
        transform: translateX(-50%);
      }

      .car-title h2
      {
        text-transform: capitalize;
        border: 1px solid;
      }

      .car-des
      {
        margin: 160px 0 40px 45px;
        color: rgba(255,255,255,.7);
        font-size: 15px;
        width: 350px;
      }

      .car-mp{
        color: rgba(255,255,255,.7);
        margin: 0px 0 0 45px;
        display: block;
        font-weight: 500;
      }

      .car-images-sides
      {
        position: absolute;
        top: 36%;
        right: 39%
      }

      .img{
        display: block;
        margin-bottom: 5px;
      }

        #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }

  </style>
@endsection

@section('content')
    
    <!-- ============================================================== -->
    <!-- main image -->
    <!-- ============================================================== --> 
<!--     <img src="{{ asset($cars->image) }}" style="position: absolute; width: 100%">
 -->   
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
   
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
    <div class="container padding">
            <div class="row latest-stories" style="margin: 66px 0;">
                  <div class="car-title"><h2>{{ $cars->name }}</h2></div>
                  <div class="col-6">
                     <p class="car-des">{{ $cars->description }}</p>
                     <span class="car-mp">Model : {{ $cars->carmodel->name }}</span>
                     <span class="car-mp">Mark : {{ $cars->mark }}</span> 
                     <span class="car-mp">Price : {{ $cars->price }} EGP</span>
                     <a href="#" class="btn btn-warning btn-lg active" role="button" aria-pressed="true" style="margin: 31px 0 0 396px;font-size: 16px;">Add Chart</a>
                  </div>
                  <div class="col-6">   
                       <img src="{{ asset($cars->image) }}" width="300px" height="350px" style="margin: 118px 0 118px 118px;" id="main-img">
                  </div>
                  <div class="car-images-sides">
                    <img class="img" src="{{ asset($cars->image) }}" width="60px" height="60px" style="cursor: pointer;">
                    @foreach ( $cars->carimg as $images)
                      <img class="img" src="{{ asset($images->image) }}" width="60px" height="60px" style="cursor: pointer;">
                    @endforeach
                  </div>
                      
                       
                   
 

           </div>
    </div>

     <div class="container padding">
            <div class="row" style="margin: 66px 0; position: relative;">
                  <div class="car-title"><h2>Cars From The Same Model</h2></div>
           </div>
     </div>

  <div id="demo">
        <div class="container">
          <div class="row">
            <div class="span12">

              <div id="owl-demo" class="owl-carousel">
                @foreach($other_cars as $other)
                <div class="item"><img src="{{ asset($other->image) }}" alt="Owl Image"></div>
                @endforeach
              </div>
              
            </div>
          </div>
        </div>

  </div>   
  
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    

@endsection



@section('js')
   
    <script src="{{ asset('js/backend-js/datatables/buttons.bootstrap4.min.js') }}"></script>
     <script src="{{ asset('js/backend-js/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/backend-js/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/backend-js/datatables/data-table.js') }}"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){

          $('.img').click(function(){
             
             var image = $(this).attr('src');
             $('#main-img').attr('src' , image);
          });

          $("#owl-demo").owlCarousel({
            alert('dd');
            autoPlay: 3000,
            items : 4,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]
          });
      });
    </script>

@endsection
     

           
     
      