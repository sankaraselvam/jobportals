@extends('layouts.app')



@section('content') 

<!-- Header start --> 

@include('includes.header') 

<!-- Header end --> 

<!--================================= banner -->
<section class="banner bg-holder bg-overlay-black-30" style="background-image: url({{asset('/')}}images/bg/dashboardbg.png); padding: 40px 0 40px 0!important;"></section>

<!--- ================================ banner -->

<section class="space-ptb">
  <div class="container">
    <div class="row">   
      <div class="col-lg-8">
        <div class="employers-list border">
          <div class="employers-list-logo" style="width: 125px!important;">
          <p style="height:80%!important;">{{$company->printCompanyImage()}}</p>            
          </div>
          <div class="employers-list-details">
            <div class="employers-list-info">
              <div class="employers-list-title">
                <h5 class="mb-0">{{$company->name}}</h5>
              </div>
             
              <div class="employers-list-option">
                <ul class="list-unstyled">                                    
                  <li><i class="fas fa-map-marker-alt pe-1"></i>{{__('Member Since')}}, {{$company->created_at->format('M d, Y')}}</li>                  
                </ul>
              </div>
            </div>
          </div>
          <div class="employers-list-position">
            <a class="btn btn-sm btn-dark" href="#">{{$company->countNumJobs('company_id',$company->id)}} Open position</a>
          </div>
        </div>
        <div class="border p-4 mt-4 mt-md-5">          
          <div class="row">
            <div class="col-md-6 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-time"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1">Industry</label>
                  <span class="mb-0 fw-bold d-block text-dark">{{$company->getIndustry('industry')}}</span>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-users"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1">Total Employees</label>
                  <span class="mb-0 fw-bold d-block text-dark">{{$company->no_of_employees}}</span>
                </div>
              </div>
            </div>
           
            <div class="col-md-6 col-sm-6 mb-md-0 mb-4">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-placeholder"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1">Locations</label>
                  <span class="mb-0 fw-bold d-block text-dark">{{$company->location}}</span>
                </div>
              </div>
            </div>
           
            <div class="col-md-6 col-sm-6">
              <div class="d-flex">
                <i class="font-xll text-primary align-self-center flaticon-add-user"></i>
                <div class="feature-info-content ps-3">
                  <label class="mb-1">Followers</label>
                  <span class="mb-0 fw-bold d-block text-dark">50</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-4 mt-md-5 mb-4 mb-md-5">
          <h5 class="mb-3 mb-md-4">About Us</h5>
          <p>{!! $company->description !!}</p>          
        </div>
        <hr>
      </div>
      <!--=================================
      sidebar -->
      <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="sidebar mb-0"> 
        <div class="widget">
            <div class="company-address widget-box">             
              <ul class="list-unstyled mt-3">
              @if(!empty($company->website))
                <li><a href="#" style="color:#263bd6;"><i class="fas fa-link fa-fw"></i><span class="ps-2">{{$company->website}}</span></a></li>
                @endif  
                @if(!empty($company->phone))
                <li><a href="tel:{{$company->phone}}" style="color:#263bd6;"><i class="fas fa-phone fa-flip-horizontal fa-fw"></i><span class="ps-2">{{$company->phone}}</span></a></li>
                @endif
                @if(!empty($company->email))
                <li><a href="mailto:{{$company->email}}" style="color:#263bd6;"><i class="fas fa-envelope fa-fw"></i><span class="ps-2">{{$company->email}}</span></a></li>
                @endif
               
              </ul>
            </div>
          </div>         

          <div class="widget">
            <div class="widget-title">
              <h5>Contact Company</h5>
            </div>
            <div class="company-contact-inner widget-box">
              <form>
                <div class="form-group mb-3">
                  <input type="text" class="form-control" placeholder="Full name">
                </div>
                <div class="form-group mb-3">
                  <input type="email" class="form-control" placeholder="Email address">
                </div>
                <div class="form-group mb-3">
                  <input type="text" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group mb-3">
                  <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                </div>
                <a class="btn btn-primary btn-outline-primary d-grid" href="#">Submit</a>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--=================================      sidebar -->
      <div class="col-lg-8">
      <div class="widget">
            <div class="widget-title">
              <h5>Similar Jobs</h5>
            </div>
            @if(isset($company->jobs) && count($company->jobs))

            @foreach($company->jobs as $companyJob) 
            <div class="similar-jobs-item widget-box" style="box-shadow: 0 1px 2px 0 rgb(0 106 194 / 20%);margin-bottom:5px;">              
              <div class="job-list">
                <div class="job-list-logo">                 
                  <p style="height:80%!important;">{{$company->printCompanyImage()}}</p> 
                </div>
                <div class="job-list-details">
                  <div class="job-list-info">
                    <div class="job-list-title">
                      <h6><a href="{{route('job.detail', [$companyJob->slug])}}" title="{{$companyJob->title}}">{{$companyJob->title}}</a>
                      <span><a class="btn btn-white mb-2 btn-sm" href="{{route('job.detail', [$companyJob->slug])}}" style="float:right;font-size:12px;">View Detail </a></span></h6>
                     
                    </div>
                    <div class="job-list-option">
                      <ul class="list-unstyled">
                        <li>
                          <span>via</span>
                          <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a>
                        </li>
                        <li><button type="button" class="btn btn-primary btn-md mb-2" title="{{$companyJob->getJobType('job_type')}}" style="font-size:12px;">{{$companyJob->getJobType('job_type')}}</button>                        </li>                        
                        
                      </ul>
                      <p>{{str_limit(strip_tags($companyJob->description), 150, '...')}}</p>                     
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

@push('styles')

<style type="text/css">

.formrow iframe {

	height: 78px;

}

</style>

@endpush

@push('scripts') 

<script type="text/javascript">

    $(document).ready(function () {

        $(document).on('click', '#send_company_message', function () {

            var postData = $('#send-company-message-form').serialize();

            $.ajax({

                type: 'POST',

                url: "{{ route('contact.company.message.send') }}",

                data: postData,

                //dataType: 'json',

                success: function (data)

                {

                    response = JSON.parse(data);

                    var res = response.success;

                    if (res == 'success')

                    {

                        var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';

                        $('#alert_messages').html(errorString);

                        $('#send-company-message-form').hide('slow');

                        $(document).scrollTo('.alert', 2000);

                    } else

                    {

                        var errorString = '<div class="alert alert-danger" role="alert"><ul>';

                        response = JSON.parse(data);

                        $.each(response, function (index, value)

                        {

                            errorString += '<li>' + value + '</li>';

                        });

                        errorString += '</ul></div>';

                        $('#alert_messages').html(errorString);

                        $(document).scrollTo('.alert', 2000);

                    }

                },

            });

        });

    });

</script> 

@endpush