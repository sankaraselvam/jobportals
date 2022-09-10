<div class="col-lg-3">
        <div class="sidebar">
                            <div class="widget">
                                <div class="widget-title widget-collapse">
                                    <b style="color: #fff;">Adminstration</b>
                                    <a class="ms-auto" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                                </div>
                                <div class="collapse show" id="admin">
                                    <div class="widget-content">
                                        <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="{{route('company.home')}}">{{__('Dashboard')}}</a></label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="{{ route('company.profile') }}" target="_blank">{{__('Edit Profile')}}</a></label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}">{{__('Company Public Profile')}}</a></label>
                                        </div>                                       
                                        <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="{{route('company.followers')}}">{{__('Company Followers')}}</a></label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="{{route('company.messages')}}">{{__('Company Message')}}</a></label>
                                        </div>
                                          <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="{{route('company.change.password')}}">{{__('Change Password')}}</a></label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="{{route('company.subscription.status')}}">{{__('Subscription Status')}}</a></label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Log Out')}}</a>
                                                <form id="logout-form" action="{{ route('company.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="widget">
                                <div class="widget-title widget-collapse">
                                    <b style="color: #fff;">Jobs & Responses</b>
                                    <a class="ms-auto" data-bs-toggle="collapse" href="#job" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                                </div>
                                <div class="collapse show" id="job">
                                    <div class="widget-content">
                                        <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="{{ route('post.job') }}">Post a Job </a></label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="{{ route('posted.jobs') }}">Manage Jobs</a></label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--<div class="widget">
                                <div class="widget-title widget-collapse">
                                    <b style="color: #fff;">Resume Search</b>
                                    <a class="ms-auto" data-bs-toggle="collapse" href="#resume" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                                </div>
                                <div class="collapse show" id="resume">
                                    <div class="widget-content">
                                        <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="">Feature Resume</a></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="widget">
                                <div class="widget-title widget-collapse">
                                    <b style="color: #fff;">Report</b>
                                    <a class="ms-auto" data-bs-toggle="collapse" href="#report" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                                </div>
                                <div class="collapse show" id="report">
                                    <div class="widget-content">
                                        <div class="form-check">
                                            <label class="form-check-label" for="specialism2"><a href="">Usage Report </a></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>-->
                            <div class="widget">
                                <div class="widget-add">
                                    <img class="img-fluid" src="images/add-banner.png" alt="">
                                </div>
                            </div>
        </div>
    </div>