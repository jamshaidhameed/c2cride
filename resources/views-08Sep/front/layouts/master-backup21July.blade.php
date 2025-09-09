<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- google fonts sora -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- end google fonts -->

    <!-- Favicon -->

    <link rel="icon" type="image/png" href="{{ asset('front/images/favicon/favicon-96x96.png') }}?v={{ filemtime(public_path('front/images/favicon/favicon-96x96.png')) }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('front/images/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('front/images/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/images/favicon/apple-touch-icon.png') }}" />
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
    <link rel="manifest" href="{{ asset('front/images/favicon/site.webmanifest') }}" />
    <!--  -->

    <!-- slider css -->
    <link rel="stylesheet" href="{{ asset('front/css/jquery-ui.min.css') }}?v={{ filemtime(public_path('front/css/jquery-ui.min.css')) }}">
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}?v={{ filemtime(public_path('front/css/slick.css')) }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css?version=10') }}?v={{ filemtime(public_path('front/css/style.css')) }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css?version=10') }}?v={{ filemtime(public_path('front/css/responsive.css')) }}">

    <link rel="stylesheet" href="{{ asset('front/css/select2.min.css') }}?v={{ filemtime(public_path('front/css/select2.min.css')) }}">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('front/css/animations.css') }}?v={{ filemtime(public_path('front/css/animations.css')) }}">
     <link rel="stylesheet" href="{{ asset('plugins/phone_number_api/build/css/intlTelInput.css') }}?v={{ filemtime(public_path('plugins/phone_number_api/build/css/intlTelInput.css')) }}">
    <link rel="stylesheet" href="{{ asset('plugins/phone_number_api/build/css/intlTelInput.min.css') }}?v={{ filemtime(public_path('plugins/phone_number_api/build/css/intlTelInput.min.css')) }}">
    <link rel="stylesheet" href="{{ asset('reviews/css/style.css') }}?v={{ filemtime(public_path('reviews/css/style.css')) }}" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.min.css">

    <style>
      /* Language switcher container */
      .dropdown {
          position: relative;
          display: inline-block;
          font-family: Arial, sans-serif;
          font-size: 12px; /* smaller text */
      }
      
      /* Small toggle button */
      .dropdown-toggle {
          background-color: #f1f1f1;
          color: #333;
          padding: 4px 6px;           /* reduced padding */
          border: 1px solid #ccc;
          border-radius: 4px;
          cursor: pointer;
          display: flex;
          align-items: center;
          gap: 4px;
          font-size: 12px;            /* smaller font */
          line-height: 1;
      }
      
      /* Flag image (smaller) */
      .dropdown-toggle img,
      .dropdown-item img {
          width: 16px;
          height: 12px;
          object-fit: cover;
      }
      
      /* Dropdown menu */
      .dropdown-menu {
          display: none;
          position: absolute;
          background-color: #fff;
          min-width: 120px; /* smaller width */
          margin-top: 4px;
          border: 1px solid #ddd;
          border-radius: 4px;
          z-index: 1000;
          box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      }
      
      /* Dropdown items */
      .dropdown-menu .dropdown-item {
          padding: 6px 10px;
          font-size: 12px;
          color: #333;
          display: flex;
          align-items: center;
          gap: 6px;
          text-decoration: none;
      }
      
      .dropdown-menu .dropdown-item:hover {
          background-color: #f0f0f0;
      }
      
      /* Show dropdown on hover */
      .dropdown:hover .dropdown-menu {
          display: block;
      }
    
    </style>
   @yield('style')
<style>
    .disabled-button {
    pointer-events: none; /* Prevents clicking */
    opacity: 0.5; /* Makes it look disabled */
    cursor: not-allowed; /* Changes the cursor */
}
@media (max-width: 768px) {
  .grecaptcha-badge {
    position: relative !important;
    top: 10px !important;
    bottom: auto !important;
    right: 10px !important;  /* or change to `left: 10px` for top-left */
    left: auto !important;
    z-index: 1000;
  }
}


</style>

<style>
        .blinking {
            animation: blink 3s step-start infinite;
            }

            @keyframes blink {
            50% {
                opacity: 0;
            }
        }
    </style>

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1072805840990299');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1072805840990299&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->



<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NXM3WPL3');</script>
<!-- End Google Tag Manager -->

<!-- Hotjar Tracking Code for C2cride.com  -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:6426571,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>



<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "rxu095g3tt");
</script>

</head>

<body>

   
        
        
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXM3WPL3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <div class="wrapper">
      @php $coupons = \App\Models\Coupons::where(['active' =>  true])->where('valid_until', '>=', \Carbon\Carbon::today())->with('ride_type')->get(); @endphp
        @include('front.layouts.header')
        
        @yield('content')
        @include('front.layouts.footer')

    </div>
<input type="hidden" name="step_two_url" value="{{ url('rides-step-two') }}">
<input type="hidden" name="step_two_post_url" value="{{ url('rides-step-one')}}">
</body>
 <script type="text/javascript" src="{{ asset('front/js/jquery-3.3.1.min.js') }}?v={{ filemtime(public_path('front/js/jquery-3.3.1.min.js')) }}"></script>
    <!-- slider js -->
    <script type="text/javascript" src="{{ asset('front/js/select2.min.js') }}?v={{ filemtime(public_path('front/js/select2.min.js')) }}"></script>

    <script type="text/javascript" src="{{ asset('front/js/slick.js') }}?v={{ filemtime(public_path('front/js/slick.js')) }}"></script>
    
    <script type="text/javascript" src="{{ asset('front/js/script.js') }}?v={{ filemtime(public_path('front/js/script.js')) }}"></script>
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjb2hexnJxmJNktoaBX5cdvk12GKdzwMY&libraries=places&language=en">
</script>
<script type="text/javascript" src="{{ asset('front/js/css3-animate-it.js') }}?v={{ filemtime(public_path('front/js/css3-animate-it.js')) }}"></script>
<script type="text/javascript" src="{{ asset('front/js/SmoothScroll.min.js') }}?v={{ filemtime(public_path('front/js/SmoothScroll.min.js')) }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery-ui.min.js') }}?v={{ filemtime(public_path('front/js/jquery-ui.min.js')) }}"></script>
<script src="{{asset("plugins/phone_number_api/build/js/intlTelInput.js")}}?v={{ filemtime(public_path('plugins/phone_number_api/build/js/intlTelInput.js')) }}"></script>
<script src="{{asset("plugins/phone_number_api/validate_phone_number.js")}}?v={{ filemtime(public_path('plugins/phone_number_api/validate_phone_number.js')) }}"></script>
<script>
    function timeValidationFunc(ride_date,return_date) {
        var selected_date = new Date(ride_date);
        var selected_converted_date = new Date(selected_date);

        var currentDateTime = new Date();
        if (selected_date < currentDateTime) {
            return false;
        }
        if (return_date) {
            
            var return_date = new Date(return_date);
            var return_converted = new Date(return_date);
            if (return_converted < currentDateTime || return_converted < selected_converted_date || return_converted) {
                
                return false;
            }else{
                return true;
            }
        }
        return true;
    }
