@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 

<style>
  .job-list.job-grid .job-list-logo {
   
     margin: 0px !important; 
}
.job-list.job-grid .job-list-details {
    text-align: left!important;
}
.job-list.job-grid ul {   
    justify-content: left!important;
}
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
<!--================================= banner -->
<!--================================= banner -->
<section class="banner bg-holder bg-overlay-black-30" style="background-image: url({{asset('/')}}images/bg/banner-01.jpg);">
        
</section>
    <!--=================================banner -->
<!--=================================job-grid -->
<section class="space-ptb mb-4 bg-light" style="padding-top:50px!important;">
  <div class="container">
    <div class="row">
    <div class="col-lg-3">
                    <!--=================================   left-sidebar -->
                    <div class="sidebar bg-white" style="padding:18px;">                    
                    <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>{{__('Experience')}}</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="specialism">
                            @if(isset($jobExperienceIdsArray) && count($jobExperienceIdsArray))
                            @foreach($jobExperienceIdsArray as $key=>$job_experience_id)
                            @php
                            $jobExperience = App\JobExperience::where('job_experience_id','=',$job_experience_id)->lang()->active()->first();			  
                            @endphp
                            @if(null !== $jobExperience)
                            @php
                            $checked = (in_array($jobExperience->job_experience_id, Request::get('job_experience_id', array())))? 'checked="checked"':'';
                            @endphp
                                <div class="widget-content">
                                    <div class="form-check">
                                    <input type="checkbox" name="job_experience_id[]" id="job_experience_{{$jobExperience->job_experience_id}}" value="{{$jobExperience->job_experience_id}}" {{$checked}}>
                                       <label class="form-check-label me-2 mt-2" for="job_experience_{{$jobExperience->job_experience_id}}" ></label>
                                       {{$jobExperience->job_experience}} <span style="float:right;">({{App\Job::countNumJobs('job_experience_id', $jobExperience->job_experience_id)}})</span>
                                    </div>
                                </div>               
                          @endif
                          @endforeach
                          @endif                                                
                            </div>
                            <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a>
                        </div>
                        <hr>                        
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>{{__('Department')}}</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="specialism">
                            @if(isset($functionalAreaIdsArray) && count($functionalAreaIdsArray))
                            @foreach($functionalAreaIdsArray as $key=>$functional_area_id)
                            @php
                            $functionalArea = App\FunctionalArea::where('functional_area_id','=',$functional_area_id)->lang()->active()->first();
                            @endphp
                            @if(null !== $functionalArea)
                            @php
                            $checked = (in_array($functionalArea->functional_area_id, Request::get('functional_area_id', array())))? 'checked="checked"':'';
			                      @endphp
                                <div class="widget-content">
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" name="functional_area_id[]" id="functional_area_id_{{$functionalArea->functional_area_id}}" value="{{$functionalArea->functional_area_id}}" {{$checked}}>
                                      <label class="form-check-label me-2 mt-2" for="functional_area_id_{{$functionalArea->functional_area_id}}" ></label>
                                      {{str_limit(strip_tags($functionalArea->functional_area), 25, '...')}}  <span style="float:right;">({{App\Job::countNumJobs('functional_area_id', $functionalArea->functional_area_id)}})</span>
                                    </div>
                                </div>               
                          @endif
                          @endforeach
                          @endif                                                
                            </div>
                            <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a>
                        </div>
                        <hr>
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Location</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="specialism">
                              @if(isset($cityIdsArray) && count($cityIdsArray))
                              @foreach($cityIdsArray as $key=>$city_id)
                              @php
                              $city = App\City::where('city_id','=',$city_id)->lang()->active()->first();			  
                              @endphp
                              @if(null !== $city)
                              @php
                            $checked = (in_array($city->city_id, Request::get('city_id', array())))? 'checked="checked"':'';
                      @endphp
                                <div class="widget-content">
                                    <div class="form-check">
                                      <input type="checkbox"  class="form-check-input" name="city_id[]" id="city_{{$city->city_id}}" value="{{$city->city_id}}" {{$checked}}>
                                      <label class="form-check-label me-2 mt-2" for="city_{{$city->city_id}}"></label>
                                      {{$city->city}} <span style="float:right;">({{App\Job::countNumJobs('city_id', $city->city_id)}})</span> 
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @endif
                            </div>
                            <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a>
                        </div>
                        <hr>
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Offered Salary</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#Offeredsalary" role="button" aria-expanded="false" aria-controls="Offeredsalary"> <i class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="Offeredsalary">
                                <div class="widget-content">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="Offeredsalary1">
                                        <label class="form-check-label" for="Offeredsalary1">10k - 20k</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="Offeredsalary2">
                                        <label class="form-check-label" for="Offeredsalary2">20k - 30k</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="Offeredsalary3">
                                        <label class="form-check-label" for="Offeredsalary3">30k - 40k</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="Offeredsalary4">
                                        <label class="form-check-label" for="Offeredsalary4">40k - 50k</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="Offeredsalary5">
                                        <label class="form-check-label" for="Offeredsalary5">50k - 60k</label>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a>
                        </div>
                        <hr>                       
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Role Category</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="specialism">
                            @if(isset($careerLevelIdsArray) && count($careerLevelIdsArray))
                                @foreach($careerLevelIdsArray as $key=>$career_level_id)
                                @php
                                $careerLevel = App\CareerLevel::where('career_level_id','=',$career_level_id)->lang()->active()->first();
                                @endphp
                                @if(null !== $careerLevel)
                                @php
                                $checked = (in_array($careerLevel->career_level_id, Request::get('career_level_id', array())))? 'checked="checked"':'';
			                        @endphp
                                <div class="widget-content">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="career_level_id[]" id="career_level_{{$careerLevel->career_level_id}}" value="{{$careerLevel->career_level_id}}" {{$checked}}>
                                        <label class="form-check-label me-2 mt-2" for="career_level_{{$careerLevel->career_level_id}}"></label>
                                        {{str_limit(strip_tags($careerLevel->career_level), 25, '...')}} <span style="float:right;">({{App\Job::countNumJobs('career_level_id', $careerLevel->career_level_id)}})</span>
                                    </div>                                    
                                </div>                                 
                                  @endif
                              @endforeach
                              @endif 
                            </div>
                            <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a>
                        </div>
                        <hr>
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Qualification</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#qualification" role="button" aria-expanded="false" aria-controls="qualification"> <i class="fas fa-chevron-down"></i></a>
                            </div>
                            <div class="collapse show" id="qualification">
                            @if(isset($degreeLevelIdsArray) && count($degreeLevelIdsArray))
                                    @foreach($degreeLevelIdsArray as $key=>$degree_level_id)
                                    @php
                                    $degreeLevel = App\DegreeLevel::where('degree_level_id','=',$degree_level_id)->lang()->active()->first();
                                    @endphp
                                    @if(null !== $degreeLevel)
                                    @php
                                  $checked = (in_array($degreeLevel->degree_level_id, Request::get('degree_level_id', array())))? 'checked="checked"':'';
                            @endphp
                                <div class="widget-content">
                                    <div class="form-check">
                                      <input type="checkbox"  class="form-check-input" name="degree_level_id[]" id="degree_level_{{$degreeLevel->degree_level_id}}" value="{{$degreeLevel->degree_level_id}}" {{$checked}}>
                                      <label class="form-check-label me-2 mt-2" for="degree_level_{{$degreeLevel->degree_level_id}}"></label>
                                      {{str_limit(strip_tags($degreeLevel->degree_level), 25, '...')}} <span style="float:right;">({{App\Job::countNumJobs('degree_level_id', $degreeLevel->degree_level_id)}})</span>
                                    </div>                                    
                                </div>           
                                @endif
                            @endforeach
                            @endif
                            </div>
                            <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a>
                        </div>                       
                        <hr>
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Industries</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="specialism">
                                @if(isset($industryIdsArray) && count($industryIdsArray))
                                @foreach($industryIdsArray as $key=>$industry_id)
                                @php
                                $industry = App\Industry::where('id','=',$industry_id)->lang()->active()->first();
                                @endphp
                                @if(null !== $industry)
                                @php
                                $checked = (in_array($industry->id, Request::get('industry_id', array())))? 'checked="checked"':'';
                                @endphp
                                <div class="widget-content">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="industry_id[]" id="industry_{{$industry->id}}" value="{{$industry->id}}" {{$checked}}>
                                        <label class="form-check-label me-2 mt-2" for="industry_{{$industry->id}}"></label>
                                        {{str_limit(strip_tags($industry->industry), 25, '...')}} <span style="float:right;">({{App\Job::countNumJobs('industry_id', $industry->id)}})</span>
                                    </div>                          
                                </div>                                                      
                              @endif
                              @endforeach
                              @endif
                            </div>
                            <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a>
                        </div>
                        <hr>                       
                        <div class="widget">
                            <div class="widget-title widget-collapse mb-4">
                                <h6>Kilometer Radius</h6>                               
                            </div>                                  
                            <input id="ex5" class="form-range" type="range" data-min="-5" data-max="20" data-step="1" data-value="0"/>
                        </div>
                        <hr>
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Job Type</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#jobtype" role="button" aria-expanded="false" aria-controls="jobtype"> <i class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="jobtype">
                                @if(isset($jobTypeIdsArray) && count($jobTypeIdsArray))
                                @foreach($jobTypeIdsArray as $key=>$job_type_id)
                                @php
                                $jobType = App\JobType::where('job_type_id','=',$job_type_id)->lang()->active()->first();
                                @endphp
                                @if(null !== $jobType)
                                @php
                              $checked = (in_array($jobType->job_type_id, Request::get('job_type_id', array())))? 'checked="checked"':'';
			                        @endphp
                                <div class="widget-content">
                                    <div class="form-check fulltime-job">
                                    <input type="checkbox" class="form-check-input"  name="job_type_id[]" id="job_type_{{$jobType->job_type_id}}" value="{{$jobType->job_type_id}}" {{$checked}}>
                                    <label class="form-check-label me-2 mt-2"  for="job_type_{{$jobType->job_type_id}}"></label>
                                    {{$jobType->job_type}} <span style="float:right;">({{App\Job::countNumJobs('job_type_id', $jobType->job_type_id)}})</span> 
                                    </div>                                   
                                </div>                               
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="widget">
                            <div class="widget-title widget-collapse">
                                <h6>Job Freshness</h6>
                                <a class="ms-auto" data-bs-toggle="collapse" href="#dateposted" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-chevron-down"></i> </a>
                            </div>
                            <div class="collapse show" id="dateposted">
                                <div class="widget-content">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="dateposted1">
                                        <label class="form-check-label me-2" for="dateposted1">Last hour</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="dateposted2">
                                        <label class="form-check-label" for="dateposted2"> Last 24 hour</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="dateposted3">
                                        <label class="form-check-label" for="dateposted3"> Last 7 days</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="dateposted4">
                                        <label class="form-check-label" for="dateposted4"> Last 14 days</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="dateposted5">
                                        <label class="form-check-label" for="dateposted5"> Last 30 days</label>
                                    </div>
                                </div>
                                <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a>
                            </div>
                            <div class="searchnt mt-3" style="margin-left:10%;" >
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search" aria-hidden="true"></i> {{__('Search Jobs')}}</button>
                            </div>
                        </div>
                        <hr>
                        <div class="employers-grid bg-white mt-4 py-4">
                            <div class="employers-list-details">
                                <div class="employers-list-info">
                                    <div class="employers-list-title">
                                        <h5 class="mb-0" style="font-size:15px;"><a href="employer-detail.html">NEW TO UDHYOG?</a></h5>
                                    </div>

                                    <div class="employers-list-title">
                                        <h6 class="mb-0" style="color: #0028ff;font-size:14px;"><a href="employer-detail.html">REGISTER WITH US</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="employers-list-position">
                                <a class="btn btn-sm btn-primary" href="#">UPLOAD RESUME</a>
                            </div>
                        </div>                        
                    </div>
                </div>

      <div class="col-md-9">
        <!--=================================    right-sidebar -->
        <div class="row">
          <div class="col-md-6 col-lg-6">
            <div class="job-list job-grid">
             <div style="display:flex;">
              <div class="job-list-logo">
                <img class="img-fluid" src="url({{asset('/')}}images/svg/01.svg" alt="">                
              </div>
              <div class="job-list-details" style="margin-left:2%;">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <p class="mb-0"><a href="">Selvam</a></p>
                    <p class="mb-0">Assistant Manager</p>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li> <i class="fas fa-suitcase pe-1"></i> <a href="employer-detail.html" class>Fast Systems Consultants</a> </li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Chennai</li>
                      <li>Skills/Roles I hire for : <p>Fdsgsdgfg asdsadfdsg sdfdsgsdfgh</p></li>                     
                    </ul>
                  </div>
                </div>
              </div>
              </div>
              <div class="job-list-favourite-time"> <a href="{{route('company.followers')}}"" class="btn btn-outline-primary">Follow</a> <a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}" class="btn btn-outline-light" style="color:#00c0ef;">Message</a></div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6">
            <div class="job-list job-grid">
             <div style="display:flex;">
              <div class="job-list-logo">
                <img class="img-fluid" src="url({{asset('/')}}images/svg/01.svg" alt="">                
              </div>
              <div class="job-list-details" style="margin-left: 2%;">
                <div class="job-list-info">
                  <div class="job-list-title">
                    <p class="mb-0"><a href="">Selvam</a></p>
                    <p class="mb-0">Assistant Manager</p>
                  </div>
                  <div class="job-list-option">
                    <ul class="list-unstyled">
                      <li> <i class="fas fa-suitcase pe-1"></i> <a href="employer-detail.html" class>Fast Systems Consultants</a> </li>
                      <li><i class="fas fa-map-marker-alt pe-1"></i>Chennai</li>
                      <li>Skills/Roles I hire for : <p>Fdsgsdgfg asdsadfdsg sdfdsgsdfgh</p></li>                     
                    </ul>
                  </div>
                </div>
              </div>
              </div>
              <div class="job-list-favourite-time"> <a href="#" class="btn btn-outline-primary">Follow</a> <a href="{{ route('company.profile') }}" class="btn btn-outline-light" style="color:#00c0ef;">Message</a></div>
            </div>
          </div>                                  
        </div>        
      </div>
    </div>
  </div>
</section>
<!--=================================
job-grid -->

@include('includes.footer')
    @endsection
