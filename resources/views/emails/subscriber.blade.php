@extends('emails.mail')
@section('content')
    <tr>
        <td width="30">&nbsp;</td>
        <td width="540">
            <table width="100%" cellpadding="0" cellspacing="0" >
                <tr><td><img src="{{asset('assets/images/email/subscriber_icon.png')}}" alt="" style="max-width: 100%; display: block; margin: auto;"></td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 15px; line-height: 140%; font-weight: 600; color: #000; text-align: center;">Welcome to C2CRides!</td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Hi,</td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Thank you for subscribing and welcome to the C2CRide family! Your journey towards seamless and luxurious rides starts now.</td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: bold; color: #000;">Enjoy 50% off on your first 5 rides!</td></tr>
                <tr><td height="40"></td></tr>
                <tr><td style="text-align: center;"><a href="javascript:void(0)" style="background-color: #00B77B; text-decoration: none; padding: 12px 20px; font-size: 13px; font-weight: 500; color: #ffffff;">Activate Your Ultimate Deal Now!</a></td></tr>
                <tr><td height="40"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Relax with our on-board refreshments and free Wi-Fi.</td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Travel in comfort with our professional chauffeurs.</td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Ready to experience luxury travel? <a href="{{url('/')}}"><span style="color: #00B77B;">Book your first ride</span></a> now and let the adventures begin!</td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Happy Travelling,</td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;"><a href="{{url('https://wa.me/+971585603086')}}">Team C2CRide</a>/td></tr>
            </table>
        </td>
        <td width="30">&nbsp;</td>
    </tr>
@endsection