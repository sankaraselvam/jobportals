<style>
.progress .progress-barlow {
    height: 5px;
    background: red;
}
.progress .progress-barmedium {
    height: 5px;
    background: yellow;
}
.progress .progress-barhigh {
    height: 5px;
    background: green;
}
.progress {
    height: 5px!important;
    background-color: #fff;
}
.progress .progress-bar-number1 {
    color: #fff;
}

.progress .progress-bar-number {
    color: #fff;
}

</style>
@php
    $level='';
    @endphp
@if ($user->percentage <=  50)
    @php
    $level='low';
    @endphp
@elseif($user->percentage >  50 && $user->percentage <=  75)
    @php
    $level='medium';
    @endphp                            
@elseif($user->percentage >  75)
    @php
    $level='high';
    @endphp                            
@endif

<div class="progress">
    <div class="progress-bar{{ $level }}" role="progressbar" style="width:{{$user->percentage}}%" aria-valuenow="{{$user->percentage}}" aria-valuemin="0" aria-valuemax="{{$user->percentage}}">
        <span class="progress-bar-number">{{$user->percentage}}%</span>
        <span class="progress-bar-number1">Profile Strength</span>
    </div>
</div>