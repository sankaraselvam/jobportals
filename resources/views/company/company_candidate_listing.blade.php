
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
    <div class="row">
      <div class="col-lg-3 mb-0">
        <div class="sidebar">
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Date Posted</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#dateposted" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="dateposted">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted1">
                  <label class="form-check-label" for="dateposted1">Last hour</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted2">
                  <label class="form-check-label" for="dateposted2">Last 24 hour</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted3">
                  <label class="form-check-label" for="dateposted3">Last 7 days</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted4">
                  <label class="form-check-label" for="dateposted4">Last 14 days</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dateposted5">
                  <label class="form-check-label" for="dateposted5">Last 30 days</label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Specialism</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="specialism">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="specialism1">
                  <label class="form-check-label" for="specialism1">IT Contractor</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="specialism2">
                  <label class="form-check-label" for="specialism2">Charity & Voluntary</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="specialism3">
                  <label class="form-check-label" for="specialism3">Digital & Creative</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="specialism4">
                  <label class="form-check-label" for="specialism4">Estate Agency</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="specialism5">
                  <label class="form-check-label" for="specialism5">Graduate</label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Job Type</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#jobtype" role="button" aria-expanded="false" aria-controls="jobtype"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="jobtype">
              <div class="widget-content">
                <div class="form-check fulltime-job">
                  <input type="checkbox" class="form-check-input" id="jobtype1">
                  <label class="form-check-label" for="jobtype1">Full Time</label>
                </div>
                <div class="form-check parttime-job">
                  <input type="checkbox" class="form-check-input" id="jobtype2">
                  <label class="form-check-label" for="jobtype2">Part-Time</label>
                </div>
                <div class="form-check freelance-job">
                  <input type="checkbox" class="form-check-input" id="jobtype3">
                  <label class="form-check-label" for="jobtype3">Freelance</label>
                </div>
                <div class="form-check temporary-job">
                  <input type="checkbox" class="form-check-input" id="jobtype4">
                  <label class="form-check-label" for="jobtype4">Temporary</label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Experience</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#experience" role="button" aria-expanded="false" aria-controls="experience"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="experience">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience1">
                  <label class="form-check-label" for="experience1">Fresher</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience2">
                  <label class="form-check-label" for="experience2">Less than 1 year</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience3">
                  <label class="form-check-label" for="experience3">2 Year</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience4">
                  <label class="form-check-label" for="experience4">3 Year</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="experience5">
                  <label class="form-check-label" for="experience5">4 Year</label>
                </div>
              </div>
            </div>
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
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Gender</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#gender" role="button" aria-expanded="false" aria-controls="gender"><i class="fas fa-chevron-down"></i></a>
            </div>
            <div class="collapse show" id="gender">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="gender1">
                  <label class="form-check-label" for="gender1">Male</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="gender2">
                  <label class="form-check-label" for="gender2">Female</label>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Qualification</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#qualification" role="button" aria-expanded="false" aria-controls="qualification"> <i class="fas fa-chevron-down"></i></a>
            </div>
            <div class="collapse show" id="qualification">
              <div class="widget-content">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="qualification1">
                  <label class="form-check-label" for="qualification1">Matriculation</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="qualification2">
                  <label class="form-check-label" for="qualification2">Intermediate</label>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="qualification3">
                  <label class="form-check-label" for="qualification3">Graduate</label>
                </div>
              </div>
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
          <div class="job-alert-bt">  <h6 class="mb-0"> Showing {{count($job_applied_users)}} applies</h6></div>         
          <div class="job-shortby ms-sm-auto d-flex align-items-center">
            <form class="form-inline">
              <div class="form-group d-flex align-items-center mb-0">
                <label class="justify-content-start me-2">Show</label>
                <div class="short-by">
                  <select class="form-control basic-select">
                    <option>20</option>
                    <option>40</option>
                    <option>80</option>
                    <option>120</option>
                  </select>
                </div>
              </div>
            </form>
            <form class="form-inline">
              <div class="form-group d-flex align-items-center mb-0">
                <label class="justify-content-start me-2">Sort by :</label>
                <div class="short-by">
                  <select class="form-control basic-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                    <option >Newest</option>
                    <option >Oldest</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
          
        </div> 

        <div class="row">
          <div class="col-md-12">
            <div class="secondary-menu" style="margin-top:1%;">
              <ul>
                <li>
                  <input type="checkbox" class="form-check-input mt-2" id="select-all">
                  <label class="form-check-label ps-2 mt-2" for="select-all">Select All</label>
                <li><a href="#"><i class="fas fa-check pe-2"></i>Shortlist</a></li>
                <li><a href="#"><i class="fas fa-registered pe-2"></i>Reject</a></li>
                <li><a href="#"><i class="fas fa-envelope pe-2"></i>Email</a></li>
                <li><a href="#"><i class="fas fa-download pe-2"></i>Download</a></li>
                <li><a href="#"><i class="fas fa-trash pe-2"></i>Delete</a></li>
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
                            <input type="checkbox" class="form-check-input" id="name1">
                            <label class="form-check-label" for="name1">{{ $appliedUsers->user->name }}</label>
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
                      <select class="form-control basic-select select2-hidden-accessible mb-1">
                        <option>Call Status</option>
                        <option>Messaged</option>
                        <option>Call not picked</option>
                        <option>Not Reachable</option>                        
                      </select>
                    </div>
                    <div class="feature-info-content ps-3 text-center">
                      <label class="mb-1 ">{{ $appliedUsers->user->email }}</label>
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
                        <a href="#"><i class="fas fa-trash pe-1"></i></a>
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
  </div>
</section>
<!--=================================
candidate post-box list -->



  @include('includes.footer')
  @endsection
