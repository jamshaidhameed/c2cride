@extends('emails.mail')
@section('content')
    <tr>
        <td width="30">&nbsp;</td>
        <td width="540">
            <table width="100%" cellpadding="0" cellspacing="0" >
                <tr><td><img src="{{asset('/images/email/support_request_icon.png')}}" alt="" style="max-width: 100%; display: block; margin: auto;"></td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 15px; line-height: 140%; font-weight: 600; color: #000; text-align: center;">Support Request</td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Hi {{$user->name}},</td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Your support request has been received, our team will be in touch with you soon</td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 500; color: #000;"><img src="{{asset('/images/email/ride_icon.png')}}" alt=""> &nbsp; Support Request ID #{{$support->id}}</td></tr>
                <tr><td height="30"></td></tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #EDEDED; padding: 15px;">

                            @if(is_null($support->question) && is_null($support->mobile_number))
                            <tr><td style="font-size: 13px; line-height: 140%; font-weight: 500; color: #575757;">Subject</td></tr>
                            <tr><td height="5"></td></tr>
                            <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #575757;">{{$support->subject}}</td></tr>
                            <tr><td height="15"></td></tr>
                            <tr><td style="font-size: 13px; line-height: 140%; font-weight: 500; color: #575757;">Message</td></tr>
                            <tr><td height="5"></td></tr>
                            <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #575757;">{{$support->message}}</td></tr>
                            @else
                                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 500; color: #575757;">Question</td></tr>
                                <tr><td height="5"></td></tr>
                                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #575757;">{{$support->question}}</td></tr>
                                <tr><td height="15"></td></tr>
                                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 500; color: #575757;">Mobile Number</td></tr>
                                <tr><td height="5"></td></tr>
                                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #575757;">{{$support->mobile_number}}</td></tr>
                            @endif
                            <tr><td height="20"></td></tr>
                            <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #575757;">Thanks!</td></tr>
                            <tr><td height="15"></td></tr>
                            <tr><td style="width: 100%; height: 1px; background-color: #A0A0A0;"></td></tr>
                            <tr><td height="15"></td></tr>
                            <tr><td style="font-size: 13px; line-height: 140%; font-weight: 500; color: #000000;">To view the your request on C2CRides Click the given button.</td></tr>
                            <tr><td height="35"></td></tr>
                            <tr><td style="text-align: center;"><a href="javascript:void(0)" style=" background-color: #00B77B; text-decoration: none; padding: 12px 20px; font-size: 13px; font-weight: 500; color: #ffffff;">View Request</a></td></tr>
                            <tr><td height="15"></td></tr>
                        </table>
                    </td>
                </tr>
                <tr><td height="30"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Enjoy the ride with C2CRides a leading ride hailing services company.</td></tr>
                <tr><td height="25"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;"><span style="color: #00B77B;">Note:</span> If you have any questions regarding the booking, feel free to use our support system.</td></tr>
                <tr><td height="25"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Happy Travelling,</td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Team <a href='{{url("/")}}' style="color: #00B77B;">C2C</a></td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;display: inline-flex; vertical-align: middle;"><img src="{{asset('images/whatsapp_icon.png')}}" alt=""> &nbsp; <a href="https://wa.me/+971585603086" style="color: #000; text-decoration: underline;">+971 58 560 3086</a></td></tr>

            </table>
        </td>
        <td width="30">&nbsp;</td>
    </tr>
@endsection
