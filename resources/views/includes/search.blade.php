
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
    <!--================================= banner -->
    
    
  