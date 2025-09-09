@if (count($rides) > 0)
@foreach ($rides as $key=>$ride)
<div class="table-row flex-wp">
    <div class="table-col">
        <div class="main-table-checkbox">
            <div class="table-checkbox">
                <label class="gerenric_checkbox"><input type="checkbox" name="ride_id[]" value="{{$ride->id}}"><span class="checkmark"></span></label>
            </div>
            <div class="number-sign">{{$ride->booking_code}}<br> <span>{{date('D, M', strtotime($ride->created_at))}}<br> {{date('d', strtotime($ride->created_at))}}, {{date('h:i A', strtotime($ride->created_at))}}</span></div>
        </div>
    </div>
    <div class="table-col">
        <div class="table-booking-info">
            <div class="bkg-block">
                <div class="bkg-lctn-main">
                    <div class="bkg-lctn"><a href="https://maps.google.com/?q={{$ride->source}}" target="_blank">
                            {{$ride->source}}</a></div>
                    <div class="bkg-lctn"><a href="https://maps.google.com/?q={{$ride->destination}}" target="_blank">{{$ride->destination}}</a></div>
                </div>
            </div>
            @if($ride->old_date_time)
            <div class="bkg-block">
                <div class="bkg-row">
                    <div class="bkg-col color-red"><del>{{date('D, M d', strtotime($ride->old_date_time))}},<br> {{date('h:i A', strtotime($ride->old_date_time))}}</del></div>
                    <div class="bkg-col">{{date('D, M d', strtotime($ride->date_time))}},<br> {{date('h:i A', strtotime($ride->date_time))}}</div>
                </div>
            </div>
            @else
            <div class="bkg-block">
                <div class="bkg-block">
                    <div class="bkg-row">{{date('D, M d', strtotime($ride->date_time))}}, {{date('h:i A', strtotime($ride->date_time))}}</div>
                </div>
            </div>
            @endif
            <div class="bkg-block">
                {{ $ride->price }} AED @if(!empty($ride->currency)) 
                ( {{ strtoupper($ride->currency) }} )
                 
             @endif|
                @if($ride->payment_method =='cash')
                Cash <img src="{{asset('images/cash_icon.svg')}}" alt="">
                @if($ride->flight_number)
                | F#: {{$ride->flight_number}}
                @endif
                @elseif($ride->payment_method=='card')
                Card <img src="{{asset('images/card_icon.svg')}}" alt="">
                @if($ride->flight_number)
                | F#: {{$ride->flight_number}}
                @endif
                @endif
            </div>
        </div>

    </div>
    <div class="table-col">
        <div class="table-ride-detail">
            <div class="rd-block">
                <div class="rd-pasanger-dt">
                    <div class="pgr-col"><img src="{{asset('images/location_icon_t.svg')}}" alt=""></div>
                    <div class="pgr-col"><img src="{{asset('images/laguages_icon_t.svg')}}" alt=""> x{{!empty($ride->vehicle->suitcases) ? $ride->vehicle->suitcases : 0}}</div>
                    <div class="pgr-col"><img src="{{asset('images/passenger_icon_t.svg')}}" alt="">
                        @php $passengers = 0; @endphp

                        @if (((int) $ride->adults + (int) $ride->children + (int) $ride->luggage) == 0)
                            @if($ride->ride_type_id != 4)
                              @php $passengers = $ride->vehicle->passengers; @endphp
                            @elseif(!empty($ride->safariPackage->persons))
                             @php $passengers = $ride->safariPackage->persons; @endphp
                            @endif
                         @else 
                          @php $passengers = (int) $ride->adults + (int) $ride->children + (int) $ride->luggage; @endphp
                        @endif
                        x{{ $passengers }}</div>
                    <div class="pgr-col"><img src="{{asset('images/childseat_icon_t.svg')}}" alt=""> x{{$ride->child_seats}}</div>
                </div>
            </div>
            <div class="rd-block">
                <div class="rd-kg">
                    @if($ride->distance>0)
                    <div class="rd-kg-col">{{$ride->distance}} km<br>{{$ride->duration}}</div>
                    @endif
                    <div class="rd-kg-col">
                        @if($ride->ride_type_id == 1)
                        <img src="{{asset('images/city_rides_icon_t.svg')}}" alt="">
                        @elseif($ride->ride_type_id == 2)
                        <img src="{{asset('images/personal_driver_link_icon.svg')}}" alt="">
                        @elseif($ride->ride_type_id == 3)
                        <img src="{{asset('images/city_rides_icon1_t.svg')}}" alt="">
                        @elseif($ride->ride_type_id == 4)
                        <img src="{{asset('images/airport_city_ride_icon_t.svg')}}" alt="">
                        @endif
                        @if($ride->way == '2')
                        @php $previousid=$ride->id-1; @endphp
                        <div class="rd-kg-cricle">
                            <img src="{{asset('images/return_icon_t.svg')}}" alt="">
                            @if($ride->parent_id =='')
                            <div class="rd-way">01</div>
                            @elseif($ride->parent_id==$previousid)
                            <div class="rd-way">02</div>
                            @endif
                        </div> 
                        @else
                        <div class="rd-kg-cricle">
                            <img src="{{asset('images/one_way_arrow_icon_t.svg')}}" alt="">
                            <!-- <div class="rd-way">01</div> -->
                        </div>
                        @endif
                        @if($ride->ride_type_id == 2)
                            <div class="rd-kg-col d-flex align-items-center" style="margin-left: -122px;">
                                {{$ride->duration}} hrs
                            </div>
                        @endif

                        @if($ride->ride_type_id == 3)
                          <div class="rd-kg-col d-flex align-items-center" style="margin-left: -122px;">
                                {{$ride->duration}} hrs
                            </div>
                        @endif
                        @if($ride->ride_type_id == 4)
                          <div class="rd-kg-col d-flex align-items-center" style="margin-left: -122px;">
                                {{$ride->duration}} hrs
                            </div>
                        @endif
                    </div>
                    
                </div>
            </div>
            <div class="rd-block">
                <div class="rd-car-type">
                    <div class="car-icon">
                        <img src="{{asset('images/car_icon1_t.png')}}" alt="">
                    </div>
                    <div class="car-text">
                        {{!empty($ride->vehicle->title) ? $ride->vehicle->title : $ride->car}}
                        <!-- <div class="car-number" data-bs-toggle="modal" data-bs-target="#chuffeure_popup">01</div> -->
                    </div>
                </div>
            </div>
                @if($ride->photography_amount > 0)
                     <br>
                    <div class="rd-kg-col">
                        ({{ $ride->photograph}}) <span style="margin-left: 5px; margin-right:5px;"><img src="{{asset('images/city_rides_icon2_t.svg')}}" alt=""></span> ({{ $ride->photography_amount }})
                    </div>

                    @endif
                    @if($ride->children_seat_amount > 0)
                    <br>
                    

                    @endif
                    @if($ride->tip_amount > 0)
                    <br>
                    <div class="rd-kg-col">

                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.5735 19.5401C25.1885 22.6434 22.6452 25.1867 19.5418 25.5717C17.6635 25.8051 15.9135 25.2917 14.5485 24.2884C13.7668 23.7167 13.9535 22.5034 14.8868 22.2234C18.3985 21.1617 21.1635 18.3851 22.2368 14.8734C22.5168 13.9517 23.7302 13.7651 24.3018 14.5351C25.2935 15.9117 25.8068 17.6617 25.5735 19.5401Z" fill="#292D32"></path>
                        <path d="M11.6547 2.33203C6.50967 2.33203 2.33301 6.5087 2.33301 11.6537C2.33301 16.7987 6.50967 20.9754 11.6547 20.9754C16.7997 20.9754 20.9763 16.7987 20.9763 11.6537C20.9647 6.5087 16.7997 2.33203 11.6547 2.33203ZM10.558 10.347L13.3697 11.327C14.3847 11.6887 14.8747 12.4004 14.8747 13.497C14.8747 14.757 13.8713 15.7954 12.6463 15.7954H12.5413V15.8537C12.5413 16.332 12.1447 16.7287 11.6663 16.7287C11.188 16.7287 10.7913 16.332 10.7913 15.8537V15.7837C9.49634 15.7254 8.45801 14.6404 8.45801 13.287C8.45801 12.8087 8.85467 12.412 9.33301 12.412C9.81134 12.412 10.208 12.8087 10.208 13.287C10.208 13.707 10.5113 14.0454 10.8847 14.0454H12.6347C12.903 14.0454 13.113 13.8004 13.113 13.497C13.113 13.0887 13.043 13.0654 12.7747 12.972L9.96301 11.992C8.95967 11.642 8.45801 10.9304 8.45801 9.82203C8.45801 8.56203 9.46134 7.5237 10.6863 7.5237H10.7913V7.47703C10.7913 6.9987 11.188 6.60203 11.6663 6.60203C12.1447 6.60203 12.5413 6.9987 12.5413 7.47703V7.54703C13.8363 7.60536 14.8747 8.69036 14.8747 10.0437C14.8747 10.522 14.478 10.9187 13.9997 10.9187C13.5213 10.9187 13.1247 10.522 13.1247 10.0437C13.1247 9.6237 12.8213 9.28537 12.448 9.28537H10.698C10.4297 9.28537 10.2197 9.53037 10.2197 9.8337C10.208 10.2304 10.278 10.2537 10.558 10.347Z" fill="#292D32"></path>
                    </svg>
                        
                        
                        ({{ $ride->tip_amount }})
                    </div>

                    @endif

                    @if (!empty($ride->note))
                        <div class="rd-kg-col d-flex align-items-center">
                            Note: <br>
                            {{ $ride->note }}
                        </div>
                    @endif
                    @if($ride->ride_type_id == 3)
                    <div class="rd-kg-col d-flex align-items-center">
                        {{$ride->tour_city}}
                    </div>
                    @endif
                    
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
                    <div class="rd-bk-text">
                        {{ optional($ride->user)->id }}
                        <img src="{{ asset('images/user_code_icon_t.svg') }}" alt="">
                        {{ optional($ride->user)->total_rides }}
                    </div>
                    <div class="rd-bk-text"><span>{{date('D, M d', strtotime($ride->date_time))}}, {{date('h:i A', strtotime($ride->date_time))}}</span></div>
                </div>
            </div>
            <div class="rd-bk-block">
                <div class="rd-bk-drop">
                    <div class="rd-dp-col"><img src="{{asset('images/user_icon1_t.svg')}}" alt=""> {{count($ride->user->completeRides)}}</div>
                    <div class="rd-dp-col"><img src="{{asset('images/user_icon2_t.svg')}}" alt=""> </div>
                    <div class="rd-dp-col"><img src="{{asset('images/user_icon3_t.svg')}}" alt=""> {{ count($ride->user->pendingRides)   }}</div>
                    <div class="rd-dp-col"><img src="{{asset('images/user_icon4_t.svg')}}" alt=""> {{ count($ride->user->cancelRides)  }}</div>
                </div>
            </div>
            <div class="rd-bk-block">
                <div class="rd-bk-billing" data-bs-toggle="modal" data-bs-target="#billing_popup">
                    <div class="bill-icon">
                        <img src="{{asset('images/billing_details_icon_t.svg')}}" alt="">
                    </div>
                    <div class="bill-text">Billing Details</div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-col">
        <div class="table-user-detail">
            <div class="usr-block">{{$ride->display_name}}</div>
            <div class="usr-block"><a href="javascript:void(0)">{{$ride->email}}</a></div>
            @if($ride->mobile_number)
            <div class="usr-block"><a href="https://wa.me/{{isset($ride->mobile_number)?$ride->mobile_number:''}}" target="_blank"><img src="{{asset('images/call_icon_t.svg')}}" alt=""> {{isset($ride->mobile_number)?$ride->mobile_number:''}}</a></div>
            @endif

            @if($ride->whatsapp_number)
            <div class="usr-block">
                <a href="https://wa.me/{{$ride->whatsapp_number}}" target="_blank">
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
                        <select name="ride_status" class="ride_status" data-ride_id="{{$ride->id}}" @if($ride->status == '3') disabled @endif>
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
                <div class="rd-status-block table-select-box">
                    {{-- <div class="btn btn-primary" id="assign-me" data-ride_id="{{$ride->id}}">Assign Me!</div> --}}
                    <select class="driver-select" name="ride_driver" id="" data-ride_id="{{$ride->id}}" data-status="5" @if($ride->status == '8' || $ride->status == '3') disabled @endif>
                        <option value="">Assign Driver</option>
                        @foreach (\App\Models\User::where('role_id',3)->get() as $item)
                            <option value="{{ $item->id }}" @if ($ride->driver_id == $item->id) selected @endif>{{ $item->nick_name }}</option>
                        @endforeach
                    </select>
                </div>
                @if(!empty($ride->driver->name))
                    {{-- <div class="ml-5">{{ $ride->driver->name}}</div> --}}
                @endif
                @if($ride->status == 1)
                <br>
                    <a href="javascript:void(0)">Assigned amount : {{ currenyformat($ride->assigned_amount) }} AED <br> 
                        

                    </a>
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
            <a class="edit-booking" data-ride_id="{{$ride->id}}" href="javascript:void(0)"><img src="{{asset('images/edit_icon_t.svg')}}" alt=""></a>
            <a href="javascript:void(0)"><img src="{{asset('images/calender_icon_t.svg')}}" alt=""></a>
            <a href="javascript:void(0)"><img src="{{asset('images/email_icon_t.svg')}}" alt="" data-bs-toggle="modal" data-bs-target="#email_enter_popup"></a>

            {{-- <a href="javascript:void(0)" class="download-icon" data-ride-id="{{$ride->id}}">
                <img src="{{asset('images/download_icon_t.svg')}}" alt="">
            </a> --}}
        </div>
    </div>
</div>
@endforeach
@else
<h3 class="text-center">No records found</h3>
@endif
