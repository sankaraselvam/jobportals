
@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<style type="text/css">
  .nav-link {
    color: rgb(110, 110, 110);
    font-weight: 500;
  }
  .nav-link:hover {
    color: #55c57a;
  }

  .nav-pills .nav-link.active {
    color: black;
    background-color: white;
    border-radius: 0.5rem 0.5rem 0 0;
    font-weight: 600;
  }

  .tab-content {
    padding-bottom: 1.3rem;
  }
  a.active {
    border-bottom: 2px solid #eb3131  !important;
  }
  .ps-10{
    padding-left:35%;
  }
  .breadcrumb .active span{
    color:black;
  }
  .bg-default{
    background-color:#dfd8d8;
  }
  .breadcrumb .breadcrumb-item a{
    color: black;
  }
  .btn-primary {
    color: #530dfd;
    margin-left: 536px;
    border-color: #530dfd;
    background:white;
  }
  .spn-top-filter{
    width: auto;
    border: 1px solid silver;
    border-radius: 14px;
    cursor: pointer;
    margin: 6px;
    padding: 6px;
  }
  .spn-top-filter.active{
    background-color: #dbd8d8;
    color: black;
    font-weight: bold;
  }
  .sec-top-filter{
    padding: 16px;
  }
  .side-icon{
    font-size: 22px;
    text-align: center;
    padding: 22px;
  }
  .side-icon >a{
    color: grey;
  }
  
</style>
<!--=================================
banner -->
<section class="header-inner header-inner-big bg-holder text-white" style="background-image: url(images/bg/banner-01.jpg);"> 
</section>
<!--=================================
banner -->

<!--=================================
candidate post-box list -->

