<div class="tablelist">


{{-- Summary  --}}
  <div class="gerenric-ride-status">
    @php
        $rides_collection = collect($rides);
    @endphp
    {{-- Filter  --}}
    <input type="hidden" name="type" value="{{ isset($type) ? $type :'' }}">
    <input type="hidden" name="value" value="{{ isset($value) ? $value :'' }}">
    <ul class="filters-list">
        <li><a data-status_id="all" class="@if(empty($type) || empty($value)) active_status @endif" href="javascript:void(0)">
                <div class="status-title">Number of rides</div>
                <div class="status-value confirmed-color-text all">{{ count($rides) }}</div>
            </a></li>
        <li>
            <a data-type="source_report" data-value="b2b" @if (isset($type) && isset($value) &&$type=="source_report" && $value="b2b")
                class="active_status"
            @endif href="javascript:void(0)">
                <div class="status-title">B2B</div>
                <div class="status-value pending-color-text">{{ $rides_collection->where('source_report','b2b')->count() }}</div>
            </a>
        </li>
        <li><a data-type="ride_from" data-value="c2cride" href="javascript:void(0)" @if ((isset($type) && isset($value) ) && ($type=="ride_from" && $value="c2cride"))
                class="active_status"
            @endif>
                <div class="status-title">C2CRides</div>
                <div class="status-value confirmed-color-text">{{ $rides_collection->where('ride_from','c2cride')->count() }}</div>
            </a></li>
        <li><a data-type="ride_from" data-value="city2city" href="javascript:void(0)" @if ((isset($type) && isset($value)) && ($type=="ride_from" && $value="city2city"))
                class="active_status"
            @endif>
                <div class="status-title">City2City</div>
                <div class="status-value completed-color-text">{{ $rides_collection->where('ride_from','city2city')->count() }}</div>
            </a></li>
        <li><a data-type="status" data-value="1" href="javascript:void(0)" @if (isset($type) && isset($value) && $type=="status" && $value="1")
                class="active_status"
            @endif>
                <div class="status-title">Successfull</div>
                <div class="status-value confirmed-color-text">{{ $rides_collection->where('status','1')->count() }}</div>
            </a></li>
            <li><a data-type="status" data-value="3" href="javascript:void(0)" @if (isset($type) && isset($value) && $type=="status" && $value="3")
                class="active_status"
            @endif>
                <div class="status-title">Failed</div>
                <div class="status-value cancelled-color-text">{{ $rides_collection->where('status','3')->count() }}</div>
            </a></li>
        <li><a data-type="source_report" data-value="watsapp" href="javascript:void(0)" @if (isset($type) && isset($value) && $type=="source_report" && $value="watsapp")
                class="active_status"
            @endif>
                <div class="status-title">Watsapp</div>
                <div class="status-value reschedule-color-text">{{ $rides_collection->where('source_report','watsapp')->count() }}</div>
        </a></li>
        <li><a data-type="payment_method" data-value="card" href="javascript:void(0)" @if (isset($type) && isset($value) && $type=="payment_method" && $value="card")
                class="active_status"
            @endif>
                <div class="status-title">Card</div>
                <div class="status-value confirmed-color-text">{{ $rides_collection->where('payment_method','card')->count() }}</div>
        </a></li>
        <li><a data-type="payment_method" data-value="cash" href="javascript:void(0)" @if (isset($type) && isset($value) && $type=="payment_method" && $value="card")
                class="active_status"
            @endif>
                <div class="status-title">Cash</div>
                <div class="status-value reschedule-color-text">{{ $rides_collection->where('payment_method','cash')->count() }}</div>
        </a></li>
    </ul>
