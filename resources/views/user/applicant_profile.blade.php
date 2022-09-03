@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<style>
  .job-header {
    background: #fff;   
    margin-bottom: 30px;
}

.jbdetail li {
    margin-bottom: 20px;
    color: #908f8f;
}
</style>
<!--================================= banner -->
<section class="banner bg-holder bg-overlay-black-30" style="background-image: url({{asset('/')}}images/bg/dashboardbg.png); padding: 40px 0 40px 0!important;"></section>

<!--- ================================ banner -->

<section class="space-ptb">
  <div class="container">
    <div class="row">   
      <div class="col-lg-8">
        <div class="employers-list border">
          <div class="employers-list-logo" style="width: 125px!important;">
          <p>{{$user->printUserImage(60, 60)}}</p>            
          </div>
          <div class="employers-list-details">
            <div class="employers-list-info">
              <div class="employers-list-title">
                <h5 class="mb-0">{{$user->getName()}}</h5>
              </div>
             
              <div class="employers-list-option">
                <ul class="list-unstyled">                                    
                  <li><i class="fas fa fa-history pe-1"></i> {{__('Member Since')}}, {{$user->created_at->format('M d, Y')}}</li> <br>                 
                  <li><i class="fas fa-map-marker-alt pe-1"></i>{{$user->getLocation()}}</li> 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="border p-3 mt-5">
              <div class="row">                
                <div class="col-md-4 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-contact"></i>
                    <div class="feature-info-content ps-3">
                      <label class="mb-0">Phone :</label>
                      <span class="d-block fw-bold text-dark">{{$user->phone}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-appointment"></i>
                    <div class="feature-info-content ps-3">
                      <label class="mb-0">Date Of Birth :</label>
                      <span class="d-block fw-bold text-dark">{{$user->date_of_birth->format('M d, Y')}}</span>
                    </div>
                  </div>
                </div>                
                <div class="col-md-4 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-man"></i>
                    <div class="feature-info-content ps-3">
                      <label class="mb-0">Sex :</label>
                      <span class="d-block fw-bold text-dark">{{$user->getGender('gender')}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-map"></i>
                    <div class="feature-info-content ps-3">
                      <label class="mb-0">Address :</label>
                      <span class="d-block fw-bold text-dark">{{$user->street_address}}</span>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                  <div class="d-flex">
                    <i class="font-xll text-primary align-self-center flaticon-approval"></i>
                    <div class="feature-info-content ps-3">
                      <label class="mb-0">Email:</label>
                      <span class="d-block fw-bold text-dark">{{$user->email}}</span>
                    </div>
                  </div>
                </div>                
              </div>
        </div>
        <div class="mt-4 mt-sm-5">
          <h5 class="mb-3">About Me</h5>
              <p style="font-size:14px;">{{$user->getProfileSummary('summary')}}</p>              
        </div>
      </div>
     <!--=================================    sidebar -->
    <div class="col-lg-4">
      <div class="sidebar mb-0">                
        <div class="widget job-header">         
          <div class="company-contact-inner widget-box ">
          <div class="widget-title jobdetail">
            <h5>Candidate Detail </h5>
          </div>
          <ul class="jbdetail">              
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Is Email Verified')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{((bool)$user->verified)? 'Yes':'No'}}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Immediate Available')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{((bool)$user->is_immediate_available)? 'Yes':'No'}}</span></div>
              </li>
              
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Age')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{$user->getAge()}} Years</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Gender')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{$user->getGender('gender')}}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Marital Status')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{$user->getMaritalStatus('marital_status')}}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Experience')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{$user->getJobExperience('job_experience')}}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Career Level')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{$user->getCareerLevel('career_level')}}</span></div>
              </li>             
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Current Salary')}}</div>
                <div class="col-md-6 col-xs-6"><span class="permanent">{{$user->current_salary}} {{$user->salary_currency}}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Expected Salary')}}</div>
                <div class="col-md-6 col-xs-6"><span class="freelance">{{$user->expected_salary}} {{$user->salary_currency}}</span></div>
              </li>              
            </ul>
          </div>
        </div>
        <div class="widget">
          <div class="widget-add">
          <img class="img-fluid" src="images/add-banner.png" alt=""></div>
        </div>
      </div>
    </div>
    <!--=================================    sidebar -->
      <div class="col-lg-8">
        <hr class="my-4 my-md-5">
          <div id="education">
            <h5 class="mb-3">Education</h5>
            <div class="jobber-candidate-timeline">
              <div class="jobber-timeline-icon">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <div class="jobber-timeline-item">
                <div class="jobber-timeline-cricle">
                  <i class="far fa-circle"></i>
                </div>
                <div class="jobber-timeline-info">
                  <span class="jobber-timeline-time">2018 - Pres</span>
                  <h6 class="mb-2">Masters in Software Engineering</h6>
                  <span>- Engineering University</span>
                  <p class="mt-2">This is the beginning of creating the life that you want to live. Know what the future holds for you as a result of the choice you can make today.</p>
                </div>
              </div>
              <div class="jobber-timeline-item">
                <div class="jobber-timeline-cricle">
                  <i class="far fa-circle"></i>
                </div>
                <div class="jobber-timeline-info">
                  <span class="jobber-timeline-time">2014 - 2018</span>
                  <h6 class="mb-2">Diploma in Graphics Design</h6>
                  <span>- Graphic Arts Institute</span>
                  <p class="mt-2">Have some fun and hypnotize yourself to be your very own “Ghost of Christmas future” and see what the future holds for you.</p>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4 my-md-5">
          <div id="experience">
            <h5 class="mb-3">Work & Experience</h5>
            <div class="jobber-candidate-timeline">
              <div class="jobber-timeline-icon">
                <i class="fas fa-briefcase"></i>
              </div>
              <div class="jobber-timeline-item">
                <div class="jobber-timeline-cricle">
                  <i class="far fa-circle"></i>
                </div>
                <div class="jobber-timeline-info">
                  <span class="jobber-timeline-time">2018-6-01 <b>to</b> 2020-2-01</span>
                  <h6 class="mb-2">Web Designer</h6>
                  <span>- Inwave Studio</span>
                  <p class="mt-2">One of the main areas that I work on with my clients is shedding these non-supportive beliefs and replacing them with beliefs that will help them to accomplish their desires.</p>
                </div>
              </div>
              <div class="jobber-timeline-item">
                <div class="jobber-timeline-cricle">
                  <i class="far fa-circle"></i>
                </div>
                <div class="jobber-timeline-info">
                  <span class="jobber-timeline-time">2017-6-01 <b>to</b> 2018-6-01</span>
                  <h6 class="mb-2">Secondary School Certificate</h6>
                  <span>- Engineering High School</span>
                  <p class="mt-2">Figure out what you want, put a plan together to achieve it, understand the cost, believe in yourself then go and get it!</p>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4 my-md-5">
          <div id="skill">
            <h5 class="mb-3">Professional Skill</h5>
            <div class="">
            <blockquote class="blockquote"> So how do we get clarity? Simply by asking ourselves lots of questions: What do I really want? What does success look like to me? How will this achievement change my life? How can I use this success to make a difference for others?</blockquote>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width:55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar-title">Photoshop</div>
                  <span class="progress-bar-number">70%</span>
                </div>
              </div>
              <div class="progress mb-md-0">
                <div class="progress-bar" role="progressbar" style="width:80%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar-title">JavaScript</div>
                  <span class="progress-bar-number">80%</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width:55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar-title">HTML/CSS</div>
                  <span class="progress-bar-number">55%</span>
                </div>
              </div>
              <div class="progress mb-md-0">
                <div class="progress-bar" role="progressbar" style="width:60%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar-title">PHP</div>
                  <span class="progress-bar-number">60%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4 my-md-5">
        <div id="portfolio" class=" popup-gallery">
          <h5 class="mb-3">Portfolio</h5>
          <div class="owl-carousel mb-lg-5 mb-4" data-nav-arrow="false" data-items="3" data-md-items="3" data-sm-items="3" data-xs-items="2" data-space="15">
            <div class="item">
              <a class="portfolio-img" href="images/gallery/01.jpg"><img class="img-fluid" src="images/gallery/01.jpg" alt=""></a>
            </div>
            <div class="item">
              <a class="portfolio-img" href="images/gallery/02.jpg"><img class="img-fluid" src="images/gallery/02.jpg" alt=""></a>
            </div>
            <div class="item">
              <a class="portfolio-img" href="images/gallery/03.jpg"><img class="img-fluid" src="images/gallery/03.jpg" alt=""></a>
            </div>
          </div>
          <p>The sad thing is the majority of people have no clue about what they truly want. They have no clarity. When asked the question, responses will be superficial at best, and at worst, will be what someone else wants for them.</p>
        </div>        
    </div>
    <!--=================================    sidebar -->
    <div class="col-lg-4">
      <div class="sidebar mb-0">                
        <div class="widget">
          <div class="widget-title">
            <h5>Contact Job Seeker </h5>
          </div>
          <div class="company-contact-inner widget-box">
            <form>
              <div class="form-group mb-3">
                <label class="form-label">Full name</label>
                <input type="text" class="form-control" placeholder="">
              </div>
              <div class="form-group mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" placeholder="">
              </div>
              <div class="form-group mb-3">
                <label class="form-label">Subject</label>
                <input type="text" class="form-control" placeholder="">
              </div>
              <div class="form-group mb-3">
                <label class="form-label">Message</label>
                <textarea class="form-control" rows="3" placeholder=""></textarea>
              </div>
              <a class="btn btn-primary btn-outline-primary d-grid" href="#">Send Email</a>
            </form>
          </div>
        </div>
        <div class="widget">
          <div class="widget-add">
          <img class="img-fluid" src="images/add-banner.png" alt=""></div>
        </div>
      </div>
    </div>
    <!--=================================    sidebar -->
  </div>
