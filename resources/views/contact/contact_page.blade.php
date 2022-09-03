@extends('layouts.app')

@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 


<!--================================= inner banner -->
<div class="header-inner bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-primary">Contact Us</h2>
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="index"> Home </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Contact us </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--================================= inner banner -->

<!--================================= feature-info -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <div class="feature-info feature-info-border p-4 text-center">
          <div class="feature-info-icon mb-3">
            <i class="flaticon-placeholder"></i>
          </div>
          <div class="feature-info-content">
            <h5 class="text-black">Address</h5>
            <span class="d-block">{{ $siteSetting->site_street_address }}</span>            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <div class="feature-info feature-info-border p-4 text-center">
          <div class="feature-info-icon mb-3">
            <i class="flaticon-contact fa-flip-horizontal"></i>
          </div>
          <div class="feature-info-content">
            <h5 class="text-black">Phone Number</h5>
            <span class="d-block">{{ $siteSetting->site_phone_primary }}</span>            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        <div class="feature-info feature-info-border p-4 text-center">
          <div class="feature-info-icon mb-3">
            <i class="flaticon-approval"></i>
          </div>
          <div class="feature-info-content">
            <h5 class="text-black">Email</h5>
            <span class="d-block">{{ $siteSetting->mail_to_address }}</span>            
          </div>
        </div>
      </div>     
    </div>
  </div>
</section>
<!--================================= feature-info -->

<!--================================= Let’s Get In Touch -->
<section class="space-ptb pt-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title-02 text-center">
          <h2>{{__('Let’s Get In Touch!')}}</h2>          
        </div>
      </div>
    </div>   
    <form method="post" action="{{ route('contact.us')}}" name="contactform" id="contactform">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6 mb-2 {{ $errors->has('full_name') ? ' has-error' : '' }}">                  
                {!! Form::text('full_name', null, array('id'=>'full_name', 'class'=>'form-control', 'placeholder'=>__('Full Name'),  'autofocus'=>'autofocus')) !!}                
                @if ($errors->has('full_name')) <span class="help-block"> <strong style="color:red;">{{ $errors->first('full_name') }}</strong> </span> @endif
            </div>
            <div class="col-md-6 mb-2 {{ $errors->has('email') ? ' has-error' : '' }}">                  
                {!! Form::text('email', null, array('id'=>'email', 'class'=>'form-control', 'placeholder'=>__('Email'),  'autofocus'=>'autofocus')) !!}                
                @if ($errors->has('email')) <span class="help-block"> <strong style="color:red;">{{ $errors->first('email') }}</strong> </span> @endif
            </div>           
           <div class="col-md-6 mb-2 {{ $errors->has('phone') ? ' has-error' : '' }}">                  
                {!! Form::text('phone', null, array('id'=>'phone', 'class'=>'form-control', 'placeholder'=>__('Phone'),  'autofocus'=>'autofocus')) !!}                
                @if ($errors->has('phone')) <span class="help-block"> <strong style="color:red;">{{ $errors->first('phone') }}</strong> </span> @endif
            </div>
           <div class="col-md-6 mb-2 {{ $errors->has('subject') ? ' has-error' : '' }}">                  
                {!! Form::text('subject', null, array('id'=>'subject', 'class'=>'form-control', 'placeholder'=>__('Subject'),  'autofocus'=>'autofocus')) !!}                
                @if ($errors->has('subject')) <span class="help-block"> <strong style="color:red;">{{ $errors->first('subject') }}</strong> </span> @endif
            </div>
           <div class="col-md-12 mb-2{{ $errors->has('message_txt') ? ' has-error' : '' }}">                  
                {!! Form::textarea('message_txt', null, array('id'=>'message_txt', 'class'=>'form-control', 'placeholder'=>__('Message'),  'autofocus'=>'autofocus')) !!}                
                @if ($errors->has('message_txt')) <span class="help-block"> <strong style="color:red;">{{ $errors->first('message_txt') }}</strong> </span> @endif
            </div>
            <div class="col-md-12 mb-2 mt-2{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                {!! app('captcha')->display() !!}
                @if ($errors->has('g-recaptcha-response')) <span class="help-block"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
            </div>
           <div class="col-md-12">
               <button title="" class="button btn btn-primary" type="submit" id="submit">{{__('Submit Now')}}</button>
            </div>
        </div>
             </form>
                </div>
</section>

<section class="space-ptb pt-0 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="d-flex mb-md-0 mb-4">
          <i class="font-xlll text-primary flaticon-hand-shake"></i>
          <div class="feature-info-content ps-4">
            <h5>{{__('Chat To Us Online')}}</h5>
            <p class="mb-0">{{__('Chat to us online if you have any question.')}}</p>
            <a class="mt-2 mb-0 d-block" href="#">Click here to open chat</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="d-flex mb-md-0 mb-4">
          <i class="font-xlll text-primary flaticon-profiles"></i>
          <div class="feature-info-content ps-4">
            <h5>{{__('Call Us')}}</h5>
            <p class="mb-0">{{__('Our support agent will work with you to meet your lending needs.')}}</p>
            <h5 class="mt-2 mb-0">{{ $siteSetting->site_phone_secondary }}</h5>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="d-flex">
          <i class="font-xlll text-primary flaticon-conversation-1"></i>
          <div class="feature-info-content ps-4">
            <h5>Read our latest news</h5>
            <p class="mb-0">Visit our Blog page and know more about news and career tips</p>
            <a class="mt-2 mb-0 d-block" href="">Read Blog post </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================================= Let’s Get In Touch -->

@include('includes.footer')
@endsection