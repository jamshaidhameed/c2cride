@extends('User.layouts.app')

@section('content')
<!--CONTENT_SECTION_START-->
<section id="content-section">
    <div class="page-container">
        @include('User.layouts.links')
        <div class="past-page gerenric-padding">
            <form method="GET" action="{{url('user/past-rides')}}">

                <div class="gerenric-search-bar">
                <div class="search-bar">
                    <div class="search-block">
                        <input  type="text" name="search" class="search-input" placeholder="Search" value="{{isset($fields['search']) && !is_null($fields['search']) ? $fields['search'] : '' }}">
                        <input type="submit" class="search-icon">
                    </div>
                </div>
                <div class="filter-block">
                    <div class="filter-icon">Filter <img src="{{asset('images/filter_icon.svg')}}" alt=""></div>
                    <div class="filter-dropbox">
                        <h2>Filter <div class="filter-close"><img src="{{asset('images/close_icon.svg')}}" alt=""></div>
                        </h2>
                        <div class="gerenric-form">
                            <ul>
                                <li><label class="form-label">Booking Number</label>
                                    <input name="booking_number" type="text" class="form-control" placeholder="Booking Number" value="{{isset($fields['booking_number']) && !is_null($fields['booking_number']) ? $fields['booking_number'] : '' }}"></li>
                                <li><label class="form-label">Booking Date</label>
                                    <input name="booking_date" type="date" class="form-control" placeholder="Booking Date" value="{{isset($fields['booking_date']) && !is_null($fields['booking_date']) ? $fields['booking_date'] : '' }}"></li>
                                <li><label class="form-label">Booking Status</label>
                                    <select  name="booking_status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option {{isset($fields['booking_status']) && !is_null($fields['booking_status'])  && $fields['booking_status'] === '1' ? 'selected' : '' }} value="1">Completed</option>
                                        <option {{isset($fields['booking_status']) && !is_null($fields['booking_status'])  && $fields['booking_status'] === '2' ? 'selected' : '' }} value="2">Pending</option>
                                        <option {{isset($fields['booking_status']) && !is_null($fields['booking_status'])  && $fields['booking_status'] === '3' ? 'selected' : '' }} value="3">Cancelled</option>
                                        <option {{isset($fields['booking_status']) && !is_null($fields['booking_status'])  && $fields['booking_status'] === '4' ? 'selected' : '' }} value="4">Confirmed</option>
                                    </select>
                                </li>
                                <li>
                                    <label class="form-label">Ride Type</label>
                                    <select name="car_type" class="form-control">
                                        <option value="">Select Business</option>
                                        <option {{isset($fields['car_type']) && !is_null($fields['car_type'])  && $fields['car_type'] === 'economy' ? 'selected' : '' }} value="economy">Economy</option>
                                        <option {{isset($fields['car_type']) && !is_null($fields['car_type'])  && $fields['car_type'] === 'comfort' ? 'selected' : '' }} value="comfort">Comfort</option>
                                        <option {{isset($fields['car_type']) && !is_null($fields['car_type'])  && $fields['car_type'] === 'business' ? 'selected' : '' }} value="business">Business</option>
                                        <option {{isset($fields['car_type']) && !is_null($fields['car_type'])  && $fields['car_type'] === 'suv' ? 'selected' : '' }} value="suv">Suv</option>
                                        <option {{isset($fields['car_type']) && !is_null($fields['car_type'])  && $fields['car_type'] === 'ex-suv' ? 'selected' : '' }} value="suv">Ex-Suv</option>
                                    </select>
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </li>
                                <li><button type="reset" class="btn btn-primary" id="resetForm">Clear Filter</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
             </div>
            </form>
            <div class="gerenric-table-desktop column-8-B">
                <div class="table-row">
                    <div class="table-col"># </div>
                    <div class="table-col">Ride Date</div>
                    <div class="table-col">Class</div>
                    <div class="table-col">Ride Type</div>
                    <div class="table-col">From </div>
                    <div class="table-col">To</div>
                    <div class="table-col">Price</div>
                    <div class="table-col" style="width: 7% !important;">Passengers</div>
                </div>
                @if(count($rides) > 0)
                    @foreach($rides as $ride)
                <div class="table-row">
                    <div class="table-col">
                        <div class="refrance-number">{{ $ride->booking_code }}</div>
                        <div class="confirm-ride {{($ride->status === '1' || $ride->status === '4') ? 'cmpt-green' : (($ride->status === '2')  ? "pending-yellow" :  "cancel-red")}}">{{getRideStatus($ride)}}</div>
                    </div>
                    <div class="table-col">
                        <div class="t-date">{{ date('D, M d,', strtotime($ride->date_time)) }}</div>
                        @php
                            $weekdays=weekintodays($ride->driver_weeks);
                            $weeks=$ride->driver_weeks;
                            $days2=$ride->driver_days;
                            $days=$ride->driver_days;
                            $total_days=$weekdays+$days;
                            $totalHours = $total_days*10; // Example
                            $days = intdiv($totalHours, 24);
                            $remainingHours = $totalHours % 24;
                        @endphp
                        <div class="t-timme">{{ date('h:i A', strtotime($ride->ride_time)) }}

                            @if($ride->ridetype->type=='tour')
                                (10h)
                            @elseif($ride->ridetype->type=='driver')
                                (
                                @if($weeks>0)
                                    {{$weeks}}w,
                                @endif
                                @if($days2>0)
                                    {{$days2}}d
                                @endif
                                @if(empty($weeks))
                                    {{$remainingHours}}h
                                @endif
                            )
                            @endif
                        </div>
                    </div>
                    <div class="table-col">{{ ucfirst($ride->car) }}</div>
                    <div class="table-col">
                        <div class="ride-type">
                            @if($ride->ridetype->type=='airport')
                                <img src="{{asset('images/aiport_ride_icon.svg')}}" alt="">
                                {{ucfirst($ride->ridetype->type)}} Ride
                            @elseif($ride->ridetype->type=='driver')
                                <img src="{{asset('images/airport_personal_driver_icon.svg')}}" alt="">
                                Personal {{ucfirst($ride->ridetype->type)}}
                            @elseif($ride->ridetype->type=='city')
                                <img src="{{asset('images/city_ride_icon.svg')}}" alt="">
                                {{ucfirst($ride->ridetype->type)}} Ride
                            @elseif($ride->ridetype->type=='tour')
                                <img src="{{asset('images/city_tour_icon.svg')}}" alt="">
                                City {{ucfirst($ride->ridetype->type)}}
                            @endif

                        </div>
                    </div>
                    <div class="table-col"> <div class="bkg-lctn"><a  href="https://maps.google.com/?q={{$ride->source}}" target="_blank">
                                {{$ride->source}}</a></div></div>
                    <div class="table-col"> <div class="bkg-lctn"><a href="https://maps.google.com/?q={{$ride->destination}}" target="_blank">{{$ride->destination}}</a></div></div>

                    <div class="table-col">{{$ride->price}} AED</div>
                    <div class="table-col" style="width: 7% !important;">
                        <div class="passenger-seat" >
                            <div class="passenger-div"><img src="{{asset('images/adult_icon.svg')}}" alt=""> x  {{ $ride->adults }}</div>
                            <div class="passenger-div"><img src="{{asset('images/kids_tb_icon.svg')}}" alt=""> x  {{ $ride->children}}</div>
                            <div class="passenger-div"><img src="{{asset('images/lagauge_tb_icon.svg')}}" alt=""> x {{ $ride->luggage}}</div>
                            <div class="passenger-div"><img src="{{asset('images/child_seat_tb_icon.svg')}}" alt=""> x {{ $ride->child_seats}}</div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>
            <div class="gerenric-table-mobile">
                @if(count($rides) > 0)
                    @foreach($rides as $ride)
                <div class="table-box">
                    <div class="client-pick-info">
                        <div class="cp-row">
                            <div class="cp-col">{{ date('D, M d,', strtotime($ride->date_time)) }} {{ date('h:i A', strtotime($ride->date_time)) }}</div>
                            <div class="cp-col">Economy</div>
                        </div>
                        <div class="cp-row">
                            <div class="cp-col">
                                <div class="refrance-number">Ride: #{{ $ride->booking_code }}</div>
                            </div>
                            <div class="cp-col">
                                <div class="passenger-seat">
                                    <div class="passenger-div"><img src="{{asset('images/adult_icon.svg')}}" alt=""> x  {{ $ride->adults }}</div>
                                    <div class="passenger-div"><img src="{{asset('images/kids_tb_icon.svg')}}" alt=""> x  {{ $ride->children}}</div>
                                    <div class="passenger-div"><img src="{{asset('images/lagauge_tb_icon.svg')}}" alt=""> x {{ $ride->luggage}}</div>
                                    <div class="passenger-div"><img src="{{asset('images/child_seat_tb_icon.svg')}}" alt=""> x {{ $ride->child_seats}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="cp-row">
                            <div class="cp-col">
                                @if($ride->flight_number)
                                    <div class="refrance-number">Flight: #{{$ride->flight_number}}
                                    </div>
                                @endif
                            </div>
                            <div class="cp-col">
                                @if($ride->payment_method=='cash')
                                    <img src="{{asset('images/cash_tb_icon.svg')}}" alt=""> Cash
                                @elseif($ride->payment_method=='card')
                                    <img src="{{asset('images/card_icon.svg')}}" alt=""> Card
                                @endif
                            </div>
                        </div>
                        <div class="cp-row">
                            <div class="cp-col">{{ ucfirst($ride->display_name) }}</div>

                        </div>
                        <div class="cp-row">
                            <div class="cp-col">
                                <div class="{{($ride->status === '1' || $ride->status === '4') ? 'cmpt-green' : (($ride->status === '2')  ? "pending-yellow" :  "cancel-red")}}">{{getRideStatus($ride)}}</div>
                            </div>
                            <div class="cp-col">{{$ride->price}} AED</div>
                        </div>
                    </div>
                    <div class="pickdrop-location">
                        <div class="pick-location">
                            <div class="pick-icon"><img src="{{asset('images/pick_location_icon.svg')}}" alt=""></div>
                            <div class="pick-text">{{$ride->source}}</div>
                        </div>
                        <div class="pick-time">
                            <div class="pt-col"><img src="{{asset('images/kg_tb_icon.svg')}}" alt=""> {{$ride->distance}} km</div>
                            <div class="pt-col"><img src="{{asset('images/time_tb_icon.svg')}}" alt=""> {{$ride->duration}}</div>
                        </div>
                        <div class="pick-location">
                            <div class="pick-icon"><img src="{{asset('images/drop_location_icon.svg')}}" alt=""></div>
                            <div class="pick-text">{{$ride->destination}}</div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>
            <div class="gerenric-pagination">
                <ul>
                    {{$rides->appends(request()->query())->links()}}
                </ul>
            </div>
        </div>
    </div>
</section>
<!--WHATSAPP_POPUP_START-->
<div class="modal fade gerenric-popup" id="whatsapp_popup" tabindex="-1" aria-labelledby="whatsapp_popup" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="whatsapp-popup">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Whatsapp Number</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="whatsapp-row">
                        <div class="whatsapp-icon"><img src="{{asset('images/whatsapp_green_icon.svg')}}" alt=""></div>
                        <div class="whatsapp-field"><input type="text" class="form-control" placeholder="+971"></div>
                    </div>
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--WHATSAPP_POPUP_END-->
<!--CONTENT_SECTION_END-->
@endsection

@section('js')
    <script>
        $("#resetForm").click(function() {
            $('form.filter_form').find('[selected]').removeAttr('selected');
            $('form.filter_form').find('input').removeAttr('value');
            $('form.filter_form').submit();
        })
    </script>
@endsection
