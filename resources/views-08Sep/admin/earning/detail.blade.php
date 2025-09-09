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
        border: 1px solid gray;
        padding: 10px 0 10px 15px;
        min-width: 200px;
        width: 46%;
    }
</style>
@endsection
@section('content')
    <!--CONTENT_SECTION_START-->
    <section id="content-section">
        <div class="page-container">
            @include('admin.layout.links')

            <br> <br> 
            <h3>@if($status == 1)Earning @else Canceled Rides @endif of <strong>{{ $driver_info->name }}</strong> Between <strong> {{ date_format(date_create($start_date),'d-m-Y') }}</strong> And <strong>{{ date_format(date_create($today),'d-m-Y')}}</strong></h3>
            
            <div class="filter-area">
                <form action="{{ route('admin.driver.rides.filter') }}" method="GET">
                    <input type="hidden" name="driver_id" value="{{ $driver_info->id }}">
                    <input type="hidden" name="start_date" value="{{ $start_date}}">
                    <input type="hidden" name="end_date" value="{{ $today }}">
                    <input type="hidden" name="status" value="{{ $status }}">
                    <div>
                        <label for="" class="form-control-label">Filter By Payment Method</label>
                        <select name="payment_filter" id="" class="form-control">
                            <option value="">Apply Payment Filter</option>
                            @foreach ($payment_methods as $item)
                                <option value="{{ $item->payment_method}}" @if(isset($method) && $method == $item->payment_method) selected @endif>{{ $item->payment_method }}</option>
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
                        <th class="text-center">Booking No</th>
                        <th style="width: 166px;">Source</th>
                        <th style="width: 166px;">Destination</th>
                        <th>Ride Date</th>
                        <th>Ride Type</th>
                        <th class="text-center">Ride Status</th>
                        <th>Car Info</th>
                        <th>Payment Method</th>
                        <th>Ride Amount</th>
                        <th class="text-center">Assigned Amount</th>
                        
                    </tr>
                </thead>
                <tbody>

                    <tbody>
                        @php $total_amount = 0; 
                             $total_assigned = 0;
                        @endphp
                       @foreach ($rides as $ride)
                           <tr>
                            <td class="text-center">{{ $ride->booking_code}}</td>
                            <td>{{ $ride->source }}</td>
                            <td>{{ $ride->destination }}</td>
                            <td>
                                

                                {{ date_format(date_create($ride->date_time),'D, M d h:i A')}}
                            </td>
                            <td>{{ $ride->ridetype->type }}</td>
                            <td class="text-center">
                                @if($ride->status == 1)
                                  Completed
                                @else 
                                 Canceled
                                @endif
                            </td>
                            <td>{{ !empty($ride->vehicle->title) ? $ride->vehicle->title : ''}}</td>
                            <td>{{ ucwords($ride->payment_method) }}</td>
                            <td class="text-center">{{ number_format($ride->price,2 ) }} AED</td>
                            <td class="text-center">{{ number_format($ride->assigned_amount,2)}} AED</td>
                           </tr>
                           @php $total_amount += $ride->price; 
                                $total_assigned += $ride->assigned_amount;
                           @endphp
                       @endforeach 
                     <tr>
                        <th colspan="8" style="text-align: right;">Total:</th>
                        <th class="text-center">{{ number_format($total_amount,2) }}</th>
                        <th class="text-center">{{ number_format($total_assigned,2)}}</th>
                     </tr>
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
