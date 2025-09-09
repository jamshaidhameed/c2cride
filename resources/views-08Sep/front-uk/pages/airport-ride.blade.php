@extends('front.layouts.master')
@section('meta')
 <meta name="description" content="Pre-book your airport ride with professional chauffeurs. Available for all major airports in UAE at affordable rates.
" />
@endsection
@section("title")
Dubai Airport Transfers & Rides | C2C Rides
@endsection
@section("content")
<div class="content">
    <div class="gradiantParent">
        <div class="gradiantChild">
            <div class="auto_banner rides_banner airport_ride_banner animatedParent animateOnce">
                <div class="autoContent">
                    <div class="banner_inner">
                        <div class="banner_box">
                            <div class="banner_text">
                                <small class="uppercase animated fadeInUpShort slow">Airport Rides</small>
                                <h1 class="animated fadeInUpShort slow delay-250">
                                    On-time <span>pickups</span> and <span> drop-offs </span> for EVERY flight

                                </h1>
                                <p class="animated fadeInUpShort slow delay-500">C2C ensures you never miss a flight. Get Affordable. Hassle-Free. Reliable Airport Rides.</p>
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
                                                        <svg width="18" height="23" viewBox="0 0 18 23"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                <a data-rel=".tab_byHours" href="javascript:void(0)"
                                                    class="rideTabBtn">
                                                    <i>
                                                        <svg width="18" height="20" viewBox="0 0 18 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
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

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="how_works">
                <div class="autoContent ">
                    <div class="how_works_inner">
                        <div class="headlines animatedParent animateOnce">
                            <h2 class="animated fadeInUpShort slow delay-250">How does it work</h2>
                        </div>

                        <div class="hw_content">
                            <div class="hw_content_list animatedParent animateOnce">
                                <ul>
                                    <li class="animated fadeInUpShort slow">
                                        <div class="hw_box">
                                            <div class="hw_box_img">
                                                <svg width="70" height="70" viewBox="0 0 70 70" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="mask0_3483_50667" style="mask-type:luminance"
                                                        maskUnits="userSpaceOnUse" x="0" y="0" width="70"
                                                        height="70">
                                                        <path d="M70 0H0V70H70V0Z" fill="white" />
                                                    </mask>
                                                    <g mask="url(#mask0_3483_50667)">
                                                        <path
                                                            d="M24.2641 57.0224L1.94601 46.689C1.45741 46.4629 0.881859 46.5444 0.475556 46.8971C0.069117 47.2499 -0.0926112 47.8083 0.0625549 48.3237L3.05364 58.263L0.0624182 68.2023C-0.218384 69.0465 0.488817 69.9898 1.37183 69.9634C1.56637 69.9634 1.76241 69.9218 1.94601 69.8369L24.2641 59.5037C25.3058 59.0423 25.314 57.4861 24.2641 57.0224ZM3.55714 66.0778L5.7903 58.6569C5.86768 58.4 5.86768 58.1259 5.7903 57.8689L3.55714 50.448L20.4358 58.2629L3.55714 66.0778Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M29.0985 40.5195H26.3643C24.5535 40.5862 24.5526 43.1867 26.3643 43.2537H29.0985C30.9092 43.1871 30.91 40.5864 29.0985 40.5195Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M10.2197 37.6186C11.0189 37.6229 11.6605 36.9224 11.5827 36.126C11.5692 35.9794 11.5624 35.8299 11.5624 35.6814C11.5624 35.1156 11.6604 34.5609 11.8537 34.0328C12.4172 32.313 9.96705 31.4145 9.2861 33.0928C8.98219 33.923 8.82812 34.794 8.82812 35.6814C8.82812 35.9131 8.83878 36.147 8.85997 36.3766C8.92532 37.0861 9.52125 37.6186 10.2197 37.6186Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M17.0186 30.8397H19.7528C21.5635 30.773 21.5645 28.1725 19.7528 28.1055H17.0186C15.2077 28.1722 15.2069 30.7727 17.0186 30.8397Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M32.0574 29.4726C32.0574 28.7176 31.4453 28.1055 30.6903 28.1055H27.9561C26.1453 28.1722 26.1444 30.7727 27.9561 30.8397H30.6903C31.4453 30.8397 32.0574 30.2277 32.0574 29.4726Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M15.2167 43.1593C15.962 43.3046 17.3901 43.2381 18.1608 43.2524C19.9715 43.1857 19.9724 40.5851 18.1608 40.5182C17.6135 40.5104 16.1648 40.5564 15.645 40.459C13.8485 40.2359 13.4391 42.8145 15.2167 43.1593Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M53.9323 29.4726C53.9323 28.7176 53.3203 28.1055 52.5652 28.1055H49.831C48.0203 28.1722 48.0194 30.7727 49.831 30.8397H52.5652C53.3203 30.8397 53.9323 30.2277 53.9323 29.4726Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M55.3662 54.9895C54.8135 55.5199 54.1831 55.9509 53.4926 56.2704C52.8072 56.5875 52.5088 57.4001 52.826 58.0853C53.1438 58.7774 53.9713 59.0662 54.6408 58.7519C55.6067 58.3048 56.4878 57.7027 57.2593 56.9622C58.5216 55.6648 56.7152 53.7812 55.3662 54.9895Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M51.0239 40.5273C50.8445 40.5174 48.4811 40.5196 48.2373 40.5202C46.4267 40.5868 46.4255 43.1873 48.2373 43.2544C48.4305 43.259 50.8579 43.2473 50.9722 43.2605C52.7455 43.2037 52.7986 40.6533 51.0239 40.5273Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M60.0256 48.2179C59.8174 47.1717 59.4358 46.1729 58.8917 45.2493C57.9198 43.7226 55.6709 45.046 56.536 46.6373C56.924 47.2958 57.1959 48.0071 57.3441 48.7518C57.7627 50.5193 60.319 49.9988 60.0256 48.2179Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M35.0379 56.8984H32.3037C30.493 56.9651 30.492 59.5656 32.3037 59.6326H35.0379C36.8488 59.5658 36.8496 56.9652 35.0379 56.8984Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M45.9754 56.8945H43.2412C41.4305 56.9612 41.4295 59.5617 43.2412 59.6287H45.9754C47.7861 59.5619 47.7871 56.9613 45.9754 56.8945Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M40.036 40.5195H37.3018C35.4911 40.5862 35.4901 43.1867 37.3018 43.2537H40.036C41.8468 43.1871 41.8477 40.5864 40.036 40.5195Z"
                                                            fill="#333333" />
                                                        <path
                                                            d="M42.9949 29.4726C42.9949 28.7176 42.3829 28.1055 41.6278 28.1055H38.8936C37.0829 28.1722 37.0819 30.7727 38.8936 30.8397H41.6278C42.3829 30.8397 42.9949 30.2277 42.9949 29.4726Z"
                                                            fill="#333333" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M47.6816 11.1273C47.6816 17.307 54.9807 25.0459 58.8407 29.4735C62.7007 25.0459 69.9998 17.307 69.9998 11.1273C69.4528 -3.65941 48.2261 -3.65462 47.6816 11.1273ZM63.0254 11.1273C63.0254 13.4384 61.1518 15.312 58.8407 15.312C53.2959 15.1068 53.2974 7.14699 58.8407 6.9426C61.1518 6.9426 63.0254 8.81622 63.0254 11.1273Z"
                                                            fill="#0FA85B" />
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="hw_box_data">
                                                <h4>Plan Your Trip</h4>
                                                <p>Enter your flight details, pickup, or drop-off location. Customize your ride to match your schedule perfectly.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="animated fadeInUpShort slow delay-250">
                                        <div class="hw_box">
                                            <div class="hw_box_img">
                                                <svg width="70" height="56" viewBox="0 0 70 56" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15.3306 16.078L17.7024 20.1782L20.0742 16.078L24.1744 13.7062L20.0742 11.3346L17.7024 7.23438L15.3306 11.3346L11.2266 13.7062L15.3306 16.078Z"
                                                        fill="#0FA85B" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M30.2786 9.84836L32.8906 14.3632L35.4987 9.84836L40.0135 7.24016L35.4987 4.62816L32.8906 0.113281L30.2786 4.62816L25.7637 7.24016L30.2786 9.84836Z"
                                                        fill="#0FA85B" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6.81641 36.8417H20.2758V27.2578H15.4393C12.8273 27.2578 11.2577 28.0251 10.0021 30.5133L6.81641 36.8417Z"
                                                        fill="#0FA85B" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M31.627 27.2578H42.982V36.8417H31.627V27.2578Z"
                                                        fill="#0FA85B" />
                                                    <path
                                                        d="M65.7098 36.8048C63.7666 35.9593 61.1721 35.4744 58.5916 35.4744H57.3914L51.3829 28.3957C49.4018 26.0632 48.1106 25.9422 45.3789 25.8908C45.3703 25.8907 45.3618 25.8906 45.3532 25.8906H15.4388C12.1462 25.8906 10.2174 27.0513 8.78049 29.8983L5.97365 35.4744H2.62281C1.1766 35.4744 0 36.651 0 38.0972V47.9756C0 49.4218 1.1766 50.5984 2.62281 50.5984H9.98047C10.4772 53.5954 13.086 55.8883 16.2217 55.8883C19.3573 55.8883 21.9661 53.5952 22.4629 50.5984H46.5607C47.0574 53.5954 49.6662 55.8883 52.8019 55.8883C55.9375 55.8883 58.5462 53.5952 59.0431 50.5984H65.5442C68.0012 50.5984 70.0001 48.6013 70.0001 46.1464V42.3795C70 40.6879 69.2557 38.3477 65.7098 36.8048ZM11.2221 31.1289C12.1789 29.2333 13.2035 28.6248 15.4388 28.6248H45.34C47.6216 28.6677 48.0354 28.6783 49.2986 30.1653L53.8048 35.4744H9.03479L11.2221 31.1289ZM16.2217 53.1541C14.2404 53.1541 12.6283 51.542 12.6283 49.5607C12.6283 47.5793 14.2404 45.9673 16.2217 45.9673C18.203 45.9673 19.8151 47.5793 19.8151 49.5607C19.8151 51.542 18.203 53.1541 16.2217 53.1541ZM52.8017 53.1541C50.8204 53.1541 49.2084 51.542 49.2084 49.5607C49.2084 47.5793 50.8204 45.9673 52.8017 45.9673C54.7831 45.9673 56.3951 47.5793 56.3951 49.5607C56.3951 51.542 54.7831 53.1541 52.8017 53.1541ZM65.5441 47.8641H58.8965C58.1529 45.1966 55.703 43.2331 52.8017 43.2331C49.9004 43.2331 47.4504 45.1966 46.707 47.8641H22.3165C21.5729 45.1966 19.123 43.2331 16.2217 43.2331C13.3204 43.2331 10.8704 45.1966 10.1269 47.8641H2.73438V44.2545H5.07213C5.82723 44.2545 6.43932 43.6424 6.43932 42.8873C6.43932 42.1322 5.82723 41.5201 5.07213 41.5201H2.73438V38.2088H58.5916C62.0784 38.2088 67.2656 39.3196 67.2656 42.3795V42.5314H64.7303C63.9752 42.5314 63.3631 43.1435 63.3631 43.8986C63.3631 44.6537 63.9752 45.2658 64.7303 45.2658H67.2656V46.1464C67.2656 47.0936 66.4934 47.8641 65.5441 47.8641Z"
                                                        fill="#333333" />
                                                    <path
                                                        d="M34.3465 41.6719H28.3164C27.5613 41.6719 26.9492 42.284 26.9492 43.0391C26.9492 43.7942 27.5613 44.4063 28.3164 44.4063H34.3465C35.1016 44.4063 35.7137 43.7942 35.7137 43.0391C35.7137 42.284 35.1016 41.6719 34.3465 41.6719Z"
                                                        fill="#333333" />
                                                </svg>
                                            </div>
                                            <div class="hw_box_data">
                                                <h4>Choose Your Vehicle</h4>
                                                <p>From sleek sedans for solo travelers to spacious SUVs for families, we've got the perfect car for every journey.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="animated fadeInUpShort slow delay-500">
                                        <div class="hw_box">
                                            <div class="hw_box_img">
                                                <svg width="70" height="64" viewBox="0 0 70 64" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M67.3524 0.226562H31.8784C30.417 0.226562 29.2324 1.41122 29.2324 2.87261V12.7164H49.963C51.8798 12.7164 53.4336 14.2702 53.4336 16.1872V29.7939H57.6125L60.783 33.0362L63.4592 29.7939H67.3542C68.8156 29.7939 70.0003 28.6093 70.0003 27.1479V2.87425C70.0001 1.41204 68.8148 0.226562 67.3524 0.226562Z"
                                                        fill="#0FA85B" />
                                                    <path
                                                        d="M11.6093 26.7735H43.1927C43.9477 26.7735 44.5599 26.1614 44.5599 25.4063C44.5599 24.6512 43.9477 24.0391 43.1927 24.0391H11.6093C10.8544 24.0391 10.2422 24.6512 10.2422 25.4063C10.2422 26.1614 10.8544 26.7735 11.6093 26.7735Z"
                                                        fill="#333333" />
                                                    <path
                                                        d="M44.5599 32.7266C44.5599 31.9715 43.9477 31.3594 43.1927 31.3594H11.6093C10.8544 31.3594 10.2422 31.9715 10.2422 32.7266C10.2422 33.4817 10.8544 34.0938 11.6093 34.0938H43.1927C43.9477 34.0938 44.5599 33.4817 44.5599 32.7266Z"
                                                        fill="#333333" />
                                                    <path
                                                        d="M37.3181 40.0469C37.3181 39.2918 36.7059 38.6797 35.9509 38.6797H18.8496C18.0946 38.6797 17.4824 39.2918 17.4824 40.0469C17.4824 40.802 18.0946 41.4141 18.8496 41.4141H35.9509C36.706 41.4141 37.3181 40.802 37.3181 40.0469Z"
                                                        fill="#333333" />
                                                    <path
                                                        d="M67.6758 49.7045C67.6758 48.3389 66.9632 47.1093 65.8767 46.4084C66.1531 45.8699 66.3086 45.2618 66.3086 44.624C66.3086 42.4694 64.5694 40.7166 62.4319 40.7166H57.5358V37.9025C57.5358 36.087 56.4 34.5314 54.8007 33.9066V16.1894C54.8007 13.5217 52.6304 11.3516 49.9628 11.3516H4.83998C2.17123 11.3516 0 13.5228 0 16.1915V48.0303C0 50.698 2.17027 52.8681 4.83793 52.8681H9.30248L12.4027 56.6242C12.6496 56.9233 13.0119 57.1035 13.3995 57.1198C13.4188 57.1206 13.4379 57.121 13.4571 57.121C13.8243 57.121 14.1769 56.9732 14.4345 56.7098L18.1919 52.8673L34.013 52.8421V59.094C34.013 59.8491 34.6253 60.4612 35.3802 60.4612H42.6949C43.4499 60.4612 44.0621 59.8491 44.0621 59.094V58.6685H45.7849V58.8103C45.7849 61.5469 48.0112 63.7731 50.7478 63.7731H61.3203C63.4532 63.7731 65.18 62.1162 65.2516 60.001C65.2695 59.473 65.1833 58.9647 65.0106 58.4971C66.5688 57.978 67.6758 56.4869 67.6758 54.7849C67.6758 53.8257 67.3243 52.9336 66.7384 52.2445C67.3243 51.5558 67.6758 50.6635 67.6758 49.7045ZM17.6136 50.1337C17.2464 50.1343 16.8949 50.2825 16.6383 50.545L13.5431 53.7103L11.0011 50.6306C10.7414 50.316 10.3547 50.1337 9.9467 50.1337H4.83793C3.67814 50.1337 2.73438 49.1901 2.73438 48.0303V16.1915C2.73438 15.0305 3.67897 14.0859 4.83998 14.0859H49.9628C51.1226 14.0859 52.0663 15.0296 52.0663 16.1894V33.7762C50.2666 34.2874 48.9446 35.9436 48.9446 37.9022V40.7357C47.1714 40.9216 45.7849 42.4254 45.7849 44.2471V45.7231H44.0621V45.2976C44.0621 44.5425 43.4499 43.9304 42.6949 43.9304H35.3802C34.6253 43.9304 34.013 44.5425 34.013 45.2976V50.1076L17.6136 50.1337ZM41.3278 57.7268H36.7474V46.6649H41.3278V57.7268ZM64.0015 50.8595H62.2362C61.4812 50.8595 60.869 51.4715 60.869 52.2266C60.869 52.9817 61.4812 53.5938 62.2362 53.5938C62.2362 53.5938 63.9079 53.616 63.9583 53.6231C64.5188 53.7025 64.9414 54.2019 64.9414 54.7851C64.9414 55.3501 64.5445 55.8367 64.0099 55.9386L61.7016 55.9831C60.989 55.9969 60.4064 56.5557 60.3634 57.2672C60.3202 57.9787 60.8307 58.6039 61.5364 58.7037C62.1169 58.7859 62.5393 59.3039 62.5189 59.9086C62.4978 60.5318 61.9601 61.0387 61.3203 61.0387H50.7478C49.5191 61.0387 48.5193 60.039 48.5193 58.8103V57.3014C48.5193 56.5463 47.9071 55.9342 47.1521 55.9342H44.0621V48.4576H47.1521C47.9071 48.4576 48.5193 47.8455 48.5193 47.0904V44.2472C48.5193 43.8082 48.8764 43.4509 49.3155 43.4509H50.3118C51.0668 43.4509 51.679 42.8388 51.679 42.0837V37.9025C51.679 37.0454 52.3793 36.348 53.2402 36.348C54.1011 36.348 54.8014 37.0454 54.8014 37.9025V42.0837C54.8014 42.8388 55.4136 43.4509 56.1686 43.4509H62.4319C63.0618 43.4509 63.5742 43.9772 63.5742 44.624C63.5742 45.1804 63.1894 45.6607 62.667 45.7724H62.1333C61.3784 45.7724 60.7662 46.3845 60.7662 47.1396C60.7662 47.8947 61.3784 48.5068 62.1333 48.5068H62.758L64.0147 48.552C64.5468 48.6558 64.9413 49.1412 64.9413 49.7045C64.9414 50.2724 64.5403 50.761 64.0015 50.8595Z"
                                                        fill="#333333" />
                                                </svg>
                                            </div>
                                            <div class="hw_box_data">
                                                <h4>Relax & Fly Worry-Free</h4>
                                                <p>Whether it's an early morning flight or a late-night arrival, we'll get you there on time and in style.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="auto_banner ride_with_section animatedParent animateOnce">
                <div class="autoContent">
                    <div class="banner_inner">
                        <div class="banner_box">
                            <div class="discountBox discountBoxWhite animated slow growIn delay-1000">
                                <h4>
                                    15
                                    <sup>Off</sup>
                                    <sub>%</sub>
                                </h4>
                                <span>Your First Airport Ride</span>
                            </div>
                            <div class="banner_text">
                                <small class="uppercase animated fadeInUpShort slow">TRAVEL STRESS-FREE</small>
                                <h1 class="animated fadeInUpShort slow delay-250">
                                    <span> Book Now with C2C </span>
                                </h1>
                                <p class="uppercase animated fadeInUpShort slow delay-500">Ride with ultimate convenience and comfort.</p>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="our_value_sec padb-0">
                <div class="autoContent">
                    <div class="our_value_inner animatedParent animateOnce">
                        <div class="ov_left">
                            <div class="headlines">
                                <span class="headlines_sub headlines_leftStar animated fadeInUpShort slow">Our Values</span>
                                <h2 class="animated fadeInUpShort slow delay-250">Wherever Your Flight Takes You, We've Got Your Back.</h2>
                                <!-- <p class="animated fadeInUpShort slow delay-500">Maecenas a pellentesque elit,
                                    vitae aliquet nulla. Ut orci orci, tincidunt et enim eget, interdum sodales
                                    risus. Etiam feugiat efficitur dapibus. Phasellus faucibus quam sem. Nullam
                                    ac dolor vel augue cursus dapibus quis et nulla. Etiam vitae interdum
                                    tellus, vitae convallis eros. Donec in malesuada ante. Nunc tincidunt
                                    tincidunt porta. Aenean at congue ligula. Etiam neque mi, accumsan non diam
                                    eu, placerat euismod quam.</p> -->
                            </div>
                            <div class="r_c2c_left_content animatedParent animateOnce">
                                <ul class="d_block">
                                    <li class="animated fadeInUpShort slow delay-500 w_100">
                                        <div class="r_c2c_left_info">
                                            <h4>Be Dependable</h4>
                                            <p>We know timing is everything for flights. That's why punctuality & reliability are at the top of our to-do list. </p>
                                        </div>
                                    </li>
                                    <li class="animated fadeInUpShort slow delay-500 w_100">
                                        <div class="r_c2c_left_info">
                                            <h4>Keep improving</h4>
                                            <p>We're always evolving to make your airport experience perfect, from smoother pickups to better route planning.</p>
                                        </div>
                                    </li>
                                    <li class="animated fadeInUpShort slow delay-500 w_100">
                                        <div class="r_c2c_left_info">
                                            <h4>Care Like Family</h4>
                                            <p>Your comfort and satisfaction matter most. From our chauffeurs to our service, you'll always feel cared for.</p>
                                        </div>
                                    </li>
                                    <li class="animated fadeInUpShort slow delay-500 w_100">
                                        <div class="r_c2c_left_info">
                                            <h4>No Travel Stress</h4>
                                            <p>We track your flight and handle the details, so your airport ride is smooth and hassle-free! </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ov_right animated fadeInRight">
                            <figure>
                                <img src="{{ asset('front/images/airport_ourValues_img.png') }}" alt="#">
                            </figure>
                        </div>
                    </div>
                    <div class="ov_questions animatedParent animateOnce">
                        <div class="ov_questions_inner animated fadeInUpShort slow delay-250">
                            <div class="ovq_left">
                                <div class="headlines text_left">
                                    <h2 class="animated fadeInUpShort slow delay-250">FAQs
                                    </h2>
                                </div>
                                <div class="accordion">
                                    <div class="accordion_item active">
                                        <div class="accordion_header">
                                            <strong>(Q) Can I Book a Ride for Early Morning or Late-Night Flights?</strong>
                                            <span class="plus_icon"></span>
                                        </div>
                                        <div class="accordion_body" style="display: block;">
                                            <div class="accordion_content">
                                                <p>Absolutely! We operate 24/7 to ensure you get to or from the airport whenever you need us.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion_item">
                                        <div class="accordion_header">
                                            <strong>(Q) How Do You Handle Flight Delays?</strong>
                                            <span class="plus_icon"></span>
                                        </div>
                                        <div class="accordion_body">
                                            <div class="accordion_content">
                                                <p>Our chauffeurs monitor your flight in real-time, adjusting schedules so you're never left waiting.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion_item">
                                        <div class="accordion_header">
                                            <strong>(Q) Are Family-Friendly Vehicles Available?</strong>
                                            <span class="plus_icon"></span>
                                        </div>
                                        <div class="accordion_body">
                                            <div class="accordion_content">
                                                <p>Yes! We offer spacious SUVs and options for child seats to make family travel stress-free.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion_item">
                                        <div class="accordion_header">
                                            <strong>(Q) Do You Provide Meet-and-Greet Services?</strong>
                                            <span class="plus_icon"></span>
                                        </div>
                                        <div class="accordion_body">
                                            <div class="accordion_content">
                                                <p>Yes! Our chauffeurs can meet you at arrivals with a name sign to assist with luggage and guide you to your car.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion_item">
                                        <div class="accordion_header">
                                            <strong>(Q) How Do I Book an Airport Ride?</strong>
                                            <span class="plus_icon"></span>
                                        </div>
                                        <div class="accordion_body">
                                            <div class="accordion_content">
                                                <p>Enter your flight details, select your preferred vehicle, and let us handle the rest. It's that easy!</p>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="ovq_right">
                                <div class="customer_say">
                                    <div class="headlines">
                                        <h2 class="animated fadeInUpShort slow delay-250">What our customers say
                                        </h2>
                                        <p class="animated fadeInUpShort slow delay-500">Take a look at the
                                            recent testimonials submitted by our clients.</p>
                                    </div>
                                </div>
                                <div class="comments_slider_main animated fadeInUpShort slow delay-750">
                                    <div class="comments_slider">
                                        <div>
                                            <div class="comments_box">
                                                <div class="comments_box_inner">
                                                    <div class="comments_box_data">
                                                        <p>I've never missed a flight since I started using C2C for airport rides. They're always on time and so professional.</p>
                                                    </div>
                                                    <div class="comments_box_user">
                                                        <a href="javascript:void(0);">
                                                            <i>
                                                                <img src="{{ asset('front/images/comment_user.jpg') }}" alt="#">
                                                            </i>
                                                            <span>Hassan Raza</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="comments_box">
                                                <div class="comments_box_inner">
                                                    <div class="comments_box_data">
                                                        <p>Traveling with kids is never easy, but C2C made it a breeze with their family-friendly cars and excellent service.</p>
                                                    </div>
                                                    <div class="comments_box_user">
                                                        <a href="javascript:void(0);">
                                                            <i>
                                                                <img src="{{ asset('front/images/comment_user.jpg') }}" alt="#">
                                                            </i>
                                                            <span>Mariam Zahra</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="comments_box">
                                                <div class="comments_box_inner">
                                                    <div class="comments_box_data">
                                                        <p>The meet-and-greet service was a lifesaver after a long flight. Smooth, hassle-free, and exactly what I needed.</p>
                                                    </div>
                                                    <div class="comments_box_user">
                                                        <a href="javascript:void(0);">
                                                            <i>
                                                                <img src="{{ asset('front/images/comment_user.jpg') }}" alt="#">
                                                            </i>
                                                            <span>Daniel Pereira</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="comments_box">
                                                <div class="comments_box_inner">
                                                    <div class="comments_box_data">
                                                        <p>C2C's flight monitoring is a game-changer. Even when my flight was delayed, my driver was waiting right on time.</p>
                                                    </div>
                                                    <div class="comments_box_user">
                                                        <a href="javascript:void(0);">
                                                            <i>
                                                                <img src="{{ asset('front/images/comment_user.jpg') }}" alt="#">
                                                            </i>
                                                            <span>Fatima Ali</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="comments_box">
                                                <div class="comments_box_inner">
                                                    <div class="comments_box_data">
                                                        <p>Luxury and affordability in one package. I'll never book another airport ride service again.</p>
                                                    </div>
                                                    <div class="comments_box_user">
                                                        <a href="javascript:void(0);">
                                                            <i>
                                                                <img src="{{ asset('front/images/comment_user.jpg') }}" alt="#">
                                                            </i>
                                                            <span>Aliya Khan </span>
                                                        </a>
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
        </div>
@endsection
@section('script')
    <script>

    $('.comments_slider').slick({
        dots: true,
        arrows: false,
        infinite: true,
        autoplay: true,
        pauseOnHover: true,
        autoplaySpeed: 2000,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
</script>
@endsection