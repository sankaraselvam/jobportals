@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 

<!--=================================  Change Password -->
    <section style="background:#f9f9f9;"><br><br>
        <div class="container">
            <div class="row">
                <div class=" offset-md-2 col-md-8">
                    <div class="user-dashboard-info-box">
                        <div class="section-title-02 mb-4">
                            <h4>Change Password</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form class="row">
                                    <div class="form-group mb-3 col-md-12">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" class="form-control" value="">
                                    </div>
                                    <div class="form-group mb-3 col-md-12">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" value="">
                                    </div>
                                    <div class="form-group col-md-12 mb-0">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" value="">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-lg btn-primary" href="#">Change Password</a>
                </div>
            </div>
        </div>
    </section><br><br>
    <!--================================= Change Password -->
    @include('includes.footer')
    @endsection