</script>


@yield('script')
<script src="{{ asset('custom/script.js') }}?v={{ filemtime(public_path('custom/script.js')) }}"></script>
<!-- datepicker -->
<script>
    $(document).ready(function () {

        $(".datepicker").datepicker(
            {
                dateFormat: "D, d M, yy",
                changeMonth: true,
                changeYear: true,
                yearRange: "-00:+20",
                minDate: 0
            }
        );
        // $(".datepicker").datepicker("setDate", new Date());
        // $('.ride-date').datepicker("setDate", new Date());
        $(".ride-date").datepicker("setDate", new Date());
    });
</script>
<script type="text/javascript" src="{{ asset('custom/autocomplete/citytocity.js') }}?v={{ filemtime(public_path('custom/autocomplete/citytocity.js')) }}"></script>
<script type="text/javascript" src="{{ asset('custom/autocomplete/hourly.js') }}?v={{ filemtime(public_path('custom/autocomplete/hourly.js')) }}"></script>
<script type="text/javascript" src="{{ asset('custom/autocomplete/tour.js') }}?v={{ filemtime(public_path('custom/autocomplete/tour.js')) }}"></script>
<script type="text/javascript" src="{{ asset('front/js/customTimePicker.js') }}?v={{ filemtime(public_path('front/js/customTimePicker.js')) }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.all.min.js"></script>
<script>

 $(document).ready(function(){
     setInterval(function() {
      
        clear_cache();

}, 3600000);

// 18000000); // 5 hours = 5 * 60 * 60 * 1000 = 18000000 ms
 });

function clear_cache(){

    $.ajax({
        type:'get',
        url:"{{ url('cache/clear') }}",
        dataType:'json',
        success:function(data){
            console.log(data);
        }
    });
}
</script>
<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Select Desired City",
            allowClear: true
        });

        // Update label position on value change
        $('.select2').on('change', function () {
            var $parent = $(this).closest('.form-floating');
            if ($(this).val()) {
                $parent.addClass('has-value');
            } else {
                $parent.removeClass('has-value');
            }
        });

        // Initialize Select2
        $('.selectCity').select2({
            placeholder: function () {
                return $(this).data('placeholder'); // Dynamic placeholder
            },
            allowClear: false
        });

        $('.fullHours').select2({
            placeholder: function () {
                return $(this).data('placeholder'); // Dynamic placeholder
            },
            allowClear: false
        });


        // Add or remove 'has-value' class on change
        $('.selectCity, .fullHours').on('change', function () {
            var $parent = $(this).closest('.form-floating');
            if ($(this).val()) {
                $parent.addClass('has-value');
            } else {
                $parent.removeClass('has-value');
            }
        });
    });


    // 
    $(window).on('load', function () {
        function fadeInOut() {
            var $spans = $('.banner_text_slider span');
            var $indicator = $('.banner_text_slider');
            var index = 0;

            function showNextSpan() {
                var $currentSpan = $spans.eq(index);
                var spanWidth = $currentSpan.width();
                // $indicator.animate({ width: 60 }, 1000); // Initial width before span fades in
                $currentSpan.fadeIn(1400).delay(2000).fadeOut(1000, function () {
                    index = (index + 1) % $spans.length;
                    showNextSpan();
                });
                // Animate indicator to span width
                $indicator.animate({ width: spanWidth + 6 }, 1000);
                // Simultaneously reduce the indicator width while fading out the span
                $currentSpan.delay(1500).fadeOut(1000);
                $indicator.delay(2200).animate({ width: 6 }, 1000);
            }

            $spans.hide(); // Hide all spans initially
            showNextSpan(); // Start the fade in/out cycle
        }

        fadeInOut();
    });
</script>





