<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>C2CRides-Invoice</title>
</head>

<body style="padding: 0px; margin: 0px; box-sizing: border-box;">
    <style>
        @media print {
            #printContainer {
                min-height: 100vh;
            }
        }
    </style>
    <div id="printContainer"
        style="box-sizing: border-box; border-top: 10px solid #0FA85C;  border-bottom: 10px solid #0FA85C; padding: 0px; margin: 0px;  width: 49rem;  min-width: 49rem; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.25); border-radius: 6px; margin-left:-2.5rem;">
        <div style=" padding: 50px 20px; font-size: 14px; color: #000;">
            <div style="width:  50em; padding-bottom: 34px;">
                <table style="width:  50em;">
                    <tbody>
                        <tr>
                            <td width="460px" valign="top">
                                <table border="0">
                                    <tbody>
                                        <tr>
                                            <td
                                                style="padding: 0px; margin: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight: 600; line-height: 1.2em; padding-bottom:5px;">
                                                Invoice #{{ rand(1000, 9999) }}</td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="padding: 0px; margin: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight: 600; line-height: 1.2em; padding-bottom:5px;">
                                                Booking #{{ $ride->booking_code}}</td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="padding: 0px; margin: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 20px; font-weight: 600; line-height: 1.2em;">
                                                Ride Type #
                                            {{ !empty($ride->ridetype->type) ? $ride->ridetype->type : ''}}
                                      </td>
                                        </tr>
                                        <tr>
                                            <td height="25"></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 1.5em;">
                                                C2C Ride <br>
                                                info@c2cride.com <br>
                                                United Arab Emirates</td>
                                        </tr>
                                        <tr>
                                            <td height="25"></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style=" padding: 0px; margin: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 1.5em;">
                                                <small
                                                    style="max-width: 250px;  display: block; text-transform: uppercase; font-size: 1em;  border-bottom: 1px solid #DFDFDF; color: #000; padding: 0px; margin:0px 0px 6px 0px;">BILL
                                                    TO:</small>
                                                {{ $ride->display_name }}<br>
                                                {{ $ride->mobile_number }} <br>
                                                {{ $ride->email }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td valign="top" width="130">
                                <table border="0" style="text-align: center; margin-left: auto;">
                                    <tbody>
                                        <tr>
                                            <td
                                                style="display: block; font-family: Arial, Helvetica, sans-serif; max-width: 130px; padding-bottom: 20px; width: 60%; margin: auto; ">
                                                <img style="display: block; max-width: none; width: 100%; height: auto;"
                                                    src="{{ public_path('front/images/logo.svg') }}" alt="#">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="margin: 0px; font-family: Arial, Helvetica, sans-serif; display: inline-block; text-align: center; padding: 0px 10px 6px 10px; font-size: 1.2em; border-bottom: 1px solid #DFDFDF; color: #000;">
                                                {{ date_format(date_create($ride->ride_date),'d/m/Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width:  50em;margin-bottom: 10px;margin-right:3em;margin-left:-0.9rem;">
                <table class="invoiceTable" style="width:100%; border-collapse: collapse;margin-left:10px;">
                <thead style="background-color: #0FA85C; color: #fff;">
                    <tr>
                        <th width="110"
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            Service</th>
                        <th
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            Description</th>
                        <th width="110"
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            Date</th>
                        <th width="110"
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            Unit Price</th>
                        <th width="110"
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            Total</th>
                    </tr>
                </thead>
                <tbody>
                     @php $add_on_amount = 0; @endphp
                    @if($ride->ride_type_id == 4)
                        @php $add_on = \App\Models\RideAddon::where('ride_id',$ride->id)->get()->sum("amount");
                            $add_on_amount = $add_on; 
                        @endphp
                    @endif
                    <tr>
                        <td
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            Pick up point</td>
                        <td
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            {{ $ride->source }} </td>
                        <td
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            {{ date_format(date_create($ride->ride_date),'D, M d')}} {{ \Carbon\Carbon::parse($ride->ride_time)->format('h:i A') }} </td>
                        <td
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            {{ number_format(($ride->price + $ride->discount_amount) - ($ride->children_seat_amount + $ride->photography_amount + $ride->tip_amount + $add_on_amount),2) }} AED  </td>
                        <td
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            {{ number_format(($ride->price + $ride->discount_amount) - ($ride->children_seat_amount + $ride->photography_amount + $ride->tip_amount + $add_on_amount),2) }} AED </td>
                    </tr>
                    <tr style="background-color: #F5F4F1;">
                        <td
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            Drop of point</td>
                        <td
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                            {{ $ride->destination }} </td>
                        <td
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                        </td>
                        <td
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                        </td>
                        <td
                            style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #DFDFDF;  padding: 8px; text-align: left; line-height: 1.4em;">
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
           <div style="width: 50rem;">
             <table class="invoiceFooter" style="width:85%; margin-left:15px;">
                <tbody>
                    <tr>
                        <td style="margin-right: auto;">
                            <img style="display: block; width: 200px;" width="250" src="{{ public_path('images/c2c_stamp.png') }}" alt="">
                        </td>
                        <td style="width: 15em;">
                            <table class="invoiceTotal" style="text-align: right;width:100%; margin-right: 2em;">
                                <tr>
                                    <td
                                        style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px;   color: #000000">
                                        Subtotal</td>
                                    <td width="110"
                                        style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px; border-bottom: 1px solid #DFDFDF; color: #000000">
                                        {{ number_format(($ride->price + $ride->discount_amount) - ($ride->children_seat_amount + $ride->photography_amount + $ride->tip_amount + $add_on_amount),2) }} AED</td>
                                </tr>
                                @if($ride->children_seat_amount > 0)
                                <tr>
                                    <td>Child Seat Amount: </td>
                                    <td width="110"><span>{{ number_format($ride->children_seat_amount,2) }} AED</span></td>
                                </tr>
                                @endif
                                @if($ride->photography_amount > 0)
                                <tr>
                                    <td style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px;   color: #000000">Photography Amount: </td>
                                    <td width="110" style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px; border-bottom: 1px solid #DFDFDF; color: #000000"><span>{{ number_format($ride->photography_amount,2) }} AED</span></td>
                                </tr>
                                @endif
                                @if($ride->tip_amount > 0)
                                    <tr>
                                        <td style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px;   color: #000000">Tip:</td>
                                        <td width="110" style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px; border-bottom: 1px solid #DFDFDF; color: #000000">
                                            <span>{{ number_format($ride->tip_amount,2)}} AED</span>
                                        </td>
                                    </tr>
                                @endif
                                @if($ride->ride_type_id == 4)
                                    @php $add_ons = \App\Models\RideAddon::where('ride_id',$ride->id)->get(); @endphp
                                    @if(count($add_ons) > 0)
                                    @foreach ($add_ons as $item)

                                    
                                        <tr>
                                            <td style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px;   color: #000000">
                                                {{ !empty($item->addon->title) ? $item->addon->title : "" }}
                                            </td>
                                            <td style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px; border-bottom: 1px solid #DFDFDF; color: #000000"> 
                                                <span>{{ number_format($item->amount,2)}} AED</span>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    
                                    @endif
                                @endif
                                <tr>
                                    <td
                                        style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px;   color: #000000">
                                        Discount</td>
                                    <td width="110"
                                        style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px; border-bottom: 1px solid #DFDFDF; color: #000000">
                                        {{ number_format($ride->discount_amount,2) }} AED</td>
                                </tr>
                                
                                {{-- <tr>
                                    <td
                                        style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px;   color: #000000">
                                        Tax Rate</td>
                                    <td width="110"
                                        style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px; border-bottom: 1px solid #DFDFDF; color: #000000">
                                        0.00%</td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px;   color: #000000">
                                        Total Tax</td>
                                    <td width="110"
                                        style="font-family: Arial, Helvetica, sans-serif;  font-size: 14px;  padding:8px 4px 4px 4px; border-bottom: 1px solid #DFDFDF; color: #000000">
                                        0.00 AED</td>
                                </tr> --}}
                                <tr>
                                    <td height="12"></td>
                                    <td height="12"></td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-family: Arial, Helvetica, sans-serif;  font-size: 16px; padding:8px 4px 4px 4px;   color: #000000; font-weight: 700;">
                                        Total</td>
                                    <td
                                        style="font-family: Arial, Helvetica, sans-serif;  font-size: 16px;  padding:8px 4px 4px 4px; border-bottom: 1px solid #DFDFDF; color: #000000; font-weight: 700;">
                                        {{ number_format($ride->price,2) }} AED </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
           </div>
        </div>
    </div>
</body>

</html>