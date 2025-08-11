@extends('emails.mail')
@section('content')
    <tr>
        <td width="30">&nbsp;</td>
        <td width="540">
            <table width="100%" cellpadding="0" cellspacing="0" >
                <tr><td><img src="{{asset('assets/images/email/password_reset_icon.png')}}" alt="" style="max-width: 100%; display: block; margin: auto;"></td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 15px; line-height: 140%; font-weight: 600; color: #000; text-align: center;">Reset Password!</td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Hi {{$user->name}},</td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">It seems like you want to reset your password at C2CRide. No worries, it's a quick and easy process!</td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Here's your 4-digit code to get started:</td></tr>
                <tr><td height="40"></td></tr>
                <tr><td style="text-align: center;"><a href="javascript:void(0)" style="min-width: 150px; display: inline-block; background-color: #00B77B; text-decoration: none; padding: 12px 20px; font-size: 13px; font-weight: 500; color: #ffffff;">{{$user->code}}</a></td></tr>
                <tr><td height="40"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Simply enter the code were prompted and follow the steps to create a new secure password.</td></tr>
                <tr><td height="25"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;"><span style="color: #00B77B;">Note:</span> If you didn’t request a password reset, please ignore this email or contact us if you have any concerns.</td></tr>
                <tr><td height="25"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Happy Travelling,</td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Team <a href='{{url("/")}}' style="color: #00B77B;">C2CRide</a></td></tr>
            </table>
        </td>
        <td width="30">&nbsp;</td>
    </tr>
@endsection