<script>
    $(document).on("click", ".btn-check-ride-fare", function (e) {
  e.preventDefault();
  $(".btn-check-ride-fare").addClass("disabled-button");
  var next_url = $('input[name="step_two_url"]').val();
  let status = true;
  let form = $(".tab_rides");
  $(".error_text").remove();
  $(".floating-input").removeClass("error_stroke");

  //rides_from validation
  let rides_from = $("[name='rides_from']").val();
  let from_seleted = $(form)
    .find('[name="rides_from"]')
    .siblings('[name="is_selected"]')
    .val();
  if (from_seleted != "1") {
    $(form)
      .find("[name='rides_from']")
      .parent()
      .after(
        "<span class='error_text'>Please select a valid pickup location from the suggestions.</span>"
      );
    $(form).find("[name='rides_from']").addClass("error_stroke");
    if (status === true) {
      $(form).find("[name='rides_from']").focus();
    }
    status = false;
  }
  // if ($.trim(rides_from) === "") {
  //   $(form)
  //     .find("[name='rides_from']")
  //     .parent()
  //     .after("<span class='error_text'>Select From Location</span>");
  //   $(form).find("[name='rides_from']").addClass("error_stroke");
  //   if (status === true) {
  //     $(form).find("[name='rides_from']").focus();
  //   }
  //   status = false;
  // }
  let rides_to = $("[name='rides_to']").val();
  let to_seleted = $(form)
    .find('[name="rides_to"]')
    .siblings('[name="is_selected"]')
    .val();
  if (to_seleted != "1") {
    $(form)
      .find("[name='rides_to']")
      .parent()
      .after(
        "<span class='error_text'>Please select a valid dropoff location from the suggestions.</span>"
      );
    $(form).find("[name='rides_to']").addClass("error_stroke");
    if (status == true) {
      $(form).find("[name='rides_to']").focus();
    }
    status = false;
  }
  // if ($.trim(rides_to) === "") {
  //   $(form)
  //     .find("[name='rides_to']")
  //     .parent()
  //     .after("<span class='error_text'>Select To Location</span>");
  //   $(form).find("[name='rides_to']").addClass("error_stroke");
  //   if (status == true) {
  //     $(form).find("[name='rides_to']").focus();
  //   }
  //   status = false;
  // }

  let rides_date = $(form).find("[name='rides_date']").val(),
    rides_time = $(form).find("[name='rides_time']").val();

  if (!timeValidationFunc(rides_date + " " + rides_time)) {
    $(form)
      .find("[name='rides_time']")
      .parent()
      .after(
        "<span class='error_text'>The selected time should be ahead of current time.</span>"
      );
    $(form).find("[name='rides_time']").addClass("error_stroke");
    status = false;
  }

  let rides_return_date = $("[name='rides_return_date']").val();
  let rides_return_time = $("[name='rides_return_time']").val();

  let is_return_ride = $('[name="is_return_ride"]').val();

  if (is_return_ride == 1) {
    if (rides_return_date.trim() === "") {
      $(form)
        .find("[name='rides_return_date']")
        .parent()
        .after('<span class="error_text">Plese Select Return Date</span>');
      $(form).find("[name='rides_return_date']").addClass("error_stroke");
      $(form).find("[name='rides_return_date']").focus();
      status = false;
    }
    if (rides_return_time.trim() === "") {
      $(form)
        .find("[name='rides_return_time']")
        .parent()
        .after('<span class="error_text">Plese Select Return Time</span>');
      $(form).find("[name='rides_return_time']").addClass("error_stroke");
      if (status === true) {
        $(form).find("[name='rides_return_time']").focus();
      }
      status = false;
    }
    let date1 = new Date(rides_date + " " + rides_time);
    let date2 = new Date(rides_return_date + " " + rides_return_time);
    if (date1.getTime() > date2.getTime()) {
      $(form)
        .find("[name='rides_return_date']")
        .parent()
        .after(
          '<span class="error_text">Return Date Must be Greater then Ride Date</span>'
        );
      $(form).find("[name='rides_return_date']").addClass("error_stroke");
      if (status === true) {
        $(form).find("[name='rides_return_date']").focus();
      }
      status = false;
    }
  }

  var adults = $(form).find('[name="adults"]').val(),
    children = $(form).find('[name="children"]').val(),
    infants = $(form).find('[name="infants"]').val(),
    total_passengers = $(form).find(".total-sum").val(),
    ride_type_id = $(form).find('[name="ride_type_id"').val();

  // let airport_ride = $('[name="air_port_ride"').val();

  // if (airport_ride) {
  //   if (!isAirportRide(rides_from)) {
  //     $(form)
  //       .find("[name='rides_from']")
  //       .parent()
  //       .after(
  //         "<span class='error_text'>Please Select Airport Location</span>"
  //       );
  //     $(form).find("[name='rides_from']").addClass("error_stroke");
  //     status = false;
  //   }

  //   if (!isAirportRide(rides_to)) {
  //     $(form)
  //       .find("[name='rides_to']")
  //       .parent()
  //       .after(
  //         "<span class='error_text'>Please Select Airport location</span>"
  //       );
  //     $(form).find("[name='rides_to']").addClass("error_stroke");
  //     status = false;
  //   }
  // }

  // // if (rides_return_date && rides_return_time) {
  // //   if (
  // //     !timeValidationFunc(
  // //       rides_date + " " + rides_time,
  // //       rides_return_date + " " + rides_return_time
  // //     )
  // //   ) {
  // //     $("[name='rides_return_date']")
  // //       .parent()
  // //       .after("<span class='error_text'>return date should be greater then the duration </span>");
  // //     $("[name='rides_return_date']").addClass("error_stroke");

  // //     $("[name='rides_return_time']")
  // //       .parent()
  // //       .after("<span class='error_text'></span>");
  // //     $("[name='rides_return_time']").addClass("error_stroke");
  // //     status = false;
  // //   }
  // // }

  //   Calculate distance and Duration

  // New Code 
  var distance = '',
      duration = '';
  var service = new google.maps.DistanceMatrixService();
      service.getDistanceMatrix(
          {
              origins: [rides_from],
              destinations: [rides_to],
              travelMode: google.maps.TravelMode.DRIVING,
              unitSystem: google.maps.UnitSystem.METRIC,
              avoidHighways: false,
              avoidTolls: false,
          },
          function (response, status) {
              if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                  distance = response.rows[0].elements[0].distance.text;
                  duration = response.rows[0].elements[0].duration.text;
                  var dvDistance = document.getElementById("dvDistance");

                  var distanceArr = distance.split(" ");
                  distance = Number(distanceArr[0].trim());


              } else {
                  alert("Unable to find the distance via road.");
                  status = false;
              }
          }
      ).then(function(){
          if (status) {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': "{{ csrf_token() }}"
                  }
              });
              $.ajax({
                type: "post",
                url: "{{ route('rides.step.one') }}",
                dataType: "json",
                data: {
                  source: rides_from,
                  destination: rides_to,
                  adults: adults,
                  children: children,
                  infants: infants,
                  total_passengers: total_passengers,
                  rides_date: rides_date,
                  rides_time: rides_time,
                  rides_return_date: rides_return_date,
                  rides_return_time: rides_return_time,
                  ride_type_id: ride_type_id,
                  distance:distance,
                  duration:duration
                },
                success: function (data) {
                  if (data.success) {
                    $(".btn-check-ride-fare").removeClass("disabled-button");
                    window.location.href = next_url;
                  } else if (data.errors) {
                    var message = "";
                    $.each(data.errors, function () {
                      message += this.toLocaleString() + "\n";
                    });
                    alert(message);
                  } else if (data.message) {
                    alert(data.message);
                  }

                  $(".btn-check-ride-fare").removeClass("disabled-button");
                },
                error: function (xhr, status, error) {
                  if (xhr.status === 419) {
                    location.reload(true);
                  } else {
                    console.log("Error:", xhr.responseText);
                    $(".btn-check-ride-fare").removeClass("disabled-button");
                  }
                },
              });
            } else {
              $(".btn-check-ride-fare").removeClass("disabled-button");
            }
      });
  // End New Code
});

