@extends('front.layouts.master')
@section('meta')
 <meta name="description" content="See the best of Dubai with our private chauffeur city tour. Book your ride today." />
@endsection
@section("title")
Dubai City Tour by Private Chauffeur | C2C Rides
@endsection
@section("content")
  <div class="content">
    <div class="gradiantParent">
        <div class="gradiantChild">
            <div class="auto_banner ct_dubai_banner animatedParent animateOnce">
                <div class="autoContent">
                    <div class="banner_inner">
                        <div class="banner_box">
                            <div class="banner_text">
                                <small class="uppercase animated fadeInUpShort slow">Dubai</small>
                                <h1 class="animated fadeInUpShort slow delay-250">
                                   {{-- Luxury, Comfort, and Reliability in Every Ride merge Enjoy next-level rides in the  <span>UAE with C2C</span> --}}
                                   Luxury, Comfort, and Reliability in Every Ride

                                </h1>
                                <p class="animated fadeInUpShort slow delay-500">Affordable. Hassle-Free. Luxurious. Say goodbye to transportation struggles.
                                </p>
                            </div>
                        </div>
                        <div class="banner_right">
                            <div class="rides_box animated fadeInRightShort slow">
                                <div class="ride_tabs">
                                    <div class="ride_tab_header">
                                        <ul>

                                            <li>
                                                <a data-rel=".tab_cityTour" href="javascript:void(0)"
                                                    class="rideTabBtn active">
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
                                                    <em>City Tour</em>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ride_tabs_content">
                                    <div class="ride_tab_show tab_cityTour" style="display: block;">
                                         @include('front.includes.city-tour-form')
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="our_value_sec city_tour_ov">
                <div class="autoContent">
                    <div class="our_value_inner animatedParent animateOnce">
                        <div class="ov_right d_block animated fadeInLeft">
                            <div class="ov_galary">
                                <ul>
                                    <li>
                                        <div class="ov_galary_img">
                                            <img src="{{ asset('front/images/ov_galary_img1.png') }}" alt="#">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ov_galary_img">
                                            <img src="{{ asset('front/images/ov_galary_img2.png') }}" alt="#">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ov_galary_img">
                                            <img src="{{ asset('front/images/ov_galary_img3.png') }}" alt="#">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ov_left">
                            <div class="headlines">
                                <span class="headlines_sub headlines_leftStar animated fadeInUpShort slow">Our
                                    Values</span>
                                <h2 class="animated fadeInUpShort slow delay-250">C2C Ride ensures a hassle-free journey wherever you go.
                                </h2>
                                <p class="animated fadeInUpShort slow delay-500">Discover the city of innovation, where modern skyscrapers meet rich cultural heritage. Enjoy a smooth, luxurious ride through Dubai’s iconic landmarks, from Burj Khalifa to Palm Jumeirah.</p>
                            </div>
                            <div class="ct_exclusive_list animatedParent animateOnce">
                                <ul>
                                    <li class="animated fadeInUpShort slow delay-500 w_100">
                                        <div class="ct_exclusive_icon">
                                            <svg width="65" height="65" viewBox="0 0 65 65" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M52.6023 28.3787C52.0191 28.9322 51.2393 29.2411 50.4278 29.2411C49.6164 29.2411 48.8367 28.9322 48.2535 28.3787C42.9111 23.2835 35.7521 17.5912 39.2435 9.3274C41.1311 4.85918 45.6624 2 50.4278 2C55.1932 2 59.7243 4.85918 61.6121 9.3274C65.0989 17.581 57.9577 23.301 52.6023 28.3787Z"
                                                    stroke="#0FA85B" stroke-width="3.40514" />
                                                <path d="M50.4297 14.1055H50.4572" stroke="#0FA85B"
                                                    stroke-width="4.54018" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M11.0804 62.5357C16.0953 62.5357 20.1608 58.4702 20.1608 53.4554C20.1608 48.4405 16.0953 44.375 11.0804 44.375C6.06541 44.375 2 48.4405 2 53.4554C2 58.4702 6.06541 62.5357 11.0804 62.5357Z"
                                                    stroke="#0FA85B" stroke-width="3.40514"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M29.2414 17.1328H24.7013C18.8503 17.1328 14.1074 21.1983 14.1074 26.2132C14.1074 31.2282 18.8503 35.2935 24.7013 35.2935H33.7816C39.6323 35.2935 44.3752 39.3588 44.3752 44.3739C44.3752 49.389 39.6323 53.4543 33.7816 53.4543H29.2414"
                                                    stroke="#333333" stroke-width="3.40514"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="r_c2c_left_info">
                                            <h4>Exclusive City Tour</h4>
                                            <p>Discover Dubai beyond the usual. Explore hidden gems with tailored culinary, shopping, architectural, or cultural routes—or create your own itinerary.</p>
                                        </div>
                                    </li>
                                    <li class="animated fadeInUpShort slow delay-500 w_100">
                                        <div class="ct_exclusive_icon">
                                            <svg width="65" height="65" viewBox="0 0 65 65" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M32.2679 62.5357L26.2142 44.375H2L8.05356 62.5357H32.2679ZM32.2679 62.5357H44.375"
                                                    stroke="#333333" stroke-width="3.40514"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M32.269 35.2924V33.779C32.269 28.0717 32.269 25.218 30.4958 23.445C28.7229 21.6719 25.8691 21.6719 20.1619 21.6719C14.4545 21.6719 11.6008 21.6719 9.82776 23.445C8.05469 25.218 8.05469 28.0717 8.05469 33.779V35.2924"
                                                    stroke="#333333" stroke-width="3.40514"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M53.4547 35.2958C53.4547 38.6392 50.7447 41.3493 47.4013 41.3493C44.0579 41.3493 41.3477 38.6392 41.3477 35.2958C41.3477 31.9525 44.0579 29.2422 47.4013 29.2422C50.7447 29.2422 53.4547 31.9525 53.4547 35.2958Z"
                                                    stroke="#333333" stroke-width="3.40514" />
                                                <path
                                                    d="M26.2145 8.05358C26.2145 11.3969 23.5042 14.1072 20.1611 14.1072C16.8177 14.1072 14.1074 11.3969 14.1074 8.05358C14.1074 4.71028 16.8177 2 20.1611 2C23.5042 2 26.2145 4.71028 26.2145 8.05358Z"
                                                    stroke="#0FA85B" stroke-width="3.40514" />
                                                <path
                                                    d="M38.3223 48.9141H56.483C59.8264 48.9141 62.5364 51.6243 62.5364 54.9677V56.481C62.5364 59.8243 59.8264 62.5346 56.483 62.5346H53.4561"
                                                    stroke="#0FA85B" stroke-width="3.40514"
                                                    stroke-linecap="round" />
                                            </svg>

                                        </div>
                                        <div class="r_c2c_left_info">
                                            <h4>Professional Guide</h4>
                                            <p>Dubai is filled with stories waiting to be unveiled. Who better to guide you than the locals? Our professional guides will share everything there is to know, from authentic insight to stunning tales about this one-of-a-kind city.</p>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="visit_places">
                <div class="autoContent">
                    <div class="visit_places_inner animatedParent animateOnce">
                        <div class="headlines">
                            <h2 class="animated fadeInUpShort slow delay-250">Visit Places
                            </h2>
                        </div>
                        <div class="visit_places_slider_main">
                            <div class="visit_places_slider">
                                <div>
                                    <div class="vp_slider_box">
                                        <div class="vp_slider_img">
                                            <img src="{{ asset('front/images/vp_burj_khalifa.png') }}" alt="#">
                                        </div>
                                        <div class="vp_slider_text">
                                            <span>Burj Khalifa</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="vp_slider_box">
                                        <div class="vp_slider_img">
                                            <img src="{{ asset('front/images/vp_palm.png') }}" alt="#">
                                        </div>
                                        <div class="vp_slider_text">
                                            <span>Palm Jumeirah</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="vp_slider_box">
                                        <div class="vp_slider_img">
                                            <img src="{{ asset('front/images/vp_dubai_marina.png') }}" alt="#">
                                        </div>
                                        <div class="vp_slider_text">
                                            <span>Dubai Marina</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="vp_slider_box">
                                        <div class="vp_slider_img">
                                            <img src="{{ asset('front/images/vp_burj_arab.png') }}" alt="#">
                                        </div>
                                        <div class="vp_slider_text">
                                            <span>Burj Al Arab</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="vp_slider_box">
                                        <div class="vp_slider_img">
                                            <img src="{{ asset('front/images/vp_dubai_mall.png') }}" alt="#">
                                        </div>
                                        <div class="vp_slider_text">
                                            <span>Dubai Mall</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="vp_slider_box">
                                        <div class="vp_slider_img">
                                            <img src="{{ asset('front/images/vp_fountain.png') }}" alt="#">
                                        </div>
                                        <div class="vp_slider_text">
                                            <span>The Dubai Fountain</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="vp_slider_box">
                                        <div class="vp_slider_img">
                                            <img src="{{ asset('front/images/vp_jumera_beach.png') }}" alt="#">
                                        </div>
                                        <div class="vp_slider_text">
                                            <span>Jumeirah Beach</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="vp_slider_box">
                                        <div class="vp_slider_img">
                                            <img src="{{ asset('front/images/vp_dubai_frame.png') }}" alt="#">
                                        </div>
                                        <div class="vp_slider_text">
                                            <span>Dubai Frame</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="vp_slider_box">
                                        <div class="vp_slider_img">
                                            <img src="{{ asset('front/images/vp_miracle_garden.png') }}" alt="#">
                                        </div>
                                        <div class="vp_slider_text">
                                            <span>Miracle garden</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="vp_slider_box">
                                        <div class="vp_slider_img">
                                            <img src="{{ asset('front/images/vp_citywalk.png') }}" alt="#">
                                        </div>
                                        <div class="vp_slider_text">
                                            <span>Citywalk</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="vp_slider_box">
                                        <div class="vp_slider_img">
                                            <img src="{{ asset('front/images/vp_zabeel.png') }}" alt="#">
                                        </div>
                                        <div class="vp_slider_text">
                                            <span>Zabeel palace</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ov_questions_main">
                <div class="autoContent">
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
                                            <strong>(Q) What is the average length of your city tours in Dubai? </strong>
                                            <span class="plus_icon"></span>
                                        </div>
                                        <div class="accordion_body" style="display: block;">
                                            <div class="accordion_content">
                                                <p>Our tours take 5-10 hours, and we also provide services such as  half day or full day sights” tour and multi-day tours. We can change the duration of the tours according to your preferences and time.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion_item">
                                        <div class="accordion_header">
                                            <strong>(Q) What are the best months to plan a trip to Dubai? </strong>
                                            <span class="plus_icon"></span>
                                        </div>
                                        <div class="accordion_body">
                                            <div class="accordion_content">
                                                <p>November to March is the most comfortable time to visit (21-29 degrees Celsius). September, also known as summer, is unbearably hot for most people (frequently going more than 38 degrees). Still, it is the least crowded time of the year, and our air-conditioned cars are always set to the perfect temperature </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion_item">
                                        <div class="accordion_header">
                                            <strong>(Q) Can tours be designed to accommodate families with children? </strong>
                                            <span class="plus_icon"></span>
                                        </div>
                                        <div class="accordion_body">
                                            <div class="accordion_content">
                                                <p>Yes, of course! Our routes include breaks, fun stops, and child seats for toddlers. Children will have their own special guides to enjoy the experience, too.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion_item">
                                        <div class="accordion_header">
                                            <strong>(Q) How far in advance should I reserve my city tour in Dubai? </strong>
                                            <span class="plus_icon"></span>
                                        </div>
                                        <div class="accordion_body">
                                            <div class="accordion_content">
                                                <p>Our city tours are always available, but we recommend booking in advance to secure your preferred time and ensure a seamless experience. Scheduling at least 24 hours ahead allows us to tailor the tour to your interests and provide the best service. </p>
                                            </div>
                                        </div>
                                    </div> 
                                    {{-- <div class="accordion_item">
                                        <div class="accordion_header">
                                            <strong>(Q) In which areas do you operate?</strong>
                                            <span class="plus_icon"></span>
                                        </div>
                                        <div class="accordion_body">
                                            <div class="accordion_content">
                                                <p>Proin venenatis, ex at semper viverra, erat augue egestas
                                                    nibh, eget
                                                    posuere magna ex in tortor. Nam euismod, odio at condimentum
                                                    imperdiet, nisi libero accumsan risus, eu venenatis mauris
                                                    ligula
                                                    sit amet quam. Vestibulum aliquet, mauris varius cursus
                                                    blandit,
                                                    velit odio dictum orci, at facilisis odio orci ut sem. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion_item">
                                        <div class="accordion_header">
                                            <strong>(Q) In which areas do you operate?</strong>
                                            <span class="plus_icon"></span>
                                        </div>
                                        <div class="accordion_body">
                                            <div class="accordion_content">
                                                <p>Proin venenatis, ex at semper viverra, erat augue egestas
                                                    nibh, eget
                                                    posuere magna ex in tortor. Nam euismod, odio at condimentum
                                                    imperdiet, nisi libero accumsan risus, eu venenatis mauris
                                                    ligula
                                                    sit amet quam. Vestibulum aliquet, mauris varius cursus
                                                    blandit,
                                                    velit odio dictum orci, at facilisis odio orci ut sem. </p>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="ovq_right">
                                <div class="customer_say">
                                    <div class="headlines">
                                        <h2 class="animated fadeInUpShort slow delay-250">What our
                                            customers
                                            say
                                        </h2>
                                        <p class="animated fadeInUpShort slow delay-500">Take a look at
                                            the
                                            recent testimonials submitted by our clients.</p>
                                    </div>
                                </div>
                                <div class="comments_slider_main animated fadeInUpShort slow delay-750">
                                    <div class="comments_slider">
                                        <div>
                                            <div class="comments_box">
                                                <div class="comments_box_inner">
                                                    <div class="comments_box_data">
                                                        <p>The City Tour was the highlight of our trip! Our
                                                            chauffeur, Ali, was so polite and even recommended a
                                                            great local spot for lunch. The car was spotless and
                                                            super comfy. Highly recommend it!</p>
                                                    </div>
                                                    <div class="comments_box_user">
                                                        <a href="javascript:void(0);">
                                                            <i>
                                                                <img src="{{ asset('front/images/comment_user.jpg') }}" alt="#">
                                                            </i>
                                                            <span>Sarah M.</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="comments_box">
                                                <div class="comments_box_inner">
                                                    <div class="comments_box_data">
                                                        <p>C2C Ride made our day in Abu Dhabi effortless. The
                                                            driver was on time, the car was amazing, and we
                                                            didn't have to worry about a thing. 10/10
                                                            experience!</p>
                                                    </div>
                                                    <div class="comments_box_user">
                                                        <a href="javascript:void(0);">
                                                            <i>
                                                                <img src="{{ asset('front/images/comment_user.jpg') }}" alt="#">
                                                            </i>
                                                            <span>David R.</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="comments_box">
                                                <div class="comments_box_inner">
                                                    <div class="comments_box_data">
                                                        <p>I booked the City Tour for my parents, and they loved
                                                            it! The chauffeur was so patient and made sure they
                                                            were comfortable the whole time. They're still
                                                            talking about it!</p>
                                                    </div>
                                                    <div class="comments_box_user">
                                                        <a href="javascript:void(0);">
                                                            <i>
                                                                <img src="{{ asset('front/images/comment_user.jpg') }}" alt="#">
                                                            </i>
                                                            <span>Ayesha K.</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="comments_box">
                                                <div class="comments_box_inner">
                                                    <div class="comments_box_data">
                                                        <p>I was skeptical about a full-day tour, but wow—this
                                                            was worth it. The car had Wi-Fi, so I could stay
                                                            connected, and our driver gave us tips for the best
                                                            photo spots in Dubai.</p>
                                                    </div>
                                                    <div class="comments_box_user">
                                                        <a href="javascript:void(0);">
                                                            <i>
                                                                <img src="{{ asset('front/images/comment_user.jpg') }}" alt="#">
                                                            </i>
                                                            <span>Tom L.</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="comments_box">
                                                <div class="comments_box_inner">
                                                    <div class="comments_box_data">
                                                        <p>Our Sharjah tour was amazing! The vehicle was
                                                            luxurious, and the driver felt more like a tour
                                                            guide with all his local insights. Loved every
                                                            minute of it!</p>
                                                    </div>
                                                    <div class="comments_box_user">
                                                        <a href="javascript:void(0);">
                                                            <i>
                                                                <img src="{{ asset('front/images/comment_user.jpg') }}" alt="#">
                                                            </i>
                                                            <span>Maria G.</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="comments_box">
                                                <div class="comments_box_inner">
                                                    <div class="comments_box_data">
                                                        <p>Perfect for anyone who doesn't want the hassle of
                                                            planning or driving. We got to visit all the
                                                            must-see spots without any stress. Thanks, C2C Ride!
                                                        </p>
                                                    </div>
                                                    <div class="comments_box_user">
                                                        <a href="javascript:void(0);">
                                                            <i>
                                                                <img src="{{ asset('front/images/comment_user.jpg') }}" alt="#">
                                                            </i>
                                                            <span>Naveen P.</span>
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
    </div>
</div>
@endsection
@section("script")
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

    $('.visit_places_slider').slick({
        dots: true,
        arrows: true,
        infinite: true,
        autoplay: true,
        pauseOnHover: true,
        autoplaySpeed: 2000,
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1360,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
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