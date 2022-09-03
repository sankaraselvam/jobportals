<?php
if (!isset($seo)) {
    $seo = (object) array('seo_title' => $siteSetting->site_name, 'seo_description' => $siteSetting->site_name, 'seo_keywords' => $siteSetting->site_name, 'seo_other' => '');
}
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="{{ (session('localeDir', 'ltr'))}}" dir="{{ (session('localeDir', 'ltr'))}}">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $seo->seo_title }}</title>
<meta name="Description" content="{!! $seo->seo_description !!}">
<meta name="Keywords" content="{!! $seo->seo_keywords !!}">
{!! $seo->seo_other !!}
    <!-- Favicon -->
    <link href="{{asset('/')}}images/favicon.jpg" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="{{asset('/')}}css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/flaticon/flaticon.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}css/datetimepicker/datetimepicker.min.css" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="{{asset('/')}}css/select2/select2.css" />


    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="{{asset('/')}}css/owl-carousel/owl.carousel.min.css" />

    <!-- Template Style -->
    <link rel="stylesheet" href="{{asset('/')}}css/style.css" />
	@stack('styles')
</head>
<body>
@yield('content') 



    <!--================================= Signin Modal Popup -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h4 class="mb-0 text-center">Login to Your Account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login-register">
                        <fieldset>
                            <legend class="px-2">Choose your Account Type</legend>
                            <ul class="nav nav-tabs nav-tabs-border d-flex" role="tablist">
                            <?php $c_or_e = old('candidate_or_employer', 'candidate');	?>  
                                    <li class="nav-item me-4 {{($c_or_e == 'candidate')? 'active':''}}">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#candidate" role="tab" aria-selected="false">
                                        <div class="d-flex">
                                            <div class="tab-icon">
                                                <i class="flaticon-users"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{__('Candidate')}}</h6>
                                                <p class="mb-0">Log in as Candidate</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item {{($c_or_e == 'employer')? 'active':''}}">
                                    <a class="nav-link" data-bs-toggle="tab" href="#employer" role="tab" aria-selected="false">
                                        <div class="d-flex">
                                            <div class="tab-icon">
                                                <i class="flaticon-suitcase"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{__('Employer')}}</h6>
                                                <p class="mb-0">Log in as Employer</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </fieldset>
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                <input type="hidden" name="candidate_or_employer" value="candidate" />                         
                                    <div class="row">
                                        <div class="form-group col-12 mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="form-label" for="Email2">Username / Email Address:</label>
                                            <input id="email" type="email" class="form-control" name="email"   value="{{ old('email') }}" required autofocus   placeholder="{{__('Email Address')}}">
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>                                       

                                        <div class="form-group col-12 mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label class="form-label" for="password2">Password*</label>
                                            <input id="password" type="password" class="form-control" name="password"
                                            value="" required placeholder="{{__('Password')}}">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <input type="submit" class="btn btn-primary d-grid" value="{{__('Login')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ms-md-3 mt-3 mt-md-0 forgot-pass">
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                                <p class="mt-1">Don't have account? <a href="{{route('register')}}">Sign Up here</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="mt-4">
                            <fieldset>
                                <legend class="px-2">Login with Social</legend>
                                <div class="social-login">
                                    <ul class="list-unstyled d-flex mb-0">
                                        <li class="facebook text-center">
                                            <a href="{{ url('login/jobseeker/facebook')}}"> <i class="fab fa-facebook-f me-3 me-md-4"></i>Login with Facebook</a>
                                        </li>
                                        <li class="twitter text-center">
                                            <a href="{{ url('login/jobseeker/google')}}"> <i class="fab fa-google me-3 me-md-4"></i>Login with Google</a>
                                        </li>
                                        <!--<li class="google text-center">
                                            <a href="#"> <i class="fab fa-twitter me-3 me-md-4"></i>Login with Twitter</a>
                                        </li>

                                        <li class="linkedin text-center">
                                            <a href="#"> <i class="fab fa-linkedin-in me-3 me-md-4"></i>Login with Linkedin</a>
                                        </li>-->
                                    </ul>
                                </div>
                            </fieldset>
                        </div>
                            </div>
                            <div class="tab-pane fade" id="employer" role="tabpanel">
                                <form class="mt-4" method="POST" action="{{ route('company.login') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="candidate_or_employer" value="employer" />

                                    <div class="row">
                                        <div class="form-group col-12 mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="form-label" for="Email2">Username / Email Address:</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                                             @if ($errors->has('email'))
                                             <span class="help-block">
                                                 <strong>{{ $errors->first('email') }}</strong>
                                             </span>
                                             @endif
                                        </div>
                                        <div class="form-group col-12 mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label class="form-label" for="password2">Password*</label>
                                            <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <input type="submit" class="btn btn-primary d-grid" value="{{__('Login')}}">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ms-md-3 mt-3 mt-md-0">
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" value="" id="Remember-02">
                                                    <label class="form-check-label" for="Remember-02">Remember Password</label>
                                                </div>
                                                <p class="mt-1">Don't have account? <a href="{{route('register')}}">Sign Up here</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================================= Signin Modal Popup -->

<!-- JS Global Compulsory (Do not remove)-->
    <script src="{{asset('/')}}js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('/')}}js/popper/popper.min.js"></script>
    <script src="{{asset('/')}}js/bootstrap/bootstrap.min.js"></script>

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="{{asset('/')}}js/jquery.appear.js"></script>
    <script src="{{asset('/')}}js/counter/jquery.countTo.js"></script>
    <script src="{{asset('/')}}js/owl-carousel/owl-carousel.min.js"></script>
    <script src="{{asset('/')}}js/select2/select2.full.js"></script>

    <script src="{{asset('/')}}js/datetimepicker/moment.min.js"></script>
    <script src="{{asset('/')}}js/datetimepicker/datetimepicker.min.js"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="{{asset('/')}}js/custom.js"></script>

{!! NoCaptcha::renderJs() !!}
@stack('scripts') 
<script type="text/JavaScript">
	$(document).ready(function(){
	$(document).scrollTo('.has-error', 2000);
	});
	function showProcessingForm(btn_id){		
	$("#"+btn_id).val( 'Processing .....' );
	$("#"+btn_id).attr('disabled','disabled');		
	}
</script>
</body>
</html>