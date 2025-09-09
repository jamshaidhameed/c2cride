@extends('emails.mail')
@section('content')
    <tr><td height="20"></td></tr>
    <tr>
        <td width="30">&nbsp;</td>
        <td width="540">
            <table width="100%" cellpadding="0" cellspacing="0" >
                <tr><td><img src="{{asset('/images/email/singup_icon.png')}}" alt="" style="max-width: 100%; display: block; margin: auto;"></td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 15px; line-height: 140%; font-weight: 600; color: #000; text-align: center;">Welcome!</td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Hi {{$user->name}},</td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">We are excited to have you get started. First, you need to Confirm your account. Just press the button below.</td></tr>
                <tr><td height="40"></td></tr>
                <tr><td style="text-align: center;"><a href="{{$user->link}}" target="_blank" style="background-color: #00B77B; min-width: 150px; display: inline-block; text-decoration: none; padding: 12px 20px; font-size: 13px; font-weight: 500; color: #ffffff;">Confirm Account</a></td></tr>
                <tr><td height="40"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">If you have any questions, feel free to contact our <span style="color: #00B77B;">support team</span> - we're always happy to help out.</td></tr>
                <tr><td height="25"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Happy Travelling,</td></tr>

                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Team <a href='{{url("/")}}' style="color: #00B77B; text-decoration: underline;">C2C</a></td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;display: inline-flex; vertical-align: middle;"><img src="{{asset('images/whatsapp_icon.png')}}" alt=""> &nbsp; <a href="https://wa.me/+971585603086" style="color: #000; text-decoration: underline;">+971 58 560 3086</a></td></tr>
            </table>
        </td>
        <td width="30">&nbsp;</td>
    </tr>
    <tr><td height="60"></td></tr>
@endsection
