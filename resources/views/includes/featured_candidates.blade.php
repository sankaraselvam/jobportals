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
                        <h2 class="title">Top Companies</h2>                        
                    </div>
                    <div class="owl-carousel owl-nav-bottom-center" data-nav-arrow="false" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="2" data-xs-items="1" data-xx-items="1" data-space="15" data-autoheight="true">
                        <div class="item">
                            <div class="employers-grid">
                                <div class="employers-list-logo">
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
                                    <a class="btn btn-sm btn-dark" href="#">17 Open position</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="{{asset('/')}}images/svg/10.svg" alt="">
                                </div>
                                <div class="employers-list-details">
                                    <div class="employers-list-info">
                                        <div class="employers-list-title">
                                            <h5 class="mb-0"><a href="employer-detail.html">Fleet Improvements Pvt</a></h5>
                                        </div>
                                        <div class="employers-list-option">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Green Lanes, London</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="employers-list-position">
                                    <a class="btn btn-sm btn-dark" href="#">20 Open position</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid">
                                <div class="employers-list-logo">
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
                            <div class="employers-grid">
                                <div class="employers-list-logo">
                                    <img class="img-fluid" src="{{asset('/')}}images/svg/19.svg" alt="">
                                </div>
                                <div class="employers-list-details">
                                    <div class="employers-list-info">
                                        <div class="employers-list-title">
                                            <h5 class="mb-0"><a href="employer-detail.html">Co-operative Funeralcare</a></h5>
                                        </div>
                                        <div class="employers-list-option">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-map-marker-alt pe-1"></i>Lynch Lane, Weymouth</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="employers-list-position">
                                    <a class="btn btn-sm btn-dark" href="#">30 Open position</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="employers-grid">
                                <div class="employers-list-logo">
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
    </section>
    <!--================================= Candidates & Companies -->