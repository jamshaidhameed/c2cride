<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>C2CRides</title>

    <!-- google fonts sora -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- end google fonts --> 

    <!-- Favicon -->

    <link rel="icon" type="image/png" href="{{ asset('front/images/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('front/images/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('front/images/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/images/favicon/apple-touch-icon.png') }}" />
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
    <link rel="manifest" href="{{ asset('front/images/favicon/site.webmanifest') }}" />
    <!--  -->

    <!-- slider css -->
    <link rel="stylesheet" href="{{ asset('front/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/select2.min.css') }}">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('front/css/animations.css') }}">
    <script type="text/javascript" src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <!-- slider js -->

    <script type="text/javascript" src="{{ asset('front/js/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/customTimePicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/script.js') }}"></script>

<style>
    .success-text { padding-bottom: 0.938em; text-align: center; background-color:#99CF63;transition: all 0.3s ;}
</style>
</head>

<body class="texture_dark">
    <div class="wrapper">

        <div class="login_signup">
            <div class="autoContent">
                <div class="login_signup_inner">
                    <div class="login_signup_cross">
                        <a href="{{ url("/") }}"> 
                            <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.4999 28.4154C22.6041 28.4154 28.4166 22.6029 28.4166 15.4987C28.4166 8.39453 22.6041 2.58203 15.4999 2.58203C8.39575 2.58203 2.58325 8.39453 2.58325 15.4987C2.58325 22.6029 8.39575 28.4154 15.4999 28.4154Z"
                                    stroke="white" stroke-width="1.9375" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M11.8445 19.1546L19.1553 11.8438" stroke="white" stroke-width="1.9375"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M19.1553 19.1546L11.8445 11.8438" stroke="white" stroke-width="1.9375"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg> 
                        </a>
                    </div>
                    <div class="login_signup_left">
                        <div class="login_signup_left_content">
                            <a href="{{ route('register') }}" class="header_logo">
                                <img src="{{ asset('front/images/login_signup_logo.svg') }}" alt="#">
                            </a>
                            <h2>Welcome To C2CRides</h2>
                            <span>Your Journey Starts Here!</span>
                            <p>
                                Log in now to access personalized features, manage bookings, and enjoy a hassle-free ride every time.
                            </p>
                            <p>Don't have an account? No problem - sign up in seconds or book as a guest to get started right away. At C2C Ride, your comfort and convenience are our top priorities.</p>
                        </div>
                    </div>
                    <div class="login_signup_right">
                        <div class="login_signup_box">
                            <div class="login_signup_heading">
                                <p>Reset Password</p>
                            </div>
                            <div class="login_signup_form">
                                 @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                 {{-- <form method="POST" action="{{ route('password.email') }}" id="myform"> --}}
                                    <form method="POST" action="{{ route('password.reset.post') }}" id="myform">
                                    @csrf

                                    <div class="form_row">
                                    <div class="form_cell">
                                        <div class="form_field">
                                            <input type="email" name="email" class="floating-input @error('email') error_stroke @enderror" placeholder="Enter Your Email" />
                                            <label class="floating-label"><i>Email</i></label>
                                            <i class="field_icon">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.598 18.0263H6.09908C3.5494 18.0263 1.84961 16.7515 1.84961 13.7769V7.8276C1.84961 4.85297 3.5494 3.57812 6.09908 3.57812H14.598C17.1477 3.57812 18.8475 4.85297 18.8475 7.8276V13.7769C18.8475 16.7515 17.1477 18.0263 14.598 18.0263Z"
                                                        stroke="#8D8D8D" stroke-width="1.27484" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M14.5986 8.25L11.9384 10.3747C11.063 11.0716 9.62667 11.0716 8.75128 10.3747L6.09961 8.25"
                                                        stroke="#8D8D8D" stroke-width="1.27484" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            @error('email')
                                                <span class="error_text" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form_field">
                                             <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse">

                                            @error('g-recaptcha-response')
                                                <div class="error_stroke">Captcha is Required</div>
                                            @enderror
                                        </div>
                                       
                                    </div>
                                        </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit"
                                            class="all_btn  btn_large flexible icon_btn justify_content_between uppercase trackBooking_srch_btn" style="padding: 0.75em 0.75em;font-size: var(--fs16);line-height: 1.6em;align-items: center;cursor: pointer;gap: 6px;width: 99%;">
                                            <span class="mr_auto">Send Password Reset Link</span>
                                        </button>
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

</body>

<script type="text/javascript" src="{{ asset('front/js/css3-animate-it.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/SmoothScroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery-ui.min.js') }}"></script>

{!! NoCaptcha::renderJs() !!}

<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
{{-- <script>
    grecaptcha.ready(function() {
        grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", { action: 'submit' }).then(function(token) {
            document.getElementById('recaptchaResponse').value = token;
        });
    });
</script> --}}
<script>
    document.getElementById('myform').addEventListener('submit', function(event) {
        event.preventDefault();

        grecaptcha.ready(function() {
            grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", { action: 'submit' }).then(function(token) {
                document.getElementById('recaptchaResponse').value = token;
                document.getElementById('myform').submit(); // Submit after token is set
            });
        });
    });
</script>

</html>