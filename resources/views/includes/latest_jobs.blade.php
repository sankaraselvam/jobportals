@php
use App\Helpers\MiscHelper;
use Carbon\Carbon; 
@endphp
<style>
        .job-list-details ul li {
            margin: 5px 25px 5px 0px;
            font-size: 13px;
        }
        ::marker {
            color: red;
            font-size:12px;
        }
        .text-danger {
    color: red !important;
}
    </style>


 <!--================================= Divider -->
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <hr class="m-0">
            </div>
        </div>
    </div>
    <!--================================= Divider -->

   <!--================================= Browse listing -->
   <section class="space-ptb bg-light">
        <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="section-title center">
                          <h2 class="title">{{__('Browse Listing')}}</h2>                        
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-lg-9 col-md-12 order-lg-2 mb-3 mb-lg-0">
                    <div class="browse-job d-flex border-0">
                        <div class="style-01">
                            <ul class="nav nav-tabs justify-content-center d-flex mt-0" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link  active" id="profile-tab" data-bs-toggle="tab" href="#Recent" role="tab" aria-controls="profile" aria-selected="false">Recent Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#Popular" role="tab" aria-controls="contact" aria-selected="false">Popular Jobs</a>
                                </li>
                            </ul>
                        </div>
                        <div class="job-found ms-auto">
                            <span class="badge badge-lg bg-primary">{{ 2000 +count($latestJobs) }}</span>
                            <h6 class="ms-3 mb-0">Job Found</h6>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <!-- Hot jobs -->
                        <input type="hidden" value="{{$user}}" id="userId">
                        <div class="tab-pane fade show active" id="Recent" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row mt-3">
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

                                    <div class="col-lg-12 mb-4 mb-sm-10">
                                        <!-- Freelance -->
                                        <div class="job-list">
                                            <div class="job-list-logo">
                                            <a href="{{route('job.detail', [$latestJob->slug])}}" title="{{$latestJob->title}}" >
                                            {{$company->printCompanyImage()}}
                                            </a>
                                            </div>
                                            <div class="job-list-details">
                                                <div class="job-list-info">
                                                    <div class="job-list-title">
                                                        <h5 class="mb-0"><a href="{{route('job.detail', [$latestJob->slug])}}">{{$latestJob->title}}</a></h5>
                                                    </div>
                                                    <div class="job-list-option">
                                                    <ul class="list-unstyled">  
                                                        <li><i class="fas fa-briefcase pe-2"></i> {{ $latestJob->jobExperienceFrom->job_experience }}- {{ $latestJob->jobExperienceTo->job_experience }} Years</li>                                             
                                                        <li><i class="fas fa-rupee-sign pe-2"></i>{{$latestJob->salary_from}} - {{$latestJob->salary_to}} PA</li>                                           
                                                        <li><i class="fas fa-map-marker-alt pe-2"></i>{{$latestJob->getCity('city')}}</a></li>
                                                    </ul>
                                                    </div>
                                                    <div class="job-list-option">
                                                <ul class="list-unstyled">  
                                                    <li><i class="fas fa-file-code pe-2"></i>{{str_limit(strip_tags($latestJob->description), 78, '...')}}</li>                                                                                            
                                                </ul>
                                            </div>  
                                            <ul class="ps-3 pe-2 mb-0 list-style-2">{!!$latestJob->getJobSkillsList()!!}</ul>    
                                                </div>
                                            </div>
                                            <div class="job-list-favourite-time">
                                                @if ($favouritejob == 0)
                                                    <a class="job-list-favourite order-2" href="#" data-id="{{route('add.to.favourite', $latestJob->slug)}}"><i class="far fa-heart"></i></a>
                                                @else
                                                    <a class="job-list-favourite order-2" href="#" data-id="{{route('remove.from.favourite', $latestJob->slug)}}"><i class="fas fa-heart text-danger"></i></a>
                                                @endif
                                                <span class="job-list-time order-1"><i class="far fa-clock pe-1"></i>{{ isset($number[$different_days])?$number[$different_days]:$different_days }} ago</span>
                                            </div>
                                        </div>                                   
                                    </div>
                                    @endif

                                    @endforeach

                                    @endif                               
                            </div>
                            <div class="col-12 justify-content-center d-flex mt-md-5 mt-4">
                                <a class="btn btn-outline btn-lg" href="{{route('job.list')}}">{{__('View More Jobs')}}</a>
                            </div>
                        </div>
                        <!-- Recent jobs --> 
                    </div>
                </div>
                <div class="col-lg-3 order-lg-1">
                    <div class="sidebar mb-0">
                        <div class="employers-grid bg-white py-4">
                            <div class="widget-title widget-collapse mb-3">
                                <h5>Featured Company</h5>
                            </div>
                            <div class="mb-3">
                                <img class="img-fluid" src="{{asset('/')}}images/bg/bg-01.jpg" alt="">
                            </div>
                            <div class="employers-list-details">
                                <div class="employers-list-info">
                                    <div class="employers-list-title">
                                        <h5 class="mb-0"><a href="employer-detail.html">Bright Sparks PLC</a></h5>
                                    </div>
                                    <div class="employers-list-option">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-map-marker-alt pe-1"></i>Botchergate, Carlisle</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="employers-list-position">
                                <a class="btn btn-sm btn-primary" href="#">Part-Time</a>
                            </div>
                        </div>
                        <div class="owl-carousel owl-nav-bottom-center mt-4" data-nav-arrow="false" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="15" data-autoheight="true">
                            <div class="item">
                                <div class="employers-grid bg-white py-4">
                                    <div class="employers-list-logo pt-0">
                                        <img class="img-fluid" src="{{asset('/')}}images/svg/09.svg" alt="">
                                    </div>
                                    <div class="employers-list-details">
                                        <div class="employers-list-info">
                                            <div class="employers-list-title">
                                                <h5 class="mb-0"><a href="employer-detail.html">Bright Sparks PLC</a></h5>
                                            </div>
                                            <div class="employers-list-option">
                                                <ul class="list-unstyled">
                                                    <li><i class="fas fa-map-marker-alt pe-1"></i>Botchergate, Carlisle</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="employers-list-position">
                                        <a class="btn btn-sm btn-dark" href="#">25 Open position</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="employers-grid bg-white py-4">
                                    <div class="employers-list-logo pt-0">
                                        <img class="img-fluid" src="{{asset('/')}}images/svg/08.svg" alt="">
                                    </div>
                                    <div class="employers-list-details">
                                        <div class="employers-list-info">
                                            <div class="employers-list-title">
                                                <h5 class="mb-0"><a href="employer-detail.html">Suttons Financial Ltd</a></h5>
                                            </div>
                                            <div class="employers-list-option">
                                                <ul class="list-unstyled">
                                                    <li><i class="fas fa-map-marker-alt pe-1"></i>Paris, Île-de-France</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="employers-list-position">
                                        <a class="btn btn-sm btn-dark" href="#">23 Open position</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="employers-grid bg-white py-4">
                                    <div class="employers-list-logo pt-0">
                                        <img class="img-fluid" src="{{asset('/')}}images/svg/06.svg" alt="">
                                    </div>
                                    <div class="employers-list-details">
                                        <div class="employers-list-info">
                                            <div class="employers-list-title">
                                                <h5 class="mb-0"><a href="employer-detail.html">Altenwerth and Hamill</a></h5>
                                            </div>
                                            <div class="employers-list-option">
                                                <ul class="list-unstyled">
                                                    <li><i class="fas fa-map-marker-alt pe-1"></i>Taunton, London</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="employers-list-position">
                                        <a class="btn btn-sm btn-dark" href="#">35 Open position</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <div class="btad mt-3">{!! $siteSetting->above_footer_ad !!}</div>
    </section>
    <!--================================= Browse listing -->
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        //exampleModalCenter
       $(".order-2").on('click', function(){
            if($('#userId').val() > 0){
                location.replace($(this).attr("data-id"));
            }else{
                $("#exampleModalCenter").modal("show");
            }
       });
    });
</script>
@endpush
