<!--=================================    inner banner -->
<div class="header-inner" style="background: #009befd6;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="candidates-user-info">
                        <div class="jobber-user-info">
                            <div class="profile-avatar">
                                @if ($user->image !='')
                                    <img class="img-fluid " src="{{asset('/')}}user_images/{{$user->image}}" alt="">
                                @else
                                    <img class="img-fluid " src="{{asset('/')}}images/avatar/04.jpg" alt=""> 
                                @endif
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            @php
                            $company="";
                            $role="";
                                if(isset($user->profileExperience)){
                                    foreach($user->profileExperience as $experience){
                                        if($experience->emp_worked_till=="present"){
                                            $company=$experience->company;
                                            $role=$experience->jobRole->role;
                                        }
                                    }
                                }
                            @endphp

                            @if ($company!="" && $role!="")
                                <div class="profile-avatar-info ms-4">
                                    <h4 class="mt-4" style="color: #fff;text-transform: capitalize;"></h4>
                                    <p style="color: #fff;text-transform: capitalize;">{{$role}} at {{$company}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @include('job.progress')
                    @include('user.profileDetails')
                </div>
            </div>
        </div>
    </div>
    <!--=================================    inner banner -->