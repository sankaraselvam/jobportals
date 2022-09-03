<!--================================= Testimonials & Counter -->
<section class="space-ptb bg-holder bg-overlay-black-80" style="background-image: url({{asset('/')}}images/bg/02.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 position-relative">
                    <div class="section-title center">
                        <h2 class="title text-white">{{__('Clients Say About Us')}}</h2>                        
                    </div>
                </div>
            </div>
            <!--=================================     testimonials -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="owl-carousel owl-nav-top-center" data-nav-arrow="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
                    @if(isset($testimonials) && count($testimonials))
                        @foreach($testimonials as $testimonial)    
                    <div class="item">                       
                            <div class="testimonial-item text-center">
                                <div class="avatar">
                                    <img class="img-fluid rounded-circle" src="{{asset('/')}}images/avatar/04.jpg" alt="">
                                </div>
                                <div class="testimonial-content">
                                    <p class="text-white">"{{$testimonial->testimonial}}"</p>
                                </div>
                                <div class="testimonial-name">
                                    <i class="fas fa-quote-left quotes"></i>
                                    <h6 class="mb-1 text-primary">{{$testimonial->testimonial_by}}</h6>
                                    <span class="text-white">{{$testimonial->company}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      @endif
                    </div>
                </div>
            </div>
            <!--=================================    testimonials -->


            <!--=================================    jobber-Counter -->
            <div class="row pt-4 pt-lg-5 position-relative">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter mt-4 mb-4 mb-lg-0">
                        <div class="counter-icon">
                            <i class="font-xlll text-primary flaticon-curriculum"></i>
                        </div>
                        <div class="counter-content">
                            <span class="timer text-white" data-to="1227" data-speed="10000">1227</span>
                            <label class="mb-0 text-white">Jobs Posted</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter mt-4 mb-4 mb-lg-0">
                        <div class="counter-icon">
                            <i class="font-xlll text-primary flaticon-resume"></i>
                        </div>
                        <div class="counter-content">
                            <span class="timer mb-1 text-white" data-to="123" data-speed="10000">123</span>
                            <label class="mb-0 text-white">Jobs Filled</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter mt-4 mb-4 mb-sm-0">
                        <div class="counter-icon">
                            <i class="font-xlll text-primary flaticon-suitcase"></i>
                        </div>
                        <div class="counter-content">
                            <span class="timer mb-1 text-white" data-to="170" data-speed="10000">170</span>
                            <label class="mb-0 text-white">Companies</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter mt-4">
                        <div class="counter-icon">
                            <i class="font-xlll text-primary flaticon-users"></i>
                        </div>
                        <div class="counter-content">
                            <span class="timer mb-1 text-white" data-to="127" data-speed="10000">127</span>
                            <label class="mb-0 text-white">Members</label>
                        </div>
                    </div>
                </div>
            </div>
            <!--=================================    jobber-Counter -->
        </div>
    </section>
    <!--================================= Testimonials & Counter -->

