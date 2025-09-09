@extends('front.layouts.master')

@section('title')

 C2CRides

@endsection

@section('content')

<div class="content">

        <div class="banner animatedParent animateOnce"> 

            <div class="autoContent">

                <div class="banner_inner">

                    <div class="banner_box">

                        <div class="discountBox animated slow growIn delay-1000 blinking" id="message">



                            @if (count($coupons) > 0)

                                <h4>{{ round((float)$coupons[0]->show_at_front) }}

                                    <sup>Off</sup>

                                    <sub>%</sub>

                                </h4>

                                <span>with Code</span>

                                <strong>{{ $coupons[0]->code }}</strong>

                            @endif

                            {{-- <h4>

                                35

                                <sup>Off</sup>

                                <sub>%</sub>

                            </h4>

                            <span>with Code</span>

                            <strong>TOUR15</strong> --}}

                        </div>

                        <div class="banner_text">

                            <!-- <small class="uppercase animated fadeInUpShort slow">City Tour</small> -->

                            <h1 class="animated fadeInUpShort slow delay-250">

                                Make every moment count<br> with



                                <span class="banner_text_slider">

                                    <span style="display: block;">Every Ride </span>

                                    <span style="display: none;">Every Hour </span>

                                    <span style="display: none;">Every Tour</span>

                                    <i></i>

                                </span>



                            </h1>

                            <p class="animated fadeInUpShort slow delay-500">Experience the city like never before. Book on-demand, by the hour or schedule a quick city tour, we deliver it all. <br>

                                Enjoy the ride you deserve, the freedom you need and an experience built for you.





                            </p>

                        </div>

                    </div>



                    <div class="banner_right">

                        <div class="rides_box animated fadeInRightShort slow">

                            <div class="ride_tabs">

                                <div class="ride_tab_header">

                                    <ul>

                                        <li>

                                            <a data-rel=".tab_rides" href="javascript:void(0)"

                                                class="rideTabBtn active">

                                                <i>

                                                    <svg width="18" height="23" viewBox="0 0 18 23" fill="none"

                                                        xmlns="http://www.w3.org/2000/svg">

                                                        <path

                                                            d="M8.54745 0.948117C16.4371 0.515793 20.9907 9.83401 15.7591 15.7331C13.8846 17.8483 11.5081 19.7426 9.58908 21.8461C9.24422 22.1367 8.77502 22.1367 8.42781 21.8461C6.49704 19.7217 4.08064 17.8088 2.19445 15.6704C-2.71576 10.099 1.14109 1.35487 8.54745 0.948117ZM14.1216 14.2107C17.3567 10.4035 15.44 4.50666 10.5392 3.39331C4.83371 2.09633 0.324674 8.06985 3.15162 13.1322C5.38268 17.1254 11.1445 17.7135 14.1239 14.2084L14.1216 14.2107Z"

                                                            fill="#333333" />

                                                        <path

                                                            d="M5.18558 12.9625C4.92986 12.8835 5.1715 12.0119 5.05655 11.8771C4.96271 11.7632 4.76095 11.8678 4.70699 11.5261C4.646 11.1449 4.66007 9.68291 4.84071 9.3761C4.9369 9.2134 5.12927 9.12275 5.21608 8.95307C4.82195 8.97399 4.39028 9.02048 4.32928 8.52075C4.24014 7.80021 5.34745 7.44691 5.82839 7.93037C6.15448 7.42599 6.11695 6.69383 6.73395 6.41026C7.60901 6.01048 10.5181 5.99421 11.3673 6.45442C11.8318 6.70545 11.9444 7.40972 12.0946 7.86761C12.6482 7.67237 13.5092 7.59334 13.6735 8.31156C13.8001 8.86475 13.3427 9.02977 12.8641 8.95307C12.8805 9.16226 13.1081 9.23431 13.1996 9.41561C13.2699 9.5574 13.3028 9.77588 13.3169 9.93626C13.345 10.2686 13.3708 11.303 13.3169 11.5935C13.2746 11.8143 13.0189 11.7516 12.9485 11.9189C12.8782 12.0863 13.0002 12.7626 12.904 12.9021C12.843 12.9881 11.4119 12.9974 11.2618 12.93C11.2313 12.916 11.1327 12.8138 11.1327 12.8045V11.8166H6.89113V12.8045C6.89113 12.8254 6.80667 12.9021 6.82779 12.9625C6.50404 12.9625 5.39907 13.0276 5.19027 12.9625H5.18558ZM6.24598 8.5068H11.7732C11.7521 8.25345 11.3509 7.00529 11.2148 6.90999C10.8489 6.65664 9.27468 6.58458 8.78202 6.59388C8.37381 6.60085 7.64655 6.65199 7.25946 6.74264C7.15154 6.76821 6.84421 6.86815 6.77852 6.93323C6.69172 7.01923 6.18733 8.44869 6.24598 8.5068ZM6.16621 9.66664C5.40141 9.82237 5.44599 10.9613 6.22252 11.0473C7.33218 11.1705 7.24773 9.44583 6.16621 9.66664ZM12.2025 9.86188C11.5996 9.18783 10.4547 10.1478 11.1585 10.866C11.7943 11.5145 12.8101 10.5429 12.2025 9.86188Z"

                                                            fill="#333333" />

                                                    </svg>



                                                </i>

                                                <em>Rides</em>

                                            </a>

                                        </li>

                                        <li>

                                            <a data-rel=".tab_byHours" href="javascript:void(0)" class="rideTabBtn">

                                                <i>

                                                    <svg width="18" height="20" viewBox="0 0 18 20" fill="none"

                                                        xmlns="http://www.w3.org/2000/svg">

                                                        <path

                                                            d="M11.0665 2.02836H9.62409V2.53453C10.1263 2.58588 10.6247 2.65191 11.1156 2.76194C12.5166 3.08472 13.8117 3.76328 14.9068 4.65826L15.5676 4.01637C15.5676 3.93934 15.156 3.63858 15.1032 3.54321C15.0956 3.52487 15.0918 3.51387 15.1032 3.49553L15.9452 2.67391L17.8144 4.48586L17.803 4.54822L16.9685 5.35516C16.893 5.30014 16.4965 4.86733 16.4512 4.87466L15.7942 5.51288C16.8855 6.77098 17.6369 8.27849 17.8937 9.91805C18.8037 15.706 13.74 20.6944 7.77005 19.9205C4.10349 19.4436 1.05243 16.7294 0.229248 13.2339C-0.412683 10.5123 0.308545 7.6256 2.20413 5.53489L1.54332 4.87466C1.49423 4.86733 1.10152 5.30014 1.026 5.35516L0.191487 4.54822L0.180159 4.48586L2.04553 2.68125L2.9027 3.48819C2.91403 3.51753 2.89892 3.53587 2.88004 3.55788C2.81963 3.64591 2.43069 3.94668 2.43069 4.01637L3.0915 4.65826C4.5755 3.42584 6.41821 2.67391 8.37799 2.53086V2.02469H6.93554V0.0366792C6.93554 0.0366792 6.96952 0 6.9733 0H11.0288C11.0288 0 11.0665 0.0330113 11.0665 0.0366792V2.02836ZM8.67252 3.72661C2.90648 3.97969 -0.643023 10.1051 2.26832 15.0091C5.17967 19.9131 12.5656 20.0819 15.6394 15.1778C18.7131 10.2738 14.82 3.45518 8.6763 3.72661H8.67252Z"

                                                            fill="#333333" />

                                                        <path

                                                            d="M9.00108 5.02503V11.2568H15.4166C15.4468 14.1545 13.2945 16.744 10.3869 17.3529C5.82164 18.3066 1.78502 14.4442 2.71394 9.99506C3.31433 7.12308 5.97645 5.02136 8.9973 5.02136L9.00108 5.02503Z"

                                                            fill="#333333" />

                                                    </svg>





                                                </i>

                                                <em>Book Hourly</em>

                                            </a>

                                        </li>

                                        <li>

                                            <a data-rel=".tab_cityTour" href="javascript:void(0)"

                                                class="rideTabBtn">

                                                <i>

                                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none"

                                                        xmlns="http://www.w3.org/2000/svg">

                                                        <path

                                                            d="M20.797 13.6939L21.1246 16.1408L19.1145 16.3207L17.4258 19.792C15.9439 19.7979 14.4912 19.4513 13.0586 19.1187L9.82354 15.3965C8.9268 15.3448 8.03502 15.4421 7.1377 15.4103L9.07076 12.3214C11.1034 12.3731 13.1182 12.0391 15.0078 11.3047C16.7615 12.4578 18.7261 13.2994 20.7973 13.6939H20.797Z"

                                                            fill="#333333" />

                                                        <path

                                                            d="M22.0286 6.2712L23.6025 17.8123C23.5887 17.8652 23.4118 17.9913 23.3572 18.0369C21.7485 19.3725 20.0158 20.568 18.4074 21.9056C16.8435 22.1585 15.2342 21.854 13.7021 21.533C10.1338 20.7861 6.72642 19.6543 3.00601 20.024C2.07189 20.1168 1.16143 20.3554 0.246582 20.5493L3.28283 6.54744L3.32955 6.47736C3.755 6.24959 4.18191 6.02125 4.6386 5.86006L5.09296 6.60379C5.08215 6.65548 4.27506 6.95186 4.13752 7.05173C4.10686 7.07392 4.0762 7.08531 4.06861 7.12882L1.4143 19.381C2.11161 19.2507 2.82001 19.1322 3.52987 19.0878C6.99769 18.8717 10.2296 19.8762 13.561 20.5931C14.9297 20.8877 16.3292 21.1748 17.7373 21.0895C18.4495 19.8298 19.0472 18.4965 19.6785 17.1907C19.7325 17.1381 20.0724 17.115 20.1755 17.1036C20.975 17.0146 21.7833 16.9699 22.5845 16.8989L21.2726 7.30489C21.2241 7.27015 20.2508 7.40301 20.0891 7.41031C17.424 7.5312 14.8097 6.87185 12.2053 6.44407L12.1317 6.40173L12.5735 5.63259L12.612 5.625C14.2017 5.86765 15.7724 6.23908 17.3726 6.41574C18.9427 6.58919 20.4745 6.58043 22.0286 6.27091V6.2712Z"

                                                            fill="#333333" />

                                                        <path

                                                            d="M8.44501 0.00128616C10.6777 -0.0571145 12.4022 1.88179 12.1269 4.09167C11.9718 5.33501 11.1306 6.35703 10.3351 7.26399C9.76369 7.91545 9.14727 8.53041 8.55363 9.16113C8.01576 8.60107 7.46446 8.04743 6.94732 7.46839C6.0316 6.44317 5.0239 5.27924 4.94623 3.83383C4.8376 1.81083 6.40945 0.0547227 8.44501 0.00128616ZM8.3577 1.4613C6.49034 1.66366 6.48012 4.52763 8.41113 4.71947C10.7658 4.95366 10.8082 1.19558 8.3577 1.4613Z"

                                                            fill="#333333" />

                                                        <path

                                                            d="M14.1161 10.6233C14.1418 10.658 14.0939 10.6884 14.0661 10.7041C13.9505 10.7695 13.5744 10.8627 13.4217 10.9065C10.5761 11.7235 7.43884 11.5974 4.68408 10.5184L5.21786 8.07553C5.22604 8.02297 5.24531 7.99932 5.28911 7.97158C5.36883 7.92135 5.81267 7.76162 5.90991 7.74381C5.9505 7.73651 5.987 7.71899 6.02671 7.74556L8.55342 10.3897L11.1814 7.64453C11.8288 8.48696 12.534 9.28617 13.3274 9.99516C13.5589 10.2022 13.8124 10.3867 14.0442 10.5938C14.0699 10.6165 14.1137 10.6198 14.1161 10.623V10.6233Z"

                                                            fill="#333333" />

                                                        <path

                                                            d="M8.36375 12.257C8.38624 12.2759 8.1976 12.563 8.17161 12.6047C7.58381 13.5505 6.97323 14.4835 6.37842 15.4252L3.6333 15.469L4.4804 11.4102C5.7328 11.8467 7.03397 12.1644 8.36375 12.257Z"

                                                            fill="#333333" />

                                                        <path

                                                            d="M11.5758 18.7698C10.6954 18.5669 9.81386 18.3578 8.92413 18.1952C7.02932 17.8491 5.07991 17.6357 3.1521 17.8074L3.10889 17.7642L3.44732 16.35C3.93292 16.3357 4.4191 16.3552 4.90471 16.3474C6.22456 16.3257 7.55376 16.2887 8.87361 16.2574C9.10429 16.2519 9.41002 16.1943 9.54668 16.4043L11.5758 18.7695V18.7698Z"

                                                            fill="#333333" />

                                                        <path

                                                            d="M20.1273 8.72656L20.7154 13.0441C19.3076 12.7518 17.9221 12.2484 16.6559 11.5704C16.5394 11.5079 15.7464 11.0635 15.7224 11.0147C15.6985 10.9659 15.7574 10.9689 15.7811 10.9583C17.0224 10.4012 18.1574 9.63674 19.1984 8.76803L20.1273 8.72685V8.72656Z"

                                                            fill="#333333" />

                                                        <path

                                                            d="M17.8537 8.66693C17.8718 8.73467 17.838 8.71569 17.8166 8.7338C17.7509 8.79015 17.6709 8.84388 17.6 8.89498C16.7473 9.5114 15.805 10.0055 14.8365 10.4125C13.806 9.65302 12.8619 8.77088 12.0718 7.76172C13.992 8.09577 15.904 8.5256 17.8531 8.66693H17.8537Z"

                                                            fill="#333333" />

                                                    </svg>



                                                </i>

                                                <em>City Tour</em>

                                            </a>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                            <div class="ride_tabs_content">

                                <div class="ride_tab_show tab_rides" style="display: block;">

                                    @include('front.includes.ride-booking-form')

                                </div>



                                <!-- by hours section -->



                                <div class="ride_tab_show tab_byHours">

                                    @include('front.includes.hourly-booking-form')

                                </div>



                                <!-- city Tour section -->



                                <div class="ride_tab_show tab_cityTour">

                                        @include('front.includes.city-tour-form')

                                </div>

                            </div>



                           

                            





                        </div>

                    </div>

                </div>

            </div>

        </div>

            <div class="gradiantParent">

                <div class="gradiantChild">

                    <div class="our_services">

                        <div class="autoContent ">

                            <div class="our_services_inner">

                                <div class="headlines animatedParent animateOnce">

                                    <span class="headlines_sub animated fadeInUpShort slow">Go Anywhere with C2C</span>

                                    <h2 class="animated fadeInUpShort slow delay-250">Explore Our Services</h2>

                                </div>



                                <div class="os_content">

                                    <div class="os_content_left animatedParent animateOnce">

                                        <ul>

                                            <li class="animated fadeInUpShort slow">

                                                <a href="{{ route('rides.page') }}" class="os_info">

                                                    <div class="os_info_img">

                                                        <img src="{{ asset('front/images/ourService_img1.png') }}" alt="#">

                                                    </div>

                                                    <div class="os_info_data">

                                                        <h4>Rides</h4>

                                                        <p>Comfortable and reliable rides designed around you.</p>

                                                        <span class="view_link">Book Now</span>

                                                    </div>

                                                </a>

                                            </li>

                                            <li class="animated fadeInUpShort slow delay-250">

                                                <a href="{{ route('airport.rides.page') }}" class="os_info">

                                                    <div class="os_info_img">

                                                        <img src="{{ asset('front/images/ourService_img2.png') }}" alt="#">

                                                    </div>

                                                    <div class="os_info_data">

                                                        <h4>Airport Rides</h4>

                                                        <p>Seamless, punctual and stress-free airport transfer.</p>

                                                        <span class="view_link">Book Now</span>

                                                    </div>

                                                </a>

                                            </li>

                                            <li class="animated fadeInUpShort slow delay-500">

                                                <a href="{{ route('city.tour.page') }}" class="os_info">

                                                    <div class="os_info_img">

                                                        <img src="{{ asset('front/images/ourService_img3.png') }}" alt="#">

                                                    </div>

                                                    <div class="os_info_data">

                                                        <h4>City Tour</h4>

                                                        <p>Discover the best of Britain with effortless elegance.</p>

                                                        <span class="view_link">Book Now</span>

                                                    </div>

                                                </a>

                                            </li>

                                            <li class="animated fadeInUpShort slow delay-750">

                                                <a href="{{ route('business.ride') }}" class="os_info">

                                                    <div class="os_info_img">

                                                        <img src="{{ asset('front/images/ourService_img4.png') }}" alt="#">

                                                    </div>

                                                    <div class="os_info_data">

                                                        <h4>Rides for Business</h4>

                                                        <p>Blend of luxury and efficiency for corporate travel.</p>

                                                        <span class="view_link">Book Now</span>

                                                    </div>

                                                </a>

                                            </li>

                                            <li class="animated fadeInUpShort slow delay-250">

                                                <a href="{{ url('car/rentals') }}" class="os_info">

                                                    <div class="os_info_img">

                                                        <img src="{{ asset('front/images/ourService_img5.png') }}" alt="#">

                                                    </div>

                                                    <div class="os_info_data">

                                                        <h4>Rides Per Hour</h4>

                                                        <p>Explore on your own schedule with smooth hourly rides.</p>

                                                        <span class="view_link">Book Now</span>

                                                    </div>

                                                </a>

                                            </li>

                                            <!-- <li class="animated fadeInUpShort slow delay-500">

                                                <a href="{{ route('full.day.luxury.chauffeur') }}" class="os_info">

                                                    <div class="os_info_img">

                                                        <img src="{{ asset('front/images/ourService_img6.png') }}" alt="#">

                                                    </div>

                                                    <div class="os_info_data">

                                                        <h4>Full Day Chauffeur</h4>

                                                        <p>Dedicated drivers for your entire day, perfect for meetings, events, or exploration.</p>

                                                        <span class="view_link">Book Now</span>

                                                    </div>

                                                </a>

                                            </li>

                                            <li class="animated fadeInUpShort slow delay-750">

                                                <a href="{{ url('courier/service') }}" class="os_info">

                                                    <div class="os_info_img">

                                                        <img src="{{ asset('front/images/ourService_img7.png') }}" alt="#">

                                                    </div>

                                                    <div class="os_info_data">

                                                        <h4>Courier Service</h4>

                                                        <p>Swift and secure delivery with real-time tracking and careful handling.</p>

                                                        <span class="view_link">Book Now</span>

                                                    </div>

                                                </a>

                                            </li>

                                            <li class="animated fadeInUpShort slow delay-1000">

                                                <a href="{{ route('premium.desert.safari') }}" class="os_info">

                                                    <div class="os_info_img">

                                                        <img src="{{ asset('front/images/ourService_img8.png') }}" alt="#">

                                                    </div>

                                                    <div class="os_info_data">

                                                        <h4>Desert Safari</h4>

                                                        <p>Unforgettable adventures in the majestic Arabian desert .</p>

                                                        <span class="view_link">Book Now</span>

                                                    </div>

                                                </a>

                                            </li> -->

                                        </ul>

                                    </div>

                                    <div class="os_content_right animatedParent animateOnce">

                                        <div class="os_content_box greenGradiantParent animated fadeInUpShort slow">

                                            <div class="greenGradiantChild">

                                                <div class="os_cRight_img">

                                                    <div class="os_cRight_img_slider">

                                                        <div class="os_cRight_img_slider_li">

                                                            <div class="os_cRight_img_slide">

                                                                <img src="{{ asset('front/images/reliability_img1.png') }}" alt="#">

                                                            </div>

                                                        </div>

                                                        <div class="os_cRight_img_slider_li">

                                                            <div class="os_cRight_img_slide">

                                                                <img src="{{ asset('front/images/reliability_img2.png') }}" alt="#">

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- car rentals sections show-->



                    <div class="carRentals_main">

                        <div class="autoContent">

                            <div class="carRentals_inner">

                                <div class="carRentals_left animatedParent animateOnce">

                                    <div class="carRentals_details animated fadeInUpShort slow">

                                        <!-- <div class="carRentals_show carRentals_show1 active" style="display: block;">

                                            <div class="carRentals_img">

                                                <img src="{{ asset('front/images/carRentalsImg1.png') }}" alt="">

                                            </div>

                                            <div class="cr_typesBox">

                                                <ul>

                                                    <li>

                                                        <a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/comfortThumb1.png') }}" alt="maxima"></i>

                                                            <span>Comfort</span>

                                                        </a>

                                                    </li>

                                                    <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/businessThumb1.png') }}" alt="sonata"></i>

                                                            <span>Business</span>

                                                        </a>

                                                    </li>

                                                    <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/suvThumb1.png') }}"

                                                                    alt="nissan altima"></i>

                                                            <span>SUV</span>

                                                        </a>

                                                    </li>

                                                    <li>

                                                        <a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/vipThumb1.png') }}" alt="maxima"></i>

                                                            <span>VIP</span>

                                                        </a>

                                                    </li>

                                                    <li>

                                                        <a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/vanThumb2.png') }}" alt="maxima"></i>

                                                            <span>Mini Van/Bus</span>

                                                        </a>

                                                    </li>



 

                                                </ul>

                                            </div>

                                        </div> -->

                                        <div class="carRentals_show carRentals_show2 active" style="display: block;">

                                            <div class="carRentals_img">

                                                <img src="{{ asset('front/images/carRentalsImg2.png') }}" alt="">

                                            </div>

                                            <div class="cr_typesBox">

                                                <ul>

                                                    <li>

                                                        <a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/comfortThumb1.png') }}" alt="maxima"></i>

                                                            <span>maxima</span>

                                                        </a>

                                                    </li>

                                                    <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/comfortThumb2.png') }}" alt="sonata"></i>

                                                            <span>sonata</span>

                                                        </a>

                                                    </li>

                                                    <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/comfortThumb3.png') }}"

                                                                    alt="nissan altima"></i>

                                                            <span>nissan altima</span>

                                                        </a>

                                                    </li>

                                                </ul>

                                            </div>

                                        </div>

                                        <div class="carRentals_show carRentals_show3">

                                            <div class="carRentals_img">

                                                <img src="{{ asset('front/images/carRentalsImg3.png') }}" alt="">

                                            </div>

                                            <div class="cr_typesBox">

                                                <ul>

                                                    <li>

                                                        <a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/businessThumb1.png') }}" alt="maxima"></i>

                                                            <span>BMW</span>

                                                        </a>

                                                    </li>

                                                    <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/businessThumb2.png') }}" alt="sonata"></i>

                                                            <span>Byd</span>

                                                        </a>

                                                    </li>

                                                   <!-- <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/businessThumb3.png') }}"

                                                                    alt="nissan altima"></i>

                                                            <span>genesis</span>

                                                        </a>

                                                    </li> -->





                                                     <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/1855039164.png') }}"

                                                                    alt="nissan altima"></i>

                                                            <span>Lexus</span>

                                                        </a>

                                                    </li>



                                                </ul>

                                            </div>

                                        </div>

                                        <div class="carRentals_show carRentals_show4">

                                            <div class="carRentals_img">

                                                <img src="{{ asset('front/images/carRentalsImg4.png') }}" alt="">

                                            </div>

                                            <div class="cr_typesBox">

                                                <ul>

                                                    <li>

                                                        <a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/suvThumb1.png') }}" alt="maxima"></i>

                                                            <span>highlander</span>

                                                        </a>

                                                    </li>

                                                    <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/suvThumb2.png') }}" alt="sonata"></i>

                                                            <span>citron</span>

                                                        </a>

                                                    </li>

                                                    <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/2121285796.png') }}" alt="Toyota Outlandor"></i>

                                                            <span>Outlander</span>

                                                        </a>

                                                    </li>

                                                </ul>

                                            </div>

                                        </div>

                                        <div class="carRentals_show carRentals_show5">

                                            <div class="carRentals_img">

                                                <img src="{{ asset('front/images/carRentalsImg5.png') }}" alt="">

                                            </div>

                                            <div class="cr_typesBox">

                                                <ul>

                                                    <li>

                                                        <a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/vipThumb1.png') }}" alt="maxima"></i>

                                                            <span>Sclass</span>

                                                        </a>

                                                    </li>

                                                    <!--<li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/vipThumb2.png') }}" alt="sonata"></i>

                                                            <span>BMW</span>

                                                        </a>

                                                    </li>-->

                                                    <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/vipThumb3.png') }}" alt="nissan altima"></i>

                                                            <span>BMW 7 series</span>

                                                        </a>

                                                    </li>

                                                </ul>

                                            </div>

                                        </div>

                                        <div class="carRentals_show carRentals_show6">

                                            <div class="carRentals_img">

                                                <img src="{{ asset('front/images/carRentalsImg6.png') }}" alt="">

                                            </div>

                                            <div class="cr_typesBox">

                                                <ul>

                                                    <li>

                                                        <a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/vanThumb1.png') }}" alt="maxima"></i>

                                                            <span>Mercedes-Benz Sprinter</span>

                                                        </a>

                                                    </li>

                                                    <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/vanThumb2.png') }}" alt="sonata"></i>

                                                            <span>Mini Bus</span>

                                                        </a>

                                                    </li>

                                                </ul>

                                            </div>

                                        </div>





                                        <div class="carRentals_show carRentals_show8">

                                            <div class="carRentals_img">

                                                <img src="{{ asset('front/images/carRentalsImg8.png') }}" alt="">

                                            </div>

                                            <div class="cr_typesBox">

                                                <ul>

                                                    <li>

                                                        <a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/746991430.png') }}" alt="Mercedes Viano"></i>

                                                            <span>Mercedes Viano</span>

                                                        </a>

                                                    </li>

                                                    <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/1957851038.png') }}" alt="GMC Yukon"></i>

                                                            <span>GMC Yukon</span>

                                                        </a>

                                                    </li>



                                                     <li>

                                                        <a a href="javascript:void(0)" class="cr_typesBox_cell">

                                                            <i><img src="{{ asset('front/images/CADILLAC Escalade.png') }}" alt="GMC Yukon"></i>

                                                            <span>Cadillac</span>

                                                        </a>

                                                    </li>

                                                   

                                                </ul>

                                            </div>

                                        </div>





                                    </div>

                                </div>

                                <div class="carRentals_right">

                                    <div class="carRentals_details">

                                        <div class="headlines text_left animatedParent animateOnce">

                                            <span class="headlines_sub animated fadeInUpShort slow">Discover your perfect ride with C2C!</span>

                                            <h2 class="padb-15 animated fadeInUpShort slow delay-250">Explore Our Fleet</h2>

                                           

                                           <p class="animated fadeInUpShort slow delay-500">

                                        C2C Ride brings you a wide range of cars to suit your mood, plan, or purpose. Whether you need a sleek sedan, a comfortable SUV, or a luxurious ride, we’ve got you covered. Our clean and well-maintained cars are ready to take you on a smooth, stress-free journey.

