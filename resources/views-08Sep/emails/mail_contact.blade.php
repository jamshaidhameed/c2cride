<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="font-family: 'Work Sans', sans-serif; max-width: 600px; background-color: #F7F7F7;">
    <tr>
        <td colspan="3" width="100%" style=" text-align: center; height: 100px; background-color: #000;">
            <a href='{{url("/")}}'><img src="{{asset('/images/logo.png')}}" alt="" style="max-width: 100%; display: block; margin: auto;"></a>
        </td>
    </tr>
    <tr>
        <td height="20"></td>
    </tr>
    @yield('content')
    <tr>
        <td height="60"></td>
    </tr>
    <tr>
        <td colspan="3">
            <table width="100%" cellpadding="0" cellspacing="0" style=" text-align: center; background-color: #000;">
                <tr>
                    <td width="30">&nbsp;</td>
                    <td width="540">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td><img src="{{asset('/images/logo.png')}}" alt="" style="max-width: 100%; display: block; margin: auto;"></td>
                            </tr>
                            <tr>
                                <td height="25"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #ffffff;">Copyright © {{ date('Y') }} C2C Ride,</td>
                            </tr>
                            <tr>
                                <td height="5"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #ffffff;"></td>
                            </tr>
                            <tr>
                                <td height="30"></td>
                            </tr>
                        </table>
                    </td>
                    <td width="30">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>

</html>
