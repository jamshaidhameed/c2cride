<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Log in to your C2C Ride account to view bookings and manage your profile." />
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

    <link rel="stylesheet" href="css/select2.min.css') }}">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('front/css/animations.css') }}">
    <script type="text/javascript" src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <!-- slider js -->

    <script type="text/javascript" src="{{ asset('front/js/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/customTimePicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/script.js') }}"></script>


</head>

<body class="texture_dark">
    <div class="wrapper">

        <div class="login_signup register_main">
            <div class="autoContent">
                <div class="login_signup_inner">
                    <div class="login_signup_cross">
                        <a href="{{ route('login') }}">
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
                            <a href="{{ route('front.index') }}" class="header_logo">
                                <img src="{{ asset('front/images/login_signup_logo.svg') }}" alt="#">
                            </a>
                            <h2>Join C2C Ride</h2>
                            <!-- <span>Your Journey Starts Here!</span> -->
                            <p>
                                Welcome to a world of stress-free and luxurious travel. Sign up now to unlock exclusive benefits, manage your bookings with ease, and enjoy transparent pricing with no hidden charges. Whether it's for daily commutes or special occasions, we're here to make every journey memorable.
                            </p>
                            <p>Creating your account is quick and simple. Just fill in your details, and you're ready to experience the comfort and reliability of C2C Ride. Your next hassle-free ride is just a step away!</p>
                        </div>
                    </div>
                    <div class="login_signup_right">
                        <div class="login_signup_box">
                            <div class="login_signup_heading">
                                <h4>Register</h4>
                                <p>Let's get you all set up so you can access your personal account.</p>
                            </div>
                            <div class="login_signup_form">
                                <form method="POST" action="{{ route('register') }}" id="register-form">
                                @csrf
                                <div class="form_row">
                                    <div class="form_cell">
                                        <div class="form_field">
                                            <input type="text" name="name" class="floating-input @error('name') error_stroke @enderror" placeholder="Full Name" value="{{ old('name') }}" />
                                            <label class="floating-label"><i>Full Name</i></label>
                                            <i class="field_icon">
                                                <svg width="23" height="22" viewBox="0 0 23 22" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.7926 9.69335C11.7035 9.68443 11.5965 9.68443 11.4984 9.69335C9.37647 9.62202 7.69141 7.88347 7.69141 5.74371C7.69141 3.55937 9.45671 1.78516 11.65 1.78516C13.8343 1.78516 15.6085 3.55937 15.6085 5.74371C15.5996 7.88347 13.9145 9.62202 11.7926 9.69335Z"
                                                        stroke="#8D8D8D" stroke-width="1.33735" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M7.33499 12.9815C5.1774 14.4258 5.1774 16.7796 7.33499 18.215C9.7868 19.8555 13.8078 19.8555 16.2596 18.215C18.4172 16.7706 18.4172 14.4169 16.2596 12.9815C13.8167 11.3499 9.79571 11.3499 7.33499 12.9815Z"
                                                        stroke="#8D8D8D" stroke-width="1.33735" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            @error('name')
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
                                            <input type="email" name="email" class="floating-input @error('email') error_stroke @enderror" placeholder="Enter Your Email" value="{{ old('email') }}" />
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
                                            <input type="text" name="phone" class="floating-input @error('phone') error_stroke @enderror" placeholder="+1 123 1234 123" value="{{ old('phone') }}" />
                                            <label class="floating-label"><i>Phone</i></label>
                                            <i class="field_icon">
                                                <svg width="16" height="19" viewBox="0 0 16 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.7992 5.25V13.75C14.7992 17.15 13.9492 18 10.5492 18H5.44922C2.04922 18 1.19922 17.15 1.19922 13.75V5.25C1.19922 1.85 2.04922 1 5.44922 1H10.5492C13.9492 1 14.7992 1.85 14.7992 5.25Z"
                                                        stroke="#8D8D8D" stroke-width="1.275" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M9.69883 3.97656H6.29883" stroke="#8D8D8D"
                                                        stroke-width="1.275" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M7.99914 15.5334C8.72678 15.5334 9.31664 14.9436 9.31664 14.2159C9.31664 13.4883 8.72678 12.8984 7.99914 12.8984C7.27151 12.8984 6.68164 13.4883 6.68164 14.2159C6.68164 14.9436 7.27151 15.5334 7.99914 15.5334Z"
                                                        stroke="#8D8D8D" stroke-width="1.275" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            @error('phone')
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
                                            <input type="text" name="dob" class="floating-input datepicker @error('dob') error_stroke @enderror" placeholder="DOB" value="{{ old('dob') }}" />
                                            <label class="floating-label"><i>DOB</i></label>
                                            <i class="field_icon">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.66675 1.66797V4.16797" stroke="#8D8D8D"
                                                        stroke-width="1.25" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M13.3333 1.66797V4.16797" stroke="#8D8D8D"
                                                        stroke-width="1.25" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.91675 7.57422H17.0834" stroke="#8D8D8D"
                                                        stroke-width="1.25" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M17.5 7.08464V14.168C17.5 16.668 16.25 18.3346 13.3333 18.3346H6.66667C3.75 18.3346 2.5 16.668 2.5 14.168V7.08464C2.5 4.58464 3.75 2.91797 6.66667 2.91797H13.3333C16.25 2.91797 17.5 4.58464 17.5 7.08464Z"
                                                        stroke="#8D8D8D" stroke-width="1.25" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.99534 11.4167H10.0028" stroke="#8D8D8D"
                                                        stroke-width="1.66667" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M6.91282 11.4167H6.92031" stroke="#8D8D8D"
                                                        stroke-width="1.66667" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M6.91282 13.9167H6.92031" stroke="#8D8D8D"
                                                        stroke-width="1.66667" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            @error('dob')
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
                                            <input type="password" name="password" class="floating-input @error('password') error_stroke @enderror" placeholder="Password" />
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
                                <div class="form_row">
                                    <div class="form_cell">
                                        <div class="form_field">
                                            <input type="password" name="password_confirmation" class="floating-input @error('password_confirmation') error_stroke @enderror"
                                                placeholder="Retype  Password" />
                                            <label class="floating-label"><i>Retype Password</i></label>
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
                                            @error('password_confirmation')
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
                                            <select name="role" id="" class="floating-input">
                                                <option value="">Please Choose</option>
                                                @foreach (\App\Models\Role::where(['status' => 1])->get() as $role)
                                                    @if($role->id != 1 && strtolower($role->name) != 'guest user')
                                                    <option value="{{ $role->id}}" @if(old('role') == $role->id) selected @endif>{{ $role->name}}</option>
                                                    @endif

                                                @endforeach
                                                
                                            </select>
                                            <label class="floating-label"><i>Role</i></label>
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
                                            @error('password_confirmation')
                                                <span class="error_text" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form_row">
                                    <div class="form_cell padb-0">
                                        <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse" value="">

                                            @error('g-recaptcha-response')
                                                <span class="error_text" role="alert">Captcha is Required</span>
                                            @enderror
                                        {{-- <a
                                            class="all_btn  btn_large flexible icon_btn justify_content_between uppercase trackBooking_srch_btn" onclick="onclick="event.preventDefault();document.getElementById('register-form').submit();"">
                                            <span class="mr_auto">Register</span>
                                        </a> --}}
                                        <button type="submit" class="all_btn  btn_large flexible icon_btn justify_content_between uppercase trackBooking_srch_btn">
                                            <span class="mr_auto">Register</span>
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="DoYouHaveAcc pb_0">
                                <p>Already have an account?<a href="{{ route('login') }}">Login</a></p>
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
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
    $(function () {
        $(".datepicker").datepicker(
            {
                dateFormat: "D, d M, yy",
                changeMonth: true,
                changeYear: true,
                yearRange: "-90:+00"
            }
        );

    });
</script>
<script>
    document.getElementById('register-form').addEventListener('submit', function(event) {
        event.preventDefault();

        grecaptcha.ready(function() {
            grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", { action: 'submit' }).then(function(token) {
                document.getElementById('recaptchaResponse').value = token;
                document.getElementById('register-form').submit(); // Submit after token is set
            });
        });
    });
</script>

<script>
    $(document).on('submit','#register-form',function(e){
        e.preventDefault();

        

    });
</script>

</html>