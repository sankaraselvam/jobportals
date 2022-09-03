@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 


<!--================================= accordion -->
<section class="space-ptb">
  <div class="container">
    <div class="row">     
      <div class="col-lg-8">
        <div class="section-title-02">
          <h2>Frequently Asked Questions</h2>
        </div>
        <div class="accordion accordion-style" id="accordion-Two">
        @if(isset($faqs) && count($faqs))
                @foreach($faqs as $faq)
          <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    {!! $faq->faq_question !!}? <i class="fas fa-chevron-down fa-xs"></i>
                    </button>
                </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion-Two">
              <div class="accordion-body">
                <p>{!! $faq->faq_answer !!}</p>                
              </div>
            </div>
          </div>
          @endforeach
                @endif
        </div>
      </div>
      <div class="col-md-2 col-sm-6 ">
                <!-- Sponsord By -->
                <div class="sidebar">

                  <h4 class="widget-title">{{__('Sponsord By')}}</h4>

                  <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>

            </div>
</div>
    </div>
  </div>
</section>
<!--================================= accordion -->
@include('includes.footer')


@endsection