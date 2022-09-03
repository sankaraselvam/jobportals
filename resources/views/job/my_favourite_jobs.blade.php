@extends('layouts.app')



@section('content')

<!-- Header start -->

@include('includes.header')

<!-- Header end --> 

 <!--================================= banner -->
 <section class="banner bg-holder bg-overlay-black-30" style="background-image: url({{asset('/')}}images/bg/dashboardbg.png); padding: 40px 0 40px 0!important;"></section>

<!--- ================================ banner -->

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
                                    <li><a href="{{ route('my.job.applications') }}">Manage Jobs</a></li>
                                    <li><a class="active" href="{{ route('my.favourite.jobs') }}">Saved Jobs</a></li>                                
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

    <section style="margin-bottom:120px!important">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-dashboard-info-box mb-0 pb-4">
                        <div class="section-title-02 mb-4">
                            <h4>{{__('Saved Jobs')}}</h4>
                            <hr>
                        </div>
                        <div class="row">
                        @if(isset($jobs) && count($jobs))

                        @foreach($jobs as $job)

                        @php $company = $job->getCompany(); @endphp

                        @if(null !== $company)
                            <div class="col-12">
                                <div class="job-list ">
                                    <div class="job-list-logo">
                                      <p style="height:100%!important;">{{$company->printCompanyImage()}}</p>
                                    </div>
                                    <div class="job-list-details">
                                        <div class="job-list-info">
                                            <div class="job-list-title">
                                                <h5 class="mb-0"><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a></h5>
                                            </div>
                                            <div class="job-list-option">
                                                <ul class="list-unstyled">
                                                    <li> <span>via</span> <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a> </li>
                                                    <li><i class="fas fa-map-marker-alt pe-1"></i>{{$job->getCity('city')}}</li>
                                                    <li><i class="fas fa-filter pe-1"></i>Accountancy</li>
                                                    <li><a class="freelance" href="#"><i class="fas fa-suitcase pe-1"></i>{{$job->getJobShift('job_shift')}}</a></li>
                                                </ul>
                                            </div>
                                            <p>{{str_limit(strip_tags($job->description), 150, '...')}}</p>
                                        </div>
                                    </div>
                                    <div class="job-list-favourite-time"> <a class="job-list-favourite order-2" href="#"><i class="fas fa-heart text-danger"></i></a> <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>3D ago</span> </div>
                                </div>
                            </div> 
                            @endif

            @endforeach

            @endif                         
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mt-4 mt-sm-5">
                                <ul class="pagination justify-content-center mb-0 mb-sm-4">
                                    <li class="page-item disabled"> <span class="page-link b-radius-none">Prev</span> </li>
                                    <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">25</a></li>
                                    <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="job-list job-grid">
                        <div class="job-list-logo">
                            <img class="img-fluid" src="({{asset('/')}})images/avatar/12.png" alt="">
                        </div>
                        <div class="job-list-details">
                            <div class="job-list-info">
                                <div class="job-list-title">
                                    <p class="mb-0"><a href="job-detail.html">Get jobs matching your criteria by adding below preferences</a></p>
                                </div>
                                <div class="job-list-option">
                                    <ul class="list-unstyled" style="justify-content: left;">
                                        <li> <span>Your Preferred Job Role</span> <a href="employer-detail.html"><i class="far fa-edit"></i></a>
                                            <p><span class="chip">PHP and Web Developer</span> </p>
                                            <p></p>
                                        </li>
                                        <li> <span>Your Preferred Work Location </span> <a href="employer-detail.html"><i class="far fa-edit"></i></a> </li>
                                        <li> <span>Add Your Preferred Salary</span> <a href="employer-detail.html"><i class="far fa-edit"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="job-list-favourite-time"> <a class="job-list-favourite order-2" href="#"><i class="far fa-heart"></i></a> <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>3D ago</span> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@include('includes.footer')

@endsection

@push('scripts')

@include('includes.immediate_available_btn')

@endpush