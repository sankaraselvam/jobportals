@php
use Carbon\Carbon;   
@endphp 
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
    </style>
<!--================================= banner -->
    <section class="banner bg-holder bg-overlay-black-30" style="background-image: url({{asset('/')}}images/bg/dashboardbg.png); padding: 40px 0 40px 0!important;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="job-search-field job-search-field-02 search-under-banner">
                        <div class="job-search-item">
                            <form class="row basic-select-wrapper">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group mb-3 mt-0">
                                                <div class="form-group-search">
                                                    <label class="form-label">Search Jobs</label>
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-control" type="search" placeholder="Search jobs by Skills, Designation, Companies " style="height: 48px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group mb-3 mt-0">
                                        <div class="mt-0">
                                            <button class="btn btn-primary align-items-center" type="submit" style="padding:13px 15px!important;"><i class="fas fa-search me-1"></i>Find Jobs</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= banner -->


    <!--================================= Dashboard Nav -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="sticky-top secondary-menu-sticky-top">
                        <div class="secondary-menu">
                            <ul class="list-unstyled mb-0">
                                <li><a class="active" href="{{route('home')}}">Dashboard</a></li>
                                <li><a href="{{ route('my.profile') }}">My Profile</a></li>
                                <li><a href="">Change Password</a></li>
                                <li><a href="{{ route('my.job.applications') }}">Manage Jobs</a></li>
                                <li><a href="{{ route('my.favourite.jobs') }}">Saved Jobs</a></li>
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
    <!--================================= Dashboard Nav -->

    <!--================================= Recommanded Jobs -->

    <section>
    @include('flash::message')
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-dashboard-info-box mb-0 pb-4">
                        <div class="section-title">
                            <h6>{{ $recommandedJobs->count() }} New Recommended Job(s)</h6>
                            <hr>
                        </div>
                        <div class="row">
                            @foreach ($recommandedJobs as $recommandedjob)
                                
                            @php
                                $current_date = Carbon::now()->toDateTimeString();
                                $start_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $recommandedjob->job->created_at);
                                $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $current_date);
                                $different_days = $start_date->diffInDays($end_date);
                                $number = MiscHelper::getNumbers();
                            @endphp
                            <div class="col-12">
                                <div class="job-list ">
                                    <div class="job-list-logo">
                                        <img class="img-fluid" src="{{asset('/')}}images/svg/01.svg" alt="">
                                    </div>
                                    <div class="job-list-details">
                                        <div class="job-list-info">
                                            <div class="job-list-title">
                                                <h5 class="mb-0"><a href="job-detail.html">{{ $recommandedjob->job->title }}</a></h5>
                                            </div>
                                            <div class="job-list-option">
                                                <ul class="list-unstyled">
                                                    <li><a href="employer-detail.html">{{ $recommandedjob->job->company->name }}</a> </li>
                                                    <li><i class="fas fa-map-marker-alt pe-1"></i>{{ $recommandedjob->job->city->city }}, {{ $recommandedjob->job->state->state }}</li>
                                                    <li><i class="fas fa-filter pe-1"></i>{{ $recommandedjob->jobSkill->job_skill }}</li>
                                                    <li><a class="freelance" href="#"><i class="fas fa-suitcase pe-1"></i>{{ isset($recommandedjob->job->jobType)?$recommandedjob->job->jobType->job_type:'' }}</a></li>
                                                </ul>
                                            </div>
                                            <div class="job-desc">
                                                <p>{!! str_limit($recommandedjob->job->description, $limit = 150, $end = '...') !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time">
                                        <a class="mb-5 d-block order-2" href="#" style="margin-bottom: 6.2rem!important;"></a> <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>Posted {{ isset($number[$different_days])?$number[$different_days]:$different_days }} days ago</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- <div class="col-12">
                                <div class="job-list">
                                    <div class="job-list-logo">
                                        <img class="img-fluid" src="{{asset('/')}}images/svg/02.svg" alt="">
                                    </div>
                                    <div class="job-list-details">
                                        <div class="job-list-info">
                                            <div class="job-list-title">
                                                <h5 class="mb-0"><a href="job-detail.html">Web Developer – .net</a></h5>
                                            </div>
                                            <div class="job-list-option">
                                                <ul class="list-unstyled">
                                                    <li> <span>via</span> <a href="employer-detail.html">Pendragon Green Ltd</a> </li>
                                                    <li><i class="fas fa-map-marker-alt pe-1"></i>Needham, MA</li>
                                                    <li><i class="fas fa-filter pe-1"></i>IT &amp; Telecoms</li>
                                                    <li><a class="part-time" href="#"><i class="fas fa-suitcase pe-1"></i>Part-Time</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time">
                                        <a class="mb-5 d-block order-2" href="#" style="margin-bottom: 6.2rem!important;"></a> <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>Posted One day ago</span> </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="job-list">
                                    <div class=" job-list-logo">
                                        <img class="img-fluid" src="{{asset('/')}}images/svg/03.svg" alt="">
                                    </div>
                                    <div class="job-list-details">
                                        <div class="job-list-info">
                                            <div class="job-list-title">
                                                <h5 class="mb-0"><a href="job-detail.html">Payroll and Office Administrator</a></h5>
                                            </div>
                                            <div class="job-list-option">
                                                <ul class="list-unstyled">
                                                    <li> <span>via</span> <a href="employer-detail.html">Wight Sound Hearing LLC</a> </li>
                                                    <li><i class="fas fa-map-marker-alt pe-1"></i>New Castle, PA</li>
                                                    <li><i class="fas fa-filter pe-1"></i>Banking</li>
                                                    <li><a class="temporary" href="#"><i class="fas fa-suitcase pe-1"></i>Temporary</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time">
                                        <a class="mb-5 d-block order-2" href="#" style="margin-bottom: 6.2rem!important;"></a> <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>Posted One day ago</span>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mt-2">
                                <a class="btn btn-link mb-2" href="recommendedjobs.html" style="float: right;"> VIEW ALL </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="margin-top: -17%;z-index: 1;">
                    <div class=" user-dashboard-info-box candidates-user-info zoom-in">
                        <div class="jobber-user-info">
                            <div class="profile-avatar">
                                <img class="img-fluid " src="{{asset('/')}}images/avatar/04.jpg" alt="">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <div class="profile-avatar-info ms-4" style="margin-left: 2.6rem!important;">
                                <h6> {{Auth::user()->getName()}}</h6>
                            </div>
                        </div>
                        <p style="margin-left:5%;margin-top: -20px;"><span class="emp-title">PHP Developer </span> at <span> Dawn info system P Ltd</span></p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width:85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                <span class="progress-bar-number">85%</span>
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
                                        <span> {{Auth::user()->num_profile_views}} <br><small>Profile Views</small></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="box-shadow: 0 1px 1px 0 rgb(0 0 0 / 5%), 0 1px 2px 0 rgb(0 0 0 / 10%), 0 2px 1px -4px rgb(0 0 0 / 20%);padding: 5px;">
                                    <a href="">
                                        <span> {{Auth::user()->countFollowings()}} <br><small>My Followings</small></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Recommanded Jobs -->


    <!--================================= New Jobs in My Job Alerts 
    <section class="space-ptb">
        <div class="container ">
            <div class="row ">
                <div class="col-md-8 ">
                    <div class="user-dashboard-info-box mb-0 pb-4 ">
                        <div class="section-title ">
                            <h6 style="display:inline;">New Jobs in My Job Alerts</h6><span style="float: right;font-weight: 800;"><a href="">CREATE ALERTS</a></span> <span style="float: right;margin-right: 3%;font-weight: 800;"><a href="">MANAGE ALERTS</a></span>
                            <hr>
                        </div>
                        <div class="row ">
                            <div class="col-12 ">
                                <div class="job-list ">
                                    <div class="job-list-logo ">
                                        <img class="img-fluid " src="images/svg/01.svg " alt=" ">
                                    </div>
                                    <div class="job-list-details ">
                                        <div class="job-list-info ">
                                            <div class="job-list-title ">
                                                <h5 class="mb-0 "><a href="job-detail.html ">Marketing and Communications</a></h5>
                                            </div>
                                            <div class="job-list-option ">
                                                <ul class="list-unstyled ">
                                                    <li> <span>via</span> <a href="employer-detail.html ">Fast Systems Consultants</a> </li>
                                                    <li><i class="fas fa-map-marker-alt pe-1 "></i>Wellesley Rd, London</li>
                                                    <li><i class="fas fa-filter pe-1 "></i>Accountancy</li>
                                                    <li><a class="freelance " href="# "><i class="fas fa-suitcase pe-1 "></i>Freelance</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time ">
                                        <a class="mb-5 d-block order-2" href="#" style="margin-bottom: 6.2rem!important;"></a> <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>Posted One day ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="job-list ">
                                    <div class="job-list-logo ">
                                        <img class="img-fluid " src="images/svg/02.svg " alt=" ">
                                    </div>
                                    <div class="job-list-details ">
                                        <div class="job-list-info ">
                                            <div class="job-list-title ">
                                                <h5 class="mb-0 "><a href="job-detail.html ">Web Developer – .net</a></h5>
                                            </div>
                                            <div class="job-list-option ">
                                                <ul class="list-unstyled ">
                                                    <li> <span>via</span> <a href="employer-detail.html ">Pendragon Green Ltd</a> </li>
                                                    <li><i class="fas fa-map-marker-alt pe-1 "></i>Needham, MA</li>
                                                    <li><i class="fas fa-filter pe-1 "></i>IT &amp; Telecoms</li>
                                                    <li><a class="part-time " href="# "><i class="fas fa-suitcase pe-1 "></i>Part-Time</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time ">
                                        <a class="mb-5 d-block order-2" href="#" style="margin-bottom: 6.2rem!important;"></a> <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>Posted One day ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="job-list ">
                                    <div class=" job-list-logo ">
                                        <img class="img-fluid " src="images/svg/03.svg " alt=" ">
                                    </div>
                                    <div class="job-list-details ">
                                        <div class="job-list-info ">
                                            <div class="job-list-title ">
                                                <h5 class="mb-0 "><a href="job-detail.html ">Payroll and Office Administrator</a></h5>
                                            </div>
                                            <div class="job-list-option ">
                                                <ul class="list-unstyled ">
                                                    <li> <span>via</span> <a href="employer-detail.html ">Wight Sound Hearing LLC</a> </li>
                                                    <li><i class="fas fa-map-marker-alt pe-1 "></i>New Castle, PA</li>
                                                    <li><i class="fas fa-filter pe-1 "></i>Banking</li>
                                                    <li><a class="temporary " href="# "><i class="fas fa-suitcase pe-1 "></i>Temporary</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time ">
                                        <a class="mb-5 d-block order-2" href="#" style="margin-bottom: 6.2rem!important;"></a> <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>Posted One day ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="job-list ">
                                    <div class="job-list-logo ">
                                        <img class="img-fluid " src="images/svg/04.svg " alt=" ">
                                    </div>
                                    <div class="job-list-details ">
                                        <div class="job-list-info ">
                                            <div class="job-list-title ">
                                                <h5 class="mb-0 "><a href="job-detail.html ">Data Entry Administrator</a></h5>
                                            </div>
                                            <div class="job-list-option ">
                                                <ul class="list-unstyled ">
                                                    <li> <span>via</span> <a href="employer-detail.html ">Tan Electrics Ltd</a> </li>
                                                    <li><i class="fas fa-map-marker-alt pe-1 "></i>Park Avenue, Mumbai</li>
                                                    <li><i class="fas fa-filter pe-1 "></i>Charity &amp; Voluntary</li>
                                                    <li><a class="full-time " href="# "><i class="fas fa-suitcase pe-1 "></i>Full-time</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time ">
                                        <a class="mb-5 d-block order-2" href="#" style="margin-bottom: 6.2rem!important;"></a> <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>Posted One day ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12 text-center mt-4 mt-md-5 ">
                                <a class="btn btn-link mb-2" href="#" style="float: right;"> VIEW ALL </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   ================================= New Jobs in My Job Alerts -->



    <!--================================= Application Summary -->
    <section class="space-ptb">
        <div class="container ">
            <div class="row ">
                <div class="col-md-4 ">
                    <div class="user-dashboard-info-box mb-0 pb-4 ">
                        <div class="row ">
                            <div class="col-12 ">
                                <div class="section-title ">
                                    <h6>Application Summary</h6>
                                    <hr>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-12 text-center md-5 ">
                                    <span>Daily Limit of Application: <span>{{Auth::user()->countProfileCvs()}}</span> </span>
                                </div>
                                <a class="btn btn-link mb-4" href="#"> </a><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="user-dashboard-info-box mb-0 pb-4 ">
                        <div class="row ">
                            <div class="col-12 ">
                                <div class="section-title ">
                                    <h6>Saved Job(s)</h6>
                                    <hr>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-12 text-center md-5 ">
                                    <span>You have <span>{{Auth::user()->countApplicantMessages()}}</span> saved job(s) till now. </span>
                                    <a class="btn btn-link " href="#" style="float: right;"> VIEW ALL </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Application Summary -->

    <!--================================= Recruiters Unread Message -->
    <section class="space-ptb">
        <div class="container ">
            <div class="row ">
                <h6>Recruiters</h6>
                <div class="col-md-8 ">
                    <div class="user-dashboard-info-box mb-0 pb-4 ">
                        <div class="section-title ">
                            <h6 style="display:inline;">{{Auth::user()->countApplicantMessages()}} New Recruiter Unread Messages</h6>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-12 ">
                                <div class="job-list" style="border-bottom: 1px solid #fff!important;">
                                    <div class="job-list-logo ">
                                        <img class="img-fluid " src="images/svg/01.svg " alt=" ">
                                    </div>
                                    <div class="job-list-details" style="border-bottom: 1px solid #fff;">
                                        <div class="job-list-info ">
                                            <div class="job-list-title ">
                                                <h5 class="mb-0 "><a href="job-detail.html ">Marketing and Communications</a></h5>
                                            </div>
                                            <div class="job-list-option ">
                                                <ul class="list-unstyled ">
                                                    <li> <span>via</span> <a href="employer-detail.html ">Fast Systems Consultants</a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: -8%;">
                                <a class="btn btn-link mb-2" href="{{route('my.messages')}}" style="float: right;"> VIEW ALL </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Recruiters Unread Message -->

    <!--================================= Recruiter Connections -->
    <section class="space-ptb" style="margin-bottom:70px;">
        <div class="container ">
            <div class="row ">
                <h6>Recruiters</h6>
                <div class="col-md-8 ">
                    <div class="user-dashboard-info-box mb-0 pb-4 ">
                        <div class="section-title ">
                            <h6 style="display:inline;">Recruiter Connections</h6>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-12 ">
                                <div class="job-list1" style="border-bottom: 1px solid #fff!important;">
                                    <div class="job-list-details" style="border-bottom: 1px solid #fff;">
                                        <div class="job-list-info ">
                                            <div class="job-list-title" style="text-align: center;">
                                                <p class="mb-0 " style="color: rgb(172, 171, 171);">Buy recruiter connections credits to contact more recruiters hiring in your domain.</p>
                                                <a class="btn btn-primary mt-4" href="#"> Buy Credits </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" style="margin-top: -3%;">
                                <a class="btn btn-link mb-2" href="#" style="float: right;"> VIEW ALL </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Recruiter Connections -->


@include('includes.footer')
@endsection
@push('scripts')
@include('includes.immediate_available_btn')
@endpush