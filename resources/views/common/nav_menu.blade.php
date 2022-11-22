<section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sticky-top secondary-menu-sticky-top">
                            <div class="secondary-menu">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="{{route('home')}}">Dashboard</a></li>
                                    <li><a href="{{ route('my.profile') }}" id="my_profile">My Profile</a></li>
                                    <li><a href="{{ route('candidate.change.password') }}" id="change_pwd">Change Password</a></li>
                                    <li><a href="{{ route('my.job.applications') }}" id="manage_jobs">Manage Jobs</a></li>
                                    <li><a href="{{ route('my.favourite.jobs') }}" id="saved_jobs">Saved Jobs</a></li>                                
                                    <li><a href="{{route('my.messages')}}" id="my_mesg">My Message</a></li>
                                    <li><a href="{{route('my.followings')}}" id="my_follows">My Followings</a></li>
                                    <li><a href="">Pricing Plan</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>