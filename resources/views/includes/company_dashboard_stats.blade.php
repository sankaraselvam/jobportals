
                    <div class="col-lg-6">
                        <h4 class="mt-4 mb-4" style="color: #666;font-family: Arial,Helvetica,sans-serif;">Welcome to Udhyog Recruiter!</h4>
                        <div class="card-header" style="border: 1px solid #ddd;">Recently Posted Jobs</div>
                        <div class="card-body mb-4" style="border: 1px solid #ddd;">
                            <table class="table table-borderless">                         
                                
                                    <thead class="bg-white">
                                        <tr style="color: #505050;">
                                            <th style="width:55%;">Job Title</th>
                                            <th>Posted on</th>
                                            <th class="text-center">Responses</th>
                                        </tr>
                                    </thead>
                                    <tbody>    
                                    @if(isset($postJobs) && count($postJobs))
                                    @foreach($postJobs as $jobs) 
                                        <tr>
                                            
                                                <td><a href="{{route('job.detail', [$jobs->slug])}}"  title="{{$jobs->title}}" target="_blank" >{{$jobs->title}}</a></td>
                                                <td class="text-center">                              
                                                    {{ date("d-M-Y", strtotime($jobs->created_at)) }}                                       
                                                </td>
                                                <td class="text-center">                                        
                                                    <a href="#" class="text-primary">{{count($jobs->appliedUsers)}}</a>                                       
                                                </td>
                                        </tr>

                                    @endforeach
                                    @endif  
                                    </tbody>
                               
                            </table>
                            <a href="{{route('company.managejobs')}}" class="mb-2" style="float: right;">View all</a><br>
                        </div>
                        <div class="card-header" style="border: 1px solid #ddd;">Product Permissions</div>
                        <div class="card-body mb-4" style="border: 1px solid #ddd;">
                            <table class="table table-borderless">
                                <thead class="bg-white text-center" >
                                    <tr style="color: #505050;">
                                        <th>Product</th>
                                        <th>Assigned</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>Job posting</td>
                                        <td>1</td>
                                        <td>1000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header" style="border: 1px solid #ddd;">Account Utilization</div>
                        <div class="card-body mb-4" style="border: 1px solid #ddd;">
                            <table class="table table-borderless">
                                <thead class="bg-white">
                                    <tr style="color: #505050;">
                                        <th>Job Posting Usage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="">Job posting</a>
                                        </td>
                                        <td>{{Auth::guard('company')->user()->availed_jobs_quota}} out of {{Auth::guard('company')->user()->jobs_quota}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         <div class="card-body mb-4" style="border: 1px solid #ddd;">
                            <table class="table table-borderless">
                                <thead class="bg-white">
                                    <tr style="color: #505050;">
                                        <th>Contact Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Mobile Number
                                        </td>
                                        <td>+91 77080 61387</td>
                                    </tr>
                                    <tr>
                                        <td>Mail</td>
                                        <td><a href="mailto:support@udhyog.com">support@udhyog.com</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    