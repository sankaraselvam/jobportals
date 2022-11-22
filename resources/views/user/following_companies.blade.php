@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 

<!--================================= banner -->
 <section class="banner bg-holder bg-overlay-black-30" style="background-image: url({{asset('/')}}images/bg/dashboardbg.png); padding: 40px 0 40px 0!important;"></section>

<!--- ================================ banner -->
 <!--=================================    Dashboard Nav -->
 @include('common.nav_menu')
 <!--=================================    Dashboard Nav -->

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

@include('includes.footer')
@endsection
@push('scripts')
@include('includes.immediate_available_btn')
@endpush