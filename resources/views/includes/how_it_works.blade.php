  <!--================================= Feature-info -->
  <section class="feature-info-section" style="background: #f6f6f6 !important;">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="feature-info feature-info-02 p-4 p-lg-5 bg-primary">
                        <div class="feature-info-icon mb-3 mb-sm-0 text-dark">
                            <i class="flaticon-team" style="color:#000;"></i>
                        </div>
                        <div class="feature-info-content text-white ps-sm-4 ps-0">
                            <p>Jobseeker</p>
                            <h5 class="text-white">Looking For Job?</h5>
                        </div>
                        <a class="ms-auto align-self-center" href="{{ route('register') }}">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature-info feature-info-02 p-4 p-lg-5 bg-dark">
                        <div class="feature-info-icon mb-3 mb-sm-0 text-primary">
                            <i class="flaticon-job-3"></i>
                        </div>
                        <div class="feature-info-content text-white ps-sm-4 ps-0">
                            <p>Recruiter</p>
                            <h5 class="text-white">Are You Recruiting?</h5>
                        </div>
                        <a class="ms-auto align-self-center" href="{{ route('register') }}">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Feature-info-->

    <!--=================================Action box & Counter -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-sm-5 mb-lg-0">
                    <div class="d-sm-flex">
                        <div class="align-self-center footer-top-logo"><img class="img-fluid" src="{{asset('/')}}images/udhyog.png" alt=""></div>
                        <div class="ps-sm-3 ms-sm-3 mt-3 mt-sm-0 border-sm-start ">Create free account to find thousands of Jobs, Employment & Career Opportunities around you!</div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="counter mb-4 mb-sm-0">
                                <div class="counter-icon">
                                    <i class=" font-xlll text-primary flaticon-team"></i>
                                </div>
                                <div class="counter-content">
                                    <span class="timer mb-1 text-dark" data-to="{{ 2000 +count($latestJobs) }}" data-speed="10000">{{ 2000 +count($latestJobs) }}</span>
                                    <label class="mb-0">Jobs Posted</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="counter">
                                <div class="counter-icon">
                                    <i class="font-xlll text-primary flaticon-job-3"></i>
                                </div>
                                <div class="counter-content">
                                    <span class="timer mb-1 text-dark" data-to="{{ 200 + count($company) }}" data-speed="10000">{{ 200 + count($company) }}</span>
                                    <label class="mb-0">Companies</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Action box & Counter -->
	
	