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
                                    <li><a href="{{ route('candidate.change.password') }}">Change Password</a></li>
                                    <li><a href="{{ route('my.job.applications') }}">Manage Jobs</a></li>
                                    <li><a href="{{ route('my.favourite.jobs') }}">Saved Jobs</a></li>                                
                                    <li><a href="{{route('my.messages')}}">My Message</a></li>
                                    <li><a class="active" href="{{route('my.followings')}}">My Followings</a></li>
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
                            <h4>{{__('My Followings')}}</h4>
                            <hr>
                        </div>
                        <div class="row">
                        @if(isset($companies) && count($companies))
                        @foreach($companies as $company)
                            <div class="col-12">
                              
                                <div class="job-list ">
                                    <div class="job-list-logo">
                                      <p style="height:100%!important;">{{$company->printCompanyImage()}}</p>
                                    </div>
                                    <div class="job-list-details">
                                        <div class="job-list-info">
                                          <div class="row">
                                              <div class="col-8">
                                                <div class="job-list-title">
                                                      <h5 class="mb-0" style="color:blue;"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></h5>
                                                  </div>  
                                              </div> 
                                              <div class="col-4">
                                              <a class="btn btn-primary mb-2 btn-sm" href="{{route('company.detail', $company->slug)}}"> View Details </a>                                          
                                              </div> 
                                          </div>
                                                                                   
                                            <div class="job-list-option">
                                                <ul class="list-unstyled">                                                    
                                                    <li><i class="fas fa-map-marker-alt pe-1"></i>{{$company->getLocation()}}</li>                                                    
                                                </ul>
                                            </div>
                                            <p>{{str_limit(strip_tags($company->description), 150, '...')}}</p>
                                        </div>
                                    </div>                                    
                                </div>
                            </div> 
                        @endforeach
                      @endif                         
                        </div> 
                    </div>
                </div>                
            </div>
        </div>
    </section>


<div class="listpgWraper">
  <div class="container">
    <div class="row">
      @include('includes.user_dashboard_menu')
      
      <div class="col-md-9 col-sm-8"> 
        <div class="myads">
          <h3>{{__('My Followings')}}</h3>
          <ul class="searchList">
            <!-- job start --> 
            @if(isset($companies) && count($companies))
            @foreach($companies as $company)
            <li>
              <div class="row">
                <div class="col-md-8 col-sm-8">
                  <div class="jobimg">{{$company->printCompanyImage()}}</div>
                  <div class="jobinfo">
                    <h3><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></h3>
                    <div class="location">
                      <label class="fulltime">{{$company->getLocation()}}</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="listbtn"><a href="{{route('company.detail', $company->slug)}}">{{__('View Details')}}</a></div>
                </div>
              </div>
              <p>{{str_limit(strip_tags($company->description), 150, '...')}}</p>
            </li>
            <!-- job end --> 
            @endforeach
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection
@push('scripts')
@include('includes.immediate_available_btn')
@endpush