$("body").on("click", ".p_nextBtn", function (e) {
  let status = true;
  let form = $(".p_detail_form"),
    discountamount = $('[name="discountamount"]').val(),
    current_btn = this;

  $(".error_text").remove();
  $(".floating-input").removeClass("error_stroke");

  let full_name = $("[name='full_name']").val();
  if ($.trim(full_name) === "") {
    $(form)
      .find("[name='full_name']")
      .parent()
      .after("<span class='error_text'>Full Name is required</span>");
    $(form).find("[name='full_name']").addClass("error_stroke");
    if (status === true) {
      $(form).find("[name='full_name']").focus();
    }
    status = false;
  }
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var email = $("[name='email']").val();
  if ($.trim(email) == "") {
    $(form).find("[name='email']").addClass("error_stroke");
    $(form)
      .find("[name='email']")
      .parent()
      .after('<span class="error_text">Email is required</span>');
    if (status === true) {
      $(form).find("[name='email']").focus();
    }
    status = false;
  } else if (!re.test(email)) {
    $(form).find("[name='email']").addClass("error_stroke");
    $(form)
      .find("[name='email']")
      .parent()
      .after('<span class="error_text">Invalid email address</span>');
    if (status == true) {
      $(form).find("[name='email']").focus();
    }
    status = false;
  }
  let phone = $("[name='phone']").val();
  // if ($.trim(phone) === "") {
  //   $(form)
  //     .find("[name='phone']")
  //     .parent()
  //     .after("<span class='error_text'>Phone Number is required</span>");
  //   $(form).find("[name='phone']").addClass("error_stroke");
  //   status = false;
  // }
  // else if (!/^\d+$/.test(phone)) {
  //   $(form)
  //     .find("[name='phone']")
  //     .parent()
  //     .after("<span class='error_text'>Phone Number must be numeric</span>");
  //   $(form).find("[name='phone']").addClass("error_stroke");
  //   status = false;
  // }

  // WhatsApp validation
  let whatsapp = $("[name='whatsapp']").val();
  // if ($.trim(whatsapp) === "") {
  //   $(form)
  //     .find("[name='whatsapp']")
  //     .parent()
  //     .after("<span class='error_text'>WhatsApp Number is required</span>");
  //   $(form).find("[name='whatsapp']").addClass("error_stroke");
  //   status = false;
  // }
  // else if (!/^\d+$/.test(whatsapp)) {
  //   $(form)
  //     .find("[name='whatsapp']")
  //     .parent()
  //     .after("<span class='error_text'>WhatsApp Number must be numeric</span>");
  //   $(form).find("[name='whatsapp']").addClass("error_stroke");
  //   status = false;
  // }

  if (iti.isValidNumber() == false) {
    $(form)
      .find("[name='phone']")
      .parent()
      .after("<span class='error_text'>Phone Number is not valid</span>");
    $(form).find("[name='phone']").addClass("error_stroke");
    if (status == true) {
      $(form).find("[name='phone']").focus();
    }
    status = false;
  } else {
    formatted_number1 = (
      "+" +
      $("[name='phone']").parent().parent().find(".iti__selected-dial-code").text().split(/[+ ]+/).pop() +
      $("[name='phone']").val().replace(/^0+/, "")
    )
      .split(" ")
      .join("");
  }

  if (iti1.isValidNumber() == false) {
    $(form)
      .find("[name='whatsapp']")
      .parent()
      .after("<span class='error_text'>WhatsApp Number is not valid</span>");
    $(form).find("[name='whatsapp']").addClass("error_stroke");
    if (status === true) {
      $(form).find("[name='whatsapp']").focus();
    }
    status = false;
  } else {
    formatted_number2 = (
      "+" +
      $("[name='whatsapp']").parent().parent().find(".iti__selected-dial-code").text().split(/[+ ]+/).pop() +
      $("[name='whatsapp']").val().replace(/^0+/, "")
    )
      .split(" ")
      .join("");
  }

  if (!status) {
    scrollToErrorTrigger(this);
    return;
  }

  var selected_vehicle = $('[name="selected_vehicle"').val(),
    selected_vehicle_price = $('[name="selected_vehicle_price"]').val();

  var return_discount = $('[name="return_discount"]').val(),
    return_discount_amount = $('[name="return_discount_amount"]').val(),
    return_ride_amount = $('[name="return_ride_amount"]').val();

  if (status) {
    var formData = {
      _token: $('[name="second_csrf"]').val(),
      name: full_name,
      email: email,
      phone: formatted_number1,
      watsapp: formatted_number2,
      flight_detail: $('[name="flight_details"').val(),
      meet_greet: $('[name="meet_greet"]').val(),
      extra_notes: $(".floating-textarea").val(),
      child_seat: $('[name="child_seat"]').val(),
      photography: $('[name="photography"]').val(),
      tip: $('select[name="select_tip"]').val(),
      selected_vehicle: selected_vehicle,
      selected_vehicle_price: selected_vehicle_price,
      discountamount: discountamount,
      note: $(".floating-textarea").val(),
      return_discount: return_discount,
      return_discount_amount: return_discount_amount,
      return_ride_amount: return_ride_amount,
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    $.ajax({
      type: "post",
      url: "{{ route('rides.step.two.post') }}",
      dataType: "json",
      data: formData,
      success: function (data) {
        if (data.success) {
          $(".outward").html(data.records.onward_price);
          if (parseFloat(data.records.return_amount) > 0) {
            $(".return-li").show();
            $(".return").html( "(10% Off) " + data.records.return_text);
          } else {
            $(".return-li").hide();
          }

          if (parseFloat(data.records.child_seat) > 0) {
            $(".child-seat-li").show();
            if (data.records.child_seat) {
              var children_seat_amount = 0;
              if (data.records.return_amount > 0) {
                children_seat_amount =
                  parseFloat(data.records.children_amount) * 2;
              } else {
                children_seat_amount = parseFloat(data.records.children_amount);
              }
              $(".children_seat").html(data.records.children_seat_text);
                
            } else {
              $(".children_seat").html(data.records.children_amount_text);
            }
          } else {
            $(".child-seat-li").hide();
          }

          if (parseFloat(data.records.photography) > 0) {
            $(".photography-li").show();
            if (data.records.photography) {
              $(".photography").html(data.records.photography_text);
            } else {
              $(".photography").html(data.records.photography_text);
            }
          } else {
            $(".photography-li").hide();
          }

          if (parseFloat(data.records.tip_amount) > 0) {
            $(".tip-li").show();
            $(".tip_amount").text(data.records.tip_amount_text);
          } else {
            $(".tip-li").hide();
          }

          var total_amount = parseFloat(data.records.total_ride_amount);
          if (
            parseFloat(data.records.return_amount) > 0 &&
            parseFloat(data.records.children_amount) > 0
          ) {
            total_amount += parseFloat(data.records.children_amount);
          }
          if (
            parseFloat(data.records.return_amount) > 0 &&
            parseFloat(data.records.tip_amount) > 0
          ) {
            total_amount += parseFloat(data.records.tip_amount);
          }
          $(".total_amount").html(data.records.total_amount_text);
          $('[name="total_amount_val"]').val(data.records.total_ride_amount);
          disable_personal_detail();
          $(".v_pDetail_form").hide();
          $(".editDetailsBtn").show();
          nextButtonTrigger(current_btn);
        } else {
          scrollToErrorTrigger(current_btn);
        }
      },
      error: function (xhr, status, error) {
        if (xhr.status === 419) {
          location.reload(true);
        } else {
          console.log("Error:", xhr.responseText);
          alert("Error: " + xhr.responseText);
        }
        $(".btn-check-ride-fare").removeClass("disabled-button");
      },
    });
  } else {
    scrollToErrorTrigger(current_btn);
  }
});

function disable_personal_detail() {
  $('[name="full_name"]').prop("disabled", true);
  $('[name="email"]').prop("disabled", true);
  $('[name="phone"]').prop("disabled", true);
  $('[name="whatsapp"]').prop("disabled", true);
  $('[name="meet_greet"]').prop("disabled", true);
  $('[name="child_seat"]').prop("disabled", true);
  $(".floating-textarea").prop("disabled", true);
  $(".decrement").addClass("disabled-button");
  $(".increment").addClass("disabled-button");
  $('[name="photography"]').prop("disabled", true);
  $('[name="select_tip"]').prop("disabled", true);
}
function enable_personal_detail() {
  $('[name="full_name"]').prop("disabled", false);
  $('[name="email"]').prop("disabled", false);
  $('[name="phone"]').prop("disabled", false);
  $('[name="whatsapp"]').prop("disabled", false);
  $('[name="meet_greet"]').prop("disabled", false);
  $('[name="child_seat"]').prop("disabled", false);
  $(".floating-textarea").prop("disabled", false);
  $(".decrement").removeClass("disabled-button");
  $(".increment").removeClass("disabled-button");
  $('[name="photography"]').prop("disabled", false);
  $('[name="select_tip"]').prop("disabled", false);
}

function nextButtonTrigger(element) {
  $(element).closest(".p_nextBtnWidth").hide();
  $(".passenger_payment").show();

  $(".veh_progressLi").removeClass("active").removeClass("done");
  $(".veh_progress1, .veh_progress2").addClass("done");
  $(".veh_progress3").addClass("active");

  let headerHeight = $(".header_main").outerHeight();
  let offset = $(".passengerPayment_offsetter").offset().top + 10;
  var adjustedPosition = offset - headerHeight;

  if (deviceStatus) {
    $("html, body").animate({ scrollTop: adjustedPosition }, "slow");
  } else {
    smoothScrollInstance.scrollTo(adjustedPosition);
  }
}

function scrollToErrorTrigger(element) {
  let headerHeight = $(".header_main").outerHeight();
  let offset =
    $(element).closest(".p_detail_form").find(".error_stroke:first").offset()
      .top - 30;
  var adjustedPosition = offset - headerHeight;

  if (deviceStatus) {
    $("html, body").animate({ scrollTop: adjustedPosition }, "slow");
  } else {
    smoothScrollInstance.scrollTo(adjustedPosition);
  }
}

function verify_captcha() {
  var captcha_key = $('[name="captcha_key"]').val(),
    return_token = "";
  grecaptcha.execute(captcha_key, { action: "submit" }).then(function (token) {
    // document.getElementById("recaptchaResponse").value = token;

    return_token = token;
    // document.getElementById("register-form").submit(); // Submit after token is set
  });

  return return_token;
}

//Confirm Button
$(document).on("click", ".btn-confirm", function (e) {
  e.preventDefault();

  $(".btn-confirm").addClass("disabled-button");

  var captcha_key = $('[name="captcha_key"]').val();

  // if (token.trim() === "") {
  //   alert("Google Captcha is Required");
  //   $(".btn-confirm").removeClass("disabled-button");
  //   return;
  // }

  var subscribe = $('[name="subscribe"]').is(":checked") ? 1 : 0;

  $(".error_text").remove();
  $('[name="accept"]').removeClass("error_stroke");

  if (!$('[name="accept"]').is(":checked")) {
    $('[name="accept"]').parent().parent().addClass("error_stroke");
    $('[name="accept"]')
      .parent()
      .parent()
      .after('<span class="error_text">Please Choose </span>');
    // alert("Please Check the Terms and Conditions");
    $(".btn-confirm").removeClass("disabled-button");
    return;
  }
  // grecaptcha.ready(function () {
  //   grecaptcha
  //     .execute(captcha_key, { action: "submit" })
  //     .then(function (token) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        $.ajax({
          type: "post",
          url: "{{ route('rides.confirm.post') }}",
          dataType: "json",
          data: {
            payment_method: $('[name="payment_method"]').val(),
            coupon_id: $('[name="coupon_id"]').val(),
            copoun_amount: $('[name="copoun_amount"]').val(),
            subscribe: subscribe,
          },
          success: function (data) {
            if (data.status == 200 && data.url !== "") {
              $(".btn-confirm").removeClass("disabled-button");
              window.location.href = data.url;
            }

            if (data.status != 200 && data.session_expired) {
              Swal.fire({
                title: 'Session Expired',
                text: "Your Session has Been Expired, please try again",
                type: 'warning',
                // showCancelButton: true,
                confirmButtonColor: '#073321',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Try Again'
              }).then(function () {
                window.location.href = "{{ route('front.index') }}";
              });
            }
          },
          error: function (xhr, status, error) {
            if (xhr.status === 419) {
              location.reload(true);
            } else {
              console.log("Error:", xhr.responseText);
              alert("Error: " + xhr.responseText);
            }
            $(".btn-confirm").removeClass("disabled-button");
          },
        });
  //     });
  // });
});

