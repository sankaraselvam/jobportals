@extends('layouts.app')

@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 



<div class="about-wraper">
    <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                <h2>{{$cmsContent->page_title}}</h2>
                <p>{!! $cmsContent->page_content !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">{!! $siteSetting->cms_page_ad !!}</div>
                <div class="col-md-3"></div>
            </div>
      </div>  
</div>

@include('includes.footer')
@endsection