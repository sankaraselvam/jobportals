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

                {!! Form::open(array('method' => 'post', 'route' => array('store.front.job'), 'class' => 'row')) !!}
                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Job Title / Designation <span style="color: red;"> *</span> </label>
                            <input type="text" class="form-control" name="title" value="" placeholder="Mention the designation or role">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Employment Type re<span style="color: d;"> *</span></label>
                            
                            {!! Form::select('job_type_id', ['' => __('Select Job Type')]+$jobTypes, null, array('class'=>'form-control basic-select', 'id'=>'job_type_id')) !!}
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="mb-2"> Job Description <span style="color: d;"> *</span></label>
                            <textarea class="form-control" name="description" id="job" rows="4" placeholder="Outline the activities a person in this role will perform on a regular basis"></textarea>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="mb-2"> Candidate profile <span style="color: d;"> *</span></label>
                            <textarea class="form-control" name="candidate_profile" rows="4" placeholder="Specify required technical expertise, previous job experience or certification"></textarea>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="mb-2">Key Skills <span style="color:red;">*</span> </label><br>
                            <small>Specify key skills required for this job role</small>
                            @php 
                            $skills = old('skills', $jobSkillIds);
                            @endphp
                            {!! Form::select('skills[]', $jobSkills, $skills, array('class'=>'js-example-basic-multiple', 'id'=>'skills', 'multiple'=>'multiple')) !!}
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label class="mb-2">Country <span style="color:red;">*</span> </label><br>
                            {!! Form::select('country_id', ['' => __('Select Country')]+$countries, old('country_id', (isset($job))? $job->country_id:$siteSetting->default_country_id), array('class'=>'form-control basic-select', 'id'=>'country_id')) !!}
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label class="mb-2">State <span style="color:red;">*</span> </label><br>
                            <span id="default_state_dd">{!! Form::select('state_id', ['' => __('Select State')], null, array('class'=>'form-control basic-select', 'id'=>'state_id')) !!}</span> 
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label class="mb-2">City <span style="color:red;">*</span> </label><br>
                            <span id="default_city_dd">{!! Form::select('city_id', ['' => __('Select City')], null, array('class'=>'form-control basic-select', 'id'=>'city_id')) !!}</span>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="mb-2">Work Experience (Years) <span style="color: red;"> *</span> </label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group mb-2">
                                {!! Form::select('job_experience_id_from', ['' => __('Min')]+$jobExperiences, null, array('class'=>'form-control basic-select', 'id'=>'min-experience')) !!}
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group mb-2">
                            {!! Form::select('job_experience_id_to', ['' => __('Max')]+$jobExperiences, null, array('class'=>'form-control basic-select', 'id'=>'max-experience')) !!}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="mb-2">Annual Salary Range <span style="color: red;"> *</span> </label>
                        </div>
                      
                        <div class="col-md-6 mb-3">
                            <div class="input-group mb-2">
                                <select class="form-control basic-select" name="salary_from" id="min-annual-salary">
                                    <option value="" selected="selected">Min Annual Salary</option>
                                    <option value="50000">50000</option>
                                    <option value="100000">100000</option>
                                    <option value="150000">150000</option>
                                    <option value="200000">200000</option>
                                    <option value="250000">250000</option>
                                    <option value="300000">300000</option>
                                    <option value="350000">350000</option>
                                    <option value="400000">400000</option>
                                    <option value="450000">450000</option>
                                    <option value="500000">500000</option>
                                  </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group mb-2">
                                <select class="form-control basic-select" name="salary_to" id="max-annual-salary">
                                    <option value="" selected="selected">Max Annual Salary</option>
                                    <option value="50000">50000</option>
                                    <option value="100000">100000</option>
                                    <option value="150000">150000</option>
                                    <option value="200000">200000</option>
                                    <option value="250000">250000</option>
                                    <option value="300000">300000</option>
                                    <option value="350000">350000</option>
                                    <option value="400000">400000</option>
                                    <option value="450000">450000</option>
                                    <option value="500000">500000</option>
                                  </select>
                            </div>
                        </div>
                        <!-- <div class="col-md-4 mb-3">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend d-flex">
                                    <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Max Annual Salary">
                            </div>
                        </div> -->
                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Industry <span style="color: red;">*</span> </label>
                            {!! Form::select('industry_id', ['' =>__('Select Industry')]+$industry, null, array('class'=>'form-control basic-select', 'id'=>'industry_id')) !!}
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Functional Area <span style="color: red;">*</span> </label>
                            {!! Form::select('functional_area_id', ['' => __('Select Functional Area')]+$functionalAreas, null, array('class'=>'form-control basic-select', 'id'=>'functional_area_id')) !!}         
                          </select>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Roles <span style="color: red;">*</span> </label>
                            <span id="default_role_dd">{!! Form::select('role_id', ['' => __('Select Role')], null, array('class'=>'form-control basic-select', 'id'=>'role_id')) !!}  </span>       
                          </select>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Career Level <span style="color: red;">*</span> </label>
                            {!! Form::select('career_level_id', ['' => __('Select Career level')]+$careerLevels, null, array('class'=>'form-control basic-select', 'id'=>'career_level_id')) !!}      
                          </select>
                        </div>
                        
                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Job Shift <span style="color: red;">*</span> </label>
                            {!! Form::select('job_shift_id', ['' => __('Select Job Shift')]+$jobShifts, null, array('class'=>'form-control basic-select', 'id'=>'job_shift_id')) !!}       
                          </select>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Number of Vacancies<span style="color: red;"> *</span> </label>
                            <input type="text" name="num_of_positions" class="form-control" placeholder="Enter number of vacancies">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Education <span style="color: red;"> *</span></label>
                            {!! Form::select('degree_level_id', ['' =>__('Select Required Degree Level')]+$degreeLevels, null, array('class'=>'form-control basic-select', 'id'=>'degree_level_id')) !!}
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="mb-2">Gender <span style="color: red;">*</span> </label>
                            {!! Form::select('gender_id', ['' => __('No preference')]+$genders, null, array('class'=>'form-control basic-select', 'id'=>'gender_id')) !!}      
                          </select>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="specialism1" class="form-check-input" id="specialism1">
                                <label class="form-check-label" for="specialism1">Include walk-in details</label>
                            </div>
                        </div>
                        
                        <div class="form-group mt-0 mb-3 col-md-4 datetimepickers specialism_hide_show">
                            <label class="form-label">Walk-in Start Date <span style="color:red;">*</span></label>
                            <div class="input-group date" id="datetimepicker-01" data-target-input="nearest">
                                <input type="text" name="start_date" class="form-control datetimepicker-input" placeholder="Date" data-target="#datetimepicker-01">
                                <div class="input-group-append d-flex" data-target="#datetimepicker-01" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-3 specialism_hide_show">
                            <label class="mb-2">Duration (Days) <span style="color:red;">*</span> </label><br>
                            <select class="form-control basic-select" name="duration">
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
                        <div class="form-group mt-0 mb-3 col-md-4 datetimepickers specialism_hide_show">
                            <label class="form-label">Walk-in timing <span style="color:red;">*</span></label>
                            
                            <div class="input-group time" id="timepicker-01" data-target-input="nearest">
                                <input type="text" value="10:00 - 06:30" name="timing" class="form-control timepicker-input" placeholder="Time" data-target="#datetimepicker-02">
                                <div class="input-group-append d-flex" data-target="#datetimepicker-02" data-toggle="timepicker">
                               
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3 specialism_hide_show">
                            <label class="mb-2">Contact Person <span style="color:red;">*</span> </label><br>
                            <input type="text" name="contact_person" class="form-control" value="" placeholder="Recruiter Name">
                        </div>

                        <div class="form-group col-md-6 mb-3 specialism_hide_show">
                            <label class="mb-2">Contact Number <span style="color:red;">*</span> </label><br>
                            <input type="text" name="contact_number" class="form-control" value="" placeholder="Add Mobile Number">
                        </div>

                        <div class="form-group col-md-12 text-center">
                            <button type="submit" class="btn btn-lg btn-primary">{{__('Post Job')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                        </div>
                    {!! Form::close() !!}
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
                            @if(isset($postJobs) && count($postJobs))
                            @foreach($postJobs as $jobs)                      
                            <div class="col-12">
                                <div class="job-list mt-1">                        
                                    <div class="job-list-details">
                                        <div class="job-list-info">
                                        <div class="job-list-title">
                                            <h5 class="mb-0"><a href="job-detail.html">{{$jobs->title}}</a></h5>
                                        </div>
                                        <div class="job-list-option">
                                            <ul class="list-unstyled">                                            
                                                <li><i class="fas fa-briefcase pe-2 mb-1"></i></i> 1 - {{isset($jobs->jobExperience->job_experience)?$jobs->jobExperience->job_experience:2 .'Years'}}</li>
                                                <li><i class="fas fa-map-marker-alt pe-3 mb-1"></i>{{$jobs->cities->city}}</li>
                                                <li><i class="fas fa-address-card"></i><span class="ps-2"> ₹ {{$jobs->salary_from}} - {{$jobs->salary_to}} P.A</span></li>
                                            </ul>
                                            <ul class="ps-3 pe-2 mb-0 list-style-2">
                                            @foreach($jobs->jobSkills as $skills) 
                                            <li>{{$skills->jobSkill->job_skill}}</li>
                                            @endforeach
                                            </ul>         
                                        </div>
                                    </div>
                                </div>                          
                            </div>
                            @endforeach
                            @endif 
                            <p class="mt-1">Posted on 12 May by hrddispl@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@push('scripts')
@include('admin.shared.tinyMCEFront')
<script type="text/javascript">
$(document).ready(function() {    

    $('.js-example-basic-multiple').select2({
    	placeholder: "{{__('Select Required Skills')}}",
    	allowClear: true
	});
	// $(".datepicker").datepicker({
	// 	autoclose: true,
	// 	format:'yyyy-m-d'	
	// });


    // $('#country_id').on('change', function (e) {
    //     // e.preventDefault();
    //     filterLangStates(0);
    //     console.log('sdfsdfsdfsdfd');
    // });

    // $(document).on('change', '#state_id', function (e) {
    // e.preventDefault();
    // filterLangCities(0);
    // });
    // filterLangStates(<?php echo old('state_id', (isset($job))? $job->state_id:0); ?>);

   
});
$(document).ready(function($) {
    $('#min-experience').select2();
    $('#max-experience').select2();
    $('#min-annual-salary').select2();
    $('#max-annual-salary').select2();
    $('#country_id').select2();
    $('#state_id').select2();
    $('#functional_area_id').select2();
    $("#max-experience").prop("disabled", true);
    $("#max-annual-salary").prop("disabled", true);

    $('#min-experience').on("change", function(e) {
        console.log($('#min-experience').val())
        //$('#max-experience').prop('disabled', true);
        $('#max-experience').val($('#min-experience').val());
        $('#max-experience').select2().trigger('change');
        // console.log("MAX VAL",$('#max-experience').val())
        $("#max-experience").prop("disabled", false);
    });

    $('#max-experience').on("change", function(e) {
        if($('#max-experience').val() < $('#min-experience').val()){
            $('#max-experience').val($('#min-experience').val());
        }
    });

    $('#min-annual-salary').on("change", function(e) {
        $('#max-annual-salary').val($('#min-annual-salary').val());
        $('#max-annual-salary').select2().trigger('change');
        $("#max-annual-salary").prop("disabled", false);

    });

    $('#max-annual-salary').on("change", function(e) {
        if($('#max-annual-salary').val() < $('#min-annual-salary').val()){
            $('#max-annual-salary').val($('#min-annual-salary').val());
        }
    });

    $(".specialism_hide_show").hide();
    $('#specialism1').click(function() {       
        if(this.checked){
            $(".specialism_hide_show").show();
        }else{
            $(".specialism_hide_show").hide();
        }
    });
   
    filterLangStates($('#country_id').val());
    $('#country_id').on('change', function (e) {
        filterLangStates($(this).val());
    });
    $('#functional_area_id').on('change', function (e) {
        e.preventDefault();
        filterLangRoles($(this).val());
    });
    $(document).on('change', '#state_id',function (e) {
       
        e.preventDefault();
        filterLangCities($(this).val());
    });

});
    function filterLangStates(state_id)
    {
    var country_id = $('#country_id').val();
    if (country_id != ''){
    $.post("{{ route('filter.lang.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#default_state_dd').html(response);
            $('#state_id').select2();
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
            $('#city_id').select2();
            });
    }
    }

    function filterLangRoles(functional_area_id){
        var functional_area_id = $('#functional_area_id').val();
        var role_id = $('#role_id').val();
        if (functional_area_id != ''){
        $.post("{{ route('filter.lang.roles.dropdown') }}", {functional_area_id: functional_area_id, role_id: role_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    console.log('ROLWWEEEEEE');
                    $('#default_role_dd').html(response);
                    $('#role_id').select2();
               
                });
        }
    }
</script> 
@endpush