//Tracking Form Submission

$(document).on("submit", ".tracking-form", function (e) {
  var status = true;
  var trackBooking_ref = $(this).find('[name="trackBooking_ref"]').val();

  if (!trackBooking_ref) {
    $(this).find('[name="trackBooking_ref"]').addClass("error_stroke");
    $(this)
      .find('[name="trackBooking_ref"]')
      .parent()
      .after("<span class='error_text'>Tracking Number is required</span>");
    status = false;
  }

  if (!status) {
    e.preventDefault();
  }
});

//Hourly Drive

$(document).on("click", ".byHours_search_btn", function (e) {
  let status = true;
  let form = $(".tab_byHours");
  $(".byHours_search_btn").addClass("disabled-button");
  var next_url = $('input[name="step_two_url"]').val();
  $(".error_text").remove();
  $(".floating-input").removeClass("error_stroke");

  //byHours_from validation
  let byHours_from = $("[name='byHours_from']").val();
  let is_selected = $(form)
    .find("[name='byHours_from']")
    .siblings('input[name="is_selected"]')
    .val();
  if (is_selected !== "1") {
    $(form)
      .find("[name='byHours_from']")
      .parent()
      .after(
        "<span class='error_text'>Please select a valid pickup location from the suggestions.</span>"
      );
    $(form).find("[name='byHours_from']").addClass("error_stroke");
    status = false;
  }
  // if ($.trim(byHours_from) === "") {
  //   $(form)
  //     .find("[name='byHours_from']")
  //     .parent()
  //     .after("<span class='error_text'>Select From Location</span>");
  //   $(form).find("[name='byHours_from']").addClass("error_stroke");
  //   status = false;
  // }

  //byHours_date validation
  let byHours_date = $("[name='byHours_date']").val();
  if ($.trim(byHours_date) === "") {
    $(form)
      .find("[name='byHours_date']")
      .parent()
      .after("<span class='error_text'>Select Pickup Date</span>");
    $(form).find("[name='byHours_date']").addClass("error_stroke");
    status = false;
  }

  //byHours_time validation
  let byHours_time = $("[name='byHours_time']").val();
  if ($.trim(byHours_time) === "") {
    $(form)
      .find("[name='byHours_time']")
      .parent()
      .after("<span class='error_text'>Select Pickup Time</span>");
    $(form).find("[name='byHours_time']").addClass("error_stroke");
    status = false;
  }

  if (!timeValidationFunc(byHours_date + " " + byHours_time)) {
    $(form)
      .find("[name='byHours_time']")
      .parent()
      .after(
        "<span class='error_text'>The selected time should be ahead of current time.</span>"
      );
    $(form).find("[name='byHours_time']").addClass("error_stroke");
    status = false;
  }

  //by hours duration validation
  let byHours_durantion = $("[name='byHours_durantion']").val();
  if ($.trim(byHours_durantion) === "") {
    $(form)
      .find("[name='byHours_durantion']")
      .parent()
      .after("<span class='error_text'>Please Select Duration</span>");
    $(form).find("[name='byHours_durantion']").addClass("error_stroke");
    status = false;
  }

  // let airport_ride = $('[name="air_port_ride"').val();

  // if (airport_ride) {
  //   if (!isAirportRide(byHours_from)) {
  //     $(form)
  //       .find("[name='byHours_from']")
  //       .parent()
  //       .after(
  //         "<span class='error_text'>Please Select Airport Location</span>"
  //       );
  //     $(form).find("[name='byHours_from']").addClass("error_stroke");
  //     status = false;
  //   }

  //   // if (!isAirportRide(rides_to)) {
  //   //   $(form)
  //   //     .find("[name='rides_to']")
  //   //     .parent()
  //   //     .after(
  //   //       "<span class='error_text'>Please Select Airport location</span>"
  //   //     );
  //   //   $(form).find("[name='rides_to']").addClass("error_stroke");
  //   //   status = false;
  //   // }
  // }

  if (!status) {
    $(".byHours_search_btn").removeClass("disabled-button");
    return;
  }

  var adults = $(form).find('[name="adults"]').val(),
    children = $(form).find('[name="children"]').val(),
    infants = $(form).find('[name="infant"]').val(),
    total_passengers = $(form).find(".total-sum").val(),
    ride_type_id = $(form).find('[name="ride_type_id"').val();

  if (status) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
    $.ajax({
      type: "post",
      url: "{{ route('rides.step.one') }}",
      dataType: "json",
      data: {
        source: byHours_from,
        destination: null,
        adults: adults,
        children: children,
        infants: infants,
        total_passengers: total_passengers,
        rides_date: byHours_date,
        rides_time: byHours_time,
        rides_return_date: null,
        rides_return_time: null,
        ride_type_id: ride_type_id,
        duration: byHours_durantion,
        byHours_durantion: byHours_durantion,
      },
      success: function (data) {
        if (data.success) {
          $(".byHours_search_btn").removeClass("disabled-button");
          window.location.href = next_url;
        } else if (data.errors) {
          var message = "";
          $.each(data.errors, function () {
            message += this.toLocaleString() + "\n";
          });
          $(".byHours_search_btn").removeClass("disabled-button");
          alert(message);
        }
      },
      error: function (xhr, status, error) {
        if (xhr.status === 419) {
          location.reload(true);
        } else {
          console.log("Error:", xhr.responseText);
          alert("Error: " + xhr.responseText);
        }
        $(".byHours_search_btn").removeClass("disabled-button");
      },
    });
  } else {
    $(".byHours_search_btn").removeClass("disabled-button");
  }
});

