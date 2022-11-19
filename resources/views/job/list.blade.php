@php
use Carbon\Carbon;   
@endphp 
@extends('layouts.app')
@section('content') 
<!-- Header start --> 

@include('includes.header') 

<!-- Header end --> +
<!--================================= banner -->
<section class="banner bg-holder bg-overlay-black-30" style="background-image: url({{asset('/')}}images/bg/banner-01.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="job-search-field job-search-field-02 search-under-banner">
                        <div class="job-search-item">
                        <form class="row basic-select-wrapper" action="{{route('job.list')}}" method="get">                            
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group mb-3 mt-0">
                                                <div class="form-group-search">
                                                    <label class="form-label">Keywords / Job Title / Job Ref</label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="text"  name="search" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('e.g. Sales Executive')}}" />                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                       
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3 mt-0">
                                                <label class="form-label">Experience</label>                                                
                                                    <select class="form-control basic-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                        <option value=""  data-select2-id="1">Select Experience</option>
                                                        <option value="1">1 Year</option>
                                                        <option value="2">2 Year</option>
                                                        <option value="3">3 Year</option>
                                                        <option value="4">4 Year</option>
                                                        <option value="5">5 Year</option>
                                                        <option value="6">6 Year</option>
                                                        <option value="7">7 Year</option>
                                                        <option value="8">8 Year</option>
                                                        <option value="9">9 Year</option>
                                                        <option value="10">10 Year</option>
                                                        <option value="11">11 Year</option>
                                                        <option value="12">12 Year</option>
                                                        <option value="13">13 Year</option>
                                                        <option value="14">14 Year</option>
                                                        <option value="15">15 Year</option>
                                                        <option value="16">16 Year</option>
                                                        <option value="17">17 Year</option>                                                    
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group mb-3 mt-0">
                                                <div class="form-group-search">
                                                    <label class="form-label">Location</label>
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-control" type="search" placeholder="e.g. town or postcode">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group mb-3 mt-0">
                                        <div class="mt-0">
                                            <button class="btn btn-primary align-items-center" type="submit"><i class="fas fa-search me-1"></i>Find Jobs</button>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-lg-12 mt-0">
                                    <div class="form-group mb-3">
                                        <div class="d-md-inline-block advance-search-btn">
                                            <a class="more-search p-0 collapsed" data-bs-toggle="collapse" href="#advanced-search" role="button" aria-expanded="false" aria-controls="advanced-search">Advanced search <i class="fas fa-angle-down ps-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse advanced-search col-lg-12" id="advanced-search">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group mb-3">
                                                    <div class="form-group-search">
                                                        <label class="form-label">Salary Min</label>
                                                        <div class="d-flex align-items-center">
                                                            <input class="form-control" type="search" placeholder="5,000$">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group mb-3">
                                                    <div class="form-group-search">
                                                        <label class="form-label">Salary Max</label>
                                                        <div class="d-flex align-items-center">
                                                            <input class="form-control" type="search" placeholder="10,000$">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Salary Type</label>
                                                    <select class="form-control basic-select select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                                        <option value="annum" data-select2-id="6">Per annum</option>
                                                        <option value="month">Per month</option>
                                                        <option value="week">Per week</option>
                                                        <option value="day">Per day</option>
                                                        <option value="hour">Per hour</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group mb-0">
                                                    <label class="form-label">Job Type</label>
                                                    <select class="form-control basic-select select2-hidden-accessible" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                        <option data-select2-id="9">Any</option>
                                                        <option value="Permanent">Permanent</option>
                                                        <option value="Contract">Contract</option>
                                                        <option value="Part-Time">Part-Time</option>
                                                        <option value="Temporary">Temporary</option>
                                                        <option value="Apprenticeship">Apprenticeship</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                            </form>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
banner -->


 <!--================================= job-list -->
 <section class="space-ptb mb-4 bg-light">
        <div class="container">
        @include('flash::message')
        
