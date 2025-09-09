@php
    $cityactive='';
    $driveractive='';
    $airportactive='';
    $cityactivetab='';
    $driveractivetab='';
    $airportactivetab='';
    if($ride->ridetype->type==='Rides' || $ride->ridetype->type==='airport'){
    $cityactive='active';
    $cityactivetab='active show';
    }elseif($ride->ridetype->type==='Book Hourly'){
    $driveractive='active';
    $driveractivetab='active show';
    }elseif($ride->ridetype->type==='City Tour'){
    $airportactive='active';
    $airportactivetab='active show';
    }
@endphp

<div class="table-edit-popup-content">
    <div class="modal-header">
        <nav>
            <div class="nav nav-tabs gerenric-tab" id="nav-tab" role="tablist">
                <button class="nav-link {{$cityactive}}" id="nav-city-ride-tab" data-bs-toggle="tab" data-bs-target="#nav-city-ride" type="button" role="tab" aria-controls="nav-city-ride" aria-selected="true">City Ride</button>
                <button class="nav-link {{$driveractive}}" id="nav-driver-tab" data-bs-toggle="tab" data-bs-target="#nav-driver" type="button" role="tab" aria-controls="nav-driver" aria-selected="false">Hourly Booking</button>
                <button class="nav-link {{$airportactive}}" id="nav-city-tour-tab" data-bs-toggle="tab" data-bs-target="#nav-city-tour" type="button" role="tab" aria-controls="nav-city-tour" aria-selected="false">City Tour</button>
            </div>
        </nav>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade {{$cityactivetab}}" id="nav-city-ride" role="tabpanel" aria-labelledby="nav-city-ride-tab">
               @include('admin.bookings.citytourform')
            </div>
            <div class="tab-pane fade {{$driveractivetab}}" id="nav-driver" role="tabpanel" aria-labelledby="nav-driver-tab">
                @include('admin.bookings.driverform')

            </div>
            <div class="tab-pane fade {{$airportactivetab}}" id="nav-city-tour" role="tabpanel" aria-labelledby="nav-city-tour-tab">
               @include('admin.bookings.tourform')
            </div>
        </div>
    </div>
</div>