//City Tour Operation
$(document).on("click", ".cityTour_search_btn", function (e) {
  let status = true;
  $(".cityTour_search_btn").addClass("disabled-button");
  let form = $(".tab_cityTour");
  var next_url = $('input[name="step_two_url"]').val();
  $(".error_text").remove();
  $(".floating-input").removeClass("error_stroke");
  let cityTour_from = $("[name='cityTour_from']").val();
  let from_selected = $(form)
    .find("[name='cityTour_from']")
    .siblings('[name="is_selected"]')
    .val();
  if (from_selected !== "1") {
    $(form)
      .find("[name='cityTour_from']")
      .parent()
      .after(
        "<span class='error_text'>Please select a valid pickup location from the suggestions.</span>"
      );
    $(form).find("[name='cityTour_from']").addClass("error_stroke");
    if (status == true) {
      $(form).find("[name='cityTour_from']").focus();
    }
    status = false;
  }
  // if ($.trim(cityTour_from) === "") {
  //   $(form)
  //     .find("[name='cityTour_from']")
  //     .parent()
  //     .after("<span class='error_text'>Select From Location</span>");
  //   $(form).find("[name='cityTour_from']").addClass("error_stroke");
  //   if (status == true) {
  //     $(form).find("[name='cityTour_from']").focus();
  //   }
  //   status = false;
  // }
  let cityTour_to = $("[name='cityTour_to']").val();
  let to_selected = $(form)
    .find("[name='cityTour_from']")
    .siblings('[name="is_selected"]')
    .val();
  if (to_selected !== "1") {
    $(form)
      .find("[name='cityTour_to']")
      .parent()
      .after(
        "<span class='error_text'>Please select a valid dropoff location from the suggestions.</span>"
      );
    $(form).find("[name='cityTour_to']").addClass("error_stroke");
    if (status == true) {
      $(form).find("[name='cityTour_to']").focus();
    }
    status = false;
  }
  // if ($.trim(cityTour_to) === "") {
  //   $(form)
  //     .find("[name='cityTour_to']")
  //     .parent()
  //     .after("<span class='error_text'>Select To Location</span>");
  //   $(form).find("[name='cityTour_to']").addClass("error_stroke");
  //   status = false;
  // }

  //cityTour_date validation
  let cityTour_date = $("[name='cityTour_date']").val();
  if ($.trim(cityTour_date) === "") {
    $(form)
      .find("[name='cityTour_date']")
      .parent()
      .after("<span class='error_text'>Select Pickup Date</span>");
    $(form).find("[name='cityTour_date']").addClass("error_stroke");
    status = false;
  }

  //cityTour_time validation
  let cityTour_time = $("[name='cityTour_time']").val();
  if ($.trim(cityTour_time) === "") {
    $(form)
      .find("[name='cityTour_time']")
      .parent()
      .after("<span class='error_text'>Select Pickup Time</span>");
    $(form).find("[name='cityTour_time']").addClass("error_stroke");
    status = false;
  }

  if (!timeValidationFunc(cityTour_date + " " + cityTour_time)) {
    $(form)
      .find("[name='cityTour_time']")
      .parent()
      .after(
        "<span class='error_text'>The selected time should be ahead of current time.</span>"
      );
    $(form).find("[name='cityTour_time']").addClass("error_stroke");
    status = false;
  }

  let SelectFullDayField = $('[name="SelectFullDayField"').val();

  if (!SelectFullDayField) {
    $(form)
      .find("[name='SelectFullDayField']")
      .parent()
      .after("<span class='error_text'>Please Select Hours</span>");
    $(form).find("[name='SelectFullDayField']").addClass("error_stroke");
    status = false;
  }

  let SelectDesiredCity = $("[name='SelectDesiredCity']").val();

  if (!SelectDesiredCity) {
    $(form)
      .find("[name='SelectDesiredCity']")
      .parent()
      .after("<span class='error_text'>Please Select Desired City</span>");
    $(form).find("[name='SelectDesiredCity']").addClass("error_stroke");
    status = false;
  }

  if (!status) {
    $(".cityTour_search_btn").removeClass("disabled-button");
    return;
  }

  var adults = $(form).find('[name="adults"]').val(),
    children = $(form).find('[name="children"]').val(),
    infants = $(form).find('[name="infant"]').val(),
    total_passengers = $(form).find(".total-sum").val(),
    ride_type_id = $(form).find('[name="ride_type_id"').val();

  let search_address = cityTour_from;
  let search_city = SelectDesiredCity;
  let extra_charges = 0;

  if (search_address.toLowerCase().includes(search_city.toLowerCase())) {
    extra_charges = 0;
  } else {
    extra_charges = 100;
  }

  if (status) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    $.ajax({
      type: "post",
      url: "{{ route('rides.step.one') }}",
      dataType: "json",
      data: {
        source: cityTour_from,
        destination: cityTour_to,
        adults: adults,
        children: children,
        infants: infants,
        total_passengers: total_passengers,
        rides_date: cityTour_date,
        rides_time: cityTour_time,
        rides_return_date: null,
        rides_return_time: null,
        ride_type_id: ride_type_id,
        hours: SelectFullDayField,
        tour_city: SelectDesiredCity,
        extra_charges: extra_charges,
      },
      success: function (data) {
        if (data.success) {
          $(".cityTour_search_btn").removeClass("disabled-button");
          window.location.href = next_url;
        } else if (data.errors) {
          var message = "";
          $.each(data.errors, function () {
            message += this.toLocaleString() + "\n";
          });
          alert(message);
        }

        $(".cityTour_search_btn").removeClass("disabled-button");
      },
      error: function (xhr, status, error) {
        if (xhr.status === 419) {
          location.reload(true);
        } else {
          console.log("Error:", xhr.responseText);
          alert("Error: " + xhr.responseText);
        }
        $(".cityTour_search_btn").removeClass("disabled-button");
      },
    });
  } else {
    $(".cityTour_search_btn").removeClass("disabled-button");
  }
});