<form action="{{route('job.list')}}" method="get" id="formName">
            <div class="row">  
              @include('includes.job_list_side_bar')      
                <div class="col-lg-7">
                    <!--=================================
                    right-sidebar -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="section-title mb-3 mb-lg-4">
                                <h6 class="mb-0" style="font-size: 14px;"> Showing {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }}  of <span class="text-primary">{{ $jobs->total() }} Jobs</span></h6>
                            </div>
                        </div>                        
                    </div>
                    <div class="job-filter mb-4 d-sm-flex align-items-center">
                        <div class="job-alert-bt"> <a class="btn btn-md btn-dark" href="#"><i class="fa fa-envelope"></i>Get job alert </a> </div>
                        <div class="job-shortby ms-sm-auto d-flex align-items-center">
                            <form class="form-inline">
                                <div class="d-sm-flex align-items-center mb-0">
                                    <label class="justify-content-start me-2 mb-2 mb-sm-0">sort by :</label>
                                    <div class="short-by">
                                        <select class="form-control basic-select">
                                            <option>Newest</option>
                                            <option>Oldest</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                      @if(isset($jobs) && count($jobs))

                        @foreach($jobs as $job)

                        @php $company = $job->getCompany(); @endphp
                        @php
                                $current_date = Carbon::now()->toDateTimeString();
                                $start_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at);
                                $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $current_date);
                                $different_days = $start_date->diffInDays($end_date);
                                $number = MiscHelper::getNumbers();
                        @endphp
                        @if(null !== $company)
                        <div class="col-12 mb-2">
                            <div class="job-list ">
                                <div class="job-list-logo">
                                <a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$company->printCompanyImage()}}
                                </div>
                                <div class="job-list-details">
                            <div class="job-list-info">
                                <div class="job-list-title">
                                    <h5 class="mb-0"><a href="{{route('job.detail', [$job->slug])}}">{{$job->title}}</a></h5>
                                </div>
                                <div class="job-list-option">
                                  <ul class="list-unstyled">  
                                      <li><i class="fas fa-briefcase pe-2"></i>{{$job->jobExperienceFrom->job_experience}} - {{$job->jobExperienceTo->job_experience}} Years</li>                                             
                                      <li><i class="fas fa-rupee-sign pe-2"></i>{{$job->salary_from}} - {{$job->salary_to}} PA</li>                                           
                                      <li><i class="fas fa-map-marker-alt pe-2"></i>{{$job->getCity('city')}}</a></li>
                                  </ul>
                                </div>
                                <div class="job-list-option">
                                  <ul class="list-unstyled">  
                                      <li><i class="fas fa-file-code pe-2"></i>{{str_limit(strip_tags($job->description), 78, '...')}}</li>                                                                                            
                                  </ul>
                                </div> 
                            </div>
                        </div>
                        <div class="job-list-favourite-time">
                            
                            @if(Auth::check() && Auth::user()->isFavouriteJob($job->slug))
                            <a class="job-list-favourite order-2" href="{{route('remove.from.favourite', $job->slug)}}"><i class="far fa-heart"></i></a>
                            @else 
                            <a href="{{route('add.to.favourite', $job->slug)}}" class="btn"><i class="far fa-heart"></i></a>
                            @endif
                            <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>{{ isset($number[$different_days])?$number[$different_days]:$different_days }} days ago</span>
                        </div>
                            </div>
                        </div> 
                        @endif
                        @endforeach

                        @endif                                          
                    </div>
                    <!-- <div class="row">
                        <div class="col-12 text-center mt-4 mt-md-5">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item disabled"> <span class="page-link b-radius-none">Prev</span> </li>
                                <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">25</a></li>
                                <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                            </ul>
                        </div>
                    </div> -->
                    <div class=""><br />{!! $siteSetting->listing_page_horizontal_ad !!}</div>
                </div>
                <div class="col-md-2 col-sm-6 ">
                <!-- Sponsord By -->
                <div class="sidebar">

                  <h4 class="widget-title">{{__('Sponsord By')}}</h4>

                  <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>

            </div>
</form>
</div>
            </div>
        </div>
    </section>
    <!--================================= job-list -->

@include('includes.footer')

@endsection

@push('styles')

<style type="text/css">

.job-list-details ul li {
            margin: 5px 25px 5px 0px;
            font-size: 13px;
        }
        ::marker {
            color: red;
            font-size:12px;
        }

.hide_vm_ul{

	height:100px;

	overflow:hidden;

}

.hide_vm{

	display:none !important;

}

.view_more{

	cursor:pointer;

}

</style>

@endpush

@push('scripts') 

<script>

    $(document).ready(function ($) {

        $("#formname").on("change", "input:checkbox", function(){
            $("#formname").submit();
        });

        $("form").submit(function () {

            $(this).find(":input").filter(function () {

                return !this.value;

            }).attr("disabled", "disabled");

            return true;

        });

        $("form").find(":input").prop("disabled", false);

				

		$( ".view_more_ul" ).each(function() {

		  	if($( this ).height() > 100)

			{

				$( this ).addClass('hide_vm_ul');

				$( this ).next().removeClass('hide_vm');

			}

		});



		$('.view_more').on('click', function(e){

			e.preventDefault();

			$( this ).prev().removeClass('hide_vm_ul');

			$( this ).addClass('hide_vm');

		});

	

	});

</script>

@include('includes.country_state_city_js')

@endpush