Book now, we’ll take care of the rest.    

                                        </p>

                                           

                                            <!-- <p class="animated fadeInUpShort slow delay-500">Whether you are traveling for business purposes or enjoying adventures, C2C provides a car of your choice. Our luxury car rental offers executives fleets to make your journey comfortable. From comfort to  luxury sedans to elegant SUVs, we deliver a range of premium cars to meet your requirements. <br> Book now and enjoy quick car rental service. </p>

                                              -->

                                            <!-- <p class="animated fadeInUpShort slow delay-750">Whether it's for business

                                                or pleasure, from daily commutes to special events, we offer cheapest

                                                rent-a-car service in Dubai without deposit. You can use our car-rent

                                                service without deposit, giving you the freedom to enjoy different

                                                premium vehicles for both short trips and long journeys. If you prefer,

                                                we also have options for renting a car with a driver in Dubai. Book now

                                                and drive your dream car today!</p> -->

                                        </div>



                                        <div class="carRentals_thubmsMain animatedParent animateOnce">

                                            <ul>

                                                <!-- <li class="animated fadeInUpShort slow">

                                                    <a href="javascript:void(0)" data-rel=".carRentals_show1"

                                                        class="carRentals_thumb active">

                                                        <strong>All Cars</strong>

                                                        

                                                        <figure>

                                                            <img src="{{ asset('front/images/carRentalsImgThumb1.png') }}" alt="#">

                                                        </figure>

                                                        <span>

                                                            <em>View Vehicles</em>

                                                        </span>

                                                    </a>

                                                </li> -->

                                                <li class="animated fadeInUpShort ">

                                                    <a href="javascript:void(0)" data-rel=".carRentals_show2"

                                                        class="carRentals_thumb">

                                                        <strong>Comfort</strong>

                                                        <!-- <small>60+ Cars</small> -->

                                                        <figure>

                                                            <img src="{{ asset('front/images/carRentalsImgThumb2.png') }}" alt="#">

                                                        </figure>

                                                        <span>

                                                            <em>View Vehicles</em>

                                                        </span>

                                                    </a>

                                                </li>

                                                <li class="animated fadeInUpShort slow delay-500">

                                                    <a href="javascript:void(0)" data-rel=".carRentals_show3"

                                                        class="carRentals_thumb">

                                                        <strong>Business</strong>

                                                        <!-- <small>5+ Cars</small> -->

                                                        <figure>

                                                            <img src="{{ asset('front/images/carRentalsImgThumb3.png') }}" alt="#">

                                                        </figure>

                                                        <span>

                                                            <em>View Vehicles</em>

                                                        </span>

                                                    </a>

                                                </li>

                                                <li class="animated fadeInUpShort slow delay-750">

                                                    <a href="javascript:void(0)" data-rel=".carRentals_show4"

                                                        class="carRentals_thumb">

                                                        <strong>SUV</strong>

                                                        <!-- <small>25+ Cars</small> -->

                                                        <figure>

                                                            <img src="{{ asset('front/images/carRentalsImgThumb4.png') }}" alt="#">

                                                        </figure>

                                                        <span>

                                                            <em>View Vehicles</em>

                                                        </span>

                                                    </a>

                                                </li>





                                                <li class="animated fadeInUpShort slow delay-750">

                                                    <a href="javascript:void(0)" data-rel=".carRentals_show8"

                                                        class="carRentals_thumb">

                                                        <strong>EX-SUV</strong>

                                                        <!-- <small>25+ Cars</small> -->

                                                        <figure>

                                                            <img src="{{ asset('front/images/carRentalsImgThumb8.png') }}" alt="#">

                                                        </figure>

                                                        <span>

                                                            <em>View Vehicles</em>

                                                        </span>

                                                    </a>

                                                </li>





                                                <li class="animated fadeInUpShort slow delay-1000">

                                                    <a href="javascript:void(0)" data-rel=".carRentals_show5"

                                                        class="carRentals_thumb">

                                                        <strong>VIP</strong>

                                                        <!-- <small>55+ Cars</small> -->

                                                        <figure>

                                                            <img src="{{ asset('front/images/carRentalsImgThumb5.png') }}" alt="#">

                                                        </figure>

                                                        <span>

                                                            <em>View Vehicles</em>

                                                        </span>

                                                    </a>

                                                </li>

                                                <li class="animated fadeInUpShort slow delay-1250">

                                                    <a href="javascript:void(0)" data-rel=".carRentals_show6"

                                                        class="carRentals_thumb">

                                                        <strong>Mini Van/Bus</strong>

                                                        <!-- <small>10+ Cars</small> -->

                                                        <figure>

                                                            <img src="{{ asset('front/images/carRentalsImgThumb6.png') }}" alt="#">

                                                        </figure>

                                                        <span>

                                                            <em>View Vehicles</em>

                                                        </span>

                                                    </a>

                                                </li>

                                            </ul>

                                        </div>

                                        <div class="carRentals_cta_btn">

                                            <a href="{{ route('front.index') }}"

                                                class="all_btn  btn_large flexible icon_btn justify_content_between uppercase">

                                                <span class="mr_auto">Book Now</span>

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- car rentals sections end -->



                    <!-- Go anywhere with Ride -->

                    <div class="iconicSec">

                        <div class="autoContent">

                            <div class="iconicSecInner animatedParent animateOnce">

                                <div class="headlines headlines_white animatedParent animateOnce">

                                    <span class="headlines_sub animated fadeInUpShort slow">C2C - Your Premium Choice for Unmatched Travel Comfort.</span>

                                    <h2 class="fadeInUpShort animated slow delay-250">Discover All the Iconic Destinations in UK

                                    </h2>

                                    <p class="fadeInUpShort animated slow delay-500">Join us and Experience the City Like Never Before - Premium Rides and Expert Tours with C2C!</p>

                                </div>



                                <div class="iconic_slider_main animated fadeInUpShort slow delay-500">

                                    <div class="iconic_slider ">

                                        <div class="iconic_slide_run">

                                            <a href="{{ route('abudhabi.tour.page') }}" class="iconic_box"> 

                                                <div class="iconicImg">

                                                    <img src="{{ asset('front/images/London.jpg') }}" alt="#">

                                                </div>

                                                <div class="iconic_pos">

                                                    <div class="iconic_pos_content">

                                                        <h4>London</h4>

                                                        <p>London’s royal landmarks and famous museums are best seen up close. Whether you are here for work, shopping or sightseeing, discover UK’s capital in comfort and style with our professional chauffeurs.</p>

                                                        <div class="iconic_show">

                                                            <ul>

                                                                <li><span>Tower of London</span></li>

                                                                <li><span>Tower Bridge </span>

                                                                </li>

                                                                <li><span>British Museum</span>

                                                                </li>

                                                                <li><span>Oxford Street</span></li>

                                                                <li><span>London Eye</span></li>

                                                                <li><span>Buckingham Palace</span></li>

                                                                <li><span>Westminster Abbey</span></li> 

                                                                <li><span>St. Paul's Cathedral</span></li> 

                                                            </ul>

                                                        </div>

                                                    </div>

                                                    <div class="iconic_ratingRow">

                                                        <span>Starting: £ 699</span>

                                                        <small>

                                                            4.6 (500)

                                                        </small>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>

                                        <div class="iconic_slide_run">

                                            <a href="{{ route('dubai.tour.page') }}" class="iconic_box">

                                                <div class="iconicImg">

                                                    <img src="{{ asset('front/images/birmingham.jpg') }}" alt="#">

                                                </div>

                                                <div class="iconic_pos">

                                                    <div class="iconic_pos_content">

                                                        <h4>Birmingham </h4>

                                                        <p>Discover Birmingham's rich history, cultural treasures, and modern marvels with the comfort and elegance of a first-class chauffeur service by your side.</p>

                                                        <div class="iconic_show">

                                                            <ul>

                                                                <li><span>Victoria Square</span></li>

                                                                <li><span>Library of Birmingham</span>

                                                                </li>

                                                                <li><span>Birmingham Museum and Art Gallery</span>

                                                                </li>

                                                                <li><span>Cadbury World</span></li>

                                                                <li><span>Bullring & Grand Central</span></li>

                                                                <li><span>Ikon Gallery</span>

                                                                </li>

                                                                <li><span>Birmingham Town Hall</span></li> 

                                                            </ul>

                                                        </div>

                                                    </div>

                                                    <div class="iconic_ratingRow">

                                                        <span>Starting: £ 699</span>

                                                        <small>

                                                            4.6 (500)

                                                        </small>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>

                                        <div class="iconic_slide_run">

                                            <a href="{{ route('sharjah.tour.page') }}" class="iconic_box">

                                                <div class="iconicImg">

                                                    <img src="{{ asset('front/images/Manchester.jpg') }}" alt="#">

                                                </div>

                                                <div class="iconic_pos">

                                                    <div class="iconic_pos_content">

                                                        <h4>Manchester</h4>

                                                        <p>Explore Manchester’s industrial heritage, famous stadiums and vibrant spirit all with a touch of comfortable, reliable and professional chauffeur service.</p>

                                                        <div class="iconic_show">

                                                            <ul>

                                                                <li><span>Manchester Cathedral</span></li>

                                                                <li><span>The John Rylands Library</span>

                                                                </li>

                                                                <li><span>Manchester Art Gallery</span>

                                                                </li>

                                                                <li><span>Manchester Museum</span></li>

                                                                <li><span>Etihad Stadium </span></li>

                                                                <li><span>Old Trafford</span></li>

                                                                <li><span>Science and Industry Museum</span></li>

                                                                

                                                            </ul>

                                                        </div>

                                                    </div>

                                                    <div class="iconic_ratingRow">

                                                        <span>Starting: £ 699</span>

                                                        <small>

                                                            4.6 (500)

                                                        </small>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>

                                        <div class="iconic_slide_run">

                                            <a href="{{ route('ajam.tour.page') }}" class="iconic_box">

                                                <div class="iconicImg">

                                                    <img src="{{ asset('front/images/Leeds.jpg') }}" alt="#">

                                                </div>

                                                <div class="iconic_pos">

                                                    <div class="iconic_pos_content">

                                                        <h4>Leeds</h4>

                                                        <p>From medieval abbeys to stunning architecture and vibrant markets, explore Leeds in comfort and style with our five star service designed for ease and unforgettable experience.</p>

                                                        <div class="iconic_show">

                                                            <ul>

                                                                <li><span>Royal Armouries Museum </span></li>

                                                                <li><span>Leeds Corn Exchange </span>

                                                                </li>

                                                                <li><span>Harewood House </span>

                                                                </li>

                                                                <li><span>Leeds Town Hall</span></li>

                                                                <li><span>Thackray Medical Museum</span></li>

                                                                <li><span>Temple Newsam</span></li>

                                                                <li><span>Roundhay Park</span></li>

                                                                 

                                                            </ul>

                                                        </div>

                                                    </div>

                                                    <div class="iconic_ratingRow">

                                                        <span>Starting: £ 699</span>

                                                        <small>

                                                            4.6 (500)

                                                        </small>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>

                                        <div class="iconic_slide_run">

                                            <a href="{{ route('umm.al.quwain.tour.page') }}" class="iconic_box">

                                                <div class="iconicImg">

                                                    <img src="{{ asset('front/images/Liverpool.jpg') }}" alt="#">

                                                </div>

                                                <div class="iconic_pos">

                                                    <div class="iconic_pos_content">

                                                        <h4>Liverpool</h4>

                                                        <p>Liverpool invites you to discover its beauty, from the soul of The Beatles to the beauty of the Mersey- Enjoy every moment with our rides to make your journey more comfortable.</p>

                                                        <div class="iconic_show">

                                                            <ul>

                                                                <li><span>Anfield</span></li>

                                                                <li><span>Royal Albert Dock</span>

                                                                </li>

                                                                <li><span>Tate Liverpool</span>

                                                                </li>

                                                                <li><span>Sefton Park</span></li>

                                                                <li><span>Museum of Liverpool</span></li>

                                                                <li><span>The Beatles Story Museum </span></li>

                                                                <li><span>Crosby Beach </span></li>

                                                                 

                                                            </ul>

                                                        </div>

                                                    </div>

                                                    <div class="iconic_ratingRow">

                                                        <span>Starting: £ 699</span>

                                                        <small>

                                                            4.6 (500)

                                                        </small>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>

                                        <div class="iconic_slide_run">

                                            <a href="{{ route('ras.al.khaimah.tour.page') }}" class="iconic_box">

                                                <div class="iconicImg">

                                                    <img src="{{ asset('front/images/Edinburgh.jpg') }}" alt="#">

                                                </div>

                                                <div class="iconic_pos">

                                                    <div class="iconic_pos_content">

                                                        <h4>Edinburgh</h4>

                                                        <p>Taken in the beauty of Scottish capital-a blend of old and new. Explore Edinburgh’s natural beauty from hilltop views to hidden cafes, as we handle the road with care, comfort and style. </p>

                                                        <div class="iconic_show">

                                                            <ul>

                                                                <li><span>Edinburgh Castle</span></li>

                                                                <li><span>Royal Botanic Garden Edinburght</span>

                                                                </li>

                                                                <li><span>Palace of Holyroodhouse</span>

                                                                </li>

                                                                <li><span>Royal Mile Museums</span></li>

                                                                <li><span>National Museum of Scotland</span></li>

                                                                <li><span>Camera Obscura & World of Illusions</span></li>

                                                                <li><span>Calton Hill</span></li>

                                                                <li><span>Edinburg Zoo</span></li>

                                                            </ul>

                                                        </div>

                                                    </div>

                                                    <div class="iconic_ratingRow">

                                                        <span>Starting: £ 699</span>

                                                        <small>

                                                            4.6 (500)

                                                        </small>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>

                                        <div class="iconic_slide_run">

                                            <a href="{{ route('fujairah.tour.page') }}" class="iconic_box">

                                                <div class="iconicImg">

                                                    <img src="{{ asset('front/images/Belfast.jpg') }}" alt="#">

                                                </div>

                                                <div class="iconic_pos">

                                                    <div class="iconic_pos_content">

                                                        <h4>Belfast </h4>

                                                        <p>Belfast is a place of Gothic beauty, beautiful hills, and historic docks. Explore the city’s rhythm and undiscovered gems as we handle the transportation in a stress-free manner.</p>

                                                        <div class="iconic_show">

                                                            <ul>

                                                                <li><span>Titanic Belfast</span></li>

                                                                <li><span>Ulster Museum</span>

                                                                </li>

                                                                <li><span>Crumlin Road Gaol Visitor Attraction and Conference Centre</span>

                                                                </li>

                                                                <li><span>Belfast City Hall</span></li>

                                                                <li><span>Belfast Castle</span></li>

                                                                <li><span>Botanic Gardens</span></li>

                                                                <li><span>Grand Opera House</span></li>

                                                                <li><span>St. George's Market</span></li>

                                                            </ul>

                                                        </div>

                                                    </div>

                                                    <div class="iconic_ratingRow">

                                                        <span>Starting: £ 699</span>

                                                        <small>

                                                            4.6 (500)

                                                        </small>

                                                    </div>

                                                </div>

                                            </a>

                                        </div>

                                    </div>

                                </div>

                                <div class="iconic_btnRow animatedParent animateOnce">

                                    <a href="{{ route('city.tour.page') }}"

                                        class="all_btn outlined_white_btn btn_large uppercase iconic_viewAll_btn animated fadeInUpShort slow">

                                        <span class="mr_auto">View All</span>

                                     </a>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!--  -->

                    <div class="ride_c2c">

                        <div class="autoContent">

                            <div class="ride_c2c_inner">

                                <div class="ride_c2c_left">

                                    <div class="r_c2c_left_heading animatedParent animateOnce">

                                        <h2 class="animated fadeInUpShort slow">Why <span>C2c?</span></h2>

                                        <p class="animated fadeInUpShort slow delay-250">Traveling with C2C isn't just about reaching your destination—it's about enjoying a journey with premium touch. We prioritize the details that transform a simple ride into a seamless, comfortable, and truly memorable experience. Choose C2C for stress-free, first-class travel, every time.</p>

                                    </div>



                                    <div class="r_c2c_left_content animatedParent animateOnce">

                                        <ul>

                                            

                                            <li class="animated fadeInUpShort slow delay-500">

                                                <div class="r_c2c_left_info">

                                                    <h4>Transparent Pricing</h4>

                                                    <p> No hidden or extra charges, it's what you see that you pay. </p>

                                                </div>

                                            </li>

                                            <li class="animated fadeInUpShort slow delay-500">

                                                <div class="r_c2c_left_info">

                                                    <h4>Reliability</h4>

                                                    <p>We ensure punctual, dependable, and safe transportation</p>

                                                </div>

                                            </li>

                                            <li class="animated fadeInUpShort slow delay-500">

                                                <div class="r_c2c_left_info">

                                                    <h4>Unmatched Comfort</h4>

                                                    <p>Travel in luxury vehicles designed for a smooth and relaxing experience.</p>

                                                </div>

                                            </li>

                                            <li class="animated fadeInUpShort slow delay-500">

                                                <div class="r_c2c_left_info">

                                                    <h4>Complimentary Perks</h4>

                                                    <p>Enjoy bottled water and refreshments to enhance your journey. </p>

                                                </div>

                                            </li>

                                        </ul>

                                    </div>

                                </div>

                                <div class="ride_c2c_right animatedParent animateOnce">

                                    <div class="rideC2c_facilities">

                                        <span class="first_facility animated fadeInUpShort delay-500 tootip_info">

                                            <i>

                                                <svg width="37" height="31" viewBox="0 0 37 31" fill="none"

                                                    xmlns="http://www.w3.org/2000/svg">

                                                    <path

                                                        d="M33.9623 19.7153L25.3864 22.4602L27.2487 13.6883L29.5516 15.6271C30.4573 14.541 31.3237 13.4163 32.0716 12.2137C33.4761 9.9549 34.8229 7.04287 34.1343 4.32686C32.5563 -1.90055 23.6222 2.8135 20.2931 4.84585C19.6065 5.26487 18.9576 5.73191 18.2852 6.17053C18.2436 6.19798 18.1764 6.29109 18.1328 6.21415C19.6511 4.93456 21.2654 3.74367 22.9694 2.71941C26.4136 0.650304 32.151 -1.97602 35.0508 2.28226C36.9376 5.05267 36.3328 8.65375 35.162 11.5795C34.3004 13.7319 33.0434 15.7437 31.7158 17.6329L33.9618 19.7148L33.9623 19.7153Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M7.40075 20.0594C7.49191 20.0481 7.43947 20.1589 7.42771 20.2084C7.28951 20.7857 7.05378 21.3556 6.92538 21.9609C6.37061 24.5779 6.31866 28.1403 9.45859 29.0023C13.3121 30.0604 17.6022 26.9906 20.3878 24.6416C21.1832 23.9707 21.9315 23.2444 22.7147 22.5598L24.9916 25.3267C22.4368 27.1743 19.6831 29.0307 16.7 30.1182C14.0531 31.0832 10.8122 31.5154 8.26721 30.0462C4.69063 27.9815 5.90798 23.091 7.40026 20.0589L7.40075 20.0594Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M13.526 8.98438V14.2527C13.526 14.2581 13.5941 14.3262 13.5995 14.3262H14.6532C14.6664 14.362 14.6042 14.385 14.6042 14.3997V15.8945H13.526V18.0508H11.5167V15.8945H7.49805V14.4977L10.9531 8.98438H13.526ZM11.5167 14.3262V10.6016C11.254 11.1696 10.9957 11.7533 10.6919 12.3007C10.3851 12.8535 9.76906 13.6151 9.54559 14.1439C9.51961 14.2057 9.49462 14.2547 9.50687 14.3262H11.5162H11.5167Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M3.03848 16.3366H6.46902C6.48225 16.3723 6.42001 16.3954 6.42001 16.4101V17.9783C6.42001 17.993 6.48225 18.0161 6.46902 18.0518H0V16.7286C0 16.7222 0.0803726 16.7218 0.121539 16.6811C1.22862 15.5995 3.68293 13.7641 4.08136 12.3071C4.4499 10.9589 3.3634 10.3297 2.15389 10.5757C1.58687 10.6909 1.17962 10.9898 0.687088 11.2398L0.121049 9.76855C2.03725 8.26842 6.03922 8.36105 6.2725 11.4123C6.43765 13.5701 4.51116 14.9291 3.1213 16.1988C3.07327 16.2425 3.01642 16.242 3.03897 16.337L3.03848 16.3366Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M26.6602 8.98438V10.3811L22.9112 18.0508H20.6813L24.4059 10.6996H20.2402V8.98438H26.6602Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M19.5541 8.49219L16.5646 18.6368H15.1924L18.1328 8.49219H19.5541Z"

                                                        fill="#6C6C6C" />

                                                </svg>

                                            </i>

                                            <div class="tooltiptext"> <i class="tip_close"></i> Reliable service available around the clock, anytime.</div>

                                        </span>

                                        <span class="second_facility animated fadeInUpShort delay-750 tootip_info">

                                            <i>

                                                <svg width="34" height="35" viewBox="0 0 34 35" fill="none"

                                                    xmlns="http://www.w3.org/2000/svg"> 

                                                    <path

                                                        d="M25.3154 32.222H5.72407C5.78709 32.3251 5.88256 32.3709 5.96276 32.4244C6.82012 33.003 7.76149 33.3161 8.80025 33.3142C9.90012 33.3142 10.9981 33.3142 12.0979 33.3142C12.5409 33.3142 12.8197 33.6636 12.6918 34.0589C12.625 34.267 12.476 34.3931 12.2622 34.4332C12.18 34.4484 12.0941 34.4523 12.0082 34.4523C10.958 34.4523 9.90775 34.4656 8.85754 34.4523C7.00152 34.4274 5.43574 33.7419 4.1984 32.3423C4.11438 32.2487 4.03227 32.2086 3.90433 32.2105C3.49188 32.2201 3.07944 32.2143 2.66508 32.2143C1.72179 32.2124 0.998094 31.462 1 30.4901C1 29.6022 1.75807 28.8594 2.66698 28.8594C7.48844 28.8594 12.308 28.8594 17.1294 28.8594C17.4369 28.8594 17.6622 29.016 17.7214 29.2699C17.7844 29.5392 17.6736 29.795 17.4388 29.921C17.3509 29.9669 17.2574 29.9802 17.1581 29.9802C12.3729 29.9802 7.58964 29.9802 2.80447 29.9802C2.55241 29.9802 2.33473 30.0356 2.20298 30.2724C2.01776 30.6046 2.19725 30.9923 2.57533 31.0744C2.65744 31.0916 2.74336 31.0916 2.82929 31.0916C11.2635 31.0916 19.6958 31.0916 28.13 31.0935C28.4088 31.0935 28.6646 31.0687 28.8117 30.7822C28.9835 30.4481 28.7888 30.0528 28.4145 29.9955C28.319 29.9802 28.2217 29.9802 28.1243 29.9802C25.2276 29.9802 22.3328 29.9802 19.4361 29.9802C19.1554 29.9802 18.9511 29.8428 18.8747 29.606C18.7945 29.3539 18.8823 29.1 19.1 28.9491C19.1993 28.8804 19.3101 28.8613 19.4285 28.8613C22.4092 28.8613 25.3918 28.8594 28.3725 28.8632C29.2891 28.8632 30.0223 29.6308 30.0128 30.5569C30.0051 31.4601 29.268 32.2067 28.3706 32.2163C27.9333 32.222 27.496 32.2201 27.0588 32.2163C26.9652 32.2163 26.9003 32.243 26.8392 32.3117C25.724 33.5777 24.3263 34.2842 22.6479 34.4313C22.4073 34.4523 22.1629 34.4561 21.9203 34.4561C19.4915 34.4561 17.0626 34.4561 14.6337 34.4561C14.5364 34.4561 14.439 34.4542 14.3435 34.4446C14.038 34.4122 13.826 34.183 13.8241 33.8909C13.8241 33.6006 14.0361 33.3619 14.3359 33.3238C14.4084 33.3142 14.481 33.3199 14.5535 33.3199C17.1466 33.3199 19.7397 33.3314 22.3309 33.3142C23.4269 33.3066 24.4046 32.9247 25.3192 32.2258L25.3154 32.222Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.416331"

                                                        stroke-miterlimit="10" />

                                                    <path

                                                        d="M15.5046 13.2422C19.19 13.2422 22.8753 13.2422 26.5606 13.2422C27.0036 13.2422 27.2232 13.4561 27.2232 13.8991C27.2232 16.1522 27.248 18.4035 27.2174 20.6567C27.1831 23.1753 26.4097 25.4572 24.9108 27.4889C24.7695 27.6798 24.5862 27.7829 24.3494 27.7505C24.1126 27.718 23.9522 27.5805 23.8816 27.3476C23.8205 27.1509 23.8816 26.9771 23.9961 26.8167C24.3723 26.3012 24.7141 25.7646 24.9967 25.1918C25.5791 24.0098 25.9285 22.7629 26.0488 21.4492C26.0737 21.1704 26.0813 20.8935 26.0813 20.6128C26.0813 18.604 26.0794 16.5933 26.0851 14.5846C26.0851 14.4127 26.0488 14.3611 25.8674 14.3611C18.9513 14.3669 12.037 14.365 5.12087 14.3611C4.95856 14.3611 4.9051 14.3955 4.9051 14.5693C4.91082 16.6277 4.88791 18.6861 4.91655 20.7446C4.94138 22.4707 5.3901 24.0995 6.22837 25.6138C6.46324 26.0396 6.73248 26.4425 7.0189 26.8358C7.21176 27.0993 7.16401 27.4583 6.91578 27.6474C6.66564 27.8383 6.3162 27.7868 6.11379 27.5118C4.9471 25.9441 4.20622 24.1988 3.91789 22.2626C3.8205 21.6077 3.78613 20.9489 3.78613 20.2882C3.78995 18.1458 3.78613 16.0014 3.78995 13.859C3.78995 13.4541 4.00572 13.2441 4.41244 13.2441C8.10921 13.2441 11.8079 13.2441 15.5046 13.2441V13.2422Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.416331"

                                                        stroke-miterlimit="10" />

                                                    <path

                                                        d="M15.4893 17.1869C16.2684 17.1869 16.9672 17.4122 17.5993 17.8877C18.6686 18.6916 19.2071 19.7781 19.3541 21.0784C19.4897 22.2795 19.23 23.3984 18.5349 24.3914C17.8991 25.3003 17.0398 25.8999 15.917 26.0354C14.8954 26.1596 13.9827 25.8636 13.2017 25.1972C12.2737 24.4047 11.7849 23.3774 11.6512 22.1725C11.5328 21.1032 11.7142 20.0912 12.268 19.1632C12.9096 18.0862 13.8223 17.3778 15.0921 17.1926C15.222 17.1735 15.3575 17.1907 15.4912 17.1907L15.4893 17.1869ZM18.3134 21.6322C18.2924 20.9295 18.1492 20.2917 17.8055 19.7074C17.4045 19.0219 16.8508 18.5292 16.0698 18.3249C15.7891 18.2524 15.7872 18.2543 15.6841 18.5312C15.3022 19.5527 15.5065 20.5075 16.0163 21.4259C16.3295 21.9892 16.5319 22.5888 16.5834 23.2323C16.6197 23.681 16.6025 24.1279 16.4918 24.569C16.4784 24.6186 16.444 24.6854 16.4975 24.7198C16.5452 24.7504 16.6006 24.7026 16.6464 24.6778C16.7935 24.5938 16.9367 24.5021 17.0665 24.3933C17.9392 23.6658 18.2733 22.6977 18.3134 21.6322ZM15.0921 24.9375C15.2468 24.947 15.2621 24.842 15.2945 24.7618C15.6879 23.7708 15.5466 22.8237 15.0425 21.9129C14.8038 21.4813 14.6224 21.0288 14.5059 20.5533C14.3532 19.927 14.3703 19.293 14.5059 18.6629C14.5174 18.6133 14.5613 18.5503 14.5021 18.514C14.4505 18.4815 14.399 18.5312 14.3512 18.556C13.7536 18.8825 13.3335 19.3752 13.0509 19.9843C12.7568 20.6163 12.6423 21.2846 12.7167 21.9835C12.8237 22.9936 13.2208 23.851 14.0438 24.4773C14.3608 24.7179 14.7198 24.8783 15.0902 24.9375H15.0921Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.416331"

                                                        stroke-miterlimit="10" />

                                                    <path

                                                        d="M13.1403 9.92464C14.4464 9.92464 15.7506 9.92464 17.0567 9.92464C18.1012 9.92464 18.8134 9.25441 18.8688 8.21565C18.886 7.89295 19.0826 7.70964 19.4073 7.70391C20.6198 7.68481 21.733 8.01515 22.7431 8.67775C23.7437 9.33461 24.4999 10.2092 24.9887 11.309C25.1357 11.6394 24.983 12.0518 24.5877 12.1148C24.3777 12.1473 24.1122 12.0289 24.0225 11.8074C23.7819 11.2212 23.4229 10.7018 22.9914 10.2588C22.5808 9.83681 22.0863 9.49501 21.5383 9.24677C21.0819 9.04055 20.6083 8.90307 20.1157 8.82096C19.961 8.79613 19.8846 8.82287 19.835 8.99472C19.4779 10.2149 18.422 10.9997 17.1579 10.9997C14.5724 10.9997 11.9851 10.9978 9.39964 10.9997C8.63202 10.9997 7.96752 11.2708 7.40995 11.8036C7.19036 12.0136 6.8963 12.0365 6.68244 11.8742C6.41893 11.6756 6.39028 11.2976 6.62706 11.0589C7.36985 10.3142 8.26731 9.93228 9.31944 9.92655C10.595 9.92082 11.8686 9.92655 13.1441 9.92655L13.1403 9.92464Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.416331"

                                                        stroke-miterlimit="10" />

                                                    <path

                                                        d="M33.3503 20.5418C33.3159 22.4398 32.6762 24.0972 31.3682 25.4854C30.2607 26.6598 28.9031 27.3682 27.3201 27.6527C26.8237 27.7424 26.4647 27.3605 26.6193 26.9137C26.6995 26.6808 26.879 26.5757 27.112 26.5376C28.1317 26.3676 29.0558 25.9723 29.8636 25.3288C31.2747 24.2042 32.0557 22.7358 32.2065 20.9351C32.3134 19.6749 31.9315 18.5864 31.0303 17.6985C30.4441 17.12 29.7337 16.7686 28.9145 16.6483C28.5288 16.591 28.336 16.4096 28.3226 16.0965C28.3092 15.7661 28.546 15.5045 28.8821 15.516C29.3919 15.5332 29.8788 15.6764 30.3371 15.8883C31.9926 16.656 32.9818 17.9468 33.2968 19.7455C33.3427 20.0071 33.3617 20.2744 33.3503 20.5437V20.5418Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.416331"

                                                        stroke-miterlimit="10" />

                                                    <path

                                                        d="M31.132 20.5832C31.0441 22.3934 30.2536 23.8446 28.6496 24.8241C28.3422 25.0113 28.0138 24.9368 27.8419 24.6523C27.672 24.3735 27.7636 24.0431 28.0672 23.856C29.1957 23.161 29.8373 22.1585 29.9786 20.8409C30.055 20.1382 29.8621 19.5463 29.2626 19.1243C29.1079 19.0155 28.936 18.9391 28.7546 18.8875C28.4358 18.7959 28.2658 18.5114 28.3384 18.2039C28.409 17.9022 28.6993 17.717 29.0239 17.7953C29.9901 18.0244 30.8188 18.8092 31.0575 19.8862C31.1052 20.1001 31.1224 20.3177 31.1339 20.5851L31.132 20.5832Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.416331"

                                                        stroke-miterlimit="10" />

                                                    <path

                                                        d="M12.6919 1.70099C12.6709 2.19173 12.4971 2.67101 12.161 3.093C12.056 3.22667 11.9548 3.36224 11.8479 3.49591C11.4813 3.958 11.5023 4.73707 11.8708 5.19153C12.0618 5.4264 12.2527 5.65936 12.4016 5.92859C12.6174 6.31813 12.7072 6.73058 12.6862 7.16785C12.6728 7.439 12.4398 7.64904 12.1668 7.65095C11.8765 7.65286 11.6264 7.45237 11.6226 7.17549C11.6168 6.73249 11.4507 6.36969 11.1586 6.04507C10.7175 5.55242 10.4883 4.97003 10.4902 4.30553C10.4941 3.64676 10.7366 3.07582 11.17 2.58699C11.4507 2.27002 11.6168 1.91867 11.6187 1.48713C11.6187 1.19879 11.8689 0.998297 12.1725 1.00403C12.4475 1.00784 12.6709 1.2198 12.6862 1.49285C12.69 1.54632 12.6862 1.6017 12.6862 1.7029L12.6919 1.70099Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.416331"

                                                        stroke-miterlimit="10" />

                                                    <path

                                                        d="M16.5911 1.67788C16.5854 2.25073 16.3525 2.73383 16.0049 3.17301C15.9228 3.27803 15.8503 3.39069 15.7605 3.48998C15.3939 3.89289 15.4073 4.75025 15.7605 5.16651C16.0145 5.4644 16.2646 5.76991 16.4155 6.14226C16.5472 6.46306 16.5988 6.7934 16.5873 7.13711C16.5778 7.4369 16.3601 7.64312 16.0584 7.64885C15.7796 7.65458 15.518 7.44453 15.5237 7.16193C15.5371 6.63682 15.2545 6.26638 14.9471 5.89212C14.6626 5.54459 14.4735 5.14551 14.4239 4.69296C14.3399 3.92917 14.5079 3.24939 15.0292 2.65554C15.3175 2.32711 15.5409 1.95667 15.5257 1.4793C15.5161 1.19478 15.7739 0.998104 16.0622 1.00001C16.3582 1.00383 16.5663 1.1986 16.5873 1.49266C16.5911 1.55377 16.5873 1.61487 16.5873 1.67406L16.5911 1.67788Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.416331"

                                                        stroke-miterlimit="10" />

                                                </svg>

                                            </i>

                                            <div class="tooltiptext"> <i class="tip_close"></i> Enjoy a refreshing cup of coffee during your Business Ride.</div>

                                        </span>

                                        <span class="third_facility animated fadeInUpShort delay-1000 tootip_info">

                                            <i>

                                                <svg width="36" height="29" viewBox="0 0 36 29" fill="none"

                                                    xmlns="http://www.w3.org/2000/svg">

                                                    <path

                                                        d="M17.5016 22.4833C13.5866 22.4833 9.92063 19.4086 9.15506 15.4827C8.68513 13.0693 9.56274 11.034 10.3812 9.52934C12.2251 6.13873 14.6214 3.2414 16.9352 0.614809C17.1624 0.356508 17.3865 0.230469 17.6168 0.230469C17.8471 0.230469 18.0727 0.356508 18.2999 0.616365C20.9 3.58684 23.5888 6.80316 25.3752 10.5828C25.842 11.5709 26.2683 12.685 26.2341 14.143C26.2248 18.4345 22.6583 22.0897 18.1147 22.4584C17.9124 22.4755 17.7055 22.4833 17.5016 22.4833ZM17.623 1.86119C17.623 1.86119 17.5701 1.86275 17.4316 2.02458C15.3839 4.40531 13.0607 7.2124 11.4004 10.4101C10.8885 11.395 10.4232 12.3675 10.347 13.4521C10.21 15.38 10.8636 17.2551 12.1862 18.7333C13.4933 20.1928 15.3387 21.0736 17.248 21.1483C17.3491 21.1529 17.4503 21.1545 17.5499 21.1545C21.6049 21.1545 24.9084 17.9055 24.9146 13.9096C24.9146 13.9049 24.9146 13.8987 24.9146 13.894C24.9628 13.2 24.7885 12.4438 24.3669 11.5102C22.7517 7.9344 20.2387 4.85967 17.8035 2.01835C17.6728 1.86586 17.6214 1.86275 17.6214 1.86275L17.623 1.86119Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M17.6183 0.466811C17.7817 0.466811 17.9466 0.567953 18.1256 0.77335C20.8097 3.83874 23.4068 6.96481 25.1651 10.6853C25.6537 11.7201 26.0334 12.7922 26.0007 14.1397C25.9913 18.3021 22.5852 21.8623 18.096 22.228C17.8968 22.2435 17.6992 22.2513 17.5016 22.2513C13.6815 22.2513 10.1353 19.2886 9.38377 15.439C8.96831 13.3088 9.60473 11.4462 10.5866 9.64275C12.3558 6.39064 14.6743 3.53687 17.111 0.771793C17.2884 0.569509 17.4534 0.466811 17.6183 0.466811ZM17.5514 21.3877C21.7247 21.3877 25.1417 18.0842 25.1495 13.911C25.2087 13.0629 24.9441 12.218 24.5816 11.4151C22.9633 7.83308 20.5141 4.8206 17.9824 1.86724C17.847 1.70853 17.735 1.63072 17.623 1.63072C17.5109 1.63072 17.3942 1.71319 17.2558 1.87502C14.9902 4.50939 12.8055 7.20133 11.1934 10.3041C10.68 11.2921 10.1945 12.302 10.1136 13.4364C9.82102 17.5599 13.1074 21.2197 17.2386 21.3815C17.3429 21.3862 17.4471 21.3877 17.5498 21.3877M17.6183 0C17.3164 0 17.0364 0.150935 16.7609 0.463699C14.4378 3.09962 12.0321 6.01096 10.1758 9.42024C9.33865 10.9576 8.44082 13.0427 8.92474 15.5292C9.30753 17.4945 10.3968 19.312 11.9917 20.647C13.5851 21.9821 15.5426 22.7181 17.5016 22.7181C17.7117 22.7181 17.9249 22.7088 18.1334 22.6932C20.4083 22.508 22.5152 21.5293 24.0634 19.9344C25.6086 18.3441 26.4613 16.2886 26.4675 14.1475C26.5033 12.6397 26.0427 11.4509 25.5868 10.4877C23.788 6.68006 21.0883 3.44973 18.4772 0.466811C18.2034 0.154047 17.9217 0.00155603 17.6183 0.00155603V0ZM17.5514 20.9209C17.4549 20.9209 17.3553 20.9193 17.2589 20.9147C15.4119 20.8415 13.6271 19.9904 12.3605 18.5775C11.0799 17.1475 10.4481 15.3332 10.5804 13.469C10.6535 12.4296 11.1094 11.4804 11.6089 10.5188C13.2583 7.34293 15.5706 4.54829 17.6105 2.17845C17.6152 2.17378 17.6199 2.16911 17.623 2.16445C17.6245 2.166 17.6261 2.16911 17.6292 2.17067C20.1546 5.1178 22.5541 8.05715 24.1583 11.608C24.5629 12.5043 24.731 13.2263 24.6858 13.8798C24.6858 13.8907 24.6858 13.9001 24.6858 13.911C24.6796 17.7777 21.4804 20.9225 17.5545 20.9225L17.5514 20.9209Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M17.3213 27.9222C13.3098 27.8257 9.01981 27.5316 4.83251 26.0549C3.5659 25.6083 2.24794 25.0482 1.19295 23.9838C-0.0798887 22.7001 -0.092337 21.1923 1.16027 19.9475C2.77232 18.3463 4.89009 17.7613 6.93783 17.1964L7.09655 17.1528C7.15723 17.1357 7.21792 17.1279 7.27705 17.1279C7.55713 17.1279 7.77965 17.3116 7.859 17.6088C7.95859 17.9838 7.77498 18.2841 7.36574 18.4132C7.13233 18.4864 6.89582 18.5548 6.66086 18.6217C6.33098 18.7167 5.9902 18.8147 5.66188 18.9267C4.49641 19.3266 3.27648 19.7888 2.31329 20.6493C1.79202 21.1145 1.53372 21.5704 1.54461 22.0061C1.55706 22.4449 1.84493 22.8946 2.40199 23.3412C3.38696 24.1301 4.58977 24.6965 6.2983 25.1742C9.73714 26.1374 13.3549 26.6058 17.3586 26.6058C18.4836 26.6058 19.6569 26.5669 20.8472 26.4922C24.1787 26.2805 26.8784 25.8215 29.3432 25.0482C30.4215 24.7105 31.6679 24.2515 32.7509 23.4112C33.3842 22.9195 33.7016 22.4154 33.6954 21.9159C33.6892 21.4117 33.3531 20.9107 32.6949 20.4283C31.4703 19.5274 29.9983 19.0559 28.5745 18.6015L28.52 18.5844C28.4516 18.5626 28.3535 18.5486 28.2493 18.533C27.9785 18.4941 27.6409 18.4459 27.4744 18.1845C27.3732 18.0258 27.3592 17.8219 27.4324 17.5776C27.5615 17.1497 27.8572 17.0859 28.0221 17.0859C28.2275 17.0859 28.4345 17.1777 28.6165 17.2571C28.7052 17.296 28.7892 17.3333 28.853 17.3505C30.2504 17.7286 31.8749 18.2561 33.322 19.2908C34.0051 19.7794 34.7302 20.4143 34.9325 21.4195C35.1021 22.2691 34.892 23.0409 34.3054 23.7131C33.4916 24.6483 32.4599 25.1944 31.559 25.6052C28.8079 26.8578 25.8125 27.292 23.2202 27.6001C21.4183 27.8148 19.5448 27.9159 17.3244 27.9206H17.3181L17.3213 27.9222Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M28.0248 17.3184C28.2722 17.3184 28.5757 17.516 28.7935 17.5751C30.3464 17.9952 31.8605 18.5321 33.1878 19.4813C33.8942 19.987 34.526 20.5689 34.7049 21.4668C34.8621 22.2479 34.6598 22.9543 34.1307 23.5612C33.3994 24.403 32.4627 24.9383 31.4637 25.3942C28.8355 26.5923 26.0253 27.0343 23.1949 27.3704C21.3417 27.5913 19.4775 27.6847 17.3271 27.6893C13.3001 27.5913 9.02098 27.2848 4.90994 25.8361C3.60909 25.3771 2.35181 24.8216 1.35751 23.821C0.193593 22.6462 0.153136 21.2785 1.32327 20.1161C2.93222 18.5181 5.05776 17.961 7.15685 17.3806C7.19886 17.3697 7.23776 17.3635 7.27511 17.3635C7.44783 17.3635 7.58009 17.4786 7.63144 17.6716C7.70769 17.9563 7.53964 18.1166 7.29378 18.1929C6.72583 18.3703 6.14698 18.515 5.5837 18.7079C4.35599 19.1296 3.14384 19.5949 2.1542 20.4771C0.994951 21.5119 1.02452 22.5404 2.25378 23.5254C3.42703 24.4652 4.80879 25.0021 6.23257 25.402C9.88925 26.4258 13.6035 26.8413 17.3567 26.8413C18.5206 26.8413 19.6892 26.8009 20.8609 26.7277C23.7644 26.5441 26.6291 26.1473 29.4128 25.2744C30.6514 24.8854 31.8527 24.4061 32.8937 23.5985C34.2879 22.5155 34.2801 21.3065 32.833 20.2422C31.5617 19.307 30.0757 18.8386 28.5912 18.364C28.2116 18.2427 27.4429 18.3531 27.6561 17.6483C27.7307 17.4024 27.8646 17.3215 28.0217 17.3215M28.0248 16.8516C27.8397 16.8516 27.3915 16.9154 27.2126 17.5098C27.1177 17.821 27.141 18.0902 27.2811 18.3096C27.5051 18.6597 27.9175 18.7204 28.2193 18.7639C28.3096 18.7764 28.4014 18.7904 28.4527 18.8059L28.5057 18.8231C29.9761 19.293 31.3656 19.738 32.5591 20.6156C32.9684 20.9159 33.457 21.3858 33.4632 21.918C33.4694 22.4455 33.0026 22.9201 32.6089 23.2266C31.5555 24.0451 30.3324 24.4933 29.2743 24.8262C26.8282 25.5934 24.1456 26.0493 20.8328 26.2594C19.6471 26.334 18.477 26.3729 17.3582 26.3729C13.3763 26.3729 9.77877 25.9077 6.36016 24.9507C4.68275 24.4808 3.50639 23.9284 2.54632 23.1597C2.04528 22.7583 1.78542 22.3677 1.77608 22.0005C1.76674 21.6379 1.99859 21.2427 2.46696 20.8241C3.39903 19.9916 4.54582 19.5575 5.73619 19.1483C6.05829 19.0378 6.39751 18.9413 6.72427 18.8464C6.95612 18.7795 7.19575 18.711 7.43382 18.6363C7.95976 18.4714 8.21495 18.045 8.08269 17.5502C7.97688 17.1534 7.65945 16.8967 7.27511 16.8967C7.1942 16.8967 7.11328 16.9076 7.03237 16.9309L6.87365 16.9745C4.79635 17.5487 2.64746 18.1415 0.993395 19.7847C-0.341683 21.112 -0.33079 22.7847 1.02452 24.1509C2.11374 25.2479 3.45971 25.8221 4.75278 26.278C8.97119 27.7656 13.283 28.0612 17.3131 28.1577C17.3162 28.1577 17.3209 28.1577 17.324 28.1577C19.5538 28.153 21.4366 28.0503 23.2463 27.8356C25.8557 27.526 28.8729 27.0887 31.6535 25.8206C32.5778 25.3989 33.6359 24.8387 34.4793 23.8693C35.1064 23.1488 35.3413 22.2868 35.1593 21.3765C34.9414 20.292 34.1758 19.6182 33.4554 19.1031C31.9772 18.0466 30.3293 17.5113 28.9118 17.127C28.8651 17.1145 28.7857 17.0787 28.7095 17.0461C28.5165 16.9605 28.2754 16.8547 28.0217 16.8547L28.0248 16.8516Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M16.8931 25.0514C14.7442 25.0281 11.5139 24.8881 8.27578 23.9498C7.42619 23.7039 6.81934 23.4254 6.30429 23.0457C5.76279 22.6458 5.47648 22.1775 5.47803 21.692C5.47959 21.2018 5.77368 20.7303 6.32763 20.3289C6.90336 19.9103 7.56156 19.6847 8.19798 19.4653L8.29135 19.4326C8.38782 19.3999 8.47963 19.3828 8.56676 19.3828C8.8344 19.3828 9.04602 19.5446 9.14561 19.8278C9.27476 20.1951 9.10515 20.514 8.70214 20.6588L8.51853 20.7241C8.01748 20.9031 7.54601 21.0711 7.13054 21.359C6.8349 21.5644 6.81311 21.6702 6.81311 21.6982C6.81311 21.7262 6.83801 21.8305 7.13832 22.0281C8.13107 22.6801 9.25453 22.9601 10.6347 23.1795C13.0762 23.5685 15.4771 23.7646 17.7707 23.7646C20.5311 23.7646 23.2464 23.4799 25.8419 22.9166C26.4767 22.7796 27.2952 22.5618 28.0063 22.1012C28.3969 21.8491 28.4264 21.7293 28.4264 21.6997C28.4264 21.6702 28.3969 21.555 28.025 21.3123C27.6546 21.0711 27.2439 20.9202 26.8082 20.7615L26.6557 20.7054C26.4845 20.6416 26.1982 20.5358 26.0893 20.2838C26.027 20.1375 26.0333 19.9725 26.1095 19.7936C26.2169 19.5431 26.4129 19.4108 26.6759 19.4108C26.7833 19.4108 26.9031 19.4326 27.0525 19.4808C27.8056 19.7189 28.5323 19.9772 29.1422 20.5141C29.5561 20.8797 29.7646 21.2765 29.7631 21.6951C29.76 22.123 29.5375 22.5307 29.1002 22.9072C28.3082 23.5903 27.3326 23.8782 26.4798 24.0945C23.8315 24.7667 21.015 25.053 17.0612 25.053H16.8916L16.8931 25.0514Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M8.56687 19.6152C8.73492 19.6152 8.85785 19.7117 8.92475 19.9047C9.02278 20.1801 8.87185 20.3497 8.62288 20.4384C8.06271 20.6407 7.49165 20.8243 6.99838 21.1666C6.44132 21.5525 6.43821 21.845 7.01083 22.2216C8.09694 22.9343 9.34955 23.2097 10.599 23.4073C12.9922 23.7885 15.3839 23.9955 17.7724 23.9955C20.4845 23.9955 23.192 23.7278 25.8918 23.1428C26.6744 22.9732 27.4478 22.7398 28.134 22.2947C28.8311 21.8435 28.8358 21.5587 28.1542 21.1137C27.7154 20.8274 27.2237 20.6625 26.7382 20.482C26.4597 20.3793 26.1703 20.2486 26.3259 19.8798C26.4021 19.7008 26.5251 19.6386 26.6776 19.6386C26.7709 19.6386 26.8736 19.6619 26.9841 19.6962C27.7061 19.9249 28.4141 20.1754 28.9898 20.6827C29.7321 21.3362 29.7056 22.0722 28.9509 22.7242C28.2211 23.3528 27.328 23.6329 26.4255 23.8632C23.5639 24.5899 20.6464 24.814 17.0659 24.814C17.0084 24.814 16.9523 24.814 16.8948 24.814C14.4502 24.7875 11.3553 24.5946 8.34124 23.7216C7.66592 23.5256 7.01394 23.2735 6.44288 22.8534C5.45946 22.1267 5.47036 21.2351 6.46466 20.5131C7.03884 20.0961 7.70638 19.8782 8.36769 19.6495C8.43927 19.6246 8.50618 19.6121 8.56687 19.6121M8.56687 19.1484C8.45483 19.1484 8.33657 19.1702 8.2152 19.2107L8.12184 19.2434C7.46986 19.4674 6.79454 19.6993 6.18924 20.1381C5.40967 20.7029 5.24473 21.2942 5.24318 21.6894C5.24162 22.0816 5.40033 22.6682 6.16435 23.2315C6.70274 23.6283 7.33293 23.9192 8.20898 24.1729C11.4751 25.1189 14.7257 25.259 16.887 25.2839H17.0628C21.0354 25.2839 23.8689 24.996 26.5375 24.3191C27.4151 24.0966 28.4219 23.7979 29.2528 23.0821C29.8643 22.5546 29.9935 22.0364 29.9966 21.6941C29.9981 21.358 29.8783 20.8507 29.2964 20.3372C28.6537 19.7709 27.871 19.4923 27.1226 19.2558C26.9499 19.2013 26.8083 19.1764 26.676 19.1764C26.3228 19.1764 26.038 19.3678 25.8949 19.7024C25.7673 20.0011 25.814 20.2345 25.8746 20.3761C26.0225 20.7216 26.3819 20.8539 26.5733 20.9254L26.7258 20.9814C27.1475 21.1355 27.5474 21.2818 27.8959 21.5089C28.0313 21.5976 28.1076 21.6599 28.1511 21.7003C28.106 21.7439 28.0235 21.8108 27.8773 21.9057C27.1988 22.3461 26.4053 22.5562 25.7906 22.6884C23.2123 23.247 20.5141 23.5302 17.7693 23.5302C15.4881 23.5302 13.098 23.3342 10.6691 22.9483C9.31843 22.7335 8.22298 22.4612 7.26446 21.8326C7.17266 21.7735 7.11664 21.7268 7.08241 21.6941C7.11509 21.6614 7.1711 21.6132 7.26135 21.551C7.65036 21.2802 8.10939 21.1168 8.59332 20.9441L8.77849 20.8787C9.30754 20.6874 9.53628 20.2454 9.362 19.7506C9.22974 19.3741 8.93098 19.15 8.56375 19.15L8.56687 19.1484Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M17.5042 20.1479C17.4637 20.1479 17.4233 20.1448 17.3844 20.1401C14.07 19.9051 11.5384 17.4295 11.361 14.2505C11.3594 14.2178 11.3563 14.182 11.3532 14.1462C11.3345 13.9191 11.3112 13.6343 11.4964 13.432C11.6084 13.3091 11.7733 13.2437 11.9865 13.2422C12.5996 13.2422 12.6447 13.793 12.6696 14.0902L12.6727 14.1369C12.8983 16.7791 14.7002 18.5685 17.3751 18.8081C17.6723 18.8346 18.2884 18.8906 18.2387 19.5317C18.2106 19.8942 17.9088 20.1494 17.5026 20.1494L17.5042 20.1479Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M11.9992 13.4746C12.4053 13.4746 12.4131 13.8372 12.4411 14.1562C12.6776 16.9166 14.5588 18.79 17.355 19.0406C17.6896 19.0701 18.0381 19.1153 18.007 19.5136C17.9852 19.7906 17.7456 19.9151 17.5044 19.9151C17.4717 19.9151 17.4391 19.9135 17.4079 19.9088C14.1014 19.6785 11.758 17.1935 11.5946 14.2386C11.5775 13.9274 11.4748 13.4824 11.9898 13.4762C11.9929 13.4762 11.9961 13.4762 11.9992 13.4762M11.9992 13.0078H11.9836C11.7035 13.0109 11.481 13.1012 11.3238 13.2739C11.0702 13.5524 11.1013 13.9212 11.1216 14.1655C11.1247 14.1997 11.1278 14.2324 11.1293 14.2635C11.3114 17.5592 13.9318 20.1267 17.3628 20.3725C17.4095 20.3788 17.4577 20.3819 17.506 20.3819C18.0381 20.3819 18.4365 20.0395 18.4738 19.5494C18.5018 19.1837 18.3416 18.8834 18.0335 18.7247C17.8359 18.622 17.6102 18.5955 17.3971 18.5753C14.8436 18.3466 13.1226 16.638 12.9063 14.1173L12.9032 14.0721C12.8799 13.7812 12.8161 13.0094 12.0007 13.0094L11.9992 13.0078Z"

                                                        fill="#6C6C6C" />

                                                </svg>

                                            </i>

                                            <div class="tooltiptext"> <i class="tip_close"></i> Complimentary bottled water to keep you hydrated on the go.</div>

                                        </span>

                                        <span class="fourth_facility animated fadeInUpShort delay-1250 tootip_info">

                                            <i>

                                                <svg width="37" height="29" viewBox="0 0 37 29" fill="none"

                                                    xmlns="http://www.w3.org/2000/svg">

                                                    <path

                                                        d="M18.0695 0.00220189C21.8446 -0.00275236 25.4678 0.735432 28.9094 2.30428C31.1768 3.33807 33.2411 4.68563 35.0576 6.40145C35.2855 6.61613 35.5101 6.83412 35.7314 7.05541C36.2648 7.59047 36.2681 8.46242 35.743 8.98097C35.2096 9.50612 34.3558 9.49786 33.8191 8.95454C32.5739 7.69451 31.185 6.61944 29.6558 5.72767C27.4132 4.42305 25.0071 3.55936 22.4589 3.0821C20.7795 2.76833 19.0834 2.63456 17.3775 2.68741C14.1226 2.78815 11.0097 3.49495 8.06023 4.89536C6.15945 5.79868 4.43371 6.95798 2.89459 8.39471C2.70303 8.57306 2.52798 8.76958 2.33641 8.94794C1.9186 9.33602 1.43474 9.47969 0.888118 9.27987C0.351407 9.085 0.0591065 8.67876 0.0062611 8.11562C-0.0333729 7.69946 0.116905 7.34111 0.407555 7.04715C1.96154 5.4717 3.7137 4.16047 5.65246 3.09531C8.0784 1.76261 10.6629 0.879105 13.3828 0.393588C14.6576 0.165692 15.9441 0.0253218 17.2421 0.00220189C17.5179 -0.00275236 17.7953 0.00220189 18.0711 0.00220189H18.0695Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M17.871 6.676C20.5711 6.66444 23.0053 7.10867 25.3437 8.03677C27.4559 8.87569 29.3517 10.0598 30.9833 11.6517C31.2541 11.916 31.52 12.1835 31.7743 12.4626C32.2698 13.0059 32.2318 13.8498 31.6967 14.3518C31.1732 14.8456 30.3244 14.8489 29.824 14.3171C28.9124 13.3461 27.915 12.4857 26.7837 11.7805C24.9556 10.6394 22.969 9.9326 20.8469 9.58745C19.6513 9.39258 18.4474 9.31827 17.2385 9.38268C13.939 9.55938 10.9153 10.5354 8.25483 12.5352C7.56784 13.0521 6.9337 13.6301 6.3623 14.2742C5.87679 14.8208 5.02961 14.8621 4.45492 14.3733C3.92812 13.9241 3.8472 13.0571 4.31455 12.5204C5.27072 11.4222 6.37552 10.4924 7.59427 9.69645C10.007 8.12099 12.6559 7.19785 15.5062 6.83289C16.3517 6.72389 17.1989 6.66774 17.8677 6.67765L17.871 6.676Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M27.4346 19.383C27.4346 19.9643 27.106 20.4415 26.5676 20.6479C26.0623 20.8428 25.4348 20.7074 25.0896 20.2896C24.0707 19.0543 22.7413 18.3029 21.2336 17.857C18.7713 17.1271 16.3321 17.2278 13.9458 18.1989C12.8311 18.653 11.8617 19.3202 11.079 20.2466C10.6034 20.8114 9.75454 20.894 9.19471 20.4399C8.61836 19.9742 8.51598 19.1303 8.98663 18.544C9.77105 17.5664 10.7404 16.8067 11.8403 16.2106C13.4983 15.3106 15.2769 14.8449 17.1562 14.726C19.2436 14.5938 21.2633 14.8845 23.1987 15.6854C24.7081 16.3097 26.0243 17.208 27.0845 18.4631C27.3289 18.7521 27.433 19.0295 27.433 19.3796L27.4346 19.383Z"

                                                        fill="#6C6C6C" />

                                                    <path

                                                        d="M15.394 25.4013C15.3957 23.8968 16.5765 22.721 18.0842 22.7227C19.554 22.7227 20.7661 23.9431 20.7562 25.4128C20.7463 26.9288 19.554 28.0914 18.0099 28.0881C16.5682 28.0865 15.3924 26.8776 15.394 25.4029V25.4013Z"

                                                        fill="#6C6C6C" />

                                                </svg>

                                            </i>

                                            <div class="tooltiptext"> <i class="tip_close"></i> Stay connected with complimentary Wi-Fi on every ride.</div>

                                        </span>

                                        <span class="fifth_facility animated fadeInUpShort delay-1500 tootip_info">

                                            <i>

                                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"

                                                    xmlns="http://www.w3.org/2000/svg">

                                                    <path

                                                        d="M11.9253 34.9999H4.48779C4.3469 34.9999 4.21177 34.944 4.11214 34.8443C4.01251 34.7447 3.95654 34.6096 3.95654 34.4687V14.8125C3.95654 14.6716 4.01251 14.5365 4.11214 14.4368C4.21177 14.3372 4.3469 14.2812 4.48779 14.2812C4.62869 14.2812 4.76381 14.3372 4.86344 14.4368C4.96307 14.5365 5.01904 14.6716 5.01904 14.8125V33.9374H11.394V14.8125C11.394 14.6716 11.45 14.5365 11.5496 14.4368C11.6492 14.3372 11.7844 14.2812 11.9253 14.2812C12.0662 14.2812 12.2013 14.3372 12.3009 14.4368C12.4005 14.5365 12.4565 14.6716 12.4565 14.8125V34.4687C12.4565 34.6096 12.4005 34.7447 12.3009 34.8443C12.2013 34.944 12.0662 34.9999 11.9253 34.9999Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.5" />

                                                    <path

                                                        d="M8.20654 35.0003C8.06565 35.0003 7.93052 34.9443 7.83089 34.8447C7.73126 34.745 7.67529 34.6099 7.67529 34.469V21.7695C7.67529 21.6286 7.73126 21.4935 7.83089 21.3939C7.93052 21.2943 8.06565 21.2383 8.20654 21.2383C8.34744 21.2383 8.48256 21.2943 8.58219 21.3939C8.68182 21.4935 8.73779 21.6286 8.73779 21.7695V34.469C8.73779 34.6099 8.68182 34.745 8.58219 34.8447C8.48256 34.9443 8.34744 35.0003 8.20654 35.0003Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.5" />

                                                    <path

                                                        d="M14.8789 23.61C14.738 23.61 14.6028 23.554 14.5032 23.4544C14.4036 23.3547 14.3476 23.2196 14.3476 23.0787V13.5322C14.3427 12.7429 14.0257 11.9876 13.4658 11.4312C12.9059 10.8748 12.1487 10.5625 11.3593 10.5625H5.04811C4.25924 10.5632 3.50265 10.8758 2.94335 11.4321C2.38404 11.9884 2.0674 12.7433 2.0625 13.5322V23.0787C2.0625 23.2196 2.00653 23.3547 1.9069 23.4544C1.80727 23.554 1.67214 23.61 1.53125 23.61C1.39035 23.61 1.25523 23.554 1.1556 23.4544C1.05597 23.3547 1 23.2196 1 23.0787V13.5322C1.00491 12.4615 1.43349 11.4364 2.19205 10.6808C2.95061 9.92522 3.97745 9.50069 5.04811 9.5H11.3593C12.4307 9.49929 13.4586 9.92329 14.2179 10.6791C14.9772 11.4349 15.4059 12.4609 15.4101 13.5322V23.0787C15.4101 23.2196 15.3541 23.3547 15.2545 23.4544C15.1549 23.554 15.0198 23.61 14.8789 23.61Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.5" />

                                                    <path

                                                        d="M8.20653 10.5625C7.26089 10.5625 6.33649 10.2821 5.55022 9.75669C4.76395 9.23132 4.15113 8.48459 3.78924 7.61093C3.42736 6.73728 3.33268 5.77593 3.51717 4.84846C3.70165 3.92099 4.15702 3.06906 4.82569 2.40039C5.49435 1.73173 6.34629 1.27636 7.27376 1.09187C8.20122 0.907387 9.16257 1.00207 10.0362 1.36395C10.9099 1.72583 11.6566 2.33865 12.182 3.12492C12.7073 3.91119 12.9878 4.8356 12.9878 5.78124C12.9878 6.40912 12.8641 7.03085 12.6238 7.61093C12.3835 8.19102 12.0314 8.7181 11.5874 9.16208C11.1434 9.60606 10.6163 9.95824 10.0362 10.1985C9.45614 10.4388 8.83441 10.5625 8.20653 10.5625ZM8.20653 2.0625C7.47103 2.0625 6.75205 2.2806 6.14051 2.68922C5.52897 3.09784 5.05233 3.67863 4.77086 4.35814C4.4894 5.03765 4.41576 5.78536 4.55925 6.50673C4.70273 7.22809 5.05691 7.89071 5.57698 8.41078C6.09706 8.93085 6.75967 9.28503 7.48104 9.42852C8.2024 9.57201 8.95012 9.49836 9.62963 9.2169C10.3091 8.93544 10.8899 8.4588 11.2985 7.84726C11.7072 7.23571 11.9253 6.51673 11.9253 5.78124C11.9253 4.79497 11.5335 3.84909 10.8361 3.15169C10.1387 2.45429 9.1928 2.0625 8.20653 2.0625Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.5" />

                                                    <path

                                                        d="M8.20638 13.7485C8.12005 13.7485 8.03502 13.7275 7.95865 13.6872C7.88228 13.6469 7.81688 13.5887 7.7681 13.5174L5.48904 10.1971C5.41149 10.0808 5.38288 9.93869 5.40942 9.80146C5.43596 9.66424 5.51551 9.543 5.63082 9.46402C5.74614 9.38505 5.88794 9.3547 6.02548 9.37956C6.16302 9.40441 6.28522 9.48247 6.3656 9.59681L8.20638 12.2823L10.0472 9.59681C10.0862 9.53832 10.1364 9.48815 10.195 9.44922C10.2535 9.41029 10.3192 9.38337 10.3882 9.37002C10.4573 9.35666 10.5283 9.35715 10.5971 9.37144C10.666 9.38574 10.7313 9.41356 10.7893 9.45329C10.8473 9.49302 10.8968 9.54387 10.9351 9.60289C10.9733 9.66191 10.9994 9.72793 11.0119 9.79712C11.0244 9.86631 11.023 9.9373 11.0079 10.006C10.9928 10.0746 10.9642 10.1396 10.9237 10.1971L8.64466 13.5227C8.59529 13.593 8.52963 13.6502 8.4533 13.6895C8.37697 13.7289 8.29224 13.7491 8.20638 13.7485ZM8.20638 4.39324C6.8517 4.39324 5.56873 4.05324 4.6842 3.45558C4.62335 3.4179 4.57073 3.36831 4.52952 3.30979C4.4883 3.25127 4.45934 3.18502 4.44437 3.11503C4.4294 3.04503 4.42872 2.97274 4.44239 2.90248C4.45606 2.83221 4.48378 2.76544 4.5239 2.70616C4.56401 2.64688 4.61569 2.59632 4.67584 2.55751C4.73598 2.51871 4.80335 2.49245 4.87389 2.48033C4.94444 2.46821 5.0167 2.47047 5.08635 2.48697C5.156 2.50347 5.2216 2.53388 5.2792 2.57637C5.99107 3.05715 7.05888 3.33074 8.20107 3.33074C9.34325 3.33074 10.4137 3.06512 11.1229 2.57637C11.2395 2.50868 11.3774 2.48781 11.5087 2.51799C11.6401 2.54818 11.755 2.62715 11.8303 2.73892C11.9056 2.85069 11.9356 2.9869 11.9143 3.11997C11.8929 3.25303 11.8218 3.373 11.7153 3.45558C10.844 4.05324 9.55841 4.39324 8.20638 4.39324ZM32.3782 26.8411H31.074C30.9331 26.8411 30.7979 26.7852 30.6983 26.6855C30.5987 26.5859 30.5427 26.4508 30.5427 26.3099C30.5427 26.169 30.5987 26.0339 30.6983 25.9342C30.7979 25.8346 30.9331 25.7786 31.074 25.7786H32.3782C33.0316 25.7786 33.9374 25.2952 33.9374 24.3841V22.8355C33.9374 21.7119 33.4566 21.0718 32.4711 20.8779C31.4299 20.6707 29.8999 20.4157 28.6727 20.2085L27.7351 20.0518C26.5796 19.8579 25.3923 19.1035 24.4812 17.9985C24.1066 17.5443 23.764 17.1113 23.4187 16.6916C22.9698 16.1232 22.5421 15.5866 22.0906 15.0368C21.3574 14.1655 20.6801 13.8707 19.4131 13.8707H16.9985C16.8576 13.8707 16.7225 13.8147 16.6229 13.7151C16.5233 13.6155 16.4673 13.4804 16.4673 13.3395C16.4673 13.1986 16.5233 13.0634 16.6229 12.9638C16.7225 12.8642 16.8576 12.8082 16.9985 12.8082H19.4131C20.9909 12.8082 21.9684 13.2412 22.9034 14.3541C23.3762 14.9146 23.8065 15.4565 24.2607 16.0302C24.5927 16.4473 24.9327 16.8749 25.3046 17.3265C26.043 18.2323 27.0205 18.8644 27.9157 19.0158L28.848 19.1726C30.0832 19.3797 31.6211 19.6374 32.6757 19.8446C34.1738 20.1235 34.9999 21.186 34.9999 22.8355V24.3735C34.9999 25.9035 33.6399 26.8411 32.3782 26.8411ZM25.0682 26.8411H14.0395C13.8986 26.8411 13.7635 26.7852 13.6638 26.6855C13.5642 26.5859 13.5082 26.4508 13.5082 26.3099C13.5082 26.169 13.5642 26.0339 13.6638 25.9342C13.7635 25.8346 13.8986 25.7786 14.0395 25.7786H25.0682C25.2091 25.7786 25.3442 25.8346 25.4438 25.9342C25.5435 26.0339 25.5994 26.169 25.5994 26.3099C25.5994 26.4508 25.5435 26.5859 25.4438 26.6855C25.3442 26.7852 25.2091 26.8411 25.0682 26.8411Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.5" />

                                                    <path

                                                        d="M28.0751 29.8479C27.3763 29.8485 26.693 29.6417 26.1117 29.2538C25.5304 28.866 25.0772 28.3144 24.8094 27.6689C24.5416 27.0234 24.4712 26.313 24.6072 25.6275C24.7433 24.9421 25.0795 24.3123 25.5735 23.818C26.0674 23.3237 26.6969 22.9869 27.3823 22.8504C28.0677 22.7139 28.7781 22.7837 29.4238 23.051C30.0695 23.3183 30.6214 23.7711 31.0097 24.3521C31.398 24.9332 31.6053 25.6163 31.6053 26.3151C31.6039 27.2512 31.2316 28.1486 30.5699 28.8107C29.9083 29.4729 29.0112 29.8458 28.0751 29.8479ZM28.0751 23.8475C27.5863 23.847 27.1084 23.9915 26.7017 24.2627C26.2951 24.5339 25.978 24.9197 25.7907 25.3712C25.6034 25.8227 25.5543 26.3196 25.6495 26.7991C25.7447 27.2785 25.9801 27.7189 26.3257 28.0646C26.6713 28.4102 27.1118 28.6455 27.5912 28.7408C28.0706 28.836 28.5676 28.7868 29.0191 28.5995C29.4705 28.4122 29.8563 28.0952 30.1276 27.6886C30.3988 27.2819 30.5433 26.8039 30.5428 26.3151C30.5421 25.6606 30.282 25.0331 29.8194 24.5701C29.3569 24.107 28.7296 23.8462 28.0751 23.8448V23.8475ZM27.2756 20.0039H17.0278C16.8869 20.0039 16.7518 19.9479 16.6522 19.8483C16.5526 19.7487 16.4966 19.6136 16.4966 19.4727C16.4966 19.3318 16.5526 19.1966 16.6522 19.097C16.7518 18.9974 16.8869 18.9414 17.0278 18.9414H27.2756C27.4165 18.9414 27.5516 18.9974 27.6513 19.097C27.7509 19.1966 27.8069 19.3318 27.8069 19.4727C27.8069 19.6136 27.7509 19.7487 27.6513 19.8483C27.5516 19.9479 27.4165 20.0039 27.2756 20.0039ZM17.0278 26.8172C16.8869 26.8172 16.7518 26.7612 16.6522 26.6616C16.5526 26.5619 16.4966 26.4268 16.4966 26.2859V21.3878C16.4966 21.2469 16.5526 21.1118 16.6522 21.0122C16.7518 20.9125 16.8869 20.8566 17.0278 20.8566C17.1687 20.8566 17.3039 20.9125 17.4035 21.0122C17.5031 21.1118 17.5591 21.2469 17.5591 21.3878V26.2859C17.5591 26.4268 17.5031 26.5619 17.4035 26.6616C17.3039 26.7612 17.1687 26.8172 17.0278 26.8172ZM20.0161 21.8341H18.9536C18.8127 21.8341 18.6776 21.7781 18.578 21.6785C18.4783 21.5788 18.4224 21.4437 18.4224 21.3028C18.4224 21.1619 18.4783 21.0268 18.578 20.9272C18.6776 20.8275 18.8127 20.7716 18.9536 20.7716H20.0161C20.157 20.7716 20.2921 20.8275 20.3917 20.9272C20.4914 21.0268 20.5473 21.1619 20.5473 21.3028C20.5473 21.4437 20.4914 21.5788 20.3917 21.6785C20.2921 21.7781 20.157 21.8341 20.0161 21.8341Z"

                                                        fill="#6C6C6C" stroke="#6C6C6C" stroke-width="0.5" />

                                                </svg>

                                            </i>

                                            <div class="tooltiptext"> <i class="tip_close"></i> Professional drivers who prioritize your comfort and safety.</div>

                                        </span>

                                    </div>

                                    <div class="r_c2c_img animated fadeInRight">

                                        <img src="{{ asset('front/images/rideC2c_img.png') }}" alt="#">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!--  -->

                    <div class="review_sec">

                        <div class="autoContent">

                            <div class="review_sec_inner animatedParent animateOnce">

                                <div class="headlines animated fadeInUpShort slow">

                                    <h2>Reviews</h2>

                                </div>

                                {{-- Reviews Section --}}



                                {{-- <div class="review_sec_content animated fadeInUpShort slow delay-250">

                                    <img src="{{ asset('front/images/review_img.png') }}" alt="#">

                                </div> --}}



                                <div class="review_sec_content animated fadeInUpShort slow delay-250">

                                    <div class="reviewTitle">

                                        <p>

                                            Our customers say <strong> Excellent </strong> <label> <img

                                                    src="{{ asset('reviews/images/rating/stars-5.svg') }}" alt="#"> </label> 4.9 out of 5 based

                                            on 216  reviews <span><img src="{{ asset('reviews/images/rating/trustpilot_logo.svg') }}"

                                                    alt="#"></span>

                                        </p>

                                    </div>

                                    <div class="reviewSliderMain">

                                        <div class="reviewSlider">

                                            <div class="reviewsSlide">

                                                <div class="reviewBox">

                                                    <div class="reviewBox_topRow">

                                                        <div class="reviewBox_topLeft">

                                                            <span class="reviewRatting ratting-4">

                                                                <img src="{{ asset('reviews/images/rating/stars-4.svg') }}" alt="#">

                                                            </span>

                                                        </div>

                                                        <div class="reviewBox_verified">

                                                            <span>Verified</span>

                                                        </div>

                                                    </div>

                                                    <div class="reviewBox_content">

                                                        <h4 title="Great service!">Great service!</h4>

                                                        <p

                                                            title="Great service! I’ve been using C2C Ride for a few years and am extremely satisfied with their professionalism & timeliness. strongly recommend this car service and would like to extend a special thanks to Hasan & Malaika for arranging all our rides.">

                                                            Great service! I’ve been using C2C Ride for a few years and am extremely satisfied with their professionalism & timeliness. strongly recommend this car service and would like to extend a special thanks to Hasan & Malaika for arranging all our rides.</p>

                                                    </div>

                                                    <div class="reviewBox_userInfo">

                                                        <p title="Dana chehayeb">Dana Chehayeb</p>

                                                        <span>January 31, 2025</span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="reviewsSlide">

                                                <div class="reviewBox">

                                                    <div class="reviewBox_topRow">

                                                        <div class="reviewBox_topLeft">

                                                            <span class="reviewRatting ratting-0">

                                                                <img src="{{ asset('reviews/images/rating/stars-4.5.svg') }}" alt="#">

                                                            </span>

                                                        </div>

                                                        <div class="reviewBox_verified">

                                                            <span>Verified</span>

                                                        </div>

                                                    </div>

                                                    <div class="reviewBox_content">

                                                        <h4 title="Booked car to take us to airport">Booked car to take us to airport</h4>

                                                        <p

                                                            title="Booked car to take us to airport. Excellent service. Clean vehicle. Courteous Driver arrived on time, he put our luggage in boot, opened doors for us. Very smooth drive. Cheaper than Uber and super service. Highly recommended. Good communication with Company via WhatsApp.">

                                                            Booked car to take us to airport. Excellent service. Clean vehicle. Courteous Driver arrived on time, he put our luggage in boot, opened doors for us. Very smooth drive. Cheaper than Uber and super service. Highly recommended. Good communication with Company via WhatsApp.</p>

                                                    </div>

                                                    <div class="reviewBox_userInfo">

                                                        <p title="Chrisoula michealides">Chrisoula michealides</p>

                                                        <span>January 16, 2025</span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="reviewsSlide">

                                                <div class="reviewBox">

                                                    <div class="reviewBox_topRow">

                                                        <div class="reviewBox_topLeft">

                                                            <span class="reviewRatting ratting-0">

                                                                <img src="{{ asset('reviews/images/rating/stars-4.5.svg')}}" alt="#">

                                                            </span>

                                                        </div>

                                                        <div class="reviewBox_verified">

                                                            <span>Verified</span>

                                                        </div>

                                                    </div>

                                                    <div class="reviewBox_content">

                                                        <h4 title="Easy booking, great service.">Easy booking, great service.</h4>

                                                        <p

                                                            title="Booked a car from a location not served by taxis / Careem etc. No problem with booking, the driver was on time, the car was nice and clean and the journey was smooth. Altogether a great service.">

                                                            Booked a car from a location not served by taxis / Careem etc. No problem with booking, the driver was on time, the car was nice and clean and the journey was smooth. Altogether a great service.</p>

                                                    </div>

                                                    <div class="reviewBox_userInfo">

                                                        <p title="Doug Tyson">Doug Tyson</p>

                                                        <span>January 31, 2025</span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="reviewsSlide">

                                                <div class="reviewBox">

                                                    <div class="reviewBox_topRow">

                                                        <div class="reviewBox_topLeft">

                                                            <span class="reviewRatting ratting-0">

                                                                <img src="{{ asset('reviews/images/rating/stars-4.5.svg') }}" alt="#">

                                                            </span>

                                                        </div>

                                                        <div class="reviewBox_verified">

                                                            <span>Verified</span>

                                                        </div>

                                                    </div>

                                                    <div class="reviewBox_content">

                                                        <h4 title="Had 2 rides booked">Had 2 rides booked</h4>

                                                        <p

                                                            title="Had 2 rides booked. Very efficient and on time. I had to revise the pickup location and time of the second trip and C2C was very accommodating and happy to change details to my timings and requests. Drivers were also very friendly and cars were very modern and clean.">

                                                            Had 2 rides booked. Very efficient and on time. I had to revise the pickup location and time of the second trip and C2C was very accommodating and happy to change details to my timings and requests. Drivers were also very friendly and cars were very modern and clean.</p>

                                                    </div>

                                                    <div class="reviewBox_userInfo">

                                                        <p title="Jordan Pitout">Jordan Pitout</p>

                                                        <span>1 Hour Ago</span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="reviewsSlide">

                                                <div class="reviewBox">

                                                    <div class="reviewBox_topRow">

                                                        <div class="reviewBox_topLeft">

                                                            <span class="reviewRatting ratting-0">

                                                                <img src="{{ asset('reviews/images/rating/stars-5.svg') }}" alt="#">

                                                            </span>

                                                        </div>

                                                        <div class="reviewBox_verified">

                                                            <span>Verified</span>

                                                        </div>

                                                    </div>

                                                    <div class="reviewBox_content">

                                                        <h4 title="I’d give them a 6 star if I could">I’d give them a 6 star if I could</h4>

                                                        <p

                                                            title="I would give this company a 6 star if I could. I randomly googled and found this website. Booked with them by taking a chance. Travelled from Dubai to Abu Dhabi and realized it was an excellent decision!!! So much ease, affordability and comfort! Also, the response time was 🔥🔥🔥 the team was extremely cooperative and accommodating, Umer Farooq and Suleiman were my drivers , extremely professional and caring and drove well too. I’d 110% book them again whenever I get the chance!">

                                                            I would give this company a 6 star if I could. I randomly googled and found this website. Booked with them by taking a chance. Travelled from Dubai to Abu Dhabi and realized it was an excellent decision!!! So much ease, affordability and comfort! Also, the response time was 🔥🔥🔥 the team was extremely cooperative and accommodating, Umer Farooq and Suleiman were my drivers , extremely professional and caring and drove well too. I’d 110% book them again whenever I get the chance!</p>

                                                    </div>

                                                    <div class="reviewBox_userInfo">

                                                        <p title="Amal Shirazi">Amal Shirazi</p>

                                                        <span>January 13, 2025</span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="reviewsSlide">

                                                <div class="reviewBox">

                                                    <div class="reviewBox_topRow">

                                                        <div class="reviewBox_topLeft">

                                                            <span class="reviewRatting ratting-0">

                                                                <img src="{{ asset('reviews/images/rating/stars-3.5.svg') }}" alt="#">

                                                            </span>

                                                        </div>

                                                        <div class="reviewBox_verified">

                                                            <span>Verified</span>

                                                        </div>

                                                    </div>

                                                    <div class="reviewBox_content">

                                                        <h4 title="Best service is Dubai">Best service is Dubai</h4>

                                                        <p

                                                            title="This was absolutely the best service I can ever ask for, I was in between many different tour companies and this one was by far the best option to go with. As a traveling influencer with over 200 thousand followers I truly was able to experience everything I possibly wanted to at an affordable price and excellent customer service. Shoutout our driver Ahmed as he was absolutely amazing make sure you ask for him if he’s available you will be in great hands. It was my first time in Dubai and every time I go back I will be booking with them every time.">

                                                            This was absolutely the best service I can ever ask for, I was in between many different tour companies and this one was by far the best option to go with. As a traveling influencer with over 200 thousand followers I truly was able to experience everything I possibly wanted to at an affordable price and excellent customer service. Shoutout our driver Ahmed as he was absolutely amazing make sure you ask for him if he’s available you will be in great hands. It was my first time in Dubai and every time I go back I will be booking with them every time.</p>

                                                    </div>

                                                    <div class="reviewBox_userInfo">

                                                        <p title="Elijah Brown">Elijah Brown</p>

                                                        <span>January 23, 2025</span>

                                                    </div>

                                                </div>

                                            </div>

                                            {{-- <div class="reviewsSlide">

                                                <div class="reviewBox">

                                                    <div class="reviewBox_topRow">

                                                        <div class="reviewBox_topLeft">

                                                            <span class="reviewRatting ratting-0">

                                                                <img src="{{ asset('reviews/images/rating/stars-3.5.svg') }}" alt="#">

                                                            </span>

                                                        </div>

                                                        <div class="reviewBox_verified">

                                                            <span>Verified</span>

                                                        </div>

                                                    </div> --}}

                                                    {{-- <div class="reviewBox_content">

                                                        <h4 title="Driver Was on time">Driver Was on time</h4>

                                                        <p

                                                            title="The driver was terrific. standing with a sign with our name in on easy to The driver was terrific. standing with a sign with our name in on easy to">

                                                            The driver was terrific. standing with a sign with our name

                                                            in on easy to The driver was terrific. standing with a sign

                                                            with our name in on easy to</p>

                                                    </div>

                                                    <div class="reviewBox_userInfo">

                                                        <p title="Johan Doe">Johan Doe</p>

                                                        <span>1 Hour Ago</span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="reviewsSlide">

                                                <div class="reviewBox">

                                                    <div class="reviewBox_topRow">

                                                        <div class="reviewBox_topLeft">

                                                            <span class="reviewRatting ratting-0">

                                                                <img src="images/rating/stars-4.svg" alt="#">

                                                            </span>

                                                        </div>

                                                        <div class="reviewBox_verified">

                                                            <span>Verified</span>

                                                        </div>

                                                    </div>

                                                    <div class="reviewBox_content">

                                                        <h4 title="Driver Was on time">Driver Was on time</h4>

                                                        <p

                                                            title="The driver was terrific. standing with a sign with our name in on easy to The driver was terrific. standing with a sign with our name in on easy to">

                                                            The driver was terrific. standing with a sign with our name

                                                            in on easy to The driver was terrific. standing with a sign

                                                            with our name in on easy to</p>

                                                    </div>

                                                    <div class="reviewBox_userInfo">

                                                        <p title="Johan Doe">Johan Doe</p>

                                                        <span>1 Hour Ago</span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="reviewsSlide">

                                                <div class="reviewBox">

                                                    <div class="reviewBox_topRow">

                                                        <div class="reviewBox_topLeft">

                                                            <span class="reviewRatting ratting-0">

                                                                <img src="images/rating/stars-4.5.svg" alt="#">

                                                            </span>

                                                        </div>

                                                        <div class="reviewBox_verified">

                                                            <span>Verified</span>

                                                        </div>

                                                    </div>

                                                    <div class="reviewBox_content">

                                                        <h4 title="Driver Was on time">Driver Was on time</h4>

                                                        <p

                                                            title="The driver was terrific. standing with a sign with our name in on easy to The driver was terrific. standing with a sign with our name in on easy to">

                                                            The driver was terrific. standing with a sign with our name

                                                            in on easy to The driver was terrific. standing with a sign

                                                            with our name in on easy to</p>

                                                    </div>

                                                    <div class="reviewBox_userInfo">

                                                        <p title="Johan Doe">Johan Doe</p>

                                                        <span>1 Hour Ago</span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="reviewsSlide">

                                                <div class="reviewBox">

                                                    <div class="reviewBox_topRow">

                                                        <div class="reviewBox_topLeft">

                                                            <span class="reviewRatting ratting-0">

                                                                <img src="images/rating/stars-5.svg" alt="#">

                                                            </span>

                                                        </div>

                                                        <div class="reviewBox_verified">

                                                            <span>Verified</span>

                                                        </div>

                                                    </div>

                                                    <div class="reviewBox_content">

                                                        <h4 title="Driver Was on time">Driver Was on time</h4>

                                                        <p

                                                            title="The driver was terrific. standing with a sign with our name in on easy to The driver was terrific. standing with a sign with our name in on easy to">

                                                            The driver was terrific. standing with a sign with our name

                                                            in on easy to The driver was terrific. standing with a sign

                                                            with our name in on easy to</p>

                                                    </div>

                                                    <div class="reviewBox_userInfo">

                                                        <p title="Johan Doe">Johan Doe</p>

                                                        <span>1 Hour Ago</span>

                                                    </div>

                                                </div>

                                            </div> --}}

                                        </div>

                                    </div>

                                    <div class="reviewFooter">

                                        <p>

                                            Rated <strong>4.9</strong> / 5 based on <a target="_blank" href="https://www.trustpilot.com/review/c2crides.com"> 216 

                                                reviews</a>. Showing our 4 & 5 star reviews.

                                        </p>

                                        <span><img src="{{ asset('reviews/images/rating/trustpilot_logo.svg') }}" alt="#"></span>

                                    </div>



                                </div>

                                {{-- End Review --}}

                                

                            </div>

                        </div>

                    </div>



                    <!--  -->

                    {{-- <div class="downloadApp_sec">

                        <div class="autoContent">

                            <div class="downloadApp_sec_inner animatedParent animateOnce">

                                <div class="dApp_left">

                                    <div class="headlines">

                                        <span class="headlines_sub animated fadeInUpShort slow">Download the App &

                                            Save!</span>

                                        <h2 class="animated fadeInUpShort slow delay-250">Get 5% OFF your first ride

                                            when you book through our app! Fast, easy, and reliable—your next ride is

                                            just a tap away!</h2>

                                        <!-- <p class="animated fadeInUpShort slow delay-500">Lorem ipsum dolor sit amet,

                                            consectetur adipiscing elit. Donec sed dictum ex.

                                            In hac

                                            habitasse platea dictumst. Proin egestas neque urna, non laoreet ipsum </p> -->

                                    </div>



                                    <div class="dApp_links animated fadeInUpShort slow delay-750">

                                        <ul>

                                            <li>

                                                <div class="dApp_links_img">

                                                    <a href="javascript:void(0)">

                                                        <img src="{{ asset('front/images/googleplay.svg') }}" alt="#">

                                                    </a>



                                                </div>

                                            </li>

                                            <li>

                                                <div class="dApp_links_img">

                                                    <a href="javascript:void(0)">

                                                        <img src="{{ asset('front/images/appstore.svg') }}" alt="#">

                                                    </a>

                                                </div>

                                            </li>

                                        </ul>

                                    </div>

                                </div>

                                <div class="dApp_right animated fadeInRight">

                                    <img src="{{ asset('front/images/mobileApp_img.png') }}" alt="#">

                                </div>

                            </div>

                        </div>

                    </div> --}}

                </div>

            </div>

        </div>

