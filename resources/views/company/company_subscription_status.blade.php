<?php 
use Carbon\Carbon;
?>
@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 

<style>
.user-dashboard-info-box {
    border: 1px solid #eeeeee;
    padding: 0px !important;
}

td {
    font-size: 12px;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    text-transform: capitalize!important;
}
</style>


<section class="space-ptb" style="background: #f9f9f9;">
<div class="container">
    <div class="row">
        <b style="color: #000;">Subscription Status</b>
        <p>The amount mentioned below is inclusive of all taxes.</p>

        <div class="col-lg-8">
            <div class="card-header mt-4">Transaction Details
                <p style="color: #000;font-weight: 600;"><span style="margin-left:10%;">Date : 22-Apr-22</span> <span style="margin-left:10%;">Free Of Cost</span></p>
            </div>

            <div class="card-body mb-4" style="border: 1px solid #ddd;">
                <p style="color:#000;">Product Description</p>
                <p style="color:#000;">Classified Annual Subscription (Upto {{Auth::guard('company')->user()->jobs_quota}} Job Postings)</p>
                - Classified Annual Subscription (Upto {{Auth::guard('company')->user()->jobs_quota}} Job Postings) {{Auth::guard('company')->user()->package_start_date->format('d M, Y')}}- {{Auth::guard('company')->user()->package_end_date->format('d M, Y')}} 
                @if (strtotime(Auth::guard('company')->user()->package_end_date) <= strtotime(Carbon::now()))
                    <span style="float: right;color:red;"><b>In Active</b></span>
                @else 
                    <span style="float: right;color:green;"><b>Active</b></span>   
                @endif
                
                </p>
            </div>
        </div>
        <!--=================================      sidebar -->
        <div class="col-lg-4">
            <div class="sidebar mb-0">
                <div class="widget">
                    <div class="company-address widget-box">
                        <b>Contact us for Customer Support:</b>
                        <ul class="list-unstyled mt-3">
                            <li><a href="tel:+905389635487"><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="ps-2">044 - 79667735</span></a></li>
                            <li><a href="mailto:support@udhyog.com"><i class="fas fa-envelope fa-fw"></i><span class="ps-2">support@udhyog.com</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="widget">
                    <div class="jobber-company-view">
                        <ul class="list-unstyled">
                            <li>
                                <div class="widget-box">
                                    <div class="d-flex">
                                        <i class="flaticon-clock fa-2x fa-fw text-primary"></i>
                                        <span class="ps-3">365 Days</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--=================================    sidebar -->     
        
    </div>
</div>
</section>

@include('includes.footer')
@endsection

