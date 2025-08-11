@extends('emails.mail_contact')
@section('content')
    <tr>
        <td width="30">&nbsp;</td>
        <td width="540">
            <table width="100%" cellpadding="0" cellspacing="0" >
                <tr><td><img src="{{asset('images/booking_request_icon.png')}}" alt="" style="max-width: 100%; display: block; margin: auto;"></td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 15px; line-height: 140%; font-weight: 600; color: #000; text-align: center;">{{ $subject }}</td></tr>
                <tr><td height="20"></td></tr>
                
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;"></td></tr>
                <tr><td height="20"></td></tr>
                
                <tr><td height="30"></td></tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #EDEDED; padding: 15px;">
                           
                            <tr>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #575757;">
                                    {!! html_entity_decode($message) !!}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
            </table>
        </td>
        <td width="30">&nbsp;</td>
    </tr>
@endsection
