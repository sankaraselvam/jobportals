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
                    <h2 class="text-primary">Login</h2>
                    <ol class="breadcrumb mb-0 p-0" style="float:right;">
                        <li class="breadcrumb-item"><a href=""> Home </a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Login </span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--================================= inner banner -->
<section class="space-ptb">
  <div class="container">
    <div class="row justify-content-center">    
      <div class="col-xl-8 col-lg-10 col-md-10">
        <div class="login-register" style="border:1px solid #ccc;padding:20px; box-shadow: 20px 20px 50px grey;">
         <div class="section-title">
          <h4 class="text-center">EMPLOYER LOGIN</h4>
         </div>
        
          <div class="tab-content">
            <div class="tab-pane active " id="candidate" role="tabpanel">
                <form class="mt-4" method="POST" action="">
                   <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="Username">Username / Email Address: *</label>
                            <input id="email" type="email" class="form-control" name="email"   value="" required autofocus  placeholder="{{__('Email Address')}}">                                  
                        </div>                  
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Password *</label>
                            <input id="password" type="password" class="form-control" name="password"  value="" required placeholder="Password">                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                                <input type="submit" class="btn btn btn-primary d-block" value="Login"> 
                        </div>
                        <div class="col-md-6 mt-2">
                            <p><a href=""> Forgot Password?</a></p>
                            <p>Don't have account? <a href="">  Sign Up here</a></p>
                        </div>
                    </div>
                </form>
                <div class="mt-4">
                    <fieldset>
                        <legend class="px-2">Login or Sign up with</legend>
                        <div class="social-login">
                            <ul class="list-unstyled d-flex mb-0">
                            <li class="facebook text-center">
                                <a href="{{ url('login/jobseeker/facebook')}}"> <i class="fab fa-facebook-f me-4"></i>Login with Facebook</a>
                            </li>
                            <li class="twitter text-center">
                                <a href="{{ url('login/jobseeker/google')}}"> <i class="fab fa-twitter me-4"></i>Login with Google</a>
                            </li>                 
                            </ul>
                        </div>
                    </fieldset>
                </div>
            </div>           
          </div>          
        </div>
      </div>
    </div>
  </div>
</section>
@include('includes.footer')
@endsection