//Apply Copoun Code

$(document).on("click", ".apply_copoun", function (e) {
  e.preventDefault();
  $(".error_text").remove();
  $('[name="discount_voucher"]').removeClass("error_stroke");
  var url = $('[name="get_copon"]').val(),
    copoun_code = $('[name="discount_voucher"]').val().trim(),
    coupon_id = $('[name="coupon_id"]').val(),
    total_amount = $(".total_amount").text(),
    copoun_amount = $('[name="copoun_amount"]').val(),
    total_amount_num = total_amount.split(" ")[1],
    ride_type_id = $('[name="ride_type_id"]').val(),
    total_amount_val = $('[name="total_amount_val"]').val();

  // if ($('[name="payment_method"]').val() !== "card") {
  //   alert("Discount Voucher Code only apply on Card Payment Mode");

  //   return;
  // }

  if (copoun_code === "") {
    $('[name="discount_voucher"]')
      .parent()
      .after(
        '<span class="error_text">Please Enter Discount Voucher to Apply Discount</span>'
      );
    $('[name="discount_voucher"]').addClass("error_stroke");
    return this;
  }

  if (coupon_id !== "") {

    var total = $('[name="total_amount_val"]').val();

        $.get("{{ url('currency-format') }}/" + total)
          .done(function(response) {
              $(".total_amount").text(response);
          })
          .fail(function(xhr, status, error) {
              // Error handler
              console.error("AJAX Error:", error);
          })
          .always(function() {
              // ✅ Code that runs after AJAX is complete (success or error)
              console.log("AJAX completed");
              // nextCode(); // Your function or logic
          });
    $('[name="coupon_id"]').val("");
    $('[name="copoun_amount"]').val("0");
      $(".copoun-applied").remove();
      $(".apply_copoun").text("Apply");
      $(".discount-message").remove();
    $('[name="discount_voucher"]').val(" ");
      return;
  }

  $.ajax({
    type: "get",
    url: url,
    data: { code: copoun_code, ride_type_id:ride_type_id ,total:total_amount_val },
    dataType: "json",
    success: function (data) {
      if (data.success) {
        $('[name="coupon_id"]').val(data.copoun.id);
        var copoun_amt = data.discount_amount;
        $('[name="copoun_amount"]').val(copoun_amt);
        $(".total_amount").text(data.total_text_amount);

        $(".tip_amount")
          .parent()
          .parent()
          .after(
            '<li class="copoun-applied"><div class="p_price_breakdown"><span>Discount :</span><strong class=""> ' +
              data.discount_amount_text +
              "</strong></div></li>"
          );

        $('[name="discount_voucher"]').after(
          '<br><span class="error_text discount-message">Discount Voucher Applied Successfully</span>'
        );
        $(".apply_copoun").text("Remove");
      } else {
        $('[name="discount_voucher"]').val(" ");
        // alert(data.message);

        Swal.fire({
          title: 'Alert!',
          text: data.message,
          type: 'error',
          // showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ok'
        });
      }
    },
    error: function (xhr, status, error) {
      if (xhr.status === 419) {
        location.reload(true);
      } else {
        console.log("Error:", xhr.responseText);
        alert("Error: " + xhr.responseText);
      }
      $(".btn-check-ride-fare").removeClass("disabled-button");
    },
  });
});

//Safari Booking Post
$(document).on("click", ".safari-check-fair", function (e) {
  e.preventDefault();

  var form = $(".safari-form");
  var source = $(form).find(".source").val(),
    status = true,
    ride_type_id = $(form).find('[name="ride_type_id"]').val();
  var ride_date = $(form).find(".ride-date").val();
  var ride_time = $(form).find('[name="cityTour_time"]').val();
  var SelectDesiredCity = $(form).find('[name="SelectDesiredCity"]').val();
  var total_passengers = $(form).find(".total-sum").val();
  var adults = $(form).find('[name="adults"]').val();
  var children = $(form).find('[name="children"]').val();
  var infants = $(form).find('[name="infants"]').val();

  $(".safari-check-fair").addClass("disabled-button");
  $(".error_text").remove();
  $(".floating-input").removeClass("error_stroke");

  var is_selected = $("#source").siblings('[name="is_selected"]').val();

  if (is_selected == "" || is_selected != "1") {
    $(form)
      .find(".source")
      .parent()
      .after(
        "<span class='error_text'>Please select a valid pickup location from the suggestions.</span>"
      );
    $(form).find(".source").addClass("error_stroke");
    if (status === true) {
      $(form).find(".source").focus();
    }
    status = false;
  }

  // if ($.trim(source) === "") {
  //   $(form)
  //     .find(".source")
  //     .parent()
  //     .after("<span class='error_text'>Select From Location</span>");
  //   $(form).find(".source").addClass("error_stroke");
  //   if (status === true) {
  //     $(form).find(".source").focus();
  //   }
  //   status = false;
  // }

  if (!timeValidationFunc(ride_date + " " + ride_time)) {
    $(form)
      .find(".ride-date")
      .parent()
      .after(
        "<span class='error_text'>Please Choose a Valid Ride date and Time</span>"
      );
    $(form).find(".ride-date").addClass("error_stroke");
    if (status === true) {
      $(form).find(".ride-date").focus();
    }
    status = false;
  }

  if (
    SelectDesiredCity === "" ||
    SelectDesiredCity === null ||
    SelectDesiredCity === undefined
  ) {
    $(form)
      .find('[name="SelectDesiredCity"]')
      .parent()
      .after("<span class='error_text'>Please Choose Desired City</span>");
    $(form).find('[name="SelectDesiredCity"]').addClass("error_stroke");
    if (status === true) {
      $(form).find('[name="SelectDesiredCity"]').focus();
    }
    status = false;
  }

  if (status == false) {
    $(".safari-check-fair").removeClass("disabled-button");
    return;
  }

  var token = $(form).find('[name="csrf_token"').val(),
    post_url = $(form).find('[name="step_one_post_url"').val(),
    next_url = $(form).find('[name="next_url"]').val();
  

 $.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
  $.ajax({
    type: "POST",
    url: "{{ route('safari.step.one.post') }}",
    dataType: "json",
    data: {
      source: source,
      ride_date: ride_date,
      ride_time: ride_time,
      SelectDesiredCity: SelectDesiredCity,
      total_passengers: total_passengers,
      adults: adults,
      children: children,
      infants: infants,
      ride_type_id: ride_type_id,
    },
    success: function (data) {
      if (data.success) {
        window.location.href = next_url;
      } else if (data.errors) {
        var message = "";
        $.each(data.errors, function () {
          message += this.toLocaleString() + "\n";
        });
        $(".safari-check-fair").removeClass("disabled-button");
        alert(message);
      } else if (data.message) {
        $(".safari-check-fair").removeClass("disabled-button");
        alert(data.message);
      }
    },
    error: function (xhr, status, error) {
      if (xhr.status === 419) {
        location.reload(true);
      } else {
        // console.log("Error:", xhr.responseText);
        $(".safari-check-fair").removeClass("disabled-button");
        alert(xhr.responseText);
      }
    },
  });
});

