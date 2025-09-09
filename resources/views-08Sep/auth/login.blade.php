<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta  name="description" content="Log in to your C2C Ride account to view bookings and manage your profile." />
    <title>Login | Access Your C2C Ride Account</title>

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

    <link rel="stylesheet" href="{{ asset("assets/css/font-awesome/css/font-awesome.css") }}">
    <script type="text/javascript" src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <!-- slider js -->

    <script type="text/javascript" src="{{ asset('front/js/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/customTimePicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/script.js') }}"></script>
    <style>
        .password-wrapper {
            position: relative;
             display: flex;
            align-items: center;
            
            }

            .password-wrapper input {
                flex: 1;
            /* padding-right: 10px; */
            /* width: 250px; */
            }

            .toggle-eye {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            }
            .password-view-icon {
                margin-left: -15px;
            }
    </style>

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
                            <h2>Welcome To C2CRide</h2>
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
                                <h4>Login</h4>
                                <p>Login to access your c2cride account.</p>
                            </div>
                            <div class="login_signup_form">
                                @if(session()->has('success'))
                                <div class="alert alert-success mt-6">
                                    {{ session()->get('success')}}
                                </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
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
                                    </div>
                                </div>
                                <div class="form_row">
                                    <div class="form_cell">
                                        <div class="form_field">
                                            <div class="password-wrapper">
                                                <input type="password" name="password" class="floating-input @error('password') error_stroke @enderror"
                                                placeholder="Enter Your Password" />

                                                 <div class="password-view-icon"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>

                                            </div>
                                            <label class="floating-label"><i>Password</i></label>
                                            <i class="field_icon">
                                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.1671 11.8202C14.5363 13.4431 12.2008 13.9418 10.1504 13.3006L6.42168 17.0214C6.15251 17.2985 5.6221 17.4647 5.2421 17.4093L3.51626 17.1718C2.94626 17.0927 2.41585 16.5543 2.32876 15.9843L2.09126 14.2585C2.03585 13.8785 2.21793 13.3481 2.47918 13.0789L6.20001 9.35807C5.56668 7.29974 6.05751 4.96432 7.68835 3.34141C10.0238 1.00599 13.8158 1.00599 16.1592 3.34141C18.5025 5.67682 18.5025 9.48474 16.1671 11.8202Z"
                                                        stroke="#8D8D8D" stroke-width="1.1875" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.95459 13.8477L7.77542 15.6685" stroke="#8D8D8D"
                                                        stroke-width="1.1875" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M11.979 8.70703C12.6348 8.70703 13.1665 8.17537 13.1665 7.51953C13.1665 6.86369 12.6348 6.33203 11.979 6.33203C11.3232 6.33203 10.7915 6.86369 10.7915 7.51953C10.7915 8.17537 11.3232 8.70703 11.979 8.70703Z"
                                                        stroke="#8D8D8D" stroke-width="1.1875" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            @error('password')
                                                <span class="error_text" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="rememberMe_text">
                                    <div class="checkbox-wrapper">
                                        <label class="checkbox">
                                            <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                            <span class="checkbox__symbol">
                                                <svg aria-hidden="true" class="icon-checkbox" width="28px" height="28px"
                                                    viewBox="0 0 28 28" version="1" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 14l8 7L24 7"></path>
                                                </svg>
                                            </span>
                                            <p class="checkbox__textwrapper">Remember me</p>
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="forgat_passward" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    
                                </div>
                                <div class="form_row">
                                    <div class="form_cell padb-0">
                                        <button type="submit"
                                            class="all_btn  btn_large flexible icon_btn justify_content_between uppercase trackBooking_srch_btn" style="padding: 0.75em 0.75em;font-size: var(--fs16);line-height: 1.6em;align-items: center;cursor: pointer;gap: 6px;width: 99%;">
                                            <span class="mr_auto">Login</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="DoYouHaveAcc">
                                    <p>Don't have an account? <a href="{{ route('register') }}"> Sign up</a></p>
                                </div>

                                <div class="or_text">
                                    <span>Or</span>
                                </div>

                                <div class="form_row">
                                    <div class="form_cell">
                                        <a href="{{ route('guest.booking') }}"
                                            class="all_btn outlined_green_btn btn_large flexible icon_btn justify_content_between uppercase search_return_plan_btn">
                                            <i>
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.1464 9.96286C11.0547 9.9537 10.9447 9.9537 10.8439 9.96286C8.66219 9.88953 6.92969 8.10203 6.92969 5.90203C6.92969 3.6562 8.74469 1.83203 10.9997 1.83203C13.2455 1.83203 15.0697 3.6562 15.0697 5.90203C15.0605 8.10203 13.328 9.88953 11.1464 9.96286Z"
                                                        stroke="#0FA85B" stroke-width="1.375" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M6.56316 13.348C4.34483 14.833 4.34483 17.253 6.56316 18.7288C9.084 20.4155 13.2182 20.4155 15.739 18.7288C17.9573 17.2438 17.9573 14.8238 15.739 13.348C13.2273 11.6705 9.09316 11.6705 6.56316 13.348Z"
                                                        stroke="#0FA85B" stroke-width="1.375" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <span class="mr_auto">Book as a Guest</span>
                                        </a>
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
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjb2hexnJxmJNktoaBX5cdvk12GKdzwMY&libraries=places&callback=initAutocomplete"
    async defer></script>
<script type="text/javascript" src="{{ asset('front/js/css3-animate-it.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/SmoothScroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery-ui.min.js') }}"></script>



<script>
    function initAutocomplete() {
        // Loop through all input fields with the 'autocomplete-input' class
        $('.autocomplete-input').each(function () {
            // Create a new instance of AutocompleteSearch for each input field
            new AutocompleteSearch($(this));
        });
    }
</script>

<script>
    $(document).on("click", ".fa-eye-slash", function() {
        $(this).removeClass('fa-eye-slash')
        $(this).addClass('fa-eye')
        $(this).parent().prev().attr('type', 'text')
    });

    $(document).on("click", ".fa-eye", function() {
        $(this).removeClass('fa-eye')
        $(this).addClass('fa-eye-slash')
        $(this).parent().prev().attr('type', 'password')
    });
</script>


</html>