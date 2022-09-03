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
                        <div class="section-title-02 mb-4">
                            <h4>Account Details <span><a  data-bs-toggle="collapse" href="#account_details" role="button" aria-expanded="false" aria-controls="dateposted"  class="font-sm ms-2 text-info"> Edit</a></span></h4>
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
                                        <td>Recruiter</td>
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
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" placeholder="Enter your mail id" value="support@rimplasia.com">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Company name</label>
                                        <input type="email" class="form-control" value="Rainbow Integrated Multitech Private Limited" placeholder="Enter your company name">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Role</label>
                                        <input type="text" class="form-control" value="Recruiter">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" value="+91 12345 56789">
                                    </div>
                                </div>
                            </form>
                            <a class="btn btn-md btn-primary" href="#">Save Settings</a>
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
                                        <td>K N Kumar</td>
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

                                        <td width="25%">Profile for Classifieds</td>
                                        <td>:</td>
                                        <td>{{$company->description}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="collapse" id="company_details">
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3 select-border">
                                        <label class="form-label">Industry Type</label>
                                        <select class="form-control basic-select">
                                      <option value="1" selected="selected">Accessories/Apparel/Fashion Design</option>
                                      <option value="">Accounting/Consulting/Taxation</option>
                                      <option value="">Advertising/Event Management/PR</option>
                                      <option value="">Agriculture/Dairy Technology</option>
                                      <option value="">Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants</option>
                                      <option value="">Animation / Gaming</option>
                                      <option value="">Architectural Services/ Interior Designing</option>
                                      <option value="">Auto Ancillary/Automobiles/Components</option>
                                      <option value="">Banking/Financial Services/Stockbroking/Securities</option>
                                      <option value="">Banking/Financial Services/Broking</option>
                                      <option value="">Biotechnology/Pharmaceutical/Clinical Research</option>
                                      <option value="">Brewery/Distillery</option>
                                      <option value="">Cement/Construction/Engineering/Metals/Steel/Iron</option>
                                      <option value="">Ceramics/Sanitary ware</option>
                                      <option value="">Chemicals/Petro Chemicals/Plastics</option>
                                      <option value="">Computer Hardware/Networking</option>
                                      <option value="">Consumer FMCG/Foods/Beverages</option>
                                      <option value="">Consumer Goods - Durables</option>
                                      <option value="">Courier/Freight/Transportation/Warehousing</option>
                                      <option value="">CRM/ IT Enabled Services/BPO</option>
                                      <option value="">Education/Training/Teaching</option>
                                      <option value="">Electricals/Switchgears</option>
                                      <option value="">Employment Firms/Recruitment Services Firms </option>
                                      <option value="">Entertainment/Media/Publishing/Dotcom</option>
                                      <option value="">Export Houses/Textiles/Merchandise</option>
                                      <option value="">Fertilizers/Pesticides</option>
                                      <option value="">Food Processing</option>
                                      <option value="">Gems and Jewellery</option>
                                      <option value="">Glass</option>
                                      <option value="">Government/Defence</option>
                                      <option value="">Healthcare/Medicine</option>
                                      <option value="">Heat Ventilation/Air-conditioning</option>
                                      <option value="">Insurance</option>
                                      <option value="">Internet/Ecommerce</option>
                                      <option value="">KPO/Research/Analytics</option>
                                      <option value="">Law/Legal Firms</option>
                                      <option value="">Machinery/Equipment Manufacturing/Industrial Products</option>
                                      <option value="">Medical Devices/Equipments</option>
                                      <option value="">Mining</option>
                                      <option value="">NGO/Social Services</option>
                                      <option value="">Office Automation</option>
                                      <option value="">Others/Engg. Services/Service Providers</option>
                                      <option value="">Petroleum/Oil and Gas/Projects/Infrastructure/Power/Non-conventional Energy</option>
                                      <option value="">Power/Energy</option>
                                      <option value="">Printing/Packaging</option>
                                      <option value="">Publishing</option>
                                      <option value="">Real Estate</option>
                                      <option value="">Retailing</option>
                                      <option value="">Security/Law Enforcement</option>
                                      <option value="">Shipping/Marine</option>
                                      <option value="">Software Services</option>
                                      <option value="">Steel</option>
                                      <option value="">Strategy/Management Consulting Firms</option>
                                      <option value="">Telecom Equipment/Electronics/Electronic Devices/RF/Mobile Network/Semi-conductor</option>
                                      <option value="">Telecom/ISP</option>
                                      <option value="">Tyres</option>
                                      <option value="">Water Treatment/Waste Management</option>
                                      <option value="">Wellness/Fitness/Sports</option>     
                                    </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Contact Person name</label>
                                        <input type="text" class="form-control" placeholder="Enter your name" value="Selvam">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Contact Person's Designation</label>
                                        <input type="email" class="form-control" value="Accouts" placeholder="Enter your designation">
                                    </div>

                                    <div class="form-group col-md-6 mb-3 mb-md-0">
                                        <label class="form-label">Website</label>
                                        <input type="text" class="form-control" value="example.com">
                                    </div>
                                    <div class="form-group col-md-12 mb-0">
                                        <label class="form-label">Profile for Hot Vacancies</label>
                                        <textarea class="form-control" rows="4" placeholder=" Operation & Maintenance, Environment Management and Facility Management"></textarea>
                                    </div>
                                </div>
                            </form>
                            <a class="btn btn-md btn-primary mt-2" href="#">Save Settings</a>
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
                                        <td>APPROVED</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">PAN Number</td>
                                        <td>:</td>
                                        <td>AAHCR4468B</td>
                                    </tr>
                                    <tr>

                                        <td width="25%">Name on PAN Card</td>
                                        <td>:</td>
                                        <td>RAINBOW INTEGRATED MULTITECH PRIVATE LIMITED</td>
                                    </tr>
                                    <tr>

                                        <td width="25%">Date on PAN Card</td>
                                        <td>:</td>
                                        <td>09-09-2015</td>
                                    </tr>
                                    <tr>

                                        <td width="25%">Street Address</td>
                                        <td>:</td>
                                        <td>No.148,1st Floor,Inside VRB School,Valluvarkottam High Road,Nungambakkam</td>
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
                                        <td>600077</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">GSTIN</td>
                                        <td>:</td>
                                        <td>33AAHCR4468B2ZI</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="collapse" id="kyc_details">
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" rows="2" placeholder=" Enter your address"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Select Country</label>
                                        <select class="form-control basic-select">
                                            <option value="">Select Country</option>
                                            <option value="">Afghanistan</option>     
                                            <option value="">Alaska</option>     
                                            <option value="">Albania</option>     
                                            <option value="">Algeria</option>     
                                            <option value="">American Samoa</option>     
                                            <option value="">Andorra</option>     
                                            <option value="">Angola</option>     
                                            <option value="">Anguilla</option>     
                                            <option value="">Antigua</option>     
                                            <option value="">Argentina</option>     
                                            <option value="">Armenia</option>     
                                            <option value="">Aruba</option>     
                                            <option value="">Ascention Island</option>     
                                            <option value="">Australia</option>     
                                            <option value="">Austria</option>     
                                            <option value="">Azerbaijan</option>     
                                            <option value="">Azores</option>     
                                            <option value="">Bahamas</option>     
                                            <option value="">Bahrain</option>     
                                            <option value="">Bangladesh</option>     
                                            <option value="">Barbados</option>     
                                            <option value="">Belarus</option>     
                                            <option value="">Belgium</option>     
                                            <option value="">Belize</option>     
                                            <option value="">Benin</option>     
                                            <option value="">Bermuda</option>     
                                            <option value="">Bhutan</option>     
                                            <option value="">Bosnia and Herzegovina</option>     
                                            <option value="">Botswana</option>     
                                            <option value="">Brazil</option>     
                                            <option value="">Brunei Darussalam</option>     
                                            <option value="">Bulgaria</option>     
                                            <option value="">Burkina Faso</option>     
                                            <option value="">Burundi</option>     
                                            <option value="">Cameroon</option>     
                                            <option value="">Canada</option>     
                                            <option value="">Canary Island</option>     
                                            <option value="">Cape Verde</option>     
                                            <option value="">Cayman Islands</option>     
                                            <option value="">Central African Republic</option>     
                                            <option value="">Chad</option>     
                                            <option value="">Chile</option>     
                                            <option value="">China</option>     
                                            <option value="">Christmas Island</option>     
                                            <option value="">Ciskei</option>     
                                            <option value="">Colombia</option>     
                                            <option value="">Comoros</option>     
                                            <option value="">Congo</option>     
                                            <option value="">Costa Rica</option>     
                                            <option value="">Croatia (Hrvatska)</option>     
                                            <option value="">Cyprus</option>     
                                            <option value="">Czech Republic</option>     
                                            <option value="">Denmark</option>     
                                            <option value="">Diego Garcia</option>     
                                            <option value="">Djibouti</option>     
                                            <option value="">Dominican Republic</option>     
                                            <option value="">East Timor</option>     
                                            <option value="">Ecuador</option>     
                                            <option value="">Egypt</option>     
                                            <option value="">El Salvador</option>     
                                            <option value="">Equitorial Guinea</option>     
                                            <option value="">Eritrea</option>     
                                            <option value="">Estonia</option>     
                                            <option value="">Ethiopia</option>     
                                            <option value="">Falkland Island</option>     
                                            <option value="">Faroe Island</option>     
                                            <option value="">Fiji Islands</option>     
                                            <option value="">Finland</option>     
                                            <option value="">France</option>     
                                            <option value="">Gabon</option>     
                                            <option value="">Gambia</option>     
                                            <option value="">Georgia</option>     
                                            <option value="">Germany</option>     
                                            <option value="">Ghana</option>     
                                            <option value="">Gibraltar</option>     
                                            <option value="">Greece</option>     
                                            <option value="">Greenland</option>     
                                            <option value="">Guadelope</option>     
                                            <option value="">Guam</option>     
                                            <option value="">Guatemala</option>     
                                            <option value="">Guinea</option>     
                                            <option value="">Guinea Bissau</option>     
                                            <option value="">Guyana</option>     
                                            <option value="">Haiti</option>     
                                            <option value="">Honduras</option>     
                                            <option value="">Hong Kong</option>     
                                            <option value="">Hungary</option>     
                                            <option value="">Iceland</option>     
                                            <option value="">India</option>     
                                            <option value="">Indonesia</option>     
                                            <option value="">Iraq</option>     
                                            <option value="">Ireland</option>     
                                            <option value="">Israel</option>     
                                            <option value="">Italy</option>     
                                            <option value="">Ivory Coast</option>     
                                            <option value="">Jamaica</option>     
                                            <option value="">Japan</option>     
                                            <option value="">Jordan</option>     
                                            <option value="">Kampuchea</option>     
                                            <option value="">Kazakhstan</option>     
                                            <option value="">Kenya</option>     
                                            <option value="">Kiribati</option>     
                                            <option value="">Korea (South)</option>     
                                            <option value="">Kuwait</option>     
                                            <option value="">Kyrgyzstan</option>     
                                            <option value="">Laos</option>     
                                            <option value="">Latvia</option>     
                                            <option value="">Lebanon</option>     
                                            <option value="">Lesotho</option>     
                                            <option value="">Liberia</option>     
                                            <option value="">Libya</option>     
                                            <option value="">Lithuania</option>     
                                            <option value="">Luxembourg</option>     
                                            <option value="">Macau</option>     
                                            <option value="">Macedonia</option>     
                                            <option value="">Madagascar</option>     
                                            <option value="">Madeira Island </option>     
                                            <option value="">Malawi</option>     
                                            <option value="">Malaysia</option>     
                                            <option value="">Maldives</option>     
                                            <option value="">Mali</option>     
                                            <option value="">Malta</option>     
                                            <option value="">Marshall Island</option>     
                                            <option value="">Mauritania</option>     
                                            <option value="">Mauritius</option>     
                                            <option value="">Mexico</option>     
                                            <option value="">Monaco</option>     
                                            <option value="">Mongolia</option>     
                                            <option value="">Morocco</option>     
                                            <option value="">Mozambique </option>     
                                            <option value="">Myanmar</option>     
                                            <option value="">Namibia</option>     
                                            <option value="">Nauru</option>     
                                            <option value="">Nepal</option>     
                                            <option value="">Netherlands</option>     
                                            <option value="">Netherlands Antilles</option>     
                                            <option value="">New Zealand</option>     
                                            <option value="">Nicaragua</option>     
                                            <option value="">Niger</option>     
                                            <option value="">Nigeria</option>     
                                            <option value="">Norfolk Island</option>     
                                            <option value="">Norway</option>     
                                            <option value="">Oman</option>     
                                            <option value="">Pakistan</option>     
                                            <option value="">Palau</option>     
                                            <option value="">Palestine</option>     
                                            <option value="">Panama</option>     
                                            <option value="">Papua New Guinea</option>     
                                            <option value="">Paraguay</option>     
                                            <option value="">Peru</option>     
                                            <option value="">Philippines</option>     
                                            <option value="">Poland</option>     
                                            <option value="">Portugal</option>     
                                            <option value="">Puerto Rico</option>     
                                            <option value="">Qatar</option>     
                                            <option value="">Romania</option>     
                                            <option value="">Russia</option>     
                                            <option value="">Rwanda</option>     
                                            <option value="">Samoa</option>     
                                            <option value="">San Marino</option>     
                                            <option value="">Sao Tome</option>     
                                            <option value="">Saudi Arabia</option>     
                                            <option value="">Senegal</option>     
                                            <option value="">Serbia &amp; Montenegro</option>     
                                            <option value="">Seychelles</option>     
                                            <option value="">Sierra Leone</option>     
                                            <option value="">Singapore</option>     
                                            <option value="">Slovak Republic</option>     
                                            <option value="">Slovakia</option>     
                                            <option value="">Slovenia</option>     
                                            <option value="">Solomon Islands</option>     
                                            <option value="">Somalia</option>     
                                            <option value="">South Africa</option>     
                                            <option value="">Spain</option>     
                                            <option value="">Sri Lanka</option>     
                                            <option value="">St. Kitts &amp; Navis</option>     
                                            <option value="">St. Vincent &amp; Grenadian</option>     
                                            <option value="">Suriname</option>     
                                            <option value="">Swaziland</option>     
                                            <option value="">Sweden</option>     
                                            <option value="">Switzerland</option>     
                                            <option value="">Taiwan</option>     
                                            <option value="">Tajikistan</option>     
                                            <option value="">Tanzania</option>     
                                            <option value="">Thailand</option>     
                                            <option value="">Togo</option>     
                                            <option value="">Tonga</option>     
                                            <option value="">Trinidad and Tobago</option>     
                                            <option value="">Tunisia</option>     
                                            <option value="">Turkey</option>     
                                            <option value="">Turkmenistan</option>     
                                            <option value="">Tuvalu</option>     
                                            <option value="">Uganda</option>     
                                            <option value="">United Arab Emirates</option>     
                                            <option value="">United Kingdom (UK)</option>     
                                            <option value="">Uruguay</option>     
                                            <option value="">USA</option>     
                                            <option value="">Uzbekistan</option>     
                                            <option value="">Vanatu</option>     
                                            <option value="">Vatican City State (Holy See)</option>     
                                            <option value="">Venezuela</option>     
                                            <option value="">Vietnam</option>     
                                            <option value="">Virgin Island</option>     
                                            <option value="">Western Sahara</option>     
                                            <option value="">Yemen</option>     
                                            <option value="">Yugoslavia</option>     
                                            <option value="">Zaire</option>     
                                            <option value="">Zambia</option>     
                                            <option value="">Zimbabwe</option>  
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Select state</label>
                                        <select class="form-control basic-select">
                                            <option value="">Select State</option>                                      
                                            <option value="">Andaman &amp; Nicobar</option>                                      
                                            <option value="">Andhra Pradesh</option>                                      
                                            <option value="">Arunachal Pradesh</option>                                      
                                            <option value="">Assam</option>                                      
                                            <option value="">Bihar</option>                                      
                                            <option value="">Chandigarh</option>                                      
                                            <option value="">Charttisgarh</option>                                      
                                            <option value="">Daman &amp; Diu</option>                                      
                                            <option value="">Delhi</option>                                      
                                            <option value="">Goa</option>                                      
                                            <option value="">Gujarat</option>                                      
                                            <option value="">Haryana</option>                                      
                                            <option value="">Himachal Pradesh</option>                                      
                                            <option value="">Jammu &amp; Kashmir</option>                                      
                                            <option value="">Jharkand</option>                                      
                                            <option value="">Karnataka</option>                                      
                                            <option value="">Kerala</option>                                      
                                            <option value="">MadhyaPradesh</option>                                      
                                            <option value="">Maharashtra</option>                                      
                                            <option value="">Manipur</option>                                      
                                            <option value="">Meghalaya</option>                                      
                                            <option value="">Mizoram</option>                                      
                                            <option value="">Nagaland</option>                                      
                                            <option value="">Orissa</option>                                      
                                            <option value="">Pondicherry</option>                                      
                                            <option value="">Punjab</option>                                      
                                            <option value="">Rajasthan</option>                                      
                                            <option value="">Sikkim</option>                                      
                                            <option value="">Tamilnadu</option>                                      
                                            <option value="">Telangana</option>                                      
                                            <option value="">Tripura</option>                                      
                                            <option value="">Uttar Pradesh</option>                                      
                                            <option value="">Uttaranchal</option>                                      
                                            <option value="">West Bengal</option>                                             
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Address Proof</label>
                                        <select class="form-control basic-select">
                                            <option value="value 01" selected="selected">GST Certificate</option>                                      
                                            <option value="value 01">Certificate of Incorporation</option>                                      
                                            <option value="value 01">Bank Account Statement</option>                                      
                                            <option value="value 01">Credit Card statement</option>                                      
                                            <option value="value 01">Govt. Registration Certificate</option>                                      
                                            <option value="value 01">Lease Proof</option>                                      
                                            <option value="value 01">Service Tax / Sales Tax/ TAN</option>                                      
                                            <option value="value 01">Shop and Establishment certificate</option>                                      
                                            <option value="value 01">Telephone Bill</option>                                      
                                            <option value="value 01">Electricity Bill</option>                                      
                                            <option value="value 01">Water Bill</option>                                      
                                            <option value="value 01">Udhyog Aadhar</option>     
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Upload address proof</label><br>
                                        <small>Only documents in pdf, jpeg, png, doc or docx format with maximum 3MB can be uploaded.</small>
                                        <div class="upload-file">
                                            <label for="formFile" class="form-label">Choose File</label>
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">PAN</label>
                                        <input type="text" class="form-control" value="" placeholder="Enter PAN card Number">
                                    </div>
                                    <div class="form-group col-md-6 mb-3 select-border">
                                        <label class="form-label">Name on PAN card</label>
                                        <input type="text" class="form-control" value="" placeholder="Enter the name of PAN card">
                                    </div>
                                    <div class="form-group col-md-6 mb-3 datetimepickers">
                                        <label class="form-label">Date of birth on PAN card</label>
                                        <div class="input-group date" id="datetimepicker-01" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" value="02/03/2012" data-target="#datetimepicker-01">
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
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3 select-border">
                                        <label class="form-label">GSTIN</label>
                                        <input type="text" class="form-control" value="" placeholder="Enter GSTIN Number">
                                    </div>
                                </div>
                            </form>
                            <a class="btn btn-md btn-primary mt-2" href="#">Save Settings</a>
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
            @include('company.inc.profile')
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