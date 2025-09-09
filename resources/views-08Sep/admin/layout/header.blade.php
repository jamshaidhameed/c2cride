<!--HEADER_SECTION_START-->
<header id="header-section">
    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <div class="nav-inner">
                <a class="navbar-brand" href="/"><img src="{{asset('front/images/logo.svg')}}" alt=""></a>
                <div class="dashboard-nav">
                    <ul>
                        <li class=""><a href='{{url("user")}}'>
                                <div class="language-button">@if(auth()->user()->role_id == 1) Admin Dashboard @endif</div>
                            </a></li>
                        <li>
                            <a class="header-profile-main">
                                <div class="header-profile">
                                    <img src="{{asset('images/avatar_icon.svg')}}" alt=""></div>
                                <div class="header-title">{{Auth::user()->name == '' ? Auth::user()->email : ucfirst(strtok(Auth::user()->name, " "))}}</div>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="mobile-bottom-nav">
    <ul>
        <li class="new_ride"><a href="javascript:void(0)"><div class="nav-button">+ New Ride</div></a></li>
        <li><a href="https://wa.me/+971585603086" target="_blank"><div class="nav-button green-button"><img src="{{asset('images/chat_icon.svg')}}" alt=""> Live Chat</div></a></li>
        <li><a href="javascript:void(0)"><div class="nav-button"><img src="{{asset('images/rides_icon.svg')}}" alt=""> Rides</div></a></li>
    </ul>
</div>
<!--HEADER_SECTION_END-->