<section class="space-ptb">
  <div class="container">
  @include('flash::message')
    <form action="{{route('company.candidate.listing',[$job_id])}}" method="get" id="formName">
    <div class="row">
      <div class="col-lg-3 mb-0">
        <div class="sidebar">
          <!-- <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Relavent Score</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#dateposted" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="dateposted">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted1">
                  <label class="form-check-label" for="dateposted1">High Match</label><span style="float:right;">(5)</span>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted2">
                  <label class="form-check-label" for="dateposted2">Medium Match</label><span style="float:right;">(5)</span>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted3">
                  <label class="form-check-label" for="dateposted3">Low Match</label><span style="float:right;">(5)</span>
                </div>                
              </div>
            </div>
          </div>
          <hr> -->
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
                    <input type="checkbox"  class="form-check-input" name="city_id[]" id="city_{{$city->city_id}}" value="{{$city->city_id}}" {{$checked}} onchange="document.getElementById('formName').submit()">
                    <label class="form-check-label me-2 mt-2" for="city_{{$city->city_id}}"></label>
                    {{$city->city}} <span style="float:right;">({{App\User::countNumJobSeekers('city_id', $city->city_id)}})</span> 
                  </div>
                </div>
              @endif
          @endforeach
          @endif
              <!-- <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a> -->
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Institute</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="specialism">
              @if(isset($institutionsArray) && count($institutionsArray))
                    @foreach($institutionsArray as $key=>$institutions)
                    @php
                    $institution = App\ProfileEducation::where('id','=',$key)->first();			  
                    @endphp
                    @if(null !== $institution)
                    @php
                    $checked = (in_array($institution->id, Request::get('institution', array())))? 'checked="checked"':'';
                    @endphp
                    <div class="widget-content">
                      <div class="form-check">
                        <input type="checkbox"  class="form-check-input" name="institution[]" id="institution_{{$institution->id}}" value="{{$institution->id}}" {{$checked}} onchange="document.getElementById('formName').submit()">
                        <label class="form-check-label me-2 mt-2" for="institution_{{$institution->id}}"></label>
                        {{$institution->institution}} <span style="float:right;">({{App\User::countNumJobSeekers('institutions', $institutions)}})</span> 
                      </div>
                    </div>
                  @endif
              @endforeach
              @endif 
              <!-- <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a> -->
            </div>
          </div>
          <hr>
          <!-- <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Experience</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#experience" role="button" aria-expanded="false" aria-controls="experience"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="experience">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience1">
                  <label class="form-check-label" for="experience1">Fresher</label><span style="float:right;">(5)</span>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience2">
                  <label class="form-check-label" for="experience2">Less than 1 year</label><span style="float:right;">(5)</span>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience3">
                  <label class="form-check-label" for="experience3">2 Year</label><span style="float:right;">(5)</span>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience4">
                  <label class="form-check-label" for="experience4">3 Year</label><span style="float:right;">(5)</span>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience5">
                  <label class="form-check-label" for="experience5">4 Year</label>
                </div>
              </div>
              <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a>
            </div>
          </div>
          <hr> -->
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Salary</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#Offeredsalary" role="button" aria-expanded="false" aria-controls="Offeredsalary"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="Offeredsalary">
            @if(isset($salaryArray) && count($salaryArray))
              @foreach($salaryArray as $key=>$salary)
              @php
              $salary = App\ProfileCareer::where('id','=',$key)->first();	
              @endphp
              @if(null !== $salary)
              @php
              $checked = (in_array($salary->id, Request::get('salary', array())))? 'checked="checked"':'';
              @endphp
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox"  class="form-check-input" name="salary[]" id="salary_{{$salary->id}}" value="{{$salary->id}}" {{$checked}} onchange="document.getElementById('formName').submit()">
                  <label class="form-check-label me-2 mt-2" for="salary_{{$salary->id}}"></label>
                  {{$salary->salary_from}} Lac(s)<span style="float:right;">({{App\User::countNumJobSeekers('salary', $salary->salary_from)}})</span> 
                </div>
              </div>
              @endif
              @endforeach
              @endif
              <!-- <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a> -->
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Company</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#gender" role="button" aria-expanded="false" aria-controls="gender"><i class="fas fa-chevron-down"></i></a>
            </div>
            <div class="collapse show" id="gender">
            @if(isset($companyArray) && count($companyArray))
              @foreach($companyArray as $key=>$curentcCmpy)
              @php
              $company = App\ProfileExperience::where('id','=',$key)->first();
              @endphp
              @if(null !== $company)
              @php
              $checked = (in_array($company->id, Request::get('company_id', array())))? 'checked="checked"':'';
              @endphp
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox"  class="form-check-input" name="company_id[]" id="company_id{{$company->id}}" value="{{$company->id}}" {{$checked}} onchange="document.getElementById('formName').submit()">
                  <label class="form-check-label me-2 mt-2" for="company_id{{$company->id}}"></label>
                  {{$company->company}}<span style="float:right;">({{App\User::countNumJobSeekers('company', $company->company)}})</span> 
                </div>                
              </div>
              @endif
              @endforeach
              @endif
              <!-- <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a> -->
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Designation</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#qualification" role="button" aria-expanded="false" aria-controls="qualification"> <i class="fas fa-chevron-down"></i></a>
            </div>
            <div class="collapse show" id="qualification">
              @if(isset($designationArray) && count($designationArray))
              @foreach($designationArray as $key=>$designations)
              @php
              $designation = App\ProfileExperience::where('id','=',$key)->first();	
              @endphp
              @if(null !== $designation)
              @php
              $checked = (in_array($designation->id, Request::get('designation', array())))? 'checked="checked"':'';
              @endphp
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox"  class="form-check-input" name="designation[]" id="designation_{{$designation->id}}" value="{{$designation->id}}" {{$checked}} onchange="document.getElementById('formName').submit()">
                  <label class="form-check-label me-2 mt-2" for="designation_{{$designation->id}}"></label>
                  {{$designation->title}}<span style="float:right;">({{App\User::countNumJobSeekers('designation', $designation->title)}})</span> 
                </div>
              </div>
              @endif
              @endforeach
              @endif
              <!-- <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a> -->
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>FunctionalArea</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#qualification" role="button" aria-expanded="false" aria-controls="qualification"> <i class="fas fa-chevron-down"></i></a>
            </div>
            <div class="collapse show" id="qualification">
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
                  <input type="checkbox" class="form-check-input" name="functional_area_id[]" id="functional_area_id_{{$functionalArea->functional_area_id}}" value="{{$functionalArea->functional_area_id}}" {{$checked}} onchange="document.getElementById('formName').submit()">
                  <label class="form-check-label me-2 mt-2" for="functional_area_id_{{$functionalArea->functional_area_id}}" ></label>
                  {{str_limit(strip_tags($functionalArea->functional_area), 25, '...')}}  <span style="float:right;">({{App\User::countNumJobSeekers('functional_area_id', $functionalArea->functional_area_id)}})</span>
                </div>        
              </div>
              @endif
              @endforeach
              @endif
              <!-- <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a> -->
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Industry</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#qualification" role="button" aria-expanded="false" aria-controls="qualification"> <i class="fas fa-chevron-down"></i></a>
            </div>
            <div class="collapse show" id="qualification">
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
                          <input type="checkbox" class="form-check-input" name="industry_id[]" id="industry_{{$industry->id}}" value="{{$industry->id}}" {{$checked}} onchange="document.getElementById('formName').submit()">
                          <label class="form-check-label me-2 mt-2" for="industry_{{$industry->id}}"></label>
                          {{str_limit(strip_tags($industry->industry), 25, '...')}} <span style="float:right;">({{App\User::countNumJobSeekers('industry_id', $industry->id)}})</span>
                      </div>                          
                  </div>                                                      
                @endif
                @endforeach
                @endif
              <!-- <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a> -->
            </div>
          </div>
          <hr>
          <!-- <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Education</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#qualification" role="button" aria-expanded="false" aria-controls="qualification"> <i class="fas fa-chevron-down"></i></a>
            </div>
            <div class="collapse show" id="qualification">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="qualification1">
                  <label class="form-check-label" for="qualification1">B.Com</label><span style="float:right;">(5)</span>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="qualification2">
                  <label class="form-check-label" for="qualification2">MBA/PGDM</label><span style="float:right;">(5)</span>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="qualification3">
                  <label class="form-check-label" for="qualification3">Others</label><span style="float:right;">(5)</span>
                </div>
              </div>
              <a class="btn btn-link view_more hide_vm" style="float:right;" href="#"> More </a>
            </div>
          </div>
          <hr> -->
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Gender</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#qualification" role="button" aria-expanded="false" aria-controls="qualification"> <i class="fas fa-chevron-down"></i></a>
            </div>
            <div class="collapse show" id="qualification">
              @if(isset($genderIdsArray) && count($genderIdsArray))
              @foreach($genderIdsArray as $key=>$gender_id)
              @php
              $gender = App\Gender::where('id','=',$gender_id)->lang()->active()->first();
              @endphp
              @if(null !== $gender)
              @php
              $checked = (in_array($gender->id, Request::get('gender_id', array())))? 'checked="checked"':'';
              @endphp
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="gender_id[]" id="gender_{{$gender->id}}" value="{{$gender->id}}" {{$checked}} onchange="document.getElementById('formName').submit()">
                  <label class="form-check-label me-2 mt-2" for="gender_{{$gender->id}}"></label>
                  {{$gender->gender}} <span style="float:right;">({{App\User::countNumJobSeekers('gender_id', $gender->id)}})</span>
                </div>
              </div> 
              @endif
              @endforeach
              @endif             
            </div>
          </div>
          <div class="widget">
            <div class="widget-add">
            <img class="img-fluid" src="images/add-banner.png" alt=""></div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 ">       
        <div class="job-filter d-sm-flex align-items-center"> 
          <div class="job-alert-bt">  
            <h6 class="mb-0"> Showing {{count($job_applied_users)}} applies</h6>
          </div>         
          <div class="job-shortby ms-sm-auto d-flex align-items-center">
            <!-- <form class="form-inline"> -->
              <div class="form-group d-flex align-items-center mb-0">
                <label class="justify-content-start me-2">Show</label>
                <div class="short-by">
                  {{ Form::select('perPage', $pagelimit, $perPage, array('class'=>'form-control basic-select', 'id'=>'perPage', 'onchange' => "document.getElementById('formName').submit()")) }}
                </div>
              </div>
            <!-- </form> -->
            <!-- <form class="form-inline"> -->
              <div class="form-group d-flex align-items-center mb-0">
                <label class="justify-content-start me-2">Sort by :</label>
                <div class="short-by">
                  {{ Form::select('sorting', $sortBy, $sorting, array('class'=>'form-control basic-select', 'id'=>'sorting', 'onchange' => "document.getElementById('formName').submit()")) }}
                </div>
              </div>
            <!-- </form> -->
          </div>
          
        </div> 

        <div class="row">
          <div class="col-md-12">
            <div class="secondary-menu" style="margin-top:1%;">
              <ul>
                <li>
                <input type="checkbox" class="form-check-input mt-2" id="select_all">
                <label class="form-check-label ps-2 mt-2" for="select_all">Select All</label>

                <li><a href="{{route('company.candidate.listing',[$job_id,'shortlist'=>1])}}"><i class="fas fa-check pe-2"></i>Shortlist({{ $shortlistedCount }})</a></li>
                <li><a href="{{route('company.candidate.listing',[$job_id,'rejected'=>1])}}"><i class="fas fa-registered pe-2"></i>Reject({{ $rejectedCount }})</a></li>
                <li><a href="#"><i class="fas fa-envelope pe-2"></i>Email</a></li>
                <li><a href="{{ route('export.candidate.list',[$job_id]) }}"><i class="fas fa-download pe-2"></i>Download</a></li>
                <li><a><i class="fas fa-trash pe-2"></i>Delete</a></li>
              </ul>              
            </div>
           
          </div>
        </div>
        @foreach ($job_applied_users as $appliedUsers)
          @if (isset($appliedUsers->user))
          @php
              $jobSkillArr=[];
              $expData = app('App\Http\Controllers\Company\CompanyController')->getProfileExperienceList($appliedUsers->user_id);             
          @endphp
         
          @foreach ($appliedUsers->user->profileSkills as $skils)
              @php
              $jobSkillArr[]=$skils->jobSkill->job_skill;
              @endphp              
          @endforeach
          <div class="row">            
          <div class="col-lg-12 mb-4 mb-lg-0">
            <div class="jobber-candidate-detail">              
              <div class="border p-3">  
                <div class="row">                   
                  <div class="col-md-7">
                    <div class="candidate-list-details">
                      <div class="candidate-list-info">
                        <div class="candidate-list-title">
                          <h5 class="mb-0">
                          <input type="hidden" class="form-check-input" id="user_id" name="user_id" value="{{ $appliedUsers->user->id }}">
                          <input type="checkbox" class="form-check-input check" id="name1{{ $appliedUsers->user->id }}">                            
                          <label class="form-check-label" for="name1{{ $appliedUsers->user->id }}">{{ $appliedUsers->user->name }}</label>
                          </h5>
                        </div>
                        <div class="candidate-list-option ps-4">
                          <ul class="list-unstyled">
                            <li><i class="fas fa-briefcase pe-1"></i>{{ $expData['expYears'] }}</li>
                            <li><i class="fas fa-filter pe-1"></i>{{ $appliedUsers->user->profileCarrer->salary_from }} Lac {{ $appliedUsers->user->profileCarrer->salary_to }} Thousand</li>
                            <li><i class="fas fa-map-marker-alt pe-1"></i>{{  $appliedUsers->user->street_address }}</li>
                            <li><i class="fas fa-clock  pe-1"></i>{{ isset($expData['experience'][0])?$expData['experience'][0]->notice_period:'' }} notice</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="row ps-2 mt-3">
                      <div class="col-md-12 col-sm-12 mb-3">
                        <div class="feature-info-content ps-3">
                          <label class="mb-0 col-md-2">Current</label>
                          <span class="col-md-6">{{ isset($expData['experience'][0])?$expData['experience'][0]->company:'---' }}</span>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-3">
                        <div class="feature-info-content ps-3">
                          <label class="mb-0 col-md-2">Previous</label>
                          <span class="col-md-6">{{ isset($expData['experience'][1])?$expData['experience'][1]->company:'---' }}</span>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-3">
                        <div class="feature-info-content ps-3">
                          <label class="mb-0 col-md-2">Education</label>
                          <span class="col-md-6">{{ $appliedUsers->user->profileEducation[0]->degreeLevel->degree_level }} {{ $appliedUsers->user->profileEducation[0]->institution}} {{ $appliedUsers->user->profileEducation[0]->date_completion}}</span>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 mb-3">
                        <div class="feature-info-content ps-3">
                          <label class="mb-0 col-md-2">Key skills</label>
                          <span class="col-md-6">{{ implode(' | ',$jobSkillArr) }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">                    
                    <div class="candidate-list-image" style="width:50%;margin-left:30%;">
                    @if ($appliedUsers->user->image !='')
                        <img class="img-fluid " src="{{asset('/')}}user_images/{{$appliedUsers->user->image}}" alt="">
                    @else
                        <img class="img-fluid " src="{{asset('/')}}images/avatar/04.jpg" alt=""> 
                    @endif
                    </div><br>
                    <div class="feature-info-content ps-3 text-center">
                      <label class="mb-1 ">{{ $appliedUsers->user->profileCarrer->jobrole->role }}</label>
                    </div>
                    <div class="feature-info-content ps-3 text-center">
                      <label class="mb-1 ">+91 {{ $appliedUsers->user->mobile_num }} <a href="tel:{{ $appliedUsers->user->mobile_num }}"><i class="fas fa-phone pe-1 fa-rotate-90"></i>Call</a></label>
                    </div>                          
                    <div class="feature-info-content ps-3 text-center">
                      {!! Form::select('change_status', [''=>__('Select Status')]+$callStatus, $appliedUsers->user->candidate_status, array('class'=>'form-control basic-select', 'id'=>'change_status')) !!}
                    </div>
                    <div class="feature-info-content ps-3 text-center">
                      <label class="mb-1 ">{{ $appliedUsers->user->email }}</label>
                    </div> 
                    <div class="row mt-2">
                      <div class="col-md-6" style="margin-right: 5%;">
                        <div class="feature-info-content">
                          @if ($appliedUsers->shortlisted==1)
                            <p style="color:green">Shortlisted</p>
                          @else
                            @if ($appliedUsers->shortlisted==0 && $appliedUsers->rejected==0)
                              <a class="btn btn-info mb-2 btn-sm ps-4" href="{{ route('candidate.shortlist',[$appliedUsers->id,$appliedUsers->job_id]) }}">Shortlist </a> 
                            @endif
                             
                          @endif                  
                      </div>
                      </div>                      
                      <div class="col-md-4">
                          <div class="feature-info-content">
                            @if ($appliedUsers->rejected==1)
                              <p style="color:red">Rejected</p>
                            @else
                              @if ($appliedUsers->shortlisted==0 && $appliedUsers->rejected==0)
                                <a class="btn btn-danger mb-2 btn-sm ps-4" href="{{ route('candidate.rejected', [$appliedUsers->id,$appliedUsers->job_id]) }}">Reject </a>
                              @endif
                            @endif
                          </div> 
                      </div>
                      </div>
                      
                    </div>
                   
                  <div class="col-md-2">
                    <div class="row">
                      <div class="col-md-12 side-icon">
                        <a href="#"><i class="fas fa-envelope pe-1"></i></a>
                      </div>
                     <!-- <div class="col-md-12 side-icon">
                        <a href="#"><i class="fas fa-share pe-1"></i></a>
                      </div>-->
                      <div class="col-md-12 side-icon">
                        <a href="javascript:void(0);" onclick="delete_candidate('{{ $appliedUsers->id }}', '{{ $appliedUsers->job_id }}');"><i class="fas fa-trash pe-1"></i></a>
                      </div>
                      <div class="col-md-12 side-icon">
                        <a href="tel:{{ $appliedUsers->user->mobile_num }}"><i class="fas fa-phone pe-1 fa-rotate-90"></i></a>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
            </div>            
          </div>
        </div>
          @endif
        @endforeach
        <div class="row">
          <div class="col-12 text-center mt-4 mt-sm-5">
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
        </div>
      </div>
    </div>
    </form>
  </div>
</section>
<!--=================================
candidate post-box list -->
@include('includes.footer')
@endsection
@push('scripts')
<script type="text/javascript">
$(function() {
  $("#formname").on("change", "input:checkbox", function(){
            $("#formname").submit();
  });
    
  $('#change_status').on('change', function (e) {
        e.preventDefault();
        $.post("{{ route('change.candidate.status') }}", {user_id: $("#user_id").val(), status_val: $(this).val(), _method: 'POST', _token: '{{ csrf_token() }}'})
        .done(function (response) {
            if (response == 'ok')
            {
              // var redirect = "{{ url('company.candidate.listing') }}"+"/"+job_id;
              // location.replace(redirect);
              $("#change_status").val($(this).val());
              $('#change_status').select2().trigger('change');
            } 
        });
  });

  $('#select_all').on('click',function(){
      if(this.checked){
          $('.check').each(function(){
              this.checked = true;
          });
      }else{
          $('.check').each(function(){
              this.checked = false;
          });
      }
  });
  $('.check').on('click',function(){
      if($('.check:checked').length == $('.check').length){
          $('#select_all').prop('checked',true);
      }else{
          $('#select_all').prop('checked',false);
      }
  });
});  

function delete_candidate(id,job_id) {
  var msg = "{{__('Are you sure! you want to delete?')}}";
  if (confirm(msg)) {
	  $.post("{{ route('delete.apply.candidate') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
			  .done(function (response) {
				  if (response == 'ok')
				  {
            var redirect = "{{ url('company.candidate.listing') }}"+"/"+job_id;
            location.replace(redirect);
				  } else
				  {
					  alert('Request Failed!');
				  }
			  });
  }
}
</script>
@endpush
