<style>
    .gerenric-table-desktop.column-8 .table-row .table-col:nth-child(2) {
        width: 15%;
    }

    .gerenric-table-desktop.column-8 .table-row .table-col:nth-child(6) {
        width: 20%;
    }

    .gerenric-table-desktop .user-spent-amount {
        font-weight: normal;
    }
</style>
{{-- <div class="gerenric-table-desktop table-desktop-show column-8 align-items-top">
    <div class="table-scroll-div">
        <div class="table-row" style="font-weight: bold;">
            <div class="table-col">User ID</div>
            <div class="table-col">Name</div>
            <div class="table-col">History</div>
            <div class="table-col">User Class</div>
            <div class="table-col">Phone Numbers</div>
            <div class="table-col">Watsapp Numbers</div>
            <div class="table-col">Email</div>
            <div class="table-col">Amount Spent</div>
            <div class="table-col">Joining Date</div>
        </div>

        @foreach($users as $user)
        <div class="table-row">
            <div class="table-col">{{$user->id}}</div>
            <div class="table-col">{{$user->name}}</div>
            <div class="table-col">
                <div class="assign-history assign-history-half2">
                    Completed: {{ $user->completed_rides_count ?? 0 }}
                    <br />
                    Confirmed: {{ $user->confirmed_rides_count ?? 0 }}
                    <br />
                    Pending: {{ $user->pending_rides_count ?? 0 }}
                    <br />
                    Cancelled: {{ $user->canceled_rides_count ?? 0 }}
                </div>
            </div>
            <div class="table-col">
                <div class="user-class">
                    @php $user_car_rides = \App\Models\Ride::user_car_rides($user->id); @endphp
                    @foreach ($user_car_rides as $item)
                        {{ $item->title }} : {{ $item->total_rides}} <br>
                    @endforeach
                </div>
            </div>
            <div class="table-col">
                <div class="assign-number">
                    <a href="https://wa.me/{{$user->mobile_number}}" target="_blank"><img src="{{asset('images/call_icon_t.svg')}}" alt=""> {{$user->mobile_number}}</a>

                </div>
            </div>
            <div class="table-col"><a href="mailto:{{ $user->email }}">{{$user->email}}</a></div>
            <div class="table-col">
                <div class="user-spent-amount">{{ $user->completed_rides_sum_price ? number_format($user->completed_rides_sum_price, 2) . ' AED' : '0 AED' }}</div>
            </div>
            <div class="table-col">{{ !empty($user->created_at) ? $user->created_at->format('D, M d, Y') : '' }} <br></div>
        </div>
        @endforeach
    </div>
</div> --}}

<button class="btn btn-success" onclick="exportTableToExcel('myTable', '')">Download the Data</button>

<table class="table table-hover" id="myTable">
    <thead>
        <tr>
            <th class="table-col">User ID</th>
            <th class="table-col">Name</th>
            <th class="table-col">History</th>
            <th class="table-col">User Class</th>
            <th class="table-col">Phone Number</th>
            <th class="table-col">Watsapp Number</th>
            <th class="table-col">Email</th>
            <th class="table-col">Amount Spent</th>
            <th class="table-col">Joining Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr class="table-row">
            <td class="table-col">{{$user->id}}</td>
            <td class="table-col">{{$user->name}}</td>
            <td class="table-col">
                <div class="assign-history assign-history-half2">
                    Completed: {{ $user->completed_rides_count ?? 0 }}
                    <br />
                    Confirmed: {{ $user->confirmed_rides_count ?? 0 }}
                    <br />
                    Pending: {{ $user->pending_rides_count ?? 0 }}
                    <br />
                    Cancelled: {{ $user->canceled_rides_count ?? 0 }}
                </div>
            </td>
            <td class="table-col">
                <div class="user-class">
                    @php $user_car_rides = \App\Models\Ride::user_car_rides($user->id); @endphp
                    @foreach ($user_car_rides as $item)
                        {{ $item->title }} : {{ $item->total_rides}} <br>
                    @endforeach
                </div>
            </td>
            <td class="table-col">
                <div class="assign-number">
                    <a href="https://wa.me/{{$user->mobile_number}}" target="_blank"><img src="{{asset('images/call_icon_t.svg')}}" alt=""> {{$user->mobile_number}}</a>

                </div>
            </td>
            <td class="table-col">
                <div class="assign-number">
                    <a href="https://wa.me/{{$user->whatsapp}}" target="_blank"><img src="{{asset('images/whatsapp_icon_t.svg')}}" alt=""> {{$user->whatsapp}}</a>

                </div>
            </td>
            <td class="table-col"><a href="mailto:{{ $user->email }}">{{$user->email}}</a></td>
            <td class="table-col">
                <div class="user-spent-amount">{{ $user->completed_rides_sum_price ? number_format($user->completed_rides_sum_price, 2) . ' AED' : '0 AED' }}</div>
            </td>
            <td class="table-col">{{ !empty($user->created_at) ? $user->created_at->format('D, M d, Y') : '' }} <br></td>
        </tr>
        @endforeach
    </tbody>
</table>