@extends('front.layouts.master')
@section('title')
 C2C Ride-Booking
@endsection
@section('style')
    <!-- Hotjar Tracking Code for City 2 City  -->

    <style>
       
        .grecaptcha-badge {
  visibility: hidden;
}
    </style>

<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:5350771,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
@endsection
@section('content')
<div class="content">
<div class="vehicleSec gradiantParent">
    <div class="gradiantChild">
        <div class="vehicleSec_inner">
            <div class="animatedParent animateOnce">
                <div class="vehicle_header animated fadeInUpShort slow">
                    <div class="autoContent">
                        <div class="vehicle_header_inner">
                            <div>
                                <div class="vh_Details">
                                    <div class="vh_details_img">
                                        <img src="{{ asset('front/images/vHeader_img1.png') }}" alt="#">
                                    </div>
                                    <div class="vh_Details_text">
                                        <h4>Flexible Cancellation</h4>
                                        <p>Cancel up to 24 hours before your trip at no cost</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="vh_Details">
                                    <div class="vh_details_img">
                                        <img src="{{ asset('front/images/vHeader_img2.png') }}" alt="#">
                                    </div>
                                    <div class="vh_Details_text">
                                        <h4>Real-Time Flight Monitoring</h4>
                                        <p>Our drivers will track your flight for seamless pick-up</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="vh_Details">
                                    <div class="vh_details_img">
                                        <img src="{{ asset('front/images/vHeader_img3.png') }}" alt="#">
                                    </div>
                                    <div class="vh_Details_text">
                                        <h4>Certified Chauffeurs</h4>
                                        <p>Ensuring your comfort and safety with licensed professionals.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="vh_Details">
                                    <div class="vh_details_img">
                                        <img src="{{ asset('front/images/vHeader_img4.png') }}" alt="#">
                                    </div>
                                    <div class="vh_Details_text">
                                        <h4>Around-the-Clock Support</h4>
                                        <p>Our dedicated team is here for you 24/7</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="vh_Details">
                                    <div class="vh_details_img">
                                        <img src="{{ asset('front/images/vHeader_img5.png') }}" alt="#">
                                    </div>
                                    <div class="vh_Details_text">
                                        <h4>Luxury Fleet</h4>
                                        <p>Enjoy your ride in style and comfort with our premium
                                            vehicles.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="vehicle_content">
                <div class="autoContent">
                    <div class="vehicle_content_inner">
                        <div class="vc_left">
                            <div class="vehicle_plan_content animatedParent animateOnce">
                                <div class="vehicle_plan animated fadeInUpShort slow">
                                    <ul>
                                        <li class="veh_progressLi veh_progress1 active">
                                            <div class="vehicle_plan_details">
                                                <h4>Vehicle</h4>
                                            </div>
                                        </li>
                                        <li class="veh_progressLi veh_progress2">
                                            <div class="vehicle_plan_details">
                                                <h4>Details</h4>
                                            </div>
                                        </li>
                                        <li class="veh_progressLi veh_progress3">
                                            <div class="vehicle_plan_details">
                                                <h4>Payment</h4>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="bookingDetailsMain">
                                <div class="vc_left_content">

                                    <!-- step 1 booking details list -->
                                    <div class="bookingDetailsList_sec">
                                        <div class="animatedParent animateOnce bookingDetailsList_title">
                                            <h2 class="animated fadeInUpShort slow">Vehicle</h2>
                                        </div>
                                        <div class="animatedParent animateOnce">
                                            <ul class="bookingCardUl animated fadeInUpShort slow">
                                                @foreach($vehicles as $vehicle)
                                                  
                                                 @if($vehicle->passengers >= $data['total_passengers'] && ((session("step_one_data")['ride_type_id'] == 1 && !empty($vehicle->cityridepricing)) || (session("step_one_data")['ride_type_id'] == 2 && !empty($vehicle->hourlyridepricing)) || (session("step_one_data")['ride_type_id'] == 3 && !empty($vehicle->citytourpricing)) ))
                                                 <li class="bookingCardList">
                                                    <div class="v_card">
                                                        @php $discount = $vehicle->apply_discount == 1 ? $vehicle->discount : 0; @endphp
                                                        @if($vehicle->apply_discount == 1)
                                                        <div class="discountText">
                                                            <span>{{ $discount }}% OFF</span>
                                                        </div>
                                                        @endif
                                                        <div class="v_card_inner">
                                                            <div class="v_card_left">
                                                                <div class="v_card_left_box">
                                                                    <?php if($vehicle->id==7)
                                                                        $color = "#ff007f";
                                                                    else    
                                                                        $color = "";
                                                                    ?>
                                                                    <h4 style="background-color:<?php echo $color; ?>">{{ $vehicle->type }}</h4>
                                                                    <div class="v_card_sliderBox">
                                                                        @php $images = !empty($vehicle->images) ? explode(",", $vehicle->images) : array(); 
                                                                             $descript_arr = !empty($vehicle->short_descriptions) ? explode(",",$vehicle->short_descriptions) : array();
                                                                         @endphp
                                                                        @if (count($vehicle->image_list) > 0)
                                                                            @foreach($vehicle->image_list as $key => $image)
                                                                                <div class="v_card_sliderBox_li">
                                                                                    <div class="v_card_left_img">
                                                                                        <img src="{{ asset('front/images/'.$image->image_path) }}"
                                                                                            alt="#">
                                                                                    </div>
                                                                                    
                                                                                    <p>{{ $image->description }}
                                                                                    </p>
                                                                                </div>
                                                                           @endforeach
                                                                        @endif
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="v_card_middle">
                                                                <h4>{{ $vehicle->title }}</h4>

                                                                <ul>
                                                                    <li class="card_distance_mobile">
                                                                        <div class="v_card_spec">
                                                                            <i>
                                                                                <svg width="13" height="13"
                                                                                    viewBox="0 0 13 13"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M1.07842 2.39936C1.49563 0.594949 4.21267 0.594949 4.62466 2.39936C4.86977 3.45801 4.19703 4.355 3.61294 4.91301C3.18531 5.31979 2.51256 5.31457 2.08493 4.91301C1.50606 4.355 0.833317 3.45801 1.07842 2.39936Z"
                                                                                        stroke="#0FA85B"
                                                                                        stroke-width="0.782258" />
                                                                                    <path
                                                                                        d="M7.86013 8.65702C8.27733 6.85261 11.01 6.85261 11.4272 8.65702C11.6723 9.71567 10.9996 10.6127 10.4103 11.1707C9.98266 11.5774 9.3047 11.5722 8.87707 11.1707C8.28777 10.6127 7.61502 9.71567 7.86013 8.65702Z"
                                                                                        stroke="#0FA85B"
                                                                                        stroke-width="0.782258" />
                                                                                    <path
                                                                                        d="M6.25889 2.60751H7.65652C8.62131 2.60751 9.0698 3.80176 8.34491 4.438L4.17808 8.08332C3.45319 8.71434 3.90168 9.90859 4.86125 9.90859H6.25889"
                                                                                        stroke="#0FA85B"
                                                                                        stroke-width="0.782258"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M2.86177 2.86827H2.86779"
                                                                                        stroke="#0FA85B"
                                                                                        stroke-width="1.04301"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M9.64131 9.12599H9.64734"
                                                                                        stroke="#0FA85B"
                                                                                        stroke-width="1.04301"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>

                                                                            </i>
                                                                            <span>@if(session("step_one_data")["ride_type_id"] == 1) {{ $data['distance'] }} KM / {{ $data['duration'] }}@endif</span>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="v_card_spec">
                                                                            <i>
                                                                                <svg width="18" height="18"
                                                                                    viewBox="0 0 18 18"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M9 9C11.0711 9 12.75 7.32107 12.75 5.25C12.75 3.17893 11.0711 1.5 9 1.5C6.92893 1.5 5.25 3.17893 5.25 5.25C5.25 7.32107 6.92893 9 9 9Z"
                                                                                        stroke="#292D32"
                                                                                        stroke-width="1.3"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M15.4436 16.5C15.4436 13.5975 12.5561 11.25 9.00109 11.25C5.44609 11.25 2.55859 13.5975 2.55859 16.5"
                                                                                        stroke="#292D32"
                                                                                        stroke-width="1.3"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </i>
                                                                            <span>{{ $vehicle->passengers}} Passengers</span>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="v_card_spec">
                                                                            <i>
                                                                                <svg width="15" height="16"
                                                                                    viewBox="0 0 15 16"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <mask id="mask0_4400_31"
                                                                                        style="mask-type:luminance"
                                                                                        maskUnits="userSpaceOnUse"
                                                                                        x="0" y="0"
                                                                                        width="15"
                                                                                        height="16">
                                                                                        <path
                                                                                            d="M14.8249 0.707275H0.361572V15.1706H14.8249V0.707275Z"
                                                                                            fill="white"
                                                                                            stroke="white"
                                                                                            stroke-width="0.0874701" />
                                                                                    </mask>
                                                                                    <g
                                                                                        mask="url(#mask0_4400_31)">
                                                                                        <path
                                                                                            d="M10.4864 4.56417H9.04011V1.91256H9.52225C9.65539 1.91256 9.76328 1.80462 9.76328 1.6715V0.94833C9.76328 0.815209 9.65539 0.707275 9.52225 0.707275H5.66535C5.53223 0.707275 5.4243 0.815209 5.4243 0.94833V1.6715C5.4243 1.80462 5.53223 1.91256 5.66535 1.91256H6.14747V4.56417H4.70113C4.03575 4.56499 3.49667 5.10407 3.49585 5.76945V13.2421C3.49667 13.9075 4.03575 14.4467 4.70113 14.4475V14.9296C4.70113 15.0627 4.80906 15.1706 4.94218 15.1706H5.90641C6.03953 15.1706 6.14747 15.0627 6.14747 14.9296V14.4475H9.04011V14.9296C9.04011 15.0627 9.14808 15.1706 9.28122 15.1706H10.2454C10.3786 15.1706 10.4864 15.0627 10.4864 14.9296V14.4475C11.1518 14.4467 11.691 13.9075 11.6918 13.2421V5.76945C11.691 5.10407 11.1518 4.56499 10.4864 4.56417ZM5.90641 1.18939H9.28122V1.43044H5.90641V1.18939ZM6.62957 1.91256H8.55805V4.56417H6.62957V1.91256ZM5.66535 14.6885H5.18324V14.4475H5.66535V14.6885ZM10.0044 14.6885H9.52225V14.4475H10.0044V14.6885ZM11.2096 13.2421C11.2096 13.6416 10.8859 13.9653 10.4864 13.9653H4.70113C4.30176 13.9653 3.97796 13.6416 3.97796 13.2421V5.76945C3.97796 5.37008 4.30176 5.04628 4.70113 5.04628H10.4864C10.8859 5.04628 11.2096 5.37008 11.2096 5.76945V13.2421Z"
                                                                                            fill="black"
                                                                                            stroke="black"
                                                                                            stroke-width="0.0874701" />
                                                                                        <path
                                                                                            d="M7.59359 5.5285C7.46047 5.5285 7.35254 5.63644 7.35254 5.76956V13.2423C7.35254 13.3754 7.46047 13.4834 7.59359 13.4834C7.72673 13.4834 7.83462 13.3754 7.83462 13.2423V5.76956C7.83462 5.63644 7.72673 5.5285 7.59359 5.5285Z"
                                                                                            fill="black"
                                                                                            stroke="black"
                                                                                            stroke-width="0.0874701" />
                                                                                        <path
                                                                                            d="M9.52301 6.01105C9.38988 6.01105 9.28198 6.11898 9.28198 6.2521V12.7606C9.28198 12.8938 9.38988 13.0016 9.52301 13.0016C9.65615 13.0016 9.76405 12.8938 9.76405 12.7606V6.2521C9.76405 6.11898 9.65615 6.01105 9.52301 6.01105Z"
                                                                                            fill="black"
                                                                                            stroke="black"
                                                                                            stroke-width="0.0874701" />
                                                                                        <path
                                                                                            d="M5.66635 6.01105C5.53323 6.01105 5.42529 6.11898 5.42529 6.2521V12.7606C5.42529 12.8938 5.53323 13.0016 5.66635 13.0016C5.79947 13.0016 5.90741 12.8938 5.90741 12.7606V6.2521C5.90741 6.11898 5.79947 6.01105 5.66635 6.01105Z"
                                                                                            fill="black"
                                                                                            stroke="black"
                                                                                            stroke-width="0.0874701" />
                                                                                    </g>
                                                                                </svg>
                                                                            </i>
                                                                            <span><span
                                                                                    class="hideOnMobile">Upto
                                                                                </span>{{ $vehicle->suitcases}} Suitcases</span>
                                                                        </div>
                                                                    </li>
                                                                    <li class="hideOnMobile">
                                                                        <div class="v_card_spec">
                                                                            <i>
                                                                                <svg width="15" height="21"
                                                                                    viewBox="0 0 15 21"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M10.7228 5.82816H13.2733C13.3359 5.82816 13.6807 5.97551 13.7587 6.0238C14.4311 6.43924 14.545 7.38403 13.986 7.94681C13.8987 8.03473 13.4263 8.30467 13.3353 8.30467H10.7228V18.2416C10.7228 18.8936 9.74145 19.8817 9.06598 19.9281C7.05506 19.8272 4.81072 20.1182 2.82704 19.9467C1.77329 19.8557 1.02291 18.9041 1 17.8733V2.94675C1.04086 1.98462 1.70147 1.13951 2.64935 0.943251C4.66956 1.08875 7.0402 0.721604 9.02078 0.936441C9.74578 1.01507 10.7228 1.89361 10.7228 2.63966V5.82816ZM10.4132 5.82816V2.63966C10.4132 2.6087 10.2169 2.14002 10.1786 2.06944C9.90242 1.56919 9.38112 1.26953 8.81771 1.20143C7.0272 0.985971 4.90112 1.32835 3.07469 1.18162C2.06552 1.26148 1.36405 1.91218 1.30956 2.94551V17.9952C1.356 18.7846 1.94293 19.4626 2.71065 19.6285C4.68628 19.4743 7.02596 19.8532 8.95887 19.6341C9.52475 19.5697 10.4138 18.8261 10.4138 18.241V8.30405H5.61559C5.58835 8.30405 5.24659 8.14369 5.19211 8.1084C4.44358 7.62239 4.46773 6.39466 5.28126 5.9879C5.34193 5.95756 5.70722 5.82754 5.74003 5.82754H10.4144L10.4132 5.82816ZM5.75303 6.15258C4.66647 6.33461 4.70114 7.80132 5.73694 7.99696H13.2127C14.363 7.78584 14.2782 6.28941 13.1495 6.13772L5.75303 6.15258Z"
                                                                                        fill="black"
                                                                                        stroke="black"
                                                                                        stroke-width="0.5" />
                                                                                    <path
                                                                                        d="M7.93548 5.14818C7.80113 5.28253 7.50271 4.91724 7.3987 4.84976C6.11959 4.01765 4.46776 4.2653 3.63813 5.58776C2.23952 7.81785 4.67454 10.5005 7.0619 9.32109C7.19625 9.25485 7.67483 8.8066 7.74975 9.08149C7.82466 9.35638 6.84954 9.75138 6.62293 9.81082C4.50676 10.3649 2.57818 8.5187 3.01033 6.38396C3.39667 4.47395 5.50851 3.50749 7.23525 4.3947C7.38198 4.47024 8.13608 4.9482 7.93548 5.1488V5.14818Z"
                                                                                        fill="black"
                                                                                        stroke="black"
                                                                                        stroke-width="0.5" />
                                                                                    <path
                                                                                        d="M5.50607 13.1481C6.79571 12.9289 7.5591 14.3201 6.73132 15.3014C6.64403 15.4054 6.42671 15.5088 6.39947 15.5887C6.27998 15.9366 6.61369 17.0269 5.80078 17.025C4.94453 17.0225 5.32529 16.0802 5.20022 15.6537C5.16184 15.5236 4.90304 15.398 4.78912 15.2599C4.16504 14.5052 4.54643 13.3109 5.50607 13.1481ZM5.50545 13.457C5.06464 13.548 4.73712 14.0879 4.77612 14.5262C4.82875 15.115 5.41073 15.2834 5.45035 15.4029C5.54012 15.6741 5.26833 16.7774 5.79768 16.7272C6.28246 16.6814 5.98837 15.7081 6.08929 15.4029C6.13449 15.2648 6.65393 15.1788 6.74556 14.6358C6.88053 13.8334 6.2936 13.2954 5.50545 13.4576V13.457Z"
                                                                                        fill="black"
                                                                                        stroke="black"
                                                                                        stroke-width="0.5" />
                                                                                </svg>

                                                                            </i>
                                                                            <span>Door-To-Door</span>
                                                                        </div>
                                                                    </li>
                                                                    <!--  -->
                                                                    <li class="hideOnMobile">
                                                                        <div class="v_card_spec">
                                                                            <i>
                                                                                <svg width="20" height="20"
                                                                                    viewBox="0 0 20 20"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M18.7 7H17.6242L16.2121 5.5879C16.156 5.5315 16.0798 5.5 16 5.5H10.3H4.3C4.2202 5.5 4.144 5.5315 4.0879 5.5879L2.6758 7H1.3C1.1341 7 1 7.1344 1 7.3V15.4C1 15.5656 1.1341 15.7 1.3 15.7H2.6758L5.515 18.5392C5.812 18.8365 6.2068 19 6.6274 19C7.4332 19 8.0917 18.3883 8.182 17.6062L9.115 18.5392C9.41197 18.8365 9.80683 19 10.2274 19C11.0332 19 11.6917 18.3883 11.782 17.6062L12.715 18.5392C13.012 18.8365 13.4068 19 13.8274 19C14.6332 19 15.2917 18.3883 15.382 17.6062L16.315 18.5392C16.612 18.8365 17.0068 19 17.4274 19C18.2944 19 19 18.2944 19 17.4271C19 17.0074 18.8365 16.6123 18.5395 16.315L17.9242 15.7H18.7C18.8659 15.7 19 15.5656 19 15.4V7.3C19 7.1344 18.8659 7 18.7 7ZM18.4 17.4271C18.4 17.9635 17.9638 18.4 17.4274 18.4C17.1673 18.4 16.9231 18.2989 16.7395 18.115L14.9398 16.3156L13.5121 14.8879L13.0879 15.3121L14.515 16.7392C14.6989 16.9231 14.8 17.1676 14.8 17.4271C14.8 17.9635 14.3638 18.4 13.8274 18.4C13.5673 18.4 13.3231 18.2989 13.1395 18.115L11.3398 16.3156L9.91213 14.8879L9.4879 15.3121L10.915 16.7392C11.0989 16.9231 11.2 17.1676 11.2 17.4271C11.2 17.9635 10.7638 18.4 10.2274 18.4C9.96727 18.4 9.72313 18.2989 9.53953 18.115L7.7398 16.3156L6.3121 14.8879L5.8879 15.3121L7.315 16.7392C7.4989 16.9231 7.6 17.1676 7.6 17.4271C7.6 17.9635 7.1638 18.4 6.6274 18.4C6.3673 18.4 6.1231 18.2989 5.9395 18.115L3.0121 15.1879C2.956 15.1315 2.8798 15.1 2.8 15.1H1.6V7.6H2.8C2.8798 7.6 2.956 7.5685 3.0121 7.5121L4.4242 6.1H9.57577L7.5229 8.1529C7.1857 8.4901 7 8.9383 7 9.415C7 10.3993 7.8007 11.2 8.785 11.2C9.26167 11.2 9.70987 11.0143 10.0471 10.6771L11.05 9.6742L18.115 16.7392C18.2989 16.9231 18.4 17.1676 18.4 17.4271ZM18.4 15.1H17.3242L11.4742 9.24997L12.0121 8.7121L11.5879 8.2879L9.6229 10.2529C9.39913 10.4767 9.1015 10.6 8.785 10.6C8.1316 10.6 7.6 10.0684 7.6 9.415C7.6 9.0985 7.7233 8.8009 7.9471 8.5771L10.4242 6.1H15.8758L17.2879 7.5121C17.344 7.5685 17.4202 7.6 17.5 7.6H18.4V15.1ZM9.1 1H6.7C5.7073 1 4.9 1.8073 4.9 2.8C4.9 3.7927 5.7073 4.6 6.7 4.6H9.1C9.2206 4.6 9.34153 4.5877 9.45943 4.564L9.34063 3.976C9.26167 3.9919 9.1807 4 9.1 4H6.7C6.0382 4 5.5 3.4618 5.5 2.8C5.5 2.1382 6.0382 1.6 6.7 1.6H9.1C9.76183 1.6 10.3 2.1382 10.3 2.8C10.3 2.9671 10.2664 3.1285 10.2004 3.28L10.75 3.52C10.8496 3.2926 10.9 3.0502 10.9 2.8C10.9 1.8073 10.0927 1 9.1 1Z"
                                                                                        fill="black"
                                                                                        stroke="black"
                                                                                        stroke-width="0.2" />
                                                                                    <path
                                                                                        d="M9.2516 2.08C9.15196 2.3074 9.10156 2.5498 9.10156 2.8C9.10156 3.7927 9.90885 4.6 10.9015 4.6H13.3016C14.2943 4.6 15.1016 3.7927 15.1016 2.8C15.1016 1.8073 14.2943 1 13.3016 1H10.9015C10.7809 1 10.6601 1.0123 10.5422 1.036L10.661 1.624C10.7399 1.6081 10.8209 1.6 10.9015 1.6H13.3016C13.9633 1.6 14.5015 2.1382 14.5015 2.8C14.5015 3.4618 13.9633 4 13.3016 4H10.9015C10.2398 4 9.7016 3.4618 9.7016 2.8C9.7016 2.6329 9.73515 2.4715 9.80117 2.32L9.2516 2.08Z"
                                                                                        fill="black"
                                                                                        stroke="black"
                                                                                        stroke-width="0.2" />
                                                                                </svg>
                                                                            </i>
                                                                            <span>Meet & Greet
                                                                                Included</span>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="v_card_spec">
                                                                            <i>
                                                                                <svg width="12" height="13"
                                                                                    viewBox="0 0 12 13"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M10.2776 7.11165C10.2776 9.50395 8.33604 11.4455 5.94374 11.4455C3.55144 11.4455 1.60986 9.50395 1.60986 7.11165C1.60986 4.71935 3.55144 2.77777 5.94374 2.77777C8.33604 2.77777 10.2776 4.71935 10.2776 7.11165Z"
                                                                                        stroke="black"
                                                                                        stroke-width="0.874701"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M5.94336 4.5101V6.9866"
                                                                                        stroke="black"
                                                                                        stroke-width="0.874701"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M4.45752 1.5383H7.42932"
                                                                                        stroke="black"
                                                                                        stroke-width="0.874701"
                                                                                        stroke-miterlimit="10"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </i>
                                                                            <span>
                                                                                @if($data['is_pickup_airport'] == true)
                                                                                 60 M
                                                                                @else 

                                                                                {{ $vehicle->free_waiting_time}}
                                                                                @endif
                                                                                <span
                                                                                    class="">-Free</span>
                                                                                Waiting</span>
                                                                        </div>
                                                                    </li>
                                                                    <!-- this should show on mobile and hide on web -->
                                                                    <li class="showOnMobile">
                                                                        <div class="v_card_spec"><br></div>
                                                                    </li>
                                                                    <li class="hideOnMobile">
                                                                        @if($vehicle->porter_service == 1)
                                                                        <div class="v_card_spec">
                                                                            <i>
                                                                                <svg width="25" height="19"
                                                                                    viewBox="0 0 25 19"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M16.8276 2.60579C16.9603 2.74514 20.051 2.50851 20.6755 2.63603C21.7245 2.849 22.395 3.88754 22.4857 4.90111C22.6474 6.70871 22.6421 10.199 22.4857 12.0106C22.3568 13.504 21.5457 14.2914 20.055 14.4439C16.4805 14.202 12.5301 14.7463 9.00166 14.4439C7.91184 14.3506 6.71554 13.734 6.57093 12.5364C6.37111 10.8774 6.38294 6.18418 6.57356 4.51462C6.68925 3.50368 7.48985 2.75697 8.49159 2.62025C9.04635 2.54532 11.9464 2.71359 12.0818 2.59528C12.2172 2.47696 12.1147 1.47654 12.9402 1.15314C13.4779 0.942803 15.5563 0.942803 16.0743 1.19258C16.9393 1.61063 16.7697 2.54663 16.8276 2.60842V2.60579ZM12.6195 2.60579H15.1173C15.1435 2.60579 15.1435 3.13164 15.1173 3.13164H11.1734V13.9115H17.6808C17.6952 13.9115 17.8779 13.7288 17.8779 13.7143V4.18333C18.0304 4.13075 18.4038 4.24118 18.4038 4.38052V13.9115C18.5826 13.8813 19.2806 13.9562 19.324 13.9115C19.4042 13.83 19.0756 12.3379 20.1457 11.9067C20.6899 11.6872 21.3801 11.8594 21.9519 11.8068V5.29944C21.9519 4.97999 20.5348 5.14695 20.2048 5.07464C19.0874 4.82618 19.4371 3.13032 19.3227 3.13032H15.9704C15.7272 3.13032 15.5603 2.35602 16.3004 2.60448C16.3398 2.05628 16.1387 1.65138 15.5682 1.56199C14.6926 1.42395 12.4078 1.25042 12.6182 2.60579H12.6195ZM9.07133 3.13032C8.14716 3.00807 7.04025 3.70218 7.10072 4.70918C8.42849 4.73416 9.30271 4.76702 9.07133 3.13032ZM10.6476 3.13164C10.453 3.1645 9.64056 3.08563 9.59586 3.13164C9.49464 3.23418 9.89954 4.89454 8.60333 5.09699C8.30228 5.14432 6.96795 4.9813 6.96795 5.30207V11.8094C7.92762 11.7963 9.32111 11.6017 9.56694 12.8256C9.77465 13.8602 9.11209 14.0246 10.6489 13.9128V3.13164H10.6476ZM19.8499 3.13032C19.5975 4.57377 20.778 5.02206 21.9506 4.51199C21.5273 3.63514 20.9042 2.98966 19.8499 3.13032ZM9.07002 13.9115C9.28299 12.2919 8.47187 12.2327 7.09941 12.334C7.14805 13.3817 8.09457 13.9194 9.07002 13.9115ZM21.9533 12.3353C20.5677 12.259 19.6185 12.1933 19.8499 13.9115C20.9187 13.9733 21.6982 13.3528 21.9533 12.3353Z"
                                                                                        fill="black"
                                                                                        stroke="black"
                                                                                        stroke-width="0.2" />
                                                                                    <path
                                                                                        d="M0.392248 2.08021C0.394877 1.93955 0.356753 1.80809 0.450091 1.67794C0.586811 1.49126 3.0596 1.50967 3.46976 1.5662C4.73443 1.74104 5.41934 2.77696 5.5232 3.98246C5.79269 7.0981 5.16956 10.7895 5.51925 13.846C5.61522 14.6834 6.18576 15.2868 7.02449 15.3644C12.1502 15.8364 18.0042 14.9989 23.2061 15.3526C23.6136 15.3802 24.0488 15.3736 23.9226 15.885H20.636C20.8043 16.4529 21.037 16.6251 20.7359 17.2351C19.9012 18.9257 17.4809 17.498 18.5326 15.885H10.382C10.5766 16.4805 10.7922 16.7001 10.4359 17.3206C9.52752 18.9047 7.25323 17.4244 8.27863 15.8863C6.70898 16.0717 5.16036 15.6286 4.98552 13.8539C4.6779 10.7133 5.39699 6.79837 4.98026 3.73663C4.90401 3.1766 4.17703 2.08153 3.61174 2.08153H0.392248V2.08021ZM8.70983 16.1808C8.08012 16.8394 9.21464 18.0042 9.91796 17.1944C10.5924 16.4174 9.36845 15.4919 8.70983 16.1808ZM19.5409 15.91C18.5879 15.9994 18.5629 17.5256 19.6422 17.4586C20.7596 17.3889 20.3981 15.8298 19.5409 15.91Z"
                                                                                        fill="black"
                                                                                        stroke="black"
                                                                                        stroke-width="0.2" />
                                                                                    <path
                                                                                        d="M16.6924 6.68137H12.2227V4.18359H16.6266C16.6411 4.18359 16.8238 4.36633 16.8238 4.38079V6.35271C16.8238 6.39609 16.6503 6.55253 16.6924 6.68137ZM16.298 6.15552C16.2506 5.84133 16.4465 4.63714 16.1008 4.60821C16.0469 4.60427 16.0022 4.70944 15.9693 4.70944H12.7485V6.15552H16.298Z"
                                                                                        fill="black"
                                                                                        stroke="black"
                                                                                        stroke-width="0.2" />
                                                                                </svg>
                                                                            </i>
                                                                            <span>Porter Service</span>
                                                                        </div>
                                                                        @endif
                                                                    </li>
                                                                </ul>

                                                                <div class="v_card_spec_footer">
                                                                    <ul>
                                                                       
                                                                        <li>
                                                                            <a href="javascript:void(0)">
                                                                                <div
                                                                                    class="v_card_spec_footer_list">
                                                                                    <i>
                                                                                        <svg width="15"
                                                                                            height="11"
                                                                                            viewBox="0 0 15 11"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M7.50004 9.04166C7.89125 9.04166 8.20837 9.35878 8.20837 9.74999C8.20837 10.1412 7.89125 10.4583 7.50004 10.4583C7.10883 10.4583 6.79171 10.1412 6.79171 9.74999C6.79171 9.35878 7.10883 9.04166 7.50004 9.04166ZM7.49997 6.20832C8.47782 6.20832 9.36416 6.60549 10.0044 7.24568C10.281 7.52228 10.281 7.9708 10.0044 8.2474C9.72768 8.52401 9.27923 8.52401 9.00263 8.2474C8.61729 7.86207 8.08696 7.62499 7.49997 7.62499C6.91297 7.62499 6.38271 7.86207 5.99739 8.2474C5.72077 8.52401 5.27227 8.52401 4.99566 8.2474C4.71903 7.9708 4.71903 7.52228 4.99566 7.24568C5.63579 6.60549 6.52219 6.20832 7.49997 6.20832ZM7.49997 3.37499C9.26018 3.37499 10.8549 4.08934 12.0078 5.24216C12.2844 5.51883 12.2844 5.96728 12.0078 6.24395C11.7312 6.52056 11.2827 6.52056 11.0061 6.24395C10.108 5.34586 8.86939 4.79166 7.49997 4.79166C6.13062 4.79166 4.89198 5.34586 3.99392 6.24395C3.7173 6.52056 3.2688 6.52056 2.99219 6.24395C2.71556 5.96728 2.71556 5.51883 2.99219 5.24216C4.14505 4.08934 5.73978 3.37499 7.49997 3.37499ZM7.49997 0.541656C10.0426 0.541656 12.3457 1.57311 14.0113 3.23871C14.2879 3.51534 14.2879 3.96383 14.0113 4.24043C13.7346 4.51704 13.2861 4.51704 13.0095 4.24043C11.5987 2.82966 9.65181 1.95832 7.49997 1.95832C5.34819 1.95832 3.40124 2.82966 1.99045 4.24043C1.71383 4.51704 1.26534 4.51704 0.988714 4.24043C0.712095 3.96383 0.712095 3.51534 0.988714 3.23871C2.65432 1.57311 4.95738 0.541656 7.49997 0.541656Z"
                                                                                                fill="#0FA85B"
                                                                                                stroke="white"
                                                                                                stroke-width="0.4" />
                                                                                        </svg>

                                                                                    </i>
                                                                                    <span>free WIFI</span>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0)">
                                                                                <div
                                                                                    class="v_card_spec_footer_list">
                                                                                    <i>
                                                                                        <svg width="24"
                                                                                            height="24"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M4.93258 5.73309H6.42692C6.42692 5.73309 6.51306 5.65045 6.51306 5.64669V1.8862C6.51306 1.69085 6.92129 1.22877 7.11604 1.13861C8.05609 0.706582 8.78267 1.33771 8.85757 2.29568C8.94371 3.40016 8.79016 4.61734 8.85757 5.73685H10.1759C10.1759 5.73685 10.3182 5.87961 10.3519 5.91342L10.3781 12.6943C10.307 13.4043 9.42684 14.3172 8.71151 14.3172H7.68532V17.7546C7.7003 17.9613 7.51304 18.2543 7.3033 18.2543H6.10109C6.07862 19.787 7.06361 21.2597 8.46432 21.8495C10.8875 22.8713 13.5803 21.2935 13.8986 18.6976C14.0896 14.0918 13.6477 9.28697 13.8949 4.70375C14.1421 0.120531 20.1869 -0.255143 20.9322 4.17405V14.3135H21.8984C21.9434 14.3135 22.258 14.4412 22.3216 14.4788C22.6849 14.6854 22.8722 15.1287 22.9171 15.5269C23.0332 16.6126 23.0182 18.8854 22.9284 19.9899C22.8797 20.5947 22.6812 20.6248 22.1044 20.606C22.0295 20.6774 22.1531 22.3529 22.0894 22.6797C22.0482 22.8976 21.8048 22.9427 21.61 22.9577C21.1007 23.0028 19.9959 23.0103 19.4977 22.9577C19.2019 22.9239 19.0333 22.8375 18.9996 22.5182C18.9659 22.2327 19.067 20.6736 18.9996 20.606C18.9697 20.576 18.3592 20.6999 18.2506 20.328L18.2431 15.2902C18.3143 14.9371 18.5352 14.599 18.8685 14.4487C18.9172 14.4262 19.2431 14.3172 19.2655 14.3172H20.1756L20.1606 4.13648C19.6476 1.09353 15.393 0.980823 14.7413 4.01627L14.7263 18.3407C14.629 19.896 13.8911 21.3311 12.5766 22.1801C9.44932 24.1937 5.35204 21.9509 5.35204 18.2543C4.97378 18.2017 3.99253 18.4196 3.81276 18.0063L3.76782 14.3172H2.74163C2.45324 14.3172 1.83154 13.9716 1.61806 13.7688C0.730442 12.9122 1.05628 11.5523 1.06751 10.4703C1.08249 9.08786 0.947665 7.46119 1.06377 6.11628C1.075 5.98855 1.10122 5.73685 1.26975 5.73685H2.58807C2.66298 4.58729 2.48695 3.31376 2.58807 2.17922C2.65923 1.3565 3.25472 0.898175 4.07118 1.04844C4.42698 1.11607 4.93258 1.63825 4.93258 2.00641V5.73685V5.73309ZM3.48318 1.87493C3.41577 1.92752 3.35584 2.08906 3.34835 2.17922C3.21727 3.21608 3.44947 4.52342 3.34835 5.59034C3.37082 5.80447 3.55808 5.66923 3.72662 5.67299C3.9401 5.67299 4.18354 5.81574 4.16855 5.53399C4.04871 4.49337 4.31836 3.12592 4.16106 2.12663C4.10863 1.80355 3.71164 1.68709 3.47943 1.87493H3.48318ZM7.27709 2.06276V5.64669C7.27709 5.78193 7.97744 5.62415 8.09729 5.67674C8.05235 5.59034 8.03737 5.5152 8.03362 5.41753C8.00741 4.30178 8.06358 3.18227 8.03362 2.06652C7.96246 1.69085 7.34825 1.70587 7.27334 2.06652L7.27709 2.06276ZM9.6216 6.49947H1.82779V12.6417C1.82779 12.668 1.98135 12.9911 2.01131 13.0437C2.23228 13.3818 2.63301 13.5246 3.02626 13.5546C4.81273 13.6936 6.78272 13.4494 8.59166 13.5471C8.81263 13.517 9.17217 13.3255 9.32198 13.1639C9.38565 13.0963 9.6216 12.6906 9.6216 12.6417V6.49947ZM4.52061 14.3172V17.4015C4.52061 17.4015 4.603 17.4879 4.60675 17.4879H6.83515C7.0299 17.4879 6.86511 16.56 6.86137 16.4022C6.85013 15.9364 6.85013 15.4555 6.86137 14.9859C6.86137 14.8883 6.98871 14.3135 6.83515 14.3135H4.52061V14.3172ZM18.9959 15.3466V19.7833C19.0521 19.7645 19.1232 19.8434 19.1419 19.8434H22.1007V15.3466C22.1007 15.185 21.7973 15.0911 21.6662 15.0799C21.1943 15.0348 19.8198 15.016 19.3816 15.0874C19.273 15.1061 19.0221 15.2564 18.9959 15.3503V15.3466ZM21.3404 20.606H19.7599V22.1049C19.7599 22.1049 19.8423 22.1914 19.846 22.1914H21.3404V20.606Z"
                                                                                                fill="#0FA85B"
                                                                                                stroke="#0FA85B"
                                                                                                stroke-width="0.078556" />
                                                                                            <path
                                                                                                d="M20.3996 17.0793H21.482C21.5569 17.0793 21.7404 17.3611 21.7217 17.4926C21.6992 17.6466 20.9202 19.1906 20.8116 19.2883C20.5607 19.5099 20.1824 19.3709 20.1637 19.0441C20.1487 18.7698 20.6543 18.1575 20.6917 17.8419H19.6656C19.4783 17.8419 19.3884 17.5301 19.4146 17.3573C19.4408 17.1845 20.13 15.7945 20.2498 15.663C20.4895 15.4001 20.879 15.4451 20.9239 15.8171C20.9689 16.189 20.5157 16.7262 20.3996 17.0756V17.0793Z"
                                                                                                fill="#0FA85B"
                                                                                                stroke="#0FA85B"
                                                                                                stroke-width="0.078556" />
                                                                                        </svg>
                                                                                    </i>
                                                                                    <span>Charger</span>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0)">
                                                                                <div
                                                                                    class="v_card_spec_footer_list">
                                                                                    <i>
                                                                                        <svg width="23"
                                                                                            height="26"
                                                                                            viewBox="0 0 23 26"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M11.4913 12.056L11.4839 16.754C12.3511 17.161 12.9504 17.9286 13.061 18.8862C12.8866 21.1061 13.9207 24.4225 10.8576 25H3.05834C1.86941 24.8489 0.967899 23.901 0.820512 22.7314C0.879467 21.5057 0.72471 20.1801 0.813142 18.9666C0.886836 17.9919 1.51323 17.1634 2.39264 16.7565V12.0804C1.76624 11.7855 1.23319 11.2714 0.985094 10.6208C0.709972 9.89216 0.756644 8.14258 0.921226 7.37013C1.29215 5.65466 2.62354 4.37293 4.31112 3.91726C4.38727 3.80517 4.29393 2.23834 4.33077 1.93131C4.3799 1.49757 4.80487 1.07601 5.23966 1.02971C6.29839 1.08576 7.42344 0.961484 8.47234 1.01266C8.95381 1.03459 9.45001 1.36355 9.53353 1.86064C9.59003 2.19448 9.47949 3.79542 9.56055 3.91726C11.3243 4.3778 12.7367 5.82523 13.0069 7.63574C13.115 8.35945 13.1421 9.92141 12.8989 10.5915C12.6557 11.2616 12.1325 11.7928 11.4913 12.0609V12.056ZM8.85555 3.83197V2.00685C8.85555 1.89232 8.60745 1.68763 8.47234 1.70469C7.49959 1.77779 6.39665 1.6121 5.43863 1.70469C5.28633 1.71931 5.01612 1.83628 5.01612 2.00685V3.83197H8.85555ZM5.00875 4.52645C3.20327 4.68483 1.75396 6.12983 1.54271 7.90378C1.36339 9.40969 1.35602 11.3883 3.30152 11.5711C5.66217 11.4492 8.19477 11.7368 10.5382 11.5711C12.5279 11.4322 12.5402 9.34146 12.329 7.8258C12.0907 6.1079 10.6316 4.67265 8.87275 4.51914C7.85578 4.43141 6.02818 4.43629 5.01121 4.52645H5.00875ZM10.7961 12.2509H3.07799V16.581H10.7961V12.2509ZM3.18853 17.2731C2.10032 17.4412 1.56236 18.1893 1.49849 19.2444C1.44199 20.1509 1.44445 21.4277 1.49849 22.3342C1.56236 23.4015 2.1126 24.1593 3.21555 24.3177C5.62041 24.1764 8.23653 24.5005 10.6144 24.3177C11.6485 24.2373 12.2995 23.4429 12.3707 22.4512C12.4371 21.5228 12.4395 20.0534 12.3707 19.125C12.297 18.1162 11.6191 17.3389 10.5751 17.2585C8.20459 17.0757 5.58602 17.39 3.18853 17.2706V17.2731Z"
                                                                                                fill="#0FA85B"
                                                                                                stroke="#0FA85B"
                                                                                                stroke-width="0.17146" />
                                                                                            <path
                                                                                                d="M18.2622 7.728C18.3236 7.71338 18.3899 7.71095 18.4538 7.72069C18.6208 7.74506 19.0089 8.20804 19.144 8.35912C20.9814 10.406 23.5804 14.1318 21.3671 16.7391C18.8615 19.6924 14.069 17.6139 14.5627 13.7979C14.8059 11.9216 16.6827 9.25584 18.0116 7.91807C18.0828 7.8474 18.1614 7.74993 18.2622 7.72557V7.728ZM18.4341 8.60279C18.3801 8.56624 18.1786 8.79286 18.132 8.8416C17.0781 9.95275 15.3562 12.4675 15.2407 13.9929C15.0221 16.8853 18.3973 18.5691 20.5368 16.6002C22.9785 14.3535 20.2101 10.5132 18.4734 8.70026C18.4488 8.6759 18.4366 8.63691 18.4341 8.60036V8.60279Z"
                                                                                                fill="#0FA85B"
                                                                                                stroke="#0FA85B"
                                                                                                stroke-width="0.17146" />
                                                                                            <path
                                                                                                d="M15.9979 14.1032C16.5187 13.9863 16.4941 14.6637 16.6685 15.0243C16.843 15.385 17.1132 15.692 17.4522 15.8894C17.7003 16.0331 18.2701 16.1452 18.0073 16.5765C17.8059 16.9031 17.3416 16.6375 17.0886 16.4913C16.6636 16.2451 16.2387 15.7773 16.0299 15.3362C15.9021 15.0633 15.541 14.2056 15.9979 14.1032Z"
                                                                                                fill="#0FA85B"
                                                                                                stroke="#0FA85B"
                                                                                                stroke-width="0.17146" />
                                                                                        </svg>
                                                                                    </i>
                                                                                    <span>Water</span>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        {{-- <li>
                                                                            <a href="javascript:void(0)">
                                                                                <div
                                                                                    class="v_card_spec_footer_list">
                                                                                    <i>
                                                                                        <svg width="25"
                                                                                            height="23"
                                                                                            viewBox="0 0 25 23"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M24.1177 3.0255H15.7841C15.5232 2.42389 15.0922 1.91166 14.544 1.55179C13.9959 1.19192 13.3545 1.00015 12.6987 1H12.419C11.7633 1.00012 11.122 1.19191 10.5739 1.55179C10.0258 1.91168 9.59497 2.42389 9.33427 3.0255H1V15.7002H11.8901V22H13.2252V15.7002H24.1152L24.1177 3.0255ZM22.7826 14.3619H2.34084V4.36315H22.7826V14.3619Z"
                                                                                                fill="#0FA85B"
                                                                                                stroke="#FFFEFE"
                                                                                                stroke-width="0.2" />
                                                                                            <path
                                                                                                opacity="0.5"
                                                                                                d="M21.1087 6.03516H4.01172V12.6885H21.1087V6.03516Z"
                                                                                                fill="#0FA85B" />
                                                                                        </svg>
                                                                                    </i>
                                                                                    <span>Name</span>
                                                                                </div>
                                                                            </a>
                                                                        </li> --}}
                                                                         <li>
                                                                            <a href="javascript:void(0)">
                                                                                <div
                                                                                    class="v_card_spec_footer_list">
                                                                                    <i>
                                                                                        
                                                                                        <img src="{{ asset('images/medical_kit_icon.svg') }}" alt="">

                                                                                    </i>
                                                                                    <span>Aid kit</span>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            @php $car_type = \App\Models\CarType::where('slug',$vehicle->slug)->first();
                                                                 $vehicle_price = 0;
                                                                 $ride_price = 0;

                                                                 if(session("step_one_data")["ride_type_id"] == 1){

                                                                    $vehicle_price = !empty($car_type) ? rides_pricing($car_type,$data['distance'],$data['is_Airport_ride']) : 0;
                                                                 }elseif (session("step_one_data")["ride_type_id"] == 2) {
                                                                    
                                                                    $car_type = \App\Models\RidePricing::where(['car_id' => $vehicle->id,'ride_type_id' => $data["ride_type_id"]])->first();

                                                                    $pricing = !empty($car_type) ? hourly_pricing($car_type,$vehicle->id,$data['byHours_durantion']) : array();

                                                                    $vehicle_price  = isset($pricing["ride_price"]) ? $pricing["ride_price"] : 0;
                                                                 }elseif (session("step_one_data")["ride_type_id"] == 3) {
                                                                    
                                                                    $car_type = \App\Models\RidePricing::where(['car_id' => $vehicle->id,'ride_type_id' => $data["ride_type_id"]])->first();

                                                                    $vehicle_price  = !empty($car_type) ? citytour_pricing($car_type,session("step_one_data")["hours"]) : 0;
                                                                 }
                                                                 
                                                                 
                                                                 
                                                                    
                                                               if (session("step_one_data")["ride_type_id"] == 1) {
                                                                $ride_price = $data['way'] == 'one-way' ? $vehicle_price :$vehicle_price * 2;
                                                               }else{
                                                                $ride_price = $vehicle_price;
                                                               }
                                                                 $return_discount = 0;
                                                                 $return_discount_amount = 0;
                                                                 $return_ride_amount = 0;
                                                                 $discount_amount = ((float)$discount * (float)$ride_price) / 100;

                                                                 if ($data["way"] != "one-way") {
                                                                    
                                                                    $return_discount = 10;
                                                                    $return_discount_amount = (($ride_price- $discount_amount)/2) * $return_discount / 100;
                                                                    $return_ride_amount = (($ride_price- $discount_amount)/2) - $return_discount_amount;
                                                                    
                                                                 }

                                                                //  echo "<h1> Ride Amount: ".$ride_price."<br> Return Discount Amount: ".$return_discount_amount."<br> Return Ride Amount: ".$return_ride_amount."</h1>";

                                                                 $total_ride_amount = $ride_price;
                                                                 $total_ride_amount += (float)session("step_one_data")["extra_charges"];
                                                                 
                                                                 $discounted_amount = $total_ride_amount - ($return_discount_amount + $discount_amount);
                                                                 
                                                            @endphp

                                                            <div class="v_crad_right">
                                                                <div class="v_card_priceBox">
                                                                    <div class="v_card_priceBox_text">
                                                                        @if(session("step_one_data")["ride_type_id"] == 1)
                                                                        <h4>Total {{ $data['way'] == 'one-way' ? 'one-way' : 'two-way'}} price</h4>
                                                                        @elseif(session("step_one_data")["ride_type_id"] == 2)
                                                                        <h4>Total {{ session("step_one_data")["byHours_durantion"]}} Hours price</h4>
                                                                        @elseif(session("step_one_data")["ride_type_id"] == 3)
                                                                        <h4>{{ session("step_one_data")["hours"] == 5 ? "5 Hours" : '10 Hours' }} price</h4>
                                                                        @endif
                                                                        @if($vehicle->apply_discount == 1)
                                                                        <strong>{!! html_entity_decode(currency_format( $total_ride_amount)) !!} </strong>
                                                                         @else 
                                                                         <br>
                                                                         <br>
                                                                        @endif
                                                                        <h2> {!! $discounted_amount == 0 ? html_entity_decode(currency_format($total_ride_amount)) : html_entity_decode(currency_format($discounted_amount)) !!} </h2>
                                                                        <p>Includes VAT, fees & tip</p>
                                                                    </div>
                                                                    <div class="v_card_cancel">
                                                                        <i>
                                                                            <svg width="14" height="14"
                                                                                viewBox="0 0 14 14"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M7.0013 12.8346C10.2096 12.8346 12.8346 10.2096 12.8346 7.0013C12.8346 3.79297 10.2096 1.16797 7.0013 1.16797C3.79297 1.16797 1.16797 3.79297 1.16797 7.0013C1.16797 10.2096 3.79297 12.8346 7.0013 12.8346Z"
                                                                                    stroke="#0FA85B"
                                                                                    stroke-width="0.875"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                                <path
                                                                                    d="M4.51953 6.99849L6.17036 8.64932L9.47786 5.34766"
                                                                                    stroke="#0FA85B"
                                                                                    stroke-width="0.875"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>
                                                                        </i>
                                                                        <span>FREE Cancellation</span>
                                                                    </div>
                                                                    <div
                                                                        class="v_card_btn vCardSelectBtnRow">
                                                                        <input type="hidden" name="selected_vehicle" value="">
                                                                        <input type="hidden" name="selected_vehicle_price" value="">
                                                                        <input type="hidden" name="discountamount" value="">
                                                                        <input type="hidden" name="return_discount" valu="0">
                                                                        <input type="hidden" name="return_discount_amount" valu="0">
                                                                        <input type="hidden" name="return_ride_amount" valu="0">
                                                                        <input type="hidden" name="ride_type_id" value="{{ session('step_one_data')['ride_type_id'] }}">

                                                                        <a href="javascript:void(0)"
                                                                            class="all_btn vCardSelectBtn" data-selectedpassengers="{{ $data['total_passengers'] }}" data-vehicle="{{ $vehicle->id}}" data-passengers="{{ $vehicle->passengers}}" data-price = "{{  $discounted_amount == 0 ? $total_ride_amount :  $discounted_amount}}" data-discountamount="{{ $discount_amount}}" data-return_discount="{{ $return_discount }}" data-return_discount_amount="{{ $return_discount_amount }}" data-return_ride_amount="{{ $return_ride_amount }}">Select</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mobile_freeCancel">
                                                            <div class="mobile_freeCancel_slider">
                                                                <div class="mobile_freeCancel_run">
                                                                    <div class="v_card_cancel">
                                                                        <i>
                                                                            <svg width="14" height="14"
                                                                                viewBox="0 0 14 14"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M7.0013 12.8346C10.2096 12.8346 12.8346 10.2096 12.8346 7.0013C12.8346 3.79297 10.2096 1.16797 7.0013 1.16797C3.79297 1.16797 1.16797 3.79297 1.16797 7.0013C1.16797 10.2096 3.79297 12.8346 7.0013 12.8346Z"
                                                                                    stroke="#0FA85B"
                                                                                    stroke-width="0.875"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                                <path
                                                                                    d="M4.51953 6.99849L6.17036 8.64932L9.47786 5.34766"
                                                                                    stroke="#0FA85B"
                                                                                    stroke-width="0.875"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>
                                                                        </i>
                                                                        <span>FREE Cancellation</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="v_card_btn vCardChangeVehicleRow">
                                                            <a href="javascript:void(0)"
                                                                class="all_btn w_100 uppercase vCardChangeVehicleBtn">change
                                                                vehicle</a>
                                                        </div>
                                                    </div>  
                                                </li>
                                                @endif
                                               @endforeach
                                                
                                            </ul>
                                        </div>
                                    </div>


                                    <!-- step 2 Passenger Details -->
                                    <div class="passengerDetail_offsetter"></div>
                                    <div class="passengerDetail_sec">
                                        <div class="passengerDetail animatedParent animateOnce">
                                            <div class="passengerDetailHeading">
                                                <h2>Passenger Detail</h2>
                                                <button type="button"
                                                class="all_btn icon_btn uppercase outlined_green_btn editDetailsBtn" style="display: none;">
                                                <i>
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.94745 2.70041L3.78995 9.21791C3.55745 9.46541 3.33245 9.95291 3.28745 10.2904L3.00995 12.7204C2.91245 13.5979 3.54245 14.1979 4.41245 14.0479L6.82745 13.6354C7.16495 13.5754 7.63745 13.3279 7.86995 13.0729L14.0275 6.55541C15.0925 5.43041 15.5725 4.14791 13.915 2.58041C12.265 1.02791 11.0125 1.57541 9.94745 2.70041Z"
                                                            stroke="#0FA85B" stroke-width="1.125"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M8.91797 3.78906C9.24047 5.85906 10.9205 7.44156 13.0055 7.65156"
                                                            stroke="#0FA85B" stroke-width="1.125"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M2.25 16.5H15.75" stroke="#0FA85B"
                                                            stroke-width="1.125" stroke-miterlimit="10"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </i>
                                                <span>Edit Passenger Detail</span>
                                            </button>
                                                <!-- <button type="button"
                                                    class="all_btn icon_btn uppercase outlined_green_btn editDetailsBtn">
                                                    <i>
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M9.94745 2.70041L3.78995 9.21791C3.55745 9.46541 3.33245 9.95291 3.28745 10.2904L3.00995 12.7204C2.91245 13.5979 3.54245 14.1979 4.41245 14.0479L6.82745 13.6354C7.16495 13.5754 7.63745 13.3279 7.86995 13.0729L14.0275 6.55541C15.0925 5.43041 15.5725 4.14791 13.915 2.58041C12.265 1.02791 11.0125 1.57541 9.94745 2.70041Z"
                                                                stroke="#0FA85B" stroke-width="1.125"
                                                                stroke-miterlimit="10"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M8.91797 3.78906C9.24047 5.85906 10.9205 7.44156 13.0055 7.65156"
                                                                stroke="#0FA85B" stroke-width="1.125"
                                                                stroke-miterlimit="10"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M2.25 16.5H15.75" stroke="#0FA85B"
                                                                stroke-width="1.125" stroke-miterlimit="10"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    </i>
                                                    <span>Edit Detail</span>
                                                </button> -->
                                            </div>


                                            <div class="v_pDetail_form">
                                                <div class="rides_box">
                                                    <div class="ride_tabs_content">
                                                        <div class="ride_tab_show tab_rides p_detail_form"
                                                            style="display: block;">
                                                            <div class="rides_form">
                                                                <input type="hidden" name="second_csrf" value="{{ csrf_token() }}">
                                                                <input type="hidden" name="second_post_link" value="{{ route('rides.step.two.post') }}">
                                                                <div class="form_row">
                                                                    <div class="form_cell w_50">
                                                                        <div class="form_field">
                                                                            <input type="text"
                                                                                name="full_name" value="{{ !empty(auth()->user()) ? auth()->user()->name : ''}}"
                                                                                class="floating-input"
                                                                                placeholder="Full name" />
                                                                            <label
                                                                                class="floating-label">Full
                                                                                name</label>
                                                                            <i class="field_icon">
                                                                                <svg width="23" height="22"
                                                                                    viewBox="0 0 23 22"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M11.7926 9.69335C11.7035 9.68443 11.5965 9.68443 11.4984 9.69335C9.37647 9.62202 7.69141 7.88347 7.69141 5.74371C7.69141 3.55937 9.45671 1.78516 11.65 1.78516C13.8343 1.78516 15.6085 3.55937 15.6085 5.74371C15.5996 7.88347 13.9145 9.62202 11.7926 9.69335Z"
                                                                                        stroke="#8D8D8D"
                                                                                        stroke-width="1.33735"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M7.33499 12.9815C5.1774 14.4258 5.1774 16.7796 7.33499 18.215C9.7868 19.8555 13.8078 19.8555 16.2596 18.215C18.4172 16.7706 18.4172 14.4169 16.2596 12.9815C13.8167 11.3499 9.79571 11.3499 7.33499 12.9815Z"
                                                                                        stroke="#8D8D8D"
                                                                                        stroke-width="1.33735"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form_cell w_50">
                                                                        <div class="form_field">
                                                                            <input type="text" name="email" value="{{ !empty(auth()->user()) ? auth()->user()->email : ''}}"
                                                                                class="floating-input"
                                                                                placeholder="Email" />
                                                                            <label
                                                                                class="floating-label">Email</label>
                                                                            <i class="field_icon">
                                                                                <svg width="21" height="21"
                                                                                    viewBox="0 0 21 21"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M14.598 18.0263H6.09908C3.5494 18.0263 1.84961 16.7515 1.84961 13.7769V7.8276C1.84961 4.85297 3.5494 3.57812 6.09908 3.57812H14.598C17.1477 3.57812 18.8475 4.85297 18.8475 7.8276V13.7769C18.8475 16.7515 17.1477 18.0263 14.598 18.0263Z"
                                                                                        stroke="#8D8D8D"
                                                                                        stroke-width="1.27484"
                                                                                        stroke-miterlimit="10"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M14.5986 8.25L11.9384 10.3747C11.063 11.0716 9.62667 11.0716 8.75128 10.3747L6.09961 8.25"
                                                                                        stroke="#8D8D8D"
                                                                                        stroke-width="1.27484"
                                                                                        stroke-miterlimit="10"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form_row">
                                                                    <div class="form_cell w_50">
                                                                        <div class="form_field">
                                                                            <input type="text" id="phone" name="phone"  value="{{ !empty(auth()->user()) ? auth()->user()->mobile_number : ''}}"
                                                                                class="floating-input"
                                                                                placeholder="Phone" />
                                                                            <label
                                                                                class="floating-label">Phone</label>
                                                                            {{-- <i class="field_icon">
                                                                                <svg width="16" height="19"
                                                                                    viewBox="0 0 16 19"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M14.7992 5.25V13.75C14.7992 17.15 13.9492 18 10.5492 18H5.44922C2.04922 18 1.19922 17.15 1.19922 13.75V5.25C1.19922 1.85 2.04922 1 5.44922 1H10.5492C13.9492 1 14.7992 1.85 14.7992 5.25Z"
                                                                                        stroke="#8D8D8D"
                                                                                        stroke-width="1.275"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M9.69883 3.97656H6.29883"
                                                                                        stroke="#8D8D8D"
                                                                                        stroke-width="1.275"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                    <path
                                                                                        d="M7.99914 15.5334C8.72678 15.5334 9.31664 14.9436 9.31664 14.2159C9.31664 13.4883 8.72678 12.8984 7.99914 12.8984C7.27151 12.8984 6.68164 13.4883 6.68164 14.2159C6.68164 14.9436 7.27151 15.5334 7.99914 15.5334Z"
                                                                                        stroke="#8D8D8D"
                                                                                        stroke-width="1.275"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round" />
                                                                                </svg>
                                                                            </i> --}}
                                                                            <input type="hidden" name="phone-hidden" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form_cell w_50">
                                                                        <div class="form_field">
                                                                            <input type="text"
                                                                                name="whatsapp" id="phone1"
                                                                                class="floating-input autocomplete-input"
                                                                                placeholder="WhatsApp" />
                                                                            <label
                                                                                class="floating-label">WhatsApp
                                                                            </label>
                                                                            <input type="hidden" name="phone-hidden1" value="">
                                                                            {{-- <i class="field_icon">

                                                                                <svg width="18" height="18"
                                                                                    viewBox="0 0 18 18"
                                                                                    fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M13.3194 10.8786C13.3194 10.8786 13.2294 10.8286 13.1294 10.7786C13.1194 10.7786 13.0294 10.7286 12.8894 10.6586C12.7594 10.5886 12.5794 10.5086 12.3894 10.4186C12.0094 10.2386 11.6394 10.0586 11.5394 10.0286C11.4394 9.99859 11.3994 9.97859 11.3594 9.97859C11.3394 9.97859 11.2994 9.97859 11.2394 10.0686C11.0894 10.2986 10.6694 10.7886 10.5394 10.9286C10.5394 10.9286 10.4994 10.9686 10.4694 10.9986C10.4494 11.0086 10.4294 11.0286 10.3894 11.0486C10.3594 11.0686 10.2894 11.1086 10.1794 11.1086C10.1294 11.1086 10.0994 11.1086 10.0894 11.1086C10.0794 11.1086 10.0694 11.1086 10.0594 11.1086C10.0494 11.1086 10.0394 11.1086 10.0294 11.1086C10.0194 11.1086 9.99941 11.1086 9.98941 11.0986C9.95941 11.0986 9.92941 11.0786 9.89941 11.0586C9.83941 11.0286 9.76941 11.0086 9.72941 10.9886C8.93941 10.6486 8.26941 10.0686 7.77941 9.56859C7.28941 9.06859 6.95941 8.59859 6.85941 8.43859C6.85941 8.43859 6.81941 8.35859 6.80941 8.31859C6.80941 8.31859 6.80941 8.29859 6.80941 8.28859C6.80941 8.28859 6.80941 8.28859 6.80941 8.27859C6.80941 8.27859 6.80941 8.27859 6.80941 8.26859C6.79941 8.20859 6.80941 8.14859 6.80941 8.08859C6.82941 8.00859 6.87941 7.94859 6.88941 7.93859C6.90941 7.91859 6.91941 7.89859 6.92941 7.88859C6.94941 7.85859 6.97941 7.83859 6.98941 7.82859C7.04941 7.76859 7.10941 7.68859 7.18941 7.59859C7.18941 7.59859 7.25941 7.50859 7.29941 7.46859C7.37941 7.37859 7.40941 7.31859 7.45941 7.20859L7.48941 7.14859C7.51941 7.09859 7.51941 7.05859 7.50941 7.02859C7.50941 6.98859 7.48941 6.95859 7.46941 6.92859C7.44941 6.87859 7.28941 6.49859 7.13941 6.13859C6.98941 5.76859 6.82941 5.38859 6.79941 5.31859C6.73941 5.17859 6.68941 5.11859 6.65941 5.08859C6.63941 5.06859 6.60941 5.05859 6.56941 5.05859C6.55941 5.05859 6.53941 5.05859 6.47941 5.05859C6.47941 5.05859 6.45941 5.05859 6.44941 5.05859C6.41941 5.05859 6.38941 5.05859 6.34941 5.06859C6.26941 5.07859 6.16941 5.09859 6.06941 5.11859C5.84941 5.16859 5.65941 5.22859 5.57941 5.27859C5.37941 5.40859 4.89941 5.91859 4.89941 6.92859C4.89941 7.80859 5.46941 8.68859 5.74941 9.04859L5.75941 9.06859C5.75941 9.06859 5.75941 9.07859 5.76941 9.08859C5.76941 9.09859 5.77941 9.10859 5.78941 9.11859C6.82941 10.6386 8.09941 11.7286 9.35941 12.2286C10.6294 12.7386 11.1894 12.7786 11.4794 12.7786C11.6094 12.7786 11.7094 12.7786 11.8094 12.7586H11.8794C12.0194 12.7486 12.3094 12.6486 12.6094 12.4486C12.9194 12.2586 13.1294 12.0286 13.1894 11.8486C13.2694 11.6286 13.3194 11.4086 13.3294 11.2286C13.3294 11.1386 13.3294 11.0586 13.3294 11.0086C13.3294 10.9786 13.3294 10.9686 13.3294 10.9586C13.3294 10.9586 13.3294 10.9586 13.2994 10.9286L13.3194 10.8786Z"
                                                                                        fill="#8D8D8D" />
                                                                                    <path
                                                                                        d="M8.93 0C4.14 0 0.24 3.87 0.24 8.62C0.24 10.16 0.65 11.66 1.43 12.98C1.49 13.08 1.5 13.2 1.46 13.31L0 17.61L4.5 16.18C4.6 16.15 4.71 16.16 4.81 16.21C6.07 16.88 7.49 17.24 8.92 17.24C13.71 17.24 17.61 13.37 17.61 8.62C17.61 3.87 13.72 0 8.93 0ZM8.93 16.16C7.47 16.16 6.05 15.74 4.82 14.95L2.48 15.69C2.34 15.74 2.18 15.69 2.07 15.59C1.96 15.48 1.93 15.32 1.98 15.18L2.73 12.96C1.82 11.68 1.33 10.18 1.33 8.61C1.33 4.46 4.74 1.08 8.93 1.08C13.12 1.08 16.53 4.46 16.53 8.62C16.53 12.78 13.12 16.16 8.94 16.16H8.93Z"
                                                                                        fill="#8D8D8D" />
                                                                                </svg>

                                                                            </i> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form_extrasNotes">
                                                                    <h4>Extras & notes</h4>
                                                                    <div class="form_row">
                                                                      @if($data['is_Airport_ride'])
                                                                        <div class="form_cell w_50">
                                                                            <div class="form_field">
                                                                                <input type="text"
                                                                                    name="flight_details"
                                                                                    class="floating-input"
                                                                                    placeholder="Flight details"/>
                                                                                <label
                                                                                    class="floating-label">Flight
                                                                                    details</label>
                                                                                {{-- <i class="field_icon">
                                                                                    <svg width="23"
                                                                                        height="22"
                                                                                        viewBox="0 0 23 22"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M11.7926 9.69335C11.7035 9.68443 11.5965 9.68443 11.4984 9.69335C9.37647 9.62202 7.69141 7.88347 7.69141 5.74371C7.69141 3.55937 9.45671 1.78516 11.65 1.78516C13.8343 1.78516 15.6085 3.55937 15.6085 5.74371C15.5996 7.88347 13.9145 9.62202 11.7926 9.69335Z"
                                                                                            stroke="#8D8D8D"
                                                                                            stroke-width="1.33735"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" />
                                                                                        <path
                                                                                            d="M7.33499 12.9815C5.1774 14.4258 5.1774 16.7796 7.33499 18.215C9.7868 19.8555 13.8078 19.8555 16.2596 18.215C18.4172 16.7706 18.4172 14.4169 16.2596 12.9815C13.8167 11.3499 9.79571 11.3499 7.33499 12.9815Z"
                                                                                            stroke="#8D8D8D"
                                                                                            stroke-width="1.33735"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round" />
                                                                                    </svg>
                                                                                </i> --}}
                                                                            </div>
                                                                            <div class="form_field_info">
                                                                                <p>Please provide a flight
                                                                                    number
                                                                                    (The driver will monitor
                                                                                    your
                                                                                    flight)</p>
                                                                                <span class="tootip_info">
                                                                                    {{-- <span
                                                                                        class="tootip_info_popup">
                                                                                        <svg width="14"
                                                                                            height="15"
                                                                                            viewBox="0 0 14 15"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M6.99935 13.3346C10.2077 13.3346 12.8327 10.7096 12.8327 7.5013C12.8327 4.29297 10.2077 1.66797 6.99935 1.66797C3.79102 1.66797 1.16602 4.29297 1.16602 7.5013C1.16602 10.7096 3.79102 13.3346 6.99935 13.3346Z"
                                                                                                stroke="#0FA85B"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round" />
                                                                                            <path
                                                                                                d="M6.99957 8.29297V8.17049C6.99957 7.77382 7.24458 7.56381 7.48958 7.39465C7.72875 7.23131 7.96789 7.02132 7.96789 6.63632C7.96789 6.09966 7.53623 5.66797 6.99957 5.66797C6.4629 5.66797 6.03125 6.09966 6.03125 6.63632"
                                                                                                stroke="#0FA85B"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round" />
                                                                                            <path
                                                                                                d="M6.99803 9.6862H7.00328"
                                                                                                stroke="#0FA85B"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round" />
                                                                                        </svg>
                                                                                    </span> --}}
                                                                                    <div
                                                                                        class="tooltiptext">
                                                                                        This is
                                                                                        the tooltip content
                                                                                    </div>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form_cell w_50">
                                                                            <div class="form_field">
                                                                                <input type="text"
                                                                                    name="meet_greet"
                                                                                    class="floating-input"
                                                                                    placeholder="meet & greet" />
                                                                                <label
                                                                                    class="floating-label">Meet</label>
                                                                                <i class="field_icon">
                                                                                    <svg width="19"
                                                                                        height="18"
                                                                                        viewBox="0 0 19 18"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M18.6135 2.54324H12.2641C12.0653 2.08487 11.7369 1.6946 11.3193 1.42041C10.9016 1.14623 10.4129 1.00012 9.91332 1H9.70016C9.2006 1.00009 8.71198 1.14622 8.2944 1.42041C7.87682 1.69461 7.54855 2.08487 7.34992 2.54324H1V12.2001H9.29719V17H10.3144V12.2001H18.6116L18.6135 2.54324ZM17.5963 11.1805H2.02159V3.5624H17.5963V11.1805Z"
                                                                                            fill="#8D8D8D"
                                                                                            stroke="#FFFEFE"
                                                                                            stroke-width="0.2" />
                                                                                        <path opacity="0.5"
                                                                                            d="M16.3193 4.83594H3.29297V9.90511H16.3193V4.83594Z"
                                                                                            fill="#8D8D8D" />
                                                                                    </svg>
                                                                                </i>
                                                                            </div>
                                                                            <div class="form_field_info">
                                                                                <p>Meeting with a name sign.
                                                                                    Enter
                                                                                    the name you want
                                                                                    written on
                                                                                    the
                                                                                    sign
                                                                                </p>
                                                                                <span class="tootip_info">
                                                                                    <span
                                                                                        class="tootip_info_popup">
                                                                                        <svg width="14"
                                                                                            height="15"
                                                                                            viewBox="0 0 14 15"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M6.99935 13.3346C10.2077 13.3346 12.8327 10.7096 12.8327 7.5013C12.8327 4.29297 10.2077 1.66797 6.99935 1.66797C3.79102 1.66797 1.16602 4.29297 1.16602 7.5013C1.16602 10.7096 3.79102 13.3346 6.99935 13.3346Z"
                                                                                                stroke="#0FA85B"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round" />
                                                                                            <path
                                                                                                d="M6.99957 8.29297V8.17049C6.99957 7.77382 7.24458 7.56381 7.48958 7.39465C7.72875 7.23131 7.96789 7.02132 7.96789 6.63632C7.96789 6.09966 7.53623 5.66797 6.99957 5.66797C6.4629 5.66797 6.03125 6.09966 6.03125 6.63632"
                                                                                                stroke="#0FA85B"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round" />
                                                                                            <path
                                                                                                d="M6.99803 9.6862H7.00328"
                                                                                                stroke="#0FA85B"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round" />
                                                                                        </svg>
                                                                                    </span>
                                                                                    <div
                                                                                        class="tooltiptext">
                                                                                        This is
                                                                                        the tooltip content
                                                                                    </div>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                         @endif
                                                                        <div class="form_cell">
                                                                            <div class="form_field">
                                                                                <textarea
                                                                                    class="floating-input fieldHasNotIcon floating-textarea"
                                                                                    placeholder="Notes for chauffeur"></textarea>
                                                                                <label
                                                                                    class="floating-label">Notes
                                                                                    for chauffeur</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="p_additional_details padb-0">
                                                                    <ul>
                                                                        <li>
                                                                            <div class="p_ad_info">
                                                                                <div class="p_ad_heading">
                                                                                    <div class="p_ad_left">
                                                                                        <i
                                                                                            class="p_ad_icon">
                                                                                            <svg width="23"
                                                                                                height="29"
                                                                                                viewBox="0 0 23 29"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <path
                                                                                                    d="M4.84055 20.3655C4.65109 20.6714 4.87472 20.9804 4.92441 21.2879C5.17133 21.3516 5.28314 21.2382 5.46794 21.1388C5.74592 20.9898 8.20578 19.252 8.2943 19.1029C8.40767 18.9088 8.21355 18.2752 8.09086 18.0547C7.58771 18.6479 5.12008 19.912 4.84055 20.3655Z"
                                                                                                    fill="#333333" />
                                                                                                <path
                                                                                                    d="M12.3401 20.9805H10.4844V21.906H12.3401V20.9805Z"
                                                                                                    fill="#333333" />
                                                                                                <path
                                                                                                    d="M10.1775 16.3576C9.72093 15.7457 9.15411 13.3558 8.71152 12.9675C8.38074 12.6771 7.81857 12.8542 7.39617 12.8153C7.36511 12.9862 7.41636 13.1244 7.46606 13.2828C7.56544 13.5934 8.60592 16.0827 8.70841 16.2039C8.9662 16.5129 9.77684 16.3017 10.1775 16.3561V16.3576Z"
                                                                                                    fill="#333333" />
                                                                                                <path
                                                                                                    d="M10.1002 7.27117C10.8239 7.23235 11.7013 7.22924 12.4234 7.26185C14.5122 7.35814 17.5932 8.49023 18.1414 5.42783C19.0732 0.225462 13.627 -0.237316 9.83624 0.074826C6.80179 0.32485 4.29689 1.55323 4.61524 5.03493C4.92738 8.44364 7.88574 7.38764 10.1002 7.27117Z"
                                                                                                    fill="#333333" />
                                                                                                <path
                                                                                                    d="M8.65263 20.961C8.56256 20.9051 8.49268 20.374 8.4756 20.2109L6.16016 21.9052H9.40581C9.59682 20.447 9.07037 21.2204 8.65419 20.961H8.65263Z"
                                                                                                    fill="#333333" />
                                                                                                <path
                                                                                                    d="M2.47657 16.2551C2.54179 16.4694 3.13036 16.8064 3.38038 17.2024C3.79968 17.8671 3.98293 18.8641 4.30439 19.5939L7.97399 16.9042C7.41183 16.075 6.85121 13.5328 6.32321 12.9194C6.17413 12.7455 5.29516 12.6911 5.76105 12.0342C5.91634 11.8137 9.46016 11.7904 9.7987 12.0342C10.2848 12.3852 9.68223 12.5498 9.7723 12.966C9.87635 13.4443 10.746 15.4196 11.0178 15.9042C11.1249 16.0967 11.2103 16.3825 11.4868 16.3607C11.6638 16.3638 12.6064 13.2222 12.6251 13.0064C12.6484 12.7486 12.1685 12.1119 12.4931 11.8913C12.6561 11.7811 15.8909 11.8913 16.4329 11.8913C16.8273 11.8913 16.7574 12.9008 16.0415 12.9241L14.8784 16.9741L18.5169 19.5939C18.9626 18.3687 19.1583 17.0005 20.3479 16.2582C20.132 13.4443 21.5685 9.53708 21.2998 6.88465C21.174 5.65317 20.2298 4.51797 19.2127 3.88281C19.1521 5.54757 19.107 6.82098 17.669 7.88786C15.9499 9.16127 12.9652 8.13012 10.864 8.19068C9.04708 8.24348 6.86985 9.08983 5.24081 7.95619C3.81521 6.96385 3.55121 5.53359 3.68476 3.88281C2.75299 4.34559 1.80415 5.46371 1.59139 6.49331C1.27459 8.02141 2.0961 11.7531 2.29488 13.5126C2.37408 14.2068 2.30575 15.6836 2.47812 16.2567L2.47657 16.2551ZM12.4931 9.73586H16.4329C16.7388 9.73586 16.7404 10.6599 16.4329 10.6599H12.7245C12.4278 10.6599 12.2989 9.99831 12.4931 9.73586ZM5.92566 9.73586C6.46764 9.73586 9.70242 9.6256 9.86548 9.73586C10.0705 9.87407 9.93847 10.6599 9.63409 10.6599H5.92566C5.61818 10.6599 5.61973 9.73586 5.92566 9.73586Z"
                                                                                                    fill="#333333" />
                                                                                                <path
                                                                                                    d="M13.7312 17.4375H9.0957L9.40629 20.0558L13.3352 20.0635L13.7312 17.4375Z"
                                                                                                    fill="#333333" />
                                                                                                <path
                                                                                                    d="M16.6673 21.9052L14.3518 20.2109C14.3348 20.374 14.2649 20.9036 14.1748 20.961C13.7586 21.2219 13.2322 20.447 13.4232 21.9052H16.6688H16.6673Z"
                                                                                                    fill="#333333" />
                                                                                                <path
                                                                                                    d="M14.0239 16.3451C14.1963 16.196 14.7926 13.2594 15.1203 12.8183C14.7289 12.8727 13.9074 12.6599 13.6496 12.969C13.5363 13.1056 12.5191 16.2379 12.648 16.3591C12.9244 16.3047 13.9012 16.4491 14.0223 16.3435L14.0239 16.3451Z"
                                                                                                    fill="#333333" />
                                                                                                <path
                                                                                                    d="M22.8384 18.445C22.6785 17.4697 21.4237 16.788 20.5385 17.3672C19.9313 17.7648 19.2139 20.9452 18.5601 21.8645C18.0197 22.6239 17.195 22.9081 16.2866 22.9858C13.8422 23.197 8.81225 23.2234 6.39277 22.978C5.20321 22.8584 4.53234 22.3972 3.99347 21.3645C3.50584 20.4296 3.03064 18.24 2.52594 17.5893C2.26349 17.2507 1.74636 17.1032 1.33172 17.1545C-1.22598 17.4666 0.578543 22.1425 1.1873 23.5464C1.73083 24.7996 2.33648 26.3789 3.92048 26.3681C8.71752 26.0653 14.0224 26.7781 18.7589 26.3758C19.495 26.3137 20.0136 26.2299 20.5059 25.6522C21.5464 24.43 23.0916 19.9948 22.8384 18.4434V18.445Z"
                                                                                                    fill="#333333" />
                                                                                                <path
                                                                                                    d="M19.0679 27.3031C14.0348 27.679 8.53735 27.0096 3.45457 27.2969C2.40788 27.1836 1.89075 26.6121 1.21677 25.9102C0.842515 27.3311 0.489997 28.6853 2.37527 28.999C8.38982 28.3918 14.4385 28.3731 20.4531 28.999C22.3058 28.6853 21.9098 27.2985 21.6116 25.9102C20.8817 26.8047 20.259 27.2146 19.0694 27.3031H19.0679Z"
                                                                                                    fill="#333333" />
                                                                                                <path
                                                                                                    d="M17.8997 21.2895C17.9494 20.982 18.173 20.673 17.9835 20.367C17.7211 19.9431 15.1898 18.5641 14.6587 18.0547C14.6913 18.3544 14.3838 18.8529 14.5298 19.1045C14.6183 19.2551 17.0782 20.9913 17.3561 21.1404C17.5409 21.2398 17.6528 21.3531 17.8997 21.2895Z"
                                                                                                    fill="#333333" />
                                                                                            </svg>
                                                                                        </i>
                                                                                        <div
                                                                                            class="p_ad_text">
                                                                                            <h4>Child Seat
                                                                                            </h4>
                                                                                            <p>Suitable for
                                                                                                toddlers
                                                                                                weighing
                                                                                                0-18 kg
                                                                                                (approx O to
                                                                                                4
                                                                                                years).</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="custom_switch_main">
                                                                                        <label
                                                                                            class="custom_switch">
                                                                                            <input
                                                                                                type="checkbox">
                                                                                            <span
                                                                                                class="custom_switch_slider"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="p_ad_counter">
                                                                                    <div
                                                                                        class="adults_fields">
                                                                                        <div
                                                                                            class="increment-box">
                                                                                            <button
                                                                                                class="decrement">-</button>
                                                                                            <input
                                                                                                name="child_seat"
                                                                                                type="number"
                                                                                                class="floating-input number-input"
                                                                                                placeholder="0"
                                                                                                value=""
                                                                                                min="0">
                                                                                            <button
                                                                                                class="increment">+</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="hidden" name="child_price" value="{{ !empty($feature_rates->children_seat_charges) ? $feature_rates->children_seat_charges : 0 }}">
                                                                                    <strong class="child_amount">{!! !empty($feature_rates->children_seat_charges) ? html_entity_decode(currency_format($feature_rates->children_seat_charges)) : 0 !!}
                                                                                        </strong>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="p_ad_info">
                                                                                <div class="p_ad_heading">
                                                                                    <div class="p_ad_left">
                                                                                        <i
                                                                                            class="p_ad_icon">
                                                                                            <svg width="24"
                                                                                                height="29"
                                                                                                viewBox="0 0 24 29"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <g
                                                                                                    clip-path="url(#clip0_3483_45693)">
                                                                                                    <path
                                                                                                        d="M17.2902 10.6739C17.2205 11.3266 17.0433 11.7137 16.5658 12.144C16.0293 12.6275 15.3168 12.9996 14.7778 13.4931C14.9675 13.5207 15.1089 13.3954 15.3099 13.3967C15.3828 13.3967 15.5204 13.3685 15.4676 13.4919C15.4086 13.6315 14.9487 14.1063 14.8148 14.2823C14.6892 14.447 14.512 14.6368 14.4636 14.8398C14.5686 14.9519 16.0802 13.4975 16.2542 13.3372C16.3051 13.6297 15.8528 13.8652 15.8766 14.1508C16.662 13.4154 17.2865 12.4859 18.0121 11.7074C18.09 11.6241 18.4657 11.2101 18.5462 11.2702C18.9049 12.211 19.7436 12.8242 20.6408 13.2225L22.0651 13.7123C20.4316 13.765 18.702 14.0913 17.6678 15.4661C18.2364 15.3077 18.658 14.8448 19.2159 14.5986C19.9836 14.2598 21.4519 13.9954 22.2787 14.0957C23.5987 14.2554 24.1302 16.3919 24.0071 17.4955C23.9179 18.2916 22.9101 20.9667 22.4898 21.6826C22.1637 22.2382 21.4444 22.676 20.9983 23.1395C21.0567 23.2397 21.139 23.1164 21.1931 23.0825C21.5166 22.8815 22.4006 22.1875 22.6645 22.1061C22.7813 22.0704 22.748 22.128 22.7581 22.1981C22.9007 23.2241 21.3489 26.245 20.8821 27.2816C20.2274 28.7341 20.1614 30.5023 19.9654 32.0675L19.8366 32.251C19.4358 31.9429 19.3353 31.4136 18.9891 31.0622C19.4169 31.9629 19.6035 32.94 19.8052 33.9109C19.76 33.956 19.7593 33.9986 19.6777 33.9785C19.2649 33.877 18.2458 32.2385 18.0134 31.8151L17.1671 30.0601C17.4536 31.5633 18.0881 32.8974 19.2065 33.9447C19.383 34.11 19.6337 34.2491 19.8058 34.4119C19.929 34.5278 21.2044 35.7605 21.0611 35.8845L3.97212 35.9478C3.96521 34.9375 3.98217 33.9071 4.24165 32.9275C4.64374 31.408 5.23683 29.5571 5.79348 28.0858C6.07872 27.3317 6.40039 26.5099 6.86217 25.8635L7.05191 29.715L7.17631 30.3726C7.20395 29.1525 7.14301 27.9261 7.17443 26.706C7.23725 24.2814 7.48291 21.8392 8.18092 19.5042C8.58176 18.1626 9.33066 16.9067 9.31244 15.4655L9.00144 16.5635C8.8582 17.0433 8.45673 17.3232 7.95977 17.3464C7.48982 17.3677 5.92102 16.5102 5.41715 16.2497C4.48165 15.7661 3.58636 15.2018 2.65401 14.7132C2.80165 14.526 3.16793 14.5654 3.40919 14.4959C4.25045 14.2523 4.52626 13.5564 4.7273 12.7728C4.31453 12.9958 4.27369 12.2273 4.15935 12.149C4.01736 12.0513 3.82573 12.3582 3.71893 12.4246C3.27914 12.6977 2.725 12.8699 2.21484 12.9601C2.66155 12.4183 3.2339 11.9899 3.69191 11.4581C4.64751 10.3501 5.31662 8.94394 6.08374 7.70439C6.62217 6.83439 7.29945 6.03579 7.75432 5.11068C7.99558 4.62024 8.07914 4.30832 8.12123 3.754L8.40081 4.38223C8.57673 4.50061 8.79348 4.51877 8.99956 4.50437C9.00395 4.40728 8.88018 4.43234 8.81673 4.3434C8.76144 4.26573 8.74259 4.1605 8.74888 4.06655C9.10573 4.49998 10.0299 4.53944 10.0035 3.84294C9.99788 3.69512 9.77107 3.65817 9.69066 3.53353C9.77736 3.43268 9.88668 3.62623 10.0017 3.66193C10.2429 3.73709 10.557 3.68322 10.7606 3.90746C11.0904 4.27011 10.7204 4.5789 10.8291 4.74739C10.8907 4.8426 11.5227 4.91713 11.659 4.87016C12.0856 4.72296 11.7187 3.70702 11.539 3.44396C11.3977 3.23726 10.9076 2.85394 10.8209 2.65601C10.7889 2.5821 10.8398 2.53137 10.9139 2.56331C10.9786 2.5915 11.4706 3.04059 11.5434 3.12577C11.85 3.48467 12.0806 4.0653 12.0171 4.53944C11.9876 4.76055 11.845 4.75616 11.8262 4.94219C12.8528 5.27666 12.8289 4.32398 12.7704 3.59366C12.7082 2.80884 12.3413 2.62281 11.7627 2.1875C12.0756 2.20817 12.5782 2.56268 12.734 2.81573C12.9363 3.14394 12.9608 4.3221 12.8452 4.67536C12.7855 4.85826 12.6002 4.9472 12.5795 5.13009C14.1815 5.28292 14.8664 7.11186 13.9246 8.3821C13.8102 8.53618 13.6349 8.64454 13.5319 8.80489C13.3667 9.06294 13.1606 9.69305 12.9244 9.89035C12.8056 9.98994 11.6948 9.98305 11.5076 9.92543C11.3996 9.89223 10.797 9.31223 10.77 9.22016C10.726 9.07171 10.6921 8.56374 10.8825 8.54433C9.93568 7.58977 10.1813 6.0051 11.3273 5.34368C11.2708 4.93592 10.951 5.05744 10.699 5.22843C10.5677 5.31737 9.9338 6.09279 9.87851 6.22746C9.86657 6.25627 9.86217 6.33018 9.90867 6.32016C10.0017 6.22808 10.1788 6.0715 10.317 6.16357C9.90804 6.64523 9.34196 6.82312 9.21443 7.50709C9.19558 7.60731 9.14971 7.95556 9.19306 8.00566C9.22699 8.04512 9.60395 8.02884 9.62594 8.19921C9.53422 8.20797 9.08814 8.29754 9.06553 8.33011C8.97128 8.46415 9.69694 9.81206 9.75097 10.0789C9.45882 9.79828 9.3206 9.34042 9.07872 9.03037C9.03851 8.97901 9.07935 8.91575 8.9361 8.95145C8.85066 9.30722 8.54532 9.63229 8.50888 10.0031C8.485 10.2417 8.57484 10.409 8.60437 10.6282C8.6138 10.6958 8.67411 10.8443 8.55914 10.8299C8.30469 10.2342 8.36375 9.89411 8.57359 9.31098C8.63453 9.14124 8.84374 8.8481 8.86071 8.71845C8.87767 8.5888 8.79977 8.42657 8.81484 8.23929C8.86196 7.65115 9.19683 7.44759 8.98134 6.74545C8.82427 6.23435 8.52458 5.8078 8.59055 5.19398C7.86113 6.05646 7.11662 6.90955 6.46071 7.83091C6.11956 8.3107 5.44668 9.21389 5.30909 9.75193C5.18846 10.2211 5.10301 10.8199 5.04018 11.3003L5.26888 10.7127C5.95432 10.6821 6.51851 11.1762 6.74846 11.7894L7.11285 13.2106C7.14301 12.7096 7.27369 12.2116 7.06259 11.7274C7.01547 11.6197 6.59579 11.0923 6.67432 11.019C6.95704 11.081 7.23537 11.0929 7.525 11.0842C7.81463 11.0754 8.49631 10.8875 8.67788 11.1193C8.82867 11.3122 9.37338 12.7935 9.45568 13.0998C9.74846 14.1871 9.8094 15.8451 9.88039 16.9982C10.0211 19.2894 9.72772 24.1448 11.1652 25.9268C12.2773 27.306 13.3943 27.0937 14.7357 26.1648C16.2303 25.1301 16.8957 23.6143 15.597 22.0722C15.4224 21.8643 14.4938 21.1302 14.4737 21.0575C14.4285 20.8916 14.5836 20.6705 14.6892 20.5439C15.1962 19.9357 16.3767 19.9057 17.0402 19.5054L16.64 19.4823L15.7214 19.694C16.0802 19.3846 15.9671 19.1334 16.3924 18.8597C16.8976 18.534 17.6063 18.3085 18.1711 18.0955C18.1862 17.9872 18.0278 18.036 17.9524 18.0335C17.4266 18.0179 17.25 18.1776 16.7895 18.3461C17.1508 17.5919 18.2678 17.6145 18.9885 17.7197C19.0016 17.6308 18.8157 17.622 18.7516 17.6126C18.5958 17.5894 17.8708 17.54 17.7947 17.4692C17.6597 17.3433 18.1221 17.2969 18.1893 17.2675C18.8075 16.9938 18.6448 16.7132 18.8911 16.5265C19.1826 16.3061 20.725 16.2353 21.1246 16.3424C21.1485 16.1745 20.9229 16.1044 20.7991 16.0724C20.0873 15.8877 19.2504 16.2321 18.5493 16.3418C18.9765 15.8996 19.5828 15.51 20.1822 15.3396C20.1935 15.2187 19.988 15.2882 19.9277 15.3051C18.5028 15.6929 17.4706 17.2713 16.4138 18.254C16.2052 18.4482 15.8735 18.6066 15.6592 18.8171C15.0812 19.3858 14.7407 20.1882 14.2909 20.8333C14.2532 20.8872 14.3009 20.9498 14.152 20.9147C13.8624 20.2182 13.4948 19.5286 13.2894 18.7989C12.9438 17.5738 12.4067 15.1686 12.3263 13.9334C12.3219 13.8658 12.2829 13.6378 12.391 13.6497C12.4909 13.9422 12.6599 14.4345 12.8414 14.6732C12.8955 14.7439 12.9074 14.8016 13.0199 14.7765C13.1776 14.4771 12.9589 14.4583 12.8955 14.2134L13.1462 14.2754L12.9596 13.8382L13.0833 13.7756L12.4563 13.4605L12.7698 13.3678L12.3941 13.1173C12.7906 12.7672 12.9564 12.2598 13.2417 11.8333C13.2599 12.0525 13.1179 12.2711 13.0909 12.4972C13.0726 12.6513 13.0858 12.8073 13.084 12.9607L14.0264 12.8354C14.0622 13.0465 13.9466 13.1768 13.8385 13.3359C14.6735 13.1342 15.582 12.5523 16.2266 11.9905C17.0817 11.2458 16.9874 11.046 17.1872 10.0037C17.2004 9.93357 17.1991 9.75506 17.294 9.76571C17.272 10.0582 17.3248 10.387 17.294 10.6739H17.2902ZM12.0586 5.83474C10.5018 6.09968 10.7876 8.55936 12.4117 8.44599C14.2073 8.32072 13.9466 5.51342 12.0586 5.83474Z"
                                                                                                        fill="#333333" />
                                                                                                    <path
                                                                                                        d="M11.1034 0.998625C12.0678 0.848927 12.5522 -0.170145 13.7767 0.0246503C14.1725 0.0872853 14.5979 0.392318 14.9371 0.434283C15.2016 0.46748 14.8184 0.0766374 14.8416 0.0597259C15.1878 0.0854063 15.566 0.389812 15.5962 0.748085C15.7935 0.580849 16.0121 0.436789 16.286 0.435536C16.2534 0.55329 16.0655 0.55329 16.0033 0.68545C15.8406 1.02806 16.3596 0.911562 16.5543 0.951022C16.7949 0.999251 17.3258 1.31368 17.4169 1.53227C17.4886 1.70452 17.0695 1.58426 17.1015 1.78219C17.1292 1.95318 17.4113 2.10413 17.5087 2.25446C17.8109 2.72109 17.7769 3.65122 17.8743 4.20742C17.9271 4.50932 18.3292 5.77016 18.2934 5.90983C18.2255 6.17541 18.0081 5.82152 17.8995 5.83091C17.3152 5.88228 17.4075 7.59973 17.3221 8.01437C17.1795 8.01374 17.1757 7.90476 17.1625 7.79765C17.1267 7.50828 17.1952 7.15627 17.165 6.85562C17.1135 6.35141 16.8282 6.2656 16.5901 5.86286C16.3043 5.37994 16.1591 4.40472 15.5767 4.17422C15.4266 4.11472 15.1307 4.24688 14.9993 4.06649C14.9403 3.98506 14.7248 3.08688 14.6375 2.86202C14.5552 2.65031 14.4019 2.20623 14.2467 2.06154C14.0582 1.88554 12.7508 1.32182 12.4875 1.30804C11.4044 1.25104 10.2163 1.83856 9.125 1.93752C9.32102 1.34875 10.1472 1.55482 10.5694 1.21722L10.004 0.998625C10.3445 0.96167 10.7774 1.04936 11.1034 0.998625Z"
                                                                                                        fill="#333333" />
                                                                                                    <path
                                                                                                        d="M15.1525 5.50407C15.128 5.53852 14.8798 5.53476 14.8402 5.60053C15.1368 5.92435 15.6105 5.78342 15.8134 6.25882C15.9661 6.61584 15.968 7.618 15.7487 7.94809C15.6218 8.13913 15.3007 8.25437 15.121 8.44979C14.8239 8.77362 14.7271 9.27532 14.3376 9.51584C14.3816 8.96027 15.4678 7.85351 14.2113 8.13725C14.9344 7.08247 14.3514 5.72267 13.2689 5.19278C13.7684 4.69671 13.9041 4.52634 13.8268 3.79226C13.7288 2.86025 13.2325 2.50699 12.6406 1.875C13.0484 1.99401 13.5353 2.46502 13.72 2.83394C13.9349 3.26174 13.9349 3.73776 14.0681 4.17809C14.1416 4.42237 14.2327 4.74306 14.5531 4.69545C14.6913 4.67478 14.9055 4.3566 14.9966 4.50504C15.0431 4.5802 15.182 5.46399 15.1525 5.5047V5.50407Z"
                                                                                                        fill="#333333" />
                                                                                                    <path
                                                                                                        d="M8.68182 2.125C8.20999 2.51334 7.55219 2.69435 7.02946 3.01379C6.34402 3.43219 5.67993 4.21763 5.13145 4.81705C4.36685 5.65198 3.67889 6.56081 2.90234 7.38571C3.18318 6.78066 3.6192 6.24576 4.03386 5.72714C4.91596 4.62601 6.10528 3.2136 7.38255 2.61418C7.79847 2.41876 8.23575 2.24025 8.68182 2.125Z"
                                                                                                        fill="#333333" />
                                                                                                    <path
                                                                                                        d="M1.01851 10.0827C0.738925 10.6019 0.427302 11.2815 0.396516 11.8766C0.345626 12.8718 1.25474 13.651 1.96091 14.2154C1.3295 13.9968 0.153375 13.1581 0.0277204 12.4791C-0.107358 11.7463 0.273375 10.9947 0.689919 10.4128C0.764684 10.3082 0.872118 10.0677 1.01851 10.0827Z"
                                                                                                        fill="#333333" />
                                                                                                    <path
                                                                                                        d="M13.3945 11.5224C13.4492 11.4015 13.7269 10.7733 13.7715 10.7401C13.8494 10.6831 14.57 10.5077 14.6504 10.6781C14.6662 10.747 14.0781 11.1967 13.9807 11.2618C13.806 11.3777 13.6132 11.5293 13.3945 11.5224Z"
                                                                                                        fill="#333333" />
                                                                                                    <path
                                                                                                        d="M18.1079 8.14019C18.0884 7.87337 18.2637 7.63159 18.2316 7.36352C18.1996 7.09544 17.8572 6.62442 17.8069 6.27743C17.7881 6.14464 17.7554 6.03941 17.8873 5.94922C18.1814 5.9511 18.6463 7.91032 18.1079 8.14019Z"
                                                                                                        fill="#333333" />
                                                                                                    <path
                                                                                                        d="M17.6687 7.95205C17.6794 7.5894 17.4218 7.24365 17.511 6.88788L17.7309 7.07516L17.6065 6.63672C17.9703 6.93298 18.1902 7.68648 17.6693 7.95205H17.6687Z"
                                                                                                        fill="#333333" />
                                                                                                    <path
                                                                                                        d="M9.24949 10.5205C9.0208 10.3395 8.81912 9.98687 9.09305 9.76953L9.24949 10.5205Z"
                                                                                                        fill="#333333" />
                                                                                                    <path
                                                                                                        d="M8.80813 10.392C8.68938 10.382 8.6787 10.1396 8.68499 10.055L8.93378 9.45312L8.80813 10.392Z"
                                                                                                        fill="#333333" />
                                                                                                </g>
                                                                                                <defs>
                                                                                                    <clipPath
                                                                                                        id="clip0_3483_45693">
                                                                                                        <rect
                                                                                                            width="24"
                                                                                                            height="29"
                                                                                                            fill="white" />
                                                                                                    </clipPath>
                                                                                                </defs>
                                                                                            </svg>
                                                                                        </i>
                                                                                        <div
                                                                                            class="p_ad_text">
                                                                                            <h4>photography
                                                                                            </h4>
                                                                                            <p>Our professional photography ensures high-quality images that tell your story beautifully
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="custom_switch_main">
                                                                                        <label
                                                                                            class="custom_switch">
                                                                                            <input
                                                                                                type="checkbox">
                                                                                            <span
                                                                                                class="custom_switch_slider"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="p_ad_counter">
                                                                                    <div
                                                                                        class="adults_fields">
                                                                                        <div
                                                                                            class="increment-box">
                                                                                            <button
                                                                                                class="decrement">-</button>
                                                                                            <input
                                                                                                name="photography"
                                                                                                type="number"
                                                                                                class="floating-input number-input"
                                                                                                placeholder="0"
                                                                                                value=""
                                                                                                min="0">
                                                                                            <button
                                                                                                class="increment">+</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="hidden" name="photography_price" value="{{ !empty($feature_rates->photography_charges) ? $feature_rates->photography_charges : 0}}">
                                                                                    <strong class="photography_amount">{!! !empty($feature_rates->photography_charges) ? html_entity_decode(currency_format($feature_rates->photography_charges)) : 0 !!}
                                                                                        </strong>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="p_ad_info">
                                                                                <div class="p_ad_heading">
                                                                                    <div class="p_ad_left">
                                                                                        <i
                                                                                            class="p_ad_icon">
                                                                                            <svg width="28"
                                                                                                height="28"
                                                                                                viewBox="0 0 28 28"
                                                                                                fill="none"
                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                <path
                                                                                                    d="M25.5735 19.5401C25.1885 22.6434 22.6452 25.1867 19.5418 25.5717C17.6635 25.8051 15.9135 25.2917 14.5485 24.2884C13.7668 23.7167 13.9535 22.5034 14.8868 22.2234C18.3985 21.1617 21.1635 18.3851 22.2368 14.8734C22.5168 13.9517 23.7302 13.7651 24.3018 14.5351C25.2935 15.9117 25.8068 17.6617 25.5735 19.5401Z"
                                                                                                    fill="#292D32" />
                                                                                                <path
                                                                                                    d="M11.6547 2.33203C6.50967 2.33203 2.33301 6.5087 2.33301 11.6537C2.33301 16.7987 6.50967 20.9754 11.6547 20.9754C16.7997 20.9754 20.9763 16.7987 20.9763 11.6537C20.9647 6.5087 16.7997 2.33203 11.6547 2.33203ZM10.558 10.347L13.3697 11.327C14.3847 11.6887 14.8747 12.4004 14.8747 13.497C14.8747 14.757 13.8713 15.7954 12.6463 15.7954H12.5413V15.8537C12.5413 16.332 12.1447 16.7287 11.6663 16.7287C11.188 16.7287 10.7913 16.332 10.7913 15.8537V15.7837C9.49634 15.7254 8.45801 14.6404 8.45801 13.287C8.45801 12.8087 8.85467 12.412 9.33301 12.412C9.81134 12.412 10.208 12.8087 10.208 13.287C10.208 13.707 10.5113 14.0454 10.8847 14.0454H12.6347C12.903 14.0454 13.113 13.8004 13.113 13.497C13.113 13.0887 13.043 13.0654 12.7747 12.972L9.96301 11.992C8.95967 11.642 8.45801 10.9304 8.45801 9.82203C8.45801 8.56203 9.46134 7.5237 10.6863 7.5237H10.7913V7.47703C10.7913 6.9987 11.188 6.60203 11.6663 6.60203C12.1447 6.60203 12.5413 6.9987 12.5413 7.47703V7.54703C13.8363 7.60536 14.8747 8.69036 14.8747 10.0437C14.8747 10.522 14.478 10.9187 13.9997 10.9187C13.5213 10.9187 13.1247 10.522 13.1247 10.0437C13.1247 9.6237 12.8213 9.28537 12.448 9.28537H10.698C10.4297 9.28537 10.2197 9.53037 10.2197 9.8337C10.208 10.2304 10.278 10.2537 10.558 10.347Z"
                                                                                                    fill="#292D32" />
                                                                                            </svg>
                                                                                        </i>
                                                                                        <div
                                                                                            class="p_ad_text">
                                                                                            <h4>Chauffeur Tip: </h4>
                                                                                            <p>A generous gesture is always valued 

                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="custom_switch_main">
                                                                                        <label
                                                                                            class="custom_switch">
                                                                                            <input
                                                                                                type="checkbox">
                                                                                            <span
                                                                                                class="custom_switch_slider"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="p_ad_dropdown">
                                                                                    <div class="form_row">
                                                                                        <div
                                                                                            class="form_cell padb-0">
                                                                                            <div
                                                                                                class="formSelect form-floating">
                                                                                                <select
                                                                                                    name="select_tip"
                                                                                                    class="SelectTipDropdown">
                                                                                                    <option
                                                                                                        value=""
                                                                                                        disabled
                                                                                                        selected>
                                                                                                        Select
                                                                                                        Tip
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="AED 5">
                                                                                                        AED
                                                                                                        5
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="AED 10">
                                                                                                        AED
                                                                                                        10
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="AED 15">
                                                                                                        AED
                                                                                                        15
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="AED 20">
                                                                                                        AED
                                                                                                        20
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="AED 25">
                                                                                                        AED
                                                                                                        25
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="AED 30">
                                                                                                        AED
                                                                                                        30
                                                                                                    </option>
                                                                                                </select>
                                                                                                <label
                                                                                                    class="floating-label"
                                                                                                    for="SelectDesiredCity">Select
                                                                                                    Tip</label>
                                                                                                <i
                                                                                                    class="field_icon"><svg
                                                                                                        width="22"
                                                                                                        height="22"
                                                                                                        viewBox="0 0 22 22"
                                                                                                        fill="none"
                                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                                        <path
                                                                                                            d="M8.25016 20.1654H13.7502C18.3335 20.1654 20.1668 18.332 20.1668 13.7487V8.2487C20.1668 3.66536 18.3335 1.83203 13.7502 1.83203H8.25016C3.66683 1.83203 1.8335 3.66536 1.8335 8.2487V13.7487C1.8335 18.332 3.66683 20.1654 8.25016 20.1654Z"
                                                                                                            stroke="#8D8D8D"
                                                                                                            stroke-width="1.375"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round" />
                                                                                                        <path
                                                                                                            d="M8.25 1.83203L12.7875 20.1654"
                                                                                                            stroke="#8D8D8D"
                                                                                                            stroke-width="1.375"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round" />
                                                                                                        <path
                                                                                                            d="M10.5694 11.2031L1.8335 13.7515"
                                                                                                            stroke="#8D8D8D"
                                                                                                            stroke-width="1.375"
                                                                                                            stroke-linecap="round"
                                                                                                            stroke-linejoin="round" />
                                                                                                    </svg>

                                                                                                </i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="form_row p_nextBtnWidth pt_20">
                                                                    <div class="form_cell padb-0">
                                                                        <a
                                                                            class="p_nextBtn all_btn btn_large w_100 justify_content_center uppercase">
                                                                            <span
                                                                                class="mr_auto">Next</span>
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
                                    <!-- step 3 Payment Method  -->
                                    <div class="passengerPayment_offsetter"></div>
                                    <div class="passenger_payment">
                                        <div class="passengerDetailHeading">
                                            <h2>Payment Method </h2>
                                            
                                        </div>
                                        <div class="passenger_payment_inner">
                                            <div class="passenger_payment_details">
                                                <div class="p_paymentDetails_left">
                                                    <h4 class="p_paymentDetail_heading">Price Breakdown</h4>
                                                    <div class="p_paymentDetails_info">
                                                        <ul>
                                                            <li>
                                                                <div class="p_price_breakdown">
                                                                    <span>Outward :</span>
                                                                    <strong class="outward">AED 133.00</strong>
                                                                </div>
                                                            </li>
                                                            <li class="return-li">
                                                                <div class="p_price_breakdown">
                                                                    <span>Return :</span>
                                                                    <strong class="return">AED 119.70</strong>
                                                                </div>
                                                            </li>
                                                            <li class="child-seat-li">
                                                                <div class="p_price_breakdown">
                                                                    <span>Child Seat :</span>
                                                                    <strong class="children_seat">AED 50.00</strong>
                                                                </div>
                                                            </li>
                                                            <li class="photography-li">
                                                                <div class="p_price_breakdown">
                                                                    <span>Photography : </span>
                                                                    <strong class="photography">AED 950.00</strong>
                                                                </div>
                                                            </li>
                                                            <li class="tip-li">
                                                                <div class="p_price_breakdown">
                                                                    <span>Tip :</span>
                                                                    <strong class="tip_amount">AED 5.00</strong>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="total_p_breakdown">
                                                            <div class="p_price_breakdown">
                                                                <span>Total</span>
                                                                <strong class="total_amount">AED 1257.70</strong>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="p_paymentDetails_right">
                                                    <h4 class="p_paymentDetail_heading">Discount Voucher
                                                        Code
                                                    </h4>
                                                    <div class="p_voucherCode">
                                                        <input type="hidden" name="coupon_id" value="">
                                                        <input type="hidden" name="copoun_amount" value="">
                                                        <input type="hidden" name="get_copon" value="{{ route('get.copon.code') }}">
                                                        <input type="text" name="discount_voucher"
                                                            class="floating-input fieldHasNotIcon"
                                                            placeholder="Discount Voucher Code" />
                                                        <a class="all_btn outlined_green_btn btn_large flexible uppercase apply_copoun"
                                                            href="javascript:void(0)">
                                                            <span>Apply</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p_payment_plan">
                                                <div class="p_payment_plan_left selectPaymentBtn active" data-type="card">
                                                    <span>Pay With Card</span>
                                                    <div class="payment_cards">
                                                        <ul>
                                                            <li>
                                                                <a class="payment_card"
                                                                    href="javascript:void(0)">
                                                                    <img src="{{ asset('front/images/visa_img.svg') }}" alt="#">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="payment_card"
                                                                    href="javascript:void(0)">
                                                                    <img src="{{ asset('front/images/masterCard_img.svg') }}"
                                                                        alt="#">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="payment_card"
                                                                    href="javascript:void(0)">
                                                                    <img src="{{ asset('front/images/maestro_img.svg') }}"
                                                                        alt="#">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="payment_card"
                                                                    href="javascript:void(0)">
                                                                    <img src="{{ asset('front/images/americanExpress_img.svg') }}"
                                                                        alt="#">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="payment_card"
                                                                    href="javascript:void(0)">
                                                                    <img src="{{ asset('front/images/applePay_img.svg') }}"
                                                                        alt="#">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="payment_card"
                                                                    href="javascript:void(0)">
                                                                    <img src="{{ asset('front/images/samsungPay_img.svg') }}"
                                                                        alt="#">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="payment_card"
                                                                    href="javascript:void(0)">
                                                                    <img src="{{ asset('front/images/googlePay_img.svg') }}"
                                                                        alt="#">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="p_payment_plan_right">
                                                    <button class="all_btn cashOnArrivalBtn selectPaymentBtn" type="button" data-type="cash">
                                                        <svg width="28" height="29" viewBox="0 0 28 29"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.4"
                                                                d="M22.5178 9.73876V15.7471C22.5178 19.3405 20.4644 20.8804 17.3844 20.8804H7.12942C6.60442 20.8804 6.10275 20.8338 5.63609 20.7288C5.34442 20.6821 5.06443 20.6005 4.80776 20.5071C3.05776 19.8538 1.99609 18.3371 1.99609 15.7471V9.73876C1.99609 6.14543 4.04942 4.60547 7.12942 4.60547H17.3844C19.9978 4.60547 21.8761 5.7138 22.3778 8.24546C22.4594 8.71213 22.5178 9.19043 22.5178 9.73876Z"
                                                                fill="#292D32" />
                                                            <path
                                                                d="M26.0164 13.2394V19.2478C26.0164 22.8411 23.9631 24.381 20.8831 24.381H10.6281C9.76476 24.381 8.98311 24.2644 8.30644 24.0078C6.91811 23.4944 5.9731 22.4328 5.63477 20.7294C6.10143 20.8344 6.6031 20.881 7.1281 20.881H17.3831C20.4631 20.881 22.5164 19.3411 22.5164 15.7478V9.73939C22.5164 9.19106 22.4698 8.70109 22.3764 8.24609C24.5931 8.71276 26.0164 10.2761 26.0164 13.2394Z"
                                                                fill="#292D32" />
                                                            <path
                                                                d="M12.249 15.8319C13.95 15.8319 15.329 14.4529 15.329 12.7519C15.329 11.0509 13.95 9.67188 12.249 9.67188C10.5479 9.67188 9.16895 11.0509 9.16895 12.7519C9.16895 14.4529 10.5479 15.8319 12.249 15.8319Z"
                                                                fill="#292D32" />
                                                            <path
                                                                d="M5.57617 10.125C5.09784 10.125 4.70117 10.5217 4.70117 11V14.5C4.70117 14.9783 5.09784 15.375 5.57617 15.375C6.05451 15.375 6.45117 14.9783 6.45117 14.5V11C6.45117 10.5217 6.06617 10.125 5.57617 10.125Z"
                                                                fill="#292D32" />
                                                            <path
                                                                d="M18.9131 10.125C18.4348 10.125 18.0381 10.5217 18.0381 11V14.5C18.0381 14.9783 18.4348 15.375 18.9131 15.375C19.3914 15.375 19.7881 14.9783 19.7881 14.5V11C19.7881 10.5217 19.4031 10.125 18.9131 10.125Z"
                                                                fill="#292D32" />
                                                        </svg>

                                                        Cash on Arrival
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="payment_terms_checks">
                                                <div class="checkbox-wrapper terms-wrapper">
                                                    <label class="checkbox">
                                                        <input class="checkbox__trigger visuallyhidden"
                                                            type="checkbox" name="accept"/>
                                                        <span class="checkbox__symbol">
                                                            <svg aria-hidden="true" class="icon-checkbox"
                                                                width="28px" height="28px"
                                                                viewBox="0 0 28 28" version="1"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4 14l8 7L24 7"></path>
                                                            </svg>
                                                        </span>
                                                        <p class="checkbox__textwrapper">I accept the</p>
                                                    </label>
                                                    <p class="terms"><a target="_blank" href="{{ route('terms') }}">Terms &
                                                            Conditions</a> - <a
                                                             target="_blank" href="{{ route('booking.conditions') }}">Booking
                                                            Conditions</a>
                                                        and <a target="_blank" href="{{ route('privacy') }}">Privacy
                                                            Policy</a>. *
                                                    </p>
                                                </div>
                                                <div class="checkbox-wrapper">
                                                    <label class="checkbox">
                                                        <input class="checkbox__trigger visuallyhidden"
                                                            type="checkbox" name="subscribe"/>
                                                        <span class="checkbox__symbol">
                                                            <svg aria-hidden="true" class="icon-checkbox"
                                                                width="28px" height="28px"
                                                                viewBox="0 0 28 28" version="1"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4 14l8 7L24 7"></path>
                                                            </svg>
                                                        </span>
                                                        <p class="checkbox__textwrapper">I want to subscribe
                                                            to
                                                            C2CRides newsletter (Tour Tips and Special
                                                            Deals)
                                                        </p>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="p_payment_confirm_btn p_nextBtnWidth">
                                                <input type="hidden" name="payment_method" value="card">
                                                <input type="hidden" name="confirm_csrf_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="confirm_url" value="{{ route('rides.confirm.post') }}">
                                                <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse">
                                                <input type="hidden" name="captcha_key" value="{{ env('RECAPTCHA_SITE_KEY') }}">
                                                <a href="javascript(0)"
                                                    class="all_btn btn_large w_100 justify_content_center uppercase rides_search_btn btn-confirm"
                                                    type="button">Confirm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_right">
                            <div class="animatedParent animateOnce hide_on_mobile">
                                <div class="v_outward_box v_box animated fadeInUpShort slow">
                                    <div class="v_outward_heading">
                                        <h4>Outward Journey</h4>
                                        <a href="javascript:void(0)" class="v_outward_edit">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.94355 2.70041L3.78605 9.21791C3.55355 9.46541 3.32855 9.95291 3.28355 10.2904L3.00605 12.7204C2.90855 13.5979 3.53855 14.1979 4.40855 14.0479L6.82355 13.6354C7.16105 13.5754 7.63355 13.3279 7.86605 13.0729L14.0235 6.55541C15.0885 5.43041 15.5685 4.14791 13.911 2.58041C12.261 1.02791 11.0085 1.57541 9.94355 2.70041Z"
                                                    stroke="#0FA85B" stroke-width="1.125"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M8.91797 3.78906C9.24047 5.85906 10.9205 7.44156 13.0055 7.65156"
                                                    stroke="#0FA85B" stroke-width="1.125"
                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M2.25 16.5H15.75" stroke="#0FA85B"
                                                    stroke-width="1.125" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="v_fromTo_box_row">
                                        <div class="v_fromTo_box">
                                            <ul>
                                                <li>
                                                    <div class="v_fromTo_box_info">
                                                        <div class="v_fromTo_box_title">
                                                            <h4 class="v_from_after">From</h4>
                                                            @if(session("step_one_data")["ride_type_id"] == 1)
                                                            <span>{{ $data['way'] == 'one-way' ? 'One-Way' : 'Two-Way'}} Journey</span>
                                                            @endif
                                                        </div>
                                                        <div class="v_fromTo_box_text">
                                                            {{-- <h5>Dubai Airport (DXB)</h5> --}}
                                                            <p>{{ $data['source'] }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                 @if(session("step_one_data")["ride_type_id"] == 1 || session("step_one_data")["ride_type_id"] == 3)
                                                <li>
                                                   
                                                    <div class="v_fromTo_box_info">
                                                        <div class="v_fromTo_box_title">
                                                            <h4 class="v_to_after">To</h4>
                                                            <!-- <span>One-Way Journey</span> -->
                                                        </div>
                                                        <div class="v_fromTo_box_text">
                                                            {{-- <h5>Juanda Airport (SUB)</h5> --}}
                                                            <p>{{ $data['destination'] }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>

                                        <div class="v_dateTime">
                                            <div class="v_dateTime_title">
                                                <i>
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 2V5" stroke="#0FA85B" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M16 2V5" stroke="#0FA85B"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M3.5 9.08984H20.5" stroke="#0FA85B"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M10 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5V11.5"
                                                            stroke="#0FA85B" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M11.9945 13.6992H12.0035" stroke="#0FA85B"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M8.29529 13.6992H8.30427" stroke="#0FA85B"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M8.29529 16.6992H8.30427" stroke="#0FA85B"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M21.25 17.5C21.25 19.57 19.57 21.25 17.5 21.25C15.43 21.25 13.75 19.57 13.75 17.5C13.75 15.43 15.43 13.75 17.5 13.75C19.57 13.75 21.25 15.43 21.25 17.5Z"
                                                            stroke="#0FA85B" stroke-width="1.3"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M18.8894 18.6927L17.7269 17.9989C17.5244 17.8789 17.3594 17.5902 17.3594 17.3539V15.8164"
                                                            stroke="#0FA85B" stroke-width="1.3"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </i>
                                                <h5>{{ $data['rides_date'] }} - {{ $data['rides_time'] }}</h5>
                                            </div>
                                            <div class="v_dateTime_details">
                                                <ul>
                                                    
                                                    <li>
                                                        <div class="v_dateTime_text">
                                                            <i>
                                                                <svg width="24" height="23"
                                                                    viewBox="0 0 24 23" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M15.1053 1.91797H8.89532C5.29199 1.91797 5.01407 5.15714 6.95949 6.92047L17.0412 16.0821C18.9866 17.8455 18.7087 21.0846 15.1053 21.0846H8.89532C5.29199 21.0846 5.01407 17.8455 6.95949 16.0821L17.0412 6.92047C18.9866 5.15714 18.7087 1.91797 15.1053 1.91797Z"
                                                                        stroke="#0FA85B"
                                                                        stroke-width="1.4375"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>

                                                            </i>
                                                            <span><br>
                                                                
                                                                @if(session("step_one_data")["ride_type_id"] == 1)
                                                                 {{ $data['duration'] }}
                                                                @elseif(session("step_one_data")["ride_type_id"] == 2)
                                                                 {{ $data["byHours_durantion"]}} hrs
                                                                @elseif(session("step_one_data")["ride_type_id"] == 3)
                                                                {{ $data["hours"]." hr"}}
                                                                @endif
                                                            
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="v_dateTime_text">
                                                            <i>
                                                                <svg width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M9.15859 10.87C9.05859 10.86 8.93859 10.86 8.82859 10.87C6.44859 10.79 4.55859 8.84 4.55859 6.44C4.55859 3.99 6.53859 2 8.99859 2C11.4486 2 13.4386 3.99 13.4386 6.44C13.4286 8.84 11.5386 10.79 9.15859 10.87Z"
                                                                        stroke="#0FA85B" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M16.4112 4C18.3512 4 19.9112 5.57 19.9112 7.5C19.9112 9.39 18.4113 10.93 16.5413 11C16.4613 10.99 16.3713 10.99 16.2812 11"
                                                                        stroke="#0FA85B" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M4.15875 14.56C1.73875 16.18 1.73875 18.82 4.15875 20.43C6.90875 22.27 11.4188 22.27 14.1688 20.43C16.5888 18.81 16.5888 16.17 14.1688 14.56C11.4288 12.73 6.91875 12.73 4.15875 14.56Z"
                                                                        stroke="#0FA85B" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M18.3398 20C19.0598 19.85 19.7398 19.56 20.2998 19.13C21.8598 17.96 21.8598 16.03 20.2998 14.86C19.7498 14.44 19.0798 14.16 18.3698 14"
                                                                        stroke="#0FA85B" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            <span class="passengers">{{ $data['total_passengers']}}<br>  Passengers</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="v_dateTime_text">
                                                            <i>
                                                                <svg width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M2.0681 4.59891C2.8681 1.13891 8.0781 1.13891 8.8681 4.59891C9.3381 6.62891 8.0481 8.34891 6.9281 9.41891C6.1081 10.1989 4.8181 10.1889 3.9981 9.41891C2.8881 8.34891 1.5981 6.62891 2.0681 4.59891Z"
                                                                        stroke="#0FA85B"
                                                                        stroke-width="1.5" />
                                                                    <path
                                                                        d="M15.0719 16.5989C15.8719 13.1389 21.1119 13.1389 21.9119 16.5989C22.3819 18.6289 21.0919 20.3489 19.9619 21.4189C19.1419 22.1989 17.8419 22.1889 17.0219 21.4189C15.8919 20.3489 14.6019 18.6289 15.0719 16.5989Z"
                                                                        stroke="#0FA85B"
                                                                        stroke-width="1.5" />
                                                                    <path
                                                                        d="M12.0017 5H14.6817C16.5317 5 17.3917 7.29 16.0017 8.51L8.01165 15.5C6.62165 16.71 7.48165 19 9.32165 19H12.0017"
                                                                        stroke="#0FA85B" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M5.48768 5.5H5.49924"
                                                                        stroke="#0FA85B" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M18.4877 17.5H18.4992"
                                                                        stroke="#0FA85B" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            <span><br>
                                                                @if(session("step_one_data")["ride_type_id"] == 1)
                                                                {{ $data['distance']}} KM 
                                                                @elseif(session("step_one_data")["ride_type_id"] == 2)
                                                                 unlimited Km
                                                                @elseif(session("step_one_data")["ride_type_id"] == 3)
                                                                  {{ $data["hours"] == 5 ? 'Half Day' : 'Full Day'}}
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- return journey box location -->
                                    @if(!empty($data['rides_return_date']))
                                    <div class="v_fromTo_box_row">
                                        <div class="v_fromTo_box">
                                            <ul>
                                                <li>
                                                    <div class="v_fromTo_box_info">
                                                        <div class="v_fromTo_box_title">
                                                            <h4 class="v_from_after">From</h4>
                                                            <span>Return Journey</span>
                                                        </div>
                                                        <div class="v_fromTo_box_text">
                                                            {{-- <h5>Juanda Airport (SUB) </h5> --}} 
                                                            <p>{{ $data['destination']}}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="v_fromTo_box_info">
                                                        <div class="v_fromTo_box_title">
                                                            <h4 class="v_to_after">To</h4>
                                                            <!-- <span>One-Way Journey</span> -->
                                                        </div>
                                                        <div class="v_fromTo_box_text">
                                                            {{-- <h5>Juanda Airport (SUB)</h5> --}}
                                                            <p>{{ $data['source']}}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="v_dateTime">
                                            <div class="v_dateTime_title">
                                                <i>
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 2V5" stroke="#0FA85B" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M16 2V5" stroke="#0FA85B"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M3.5 9.08984H20.5" stroke="#0FA85B"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M10 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5V11.5"
                                                            stroke="#0FA85B" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M11.9945 13.6992H12.0035" stroke="#0FA85B"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M8.29529 13.6992H8.30427" stroke="#0FA85B"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M8.29529 16.6992H8.30427" stroke="#0FA85B"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M21.25 17.5C21.25 19.57 19.57 21.25 17.5 21.25C15.43 21.25 13.75 19.57 13.75 17.5C13.75 15.43 15.43 13.75 17.5 13.75C19.57 13.75 21.25 15.43 21.25 17.5Z"
                                                            stroke="#0FA85B" stroke-width="1.3"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M18.8894 18.6927L17.7269 17.9989C17.5244 17.8789 17.3594 17.5902 17.3594 17.3539V15.8164"
                                                            stroke="#0FA85B" stroke-width="1.3"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </i>
                                                <h5>{{ $data['rides_return_date']}} - {{ $data['rides_return_time']}}</h5>
                                            </div>
                                            <div class="v_dateTime_details">
                                                <ul>
                                                    <li>
                                                        <div class="v_dateTime_text">
                                                            <i>
                                                                <svg width="24" height="23"
                                                                    viewBox="0 0 24 23" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M15.1053 1.91797H8.89532C5.29199 1.91797 5.01407 5.15714 6.95949 6.92047L17.0412 16.0821C18.9866 17.8455 18.7087 21.0846 15.1053 21.0846H8.89532C5.29199 21.0846 5.01407 17.8455 6.95949 16.0821L17.0412 6.92047C18.9866 5.15714 18.7087 1.91797 15.1053 1.91797Z"
                                                                        stroke="#0FA85B"
                                                                        stroke-width="1.4375"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>

                                                            </i>
                                                            <span> <br>
                                                                {{ $data['duration']}}</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="v_dateTime_text">
                                                            <i>
                                                                <svg width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M9.15859 10.87C9.05859 10.86 8.93859 10.86 8.82859 10.87C6.44859 10.79 4.55859 8.84 4.55859 6.44C4.55859 3.99 6.53859 2 8.99859 2C11.4486 2 13.4386 3.99 13.4386 6.44C13.4286 8.84 11.5386 10.79 9.15859 10.87Z"
                                                                        stroke="#0FA85B" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M16.4112 4C18.3512 4 19.9112 5.57 19.9112 7.5C19.9112 9.39 18.4113 10.93 16.5413 11C16.4613 10.99 16.3713 10.99 16.2812 11"
                                                                        stroke="#0FA85B" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M4.15875 14.56C1.73875 16.18 1.73875 18.82 4.15875 20.43C6.90875 22.27 11.4188 22.27 14.1688 20.43C16.5888 18.81 16.5888 16.17 14.1688 14.56C11.4288 12.73 6.91875 12.73 4.15875 14.56Z"
                                                                        stroke="#0FA85B" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M18.3398 20C19.0598 19.85 19.7398 19.56 20.2998 19.13C21.8598 17.96 21.8598 16.03 20.2998 14.86C19.7498 14.44 19.0798 14.16 18.3698 14"
                                                                        stroke="#0FA85B" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            <span class="passengers">{{ $data['total_passengers']}} <br> Passengers</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="v_dateTime_text">
                                                            <i>
                                                                <svg width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M2.0681 4.59891C2.8681 1.13891 8.0781 1.13891 8.8681 4.59891C9.3381 6.62891 8.0481 8.34891 6.9281 9.41891C6.1081 10.1989 4.8181 10.1889 3.9981 9.41891C2.8881 8.34891 1.5981 6.62891 2.0681 4.59891Z"
                                                                        stroke="#0FA85B"
                                                                        stroke-width="1.5" />
                                                                    <path
                                                                        d="M15.0719 16.5989C15.8719 13.1389 21.1119 13.1389 21.9119 16.5989C22.3819 18.6289 21.0919 20.3489 19.9619 21.4189C19.1419 22.1989 17.8419 22.1889 17.0219 21.4189C15.8919 20.3489 14.6019 18.6289 15.0719 16.5989Z"
                                                                        stroke="#0FA85B"
                                                                        stroke-width="1.5" />
                                                                    <path
                                                                        d="M12.0017 5H14.6817C16.5317 5 17.3917 7.29 16.0017 8.51L8.01165 15.5C6.62165 16.71 7.48165 19 9.32165 19H12.0017"
                                                                        stroke="#0FA85B" stroke-width="1.5"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M5.48768 5.5H5.49924"
                                                                        stroke="#0FA85B" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M18.4877 17.5H18.4992"
                                                                        stroke="#0FA85B" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            <span> <br> {{ $data['distance']}} KM </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>





                                <div class="animatedParent animateOnce">
                                    <div class="v_information_box v_box animated fadeInUpShort slow">
                                        <h2 class="heading_b_border">Information</h2>
                                        <div class="v_info_list">
                                            <ul>
                                                <li>
                                                    <p>+420.000 Passengers transported</p>
                                                </li>
                                                <li>
                                                    <p>Instant Confirmation</p>
                                                </li>
                                                <li>
                                                    <p>All-inclusive Pricing</p>
                                                </li>
                                                <li>
                                                    <p>Secure Payment by Credit Card, Debit Card or Paypal
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="v_paymentCards">
                                            <ul>
                                                <li>
                                                    <a class="v_paymentCards_detail"
                                                        href="javascript:void(0)">
                                                        <img src="{{ asset('front/images/visa_img.svg') }}" alt="#">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="v_paymentCards_detail"
                                                        href="javascript:void(0)">
                                                        <img src="{{ asset('front/images/masterCard_img.svg') }}" alt="#">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="v_paymentCards_detail"
                                                        href="javascript:void(0)">
                                                        <img src="{{ asset('front/images/maestro_img.svg') }}" alt="#">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="v_paymentCards_detail"
                                                        href="javascript:void(0)">
                                                        <img src="{{ asset('front/images/americanExpress_img.svg') }}" alt="#">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="v_paymentCards_detail"
                                                        href="javascript:void(0)">
                                                        <img src="{{ asset('front/images/applePay_img.svg') }}" alt="#">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="v_paymentCards_detail"
                                                        href="javascript:void(0)">
                                                        <img src="{{ asset('front/images/samsungPay_img.svg') }}" alt="#">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="v_paymentCards_detail"
                                                        href="javascript:void(0)">
                                                        <img src="{{ asset('front/images/googlePay_img.svg') }}" alt="#">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="animatedParent animateOnce">
                                    <div class="v_help_box v_box animated fadeInUpShort slow">
                                        <h2 class="heading_b_border">Need help?</h2>

                                        <div class="v_help_list">
                                            <ul>
                                                <li> 
                                                    <!-- sami -->
                                                    <a target="_blank"
                                                        href="https://wa.me/+971585603086?text=Hello, I need some assistance.">
                                                        <div class="v_help_list_info">
                                                            <i>
                                                                <svg width="43" height="43"
                                                                    viewBox="0 0 43 43" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M22.7062 1C23.5755 1.26789 24.5559 1.24602 25.478 1.41733C33.3872 2.89892 40.0608 9.45586 41.5752 17.3942C41.761 18.3655 41.761 19.3715 42.0253 20.3155V22.6846C41.7592 23.6231 41.7647 24.6345 41.5752 25.6058C40.0352 33.5204 33.4018 40.1248 25.478 41.5827C24.5559 41.7522 23.5773 41.7339 22.7062 42H20.3371C19.4678 41.7321 18.4874 41.754 17.5652 41.5827C15.6116 41.2164 13.8585 40.4874 12.0471 39.7129L4.11605 42H3.20486C1.97293 41.6301 1.39158 41.0578 1.018 39.8131V39.0842L3.30509 30.9709C2.53786 29.1631 1.79433 27.4045 1.43532 25.4528C1.26584 24.5306 1.28406 23.552 1.018 22.6809C1.05991 21.9009 0.961502 21.0881 1.018 20.3118C1.78704 9.90964 9.94039 1.7654 20.3371 1H22.7062ZM4.30193 38.7234L12.4079 36.5256C24.8366 43.5345 39.9295 34.4244 38.9345 20.0366C38.3769 11.9635 31.3953 4.80332 23.3222 4.12174C8.76131 2.89163 -0.563833 18.012 6.49973 30.6174L4.30193 38.7234Z"
                                                                        fill="black" stroke="white"
                                                                        stroke-width="0.4" />
                                                                    <path
                                                                        d="M20.2885 10.8829C24.6002 10.154 27.6199 13.4415 27.0641 17.6585C26.716 20.2919 24.3815 21.1393 23.4303 22.9544C22.858 24.0442 23.33 25.9467 21.6607 26.1108C19.2588 26.3477 20.0096 22.856 20.7368 21.5366C21.6808 19.8235 24.3487 18.2563 24.1556 16.2389C23.8986 13.5563 20.2648 12.8711 19.2096 15.273C18.7558 16.3063 19.093 17.684 17.646 17.9173C16.8114 18.0522 16.0569 17.4435 15.9585 16.5851C15.676 14.0921 17.841 11.2984 20.2885 10.8847V10.8829Z"
                                                                        fill="#0FA85B" stroke="white"
                                                                        stroke-width="0.4" />
                                                                    <path
                                                                        d="M21.0171 28.7427C23.8199 28.1741 24.4431 32.1724 22.0248 32.67C19.1364 33.2622 18.6716 29.2202 21.0171 28.7427Z"
                                                                        fill="#0FA85B" stroke="white"
                                                                        stroke-width="0.4" />
                                                                </svg>
                                                            </i>
                                                            <div class="v_help_list_text">
                                                                <h4>Chat with Us</h4>
                                                                <p>Here for You Anytime</p>
                                                            </div>
                                                        </div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="{{ route('support') }}">
                                                        <div class="v_help_list_info">
                                                            <i>
                                                                <svg width="48" height="48"
                                                                    viewBox="0 0 48 48" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M24 4C13 4 4 13 4 24C4 35 13 44 24 44C35 44 44 35 44 24C44 13 35 4 24 4Z"
                                                                        stroke="#292D32" stroke-width="3"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M24 32.5L24 22"
                                                                        stroke="#0FA85B" stroke-width="3"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M24 15.5977L24 15.3977"
                                                                        stroke="#0FA85B" stroke-width="4"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            <div class="v_help_list_text">
                                                                <h4>Help & Support</h4>
                                                                <p>Frequently Answered Questions</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="callTo:+971 58 560 3086">
                                                        <div class="v_help_list_info">
                                                            <i>
                                                                <svg width="43" height="43"
                                                                    viewBox="0 0 43 43" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M19.0492 1.10539C39.4904 -0.858212 50.1046 24.1181 34.593 37.2715C23.353 46.8026 5.66083 41.1916 1.74259 27.0931C-1.57491 15.1573 6.58256 2.30328 19.0492 1.10539ZM19.7683 2.00381C4.6871 3.24652 -3.34843 20.9118 5.74153 33.1363C15.0664 45.6765 34.9122 42.723 39.9369 27.9108C44.5043 14.4453 33.9206 0.834611 19.7683 2.00381Z"
                                                                        fill="#292D32" stroke="#292D32"
                                                                        stroke-width="1.53779" />
                                                                    <path
                                                                        d="M13.9714 11.819C14.2763 11.7289 14.9455 11.733 15.2004 11.9189C15.7158 12.883 18.1308 15.1468 18.031 16.1469C17.941 17.0416 15.9915 17.9142 15.9444 18.9365C15.9043 19.8284 17.2261 21.2502 17.8218 21.9188C18.588 22.7775 22.0768 26.2565 22.9788 26.4645C24.985 26.9264 25.1915 23.6195 27.224 24.7139C27.5718 24.9012 30.4994 27.2177 30.6103 27.4258C31.3945 28.892 28.072 31.0324 26.8181 31.1988C22.6255 31.7523 17.6639 26.6365 15.0508 23.7221C12.5734 20.9589 9.54468 16.8863 12.4183 13.3144C12.5942 13.0966 13.8177 11.8648 13.9714 11.819Z"
                                                                        fill="#0FA85B" />
                                                                </svg>
                                                            </i>
                                                            <div class="v_help_list_text">
                                                                <h4>Call us 24/7</h4>
                                                                <p>Our dedicated team is here for you 24/7
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="animatedParent animateOnce">
                                    <div class="v_data_protection v_box animated fadeInUpShort slow">
                                        <div class="heading_b_border headingWith_icon">
                                            <i>
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.3653 2.41594L5.95948 4.4526C4.71365 4.91844 3.69531 6.39177 3.69531 7.71344V15.7626C3.69531 17.0409 4.54031 18.7201 5.56948 19.4893L10.2278 22.9668C11.7553 24.1151 14.2686 24.1151 15.7961 22.9668L20.4545 19.4893C21.4836 18.7201 22.3286 17.0409 22.3286 15.7626V7.71344C22.3286 6.38094 21.3103 4.9076 20.0645 4.44177L14.6586 2.41594C13.7378 2.0801 12.2645 2.0801 11.3653 2.41594Z"
                                                        fill="#292D32" stroke="#292D32" stroke-width="1.625"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M9.80469 12.8595L11.5489 14.6036L16.2072 9.94531"
                                                        fill="#292D32" />
                                                    <path
                                                        d="M9.80469 12.8595L11.5489 14.6036L16.2072 9.94531"
                                                        stroke="white" stroke-width="1.625"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <h2>Data Protection</h2>
                                        </div>

                                        <div class="v_data_protection_info">
                                            <p>Your information is secure with us. All data is encrypted and
                                                safely
                                                transmitted using SSL protocol. Transfeero values your
                                                privacy
                                                and
                                                does not share or sell your personal details.</p>

                                            <div class="v_data_protection_list">
                                                <strong>Book with Confidence</strong>
                                                <ul>
                                                    <li>
                                                        <p>Free cancellations up to 24 hours before pickup.
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>Prices include VAT and local taxes.</p>
                                                    </li>
                                                </ul>
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
<input type="hidden" name="total_amount_val" value="">
<!-- mobile Outward Journey Detail -->
@endsection
@section('script')
{{-- <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script> --}}
<script>
//     var handleChange = function() {
//     var phone_number = iti.getNumber();
//     $('#phone-hidden').val(phone_number);
//     var formatted_number = ( '+'+iti.getSelectedCountryData().dialCode+$('#phone').val().replace(/^0+/, '')).split(" ").join("");

//     $('#country-hidden').val(formatted_number);

// };
$(document).ready(function(){
        var input = document.querySelector("#phone");
        var input1 = document.querySelector("#phone1");

        input.addEventListener('change', handleChange);
        input1.addEventListener('change', handleChange);

        var iti = window.intlTelInput(input, {
            nationalMode: true,
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: function (callback) {
                fetch("https://api.geoapify.com/v1/ipinfo?apiKey=d7482c80a5dc46d2b9578fd206d6a4f6")
                    .then(function (res) {
                        return res.json();
                    })
                    .then(function (data) {
                        callback(data.country.iso_code);
                    })
                    .catch(function () {
                        callback("AE");
                    });
            },
            utilsScript: "{{ asset('plugins/phone_number_api/build/js/utils.js') }}",
        });
        window.iti = iti;

        var iti1 = window.intlTelInput(input1, {
            nationalMode: true,
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: function (callback) {
                fetch("https://api.geoapify.com/v1/ipinfo?apiKey=d7482c80a5dc46d2b9578fd206d6a4f6")
                    .then(function (res) {
                        return res.json();
                    })
                    .then(function (data) {
                        callback(data.country.iso_code);
                    })
                    .catch(function () {
                        callback("AE");
                    });
            },
            utilsScript: "{{ asset('plugins/phone_number_api/build/js/utils.js') }}",
        });
        window.iti1 = iti1;

       
        
        //Country flag plugin work
        var handleChange = function () {
            var phone_number = iti.getNumber();
            $('#phone-hidden').val(phone_number);

            var phone_number1 = iti1.getNumber();
            $('#phone-hidden1').val(phone_number1);

            // var phone_number2 = iti2.getNumber();
            // $('#phone-hidden2').val(phone_number2);
        };
});
</script>
<script>

    $('.v_card_sliderBox').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear'
    });
    
    $('.vehicle_header_inner').slick({
        dots: false,
        arrows: false,
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
                    slidesToShow: 4,
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



    // validation passenger detail form


</script>
@endsection