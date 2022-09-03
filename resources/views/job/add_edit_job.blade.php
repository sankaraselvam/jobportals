@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
  
<div class="listpgWraper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-sm-12"> 
        <div class="row">
      <div class="col-md-12">
        <div class="userccount">
          <div class="formpanel"> @include('flash::message') 
            <!-- Personal Information -->
            @include('job.inc.job')
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