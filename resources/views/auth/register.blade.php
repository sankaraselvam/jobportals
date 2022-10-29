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
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href=""> Home </a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Register </span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--================================= inner banner -->

    <!--================================= Register -->
    <section class="space-ptb">
        @include('flash::message')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-12">
                    <div class="login-register">
                        <div class="section-title">
                            <h4 class="text-center">Create Your Account</h4>
                        </div>
                        <fieldset>
                            <legend class="px-2">Choose your Account Type</legend>
                            <ul class="nav nav-tabs nav-tabs-border d-flex" role="tablist">
                            <?php  $c_or_e = old('candidate_or_employer', 'candidate');	?>                            
                              <li class=""><a data-toggle="tab" href="#employer" aria-expanded="false"></a></li>
                                <li class="nav-item me-4 {{($c_or_e == 'candidate')? 'active':''}}">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#candidate" role="tab">
                                        <div class="d-flex">
                                            <div class="tab-icon">
                                                <i class="flaticon-users"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{__('Candidate')}}</h6>
                                                <p class="mb-0">I want to discover companies.</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item ms-auto {{($c_or_e == 'employer')? 'active':''}}">
                                    <a class="nav-link" data-bs-toggle="tab" href="#employer" role="tab">
                                        <div class="d-flex">
                                            <div class="tab-icon">
                                                <i class="flaticon-suitcase"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{__('Employer')}}</h6>
                                                <p class="mb-0">I want to attract the best talent.</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </fieldset>
                        <div class="tab-content">
                            <div class="tab-pane {{($c_or_e == 'candidate')? 'active in':''}}" id="candidate" role="tabpanel">
                            <form class="form-horizontal" method="POST" action="{{ route('myregisave') }}">
                                  {{ csrf_field() }}
                                    <input type="hidden" name="candidate_or_employer" value="candidate" />
                                    <div class="row">
                                        <div class="mb-3 col-md-6 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                            <label class="form-label" for="Username">Full Name *</label>
                                              <input type="text" name="first_name" class="form-control" required="required" placeholder="{{__('Full Name')}}" value="{{old('first_name')}}">
                                              @if ($errors->has('first_name')) 
                                                <span class="help-block"> <strong>{{ $errors->first('first_name') }}</strong> </span>
                                              @endif 
                                            
                                        </div>
                                        <div class="mb-3 col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="form-label">Email Address *</label>
                                            <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">
                                            @if ($errors->has('email'))
                                            <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span>
                                            @endif 
                  
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Password *</label>
                                            <input type="password" name="password" class="form-control" required="required" placeholder="{{__('Create a password for your account')}}" value="">
                                            @if ($errors->has('password'))
                                            <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label class="form-label" for="password2">Confirm Password *</label>
                                            <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">
                                            @if ($errors->has('password_confirmation'))
                                            <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span>
                                            @endif 
                                        </div>
                                        <div class="mb-3 col-12 {{ $errors->has('mobile_num') ? ' has-error' : '' }}">
                                            <label class="form-label" for="phone">Phone:</label>                                            
                                            <input type="text" name="mobile_num" class="form-control" placeholder="{{__('mobile number')}}" value="{{old('mobile_num')}}">
                                            @if ($errors->has('mobile_number')) 
                                            <span class="help-block"> <strong>{{ $errors->first('mobile_number') }}</strong> </span> 
                                            @endif
                                        </div>

                                        <div class="mb-3 col-12 {{ $errors->has('terms_of_use') ? ' has-error' : '' }}">
                                            <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="1" name="terms_of_use" /> <a href="{{url('terms-of-use')}}"> &nbsp;{{__('I accept Terms and Conditions')}}</a> <span> and</span> <a href="">Privacy Policy</a> </a>                  
                                              @if ($errors->has('terms_of_use')) 
                                              <span class="help-block"> <strong>{{ $errors->first('terms_of_use') }}</strong> </span>
                                              @endif                                                
                                            </div>
                                        </div>
                                    
                                  
                                        <div class="col-md-6">
                                          <input type="submit" class="btn btn-primary d-block" value="{{__('Register')}}" style="width:100%;"> 
                                        </div>
                                        <div class="col-md-6 text-md-end mt-2 text-center">
                                            <p>Already registered? <a href="{{route('login')}}" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"> Sign in here</a></p>
                                        </div>
                                    </div>
                                </form>
                                <div class="mt-4">
                            <fieldset>
                                <legend class="px-2">Login or Sign up with</legend>
                                <div class="social-login">
                                    <ul class="list-unstyled d-flex mb-0">
                                        <li class="facebook text-center">
                                            <a href="#"> <i class="fab fa-facebook-f me-4"></i>Login with Facebook</a>
                                        </li>
                                        <li class="twitter text-center">
                                            <a href="#"> <i class="fab fa-google me-4"></i>Login with Google</a>
                                        </li> 
                                    </ul>
                                </div>
                            </fieldset>
                        </div>
                            </div>
                            <div class="tab-pane fade {{($c_or_e == 'employer')? 'active in':''}}" id="employer" role="tabpanel">
                                <form class="mt-4" method="POST" action="{{ route('employer.register') }}">
                                  {{ csrf_field() }}
                                    <input type="hidden" name="candidate_or_employer" value="candidate" />
                                    <div class="row">
                                        <div class="mb-3 col-md-6 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                            <label class="form-label" for="Username">Full Name *</label>
                                              <input type="text" name="first_name" class="form-control" required="required" placeholder="{{__('Full Name')}}" value="{{old('first_name')}}">
                                              @if ($errors->has('first_name')) 
                                                <span class="help-block"> <strong>{{ $errors->first('first_name') }}</strong> </span>
                                              @endif 
                                            
                                        </div>
                                        <div class="mb-3 col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="form-label">Email Address *</label>
                                            <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">
                                            @if ($errors->has('email'))
                                            <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span>
                                            @endif 
                  
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Password *</label>
                                            <input type="password" name="password" class="form-control" required="required" placeholder="{{__('Create a password for your account')}}" value="">
                                            @if ($errors->has('password'))
                                            <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label class="form-label" for="password2">Confirm Password *</label>
                                            <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">
                                            @if ($errors->has('password_confirmation'))
                                            <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span>
                                            @endif 
                                        </div>
                                        <div class="mb-3 col-12 {{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                                            <label class="form-label" for="phone">Phone:</label>                                            
                                            <input type="text" name="mobile_num" class="form-control" placeholder="{{__('Mobile Number')}}" value="{{old('mobile_num')}}">
                                            @if ($errors->has('middle_name')) 
                                            <span class="help-block"> <strong>{{ $errors->first('middle_name') }}</strong> </span> 
                                            @endif
                                        </div>

                                        <div class="mb-3 col-12 {{ $errors->has('terms_of_use') ? ' has-error' : '' }}">
                                            <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="1" name="terms_of_use" /> <a href="{{url('terms-of-use')}}"> &nbsp;{{__('I accept Terms and Conditions')}}</a> <span> and</span> <a href="">Privacy Policy</a> </a>                  
                                              @if ($errors->has('terms_of_use')) 
                                              <span class="help-block"> <strong>{{ $errors->first('terms_of_use') }}</strong> </span>
                                              @endif                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <input type="submit" class="btn btn-primary d-block" value="{{__('Register')}}" style="width:100%;"> 
                                        </div>
                                        <div class="col-md-6 text-md-end mt-2 text-center">
                                            <p>Already registered? <a href="{{route('login')}}" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"> Sign in here</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!--================================= Register -->
@include('includes.footer')
@endsection 