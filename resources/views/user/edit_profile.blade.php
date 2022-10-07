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
        
        .category-style-02 ul li {
            margin-bottom: 25px;
            display: block;
            padding-left: 7%;
        }
        
        .secondary-content {
            float: right;
            text-transform: uppercase;
        }
        
        .close {
            outline: medium none !important;
            color: #00c0ef;
            border-radius: 50px;
            background: #fff;
            margin: -50px;
            margin-top: -144px;
            border: 2px solid #dee2e6;
        }
        
        .modal-header {
            border-bottom: #fff!important;
        }
        
        h4 {
            font-size: 20px;
        }
        
        .radio-inline {
            margin-left: 10%;
        }
        
        .select2-container--open{
        z-index:9999999         
        }
        .user-dashboard-info-box
        {
            -webkit-box-shadow: 1px 1px 14px 0px rgba(0, 25, 53, 0.19);
            box-shadow: 1px 1px 14px 0px rgba(0, 25, 53, 0.19);"
        }
        .blog-post-tags li {
    padding: 6px 10px;
    border: 1px solid #eeeeee;
    -webkit-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    border-radius: 3px;
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
                                @if ($user->image !='')
                                    <img class="img-fluid " src="{{asset('/')}}user_images/{{$user->image}}" alt="">
                                @else
                                    <img class="img-fluid " src="{{asset('/')}}images/avatar/04.jpg" alt=""> 
                                @endif
                                <i class="fas fa-pencil-alt" data-bs-toggle="modal" data-bs-target="#personal"></i>
                            </div>
                            <div class="profile-avatar-info ms-4">
                                <h4 class="mt-4" style="color: #fff;text-transform: capitalize;">{{$user->getName()}}</h4>
                                <p style="color: #fff;text-transform: capitalize;">{{ $user->profileCarrer->jobrole->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    
                    @include('job.progress')
                    @include('user.profileDetails')

                </div>
            </div>
        </div>
    </div>
    <!--=================================    inner banner -->
    <!--=================================    Dashboard Nav -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sticky-top secondary-menu-sticky-top">
                        <div class="secondary-menu">
                            <ul class="list-unstyled mb-0">
                                <li><a href="{{route('home')}}">Dashboard</a></li>
                                <li><a class="active" href="{{ route('my.profile') }}">My Profile</a></li>
                                <li><a href="{{ route('candidate.change.password') }}">Change Password</a></li>
                                <li><a href="{{ route('my.job.applications') }}">Manage Jobs</a></li>
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
    <!--=================================    Dashboard Nav -->
    <!--=================================    My Resume -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title-02">
                        <h6>Profile Last updated - 1 day(s) ago</h6>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end ">
                    <!-- <a class="btn btn-primary btn-md mb-4 mb-lg-0" href="my-resume.html">Preview My Resume</a> -->
                </div>
                <div class="col-lg-4 " style="margin-bottom:80px;">
                    <div class="user-dashboard-info-box sticky-top" style=" -webkit-box-shadow: 1px 1px 14px 0px rgba(0, 25, 53, 0.19);box-shadow: 1px 1px 14px 0px rgba(0, 25, 53, 0.19);">
                        <div class="section-title">
                            <h6>Quick Links</h6>
                            <hr>
                        </div>
                        <div class="category-style-02">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#res">
                                        <h6 class="category-title"> Resume</h6><span class="secondary-content ms-auto">UPDATE</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#rh">
                                        <h6 class="category-title">Resume Headline</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#key">
                                        <h6 class="category-title">Key Skills</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#emp">
                                        <h6 class="category-title">Employment</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#edu">
                                        <h6 class="category-title">Education</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#itSkill">
                                        <h6 class="category-title">IT Skill</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#lang">
                                        <h6 class="category-title">Languages</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#pro">
                                        <h6 class="category-title">Projects</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#ps">
                                        <h6 class="category-title">Profile Summary</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                               
                                <li>
                                    <a href="#cp">
                                        <h6 class="category-title">Career Profile</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#pd">
                                        <h6 class="category-title">Personal Details</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" style="margin-bottom:80px;">
                    <div id="res"></div>
                    <form class="form" id="add_edit_profile_cv" method="POST" action="{{ route('store.front.profile.cv', [$user->id]) }}">{{csrf_field()}}
                        <div class="user-dashboard-info-box">
                            <div class="form-group col-md-12 p-0">
                                <h5>Attach Resume</h5>
                                
                                <div id="cv_response_msg"></div>
                                <p>Resume is the most important document recruiters look for. Recruiters generally do not look at profiles without resumes.</p>
                                <div class="text-center">
                                    <input name="cv_file" id="cv_file" type="file" /><br>
                                    <small>Supported Formats: doc, docx, pdf, upto 2 MB</small>
                                    <medium>
                                    @php
                                        echo ImgUploader::get_doc("cvs/".$user->profileCvs->cv_file,"My Resume","My Resume")
                                    @endphp
                                    </medium>
                                </div>

                            </div>
                        </div>
                    </form>
                    <div id="rh"></div>
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-2">
                                <h4 class="mb-0"> Resume Headline</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#headline"> Add Headline</a>
                        </div>

                        <div class="form-group col-md-12 p-0">
                            <div class="form-group col-md-12 p-0">
                                <p>{{ isset($user->profileResumeSummary->summary)?$user->profileResumeSummary->summary:'' }}</p>
                            </div>
                        </div>
                    </div>
                    <!--=================================   Skill -->
                    <div id="key"></div>
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0"> Key Skills</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#keyskill"> Add Skill</a>
                        </div>
                        <div class="blog-post-tags mb-4 align-items-center d-flex">                
                            <ul class="list-inline mb-0 mt-2 mt-sm-0 ms-sm-3">
                                @foreach ($user->profileSkills as $skils)
                                    <li class="list-inline-item">{{ $skils->jobSkill->job_skill }} </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--=================================   Skill -->

                    <!--=================================        Work & Experience -->
                    <div id="emp"></div>
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0">Work & Experience</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary" data-bs-toggle="modal" data-bs-target="#employment" style="border-radius:50px;">Add Experience</a>
                        </div>
                        @if(count($user->profileExperience) > 0)
                        <div class="jobber-candidate-timeline mt-4">
                            <div class="jobber-timeline-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            @foreach ($user->profileExperience as $experience) 
                            <div class="jobber-timeline-item">
                                <div class="jobber-timeline-cricle">
                                    <i class="far fa-circle"></i>
                                </div>
                                <div class="jobber-timeline-info">
                                    <div class="dashboard-timeline-info">
                                        <div class="dashboard-timeline-edit">
                                            <ul class="list-unstyled d-flex">
                                                <li>
                                                    <a class="text-end" href="javascript:void(0);" onclick="showProfileExperienceEditModal('{{$experience->id}}');"> <i class="fas fa-pencil-alt text-info me-2"></i> </a>
                                                </li>
                                                <li><a href="javascript:void(0);" onclick="delete_profile_experience('{{ $experience->id }}');"><i class="far fa-trash-alt text-danger"></i></a></li>
                                            </ul>
                                        </div>
                                        @if ($experience->is_currently_working==1)
                                        <span class="jobber-timeline-time">{{ $experience->emp_working_from_year }} Yr {{ $experience->emp_working_from_month }} Mon - {{ $experience->emp_worked_till }}</span>
                                        @else    
                                        <span class="jobber-timeline-time">{{ $experience->emp_working_from_year }} Yr {{ $experience->emp_working_from_month }} Mon - {{ $experience->emp_working_to_year }} Yr {{ $experience->emp_working_to_month }} Mon</span>
                                        @endif                                        
                                        <h6 class="mb-2">{{ isset($experience->jobRole->role)?$experience->jobRole->role:'' }}</h6>
                                        <span>- {{ $experience->company }}</span>
                                        <p class="mt-2">{{ $experience->description }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <!--=================================     Work & Experience -->

                    <!--=================================     Education -->

                    <div id="edu"></div>
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0">Education</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary" data-bs-toggle="modal" data-bs-target="#Education" style="border-radius:50px;">Add Education</a>
                        </div>
                        @if(count($user->profileEducation) > 0)
                        <div class="jobber-candidate-timeline mt-4">
                            <div class="jobber-timeline-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            @foreach ($user->profileEducation as $education)   
                            <div class="jobber-timeline-item">
                                <div class="jobber-timeline-cricle">
                                    <i class="far fa-circle"></i>
                                </div>
                                <div class="jobber-timeline-info">
                                    <div class="dashboard-timeline-info">
                                        <div class="dashboard-timeline-edit">
                                            <ul class="list-unstyled d-flex">
                                                <li>
                                                    <a class="text-end" href="javascript:void(0);" onclick="showProfileEducationEditModal('{{$education->id}}','{{$education->degree_type_id}}');"> <i class="fas fa-pencil-alt text-info me-2"></i> </a>
                                                </li>
                                                <li><a href="javascript:void(0);" onclick="delete_profile_education('{{$education->id}}');"><i class="far fa-trash-alt text-danger"></i></a></li>
                                            </ul>
                                        </div>
                                        <span class="jobber-timeline-time">{{ $education->date_completion }} - Pres</span>
                                        <h6 class="mb-2">{{ $education->degreeType->degree_type }}</h6>
                                        <span>- {{ $education->institution }}</span>
                                        <p class="mt-2"></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <!--=================================     Education  -->

                    <!--=================================     IT Skill -->
                    <div id="itSkill"></div>
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0">IT Skills</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary" data-bs-toggle="modal" data-bs-target="#itskills" style="border-radius:50px;">Add Details</a>
                        </div>
                        <div class="collapse show" id="dateposted-15">
                            <div class="bg-light p-3 mt-4">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Skills</th>
                                            <th>Version</th>
                                            <th>Last Used</th>
                                            <th>UsedExperience</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->ProfileItSkills as $skill)
                                        <tr>
                                            <td>{{ $skill->skill_name }}</td>
                                            <td>{{ $skill->version }}</td>
                                            <td>{{ $skill->last_used }}</td>
                                            <td>{{ $skill->experience_from }} Year {{ $skill->experience_to }} Months </td>
                                            <td><a href="javascript:void(0);" onclick="delete_profile_it_skill('{{$skill->id}}');"><i class="fas fa-trash-alt text-danger"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--=================================       IT Skill -->

                    <!--=================================     Languages -->
                    <div id="lang"></div>
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0">Add Languages</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary" data-bs-toggle="modal" data-bs-target="#language" style="border-radius:50px;">Add language</a>
                        </div>
                        <div class="collapse show" id="dateposted-15">
                            <div class="bg-light p-3 mt-4">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Languages</th>
                                            <th>Proficiency</th>
                                            <th>Read</th>
                                            <th>Write</th>
                                            <th>Speak</th>                                            
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->profileLanguages as $data)
                                        <tr>
                                            <td>{{ $data->language->lang }}</td>
                                            <td>{{ $data->languageLevel->language_level }}</td>
                                            @if ($data->language_read==1)
                                            <td><i class="fa fa-check" style="color:green;"></i></td>
                                            @else
                                            <td><i class="fa fa-times" style="color:red;"></i></td> 
                                            @endif
                                            @if ($data->language_write==1)
                                            <td><i class="fa fa-check" style="color:green;"></i></td>
                                            @else
                                            <td><i class="fa fa-times" style="color:red;"></i></td> 
                                            @endif
                                            @if ($data->language_speak==1)
                                            <td><i class="fa fa-check" style="color:green;"></i></td>
                                            @else
                                            <td><i class="fa fa-times" style="color:red;"></i></td> 
                                            @endif
                                            <td><a href="javascripr:;" onclick="delete_profile_language('{{$data->id}}');"><i class="fas fa-trash-alt text-danger"></i></a></td>  
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--=================================       IT Skill -->


                    <!--=================================Start Projects-->
                    <div id="pro"></div>
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0">Projects</h4>
                                <small>Add details about projects you have done in college, internship or at work.</small>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary mb-4" id="add_project" data-bs-toggle="modal" data-bs-target="#projects"> Add Projects</a>
                        </div>
                        @if(count($user->profileProjects)>0)
                        <div class="jobber-candidate-timeline mt-4">
                            <div class="jobber-timeline-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            @foreach ($user->profileProjects as $project)
                            <div class="jobber-timeline-item">
                                <div class="jobber-timeline-cricle">
                                    <i class="far fa-circle"></i>
                                </div>
                                <div class="jobber-timeline-info">
                                    <div class="dashboard-timeline-info">
                                        <div class="dashboard-timeline-edit">
                                            <ul class="list-unstyled d-flex">
                                                <li>
                                                    <a class="text-end" href="javascript:void(0);" onclick="showProfileProjectEditModal('{{$project->id}}');"> <i class="fas fa-pencil-alt text-info me-2"></i> </a>
                                                </li>
                                                <li><a href="javascript:void(0);" onclick="delete_profile_project('{{$project->id}}');"><i class="far fa-trash-alt text-danger"></i></a></li>
                                            </ul>
                                        </div>                                        
                                        <h6 class="mb-2">{{ $project->name }}</h6>
                                        <span>- {{ $project->url }}</span>
                                        <br>
                                        @if ($project->project_status=="1")
                                            <span class="jobber-timeline-time"><i>{{ $project->working_from_year }} Yr {{ $project->working_from_month }} Mon - {{ $project->worked_till }}</i></span>
                                        @else
                                            <span class="jobber-timeline-time"><i>{{ $project->working_from_year }} Yr {{ $project->working_from_month }} Mon - {{ $project->working_to_year }} Yr {{ $project->working_to_month }} Mon</i></span>
                                        @endif
                                        <p class="mt-2">{{ $project->description }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <!--================================= End Projects-->


                    <!--=================================Profile Summary-->
                    <div id="ps"></div>

                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0">Profile Summary</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#profilesummary"> Add Profile Summary</a>
                        </div>
                        <small>{{ $user->profileSummary->summary }}</small>
                    </div>

                    <!--================================= End Profile Summary-->

                     
                    <!--=================================Career Profile -->
                    <div id="cp"></div>
                    @php
                        $cityArray=[];
                        $cityidArray=[];
                   
                    foreach ($user->profileCarrer->cities as $location){
                        $cityArray[]=$location->city;
                        $cityidArray[]=$location->id;
                    }
                  
                    @endphp
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-2">
                                <h4 class="mb-0">Career Profile</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#career"> Add Career</a>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label>Current Industry</label>
                                    <p style="color: #000;">{{ $user->profileCarrer->industry->industry }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Availability to Join</label>
                                    <p style="color: #000;">{{ date("d-M-Y", strtotime($user->profileCarrer->date_of_join)) }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Desired Employment Type</label>
                                    <p style="color: #000;">{{ $user->profileCarrer->jobShift->job_shift }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Preferred Work Location</label>
                                    <p style="color: #000;">{{ implode(' , ',$cityArray) }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Expected Salary</label>
                                    <p style="color: #000;">INR {{ $user->profileCarrer->salary_from }} Lakh(s) {{ $user->profileCarrer->salary_to }} Thousand </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label>Department</label>
                                    <p style="color: #000;">{{ $user->profileCarrer->functionalArea->functional_area }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Job Role</label>
                                    <p style="color: #000;">{{ $user->profileCarrer->jobrole->role }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Desired Job Type</label>
                                    <p style="color: #000;">{{ $user->profileCarrer->jobType->job_type }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Desired Shift</label>
                                    <p style="color: #000;">
                                    @php
                                        $working_from='';
                                        if($user->profileCarrer->working_from==1){
                                            $working_from='Day';
                                        }else if($user->profileCarrer->working_from==2)
                                        {
                                            $working_from='Night';
                                        }else if($user->profileCarrer->working_from==3){
                                            $working_from='Flexible';
                                        }
                                    @endphp
                                    {{ $working_from }}
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!--================================= End Career Profile-->

                    <!--=================================Career Profile -->
                   <section id="pd">
                
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-2">
                                <h4 class="mb-0">Personal Details</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#personal"> Add Personal Details</a>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label>Date of Birth</label>
                                    <p style="color: #000;">{{ date("d-M-Y", strtotime($user->date_of_birth)) }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Gender</label>
                                    <p style="color: #000;">{{ $user->gender->gender }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Marital Status</label>
                                    <p style="color: #000;">{{ $user->maritalStatus->marital_status }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Category</label>
                                    <p style="color: #000;">General</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label>Permanent Address</label>
                                    <p style="color: #000;">{{ $user->street_address }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Area Pin Code</label>
                                    <p style="color: #000;">{{ $user->pincode }}</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Hometown</label>
                                    <p style="color: #000;">{{ $user->homedown }}</p>
                                </div> 
                                <div class="form-group mb-4">
                                    <label>Work permit of other countries</label>
                                    <p style="color: #000;">India</p>
                                </div>                               
                            </div>
                        </div>
                    </div>
                   </section>
                    <!--================================= End Career Profile-->


                </div>
            </div>
        </div>
    </section>
    <!--=================================    Resume HeadLine -->
    <div class="modal fade" id="headline" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 30px 78px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center">Resume Headline</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>          
                </div>
                <div id="headline_response_msg"></div>
                <div class="modal-body">
                    <p>It is the first thing recruiters notice in your profile. Write concisely what makes you unique and right person for the job you are looking for.</p>
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                            <form class="form" id="add_edit_resume_headline" method="POST" action="{{ route('update.profile.resume.summary', [$user->id]) }}">
                            {{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <textarea class="form-control" name="summary" id="summary" rows="4" placeholder="Type here..">{{ isset($user->profileResumeSummary->summary)?$user->profileResumeSummary->summary:'' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger d-grid" id="profileHeadlineBtnCloseIt" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn  btn-primary d-grid" id="profileHeadlineBtnSaveIt" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================================  Resume HeadLine -->

    <!--=================================    Key Skills -->
    @php
        $jobSkillArr=[];
    @endphp
    @foreach ($user->profileSkills as $skils)
        @php
        $jobSkillArr[]=$skils->job_skill_id;
        @endphp
        
    @endforeach
    <div class="modal fade" id="keyskill" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 30px 78px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center">Key Skills</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>          
                </div>
                <div id="keyskill_response_msg"></div>
                <div class="modal-body">
                    <p>Tell recruiters what you know or what you are known for e.g. Direct Marketing, Oracle, Java etc. We will send you job recommendations based on these skills. Each skill is separated by a comma.</p>
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                            <form class="form" id="add_edit_keyskill" method="POST" action="{{ route('store.front.profile.skill',[$user->id]) }}">
                                {{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group col-12">
                                        {!! Form::select('job_skill_id[]', $jobSkills, $jobSkillArr, array('class'=>'form-control js-example-jobskill-multiple', 'id'=>'job_skill_id', 'multiple'=>'multiple')) !!}
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger d-grid" id="jobSkillBtnCloseIt" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn  btn-primary d-grid" id="jobSkillBtnSaveIt" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================================  Key Skills -->

    <!--=================================    Employment -->
    <div class="modal fade" id="employment" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 30px 78px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center">Add Employment</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>          
                </div>
                <div id="experience_response_msg"></div>
                <div class="modal-body">
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                            <form class="form" id="add_edit_profile_experience" method="POST" action="{{ route('store.front.profile.experience', [$user->id]) }}">{{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="Email2">Your Designation <span style="color: red;">*</span></label>
                                            {!! Form::select('job_role_id', [''=>__('Select Designation')]+$jobRole, '', array('class'=>'form-control basic-select', 'id'=>'job_role_id')) !!}
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Your Organization <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="organization" id="organization" placeholder="Type Your Organization">
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Is this your current company? <span style="color: red;">*</span></label><br>
                                            <label>
                                              <input class="form-group is_currently_working" type="radio" name="is_currently_working"  value="1" checked> Yes
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="is_currently_working" class="form-group is_currently_working" value="0"> No
                                            </label>
                                        </div>
                                        <div class="form-group col-10 mb-2">
                                            <div class="row">
                                                <label class="mb-2">Started Working From <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    {!! Form::select('emp_working_from_year', [''=>__('Select Year')]+MiscHelper::getYear(), null, array('class'=>'form-control basic-select', 'id'=>'emp_working_from_year')) !!}
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                    {!! Form::select('emp_working_from_month', [''=>__('Select Month')]+MiscHelper::getMonth(), null, array('class'=>'form-control basic-select', 'id'=>'emp_working_from_month')) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-2">
                                            <div class="row emp_worked_till">
                                                <label class="mb-2">Worked Till<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select" name="emp_worked_till" id="emp_worked_till">
                                                        <option value="present">Present</option>                                                     
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="row" id="emp_working_to">
                                                <label class="mb-2">Started Working To <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    {!! Form::select('emp_working_to_year', [''=>__('Select Year')]+MiscHelper::getYear(), null, array('class'=>'form-control basic-select', 'id'=>'emp_working_to_year')) !!}
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                    {!! Form::select('emp_working_to_month', [''=>__('Select Month')]+MiscHelper::getMonth(), null, array('class'=>'form-control basic-select', 'id'=>'emp_working_to_month')) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-4">
                                            <div class="row">
                                                <label class="mb-2">Current Salary<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                {!! Form::select('emp_salary_from', [''=>__('Select Lakhs')]+MiscHelper::getSalaryLakhs(), null, array('class'=>'form-control basic-select', 'id'=>'emp_salary_from')) !!}
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                {!! Form::select('emp_salary_to', [''=>__('Select Thousands')]+MiscHelper::getSalaryThousands(), null, array('class'=>'form-control basic-select', 'id'=>'emp_salary_to')) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="Email2">Skills Used <span style="color: red;">*</span></label>
                                            {!! Form::select('job_skills_id[]', $jobSkills, null, array('class'=>'form-control js-example-jobskills-multiple', 'id'=>'job_skills_id', 'multiple'=>'multiple')) !!}
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="Email2 ">Job Profile <span style="color: red;">*</span></label>
                                            <textarea class="form-control" name="job_profile" id="job_profile" rows="4" placeholder="Type here.."></textarea>
                                            <p style="text-align:right;">1000 character(s) left</p>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <label class="mb-2">Notice Period<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-12 select-border mb-3">
                                                    <select class="form-control basic-select" name="notice_period" id="notice_period">
                                                      <option value="">Select Notice Period</option>
                                                      <option value="15 Days or less">15 Days or less</option>
                                                      <option value="1 Months">1 Months</option>
                                                      <option value="2 Months">2 Months</option> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger d-grid" id="experienceBtnCloseIt" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn  btn-primary d-grid" id="experienceBtnSaveIt" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================================   Employment -->

    <!--=================================    Education -->
    <div class="modal fade" id="Education" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 20px 25px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center">Add Education</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>          
                </div>
                <div id="eduction_response_msg"></div>
                <div class="modal-body">
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="form" id="add_edit_profile_education" method="POST" action="{{ route('store.front.profile.education', [$user->id]) }}">{{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Education <span style="color: red;">*</span></label>
                                            {!! Form::select('degree_level_id', [''=>__('Select Education')]+$degreeLevels, '', array('class'=>'form-control basic-select', 'id'=>'degree_level_id')) !!}

                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Course <span style="color: red;">*</span></label>
                                            <span id="degree_types_dd">{!! Form::select('degree_type_id', [''=>__('Select Course')], null, array('class'=>'form-control basic-select', 'id'=>'degree_type_id')) !!}</span>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Specialization <span style="color: red;">*</span></label>
                                            {!! Form::select('major_subjects[]', $majorSubjects, null, array('class'=>'form-control select2-multiple basic-select', 'id'=>'major_subjects', 'multiple'=>'multiple')) !!}
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="Email2">University/Institute <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="institution" id="institution" placeholder="Select university/institute">
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Course Type <span style="color: red;">*</span></label><br>
                                            <div class="form-group">
                                                <label>
                                              <input class="form-group" type="radio" name="course_type" value="1" checked> Full Time
                                            </label>
                                                <label class="radio-inline">
                                              <input type="radio" name="course_type" value="2"> Part Time
                                            </label>
                                                <label class="radio-inline">
                                                <input type="radio" name="course_type" value="3"> Correspondence/Distance learning
                                              </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <label class="mb-2">Passing Out Year <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    {!! Form::select('date_completion', [''=>__('Select Year')]+MiscHelper::getYear(), null, array('class'=>'form-control basic-select', 'id'=>'date_completion')) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <label class="mb-2">Grading System<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-12 select-border mb-3">
                                                {!! Form::select('result_type_id', [''=>__('Select Result Type')]+$resultTypes, '', array('class'=>'form-control basic-select', 'id'=>'result_type_id')) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger d-grid" id="educationBtnCloseIt" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn  btn-primary d-grid" id="educationBtnSaveIt" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================================   Education -->

    <!--=================================   IT Skills  -->
    <div class="modal fade" id="itskills"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 30px 78px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center"> IT Skills</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>          
                </div>
                <div id="itskills_response_msg"></div>
                <div class="modal-body">
                    <p style="color:#000;">Specify details about programming languages (such as Java, Python, C/C++, Oracle, SQL etc), softwares (Microsoft Word, Excel, Tally etc) or any other software related knowledge.</p>
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                            <form class="form" id="add_edit_itskills" method="POST" action="{{ route('add.profile.it.skill') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <div class="row">
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="Email2"> Skill / Software Name<span style="color: red;">*</span></label>
                                            <input type="text" name="skill_name" class="form-control" id="Email22" placeholder="Please enter ">
                                        </div>

                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <label class="mb-2" for="Email2">Version <span style="color: red;">*</span></label>
                                                    <input type="text" name="version" class="form-control" id="Email22" placeholder="Version">
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <label class="mb-2" for="Email2">Last Used </label>
                                                    <select class="form-control basic-select" name="last_used">
                                                        <option value="">Please select</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option> 
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <label class="mb-2" for="Email2">Experience</label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select" name="experience_from">
                                                        <option value="">Years</option>
                                                        <option value="0">0 Years</option>
                                                        <option value="1">1 Years</option>
                                                        <option value="2">2 Years</option>
                                                        <option value="3">3 Years</option>
                                                        <option value="4">4 Years</option>
                                                        <option value="5">5 Years</option>
                                                        <option value="6">6 Years</option> 
                                                        <option value="7">7 Years</option> 
                                                        <option value="8">8 Years</option> 
                                                        <option value="9">9 Years</option> 
                                                        <option value="10">10 Years</option> 
                                                  </select>
                                                </div>

                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select" name="experience_to">
                                                        <option value="">Months</option>
                                                        <option value="0">0 Months</option>
                                                        <option value="1">1 Months</option>
                                                        <option value="2">2 Months</option>
                                                        <option value="3">3 Months</option>
                                                        <option value="4">4 Months</option>
                                                        <option value="5">5 Months</option>
                                                        <option value="6">6 Months</option> 
                                                        <option value="7">7 Months</option> 
                                                        <option value="8">8 Months</option> 
                                                        <option value="9">9 Months</option> 
                                                        <option value="10">10 Months</option> 
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger d-grid" id="skillBtnCloseIt" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn  btn-primary d-grid" id="skillBtnSaveIt" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================================= IT Skills   -->

    
    <!--=================================   Language  -->
    <div class="modal fade" id="language"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 30px 78px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center"> Languages</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>          
                </div>
                <div id="language_response_msg"></div>
                <div class="modal-body">                    
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                            <form class="form" id="add_edit_profile_language" method="POST" action="{{ route('store.front.profile.language', [$user->id]) }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <label class="mb-2" for="Email2">Language<span style="color: red;">*</span></label>
                                                    {!! Form::select('language_id', ['' =>__('Select Language')]+$languages, null, array('class'=>'form-control basic-select', 'id'=>'language_id')) !!}
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <label class="mb-2" for="Email2">Proficiency <span style="color: red;">*</span></label>
                                                    {!! Form::select('language_level_id', ['' =>__('Select Language Level')]+$languagesLevel, null, array('class'=>'form-control basic-select', 'id'=>'language_level_id')) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <div class="row">                                                
                                                <div class="form-group col-md-12 select-border mb-3">
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input form-group" type="checkbox" id="inlineCheckbox1" name="language_read" value="1">
                                                    <label class="form-check-label">Read</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input form-group" type="checkbox" id="inlineCheckbox2" name="language_write" value="1">
                                                    <label class="form-check-label">Write</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input form-group" type="checkbox" id="inlineCheckbox3" name="language_speak" value="1">
                                                    <label class="form-check-label">Speak</label>
                                                    </div> 
                                                </div>                                             
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger d-grid" id="languageBtnCloseIt" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn  btn-primary d-grid" id="languageBtnSaveIt" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================================= IT Skills   -->


    <!--=============== Projects -->
    <div class="modal fade" id="projects" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 30px 78px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center">Projects</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>          
                </div>
                <div id="project_response_msg"></div>
                <div class="modal-body">
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active">
                            <form class="form" id="add_edit_project" method="POST" action="{{ route('store.front.profile.project', [$user->id]) }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Project Title <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="project_title" id="project_title" placeholder="Enter Project Title">
                                        </div>
                                        
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Company / College Name<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" name="organization_name" id="organization_name"  placeholder="Enter the Company / College Name">
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Project Status <span style="color: red;">*</span></label><br>
                                            <div class="form-group">
                                                <label>
                                              <input class="form-group project_status" type="radio" name="project_status" value="1" checked> In Progress
                                            </label>
                                            <label class="radio-inline">
                                              <input class="form-group project_status" type="radio" name="project_status" value="2"> Finished
                                            </label>

                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-2 working_from">
                                            <div class="row">
                                                <label class="mb-2">Started Working From <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select" name="working_from_year" id="working_from_year">
                                                        <option value="">Years</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>
                                                  </select>
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                    <select class="form-control basic-select" name="working_from_month" id="working_from_month">
                                                        <option value="">Months</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option> 
                                                        <option value="7">7</option> 
                                                        <option value="8">8</option> 
                                                        <option value="9">9</option> 
                                                        <option value="10">10</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-2 worked_till">
                                            <div class="row">
                                                <label class="mb-2">Worked Till<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select" name="worked_till" id="worked_till">
                                                        <option value="present">Present</option>                                                     
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-2 working_to">
                                            <div class="row">
                                                <label class="mb-2">Started Working To <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select" name="working_to_year" id="working_to_year">
                                                        <option value="">Years</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>
                                                  </select>
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                    <select class="form-control basic-select" name="working_to_month" id="working_to_month">
                                                        <option value="">Months</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option> 
                                                        <option value="7">7</option> 
                                                        <option value="8">8</option> 
                                                        <option value="9">9</option> 
                                                        <option value="10">10</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Details of Project<span style="color: red;">*</span></label>
                                            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                                           
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger d-grid" id="projectBtnCloseIt" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn  btn-primary d-grid" id="projectBtnSaveIt" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================== End Projects-->
    <!--=============== Profile Summary -->
    <div class="modal fade" id="profilesummary" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 30px 78px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center">Profile Summary</h4>                    
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>               
                </div>
                <div id="summary_response_msg"></div>
                <div class="modal-body">
                    <small>Your Profile Summary should mention the highlights of your career and education, what your professional interests are, and what kind of a career you are looking for. Write a meaningful summary of more than 50 characters.</small>
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                            <form class="form" id="add_edit_profile_summary" method="POST" action="{{ route('update.front.profile.summary', [$user->id]) }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <textarea class="form-control" name="summary" id="summary" rows="4" placeholder="Type here..">{{ $user->profileSummary->summary }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger d-grid" id="profilesummaryBtnCloseIt" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn  btn-primary d-grid" id="profilesummaryBtnSaveIt" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================== Profile Summary-->

    <!--=============== Career Profile -->
    <div class="modal fade" id="career" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 30px 78px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center">Career Profile</h4>                    
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                     
                </div>
                <div id="career_response_msg"></div>
                <div class="modal-body">
                <p style="color:#000;">This information will help the recruiters and udhyog know about your current job profile and also your desired job criteria. This will also help us personalize your job recommendations.</p>
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active">
                            <form class="form" id="add_edit_career_details" method="POST" action="{{ route('update.career.details') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" value="{{$user->id}}">
                                <input type="hidden" id="profile_career_id" name="profile_career_id" value="{{$user->profileCarrer->id}}">
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Current Industry <span style="color: red;">*</span></label>
                                            {!! Form::select('industry_id', ['' =>__('Select Industry')]+$industries, $user->profileCarrer->industry_id, array('class'=>'form-control basic-select', 'id'=>'industry_id')) !!}
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Department <span style="color: red;">*</span></label>
                                            {!! Form::select('functional_area_id', ['' => __('Select Functional Area')]+$functionalAreas, $user->profileCarrer->functional_area_id, array('class'=>'form-control basic-select', 'id'=>'functional_area_id')) !!}
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Job Role <span style="color: red;">*</span></label>
                                            <span id="default_role_dd">{!! Form::select('role_id', ['' => __('Select Role')], null, array('class'=>'form-control basic-select', 'id'=>'role_id')) !!}  </span>
                                        </div>
                                       
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Desired Employment Type <span style="color: red;">*</span></label><br>
                                            <div class="form-group">
                                            {!! Form::select('job_type_id', ['' => __('Select Job Type')]+$jobTypes, $user->profileCarrer->job_type_id, array('class'=>'form-control basic-select', 'id'=>'job_type_id')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Desired Employment Type <span style="color: red;">*</span></label><br>
                                            <div class="form-group">
                                            {!! Form::select('job_shift_id', ['' => __('Select Job Shift')]+$jobShifts, $user->profileCarrer->job_shift_id, array('class'=>'form-control basic-select', 'id'=>'job_shift_id')) !!}   
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Date of join <span style="color: red;">*</span></label><br>
                                            <div class="form-group col-md-12 select-border mb-3">      
                                            <input type="text" name="date_of_join" id="date_of_join"  class="form-control datepicker" value="{{date('Y-m-d', strtotime($user->profileCarrer->date_of_join))}}" placeholder="Date of join" >                      
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-2">
                                            <div class="row">
                                                <label class="mb-2">Started Working From <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-12 select-border mb-3">
                                                    <label class="radio-inline">
                                                        <input class="form-group" type="radio" name="working_from" value="1" {{ ($user->profileCarrer->working_from=="1")? "checked" : "" }}> Day
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input class="form-group" type="radio" name="working_from" value="2" {{ ($user->profileCarrer->working_from=="2")? "checked" : "" }}> Night
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  class="form-group" name="working_from" value="3" {{ ($user->profileCarrer->working_from=="3")? "checked" : "" }}> Flexible
                                                    </label>                                                    
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Location <span style="color: red;">*</span></label><br>
                                            <div class="form-group">
                                            {!! Form::select('city_id[]', $cities, $cityidArray, array('class'=>'form-control js-example-basic-multiple', 'id'=>'city_id','multiple'=>'multiple')) !!} 
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-2">                                           
                                            <div class="row">
                                                <label class="mb-2">Expexted Salary<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select" name="salary_from" id="salary_from">
                                                      <option value="0">0 Lac</option>
                                                      <option value="1">1 Lac</option>
                                                      <option value="2">2 Lac</option> 
                                                      <option value="3">3 Lac</option> 
                                                      <option value="4">4 Lac</option> 
                                                      <option value="5">5 Lac</option> 
                                                      <option value="6">6 Lac</option> 
                                                      <option value="7">7 Lac</option> 
                                                      <option value="8">8 Lac</option> 
                                                      <option value="9">9 Lac</option> 
                                                      <option value="10">10 Lac</option> 
                                                      <option value="11">11 Lac</option> 
                                                      <option value="12">12 Lac</option> 
                                                      <option value="13">13 Lac</option> 
                                                      <option value="14">14 Lac</option> 
                                                      <option value="15">15 Lac</option> 
                                                      <option value="16">16 Lac</option> 
                                                      <option value="17">17 Lac</option> 
                                                      <option value="18">18 Lac</option> 
                                                      <option value="19">19 Lac</option> 
                                                      <option value="20">20 Lac</option> 
                                                      <!-- <option value="">21 Lac</option> 
                                                      <option value="">22 Lac</option> 
                                                      <option value="">23 Lac</option> 
                                                      <option value="">24 Lac</option> 
                                                      <option value="">25 Lac</option> 
                                                      <option value="">26 Lac</option> 
                                                      <option value="">27 Lac</option> 
                                                      <option value="">28 Lac</option> 
                                                      <option value="">29 Lac</option> 
                                                      <option value="">30 Lac</option> 
                                                      <option value="">31 Lac</option> 
                                                      <option value="">32 Lac</option> 
                                                      <option value="">33 Lac</option> 
                                                      <option value="">34 Lac</option> 
                                                      <option value="">35 Lac</option> 
                                                      <option value="">36 Lac</option> 
                                                      <option value="">37 Lac</option> 
                                                      <option value="">38 Lac</option> 
                                                      <option value="">39 Lac</option> 
                                                      <option value="">40 Lac</option>  -->
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                    <select class="form-control basic-select" name="salary_to" id="salary_to">
                                                      <option value="0">0 Thousand</option>
                                                      <option value="5">5 Thousand</option>
                                                      <option value="10">10 Thousand</option> 
                                                      <option value="15">15 Thousand</option> 
                                                      <option value="20">20 Thousand</option> 
                                                      <option value="25">25 Thousand</option> 
                                                      <option value="30">30 Thousand</option> 
                                                      <option value="35">35 Thousand</option> 
                                                      <option value="40">40 Thousand</option> 
                                                      <option value="45">45 Thousand</option> 
                                                      <option value="50">50 Thousand</option> 
                                                      <option value="55">55 Thousand</option> 
                                                      <option value="60">60 Thousand</option> 
                                                      <option value="65">65 Thousand</option> 
                                                      <option value="70">70 Thousand</option> 
                                                      <option value="75">75 Thousand</option> 
                                                      <option value="80">80 Thousand</option> 
                                                      <option value="85">85 Thousand</option> 
                                                      <option value="90">90 Thousand</option> 
                                                      <option value="95">95 Thousand</option>                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger d-grid" id="careeBtnCloseIt" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn  btn-primary d-grid" id="careerBtnSaveIt" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================== End Career Profile-->

    <!--=============== Personal Details -->
    <div class="modal fade" id="personal" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 30px 78px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center">Personal Details</h4>                    
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>          
                </div>
                <div id="response_msg"></div>
                <div class="modal-body">
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active">                                
                                <form class="form" id="add_edit_personal_details" method="POST" action="{{ route('update.personal.details') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="id" name="id" value="{{$user->id}}">
                                    <div class="row">
                                        <div class="cover-photo-contact">
                                            <div class="upload-file">
                                              <label for="formFile" class="form-label">Upload Profile Image</label>
                                              <input class="form-control" type="file" name="profile_image" id="profile_image">
                                            </div>
                                          </div>

                                        <div class="form-group col-6 mb-2">
                                            <div class="row">
                                                <label class="mb-2">Date Of Birth <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-12 select-border mb-3">      
                                                    <input type="text" name="date_of_birth" id="date_of_birth" value="{{date('Y-m-d', strtotime($user->date_of_birth))}}" class="form-control datepicker" placeholder="Date of Birth" >                      
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6 mb-2">
                                            <label class="mb-2" for="Email2">Gender<span style="color: red;">*</span></label>
                                            {!! Form::select('gender_id', ['' => __('Select Gender')]+$genders, $user->gender_id, array('class'=>'form-control basic-select', 'id'=>'gender_id')) !!}
                                        </div>
                                        <div class="form-group col-6 mb-2">
                                            <label class="mb-2" for="Email2">Marital Status<span style="color: red;">*</span></label>
                                                {!! Form::select('marital_status_id', ['' => 'Select Marital Status']+$maritalStatuses, $user->marital_status_id, array('class'=>'form-control basic-select', 'id'=>'marital_status_id')) !!}
                                        </div>
                                        <div class="form-group col-6 mb-2">
                                            <label class="mb-2" for="Email2">Category<span style="color: red;">*</span></label>
                                            {!! Form::select('category_id', ['' => 'Select Category']+$category, $user->category_id, array('class'=>'form-control basic-select', 'id'=>'category_id')) !!}
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Permanent Address<span style="color: red;">*</span></label>
                                            <input type="text" name="street_address" value="{{$user->street_address}}" id="street_address" class="form-control" placeholder="Enter your Permanent Address">
                                        </div>
                                        <div class="form-group col-6 mb-4">
                                            <label class="mb-2" for="password2">Home Town <span style="color: red;">*</span></label><br>
                                            <div class="form-group col-12 mb-2">                                               
                                              <input class="form-control" id="hometown" value="{{$user->homedown}}"  type="text" name="hometown" placeholder="Enter your HomeTown" >                                            
                                            </div>                                            
                                        </div>
                                        <div class="form-group col-6 mb-4">
                                            <label class="mb-2" for="password2">Pincode <span style="color: red;">*</span></label><br>
                                            <div class="form-group col-12 mb-2">                                               
                                              <input class="form-control" type="text" value="{{$user->pincode}}"  id="pincode" name="pincode" placeholder="Enter your Pincode" >                                            
                                            </div>                                            
                                        </div>                                        
                                        <div class="form-group col-12 mb-2">
                                            <div class="row">
                                                <label class="mb-2">Work permit of other countries <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-8 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                        <option value="value 00">Select Work permit of other countries</option>
                                                        <option value="Have H1 Visa">Have H1 Visa </option>
                                                        <option value="Need H1 Visa">Need H1 Visa </option>
                                                        <option value="TN Permit Holder">TN Permit Holder </option>   
                                                        <option value="Green Card Holder">Green Card Holder  </option>   
                                                        <option value="US Citizen">US Citizen </option>   
                                                        <option value="Authorized to work in US">Authorized to work in US   </option>  
                                                  </select>
                                                </div>                                                
                                            </div>
                                        </div>                                       
                                    </div>
                                    <div class="row mt-2" style="float: right;">                                    
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-danger d-grid" id="btnCloseIt" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn  btn-primary d-grid" id="btnSaveIt" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================== End Personal Details-->

    <script type="text/javascript">
    window.onload = function () {
        //Reference the DropDownList.
        var ddlYears = document.getElementById("ddlYears");
 
        //Determine the Current Year.
        var currentYear = (new Date()).getFullYear();
 
        //Loop and add the Year values to DropDownList.
        for (var i = 1940; i <= currentYear; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlYears.appendChild(option);
        }
    };
</script>
<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-8"> 
        <div class="row">
      <div class="col-md-12">
        <div class="userccount">
          <div class="formpanel"> 
            <!-- @include('flash::message')  -->
            <!-- Personal Information -->
            <!-- @include('user.inc.profile')
            @include('user.inc.summary')
            @include('user.forms.cv.cvs')
            @include('user.forms.project.projects')
            @include('user.forms.experience.experience')
            @include('user.forms.education.education')
            @include('user.forms.skill.skills')
            @include('user.forms.language.languages') -->
          </div>
        </div>
      </div>
    </div>
      </div>
    </div>
  </div>  
</div>
@include('includes.footer')
@endsection
@push('styles')
<style type="text/css">
.userccount p{ text-align:left !important;}
</style>
@endpush
@push('scripts')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>

<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.16/themes/cupertino/jquery-ui.css">



<script type="text/javascript">
$(function() {
    $(".working_to").hide();
    $("#emp_working_to").hide();
    $("#working_to_year").prop('disabled', true);
    $("#working_to_month").prop('disabled', true);
    $("#emp_working_to_year").prop('disabled', true);
    $("#emp_working_to_month").prop('disabled', true);
    
    $(".project_status").on('change', function (e) {
        if($(this).val()==1){
            $("#working_to_year").prop('disabled', true);
            $("#working_to_month").prop('disabled', true);
            $("#worked_till").prop('disabled', false);
            $(".working_to").hide();
            $(".worked_till").show();
        }else{
            $(".working_to").show();
            $(".worked_till").hide();
            $("#working_to_year").prop('disabled', false);
            $("#working_to_month").prop('disabled', false);
            $("#worked_till").prop('disabled', true);
        }       
    });

    $(".is_currently_working").on('change', function (e) {
        console.log($(this).val());
        if($(this).val()==1){
            $("#emp_working_to_year").prop('disabled', true);
            $("#emp_working_to_month").prop('disabled', true);
            $("#emp_worked_till").prop('disabled', false);
            $("#emp_working_to").hide();
            $(".emp_worked_till").show();
        }else if($(this).val()==0){
            $(".emp_worked_till").hide();
            $("#emp_working_to").show();
            $("#emp_working_to_year").prop('disabled', false);
            $("#emp_working_to_month").prop('disabled', false);
            $("#emp_worked_till").prop('disabled', true);
        }
       
    });
    
    $(".datepicker").datepicker({
		autoclose: true,
        dateFormat: 'yy-mm-dd'	
	});

    $('.js-example-basic-multiple').select2({
    	placeholder: "{{__('Select City')}}",
    	allowClear: true
	});
    $('.js-example-jobskill-multiple').select2({
    	placeholder: "{{__('Select Skill')}}",
    	allowClear: true
	});
    $('.js-example-jobskills-multiple').select2({
    	placeholder: "{{__('Select Skill')}}",
    	allowClear: true
	});

    $('#salary_from').val("{{$user->profileCarrer->salary_from }}");
    $('#salary_from').select2().trigger('change');
    $('#salary_to').val("{{$user->profileCarrer->salary_to }}");
    $('#salary_to').select2().trigger('change');

    $("#btnSaveIt").on('click', function (e) {
        e.preventDefault;
        $("#add_edit_personal_details").validate({
            rules: { 
                hometown: 'required',
                pincode: {
                    required: true,
                    minlength: 6
                },
            },
            messages: {
                hometown: "Please provide some data",
                pincode: {
                required: "Please enter some data",
                minlength: "Your data must be at least 6 characters"
                },
            },
            submitHandler: function() {
                submitProfileDetailsForm();
            }
        });        
    });

    $("#careerBtnSaveIt").on('click', function (e) {
        e.preventDefault;
        $("#add_edit_career_details").validate({
            rules: { 
                industry_id: 'required',
                date_of_join: 'required',
            },
            messages: {
                industry_id: "Please select Industry",
                date_of_join: "Please select date",
            },
            submitHandler: function() {
                submitCareerDetailsForm();
            }
        });        
    });

    $("#profilesummaryBtnSaveIt").on('click', function (e) {
        e.preventDefault;
        $("#add_edit_profile_summary").validate({
            rules: { 
                summary: {
                    required: true,
                    minlength: 50
                },
            },
            messages: {
                summary: {
                    required: "Please enter some data",
                    minlength: "Your data must be at least 50 characters"
                }
            },
            submitHandler: function() {
                submitProfileSummaryForm();
            }
        });        
    });

    $("#profileHeadlineBtnSaveIt").on('click', function (e) {
        e.preventDefault;
        $("#add_edit_resume_headline").validate({
            rules: { 
                summary: {
                    required: true,
                    minlength: 20
                },
            },
            messages: {
                summary: {
                    required: "Please enter some data",
                    minlength: "Your data must be at least 20 characters"
                }
            },
            submitHandler: function() {
                submitProfileResumeSummaryForm();
            }
        });        
    });
    
    $("#languageBtnSaveIt").on('click', function (e) {
        e.preventDefault;
        $("#add_edit_profile_language").validate({
            rules: { 
                language_id: 'required',
                language_level_id: 'required',
            },
            messages: {
                language_id: 'Please select Language',
                language_level_id: 'Please select Language Level',
            },
            submitHandler: function() {
                submitProfileLanguageForm();
            }
        });        
    });
    $("#skillBtnSaveIt").on('click', function (e) {
        e.preventDefault;
        $("#add_edit_itskills").validate({
            rules: { 
                skill_name: 'required',
                version: 'required',
            },
            messages: {
                language_id: 'Please enter skill name',
                language_level_id: 'Please enter version',
            },
            submitHandler: function() {
                submitItSkillForm();
            }
        });        
    });
    $("#jobSkillBtnSaveIt").on('click', function (e) {
        e.preventDefault;
        $("#add_edit_keyskill").validate({
            rules: { 
                "job_skill_id[]": 'required',
            },
            messages: {
                "job_skill_id[]": 'Please select skill name',
            },
            submitHandler: function() {
                submitKeySkillForm();
            }
        });        
    });
    $("#projectBtnSaveIt").on('click', function (e) {
        e.preventDefault;
        $("#add_edit_project").validate({
            rules: { 
                project_title: 'required',
                organization_name: 'required',
                description: 'required',
            },
            messages: {
                project_title: 'Please enter project title',
                organization_name: 'Please enter company / college name',
                description: 'Please enter project details',
            },
            submitHandler: function() {
                submitProfileProjectForm();
            }
        });        
    });
    $("#educationBtnSaveIt").on('click', function (e) {
        e.preventDefault;
        $("#add_edit_profile_education").validate({
            rules: { 
                degree_level_id: 'required',
                degree_type_id: 'required',
                "major_subjects[]": 'required',
                institute: 'required',
                course_type: 'required',
                date_completion: 'required',
                result_type_id: 'required',
            },
            messages: {
                degree_level_id: 'Please select education',
                degree_type_id: 'Please select course',
                "major_subjects[]": 'Please select specialization ',
                institute: 'Please enter University/Institute',
                course_type: 'Please choose course type',
                date_completion: 'Please select passing year',
                result_type_id: 'Please select grading system',
            },
            submitHandler: function() {
                submitProfileEducationForm();
            }
        });        
    });

    $("#experienceBtnSaveIt").on('click', function (e) {
        e.preventDefault;
        $("#add_edit_profile_experience").validate({
            rules: { 
                job_role_id: 'required',
                organization: 'required',
                "job_skills_id[]": 'required',
                emp_salary_from: 'required',
                is_currently_working: 'required',
                emp_salary_to: 'required',
                job_profile:{
                    required: true,
                    minlength: 50,
                    maxlength: 1000,
                },
                notice_period: 'required',
            },
            messages: {
                job_role_id: 'Please select designation',
                organization: 'Please enter organization',
                "job_skills_id[]": 'Please select skill ',
                emp_salary_from: 'Please select salary from',
                is_currently_working: 'Please choose current company',
                emp_salary_to: 'Please select salary to',
                job_profile: {
                    required: 'Please enter profile',
                    minlength: "Your data must be at least 50 characters",
                    maxlength: "Your data must be maximum 1000 characters",
                },
                notice_period: 'Please select notice period',
            },
            submitHandler: function() {
                submitProfileExperienceForm()
            }
        });        
    });
    

    $("#cv_file").on('change',function() {
        var form = $('#add_edit_profile_cv');
        var formData = new FormData(document.getElementById("add_edit_profile_cv"));
        formData.append("_token", $('input[name=_token]').val());
        if(document.getElementById("cv_file").value != "") {
            formData.append("cv_file", $('#cv_file')[0].files[0]);
        }
        $.ajax({
            url     : form.attr('action'),
            type    : 'POST',
            data    : formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success : function (json){
                if(json.status==200){
                $("#cv_response_msg").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $("#cv_response_msg").html("");
                    location.replace("{{ route('my.profile') }}");
                }, 2000)
            }
            }
        });
    });

    
    
    $('#functional_area_id').on('change', function (e) {
        e.preventDefault();
        filterLangRoles($(this).val());
    });

    $('#degree_level_id').on('change',function (e) {
    e.preventDefault();
        filterDegreeTypes($(this).val());
    });
    filterLangRoles('{{ $user->profileCarrer->functional_area_id }}');
});
function submitProfileDetailsForm(){    
    var form = $('#add_edit_personal_details');
    var formData = new FormData(document.getElementById("add_edit_personal_details"));
    formData.append("_token", $('input[name=_token]').val());
    if(document.getElementById("profile_image").value != "") {
        formData.append("profile_image", $('#profile_image')[0].files[0]);
    }
    $.ajax({
		url     : form.attr('action'),
		type    : 'POST',
		data    : formData,
        dataType: 'json',
        contentType: false,
        processData: false,
		success : function (json){
            if(json.status==200){
                $("#response_msg").html('<div class="alert alert-success">Personal details successfully updated..</div>');
                setTimeout(function () {
                    $("#response_msg").html("");
                    location.replace("{{ route('my.profile') }}");
                }, 2000)
            }
		},
		error: function(json){
			console.log(4444444);
		}
	}); 
}

function submitCareerDetailsForm(){    
    var form = $('#add_edit_career_details');
    $.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : form.serialize(),
        dataType: 'json',
		success : function (json){
            console.log(json)
            if(json.status==200){
                $("#career_response_msg").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $("#career_response_msg").html("");
                    location.replace("{{ route('my.profile') }}");
                }, 2000)
            }
		},
		error: function(json){
			console.log(4444444);
		}
	}); 
}

function submitProfileSummaryForm() {
	var form = $('#add_edit_profile_summary');
	$.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : form.serialize(),
		dataType: 'json',
		success : function (json){
			if(json.status==200){
                $("#summary_response_msg").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $("#summary_response_msg").html("");
                    location.replace("{{ route('my.profile') }}");
                }, 2000)
            }
		}
	});
}

function submitProfileResumeSummaryForm() {
	var form = $('#add_edit_resume_headline');
	$.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : form.serialize(),
		dataType: 'json',
		success : function (json){
			if(json.status==200){
                $("#headline_response_msg").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $("#headline_response_msg").html("");
                    location.replace("{{ route('my.profile') }}");
                }, 2000)
            }
		}
	});
}

function submitProfileLanguageForm() {
	var form = $('#add_edit_profile_language');
	$.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : form.serialize(),
		dataType: 'json',
		success : function (json){
			if(json.status==200){
                $("#language_response_msg").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $("#language_response_msg").html("");
                    location.replace("{{ route('my.profile') }}");
                }, 2000)
            }
		}
	});
}
function submitItSkillForm() {
	var form = $('#add_edit_itskills');
	$.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : form.serialize(),
		dataType: 'json',
		success : function (json){
			if(json.status==200){
                $("#itskills_response_msg").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $("#itskills_response_msg").html("");
                    location.replace("{{ route('my.profile') }}");
                }, 2000)
            }
		}
	});
}
function submitKeySkillForm() {
	var form = $('#add_edit_keyskill');
	$.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : form.serialize(),
		dataType: 'json',
		success : function (json){
			if(json.status==200){
                $("#keyskill_response_msg").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $("#keyskill_response_msg").html("");
                    location.replace("{{ route('my.profile') }}");
                }, 2000)
            }
		}
	});
}

function submitProfileEducationForm() {
	var form = $('#add_edit_profile_education');
	$.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : form.serialize(),
		dataType: 'json',
		success : function (json){
			if(json.status==200){
                $("#eduction_response_msg").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $("#eduction_response_msg").html("");
                    location.replace("{{ route('my.profile') }}");
                }, 2000)
            }
		}
	});
}

function submitProfileExperienceForm() {
	var form = $('#add_edit_profile_experience');
	$.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : form.serialize(),
		dataType: 'json',
		success : function (json){
			if(json.status==200){
                $("#experience_response_msg").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $("#experience_response_msg").html("");
                    location.replace("{{ route('my.profile') }}");
                }, 2000)
            }
		},
		
	});
}

