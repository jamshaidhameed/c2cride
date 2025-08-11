@extends('User.layouts.app')

@section('content')

<!--CONTENT_SECTION_START-->
<section id="content-section">
    <div class="page-container">
        @include('User.layouts.links')
        <div class="support-page gerenric-padding">
            <div class="happy-assist">
                <div class="happy-assist-inner">
                    <div class="assist-image"><img src="{{asset('images/happy_assist_icon.svg')}}" alt=""></div>
                    <div class="assist-title" style="font-size: 18px;">Customer Support at your service. Our customer care team is available 24/7 to help with all your questions.</div>
                </div>
            </div>
            <div class="support-form">
                <div class="support-col">
                    <div class="support-info">
                        <div class="support-icon"><img src="{{asset('images/call_icon.svg')}}" alt=""></div>
                        <div class="support-detail">
                            <div class="sd-title">Request a Call Back</div>
                            <div class="sd-text">What's supported?</div>
                        </div>
                    </div>
                    <div class="gerenric-form">
                        <form id="request_callback">
                            @csrf
                        <ul>
                            <li><input required name="question" type="text" class="form-control" placeholder="Enter your question here..."></li>
                            <li><input required name="mobile_number" type="text" class="form-control" placeholder="Enter your phone number"></li>
                            <li><button class="btn btn-primary">Get a call back</button></li>
                        </ul>
                        </form>
                    </div>
{{--                    <div class="submit-text-show">Thank you for the meil, our team will contact you in 60 minutes</div>--}}
                </div>
                <div class="support-col">
                    <div class="support-info">
                        <div class="support-icon"><img src="{{asset('images/email_icon.svg')}}" alt=""></div>
                        <div class="support-detail">
                            <div class="sd-title">Send email</div>
                            <div class="sd-text">What's supported?</div>
                        </div>
                    </div>
                    <div class="gerenric-form">
                        <form id="send_email">
                            @csrf
                        <ul>
                            <li><input required name="subject" type="text" class="form-control" placeholder="Enter your subject here..."></li>
                            <li><textarea required name="message"  class="form-control" placeholder="Your message"></textarea></li>
                            <li><button class="btn btn-primary">Send</button></li>
                        </ul>
                        </form>
                    </div>
{{--                    <div class="submit-text-show">Thank you for the meil, our team will contact you in 60 minutes</div>--}}
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
    <script >
        $('#request_callback').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($('#request_callback')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log(formData)
            var url = '{{url("user/support/call")}}';
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
                        $('.alter-title').text('Error');
                        $("#exampleModal_cc").modal('show');
                    } else if (data.status === 200) {
                        $('.alter-title').text('Request Sent!');
                        $('#success_text').text(data.message);
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
        $('#send_email').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($('#send_email')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = '{{url("user/support/email")}}';
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
                        $('.alter-title').text('Error');
                        $("#exampleModal_cc").modal('show');
                    } else if (data.status === 200) {
                        $('#success_text').text(data.message);
                        $('.alter-title').text('Request Sent!');
                        $("#exampleModal_ss").modal('show');
                    }
                },
                error: function(error) {
                    $('#error_text').text('Something went wrong.');
                    $('#error_btn').text('Close it!');
                    $('.alter-title').text('Error');
                    $("#exampleModal_cc").modal('show');
                }
            });
        });
    </script>
@endsection