</section>

<div class="listpgWraper">
  <div class="container">  
  @include('flash::message')  
    <!-- Job Header start -->
    <div class="job-header">
      <div class="jobinfo">
        <div class="row">
          <div class="col-md-8 col-sm-8"> 
            <!-- Candidate Info -->
            <div class="candidateinfo">
              <div class="userPic">{{$user->printUserImage()}}</div>
              <div class="title">
              {{$user->getName()}}
              @if((bool)$user->is_immediate_available)
              <sup style="font-size:12px; color:#090;">{{__('Immediate Available For Work')}}</sup>
            @endif
              </div>
              <div class="desi">{{$user->getLocation()}}</div>
              <div class="loctext"><i class="fa fa-history" aria-hidden="true"></i> {{__('Member Since')}}, {{$user->created_at->format('M d, Y')}}</div>
              <div class="loctext"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->street_address}}</div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4"> 
            <!-- Candidate Contact -->
            <div class="candidateinfo">            
            @if(!empty($user->phone))
              <div class="loctext"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:{{$user->phone}}">{{$user->phone}}</a></div>
            @endif
            @if(!empty($user->mobile_num))
              <div class="loctext"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:{{$user->mobile_num}}">{{$user->mobile_num}}</a></div>
            @endif
            @if(!empty($user->email))
              <div class="loctext"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:{{$user->email}}">{{$user->email}}</a></div>
            @endif
            </div>            
          </div>
        </div>
      </div>
      
      <!-- Buttons -->
      <div class="jobButtons">
      @if(isset($job) && isset($company))
      @if(Auth::guard('company')->check() && Auth::guard('company')->user()->isFavouriteApplicant($user->id, $job->id, $company->id))
      <a href="{{route('remove.from.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id])}}" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('Short Listed Applicant')}} </a>
      @else
      <a href="{{route('add.to.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id])}}" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('Short List This Applicant')}}</a>
      @endif
      @endif
      
      @if(null !== $profileCv)<a href="{{asset('cvs/'.$profileCv->cv_file)}}" class="btn"><i class="fa fa-download" aria-hidden="true"></i> {{__('Download CV')}}</a>@endif
      <a href="#contact_applicant" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> {{__('Send Message')}}</a>
      
      </div>
    </div>
    
    <!-- Job Detail start -->
    <div class="row">
      <div class="col-md-8"> 
        <!-- About Employee start -->
        <div class="job-header">
          <div class="contentbox">
            <h3>{{__('About me')}}</h3>
            <p>{{$user->getProfileSummary('summary')}}</p>
          </div>
        </div>
        
        <!-- Education start -->
        <div class="job-header">
          <div class="contentbox">
            <h3>{{__('Education')}}</h3>
            <div class="" id="education_div"></div>            
          </div>
        </div>
        
        <!-- Experience start -->
        <div class="job-header">
          <div class="contentbox">
            <h3>{{__('Experience')}}</h3>
            <div class="" id="experience_div"></div>            
          </div>
        </div>
        
        <!-- Portfolio start -->
        <div class="job-header">
          <div class="contentbox">
            <h3>{{__('Portfolio')}}</h3>
            <div class="" id="projects_div"></div>            
          </div>
        </div>
      </div>
      <div class="col-md-4"> 
        <!-- Candidate Detail start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3>{{__('Candidate Detail')}}</h3>
            <ul class="jbdetail">
              
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Is Email Verified')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{((bool)$user->verified)? 'Yes':'No'}}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Immediate Available')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{((bool)$user->is_immediate_available)? 'Yes':'No'}}</span></div>
              </li>
              
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Age')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{$user->getAge()}} Years</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Gender')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{$user->getGender('gender')}}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Marital Status')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{$user->getMaritalStatus('marital_status')}}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Experience')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{$user->getJobExperience('job_experience')}}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Career Level')}}</div>
                <div class="col-md-6 col-xs-6"><span>{{$user->getCareerLevel('career_level')}}</span></div>
              </li>             
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Current Salary')}}</div>
                <div class="col-md-6 col-xs-6"><span class="permanent">{{$user->current_salary}} {{$user->salary_currency}}</span></div>
              </li>
              <li class="row">
                <div class="col-md-6 col-xs-6">{{__('Expected Salary')}}</div>
                <div class="col-md-6 col-xs-6"><span class="freelance">{{$user->expected_salary}} {{$user->salary_currency}}</span></div>
              </li>              
            </ul>
          </div>
        </div>
        
        <!-- Google Map start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3>{{__('Skills')}}</h3>
            <div id="skill_div"></div>            
          </div>
        </div>
        
        <div class="job-header">
          <div class="jobdetail">
            <h3>{{__('Languages')}}</h3>
            <div id="language_div"></div>            
          </div>
        </div>
        <!-- Contact Company start -->
        <div class="job-header">
          <div class="jobdetail">
            <h3 id="contact_applicant">{{__($form_title)}}</h3>
            <div id="alert_messages"></div>
            <?php
                        $from_name = $from_email = $from_phone = $subject = $message = $from_id = '';
                        if(isset($company)){
							$from_name = $company->name;
							$from_email = $company->email;
							$from_phone = $company->phone;
							$from_id = $company->id;
						}
                        $from_name = old('name', $from_name);
                        $from_email = old('email', $from_email);
                        $from_phone = old('phone', $from_phone);
                        $subject = old('subject');
                        $message = old('message');
                        ?>
            <form method="post" id="send-applicant-message-form">
              {{ csrf_field() }}
              <input type="hidden" name="to_id" value="{{ $user->id }}">
              <input type="hidden" name="from_id" value="{{ $from_id }}">
              <input type="hidden" name="user_id" value="{{ $user->id }}">
              <input type="hidden" name="user_name" value="{{ $user->getName() }}">
              <div class="formpanel">
                <div class="formrow">
                  <input type="text" name="from_name" value="{{ $from_name }}" class="form-control" placeholder="{{__('Your Name')}}">
                </div>
                <div class="formrow">
                  <input type="text" name="from_email" value="{{ $from_email }}" class="form-control" placeholder="{{__('Your Email')}}">
                </div>
                <div class="formrow">
                  <input type="text" name="from_phone" value="{{ $from_phone }}" class="form-control" placeholder="{{__('Phone')}}">
                </div>
                <div class="formrow">
                  <input type="text" name="subject" value="{{ $subject }}" class="form-control" placeholder="{{__('Subject')}}">
                </div>
                <div class="formrow">
                  <textarea name="message" class="form-control" placeholder="Message">{{ $message }}</textarea>
                </div>                
                <div class="formrow">
                <input type="button" class="btn" value="{{__('Submit')}}" id="send_applicant_message">
                </div>
              </div>
            </form>

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
.formrow iframe {
	height: 78px;
}
</style>
@endpush
@push('scripts') 
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#send_applicant_message', function () {
            var postData = $('#send-applicant-message-form').serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('contact.applicant.message.send') }}",
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
                        $('#send-applicant-message-form').hide('slow');
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
		
		showEducation();
		showProjects();
		showExperience();
		showSkills();
		showLanguages();
		
    });
	
function showProjects()
{
	$.post("{{ route('show.applicant.profile.projects', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
	.done(function (response) {
	$('#projects_div').html(response);
	});		
}

function showExperience()
{
	$.post("{{ route('show.applicant.profile.experience', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
	.done(function (response) {
	$('#experience_div').html(response);
	});		
}

function showEducation()
{
	$.post("{{ route('show.applicant.profile.education', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
	.done(function (response) {
	$('#education_div').html(response);
	});		
}
function showLanguages()
{
	$.post("{{ route('show.applicant.profile.languages', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
	.done(function (response) {
	$('#language_div').html(response);
	});		
}
function showSkills()
{
	$.post("{{ route('show.applicant.profile.skills', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
	.done(function (response) {
	$('#skill_div').html(response);
	});		
}
</script> 
@endpush