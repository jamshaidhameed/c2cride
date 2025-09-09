@extends('front.layouts.master')
 @section('meta')
   <meta name="description" content="
    @if($type == 'Travel Agencies')
     Travel agencies can now partner with C2C Ride for premium chauffeur services in UAE.
    @else if($type =='Corporations')
     Book corporate transport for events, meetings, and business travel with C2C Ride.
    @else if($type == 'Holiday Homes')
     Get smooth and safe transport for your holiday home stays in UAE. Book C2C Ride.
    @endif
   " />
 @endsection
@section('title')
    @if($type == 'Travel Agencies')
      Travel Agencies Partnership | Collaborate with C2C Ride
    @else if($type == 'Corporations')
     Corporate Chauffeur Services in UAE | C2C Ride
    @else if($type == 'Holiday Homes')
    Holiday Home Transport Services in UAE | C2C Rides
    @endif
@endsection
@section('style')
    <!-- Hotjar Tracking Code for City 2 City  -->
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
    <div class="gradiantParent">
        <div class="gradiantChild">
            <div class="become_partner_main animatedParent animateOnce">
                <div class="become_partner_inner">
                    <div class="become_partner_banner">
                        <div class="autoContent">
                            <div class="bp_banner_inner">
                                <div class="bp_banner_left">
                                    <div class="bp_banner_left_inner">
                                        <div class="banner_text">
                                            <small class="uppercase animated fadeInUpShort slow">Partner
                                                Program</small>
                                            <h1 class="animated fadeInUpShort slow delay-250">
                                                {{ $type }}

                                            </h1>
                                            <p class="animated fadeInUpShort slow delay-500">Join the C2C business program and transform every journey into five-star experience. Deliver your customers smooth and quality rides with confidence and consistency.
                                            </p>
                                        </div>
                                        <div class="registered_users animated fadeInUpShort slow delay-500">
                                            <div class="r_users_imgs">
                                                <ul>
                                                    <li>
                                                        <div class="r_user_img">
                                                            <img src="{{ asset('front/images/registered_user_img1.jpg') }}" alt="#">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="r_user_img">
                                                            <img src="{{ asset('front/images/registered_user_img2.jpg') }}" alt="#">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="r_user_img">
                                                            <img src="{{ asset('front/images/registered_user_img3.jpg') }}" alt="#">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="r_users_info">
                                                <small>Trusted by over a thousand registered users.</small>
                                            </div>
                                        </div>
                                        <div class="bp_banner_btn animated fadeInUpShort slow delay-750">
                                            <a href="javascript:void(0)"
                                                class="all_btn light_green_btn btn_large uppercase bp_getStartedBtn">
                                                Get started
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bp_banner_right">
                                    <div class="bg_banner_img animated fadeInRightShort slow">
                                        <img src="{{ asset('front/images/become-partner_banner_img.png') }}" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bp_application_list animatedParent animateOnce">
                        <div class="autoContent">
                            <div class="bp_a_list_inner animated fadeInUpShort slow">
                                <ul>
                                    <li>
                                        <div class="bp_a_list_detail">
                                            <h4>Submit an application </h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bp_a_list_detail">
                                            <h4>Consultation and verification process </h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bp_a_list_detail">
                                            <h4>Sign partnership agreement </h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bp_a_list_detail">
                                            <h4>Get access to C2C Ride business portal </h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="become_partner_content">
                        <div class="b_partner_details">
                            <div class="autoContent">
                                <div class="bp_details_inner">
                                    <div class="bp_details_header">
                                        <div class="headlines animatedParent animateOnce">
                                            <span class="headlines_sub animated fadeInUpShort slow">About
                                                Us</span>
                                            <!-- <h2 class="animated fadeInUpShort slow delay-250">Nunc ac massa vel
                                                sapien
                                                volutpat bibendum. Proin magna urna</h2> -->
                                            <p class="animated fadeInUpShort slow delay-500">C2C Ride provides safe, reliable and luxurious chauffeur service through a user-friendly platform and experienced drivers. We are committed to delivering a comfortable and on-time experience for every customer with consistency and professionalism.</p>

                                        </div>
                                    </div>
                                    <div class="bp_details_content">
                                        <div class="hw_content_list animatedParent animateOnce">
                                            <ul>
                                                <li class="animated fadeInUpShort slow">
                                                    <div class="hw_box">
                                                        <div class="hw_box_img">
                                                            <svg width="62" height="47" viewBox="0 0 62 47"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19 15.7764C19 17.1187 18.4225 18.7146 17.4509 19.9736C16.4752 21.2382 15.2368 22 14 22C12.7632 22 11.5248 21.2382 10.5491 19.9736C9.5775 18.7146 9 17.1187 9 15.7764C9 14.5221 9.5172 13.3112 10.4509 12.4123C11.3859 11.5121 12.6619 11 14 11C15.3381 11 16.6141 11.5121 17.5491 12.4123C18.4828 13.3112 19 14.5221 19 15.7764Z"
                                                                    stroke="#16293A" stroke-width="2" />
                                                                <path
                                                                    d="M54 15.7764C54 18.9666 51.3137 23 48 23C44.6863 23 42 18.9666 42 15.7764C42 14.2444 42.6321 12.7751 43.7574 11.6919C44.8826 10.6086 46.4087 10 48 10C49.5913 10 51.1174 10.6086 52.2426 11.6919C53.3679 12.7751 54 14.2444 54 15.7764Z"
                                                                    fill="#16293A" />
                                                                <path
                                                                    d="M1.12709 37.1426C2.03524 30.6029 7.70287 26 13.9999 26C20.2969 26 25.9646 30.6029 26.8727 37.1426C26.9282 37.5419 26.5959 38 25.9999 38H1.99989C1.40392 38 1.07163 37.5419 1.12709 37.1426Z"
                                                                    stroke="#16293A" stroke-width="2" />
                                                                <path
                                                                    d="M47.9991 25C41.2253 25 35.1156 29.9491 34.1358 37.005C33.9839 38.0991 34.8945 39 35.9991 39H59.9991C61.1037 39 62.0143 38.0991 61.8624 37.005C60.8826 29.9491 54.7729 25 47.9991 25Z"
                                                                    fill="#16293A" />
                                                                <path
                                                                    d="M40 8.8867C40 13.7948 35.9706 20 31 20C26.0294 20 22 13.7948 22 8.8867C22 6.5298 22.9482 4.2695 24.636 2.6029C26.3239 0.93628 28.6131 0 31 0C33.3869 0 35.6761 0.93628 37.364 2.6029C39.0518 4.2695 40 6.5298 40 8.8867Z"
                                                                    fill="#0FA85B" />
                                                                <path
                                                                    d="M31.0006 23C19.9445 23 10.0142 32.153 9.07338 44.9992C8.99266 46.1008 9.89598 47 11.0006 47H51.0006C52.1052 47 53.0085 46.1008 52.9278 44.9992C51.987 32.153 42.0567 23 31.0006 23Z"
                                                                    fill="#0FA85B" />
                                                            </svg>

                                                        </div>
                                                        <div class="hw_box_data">
                                                            <h4>Enhance your services</h4>
                                                            <p>Add smooth rides to your travel package</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="animated fadeInUpShort slow delay-250">
                                                    <div class="hw_box">
                                                        <div class="hw_box_img">
                                                            <svg width="58" height="64" viewBox="0 0 58 64"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M31.5195 39.65L44.8095 62.65L46.9995 54.52C47.0739 54.2786 47.237 54.0742 47.4559 53.9481C47.6748 53.8219 47.9333 53.7833 48.1795 53.84L56.3195 56L42.9995 33L31.5195 39.65Z"
                                                                    stroke="#16293A" stroke-width="2"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M26.4797 39.65L13.1897 62.65L10.9997 54.52C10.9252 54.2786 10.7622 54.0742 10.5433 53.9481C10.3244 53.8219 10.0659 53.7833 9.81974 53.84L1.67969 56L14.9997 33L26.4797 39.65Z"
                                                                    stroke="#16293A" stroke-width="2"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M20.4849 50.0266C20.3615 50.0308 20.2378 50.0357 20.1139 50.0405C18.8475 50.09 17.5703 50.14 16.5915 49.5699C15.6302 49.0101 15.0494 47.9161 14.4711 46.8271C14.0269 45.9904 13.5842 45.1565 12.9715 44.5699C12.3761 43.9999 11.5526 43.5743 10.7243 43.1463C10.3107 42.9325 9.89591 42.7181 9.50781 42.4849L15.0008 33L26.4808 39.65L20.4849 50.0266ZM48.1219 41.843C47.5593 42.3214 46.853 42.6964 46.1487 43.0703C45.3119 43.5146 44.4781 43.9573 43.8915 44.5699C43.3311 45.1552 42.9103 45.9439 42.4867 46.7377C41.8899 47.8562 41.2875 48.985 40.2815 49.5699C39.4914 50.0293 38.5324 50.0856 37.5373 50.0627L31.5206 39.65L43.0006 33L48.1219 41.843Z"
                                                                    fill="#16293A" />
                                                                <path
                                                                    d="M52.0593 24.1097C52.0593 26.1097 50.0092 27.8897 49.4993 29.7697C48.9893 31.6497 49.8793 34.2497 48.8892 35.9497C47.8992 37.6497 45.2392 38.1597 43.8892 39.5697C42.5393 40.9797 41.9993 43.5697 40.2792 44.5697C38.5592 45.5697 36.0393 44.6597 34.0893 45.1797C32.1392 45.6997 30.4693 47.7397 28.4293 47.7397C26.3892 47.7397 24.6493 45.6797 22.7693 45.1797C20.8893 44.6797 18.2893 45.5597 16.5893 44.5697C14.8893 43.5797 14.3793 40.9197 12.9693 39.5697C11.5593 38.2197 8.86927 37.6797 7.86927 35.9997C6.86922 34.3197 7.77927 31.7597 7.25927 29.8197C6.73922 27.8797 4.69922 26.1497 4.69922 24.1097C4.69922 22.0697 6.75922 20.3297 7.25927 18.4497C7.75927 16.5697 6.87922 13.9697 7.86927 12.2597C8.85927 10.5497 11.5193 10.0497 12.9193 8.64969C14.3193 7.24969 14.8093 4.59969 16.5393 3.59969C18.2693 2.59969 20.7793 3.50969 22.7193 2.98969C24.6593 2.46969 26.3393 0.429688 28.3793 0.429688C30.4193 0.429688 32.1593 2.47969 33.9993 2.99969C35.8393 3.51969 38.4792 2.61969 40.1892 3.60969C41.8992 4.59969 42.3992 7.25969 43.7992 8.65969C45.1993 10.0597 47.7992 10.5497 48.7992 12.2797C49.7992 14.0097 48.8892 16.5097 49.4093 18.4597C49.9293 20.4097 52.0593 22.0697 52.0593 24.1097Z"
                                                                    fill="#0FA85B" />
                                                                <path
                                                                    d="M21.7202 23.0002C22.2193 22.9565 22.7216 23.0337 23.1846 23.2252C23.6476 23.4166 24.0577 23.7168 24.3802 24.1002L29.1102 28.8302C29.2009 28.9018 29.2673 28.9996 29.3002 29.1102C29.3058 29.1433 29.3058 29.1771 29.3002 29.2102C29.3049 29.2434 29.3049 29.2771 29.3002 29.3102C29.2673 29.4209 29.2009 29.5187 29.1102 29.5902L25.8802 32.8002C25.8087 32.8909 25.7109 32.9573 25.6002 32.9902H25.5002H25.4002C25.2895 32.9573 25.1917 32.8909 25.1202 32.8002L16.0002 23.6502C15.9289 23.6026 15.8764 23.5316 15.8517 23.4495C15.8269 23.3673 15.8315 23.2792 15.8646 23.2C15.8976 23.1209 15.9572 23.0557 16.033 23.0156C16.1088 22.9755 16.1962 22.963 16.2802 22.9802L21.7202 23.0002Z"
                                                                    fill="white" />
                                                                <path
                                                                    d="M34.9993 17.2094C34.5002 17.1657 33.9979 17.2428 33.5349 17.4343C33.0719 17.6258 32.6618 17.9259 32.3393 18.3094L27.6493 22.9994C27.5586 23.0709 27.4923 23.1687 27.4593 23.2794C27.4458 23.3454 27.4458 23.4134 27.4593 23.4794C27.4923 23.5901 27.5586 23.6879 27.6493 23.7594L30.8893 26.9994C30.9643 27.0886 31.0606 27.1574 31.1693 27.1994H31.3693C31.478 27.1574 31.5744 27.0886 31.6493 26.9994L40.7993 17.8494C40.8706 17.8017 40.9231 17.7307 40.9478 17.6486C40.9726 17.5665 40.968 17.4783 40.935 17.3992C40.9019 17.3201 40.8424 17.2549 40.7665 17.2148C40.6907 17.1747 40.6033 17.1622 40.5193 17.1794L34.9993 17.2094Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </div>
                                                        <div class="hw_box_data">
                                                            <h4>Economic growth </h4>
                                                            <p>Earn with every client journey.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="animated fadeInUpShort slow delay-500">
                                                    <div class="hw_box">
                                                        <div class="hw_box_img">
                                                            <svg width="80" height="80" viewBox="0 0 80 80"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <mask id="mask0_3483_96182"
                                                                    style="mask-type:luminance"
                                                                    maskUnits="userSpaceOnUse" x="0" y="0"
                                                                    width="80" height="80">
                                                                    <path d="M80 0H0V80H80V0Z" fill="white" />
                                                                </mask>
                                                                <g mask="url(#mask0_3483_96182)">
                                                                    <mask id="mask1_3483_96182"
                                                                        style="mask-type:luminance"
                                                                        maskUnits="userSpaceOnUse" x="0" y="0"
                                                                        width="80" height="80">
                                                                        <path d="M80 0H0V80H80V0Z"
                                                                            fill="white" />
                                                                    </mask>
                                                                    <g mask="url(#mask1_3483_96182)">
                                                                        <path
                                                                            d="M11 72C17.0751 72 22 67.0751 22 61C22 54.9249 17.0751 50 11 50C4.92487 50 0 54.9249 0 61C0 67.0751 4.92487 72 11 72Z"
                                                                            fill="#EBF5F3" />
                                                                        <path
                                                                            d="M63.802 73.8039C64.583 74.5849 65.8532 74.588 66.5971 73.7715C69.9438 70.098 72.6319 65.8683 74.5374 61.2679C76.6984 56.0509 77.8106 50.4593 77.8106 44.8125C77.8106 39.1656 76.6984 33.5741 74.5374 28.3571C72.3765 23.1401 69.2091 18.3998 65.2162 14.4069C61.2233 10.414 56.483 7.24664 51.266 5.08568C46.049 2.92473 40.4575 1.8125 34.8106 1.8125C29.1638 1.8125 23.5722 2.92473 18.3552 5.08568C13.7548 6.99124 9.52512 9.67937 5.85167 13.026C5.03515 13.7699 5.03822 15.0401 5.81927 15.8211L34.8106 44.8125L63.802 73.8039Z"
                                                                            fill="#EBF5F3" />
                                                                    </g>
                                                                    <path
                                                                        d="M40.4856 71.9986C55.1143 71.9986 66.9732 60.1397 66.9732 45.511C66.9732 30.8823 55.1143 19.0234 40.4856 19.0234C25.8569 19.0234 13.998 30.8823 13.998 45.511C13.998 60.1397 25.8569 71.9986 40.4856 71.9986Z"
                                                                        fill="#0FA85B" />
                                                                    <mask id="mask2_3483_96182"
                                                                        style="mask-type:alpha"
                                                                        maskUnits="userSpaceOnUse" x="13" y="19"
                                                                        width="54" height="53">
                                                                        <path
                                                                            d="M40.4856 71.9986C55.1143 71.9986 66.9732 60.1397 66.9732 45.511C66.9732 30.8823 55.1143 19.0234 40.4856 19.0234C25.8569 19.0234 13.998 30.8823 13.998 45.511C13.998 60.1397 25.8569 71.9986 40.4856 71.9986Z"
                                                                            fill="#08CF65" />
                                                                    </mask>
                                                                    <g mask="url(#mask2_3483_96182)">
                                                                        <path
                                                                            d="M55.979 33.5183C55.979 33.5183 47.7329 32.8386 44.1046 35.0176C39.1069 38.0162 38.3673 44.883 39.3668 47.8816C40.3663 50.8801 43.3649 52.8792 44.3645 54.8783C45.364 56.8773 45.364 62.8745 47.3631 62.8745C49.3621 62.8745 54.5697 59.8759 57.0985 58.0068C59.7442 56.1587 62.8688 55.1171 66.0943 55.0082"
                                                                            stroke="white" stroke-width="2"
                                                                            stroke-miterlimit="10" />
                                                                        <path
                                                                            d="M13.1191 41.7041C16.1429 41.9044 19.1089 42.6281 21.885 43.8431C28.6019 46.5119 30.8808 39.3252 33.1697 37.0763C35.4586 34.8273 35.7968 29.9342 38.0557 27.6852C40.3147 25.4363 40.2747 17.5 34.6373 17.5H29"
                                                                            stroke="white" stroke-width="2"
                                                                            stroke-miterlimit="10" />
                                                                        <path
                                                                            d="M12.1191 47.9805C12.1191 47.9805 17.9563 51.9787 21.9545 50.9791C25.013 50.2095 26.8822 50.9791 27.9517 52.9782C30.1106 56.9763 26.1125 60.9745 27.112 68.9707"
                                                                            stroke="white" stroke-width="2"
                                                                            stroke-miterlimit="10" />
                                                                        <path
                                                                            d="M33 22.7349C33 28.8192 25.506 37.2076 23.4928 39.7618C23.2422 40.0794 22.7572 40.0794 22.5072 39.7618C20.494 37.2082 13 28.8192 13 22.7349C13 17.3582 17.477 13 23.0003 13C28.5236 13 33 17.3582 33 22.7349Z"
                                                                            fill="#16293A" stroke="#16293A"
                                                                            stroke-width="2" />
                                                                        <path
                                                                            d="M69 33.7349C69 39.8192 61.506 48.2076 59.4928 50.7618C59.2422 51.0794 58.7572 51.0794 58.5072 50.7618C56.494 48.2082 49 39.8192 49 33.7349C49 28.3582 53.477 24 59.0003 24C64.5236 24 69 28.3582 69 33.7349Z"
                                                                            fill="#16293A" stroke="#16293A"
                                                                            stroke-width="2" />
                                                                    </g>
                                                                    <path
                                                                        d="M22 22C24.7614 22 27 19.7614 27 17C27 14.2386 24.7614 12 22 12C19.2386 12 17 14.2386 17 17C17 19.7614 19.2386 22 22 22Z"
                                                                        fill="white" />
                                                                    <path
                                                                        d="M30 18.7349C30 24.8192 22.506 33.2076 20.4928 35.7618C20.2422 36.0794 19.7572 36.0794 19.5072 35.7618C17.494 33.2082 10 24.8192 10 18.7349C10 13.3582 14.477 9 20.0003 9C25.5236 9 30 13.3582 30 18.7349Z"
                                                                        fill="white" stroke="#16293A"
                                                                        stroke-width="2" />
                                                                    <path
                                                                        d="M66 29.7349C66 35.8192 58.506 44.2076 56.4928 46.7618C56.2422 47.0794 55.7572 47.0794 55.5072 46.7618C53.494 44.2082 46 35.8192 46 29.7349C46 24.3582 50.477 20 56.0003 20C61.5236 20 66 24.3582 66 29.7349Z"
                                                                        fill="white" stroke="#16293A"
                                                                        stroke-width="2" />
                                                                    <path
                                                                        d="M20 23C22.2091 23 24 21.2091 24 19C24 16.7909 22.2091 15 20 15C17.7909 15 16 16.7909 16 19C16 21.2091 17.7909 23 20 23Z"
                                                                        fill="#0FA85B" />
                                                                    <path
                                                                        d="M56 34C58.2091 34 60 32.2091 60 30C60 27.7909 58.2091 26 56 26C53.7909 26 52 27.7909 52 30C52 32.2091 53.7909 34 56 34Z"
                                                                        fill="#0FA85B" />
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="hw_box_data">
                                                            <h4>Constant support  </h4>
                                                            <p>Unwavering, friendly support available as needed.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="animated fadeInUpShort slow delay-250">
                                                    <div class="hw_box">
                                                        <div class="hw_box_img">
                                                            <svg width="58" height="58" viewBox="0 0 58 58"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M36.9994 2.39851C39.6533 2.40115 42.2759 2.97169 44.6911 4.0718C47.1062 5.17191 49.258 6.77611 51.0019 8.77664C52.7457 10.7772 54.0413 13.1277 54.8015 15.6704C55.5617 18.2131 55.769 20.889 55.4094 23.5185C54.7861 27.9614 52.5811 32.0305 49.1993 34.9788C45.8176 37.927 41.4859 39.5566 36.9994 39.5685C36.1429 39.5683 35.2875 39.5081 34.4394 39.3885C29.7677 38.7523 25.5126 36.3639 22.5364 32.7072C19.5601 29.0505 18.0853 24.3991 18.4109 19.6956C18.7364 14.992 20.8379 10.5882 24.2895 7.37634C27.7411 4.16458 32.2846 2.38509 36.9994 2.39851ZM36.9994 0.398508C31.7696 0.384818 26.7305 2.36176 22.9052 5.92802C19.0798 9.49424 16.7549 14.3825 16.4023 19.6005C16.0498 24.8185 17.6961 29.975 21.007 34.0234C24.3179 38.0718 29.0453 40.7086 34.2294 41.3985C35.1673 41.5261 36.1129 41.5896 37.0594 41.5885C42.3148 41.6441 47.3923 39.6871 51.2508 36.1186C55.1093 32.5501 57.4563 27.6406 57.8106 22.3969C58.1649 17.1532 56.4995 11.9726 53.1561 7.91754C49.8127 3.86251 45.0445 1.24024 39.8294 0.588508C38.8915 0.460948 37.946 0.397468 36.9994 0.398508Z"
                                                                    fill="#16293A" />
                                                                <path
                                                                    d="M28.5702 49.9998C39.9362 49.9998 49.1502 40.7858 49.1502 29.4198C49.1502 18.0538 39.9362 8.83984 28.5702 8.83984C17.2042 8.83984 7.99023 18.0538 7.99023 29.4198C7.99023 40.7858 17.2042 49.9998 28.5702 49.9998Z"
                                                                    fill="#16293A" />
                                                                <path
                                                                    d="M20.9999 57.5897C32.366 57.5897 41.5799 48.3757 41.5799 37.0097C41.5799 25.6437 32.366 16.4297 20.9999 16.4297C9.63388 16.4297 0.419922 25.6437 0.419922 37.0097C0.419922 48.3757 9.63388 57.5897 20.9999 57.5897Z"
                                                                    fill="#0FA85B" />
                                                                <path
                                                                    d="M29.5801 23C32.7524 24.9509 35.1705 27.9188 36.4401 31.42"
                                                                    stroke="white" stroke-width="2"
                                                                    stroke-miterlimit="10" />
                                                                <path
                                                                    d="M20 43.7598C18.4745 43.5789 17.06 42.8716 16 41.7598L17.87 39.8898C18.2616 40.3351 18.7428 40.6928 19.2822 40.9392C19.8216 41.1856 20.407 41.3153 21 41.3198C22.5 41.3198 23.16 40.6698 23.16 39.8198C23.16 37.5798 16.6 38.6098 16.6 34.0198C16.6 32.1398 17.91 30.8298 20.07 30.2698V28.5898H22.5V30.2698C23.7285 30.5018 24.8561 31.1057 25.73 31.9998L23.86 33.8698C23.5491 33.5291 23.1729 33.2543 22.7538 33.0619C22.3346 32.8695 21.881 32.7634 21.42 32.7498C20.02 32.7498 19.42 33.3098 19.42 34.0598C19.42 36.2998 25.98 35.2698 25.98 39.8598C25.9349 40.8273 25.5553 41.7491 24.906 42.4677C24.2567 43.1863 23.378 43.6572 22.42 43.7998V45.4798H20V43.7598Z"
                                                                    fill="#16293A" />
                                                            </svg>
                                                        </div>
                                                        <div class="hw_box_data">
                                                            <h4>Comfort Guaranteed </h4>
                                                            <p>We ensure comfort and ease on every travel experience.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bp_team_work">
                            <div class="autoContent">
                                <div class="bp_team_work_inner">
                                    <div class="aboutMe_detail">
                                        <div class="aboutMe_detail_inner animatedParent animateOnce">
                                            <div class="aboutMe_detail_left">
                                                <div class="aboutMe_info">
                                                    <h4 class="animated fadeInUpShort slow">Why Choose Us?</h4>
                                                    <p class="animated fadeInUpShort slow delay-250">C2C Ride provides travel agencies with a dependable, flexible, and revenue-generating transportation service. By collaborating with us, agencies may expand their service portfolio, enhance operational effectiveness and boost customer satisfaction.</p>
                                                    <strong class="animated fadeInUpShort slow delay-500">Our mission is to provide travel agencies with reliable, seamless ride services that improve customer happiness, broaden offerings, and create pleasant, linked travel experiences.</strong>
                                                </div>
                                            </div>
                                            <div class="aboutMe_detail_right animated fadeInRightShort slow">
                                                <div class="aboutMe_img">
                                                    <img src="{{ asset('front/images/bp_team_img.png') }}" alt="#">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="bp_team_circles">
                                            <div class="bp_circle circle_left"></div>
                                            <div class="bp_circle circle_middle"></div>
                                            <div class="bp_circle circle_right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bp_registration_form_main">
                            <div class="autoContent">
                                <div class="bp_registration_form_inner animatedParent animateOnce">
                                    <div class="bp_rf_left">
                                        <div class="bp_rf_img animated fadeInLeftShort slow">
                                            <img src="{{ asset('front/images/bp_rf_img.png') }}" alt="#">
                                        </div>
                                        <div class="bf_rf_contect">
                                            <ul>
                                                <li class="animated fadeInUpShort slow delay-250">
                                                    <a href="mailTo:info@c2cride.com"
                                                        title="Please Email us at: info@c2cride.com"
                                                        class="bf_rf_contect_info">
                                                        <div class="bf_rf_contect_icon">
                                                            <i>
                                                                <svg width="26" height="26" viewBox="0 0 26 26"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M18.3836 3.78516H7.56928C4.32498 3.78516 2.16211 5.40731 2.16211 9.19233V16.7624C2.16211 20.5474 4.32498 22.1695 7.56928 22.1695H18.3836C21.6279 22.1695 23.7908 20.5474 23.7908 16.7624V9.19233C23.7908 5.40731 21.6279 3.78516 18.3836 3.78516ZM18.8919 10.3711L15.507 13.0747C14.7933 13.6478 13.8849 13.929 12.9765 13.929C12.068 13.929 11.1488 13.6478 10.4459 13.0747L7.06101 10.3711C6.71495 10.0899 6.66088 9.57083 6.93123 9.22477C7.21241 8.87871 7.72068 8.81383 8.06674 9.095L11.4516 11.7986C12.2735 12.4583 13.6686 12.4583 14.4905 11.7986L17.8754 9.095C18.2214 8.81383 18.7405 8.8679 19.0109 9.22477C19.292 9.57083 19.238 10.0899 18.8919 10.3711Z"
                                                                        fill="white" />
                                                                </svg>
                                                            </i>
                                                        </div>

                                                        <div class="bf_rf_contect_text">
                                                            <strong>Send Email</strong>
                                                            <span>info@c2cride.com</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="animated fadeInUpShort slow delay-500">
                                                    <a href="callTo:+971 58 560 3086"
                                                        title="Please call us at: +971 58 560 3086"
                                                        class="bf_rf_contect_info">
                                                        <div class="bf_rf_contect_icon">
                                                            <i>
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M17.5609 10.7577C17.1402 10.7577 16.8075 10.4153 16.8075 10.0043C16.8075 9.6423 16.4455 8.8889 15.8389 8.23334C15.242 7.59736 14.5865 7.22555 14.0386 7.22555C13.6178 7.22555 13.2852 6.88309 13.2852 6.47215C13.2852 6.0612 13.6276 5.71875 14.0386 5.71875C15.017 5.71875 16.0444 6.24711 16.9445 7.1962C17.786 8.08658 18.3241 9.19221 18.3241 9.99453C18.3241 10.4153 17.9817 10.7577 17.5609 10.7577Z"
                                                                        fill="#F3F3F3" />
                                                                    <path
                                                                        d="M21.0931 10.7567C20.6724 10.7567 20.3397 10.4142 20.3397 10.0033C20.3397 6.5298 17.512 3.7119 14.0483 3.7119C13.6276 3.7119 13.2949 3.36944 13.2949 2.9585C13.2949 2.54755 13.6276 2.19531 14.0385 2.19531C18.3437 2.19531 21.8465 5.69813 21.8465 10.0033C21.8465 10.4142 21.504 10.7567 21.0931 10.7567Z"
                                                                        fill="#F3F3F3" />
                                                                    <path
                                                                        d="M11.1322 14.8661L9.32212 16.6762C8.94052 17.0578 8.33389 17.0578 7.94251 16.686C7.83489 16.5784 7.72726 16.4805 7.61963 16.3729C6.61184 15.3553 5.70189 14.2888 4.88978 13.1734C4.08746 12.058 3.44169 10.9426 2.97204 9.83693C2.51217 8.72151 2.27734 7.65501 2.27734 6.63743C2.27734 5.97209 2.39476 5.33611 2.62958 4.74904C2.86441 4.15219 3.23622 3.60427 3.75479 3.11505C4.38099 2.49863 5.0659 2.19531 5.78995 2.19531C6.06391 2.19531 6.33787 2.25402 6.58248 2.37143C6.83688 2.48884 7.06192 2.66496 7.23804 2.91936L9.50802 6.11886C9.68414 6.36347 9.81134 6.58851 9.8994 6.80377C9.98746 7.00924 10.0364 7.21471 10.0364 7.40062C10.0364 7.63544 9.96789 7.87027 9.83091 8.09531C9.70371 8.32035 9.5178 8.55518 9.28298 8.79L8.53936 9.56297C8.43174 9.6706 8.38281 9.79779 8.38281 9.95435C8.38281 10.0326 8.3926 10.1011 8.41217 10.1794C8.44152 10.2577 8.47087 10.3164 8.49044 10.3751C8.66656 10.698 8.96988 11.1187 9.40039 11.6275C9.84069 12.1363 10.3103 12.6548 10.8191 13.1734C10.917 13.2713 11.0246 13.3691 11.1224 13.4669C11.5138 13.8485 11.5236 14.4747 11.1322 14.8661Z"
                                                                        fill="#F3F3F3" />
                                                                    <path
                                                                        d="M21.8162 18.1702C21.8162 18.4441 21.7673 18.7279 21.6694 19.0018C21.6401 19.0801 21.6107 19.1584 21.5716 19.2367C21.4053 19.5889 21.19 19.9216 20.9063 20.2347C20.4268 20.763 19.8985 21.1446 19.3016 21.3892C19.2918 21.3892 19.282 21.399 19.2723 21.399C18.695 21.6338 18.0688 21.761 17.3937 21.761C16.3956 21.761 15.3291 21.5262 14.2039 21.0468C13.0787 20.5673 11.9535 19.9216 10.8381 19.1095C10.4565 18.8257 10.0749 18.542 9.71289 18.2387L12.9124 15.0392C13.1864 15.2446 13.431 15.4012 13.6364 15.5088C13.6854 15.5284 13.7441 15.5577 13.8126 15.5871C13.8908 15.6164 13.9691 15.6262 14.0572 15.6262C14.2235 15.6262 14.3507 15.5675 14.4583 15.4599L15.2019 14.7261C15.4466 14.4814 15.6814 14.2955 15.9064 14.1781C16.1315 14.0411 16.3565 13.9727 16.6011 13.9727C16.787 13.9727 16.9827 14.0118 17.198 14.0999C17.4132 14.1879 17.6383 14.3151 17.8829 14.4814L21.1215 16.7808C21.3759 16.9569 21.552 17.1624 21.6596 17.407C21.7575 17.6516 21.8162 17.8962 21.8162 18.1702Z"
                                                                        fill="#F3F3F3" />
                                                                </svg>
                                                            </i>
                                                        </div>
 
                                                        <div class="bf_rf_contect_text">
                                                            <strong>Have Any Question?</strong>
                                                            <span>+971 58 560 3086</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bp_rf_right">
                                        <div class="bp_registration_form has_white_fields">
                                            <h2 class="animated fadeInUpShort slow">{{ $type }}</h2>
                                            <div class="rides_form animated fadeInUpShort slow delay-250">
                                                @if(session()->has('success'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('success')}}
                                                </div>
                                                @endif
                                               <form action="{{ route('travel.agencies.post') }}" method="post" class="become-partner-form" enctype="multipart/form-data">
                                                @csrf 

                                                <input type="hidden" name="type" value="{{ $type }}">
                                                 <div class="form_row">
                                                    <div class="form_cell w_50">
                                                        <div class="form_field">
                                                            <input type="text" class="floating-input @error('first_name') error_stroke @enderror" name="first_name"
                                                                placeholder="Enter Your First Name" />
                                                            <label class="floating-label"><i>First
                                                                    Name</i></label>
                                                            <i class="field_icon">
                                                                <svg width="23" height="22" viewBox="0 0 23 22"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.7926 9.69335C11.7035 9.68443 11.5965 9.68443 11.4984 9.69335C9.37647 9.62202 7.69141 7.88347 7.69141 5.74371C7.69141 3.55937 9.45671 1.78516 11.65 1.78516C13.8343 1.78516 15.6085 3.55937 15.6085 5.74371C15.5996 7.88347 13.9145 9.62202 11.7926 9.69335Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M7.33499 12.9815C5.1774 14.4258 5.1774 16.7796 7.33499 18.215C9.7868 19.8555 13.8078 19.8555 16.2596 18.215C18.4172 16.7706 18.4172 14.4169 16.2596 12.9815C13.8167 11.3499 9.79571 11.3499 7.33499 12.9815Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            @error('first_name')
                                                             <span class="error_text">{{ $message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form_cell w_50">
                                                        <div class="form_field">
                                                            <input type="text" class="floating-input @error('last_name') error_stroke @enderror" name="last_name"
                                                                placeholder="Last Name" />
                                                            <label class="floating-label"><i>Last
                                                                    Name</i></label>
                                                            <i class="field_icon">
                                                                <svg width="23" height="22" viewBox="0 0 23 22"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.7926 9.69335C11.7035 9.68443 11.5965 9.68443 11.4984 9.69335C9.37647 9.62202 7.69141 7.88347 7.69141 5.74371C7.69141 3.55937 9.45671 1.78516 11.65 1.78516C13.8343 1.78516 15.6085 3.55937 15.6085 5.74371C15.5996 7.88347 13.9145 9.62202 11.7926 9.69335Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M7.33499 12.9815C5.1774 14.4258 5.1774 16.7796 7.33499 18.215C9.7868 19.8555 13.8078 19.8555 16.2596 18.215C18.4172 16.7706 18.4172 14.4169 16.2596 12.9815C13.8167 11.3499 9.79571 11.3499 7.33499 12.9815Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            @error('last_name')
                                                             <span class="error_text">{{ $message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form_row">
                                                    <div class="form_cell">
                                                        <div class="form_field">
                                                            <input type="email" class="floating-input @error('email') error_stroke @enderror" name="email"
                                                                placeholder="Email" />
                                                            <label class="floating-label"><i>Email</i></label>
                                                            <i class="field_icon">
                                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.1002 13.2177H4.72449C2.81177 13.2177 1.53662 12.2613 1.53662 10.0298V5.56677C1.53662 3.33527 2.81177 2.37891 4.72449 2.37891H11.1002C13.0129 2.37891 14.2881 3.33527 14.2881 5.56677V10.0298C14.2881 12.2613 13.0129 13.2177 11.1002 13.2177Z"
                                                                        stroke="#8D8D8D" stroke-width="0.95636"
                                                                        stroke-miterlimit="10"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M11.1003 5.88672L9.10473 7.48065C8.44803 8.00346 7.37054 8.00346 6.71383 7.48065L4.72461 5.88672"
                                                                        stroke="#8D8D8D" stroke-width="0.95636"
                                                                        stroke-miterlimit="10"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            @error('email')
                                                             <span class="error_text">{{ $message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form_row">
                                                    <div class="form_cell">
                                                        <div class="form_field">
                                                            <input type="text" class="floating-input @error('phone') error_stroke @enderror" name="phone"
                                                                placeholder="Phone" />
                                                            <label class="floating-label"><i>Phone</i></label>
                                                            <i class="field_icon">
                                                                <svg width="16" height="19" viewBox="0 0 16 19"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M14.7992 5.25V13.75C14.7992 17.15 13.9492 18 10.5492 18H5.44922C2.04922 18 1.19922 17.15 1.19922 13.75V5.25C1.19922 1.85 2.04922 1 5.44922 1H10.5492C13.9492 1 14.7992 1.85 14.7992 5.25Z"
                                                                        stroke="#8D8D8D" stroke-width="1.275"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M9.69883 3.97656H6.29883"
                                                                        stroke="#8D8D8D" stroke-width="1.275"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M7.99914 15.5334C8.72678 15.5334 9.31664 14.9436 9.31664 14.2159C9.31664 13.4883 8.72678 12.8984 7.99914 12.8984C7.27151 12.8984 6.68164 13.4883 6.68164 14.2159C6.68164 14.9436 7.27151 15.5334 7.99914 15.5334Z"
                                                                        stroke="#8D8D8D" stroke-width="1.275"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            @error('phone')
                                                             <span class="error_text">{{ $message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                </div>
                                                <div class="form_row">
                                                    <div class="form_cell">
                                                        <div class="form_field">
                                                            <input type="text" class="floating-input @error('watsapp') error_stroke @enderror" name="watsapp"
                                                                placeholder="Watsapp" />
                                                            <label class="floating-label"><i>WatsApp</i></label>
                                                            <i class="field_icon">

                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13.3194 10.8786C13.3194 10.8786 13.2294 10.8286 13.1294 10.7786C13.1194 10.7786 13.0294 10.7286 12.8894 10.6586C12.7594 10.5886 12.5794 10.5086 12.3894 10.4186C12.0094 10.2386 11.6394 10.0586 11.5394 10.0286C11.4394 9.99859 11.3994 9.97859 11.3594 9.97859C11.3394 9.97859 11.2994 9.97859 11.2394 10.0686C11.0894 10.2986 10.6694 10.7886 10.5394 10.9286C10.5394 10.9286 10.4994 10.9686 10.4694 10.9986C10.4494 11.0086 10.4294 11.0286 10.3894 11.0486C10.3594 11.0686 10.2894 11.1086 10.1794 11.1086C10.1294 11.1086 10.0994 11.1086 10.0894 11.1086C10.0794 11.1086 10.0694 11.1086 10.0594 11.1086C10.0494 11.1086 10.0394 11.1086 10.0294 11.1086C10.0194 11.1086 9.99941 11.1086 9.98941 11.0986C9.95941 11.0986 9.92941 11.0786 9.89941 11.0586C9.83941 11.0286 9.76941 11.0086 9.72941 10.9886C8.93941 10.6486 8.26941 10.0686 7.77941 9.56859C7.28941 9.06859 6.95941 8.59859 6.85941 8.43859C6.85941 8.43859 6.81941 8.35859 6.80941 8.31859C6.80941 8.31859 6.80941 8.29859 6.80941 8.28859C6.80941 8.28859 6.80941 8.28859 6.80941 8.27859C6.80941 8.27859 6.80941 8.27859 6.80941 8.26859C6.79941 8.20859 6.80941 8.14859 6.80941 8.08859C6.82941 8.00859 6.87941 7.94859 6.88941 7.93859C6.90941 7.91859 6.91941 7.89859 6.92941 7.88859C6.94941 7.85859 6.97941 7.83859 6.98941 7.82859C7.04941 7.76859 7.10941 7.68859 7.18941 7.59859C7.18941 7.59859 7.25941 7.50859 7.29941 7.46859C7.37941 7.37859 7.40941 7.31859 7.45941 7.20859L7.48941 7.14859C7.51941 7.09859 7.51941 7.05859 7.50941 7.02859C7.50941 6.98859 7.48941 6.95859 7.46941 6.92859C7.44941 6.87859 7.28941 6.49859 7.13941 6.13859C6.98941 5.76859 6.82941 5.38859 6.79941 5.31859C6.73941 5.17859 6.68941 5.11859 6.65941 5.08859C6.63941 5.06859 6.60941 5.05859 6.56941 5.05859C6.55941 5.05859 6.53941 5.05859 6.47941 5.05859C6.47941 5.05859 6.45941 5.05859 6.44941 5.05859C6.41941 5.05859 6.38941 5.05859 6.34941 5.06859C6.26941 5.07859 6.16941 5.09859 6.06941 5.11859C5.84941 5.16859 5.65941 5.22859 5.57941 5.27859C5.37941 5.40859 4.89941 5.91859 4.89941 6.92859C4.89941 7.80859 5.46941 8.68859 5.74941 9.04859L5.75941 9.06859C5.75941 9.06859 5.75941 9.07859 5.76941 9.08859C5.76941 9.09859 5.77941 9.10859 5.78941 9.11859C6.82941 10.6386 8.09941 11.7286 9.35941 12.2286C10.6294 12.7386 11.1894 12.7786 11.4794 12.7786C11.6094 12.7786 11.7094 12.7786 11.8094 12.7586H11.8794C12.0194 12.7486 12.3094 12.6486 12.6094 12.4486C12.9194 12.2586 13.1294 12.0286 13.1894 11.8486C13.2694 11.6286 13.3194 11.4086 13.3294 11.2286C13.3294 11.1386 13.3294 11.0586 13.3294 11.0086C13.3294 10.9786 13.3294 10.9686 13.3294 10.9586C13.3294 10.9586 13.3294 10.9586 13.2994 10.9286L13.3194 10.8786Z" fill="#8D8D8D"></path>
                                                                    <path d="M8.93 0C4.14 0 0.24 3.87 0.24 8.62C0.24 10.16 0.65 11.66 1.43 12.98C1.49 13.08 1.5 13.2 1.46 13.31L0 17.61L4.5 16.18C4.6 16.15 4.71 16.16 4.81 16.21C6.07 16.88 7.49 17.24 8.92 17.24C13.71 17.24 17.61 13.37 17.61 8.62C17.61 3.87 13.72 0 8.93 0ZM8.93 16.16C7.47 16.16 6.05 15.74 4.82 14.95L2.48 15.69C2.34 15.74 2.18 15.69 2.07 15.59C1.96 15.48 1.93 15.32 1.98 15.18L2.73 12.96C1.82 11.68 1.33 10.18 1.33 8.61C1.33 4.46 4.74 1.08 8.93 1.08C13.12 1.08 16.53 4.46 16.53 8.62C16.53 12.78 13.12 16.16 8.94 16.16H8.93Z" fill="#8D8D8D"></path>
                                                                </svg>

                                                            </i>
                                                            @error('watsapp')
                                                             <span class="error_text">{{ $message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form_row">
                                                    <div class="form_cell w_50">
                                                        <div class="form_field">
                                                            <input type="text" class="floating-input @error('business_name') error_stroke @enderror" name="business_name"
                                                                placeholder="Legal Business Name" />
                                                            <label class="floating-label"><i>Legal Business Name</i></label>
                                                            <i class="field_icon">
                                                                <svg width="23" height="22" viewBox="0 0 23 22"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.7926 9.69335C11.7035 9.68443 11.5965 9.68443 11.4984 9.69335C9.37647 9.62202 7.69141 7.88347 7.69141 5.74371C7.69141 3.55937 9.45671 1.78516 11.65 1.78516C13.8343 1.78516 15.6085 3.55937 15.6085 5.74371C15.5996 7.88347 13.9145 9.62202 11.7926 9.69335Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M7.33499 12.9815C5.1774 14.4258 5.1774 16.7796 7.33499 18.215C9.7868 19.8555 13.8078 19.8555 16.2596 18.215C18.4172 16.7706 18.4172 14.4169 16.2596 12.9815C13.8167 11.3499 9.79571 11.3499 7.33499 12.9815Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            @error('business_name')
                                                             <span class="error_text">{{ $message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form_cell w_50">
                                                        <div class="form_field">
                                                            <input type="text" class="floating-input @error('company_website') error_stroke @enderror" name="company_website"
                                                                placeholder="Company Website" />
                                                            <label class="floating-label"><i>Company Website</i></label>
                                                            <i class="field_icon">
                                                                <svg width="23" height="22" viewBox="0 0 23 22"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.7926 9.69335C11.7035 9.68443 11.5965 9.68443 11.4984 9.69335C9.37647 9.62202 7.69141 7.88347 7.69141 5.74371C7.69141 3.55937 9.45671 1.78516 11.65 1.78516C13.8343 1.78516 15.6085 3.55937 15.6085 5.74371C15.5996 7.88347 13.9145 9.62202 11.7926 9.69335Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M7.33499 12.9815C5.1774 14.4258 5.1774 16.7796 7.33499 18.215C9.7868 19.8555 13.8078 19.8555 16.2596 18.215C18.4172 16.7706 18.4172 14.4169 16.2596 12.9815C13.8167 11.3499 9.79571 11.3499 7.33499 12.9815Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            @error('company_website')
                                                             <span class="error_text">{{ $message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form_row">
                                                    <div class="form_cell w_50">
                                                        <div class="form_field">
                                                            <input type="text" class="floating-input @error('position') error_stroke @enderror" name="position"
                                                                placeholder="Position/Designation" />
                                                            <label class="floating-label"><i>Position/Designation</i></label>
                                                            <i class="field_icon">
                                                                <svg width="23" height="22" viewBox="0 0 23 22"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.7926 9.69335C11.7035 9.68443 11.5965 9.68443 11.4984 9.69335C9.37647 9.62202 7.69141 7.88347 7.69141 5.74371C7.69141 3.55937 9.45671 1.78516 11.65 1.78516C13.8343 1.78516 15.6085 3.55937 15.6085 5.74371C15.5996 7.88347 13.9145 9.62202 11.7926 9.69335Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M7.33499 12.9815C5.1774 14.4258 5.1774 16.7796 7.33499 18.215C9.7868 19.8555 13.8078 19.8555 16.2596 18.215C18.4172 16.7706 18.4172 14.4169 16.2596 12.9815C13.8167 11.3499 9.79571 11.3499 7.33499 12.9815Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            @error('position')
                                                             <span class="error_text">{{ $message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form_cell w_50">
                                                        <div class="form_field">
                                                            <input type="text" class="floating-input @error('country_of_registration') error_stroke @enderror" name="country_of_registration"
                                                                placeholder="Country of Registration" />
                                                            <label class="floating-label"><i>Country of Registration</i></label>
                                                            <i class="field_icon">
                                                                <svg width="23" height="22" viewBox="0 0 23 22"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11.7926 9.69335C11.7035 9.68443 11.5965 9.68443 11.4984 9.69335C9.37647 9.62202 7.69141 7.88347 7.69141 5.74371C7.69141 3.55937 9.45671 1.78516 11.65 1.78516C13.8343 1.78516 15.6085 3.55937 15.6085 5.74371C15.5996 7.88347 13.9145 9.62202 11.7926 9.69335Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M7.33499 12.9815C5.1774 14.4258 5.1774 16.7796 7.33499 18.215C9.7868 19.8555 13.8078 19.8555 16.2596 18.215C18.4172 16.7706 18.4172 14.4169 16.2596 12.9815C13.8167 11.3499 9.79571 11.3499 7.33499 12.9815Z"
                                                                        stroke="#8D8D8D" stroke-width="1.33735"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </i>
                                                            @error('country_of_registration')
                                                             <span class="error_text">{{ $message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form_row">
                                                    <div class="form_cell">
                                                        <div class="form_field">
                                                            <input type="text" class="floating-input @error('address') error_stroke @enderror" name="address"
                                                                placeholder="Head Office Address" />
                                                            <label class="floating-label"><i>Head Office Address</i></label>
                                                            <i class="field_icon">
                                                                <svg width="21" height="21" viewBox="0 0 21 21"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M10.4995 11.7491C12.0073 11.7491 13.2295 10.5268 13.2295 9.01906C13.2295 7.51133 12.0073 6.28906 10.4995 6.28906C8.99179 6.28906 7.76953 7.51133 7.76953 9.01906C7.76953 10.5268 8.99179 11.7491 10.4995 11.7491Z"
                                                                        stroke="#8D8D8D"
                                                                        stroke-width="1.3125" />
                                                                    <path
                                                                        d="M3.16749 7.42875C4.89124 -0.148748 16.1175 -0.139998 17.8325 7.4375C18.8387 11.8825 16.0737 15.645 13.65 17.9725C11.8912 19.67 9.10874 19.67 7.34124 17.9725C4.92624 15.645 2.16124 11.8738 3.16749 7.42875Z"
                                                                        stroke="#8D8D8D"
                                                                        stroke-width="1.3125" />
                                                                </svg>
                                                            </i>
                                                            @error('address')
                                                             <span class="error_text">{{ $message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form_row">
                                                    <div class="form_cell w_50">
                                                        <div class="formSelect form-floating">
                                                            <select name="anticipated_booking" id="SelectCity"
                                                                class="selectCity @error('emirates') error_stroke @enderror" data-placeholder="Anticipated Booking Volume (Monthly)">
                                                                <option value="" disabled selected>Anticipated Booking
                                                                </option>
                                                                <option value="0-100">0-100</option>
                                                                <option value="100-500">100–500</option>
                                                                <option value="500-1000">500–1000</option>
                                                                <option value="1000">1000</option>
                                                            </select>
                                                            <label class="floating-label"
                                                                for="emirates"><i>Anticipated Booking Volume (Monthly)</i></label>
                                                            <i class="field_icon">
                                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                                    fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M18.3327 7.50156V12.5016C18.3327 14.5849 17.916 16.0432 16.9827 16.9849L11.666 11.6682L18.1077 5.22656C18.2577 5.8849 18.3327 6.63489 18.3327 7.50156Z"
                                                                        stroke="#8D8D8D" stroke-width="1.25"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M18.1077 5.22631L5.22434 18.1096C2.71601 17.5346 1.66602 15.8013 1.66602 12.5013V7.5013C1.66602 3.33464 3.33268 1.66797 7.49935 1.66797H12.4993C15.7993 1.66797 17.5327 2.71797 18.1077 5.22631Z"
                                                                        stroke="#8D8D8D" stroke-width="1.25"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M16.983 16.9846C16.0413 17.918 14.583 18.3346 12.4996 18.3346H7.49962C6.63295 18.3346 5.88294 18.2596 5.22461 18.1096L11.6663 11.668L16.983 16.9846Z"
                                                                        stroke="#8D8D8D" stroke-width="1.25"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M5.19973 6.64766C5.7664 4.20599 9.43307 4.20599 9.99974 6.64766C10.3247 8.08099 9.42473 9.29766 8.63306 10.0477C8.05806 10.5977 7.14974 10.5977 6.56641 10.0477C5.77474 9.29766 4.8664 8.08099 5.19973 6.64766Z"
                                                                        stroke="#8D8D8D" stroke-width="1.25" />
                                                                    <path d="M7.57811 7.2487H7.58559"
                                                                        stroke="#8D8D8D" stroke-width="1.66667"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>

                                                            </i>
                                                            @error('anticipated_booking')
                                                             <span class="error_text">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form_cell w_50">
                                                        <div class="form_field">
                                                            <input type="text" name="proposed_date" id="" class="floating-input datepicker @error('proposed_date') error_stroke @enderror" value="">
                                                            
                                                            <label class="floating-label"
                                                                for="proposed_date" style="line-height: 6px;    font-size: 9pt;margin-top: -2px;"><i>Proposed Start Date for Collaboration</i></label>
                                                                <i class="field_icon"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8 2V5" stroke="#8D8D8D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M16 2V5" stroke="#8D8D8D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M3.5 9.08984H20.5" stroke="#8D8D8D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="#8D8D8D" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M11.9955 13.6992H12.0045" stroke="#8D8D8D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M8.29431 13.6992H8.30329" stroke="#8D8D8D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M8.29431 16.6992H8.30329" stroke="#8D8D8D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                            </i>
                                                            @error('are_you')
                                                            <span class="error_text">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form_row">
                                                    <div class="form_cell">
                                                        <div class="formSelect form_field" style="padding-top: 10px;">
                                                            <input type="file" class="floating-input" name="files_upload[]"  accept="image/*, .doc, .docx, .pdf, .txt, .rtf, .ppt, .pptx, .xls, .xlsx" multiple>
                                                            <label class="floating-label"><i>Company Profile (Please press the CTRL button to select multiple files) </i></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form_extrasNotes">
                                                    <div class="form_row">
                                                        <div class="form_cell">
                                                            <div class="form_field">
                                                                <textarea
                                                                    class="floating-input fieldHasNotIcon floating-textarea" name="message"
                                                                    placeholder="Please describe your specific requirements or operational expectations from C2C Ride"></textarea>
                                                                <label
                                                                    class="floating-label"><i>Please describe your specific requirements or operational expectations from C2C Ride</i></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="form_row p_sendBtnWidth pt_20 animated fadeInUpShort slow delay-500">
                                                    <div class="form_cell padb-0">
                                                        {{-- <a type="submit"
                                                            class="all_btn btn_large light_green_btn w_100 justify_content_center uppercase">
                                                            <span class="mr_auto">Send</span>
                                                        </a> --}}
                                                        <button type="submit" class="all_btn btn-large light_green_btn w_100 justify_content_center uppercase">Send</button>
                                                    </div>
                                                </div>
                                               </form>
                                               <div class="msg" style="margin-top: 30px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bp_faqs_main">
                            <div class="autoContent">
                                <div class="bp_faqs__inner">
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
                                                            <strong>(Q) What are the requirements to join the C2C business Program?</strong>
                                                            <span class="plus_icon"></span>
                                                        </div>
                                                        <div class="accordion_body" style="display: block;">
                                                            <div class="accordion_content">
                                                                <p>A valid travel agency license and business registration.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion_item">
                                                        <div class="accordion_header">
                                                            <strong>(Q) How soon can we start offering services?</strong>
                                                            <span class="plus_icon"></span>
                                                        </div>
                                                        <div class="accordion_body">
                                                            <div class="accordion_content">
                                                                <p>Within 24 hours after onboarding and approval.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion_item">
                                                        <div class="accordion_header">
                                                            <strong>(Q) Can we manage bookings on our own schedule?</strong>
                                                            <span class="plus_icon"></span>
                                                        </div>
                                                        <div class="accordion_body">
                                                            <div class="accordion_content">
                                                                <p>Yes, full flexibility to manage rides for your clients.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion_item">
                                                        <div class="accordion_header">
                                                            <strong>(Q) Do clients need to install an app?</strong>
                                                            <span class="plus_icon"></span>
                                                        </div>
                                                        <div class="accordion_body">
                                                            <div class="accordion_content">
                                                                <p>Bookings are made easily through our web platform.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion_item">
                                                        <div class="accordion_header">
                                                            <strong>(Q) How is commission calculated?</strong>
                                                            <span class="plus_icon"></span>
                                                        </div>
                                                        <div class="accordion_body">
                                                            <div class="accordion_content">
                                                                <p>Based on each completed booking through your agency.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion_item">
                                                        <div class="accordion_header">
                                                            <strong>(Q)  Is there support for partner agencies?</strong>
                                                            <span class="plus_icon"></span>
                                                        </div>
                                                        <div class="accordion_body">
                                                            <div class="accordion_content">
                                                                <p>Yes, we offer dedicated assistance and training.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion_item">
                                                        <div class="accordion_header">
                                                            <strong>(Q) How do we track bookings and earnings?</strong>
                                                            <span class="plus_icon"></span>
                                                        </div>
                                                        <div class="accordion_body">
                                                            <div class="accordion_content">
                                                                <p>Via your partner dashboard with real-time reports.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ovq_right">
                                                <div class="customer_say">
                                                    <div class="headlines customer_sayBorder">
                                                        <h2 class="animated fadeInUpShort slow delay-250">Make your travel journey seamless with C2C
                                                        </h2>
                                                        <p class="animated fadeInUpShort slow delay-500">Partner with us to offer smooth travel solutions and boost your agency’s value and customer satisfaction. </p>
                                                    </div>
                                                    <div class="customer_say_img">
                                                        <img src="{{ asset('front/images/customer_say_img.png') }}" alt="#">
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

@section('script')
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
    $(document).on('submit','.become-partner-form',function(e){
        e.preventDefault();
        var url = $(this).attr("action"),
            form = $(this),
            form_data = new FormData(this);
        $(".all_btn").addClass('disabled-button');

         grecaptcha.ready(function () {
            grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", { action: "submit" }).then(function (token) {

                $.ajax({
                    url: url,
                    type: "POST",
                    data: form_data,
                    contentType: false,
                    cashe: false,
                    processData: false,
                    dataType: "json",
                    success: function (html) {
                    if (html.success) {
                        // toastr.success(html.message);
                        $('.msg').html('<br><div class="alert alert-success">'+html.message+"</div>");
                    } else {
                        // toastr.error(html.message);
                        $('.msg').html('<br><div class="alert alert-danger">'+html.message+"</div>");
                    }
                    $(".all_btn").removeClass('disabled-button');
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status === 419) {
                        location.reload(true);
                        } else if(xhr.status === 422) {
                        
                       // alert("Error: " + xhr.responseText);
                            var error_text = "";
                            $.each(xhr.responseJSON.errors, function (index, value) {
                                // $('.errorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
                                error_text += value+"<br>";
                            });
                            $('.msg').html('<br><div class="alert alert-danger">'+error_text+"</div>");
                        }else{
                            alert("Error: " + xhr.responseText);
                        }

                        $(".all_btn").removeClass('disabled-button');
                    },
                });

            }); 
        });
        
    })
</script>
@endsection