@extends('admin.layout.app')

@section("css")
{{-- <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}"> --}}
<style>
    .car-img {
        width: 111px;
    }

    .flex .items-center p {
        margin-top:10px;
    }

    .filter-area form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        align-items: end;
        margin-bottom: 20px;
    }
    
    .filter-area .form-group {
        display: flex;
        flex-direction: column;
    }
    
    .filter-area .form-group label {
        margin-bottom: 5px;
        font-weight: 500;
    }

    .filter-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .filter-controls .btn {
        margin-left: 10px;
    }

    td a {
        text-decoration: none; /* removes underline */
        color: blue;           /* default text color */
        font-weight: bold;      /* makes text bold */
        padding: 8px 12px;      /* spacing inside */
        /* border: 1px solid blue; */
        border-radius: 4px;     /* rounded corners */
        transition: 0.3s;       /* smooth hover effect */
    }

   td a:hover {
        background-color: blue;
        color: white;
    }
</style>
@endsection

@section('content')
<section id="content-section">
    <div class="page-container">
        @include('admin.layout.links')

        <br> <br>
        <div class="filter-controls">
            <h3><strong>Earning List</strong></h3>
            <button class="btn btn-success btn-download">Download Data</button>
        </div>

        <div class="filter-area">
            <form action="{{ route('admin.earning') }}" method="GET">
                <div class="form-group">
                    <label for="from_date">Start Date:</label>
                    <input type="date" name="from_date" id="from_date" class="form-control" value="{{ $start_date }}" required>
                </div>
                <div class="form-group">
                    <label for="to_date">End Date:</label>
                    <input type="date" name="to_date" id="to_date" class="form-control" value="{{ $today }}" required>
                </div>
                <div class="form-group">
                    <label for="status_filter">Filter By Status</label>
                    <select name="status_filter" id="status_filter" class="form-control">
                        <option value="">Choose Status Filter</option>
                        <option value="1" @if(empty($status_filter) || $status_filter == 1) selected @endif>Completed</option>
                        <option value="3" @if(!empty($status_filter) && $status_filter == 3) selected @endif>Canceled</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="driver_id">Filter by Driver</label>
                    <select name="driver_id" id="driver_id" class="form-control">
                        <option value="">Choose Driver Filter</option>
                        @foreach ($drivers_list as $driver)
                            <option value="{{ $driver->id}}" @if(!empty($driver_id) && $driver_id == $driver->id) selected @endif>{{ $driver->nick_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="vendor-filter">
                    <label for="vendor_id">Vendors</label>
                    <select name="vendor_id" id="vendor_id" class="form-control">
                        <option value="">Choose Vendor Filter</option>
                        @foreach ($vendors as $item)
                            <option value="{{ $item->id }}" @if($vendor_filter == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="supplier-filter">
                    <label for="supplier_id">Suppliers</label>
                    <select name="supplier_id" id="supplier_id" class="form-control">
                        <option value="">Choose Supplier Filter</option>
                        @foreach ($suppliers as $item)
                            <option value="{{ $item->id }}" @if($supplier_filter == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="payment_type">Filter by Payment Type</label>
                    <select name="payment_type" id="payment_type" class="form-control">
                        <option value="">Choose Filter</option>
                        <option value="cash" @if (!empty($payment_filter) && $payment_filter == "cash") selected @endif>Cash</option>
                        <option value="card" @if (!empty($payment_filter) && $payment_filter == "card") selected @endif>Card</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th>Name</th>
                        <th>Nick Name</th>
                        <th>Company</th>
                        <th class="text-center">Contact Number</th>
                        <th class="text-center">Emirate</th>
                        <th class="text-left">Car Details</th>
                        <th class="text-left">Vendor</th>
                        <th class="text-left">Supplier</th>
                        <th class="text-center">Total Rides</th>
                        <th class="text-center">Total Assigned </th>
                        <th class="text-center">Total Earning</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rides as $ride)
                        @if (!empty($ride->driver->name))
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                @php
                                    $driver_info = $ride->driver;
                                    $ride_status = 1;

                                    if(!empty($status_filter)){
                                        $ride_status = $status_filter;
                                    }
                                @endphp
                                <td>
                                    @if(!empty($driver_info))
                                        <a target="_blank" href="{{ route('admin.driver.rides',[$driver_info->id,$start_date,$today,$ride_status]) }}">
                                            {{ $driver_info->name }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($driver_info))
                                        {{ $driver_info->nick_name }}
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($driver_info))
                                        {{ !empty($driver_info->vendor->name) ? $driver_info->vendor->name : ''}}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if(!empty($driver_info))
                                        {{ $driver_info->mobile_number}}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if(!empty($driver_info))
                                        {{ $driver_info->emirate }}
                                    @endif
                                </td>
                                <td class="text-left">
                                    @if(!empty($driver_info))
                                        {{ $driver_info->car_details }}
                                    @endif
                                </td>
                                <td>
                                    {{ !empty($ride->vendor->name) ? $ride->vendor->name : ''}}
                                </td>
                                <td>
                                    {{ !empty($ride->supplier->name) ? $ride->supplier->name : ''}}
                                </td>
                                <td class="text-center">
                                    @if(!empty($driver_info))
                                        <a target="_blank" href="{{ route('admin.driver.rides',[$driver_info->id,$start_date,$today,$ride_status]) }}">
                                            {{ $ride->total_rides }}
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <strong>{{ number_format($ride->assigned_amount,2)}} AED</strong>
                                </td>
                                <td class="text-center">{{ number_format(round($ride->total_amount,2),2)}} AED</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>
@include('modals.success')
@include('modals.cancel')
{{-- Add Driver Modal End --}}
@endsection

@section('js')
<script>
    $('#vendor_id').on('change', function() {
        if ($(this).val() !== "") {
            $('#supplier_id').val("").prop('disabled', true);
        } else {
            $('#supplier_id').prop('disabled', false);
        }
    });

    // When Supplier changes
    $('#supplier_id').on('change', function() {
        if ($(this).val() !== "") {
            $('#vendor_id').val("").prop('disabled', true);
        } else {
            $('#vendor_id').prop('disabled', false);
        }
    });

    // Trigger once on page load (in case a filter was already selected)
    $('#vendor_id').trigger('change');
    $('#supplier_id').trigger('change');
</script>
<script>
    $(document).on('click','.btn-download',function(e){
        e.preventDefault();

        var baseUrl = "{{ route('admin.export-earning-data') }}";
        let from_date = $('[name="from_date"]').val(),
            to_date = $('[name="to_date"]').val(),
            status_filter = $('[name="status_filter"]').val(),
            driver_id = $('[name="driver_id"]').val(),
            vendor_id = $('[name="vendor_id"]').val(),
            supplier_id = $('[name="supplier_id"]').val(),
            payment_type = $('[name="payment_type"]').val();

        let url = `${baseUrl}?from_date=${from_date}&to_date=${to_date}&status_filter=${status_filter}&driver_id=${driver_id}&vendor_id=${vendor_id}&supplier_id=${supplier_id}&payment_type=${payment_type}`;

        window.location.href = url;
    })
</script>
@endsection