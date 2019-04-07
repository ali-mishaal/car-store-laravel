@extends('dashboard.adminfiles.adminstructure')

@section('title','models')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/backend-css/datatables/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('css/backend-css/datatables/buttons.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('css/backend-css/datatables/select.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('css/backend-css/datatables/fixedHeader.bootstrap4.css') }}">

  <style type="text/css">
      

  </style>
@endsection

@section('content')


    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
   
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Models</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item">Models</li>
                                        <li class="breadcrumb-item active" aria-current="page">View Models</li>
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
                    <!-- basic table  -->
                    <!-- ============================================================== -->


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        @if(Session::has('msg'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{ session('msg') }}
                          </div>
                        @endif


                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">All Models Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Details</th>
                                                <th>Parent Model</th>
                                                <th>Created</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                           @foreach($models as $model)
                          
                                              <tr>
                                                  <td>{{ $model->name }}</td>
                                                  <td style="width: 35%">{{ $model->details }}</td>
                                                  <td>
                                                      @if($model->parent_id == 0)
                                                         No Parent
                                                      @else

            {{ $query = DB::table('carmodels')->where('id', '=', $model->parent_id)->first()->name }}

                                                      @endif
                                                  </td>
                                                  <td><?php 
                                                   $d=strtotime($model->created_at) ;
                                                   echo date("d-m-Y", $d); ?></td></td>
                                                  <td>
                                                      <a href="{{ route('model.edit', $model->id) }}" class="btn btn-success active">Edit</a>

                                                      


                                                          <button class="btn btn-danger active" data-target="#exampleModal" data-toggle="modal" data-modelid="{{ $model->id }}">DELETE</button>
                                                                
                                                     
                                                  </td>
                                              </tr>
                                           
                                                  
                                           @endforeach  
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Details</th>
                                                <th>Parent Model</th>
                                                <th>Created</th>
                                                <th></th>
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
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer" style="position: fixed; bottom: 0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12">
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
  
    <!-- ============================================================== -->
    <!-- end main wrapper -->

       <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Model</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </a>
                                </div>
                                <div class="modal-body">

                                      <form method="post" action="{{ route('model.destroy' , 'test')}}" style="display: inline-block;" id="del-cat">

                                          <input type="hidden" name="_method" value="DELETE" />
                                                         
                                          {{ csrf_field() }}     
                                        
                                     <h5 style="font-weight: 600;font-family: sans-serif;">
                                      are you sure to <span style="color: red">delete</span> this record ?
                                     </h5>
                                    <input type="hidden" name="model_id" id="model_id" value="">
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">no,cancel</a>
                                    <button class="btn btn-warning active">yes,delete</button>
                                    
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    

@endsection



@section('js')

    <script src="{{ asset('js/backend-js/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/backend-js/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/backend-js/datatables/data-table.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
                  
            $('#exampleModal').on('show.bs.modal' , function(event){

                var button = $(event.relatedTarget)
                var model_id = button.data('modelid') 
                var modal = $(this)

                modal.find('.modal-body #model_id') .val(model_id);
            });
 
        });
    </script>


@endsection
     

           
     
      