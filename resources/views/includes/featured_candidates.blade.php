@php
use App\Helpers\MiscHelper;
use Carbon\Carbon; 
@endphp
<!--=================================
Candidates & Companies -->
<section class="space-pb"><br><br>
        <div class="container">
            <div class="row">
                <!-- Featured Candidates -->
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="section-title">
                        <h2 class="title">Featured Candidates</h2>                        
                    </div>
                                      @foreach ($candidates as $users)  

                    @php
                    $skillArr=[];
                    
                    foreach($users->profileSkills as $skill){
                        $skillArr[]=$skill->jobSkill->job_skill;
                    }    
                    $current_date = Carbon::now()->toDateTimeString();
                    $different_days = MiscHelper::diffInDays($current_date, $users->created_at);
                    $number = MiscHelper::getNumbers();
                    @endphp 

                    <div class="candidate-list">
                        <div class="candidate-list-image">
                            @if ($users->image !='')
                                <img class="img-fluid " src="{{asset('/')}}user_images/{{$users->image}}" alt="">
                            @else
                                <img class="img-fluid " src="{{asset('/')}}images/avatar/04.jpg" alt=""> 
                            @endif  
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5 class="mb-0"><a href="candidate-detail.html">{{ $users->name }}</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-filter pe-1"></i>{{ implode(' , ',$skillArr) }}</li>
                                        <li><i class="fas fa-map-marker-alt pe-1"></i>{{ isset($users->city)?$users->city->city:'' }}, {{ isset($users->state)?$users->state->state:'' }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="candidate-list-favourite-time">
                            <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>{{ isset($number[$different_days])?$number[$different_days]:$different_days }}D ago</span>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="col-lg-1"></div>
                <!-- Top Companies -->
                <div class="col-lg-4">
                    <div class="section-title">
                        <h2 class="title" style="margin-left:15%;">Top Companies</h2>                        
                    </div>
                    <div class="owl-carousel owl-nav-bottom-center" data-nav-arrow="false" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="2" data-xs-items="1" data-xx-items="1" data-space="15" data-autoheight="true">
                       @if(isset($latestJobs) && count($latestJobs) > 0)
                               
                                @foreach($latestJobs as $latestJob)

                               @php
                                $company = $latestJob->getCompany();
                                $current_date = Carbon::now()->toDateTimeString();
                                $different_days = MiscHelper::diffInDays($current_date, $latestJob->created_at);
                                $number = MiscHelper::getNumbers();

                                $favouritejob = app('App\Http\Controllers\IndexController')->getFavouriteJob($latestJob->slug);
                               @endphp
                                

                                @if(null !== $company) 
                                
                                <div class="item">
                            <div class="employers-grid">
                                <div class="employers-list-logo">
                                    <a href="{{route('job.detail', [$latestJob->slug])}}" title="{{$latestJob->title}}" >
                                            {{$company->printCompanyImage()}}
                                            </a>
                                </div>
                                <div class="employers-list-details">
                                    <div class="employers-list-info">
                                        <div class="employers-list-title">
                                            <h5 class="mb-0"><a href="employer-detail.html">{{$latestJob->title}}</a></h5>
                                        </div>
                                        <div class="employers-list-option">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>{{$latestJob->getCity('city')}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="employers-list-position">
                                    <a class="btn btn-sm btn-dark" href="{{route('job.list')}}">{{__('View More Jobs')}}</a>
                                </div>
                            </div>
                        </div>
                        @endif

                        @endforeach

                        @endif 
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Candidates & Companies -->