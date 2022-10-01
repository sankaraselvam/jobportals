@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<style>
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
        
        .progress .progress-bar {
            height: 5px;
            background: #fff;
        }
        
        .progress .progress-bar-number1 {
            color: #fff;
        }
        
        .progress .progress-bar-number {
            color: #fff;
        }
        
        .progress {
            height: 5px!important;
            background-color: #ff0b0b;
        }
        
        .category-style-02 ul li {
            margin-bottom: 25px;
            display: block;
            padding-left: 7%;
        }
        
        .secondary-content {
            float: right;
            text-transform: uppercase;
        }
        
        .close {
            outline: medium none !important;
            color: #00c0ef;
            border-radius: 50px;
            background: #fff;
            margin: -50px;
            margin-top: -144px;
            border: 2px solid #dee2e6;
        }
        
        .modal-header {
            border-bottom: #fff!important;
        }
        
        h4 {
            font-size: 20px;
        }
        
        .radio-inline {
            margin-left: 10%;
        }
        
        .select2-container--open{
        z-index:9999999         
        }
        .user-dashboard-info-box
        {
            -webkit-box-shadow: 1px 1px 14px 0px rgba(0, 25, 53, 0.19);
            box-shadow: 1px 1px 14px 0px rgba(0, 25, 53, 0.19);"
        }
        .candidate-list .candidate-list-favourite-time {   
        flex: 0 0 105px!important;
        }
        .candidate-list {   
        border: 1px solid #eeeeee;
        margin-bottom:8px;
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
                                <img class="img-fluid " src="{{asset('/')}}images/avatar/04.jpg" alt="">                               
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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="candidates-skills">
                                <div class="candidates-skills-info">
                                    <span class="d-block" style="color: #fff;"><i class="fa fa-map-marker" aria-hidden="true"></i> <span style="margin-left: 3px;"> Chennai , India</span> </span>
                                    </span>
                                    <span class="d-block mt-2" style="color: #fff;"><i class="fa fa-suitcase" aria-hidden="true"></i> <span style="margin-left: 3px;">PHP Developer</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="candidates-skills">
                                <div class="candidates-skills-info">
                                    <span class="d-block" style="color: #fff;"><i class="fa fa-phone" aria-hidden="true" style="font-size:16px;color:#fff;transform: rotate(100deg);"></i> <span style="margin-left: 3px;">{{$user->mobile_num}}</span></span>
                                    <span class="d-block mt-2" style="color: #fff;"><i class="fa fa-envelope" aria-hidden="true" ></i> <span style="margin-left: 3px;">{{$user->email}}</span></span>
                                </div>

                            </div>
                        </div>

                    </div>

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
                                <li><a href="{{ route('candidate.change.password') }}">Change Password</a></li>
                                <li><a href="{{ route('my.job.applications') }}">Manage Jobs</a></li>
                                <li><a href="{{ route('my.favourite.jobs') }}">Saved Jobs</a></li>                                
                                <li><a class="active" href="{{route('my.messages')}}">My Message</a></li>
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

    <div class="col-lg-12">        
        <div class="row justify-content-center">
          <div class="col-lg-offset-2 col-lg-6">
            @if(isset($messages) && count($messages))
            @foreach($messages as $message)            
                @php
                    $style = (!(bool)$message->is_read)? 'border: 2px solid #FFB233;':'';
                @endphp
                <div class="candidate-list">
                    <div class="candidate-list-image">
                        <img class="img-fluid" src="{{asset('/')}}images/avatar/04.jpg" alt="" >
                    </div>
                    <div class="candidate-list-details">
                        <div class="candidate-list-info">
                        <div class="candidate-list-title">
                            <h5 class="mb-0"><a href="{{route('applicant.message.detail', $message->id)}}" title="{{$message->subject}}" style="color:#263bd6;">{{$message->from_name}} - {{$message->from_email}}</a></h5>
                        </div>
                        <div class="candidate-list-option">
                            <ul class="list-unstyled">
                            <h2 class="mb-0"><a href="{{route('applicant.message.detail', $message->id)}}">
                                <li><i class="fas fa-book pe-1"></i>{{$message->subject}}</li>                        
                                </a></h2>                    
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="candidate-list-favourite-time">                
                        <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>{{$message->created_at->format('M d,Y')}}  </span>
                    </div>
                </div>
            @endforeach
          @endif
          </div>       
    </div><br><br>
@include('includes.footer')
@endsection
@push('scripts')
@include('includes.immediate_available_btn')
@endpush