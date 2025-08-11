@if (count($rides) > 0)
    @foreach ($rides as $ride)
        <div class="table-row">
        <div class="table-col">
                <div class="main-table-checkbox">
                    <div class="table-checkbox">
                        <label class="gerenric_checkbox"><input type="checkbox" name="ride_id[]" value="{{$ride->id}}" ><span class="checkmark"></span></label>
                    </div>
                    <div class="number-sign">{{$ride->booking_code}}<br> <span>{{date('D,M', strtotime($ride->created_at))}}<br> {{date('d', strtotime($ride->created_at))}}, {{date('H:i A', strtotime($ride->created_at))}}</span></div>
                </div>
            </div>
            <div class="table-col">
                <div class="table-booking-info">
                    <div class="bkg-block">
                        <div class="bkg-lctn-main">
                            <div class="bkg-lctn">{{$ride->source}}</div>
                            <div class="bkg-lctn">{{$ride->destination}}</div>
                        </div>
                    </div>
                    <div class="bkg-block">
                        <div class="bkg-row">{{date('D, M d', strtotime($ride->date_time))}}, {{date('h:i A', strtotime($ride->date_time))}}</div>
                    </div>
                    <div class="bkg-block">
                        @if($ride->way=='2')
                            {{count($ride->coupons)>0? currenyformat($ride->price - ($ride->price * $ride->coupons[0]['discount_percentage']) / 100):currenyformat($ride->price)}} AED |
                        @else
                            {{count($ride->coupons)>0? currenyformat($ride->price - ($ride->price * $ride->coupons[0]['discount_percentage']) / 100):currenyformat($ride->price)}}
                            AED |
                        @endif
                        {{$ride->price}} AED
                        @if($ride->payment_method=='cash')
                            | Cash <img src="{{asset('images/cash_icon.svg')}}" alt="">
                        @elseif($ride->payment_method=='card')
                            |   Card <img src="{{asset('images/card_icon.svg')}}" alt="">
                        @endif
                        @if($ride->flight_number)
                            | F#: {{$ride->flight_number}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="table-col">
                <div class="table-ride-detail">
                    <div class="rd-block">
                        <div class="rd-pasanger-dt">
                            <div class="pgr-col"><img src="{{asset('images/airport_city_ride_icon_t.svg')}}" alt=""></div>
                            <div class="pgr-col"><img src="{{asset('images/laguages_icon_t.svg')}}" alt=""> x{{$ride->luggage}}</div>
                            <div class="pgr-col"><img src="{{asset('images/passenger_icon_t.svg')}}" alt=""> x{{$ride->adults}}</div>
                            <div class="pgr-col"><img src="{{asset('images/childseat_icon_t.svg')}}" alt=""> x{{$ride->child_seats}}</div>
                        </div>
                    </div>
                    <div class="rd-block">
                        <div class="rd-kg">
                            @if($ride->distance>0)
                                <div class="rd-kg-col">{{$ride->distance}} km<br>{{$ride->duration}}</div>
                            @endif
                            <div class="rd-kg-col">
                                @if($ride->ridetype->type=='city')
                                    <img src="{{asset('images/city_rides_icon_t.svg')}}" alt="">
                                @elseif($ride->ridetype->type=='driver')
                                    <img src="{{asset('images/personal_driver_link_icon.svg')}}" alt="">
                                @elseif($ride->ridetype->type=='tour')
                                    <img src="{{asset('images/city_rides_icon1_t.svg')}}" alt="">
                                @endif
                                @if($ride->way == '2')
                                    <div class="rd-kg-cricle">
                                        <img src="{{asset('images/return_icon_t.svg')}}" alt="">
                                        <div class="rd-way">02</div>
                                    </div>
                                @else
                                    <div class="rd-kg-cricle">
                                        <img src="{{asset('images/one_way_arrow_icon_t.svg')}}" alt="">
                                        <div class="rd-way">01</div>
                                    </div>
                                @endif
                                @if($ride->photograph=='on')
                                    <div class="rd-kg-col">
                                        <img src="{{asset('images/city_rides_icon2_t.svg')}}" alt="">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="rd-block">
                        <div class="rd-car-type"><div class="car-icon">
                                <img src="{{asset('images/car_icon2_t.png')}}" alt=""></div>
                            <div class="car-text">{{!empty($ride->vehicle->title) ? $ride->vehicle->title : $ride->car}} 
                                <div class="car-number" data-bs-toggle="modal" data-bs-target="#chuffeure_popup">01</div></div></div>
                    </div>
                    @if($ride->meet_greet)
                        <div class="rd-block">
                            <div class="rd-car-type">
                                <div class="car-icon">
                                    <img src="{{asset('images/meet_greet_icon_t.svg')}}" alt="">
                                </div>
                                <div class="car-text">{{$ride->meet_greet}}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="table-col">
                <div class="table-ride-book">
                    <div class="rd-bk-block">
                        <div class="rd-bk-code">
                            <div class="rd-bk-text">{{$ride->user->id}}  <img src="{{asset('images/user_code_icon_t.svg')}}" alt=""> {{$ride->user->total_rides}} <img src="images/user_icon1_t.svg" alt=""></div>
                            <div class="rd-bk-text"><span>{{date('D, M, d, Y', strtotime($ride->ride_date))}}</span></div>
                        </div>
                    </div>
                    <div class="rd-bk-block">
                        <div class="rd-bk-drop">
                            <div class="rd-dp-col"><img src="{{asset('images/user_icon1_t.svg')}}" alt="">  {{$ride->user->completed_rides}}</div>
                            <div class="rd-dp-col"><img src="{{asset('images/user_icon2_t.svg')}}" alt=""> 02</div>
                            <div class="rd-dp-col"><img src="{{asset('images/user_icon3_t.svg')}}" alt=""> 05</div>
                            <div class="rd-dp-col"><img src="{{asset('images/user_icon4_t.svg')}}" alt="">{{$ride->user->canceled_rides}}</div>
                        </div>
                    </div>
                    <div class="rd-bk-block">
                        <div class="rd-bk-billing"  data-bs-toggle="modal" data-bs-target="#billing_popup"><div class="bill-icon"><img src="{{asset('images/billing_details_icon_t.svg')}}" alt=""></div><div class="bill-text">Billing Details</div></div>
                    </div>
                </div>
            </div>
            <div class="table-col">
                <div class="table-user-detail">
                    <div class="usr-block">{{$ride->display_name}}</div>
                    <div class="usr-block"><a href="javascript:void(0)">{{$ride->email}}</a></div>
                    <div class="usr-block"><a  href="https://wa.me/{{isset($ride->user->mobile_number)?$ride->user->mobile_number:''}}" target="_blank"><img src="{{asset('images/call_icon_t.svg')}}" alt=""> {{isset($ride->user->mobile_number)?$ride->user->mobile_number:''}}</a></div>
                    @if($ride->whatsapp_number)
                        <div class="usr-block">
                            <a  href="https://wa.me/{{$ride->whatsapp_number}}" target="_blank">
                                <img src="{{asset('images/whatsapp_icon_t.svg')}}" alt=""> {{$ride->whatsapp_number}}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="table-col">
                <div class="table-ride-status">
                    <div class="ride-status-col">
                        <div class="rd-status-block">
                            <div class="table-select-box">
                                <select name="ride_status" class="ride_status" data-ride_id="{{$ride->id}}">
                                    <option value="1" {{$ride->status=='1'?'selected':''}}>Completed</option>
                                    <option value="2" {{$ride->status=='2'?'selected':''}}>Pending</option>
                                    <option value="3" {{$ride->status=='3'?'selected':''}}>Cancelled</option>
                                    <option value="4" {{$ride->status== '4'?'selected':''}}>Confirmed</option>
                                    <option value="5" {{$ride->status== '5'?'selected':''}}>Assigned </option>
                                    <option value="6" {{$ride->status== '6'?'selected':''}}>Driver enroute</option>
                                    <option value="7" {{$ride->status== '7'?'selected':''}}>Driver at Location</option>
                                    <option value="8" {{$ride->status== '8'?'selected':''}}>En route to Drop off</option>
                                </select>
                                @if ($ride->status == 3)
                                    <br>
                                    <br>
                                    <a class="text-danger" href="#" id="reasons" data-resons="{{ $ride->cancel_remarks }}">View Reasons</a>      
                                @endif
                            </div>
                        </div>
                        <div class="rd-status-block">
                            <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assign_me_popup">Assign Me!</div>

                            
                        </div>
                        @if($ride->status == 1 && !empty($ride->driver->nick_name))
                            Driver: {{ $ride->driver->nick_name }} <br>
                            Assigned amount : {{ number_format($ride->assigned_amount) }} AED
                        @endif
                        <br>
                        @if (!empty($ride->ride_updatedby->name) && !empty($ride->driver->name))
                            Driver Assigned By : <span class="text-primary"><strong>{{ ucwords($ride->ride_updatedby->name)}}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="table-col">
                <div class="table-action">
                    <a href="javascript:void(0)"><img src="{{asset('images/edit_icon_t.svg')}}" alt=""  data-bs-toggle="modal" data-bs-target="#booking_edit_popup"></a>
                    <a href="javascript:void(0)"><img src="{{asset('images/email_icon_t.svg')}}" alt="" data-bs-toggle="modal" data-bs-target="#email_enter_popup"></a>
                    <a href="javascript:void(0)" class="download-icon" data-ride-id="{{$ride->id}}">
                        <img src="{{asset('images/download_icon_t.svg')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <h3 class="text-center">No records found</h3>
@endif
