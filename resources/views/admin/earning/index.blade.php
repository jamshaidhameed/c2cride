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
    .form-group label {
        float: left;
        margin:6px;
    }
    .filter-area form {
        display: flex; 
        gap: 10px; 
        align-items: 
        center; 
        flex-wrap: wrap;
        margin-bottom: 20px;
    }
   td  a {
        text-decoration: none; /* removes underline */
        color: blue;            /* default text color */
        font-weight: bold;      /* makes text bold */
        padding: 8px 12px;      /* spacing inside */
        /* border: 1px solid blue;  */
        border-radius: 4px;     /* rounded corners */
        transition: 0.3s;       /* smooth hover effect */
        }

        a:hover {
        background-color: blue;
        color: white;
        }
</style>
@endsection
@section('content')
    <!--CONTENT_SECTION_START-->
    <section id="content-section">
        <div class="page-container">
            @include('admin.layout.links')

            <br> <br> 
            <h3><strong>Earning List</strong></h3>

            <div class="filter-area">
                <form action="{{ route('admin.earning') }}" method="GET">
                    <div>
                        <label for="from_date" class="form-control-label">Start Date:</label><br>
                        <input type="date" name="from_date" id="from_date" class="form-control" value="{{ $start_date }}" required>
                    </div>
                    <div>
                        <label for="to_date" class="form-control-label">End Date:</label><br>
                        <input type="date" name="to_date" id="to_date" class="form-control" value="{{ $today }}" required>
                    </div>
                    <div>
                        <label for="" class="form-control-label">Filter By Status</label>
                        <select name="status_filter" id="" class="form-control">
                            <option value="">Choose Status Filter</option>
                            <option value="1" @if(empty($status_filter) || $status_filter == 1) selected @endif> Completed</option>
                            <option value="3" @if(!empty($status_filter) && $status_filter == 3) selected @endif>Canceled</option>
                        </select>
                    </div>
                    <div>
                        <label for="" class="form-control-label">Filter by Driver</label>
                        <select name="driver_id" id="" class="form-control">
                            <option value="">Choose Driver Filter</option>
                            @foreach ($drivers_list as $driver)
                                <option value="{{ $driver->id}}" @if(!empty($driver_id) && $driver_id == $driver->id) selected @endif>{{ $driver->nick_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="" class="form-control-label">Filter by Company</label>
                        <select name="company_name" id="" class="form-control">
                            <option value="">Choose Company Filter</option>
                            @foreach ($company_names as $item)
                                <option value="{{ $item->company_name }}" @if($company_filter == $item->company_name) selected @endif>{{ $item->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <br>
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
                        <th class="text-center">Total Rides</th>
                        <th class="text-center">Total Assigned </th>
                        <th class="text-center">Total Earning</th>
                        
                    </tr>
                </thead>
                <tbody>

                    <tbody>
                        @foreach ($rides as $ride)

                          @if (!empty($ride->driver->name))
                          <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            @php $driver_info = $ride->driver; 
                                 $ride_status = 1;

                                 if(!empty($status_filter)){
                                    $ride_status = $status_filter;
                                 }
                            @endphp
                            <td>
                                @if(!empty($driver_info))
                                <a target="_blank" href="{{ route('admin.driver.rides',[$driver_info->id,$start_date,$today,$ride_status]) }}">
                                {{ $driver_info->name }}
                                @endif
                                </a>
                            </td>
                            <td>
                                @if(!empty($driver_info))
                                {{ $driver_info->nick_name }}
                                @endif
                            </td>
                            <td>
                                @if(!empty($driver_info))
                                {{ $driver_info->company_name}}
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
                   
                </tbody>
            </table>
            </div>
        </div>

    </section>
    <!--CONTENT_SECTION_END-->

</div>
    @include('modals.success')
    @include('modals.cancel')
    {{-- Add Driver Modal End --}}
@endsection

@section('js')
  
@endsection
