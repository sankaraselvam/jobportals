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
                                <img class="img-fluid " src="{{asset('/')}}images/avatar/04.jpg" alt="">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <div class="profile-avatar-info ms-4">
                                <h4 class="mt-4" style="color: #fff;text-transform: capitalize;">{{$user->getName()}}</h4>
                                <p style="color: #fff;text-transform: capitalize;">PHP Developer at Dawn Info System</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                            <span class="progress-bar-number">85%</span>
                            <span class="progress-bar-number1">Profile Strength (Excellent)</span>
                        </div>
                    </div>
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
                                    <span class="d-block" style="color: #fff;"><i class="fa fa-phone" aria-hidden="true" style="font-size:16px;color:#fff;transform: rotate(100deg);"></i> <span style="margin-left: 3px;">{{$user->mobile_num}}</span></span>
                                    <span class="d-block mt-2" style="color: #fff;"><i class="fa fa-envelope" aria-hidden="true" ></i> <span style="margin-left: 3px;">{{$user->email}}</span></span>
                                </div>

                            </div>
                        </div>

                    </div>

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
                                <li><a href="">Change Password</a></li>
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
                    <a class="btn btn-primary btn-md mb-4 mb-lg-0" href="my-resume.html">Preview My Resume</a>
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
                                    <a href="#">
                                        <h6 class="category-title"> Resume</h6><span class="secondary-content ms-auto">UPDATE</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h6 class="category-title">Resume Headline</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h6 class="category-title">Key Skills</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h6 class="category-title">Employment</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h6 class="category-title">Education</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h6 class="category-title">IT Skill</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h6 class="category-title">Languages</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h6 class="category-title">Projects</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h6 class="category-title">Profile Summary</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                               
                                <li>
                                    <a href="#">
                                        <h6 class="category-title">Career Profile</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h6 class="category-title">Personal Details</h6><span class="secondary-content ms-auto">Add</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" style="margin-bottom:80px;">
                    <div class="user-dashboard-info-box">
                        <div class="form-group col-md-12 p-0">
                            <h5>Attach Resume</h5>
                            <p>Resume is the most important document recruiters look for. Recruiters generally do not look at profiles without resumes.</p>
                            <div class="text-center">
                                <input type="file"><br>
                                <small>Supported Formats: doc, docx, pdf, upto 2 MB</small>
                            </div>
                        </div>
                    </div>
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-2">
                                <h4 class="mb-0"> Resume Headline</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#headline"> Add Headline</a>
                        </div>

                        <div class="form-group col-md-12 p-0">
                            <div class="form-group col-md-12 p-0">
                                <p>Advanced web developer with 5 years of experience in structuring, developing and implementing interactive websites. Looking for an opportunity where my knowledge, skills and ability are best utilized for the growth of organization.</p>
                            </div>
                        </div>
                    </div>
                    <!--=================================   Skill -->
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0"> Key Skills</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#keyskill"> Add Skill</a>
                        </div>
                        <div class="blog-post-tags mb-4 align-items-center d-flex">
                
                            <ul class="list-inline mb-0 mt-2 mt-sm-0 ms-sm-3">
                            <li class="list-inline-item"><a href="#">Career</a></li>
                            <li class="list-inline-item"><a href="#">Advice</a></li>
                            <li class="list-inline-item"><a href="#">Recruitment</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--=================================   Skill -->

                    <!--=================================        Work & Experience -->
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0">Work & Experience</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary" data-bs-toggle="modal" data-bs-target="#employment" style="border-radius:50px;">Add Experience</a>
                        </div>

                        <div class="jobber-candidate-timeline mt-4">
                            <div class="jobber-timeline-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="jobber-timeline-item">
                                <div class="jobber-timeline-cricle">
                                    <i class="far fa-circle"></i>
                                </div>
                                <div class="jobber-timeline-info">
                                    <div class="dashboard-timeline-info">
                                        <div class="dashboard-timeline-edit">
                                            <ul class="list-unstyled d-flex">
                                                <li>
                                                    <a class="text-end" data-bs-toggle="collapse" href="#dateposted-06" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-pencil-alt text-info me-2"></i> </a>
                                                </li>
                                                <li><a href="#"><i class="far fa-trash-alt text-danger"></i></a></li>
                                            </ul>
                                        </div>
                                        <span class="jobber-timeline-time">2020-6-01 to 2020-6-01</span>
                                        <h6 class="mb-2">Web Designer</h6>
                                        <span>- Inwave Studio</span>
                                        <p class="mt-2">One of the main areas that I work on with my clients is shedding these non-supportive beliefs and replacing them with beliefs that will help them to accomplish their desires.</p>
                                    </div>
                                    <div class="collapse" id="dateposted-06">
                                        <div class="bg-light p-3">
                                            <form class="row collapse show" id="dateposted-form-01">
                                                <div class="form-group mb-3 col-md-12">
                                                    <label for="Email2">Your Designation </label>
                                                    <input type="text" class="form-control" value="Type Your Designation">
                                                </div>
                                                <div class="form-group mb-3 col-md-12">
                                                    <label class="form-label">Your Organization</label>
                                                    <input type="text" class="form-control" value="Type Your Organization">
                                                </div>
                                                <div class="form-group mb-3 col-md-12">
                                                    <label class="form-label">Is this your current company?</label><br>
                                                    <label>
                                                        <input class="form-group" type="radio" name="optradio" checked> Yes
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optradio"> No
                                                    </label>
                                                </div>
                                                <div class="form-group col-10 mb-2">
                                                    <div class="row">
                                                        <label class="mb-2">Started Working From <span style="color: red;">*</span></label>
                                                        <div class="form-group col-md-6 select-border mb-3">
                                                            <select class="form-control basic-select">
                                                            <option value="value 00">Select Year</option>
                                                            <option value="value 01">2022</option>
                                                            <option value="value 02">2021</option>
                                                            <option value="value 03">2020</option>                                                   
        
                                                          </select>
                                                        </div>
                                                        <div class="form-group col-md-6 select-border mb-3">
                                                            <select class="form-control basic-select">
                                                                <option value="">Select Month</option>
                                                                <option value="JAn">Jan</option>
                                                                <option value="Feb">Feb</option>
                                                                <option value="Mar">Mar</option>
                                                          </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-10 mb-2">
                                                    <div class="row">
                                                        <label class="mb-2">Worked Till<span style="color: red;">*</span></label>
                                                        <div class="form-group col-md-6 select-border mb-3">
                                                            <select class="form-control basic-select">
                                                                <option value="present">Present</option>                                                     
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="mb-2">Started Working From <span style="color: red;">*</span></label>
                                                        <div class="form-group col-md-6 select-border mb-3">
                                                            <select class="form-control basic-select">
                                                              <option value="value 00">Select Year</option>
                                                              <option value="value 01">2022</option>
                                                              <option value="value 02">2021</option>
                                                              <option value="value 03">2020</option> 
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 select-border mb-3">
                                                            <select class="form-control basic-select">
                                                            <option value="value 001">Select Month</option>
                                                              <option value="value 01">10000</option>
                                                              <option value="value 02">25000</option>
                                                              <option value="value 03">35000</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-10 mb-2">
                                                    <div class="row">
                                                        <label class="mb-2">Current Salary<span style="color: red;">*</span></label>
                                                        <div class="form-group col-md-6 select-border mb-3">
                                                            <select class="form-control basic-select">
                                                          <option value="value 0">0 Lac</option>
                                                          <option value="value 1">1 Lac</option>
                                                          <option value="value 2">2 Lac</option>
                                                          <option value="value 3">3 Lac</option> 
                                                        </select>
                                                        </div>
                                                        <div class="form-group col-md-6 select-border mb-3">
                                                            <select class="form-control basic-select">
                                                        <option value="value 0">0 Thousands</option>
                                                          <option value="value 05">5 Thousands</option>
                                                          <option value="value 10">10 Thousands</option>
                                                          <option value="value 15">15 Thousands</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-12 mb-2">
                                                    <label class="mb-2" for="Email2">Top 5 key skills that you think are important for current employment <span style="color: red;">*</span></label>
                                                    <input type="text" class="form-control" id="Email22" placeholder="Type Your Designation">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label class="mb-2" for="Email2 ">Describe your Job Profile <span style="color: red;">*</span></label>
                                                    <textarea class="form-control mb-2" rows="4" placeholder="Type here.."></textarea>
                                                </div>
                                                <div class="form-group col-12 mb-2">
                                                    <div class="row">
                                                        <label class="mb-2">Notice Period<span style="color: red;">*</span></label>
                                                        <div class="form-group col-md-12 select-border mb-3">
                                                            <select class="form-control basic-select">
                                                              <option value="value 0">Select Notice Period</option>
                                                              <option value="15 Days or less">15 Days or less</option>
                                                              <option value="1 Months">1 Months</option>
                                                              <option value="2 Months">2 Months</option> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12 mb-0">
                                                    <a class="btn btn-md btn-primary" href="#">Update</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=================================     Work & Experience -->

                    <!--=================================     Education -->
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0">Education</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary" data-bs-toggle="modal" data-bs-target="#Education" style="border-radius:50px;">Add Education</a>
                        </div>

                        <div class="jobber-candidate-timeline mt-4">
                            <div class="jobber-timeline-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="jobber-timeline-item">
                                <div class="jobber-timeline-cricle">
                                    <i class="far fa-circle"></i>
                                </div>
                                <div class="jobber-timeline-info">
                                    <div class="dashboard-timeline-info">
                                        <div class="dashboard-timeline-edit">
                                            <ul class="list-unstyled d-flex">
                                                <li>
                                                    <a class="text-end" data-bs-toggle="collapse" href="#dateposted-02" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-pencil-alt text-info me-2"></i> </a>
                                                </li>
                                                <li><a href="#"><i class="far fa-trash-alt text-danger"></i></a></li>
                                            </ul>
                                        </div>
                                        <span class="jobber-timeline-time">2018 - Pres</span>
                                        <h6 class="mb-2">Masters in Software Engineering</h6>
                                        <span>- Engineering University</span>
                                        <p class="mt-2">This is the beginning of creating the life that you want to live. Know what the future holds for you as a result of the choice you can make today.</p>
                                    </div>
                                    <div class="collapse" id="dateposted-02">
                                        <div class="bg-light p-3">
                                            <form class="row collapse show" id="dateposted-01">
                                                <div class="form-group mb-3 col-md-12">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" value="Masters in Software Engineering">
                                                </div>
                                                <div class="form-group mb-3 col-md-6 select-border">
                                                    <label class="form-label">Year</label>
                                                    <select class="form-control basic-select" >
                                                        <option value="value 01" selected="selected">2020</option>
                                                        <option value="value 02">2008</option>
                                                        <option value="value 03">2009</option>
                                                        <option value="value 04">2010</option>
                                                        <option value="value 05">2011</option>
                                                        <option value="value 06">2012</option>
                                                        <option value="value 07">2013</option>
                                                        <option value="value 08">2014</option>
                                                        <option value="value 09">2015</option>
                                                        <option value="value 10">2016</option>
                                                        <option value="value 11">2017</option>
                                                        <option value="value 12">2018</option>
                                                        <option value="value 13">2019</option>
                                                        <option value="value 14">2020</option>
                                                        <option value="value 15">2021</option>
                                                        <option value="value 16">2022</option>
                                                        <option value="value 17">2023</option>
                                                        <option value="value 18">2024</option>
                                                        <option value="value 19">2025</option>
                                                        <option value="value 20">2026</option>
                                                        <option value="value 21">2027</option>
                                                        <option value="value 22">2028</option>
                                                        <option value="value 23">2029</option>
                                                        <option value="value 14">2030</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3 col-md-6">
                                                    <label class="form-label">Institute</label>
                                                    <input type="text" class="form-control" value="Engineering University">
                                                </div>
                                                <div class="form-group mb-3 col-md-12">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" rows="4" placeholder="This is the beginning of creating the life that you want to live. Know what the future holds for you as a result of the choice you can make today."></textarea>
                                                </div>
                                                <div class="form-group col-md-12 mb-0">
                                                    <a class="btn btn-md btn-primary" href="#">Update</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=================================     Education  -->

                    <!--=================================     IT Skill -->
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
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>core php</td>
                                            <td>7.4</td>
                                            <td>2019</td>
                                            <td>1 Year 2 Months </td>
                                            <td><i class="fas fa-pencil-alt text-info"></i></td>
                                            <td><i class="fas fa-trash-alt text-danger"></i></td>
                                        </tr>
                                        <tr>
                                            <td>core php</td>
                                            <td>7.4</td>
                                            <td>2019</td>
                                            <td>1 Year 2 Months </td>
                                            <td><i class="fas fa-pencil-alt text-info"></i></td>
                                            <td><i class="fas fa-trash-alt text-danger"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--=================================       IT Skill -->

                    <!--=================================     Languages -->
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tamil</td>
                                            <td>Expert</td>
                                            <td><i class="fa fa-check" style="color:green;"></i></td>
                                            <td><i class="fa fa-check" style="color:green;"></i></td>
                                            <td><i class="fa fa-check" style="color:green;"></i></td>  
                                        </tr>
                                        <tr>
                                            <td>English</td>
                                            <td>Proficient</td>
                                            <td><i class="fa fa-check" style="color:green;"></i></td>
                                            <td><i class="fa fa-check" style="color:green;"></i></td>
                                            <td><i class="fa fa-check" style="color:green;"></i></td>                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--=================================       IT Skill -->


                    <!--=================================Start Projects-->
                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0">Projects</h4>
                                <small>Add details about projects you have done in college, internship or at work.</small>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#projects"> Add Projects</a>
                        </div>
                    </div>
                    <!--================================= End Projects-->


                    <!--=================================Profile Summary-->

                    <div class="user-dashboard-info-box">
                        <div class="dashboard-resume-title d-flex align-items-center">
                            <div class="section-title-02 mb-sm-0">
                                <h4 class="mb-0">Profile Summary</h4>
                            </div>
                            <a class="btn btn-md ms-sm-auto btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#profilesummary"> Add Profile Summary</a>
                        </div>
                        <small>Your Profile Summary should mention the highlights of your career and education, what your professional interests are, and what kind of a career you are looking for. Write a meaningful summary of more than 50 characters.</small>
                    </div>

                    <!--================================= End Profile Summary-->

                     
                    <!--=================================Career Profile -->

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
                                    <p style="color: #000;">IT Services & Consulting</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Role Category</label>
                                    <p style="color: #000;">Software Development</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Availability to Join</label>
                                    <p style="color: #000;">May, 2022</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Desired Employment Type</label>
                                    <p style="color: #000;">Full Time</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Preferred Work Location</label>
                                    <p style="color: #000;">Vellore, Chennai, Salem</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label>Department</label>
                                    <p style="color: #000;">Engineering - Software & QA</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Job Role</label>
                                    <p style="color: #000;">Full Stack Developer</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Desired Job Type</label>
                                    <p style="color: #000;">Permanent</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Desired Shift</label>
                                    <p style="color: #000;">Day</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Expected Salary</label>
                                    <p style="color: #000;">INR 10 Lakh(s) 60 Thousand </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--================================= End Career Profile-->

                    <!--=================================Career Profile -->

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
                                    <p style="color: #000;">22 Mar 1989</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Gender</label>
                                    <p style="color: #000;">Male</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Marital Status</label>
                                    <p style="color: #000;">Married</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Category</label>
                                    <p style="color: #000;">General</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label>Permanent Address</label>
                                    <p style="color: #000;">Selvam S/O Murugesan, Keelmathur(Vil), Andiyur(Po)</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Area Pin Code</label>
                                    <p style="color: #000;">635 207</p>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Hometown</label>
                                    <p style="color: #000;">Krishnagiri</p>
                                </div> 
                                <div class="form-group mb-4">
                                    <label>Work permit of other countries</label>
                                    <p style="color: #000;">India</p>
                                </div>                               
                            </div>
                        </div>
                    </div>

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
                <div class="modal-body">
                    <p>It is the first thing recruiters notice in your profile. Write concisely what makes you unique and right person for the job you are looking for.</p>
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <textarea class="form-control" rows="4" placeholder="Minimum 3 Words..,"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <a class="btn btn-danger d-grid" data-bs-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Save</a>
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
    <div class="modal fade" id="keyskill" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 30px 78px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center">Key Skills</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>          
                </div>
                <div class="modal-body">
                    <p>Tell recruiters what you know or what you are known for e.g. Direct Marketing, Oracle, Java etc. We will send you job recommendations based on these skills. Each skill is separated by a comma.</p>
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <input type="text" class="form-control" placeholder="Enter your area of Expertise/Specialization">
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <a class="btn btn-danger d-grid" data-bs-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Save</a>
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
                <div class="modal-body">
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="Email2">Your Designation <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="Email22" placeholder="Type Your Designation">
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Your Organization <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="Email22" placeholder="Type Your Organization">
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Is this your current company? <span style="color: red;">*</span></label><br>
                                            <label>
                                              <input class="form-group" type="radio" name="optradio" checked> Yes
                                            </label>
                                            <label class="radio-inline">
                                              <input type="radio" name="optradio" class="form-group"> No
                                            </label>
                                        </div>
                                        <div class="form-group col-10 mb-2">
                                            <div class="row">
                                                <label class="mb-2">Started Working From <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                    <option value="value 00">Select Year</option>
                                                    <option value="value 01">2022</option>
                                                    <option value="value 02">2021</option>
                                                    <option value="value 03">2020</option>  
                                                  </select>
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                    <select class="form-control basic-select">
                                                      <option value="value 001">Select Month</option>
                                                    <option value="value 01">10000</option>
                                                    <option value="value 02">25000</option>
                                                    <option value="value 03">35000</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-2">
                                            <div class="row">
                                                <label class="mb-2">Worked Till<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                        <option value="present">Present</option>                                                     
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="mb-2">Started Working From <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                      <option value="value 00">Select Year</option>
                                                      <option value="value 01">2022</option>
                                                      <option value="value 02">2021</option>
                                                      <option value="value 03">2020</option> 
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                    <select class="form-control basic-select">
                                                    <option value="value 001">Select Month</option>
                                                      <option value="value 01">10000</option>
                                                      <option value="value 02">25000</option>
                                                      <option value="value 03">35000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-4">
                                            <div class="row">
                                                <label class="mb-2">Current Salary<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                  <option value="value 0">0 Lac</option>
                                                  <option value="value 1">1 Lac</option>
                                                  <option value="value 2">2 Lac</option>
                                                  <option value="value 3">3 Lac</option> 
                                                </select>
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                    <select class="form-control basic-select">
                                                <option value="value 0">0 Thousands</option>
                                                  <option value="value 05">5 Thousands</option>
                                                  <option value="value 10">10 Thousands</option>
                                                  <option value="value 15">15 Thousands</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="Email2">Skills Used <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="Email22" placeholder="Type Your Designation">
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="Email2 ">Job Profile <span style="color: red;">*</span></label>
                                            <textarea class="form-control" rows="4" placeholder="Type here.."></textarea>
                                            <p style="text-align:right;">4000 character(s) left</p>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <label class="mb-2">Notice Period<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-12 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                      <option value="value 0">Select Notice Period</option>
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
                                            <a class="btn btn-danger d-grid" data-bs-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Save</a>
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
                <div class="modal-body">
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Education <span style="color: red;">*</span></label>
                                            <select class="form-control basic-select">
                                                <option value="value 00">Select Education</option>
                                                <option value="value 01">Doctorate/PhD </option>
                                                <option value="value 02">Masters/Post-Graduation</option>
                                                <option value="value 03">Graduation/Diploma</option>  
                                                <option value="value 03">12th</option>  
                                                <option value="value 03">10th</option>  
                                            </select>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Course <span style="color: red;">*</span></label>
                                            <select class="form-control basic-select">
                                                <option value="value 00">Select Course</option>
                                                <option value="value 01">Doctorate/PhD </option>
                                                <option value="value 02">Masters/Post-Graduation</option>
                                                <option value="value 03">Graduation/Diploma</option>  
                                                <option value="value 03">12th</option>  
                                                <option value="value 03">10th</option>  
                                            </select>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Specialization <span style="color: red;">*</span></label>
                                            <select class="form-control basic-select">
                                                <option value="value 00">Select Specialization</option>
                                                <option value="value 01">Doctorate/PhD </option>
                                                <option value="value 02">Masters/Post-Graduation</option>
                                                <option value="value 03">Graduation/Diploma</option>  
                                                <option value="value 03">12th</option>  
                                                <option value="value 03">10th</option>  
                                            </select>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="Email2">University/Institute <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="Email22" placeholder="Select university/institute">
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Course Type <span style="color: red;">*</span></label><br>
                                            <div class="form-group">
                                                <label>
                                              <input class="form-group" type="radio" name="optradio" checked> Full Time
                                            </label>
                                                <label class="radio-inline">
                                              <input type="radio" name="optradio"> Part Time
                                            </label>
                                                <label class="radio-inline">
                                                <input type="radio" name="optradio"> Correspondence/Distance learning
                                              </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <label class="mb-2">Passing Out Year <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                        <option value="value 00">Select Year</option>
                                                        <option value="value 01">2026</option>
                                                        <option value="value 01">2025</option>
                                                        <option value="value 01">2024</option>
                                                        <option value="value 01">2023</option>
                                                        <option value="value 01">2022</option>
                                                        <option value="value 02">2021</option>
                                                        <option value="value 03">2020</option> 
                                                  </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <label class="mb-2">Grading System<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-12 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                        <option value="value 0"> Select Grading System </option>
                                                        <option value="value 0"> Scale 10 Grading System </option>
                                                        <option value="value 1"> Scale 4 Grading System </option>
                                                        <option value="value 2"> % Marks of 100 Maximum </option>
                                                        <option value="value 3"> Course Requires a Pass </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <a class="btn btn-danger d-grid" data-bs-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Save</a>
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
                <div class="modal-body">
                    <p style="color:#000;">Specify details about programming languages (such as Java, Python, C/C++, Oracle, SQL etc), softwares (Microsoft Word, Excel, Tally etc) or any other software related knowledge.</p>
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="Email2"> Skill / Software Name<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="Email22" placeholder="Please enter ">
                                        </div>

                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <label class="mb-2" for="Email2">Version <span style="color: red;">*</span></label>
                                                    <input type="text" class="form-control" id="Email22" placeholder="Version">
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <label class="mb-2" for="Email2">Last Used </label>
                                                    <select class="form-control basic-select">
                                                        <option value="value 00">Last Used</option>
                                                        <option value="value 01">2022</option>
                                                        <option value="value 01">2021</option>
                                                        <option value="value 01">2020</option>
                                                        <option value="value 01">2019</option>
                                                        <option value="value 01">2018</option>
                                                        <option value="value 02">2017</option>
                                                        <option value="value 03">2016</option> 
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <label class="mb-2" for="Email2">Experience</label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                        <option value="value 00">Years</option>
                                                        <option value="value 01">0 Years</option>
                                                        <option value="value 01">1 Years</option>
                                                        <option value="value 01">2 Years</option>
                                                        <option value="value 01">3 Years</option>
                                                        <option value="value 01">4 Years</option>
                                                        <option value="value 02">5 Years</option>
                                                        <option value="value 03">6 Years</option> 
                                                  </select>
                                                </div>

                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                        <option value="value 00">Months</option>
                                                        <option value="value 01">0 Months</option>
                                                        <option value="value 01">1 Months</option>
                                                        <option value="value 01">2 Months</option>
                                                        <option value="value 01">3 Months</option>
                                                        <option value="value 01">4 Months</option>
                                                        <option value="value 02">5 Months</option>
                                                        <option value="value 03">6 Months</option> 
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <a class="btn btn-danger d-grid" data-bs-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Save</a>
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
                <div class="modal-body">                    
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-4">
                                            <div class="row">
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <label class="mb-2" for="Email2">Language<span style="color: red;">*</span></label>
                                                    <input type="text" class="form-control" id="Email22" placeholder="Enter Language">
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <label class="mb-2" for="Email2">Proficiency <span style="color: red;">*</span></label>
                                                    <select class="form-control basic-select">
                                                        <option value="value 00">Beginner</option>
                                                        <option value="value 01">Proficient</option>
                                                        <option value="value 01">Expert</option>                                                       
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <div class="row">                                                
                                                <div class="form-group col-md-12 select-border mb-3">
                                                    <label class="radio-inline">
                                                        <input class="form-group" type="radio" name="Read"> Read
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input class="form-group" type="radio" name="Write"> Write
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  class="form-group" name="Speak"> Speak
                                                    </label>                                                    
                                                </div>                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <a class="btn btn-danger d-grid" data-bs-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Save</a>
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
                <div class="modal-body">
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Project Title <span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Project Title">
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Tag this project with your Employment/Education <span style="color: red;">*</span></label>
                                            <select class="form-control basic-select">
                                                <option value="value 00">Select Employment/Education</option>
                                                <option value="value 01">Doctorate/PhD </option>
                                                <option value="value 02">Masters/Post-Graduation</option>
                                                <option value="value 03">Graduation/Diploma</option>  
                                                <option value="value 03">12th</option>  
                                                <option value="value 03">10th</option>  
                                            </select>
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Client<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Client Name">
                                        </div>
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Project Status <span style="color: red;">*</span></label><br>
                                            <div class="form-group">
                                                <label>
                                              <input class="form-group" type="radio" name="optradio" checked> In Progress
                                            </label>
                                                <label class="radio-inline">
                                              <input type="radio" name="optradio"> Finished
                                            </label>

                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-2">
                                            <div class="row">
                                                <label class="mb-2">Started Working From <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                    <option value="value 00">Select Year</option>
                                                    <option value="value 01">2022</option>
                                                    <option value="value 02">2021</option>
                                                    <option value="value 03">2020</option>                                                   

                                                  </select>
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                    <select class="form-control basic-select">
                                                      <option value="value 001">Select Month</option>
                                                    <option value="value 01">10000</option>
                                                    <option value="value 02">25000</option>
                                                    <option value="value 03">35000</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-2">
                                            <div class="row">
                                                <label class="mb-2">Worked Till<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                        <option value="present">Present</option>                                                     
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="mb-2">Started Working From <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select">
                                                      <option value="value 00">Select Year</option>
                                                      <option value="value 01">2022</option>
                                                      <option value="value 02">2021</option>
                                                      <option value="value 03">2020</option> 
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                    <select class="form-control basic-select">
                                                    <option value="value 001">Select Month</option>
                                                      <option value="value 01">10000</option>
                                                      <option value="value 02">25000</option>
                                                      <option value="value 03">35000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Details of Project<span style="color: red;">*</span></label>
                                            <textarea name="" class="form-control" rows="4"></textarea>
                                            <p style="text-align:right;">1000 Character(s) Left</p>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <a class="btn btn-danger d-grid" data-bs-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Save</a>
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
                    </button>               </div>
                <div class="modal-body">
                    <small>Your Profile Summary should mention the highlights of your career and education, what your professional interests are, and what kind of a career you are looking for. Write a meaningful summary of more than 50 characters.</small>
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">

                                            <textarea name="" class="form-control" rows="4" placeholder="Type here.."></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <a class="btn btn-danger d-grid" data-bs-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Save</a>
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

    <!--=============== Profile Summary -->
    <div class="modal fade" id="profilesummary" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="padding: 30px 78px 15px 77px">
            <div class="modal-content" style="padding: 30px">
                <div class="modal-header p-2">
                    <h4 class="mb-0 text-center">Profile Summary</h4>                    
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>               </div>
                <div class="modal-body">
                    <small>Your Profile Summary should mention the highlights of your career and education, what your professional interests are, and what kind of a career you are looking for. Write a meaningful summary of more than 50 characters.</small>
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">

                                            <textarea name="" class="form-control" rows="4" placeholder="Type here.."></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <a class="btn btn-danger d-grid"  data-bs-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Save</a>
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
                <div class="modal-body">
                <p style="color:#000;">This information will help the recruiters and udhyog know about your current job profile and also your desired job criteria. This will also help us personalize your job recommendations.</p>
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Current Industry <span style="color: red;">*</span></label>
                                                <select class="form-control basic-select">
                                                    <option value="value 00">Select Industry</option>
                                                    <option value="value 01">Analytics / KPO / Research</option>
                                                    <option value="value 02">BPO / Call Centre </option>
                                                    <option value="value 03">IT Services & Consulting </option>  
                                                    <option value="value 03">Electronic Components / Semiconductors </option> 
                                                     
                                                </select>
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Department <span style="color: red;">*</span></label>
                                            <select class="form-control basic-select">
                                                <option value="value 00">Select Department</option>
                                                <option value="value 01">BFSI, Investments & Trading</option>
                                                <option value="value 02">Customer Success, Service & Operations </option>
                                                <option value="value 03">Data Science & Analytics </option> 
                                            </select>
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Role <span style="color: red;">*</span></label>
                                            <select class="form-control basic-select">
                                                <option value="value 00">Select Role</option>
                                                <option value="value 01">DBA / Data warehousing  </option>
                                                <option value="value 02">DevOps </option>
                                                <option value="value 03">Quality Assurance and Testing </option> 
                                            </select>
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Job Role <span style="color: red;">*</span></label>
                                            <select class="form-control basic-select">
                                                <option value="value 00">Select Job Role</option>
                                                <option value="value 01">Automation Architect  </option>
                                                <option value="value 02">Automation Developer </option>
                                                <option value="value 03">Back End Developer </option> 
                                            </select>
                                        </div>
                                       
                                        <div class="form-group col-12 mb-4">
                                            <label class="mb-2" for="password2">Desired Employment Type <span style="color: red;">*</span></label><br>
                                            <div class="form-group">
                                                <select class="form-control basic-select">
                                                    <option value="value 00">Select Employment Type</option>
                                                    <option value="value 01">Full Time - Permanent</option>
                                                    <option value="value 02">Full Time - Contractual</option>
                                                    <option value="value 03">Part Time - Permanent</option>  
                                                    <option value="value 03">Part Time - Contractual</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-2">
                                            <div class="row">
                                                <label class="mb-2">Started Working From <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-12 select-border mb-3">
                                                    <label class="radio-inline">
                                                        <input class="form-group" type="radio" name="day" checked> Day
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input class="form-group" type="radio" name="night" checked> Night
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio"  class="form-group" name="flexible" > Flexible
                                                    </label>                                                    
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group col-10 mb-2">                                           
                                            <div class="row">
                                                <label class="mb-2">Expexted Salary<span style="color: red;">*</span></label>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <select class="form-control basic-select">                                                      
                                                      <option value="value 01">0 Lac</option>
                                                      <option value="">1 Lac</option>
                                                      <option value="">2 Lac</option> 
                                                      <option value="">3 Lac</option> 
                                                      <option value="">4 Lac</option> 
                                                      <option value="">5 Lac</option> 
                                                      <option value="">6 Lac</option> 
                                                      <option value="">7 Lac</option> 
                                                      <option value="">8 Lac</option> 
                                                      <option value="">9 Lac</option> 
                                                      <option value="">10 Lac</option> 
                                                      <option value="">11 Lac</option> 
                                                      <option value="">12 Lac</option> 
                                                      <option value="">13 Lac</option> 
                                                      <option value="">14 Lac</option> 
                                                      <option value="">15 Lac</option> 
                                                      <option value="">16 Lac</option> 
                                                      <option value="">17 Lac</option> 
                                                      <option value="">18 Lac</option> 
                                                      <option value="">19 Lac</option> 
                                                      <option value="">20 Lac</option> 
                                                      <option value="">21 Lac</option> 
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
                                                      <option value="">40 Lac</option> 
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-4">
                                                    <select class="form-control basic-select">
                                                      <option value="value 01">0 Thousand</option>
                                                      <option value="">5 Thousand</option>
                                                      <option value="">10 Thousand</option> 
                                                      <option value="">15 Thousand</option> 
                                                      <option value="">20 Thousand</option> 
                                                      <option value="">25 Thousand</option> 
                                                      <option value="">30 Thousand</option> 
                                                      <option value="">35 Thousand</option> 
                                                      <option value="">40 Thousand</option> 
                                                      <option value="">45 Thousand</option> 
                                                      <option value="">50 Thousand</option> 
                                                      <option value="">55 Thousand</option> 
                                                      <option value="">60 Thousand</option> 
                                                      <option value="">65 Thousand</option> 
                                                      <option value="">70 Thousand</option> 
                                                      <option value="">75 Thousand</option> 
                                                      <option value="">80 Thousand</option> 
                                                      <option value="">85 Thousand</option> 
                                                      <option value="">90 Thousand</option> 
                                                      <option value="">95 Thousand</option>                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row mt-2" style="float: right;">
                                        <div class="col-md-6">
                                            <a class="btn btn-danger d-grid" data-bs-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Save</a>
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
                <div class="modal-body">
                    <div class="login-register">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <form class="mt-4">
                                    <div class="row">
                                    <div class="form-group col-6 mb-2">
                                            <div class="row">
                                                <label class="mb-2">Date Of Birth <span style="color: red;">*</span></label>
                                                <div class="form-group col-md-12 select-border mb-3">      
                                                    <input type="date" class="form-control datetimepicker-input" placeholder="Date of Birth" >                                                                                      
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6 mb-2">
                                            <label class="mb-2" for="Email2">Gender<span style="color: red;">*</span></label>
                                            <select class="form-control basic-select">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Transgender">Transgender</option> 
                                            </select>
                                        </div>
                                        <div class="form-group col-6 mb-2">
                                            <label class="mb-2" for="Email2">Marital Status<span style="color: red;">*</span></label>
                                            <select class="form-control basic-select">
                                                <option value="">Select Marital Status</option>
                                                <option value="Single/unmarried">Single/unmarried</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option> 
                                                <option value="Divorced">Divorced</option> 
                                                <option value="Separated">Separated</option> 
                                                <option value="Other">Other</option> 
                                            </select>
                                        </div>
                                        <div class="form-group col-6 mb-2">
                                            <label class="mb-2" for="Email2">Category<span style="color: red;">*</span></label>
                                            <select class="form-control basic-select">
                                                <option value="">Select Category</option>
                                                <option value="General">General</option>
                                                <option value="Scheduled Caste(SC)">Scheduled Caste(SC)</option>
                                                <option value="Scheduled Tribe(ST)">Scheduled Tribe(ST)</option> 
                                                <option value="OBC - Creamy">OBC - Creamy</option> 
                                                <option value="OBC- Non Creamy">OBC- Non Creamy</option> 
                                                <option value="Other">Other</option> 
                                            </select>
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <label class="mb-2" for="Email2">Permanent Address<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter your Permanent Address">
                                        </div>
                                        <div class="form-group col-6 mb-4">
                                            <label class="mb-2" for="password2">Home Town <span style="color: red;">*</span></label><br>
                                            <div class="form-group col-12 mb-2">                                               
                                              <input class="form-control" type="text" name="hometown" placeholder="Enter your HomeTown" >                                            
                                            </div>                                            
                                        </div>
                                        <div class="form-group col-6 mb-4">
                                            <label class="mb-2" for="password2">Pincode <span style="color: red;">*</span></label><br>
                                            <div class="form-group col-12 mb-2">                                               
                                              <input class="form-control" type="text" name="hometown" placeholder="Enter your Pincode" >                                            
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
                                            <a class="btn btn-danger d-grid"  data-bs-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Save</a>
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
          <div class="formpanel"> @include('flash::message') 
            <!-- Personal Information -->
            @include('user.inc.profile')
            @include('user.inc.summary')
            @include('user.forms.cv.cvs')
            @include('user.forms.project.projects')
            @include('user.forms.experience.experience')
            @include('user.forms.education.education')
            @include('user.forms.skill.skills')
            @include('user.forms.language.languages')
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
@include('includes.immediate_available_btn')
@endpush