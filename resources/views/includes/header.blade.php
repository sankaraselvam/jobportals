
<!--================================= header -->
<header class="header bg-white">
        <nav class="navbar navbar-static-top navbar-expand-lg header-sticky">
            <div class="container-fluid">
                <button id="nav-icon4" type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                    <img class="img-fluid" src="{{asset('/')}}images/udhyog.png" alt="logo">
                </a>
                <div class="navbar-collapse collapse justify-content-start">
                    <ul class="nav navbar-nav">
                        <li class="nav-item {{ Request::url() == route('index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{url('/')}}" id="navbarDropdown" role="button">Home</a>
                        </li>
                        <li class="nav-item dropdown {{ Request::url() == route('job.list') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="{{ route('job.list') }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Jobs <i class="fas fa-chevron-down fa-xs"></i></a>
                            <ul class="dropdown-menu">
                               <!-- <li><a class="dropdown-item" href="">Jobs by Location</a></li>
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Jobs by Category</a></li>-->
                                <li><a class="dropdown-item" href="{{ route('job.list') }}">Browse All Jobs</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Recruiters <i class="fas fa-chevron-down fa-xs"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Post a Job</a></li>  
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Browse All Recruiter</a></li>
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Recruiter Connection</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Companies <i class="fas fa-chevron-down fa-xs"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Browse All Companies</a></li>
                            </ul>
                        </li>

                        <li class="dropdown nav-item mega-menu">
                            <a href="javascript:void(0)" class="nav-link " data-bs-toggle="dropdown">Services<i class="fas fa-chevron-down fa-xs"></i></a>
                            <ul class="dropdown-menu megamenu">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                                            <h6 class="mb-3 nav-title">Resume Writing</h6>
                                            <ul class="list-unstyled mt-lg-3">
                                                <li><a href="{{ route('contact.us') }}">Text Resume</a></li>
                                                <li><a href="{{ route('contact.us') }}">Visual Resume</a></li>
                                                <li><a href="{{ route('contact.us') }}">Resume Samples</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 mb-3 mb-sm-0">
                                            <h6 class="mb-3 nav-title">Recruiter Reach</h6>
                                            <ul class="list-unstyled mt-lg-3">
                                                <li><a href="{{ route('contact.us') }}">Resume Database</a></li>
                                                <li><a href="{{ route('contact.us') }}">Job Flash</a></li>
                                                <li><a href="{{ route('contact.us') }}">Hiring Support</a></li>
                                                <li><a href="{{ route('contact.us') }}">Staffing Solutions</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 mb-3 mb-sm-0">
                                            <h6 class="mb-3 nav-title">Training</h6>
                                            <ul class="list-unstyled mt-lg-3">
                                                <li><a href="{{ route('contact.us') }}">Interview Skill Up</a></li>
                                                <li><a href="{{ route('contact.us') }}">Industrial Awareness </a></li>
                                                <li><a href="{{ route('contact.us') }}">Presentation Skill Up</a></li>
                                                <li><a href="{{ route('contact.us') }}">Technical Skill Up</a></li>
                                                <li><a href="{{ route('contact.us') }}">Soft Skill Up</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog <i class="fas fa-chevron-down fa-xs"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Interview Tips</a></li>
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">HR articles</a></li>
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Testimonials</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">VAS <i class="fas fa-chevron-down fa-xs"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Branding / Advertisement</a></li>
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Campus Interview</a></li>
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Internship</a></li>
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Educational Trust</a></li>
                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">CSR Activities</a></li>
                            </ul>
                        </li>
                        @if(Auth::check())
                        <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Portal<i class="fas fa-chevron-down fa-xs"></i></a>
                                    <ul class="dropdown-menu left-side">
                                        <li><a class="dropdown-item" href="{{route('home')}}">Dashboard</a></li>
                                        <li><a class="dropdown-item" href="{{ route('my.profile') }}">Profile</a></li>
                                        <li class="active"><a class="dropdown-item" href="">Change Password </a></li>
                                        <li><a class="dropdown-item" href="{{ route('my.job.applications') }}">Manage Jobs</a></li>
                                        <li><a class="dropdown-item" href="{{ route('my.favourite.jobs') }}">Saved Jobs</a></li>
                                        <li><a class="dropdown-item" href="{{route('my.messages')}}">My Message</a></li>
                                        <li><a class="dropdown-item" href="{{route('my.followings')}}">My Followings</a></li>
                                        <li><a class="dropdown-item" href="">Pricing</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();">Logout</a></li>
                                            <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                    </ul>
                        </li>
                        @endif
                        @if(Auth::guard('company')->check())                        
                        <li class="dropdown nav-item mega-menu">
                            <a href="javascript:void(0)" class="nav-link" data-bs-toggle="dropdown">My Dashboard<i class="fas fa-chevron-down fa-xs"></i></a>
                            <ul class="dropdown-menu megamenu">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="menu-banner bg-dark p-3 pt-4 text-center border-radius h-100 d-none d-lg-block">
                                                <h5 class="text-primary mb-3 pt-2">Advertise your job with us</h5>
                                                <span class="text-light"> Starting from</span>
                                                <h3 class="text-white my-3">$99 <small>/mo</small></h3>
                                                <p class="text-primary p-2 small text-white">Save 30% for new customer</p>
                                                <a class="btn btn-light btn-sm" href="post-a-job.html">Post a job now!</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-5 mb-3 mb-lg-0">
                                            <ul class="list-unstyled mt-lg-3">
                                                <li><a class="dropdown-item" href="{{ route('company.subscription') }}">Subscription Status</a></li>
                                                <li><a class="dropdown-item" href="{{route('company.messages')}}">Company Message</a></li>
                                                <li><a class="dropdown-item" href="{{route('company.followers')}}">Company Followers</a></li>                                                
                                                <li><a class="dropdown-item" href="{{ route('contact.us') }}">Change Password</a></li>                                                
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 mb-3 mb-sm-0">
                                            <ul class="list-unstyled mt-lg-3">
                                                <li><a class="dropdown-item" href="{{route('company.home')}}">Dashboard</a></li>
                                                <li><a class="dropdown-item" href="{{ route('company.profile') }}">Edit Profile</a></li>
                                                <li><a class="dropdown-item" href="{{ route('post.job') }}">Create job post</a></li>
                                                <li><a class="dropdown-item" href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();">Logout</a></li>
                                                    <form id="logout-form-header1" action="{{ route('company.logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        @endif 
                    </ul>
                </div>
                @if(!Auth::user() && !Auth::guard('company')->user())
                <div class="add-listing">
                    <a class="btn btn-white btn-md" href="{{route('login')}}" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="border-radius:50px;"> Login</a>
                </div>
                @endif 
            </div>
        </nav>
    </header>
    <!--================================= header -->
