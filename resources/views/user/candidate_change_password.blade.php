
    @extends('layouts.app')

    @section('content') 
    <!-- Header start --> 
    @include('includes.header') 
    <!-- Header end --> 

    <style>
        .secondary-menu ul li {  
            padding-right: 8px!important;
        }
    
            .space-ptb {
                padding: 50px 0!important;
            }
            
            .zoom-in {
                animation: zoom-in-zoom-out 2s ease-in;
            }
            
            @keyframes zoom-in-zoom-out {
                0% {
                    transform: scale(0.25, 0.25);
                }
                100% {
                    transform: scale(1, 1);
                }
            }
            
            .notification {
                border-radius: 25px;
                background-color: red;
                width: auto;
                padding: 0 4px;
                line-height: 21px;
                height: 20px;
                position: absolute;
                color: #fff;
                right: 10px;
                top: 28px;
                font-size: 14px;
            }
            
            .fa-bell:before {
                content: "\f0f3";
                font-size: 20px;
            }
            
            .count {
                margin-left: 22%;
            }
            .progress .progress-barlow {
                height: 5px;
                background: red;
            }
            .progress .progress-barmedium {
                height: 5px;
                background: yellow;
            }
            .progress .progress-barhigh {
                height: 5px;
                background: green;
            }
        </style>

    <section class="banner bg-holder bg-overlay-black-30" style="background-image: url({{asset('/')}}images/bg/dashboardbg.png); padding: 40px 0 40px 0!important;"></section>


   
    <!--================================= change Password -->
    <section  class="mt-5" style="margin-bottom:70px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-dashboard-info-box">
                        <div class="section-title-02 mb-4">
                            <h4>Change Password</h4>
                        </div>
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <form class="row"  method="POST" action="{{ route('candidate.changepassword.store') }}"> 
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Current Password</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control" name="current-password">

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password">

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="col-md-4" style="margin-top: -2%;z-index: 1;">
                    <div class=" user-dashboard-info-box candidates-user-info zoom-in">
                        <div class="jobber-user-info">
                            <div class="profile-avatar">
                                @if ($user->image !='')
                                    <img class="img-fluid " src="{{asset('/')}}user_images/{{$user->image}}" alt="">
                                @else
                                    <img class="img-fluid " src="{{asset('/')}}images/avatar/04.jpg" alt=""> 
                                @endif                              
                            </div>
                            <div class="profile-avatar-info ms-4" style="margin-left: 2.6rem!important;">
                                <h6> Selvam</h6>
                            </div>
                        </div>
                        <p style="margin-left:5%;margin-top: -20px;"><span class="emp-title">PHP Developer </span> at <span> Dawn info system P Ltd</span></p>
                        <div class="progress">
                            @php
                                $level='';
                                @endphp
                            @if ($user->percentage <=  50)
                                @php
                                $level='low';
                                @endphp
                            @elseif($user->percentage >  50 && $user->percentage <=  75)
                                @php
                                $level='medium';
                                @endphp                            
                            @elseif($user->percentage >  75)
                                @php
                                $level='high';
                                @endphp                            
                            @endif
                            <div class="progress-bar{{ $level }}" role="progressbar" style="width:{{$user->percentage}}%" aria-valuenow="{{$user->percentage}}" aria-valuemin="0" aria-valuemax="{{$user->percentage}}">
                                <span class="progress-bar-number">{{$user->percentage}}%</span>
                                <span class="progress-bar-number1">Profile Strength (Excellent)</span>
                            </div>
                        </div>
                        <div class="candidates-required-skills ms-auto mt-sm-0 mt-3">
                            <a class="btn btn-primary" style="width:100%" href="#">UPDATE PROFILE</a>
                        </div>
                        <p style="font-size: 12px;color: #333;font-weight: 500;margin-top: 4%;">Profile Performance</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div style="box-shadow: 0 1px 1px 0 rgb(0 0 0 / 5%), 0 1px 2px 0 rgb(0 0 0 / 10%), 0 2px 1px -4px rgb(0 0 0 / 20%);padding: 5px;">
                                    <a href="">
                                        <span> 417 <br><small>Search Appearances</small></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="box-shadow: 0 1px 1px 0 rgb(0 0 0 / 5%), 0 1px 2px 0 rgb(0 0 0 / 10%), 0 2px 1px -4px rgb(0 0 0 / 20%);padding: 5px;">
                                    <a href="">
                                        <span> 417 <br><small>Search Appearances</small></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!--================================= Change Password -->

    @include('includes.footer')
    @endsection
    @push('scripts')
    @include('includes.immediate_available_btn')
    @endpush