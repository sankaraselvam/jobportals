@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 


<!--=================================  inner banner -->
<div class="header-inner bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="jobber-user-info">
                        <div class="profile-avatar-info ms-4">
                            <h3>{{$company->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================================= inner banner -->



    <!--================================= Account Details -->
    <section>
        <div class="container mb-4 mt-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-dashboard-info-box">
                    <div class="saveAccountDetails"></div>
                        <div class="section-title-02 mb-4">
                            <h4>Account Details <span><a  data-bs-toggle="collapse" href="#account_details" role="button" aria-expanded="false" aria-controls="dateposted" class="font-sm ms-2 text-info"> Edit</a></span></h4>
                        </div>
                        <div class="offset-md-2 col-md-10">
                            <table class="table table-borderless table-responsive" style="color: #969696;">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="20%">Username</td>
                                        <td>:</td>
                                        <td>{{$company->email}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">User Communication Mail</td>
                                        <td>:</td>
                                        <td>{{$company->email}}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Role</td>
                                        <td>:</td>
                                        <td>{{$company->employer_role}}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Mobile Number</td>
                                        <td>:</td>
                                        <td>{{$company->phone}}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="collapse" id="account_details">
                            {!! Form::model($company, array('method' => 'put', 'route' => array('update.company.profile'), 'class' => 'form', 'id'=>'saveAccountDetailsForm')) !!}
                            <input type="hidden" name="saveAccountDetails" value="1">
                                <div class="row"> 
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="email" placeholder="Enter your mail id" value="{{$company->email}}" disabled>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">User Communication Mail</label>
                                        <input type="email" class="form-control" name="communication_email" value="{{$company->email}}" placeholder="Communication Mail" disabled>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Role</label>
                                        <input type="text" class="form-control" name="employer_role" placeholder="Role" value="{{$company->employer_role}}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$company->phone}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn  btn-primary" id="saveAccountDetails">Save Settings</button>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================================= Account Details -->
    <!--================================= Company Details -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-dashboard-info-box">
                        <div class="section-title-02 mb-4">
                        <div class="saveKYCDetails"></div>
                            <h4>Company Details <span><a  data-bs-toggle="collapse" href="#company_details" role="button" aria-expanded="false" aria-controls="dateposted"  class="font-sm ms-2 text-info"> Edit</a></span></h4>
                        </div>
                        <div class="offset-md-2 col-md-10">
                            <table class="table table-borderless table-responsive" style="color: #969696;">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="25%">Industry Type</td>
                                        <td>:</td>
                                        <td>{{$company->getIndustry('industry')}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Contact Person</td>
                                        <td>:</td>
                                        <td>{{$company->location}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Contact Person's Designation</td>
                                        <td>:</td>
                                        <td>{{$company->ceo}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Website URL</td>
                                        <td>:</td>
                                        <td>{{$company->website}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Established In</td>
                                        <td>:</td>
                                        <td>{{$company->established_in}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Company details</td>
                                        <td>:</td>
                                        <td>{{$company->description}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="collapse" id="company_details">
                            {!! Form::model($company, array('method' => 'put', 'route' => array('update.company.profile'), 'class' => 'form', 'id'=>'saveCompanyDetailsForm')) !!}
                                <input type="hidden" name="saveCompanyDetails" value="1">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3 select-border">
                                        <label class="form-label">Industry Type</label>
                                        {!! Form::select('industry_id', ['' => __('Select Industry')]+$industries, $company->industry_id, array('class'=>'form-control basic-select', 'id'=>'industry_id')) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Contact Person name</label>
                                        {!! Form::text('location', $company->location, array('class'=>'form-control', 'id'=>'location', 'placeholder'=>__('Contact Person Name'))) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Contact Person's Designation</label>
                                        {!! Form::text('ceo', $company->ceo, array('class'=>'form-control', 'id'=>'ceo', 'placeholder'=>__('Contact Person Designation'))) !!}
                                    </div>

                                    <div class="form-group col-md-6 mb-3 mb-md-0">
                                        <label class="form-label">Website</label>
                                        {!! Form::text('website', $company->website, array('class'=>'form-control', 'id'=>'website', 'placeholder'=>__('Website'))) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-3 select-border">
                                        <label class="form-label">Established In</label>
                                        {!! Form::select('established_in', ['' => __('Select Established In')]+MiscHelper::getEstablishedIn(), $company->established_in, array('class'=>'form-control basic-select', 'id'=>'established_in')) !!}
                                    </div>
                                    <div class="form-group col-md-12 mb-0">
                                        <label class="form-label">Company details</label>
                                        {!! Form::textarea('description', $company->description, array('class'=>'form-control', 'id'=>'description1', 'rows'=>'4', 'placeholder'=>__('Company details'))) !!}
                                    </div>
                                    <!-- <div class="form-group col-md-12 mb-0">
                                        <label class="form-label">Profile for Hot Vacancies</label>
                                        <textarea class="form-control" rows="4" placeholder=" Operation & Maintenance, Environment Management and Facility Management"></textarea>
                                    </div> -->
                                </div>
                                <button type="submit" class="btn  btn-primary" id="saveCompanyDetails">Save Settings</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--================================= Company Details -->
    <!--================================= KYC Compliance Details -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-dashboard-info-box">
                        <div class="section-title-02 mb-4">
                            <h4>Complete your KYC <span><a  data-bs-toggle="collapse" href="#kyc_details" role="button" aria-expanded="false" aria-controls="dateposted"  class="font-sm ms-2 text-info"> Edit</a></span></h4>
                            <p>Your company details are required to meet KYC compliance</p>
                        </div>
                        <div class="offset-md-2 col-md-10">
                            <table class="table table-borderless table-responsive" style="color: #969696;">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="25%">KYC Status</td>
                                        <td>:</td>
                                        <td>{{ ($company->kyc_status==0)?'PENDING':'APPROVED' }}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">PAN Number</td>
                                        <td>:</td>
                                        <td>{{ $company->pan_number }}</td>
                                    </tr>
                                    <tr>

                                        <td width="25%">Name on PAN Card</td>
                                        <td>:</td>
                                        <td>{{ $company->pan_card_name }}</td>
                                    </tr>
                                    <tr>

                                        <td width="25%">Date on PAN Card</td>
                                        <td>:</td>
                                        <td>{{ date("d-m-Y", strtotime($company->pan_card_date))}}</td>
                                    </tr>
                                    <tr>

                                        <td width="25%">Street Address</td>
                                        <td>:</td>
                                        <td>{{ $company->address }}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Country</td>
                                        <td>:</td>
                                        <td>{{$company->getCountry('country')}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">State</td>
                                        <td>:</td>
                                        <td>{{$company->getState('state')}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">City</td>
                                        <td>:</td>
                                        <td>{{$company->getCity('city')}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">Pincode</td>
                                        <td>:</td>
                                        <td>{{ $company->pincode }}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">GSTIN</td>
                                        <td>:</td>
                                        <td>{{ $company->gstin_number }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="collapse" id="kyc_details">
                            {!! Form::model($company, array('method' => 'put', 'route' => array('update.company.profile'), 'class' => 'form', 'id'=>'saveKYCDetailsForm', 'files'=>true)) !!}
                            <input type="hidden" name="saveKYCDetails" value="1">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" rows="2" id="address" name="address" placeholder=" Enter your address">{{$company->address}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Select Country</label>
                                        {!! Form::select('country_id', ['' => __('Select Country')]+$countries, old('country_id', (isset($company))? $company->country_id:$siteSetting->default_country_id), array('class'=>'form-control basic-select', 'id'=>'country_id')) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Select State</label>
                                        <span id="default_state_dd"> {!! Form::select('state_id', ['' => __('Select State')], $company->state_id, array('class'=>'form-control basic-select', 'id'=>'state_id')) !!} </span>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Select City</label>
                                        <span id="default_city_dd"> {!! Form::select('city_id', ['' => __('Select City')], $company->city_id, array('class'=>'form-control basic-select', 'id'=>'city_id')) !!} </span>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Address Proof</label>
                                        <select class="form-control basic-select" id="address_proof" name="address_proof">
                                            <option value="gst_certificate" selected="selected">GST Certificate</option>                                      
                                            <option value="certificate_of_incorporation">Certificate of Incorporation</option>                                      
                                            <option value="bank_account_statement">Bank Account Statement</option>                                      
                                            <option value="credit_card_statement">Credit Card statement</option>                                      
                                            <option value="govt_egistration_ertificate">Govt. Registration Certificate</option>                                      
                                            <option value="lease_proof">Lease Proof</option>                                      
                                            <option value="service_tax">Service Tax / Sales Tax/ TAN</option>                                      
                                            <option value="shop_and_establishment_certificate">Shop and Establishment certificate</option>                                      
                                            <option value="telephone_bill">Telephone Bill</option>                                      
                                            <option value="electricity_bill">Electricity Bill</option>                                      
                                            <option value="water_bill">Water Bill</option>                                      
                                            <option value="udhyog_aadhar">Udhyog Aadhar</option>     
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Upload address proof</label><br>
                                        <small>Only documents in pdf, jpeg, png, doc or docx format with maximum 3MB can be uploaded.</small>
                                        <div class="upload-file">
                                            <label for="formFile" class="form-label">Choose File</label>
                                            <input class="form-control" type="file" id="address_proof_image" name="address_proof_image">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">PAN</label>
                                        <input type="text" class="form-control" id="pan_number" name="pan_number" value="{{$company->pan_number}}" placeholder="Enter PAN card Number">
                                    </div>
                                    <div class="form-group col-md-6 mb-3 select-border">
                                        <label class="form-label">Name on PAN card</label>
                                        <input type="text" class="form-control" id="pan_card_name" name="pan_card_name" value="{{$company->pan_card_name}}" placeholder="Enter the name of PAN card">
                                    </div>
                                    <div class="form-group col-md-6 mb-3 datetimepickers">
                                        <label class="form-label">Date of birth on PAN card</label>
                                        <div class="input-group date" id="datetimepicker-01" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="pan_card_date" value="{{$company->pan_card_date}}" data-target="#datetimepicker-01">
                                            <div class="input-group-append d-flex" data-target="#datetimepicker-01" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Upload PAN card copy</label><br>
                                        <small>Only documents in pdf, jpeg, png, doc or docx format with maximum 3MB can be uploaded.</small>
                                        <div class="upload-file">
                                            <label for="formFile" class="form-label">Choose File</label>
                                            <input class="form-control" type="file" id="pancard_image" name="pancard_image">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3 select-border">
                                        <label class="form-label">Pincode</label>
                                        <input type="text" class="form-control" value="{{$company->pincode}}" id="pincode" name="pincode" placeholder="Enter the pincode">
                                    </div>
                                    <div class="form-group col-md-6 mb-3 select-border">
                                        <label class="form-label">GSTIN</label>
                                        <input type="text" class="form-control" value="{{$company->gstin_number}}" id="gstin_number" name="gstin_number" placeholder="Enter GSTIN Number">
                                    </div>
                                </div>
                                <button type="submit" class="btn  btn-primary" id="saveKYCDetails">Save Settings</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= KYC Compliance Details -->

   


<div class="listpgWraper">
  <div class="container">
    <div class="row">     
      
      <div class="col-md-9 col-sm-8"> 
        <div class="row">
      <div class="col-md-12">
        <div class="userccount">
          <div class="formpanel"> @include('flash::message') 
            <!-- Personal Information -->
            <!-- @include('company.inc.profile') -->
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
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>

<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.16/themes/cupertino/jquery-ui.css">
<script type="text/javascript">
$(document).ready(function() {
    $('#address_proof').val("{{isset($company->address_proof)?$company->address_proof:'' }}");
    $('#address_proof').select2().trigger('change');
    $('#country_id').on('change', function (e) {
        e.preventDefault();
        filterLangStates(0);
    });
    $(document).on('change', '#state_id', function (e) {
        e.preventDefault();
        filterLangCities(0);
    });
    filterLangStates(<?php echo old('state_id', (isset($company))? $company->state_id:0); ?>);

    $("#saveAccountDetails").on('click', function (e) {
        e.preventDefault;
        $("#saveAccountDetailsForm").validate({
            rules: { 
                email: 'required',
                communication_email: 'required',
                employer_role: 'required',
                phone: 'required',
            },
            messages: {
                email: "Please enter username",
                communication_email: "Please enter communication email",
                employer_role: "Please enter role",
                phone: "Please enter phone number",
            },
            submitHandler: function() {
                submitAccountDetailsForm();
            }
        });        
    });

    $("#saveCompanyDetails").on('click', function (e) {
        e.preventDefault;
        $("#saveCompanyDetailsForm").validate({
            rules: { 
                industry_id: 'required',
                location: 'required',
                ceo: 'required',
                website: 'required',
                established_in: 'required',
                description: 'required',
            },
            messages: {
                industry_id: "Please select industry type",
                location: "Please enter contact person name",
                ceo: "Please enter contact person designation",
                website: "Please enter website",
                established_in: "Please select established in",
                description: "Please enter company detail",
            },
            submitHandler: function() {
                submitCompanyDetailsForm();
            }
        });        
    });

    $.validator.addMethod('ValidPAN', function (value, element, param) {
        var regex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/; 
        return regex.test(value); 
    }, 'Invalid PAN number');

    $.validator.addMethod('ValidGST', function (value, element, param) {
        let regTest = /\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/.test(value)
     if(regTest){
        let a=65,b=55,c=36;
        return Array['from'](value).reduce((i,j,k,value)=>{ 
           p=(p=(j.charCodeAt(0)<a?parseInt(j):j.charCodeAt(0)-b)*(k%2+1))>c?1+(p-c):p;
           return k<14?i+p:j==((c=(c-(i%c)))<10?c:String.fromCharCode(c+b));
        },0); 
    }
        return regTest
    }, 'Invalid GST number');
    
    var validator = $("#saveKYCDetails").on('click', function (e) {
        e.preventDefault;
        $("#saveKYCDetailsForm").validate({
            rules: { 
                address: 'required',
                pan_number: {
                    required:true,
                    ValidPAN:true
                },
                gstin_number: {
                    required:true,
                    ValidGST:true
                },
                pincode: 'required',
                // website: 'required',
                // established_in: 'required',
                // description: 'required',
            },
            messages: {
                address: "Please enter address",
                pan_number: {
                    required: jQuery.validator.format("Please enter PAN number")
                },
                gstin_number: {
                    required: jQuery.validator.format("Please enter GST number")
                },
                ceo: "Please enter pincode",
                // website: "Please enter website",
                // established_in: "Please select established in",
                // description: "Please enter company detail",
            },
            submitHandler: function() {
                submitKYCDetailsForm();
            }
        });        
    });
});

function submitAccountDetailsForm(){    
    var form = $('#saveAccountDetailsForm');
    $.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : form.serialize(),
        dataType: 'json',
		success : function (json){
            console.log(json)
            if(json.status==200){
                $(".saveAccountDetails").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $(".saveAccountDetails").html("");
                    location.replace("{{ route('company.profile') }}");
                }, 2500)
            }
		},
		error: function(json){
			console.log(4444444);
		}
	}); 
}

function submitCompanyDetailsForm(){    
    var form = $('#saveCompanyDetailsForm');
    $.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : form.serialize(),
        dataType: 'json',
		success : function (json){
            console.log(json)
            if(json.status==200){
                $(".saveCompanyDetails").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $(".saveCompanyDetails").html("");
                    location.replace("{{ route('company.profile') }}");
                }, 2500)
            }
		},
		error: function(json){
			console.log(4444444);
		}
	}); 
}
function submitKYCDetailsForm(){    
    var form = $('#saveKYCDetailsForm');
    var formData = new FormData(document.getElementById("saveKYCDetailsForm"));
    if(document.getElementById("address_proof_image").value != "") {
            formData.append("address_proof_image", $('#address_proof_image')[0].files[0]);
    }
    if(document.getElementById("pancard_image").value != "") {
            formData.append("pancard_image", $('#pancard_image')[0].files[0]);
    }
    $.ajax({
		url     : form.attr('action'),
		type    : form.attr('method'),
		data    : formData,
        dataType: 'json',
        contentType: false,
        processData: false,
		success : function (json){
            console.log(json)
            if(json.status==200){
                $(".saveKYCDetails").html('<div class="alert alert-success">'+json.message+'</div>');
                setTimeout(function () {
                    $(".saveKYCDetails").html("");
                    location.replace("{{ route('company.profile') }}");
                }, 2500)
            }
		},
		error: function(json){
			console.log(4444444);
		}
	}); 
}

function filterLangStates(state_id){
    var country_id = $('#country_id').val();
    if (country_id != ''){
    $.post("{{ route('filter.lang.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
                $('#default_state_dd').html(response);
                filterLangCities(<?php echo old('city_id', (isset($company))? $company->city_id:0); ?>);
                $('#state_id').select2().trigger('change');
            });
    }
}

function filterLangCities(city_id){
    var state_id = $('#state_id').val();
    if (state_id != ''){
    $.post("{{ route('filter.lang.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
                $('#default_city_dd').html(response);
                $('#city_id').select2().trigger('change');
            });
    }
}
</script>
@endpush