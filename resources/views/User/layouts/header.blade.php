<!--HEADER_SECTION_START-->
<header id="header-section">
    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <div class="nav-inner">
                <a class="navbar-brand" href="/"><img src="{{asset('images/logo.svg')}}" alt=""></a>
                <div class="dashboard-nav">
                    <ul>
                        <!-- <li class="desktop-show"><a href="javascript:void(0)">
                                <div class="language-button"><img src="{{asset('images/language_icon.svg')}}" alt=""> En</div>
                            </a></li>
                        <li class="desktop-show"><a href="javascript:void(0)">
                                <div class="language-button"><img src="{{asset('images/dollar_icon.svg')}}" alt="">USD </div>
                            </a></li> -->
                        @guest
                            <li><a href="/register">
                                    <div class="btn btn-primary bg-transparent">Sign Up</div>
                                </a></li>
                            <li><a href="/login">
                                    <div class="btn btn-primary">Log in</div>
                                </a></li>
                        @endguest
                        <!--AFTER_LOGIN_DROPDOWN_START-->
                        @auth

                        @if(auth()->user()->role_id == 1)
                            <li class=""><a href='{{url("admin/booking")}}'>
                                    <div class="language-button">Admin Panel</div>
                                </a></li>
                        @endif
                        @endauth
                        @auth
                            <li class="dropdown-open">
                                @if(Auth::user()->role_id==1)
                                    <a href="{{url('admin/booking')}}" class="header-profile-main" style="display: flex;">
                                        <div class="header-profile"><img src="{{asset('images/avatar_icon.svg')}}" alt=""></div>
                                        <div class="header-title">{{Auth::user()->name == '' ? Auth::user()->email : ucfirst(strtok(Auth::user()->name, " "))}}</div>
                                    </a>
                                 @else
                                    <a  class="header-profile-main" style="display: flex;">
                                        <div class="header-profile"><img src="{{asset('images/avatar_icon.svg')}}" alt=""></div>
                                        <div class="header-title">{{Auth::user()->name == '' ? Auth::user()->email : ucfirst(strtok(Auth::user()->name, " "))}}</div>
                                    </a>
                                 @endif
                            </li>
                            <li>
                                {{-- <a class="logout-button" href="{{url('logout')}}">
                                    <div class="btn btn-primary">Logout</div>
                                </a> --}}
                                <a class="logout-button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{-- <img src="{{asset('images/link_icon6.svg')}}" alt=""> --}}
                                {{-- <img src="{{asset('images/link_icon6_hover.svg')}}" alt="">  --}}
                                <div class="btn btn-primary">Logout</div></a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="mobile-bottom-nav">
    <ul>
        <li class="new_ride">
        @if(Auth::user())
                    <a href="{{ route('front.index') }}">
						<div class="nav-button">+ New Ride</div>
					</a>
                    @else
                     <a  href="{{ route('front.index') }}">
						<div class="nav-button">+ New Ride</div>
					</a>
                    @endif
        </li>
        <li><a href="https://wa.me/+971585603086" target="_blank">
                <div class="nav-button green-button"><img src="{{asset('images/chat_icon.svg')}}" alt=""> Live Chat</div>
            </a></li>
        <li>
        @if(Auth::user())
                    <a href="{{ route('front.index') }}">
						<div class="nav-button"><img src="{{asset('images/rides_icon.svg')}}" alt=""> Rides</div>
					</a>
                    @else
                        <a  href="{{ route('front.index') }}">
                            <div class="nav-button"><img src="{{asset('images/rides_icon.svg')}}" alt=""> Rides</div>
                        </a>
                    @endif
        </li>
    </ul>
</div>
<!--HEADER_SECTION_END-->
