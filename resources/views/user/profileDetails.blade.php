<div class="row">
    <div class="col-lg-6">
        <div class="candidates-skills">
            <div class="candidates-skills-info">
                <span class="d-block" style="color: #fff;"><i class="fa fa-map-marker" aria-hidden="true"></i> <span style="margin-left: 3px;"> {{ $user->city->city }} , {{ $user->country->country }}</span> </span>
                </span>
                <span class="d-block mt-2" style="color: #fff;"><i class="fa fa-suitcase" aria-hidden="true"></i> <span style="margin-left: 3px;">{{ $user->profileCarrer->jobrole->role }}</span></span>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="candidates-skills">
            <div class="candidates-skills-info">
                <span class="d-block" style="color: #fff;"><i class="fa fa-phone" aria-hidden="true" style="font-size:16px;color:#fff;transform: rotate(100deg);"></i> <span style="margin-left: 3px;">{{$user->mobile_num}}</span></span>
                <span class="d-block mt-2" style="color: #fff;"><i class="fa fa-envelope" aria-hidden="true" ></i> <span style="margin-left: 3px;">{{$user->email}}</span></span>
            </div>
        </div>
    </div>
</div>