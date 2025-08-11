@extends('front.layouts.master')
@section('meta')
 <meta name="description" content="Find answers to common questions about our chauffeur services, booking process and more." />
@endsection
@section('title')
    FAQs | C2C Ride Frequently Asked Questions
@endsection
@section('content')
  <div class="content">
    <div class="gradiantParent">
        <div class="gradiantChild">
            <div class="faqs_main">
                <div class="autoContent">
                    <div class="faqs__inner">
                        <div class="faqs_heading animatedParent animateOnce ">
                            <h2 class="animated fadeInUpShort slow">Frequently asked questions</h2>
                            <p class="animated fadeInUpShort slow delay-250">and the answers to them, of course</p>
                        </div>
                        <div class="faqs_search animatedParent animateOnce">
                            <div class="form_field animated fadeInUpShort slow delay-250 has_white_fields ">
                                <input type="text" class="floating-input" placeholder="Search" />
                                <i class="field_icon">
                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.64518 14.8763C12.3616 14.8763 15.3743 11.8636 15.3743 8.14714C15.3743 4.43072 12.3616 1.41797 8.64518 1.41797C4.92877 1.41797 1.91602 4.43072 1.91602 8.14714C1.91602 11.8636 4.92877 14.8763 8.64518 14.8763Z"
                                            stroke="#8D8D8D" stroke-width="1.27" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M16.0827 15.5846L14.666 14.168" stroke="#8D8D8D"
                                            stroke-width="1.27" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </i>
                            </div>
                        </div>
                        <div class="faqs_navBar_main animatedParent animateOnce">
                            <div class="faqs_navBar animated fadeInUpShort slow">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" class="faqs_link" data-rel=".showFaq1">
                                            <h4>Basic questions</h4>
                                            <i>
                                                <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.31 12.625L10.9988 17.9362L5.6875 12.625"
                                                        stroke="#333333" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11 3.0625V17.7887" stroke="#333333"
                                                        stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="faqs_link" data-rel=".showFaq2">
                                            <h4>How to use C2CRide?</h4>
                                            <i>
                                                <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.31 12.625L10.9988 17.9362L5.6875 12.625"
                                                        stroke="#333333" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11 3.0625V17.7887" stroke="#333333"
                                                        stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="faqs_link" data-rel=".showFaq3">
                                            <h4>Features</h4>
                                            <i>
                                                <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.31 12.625L10.9988 17.9362L5.6875 12.625"
                                                        stroke="#333333" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11 3.0625V17.7887" stroke="#333333"
                                                        stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="faqs_link" data-rel=".showFaq4">
                                            <h4>Security questions</h4>
                                            <i>
                                                <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16.31 12.625L10.9988 17.9362L5.6875 12.625"
                                                        stroke="#333333" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M11 3.0625V17.7887" stroke="#333333"
                                                        stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="faqs_content">
                            <ul>
                                <li class="animatedParent animateOnce">
                                    <div class="faqs_detail animated fadeInUpShort slow showFaq showFaq1">
                                        <div class="faqs_detail_left">
                                            <h4>Basic questions</h4>
                                        </div>
                                        <div class="faqs_detail_right">
                                            <div class="accordion">
                                                <div class="accordion_item active">
                                                    <div class="accordion_header">
                                                        <strong>(Q) What is C2CRide?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body" style="display: block;">
                                                        <div class="accordion_content">
                                                            <p>C2CRide is a premium transportation service offering rides, rentals, and tour options across the UAE. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Which cities does C2CRide operate in?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>We operate across all seven emirates, ensuring a seamless travel experience anywhere in the UAE.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Do you provide airport transfer services?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Yes, we specialize in reliable and luxurious airport transfers.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Can I book a ride for someone else?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Absolutely! You can book a ride for friends, family, or colleagues using their contact details.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Are your services available 24/7?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Yes, C2CRide is available round the clock for your convenience.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Do you offer group or family transportation options?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Yes, we have spacious vehicles suitable for groups and families.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) What types of vehicles are available?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>We offer luxury sedans, SUVs, and more to suit various travel needs.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="animatedParent animateOnce">
                                    <div class="faqs_detail showFaq showFaq2 animated fadeInUpShort slow ">
                                        <div class="faqs_detail_left">
                                            <h4>How to Use C2CRide?</h4>
                                        </div>
                                        <div class="faqs_detail_right">
                                            <div class="accordion">
                                                <div class="accordion_item active">
                                                    <div class="accordion_header">
                                                        <strong>(Q) How do I book a ride?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body" style="display: block;">
                                                        <div class="accordion_content">
                                                            <p>Download our app, enter your pickup and drop-off locations, and choose your preferred vehicle.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Can I schedule a ride in advance?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Yes, you can schedule rides for any time or date using the "Book Later" option.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) What payment methods do you accept?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>We accept card payments, online transactions, and some cash options depending on the location.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) How can I track my ride?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>After booking, you can track your driver in real-time through the app.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Is there a cancellation fee?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Cancellations within a specific timeframe may incur a fee. Details are available in the app.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) How do I access my ride history?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>You can find all past bookings under the "Ride History" section in your app profile.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) What if my driver doesn't show up?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Contact our support team via the app for immediate assistance.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="animatedParent animateOnce">
                                    <div class="faqs_detail showFaq showFaq3 animated fadeInUpShort slow ">
                                        <div class="faqs_detail_left">
                                            <h4>Features</h4>
                                        </div>
                                        <div class="faqs_detail_right">
                                            <div class="accordion">
                                                <div class="accordion_item active">
                                                    <div class="accordion_header">
                                                        <strong>(Q) What makes C2CRide different from other services?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body" style="display: block;">
                                                        <div class="accordion_content">
                                                            <p>We offer luxury fleets, professional drivers, and customizable packages for an elevated travel experience.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Do you provide special packages for tourists?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Yes, we offer curated tour packages to explore popular attractions across the UAE.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Is there Wi-Fi available in your cars?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Yes, most of our luxury vehicles are equipped with free Wi-Fi for your convenience.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Can I choose my preferred car model?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Yes, you can select from our available fleet during the booking process.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Are your drivers trained for high standards?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>All our drivers are professional, courteous, and highly experienced.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Do you provide multilingual support?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Yes, our app and customer service support multiple languages.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Is the app user-friendly?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Absolutely! Our app is designed for simplicity, ensuring a smooth booking experience.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="animatedParent animateOnce">
                                    <div class="faqs_detail showFaq showFaq4 animated fadeInUpShort slow ">
                                        <div class="faqs_detail_left">
                                            <h4>Security questions</h4>
                                        </div>
                                        <div class="faqs_detail_right">
                                            <div class="accordion">
                                                <div class="accordion_item active">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Are your drivers background-checked?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body" style="display: block;">
                                                        <div class="accordion_content">
                                                            <p>Yes, all our drivers undergo thorough background checks and regular training sessions.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) How secure is my payment information?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>We use advanced encryption to ensure your payment details are 100% secure.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) What measures are in place for customer safety?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Our vehicles are regularly sanitized, and safety protocols are strictly followed.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Can I share my ride details with someone?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Yes, the app allows you to share your ride information in real-time with friends or family.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) What should I do in case of an emergency during the ride?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Use the emergency button in the app or call our 24/7 support team for immediate help.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Is my location tracked during the ride?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>Yes, your location is tracked to ensure your safety until you reach your destination.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion_item">
                                                    <div class="accordion_header">
                                                        <strong>(Q) Do you save personal data?</strong>
                                                        <span class="plus_icon"></span>
                                                    </div>
                                                    <div class="accordion_body">
                                                        <div class="accordion_content">
                                                            <p>We only retain essential data required for bookings, following strict privacy policies.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection
@section('script')
    
@endsection