@extends('dashboard.adminfiles.adminstructure')

@section('title','setting')

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
                            <h2 class="pageheader-title">Setting </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Setting</a></li>
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
                        @if($errors->any())                           
                                @if($errors->has('cr-password'))
                                  <?php $cr = ' has-error'; ?>
                                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         the current password is required  
                                  </div>
                                @elseif($errors->has('nw-password'))
                                   <?php $nw = ' has-error'; ?>
                                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         the new password is required  
                                   </div>
                                
                                @elseif ($errors->has('cn-password'))
                                    <?php $cn = ' has-error'; ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                         the confirmed password is required  
                                   </div>
                                @endif

                                
                               
                        @endif
                              
                          
                       </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            
                            @if(Session::has('success-setting'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{ session('success-setting') }}
                              </div>
                            @endif
                            
                            @if(Session::has('error-setting'))
                               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  {{ session('error-setting') }}
                               </div>
                            @endif


                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Update Password</h5>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{ route('updatepass') }}" method="POST" novalidate>
                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12{{ isset($cr) ? $cr : '' ? ' has-error' : '' }} ">
                                                <input type="password" class="form-control" id="cr-pass" placeholder="current password" name="cr-password" required>

                                                <span id="chek-pass" style="display: none;position: relative;top: -11px;font-size: 12px;padding-left: 10px; transition: all .5s;"></span>

                                            
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12{{ isset($nw) ? $nw : '' }} ">
                                                <input type="password" class="form-control" id="nw-pass" placeholder="new password" name="nw-password" required>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12{{ isset($cn) ? $cn : '' ? ' has-error' : '' }} ">
                                                <input type="password" class="form-control" id="cn-pass" placeholder="confirm password" name="cn-password" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit" style="background-color: #F57F17; border: 1px solid #F57F17">       Change Password
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
         $(document).ready(function(){
                
                    $('#nw-pass').click(function(){
                          
                          var current_pass = $('#cr-pass').val();

                          $.ajax({

                               type:'get',
                               url:'/dashboard/checkpass',
                               data:{current_pass:current_pass},
                               success:function(resp){
                                   if(resp == "nothing")
                                   {
                                     $('#chek-pass').fadeOut();

                                   }else if(resp == 'false')
                                   {
                                    $('#chek-pass').html("<font color='red'>current password is wrong</font>").fadeIn();
                                   }else
                                   {
                                    $('#chek-pass').html("<font color='green'>current password is correct</font>").fadeIn();
                                   }
                               },error:function(){
                                  alert('error');
                               }

                          });

                    });
                
                

         });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    // (function() {
    //     'use strict';
    //     window.addEventListener('load', function() {
    //         // Fetch all the forms we want to apply custom Bootstrap validation styles to
    //         var forms = document.getElementsByClassName('needs-validation');
    //         // Loop over them and prevent submission
    //         var validation = Array.prototype.filter.call(forms, function(form) {
    //             form.addEventListener('submit', function(event) {
    //                 if (form.checkValidity() === false) {
    //                     event.preventDefault();
    //                     event.stopPropagation();
    //                 }
    //                 form.classList.add('was-validated');
    //             }, false);
    //         });
    //     }, false);
    // })();
    </script>

@endsection