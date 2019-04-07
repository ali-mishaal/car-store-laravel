@extends('dashboard.adminfiles.adminstructure')

@section('title','AddImages')

@section('style')
  <style type="text/css">
       form input{
         margin-bottom: 10px;
       }

       .has-error input{
          border:1px solid #B71C1C;
       }
       .help-block{
        color: #B71C1C;
       }

       table td , table th
       {
        text-align: center;
       }
  </style>
@endsection

@section('content')



<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">

                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Add Images </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('car.index') }}" class="breadcrumb-link">cars</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Add Images</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
            
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- update password form -->
                        <!-- ============================================================== -->


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            
                            @if(Session::has('success'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{ session('success') }}
                              </div>
                            @endif

                            @if(Session::has('msg'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{ session('msg') }}
                              </div>
                            @endif


                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Add images of {{ $cars->name }}</h5>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{ route('storeImages' , $cars->id) }}" method="POST" novalidate enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12{{ isset($cr) ? $cr : '' ? ' has-error' : '' }} ">
                                                <input type="file" class="form-control" id="cr-pass" name="add-images[]" required multiple="multiple">

                                            
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit" style="background-color: #F57F17; border: 1px solid #F57F17">      Add Images
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end update password  form -->
                        <!-- ============================================================== -->
                    </div>

                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">All images of {{$cars->name }}</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Car</th>
                                                <th>image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
@foreach ($cars->carimg as $images)
          <tr>
              
              <td><a href="{{ route('car.index') }}"> {{ $images->car->name }}</a></td>
              <td><img src="{{ asset($images->image) }} " width="100px" height="100px"></td>
           

                  
              <td>
                      <button class="btn btn-success active" data-target="#editModal" data-toggle="modal" data-imageid="{{ $images->id }}">Edit</button>

                      <button class="btn btn-danger active" data-target="#deleteModal" data-toggle="modal" data-imageid="{{ $images->id }}">DELETE</button>
                            
                
              </td>
            
          </tr>
@endforeach
       
              
      
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Car</th>
                                                <th>image</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
              </div>
           
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer" style="position: fixed; bottom: 0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
</div>


    <!-- Modal of edit  -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eit Image</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                </div>
                <div class="modal-body">

                      <form method="post" action="{{ route('edit.images')}}" style="display: inline-block;width: 100%;" id="del-cat" enctype="multipart/form-data">
                                         
                          {{ csrf_field() }}     
                    
                    <input type="file" class="form-control" id="image-file" name="add-images" required>
                    <input type="hidden" name="image_id" id="image_id" value="">
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">No,Cancel</a>
                    <button class="btn btn-warning active">Edit</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal of delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Image</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                </div>
                <div class="modal-body">

                      <form method="post" action="{{ route('deleteImages')}}" style="display: inline-block;" id="del-cat">
                                         
                          {{ csrf_field() }}     
                        
                     <h5 style="font-weight: 600;font-family: sans-serif;">
                      are you sure to <span style="color: red">delete</span> this record ?
                     </h5>
                    <input type="hidden" name="image_id" id="image_id" value="">
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">No,Cancel</a>
                    <button class="btn btn-warning active">Delete</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
 
        
@endsection



@section('js')

    <script src="{{ asset('js/backend-js/parsley/parsley.js') }}"></script>
    <script>
    $('#form').parsley();
    </script>
     <script type="text/javascript">
        $(document).ready(function(){
                  
             $('#deleteModal').on('show.bs.modal' , function(event){

                var button = $(event.relatedTarget)
                var image_id = button.data('imageid') 
                var modal = $(this)

                modal.find('.modal-body #image_id') .val(image_id);
            });

            $('#editModal').on('show.bs.modal' , function(event){

                var button = $(event.relatedTarget)
                var image_id = button.data('imageid') 
                var modal = $(this)

                modal.find('.modal-body #image_id') .val(image_id);
            });
 
        });
    </script>

@endsection