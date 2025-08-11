@extends('front.layouts.master')
@section("title")
C2C - Ride Tracking
@endsection
@section("style")
 <style>
     p {
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

 </style>
 <style>

     .bg-success {
        background-color: #7ac08d  !important;
        color: white;
        padding: 5px;
        text-align: center;
        border-radius: 37px;
        }

    @media print {
        body {
            width: 210mm;
            height: 297mm;
            margin: 0;
            padding: 20mm;
        }
    }

   .blink-text {
    animation: blink 1s step-start infinite;
    color: rgb(224, 243, 18);
    font-weight: bold;
   }
   @keyframes blink {
    50% {
        opacity:0;
    }
   }
</style>
<style>
    /* Loader Container */
.loader-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(255, 255, 255, 0.9);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

/* Spinning Loader */
.loader {
  border: 10px solid #f3f3f3; /* Light grey */
  border-top: 10px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 80px;
  height: 80px;
  animation: spin 1s linear infinite;
}

/* Spin Animation */
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>

@endsection
@section("content")
<div class="content">
            <div class="gradiantParent">
                <div class="gradiantChild">
                    <div class="booking_tracking">
                        <div class="autoContent">
                            <div class="booking_tracking_inner">
                                <div class="b_tracking_box">
                                    <div class="b_tracking_box_inner" id="printSection">
                                        <div class="b_tracking_header animatedParent animateOnce">
                                            <div class="bt_header_left">
                                                <div class="bt_header_img_box_main animated fadeInLeftShort slow">
                                                    <div class="bt_header_img_box">
                                                        <img src="{{ asset('front/images/b_tracking_img.png') }}" alt="#">
                                                    </div>
                                                </div>
                                                <div class="bt_header_text">
                                                    <h2 class="animated fadeInUpShort slow delay-250">Booking Details
                                                    </h2>
                                                    <div class="b_passenger_info">
                                                        <ul>
                                                            <li class="animated fadeInUpShort slow delay-500">

                                                                <div class="b_passenger_text">
                                                                @if($ride->ride_type_id == 1)
                                                                    <i>
                                                                        <svg width="18" height="23" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M8.54745 0.948117C16.4371 0.515793 20.9907 9.83401 15.7591 15.7331C13.8846 17.8483 11.5081 19.7426 9.58908 21.8461C9.24422 22.1367 8.77502 22.1367 8.42781 21.8461C6.49704 19.7217 4.08064 17.8088 2.19445 15.6704C-2.71576 10.099 1.14109 1.35487 8.54745 0.948117ZM14.1216 14.2107C17.3567 10.4035 15.44 4.50666 10.5392 3.39331C4.83371 2.09633 0.324674 8.06985 3.15162 13.1322C5.38268 17.1254 11.1445 17.7135 14.1239 14.2084L14.1216 14.2107Z" fill="#333333"></path>
                                                                            <path d="M5.18558 12.9625C4.92986 12.8835 5.1715 12.0119 5.05655 11.8771C4.96271 11.7632 4.76095 11.8678 4.70699 11.5261C4.646 11.1449 4.66007 9.68291 4.84071 9.3761C4.9369 9.2134 5.12927 9.12275 5.21608 8.95307C4.82195 8.97399 4.39028 9.02048 4.32928 8.52075C4.24014 7.80021 5.34745 7.44691 5.82839 7.93037C6.15448 7.42599 6.11695 6.69383 6.73395 6.41026C7.60901 6.01048 10.5181 5.99421 11.3673 6.45442C11.8318 6.70545 11.9444 7.40972 12.0946 7.86761C12.6482 7.67237 13.5092 7.59334 13.6735 8.31156C13.8001 8.86475 13.3427 9.02977 12.8641 8.95307C12.8805 9.16226 13.1081 9.23431 13.1996 9.41561C13.2699 9.5574 13.3028 9.77588 13.3169 9.93626C13.345 10.2686 13.3708 11.303 13.3169 11.5935C13.2746 11.8143 13.0189 11.7516 12.9485 11.9189C12.8782 12.0863 13.0002 12.7626 12.904 12.9021C12.843 12.9881 11.4119 12.9974 11.2618 12.93C11.2313 12.916 11.1327 12.8138 11.1327 12.8045V11.8166H6.89113V12.8045C6.89113 12.8254 6.80667 12.9021 6.82779 12.9625C6.50404 12.9625 5.39907 13.0276 5.19027 12.9625H5.18558ZM6.24598 8.5068H11.7732C11.7521 8.25345 11.3509 7.00529 11.2148 6.90999C10.8489 6.65664 9.27468 6.58458 8.78202 6.59388C8.37381 6.60085 7.64655 6.65199 7.25946 6.74264C7.15154 6.76821 6.84421 6.86815 6.77852 6.93323C6.69172 7.01923 6.18733 8.44869 6.24598 8.5068ZM6.16621 9.66664C5.40141 9.82237 5.44599 10.9613 6.22252 11.0473C7.33218 11.1705 7.24773 9.44583 6.16621 9.66664ZM12.2025 9.86188C11.5996 9.18783 10.4547 10.1478 11.1585 10.866C11.7943 11.5145 12.8101 10.5429 12.2025 9.86188Z" fill="#333333"></path>
                                                                        </svg>

                                                                    </i>
                                                                    <p><span><em>Rides</em></span></p>
                                                                @elseif($ride->ride_type_id == 2)
                                                                  <i>
                                                                    <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M11.0665 2.02836H9.62409V2.53453C10.1263 2.58588 10.6247 2.65191 11.1156 2.76194C12.5166 3.08472 13.8117 3.76328 14.9068 4.65826L15.5676 4.01637C15.5676 3.93934 15.156 3.63858 15.1032 3.54321C15.0956 3.52487 15.0918 3.51387 15.1032 3.49553L15.9452 2.67391L17.8144 4.48586L17.803 4.54822L16.9685 5.35516C16.893 5.30014 16.4965 4.86733 16.4512 4.87466L15.7942 5.51288C16.8855 6.77098 17.6369 8.27849 17.8937 9.91805C18.8037 15.706 13.74 20.6944 7.77005 19.9205C4.10349 19.4436 1.05243 16.7294 0.229248 13.2339C-0.412683 10.5123 0.308545 7.6256 2.20413 5.53489L1.54332 4.87466C1.49423 4.86733 1.10152 5.30014 1.026 5.35516L0.191487 4.54822L0.180159 4.48586L2.04553 2.68125L2.9027 3.48819C2.91403 3.51753 2.89892 3.53587 2.88004 3.55788C2.81963 3.64591 2.43069 3.94668 2.43069 4.01637L3.0915 4.65826C4.5755 3.42584 6.41821 2.67391 8.37799 2.53086V2.02469H6.93554V0.0366792C6.93554 0.0366792 6.96952 0 6.9733 0H11.0288C11.0288 0 11.0665 0.0330113 11.0665 0.0366792V2.02836ZM8.67252 3.72661C2.90648 3.97969 -0.643023 10.1051 2.26832 15.0091C5.17967 19.9131 12.5656 20.0819 15.6394 15.1778C18.7131 10.2738 14.82 3.45518 8.6763 3.72661H8.67252Z" fill="#333333"></path>
                                                                        <path d="M9.00108 5.02503V11.2568H15.4166C15.4468 14.1545 13.2945 16.744 10.3869 17.3529C5.82164 18.3066 1.78502 14.4442 2.71394 9.99506C3.31433 7.12308 5.97645 5.02136 8.9973 5.02136L9.00108 5.02503Z" fill="#333333"></path>
                                                                    </svg>
                                                                  </i>
                                                                  <p><span><em>Book Hourly</em></span></p>
                                                                @elseif($ride->ride_type_id == 3)
                                                                  <i>
                                                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M20.797 13.6939L21.1246 16.1408L19.1145 16.3207L17.4258 19.792C15.9439 19.7979 14.4912 19.4513 13.0586 19.1187L9.82354 15.3965C8.9268 15.3448 8.03502 15.4421 7.1377 15.4103L9.07076 12.3214C11.1034 12.3731 13.1182 12.0391 15.0078 11.3047C16.7615 12.4578 18.7261 13.2994 20.7973 13.6939H20.797Z" fill="#333333"></path>
                                                                        <path d="M22.0286 6.2712L23.6025 17.8123C23.5887 17.8652 23.4118 17.9913 23.3572 18.0369C21.7485 19.3725 20.0158 20.568 18.4074 21.9056C16.8435 22.1585 15.2342 21.854 13.7021 21.533C10.1338 20.7861 6.72642 19.6543 3.00601 20.024C2.07189 20.1168 1.16143 20.3554 0.246582 20.5493L3.28283 6.54744L3.32955 6.47736C3.755 6.24959 4.18191 6.02125 4.6386 5.86006L5.09296 6.60379C5.08215 6.65548 4.27506 6.95186 4.13752 7.05173C4.10686 7.07392 4.0762 7.08531 4.06861 7.12882L1.4143 19.381C2.11161 19.2507 2.82001 19.1322 3.52987 19.0878C6.99769 18.8717 10.2296 19.8762 13.561 20.5931C14.9297 20.8877 16.3292 21.1748 17.7373 21.0895C18.4495 19.8298 19.0472 18.4965 19.6785 17.1907C19.7325 17.1381 20.0724 17.115 20.1755 17.1036C20.975 17.0146 21.7833 16.9699 22.5845 16.8989L21.2726 7.30489C21.2241 7.27015 20.2508 7.40301 20.0891 7.41031C17.424 7.5312 14.8097 6.87185 12.2053 6.44407L12.1317 6.40173L12.5735 5.63259L12.612 5.625C14.2017 5.86765 15.7724 6.23908 17.3726 6.41574C18.9427 6.58919 20.4745 6.58043 22.0286 6.27091V6.2712Z" fill="#333333"></path>
                                                                        <path d="M8.44501 0.00128616C10.6777 -0.0571145 12.4022 1.88179 12.1269 4.09167C11.9718 5.33501 11.1306 6.35703 10.3351 7.26399C9.76369 7.91545 9.14727 8.53041 8.55363 9.16113C8.01576 8.60107 7.46446 8.04743 6.94732 7.46839C6.0316 6.44317 5.0239 5.27924 4.94623 3.83383C4.8376 1.81083 6.40945 0.0547227 8.44501 0.00128616ZM8.3577 1.4613C6.49034 1.66366 6.48012 4.52763 8.41113 4.71947C10.7658 4.95366 10.8082 1.19558 8.3577 1.4613Z" fill="#333333"></path>
                                                                        <path d="M14.1161 10.6233C14.1418 10.658 14.0939 10.6884 14.0661 10.7041C13.9505 10.7695 13.5744 10.8627 13.4217 10.9065C10.5761 11.7235 7.43884 11.5974 4.68408 10.5184L5.21786 8.07553C5.22604 8.02297 5.24531 7.99932 5.28911 7.97158C5.36883 7.92135 5.81267 7.76162 5.90991 7.74381C5.9505 7.73651 5.987 7.71899 6.02671 7.74556L8.55342 10.3897L11.1814 7.64453C11.8288 8.48696 12.534 9.28617 13.3274 9.99516C13.5589 10.2022 13.8124 10.3867 14.0442 10.5938C14.0699 10.6165 14.1137 10.6198 14.1161 10.623V10.6233Z" fill="#333333"></path>
                                                                        <path d="M8.36375 12.257C8.38624 12.2759 8.1976 12.563 8.17161 12.6047C7.58381 13.5505 6.97323 14.4835 6.37842 15.4252L3.6333 15.469L4.4804 11.4102C5.7328 11.8467 7.03397 12.1644 8.36375 12.257Z" fill="#333333"></path>
                                                                        <path d="M11.5758 18.7698C10.6954 18.5669 9.81386 18.3578 8.92413 18.1952C7.02932 17.8491 5.07991 17.6357 3.1521 17.8074L3.10889 17.7642L3.44732 16.35C3.93292 16.3357 4.4191 16.3552 4.90471 16.3474C6.22456 16.3257 7.55376 16.2887 8.87361 16.2574C9.10429 16.2519 9.41002 16.1943 9.54668 16.4043L11.5758 18.7695V18.7698Z" fill="#333333"></path>
                                                                        <path d="M20.1273 8.72656L20.7154 13.0441C19.3076 12.7518 17.9221 12.2484 16.6559 11.5704C16.5394 11.5079 15.7464 11.0635 15.7224 11.0147C15.6985 10.9659 15.7574 10.9689 15.7811 10.9583C17.0224 10.4012 18.1574 9.63674 19.1984 8.76803L20.1273 8.72685V8.72656Z" fill="#333333"></path>
                                                                        <path d="M17.8537 8.66693C17.8718 8.73467 17.838 8.71569 17.8166 8.7338C17.7509 8.79015 17.6709 8.84388 17.6 8.89498C16.7473 9.5114 15.805 10.0055 14.8365 10.4125C13.806 9.65302 12.8619 8.77088 12.0718 7.76172C13.992 8.09577 15.904 8.5256 17.8531 8.66693H17.8537Z" fill="#333333"></path>
                                                                    </svg>

                                                                  </i>
                                                                  <p><span><em> City Tour</em></span></p>
                                                                 @elseif ($ride->ride_type_id == 4)
                                                                 <i>
                                                                        <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M20.797 13.6939L21.1246 16.1408L19.1145 16.3207L17.4258 19.792C15.9439 19.7979 14.4912 19.4513 13.0586 19.1187L9.82354 15.3965C8.9268 15.3448 8.03502 15.4421 7.1377 15.4103L9.07076 12.3214C11.1034 12.3731 13.1182 12.0391 15.0078 11.3047C16.7615 12.4578 18.7261 13.2994 20.7973 13.6939H20.797Z" fill="#333333"></path>
                                                                            <path d="M22.0286 6.2712L23.6025 17.8123C23.5887 17.8652 23.4118 17.9913 23.3572 18.0369C21.7485 19.3725 20.0158 20.568 18.4074 21.9056C16.8435 22.1585 15.2342 21.854 13.7021 21.533C10.1338 20.7861 6.72642 19.6543 3.00601 20.024C2.07189 20.1168 1.16143 20.3554 0.246582 20.5493L3.28283 6.54744L3.32955 6.47736C3.755 6.24959 4.18191 6.02125 4.6386 5.86006L5.09296 6.60379C5.08215 6.65548 4.27506 6.95186 4.13752 7.05173C4.10686 7.07392 4.0762 7.08531 4.06861 7.12882L1.4143 19.381C2.11161 19.2507 2.82001 19.1322 3.52987 19.0878C6.99769 18.8717 10.2296 19.8762 13.561 20.5931C14.9297 20.8877 16.3292 21.1748 17.7373 21.0895C18.4495 19.8298 19.0472 18.4965 19.6785 17.1907C19.7325 17.1381 20.0724 17.115 20.1755 17.1036C20.975 17.0146 21.7833 16.9699 22.5845 16.8989L21.2726 7.30489C21.2241 7.27015 20.2508 7.40301 20.0891 7.41031C17.424 7.5312 14.8097 6.87185 12.2053 6.44407L12.1317 6.40173L12.5735 5.63259L12.612 5.625C14.2017 5.86765 15.7724 6.23908 17.3726 6.41574C18.9427 6.58919 20.4745 6.58043 22.0286 6.27091V6.2712Z" fill="#333333"></path>
                                                                            <path d="M8.44501 0.00128616C10.6777 -0.0571145 12.4022 1.88179 12.1269 4.09167C11.9718 5.33501 11.1306 6.35703 10.3351 7.26399C9.76369 7.91545 9.14727 8.53041 8.55363 9.16113C8.01576 8.60107 7.46446 8.04743 6.94732 7.46839C6.0316 6.44317 5.0239 5.27924 4.94623 3.83383C4.8376 1.81083 6.40945 0.0547227 8.44501 0.00128616ZM8.3577 1.4613C6.49034 1.66366 6.48012 4.52763 8.41113 4.71947C10.7658 4.95366 10.8082 1.19558 8.3577 1.4613Z" fill="#333333"></path>
                                                                            <path d="M14.1161 10.6233C14.1418 10.658 14.0939 10.6884 14.0661 10.7041C13.9505 10.7695 13.5744 10.8627 13.4217 10.9065C10.5761 11.7235 7.43884 11.5974 4.68408 10.5184L5.21786 8.07553C5.22604 8.02297 5.24531 7.99932 5.28911 7.97158C5.36883 7.92135 5.81267 7.76162 5.90991 7.74381C5.9505 7.73651 5.987 7.71899 6.02671 7.74556L8.55342 10.3897L11.1814 7.64453C11.8288 8.48696 12.534 9.28617 13.3274 9.99516C13.5589 10.2022 13.8124 10.3867 14.0442 10.5938C14.0699 10.6165 14.1137 10.6198 14.1161 10.623V10.6233Z" fill="#333333"></path>
                                                                            <path d="M8.36375 12.257C8.38624 12.2759 8.1976 12.563 8.17161 12.6047C7.58381 13.5505 6.97323 14.4835 6.37842 15.4252L3.6333 15.469L4.4804 11.4102C5.7328 11.8467 7.03397 12.1644 8.36375 12.257Z" fill="#333333"></path>
                                                                            <path d="M11.5758 18.7698C10.6954 18.5669 9.81386 18.3578 8.92413 18.1952C7.02932 17.8491 5.07991 17.6357 3.1521 17.8074L3.10889 17.7642L3.44732 16.35C3.93292 16.3357 4.4191 16.3552 4.90471 16.3474C6.22456 16.3257 7.55376 16.2887 8.87361 16.2574C9.10429 16.2519 9.41002 16.1943 9.54668 16.4043L11.5758 18.7695V18.7698Z" fill="#333333"></path>
                                                                            <path d="M20.1273 8.72656L20.7154 13.0441C19.3076 12.7518 17.9221 12.2484 16.6559 11.5704C16.5394 11.5079 15.7464 11.0635 15.7224 11.0147C15.6985 10.9659 15.7574 10.9689 15.7811 10.9583C17.0224 10.4012 18.1574 9.63674 19.1984 8.76803L20.1273 8.72685V8.72656Z" fill="#333333"></path>
                                                                            <path d="M17.8537 8.66693C17.8718 8.73467 17.838 8.71569 17.8166 8.7338C17.7509 8.79015 17.6709 8.84388 17.6 8.89498C16.7473 9.5114 15.805 10.0055 14.8365 10.4125C13.806 9.65302 12.8619 8.77088 12.0718 7.76172C13.992 8.09577 15.904 8.5256 17.8531 8.66693H17.8537Z" fill="#333333"></path>
                                                                        </svg>

                                                                    </i>
                                                                    <p><span><em>Desert Safari</em></span></p>
                                                                @endif
                                                                </div>
                                                            </li>
                                                            <li class="animated fadeInUpShort slow delay-500">
                                                                <div class="b_passenger_text">
                                                                     <i>
                                                                        <svg width="22" height="22" viewBox="0 0 22 22"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M7.07617 1.76953V4.42304"
                                                                                stroke="#292D32" stroke-width="1.32675"
                                                                                stroke-miterlimit="10"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path d="M14.1523 1.76953V4.42304"
                                                                                stroke="#292D32" stroke-width="1.32675"
                                                                                stroke-miterlimit="10"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path d="M3.0957 8.03906H18.1323"
                                                                                stroke="#292D32" stroke-width="1.32675"
                                                                                stroke-miterlimit="10"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path
                                                                                d="M18.5744 7.51626V15.0345C18.5744 17.688 17.2476 19.4571 14.1519 19.4571H7.07584C3.98007 19.4571 2.65332 17.688 2.65332 15.0345V7.51626C2.65332 4.86276 3.98007 3.09375 7.07584 3.09375H14.1519C17.2476 3.09375 18.5744 4.86276 18.5744 7.51626Z"
                                                                                stroke="#292D32" stroke-width="1.32675"
                                                                                stroke-miterlimit="10"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path d="M10.6102 12.118H10.6182"
                                                                                stroke="#292D32" stroke-width="1.76901"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path d="M7.33583 12.118H7.34378"
                                                                                stroke="#292D32" stroke-width="1.76901"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path d="M7.33583 14.7704H7.34378"
                                                                                stroke="#292D32" stroke-width="1.76901"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </i>
                                                                    <p><span>Date: </span>{{ date_format(date_create($ride->date_time),'l, F d, Y')}}</p>
                                                                </div>
                                                            </li>
                                                            <li class="animated fadeInUpShort slow delay-750">
                                                                <div class="b_passenger_text">
                                                                    <i>
                                                                        <svg width="22" height="22" viewBox="0 0 22 22"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M18.3538 11.7199C18.3538 15.992 14.8865 19.4593 10.6144 19.4593C6.34225 19.4593 2.875 15.992 2.875 11.7199C2.875 7.44772 6.34225 3.98047 10.6144 3.98047C14.8865 3.98047 18.3538 7.44772 18.3538 11.7199Z"
                                                                                stroke="#292D32" stroke-width="1.32675"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path d="M10.6143 7.07812V11.5006"
                                                                                stroke="#292D32" stroke-width="1.32675"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path d="M7.96094 1.76953H13.268"
                                                                                stroke="#292D32" stroke-width="1.32675"
                                                                                stroke-miterlimit="10"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </i>
                                                                    <p><span>Time: </span>{{ date("h:i A", strtotime($ride->date_time)) }}</p>
                                                                </div>
                                                            </li>
                                                            @if($ride->ride_type_id != 1)
                                                            <li class="animated fadeInUpShort slow delay-750">


                                                                <div class="b_passenger_text">
                                                                <i>
                                                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="11" cy="11" r="9" stroke="black" stroke-width="2"/>
                                                                    <path d="M11 6V11L14 14" stroke="black" stroke-width="2" stroke-linecap="round"/>
                                                                    </svg>
                                                                    </i>
                                                                <p>Duration: <span>

                                                                    @if($ride->ride_type_id == 2)
                                                                    {{ $ride->duration }} hrs
                                                                    @elseif($ride->ride_type_id == 3)

                                                                     {{ $ride->duration == 5 ? 'Half Day' : 'Full Day' }}


                                                                    @endif
                                                                </span></p>
                                                                </div>
                                                            </li>
                                                            @endif
                                                            <li class="animated fadeInUpShort slow delay-750">
                                                                <div class="b_passenger_text">
                                                                    @if($ride->payment_method == "card")
                                                                    <i>
                                                                        {{-- <img src="{{ asset('images/card_icon.svg') }}" alt=""> --}}

                                                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect x="4" y="6" width="14" height="10" rx="1" stroke="black" stroke-width="2"/>
                                                                        <rect x="6" y="9" width="10" height="1" fill="black"/>
                                                                        <text x="11" y="16" font-family="Arial" font-size="3" text-anchor="middle" fill="black">••••</text>
                                                                        </svg>
                                                                    </i>
                                                                    <p><span>Card Ride </span></p>
                                                                    @else
                                                                      <i>
                                                                        {{-- <img src="{{ asset('images/cash_icon.svg') }}" alt=""> --}}

                                                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect x="3" y="5" width="16" height="12" rx="1" stroke="black" stroke-width="2"/>
                                                                        <path d="M7 9H15" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                                                                        <path d="M7 12H15" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                                                                        <path d="M7 15H12" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                                                                        <circle cx="11" cy="10" r="1" fill="black"/>
                                                                        </svg>
                                                                    </i>
                                                                    <p><span>Cash Ride </span></p>
                                                                    @endif

                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bt_header_right animated fadeInRightShort slow">
                                                <div class="tracking_id_box">
                                                    <div class="b_tracking_numID">
                                                        <h4>Tracking #</h4>
                                                        <h2>{{ $tracking_no}}</h2>
                                                    </div>
                                                    <input type="hidden" name="ride_status" value="{{ $ride->status }}">
                                                    {{-- <strong class="tracking_pending"> --}}
                                                        <div id="ride-status">
                                                            @if($ride->status == 1)
                                                            <strong class="tracking_completed">Completed</strong>
                                                            @elseif($ride->status == 2)
                                                            <strong class="tracking_pending">Pending</strong>
                                                            @elseif($ride->status == 3)
                                                            <strong class="tracking_canceled">Cancelled</strong>
                                                            @elseif($ride->status == 4)
                                                            <strong class="tracking_confirmed">Confirmed</strong>
                                                            @elseif($ride->status == 5)
                                                            <strong class="tracking_assign">Assigned</strong>
                                                            @elseif($ride->status == 6)
                                                            <strong class="tracking_enroute">Driver enroute</strong>
                                                            @elseif($ride->status == 7)
                                                            <strong class="tracking_driver_at_location">Driver at Location</strong>
                                                            @elseif($ride->status == 8)
                                                            <strong class="tracking_driver_at_location">En route to Drop off</strong>
                                                            @endif
                                                        </div>
                                                    {{-- </strong> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="b_passenger_details animatedParent animateOnce">
                                            <div class="b_passender_details_left animated fadeInLeftShort slow">
                                                <h4>Passenger Detail</h4>
                                                <div class="b_passenger_info">
                                                    @php $passenger = \App\Models\User::find($ride->user_id); @endphp
                                                    <ul>
                                                        <li>
                                                            <div class="b_passenger_text">
                                                                <i>
                                                                    <svg width="22" height="22" viewBox="0 0 22 22"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10.8414 10.0879C10.7523 10.079 10.6453 10.079 10.5472 10.0879C8.42529 10.0166 6.74023 8.278 6.74023 6.13824C6.74023 3.9539 8.50554 2.17969 10.6988 2.17969C12.8831 2.17969 14.6573 3.9539 14.6573 6.13824C14.6484 8.278 12.9634 10.0166 10.8414 10.0879Z"
                                                                            stroke="#292D32" stroke-width="1.33735"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M6.38382 13.3799C4.22623 14.8243 4.22623 17.178 6.38382 18.6134C8.83563 20.2539 12.8566 20.2539 15.3084 18.6134C17.466 17.1691 17.466 14.8153 15.3084 13.3799C12.8655 11.7484 8.84454 11.7484 6.38382 13.3799Z"
                                                                            stroke="#292D32" stroke-width="1.33735"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </i>
                                                                <p><strong>Name :</strong>{{ $ride->display_name}}</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="b_passenger_text">
                                                                <i>
                                                                    <svg width="21" height="21" viewBox="0 0 21 21"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M14.4486 17.4248H5.94967C3.39998 17.4248 1.7002 16.1499 1.7002 13.1753V7.22603C1.7002 4.2514 3.39998 2.97656 5.94967 2.97656H14.4486C16.9983 2.97656 18.6981 4.2514 18.6981 7.22603V13.1753C18.6981 16.1499 16.9983 17.4248 14.4486 17.4248Z"
                                                                            stroke="#292D32" stroke-width="1.27484"
                                                                            stroke-miterlimit="10"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M14.4482 7.64844L11.788 9.77317C10.9126 10.4701 9.47628 10.4701 8.60088 9.77317L5.94922 7.64844"
                                                                            stroke="#292D32" stroke-width="1.27484"
                                                                            stroke-miterlimit="10"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </i>
                                                                <p><strong>Email :</strong>{{ $ride->email }}</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="b_passenger_text">
                                                                <i>
                                                                    <svg width="16" height="20" viewBox="0 0 16 20"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M14.6 5.64844V14.1484C14.6 17.5484 13.75 18.3984 10.35 18.3984H5.25C1.85 18.3984 1 17.5484 1 14.1484V5.64844C1 2.24844 1.85 1.39844 5.25 1.39844H10.35C13.75 1.39844 14.6 2.24844 14.6 5.64844Z"
                                                                            stroke="#292D32" stroke-width="1.275"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M9.49961 4.375H6.09961"
                                                                            stroke="#292D32" stroke-width="1.275"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M7.79992 15.9319C8.52756 15.9319 9.11742 15.342 9.11742 14.6144C9.11742 13.8867 8.52756 13.2969 7.79992 13.2969C7.07229 13.2969 6.48242 13.8867 6.48242 14.6144C6.48242 15.342 7.07229 15.9319 7.79992 15.9319Z"
                                                                            stroke="#292D32" stroke-width="1.275"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </i>
                                                                <p><strong>Phone :</strong>{{ $ride->mobile_number}}</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="b_passenger_text">
                                                                <i>
                                                                    <svg width="16" height="16" viewBox="0 0 29 29"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M21.1491 16.8825C21.0945 16.8563 19.0545 15.8512 18.6921 15.7207C18.5441 15.6675 18.3856 15.6157 18.217 15.6157C17.9414 15.6157 17.7102 15.7529 17.53 16.0227C17.3261 16.3257 16.7094 17.0473 16.5187 17.2625C16.4939 17.2909 16.46 17.3248 16.4397 17.3248C16.4215 17.3248 16.1056 17.1947 16.0101 17.1534C13.8218 16.2022 12.1606 13.9153 11.9329 13.5297C11.9003 13.4744 11.8989 13.4492 11.8986 13.4492C11.9066 13.4198 11.9801 13.3459 12.0182 13.3078C12.1294 13.1979 12.2498 13.0527 12.3663 12.9127C12.4215 12.8462 12.4768 12.7797 12.531 12.7171C12.7 12.5204 12.7752 12.3678 12.8626 12.1908L12.9085 12.0987C13.1215 11.6753 12.9396 11.3184 12.8808 11.2029C12.8325 11.1063 11.971 9.02655 11.8797 8.80784C11.6593 8.28047 11.3683 8.03516 10.9639 8.03516C10.9265 8.03516 10.9639 8.03516 10.8065 8.04181C10.6148 8.04985 9.57136 8.18738 9.10997 8.47819C8.6206 8.78684 7.79297 9.77054 7.79297 11.5003C7.79297 13.0572 8.78046 14.5274 9.20476 15.0866C9.21526 15.1006 9.2345 15.1293 9.26283 15.1702C10.8866 17.5429 12.9113 19.301 14.9632 20.1213C16.9389 20.9107 17.8746 21.0021 18.4063 21.0021C18.6298 21.0021 18.8085 20.9846 18.9667 20.9688L19.0667 20.9594C19.7492 20.8988 21.2491 20.1213 21.5902 19.1729C21.8588 18.4258 21.9298 17.6097 21.7511 17.3133C21.6286 17.1117 21.4174 17.0106 21.1505 16.8822L21.1491 16.8825Z"
                                                                            fill="#333333" />
                                                                        <path
                                                                            d="M14.5014 0.4375C6.88768 0.4375 0.693302 6.5855 0.693302 14.142C0.693302 16.586 1.34728 18.9785 2.58637 21.0726L0.214676 28.0685C0.170398 28.1989 0.20343 28.3433 0.299718 28.4414C0.369298 28.5124 0.463828 28.5507 0.560467 28.5507C0.597366 28.5507 0.634615 28.545 0.671162 28.5334L7.96581 26.2155C9.9622 27.282 12.2183 27.845 14.5014 27.845C22.1144 27.845 28.3085 21.6981 28.3085 14.142C28.3085 6.58585 22.1148 0.4375 14.5014 0.4375ZM14.5014 24.9905C12.3529 24.9905 10.2718 24.3702 8.4831 23.1962C8.423 23.1568 8.35307 23.1364 8.28279 23.1364C8.24554 23.1364 8.20829 23.142 8.17209 23.1536L4.51774 24.3151L5.69744 20.8346C5.73574 20.7218 5.71641 20.5978 5.64613 20.5019C4.28405 18.6404 3.564 16.4413 3.564 14.142C3.564 8.15948 8.47044 3.29204 14.5014 3.29204C20.5324 3.29204 25.4374 8.15913 25.4374 14.142C25.4374 20.1237 20.5317 24.9901 14.5014 24.9901V24.9905Z"
                                                                            fill="#333333" />
                                                                    </svg>

                                                                </i>
                                                                <p><strong>WhatsApp :</strong>{{ $ride->whatsapp_number }}</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="bp_selected_car_box">
                                                    @if($ride->ride_type_id != 4)
                                                    @php $selected_car = \App\Models\Vehicle::where('id',$ride->car_id)->with('image_list')->first(); @endphp
                                                    @if(!empty($selected_car))
                                                    <div class="bp_selected_car">
                                                        @php $image = !empty($selected_car->image_list) && count($selected_car->image_list) > 0 ? $selected_car->image_list[0]->image_path : ''; @endphp
                                                        <img src="{{ asset('front/images/'.$image) }}" alt="#">
                                                    </div>
                                                    <div class="bp_selected_car_details">
                                                        <h4>{{ $selected_car->title }}</h4>
                                                        <div class="b_passenger_info">
                                                            <ul>
                                                                <li>
                                                                    <div class="b_passenger_text">
                                                                        <i>
                                                                            <svg width="16" height="17"
                                                                                viewBox="0 0 16 17" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M7.73971 8.31732C9.52087 8.31732 10.9648 6.87341 10.9648 5.09225C10.9648 3.3111 9.52087 1.86719 7.73971 1.86719C5.95856 1.86719 4.51465 3.3111 4.51465 5.09225C4.51465 6.87341 5.95856 8.31732 7.73971 8.31732Z"
                                                                                    stroke="#292D32"
                                                                                    stroke-width="1.11802"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                                <path
                                                                                    d="M13.2815 14.769C13.2815 12.2728 10.7982 10.2539 7.74086 10.2539C4.68349 10.2539 2.2002 12.2728 2.2002 14.769"
                                                                                    stroke="#292D32"
                                                                                    stroke-width="1.11802"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>
                                                                        </i>
                                                                        <p>
                                                                            {{ ($ride->adults + $ride->children + $ride->luggage) == 0 ? $selected_car->passengers : $ride->adults + $ride->children + $ride->luggage }}

                                                                            Passengers</p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="b_passenger_text">
                                                                        <i>
                                                                            <svg width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <mask id="mask0_3483_16428"
                                                                                    style="mask-type:luminance"
                                                                                    maskUnits="userSpaceOnUse" x="0"
                                                                                    y="0" width="20" height="20">
                                                                                    <path
                                                                                        d="M19.424 0.859375H0.588867V19.6945H19.424V0.859375Z"
                                                                                        fill="white" />
                                                                                </mask>
                                                                                <g mask="url(#mask0_3483_16428)">
                                                                                    <path
                                                                                        d="M13.7735 5.88208H11.89V2.42897H12.5179C12.6913 2.42897 12.8318 2.28841 12.8318 2.11505V1.17329C12.8318 0.999933 12.6913 0.859375 12.5179 0.859375H7.49519C7.32183 0.859375 7.18128 0.999933 7.18128 1.17329V2.11505C7.18128 2.28841 7.32183 2.42897 7.49519 2.42897H8.12303V5.88208H6.23952C5.37302 5.88315 4.671 6.58518 4.66992 7.45168V17.1831C4.671 18.0496 5.37302 18.7517 6.23952 18.7528V19.3806C6.23952 19.554 6.38008 19.6945 6.55344 19.6945H7.80911C7.98247 19.6945 8.12303 19.554 8.12303 19.3806V18.7528H11.89V19.3806C11.89 19.554 12.0306 19.6945 12.204 19.6945H13.4597C13.633 19.6945 13.7735 19.554 13.7735 19.3806V18.7528C14.6401 18.7517 15.3421 18.0496 15.3432 17.1831V7.45168C15.3421 6.58518 14.6401 5.88315 13.7735 5.88208ZM7.80911 1.48722H12.204V1.80113H7.80911V1.48722ZM8.75087 2.42897H11.2623V5.88208H8.75087V2.42897ZM7.49519 19.0666H6.86735V18.7528H7.49519V19.0666ZM13.1458 19.0666H12.5179V18.7528H13.1458V19.0666ZM14.7153 17.1831C14.7153 17.7033 14.2937 18.1249 13.7735 18.1249H6.23952C5.71943 18.1249 5.29776 17.7033 5.29776 17.1831V7.45168C5.29776 6.93159 5.71943 6.50992 6.23952 6.50992H13.7735C14.2937 6.50992 14.7153 6.93159 14.7153 7.45168V17.1831Z"
                                                                                        fill="black" />
                                                                                    <path
                                                                                        d="M10.0063 7.13672C9.83294 7.13672 9.69238 7.27728 9.69238 7.45063V17.1821C9.69238 17.3555 9.83294 17.4961 10.0063 17.4961C10.1797 17.4961 10.3202 17.3555 10.3202 17.1821V7.45063C10.3202 7.27728 10.1797 7.13672 10.0063 7.13672Z"
                                                                                        fill="black" />
                                                                                    <path
                                                                                        d="M12.518 7.76562C12.3446 7.76562 12.2041 7.90618 12.2041 8.07954V16.5554C12.2041 16.7287 12.3446 16.8693 12.518 16.8693C12.6914 16.8693 12.8319 16.7287 12.8319 16.5554V8.07954C12.8319 7.90618 12.6914 7.76562 12.518 7.76562Z"
                                                                                        fill="black" />
                                                                                    <path
                                                                                        d="M7.49557 7.76562C7.3222 7.76562 7.18164 7.90618 7.18164 8.07954V16.5554C7.18164 16.7287 7.3222 16.8693 7.49557 16.8693C7.66892 16.8693 7.80948 16.7287 7.80948 16.5554V8.07954C7.80948 7.90618 7.66892 7.76562 7.49557 7.76562Z"
                                                                                        fill="black" />
                                                                                </g>
                                                                            </svg>
                                                                        </i>
                                                                        <p>{{ $selected_car->suitcases}} Suitcases</p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="b_passenger_text">
                                                                        <i>
                                                                            <svg width="13" height="13"
                                                                                viewBox="0 0 13 13" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M1.08643 8.97506C1.24995 9.1463 1.50886 9.27116 1.74051 9.289C1.8904 9.2997 2.02667 9.25689 2.17315 9.2783C2.82723 10.6661 4.06043 11.7006 5.50826 12.0395C7.70554 12.5533 9.93008 11.4366 10.9555 9.36392C11.2144 9.35322 11.4563 9.34608 11.6879 9.21052C12.3147 8.8395 12.3897 7.92265 11.8344 7.44104C11.722 7.34472 11.5891 7.29477 11.4801 7.19845C11.504 6.27804 11.2927 5.35763 10.8669 4.55137C10.7749 4.37657 10.5433 4.08403 10.4922 3.92349C10.3764 3.55961 10.7409 3.24924 11.0645 3.42761C11.2042 3.50253 11.4358 3.91636 11.521 4.07333C11.957 4.87245 12.2193 5.80356 12.2602 6.72397C13.4321 7.63368 13.1698 9.59581 11.7697 10.081C11.6981 10.106 11.4631 10.1452 11.429 10.1666C11.4018 10.1844 11.119 10.6375 11.0611 10.7196C8.66281 13.9232 4.10813 13.6877 1.88359 10.4021C1.84612 10.345 1.75414 10.163 1.71666 10.1345C1.68941 10.1131 1.39985 10.0738 1.3249 10.0524C-0.235343 9.60294 -0.470402 7.40536 0.902476 6.55273C1.14775 3.63096 3.37229 1.32279 6.16574 1.09804C6.43146 1.07664 7.12641 1.0588 7.35125 1.16939C7.634 1.30496 7.64082 1.74376 7.37169 1.90073C7.19114 2.00418 6.72443 1.91143 6.49278 1.915C4.88144 1.94711 3.35185 2.84611 2.47635 4.2517C1.94491 5.10433 1.686 6.09253 1.67919 7.11283C1.39644 7.22699 1.14094 7.33758 0.967202 7.61228C0.69467 8.04038 0.742363 8.61831 1.08984 8.9822L1.08643 8.97506Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M7.90315 0.00545719C8.2295 -0.0376433 8.71904 0.181778 8.98212 0.409035C10.3442 1.56491 9.79135 4.08042 8.13293 4.31943C7.62674 4.39387 6.95072 4.16662 6.60771 3.70427C6.30467 3.29677 6.69763 2.72863 7.08726 2.99115C7.2904 3.12829 7.34035 3.28893 7.62008 3.37513C8.73569 3.71994 9.465 2.05469 8.57917 1.20052C8.31609 0.945832 8.15624 0.977178 7.8532 0.914486C7.44358 0.832204 7.44358 0.0681489 7.90315 0.00937542V0.00545719Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M5.08763 10.304C4.79163 10.0392 4.54116 9.63508 4.41593 9.27513C4.35521 9.09516 4.22619 8.76917 4.50701 8.68427C4.86373 8.579 4.8827 9.01026 4.9586 9.21061C5.5506 10.7353 7.42907 10.7285 8.02107 9.2208C8.06281 9.10874 8.12732 8.80312 8.20702 8.7386C8.38158 8.59259 8.67379 8.71483 8.6662 8.92537C8.6662 9.07818 8.48025 9.50944 8.40056 9.65885C7.78199 10.8236 6.17676 11.2752 5.08763 10.3074V10.304Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M8.50582 5.43072C10.0326 5.22795 10.2111 7.50918 8.72191 7.58292C7.34078 7.65204 7.15287 5.61506 8.50582 5.43072Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M4.16628 5.42944C5.57757 5.24942 5.8964 7.24344 4.59295 7.54808C3.08789 7.89888 2.71279 5.61407 4.16628 5.42944Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </i>
                                                                        <p><?php if($ride->children) { echo $ride->children; echo "Kids"; } else echo "-"; ?></p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="b_passenger_text">
                                                                        <i>
                                                                            <svg width="15" height="16"
                                                                                viewBox="0 0 15 16" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M7.89194 4.41732H7.89397C8.25377 4.41815 8.61339 4.40094 8.97147 4.36574C9.00244 4.36237 9.03244 4.35291 9.05974 4.3379C9.08705 4.32289 9.11111 4.30264 9.13055 4.27829C9.15 4.25395 9.16443 4.226 9.17304 4.19606C9.18164 4.16612 9.18423 4.13477 9.18067 4.10382C9.17711 4.07287 9.16746 4.04293 9.15229 4.01572C9.13711 3.98851 9.11671 3.96458 9.09224 3.94528C9.06778 3.92599 9.03975 3.91173 9.00975 3.90331C8.97975 3.8949 8.94839 3.8925 8.91746 3.89625C8.58327 3.93446 8.19265 3.94216 7.88965 3.94473C7.82698 3.94498 7.76698 3.97011 7.72284 4.0146C7.6787 4.05909 7.65405 4.1193 7.6543 4.18197C7.65455 4.24463 7.67969 4.30464 7.72418 4.34877C7.76867 4.39291 7.82887 4.41757 7.89154 4.41732H7.89194Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M14.1117 12.2965C13.9227 11.826 13.5911 11.5367 13.2011 11.5032C12.8806 11.4752 12.5541 11.6198 12.2467 11.9162C12.4493 10.0913 12.6518 8.13422 12.8517 6.08305C13.1205 3.31664 12.5658 1.77897 11.0608 1.1164C10.9612 0.792272 10.76 0.508766 10.4869 0.307742C10.2138 0.106719 9.88331 -0.00116726 9.54421 1.28859e-05H5.33871C4.99944 -0.00135642 4.66873 0.106439 4.39543 0.307473C4.12213 0.508507 3.92075 0.792117 3.82102 1.1164C2.31643 1.77911 1.76188 3.31664 2.03072 6.08291C2.2188 8.02867 2.42049 9.97308 2.63577 11.916C2.32832 11.6198 2.00115 11.4752 1.68127 11.5027C1.29132 11.5362 0.959293 11.8254 0.770662 12.296C0.452272 13.0898 0.757159 14.3628 1.06853 15.2911C1.13864 15.4982 1.27199 15.678 1.44976 15.8051C1.62753 15.9323 1.84076 16.0005 2.05935 16H12.8236C13.0421 16.0006 13.2554 15.9325 13.4332 15.8054C13.611 15.6783 13.7444 15.4986 13.8147 15.2917C14.126 14.3634 14.4307 13.0907 14.1117 12.2965ZM12.3818 6.03714C12.1549 8.372 11.9227 10.5856 11.6931 12.6195C11.6228 12.6924 11.5343 12.7451 11.4367 12.7722C11.3392 12.7993 11.2361 12.7998 11.1383 12.7736C11.2554 11.8985 11.5164 9.89171 11.8419 6.99231C12.0098 5.4969 11.8058 4.46261 11.2357 3.91805C11.1679 3.85444 11.0947 3.7968 11.0169 3.74576C11.1668 3.22834 11.2096 2.54592 11.1464 1.68351C11.9404 2.143 12.6613 3.16258 12.3818 6.03714ZM5.0692 6.30165L6.94794 9.67729C6.84168 9.73477 6.74613 9.81014 6.66547 9.90008L4.69788 6.30165H5.0692ZM9.81373 6.303H10.1852L8.21921 9.90211C8.13833 9.8116 8.0424 9.73577 7.93566 9.67797L9.81373 6.303ZM6.8676 10.5998C6.86755 10.4863 6.90116 10.3753 6.96419 10.2809C7.02721 10.1865 7.11682 10.1129 7.22167 10.0694C7.32652 10.0259 7.44192 10.0145 7.55325 10.0367C7.66459 10.0588 7.76686 10.1134 7.84715 10.1936C7.92743 10.2739 7.98211 10.3761 8.00427 10.4875C8.02644 10.5988 8.01509 10.7142 7.97166 10.8191C7.92824 10.9239 7.85469 11.0136 7.76031 11.0766C7.66593 11.1397 7.55497 11.1734 7.44146 11.1734C7.28937 11.1732 7.14355 11.1127 7.03598 11.0052C6.9284 10.8977 6.86785 10.7519 6.8676 10.5998ZM7.27403 14.1601V11.6315C7.38567 11.6514 7.49995 11.6514 7.6116 11.6315V14.1605L7.27403 14.1601ZM8.08418 11.4238C8.23411 11.3088 8.34957 11.1547 8.41798 10.9785C8.48638 10.8023 8.50511 10.6108 8.47211 10.4247L10.7237 6.30287H10.9386C11.0013 6.30287 11.0614 6.27797 11.1057 6.23366C11.15 6.18935 11.1749 6.12924 11.1749 6.06657C11.1749 6.00391 11.15 5.9438 11.1057 5.89949C11.0614 5.85518 11.0013 5.83028 10.9386 5.83028H9.31832C9.2593 5.83006 9.20234 5.85196 9.15868 5.89166C9.11501 5.93136 9.0878 5.98598 9.08241 6.04475C9.07702 6.10352 9.09384 6.16218 9.12956 6.20916C9.16528 6.25614 9.21731 6.28803 9.27538 6.29855L7.46401 9.55442C7.45645 9.55442 7.44902 9.55334 7.44146 9.55334C7.4339 9.55334 7.42796 9.55428 7.42026 9.55442L5.60755 6.2972C5.66562 6.28668 5.71764 6.25479 5.75336 6.20781C5.78908 6.16083 5.80591 6.10217 5.80052 6.0434C5.79513 5.98463 5.76792 5.93001 5.72425 5.89031C5.68058 5.85061 5.62362 5.82871 5.56461 5.82893H3.9443C3.88163 5.82893 3.82153 5.85382 3.77722 5.89814C3.7329 5.94245 3.70801 6.00255 3.70801 6.06522C3.70801 6.12789 3.7329 6.188 3.77722 6.23231C3.82153 6.27662 3.88163 6.30152 3.9443 6.30152H4.15913L6.41149 10.421C6.37763 10.6082 6.39613 10.801 6.46494 10.9784C6.53375 11.1557 6.6502 11.3105 6.80144 11.4259V12.0216C5.91037 12.0833 5.03301 12.2744 4.19693 12.5887C4.07325 11.6578 3.82197 9.70389 3.51073 6.93911C3.36221 5.61694 3.52248 4.69012 3.97414 4.25872C3.99629 4.23752 4.02235 4.21821 4.04679 4.19904C4.10472 4.30925 4.17478 4.41265 4.25567 4.5073C4.88003 5.22955 6.12429 5.22955 7.44146 5.22955C8.75864 5.22955 10.0024 5.22955 10.6268 4.50838C10.7079 4.41358 10.778 4.31 10.836 4.19958C10.8606 4.21943 10.8868 4.23819 10.9091 4.25953C11.3604 4.69066 11.5206 5.61748 11.3722 6.93965C11.0606 9.70767 10.8095 11.6603 10.6859 12.5897C9.85069 12.2754 8.97433 12.0841 8.08418 12.0216V11.4238ZM5.33871 0.472602H9.54421C9.82466 0.47213 10.095 0.577368 10.3013 0.767336C10.5076 0.957304 10.6347 1.21805 10.6574 1.49758C10.7805 2.8319 10.6467 3.76601 10.2702 4.19809C9.78685 4.75696 8.64765 4.75696 7.44146 4.75696C6.23528 4.75696 5.09607 4.75696 4.61268 4.19809C4.23623 3.76601 4.10242 2.8319 4.22664 1.48489C4.25159 1.20756 4.37969 0.949685 4.5856 0.762246C4.79152 0.574807 5.06026 0.471448 5.33871 0.472602ZM3.73623 1.68365C3.67249 2.54416 3.71516 3.22739 3.86558 3.74589C3.78799 3.7968 3.71494 3.85431 3.64725 3.91778C3.07703 4.46247 2.87301 5.49758 3.04098 6.99231C3.36707 9.88955 3.6274 11.8975 3.7446 12.7737C3.64676 12.7999 3.54371 12.7993 3.44614 12.7722C3.34857 12.7451 3.26005 12.6923 3.18978 12.6194C2.94324 10.4271 2.71369 8.23296 2.50115 6.03714C2.22165 3.16285 2.94241 2.14327 3.73623 1.68365ZM13.3667 15.1406C13.3281 15.2539 13.2549 15.3522 13.1575 15.4217C13.0601 15.4912 12.9433 15.5284 12.8236 15.5279H2.05935C1.93972 15.5284 1.82298 15.4913 1.72557 15.4219C1.62816 15.3524 1.555 15.2542 1.51641 15.141C1.11754 13.9527 1.00561 12.9806 1.20936 12.4725C1.27971 12.2969 1.43998 11.9982 1.72246 11.9742C2.02032 11.9472 2.37922 12.2358 2.70409 12.7625C2.83836 12.9809 3.04767 13.1428 3.2928 13.2179C3.53792 13.293 3.80202 13.2761 4.03558 13.1704C4.91342 12.7919 5.84862 12.5637 6.80212 12.4953V14.1601H4.75445C4.69179 14.1601 4.63168 14.185 4.58737 14.2293C4.54306 14.2737 4.51816 14.3338 4.51816 14.3964C4.51816 14.4591 4.54306 14.5192 4.58737 14.5635C4.63168 14.6078 4.69179 14.6327 4.75445 14.6327H10.1285C10.1911 14.6327 10.2512 14.6078 10.2956 14.5635C10.3399 14.5192 10.3648 14.4591 10.3648 14.3964C10.3648 14.3338 10.3399 14.2737 10.2956 14.2293C10.2512 14.185 10.1911 14.1601 10.1285 14.1601H8.08418V12.4954C9.03685 12.5647 9.9712 12.7929 10.8486 13.1705C11.0821 13.276 11.346 13.2928 11.591 13.2176C11.836 13.1425 12.0452 12.9806 12.1794 12.7624C12.5044 12.2358 12.8622 11.9473 13.1611 11.9741C13.4429 11.9981 13.6032 12.2965 13.6742 12.4723C13.8773 12.9803 13.7654 13.9529 13.3667 15.1406Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </i>
                                                                        <p>1 Seat</p>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @else
                                                     @php $package = \App\Models\SafariPackages::where('id',$ride->car_id)->first(); @endphp

                                                     @if(!empty($package))
                                                      <div class="bp_selected_car">
                                                        <img src="{{ asset('front/safari/images/'.$package->image) }}" alt="#">
                                                    </div>
                                                    <div class="bp_selected_car_details">
                                                        <h4>{{ $package->name }}</h4>
                                                        <div class="b_passenger_info">
                                                            <ul>
                                                                <li>
                                                                    <div class="b_passenger_text">
                                                                        <i>
                                                                            <svg width="16" height="17"
                                                                                viewBox="0 0 16 17" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M7.73971 8.31732C9.52087 8.31732 10.9648 6.87341 10.9648 5.09225C10.9648 3.3111 9.52087 1.86719 7.73971 1.86719C5.95856 1.86719 4.51465 3.3111 4.51465 5.09225C4.51465 6.87341 5.95856 8.31732 7.73971 8.31732Z"
                                                                                    stroke="#292D32"
                                                                                    stroke-width="1.11802"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                                <path
                                                                                    d="M13.2815 14.769C13.2815 12.2728 10.7982 10.2539 7.74086 10.2539C4.68349 10.2539 2.2002 12.2728 2.2002 14.769"
                                                                                    stroke="#292D32"
                                                                                    stroke-width="1.11802"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>
                                                                        </i>
                                                                        <p>{{ ($ride->adults + $ride->children + $ride->luggage) == 0 ? $package->persons : $ride->adults + $ride->children + $ride->luggage }} Passengers</p>
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <div class="b_passenger_text">
                                                                        <i>
                                                                            <svg width="13" height="13"
                                                                                viewBox="0 0 13 13" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M1.08643 8.97506C1.24995 9.1463 1.50886 9.27116 1.74051 9.289C1.8904 9.2997 2.02667 9.25689 2.17315 9.2783C2.82723 10.6661 4.06043 11.7006 5.50826 12.0395C7.70554 12.5533 9.93008 11.4366 10.9555 9.36392C11.2144 9.35322 11.4563 9.34608 11.6879 9.21052C12.3147 8.8395 12.3897 7.92265 11.8344 7.44104C11.722 7.34472 11.5891 7.29477 11.4801 7.19845C11.504 6.27804 11.2927 5.35763 10.8669 4.55137C10.7749 4.37657 10.5433 4.08403 10.4922 3.92349C10.3764 3.55961 10.7409 3.24924 11.0645 3.42761C11.2042 3.50253 11.4358 3.91636 11.521 4.07333C11.957 4.87245 12.2193 5.80356 12.2602 6.72397C13.4321 7.63368 13.1698 9.59581 11.7697 10.081C11.6981 10.106 11.4631 10.1452 11.429 10.1666C11.4018 10.1844 11.119 10.6375 11.0611 10.7196C8.66281 13.9232 4.10813 13.6877 1.88359 10.4021C1.84612 10.345 1.75414 10.163 1.71666 10.1345C1.68941 10.1131 1.39985 10.0738 1.3249 10.0524C-0.235343 9.60294 -0.470402 7.40536 0.902476 6.55273C1.14775 3.63096 3.37229 1.32279 6.16574 1.09804C6.43146 1.07664 7.12641 1.0588 7.35125 1.16939C7.634 1.30496 7.64082 1.74376 7.37169 1.90073C7.19114 2.00418 6.72443 1.91143 6.49278 1.915C4.88144 1.94711 3.35185 2.84611 2.47635 4.2517C1.94491 5.10433 1.686 6.09253 1.67919 7.11283C1.39644 7.22699 1.14094 7.33758 0.967202 7.61228C0.69467 8.04038 0.742363 8.61831 1.08984 8.9822L1.08643 8.97506Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M7.90315 0.00545719C8.2295 -0.0376433 8.71904 0.181778 8.98212 0.409035C10.3442 1.56491 9.79135 4.08042 8.13293 4.31943C7.62674 4.39387 6.95072 4.16662 6.60771 3.70427C6.30467 3.29677 6.69763 2.72863 7.08726 2.99115C7.2904 3.12829 7.34035 3.28893 7.62008 3.37513C8.73569 3.71994 9.465 2.05469 8.57917 1.20052C8.31609 0.945832 8.15624 0.977178 7.8532 0.914486C7.44358 0.832204 7.44358 0.0681489 7.90315 0.00937542V0.00545719Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M5.08763 10.304C4.79163 10.0392 4.54116 9.63508 4.41593 9.27513C4.35521 9.09516 4.22619 8.76917 4.50701 8.68427C4.86373 8.579 4.8827 9.01026 4.9586 9.21061C5.5506 10.7353 7.42907 10.7285 8.02107 9.2208C8.06281 9.10874 8.12732 8.80312 8.20702 8.7386C8.38158 8.59259 8.67379 8.71483 8.6662 8.92537C8.6662 9.07818 8.48025 9.50944 8.40056 9.65885C7.78199 10.8236 6.17676 11.2752 5.08763 10.3074V10.304Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M8.50582 5.43072C10.0326 5.22795 10.2111 7.50918 8.72191 7.58292C7.34078 7.65204 7.15287 5.61506 8.50582 5.43072Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M4.16628 5.42944C5.57757 5.24942 5.8964 7.24344 4.59295 7.54808C3.08789 7.89888 2.71279 5.61407 4.16628 5.42944Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </i>
                                                                        <p><?php if($ride->children) { echo $ride->children; echo "Kids"; } else echo "-"; ?></p>
                                                                    </div>
                                                                </li>
                                                                {{-- <li>
                                                                    <div class="b_passenger_text">
                                                                        <i>
                                                                            <svg width="15" height="16"
                                                                                viewBox="0 0 15 16" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M7.89194 4.41732H7.89397C8.25377 4.41815 8.61339 4.40094 8.97147 4.36574C9.00244 4.36237 9.03244 4.35291 9.05974 4.3379C9.08705 4.32289 9.11111 4.30264 9.13055 4.27829C9.15 4.25395 9.16443 4.226 9.17304 4.19606C9.18164 4.16612 9.18423 4.13477 9.18067 4.10382C9.17711 4.07287 9.16746 4.04293 9.15229 4.01572C9.13711 3.98851 9.11671 3.96458 9.09224 3.94528C9.06778 3.92599 9.03975 3.91173 9.00975 3.90331C8.97975 3.8949 8.94839 3.8925 8.91746 3.89625C8.58327 3.93446 8.19265 3.94216 7.88965 3.94473C7.82698 3.94498 7.76698 3.97011 7.72284 4.0146C7.6787 4.05909 7.65405 4.1193 7.6543 4.18197C7.65455 4.24463 7.67969 4.30464 7.72418 4.34877C7.76867 4.39291 7.82887 4.41757 7.89154 4.41732H7.89194Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M14.1117 12.2965C13.9227 11.826 13.5911 11.5367 13.2011 11.5032C12.8806 11.4752 12.5541 11.6198 12.2467 11.9162C12.4493 10.0913 12.6518 8.13422 12.8517 6.08305C13.1205 3.31664 12.5658 1.77897 11.0608 1.1164C10.9612 0.792272 10.76 0.508766 10.4869 0.307742C10.2138 0.106719 9.88331 -0.00116726 9.54421 1.28859e-05H5.33871C4.99944 -0.00135642 4.66873 0.106439 4.39543 0.307473C4.12213 0.508507 3.92075 0.792117 3.82102 1.1164C2.31643 1.77911 1.76188 3.31664 2.03072 6.08291C2.2188 8.02867 2.42049 9.97308 2.63577 11.916C2.32832 11.6198 2.00115 11.4752 1.68127 11.5027C1.29132 11.5362 0.959293 11.8254 0.770662 12.296C0.452272 13.0898 0.757159 14.3628 1.06853 15.2911C1.13864 15.4982 1.27199 15.678 1.44976 15.8051C1.62753 15.9323 1.84076 16.0005 2.05935 16H12.8236C13.0421 16.0006 13.2554 15.9325 13.4332 15.8054C13.611 15.6783 13.7444 15.4986 13.8147 15.2917C14.126 14.3634 14.4307 13.0907 14.1117 12.2965ZM12.3818 6.03714C12.1549 8.372 11.9227 10.5856 11.6931 12.6195C11.6228 12.6924 11.5343 12.7451 11.4367 12.7722C11.3392 12.7993 11.2361 12.7998 11.1383 12.7736C11.2554 11.8985 11.5164 9.89171 11.8419 6.99231C12.0098 5.4969 11.8058 4.46261 11.2357 3.91805C11.1679 3.85444 11.0947 3.7968 11.0169 3.74576C11.1668 3.22834 11.2096 2.54592 11.1464 1.68351C11.9404 2.143 12.6613 3.16258 12.3818 6.03714ZM5.0692 6.30165L6.94794 9.67729C6.84168 9.73477 6.74613 9.81014 6.66547 9.90008L4.69788 6.30165H5.0692ZM9.81373 6.303H10.1852L8.21921 9.90211C8.13833 9.8116 8.0424 9.73577 7.93566 9.67797L9.81373 6.303ZM6.8676 10.5998C6.86755 10.4863 6.90116 10.3753 6.96419 10.2809C7.02721 10.1865 7.11682 10.1129 7.22167 10.0694C7.32652 10.0259 7.44192 10.0145 7.55325 10.0367C7.66459 10.0588 7.76686 10.1134 7.84715 10.1936C7.92743 10.2739 7.98211 10.3761 8.00427 10.4875C8.02644 10.5988 8.01509 10.7142 7.97166 10.8191C7.92824 10.9239 7.85469 11.0136 7.76031 11.0766C7.66593 11.1397 7.55497 11.1734 7.44146 11.1734C7.28937 11.1732 7.14355 11.1127 7.03598 11.0052C6.9284 10.8977 6.86785 10.7519 6.8676 10.5998ZM7.27403 14.1601V11.6315C7.38567 11.6514 7.49995 11.6514 7.6116 11.6315V14.1605L7.27403 14.1601ZM8.08418 11.4238C8.23411 11.3088 8.34957 11.1547 8.41798 10.9785C8.48638 10.8023 8.50511 10.6108 8.47211 10.4247L10.7237 6.30287H10.9386C11.0013 6.30287 11.0614 6.27797 11.1057 6.23366C11.15 6.18935 11.1749 6.12924 11.1749 6.06657C11.1749 6.00391 11.15 5.9438 11.1057 5.89949C11.0614 5.85518 11.0013 5.83028 10.9386 5.83028H9.31832C9.2593 5.83006 9.20234 5.85196 9.15868 5.89166C9.11501 5.93136 9.0878 5.98598 9.08241 6.04475C9.07702 6.10352 9.09384 6.16218 9.12956 6.20916C9.16528 6.25614 9.21731 6.28803 9.27538 6.29855L7.46401 9.55442C7.45645 9.55442 7.44902 9.55334 7.44146 9.55334C7.4339 9.55334 7.42796 9.55428 7.42026 9.55442L5.60755 6.2972C5.66562 6.28668 5.71764 6.25479 5.75336 6.20781C5.78908 6.16083 5.80591 6.10217 5.80052 6.0434C5.79513 5.98463 5.76792 5.93001 5.72425 5.89031C5.68058 5.85061 5.62362 5.82871 5.56461 5.82893H3.9443C3.88163 5.82893 3.82153 5.85382 3.77722 5.89814C3.7329 5.94245 3.70801 6.00255 3.70801 6.06522C3.70801 6.12789 3.7329 6.188 3.77722 6.23231C3.82153 6.27662 3.88163 6.30152 3.9443 6.30152H4.15913L6.41149 10.421C6.37763 10.6082 6.39613 10.801 6.46494 10.9784C6.53375 11.1557 6.6502 11.3105 6.80144 11.4259V12.0216C5.91037 12.0833 5.03301 12.2744 4.19693 12.5887C4.07325 11.6578 3.82197 9.70389 3.51073 6.93911C3.36221 5.61694 3.52248 4.69012 3.97414 4.25872C3.99629 4.23752 4.02235 4.21821 4.04679 4.19904C4.10472 4.30925 4.17478 4.41265 4.25567 4.5073C4.88003 5.22955 6.12429 5.22955 7.44146 5.22955C8.75864 5.22955 10.0024 5.22955 10.6268 4.50838C10.7079 4.41358 10.778 4.31 10.836 4.19958C10.8606 4.21943 10.8868 4.23819 10.9091 4.25953C11.3604 4.69066 11.5206 5.61748 11.3722 6.93965C11.0606 9.70767 10.8095 11.6603 10.6859 12.5897C9.85069 12.2754 8.97433 12.0841 8.08418 12.0216V11.4238ZM5.33871 0.472602H9.54421C9.82466 0.47213 10.095 0.577368 10.3013 0.767336C10.5076 0.957304 10.6347 1.21805 10.6574 1.49758C10.7805 2.8319 10.6467 3.76601 10.2702 4.19809C9.78685 4.75696 8.64765 4.75696 7.44146 4.75696C6.23528 4.75696 5.09607 4.75696 4.61268 4.19809C4.23623 3.76601 4.10242 2.8319 4.22664 1.48489C4.25159 1.20756 4.37969 0.949685 4.5856 0.762246C4.79152 0.574807 5.06026 0.471448 5.33871 0.472602ZM3.73623 1.68365C3.67249 2.54416 3.71516 3.22739 3.86558 3.74589C3.78799 3.7968 3.71494 3.85431 3.64725 3.91778C3.07703 4.46247 2.87301 5.49758 3.04098 6.99231C3.36707 9.88955 3.6274 11.8975 3.7446 12.7737C3.64676 12.7999 3.54371 12.7993 3.44614 12.7722C3.34857 12.7451 3.26005 12.6923 3.18978 12.6194C2.94324 10.4271 2.71369 8.23296 2.50115 6.03714C2.22165 3.16285 2.94241 2.14327 3.73623 1.68365ZM13.3667 15.1406C13.3281 15.2539 13.2549 15.3522 13.1575 15.4217C13.0601 15.4912 12.9433 15.5284 12.8236 15.5279H2.05935C1.93972 15.5284 1.82298 15.4913 1.72557 15.4219C1.62816 15.3524 1.555 15.2542 1.51641 15.141C1.11754 13.9527 1.00561 12.9806 1.20936 12.4725C1.27971 12.2969 1.43998 11.9982 1.72246 11.9742C2.02032 11.9472 2.37922 12.2358 2.70409 12.7625C2.83836 12.9809 3.04767 13.1428 3.2928 13.2179C3.53792 13.293 3.80202 13.2761 4.03558 13.1704C4.91342 12.7919 5.84862 12.5637 6.80212 12.4953V14.1601H4.75445C4.69179 14.1601 4.63168 14.185 4.58737 14.2293C4.54306 14.2737 4.51816 14.3338 4.51816 14.3964C4.51816 14.4591 4.54306 14.5192 4.58737 14.5635C4.63168 14.6078 4.69179 14.6327 4.75445 14.6327H10.1285C10.1911 14.6327 10.2512 14.6078 10.2956 14.5635C10.3399 14.5192 10.3648 14.4591 10.3648 14.3964C10.3648 14.3338 10.3399 14.2737 10.2956 14.2293C10.2512 14.185 10.1911 14.1601 10.1285 14.1601H8.08418V12.4954C9.03685 12.5647 9.9712 12.7929 10.8486 13.1705C11.0821 13.276 11.346 13.2928 11.591 13.2176C11.836 13.1425 12.0452 12.9806 12.1794 12.7624C12.5044 12.2358 12.8622 11.9473 13.1611 11.9741C13.4429 11.9981 13.6032 12.2965 13.6742 12.4723C13.8773 12.9803 13.7654 13.9529 13.3667 15.1406Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </i>
                                                                        <p>1 Seat</p>
                                                                    </div>
                                                                </li> --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                     @endif
                                                    @endif
                                                </div>
                                            </div>
                                            @if($ride->status != 1 && $ride->status != 3)
                                               <div class="b_passender_details_right animated fadeInRightShort slow driver-info">
                                                <div class="passenger_extraNotes_box">


                                                    <div class="passenger_extras_info">

                                                        <h4>Driver Info @if(empty($ride->driver->name))<span style="color: darkred" class="blink-text">(Driver Details will be shared soon)</span>@endif</h4>
                                                        <div class="b_passenger_info">
                                                            <ul>

                                                                    <li class="driver-assign">
                                                                    <div class="b_passenger_text">
                                                                        <i>

                                                                            <img src="{{ asset('images/driver_link_icon.svg') }}" alt="">
                                                                        </i>
                                                                        <p><strong>Driver Name :</strong>
                                                                            @php $partner = null; @endphp
                                                                         @if (!empty($ride->driver->name))


                                                                           <span class="driver-name">
                                                                             {{ $ride->driver->name }}
                                                                           </span>
                                                                           @endif
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                    <li class="driver-assign">
                                                                        <div class="b_passenger_text">
                                                                        <i>
                                                                        <svg width="16" height="20" viewBox="0 0 16 20"
                                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M14.6 5.64844V14.1484C14.6 17.5484 13.75 18.3984 10.35 18.3984H5.25C1.85 18.3984 1 17.5484 1 14.1484V5.64844C1 2.24844 1.85 1.39844 5.25 1.39844H10.35C13.75 1.39844 14.6 2.24844 14.6 5.64844Z"
                                                                                stroke="#292D32" stroke-width="1.275"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path d="M9.49961 4.375H6.09961"
                                                                                stroke="#292D32" stroke-width="1.275"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path
                                                                                d="M7.79992 15.9319C8.52756 15.9319 9.11742 15.342 9.11742 14.6144C9.11742 13.8867 8.52756 13.2969 7.79992 13.2969C7.07229 13.2969 6.48242 13.8867 6.48242 14.6144C6.48242 15.342 7.07229 15.9319 7.79992 15.9319Z"
                                                                                stroke="#292D32" stroke-width="1.275"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                    </i>
                                                                    <p><strong>Contact No: </strong>
                                                                     @if (!empty($ride->driver->mobile_number))
                                                                         <span class="driver-name">
                                                                            {{ $ride->driver->mobile_number }}
                                                                        </span>
                                                                     @endif
                                                                    </p>
                                                                    </div>
                                                                </li>




                                                                <li class="driver-assign">
                                                                    <div class="b_passenger_text">
                                                                    <i>
                                                                        <svg width="18" height="23" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M8.54745 0.948117C16.4371 0.515793 20.9907 9.83401 15.7591 15.7331C13.8846 17.8483 11.5081 19.7426 9.58908 21.8461C9.24422 22.1367 8.77502 22.1367 8.42781 21.8461C6.49704 19.7217 4.08064 17.8088 2.19445 15.6704C-2.71576 10.099 1.14109 1.35487 8.54745 0.948117ZM14.1216 14.2107C17.3567 10.4035 15.44 4.50666 10.5392 3.39331C4.83371 2.09633 0.324674 8.06985 3.15162 13.1322C5.38268 17.1254 11.1445 17.7135 14.1239 14.2084L14.1216 14.2107Z" fill="#333333"></path>
                                                                            <path d="M5.18558 12.9625C4.92986 12.8835 5.1715 12.0119 5.05655 11.8771C4.96271 11.7632 4.76095 11.8678 4.70699 11.5261C4.646 11.1449 4.66007 9.68291 4.84071 9.3761C4.9369 9.2134 5.12927 9.12275 5.21608 8.95307C4.82195 8.97399 4.39028 9.02048 4.32928 8.52075C4.24014 7.80021 5.34745 7.44691 5.82839 7.93037C6.15448 7.42599 6.11695 6.69383 6.73395 6.41026C7.60901 6.01048 10.5181 5.99421 11.3673 6.45442C11.8318 6.70545 11.9444 7.40972 12.0946 7.86761C12.6482 7.67237 13.5092 7.59334 13.6735 8.31156C13.8001 8.86475 13.3427 9.02977 12.8641 8.95307C12.8805 9.16226 13.1081 9.23431 13.1996 9.41561C13.2699 9.5574 13.3028 9.77588 13.3169 9.93626C13.345 10.2686 13.3708 11.303 13.3169 11.5935C13.2746 11.8143 13.0189 11.7516 12.9485 11.9189C12.8782 12.0863 13.0002 12.7626 12.904 12.9021C12.843 12.9881 11.4119 12.9974 11.2618 12.93C11.2313 12.916 11.1327 12.8138 11.1327 12.8045V11.8166H6.89113V12.8045C6.89113 12.8254 6.80667 12.9021 6.82779 12.9625C6.50404 12.9625 5.39907 13.0276 5.19027 12.9625H5.18558ZM6.24598 8.5068H11.7732C11.7521 8.25345 11.3509 7.00529 11.2148 6.90999C10.8489 6.65664 9.27468 6.58458 8.78202 6.59388C8.37381 6.60085 7.64655 6.65199 7.25946 6.74264C7.15154 6.76821 6.84421 6.86815 6.77852 6.93323C6.69172 7.01923 6.18733 8.44869 6.24598 8.5068ZM6.16621 9.66664C5.40141 9.82237 5.44599 10.9613 6.22252 11.0473C7.33218 11.1705 7.24773 9.44583 6.16621 9.66664ZM12.2025 9.86188C11.5996 9.18783 10.4547 10.1478 11.1585 10.866C11.7943 11.5145 12.8101 10.5429 12.2025 9.86188Z" fill="#333333"></path>
                                                                        </svg>

                                                                    </i>
                                                                        <p><strong>Car Detail :</strong>

                                                                         @if (!empty($ride->driver->car_details))


                                                                           <span class="driver-name">
                                                                             <?php echo $ride->driver->car_details; ?>
                                                                           </span>
                                                                           @endif
                                                                        </p>
                                                                    </div>
                                                                </li>



                                                            </ul>
                                                        </div>


                                                    </div>

                                                </div>
                                               </div>
                                            @endif
                                        </div>
                                        {{-- New Area --}}
                                        <div class="b_passender_details_right animated fadeInRightShort slow go" style="width: 100%;">
                                                <div class="passenger_extraNotes_box">
                                                    <div class="passenger_extras_info">
                                                        <h4>Extras &amp; Notes</h4>
                                                        <div class="b_passenger_info">
                                                            <ul>
                                                                                                                                <li>
                                                                    <div class="b_passenger_text">
                                                                        <i>
                                                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M7.20583 13.6771L7.30477 13.6627C7.30404 13.6577 7.30329 13.6527 7.30254 13.6478C7.29964 13.6287 7.29677 13.6098 7.29551 13.591C7.29519 13.5862 7.29502 13.582 7.29498 13.5784L10.952 10.39C11.4731 11.4135 11.9794 12.4452 12.4853 13.478C12.5156 13.5398 12.5458 13.6016 12.5761 13.6634C13.0704 14.6727 13.5651 15.6827 14.0728 16.6859C14.0977 16.7351 14.1215 16.7852 14.1456 16.8361L14.1474 16.8399C14.1708 16.8892 14.1945 16.9393 14.2191 16.9881C14.2694 17.0877 14.3256 17.1868 14.3962 17.2714C14.4676 17.357 14.5551 17.4295 14.6679 17.4735C14.7807 17.5175 14.9115 17.5303 15.0654 17.5077C15.25 17.4807 15.4389 17.3613 15.5949 17.2247C15.7528 17.0862 15.8908 16.9178 15.9716 16.7726L15.9717 16.7725C16.0177 16.6897 16.169 16.3571 16.1314 15.6389L16.1315 15.6389L16.1311 15.6348L16.1018 15.3228L16.1019 15.3228L16.1011 15.3171L14.8012 6.81796C15.0544 6.57506 15.3159 6.34012 15.5794 6.10499C15.6078 6.07964 15.6362 6.05428 15.6646 6.02891C15.9125 5.80782 16.1614 5.58577 16.4043 5.3575L16.4043 5.35749C16.4599 5.30516 16.5169 5.25225 16.5746 5.19864C17.0177 4.78717 17.5055 4.33417 17.7877 3.78317L17.7877 3.78315C18.2922 2.79761 18.1513 1.89175 17.6085 1.36318C17.0661 0.834955 16.1543 0.714921 15.1833 1.2325C14.6467 1.51841 14.2134 1.98438 13.8108 2.41746C13.7543 2.47817 13.6985 2.53823 13.643 2.59705C13.4044 2.8501 13.1724 3.10962 12.9415 3.36801C12.9257 3.38568 12.9099 3.40335 12.8941 3.42101C12.6587 3.68427 12.4239 3.94594 12.1819 4.20008L3.1771 2.82056L3.17712 2.82043L3.17196 2.81991C2.75354 2.77784 2.33768 2.91713 2.0133 3.16936L2.01329 3.16937C1.80925 3.32808 1.60404 3.57185 1.51624 3.83492C1.47191 3.96773 1.45618 4.10973 1.49059 4.24892C1.52533 4.38946 1.60917 4.51876 1.74946 4.62747C1.75466 4.63149 1.76023 4.635 1.76611 4.63793L8.608 8.04823L5.41391 11.7109L2.32357 11.0185L2.32364 11.0182L2.31585 11.0171C2.13923 10.9919 1.93557 11.0254 1.74299 11.0953C1.54949 11.1655 1.35914 11.2754 1.20856 11.4118C1.05888 11.5473 0.941147 11.716 0.908784 11.9048C0.875479 12.0991 0.935452 12.2983 1.10959 12.4814C1.1169 12.489 1.1254 12.4955 1.13475 12.5005L3.68686 13.8704C3.55552 14.0628 3.39646 14.3156 3.29612 14.5772C3.18018 14.8795 3.13096 15.2253 3.33798 15.4999C3.46692 15.6712 3.62671 15.7616 3.80164 15.7914C3.97313 15.8205 4.15206 15.7901 4.32223 15.7339C4.60264 15.6414 4.88445 15.4694 5.10219 15.3364C5.11366 15.3294 5.12496 15.3225 5.13608 15.3158L6.45749 17.7993L6.45726 17.7994L6.46109 17.8055C6.60924 18.0413 6.82598 18.1233 7.0442 18.0944C7.25417 18.0667 7.45691 17.9384 7.60356 17.7732C7.87567 17.4668 8.02185 17.0541 7.97487 16.6393C7.9201 16.1559 7.78621 15.6458 7.65031 15.1423C7.64232 15.1127 7.63433 15.0831 7.62634 15.0536C7.49763 14.5775 7.37084 14.1084 7.30474 13.6625L7.20583 13.6771ZM7.20583 13.6771C7.27282 14.1291 7.40107 14.6035 7.52935 15.078C7.67391 15.6127 7.81851 16.1475 7.8755 16.6506C7.91903 17.0349 7.78363 17.4199 7.52877 17.7068L7.20481 13.5243C7.18714 13.5546 7.19736 13.6215 7.20394 13.6647C7.20462 13.6691 7.20526 13.6733 7.20583 13.6771ZM14.1703 6.66192C14.1817 6.55731 14.3191 6.42923 14.4197 6.33538C14.44 6.31643 14.4588 6.29888 14.4748 6.28319C14.8083 5.95592 15.1649 5.64116 15.5215 5.32629C15.9173 4.97691 16.3132 4.62739 16.678 4.26052M14.1703 6.66192L7.04577 17.3382C7.03956 17.3433 7.03442 17.3477 7.02962 17.3518C7.02509 17.3557 7.02086 17.3593 7.01633 17.363C6.89499 17.1317 6.77449 16.8993 6.65383 16.6666C6.28474 15.9547 5.9141 15.2398 5.51321 14.5455C5.50655 14.534 5.49766 14.5239 5.48706 14.5159C5.46219 14.497 5.42369 14.479 5.39402 14.4669C5.36544 14.4553 5.32346 14.4402 5.29027 14.4374L5.29001 14.4374C5.25101 14.4342 5.21163 14.4459 5.18202 14.4568C5.14933 14.4689 5.11357 14.486 5.07714 14.5054C5.00411 14.5443 4.91957 14.5971 4.83641 14.6514C4.77899 14.6889 4.72061 14.7281 4.66614 14.7647C4.64171 14.7811 4.61807 14.797 4.59565 14.812C4.52112 14.8617 4.46228 14.8998 4.42604 14.9191C4.36329 14.9524 4.2361 15.0199 4.11283 15.0626C4.05064 15.0842 3.99617 15.097 3.95503 15.0986C3.93486 15.0994 3.92202 15.0973 3.91477 15.0949C3.9114 15.0938 3.90979 15.0929 3.90927 15.0925C3.90912 15.0924 3.90903 15.0923 3.90899 15.0923C3.90539 15.0877 3.89466 15.0639 3.90523 14.9992C3.915 14.9393 3.93951 14.8659 3.97284 14.7872C4.03916 14.6307 4.13183 14.4732 4.17667 14.3981C4.21368 14.3361 4.26138 14.273 4.31307 14.2045C4.32375 14.1904 4.3346 14.176 4.34556 14.1614C4.40675 14.0797 4.47181 13.9893 4.51193 13.8981C4.55258 13.8056 4.57421 13.6971 4.52601 13.589C4.47948 13.4846 4.37818 13.4044 4.23082 13.3404L1.63235 11.9812C1.63729 11.9748 1.64369 11.9672 1.65188 11.9585C1.69867 11.9089 1.76864 11.8594 1.80251 11.8382C1.80465 11.8368 1.80674 11.8354 1.80877 11.8339C1.94641 11.7486 2.08524 11.7027 2.23381 11.7209L5.47687 12.4475L5.47678 12.448L5.48611 12.4491C5.59808 12.4634 5.68868 12.4142 5.75547 12.3606C5.80529 12.3207 5.85217 12.2693 5.88921 12.2287C5.89979 12.2171 5.90957 12.2064 5.91838 12.197L5.91845 12.197C6.77865 11.2853 9.16339 8.5017 9.31385 8.32167L9.31386 8.32166C9.32103 8.31308 9.32834 8.30439 9.33572 8.29562C9.36973 8.25518 9.40521 8.213 9.43506 8.17192C9.4714 8.12188 9.50613 8.06471 9.52246 8.00152C9.53978 7.9345 9.53552 7.86379 9.49904 7.79372C9.46436 7.72712 9.40427 7.66818 9.32329 7.61301L9.32382 7.61223L9.31149 7.6061L2.18263 4.06355C2.18329 4.05734 2.18494 4.04922 2.18836 4.03872C2.19868 4.00694 2.22105 3.96754 2.25349 3.92419C2.3181 3.83784 2.40634 3.75725 2.45302 3.72206L2.45308 3.72201C2.64927 3.57387 2.88384 3.49323 3.1192 3.5271C3.11932 3.52711 3.11945 3.52713 3.11957 3.52715L12.3232 4.92937C12.3317 4.93067 12.3403 4.93086 12.3488 4.92995C12.446 4.9196 12.5333 4.85118 12.5954 4.79432C12.6408 4.75266 12.6868 4.70317 12.7235 4.66368C12.7387 4.64736 12.7523 4.63274 12.7636 4.62109C13.0765 4.29917 13.3744 3.96129 13.6706 3.62542C13.6925 3.60054 13.7144 3.57567 13.7364 3.55082C14.0549 3.18974 14.3728 2.83221 14.7099 2.49585L14.71 2.49583C15.002 2.20431 15.4185 1.87693 15.8538 1.70703C16.2872 1.53787 16.7212 1.52998 17.0802 1.84292C17.436 2.15311 17.4699 2.58134 17.3334 3.02341C17.1962 3.46743 16.8912 3.90423 16.607 4.19001L16.678 4.26052M14.1703 6.66192L15.576 15.8853L14.1703 6.66192ZM16.678 4.26052L16.607 4.19002C16.2629 4.53614 15.8904 4.86719 15.514 5.19956C15.4943 5.21698 15.4745 5.2344 15.4548 5.25183C15.0986 5.56626 14.7402 5.88264 14.4048 6.21182M16.678 4.26052L14.4048 6.21182M14.4048 6.21182C14.392 6.22433 14.3752 6.24004 14.3561 6.25783C14.3146 6.29661 14.2625 6.34529 14.2188 6.39236C14.1854 6.42825 14.1523 6.46786 14.126 6.50906C14.1003 6.54926 14.0767 6.59795 14.0709 6.65112C14.07 6.65973 14.0702 6.66843 14.0715 6.67699L15.4769 15.8989C15.5044 16.1251 15.4223 16.3542 15.2793 16.5435L15.2793 16.5435C15.2454 16.5884 15.154 16.6851 15.0598 16.7506C15.012 16.7839 14.9723 16.8028 14.9447 16.8083C14.9352 16.8102 14.9298 16.81 14.9273 16.8097C14.4886 15.9334 14.0546 15.053 13.6204 14.1722C12.8633 12.6361 12.1057 11.0989 11.3213 9.58109C11.3142 9.56733 11.304 9.5554 11.2915 9.54626C11.1687 9.45649 10.9969 9.44631 10.8684 9.53401L10.8682 9.53412C10.8647 9.53645 10.8579 9.54094 10.8499 9.54709L10.8494 9.54645L10.8422 9.55367C10.842 9.55389 10.8417 9.55414 10.8414 9.55441C10.8315 9.56281 10.8228 9.57131 10.8153 9.57898C10.2617 10.1001 9.54362 10.708 8.82343 11.3168L8.78691 11.3477C8.07946 11.9457 7.37269 12.5431 6.82669 13.0541C6.81649 13.0637 6.80477 13.0743 6.79209 13.0858C6.74825 13.1254 6.69294 13.1754 6.64913 13.2285C6.59148 13.2983 6.53554 13.3938 6.54781 13.5103L6.54714 13.5103L6.54968 13.5217L7.27727 16.764C7.28926 16.8481 7.27027 16.9604 7.22512 17.072C7.17955 17.1847 7.1131 17.2823 7.04581 17.3381L14.4048 6.21182ZM10.8451 9.55109C10.8455 9.55076 10.8454 9.55084 10.8451 9.55111L10.8451 9.55109Z" fill="#292D32" stroke="black" stroke-width="0.2" stroke-linejoin="round"></path>
                                                                            </svg>
                                                                        </i>
                                                                        <p><strong>Flight # :</strong>{{ $ride->flight_number }}
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="b_passenger_text">
                                                                        <i>
                                                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M20.8816 2.74196H13.7146C13.4902 2.22457 13.1195 1.78405 12.6481 1.47455C12.1767 1.16506 11.6251 1.00013 11.0611 1H10.8205C10.2566 1.0001 9.70507 1.16505 9.23372 1.47455C8.76237 1.78406 8.39182 2.22457 8.16761 2.74196H1V13.6424H10.3656V19.0604H11.5138V13.6424H20.8795L20.8816 2.74196ZM19.7334 12.4915H2.15314V3.89237H19.7334V12.4915Z" fill="#292D32" stroke="#F5F4F1" stroke-width="0.172004"></path>
                                                                                <path opacity="0.5" d="M18.2926 5.33203H3.58887V11.054H18.2926V5.33203Z" fill="#292D32"></path>
                                                                            </svg>
                                                                        </i>
                                                                        <p><strong>Meet &amp; Greet :</strong>{{ $ride->meet_greet }}
                                                                        </p>
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="passenger_notes_info">
                                                        <strong>Notes for chauffeur</strong>
                                                        <p>
                                                            {{ $ride->note }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- End New Area --}}
                                        <div class="passenger_location_box animatedParent animateOnce">
                                            <div class="p_location_box_left">
                                                <h4 class="animated fadeInUpShort slow delay-250">Location</h4>
                                                <div class="b_passenger_info">
                                                    <ul>
                                                        <li class="animated fadeInUpShort slow delay-500">
                                                            <div class="b_passenger_text">
                                                                <i>
                                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M12 19.5C16.1421 19.5 19.5 16.1421 19.5 12C19.5 7.85786 16.1421 4.5 12 4.5C7.85786 4.5 4.5 7.85786 4.5 12C4.5 16.1421 7.85786 19.5 12 19.5Z"
                                                                            stroke="#0FA85C" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                                                            stroke="#0FA85C" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M12 4V2" stroke="#0FA85C"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M4 12H2" stroke="#0FA85C"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M12 20V22" stroke="#0FA85C"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M20 12H22" stroke="#0FA85C"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>

                                                                </i>
                                                                <p><strong>From:</strong>
                                                                    <span>{{ $ride->source }}
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </li>
                                                        @if($ride->ride_type_id != 2 && $ride->ride_type_id != 4)
                                                        <li class="animated fadeInUpShort slow delay-750">
                                                            <div class="b_passenger_text">
                                                                <i>
                                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11.9989 13.4314C13.722 13.4314 15.1189 12.0345 15.1189 10.3114C15.1189 8.58828 13.722 7.19141 11.9989 7.19141C10.2758 7.19141 8.87891 8.58828 8.87891 10.3114C8.87891 12.0345 10.2758 13.4314 11.9989 13.4314Z"
                                                                            stroke="#FF5733" stroke-width="1.5" />
                                                                        <path
                                                                            d="M3.62166 8.49C5.59166 -0.169998 18.4217 -0.159997 20.3817 8.5C21.5317 13.58 18.3717 17.88 15.6017 20.54C13.5917 22.48 10.4117 22.48 8.39166 20.54C5.63166 17.88 2.47166 13.57 3.62166 8.49Z"
                                                                            stroke="#FF5733" stroke-width="1.5" />
                                                                    </svg>

                                                                </i>
                                                                <p><strong>To:</strong>
                                                                    <span> {{ $ride->destination}}
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </li>
                                                       @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="p_location_box_right animated fadeInRightShort slow">
                                                <div class="p_paymentDetails_info">
                                                    <ul>
                                                        <li>
                                                            <div class="p_price_breakdown">
                                                                <span>{{ $ride->way == 1 ? 'One way' : 'Two Way'}}:</span>
                                                                @php $add_on_amount = 0; @endphp
                                                                @if($ride->ride_type_id == 4)
                                                                  @php $add_on = \App\Models\RideAddon::where('ride_id',$ride->id)->get()->sum("amount");
                                                                       $add_on_amount = $add_on;
                                                                  @endphp
                                                                @endif
                                                                <strong>AED {{ number_format(((float)$ride->price + $ride->discount_amount) - ($ride->children_seat_amount + $ride->photography_amount + $ride->tip_amount + $add_on_amount ) ,2)}}</strong>
                                                            </div>
                                                        </li>
                                                        @if($ride->tip_amount > 0)
                                                        <li>
                                                            <div class="p_price_breakdown">
                                                                <span>Tip:</span>
                                                                <strong>AED {{ number_format($ride->tip_amount,2)}}</strong>
                                                            </div>
                                                        </li>
                                                        @endif
                                                        @if($ride->children_seat_amount > 0)
                                                        <li>
                                                            <div class="p_price_breakdown">
                                                                <span> Seat:</span>
                                                                <strong>AED {{ number_format($ride->children_seat_amount,2)}}</strong>
                                                            </div>
                                                        </li>
                                                        @endif
                                                        @if($ride->photography_amount)
                                                        <li>
                                                            <div class="p_price_breakdown">
                                                                <span>{{$ride->photograph}} Photography:</span>
                                                                <strong>AED {{ number_format($ride->photography_amount,2)}}</strong>
                                                            </div>
                                                        </li>
                                                        @endif
                                                        @if($ride->ride_type_id == 4)
                                                         @php $add_ons = \App\Models\RideAddon::where('ride_id',$ride->id)->get(); @endphp
                                                         @if(count($add_ons) > 0)
                                                         @foreach ($add_ons as $item)


                                                             <li>
                                                                <div class="p_price_breakdown">
                                                                    <span>({{$item->quantity}}) {{ !empty($item->addon->title) ? $item->addon->title : "" }}:</span>
                                                                    <strong>AED {{ number_format($item->amount,2)}}</strong>
                                                                </div>
                                                         </li>
                                                         @endforeach

                                                         @endif
                                                        @endif
                                                        <li>
                                                            <div class="p_price_breakdown">
                                                                <span>Discount: </span>
                                                                <strong>AED {{ number_format($ride->discount_amount,2)}}</strong>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="total_p_breakdown">
                                                        <div class="p_price_breakdown">
                                                            <span>Total</span>
                                                            <strong>AED {{ number_format($ride->price,2)}}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="passenger_allBtns animatedParent animateOnce">
                                            <ul>
                                                <li class="animated fadeInLeftShort slow delay-250">
                                                    <a href="#"
                                                        class="all_btn icon_btn uppercase outlined_red_btn w_100 justify_content_center cancel_popup @if($ride->status == 3 || $ride->status == 1) disabled-button @endif">
                                                        <i>
                                                            <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.49967 17.9154C13.8538 17.9154 17.4163 14.3529 17.4163 9.9987C17.4163 5.64453 13.8538 2.08203 9.49967 2.08203C5.14551 2.08203 1.58301 5.64453 1.58301 9.9987C1.58301 14.3529 5.14551 17.9154 9.49967 17.9154Z"
                                                                    stroke="#E31E37" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M7.25977 12.2386L11.7406 7.75781"
                                                                    stroke="#E31E37" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M11.7406 12.2386L7.25977 7.75781"
                                                                    stroke="#E31E37" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </i>
                                                        Cancel Ride
                                                    </a>
                                                </li>
                                                <li class="animated fadeInLeftShort slow delay-250">
                                                    <a href="javascript:void(0)"
                                                        class="all_btn icon_btn uppercase w_100 justify_content_center reschedule_popup @if($ride->status == 1 || $ride->status == 3 || $ride->status == 6 || $ride->status == 7 ) disabled-button @endif">
                                                        <i>
                                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.33301 1.58203V3.95703" stroke="white"
                                                                    stroke-width="1.45" stroke-miterlimit="10"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M12.667 1.58203V3.95703" stroke="white"
                                                                    stroke-width="1.45" stroke-miterlimit="10"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M2.77051 7.19531H16.2288" stroke="white"
                                                                    stroke-width="1.45" stroke-miterlimit="10"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M15.2084 12.4849L12.4059 15.2874C12.2951 15.3982 12.1921 15.6041 12.1684 15.7545L12.018 16.8232C11.9626 17.2111 12.2317 17.4803 12.6196 17.4249L13.6884 17.2745C13.8388 17.2507 14.0526 17.1478 14.1555 17.037L16.958 14.2345C17.4409 13.7516 17.6705 13.1895 16.958 12.477C16.2534 11.7724 15.6913 12.002 15.2084 12.4849Z"
                                                                    stroke="white" stroke-width="1.45"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M14.8047 12.8906C15.0422 13.7456 15.7072 14.4106 16.5622 14.6481"
                                                                    stroke="white" stroke-width="1.45"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M9.5 17.4154H6.33333C3.5625 17.4154 2.375 15.832 2.375 13.457V6.72786C2.375 4.35286 3.5625 2.76953 6.33333 2.76953H12.6667C15.4375 2.76953 16.625 4.35286 16.625 6.72786V9.4987"
                                                                    stroke="white" stroke-width="1.45"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path d="M9.49598 10.8451H9.50309" stroke="white"
                                                                    stroke-width="1.45" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path d="M6.56629 10.8451H6.5734" stroke="white"
                                                                    stroke-width="1.45" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path d="M6.56629 13.2201H6.5734" stroke="white"
                                                                    stroke-width="1.45" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                        </i>
                                                        Reschedule Ride
                                                    </a>
                                                </li>
                                                <li class="animated fadeInRightShort slow delay-250">
                                                    <?php
                                                        if($ride->status == 1)
                                                        {
                                                                    $download_link =  route('print.invoice',$ride->id);
                                                                    $target = 'target="_blank"';
                                                        }
                                                        else
                                                        {
                                                                    $download_link = "#";
                                                                    $target = 'target="_self"';
                                                        }                                                    ?>
                                                    <a href="<?php echo $download_link; ?>"
                                                        class="all_btn icon_btn uppercase outlined_grey_btn w_100 justify_content_center donwload">
                                                        <i>
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.04199 5.83464H13.9587V4.16797C13.9587 2.5013 13.3337 1.66797 11.4587 1.66797H8.54199C6.66699 1.66797 6.04199 2.5013 6.04199 4.16797V5.83464Z"
                                                                    stroke="#292D32" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M13.3337 12.5V15.8333C13.3337 17.5 12.5003 18.3333 10.8337 18.3333H9.16699C7.50033 18.3333 6.66699 17.5 6.66699 15.8333V12.5H13.3337Z"
                                                                    stroke="#292D32" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M17.5 8.33203V12.4987C17.5 14.1654 16.6667 14.9987 15 14.9987H13.3333V12.4987H6.66667V14.9987H5C3.33333 14.9987 2.5 14.1654 2.5 12.4987V8.33203C2.5 6.66536 3.33333 5.83203 5 5.83203H15C16.6667 5.83203 17.5 6.66536 17.5 8.33203Z"
                                                                    stroke="#292D32" stroke-width="1.5"
                                                                    stroke-miterlimit="10" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path d="M14.1663 12.5H13.158H5.83301" stroke="#292D32"
                                                                    stroke-width="1.5" stroke-miterlimit="10"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M5.83301 9.16797H8.33301" stroke="#292D32"
                                                                    stroke-width="1.5" stroke-miterlimit="10"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </i>
                                                        Download Invoice
                                                    </a>
                                                </li>
                                                <li class="animated fadeInRightShort slow delay-250">
                                                    <input type="hidden" name="track_url" id="track-url" value="{{ $track_url }}" wire:model="text">
                                                    <a href="javascript:void(0)"
                                                        class="all_btn icon_btn uppercase outlined_grey_btn w_100 justify_content_center" onclick="copyToClipboard()">
                                                        <i>
                                                            <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <circle cx="3.83301" cy="9" r="2.5" stroke="#292D32"
                                                                    stroke-width="1.6" stroke-linejoin="round" />
                                                                <circle cx="12.166" cy="4" r="2.5" stroke="#292D32"
                                                                    stroke-width="1.6" stroke-linejoin="round" />
                                                                <circle cx="12.166" cy="14" r="2.5" stroke="#292D32"
                                                                    stroke-width="1.6" stroke-linejoin="round" />
                                                                <path d="M10.4997 13.168L6.33301 10.668"
                                                                    stroke="#292D32" stroke-width="1.6"
                                                                    stroke-linejoin="round" />
                                                                <path d="M10.5 4.83203L5.5 8.16536" stroke="#292D32"
                                                                    stroke-width="1.6" stroke-linejoin="round" />
                                                            </svg>
                                                        </i>
                                                        Share
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="passenger_goback animatedParent animateOnce">
                                        <a class="all_btn icon_btn uppercase text_green greyOutline_border outlined_grey_btn w_100 justify_content_center animated fadeInUpShort slow"
                                            href="{{ route('front.index') }}">
                                            <i>
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.14051 2.24887L2.87342 5.57387C2.16092 6.12804 1.58301 7.30762 1.58301 8.2022V14.0685C1.58301 15.9051 3.07926 17.4093 4.91592 17.4093H14.0834C15.9201 17.4093 17.4163 15.9051 17.4163 14.0764V8.31303C17.4163 7.35512 16.7751 6.12804 15.9913 5.58179L11.0988 2.15387C9.99051 1.37804 8.20926 1.41762 7.14051 2.24887Z"
                                                        stroke="#0FA85B" stroke-width="1.8" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M9.5 14.2422V11.8672" stroke="#0FA85B" stroke-width="1.8"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <span class="">Close & Return to Home page</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<!-- Reschedule popup start  -->
    <div class="all_popup openReschedule_popup">
        <div class="all_popup_overlay"></div>
        <div class="all_popup_table">
            <div class="all_popup_table_cell">
                <div class="all_popup_inner">
                    <div class="all_popup_box reschedule_popup_box">
                        <div class="all_popup_close">
                            <i>
                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.49967 17.9154C13.8538 17.9154 17.4163 14.3529 17.4163 9.9987C17.4163 5.64453 13.8538 2.08203 9.49967 2.08203C5.14551 2.08203 1.58301 5.64453 1.58301 9.9987C1.58301 14.3529 5.14551 17.9154 9.49967 17.9154Z"
                                        stroke="#1F1F1F" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M7.25977 12.2386L11.7406 7.75781" stroke="#1F1F1F" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.7406 12.2386L7.25977 7.75781" stroke="#1F1F1F" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </i>
                        </div>
                        <div class="all_popup_detail">
                            <div class="trackBookingForm has_white_fields">
                                <form action="{{ route('reschedule.ride',$ride->id) }}" method="post" id="reschedule-form">
                                    @csrf
                                    <div class="form_row">
                                    <div class="form_cell">
                                        <div class="form_field">
                                            <input type="date" class="floating-input ride-date" name="ride_date"
                                                placeholder="DD-MM-YY" value="{{ $ride->ride_date }}"  />
                                            <label class="floating-label"><i>Date</i></label>
                                            <i class="field_icon">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.2002 1.30078V3.25078" stroke="#8D8D8D"
                                                        stroke-width="0.975001" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10.4004 1.30078V3.25078" stroke="#8D8D8D"
                                                        stroke-width="0.975001" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.27441 5.91016H13.3244" stroke="#8D8D8D"
                                                        stroke-width="0.975001" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M13.6502 5.52344V11.0484C13.6502 12.9984 12.6752 14.2984 10.4002 14.2984H5.2002C2.9252 14.2984 1.9502 12.9984 1.9502 11.0484V5.52344C1.9502 3.57344 2.9252 2.27344 5.2002 2.27344H10.4002C12.6752 2.27344 13.6502 3.57344 13.6502 5.52344Z"
                                                        stroke="#8D8D8D" stroke-width="0.975001" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.79702 8.90703H7.80285" stroke="#8D8D8D"
                                                        stroke-width="1.3" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M5.39174 8.90703H5.39758" stroke="#8D8D8D"
                                                        stroke-width="1.3" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M5.39174 10.8563H5.39758" stroke="#8D8D8D"
                                                        stroke-width="1.3" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form_row">
                                    <div class="form_cell">
                                        <div class="form_field time-picker-container">
                                            <input type="text" name="rides_time"
                                                class="floating-input time-picker-input" placeholder="-- I -- --" />
                                            <label class="floating-label"><i>Time</i></label>
                                            <i class="field_icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M20.75 13.25C20.75 18.08 16.83 22 12 22C7.17 22 3.25 18.08 3.25 13.25C3.25 8.42 7.17 4.5 12 4.5C16.83 4.5 20.75 8.42 20.75 13.25Z"
                                                        stroke="#8D8D8D" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M12 8V13" stroke="#8D8D8D" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9 2H15" stroke="#8D8D8D" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </i>
                                            <div class="time-picker-dropdowns">
                                                <div class="time-picker-hours">
                                                    <ul class="time-picker-list">
                                                        <!-- Hour options will be dynamically generated  from customTimePicker.js-->
                                                    </ul>
                                                </div>
                                                <div class="time-picker-minutes">
                                                    <ul class="time-picker-list">
                                                        <!-- Minute options will be dynamically generated  from customTimePicker.js-->
                                                    </ul>
                                                </div>
                                                <div class="time-picker-am-pm">
                                                    <ul class="time-picker-list">
                                                        <!-- AM/PM options will be dynamically generated  from customTimePicker.js-->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form_row">
                                    <div class="form_cell">
                                        <div
                                            class="all_btn outlined_green_btn btn_large flexible icon_btn justify_content_between uppercase search_return_plan_btn">
                                            <i>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.07006 4.59891C2.87006 1.13891 8.08006 1.13891 8.87006 4.59891C9.34006 6.62891 8.05006 8.34891 6.93006 9.41891C6.11006 10.1989 4.82006 10.1889 4.00006 9.41891C2.89006 8.34891 1.60006 6.62891 2.07006 4.59891Z"
                                                        stroke="#0FA85B" stroke-width="1.5" />
                                                    <path
                                                        d="M15.07 16.5989C15.87 13.1389 21.11 13.1389 21.91 16.5989C22.38 18.6289 21.09 20.3489 19.96 21.4189C19.14 22.1989 17.84 22.1889 17.02 21.4189C15.89 20.3489 14.6 18.6289 15.07 16.5989Z"
                                                        stroke="#0FA85B" stroke-width="1.5" />
                                                    <path
                                                        d="M12.0002 5H14.6802C16.5302 5 17.3902 7.29 16.0002 8.51L8.01019 15.5C6.62019 16.71 7.48019 19 9.32019 19H12.0002"
                                                        stroke="#0FA85B" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M5.48622 5.5H5.49777" stroke="#0FA85B" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M18.4862 17.5H18.4978" stroke="#0FA85B" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <span class="mr_auto">Change Location</span>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form_row">
                                    <div class="form_cell padb-0">
                                        {{-- <a href="javascript:void(0)"
                                            class="all_btn icon_btn uppercase w_100 justify_content_center reschedule_popup done_reschedule_popup">
                                            <i>
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.33301 1.58203V3.95703" stroke="white"
                                                        stroke-width="1.45" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12.667 1.58203V3.95703" stroke="white" stroke-width="1.45"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.77051 7.19531H16.2288" stroke="white"
                                                        stroke-width="1.45" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M15.2084 12.4849L12.4059 15.2874C12.2951 15.3982 12.1921 15.6041 12.1684 15.7545L12.018 16.8232C11.9626 17.2111 12.2317 17.4803 12.6196 17.4249L13.6884 17.2745C13.8388 17.2507 14.0526 17.1478 14.1555 17.037L16.958 14.2345C17.4409 13.7516 17.6705 13.1895 16.958 12.477C16.2534 11.7724 15.6913 12.002 15.2084 12.4849Z"
                                                        stroke="white" stroke-width="1.45" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M14.8047 12.8906C15.0422 13.7456 15.7072 14.4106 16.5622 14.6481"
                                                        stroke="white" stroke-width="1.45" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M9.5 17.4154H6.33333C3.5625 17.4154 2.375 15.832 2.375 13.457V6.72786C2.375 4.35286 3.5625 2.76953 6.33333 2.76953H12.6667C15.4375 2.76953 16.625 4.35286 16.625 6.72786V9.4987"
                                                        stroke="white" stroke-width="1.45" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.49598 10.8451H9.50309" stroke="white"
                                                        stroke-width="1.45" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M6.56629 10.8451H6.5734" stroke="white" stroke-width="1.45"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.56629 13.2201H6.5734" stroke="white" stroke-width="1.45"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            Reschedule
                                        </a> --}}
                                      <button type="submit" class="all_btn icon_btn uppercase w_100 justify_content_center reschedule_popup done_reschedule_popup">
                                            <i>
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.33301 1.58203V3.95703" stroke="white"
                                                        stroke-width="1.45" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12.667 1.58203V3.95703" stroke="white" stroke-width="1.45"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.77051 7.19531H16.2288" stroke="white"
                                                        stroke-width="1.45" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M15.2084 12.4849L12.4059 15.2874C12.2951 15.3982 12.1921 15.6041 12.1684 15.7545L12.018 16.8232C11.9626 17.2111 12.2317 17.4803 12.6196 17.4249L13.6884 17.2745C13.8388 17.2507 14.0526 17.1478 14.1555 17.037L16.958 14.2345C17.4409 13.7516 17.6705 13.1895 16.958 12.477C16.2534 11.7724 15.6913 12.002 15.2084 12.4849Z"
                                                        stroke="white" stroke-width="1.45" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M14.8047 12.8906C15.0422 13.7456 15.7072 14.4106 16.5622 14.6481"
                                                        stroke="white" stroke-width="1.45" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M9.5 17.4154H6.33333C3.5625 17.4154 2.375 15.832 2.375 13.457V6.72786C2.375 4.35286 3.5625 2.76953 6.33333 2.76953H12.6667C15.4375 2.76953 16.625 4.35286 16.625 6.72786V9.4987"
                                                        stroke="white" stroke-width="1.45" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.49598 10.8451H9.50309" stroke="white"
                                                        stroke-width="1.45" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M6.56629 10.8451H6.5734" stroke="white" stroke-width="1.45"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.56629 13.2201H6.5734" stroke="white" stroke-width="1.45"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            Reschedule</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="loader" class="loader-wrapper" style="display: none;">
      <div class="loader"></div>
    </div>
    <!-- reschedule popup end -->
    {{-- Cancel Modal Start --}}
    {{-- Ride Cancel Popup --}}
<div class="all_popup openCancel_popup">
        <div class="all_popup_overlay"></div>
        <div class="all_popup_table">
            <div class="all_popup_table_cell">
                <div class="all_popup_inner">
                    <div class="all_popup_box">
                        <div class="all_popup_close">
                            <i>
                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.49967 17.9154C13.8538 17.9154 17.4163 14.3529 17.4163 9.9987C17.4163 5.64453 13.8538 2.08203 9.49967 2.08203C5.14551 2.08203 1.58301 5.64453 1.58301 9.9987C1.58301 14.3529 5.14551 17.9154 9.49967 17.9154Z"
                                        stroke="#1F1F1F" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M7.25977 12.2386L11.7406 7.75781" stroke="#1F1F1F" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.7406 12.2386L7.25977 7.75781" stroke="#1F1F1F" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </i>
                        </div>
                        <div class="all_popup_detail">
                            <div class="cancel_popup_header">
                                <i class="cancel_icon">
                                    <svg width="60" height="60" viewBox="0 0 93 93" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_3483_45000)">
                                            <path
                                                d="M42.9981 0.103064C84.3189 -2.5197 108.693 45.5038 81.5175 77.0202C58.8727 103.291 16.1339 95.9769 3.32001 63.8977C-8.27473 34.8742 11.828 2.07663 42.9981 0.103064Z"
                                                fill="#0FA85B" />
                                            <path
                                                d="M42.9979 5.01017C78.3269 2.67305 101.041 41.7895 80.2204 70.8044C59.4 99.8193 16.5747 91.4403 6.64007 58.5735C-0.925478 33.5317 16.8168 6.74137 42.9979 5.01017Z"
                                                fill="white" />
                                            <path
                                                d="M45.5401 56.0813C50.6674 55.7264 56.2788 58.4963 58.9073 62.9455C59.4866 63.9236 60.0573 64.945 59.2791 66.0184C59.063 66.3213 58.3626 66.7022 57.9908 66.7455C56.2615 66.9446 55.8638 65.1874 55.0078 64.1227C50.8316 58.9204 42.9203 58.479 38.3982 63.4822C37.2483 64.7546 36.228 67.8448 34.0405 66.3906C32.095 65.1008 34.1875 62.4521 35.225 61.2143C37.767 58.1847 41.5887 56.3583 45.5314 56.0813H45.5401Z"
                                                fill="#363634" />
                                            <path
                                                d="M29.5533 36.2589C36.9113 34.7527 37.4301 49.7016 31.3085 50.5586C24.1666 51.5627 23.9677 37.4015 29.5533 36.2589Z"
                                                fill="#34363A" />
                                            <path
                                                d="M61.3285 36.2611C65.1588 35.4734 67.1821 39.6456 67.3637 42.8569C67.5193 45.4711 66.084 50.1453 63.0837 50.5608C55.9246 51.5649 55.6997 37.4123 61.3285 36.2611Z"
                                                fill="#34363A" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_3483_45000">
                                                <rect width="93" height="93" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </i>
                                <h2>We're sad to see you go...</h2>
                                <p>Before you cancel, please let us know the reason you are leaving. Every bit of
                                    feedback helps!</p>
                            </div>
                            <form action="{{ route('ride.cancel',$ride->id) }}" method="POST" autocomplete="off" id="cancel-form">
                                @csrf
                            <div class="cancel_checkboxs">
                                <ul>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Change of plans" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Change of plans</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Accidental booking" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Accidental booking</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Price is too high" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Price is too high</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Technical issue with the app or payment" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Technical issue with the app or payment</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Need to modify booking details" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Need to modify booking details </p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Chauffeur arrived at the wrong location" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Chauffeur arrived at the wrong location</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="No longer need the ride" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">No longer need the ride</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Unable to reach the chauffeur" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Unable to reach the chauffeur</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Concerned about safety" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Concerned about safety</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Driver is late" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Driver is late</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Found a more affordable option" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Found a more affordable option</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Ride got delayed, and I made alternative arrangements" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Ride got delayed, and I made alternative arrangements</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Unexpected emergency or urgent commitment" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Unexpected emergency or urgent commitment</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Prefer a different vehicle type or category" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Prefer a different vehicle type or category</p>
                                            </label>
                                        </div>
                                    </li>
                                    {{-- <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox"  name="remarks[]" value="Accidental booking" />
                                                <span class="checkbox__symbol">
                                                    <svg aria-hidden="true" class="icon-checkbox" width="28px"
                                                        height="28px" viewBox="0 0 28 28" version="1"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 14l8 7L24 7"></path>
                                                    </svg>
                                                </span>
                                                <p class="checkbox__textwrapper">Other (please explain below)</p>
                                            </label>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="checkbox_textBox">
                                <textarea id="" name="remarks[]" placeholder="Explain other..." maxlength="500"></textarea>
                            </div>

                            <div id="submit-errors">

                            </div>

                            <div class="passenger_allBtns cencel_checkBox_btns">
                                <ul>
                                    <li>
                                        {{-- <a href="javascript:void(0)" type="submit"
                                            class="all_btn icon_btn uppercase outlined_red_btn btn_large w_100 justify_content_center doneCancel_ride">
                                            <i>
                                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.49967 17.9154C13.8538 17.9154 17.4163 14.3529 17.4163 9.9987C17.4163 5.64453 13.8538 2.08203 9.49967 2.08203C5.14551 2.08203 1.58301 5.64453 1.58301 9.9987C1.58301 14.3529 5.14551 17.9154 9.49967 17.9154Z"
                                                        stroke="#E31E37" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M7.25977 12.2386L11.7406 7.75781" stroke="#E31E37"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11.7406 12.2386L7.25977 7.75781" stroke="#E31E37"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            Cancel Ride
                                        </a> --}}

                                     <button type="submit" class="all_btn icon_btn uppercase outlined_red_btn btn_large w_100 justify_content_center">
                                        <i>
                                            <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.49967 17.9154C13.8538 17.9154 17.4163 14.3529 17.4163 9.9987C17.4163 5.64453 13.8538 2.08203 9.49967 2.08203C5.14551 2.08203 1.58301 5.64453 1.58301 9.9987C1.58301 14.3529 5.14551 17.9154 9.49967 17.9154Z"
                                                    stroke="#E31E37" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M7.25977 12.2386L11.7406 7.75781" stroke="#E31E37"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M11.7406 12.2386L7.25977 7.75781" stroke="#E31E37"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </i>
                                            Cancel Ride
                                     </button>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"
                                            class="all_btn icon_btn uppercase btn_large w_100 justify_content_center">
                                            Nevermind, I don't want to cancel
                                        </a>
                                    </li>
                                </ul>
                            </div>
                         </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
{{-- End Ride Cancel --}}
{{-- Ride Cancel Message --}}
<div class="all_popup openCancel_ride_popup">
        <div class="all_popup_overlay"></div>
        <div class="all_popup_table">
            <div class="all_popup_table_cell">
                <div class="all_popup_inner">
                    <div class="all_popup_box">
                        <div class="all_popup_close">
                            <i>
                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.49967 17.9154C13.8538 17.9154 17.4163 14.3529 17.4163 9.9987C17.4163 5.64453 13.8538 2.08203 9.49967 2.08203C5.14551 2.08203 1.58301 5.64453 1.58301 9.9987C1.58301 14.3529 5.14551 17.9154 9.49967 17.9154Z"
                                        stroke="#1F1F1F" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M7.25977 12.2386L11.7406 7.75781" stroke="#1F1F1F" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.7406 12.2386L7.25977 7.75781" stroke="#1F1F1F" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </i>
                        </div>
                        <div class="all_popup_detail">
                            <div class="cancel_popup_header">
                                <i class="cancel_icon">
                                    <svg width="95" height="95" viewBox="0 0 95 95" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M71.6416 85.7167L70.5458 84.0436L71.6417 85.7167C98.4896 68.1307 98.88 28.9704 72.3164 10.7253L72.3174 10.7221C42.947 -9.44656 2.1078 12.3029 2.00022 47.8043C1.89265 83.3 41.9165 105.187 71.6416 85.7167Z"
                                            fill="white" stroke="#0FA85B" stroke-width="4" stroke-linejoin="bevel" />
                                        <path
                                            d="M73.6857 28.6022C73.2233 28.1397 72.6066 27.8828 71.95 27.8828C71.2934 27.8828 70.6768 28.1397 70.2143 28.6022L37.2983 61.5182L23.3155 47.5353C22.3563 46.5818 20.8033 46.5818 19.844 47.5353C18.8905 48.4945 18.8905 50.0475 19.844 51.0068L35.5626 66.7253C36.0422 67.2049 36.6703 67.4448 37.2983 67.4448C37.9264 67.4448 38.5545 67.2049 39.0341 66.7253L73.6857 32.0737C74.645 31.1145 74.645 29.5614 73.6857 28.6022Z"
                                            fill="#34363A" />
                                    </svg>
                                </i>
                                <h2>Ride Canceled Successfully.</h2>
                                <p></p>
                            </div>
                            <div class="cancel_ride_popup_btn">
                                <a href="{{ route('front.index') }}"
                                    class="all_btn  btn_large flexible justify_content_between uppercase">
                                    <span class="mr_auto">Go to The Home Page</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- End Ride Cancel Message --}}
    {{-- Cancel Modal End --}}
@endsection

@section('script')

<script>
    function printSection() {
        var content = document.getElementById("printSection").innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = content;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>
<script>
    $(document).on('submit','#reschedule-form',function(e){
        e.preventDefault();

        var url = $(this).attr('action');

        var date = $(this).find('.ride-date').val(),
            time = $(this).find('.time-picker-input').val();

        if (!timeValidationFunc(date + " " + time)) {
            $(this)
            .find("[name='ride_date']")
            .parent()
            .after(
                "<span class='error_text'>Old Date selection should not be allowed</span>"
            );
            $(this).find("[name='rides_time']").addClass("error_stroke");
             $(this)
            .find("[name='rides_time']")
            .parent()
            .after(
                "<span class='error_text'>The selected time should be ahead of current Time</span>"
            );
            $(this).find("[name='rides_time']").addClass("error_stroke");

            $('.all_popup').show();
            return;
        }

        $.ajax({
            url: url,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cashe: false,
            processData: false,
            dataType: "json",
            success: function (data) {
            if (data.success) {
                window.location.reload(true);

            } else {
                alert(data.message);
            }
            },
            error: function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error: ", textStatus, errorThrown);
            $(".btn-confirm").removeClass("disabled-button");
            alert("Something went wrong! " + errorThrown);
            },
        });
    })
</script>

<script>
    $(document).on('click','.cancel_popup',function(e){
        e.preventDefault();

        var url = $(this).attr('href');
        // $('.openCancel_popup').modal('show');
        // $.ajax({
        //     type:'get',
        //     url: url,
        //     dataType:'json',
        //     success:function(data){

        //         if (data.success) {
        //             window.location.reload(true);
        //         }
        //     }
        // })
    });
</script>
<script>
    function copyToClipboard() {
        var copyText = document.getElementById("track-url");
        // copyText.select();
        // document.execCommand("copy");

        var copyText = document.getElementById("track-url").value;
        navigator.clipboard.writeText(copyText).then(function() {
            alert("The Ride Link has been copy to Clipboard now you can share the link via email Or Watsapp.  \n link: " + copyText);
            // alert("Copied: " + copyText);
        }).catch(function(error) {
            console.error("Copy failed:", error);
        });

    }
</script>
<script>
     function fetchData() {
        $.ajax({
            url: "{{ route('tracking.ride',$ride->id) }}",
            method: 'GET',
            success: function(data) {
                if (data) {
                    var html_content = "";
                  if (data.status == 1) {
                    html_content = '<strong class="tracking_completed">Completed</strong>';
                  }else if(data.status == 2){
                    html_content = '<strong class="tracking_pending">Pending</strong>';
                  }else if(data.status == 3){
                    html_content = '<strong class="tracking_canceled">Cancelled</strong>';
                  }else if(data.status == 4){
                    html_content = '<strong class="tracking_confirmed">Confirmed</strong>';
                  }else if(data.status == 5){
                    html_content = '<strong class="tracking_assign">Assigned</strong>';
                  }else if(data.status == 6){
                    html_content = '<strong class="tracking_enroute">Driver enroute</strong>';
                  }else if(data.status == 7){
                    html_content = '<strong class="tracking_driver_at_location">Driver at Location</strong>';
                  }

                  $('#ride-status').empty();
                  $('#ride-status').html(html_content);
                }
            },
            error: function() {
                $('#data-container').html('Error loading data');
            }
        });
    }

    setInterval(fetchData, 5000);
</script>
<script>
    $(document).on('click','.donwload',function(e){
        e.preventDefault();
        var ride_status = $('[name="ride_status"]').val();

        if (ride_status != "1") {

            alert("Your invoice will be available for download once your ride is completed.");
            // e.preventDefault();
            return;
        }

        var url = $(this).attr('href');
        $('#loader').show();

        $.ajax({
            url: url,
            type: 'GET',
            xhrFields: {
                responseType: 'blob' // Required for binary data
            },
            success: function(data) {
                const blob = new Blob([data], { type: 'application/pdf' });
                const url = window.URL.createObjectURL(blob);

                // Create and trigger download
                const link = document.createElement('a');
                link.href = url;
                link.download = `invoice_{{ $ride->booking_code }}.pdf`;
                link.click();

                // Cleanup
                $('#loader').hide();
                window.URL.revokeObjectURL(url);
            },
            error: function(xhr, status, error) {
                console.error("Error downloading PDF:", error);
                console.error("Server Response:", xhr.responseText);
                $('#loader').hide();
            }
        });
    });
</script>
<script>
    $(document).on('submit','#cancel-form',function(e){
        e.preventDefault();

        $('.error_text').remove();

        $('.outlined_red_btn').addClass('disabled-button');
        var reasons = [];
        var other_remarks = $(this).find("textarea").val();

        $(this).find('input[type="checkbox"]:checked').each(function() {
            reasons.push($(this).val());
        });



        if (reasons.length === 0 && other_remarks.trim() === "") {

            $("#submit-errors").append('<span class="error_text">Please provide a reason for canceling the ride.</span>');

            $('.outlined_red_btn').removeClass('disabled-button');

            e.preventDefault();
            return;

        }
        // $('#loader').show();

        var url = $(this).attr('action');
            $.ajax({
            url: url,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cashe: false,
            processData: false,
            dataType: "json",
            success: function (html) {
                if (html.success) {
                    // toastr.success(html.message);
                    // $('#loader').hide();
                    $('.outlined_red_btn').removeClass('disabled-button');
                    $('.openCancel_popup').hide();
                    $('.cancel_popup').addClass('disabled-button');
                    $('.reschedule_popup').addClass('disabled-button');
                    $('.driver-info').remove();
                    $('.openCancel_ride_popup').show();
                } else {
                    // toastr.error(html.message);

                    alert(html.message);
                }
            },
            error: function (xhr, status, error) {
                if (xhr.status === 419) {
                location.reload(true);
                } else {
                console.log("Error:", xhr.responseText);
                alert("Error: " + xhr.responseText);
                }
                $('.outlined_red_btn').removeClass('disabled-button');
            },
        });
    });
</script>
@endsection
