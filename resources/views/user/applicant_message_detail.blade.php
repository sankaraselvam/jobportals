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
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <div class="profile-avatar-info ms-4">
                                <h4 class="mt-4" style="color: #fff;text-transform: capitalize;">{{$user->getName()}}</h4>
                                <p style="color: #fff;text-transform: capitalize;">PHP Developer at Dawn Info System</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                            <span class="progress-bar-number">85%</span>
                            <span class="progress-bar-number1">Profile Strength (Excellent)</span>
                        </div>
                    </div>
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

<!--=================================   Dashboard Nav -->
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
                                <li><a href="">Pricing Plan</a></li>
                                <li><a class="active" href="{{route('my.messages')}}">My Message</a></li>
                                <li><a href="{{route('my.followings')}}">My Followings</a></li>
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


    <section style="margin-bottom:120px!important">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-dashboard-info-box mb-0 pb-4">
                        <div class="section-title-02 mb-4">
                            <h4>My Messages</h4>
                            <hr>
                        </div>
                        <div class="row">
                        @if(isset($message))
                            <div class="col-12">
                                <div class="job-list ">
                                    <div class="job-list-logo">
                                      <p style="height:100%!important;"></p>
                                    </div>
                                    <div class="job-list-details">
                                        <div class="job-list-info">                                           
                                            <div class="job-list-option">
                                                <ul class="list-unstyled" style="display:inline-block!important;">
                                                    <li> <span>{{__('Dated')}} : </span>{{$message->created_at->format('M d,Y')}}</li>
                                                    <li> <span>{{__('From')}} : </span>{{$message->subject}}</li>
                                                    <li> <span>{{__('Subject')}} : </span>{{$message->from_name}} - {{$message->from_email}}</li>
                                                    <li> <span>{{__('Message')}} : </span>{{$message->message_txt}}</li>                                                    
                                                </ul>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time"> <a class="job-list-favourite order-2" href="#"><i class="fas fa-heart text-danger"></i></a> <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>3D ago</span> </div>
                                </div>
                            </div> 
                        @endif                                         
                        </div>                        
                    </div>
                </div>               
            </div>
        </div>
    </section>



    <div class="col-lg-12">        
        <div class="row justify-content-center">
          <div class="col-8">
          @if(isset($message))
            <div class="candidate-list">
              <div class="candidate-list-image">
                <img class="img-fluid" src="{{asset('/')}}images/avatar/04.jpg" alt="" >
              </div>
              <div class="candidate-list-details">
              <table>
                <tr>
                  <td>{{__('Dated')}} : </td>
                  <td>&nbsp;&nbsp;&nbsp;</td>
                  <td>{{$message->created_at->format('M d,Y')}}</td>
                </tr>
                <tr>
                  <td>{{__('From')}} : </td>
                  <td>&nbsp;&nbsp;&nbsp;</td>
                  <td>{{$message->from_name}} - {{$message->from_email}}</td>
                </tr>
                <tr>
                  <td>{{__('Subject')}} : </td>
                  <td>&nbsp;&nbsp;&nbsp;</td>
                  <td>{{$message->subject}}</td>
                </tr>
                <tr>
                  <td>{{__('Message')}} : </td>
                  <td>&nbsp;&nbsp;&nbsp;</td>
                  <td>{{$message->message_txt}}</td>
                </tr>
              </table>
              </div>             
            </div>            
          @endif
          </div>          
        </div>       
    </div><br><br>
<div class="listpgWraper">
<div class="container">
  <div class="row">
    <div class="col-md-9 col-sm-8">
      <div class="myads">
        <h3>{{__('My Messages')}}</h3>
        <div class="panel-group"> 
          <!-- job start --> 
          @if(isset($message))
          <div class="panel panel-info">
            <div class="panel-body">
              <p class="text-left">
              <table>
                <tr>
                  <td>{{__('Dated')}} : </td>
                  <td>&nbsp;&nbsp;&nbsp;</td>
                  <td>{{$message->created_at->format('M d,Y')}}</td>
                </tr>
                <tr>
                  <td>{{__('From')}} : </td>
                  <td>&nbsp;&nbsp;&nbsp;</td>
                  <td>{{$message->from_name}} - {{$message->from_email}}</td>
                </tr>
                <tr>
                  <td>{{__('Subject')}} : </td>
                  <td>&nbsp;&nbsp;&nbsp;</td>
                  <td>{{$message->subject}}</td>
                </tr>
                <tr>
                  <td>{{__('Message')}} : </td>
                  <td>&nbsp;&nbsp;&nbsp;</td>
                  <td>{{$message->message_txt}}</td>
                </tr>
              </table>
              </p>
            </div>
          </div>
          <!-- job end --> 
          @endif </div>
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection
@push('scripts')
@include('includes.immediate_available_btn')
@endpush