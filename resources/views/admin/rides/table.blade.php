<div class="tablelist">


{{-- Summary  --}}
  <div class="gerenric-ride-status">
    @php
        $rides_collection = collect($rides);
    @endphp
    <ul class="status-list">
        <li><a data-status_id="all" class="active_status" href="javascript:void(0)">
                <div class="status-title">Number of rides</div>
                <div class="status-value confirmed-color-text all">{{ count($rides) }}</div>
            </a></li>
        <li>
            <a data-status_id="2" href="javascript:void(0)">
                <div class="status-title">Thriwe</div>
                <div class="status-value pending-color-text">{{ $rides_collection->where('source_report','b2b')->count() }}</div>
            </a>
        </li>
        {{-- <li><a data-status_id="4" href="javascript:void(0)">
                <div class="status-title">C2CRides</div>
                <div class="status-value confirmed-color-text">{{ $rides_collection->where('ride_from','c2cride')->count() }}</div>
            </a></li>
        <li><a data-status_id="1" href="javascript:void(0)">
                <div class="status-title">City2City</div>
                <div class="status-value completed-color-text">{{ $rides_collection->where('ride_from','city2city')->count() }}</div>
            </a></li> --}}
        <li><a data-status_id="3"href="javascript:void(0)">
                <div class="status-title">Successfull</div>
                <div class="status-value confirmed-color-text">{{ $rides_collection->where('status','1')->count() }}</div>
            </a></li>
            <li><a data-status_id="3" href="javascript:void(0)">
                <div class="status-title">Failed</div>
                <div class="status-value cancelled-color-text">{{ $rides_collection->where('status','3')->count() }}</div>
            </a></li>
        <li><a data-status_id="res" href="javascript:void(0)">
                <div class="status-title">Watsapp</div>
                <div class="status-value reschedule-color-text">{{ $rides_collection->where('source_report','watsapp')->count() }}</div>
        </a></li>
        <li><a data-status_id="res" href="javascript:void(0)">
                <div class="status-title">Card</div>
                <div class="status-value confirmed-color-text">{{ $rides_collection->where('payment_method','card')->count() }}</div>
        </a></li>
        <li><a data-status_id="res" href="javascript:void(0)">
                <div class="status-title">Cash</div>
                <div class="status-value reschedule-color-text">{{ $rides_collection->where('payment_method','cash')->count() }}</div>
        </a></li>
    </ul>
</div>
{{-- End Summary --}}
<table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        {{-- <th>Ride From</th> --}}
                        <th>Booking Number</th>
                        <th>Tve Booking Number</th>
                        <th>Serial Number</th>
                        <th>Ride Booking Time</th>
                        <th>Ride Time</th>
                        <th>Pick Up Location</th>
                        <th>Dropoff Location</th>
                        <th>Client Name/ Email</th>
                        <th>Fine Amount</th>
                        <th>Ride Amount</th>
                        <th>Assigned amount</th>
                        <th>Payment Method</th>
                        <th>Payment link confirmation</th>
                        <th>Driver's Tip</th>
                        <th>Company Name</th>
                        <th>driver Name </th>
                        <th>Source</th>
                        <th>Remark by c2c team</th>
                        <th>Cancelled Ride/ Feedback</th>
                        <th>Ride Extra details </th>
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
                         @if ($loop->iteration % 2 == 0 )
                             class="even-row"
                         @else 
                         class="odd-row"
                         @endif
                        >
                            @php
                                $total_ride_amount += $ride->price;
                                $assignmed_amount += $ride->assigned_amount;
                                $tip_amount += $ride->tip_amount;
                                $fine_amount += $ride->fine_amount;
                            @endphp
                            {{-- <td>
                                {{ $ride->ride_from }}
                            </td> --}}
                            <td 
                            @if ($ride->status == '1') 
                            class="bg-success text-white"
                            @elseif($ride->status == '3')
                            class="bg-danger text-white"    
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
                            <td>{{ $ride->fine_amount}}</td>
                            <td>{{ $ride->price }}</td>
                            <td>{{ $ride->assigned_amount }}</td>
                            <td>{{ ucwords($ride->payment_method) }}</td>
                            <td>{{ $ride->payment_link_confirmation }}</td>
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
                            <td>{{ $ride->ride_extra_details }}</td>
                            <td>
                                <div class="table-action">
                                    <a class="edit-booking" data-ride_id="{{$ride->id}}" href="javascript:void(0)" data-tve_booking_number="{{ $ride->tve_booking_number}}" data-fine_amount="{{ $ride->fine_amount }}" data-payment_link_confirmation="{{ $ride->payment_link_confirmation }}" data-source_report = "{{ $ride->source_report }}" data-remarks_by_c2c_team="{{ $ride->remarks_by_c2c_team }}" data-ride_extra_details = "{{ $ride->ride_extra_details}}" data-ride_from="{{ $ride->ride_from}}"><img src="{{asset('images/edit_icon_t.svg')}}" alt=""></a>
                                    <a target="_blank" class="view-change-log" href="{{ route('admin.user.activity.logs.list',$ride->id) }}" data-ride_id = "{{ $ride->id }}">
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
                        <td><strong>{{ $fine_amount }}</strong></td>
                        <td><strong>{{ $total_ride_amount}}</strong></td>
                        <td><strong>{{ $assignmed_amount}}</strong></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{ $tip_amount}}</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
</div>