function delete_profile_language(id) {
  var msg = "{{__('Are you sure! you want to delete?')}}";
  if (confirm(msg)) {
	  $.post("{{ route('delete.front.profile.language') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
			  .done(function (response) {
				  if (response == 'ok')
				  {
                    location.replace("{{ route('my.profile') }}");
				  } else
				  {
					  alert('Request Failed!');
				  }
			  });
  }
}
function delete_profile_project(id) {
  var msg = "{{__('Are you sure! you want to delete?')}}";
  if (confirm(msg)) {
	  $.post("{{ route('delete.front.profile.project') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
			  .done(function (response) {
				  if (response == 'ok')
				  {
                    location.replace("{{ route('my.profile') }}");
				  } else
				  {
					  alert('Request Failed!');
				  }
			  });
  }
}
function delete_profile_education(id) {
  var msg = "{{__('Are you sure! you want to delete?')}}";
  if (confirm(msg)) {
	  $.post("{{ route('delete.front.profile.education') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
			  .done(function (response) {
				  if (response == 'ok')
				  {
                    location.replace("{{ route('my.profile') }}");
				  } else
				  {
					  alert('Request Failed!');
				  }
			  });
  }
}

function delete_profile_experience(id) {
  var msg = "{{__('Are you sure! you want to delete?')}}";
  if (confirm(msg)) {
	  $.post("{{ route('delete.front.profile.experience') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
			  .done(function (response) {
				  if (response == 'ok')
				  {
                    location.replace("{{ route('my.profile') }}");
				  } else
				  {
					  alert('Request Failed!');
				  }
			  });
  }
}
function delete_profile_it_skill(id) {
  var msg = "{{__('Are you sure! you want to delete?')}}";
  if (confirm(msg)) {
	  $.post("{{ route('delete.profile.it.skill') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
			  .done(function (response) {
				  if (response == 'ok')
				  {
                    location.replace("{{ route('my.profile') }}");
				  } else
				  {
					  alert('Request Failed!');
				  }
			  });
  }
}

function submitProfileProjectForm() {
	var form = $('#add_edit_project');
	$.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : form.serialize(),
		dataType: 'json',
		success : function (json){
			if(json.status==200){
                $("#project_response_msg").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $("#project_response_msg").html("");
                    location.replace("{{ route('my.profile') }}");
                }, 2000)
            }
		},
		
	});
}

function showProfileEducationEditModal(education_id){
    $('#Education').modal('show');
    $.ajax({
	type: "POST",
			url: "{{ route('edit-profile-education', $user->id) }}",
			data: {"education_id": education_id, "_token": "{{ csrf_token() }}"},
			datatype: 'json',
			success: function (json) {
                var userid = "{{$user->id}}";
                var update = "{{ url('update-front-profile-education')}}" + '/' + education_id + '/' + userid;
                $("#add_edit_profile_education").attr('action', update);
                $("#add_edit_profile_education").attr('method', "PUT");
                $("#educationBtnSaveIt").text("Update");
                var subjectsArray=[];
                $.each(json.data.profile_education_major_subjects, function (i, subjects) {
                    subjectsArray.push(subjects.major_subject_id);
                });
                console.log(subjectsArray);
                $("#degree_level_id").val(json.data.degree_level_id);
                $('#degree_level_id').select2().trigger('change');
                $("#degree_type_id").val(json.data.degree_type_id);
                $('#degree_type_id').select2().trigger('change');
                $("#institution").val(json.data.institution);
                $('input[name=course_type][value='+json.data.course_type+']').attr('checked', true);
                $("#date_completion").val(json.data.date_completion);
                $('#date_completion').select2().trigger('change');
                $("#result_type_id").val(json.data.result_type_id);
                $('#result_type_id').select2().trigger('change');
                $("#major_subjects").val(subjectsArray);
                $('#major_subjects').select2().trigger('change');
                filterDegreeTypes(json.data.degree_type_id);
                
			}
	});
}

function showProfileExperienceEditModal(experience_id){
    $('#employment').modal('show');
    $.ajax({
	type: "POST",
			url: "{{ route('edit-profile-experience', $user->id) }}",
			data: {"experience_id": experience_id, "_token": "{{ csrf_token() }}"},
			datatype: 'json',
			success: function (json) {
                var userid = "{{$user->id}}";
                var update = "{{ url('update-front-profile-experience')}}" + '/' + experience_id + '/' + userid;
                $("#add_edit_profile_experience").attr('action', update);
                $("#add_edit_profile_experience").attr('method', "PUT");
                $("#experienceBtnSaveIt").text("Update");
                var job_skillsArray=[];
                $.each(json.data.profile_experience_skills, function (i, skills) {
                    job_skillsArray.push(skills.job_skill_id);
                });
               
                $("#job_role_id").val(json.data.role_id);
                $('#job_role_id').select2().trigger('change');
                $("#job_skills_id").val(job_skillsArray);
                $('#job_skills_id').select2().trigger('change');
                $("#organization").val(json.data.company);
                $('input[name=is_currently_working][value='+json.data.is_currently_working+']').attr('checked', true);
                if(json.data.is_currently_working==1){
                    $("#emp_working_from_year").val(json.data.emp_working_from_year);
                    $("#emp_working_from_month").val(json.data.emp_working_from_month);
                    $("#emp_worked_till").val(json.data.emp_worked_till);
                    $('#emp_working_from_year').select2().trigger('change');
                    $('#emp_working_from_month').select2().trigger('change');
                    $('#emp_worked_till').select2().trigger('change');
                    
                }else{
                    $("#emp_working_to_year").val(json.data.emp_working_to_year);
                    $("#emp_working_to_month").val(json.data.emp_working_to_month);
                    $('#emp_working_to_year').select2().trigger('change');
                    $('#emp_working_to_month').select2().trigger('change');
                }
                $("#emp_salary_from").val(json.data.emp_salary_from);
                $("#emp_salary_to").val(json.data.emp_salary_to);
                $('#emp_salary_from').select2().trigger('change');
                $('#emp_salary_to').select2().trigger('change');
                
                $("#job_profile").text(json.data.description);
                $("#notice_period").val(json.data.notice_period);
                $('#notice_period').select2().trigger('change');
                
			}
	});
}


function showProfileProjectEditModal(project_id){
    console.log(project_id)
    // $('#projects').modal('toggle');
    $('#projects').modal('show');
    $.ajax({
	type: "POST",
			url: "{{ route('edit-profile-project', $user->id) }}",
			data: {"project_id": project_id, "_token": "{{ csrf_token() }}"},
			datatype: 'json',
			success: function (json) {
                var userid = "{{$user->id}}";
                var update = "{{ url('update-front-profile-project')}}" + '/' + project_id + '/' + userid;
                $("#add_edit_project").attr('action', update);
                $("#add_edit_project").attr('method', "PUT");
                $("#projectBtnSaveIt").text("Update");
                $("#project_title").val(json.data.name);
                $("#organization_name").val(json.data.url);
                $("#description").val(json.data.description);
                if(json.data.project_status==1){
                    $('input[name=project_status][value=1]').attr('checked', true);
                    $("#working_from_year").prop('disabled', false);
                    $("#working_from_month").prop('disabled', false);
                    $("#worked_till").prop('disabled', false);
                    $(".working_to").hide();
                    $(".working_from").show();
                    $(".worked_till").show();
                    $("#worked_till").val(json.data.worked_till);
                    $("#working_from_year").val(json.data.working_from_year);
                    $("#working_from_month").val(json.data.working_from_month);
                    $('#working_from_year').select2().trigger('change');
                    $('#working_from_month').select2().trigger('change');
                    $('#worked_till').select2().trigger('change');
                    $("#working_to_year").val('');
                    $("#working_to_month").val('');
                }else{
                    $('input[name=project_status][value=2]').attr('checked', true);
                    $(".working_from").show();
                    $(".working_to").show();
                    $(".worked_till").hide();
                    $("#working_from_year").prop('disabled', false);
                    $("#working_from_month").prop('disabled', false);
                    $("#working_to_year").prop('disabled', false);
                    $("#working_to_month").prop('disabled', false);
                    $("#worked_till").prop('disabled', true);
                    $("#working_from_year").val(json.data.working_from_year);
                    $("#working_from_month").val(json.data.working_from_month);
                    $("#working_to_year").val(json.data.working_to_year);
                    $("#working_to_month").val(json.data.working_to_month);
                    $('#working_from_year').select2().trigger('change');
                    $('#working_from_month').select2().trigger('change');
                    $('#working_to_year').select2().trigger('change');
                    $('#working_to_month').select2().trigger('change');
                }
			}
	});
}

function filterLangRoles(functional_area_id){
        var career_role_id = '{{ isset($user->profileCarrer->role_id)?$user->profileCarrer->role_id :""}}'; 
        var functional_area_id = $('#functional_area_id').val();
        var role_id = $('#role_id').val();
        if (functional_area_id != ''){
        $.post("{{ route('filter.lang.roles.dropdown') }}", {functional_area_id: functional_area_id, role_id: role_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    
                    $('#default_role_dd').html(response);
                    $('#role_id').select2();
                    if(career_role_id !=""){                        
                        $('#role_id').val(career_role_id);
                        $('#role_id').select2().trigger('change');
                    }
                });
        }
}

function filterDegreeTypes(degree_type_id){
    var degree_level_id = $('#degree_level_id').val();
    if (degree_level_id != ''){
    $.post("{{ route('filter.degree.types.dropdown') }}", {degree_level_id: degree_level_id, degree_type_id: degree_type_id, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            	$('#degree_types_dd').html(response); 
                $('#degree_type_id').select2();           
            });
    }
}
</script>
@include('includes.immediate_available_btn')
@endpush