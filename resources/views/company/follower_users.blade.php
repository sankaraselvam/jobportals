@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<style>
        .job-list .job-list-logo {
        height: 100px;
        width: 150px;
         }     
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
<section class="space-ptb">
  <div class="container">
    <div class="row"> 
       <!--=================================       sidebar -->
       @include('includes.company_dashboard_menu')
                 <!--=================================       sidebar -->
      <div class="col-lg-8">
      <div class="widget">
            <div class="widget-title">
              <h6>{{__('Company Followers')}}</h6>
            </div>
            @if(isset($users) && count($users))
            @foreach($users as $user)
            <div class="similar-jobs-item widget-box" style="box-shadow: 0 1px 2px 0 rgb(0 106 194 / 20%);margin-bottom:5px;">              
              <div class="job-list">
                <div class="job-list-logo">                 
                  <p>{{$user->printUserImage(80, 80)}}</p> 
                </div>
                <div class="job-list-details">
                  <div class="job-list-info">
                    <div class="job-list-title">
                      <h6><a href="{{route('user.profile', $user->id)}}">{{$user->getName()}}</a>
                      <span><a class="btn btn-white mb-2 btn-sm" href="{{route('user.profile', $user->id)}}" style="float:right;font-size:12px;">View Profile </a></span></h6>
                     
                    </div>
                    <div class="job-list-option">
                      <ul class="list-unstyled">
                        <li>
                          <span>{{$user->getLocation()}}</span>
                        </li>                                              
                       
                      </ul> 
                      <p>{{str_limit($user->getProfileSummary('summary'),150,'...')}}</p>                               
                    </div>
                  </div>
                </div>
              </div>              
            </div>
            @endforeach

            @endif 
          </div>
      </div>
    </div>
  </div>
</section>
@include('includes.footer')
@endsection