    <!--================================= Browse-job -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="browse-job d-flex">
                        <h3 class="mb-3">{{__('Browse Jobs')}}</h3>
                        <div class="justify-content-center flex-fill">
                            <ul class="nav nav-tabs nav-tabs-02 justify-content-center d-flex mb-3 mb-md-0" role="tablist">
                                
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{__('Industry')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{__('Functional Area')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">{{__('Location')}}</a>
                                </li>
                            </ul>
                        </div>                        
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row mt-4 mt-md-5">
                                    @if(isset($topFunctionalAreaIds) && count($topFunctionalAreaIds)) @foreach($topFunctionalAreaIds as $functional_area_id_num_jobs)
                            <?php
                            $functionalArea = App\ FunctionalArea::where( 'functional_area_id', '=', $functional_area_id_num_jobs->functional_area_id )->lang()->active()->first();
                            ?> @if(null !== $functionalArea)
                                <div class="col-md-4 border-end mb-3 mb-md-0">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <a href="{{route('job.list', ['functional_area_id[]'=>$functionalArea->functional_area_id])}}" title="{{$functionalArea->functional_area}}">
                                                    <h6 class="category-title">{{$functionalArea->functional_area}}</h6> <span class="category-count">({{$functional_area_id_num_jobs->num_jobs}})</span> </a>
                                            </li>                                            
                                        </ul>
                                    </div>
                                </div>
                                @endif @endforeach @endif
                              
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row mt-4 mt-md-5">                           
                            @if(isset($topIndustryIds) && count($topIndustryIds)) @foreach($topIndustryIds as $industry_id => $num_jobs)

                                <?php

                                $industry = App\ Industry::where( 'industry_id', '=', $industry_id )->lang()->active()->first();

                                ?> @if(null !== $industry)
                                <div class="col-md-4 border-end mb-3 mb-md-0">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <a href="{{route('job.list', ['industry_id[]'=>$industry->industry_id])}}" title="{{$industry->industry}}">
                                                    <h6 class="category-title">{{$industry->industry}}</h6> <span class="category-count">({{$num_jobs}})</span> </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div> 
                                @endif @endforeach @endif                               
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row mt-4 mt-md-5">
                            @if(isset($topCityIds) && count($topCityIds)) @foreach($topCityIds as $city_id_num_jobs)

                            <?php

                            $city = App\ City::getCityById( $city_id_num_jobs->city_id );

                            ?> @if(null !== $city)
                                <div class="col-md-4 border-end mb-3 mb-md-0">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <a href="{{route('job.list', ['city_id[]'=>$city->city_id])}}" title="{{$city->city}}">
                                                    <h6 class="category-title">{{$city->city}}</h6> <span class="category-count">({{$city_id_num_jobs->num_jobs}})</span> </a>
                                            </li>                                            
                                        </ul>
                                    </div>
                                </div>
                                @endif @endforeach @endif                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Browse-job -->

