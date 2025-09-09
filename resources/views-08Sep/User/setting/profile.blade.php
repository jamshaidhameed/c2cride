@extends('User.layouts.app')

@section('content')
<!--CONTENT_SECTION_START-->
<section id="content-section">
    <div class="page-container">
        @include('User.layouts.links')
        <div class="support-page setting-page gerenric-padding">
            <div class="happy-assist">
                <div class="happy-assist-inner">
                    <div class="assist-image"><img src="{{asset('images/setting_profile_icon.svg')}}" alt=""></div>
                    <div class="assist-title">Update your Profile & Settings</div>
                    <!-- <p>Our customer Care agents are avbailable everyday from 6am-midnight ET to help answer all questions.</p> -->
                </div>
                <div class="full_width"><a href="javascript:void(0)">
                        <div class="btn account-delete btn-primary">Delete my account</div>
                    </a></div>
            </div>
            <div class="support-form">
                <div class="support-col">
                    <div class="support-info">
                        <div class="support-icon"><img src="{{asset('images/setting_profile_gray_icon.svg')}}" alt=""></div>
                        <div class="support-detail">
                            <div class="sd-title">Profile Settings</div>
                        </div>
                    </div>
                    <div class="gerenric-form">
                        <form id="profile_update_form">

                        <ul>
                            <li>
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" placeholder="Full Name" name="full_name" value="{{auth()->user()->name}}">
                            </li>
                            <li>
                                <label class="form-label">Email</label>
                                <input disabled name="email" type="email" value="{{auth()->user()->email}}" class="form-control" placeholder="*****@gmail.com">
                            </li>
                            <li>
                                <label class="form-label">Mobile Number</label>
                                <input required name="phone" id="phone" type="tel" class="form-control phone_num" autofocus value="{{auth()->user()->mobile_number}}" pattern="\d*" inputmode="numeric" oninput="validatePhoneNumber(this)" />
                                <span id="valid-msg" class="hide"></span>
                                <span id="error-msg" class="hide" style="color: red"></span>
                            </li>
                            
                            <li>
                                <label class="form-label">Home Address</label>
                                <input  name="address"  value="{{auth()->user()->address}}" type="text" class="form-control" placeholder="Home Address">
                            </li>
                            <li>
                                <label class="form-label">Password</label>
                                <input name="password" type="password" class="form-control">
                                <div class="password-view-icon"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                            </li>
                            <li><button class="btn btn-primary">Update Profile</button></li>
                        </ul>
                        </form>

                    </div>
{{--                    <div class="submit-text-show">Profile is successfully updated!</div>--}}
                </div>
                <div class="support-col">
                    <div class="support-info">
                        <div class="support-icon"><img src="{{asset('images/notifications_icon.svg')}}" alt=""></div>
                        <div class="support-detail">
                            <div class="sd-title">Passenger Notifications</div>
                        </div>
                    </div>
                    <div class="gerenric-form">
                        <form id="passenger_notifications">

                        <ul>
                            <li>
                                <div class="notification-list">
                                    <div class="notf-row">
                                        <label class="gerenric_checkbox">
                                            Receive notifications of new offers from C2CRides <input name="notifications" type="checkbox" {{ auth()->user()->notifications == 1 ? 'checked' : ''}}><span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="notf-row">
                                        <label class="gerenric_checkbox">
                                            Receive news and special offers <input type="checkbox" name="news" {{ auth()->user()->news == 1 ? 'checked' : ''}}><span class="checkmark"></span>
                                        </label>
                                    </div>
                                    
                                </div>
                            </li>
                            <li><button class="btn btn-primary">Save Notification Settings</button></li>
                        </ul>
                        </form>
                    </div>
{{--                    <div class="submit-text-show">Your notification settings are updated!</div>--}}
                </div>
            </div>
        </div>
    </div>
</section>
<!--CONTENT_SECTION_END-->
@include("modals.success")
@include("modals.cancel")
@endsection

@section('js')
    <script src="{{asset("/assets/plugins/phone_number_api/build/js/intlTelInput.js")}}"></script>
    <script src="{{asset("/assets/plugins/phone_number_api/validate_phone_number.js")}}"></script>
<script>
       function validatePhoneNumber(input) {
   
        input.value = input.value.replace(/\D/g, '');
    }

    $(document).ready(function (){
        var handleChange = function() {
            var phone_number = iti.getNumber();
            $('#phone-hidden').val(phone_number);
        };

        $(document).ready(function() {
            $('#phone').change(handleChange);
        });

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
            utilsScript: "{{ asset('assets/plugins/phone_number_api/build/js/utils.js') }}",
        });
        window.iti = iti;
    })
    $('#passenger_notifications').submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#passenger_notifications')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = '{{url("user/update/user-notifications")}}';
        $.ajax({
            url: url,
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {

                if (data.status === 301) {
                    $('#error_text').text(data.message);
                    $('#error_btn').text('Close it!');
                    $("#exampleModal_cc").modal('show');
                } else if (data.status === 200) {
                    $('.alter-title').text(data.message);
                    $("#exampleModal_ss").modal('show');
                }
            },
            error: function(error) {
                $('#error_text').text('Something went wrong.');
                $('#error_btn').text('Close it!');
                $("#exampleModal_cc").modal('show');
            }
        });
    });


    $('#profile_update_form').submit(function(e) {
        e.preventDefault();
        var formData = new FormData($('#profile_update_form')[0]);

        if (iti.isValidNumber() === false) {
            $('#error_text').text('Please enter a valid mobile number');
            $('#error_btn').text('Close it!');
            $("#exampleModal_cc").modal('show');
            return;
        } else {
            formatted_number = ($('.iti__selected-dial-code').text() + $('#phone').val().replace(/^0+/, '')).split(" ").join("");
        }

        formData.delete('phone');
        formData.set('phone', formatted_number);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = '{{url("user/update/user-profile")}}';
        $.ajax({
            url: url,
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {

                console.log('yes', data);
                if (data.status === 301) {
                    $('#error_text').text(data.message);
                    $('#error_btn').text('Close it!');
                    $("#exampleModal_cc").modal('show');
                } else if (data.status === 200) {
                    $("input[name=full_name]").val(data.user.name);
                    $("input[name=mobile_num]").val(data.user.mobile_number);
                    $("input[name=address]").val(data.user.address);
                    $('.alter-title').text(data.message);
                    $("#exampleModal_ss").modal('show');
                }
            },
            error: function(error) {
                $('#error_text').text('Something went wrong.');
                $('#error_btn').text('Close it!');
                $("#exampleModal_cc").modal('show');
            }
        });
    });
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
@endsection
