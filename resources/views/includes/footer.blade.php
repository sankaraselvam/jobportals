<style>
    .circle{
	border-radius: 60%;
	margin: 0.15em;
	font-size: 25px;
	}  
    .fa-youtube
{
    color:red;
} 
.fa-telegram
{
    color:#0a61cad4;
} 

.btad {
    text-align: center;
    margin-bottom: 10px;
}
</style>

<div class="btad">{!! $siteSetting->above_footer_ad !!}</div>

 <!--================================= Footer -->
 <footer class="footer bg-dark mt-1">
        <div class="position-relative">
            <svg class="footer-shape" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="85px">
                <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                d="M-0.000,-0.001 L1923.000,-0.001 L1923.000,84.999 C1608.914,41.669 1279.532,19.653 962.500,19.000 C635.773,18.326 323.692,40.344 -0.000,84.999 C-0.000,-83.334 -0.000,168.332 -0.000,-0.001 Z"/>
            </svg>
        </div>
        <div class="container pt-2">
            <div class="row mt-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-link">
                        <h5 class="text-dark mb-4">Information</h5>
                        <ul class="list-unstyled">
                            <li><a href="http://www.dawninfosystem.com/about.html" target="_blank">About Us</a></li>                           
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                            <li><a href="{{ route('faq') }}">FAQs</a></li>
                            @foreach($show_in_footer_menu as $footer_menu)

                            @php

                            $cmsContent = App\CmsContent::getContentBySlug($footer_menu->page_slug);

                            @endphp
                            <li class="{{ Request::url() == route('cms', $footer_menu->page_slug) ? 'active' : '' }}"><a href="{{ route('cms', $footer_menu->page_slug) }}">{{ $cmsContent->page_title }}</a></li>

                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                    <div class="footer-link">
                        <h5 class="text-dark mb-4">Jobseekers</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Register Now</a></li>
                            <li><a href="{{ route('job.list') }}">Search Jobs</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="#">Candidate Dashboard</a></li>
                            <li><a href="#">Submit Resume</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                    <div class="footer-link">
                        <h5 class="text-dark mb-4">Jobseekers Services</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Resume Writing</a></li>
                            <li><a href="#">Job Reference</a></li>
                            <li><a href="#">Certification Courses</a></li>
                            <li><a href="#">Recruiter Connection</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-md-0" style="margin-bottom: 35px;">
                    <div class="footer-link">
                        <h5 class="text-dark mb-4">Employers</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('post.job') }}">Job Posting</a></li>
                            <li><a href="#">Resume Database Access</a></li>
                            <li><a href="#">Recruiter Login</a></li>
                            <li><a href="#">Job Flash</a></li>
                            <li><a href="#">Hiring Support</a></li>
                            <li><a href="#">Staffing Solutions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" style="margin-top: 25px;">
                    <div class="footer-link">
                        <h5 class="text-dark mb-4">Browse Jobs</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Jobs by Company</a></li>
                            <li><a href="#">Jobs by Categories</a></li>
                            <li><a href="#">Jobs by Designation</a></li>
                            <li><a href="#">Jobs by Location</a></li>
                            <li><a href="#">Job by Skill</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0"><br>
                    <h5 class="text-dark mb-4">Subscribe Us</h5>
                    <div class="footer-subscribe">
                        <p style="color:#fff;">Sign Up to our Newsletter to get the latest news and offers.</p>
                        <form>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-primary btn-md">Get Notified</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0"><br>
                    <h5 class="text-dark mb-4">Download App</h5>
                    <div class="footer-subscribe">
                        <p style="color:#fff;">Download the latest Slick new job apps now</p>
                        <div class="d-inline-block">
                            <a class="btn btn-white btn-sm btn-app " href="#">
                                <i class="fab fa-apple"></i>
                                <div class="btn-text text-start">
                                    <small class="fw-normal">Download on the </small>
                                    <span class="mb-0 d-block">App Store</span>
                                </div>
                            </a>
                            <a class="btn btn-white btn-sm btn-app mt-3" href="#">
                                <i class="fab fa-google-play"></i>
                                <div class="btn-text text-start">
                                    <small class="fw-normal">Get it on  </small>
                                    <span class="mb-0 d-block">Google Play</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom bg-light mt-5">
            <div class="container">  
                <div class="row">
                    <div class="col-md-8  text-md-start mt-4 mt-md-0">
                        <p class="mb-0 mt-2"> &copy;{{__('Copyright')}} <span id="copyright"> {{date('Y')}} {{ $siteSetting->site_name }}. {{__('All Rights Reserved')}}.</span> <a href="http://www.dawninfosystem.com" target="_blank"> Dawninfosystem </a> </p>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="social d-flex justify-content-lg-end justify-content-center">
                            <ul class="list-unstyled">
                           
                            <li class="facebook">  
                                @if ((string)$siteSetting->facebook_address !== '')
                                <a href="{{ $siteSetting->facebook_address }}" target="_blank"><i class="fab fa-facebook-f circle" aria-hidden="true"></i></a>
                                @endif                              
                            </li>
                            
                            <li class="twitter">                                
                                @if ((string)$siteSetting->twitter_address !== '')
                                <a href="{{ $siteSetting->twitter_address }}" target="_blank"><i class="fab fa-twitter circle" aria-hidden="true"></i></a>
                                @endif
                            </li>
                            
                            <li class="linkedin">                                
                                @if ((string)$siteSetting->instagram_address !== '')
                                <a href="{{ $siteSetting->instagram_address }}" target="_blank"><i class="fab fa-instagram circle" aria-hidden="true"></i></a>
                                @endif
                            </li>
                            <li class="linkedin">
                                @if ((string)$siteSetting->linkedin_address !== '')
                                <a href="{{ $siteSetting->linkedin_address }}" target="_blank"><i class="fab fa-linkedin circle" aria-hidden="true"></i></a>
                                @endif                                
                            </li>
                            <li class="youtube">
                                @if ((string)$siteSetting->youtube_address !== '')
                                <a href="{{ $siteSetting->youtube_address }}" target="_blank"><i class="fab fa-youtube circle" aria-hidden="true"></i></a>
                                @endif
                            </li>
                            <li class="telegram">
                                @if ((string)$siteSetting->telegram_address !== '')
                                    <a href="{{ $siteSetting->telegram_address }}" target="_blank"><i class="fab fa-telegram circle" aria-hidden="true"></i></a>
                                @endif                              
                            </li>
                            
                            <li class="telegram">
                                @if ((string)$siteSetting->google_plus_address !== '')
                                    <a href="{{ $siteSetting->google_plus_address }}" target="_blank"><i class="fab fa-google-plus circle" aria-hidden="true" style="color:#eb341e;"></i></a>
                                @endif                                 
                            </li>
                            <li class="telegram">
                                @if ((string)$siteSetting->pinterest_address !== '')
                                    <a href="{{ $siteSetting->pinterest_address }}" target="_blank"><i class="fab fa-pinterest circle" aria-hidden="true" style="color:#E60023;"></i></a>
                                @endif                               
                            </li>
                            <li class="telegram">
                                @if ((string)$siteSetting->flickr_address !== '')
                                    <a href="{{ $siteSetting->flickr_address }}" target="_blank"><i class="fab fa-flickr circle" aria-hidden="true" style="color:#0063dc;"></i></a>
                                @endif                               
                            </li>
                            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--================================= Clients -->
        <section class="py-4 py-md-5 our-clients" style="background: #fff;padding-top: 0.5rem!important; padding-bottom: 0.5rem!important;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <span style="display: inline-block; margin-left: -140px;padding-right: 40px;line-height: 55px;vertical-align: top;">Partner Sites</span>
                        <div class="owl-carousel owl-nav-center" data-animateOut="fadeOut" data-nav-dots="false" data-items="6" data-md-items="5" data-sm-items="4" data-xs-items="3" data-xx-items="2" data-space="50" style="display: inline-block;">
                            <div class="item">
                                <img class="img-fluid" src="{{asset('/')}}images/client/amazon.svg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="{{asset('/')}}images/client/flipkart.svg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="{{asset('/')}}images/client/google.svg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="{{asset('/')}}images/client/paypal.svg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="{{asset('/')}}images/client/philips.svg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="{{asset('/')}}images/client/slack.svg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="{{asset('/')}}images/client/spotify.svg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="{{asset('/')}}images/client/stack-overflow.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================   Clients -->

    </footer>
    <!--================================= Footer-->
