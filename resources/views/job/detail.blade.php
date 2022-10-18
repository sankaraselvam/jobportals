<style>
        .backgroundColor {
            height: 87px;
            width: 100%;
            position:fixed;
        }
        .widget .company-detail-meta ul li a {   
            padding: 8px;
        }
        .job-list-details ul {    
         display: block!important;
        }
        .list-style li {    
           margin-bottom: 3px;
        }
   
        .job-list {
          border-bottom: 1px solid #fff;
        }
        ul.skillslist li a {    
            background: #eee;
            color: #555;
            padding: 10px 20px;
            margin: 5px 10px 5px 0;
            border-radius: 5px;
            font-weight: 600;
        }
        ul.skillslist li  {
            list-style-type:none;
            display: inline-block;
        }
</style>

@extends('layouts.app')



@section('content') 

<!-- Header start --> 

@include('includes.header') 

<!-- Header end --> 


@php

$company = $job->getCompany();

@endphp

    <!--================================= job list -->
    <section class="space-ptb" style="background: #ebeaea87;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row" style="margin-bottom:15px;">
                        <div class="col-md-12">
                            <div class="job-list border">
                                <div class="job-list-details">
                                    <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0">{{$job->title}}</h5>
                                            <p class="mt-2" style="text-transform:uppercase;">{{$company->name}}</p>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="job-list-favourite-time">
                                    <span class="job-list-time order-1 mb-2">Posted {{isset($job->created_at)?$job->created_at->format('M d, Y'):''}}</span>
                                    @if(Auth::check() && Auth::user()->isAppliedOnJob($job->id))
                                        <a class="btn btn-secondary mb-2 btn-md" href="javascript:;" class="btn apply" style="font-size:11px;">{{__('Already Applied')}}</a>
                                    @else
                                        @if ($action!="View")
                                            <a class="btn btn-secondary mb-2 btn-sm" href="{{route('post.apply.job', $job->slug)}}" style="float: right;background-color: #4a90e2!important;border:1px solid #4a90e2!important;"> Apply for job </a>      
                                        @endif
                                    @endif                                   
                                </div>                                
                            </div>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="job-list border">
                                <div class="job-list-details">
                                    <div class="job-list-info">                                       
                                        <div class="job-list-option">
                                            <ul class="list-unstyled" style="font-family:times new roman">
                                                <li><i class="fas fa-briefcase pe-2 mb-1"></i></i> {{$job->getJobExperience('job_experience')}}</li>
                                                <li><i class="fas fa-map-marker-alt pe-3 mb-1"></i>{{$job->getLocation()}}</li>
                                                @if(!(bool)$job->hide_salary)
                                                <li><i class="fas fa-address-card"></i><span class="ps-2"> ₹ {{$job->salary_from}} - {{$job->salary_to}} P.A</span></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="job-list-info mt-2">
                                        <div class="job-list-title">
                                            <h6 class="mb-0" style="font-size: 12px;">Time and Venue</h6>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled" style="font-family:times new roman">
                                                <li><i class="far fa-clock pe-2"></i>{{ isset($job->created_at)?$job->created_at->format('M d, Y'):''}} - {{ isset($job->expiry_date)?$job->expiry_date->format('M d, Y'):''}} , 9.30 AM - 5.30 PM</li>                                                
                                                <li><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="ps-2">Contact - Mastan ( {{$company->phone}} ) </span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="border p-4 mt-4 my-4 my-lg-4" style="background: #ffffff;">
                        <h6 class="mb-3 mb-md-4">Job Description</h6>
                        <p>{!! $job->description !!}</p>                        
                    </div>
                    <div class="border p-4 mt-4 my-4 my-lg-3" style="background: #ffffff;">                       
                        <h5 class="mb-3 mb-md-4">Candidate profile</h5>
                        <p>Bachelor’s degree with HR Experience
                            10+ years’ exp in HR function(s) with strong working knowledge on recruiting, employee relations, compensation, & benefits
                            support & implement HR initiatives</p>                           
                        <h6 class="mb-3" style="font-size:14px;">Education</h6>                       
                        <ul class="list-unstyled list-style">
                            <li><label style="width:130px;">UG </label>         <span style="color:#333;">{{$job->getDegreeLevel('degree_level')}}</a></span></li>                                                      
                        </ul> 
                        <h6 class="mb-3" style="font-size:14px;">Key Skills</h6> 
                        <ul class="skillslist">
                          {!!$job->getJobSkillsList()!!}

                        </ul>                        
                    </div>
                    <div class="border p-4 mt-4 my-4 my-lg-4" style="background: #ffffff;">                       
                        <h5 class="mb-3 mb-md-4">Other Details</h5>                       
                        <ul class="list-unstyled list-style">
                            <li><label style="width:130px;">Role </label>         <span style="color:#333;">Head - HR</a></span></li>                           
                            <li><label style="width:130px;">Industry Type</label> <span style="color:#333;"> {{$job->getFunctionalarea('functional_area')}}</span></li>                           
                            <li><label style="width:130px;">Functional Area</label><span style="color:#333;">{{$job->getFunctionalarea('functional_area')}} </span></li>                           
                            <li><label style="width:130px;">Employment Type</label><span style="color:#333;">{{$job->getJobType('job_type')}}</span></li>                           
                            <li><label style="width:130px;">Role Category</label>  <span style="color:#333;"> HR Operations</span></li>                           
                        </ul>
                    </div>
                       
                    <div class="border p-4 mt-4 my-4 my-lg-4" style="background: #fff;">
                        <div class="col-12">
                          <h5 class="mb-3 mb-md-4">Recruiter Details</h5>
                        </div>
                        <div class="row mt-3">
                        <div class="col-lg-12 mb-4 mb-sm-10">
                          <div class="job-list">                   
                              <div class="job-list-logo" style="margin-top: 20px;">             
                                <a href="{{route('company.detail',$company->slug)}}">{{$company->printCompanyImage()}}</a> 
                              </div>                        
                              <div class="job-list-details">
                                  <div class="job-list-info">
                                      <div class="job-list-title">
                                          <h6 class="mb-0">K N Kumar</h6>
                                      </div>
                                      <div class="job-list-option">
                                          <ul class="list-unstyled">
                                              <li class="mb-4"> Company HR at {{$company->name}} </li>
                                              <li><i class="fas fa-globe pe-1"></i> <span class="ps-2" style="color:#333;"><a href="" target="_blank">www.udhyog.com</a></span></li>                                                
                                          </ul>
                                      </div>                                    
                                  </div>                                   
                              </div>
                              <div class="col-md-3 col-sm-6 mb-4">
                                <div class="d-flex">                                
                                    <div class="feature-info-content ps-5">
                                      <label class="mb-1"><a href=" " class="mb-0 fw-bold d-block text-dark">FOLLOW</a></label>
                                      <span class="d-block">164 Followers</span>
                                    </div>
                                </div>
                              </div> 
                          </div>
                          </div>
                          </div>
                    </div>
                    
                    <div class="border p-4 mt-4 my-4 my-lg-4" style="background: #ffffff;">                       
                        <h5 class="mb-3 mb-md-4">About Company</h5>
                        <p>We believe that our success is based upon the Quality and Talent of the candidates who are carefully chosen for their suitability to the business of the target company, its culture and the professional profile expected.</p>
                        <h6 class="mb-3" style="font-size:14px;">Company Info</h6>                       
                        <ul class="list-unstyled list-style">
                            <li><label style="width:130px;">Website </label><span style="color:#333;"><a href="" target="_blank">https://www.udhyog.com</a></span></li>                                                      
                        </ul>                        
                    </div>
                   
                </div>
                <!--=================================       sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar mb-0">
                        <div class="widget mb-4" style="background: #fff;">
                            <div class="company-detail-meta">                           
                              <div class="widget-title "><br>
                                  <h5 class="text-center">Share</h5>
                              </div>                          
                                <ul class="list-unstyled text-center mb-2">
                                    <li>
                                        <div class="share-box share-dark-bg">
                                            <a href="https://www.linkedin.com/" target="_blank"><img src="{{asset('/')}}images/social icon/linkedin-icon.png" width="45" height="45" border="0"></a>
                                            <a href="https://www.facebook.com/" target="_blank"><img src="{{asset('/')}}images/social icon/facebook-icon.png"  width="45" height="45" border="0"></a>                                            
                                            <a href="https://plus.google.com/" target="_blank"><img class="alignnone" src="{{asset('/')}}images/social icon/instagram-icon.png" width="45" height="45" border="0"></a>
                                            <a href="https://twitter.com/" target="_blank"><img class="alignnone" src="{{asset('/')}}images/social icon/Twitter-icon.png" width="42" height="42" border="0"></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget p-4" style="background: #fff;">
                            <div class="widget-title">
                                <h5>Similar Jobs</h5>
                            </div>
                            
                            <div class="similar-jobs-item widget-box">                            
                            <div class="row mt-3">
                            @if(isset($relatedJobs) && count($relatedJobs))
                                  @foreach($relatedJobs as $relatedJob)
                                  <?php $relatedJobCompany = $relatedJob->getCompany();?>
                                  @if(null !== $relatedJobCompany)
                                <div class="col-lg-12 mb-4 mb-sm-10">    
                                    <div class="job-list">                                 
                                        <div class="job-list-logo">
                                            <a href="{{route('company.detail',$company->slug)}}">{{$company->printCompanyImage()}}</a>                                  
                                        </div>
                                        <div class="job-list-details">
                                            <div class="job-list-info">
                                                <div class="job-list-title">
                                                    <p><a href="{{route('job.detail', [$relatedJob->slug])}}" title="{{$relatedJob->title}}">{{$relatedJob->title}}</a></p>                                             
                                                </div>
                                                <div class="job-list-option">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span>via</span>
                                                            <a href="{{route('company.detail', $relatedJobCompany->slug)}}" title="{{$relatedJobCompany->name}}">{{$relatedJobCompany->name}}</a>
                                                        </li>
                                                        <li><a class="freelance" href="#"><i class="fas fa-suitcase pe-1"></i>{{$relatedJob->getJobType('job_type')}}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>                               
                              </div>
                              @endif

                        @endforeach

                        @endif  
                              </div>
                              </div>
                                              
                        </div>
                    </div>
                </div>
                <!--=================================      sidebar -->
            </div>
        </div>
    </section>
    <!--================================= job list -->


@include('includes.footer')

@endsection

@push('styles')

<style type="text/css">

.view_more{display:none !important;}

</style>

@endpush

@push('scripts') 

<script>

    $(document).ready(function ($) {

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

				$( this ).css('height',100);

				$( this ).css('overflow','hidden');

				//alert($( this ).next());

				$( this ).next().removeClass('view_more');

			}
		});
	});

</script> 

@endpush





