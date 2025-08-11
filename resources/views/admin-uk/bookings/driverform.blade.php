<form id="personaldriverform" action="">
    @csrf
<div class="gerenric-form">
    <ul>
        <li>
            <div class="row">
                <div class="col-lg-4 mb-3"><label class="form-label">Pick-up Location</label>
                    <input name="source" type="text" class="form-control source2" placeholder="Street - Barsha Heights - Dubai - Elvish" value="{{$ride->source}}"></div>
                <div class="col-lg-4 mb-3"><label class="form-label">Drop-off Location</label>
                    <input type="text" name="destination" class="form-control destination2" placeholder="Street - Barsha Heights - Dubai - Elvish" value="{{$ride->destination}}"></div>
                <div class="col-lg-4"><label class="form-label">Date Time</label>
                    <input type="datetime-local" name="date_time" class="form-control" id="" placeholder="Ride Date" value="{{$ride->date_time}}"></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-7">
                    <label class="form-label">Ride Distance & Time</label>
                    <div class="row">
                        <div class="col-lg-7 mb-3">
                            <div class="form-icon-row">
                                <div class="form-icon2"><img src="{{asset('images/distance_icon_tp.svg')}}" alt=""></div>
                                <input type="text" name="distance" class="form-control pd-left-60" placeholder="102 km" value="{{$ride->distance}}">
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="form-icon-row">
                                <div class="form-icon2"><img src="{{asset('images/time_icon_tp.svg')}}" alt=""></div>
                                <input type="text" name="duration" value="{{$ride->duration}}" class="form-control pd-left-60" placeholder="04 hrs 30 mins">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Weeks</label>
                            <div class="passenger-add-tp big-add-field">
                                <div class="passenger-add-tp-inner">
                                    <input type="text" class="plusminus-input" name="driver_weeks" value="{{$ride->driver_weeks}}"  id="city_qty_5_PD" maxlength="6">
                                    <div class="plusminus-button">
                                        <span class="minus-btn city_min_5_PD">-</span><span class="plus-btn city_plus_5_PD">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Days</label>
                            <div class="passenger-add-tp big-add-field">
                                <div class="passenger-add-tp-inner">
                                    <input type="text" class="plusminus-input" name="driver_days" value="{{$ride->driver_days}}"  id="city_qty_6_PD" maxlength="6">
                                    <div class="plusminus-button">
                                        <span class="minus-btn city_min_6_PD">-</span><span class="plus-btn city_plus_6_PD">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </li>
        <li>
            <div class="row">
                <div class="col-lg-12"><label class="form-label">Passengers</label></div>
            </div>
            <div class="row">
                <div class="col-lg-3  mb-3">
                    <div class="passenger-add-tp">
                        <div class="form-icon2"><img src="{{asset('images/passenger_icon_tp.svg')}}" alt=""></div>
                        <div class="passenger-add-tp-inner">
                            <input type="text" class="plusminus-input" name="adults" id="city_qty_1_PD" maxlength="6">
                            <div class="plusminus-button">
                                <span class="minus-btn city_min_1_PD">-</span><span class="plus-btn city_plus_1_PD">+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="passenger-add-tp">
                        <div class="form-icon2"><img src="{{asset('images/kids_icon_tp.svg')}}" alt=""></div>
                        <div class="passenger-add-tp-inner">
                            <input type="text" class="plusminus-input" name="children" id="city_qty_2_PD" max="1">
                            <div class="plusminus-button">
                                <span class="minus-btn city_min_2_PD">-</span><span class="plus-btn city_plus_2_PD">+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="passenger-add-tp">
                        <div class="form-icon2"><img src="{{asset('images/laguages_icon_tp.svg')}}" alt=""></div>
                        <div class="passenger-add-tp-inner">
                            <input type="text" class="plusminus-input" name="luggage"  id="city_qty_3_PD" maxlength="6">
                            <div class="plusminus-button">
                                <span class="minus-btn city_min_3_PD">-</span><span class="plus-btn city_plus_3_PD">+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="passenger-add-tp">
                        <div class="form-icon2"><img src="{{asset('images/child_seat_icon_tp.svg')}}" alt=""></div>
                        <div class="passenger-add-tp-inner">
                            <input type="text" class="plusminus-input" name="child_seats" id="city_qty_4_PD" maxlength="6">
                            <div class="plusminus-button">
                                <span class="minus-btn city_min_4_PD">-</span><span class="plus-btn city_plus_4_PD">+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label class="form-label">Car Class</label>
                    <div class="form-icon-row">
{{--                        <div class="form-icon2"><img src="{{asset('images/car_icon1_t.png')}}" alt="">--}}
{{--                        </div>--}}
{{--                        <input type="text" name="car" class="form-control pd-left-60" placeholder="Economy" value="{{$ride->car}}">--}}
                        <select id="carselectdriver" name="car" class="form-control" >
                            <option value="">Select</option>
                            @foreach($car_type as $car)
                                <option {{$ride->car_id == $car->id ? 'selected':''}} value="{{$car->id}}">{{$car->car_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <label class="form-label">Amount </label>
                    <div class="row">
                        
                        <div class="col-6">
                            <input type="hidden" name="payment_method" value="{{isset($ride->payment_method) ? $ride->payment_method:'' }}">


                            <div class="form-icon-row">
                                <div class="form-icon2">
                                    <img src="{{asset('images/card_icon.svg')}}" alt="">
                                </div>
                                <input type="text" name="card_price" class="form-control cardw payment pd-left-60" placeholder="248" value="{{$ride->payment_method=='card'?$ride->price:0 }}">
                            </div>
                        </div>

                        <div class="col-6">

                            <div class="form-icon-row">
                                <div class="form-icon2">
                                    <img src="{{asset('images/cash_icon.svg')}}" alt="">
                                </div>
                                <input type="text" name="cash_price" class="form-control cash payment pd-left-60" placeholder="50" value="{{$ride->payment_method=='cash'?$ride->price:0 }}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <label for="" class="form-label">Assigned Amount</label>
                    <input type="text" name="assigned_amount" class="form-control" value="{{ $ride->assigned_amount }}" min="0" placeholder="Assigned Amount" id="" @if($ride->status == 8) disabled @endif>

                </div>
            </div>
        </li>
        <li>
            <div class="row">
                @if($ride->flight_number)
                <div class="col-lg-6">
                    <label class="form-label">Flight Number</label>
                    <div class="form-icon-row">
                        <div class="form-icon2">
                            <img src="{{asset('images/flight_icon_tp.svg')}}" alt=""></div>
                        <input type="text" name="flight_number" class="form-control pd-left-60" placeholder="FH 0121" value="{{$ride->flight_number}}">

                    </div>
                </div>
                @endif

            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-12"><label class="form-label">Passenger Details</label></div>
            </div>
            <div class="row">
                <div class="col-lg-3 mb-3"><input name="display_name" type="text" class="form-control" placeholder="Umair Kamal" value="{{$ride->display_name}}"></div>
                <div class="col-lg-3 mb-3">
                    <div class="form-icon-row">
                        <div class="form-icon2"><img src="{{asset('images/call_icon_t.svg')}}" alt=""></div>
                        <input type="text" name="mobile_number" value="{{$ride->mobile_number}}" class="form-control pd-left-60" placeholder="+971 52 470 0515">
                    </div>
                </div>

                    <div class="col-lg-3 mb-3">
                        <div class="form-icon-row">
                            <div class="form-icon2"><img src="{{asset('images/whatsapp_icon_t.svg')}}" alt=""></div>
                            <input type="text" name="whatsapp_number" value="{{$ride->whatsapp_number}}" class="form-control pd-left-60" placeholder="+971 52 470 0515">
                        </div>
                    </div>
                <div class="col-lg-3 mb-3">
                    <input type="text" class="form-control" placeholder="umairkamal@gmail.com" name="email" value="{{$ride->email}}"></div>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-3">
                    <label class="form-label">Meet And Greet</label>
                    <div class="form-icon-row">
                        <div class="form-icon2"><img src="{{asset('images/meet_greet_icon_tp.svg')}}" alt=""></div>
                        <input type="text" class="form-control pd-left-60" name="meet_greet" value="{{$ride->meet_greet}}" placeholder="Mr. Kamran">
                        <input type="hidden" name="id" value="{{$ride->id}}" >
                    </div>
                </div>
            </div>
        </li>

        <li class="two-button">
            <button type="button" class="btn btn-primary button-transparent" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </li>
    </ul>
</div>

</form>
