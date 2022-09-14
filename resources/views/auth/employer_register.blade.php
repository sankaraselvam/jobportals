@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
   <!--================================= inner banner -->
   <div class="header-inner bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-primary">Register</h2>
                    <ol class="breadcrumb mb-0 p-0" style="float:right;">
                        <li class="breadcrumb-item"><a href=""> Home </a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Register </span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--================================= inner banner -->

    <!--================================= Register -->
    <section class="space-ptb" style="margin-top:-85px!important;">        
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-xl-8 col-lg-10 col-md-12" style="box-shadow: 10px 10px 10px 10px #ccc;
    padding: 25px;">
                    <div class="login-register">
                        <div class="section-title">
                            <h4 class="text-center">EMPLOYER REGISTRATION</h4>
                        </div> 
                            <form class="form-horizontal" method="POST" action="">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="Username">Full Name *</label>
                                              <input type="text" name="first_name" class="form-control" required="required" placeholder="Full Name" value="">                                            
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email Address *</label>
                                            <input type="email" name="email" class="form-control" required="required" placeholder="Email" value="">                                          
                  
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Password *</label>
                                            <input type="password" name="password" class="form-control" required="required" placeholder="Create a password for your account" value="">                                                                                 
                                           
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="password2">Confirm Password *</label>
                                            <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="Password Confirmation" value="">                                          
                                        </div>
                                        <div class="mb-3 col-12">
                                            <label class="form-label" for="phone">Phone:</label>                                            
                                            <input type="text" name="mobile_num" class="form-control" placeholder="mobile number" value="">                                           
                                            
                                        </div>

                                        <div class="mb-3 col-12">
                                            <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="1" name="terms_of_use" /> <a href=""> &nbsp; I accept Terms and Conditions</a> <span> and</span> <a href="">Privacy Policy</a> </a>                  
                                                                                            
                                            </div>
                                        </div>
                                    
                                  
                                        <div class="col-md-6">
                                          <input type="submit" class="btn btn-primary d-block" value="Register" style="width:100%;"> 
                                        </div>
                                        <div class="col-md-6 text-md-end mt-2 text-center">
                                            <p>Already registered? <a href=""> Sign in here</a></p>
                                        </div>
                                    </div>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!--================================= Register -->
@include('includes.footer')
@endsection 