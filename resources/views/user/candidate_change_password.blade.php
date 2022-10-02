
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

    <!--=================================    inner banner -->
    <div class="header-inner" style="background: #009befd6;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="candidates-user-info">
                        <div class="jobber-user-info">
                            <div class="profile-avatar">
                                @if ($user->image !='')
                                    <img class="img-fluid " src="{{asset('/')}}user_images/{{$user->image}}" alt="">
                                @else
                                    <img class="img-fluid " src="{{asset('/')}}images/avatar/04.jpg" alt=""> 
                                @endif
                                <i class="fas fa-pencil-alt" data-bs-toggle="modal" data-bs-target="#personal"></i>
                            </div>
                            <div class="profile-avatar-info ms-4">
                                <h4 class="mt-4" style="color: #fff;text-transform: capitalize;">{{$user->getName()}}</h4>
                                <p style="color: #fff;text-transform: capitalize;">PHP Developer at Dawn Info System</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @include('job.progress')
                    @include('user.profileDetails')
                </div>
            </div>
        </div>
    </div>
    <!--=================================    inner banner -->

    
     <!--=================================    Dashboard Nav -->
     <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sticky-top secondary-menu-sticky-top">
                        <div class="secondary-menu">
                            <ul class="list-unstyled mb-0">
                                <li><a href="{{route('home')}}">Dashboard</a></li>
                                <li><a href="{{ route('my.profile') }}">My Profile</a></li>
                                <li><a class="active" href="{{ route('candidate.change.password') }}">Change Password</a></li>
                                <li><a href="{{ route('my.job.applications') }}">Manage Jobs</a></li>
                                <li><a href="{{ route('my.favourite.jobs') }}">Saved Jobs</a></li>                                
                                <li><a href="{{route('my.messages')}}">My Message</a></li>
                                <li><a href="{{route('my.followings')}}">My Followings</a></li>
                                <li><a href="">Pricing Plan</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                  </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================    Dashboard Nav -->

   
    <!--================================= change Password -->
    <section  class="mt-5" style="margin-bottom:70px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
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
                            <div class="col-md-6 col-md-offset-4 mt-3">
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
            </div>
        </div>
    </section><br><br>
    <!--================================= Change Password -->

    @include('includes.footer')
    @endsection
    @push('scripts')
    @include('includes.immediate_available_btn')
    @endpush