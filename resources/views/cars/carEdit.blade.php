@extends('dashboard.adminfiles.adminstructure')

@section('title' , 'carEdit')
@section('style')
  <style type="text/css">
      

       .has-error input{
          border:1px solid #B71C1C;
       }
       .help-block{
        color: #B71C1C;
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
                            <h2 class="pageheader-title">Edit Car</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item">Cars</li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Car</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->

                <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Edit Car</h5>
                                <div class="card-body">
                                    <form class="form-horizontal" data-parsley-validate="" method="POST" action="{{ route('car.update' , $cars->id) }}" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PUT">
                                        {{ csrf_field() }}

                                        <div class="form-group row{{ $errors->has('name') ? '           has-error' : '' }}">
                                            <label for="name" class="col-3 col-lg-2 col-form-label text-right">Name</label>

                                            <div class="col-9 col-lg-10">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ $cars->name }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row{{ $errors->has('description') ? '           has-error' : '' }}">
                                            <label for="description" class="col-3 col-lg-2 col-form-label text-right">Description</label>

                                            <div class="col-9 col-lg-10">
                                                <textarea id="description" class="form-control" name="description" required>{{ $cars->description }}</textarea>

                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row{{ $errors->has('produced') ? '           has-error' : '' }}">
                                            <label for="produced" class="col-3 col-lg-2 col-form-label text-right">Produced</label>

                                            <div class="col-9 col-lg-10">
                                                <input id="produced" type="date" class="form-control" name="produced" value="{{ $cars->produced }}" required>

                                                @if ($errors->has('produced'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('produced') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row{{ $errors->has('model') ? '           has-error' : '' }}">
                                            <label for="model" class="col-3 col-lg-2 col-form-label text-right">Model</label>

                                            <div class="col-9 col-lg-10">
                                                <select id="model" type="text" class="form-control" name="model" required>
                                                    @foreach($models as $model)
                                                       <option value="{{ $model->id }}">
                                                        {{ $model->name }}
                                                       </option>
                                                    @endforeach
                                                </select> 
                                                @if ($errors->has('model'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('model') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row{{ $errors->has('mark') ? '           has-error' : '' }}">
                                            <label for="mark" class="col-3 col-lg-2 col-form-label text-right">Mark</label>

                                            <div class="col-9 col-lg-10">
                                                <input id="mark" type="text" class="form-control" name="mark" value="{{ $cars->mark }}" required>

                                                @if ($errors->has('mark'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('mark') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row{{ $errors->has('price') ? '           has-error' : '' }}">
                                            <label for="price" class="col-3 col-lg-2 col-form-label text-right">Price</label>

                                            <div class="col-9 col-lg-10">
                                                <input id="price" type="text" class="form-control" name="price" value="{{ $cars->price }}" required>

                                                @if ($errors->has('price'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('price') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                         <div class="form-group row{{ $errors->has('image') ? '           has-error' : '' }}">
                                            <label for="image" class="col-3 col-lg-2 col-form-label text-right">Image</label>

                                            <div class="col-9 col-lg-10">
                                                <input id="image" type="file" class="form-control" name="image" required>

                                                @if ($errors->has('image'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('image') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-12 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-brand">
                                                        Edit Car
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                 </div>
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


@endsection

@section('js')

    <script src="{{ asset('js/backend-js/parsley/parsley.js') }}"></script>
    <script>
    $('#form').parsley();
    </script>
     <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>

@endsection


          
