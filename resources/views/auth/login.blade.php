@extends('layouts.app')

@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end -->

<section class="space-ptb">
  <div class="container">
    <div class="row justify-content-center">
    @include('flash::message')
      <div class="col-xl-8 col-lg-10 col-md-10">
        <div class="login-register" style="border:1px solid #ccc;padding:20px; box-shadow: 20px 20px 50px grey;">
         <div class="section-title">
          <h4 class="text-center">Login to your Account</h4>
         </div>
          <fieldset>
            <legend class="px-2">Choose your Account Type</legend>
            <ul class="nav nav-tabs nav-tabs-border d-flex" role="tablist">
                <?php $c_or_e = old('candidate_or_employer', 'candidate');	?>
                <li class="nav-item me-4">
                <a class="nav-link active {{($c_or_e == 'candidate')? 'active':''}}"  data-bs-toggle="tab" href="#candidate" role="tab" >
                  <div class="d-flex">
                    <div class="tab-icon">
                      <i class="flaticon-users"></i>
                    </div>
                    <div class="ms-3">
                      <h6 class="mb-0">{{__('Candidate')}}</h6>
                      <p class="mb-0">{{__('Log in as Candidate')}}</p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="nav-item ms-auto">
                <a class="nav-link {{($c_or_e == 'employer')? 'active':''}}" data-bs-toggle="tab" href="#employer" role="tab">
                  <div class="d-flex">
                    <div class="tab-icon">
                      <i class="flaticon-suitcase"></i>
                    </div>
                    <div class="ms-3">
                      <h6 class="mb-0">{{__('Employer')}}</h6>
                      <p class="mb-0">{{__('Log in as Employer')}}</p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </fieldset>
          <div class="tab-content">
            <div class="tab-pane active {{($c_or_e == 'candidate')? 'active in':''}}" id="candidate" role="tabpanel">
                <form class="mt-4" method="POST" action="{{ route('login') }}">
                   {{ csrf_field() }} 
                   <input type="hidden" name="candidate_or_employer" value="candidate" />               
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label {{ $errors->has('email') ? ' has-error' : '' }}" for="Username">Username / Email Address: *</label>
                            <input id="email" type="email" class="form-control" name="email"   value="{{ old('email') }}" required autofocus  placeholder="{{__('Email Address')}}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif         
                        </div>                  
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Password *</label>
                            <input id="password" type="password" class="form-control" name="password"  value="" required placeholder="{{__('Password')}}">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                            <input type="submit" class="btn btn btn-primary d-block" value="{{__('Login')}}"> 
                      </div>
                      <div class="col-md-6 mt-2">
                        <p><a href="{{ route('password.request') }}"> Forgot Password?</a></p>
                        <p>Don't have account? <a href="{{route('register')}}">  Sign Up here</a></p>
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
            <div class="tab-pane fade {{($c_or_e == 'employer')? 'active in':''}}" id="employer" role="tabpanel">                
              <form class="mt-4" method="POST" action="{{ route('company.login') }}">
                    {{ csrf_field() }}
                                <input type="hidden" name="candidate_or_employer" value="employer" />
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label {{ $errors->has('email') ? ' has-error' : '' }}" for="Username">Username / Email Address: *</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus  placeholder="{{__('Email Address')}}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif        
                    </div>                  
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Password *</label>
                        <input id="password" type="password" class="form-control" name="password"  value="" required placeholder="{{__('Password')}}">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                        <input type="submit" class="btn btn btn-primary d-block" value="{{__('Login')}}"> 
                  </div>
                  <div class="col-md-6 mt-2">
                    <p><a href="{{ route('password.request') }}"> Forgot Password?</a></p>
                    <p>Don't have account? <a href="{{route('register')}}">  Sign Up here</a></p>
                  </div>
                </div>
              </form>
              <div class="mt-4">
                    <fieldset>
                    <legend class="px-2">Login or Sign up with</legend>
                    <div class="social-login">
                        <ul class="list-unstyled d-flex mb-0">
                        <li class="facebook text-center">
                            <a href="{{ url('login/employer/facebook')}}"> <i class="fab fa-facebook-f me-4"></i>Login with Facebook</a>
                        </li>
                        <li class="twitter text-center">
                            <a href="{{ url('login/employer/google')}}"> <i class="fab fa-twitter me-4"></i>Login with Google</a>
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