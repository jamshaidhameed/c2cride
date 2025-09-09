<script src="{{ asset('/assets/bootstrap_5.3.2/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/js/jquery_3.6.0.min.js') }}"></script>
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjb2hexnJxmJNktoaBX5cdvk12GKdzwMY&libraries=places&language=en">
</script>
<script src="{{ asset('/assets/js/slick.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(document).ready(function() {
        $(".dropdown-language-click").click(function() {
            if ($(this).find(".dropdown-language").is(":visible")) {
                $(".dropdown-language").hide();
            } else {
                $(".dropdown-language").hide();
                $(this).find(".dropdown-language").toggle();
            }
        });
    });
    // close menu when clicked outside of drop down menu
    $(document).on("click", function(event) {
        var $triggerOn = $(".dropdown-language-click");
        if ($triggerOn !== event.target && !$triggerOn.has(event.target).length) {
            $(".dropdown-language").hide();
        }
    });
</script>
<script type="text/javascript">
    $(".gerenric-carousel").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        infinite: false,
        responsive: [

            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 650,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $(".destinations-slider").slick({
        slidesToShow: 4,
        dots: true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 650,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]

    });
</script>
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('#navbar_top').addClass('fixed-top');
                var navbarHeight = $('.navbar').outerHeight();
                $('body').css('padding-top', navbarHeight + 'px');
            } else {
                $('#navbar_top').removeClass('fixed-top');
                $('body').css('padding-top', '0');
            }
        });
    });
</script>

<script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
<script>
    var wa_btnSetting = {"btnColor":"#16BE45","ctaText":"","cornerRadius":40,"marginBottom":"60","marginLeft":20,"marginRight":20,"btnPosition":"right","whatsAppNumber":"971585603086","welcomeMessage":"Hello!","zIndex":999999,"btnColorScheme":"light"};
    window.onload = () => {
        _waEmbed(wa_btnSetting);
    };
</script>
