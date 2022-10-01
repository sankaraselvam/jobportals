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
        
        h4 {
            font-size: 20px;
        }
        
        label.badge {
            background: red;
            font-size: 12px;
            padding: .375rem .5625rem;
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
                                <img class="img-fluid " src="{{asset('/')}}user_images/{{$user->image}}" alt="">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <div class="profile-avatar-info ms-4">
                                <h4 class="mt-4" style="color: #fff;text-transform: capitalize;"></h4>
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
                                    <span class="d-block" style="color: #fff;"><i class="fa fa-phone" aria-hidden="true" style="font-size:16px;color:#fff;transform: rotate(100deg);"></i> <span style="margin-left: 3px;"></span></span>
                                    <span class="d-block mt-2" style="color: #fff;"><i class="fa fa-envelope" aria-hidden="true" ></i> <span style="margin-left: 3px;"></span></span>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--=================================    inner banner -->


    <!--================================= Dashboard Nav -->
    <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sticky-top secondary-menu-sticky-top">
                            <div class="secondary-menu">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="{{route('home')}}">Dashboard</a></li>
                                    <li><a href="{{ route('my.profile') }}">My Profile</a></li>
                                    <li><a href="">Change Password</a></li>
                                    <li><a class="active" href="{{ route('my.job.applications') }}">Manage Jobs</a></li>
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
    <!--================================= Dashboard Nav -->

    <!--================================= Manage Jobs -->
    <section style="margin-bottom:85px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-dashboard-info-box mb-0">
                        <div class="row mb-4">
                            <div class="col-md-7 col-sm-5 d-flex align-items-center">
                                <div class="section-title-02 mb-0 ">
                                    <h4 class="mb-0">{{__('Manage Jobs')}}</h4>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-7 mt-3 mt-sm-0">
                                <div class="search">
                                    <i class="fas fa-search"></i>
                                    <input type="text" class="form-control" placeholder="Search....">
                                </div>
                            </div>
                        </div>
                        <div class="user-dashboard-table table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Acivity on this Job</th>
                                    </tr>
                                </thead>

                                <tbody>
                                  
                                @if(isset($jobs) && count($jobs))

                                @foreach($jobs as $job)

                                @php $company = $job->getCompany(); @endphp

                                @if(null !== $company)
                                      <tr>   
                                          <th scope="row"><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a> 
                                          <p>{{str_limit(strip_tags($job->description), 75, '...')}}</p>
                                              <p class="mb-1 mt-2">Expiry: {{$job->expiry_date->format('M d, Y')}}</p>
                                              <p class="mb-0">Company Name: <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></p>
                                          </th>
                                          <td><span>52 Total Applications | 03 Applications viewed by Recruiters</span> </td>
                                          <td class="text-center"><label class="badge bg-danger">Pending</label></td>
                                      </tr>
                                    @endif

                                  @endforeach

                                  @endif                                   

                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <ul class="pagination mt-3">
                                    <li class="page-item disabled me-auto">
                                        <span class="page-link b-radius-none">Prev</span>
                                    </li>
                                    <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item ms-auto">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Manage Jobs -->


@include('includes.footer')

@endsection

@push('scripts')

@include('includes.immediate_available_btn')

@endpush