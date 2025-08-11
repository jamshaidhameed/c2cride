@extends('emails.mail')
@section('content')
    <tr>
        <td width="30">&nbsp;</td>
        <td width="540">
            <table width="100%" cellpadding="0" cellspacing="0" >
                <tr><td><img src="{{asset('images/booking_confirmation_icon.png')}}" alt="" style="max-width: 100%; display: block; margin: auto;"></td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 15px; line-height: 140%; font-weight: 600; color: #000; text-align: center;">Booking Completed</td></tr>
                <tr><td style="font-size: 15px; line-height: 140%; font-weight: 600; color: #000; text-align: center;">Booking Type : 
                @php $ride_type = \App\Models\RideType::where('id',$ride->ride_type_id)->first(); @endphp
                @if (!empty($ride_type))
                    {{ $ride_type->type }}
                @endif    
                </td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Hi {{ $ride->display_name }},</td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">We are sending you this email to inform you that your Ride is Completed.</td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 500; color: #000;"><img src="{{asset('images/ride_icon.png')}}" alt=""> &nbsp; Ride Request #{{$ride->booking_code}}</td></tr>
                <tr><td height="30"></td></tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #E6FFF7; padding: 15px;">
                            <tr>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 500; color: #575757;">#{{$ride->booking_code}}</td>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 500; text-align: right; color: #575757;"><img src="{{asset('images/economy_icon.png')}}" alt=""> {{ ucfirst($ride->car) }}</td>
                            </tr>
                            <tr><td height="5"></td></tr>
                            <tr>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #575757;">{{ date('D, M d h:i A', strtotime($ride->created_at)) }}</td>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 400; text-align: right; color: #575757;">{{ $ride->distance }} Kilometer
                                    / {{ str_replace('mins','min',str_replace('hour','hr',$ride->duration)) }}</td>
                            </tr>
                            <tr><td height="15"></td></tr>
                            <tr>
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td width="10"><img src="{{asset('images/pick_icon.png')}}" alt=""></td>
                                            <td style="font-size: 13px; line-height: 140%; font-weight: 500; color: #000000;">{{ $ride->source }}</td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{asset('images/line_border.png')}}" alt="" style="height: 15px; margin-left: 6px;"></td>
                                        </tr>
                                        <tr>
                                            <td width="10"><img src="{{asset('images/drop_icon.png')}}" alt=""></td>
                                            <td  style="font-size: 13px; line-height: 140%; font-weight: 500; color: #000000;">
                                                @if($ride->ride_type_id == 4)
                                                {{ $ride->source }}
                                                @else    
                                                {{ $ride->destination }}
                                            @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr><td height="10"></td></tr>
                            <tr>
                                @if(!is_null($ride->old_date_time))
                                <td width="50%" style="font-size: 13px; padding: 8px 10px 8px 0px; border-top: 1px solid #A0A0A0; border-bottom: 1px solid #A0A0A0; border-right: 1px solid #A0A0A0; line-height: 140%; font-weight: 500; color: #E62525;">{{ date('D, M d', strtotime($ride->old_date_time)) }} <br>{{ date('h:i A', strtotime($ride->old_date_time)) }}</td>
                                @endif
                                <td width="50%" style="font-size: 13px; padding: 8px 0px 8px 10px;  border-top: 1px solid #A0A0A0; border-bottom: 1px solid #A0A0A0; line-height: 140%; font-weight: 500; color: #000000;">{{ date('D, M d', strtotime($ride->date_time)) }}<br>{{ date('h:i A', strtotime($ride->date_time)) }}</td>
                            </tr>
                            <tr><td height="10"></td></tr>
                            <tr>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 500; color: #000000;">Request Details</td>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 400; text-align: right; color: #575757;">
                                    @if($ride->ride_type_id == 1)
                                        <img src="{{asset('images/city_icon.png')}}" alt=""> Ride Booking
                                    @elseif($ride->ride_type_id == 2)
                                        <img src="{{asset('images/city_icon.png')}}" alt=""> Hourly Booking
                                    @elseif($ride->ride_type_id==3)
                                        <img src="{{asset('images/ride_icon.png')}}" alt=""> City Tour
                                    @elseif($ride->ride_type_id==4)
                                        <img src="{{asset('images/driver_link_icon.svg')}}" alt=""> Desert Safari
                                    @endif
                                </td>
                            </tr>
                            <tr><td height="15"></td></tr>
                           <tr>
                                @php $vehicle = \App\Models\Vehicle::find($ride->car_id); @endphp
                                <td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #575757;"><img src="{{asset('images/passengers_icon.png')}}" alt=""> Passengers:</td>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 400; text-align: right; color: #000000;">
                                    @php $passengers = $ride->adults + $ride->children + $ride->luggage; @endphp
                                    @if($ride->ride_type_id != 4)
                                    
                                    @if($passengers > 0)
                                    {{ $passengers }}
                                    @elseif(!empty($vehicle))
                                     {{ $vehicle->passengers}}
                                    @endif
                                    @endif

                                    @if($ride->ride_type_id == 4)
                                        @php $package = \App\Models\SafariPackages::find($ride->car_id)->first(); @endphp

                                        @if ($passengers == 0 && !empty($package))
                                            {{ $package-> persons}}
                                         @else 
                                          {{ $passengers }}
                                        @endif
                                    @endif
                                    x</td>
                            </tr>
                            <tr><td height="5"></td></tr>
                             <!-- <tr>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #575757;"><img src="{{asset('images/languages_icon.png')}}" alt=""> Luggages:</td>
                                <td style="font-size: 13px; line-height: 140%; font-weight: 400; text-align: right; color: #000000;">{{$ride->luggage}}x</td>
                            </tr> -->
                        </table>
                    </td>
                </tr>
                <tr><td height="30"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Enjoy the ride with C2C Ride a leading ride hailing services company.</td></tr>
                <tr><td height="25"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;"><span style="color: #00B77B;">Note:</span> If you have any questions regarding the booking, feel free to use our support system.</td></tr>
                <tr><td height="25"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Happy Travelling,</td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;">Team <a href="https://c2crides.com/" style="color: #00B77B; text-decoration: underline;">C2C</a></td></tr>
                <tr><td height="20"></td></tr>
                <tr><td style="font-size: 13px; line-height: 140%; font-weight: 400; color: #000;display: inline-flex; vertical-align: middle;"><img src="{{asset('images/whatsapp_icon.png')}}" alt=""> &nbsp; <a href="https://wa.me/+971585603086"  style="color: #000; text-decoration: underline;">+971 58 560 3086</a></td></tr>
            </table>
        </td>
        <td width="30">&nbsp;</td>
    </tr>
@endsection