@endsection

@section('script')



<script>

    $('.reviewSlider').slick({

        dots: false,

        infinite: true,

        autoplay: true,

        pauseOnHover: true,

        autoplaySpeed: 2000,

        speed: 600,

        slidesToShow: 5,

        slidesToScroll: 1,

        responsive: [

            {

                breakpoint: 1360,

                settings: {

                    slidesToShow: 3,

                    slidesToScroll: 1,

                    infinite: true,

                    dots: false

                }

            },

            {

                breakpoint: 1024,

                settings: {

                    slidesToShow: 3,

                    slidesToScroll: 1,

                    infinite: true,

                    dots: false

                }

            },

            {

                breakpoint: 600,

                settings: {

                    slidesToShow: 2,

                    slidesToScroll: 1

                }

            },

            {

                breakpoint: 480,

                settings: {

                    slidesToShow: 1,

                    slidesToScroll: 1

                }

            }

        ]

    });



    </script>

<script>





    $('.os_cRight_img_slider').slick({

        dots: false,

        // fade: true,

        infinite: true,

        autoplay: true,

        pauseOnHover: true,

        autoplaySpeed: 2000,

        speed: 600,

        arrows: false,

        slidesToShow: 1,

        slidesToScroll: 1,

    });



    $('.iconic_slider').slick({

        dots: false,

        infinite: true,

        autoplay: true,

        pauseOnHover: true,

        autoplaySpeed: 2000,

        speed: 600,

        slidesToShow: 4,

        slidesToScroll: 1,

        responsive: [

            {

                breakpoint: 1360,

                settings: {

                    slidesToShow: 3,

                    slidesToScroll: 1,

                    infinite: true,

                    dots: false

                }

            },

            {

                breakpoint: 1024,

                settings: {

                    slidesToShow: 3,

                    slidesToScroll: 1,

                    infinite: true,

                    dots: false

                }

            },

            {

                breakpoint: 600,

                settings: {

                    slidesToShow: 2,

                    slidesToScroll: 1

                }

            },

            {

                breakpoint: 480,

                settings: {

                    slidesToShow: 1,

                    slidesToScroll: 1

                }

            }

        ]

    });

</script>



@endsection