@extends('layouts.app')

@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 


<div class="listpgWraper mt-5">
  <div class="container">
        <div class="row">
            <div class="col-md-4 "></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h6>{{__('Reset Password')}}</h6></div>
                    <div class="panel-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group mb-3 {{ $errors->has('email') ? ' has-error' : '' }} ">
                                <label for="email" class="col-md-4 control-label mt-1 mb-1">{{__('Email Address')}}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="{{__('Email Address')}}" required>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{__('Send Password Reset Link')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection