<form id="tourform" action="">
    @csrf
<div class="gerenric-form">
    <ul>
        <li>
            <div class="row">
                <div class="col-lg-4 mb-3"><label class="form-label">Pick-up Location</label>
                    <input  name="source" type="text" class="form-control source" value="{{$ride->source}}"  placeholder="Street - Barsha Heights - Dubai - Elvish"></div>
                <div class="col-lg-4 mb-3"><label class="form-label">Drop-off Location</label>
                    <input type="text" name="destination" class="form-control destination" value="{{$ride->destination}}"  placeholder="Street - Barsha Heights - Dubai - Elvish"></div>
                <div class="col-lg-4"><label class="form-label">Date and Time</label>
                    <input type="datetime-local" value="{{$ride->date_time}}" name="date_time" class="form-control" id="" placeholder="Ride Date"></div>
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
                            <input type="text" class="plusminus-input" name="adults" id="city_qty_1_CT" maxlength="6">
                            <div class="plusminus-button">
                                <span class="minus-btn city_min_1_CT">-</span><span class="plus-btn city_plus_1_CT">+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="passenger-add-tp">
                        <div class="form-icon2"><img src="{{asset('images/kids_icon_tp.svg')}}" alt=""></div>
                        <div class="passenger-add-tp-inner">
                            <input type="text" class="plusminus-input"  name="children" id="city_qty_2_CT" maxlength="6">
                            <div class="plusminus-button">
                                <span class="minus-btn city_min_1_CT">-</span><span class="plus-btn city_plus_2_CT">+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="passenger-add-tp">
                        <div class="form-icon2"><img src="{{asset('images/laguages_icon_tp.svg')}}" alt=""></div>
                        <div class="passenger-add-tp-inner">
                            <input type="text" class="plusminus-input" name="luggage" id="city_qty_3_CT" maxlength="6">
                            <div class="plusminus-button">
                                <span class="minus-btn city_min_3_CT">-</span><span class="plus-btn city_plus_3_CT">+</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="passenger-add-tp">
                        <div class="form-icon2"><img src="{{asset('images/child_seat_icon_tp.svg')}}" alt=""></div>
                        <div class="passenger-add-tp-inner">
                            <input type="text" class="plusminus-input"name="child_seats" id="city_qty_4_CT" max="1">
                            <div class="plusminus-button">
                                <span class="minus-btn city_min_4_CT">-</span><span class="plus-btn city_plus_4_CT">+</span>
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
{{--                        <div class="form-icon2"><img src="{{asset('images/car_icon1_t.png')}}" alt=""></div>--}}
{{--                        <input type="text" name="car" class="form-control pd-left-60" placeholder="Economy" value="{{$ride->car}}">--}}
                            <select id="carselecttour" name="car" class="form-control" >
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
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-8">
                            <label class="form-label">Cities</label>
                            <select class="form-control" name="tour_city" >
                                {{-- <option {{$ride->tour_city=='Abu Dhabi'?"selected":'' }} value="Abu Dhabi">Abu Dhabi</option>
                                <option {{$ride->tour_city=='Dubai'?"selected":'' }} value="Dubai">Dubai</option>
                                <option {{$ride->tour_city=='Al Ain'?"selected":'' }} value="Al Ain">Al Ain</option>
                                <option {{$ride->tour_city=='Sharjah'?"selected":'' }} value="Sharjah">Sharjah</option>
                                <option {{$ride->tour_city=='fujairah'?"selected":'' }} value="fujairah">fujairah</option> --}}
                                <option {{$ride->tour_city=='Dubai'?"selected":'' }} value="Dubai">Dubai</option>
                                <option {{$ride->tour_city=='Abu Dhabi'?"selected":'' }} value="Abu Dhabi">Abu Dhabi</option>
                                <option {{$ride->tour_city=='Sharjah'?"selected":'' }} value="Sharjah">Sharjah</option>
                                <option {{$ride->tour_city=='Ajman'?"selected":'' }} value="Ajman">Ajman</option>
                                <option {{$ride->tour_city=='Ras Al Khaimah'?"selected":'' }} value="Ras Al Khaimah">Ras Al Khaimah</option>
                                <option {{$ride->tour_city=='Fujairah'?"selected":'' }} value="Fujairah">Fujairah</option>
                                <option {{$ride->tour_city=='Al Ain'?"selected":'' }} value="Al Ain">Al Ain</option>
                                <option {{$ride->tour_city=='Um al quwaim'?"selected":'' }} value="Um al quwaim">Um al quwaim</option>

                            </select>
                        </div>

                        <div class="col-4">
                            <label class="form-label">Photography</label>
                            <div class="gerenric-switch-button">
                                <label class="switch">
                                    <input type="checkbox" id="togBtn"  {{$ride->photograph=='on'?"checked":'' }} name="photograph" >
                                    <div class="slider round">
                                        <span class="on-text">NO</span>
                                        <span class="off-text">YES</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <input type="text" class="form-control pd-left-60" placeholder="Mr. Kamran" name="meet_greet" value="{{$ride->meet_greet}}">
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