</div>
{{-- End Summary --}}
<table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Ride From</th>
                        <th>Booking Number</th>
                        <th>Tve Booking Number</th>
                        <th>Serial Number</th>
                        <th>Ride Booking Time</th>
                        <th>Ride Time</th>
                        <th>Pick Up Location</th>
                        <th>Dropoff Location</th>
                        <th>Client Name/ Email</th>
                        <th>Ride Extra details </th>
                        <th>Ride Amount</th>
                        <th>Assigned amount</th>
                        <th>Payment Method</th>
                        <th>Payment link confirmation</th>
                        <th>Stripe Transaction Number</th>
                        <th>Driver's Tip</th>
                        <th>Company Name</th>
                        <th>driver Name </th>
                        <th>Source</th>
                        <th>Vendor</th>
                        <th>Remark by c2c team</th>
                        <th>Cancelled Ride/ Feedback</th>
                        <th>Fine Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_ride_amount = 0;
                        $assignmed_amount = 0;
                        $tip_amount = 0;
                        $fine_amount = 0;
                    @endphp
                    @foreach ($rides as $ride)
                        <tr
                         @if ($loop->iteration % 2 != 0 )
                             class="custom-row"
                         
                         @endif
                        >
                            @php
                                $total_ride_amount += $ride->price;
                                $assignmed_amount += $ride->assigned_amount;
                                $tip_amount += $ride->tip_amount;
                                $fine_amount += $ride->fine_amount;
                            @endphp
                            <td>
                                {{ $ride->ride_from }}
                            </td>
                            <td 
                            @if ($ride->status == '1') 
                              style="background-color: #0fa85c !important;color: white;"
                            @elseif($ride->status == "2")
                             style="background-color: rgb(220, 170, 53) !important;color: white;"
                            @elseif($ride->status == '3')
                             style="background-color: rgb(220, 53, 59) !important;color: white;"  
                            @endif
                            >{{ $ride ->booking_code }}</td>
                            <td>{{ $ride->tve_booking_number }}</td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($ride->created_at)->format("Y-m-d h:i A")}}</td>
                            <td>{{ \Carbon\Carbon::parse($ride->date_time)->format("Y-m-d h:i A")}}</td>
                            <td>{{ $ride->source }}</td>
                            <td>{{ $ride->destination }}</td>
                            <td>
                                {{ $ride->display_name }} / {{ $ride->email }}
                            </td>
                            <td>{{ $ride->ride_extra_details }}</td>
                            <td>{{ $ride->price }}</td>
                            <td>{{ $ride->assigned_amount }}</td>
                            <td>{{ ucwords($ride->payment_method) }}</td>
                            <td>{{ $ride->payment_link_confirmation }}</td>
                            <td>{{ $ride->stripe_transaction_number }}</td>
                            <td>{{ $ride->tip_amount }}</td>
                            <td>@if ($ride->ride_from == "c2cride")
                                {{ !empty($ride->driver->company_name) ? $ride->driver->company_name : "" }}
                            @endif
                                </td>
                            <td>
                                @if ($ride->ride_from == "c2cride")
                                {{ !empty($ride->driver->name)? $ride->driver->name : "" }}
                                @endif
                            </td>
                            <td>{{ $ride->source_report }}</td>
                            <td>
                                @if ($ride->ride_from == 'c2cride' && !empty($ride->supplier->name))
                                    {{ $ride->supplier->name }}
                                @endif
                            </td>
                            <td>{{ $ride->remarks_by_c2c_team }}</td>
                            <td>
                                @php
                                  $remarks = $ride->cancel_remarks;
                                  $remarks_arr = !empty($ride->cancel_remarks) ? explode(",",$ride->cancel_remarks) : array();  
                                @endphp

                                @foreach ($remarks_arr as $item)
                                    {{ $item }} <br>
                                @endforeach
                            </td>
                             <td>{{ $ride->fine_amount}}</td>
                            
                            <td>
                                <div class="table-action">
                                    <a class="edit-booking" data-ride_id="{{$ride->id}}" href="javascript:void(0)" data-tve_booking_number="{{ $ride->tve_booking_number}}" data-fine_amount="{{ $ride->fine_amount }}" data-payment_link_confirmation="{{ $ride->payment_link_confirmation }}" data-source_report = "{{ $ride->source_report }}" data-remarks_by_c2c_team="{{ $ride->remarks_by_c2c_team }}" data-ride_extra_details = "{{ $ride->ride_extra_details}}" data-ride_from="{{ $ride->ride_from}}"><img src="{{asset('images/edit_icon_t.svg')}}" alt=""></a>
                                    <a target="_blank" class="view-change-log" href="{{ route('admin.user.activity.logs.list',$ride->id) }}" data-ride_id = "{{ $ride->id }}" data-stripe_transaction_number="{{ $ride->stripe_transaction_number}}">
                                        <img src="{{ asset('images/calender_icon_t.svg') }}" alt="">
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    <tr>
                        <td><strong>G.Total</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{ $total_ride_amount}}</strong></td>
                        <td><strong>{{ $assignmed_amount}}</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{ $tip_amount}}</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{ $fine_amount }}</strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
</div>