//Package Selection in Safari Booking
$("body").on("click", ".bookSfariSelectBtn", function () {
  let form = $(".p_detail_form");
  $(form).find(".error_text").remove();
  $(form).find(".floating-input").removeClass("error_stroke");

  let id = $(this).data("id"),
    quantity = $(".quantity-" + id + "").val();
  $('[name="selected_package_id"]').val(id);
  $('[name="selected_quantity"]').val(quantity);

  if (quantity <= 0) {
    $(".quantity-" + id + "")
      .parent()
      .after(
        "<span class='error_text'>Can not book ride with no quantity</span>"
      );
    $(".quantity-" + id + "").addClass("error_stroke");
    $(".quantity-" + id + "").focus();

    return;
  }

  $(this).closest(".vc_left").addClass("hasSelectedItem");
  $(this).closest(".bookingCardUl").find(".bookingCardList").hide();
  $(this).closest(".bookingCardList").show();
  $(this).closest(".bookingCardList").addClass("selectedList");

  $(".additionalOns_sec").show();
  // $('.p_nextBtnWidth').show();
  $(".passenger_payment, .passengerDetail_sec").hide();

  $(".veh_progressLi").removeClass("active").removeClass("done");
  $(".veh_progress1").addClass("done");
  $(".veh_progress2").addClass("active");

  let headerHeight = $(".header_main").outerHeight();
  let offset = $(".additionalOns_offsetter").offset().top;
  var adjustedPosition = offset - headerHeight;

  if (deviceStatus) {
    $("html, body").animate({ scrollTop: adjustedPosition }, "slow");
  } else {
    smoothScrollInstance.scrollTo(adjustedPosition);
  }
});

</script>

<script>
  var cp = @json($coupons);
  let index = 0;
  const messageElement = document.getElementById("message");

  setInterval(() => {

    index = (index + 1);

    if (!cp[index]) {
      index = 0;
    }

    if (cp[index]) {
      var html_content = '<h4>'+ Math.round(cp[index].show_at_front) + '<sup>Off</sup><sub>%</sub></h4>';
      html_content += '<span>with Code</span><strong>'+cp[index].code + '</strong>';

      var html_content2 = '<p>'+ Math.round(cp[index].show_at_front) +'% Off with code <b>'+cp[index].code+'</b></p><div class="topPromoClose"> </div>';

      $('#message').empty();
      $('#message').html(html_content);

      $('#mobile-blink').empty();
      $('#mobile-blink').html(html_content2);
    }
    
  //   messageElement.textContent = messages[index];

  }, 3000);
</script>

<script>
  // Increment functionality
  $(".increment").on("click", function () {
    var $input = $(this).siblings(".number-input");
    var currentValue = parseInt($input.val()) || 0;
    $input.val(currentValue + 1);
    let inputName = $(this).siblings(".number-input").attr("name");

    if (inputName == "child_seat") {
      let price = $('[name="child_price"]').val();

      // $(".child_amount").text((price * (currentValue + 1)).toFixed(2) + " AED");
      let total = (price * (currentValue + 1)).toFixed(2);

      $.get("{{ url('currency-format') }}/" + total)
          .done(function(response) {
              $(".child_amount").text(response);
          })
          .fail(function(xhr, status, error) {
              // Error handler
              console.error("AJAX Error:", error);
          })
          .always(function() {
              // ✅ Code that runs after AJAX is complete (success or error)
              console.log("AJAX completed");
              // nextCode(); // Your function or logic
          });
      // $.get("{{ url('currency-format') }}/".total, function(response) {

      //   var respose_text = response;

      //   $(".child_amount").html(respose_text);
      //   });
    } else if (inputName === "photography") {
      let price = $('[name="photography_price"]').val();

      // $(".photography_amount").text(
      //   (price * (currentValue + 1)).toFixed(2) + " AED"
      // );

      let total = (price * (currentValue + 1)).toFixed(2);

      $.get("{{ url('currency-format') }}/" + total)
          .done(function(response) {
              $(".photography_amount").text(response);
          })
          .fail(function(xhr, status, error) {
              // Error handler
              console.error("AJAX Error:", error);
          })
          .always(function() {
              // ✅ Code that runs after AJAX is complete (success or error)
              console.log("AJAX completed");
              // nextCode(); // Your function or logic
          });
    }

    if ($input.val() == 0) {
      $input.val("");
    }
    var section = $(this).closest(".passengers_fieldBox");
  });

  // Decrement functionality
  $(".decrement").on("click", function () {
    var $input = $(this).siblings(".number-input");
    var currentValue = parseInt($input.val()) || 0;
    if (currentValue > 0) {
      $input.val(currentValue - 1);
    }

    if ($input.val() == 0) {
      $input.val("");
    }

    let inputName = $(this).siblings(".number-input").attr("name");

    if (inputName == "child_seat") {
      let price = $('[name="child_price"]').val();

      let amount = price * (currentValue <= 0 ? 0 : currentValue - 1);

      $.get("{{ url('currency-format') }}/" + amount)
          .done(function(response) {
              $(".child_amount").text(response);
          })
          .fail(function(xhr, status, error) {
              // Error handler
              console.error("AJAX Error:", error);
          })
          .always(function() {
              // ✅ Code that runs after AJAX is complete (success or error)
              console.log("AJAX completed");
              // nextCode(); // Your function or logic
          });

      // $.get("{{ url('currency-format') }}/".amount, function(response) {

      //   $(".child_amount").html(response);
      // });

      
    } else if (inputName == "photography") {
      let price = $('[name="photography_price"]').val();

      let amount = price * (currentValue <= 0 ? 0 : currentValue - 1);

      // $(".photography_amount").text(
      //   (amount == 0 ? parseFloat(price) : amount).toFixed(2) + " AED"
      // );

      $.get("{{ url('currency-format') }}/" + amount)
          .done(function(response) {
              $(".photography_amount").text(response);
          })
          .fail(function(xhr, status, error) {
              // Error handler
              console.error("AJAX Error:", error);
          })
          .always(function() {
              // ✅ Code that runs after AJAX is complete (success or error)
              console.log("AJAX completed");
              // nextCode(); // Your function or logic
          });

        // $.get("{{ url('currency-format') }}/".amount, function(response) {

        //     $(".photography_amount").html(response);
        // });
    }
    var section = $(this).closest(".passengers_fieldBox");
    // updateSectionSum(section);
  });
</script>

</html>