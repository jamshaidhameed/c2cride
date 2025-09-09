<div class="gerenric-links">
    <ul>
        <li><a href="{{ route('front.index') }}" ><img src="{{asset('images/link_icon1.svg')}}" alt=""><img src="{{asset('images/link_icon1_hover.svg')}}" alt=""> New</a></li>
        <li><a @if(request()->path() == 'user') class="active_link" @endif href="{{url('user')}}"><img src="{{asset('images/link_icon2.svg')}}" alt=""><img src="{{asset('images/link_icon2_hover.svg')}}" alt=""> Upcoming</a></li>
        <li><a @if(request()->path() == 'user/past-rides') class="active_link" @endif href="{{url('user/past-rides')}}" ><img src="{{asset('images/link_icon3.svg')}}" alt=""><img src="{{asset('images/link_icon3_hover.svg')}}" alt=""> Past</a></li>
        <li><a @if(request()->path() == 'user/support') class="active_link" @endif href="{{url('user/support')}}" ><img src="{{asset('images/link_icon4.svg')}}" alt=""><img src="{{asset('images/link_icon4_hover.svg')}}" alt=""> Support</a></li>
        <li><a @if(request()->path() == 'user/setting') class="active_link" @endif href="{{url('user/setting')}}" ><img src="{{asset('images/link_icon5.svg')}}" alt=""><img src="{{asset('images/link_icon5_hover.svg')}}" alt=""> Settings</a></li>
        <li>

            {{-- <a href="{{url('logout')}}"><img src="{{asset('images/link_icon6.svg')}}" alt=""><img src="{{asset('images/link_icon6_hover.svg')}}" alt=""> Logout</a> --}}

            <a class="logout-button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <img src="{{asset('images/link_icon6_hover.svg')}}" alt=""> Logout
                </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>


        </li>
    </ul>
</div>
