<table class="table table-bordered table-sm tablelist">
                <thead>
                    <tr>
                        <th>Booking Number</th>
                        <th>Tve Booking Number</th>
                        <th>Serial Number</th>
                        <th>Ride Booking Time</th>
                        <th>Ride Time</th>
                        <th>Pick Up Location</th>
                        <th>Dropoff Location</th>
                        <th>Client Name/ Email</th>
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
                    @foreach ($rides as $ride)
                        <tr>
                            <td>{{ $ride ->booking_code }}</td>
                            <td>{{ $ride->tve_booking_number }}</td>
                            <td>{{ $ride->serial_number }}</td>
                            <td>{{ \Carbon\Carbon::parse($ride->created_at)->format("h:i A")}}</td>
                            <td>{{ \Carbon\Carbon::parse($ride->ride_time)->format("h:i A")}}</td>
                            <td>{{ $ride->source }}</td>
                            <td>{{ $ride->destination }}</td>
                            <td>
                                {{ $ride->display_name }} / {{ $ride->email }}
                            </td>
                            <td>{{ $ride->price }}</td>
                            <td>{{ $ride->assigned_amount }}</td>
                            <td>{{ ucwords($ride->payment_method) }}</td>
                            <td>{{ $ride->payment_link_confirmation }}</td>
                            <td>{{ $ride->tip_amount }}</td>
                            <td>{{ !empty($ride->driver->company_name) ? $ride->driver->company_name : "" }}</td>
                            <td>{{ !empty($ride->driver->name)? $ride->driver->name : "" }}</td>
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
                                    <a class="edit-booking" data-ride_id="{{$ride->id}}" href="javascript:void(0)" data-tve_booking_number="{{ $ride->tve_booking_number}}" data-serial_number="{{ $ride->serial_number }}" data-payment_link_confirmation="{{ $ride->payment_link_confirmation }}" data-source_report = "{{ $ride->source_report }}" data-remarks_by_c2c_team="{{ $ride->remarks_by_c2c_team }}" data-ride_extra_details = "{{ $ride->ride_extra_details}}"><img src="{{asset('images/edit_icon_t.svg')}}" alt=""></a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>