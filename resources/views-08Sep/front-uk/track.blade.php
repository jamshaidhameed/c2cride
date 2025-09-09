@extends('front.layouts.master')
@section('title')
    C2CRides - Track Ride
@endsection
@section('style')
    <style>
        .track-form {
            min-width: 450px;
            right: -100px;
            padding: 1.875em;
            margin-left: 35em;
            margin-right: 31em;
        }
        @media (max-width: 768px) {

            .track-form {
                min-width: 369px;
                right: -100px;
                padding: 1.875em;
                margin-left: 0;
                margin-right: 10em;
            }
        }
    </style>
@endsection
@section('content')
    <div class="content">
    <div class="gradiantParent">
        <div class="gradiantChild">
            <div class="support_main">
                <div class="autoContent">
                    <div class="support_inner">
                        <div class="headlines animatedParent animateOnce">
                            <h2 class="animated fadeInUpShort slow">Track your Ride</h2>
                            {{-- <p class="animated fadeInUpShort slow delay-500">We are here to help you out !!!</p> --}}
                        </div>

                        <div class="support_contect">
                            <div class="bp_details_content">
                                <div class="hw_content_list animatedParent animateOnce">
                                    {{-- <ul>
                                        <li class="animated fadeInUpShort slow">
                                            <a href="{{ route('faqs') }}">
                                                <div class="hw_box">
                                                    <div class="hw_box_img">
                                                        <svg width="77" height="77" viewBox="0 0 77 77" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M32.9791 56.9765C33.0837 57.3887 33.0535 57.7526 32.8906 58.0663C34.0166 67.4703 42.0514 75.6559 51.5117 76.9488C52.5774 77.1016 57.0813 76.9065 59.4057 76.4199C62.7897 75.7102 64.917 73.8442 68.6388 74.3127C70.2333 74.5138 72.5235 75.871 73.931 75.9515C75.0811 76.0178 75.8009 75.1029 75.626 73.989C75.3867 72.4649 74.2286 70.5588 74.0235 68.9281C73.5449 65.1279 75.6421 62.5321 76.2594 58.9269C79 42.9619 64.2374 29.6189 48.6143 34.1008C41.3295 36.1919 35.3155 42.411 33.5542 49.7983C32.9308 52.4082 33.0716 54.3686 32.9791 56.9765Z"
                                                                fill="#16293A" />
                                                            <path
                                                                d="M68.5581 38.9802C66.7907 53.7347 54.1856 66.5751 39.3426 68.6039C37.3641 68.8833 30.6041 68.5375 26.9587 67.7734C21.6485 66.6595 18.3127 63.7319 12.4737 64.4658C9.97236 64.7795 6.37723 66.9109 4.1715 67.0375C2.3679 67.1401 1.23789 65.7064 1.51335 63.9591C1.88935 61.5664 3.70501 58.5765 4.02673 56.0189C4.77672 50.0572 1.48922 45.9835 0.518057 40.3274C-3.78082 15.2821 19.3784 -5.65527 43.8888 1.37816C55.3156 4.65761 64.7518 14.4155 67.5165 26.0072C68.4937 30.101 68.8878 35.6887 68.5561 38.9802H68.5581Z"
                                                                fill="#0FA85B" />
                                                            <path
                                                                d="M30.086 21.256C27.8561 23.6045 27.83 30.0407 23.1832 28.3155C18.3696 26.528 21.9829 19.7801 24.5827 17.4618C31.5638 11.2407 46.7305 13.3057 47.6836 23.9222C48.3029 30.8329 41.6676 33.1473 38.2635 37.5768C36.3674 40.0439 37.5778 44.5781 33.1503 44.0915C29.3802 43.6773 30.0618 38.4655 31.2461 35.9884C33.0035 32.3168 39.6931 28.784 40.2199 25.4604C41.0925 19.9551 33.3071 17.8659 30.086 21.256Z"
                                                                fill="white" />
                                                            <path
                                                                d="M32.9795 46.5657C36.1745 46.0147 38.2214 48.3331 37.8575 51.4436C37.5639 53.965 34.3267 55.1674 32.0888 54.1963C28.6163 52.6882 29.3019 47.203 32.9775 46.5677L32.9795 46.5657Z"
                                                                fill="white" />
                                                        </svg>
                                                    </div>
                                                    <div class="hw_box_data">
                                                        <h4>FAQs</h4> 
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul> --}}
                                    <form action="{{ route('tracking.post') }}" class="track-form" method="POST">
                                        @csrf
                                        <div class="form_field">
                                        <input type="text" name="trackBooking_ref" class="floating-input trackBooking_ref" placeholder="enter your booking no">
                                        <label class="floating-label"><i>Booking Number</i></label>
                                        <i class="field_icon"><svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.60773 13H5.26107C4.84773 13 4.48107 12.9867 4.1544 12.94C2.40107 12.7467 1.92773 11.92 1.92773 9.66667V6.33333C1.92773 4.08 2.40107 3.25333 4.1544 3.06C4.48107 3.01333 4.84773 3 5.26107 3H7.56773" stroke="#8D8D8D" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M10.2744 3H11.2611C11.6744 3 12.0411 3.01333 12.3677 3.06C14.1211 3.25333 14.5944 4.08 14.5944 6.33333V9.66667C14.5944 11.92 14.1211 12.7467 12.3677 12.94C12.0411 12.9867 11.6744 13 11.2611 13H10.2744" stroke="#8D8D8D" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M10.2612 1.33203V14.6654" stroke="#8D8D8D" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M5.59473 5.66797V10.3346" stroke="#8D8D8D" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>

                                        </i>
                                     </div> <br>
                                     <button type="submit" class="all_btn  btn_large flexible icon_btn justify_content_between uppercase" style="width:100%;"><span class="mr_auto">Track</span></button>
                                    </form>
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