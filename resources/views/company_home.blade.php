@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 

<style>
        .sidebar {
            background: #eaeaea;
            padding: 20px;
        }
        
        .widget-title.widget-collapse {
            background: #434242;
            padding: 8px;
            border-radius: 5px;
            padding-right: 6%;
        }
        
        .user-dashboard-info-box {
            border: 1px solid #eeeeee;
            padding: 0px !important;
        }
        
        b {
            color: #000;
        }
        
        @media (min-width: 1200px) {
            .container {
                max-width: 1000px;
            }
        }
        body
        {
            font-weight:600;
        }
    </style>

    <!--================================= Banner -->

    <div class="container">
        <div class="row">
            <section class="clearfix slider-banner">
                <div id="slider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#slider" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#slider" data-bs-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner" style="margin-top:25px!important;">
                        <div class="carousel-item active">
                            <img class="img-fluid" src="{{asset('/')}}images/slider/banner-01.jpeg" alt="">                          
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid" src="{{asset('/')}}images/slider/banner-02.jpeg" alt="">                           
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#slider" role="button" data-bs-slide="prev" data-bs-target="#slider">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#slider" role="button" data-bs-slide="next" data-bs-target="#slider">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
        </div>
    </div>
    <!--================================= Banner -->

    <section class="space-ptb" style="padding: 50px!important;margin-bottom:80px;">
        <div class="container">
        @include('flash::message')
            <div class="row">
                <!--=================================       sidebar -->
                @include('includes.company_dashboard_menu')
                 <!--=================================       sidebar -->
                 
                 <!--=================================      Middle bar -->
                 @include('includes.company_dashboard_stats')
                <!--=================================      Middle bar -->


                <!--=================================       sidebar -->
                <div class="col-lg-3">
                    <div class="owl-carousel owl-nav-bottom-center" data-nav-arrow="false" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="15" data-autoheight="true">
                        <div class="item">
                            <div class="employers-grid bg-white py-4">
                                <div class="employers-list-logo pt-0">
                                    <img class="img-fluid" src="assets/images/svg/09.svg" alt="">
                                </div>
                                <div class="employers-list-details">
                                    <div class="employers-list-info">
                                        <div class="employers-list-title">
                                            <h5 class="mb-0"><a href="employer-detail.html">Bright Sparks PLC</a></h5>
                                        </div>
                                        <div class="employers-list-option">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Botchergate, Carlisle</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="employers-list-position">
                                    <a class="btn btn-sm btn-dark" href="#">25 Open position</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid bg-white py-4">
                                <div class="employers-list-logo pt-0">
                                    <img class="img-fluid" src="assets/images/svg/08.svg" alt="">
                                </div>
                                <div class="employers-list-details">
                                    <div class="employers-list-info">
                                        <div class="employers-list-title">
                                            <h5 class="mb-0"><a href="employer-detail.html">Suttons Financial Ltd</a></h5>
                                        </div>
                                        <div class="employers-list-option">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Paris, Île-de-France</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="employers-list-position">
                                    <a class="btn btn-sm btn-dark" href="#">23 Open position</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid bg-white py-4">
                                <div class="employers-list-logo pt-0">
                                    <img class="img-fluid" src="assets/images/svg/06.svg" alt="">
                                </div>
                                <div class="employers-list-details">
                                    <div class="employers-list-info">
                                        <div class="employers-list-title">
                                            <h5 class="mb-0"><a href="employer-detail.html">Altenwerth and Hamill</a></h5>
                                        </div>
                                        <div class="employers-list-option">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Taunton, London</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="employers-list-position">
                                    <a class="btn btn-sm btn-dark" href="#">35 Open position</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="employers-grid bg-white mt-4 py-4">
                        <div class="widget-title widget-collapse mb-3" style="background: #fff;">
                            <h5>Featured Company</h5>
                        </div>
                        <div class="mb-3">
                            <img class="img-fluid" src="assets/images/bg/bg-01.jpg" alt="">
                        </div>
                        <div class="employers-list-details">
                            <div class="employers-list-info">
                                <div class="employers-list-title">
                                    <h5 class="mb-0"><a href="employer-detail.html">Bright Sparks PLC</a></h5>
                                </div>
                                <div class="employers-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Botchergate, Carlisle</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="employers-list-position">
                            <a class="btn btn-sm btn-primary" href="#">Part-Time</a>
                        </div>
                    </div>
                </div>
                <!--=================================      sidebar -->
            </div>
        </div>
    </section>

@include('includes.footer')
@endsection
@push('scripts')
@include('includes.immediate_available_btn')
@endpush