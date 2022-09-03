<style>
        .carousel-control-next {
            width: 4%!important;
        }
        
        .carousel-control-prev {
            width: 2%;
        }
        
        .sidebar {
            background: #eaeaea;
            padding: 20px;
        }
        
        .widget-title.widget-collapse {
            background: #fff;
            padding: 5px;
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
        .job-list {
        padding: 10px!important;  
        border: 1px solid #dcdcdc;      
        }
        .job-list-details ul li {
            margin: 5px 25px 5px 0px;
            font-size: 13px;
        }
        input[type="text"]::-webkit-input-placeholder {
        color: #b8b5b5;
        font-size:14px;
        }
                
    </style>

   <section class="space-ptb" style="background: #f9f9f9;">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-8 mb-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background:#fff;padding: 25px 0px 25px 0px;">
                <h5 class="text-center"> Post A Job Oppourtunity</h5>               
            </div>
           <a href="" style="font-size:14px;" class="mb-1">Prefill from previous jobs</a>
                <div class="col-lg-8" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background:#fff;padding:25px;">   

                    <form class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Job Title / Designation <span style="color: red;"> *</span> </label>
                            <input type="text" class="form-control" value="" placeholder="Mention the designation or role">
                        </div>
                        <div class="form-group col-md-6 select-border mb-3">
                            <label class="mb-2">Employment Type re<span style="color: d;"> *</span></label>
                            <select class="form-control basic-select">
                                <option value="value 01" selected="selected">Full Time</option>
                                <option value="value 01">Part Time</option>
                                <option value="value 02">Temporary/Contractual</option>
                                <option value="value 03">Freelance/Homebased</option>
                                <option value="value 04">Shutdown Job</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="mb-2"> Job Description <span style="color: d;"> *</span></label>
                            <textarea class="form-control" id="job" rows="4" placeholder="Outline the activities a person in this role will perform on a regular basis"></textarea>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="mb-2"> Candidate profile <span style="color: d;"> *</span></label>
                            <textarea class="form-control" rows="4" placeholder="Specify required technical expertise, previous job experience or certification"></textarea>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Key Skills <span style="color:red;">*</span> </label><br>
                            <small>Specify key skills required for this job role</small>
                            <input type="text" class="form-control" value="" placeholder="Add skills(250 character allowed) ">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="mb-2">Work Experience (Years) <span style="color: red;"> *</span> </label>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="input-group mb-2">
                                <select class="form-control basic-select">
                                    <option value="value 01" selected="selected">Min</option>
                                    <option value="value 02">1</option>
                                    <option value="value 03">2</option>
                                  </select>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="input-group mb-2">
                                <select class="form-control basic-select">
                                    <option value="value 01" selected="selected">Max</option>
                                    <option value="value 02">1</option>
                                    <option value="value 03">2</option>
                                    <option value="value 03">3</option>
                                    <option value="value 03">4</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="mb-2">Annual Salary Range <span style="color: red;"> *</span> </label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend d-flex">
                                    <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Min Annual Salary">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend d-flex">
                                    <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Max Annual Salary">
                            </div>
                        </div>


                        <div class="form-group col-md-6 select-border mb-3">
                            <label class="mb-2">Industry <span style="color: red;">*</span> </label>
                            <select class="form-control basic-select">
                            <option value="value 01" selected="selected">Select Industry</option>
                            <option value="value 02">Apprenticeships</option>
                            <option value="value 03">Banking</option>
                            <option value="value 04">Education</option>
                            <option value="value 05">Engineering</option>
                            <option value="value 06">Estate Agency</option>
                            <option value="value 07">IT & Telecoms</option>
                            <option value="value 08">Legal</option>          
                          </select>
                        </div>

                        <div class="form-group col-md-6 select-border mb-3">
                            <label class="mb-2">Functional Area <span style="color: red;">*</span> </label>
                            <select class="form-control basic-select">
                            <option value="value 01" selected="selected">Choose a functional for your job</option>
                            <option value="value 02">Apprenticeships</option>
                            <option value="value 03">Banking</option>
                            <option value="value 04">Education</option>
                            <option value="value 05">Engineering</option>
                            <option value="value 06">Estate Agency</option>
                            <option value="value 07">IT & Telecoms</option>
                            <option value="value 08">Legal</option>          
                          </select>
                        </div>

                        <div class="form-group col-md-6 select-border mb-3">
                            <label class="mb-2">Number of Vacancies<span style="color: red;"> *</span> </label>
                            <input type="text" class="form-control" placeholder="Enter number of vacancies">
                        </div>
                        <div class="form-group col-md-6 select-border mb-3">
                            <label class="mb-2">Education <span style="color: red;"> *</span></label>
                            <select class="form-control basic-select">
                            <option value="value 01">Human Resources</option>
                            <option value="value 02">Energy</option>
                            <option value="value 03">IT & Telecoms</option>
                          </select>
                        </div>

                        <div class="form-group col-md-12 select-border mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="specialism1">
                                <label class="form-check-label" for="specialism1">Include walk-in details</label>
                            </div>
                        </div>
                        <div class="form-group mt-0 mb-3 col-md-4 datetimepickers">
                            <label class="form-label">Walk-in Start Date <span style="color:red;">*</span></label>
                            <div class="input-group date" id="datetimepicker-01" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" placeholder="Date" data-target="#datetimepicker-01">
                                <div class="input-group-append d-flex" data-target="#datetimepicker-01" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label class="mb-2">Duration (Days) <span style="color:red;">*</span> </label><br>
                            <select class="form-control basic-select">
                                <option value="1" selected="selected">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>          
                              </select>
                        </div>
                        <div class="form-group mt-0 mb-3 col-md-4 datetimepickers">
                            <label class="form-label">Walk-in timing <span style="color:red;">*</span></label>
                            <div class="input-group time" id="timepicker-01" data-target-input="nearest">
                                <input type="text" class="form-control timepicker-input" placeholder="Time" data-target="#datetimepicker-01">
                                <div class="input-group-append d-flex" data-target="#datetimepicker-01" data-toggle="timepicker">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Contact Person <span style="color:red;">*</span> </label><br>
                            <input type="text" class="form-control" value="" placeholder="Recruiter Name ">
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Contact Number <span style="color:red;">*</span> </label><br>
                            <input type="text" class="form-control" value="" placeholder="Add Mobile Number ">
                        </div>

                        <div class="form-group col-md-12 text-center">
                            <a class="btn btn-lg btn-primary" href="#">Preview & Post Job</a>
                        </div>
                    </form>
                </div>
              <!-- =================================      Middle bar -->
                 <div class="col-lg-4" style="margin-top:-9%;">
                    <div class="sidebar">
                    <h6 class="mt-1">Prefill from previous jobs</h6>
                            <!--<span><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></span>-->
                            <div class="col-12 mb-4">
                            <input type="text" class="form-control" value="" placeholder="Search previously posted jobs">
                            </div>
                            @if(isset($company->jobs) && count($company->jobs))

                            @foreach($company->jobs as $companyJob) 

                            <div class="col-12">
                                <div class="job-list mt-1">                        
                                    <div class="job-list-details">
                                        <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0"><a href="{{route('job.detail', [$companyJob->slug])}}">{{$companyJob->title}}</a></h5>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled">                                            
                                                <li><i class="fas fa-briefcase pe-2 mb-1"></i></i> 8 - 13 years</li>
                                                <li><i class="fas fa-map-marker-alt pe-3 mb-1"></i>Chennai</li>
                                                <li><i class="fas fa-address-card"></i><span class="ps-2"> {{$job->salary_from}} - {{$job->salary_to}} PA </span></li>
                                            </ul>
                                            <ul class="ps-3 pe-2 mb-0 list-style-2">
                                            <li>css</li>
                                            <li>website</li>
                                            <li>code</li>                                            
                                            <li>html5</li>                                            
                                        </ul>         
                                        </div>
                                    </div>
                                </div>                          
                            </div>
                             @endforeach
                            @endif 
                            <p class="mt-1">Posted on 12 May by hrddispl@gmail.com</p>
                                                      
                            <div class="col-12">
                                <div class="job-list mt-1">                        
                                    <div class="job-list-details">
                                        <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0"><a href="job-detail.html">Laravel Developer</a></h5>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled">                                            
                                                <li><i class="fas fa-briefcase pe-2 mb-1"></i></i> 8 - 13 years</li>
                                                <li><i class="fas fa-map-marker-alt pe-3 mb-1"></i>Chennai</li>
                                                <li><i class="fas fa-address-card"></i><span class="ps-2"> ₹ 100000 - 200000 P.A</span></li>
                                            </ul>
                                            <ul class="ps-3 pe-2 mb-0 list-style-2">
                                            <li>css</li>
                                            <li>website</li>
                                            <li>code</li>                                            
                                            <li>html5</li>                                            
                                        </ul>         
                                        </div>
                                    </div>
                                </div>                          
                            </div>
                            <p class="mt-1">Posted on 12 May by hrddispl@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>






<h5>{{__('Job Details')}}</h5>
@if(isset($job))
{!! Form::model($job, array('method' => 'put', 'route' => array('update.front.job', $job->id), 'class' => 'form')) !!}
{!! Form::hidden('id', $job->id) !!}
@else
{!! Form::open(array('method' => 'post', 'route' => array('store.front.job'), 'class' => 'form')) !!}
@endif
<div class="row">  
  <div class="col-md-12">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'title') !!}"> {!! Form::text('title', null, array('class'=>'form-control', 'id'=>'title', 'placeholder'=>__('Job title'))) !!}
      {!! APFrmErrHelp::showErrors($errors, 'title') !!} </div>
  </div>
  <div class="col-md-12">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'description') !!}"> {!! Form::textarea('description', null, array('class'=>'form-control', 'id'=>'description', 'placeholder'=>__('Job description'))) !!}
      {!! APFrmErrHelp::showErrors($errors, 'description') !!} </div>
  </div>
  <div class="col-md-12">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'skills') !!}">
      <?php
        $skills = old('skills', $jobSkillIds);
		?>
      {!! Form::select('skills[]', $jobSkills, $skills, array('class'=>'form-control select2-multiple', 'id'=>'skills', 'multiple'=>'multiple')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'skills') !!} </div>
  </div>
  <div class="col-md-4">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'country_id') !!}" id="country_id_div"> {!! Form::select('country_id', ['' => __('Select Country')]+$countries, old('country_id', (isset($job))? $job->country_id:$siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'country_id') !!} </div>
  </div>
  <div class="col-md-4">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'state_id') !!}" id="state_id_div"> <span id="default_state_dd"> {!! Form::select('state_id', ['' => __('Select State')], null, array('class'=>'form-control', 'id'=>'state_id')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'state_id') !!} </div>
  </div>
  <div class="col-md-4">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'city_id') !!}" id="city_id_div"> <span id="default_city_dd"> {!! Form::select('city_id', ['' => __('Select City')], null, array('class'=>'form-control', 'id'=>'city_id')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'city_id') !!} </div>
  </div>
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'salary_from') !!}" id="salary_from_div"> {!! Form::number('salary_from', null, array('class'=>'form-control', 'id'=>'salary_from', 'placeholder'=>__('Salary from'))) !!}
      {!! APFrmErrHelp::showErrors($errors, 'salary_from') !!} </div>
  </div>
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'salary_to') !!}" id="salary_to_div">
      {!! Form::number('salary_to', null, array('class'=>'form-control', 'id'=>'salary_to', 'placeholder'=>__('Salary to'))) !!}
      {!! APFrmErrHelp::showErrors($errors, 'salary_to') !!} </div>
  </div>
  <div class="col-md-4">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'salary_currency') !!}" id="salary_currency_div">
    @php
    $salary_currency = Request::get('salary_currency', (isset($job))? $job->salary_currency:$siteSetting->default_currency_code);
    @endphp
    
    {!! Form::select('salary_currency', ['' => __('Select Salary Currency')]+$currencies, $salary_currency, array('class'=>'form-control', 'id'=>'salary_currency')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'salary_currency') !!} </div>
  </div>
  <div class="col-md-4">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'salary_period_id') !!}" id="salary_period_id_div"> {!! Form::select('salary_period_id', ['' => __('Select Salary Period')]+$salaryPeriods, null, array('class'=>'form-control', 'id'=>'salary_period_id')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'salary_period_id') !!} </div>
  </div>
  <div class="col-md-4">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'hide_salary') !!}"> {!! Form::label('hide_salary', __('Hide Salary?'), ['class' => 'bold']) !!}
      <div class="radio-list">
        <?php
            $hide_salary_1 = '';
            $hide_salary_2 = 'checked="checked"';
            if (old('hide_salary', ((isset($job)) ? $job->hide_salary : 0)) == 1) {
                $hide_salary_1 = 'checked="checked"';
                $hide_salary_2 = '';
            }
            ?>
        <label class="radio-inline">
          <input id="hide_salary_yes" name="hide_salary" type="radio" value="1" {{$hide_salary_1}}>
          {{__('Yes')}} </label>
        <label class="radio-inline">
          <input id="hide_salary_no" name="hide_salary" type="radio" value="0" {{$hide_salary_2}}>
          {{__('No')}} </label>
      </div>
      {!! APFrmErrHelp::showErrors($errors, 'hide_salary') !!} </div>
  </div>
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'career_level_id') !!}" id="career_level_id_div"> {!! Form::select('career_level_id', ['' => __('Select Career level')]+$careerLevels, null, array('class'=>'form-control', 'id'=>'career_level_id')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'career_level_id') !!} </div>
  </div>
  
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'functional_area_id') !!}" id="functional_area_id_div"> {!! Form::select('functional_area_id', ['' => __('Select Functional Area')]+$functionalAreas, null, array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!} </div>
  </div>
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'job_type_id') !!}" id="job_type_id_div"> {!! Form::select('job_type_id', ['' => __('Select Job Type')]+$jobTypes, null, array('class'=>'form-control', 'id'=>'job_type_id')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'job_type_id') !!} </div>
  </div>
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'job_shift_id') !!}" id="job_shift_id_div"> {!! Form::select('job_shift_id', ['' => __('Select Job Shift')]+$jobShifts, null, array('class'=>'form-control', 'id'=>'job_shift_id')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'job_shift_id') !!} </div>
  </div>
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'num_of_positions') !!}" id="num_of_positions_div"> {!! Form::select('num_of_positions', ['' => __('Select number of Positions')]+MiscHelper::getNumPositions(), null, array('class'=>'form-control', 'id'=>'num_of_positions')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'num_of_positions') !!} </div>
  </div>
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'gender_id') !!}" id="gender_id_div"> {!! Form::select('gender_id', ['' => __('No preference')]+$genders, null, array('class'=>'form-control', 'id'=>'gender_id')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'gender_id') !!} </div>
  </div>
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'expiry_date') !!}"> {!! Form::text('expiry_date', null, array('class'=>'form-control datepicker', 'id'=>'expiry_date', 'placeholder'=>__('Job expiry date'), 'autocomplete'=>'off')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'expiry_date') !!} </div>
  </div>
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'degree_level_id') !!}" id="degree_level_id_div"> {!! Form::select('degree_level_id', ['' =>__('Select Required Degree Level')]+$degreeLevels, null, array('class'=>'form-control', 'id'=>'degree_level_id')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'degree_level_id') !!} </div>
  </div>
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'job_experience_id') !!}" id="job_experience_id_div"> {!! Form::select('job_experience_id', ['' => __('Select Required job experience')]+$jobExperiences, null, array('class'=>'form-control', 'id'=>'job_experience_id')) !!}
      {!! APFrmErrHelp::showErrors($errors, 'job_experience_id') !!} </div>
  </div>
  <div class="col-md-6">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'is_freelance') !!}"> {!! Form::label('is_freelance', __('Is Freelance?'), ['class' => 'bold']) !!}
      <div class="radio-list">
        <?php
            $is_freelance_1 = '';
            $is_freelance_2 = 'checked="checked"';
            if (old('is_freelance', ((isset($job)) ? $job->is_freelance : 0)) == 1) {
                $is_freelance_1 = 'checked="checked"';
                $is_freelance_2 = '';
            }
            ?>
        <label class="radio-inline">
          <input id="is_freelance_yes" name="is_freelance" type="radio" value="1" {{$is_freelance_1}}>
          {{__('Yes')}} </label>
        <label class="radio-inline">
          <input id="is_freelance_no" name="is_freelance" type="radio" value="0" {{$is_freelance_2}}>
          {{__('No')}} </label>
      </div>
      {!! APFrmErrHelp::showErrors($errors, 'is_freelance') !!} </div>
  </div>
  <div class="col-md-12">
    <div class="formrow">
      <button type="submit" class="btn">{{__('Update Job')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
    </div>
  </div>
</div>
{!! Form::close() !!}
<hr>
@push('styles')
<style type="text/css">
.datepicker>div {
    display: block;
}
</style>
@endpush
@push('scripts')
@include('admin.shared.tinyMCEFront')
<script type="text/javascript">
$(document).ready(function() {
    $('.select2-multiple').select2({
    	placeholder: "{{__('Select Required Skills')}}",
    	allowClear: true
	});
	$(".datepicker").datepicker({
		autoclose: true,
		format:'yyyy-m-d'	
	});
    $('#country_id').on('change', function (e) {
    e.preventDefault();
    filterLangStates(0);
    });
    $(document).on('change', '#state_id', function (e) {
    e.preventDefault();
    filterLangCities(0);
    });
    filterLangStates(<?php echo old('state_id', (isset($job))? $job->state_id:0); ?>);
    });
    function filterLangStates(state_id)
    {
    var country_id = $('#country_id').val();
    if (country_id != ''){
    $.post("{{ route('filter.lang.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#default_state_dd').html(response);
            filterLangCities(<?php echo old('city_id', (isset($job))? $job->city_id:0); ?>);
            });
    }
    }

    function filterLangCities(city_id)
    {
    var state_id = $('#state_id').val();
    if (state_id != ''){
    $.post("{{ route('filter.lang.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#default_city_dd').html(response);
            });
    }
    }
</script> 
@endpush