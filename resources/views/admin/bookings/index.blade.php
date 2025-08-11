@extends('admin.layout.app')

@section('css')
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link href="{{ asset('assets/css/select2.css') }}" rel="stylesheet" />
  <style>
    .form-control , .form-control-label {
        color:black;
    }

      #dropdown {
      list-style-type: none; /* removes bullets */
      padding: 0;
    }

   #dropdown li {
      padding: 10px;
      background-color: #f0f0f0;
      color: black;
      transition: 0.3s ease;
    }

   #dropdown li:hover {
      background-color: #25a057;
      color: white;
      text-decoration: underline;
      cursor: pointer;
    }
    .bg-success {
        background-color: #7ac08d  !important;
        color: white;
        padding: 5px;
        text-align: center;
        border-radius: 37px;
        }

    .loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(255, 255, 255, 0.9);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        }

        /* Spinning Loader */
        .loader {
        border: 10px solid #f3f3f3; /* Light grey */
        border-top: 10px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 80px;
        height: 80px;
        animation: spin 1s linear infinite;
        }

        .checkbox-wrapper {
        --s-xsmall: 0.625em;
        --s-small: 1.2em;
        --border-width: 1px;
        --c-primary: #0fa85c;
        --c-primary-20-percent-opacity: rgb(15 168 92 / 20%);
        --c-primary-10-percent-opacity: rgb(15 168 92 / 10%);
        --t-base: 0.4s;
        --t-fast: 0.2s;
        --e-in: ease-in;
        --e-out: cubic-bezier(0.11, 0.29, 0.18, 0.98);
       }

        .checkbox-wrapper .checkbox {
            display: inline-flex;
            align-items: center;
            justify-content: flex-start;
            cursor: pointer;
        }

        .form-check{
            display: block;
            min-height: 1.5rem;
            padding-left: 1.5em;
            margin-bottom: 0.125rem;
            position: relative;
        }
        .form-check-input-large{
            width: 0.9em;
            height: 0.9em;
            transform: scale(1.5);
            margin-top: 0.3em;
        }
        .form-check-label{
            margin-bottom: 0;
            color: black;
            margin-left: 0.123rem;
            font-size: 9pt;
        }
        .cancel_checkboxs ul {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            margin: 0px -0em.313 0px -0.313em;
        }
        .cancel_checkboxs ul li {
            list-style: none;
        }
        .cancel_checkboxs ul li .checkbox-wrapper {
            padding-right: 12em;
        }
        .cancel_checkboxs ul li .checkbox-wrapper .checkbox input {
            width: 1.5em;
            height: 1.5em;
        }
        .cancel_checkboxs ul li .checkbox-wrapper .checkbox p {
           margin-top: 10px;
           margin-left: 5px;
        }
        

  </style>
@endsection
@section('content')
    <!--CONTENT_SECTION_START-->
    <section id="content-section">
        <div class="page-container">
            @include('admin.layout.links')
            <form action="{{ url('admin/ride/action') }}" id="ride_action_form" method="POST">
                @csrf
                <div class="gerenric-bulk-actions">
                    <ul>
                        <li>
                            <div class="select-bar">
                                <div class="select-block">
                                    <select class="select-input form-select" name="ride_action">
                                        <option>Select Options</option>
                                        <option value="past">Move To Past</option>
                                        <option value="download">Download</option>
                                        <option value="delete">Delete</option>
                                        <option>Send Invoice</option>
                                    </select>
                                    <input type="button" class="select-button" value="Apply" id="action">
                                </div>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)">
                                <div class="bluk-link"><img src="{{ asset('images/new_ride_link_icon.svg') }}"
                                        alt=""> New Ride</div>
                            </a></li>
                        <li><a href="javascript:void(0)">
                                <div class="bluk-link"><img src="{{ asset('images/calender_link_icon.svg') }}"
                                        alt=""> Calender</div>
                            </a></li>
                        <li><a href="admin_booking_driver_offline_1.html">
                                <div class="bluk-link"><img src="{{ asset('images/driver_link_icon.svg') }}" alt="">
                                    Driver</div>
                            </a></li>
                     
                    </ul>
                    <div class="bluk-search-bar">
                        <div class="gerenric-search-bar">
                            <div class="search-bar">
                                <div class="search-block">
                                    <input type="text" class="search-input search" placeholder="Search">
                                    <input type="button" class="search-icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gerenric-ride-city">
                    <ul class="type-list">
                        <li><a data-ride_type="all" class="active_ride" href="javascript:void(0)">View All 3 Rides</a></li>
                        <li><a data-ride_type="rides" href="javascript:void(0)"><img
                                    src="{{ asset('images/city_rides_link_icon.svg') }}" alt=""> City Rides</a></li>
                                    <li><a data-ride_type="book hourly" href="javascript:void(0)"><img
                                    src="{{ asset('images/personal_driver_link_icon.svg') }}" alt="">Book Hourly </a></li>
                        <li><a data-ride_type="city tour" href="javascript:void(0)"><img
                                    src="{{ asset('images/city_tour_link_icon.svg') }}" alt=""> City Tour</a></li>
                        
                    </ul>
                    <div class="city-total">
                        <div class="city-total-label">Total: {{ $rides_count }}</div>
                        <div class="city-total-label">Today</div>
                        <div class="city-total-select">{{ \Carbon\Carbon::now()->format('M-d-Y') }}</div>
                        <div class="city-total-filter">
                            <div class="total-filter-close"><img src="{{ asset('images/close_icon.svg') }}" alt="">
                            </div>
                            <div class="total-date-block">
                                <div class="total-date-col">
                                    <div class="total-dt-label">Start Date<span>*</span></div>
                                    <input type="date" class="form-control" name="start_date"
                                        value="{{ isset($fields['start_date']) ? $fields['start_date'] : '' }}"
                                        placeholder="Nov 23, 2023">
                                </div>
                                <div class="total-date-col">
                                    <div class="total-dt-label">End Date<span>*</span></div>
                                    <input type="date" class="form-control" name="end_date"
                                        value="{{ isset($fields['end_date']) ? $fields['end_date'] : '' }}"
                                        placeholder="Dec 23, 2023">
                                </div>
                            </div>
                            
                            <div class="total-date-block">
                                <div class="total-date-col">
                                    <div class="total-dt-label">Currency<span></span></div>
                                    <select name="currency" id="" class="form-control">
                                        <option value="">Choose Currency to Filter</option>
                                        <option value="eur" @if(isset($fields['currency']) && $fields["currency"] == "eur") selected @endif>€ EUR</option>
                                        <option value="usd" @if(isset($fields['currency']) && $fields["currency"] == "usd") selected @endif>$ USD</option>
                                        <option value="gbp" @if(isset($fields['currency']) && $fields["currency"] == "gbp") selected @endif>£ GBP</option>
                                        <option value="aed" @if(isset($fields['currency']) && $fields["currency"] == "aed") selected @endif>د.إ AED</option>
                                        <option value="sar" @if(isset($fields['currency']) && $fields["currency"] == "sar") selected @endif>ر.س SAR</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="total-payment-block">
                                <div class="total-filter-title">Payment Mode</div>
                                <div class="total-payment-block-inner">
                                    <div class="total-payment-col">
                                        <label class="gerenric_checkbox">
                                            Cash <input type="radio"
                                                {{ isset($fields['payment_method']) && !is_null($fields['payment_method']) && $fields['payment_method'] === 'cash' ? 'checked' : '' }}
                                                name="payment_method" value="cash"><span class="checkmark"
                                                for="total_cash"></span>
                                        </label>
                                    </div>
                                    <div class="total-payment-col">
                                        <label class="gerenric_checkbox">
                                            Card <input type="radio"
                                                {{ isset($fields['payment_method']) && !is_null($fields['payment_method']) && $fields['payment_method'] === 'card' ? 'checked' : '' }}
                                                name="payment_method" value="card"><span class="checkmark"
                                                for="total_card"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="total-payment-block">
                                <div class="total-filter-title">Car Type</div>
                                <div class="total-payment-block-inner">
                                    <div class="total-payment-col">
                                        <label class="gerenric_checkbox">
                                            Economy <input type="radio"
                                                {{ isset($fields['car_type']) && !is_null($fields['car_type']) && $fields['car_type'] === 'economy' ? 'checked' : '' }}
                                                name="car_type" value="economy"><span class="checkmark"
                                                for="car_type1"></span>
                                        </label>
                                    </div>
                                    <div class="total-payment-col">
                                        <label class="gerenric_checkbox">
                                            Comfort <input type="radio"
                                                {{ isset($fields['car_type']) && !is_null($fields['car_type']) && $fields['car_type'] === 'comfort' ? 'checked' : '' }}
                                                name="car_type" value="comfort"><span class="checkmark"
                                                for="car_type2"></span>
                                        </label>
                                    </div>
                                    <div class="total-payment-col">
                                        <label class="gerenric_checkbox">
                                            Business <input type="radio"
                                                {{ isset($fields['car_type']) && !is_null($fields['car_type']) && $fields['car_type'] === 'business' ? 'checked' : '' }}
                                                name="car_type" value="business"><span class="checkmark"
                                                for="car_type3"></span>
                                        </label>
                                    </div>
                                    <div class="total-payment-col">
                                        <label class="gerenric_checkbox">
                                            SUV <input type="radio"
                                                {{ isset($fields['car_type']) && !is_null($fields['car_type']) && $fields['car_type'] === 'suv' ? 'checked' : '' }}
                                                name="car_type" value="suv"><span class="checkmark"
                                                for="car_type4"></span>
                                        </label>
                                    </div>
                                    <div class="total-payment-col">
                                        <label class="gerenric_checkbox">
                                            Ex-Suv <input type="radio"
                                                {{ isset($fields['car_type']) && !is_null($fields['car_type']) && $fields['car_type'] === 'ex-suv' ? 'checked' : '' }}
                                                name="car_type" value="ex-suv"><span class="checkmark"
                                                for="car_type5"></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="total-payment-button">
                                <button type="button" class="btn btn-primary button-transparent" id="resetForm">Reset
                                    All</button>
                                <button type="button" class="btn btn-primary filterbutton">Confirm</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="gerenric-ride-status">
                    <ul class="status-list">
                        <li><a data-status_id="all" class="active_status" href="javascript:void(0)">
                                <div class="status-title">All</div>
                                <div class="status-value confirmed-color-text all">{{ $all_rides }}</div>
                            </a></li>
                        <li>
                            <a data-status_id="2" href="javascript:void(0)">
                                <div class="status-title">Pending</div>
                                <div class="status-value pending-color-text">{{ $pending_rides }}</div>
                            </a>
                        </li>
                        <li><a data-status_id="4" href="javascript:void(0)">
                                <div class="status-title">Confirmed</div>
                                <div class="status-value confirmed-color-text">{{ $confirmed_rides }}</div>
                            </a></li>
                        <li><a data-status_id="1" href="javascript:void(0)">
                                <div class="status-title">Completed</div>
                                <div class="status-value completed-color-text">{{ $complete_rides }}</div>
                            </a></li>
                        <li><a data-status_id="3" data-type="admin-cancel" href="javascript:void(0)">
                                <div class="status-title">Admin Cancelled</div>
                                <div class="status-value cancelled-color-text">{{ $cancel_rides }}</div>
                            </a></li>
                         <li><a data-status_id="3" data-type="user-cancel" href="javascript:void(0)">
                                <div class="status-title">User Cancelled</div>
                                <div class="status-value cancelled-color-text">{{ $user_canceled }}</div>
                            </a></li>
                        <li><a data-status_id="res" href="javascript:void(0)">
                                <div class="status-title">Reschedule Rides</div>
                                <div class="status-value reschedule-color-text">{{ $reschedule_rides }}</div>
                            </a></li>
                        <!-- <li><a href="javascript:void(0)"><div class="status-title">Assign Me</div><div class="status-value assign-me-color-text">00</div></a></li>
                                                                                        <li><a href="javascript:void(0)"><div class="status-title">Assigned</div><div class="status-value assigned-color-text">00</div></a></li>
                                                                                        <li><a href="javascript:void(0)"><div class="status-title">Active</div><div class="status-value active-color-text">10</div></a></li>
                                                                                        <li><a href="javascript:void(0)"><div class="status-title">Warning</div><div class="status-value warning-color-text">00</div></a></li> -->
                    </ul>
                </div>

                <div class="admin-page pt-4 pb-5">
                    <div class="gerenric-table-desktop table-desktop-show column-7 align-items-top">
                        <div class="table-scroll-div">
                            <div class="table-row">
                                <div class="table-col">
                                    <div class="main-table-checkbox">
                                        <div class="table-checkbox">
                                            <label class="gerenric_checkbox"><input name="select_all" type="checkbox"
                                                    id="select-all"><span class="checkmark"></span></label>
                                        </div>
                                        <div class="number-sign">#</div>
                                    </div>
                                </div>
                                <div class="table-col">Booking Info</div>
                                <div class="table-col">Ride Details</div>
                                <div class="table-col">User</div>
                                <div class="table-col">Passenger Details</div>
                                <div class="table-col">Ride Status</div>
                                <div class="table-col">Action</div>
                            </div>
                            <div class="tablelist">
                                @include('admin.bookings.table')
                            </div>

                        </div>
                    </div>
                    <div class="gerenric-pagination">
                        @include('admin.bookings.pagination')
                    </div>
                </div>
            </form>



        </div>

    </section>
    <!--CONTENT_SECTION_END-->

    <div class="modal width-1200 fade gerenric-popup" id="booking_edit_popup" tabindex="-1"
        aria-labelledby="booking_edit_popup" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">

                <div class="editbooking">

                </div>
            </div>
        </div>
    </div>
    @include('modals.success')
    @include('modals.cancel')

    {{-- Assign Modal Start --}}
     <!-- Modal -->
    <div class="modal fade assign-modal" id="smallModal" tabindex="-1" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="smallModalLabel">Assign Driver</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST" autocomplete="off" id="status-form">
          @csrf 
          <input type="hidden" name="ride_id" value="">
          <input type="hidden" name="status" value="">
        
        <div class="modal-body">
            <div class="form-group">
                <label for="" class="form-control-label">Drivers</label>
                {{-- <input type="text" id="myInput" class="form-control" placeholder="Select Driver" name="driver">
                <ul id="dropdown" style="display:none; border:1px solid #ccc; max-height:100px; overflow:auto; position:absolute; background:#fff; width:264px;">
                 @foreach (\App\Models\User::where('role_id',3)->get() as $item)
                    <li style="color: black;">{{ $item->name }}</li> 
                 @endforeach --}}
                 <select name="driver" id="" class="form-control">
                    <option value="">Please Choose</option>
                    @foreach (\App\Models\User::where('role_id',3)->get() as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</li> 
                    @endforeach
                 </select>
                    
                </ul>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    {{-- Assign Modal End --}}
    {{-- Donwload Table Data --}}
    <div class="download-data" style="display: none;">

    </div>

    <div id="loader" class="loader-wrapper" style="display: none;">
      <div class="loader"></div>
    </div>

    {{-- Cancel Modal Starts --}}
      <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cancel Ride</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.ride-status') }}" method="POST" id="cancel-form">
                 @csrf
                 <input type="hidden" name="status" value="3">
                 <input type="hidden" name="ride_id" value="">
                <div class="modal-body">
                    {{-- row Start --}}
                      {{-- <div class="row checkbox-wrapper">

                        <div class="col col-md-6">
                            <div class="form-group form-check mb-3 chekcbox">
                                    <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Change of plans" id="largeCheck">
                                <label class="form-check-label">Change of Plans</label>
                                
                            </div>
                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Price is too high" id="largeCheck">
                                <label class="form-check-label">Price is too high</label>
                            </div>
                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Need to modify booking details" id="largeCheck">
                                <label class="form-check-label">Need to modify booking details</label>
                            </div>
                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="No longer need the ride" id="largeCheck">
                                <label class="form-check-label">No longer need the ride</label>
                            </div>
                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Concerned about safety" id="largeCheck">
                                <label class="form-check-label">Concerned about safety</label>
                            </div>
                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Found a more affordable option" id="largeCheck">
                                <label class="form-check-label">Found a more affordable option</label>
                            </div>
                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Unexpected emergency or urgent commitment" id="largeCheck">
                                <label class="form-check-label">Unexpected emergency or urgent commitment</label>
                            </div>
                        </div>
                        
                        <div class="col col-md-6">

                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Accidental booking" id="largeCheck">
                                <label class="form-check-label">Accidental booking</label>
                            </div>

                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Technical issue with the app or payment" id="largeCheck">
                                <label class="form-check-label">Technical issue with the app or payment</label>
                            </div>

                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Chauffeur arrived at the wrong location" id="largeCheck">
                                <label class="form-check-label">Chauffeur arrived at the wrong location</label>
                            </div>

                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Unable to reach the chauffeur" id="largeCheck">
                                <label class="form-check-label">Unable to reach the chauffeur</label>
                            </div>

                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Driver is late" id="largeCheck">
                                <label class="form-check-label">Driver is late</label>
                            </div>

                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Ride got delayed, and I made alternative arrangements" id="largeCheck">
                                <label class="form-check-label">Ride got delayed, and I made alternative arrangements</label>
                            </div>

                            <div class="form-group form-check mb-3 chekcbox">
                                <input class="form-check-input-large" type="checkbox" name="remarks[]" value="Prefer a different vehicle type or category" id="largeCheck">
                                <label class="form-check-label">Prefer a different vehicle type or category</label>
                            </div>

                        </div>

                      </div> --}}
                      <div class="cancel_checkboxs">
                                <ul>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Change of plans">
                                                
                                                <p class="checkbox__textwrapper">Change of plans</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Accidental booking">
                                                
                                                <p class="checkbox__textwrapper">Accidental booking</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Price is too high">
                                                
                                                <p class="checkbox__textwrapper">Price is too high</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Technical issue with the app or payment">
                                                
                                                <p class="checkbox__textwrapper">Technical issue with the app or payment</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Need to modify booking details">
                                                
                                                <p class="checkbox__textwrapper">Need to modify booking details </p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Chauffeur arrived at the wrong location">
                                                
                                                <p class="checkbox__textwrapper">Chauffeur arrived at the wrong location</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="No longer need the ride">
                                                
                                                <p class="checkbox__textwrapper">No longer need the ride</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Unable to reach the chauffeur">
                                                
                                                <p class="checkbox__textwrapper">Unable to reach the chauffeur</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Concerned about safety">
                                                
                                                <p class="checkbox__textwrapper">Concerned about safety</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Driver is late">
                                                
                                                <p class="checkbox__textwrapper">Driver is late</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Found a more affordable option">
                                                
                                                <p class="checkbox__textwrapper">Found a more affordable option</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Ride got delayed, and I made alternative arrangements">
                                                
                                                <p class="checkbox__textwrapper">Ride got delayed, and I made alternative arrangements</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Unexpected emergency or urgent commitment">
                                                
                                                <p class="checkbox__textwrapper">Unexpected emergency or urgent commitment</p>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox-wrapper">
                                            <label class="checkbox">
                                                <input class="checkbox__trigger visuallyhidden" type="checkbox" name="remarks[]" value="Prefer a different vehicle type or category">
                                                
                                                
                                                <p class="checkbox__textwrapper">Prefer a different vehicle type or category</p>
                                            </label>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                      <div class="form-group">
                        <textarea class="form-control" name="remarks[]" id="" cols="30" rows="10" placeholder="Other Reason"></textarea>
                      </div>
                    {{-- row End --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
      </div>
    {{-- Cancel Modal Starts --}}
@endsection

@section('js')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.driver-select').select2({
                    placeholder: "Assign Driver",
                    allowClear: true
                });
    });
</script>
<script>
    $(document).ready(function(){
    $('#myInput').on('focus', function() {
        $('#dropdown').show();
    });

    $('#dropdown li').on('click', function() {
        $('#myInput').val($(this).text());
        $('#dropdown').hide();
    });

    // Hide if click outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#myInput, #dropdown').length) {
        $('#dropdown').hide();
        }
    });
    });
</script>
    <script>
        // setTimeout(function() {
        //     window.location.reload(1);
        // }, 900000); 
        // 60000 milliseconds = 1 minute

        $(document).ready(function() {
            $(document).on('submit', '#citytourform', function(e) {
                e.preventDefault();
                var formData = new FormData($('#citytourform')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let url = "{{ url('admin/update-booking') }}";
                $.ajax({
                    url: url,
                    type: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(data) {

                        if (data.status === 301) {
                            $('.alter-title').text(data.message);
                            $('#error_btn').text('Close it!');
                            $("#exampleModal_ss").modal('show');
                        } else if (data.status === 200) {
                            $("#booking_edit_popup").modal('hide');
                            $('.alter-title').text(data.message);
                            $('#success_btn').text('Close it!');
                            $("#exampleModal_ss").modal('show');
                            $('#citytourform')[0].reset()
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#error_text').empty();
                        $.each(xhr.responseJSON.errors, function(index, value) {
                            $('#error_text').append(value + '<br/>')
                        });
                        // $('#error_text').text('Something went wrong.');
                        $('#error_btn').text('Close it!');
                        $("#exampleModal_cc").modal('show');
                    }
                });
            });

            $(document).on('submit', '#personaldriverform', function(e) {
                e.preventDefault();
                var formData = new FormData($('#personaldriverform')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let url = '/admin/update-booking';
                $.ajax({
                    url: url,
                    type: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(data) {

                        if (data.status === 301) {
                            $('.alter-title').text(data.message);
                            $('#error_btn').text('Close it!');
                            $("#exampleModal_ss").modal('show');
                        } else if (data.status === 200) {
                            $("#booking_edit_popup").modal('hide');
                            $('.alter-title').text(data.message);
                            $('#success_btn').text('Close it!');
                            $("#exampleModal_ss").modal('show');
                            $('#citytourform')[0].reset()
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#error_text').empty();
                        $.each(xhr.responseJSON.errors, function(index, value) {
                            $('#error_text').append(value + '<br/>')
                        });
                        // $('#error_text').text('Something went wrong.');
                        $('#error_btn').text('Close it!');
                        $("#exampleModal_cc").modal('show');
                    }
                });
            });

            $(document).on('submit', '#tourform', function(e) {
                e.preventDefault();
                var formData = new FormData($('#tourform')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let url = '/admin/update-booking';
                $.ajax({
                    url: url,
                    type: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(data) {

                        if (data.status === 301) {
                            $('.alter-title').text(data.message);
                            $('#error_btn').text('Close it!');
                            $("#exampleModal_ss").modal('show');
                        } else if (data.status === 200) {
                            $("#booking_edit_popup").modal('hide');
                            $('.alter-title').text(data.message);
                            $('#success_btn').text('Close it!');
                            $("#exampleModal_ss").modal('show');
                            $('#citytourform')[0].reset()
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#error_text').empty();
                        $.each(xhr.responseJSON.errors, function(index, value) {
                            $('#error_text').append(value + '<br/>')
                        });
                        // $('#error_text').text('Something went wrong.');
                        $('#error_btn').text('Close it!');
                        $("#exampleModal_cc").modal('show');
                    }
                });
            });
        });

        function donwload_ride_data(ride_ids) {
            
            var table_data = "<table id='download-ride'><thead><tr><th>Ride Type</th><th>Booking No</th><th>Ride Date</th><th>Pickup Location</th><th>Dropup Location</th><th>Passengers</th><th>Car</th><th>Driver Name</th><th>Driver Contact</th><th>Name</th><th>Contact</th><th>Watsapp</th><th>Child Seat Amount</th><th>Photo Graphy Amount</th><th>Tip Amount</th><th>Total Amount</th><th>Flight Details</th><th>Meet & Greet</th><th>Note</th><th>Status</th></tr></thead><tbody>";
                
                $.ajax({
                    type:'get',
                    url:"{{ url('admin/getRideJson')}}",
                    data:{ride_ids},
                    dataType:'json',
                    success: function(data){

                        $.each(data,function(){
                            var row = this,
                                total_passengers = 0;

                            if ((!isNaN(row.adults) ? parseInt(row.adults) : 0) + (!isNaN(row.children) ? parseInt(row.children) : 0) + (!isNaN(row.luggage) ? parseInt(row.luggage) : 0) === 0) {
                                
                                total_passengers = parseFloat(row.vehicle.passengers);
                            }else{
                                total_passengers = !isNaN(parseInt(row.adults)) ? parseInt(row.adults) : 0 + (!isNaN(row.children ) ? parseInt(row.children) : 0 ) + (!isNaN(row.luggage) ? parseInt(row.luggage) : 0);
                            }

                            let backendDate = row.ride_date+" "+row.ride_time;
                            let formatted = moment(backendDate).format("MMMM Do, YYYY hh:mm:ss A");

                            let ride_status = '';

                            if (row.status == 1) {
                                ride_status = 'Completed';
                            }else if(row.status == 2){
                                ride_status = 'Pending';
                            }else if(row.status == 3){
                                ride_status = 'Cancelled';
                            }else if(row.status == 4){
                                ride_status = 'Confirmed';
                            }else if(row.status == 5){
                                ride_status = 'Assigned';
                            }else if(row.status == 6){
                                ride_status = 'Driver enroute';
                            }else if(row.status == 7){
                                ride_status = 'Driver at Location';
                            }else if(row.status == 8){
                                ride_status = 'route to drop off';
                            }

                            let driver_name = '',
                                driver_contact = '';

                            if (row.driver) {
                                driver_name = row.driver.name;
                                driver_contact = row.driver.mobile_number;
                            }
                            

                            table_data += "<tr><td>"+row.ridetype.type +"</td><td>"+ row.booking_code +"</td><td>"+ formatted +"</td><td>"+ row.source +"</td><td>"+ row.destination +"</td><td>"+ total_passengers +"</td><td>"+ row.vehicle.title +"</td><td>"+ driver_name +"</td><td>"+ driver_contact +"</td><td>"+ row.display_name +"</td><td>"+ row.mobile_number +"</td><td>"+ row.whatsapp_number +"</td><td>"+ row.children_seat_amount +"</td><td>"+ row.photography_amount +"</td><td>"+ row.tip_amount +"</td><td>"+ row.price +"</td><td>"+ row.flight_number+"</td><td>"+ row.meet_greet +"</td><td>"+ row.note +"</td><td>"+ride_status +"</td></tr>";

                        });

                         table_data += "</tbody></table>";

                         $('.download-data').empty();
                         $('.download-data').html(table_data);

                        var wb = XLSX.utils.book_new();
                        var ws = XLSX.utils.table_to_sheet(document.getElementById("download-ride"));
                        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

                        var file_name = Date.now();

                        XLSX.writeFile(wb, "Rides Data-"+file_name+".xlsx");
                        $('.download-data').empty();
                    }
                });

               
        }


        $(document).ready(function() {
            $('#action').click(function() {
                var rideStatusInputs = $('#ride_action_form select[name="ride_action"]').val();


                if (rideStatusInputs === 'Select Options') {
                    $("#exampleModal_cc").modal('show');
                    $('.error_text').html('Please select a specific action!');
                    return false;
                }

                var rideValues = $(
                    '.admin-page .main-table-checkbox .table-checkbox input[name="ride_id[]"]:checked');
                var rideIds = [];

                rideValues.each(function() {
                    rideIds.push($(this).val());
                });
                if (rideIds.length === 0) {

                    $("#exampleModal_cc").modal('show');
                    $('.error_text').html('Please select at least one ride!');
                    return false;

                }


 
                if (rideStatusInputs === 'delete' || rideStatusInputs === 'download') {

                    let password = prompt("Enter Password To "+ rideStatusInputs +" The record ");
                    if (password === null || password === "" || password !="{{ env('USER_EXPORT_PASSWORD') }}") {
                        alert("Please Enter Valid password to "+ rideStatusInputs +"");
                        return false;
                    }else
                    {
                    //    $('#ride_action_form').submit(); 


                    donwload_ride_data(rideIds);

                    return ;

                       
                    }
                    // if (confirm(
                    //         "Are you sure you want to delete this ride? This action cannot be undone.")) {
                    //     $('#ride_action_form').submit();
                    // } else {
                    //     return false;
                    // }


                } else if (rideStatusInputs === 'past') {
                    if (confirm(
                            "Are you sure you want to move this ride to the past? This action cannot be undone."
                        )) {
                        $('#ride_action_form').submit();
                    } else {
                        return false;
                    }
                }

            });



            $('#select-all').click(function(event) {
                if (this.checked) {
                    // Iterate each checkbox
                    $(':checkbox').each(function() {
                        this.checked = true;
                    });
                } else {
                    $(':checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });
            $(".city-total-select").click(function() {
                $(".city-total-filter").slideToggle();
            });
            $(".total-filter-close").click(function() {
                $(".city-total-filter").slideUp();
            });

            $(document).on('click','#assign-me',function(e){

                e.preventDefault();

                let status = 5,
                    ride_id = $(this).data('ride_id');
                $('.assign-modal').find('form').find('[name="ride_id"]').val(ride_id);
                $('.assign-modal').find('form').find('[name="status"]').val(status);
                $('.assign-modal').modal('show');
            });

             $(document).on('change','[name="ride_driver"]',function(e){

                e.preventDefault();
                
                let status = $(this).data("status");
                let ride_id = $(this).data("ride_id"),
                    driver_id = $(this).val();

                if (!driver_id) {
                    return;
                }

                $('#loader').show();

                $.ajax({
                    url: "{{ url('admin/change/ride-status') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        status:status,
                        ride_id:ride_id,
                        driver: driver_id
                    },
                    type: "post",
                    success: function(data) {
                        $('#loader').hide();
                        $('.alter-title').text(data.message);
                        $('#success_btn').text('Close it!');
                        $("#exampleModal_ss").modal('show');
                    },
                    error: function(data) {
                        $('#loader').hide();
                        $('#error_text').text('Something went wrong.');
                        $('#error_btn').text('Close it!');
                        $("#exampleModal_cc").modal('show');
                    }
                });

            });
            $(document).on('change', '.ride_status', function(e) {

                e.preventDefault();
                let status = $(this).val();
                let ride_id = $(this).data("ride_id");
                
                if (status == '3') {
                    
                    $('#exampleModal').find('[name="ride_id"]').val(ride_id);
                    $('#exampleModal').modal('show');

                    return;
                }

                $('#loader').show();

                $.ajax({
                    url: "{{ url('admin/change/ride-status') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        status,
                        ride_id,
                        driver: null
                    },
                    type: "post",
                    success: function(data) {
                        $('#loader').hide();
                        $('.alter-title').text(data.message);
                        $('#success_btn').text('Close it!');
                        $("#exampleModal_ss").modal('show');
                    },
                    error: function(data) {
                        $('#loader').hide();
                        $('#error_text').text('Something went wrong.');
                        $('#error_btn').text('Close it!');
                        $("#exampleModal_cc").modal('show');
                    }
                });
                
            });


            $(document).on('click', '.search-icon', function() {
                let status = $(".search").val();


                $.ajax({
                    url: "{{ route('admin.search-filter') }}",
                    data: {
                        search: status,
                    },
                    type: "get",
                    success: function(data) {
                        $('.tablelist').html(data.response);
                        $('.gerenric-pagination').html(data.pagination);
                        bindPaginationLinksRidesSearch();
                    },
                    error: function(data) {
                        // $('#error_text').text('Something went wrong.');
                        // $('#error_btn').text('Close it!');
                        // $("#exampleModal_cc").modal('show');
                    }
                });
            });

            $('.status-list li a').click(function(e) {
                e.preventDefault();
                $('.status-list li a').removeClass('active_status');
                $(this).addClass('active_status');
                let status = $(this).data('status_id');
                var start_date = "{{ isset($_GET['start_date']) ? $_GET['start_date'] : '' }}";
                var end_date = "{{ isset($_GET['end_date']) ? $_GET['end_date'] : '' }}";
                var car_type = "{{ isset($_GET['car_type']) ? $_GET['car_type'] : '' }}";
                var payment_method = "{{ isset($_GET['payment_method']) ? $_GET['payment_method'] : '' }}";
                var cancel_type = $(this).data('type');
                $.ajax({
                    url: "{{ route('admin.filter-status') }}",
                    data: {
                        status,
                        start_date: start_date,
                        end_date: end_date,
                        car_type: car_type,
                        payment_method: payment_method,
                        cancel_type:cancel_type
                    },
                    type: "get",
                    success: function(data) {
                        $('.tablelist').html(data.response);
                        $('.gerenric-pagination').html(data.pagination);
                        bindPaginationLinks();
                    },
                    error: function(data) {
                        $('#error_text').text('Something went wrong.');
                        $('#error_btn').text('Close it!');
                        $("#exampleModal_cc").modal('show');
                    }
                });
            });

            $('.type-list li a').click(function(e) {
                e.preventDefault();
                $('.type-list li a').removeClass('active_ride');
                $(this).addClass('active_ride');
                let type = $(this).data('ride_type');

                $.ajax({
                    url: "{{ route('admin.type-filter') }}",
                    data: {
                        type,
                    },
                    type: "get",
                    success: function(data) {
                        $('.tablelist').html(data.response);
                        $('.gerenric-pagination').html(data.pagination);
                        bindPaginationLinksRides();

                    },
                    error: function(data) {
                        $('#error_text').text('Something went wrong.');
                        $('#error_btn').text('Close it!');
                        $("#exampleModal_cc").modal('show');
                    }
                });
            });


            function bindPaginationLinks() {
                $(document).off('click', '.pagination a').on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    loadRides(page);
                });
            }


            function bindPaginationLinksRides() {
                $(document).off('click', '.pagination a').on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    loadRidesType(page);
                });
            }

            function bindPaginationLinksRidesSearch() {
                $(document).off('click', '.pagination a').on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    loadRidesSearchType(page);
                });
            }

            function loadRides(page) {
                var status = $('.active_status').data(
                    'status_id'); // Assuming this is how you get the current status filter
                $.ajax({
                    url: "{{ route('admin.filter-status') }}",
                    data: {
                        page: page,
                        status: status
                    },
                    type: "GET",
                    success: function(data) {
                        $('.tablelist').html(data.response);
                        $('.gerenric-pagination').html(data.pagination);
                        bindPaginationLinks();
                    }
                });
            }

            function loadRidesType(page) {
                var status = $('.active_ride').data(
                    'ride_type'); // Assuming this is how you get the current status filter
                $.ajax({
                    url: "{{ route('admin.type-filter') }}",
                    data: {
                        page: page,
                        type: status
                    },
                    type: "GET",
                    success: function(data) {
                        $('.tablelist').html(data.response);
                        $('.gerenric-pagination').html(data.pagination);
                        bindPaginationLinksRides();
                    } 
                });
            }

            function loadRidesSearchType(page) {
                var status = $('.search').val(); // Assuming this is how you get the current status filter
                $.ajax({
                    url: "{{ route('admin.search-filter') }}",
                    data: {
                        page: page,
                        search: status
                    },
                    type: "GET",
                    success: function(data) {
                        $('.tablelist').html(data.response);
                        $('.gerenric-pagination').html(data.pagination);
                        bindPaginationLinksRidesSearch();
                    }
                });
            }
            // bindPaginationLinks(); // Initial binding
            // bindPaginationLinksRides(); // Initial binding
            // bindPaginationLinksRidesSearch(); // Initial binding


        });
        var carchange = '';
        var driver_weeks = 0;
        var driver_days = 0;
        var child_seat = 0;
        $(document).on('click', '.edit-booking', function() {
            var id = $(this).data('ride_id');

            $.ajax({
                url: "{{ url('admin/ride-edit') }}/" + id,
                type: "get",
                success: function(data) {
                    $('.editbooking').html(data.response);
                    $("#booking_edit_popup").modal('show');
                    jQuery(function() {
                        var j = jQuery;
                        var addInput = '#city_qty_5_PD';
                        var n = data.ride.driver_weeks ? data.ride.driver_weeks : 0;
                        j(addInput).val(n);
                        j('.city_plus_5_PD').on('click', function() {
                            j(addInput).val(++n);
                            driver_weeks = n;
                            makeAjaxCall2();
                        })
                        j('.city_min_5_PD').on('click', function() {
                            if (n >= 1) {
                                j(addInput).val(--n);
                                driver_weeks = n;
                                makeAjaxCall2();
                            } else {

                            }
                        });
                    });
                    jQuery(function() {
                        var j = jQuery;
                        var addInput = '#city_qty_6_PD';
                        var n = data.ride.driver_days ? data.ride.driver_days : 0;
                        j(addInput).val(n);
                        j('.city_plus_6_PD').on('click', function() {
                            j(addInput).val(++n);
                            driver_days = n;
                            makeAjaxCall2();
                        })
                        j('.city_min_6_PD').on('click', function() {
                            if (n >= 1) {
                                j(addInput).val(--n);
                                driver_days = n;
                                makeAjaxCall2();
                            } else {}
                        });
                    });
                    jQuery(function() {
                        var j = jQuery;
                        var adultInput = '#city_qty_1_CR';
                        var childInput = '#city_qty_2_CR';
                        var adultCount = data.ride.adults ? data.ride.adults : 0;
                        var childCount = data.ride.children ? data.ride.children : 0;

                        function getTotal() {
                            return parseInt(j(adultInput).val()) + parseInt(j(childInput)
                                .val());
                        }

                        j(adultInput).val(adultCount);
                        j(childInput).val(childCount);

                        j('.city_plus_1_CR').on('click', function() {
                            if (getTotal() < 7) {
                                j(adultInput).val(++adultCount);
                            } else {
                                showErrorModal(
                                    'You can select a maximum of 7 Persons in total'
                                );
                            }
                        });

                        j('.city_min_1_CR').on('click', function() {
                            if (adultCount > 0) {
                                j(adultInput).val(--adultCount);
                            }
                        });

                        j('.city_plus_2_CR').on('click', function() {
                            if (getTotal() < 7) {
                                j(childInput).val(++childCount);
                            } else {
                                showErrorModal(
                                    'You can select a maximum of 7 Persons in total'
                                );
                            }
                        });

                        j('.city_min_2_CR').on('click', function() {
                            if (childCount > 0) {
                                j(childInput).val(--childCount);
                            }
                        });

                        function showErrorModal(message) {
                            $('#error_text').text(message);
                            $('#error_btn').text('Close it!');
                            $("#exampleModal_cc").modal('show');
                        }
                    });
                    jQuery(function() {
                        var j = jQuery;
                        var addInput = '#city_qty_3_PD';
                        var n = data.ride.luggage ? data.ride.luggage : 0;

                        j(addInput).val(n);
                        j('.city_plus_3_PD').on('click', function() {

                            if (n == 5) {
                                $('#error_text').text(
                                    'You can select Maximum 5 Luggage bags');
                                $('#error_btn').text('Close it!');
                                $("#exampleModal_cc").modal('show');
                                return;
                            } else {

                                j(addInput).val(++n);
                            }
                        })
                        j('.city_min_3_PD').on('click', function() {
                            if (n >= 1) {
                                j(addInput).val(--n);
                            } else {}
                        });
                    });

                    jQuery(function() {
                        var j = jQuery;
                        var addInput = '#city_qty_3_CR';
                        var n = data.ride.luggage ? data.ride.luggage : 0;

                        j(addInput).val(n);
                        j('.city_plus_3_CR').on('click', function() {

                            if (n == 5) {
                                $('#error_text').text(
                                    'You can select Maximum 5 Luggage bags');
                                $('#error_btn').text('Close it!');
                                $("#exampleModal_cc").modal('show');
                                return;
                            } else {

                                j(addInput).val(++n);
                            }
                        })
                        j('.city_min_3_CR').on('click', function() {
                            if (n >= 1) {
                                j(addInput).val(--n);
                            } else {}
                        });
                    });

                    jQuery(function() {
                        var j = jQuery;
                        var addInput = '#city_qty_4_CR';
                        var n = data.ride.child_seats ? data.ride.child_seats : 0;

                        j(addInput).val(n);
                        j('.city_plus_4_CR').on('click', function() {

                            if (n == 1) {
                                $('#error_text').text(
                                    ' Maximum 1 one child seat can be selected');
                                $('#error_btn').text('Close it!');
                                $("#exampleModal_cc").modal('show');
                                return;
                            } else {
                                j(addInput).val(++n);
                                child_seat = n;
                                makeAjaxCall3();
                            }
                        })
                        j('.city_min_4_CR').on('click', function() {
                            if (n >= 1) {
                                j(addInput).val(--n);
                                child_seat = n;
                                makeAjaxCall3();
                            } else {}
                        });
                    });
                    jQuery(function() {
                        var j = jQuery;
                        var addInput = '#city_qty_4_PD';
                        var n = data.ride.child_seats ? data.ride.child_seats : 0;

                        j(addInput).val(n);
                        j('.city_plus_4_PD').on('click', function() {

                            if (n == 1) {
                                $('#error_text').text(
                                    ' Maximum 1 one child seat can be selected');
                                $('#error_btn').text('Close it!');
                                $("#exampleModal_cc").modal('show');
                                return;
                            } else {

                                j(addInput).val(++n);
                            }
                        })
                        j('.city_min_4_PD').on('click', function() {
                            if (n >= 1) {
                                j(addInput).val(--n);
                            } else {}
                        });
                    });

                    jQuery(function() {
                        var j = jQuery;
                        var adultInput = '#city_qty_1_PD';
                        var childInput = '#city_qty_2_PD';
                        var adultCount = data.ride.adults ? data.ride.adults : 0;
                        var childCount = data.ride.children ? data.ride.children : 0;

                        function getTotal() {
                            return parseInt(j(adultInput).val()) + parseInt(j(childInput)
                                .val());
                        }

                        j(adultInput).val(adultCount);
                        j(childInput).val(childCount);

                        j('.city_plus_1_PD').on('click', function() {
                            if (getTotal() < 7) {
                                j(adultInput).val(++adultCount);
                            } else {
                                showErrorModal(
                                    'You can select a maximum of 7 Persons in total'
                                );
                            }
                        });

                        j('.city_min_1_PD').on('click', function() {
                            if (adultCount > 0) {
                                j(adultInput).val(--adultCount);
                            }
                        });

                        j('.city_plus_2_PD').on('click', function() {
                            if (getTotal() < 7) {
                                j(childInput).val(++childCount);
                            } else {
                                showErrorModal(
                                    'You can select a maximum of 7 Persons in total'
                                );
                            }
                        });

                        j('.city_min_2_PD').on('click', function() {
                            if (childCount > 0) {
                                j(childInput).val(--childCount);
                            }
                        });

                        function showErrorModal(message) {
                            $('#error_text').text(message);
                            $('#error_btn').text('Close it!');
                            $("#exampleModal_cc").modal('show');
                        }
                    });

                    jQuery(function() {
                        var j = jQuery;
                        var adultInput = '#city_qty_1_CT';
                        var childInput = '#city_qty_2_CT';
                        var adultCount = data.ride.adults ? data.ride.adults : 0;
                        var childCount = data.ride.children ? data.ride.children : 0;

                        function getTotal() {
                            return parseInt(j(adultInput).val()) + parseInt(j(childInput)
                                .val());
                        }

                        j(adultInput).val(adultCount);
                        j(childInput).val(childCount);

                        j('.city_plus_1_CT').on('click', function() {
                            if (getTotal() < 7) {
                                j(adultInput).val(++adultCount);
                            } else {
                                showErrorModal(
                                    'You can select a maximum of 7 Persons in total'
                                );
                            }
                        });

                        j('.city_min_1_CT').on('click', function() {
                            if (adultCount > 0) {
                                j(adultInput).val(--adultCount);
                            }
                        });

                        j('.city_plus_2_CT').on('click', function() {
                            if (getTotal() < 7) {
                                j(childInput).val(++childCount);
                            } else {
                                showErrorModal(
                                    'You can select a maximum of 7 Persons in total'
                                );
                            }
                        });

                        j('.city_min_2_CT').on('click', function() {
                            if (childCount > 0) {
                                j(childInput).val(--childCount);
                            }
                        });

                        function showErrorModal(message) {
                            $('#error_text').text(message);
                            $('#error_btn').text('Close it!');
                            $("#exampleModal_cc").modal('show');
                        }
                    });

                    jQuery(function() {
                        var j = jQuery;
                        var addInput = '#city_qty_4_CT';
                        var n = data.ride.child_seats ? data.ride.child_seats : 0;

                        j(addInput).val(n);
                        j('.city_plus_4_CT').on('click', function() {

                            if (n == 1) {
                                $('#error_text').text(
                                    ' Maximum 1 one child seat can be selected');
                                $('#error_btn').text('Close it!');
                                $("#exampleModal_cc").modal('show');
                                return;
                            } else {

                                j(addInput).val(++n);
                            }
                        })
                        j('.city_min_4_CT').on('click', function() {
                            if (n >= 1) {
                                j(addInput).val(--n);
                            } else {}
                        });
                    });
                    jQuery(function() {
                        var j = jQuery;
                        var addInput = '#city_qty_3_CT';
                        var n = data.ride.luggage ? data.ride.luggage : 0;

                        j(addInput).val(n);
                        j('.city_plus_3_CT').on('click', function() {

                            if (n == 5) {
                                $('#error_text').text(
                                    'You can select Maximum 5 Luggage bags');
                                $('#error_btn').text('Close it!');
                                $("#exampleModal_cc").modal('show');
                                return;
                            } else {

                                j(addInput).val(++n);
                            }
                        })
                        j('.city_min_3_CT').on('click', function() {
                            if (n >= 1) {
                                j(addInput).val(--n);
                            } else {}
                        });
                    });
                    attemptAutocompleteInitialization();
                    attemptAutocompleteInitialization2();
                    attemptAutocompleteInitialization3();
                    carchange = data.ride.car;
                    driver_weeks = data.ride.driver_weeks;
                    driver_days = data.ride.driver_days;
                },
                error: function(data) {
                    $('#error_text').text('Something went wrong.');
                    $('#error_btn').text('Close it!');
                    $("#exampleModal_cc").modal('show');
                }
            });
        })

        function attemptAutocompleteInitialization() {
            var sourceInput = $('.source')[0];
            var destinationInput = $('.destination')[0];

            if (sourceInput && destinationInput) {
                var autocompleteSource = new google.maps.places.Autocomplete(sourceInput, {
                    componentRestrictions: {
                        country: 'ae'
                    }
                });
                google.maps.event.addListener(autocompleteSource, 'place_changed', function() {
                    sourceChanged = true; // Set the source changed flag
                    makeAjaxCall(); // Trigger the AJAX call
                });

                var autocompleteDestination = new google.maps.places.Autocomplete(destinationInput, {
                    componentRestrictions: {
                        country: 'ae'
                    }
                });
                google.maps.event.addListener(autocompleteDestination, 'place_changed', function() {
                    destinationChanged = true; // Set the destination changed flag
                    makeAjaxCall(); // Trigger the AJAX call
                });
            }
        }

        function attemptAutocompleteInitialization2() {
            var sourceInput2 = $('.source2')[0];
            var destinationInput2 = $('.destination2')[0];

            if (sourceInput2 && destinationInput2) {
                var autocompleteSource = new google.maps.places.Autocomplete(sourceInput2, {
                    componentRestrictions: {
                        country: 'ae'
                    }
                });
                google.maps.event.addListener(autocompleteSource, 'place_changed', function() {
                    sourceChanged2 = true; // Set the source changed flag
                    makeAjaxCall2(); // Trigger the AJAX call
                });

                var autocompleteDestination = new google.maps.places.Autocomplete(destinationInput2, {
                    componentRestrictions: {
                        country: 'ae'
                    }
                });
                google.maps.event.addListener(autocompleteDestination, 'place_changed', function() {
                    destinationChanged2 = true; // Set the destination changed flag
                    makeAjaxCall2(); // Trigger the AJAX call
                });
            }

        }

        function attemptAutocompleteInitialization3() {
            var sourceInput3 = $('.source3')[0];
            var destinationInput3 = $('.destination3')[0];

            if (sourceInput3 && destinationInput3) {
                var autocompleteSource = new google.maps.places.Autocomplete(sourceInput3, {
                    componentRestrictions: {
                        country: 'ae'
                    }
                });
                google.maps.event.addListener(autocompleteSource, 'place_changed', function() {
                    sourceChanged3 = true; // Set the source changed flag
                    makeAjaxCall3(); // Trigger the AJAX call
                });

                var autocompleteDestination = new google.maps.places.Autocomplete(destinationInput3, {
                    componentRestrictions: {
                        country: 'ae'
                    }
                });
                google.maps.event.addListener(autocompleteDestination, 'place_changed', function() {
                    destinationChanged3 = true; // Set the destination changed flag
                    makeAjaxCall3(); // Trigger the AJAX call
                });
            }

        }

        $(document).on('change', '#carselect', function() {
            var no_adults = $('input[name=adults]').val();
            var no_luggage = $('input[name=luggage]').val();
            var no_child = $('input[name=children]').val();
            var totalseat = parseFloat(no_adults) + parseFloat(no_child);
            var cartype = $(this).val();
            carchange = cartype;
            makeAjaxCall3();
            if (cartype == 'economy') {
                console.log(cartype, 'cartype', totalseat, 'totalseat')
                if (totalseat > 4) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 4 passenger  can selected')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                }

                if (no_luggage > 2) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 2 Suitcases can selected')
                    $('input[name=luggage]').val(0)
                }
            } else if (cartype == 'comfort') {
                console.log(cartype, 'cartype', totalseat, 'totalseat')

                if (totalseat > 4) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 4 passenger can be selected')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }

                if (no_luggage > 3) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 3 Suitcases can be selected')
                    $('input[name=luggage]').val(0)

                }
            } else if (cartype == 'business') {

                if (totalseat > 4) {
                    $("#cancel_popup").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 4 passenger is allowed')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }
                if (no_luggage > 3) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 3 Suitcases can selected')
                    $('input[name=luggage]').val(0)

                }
            } else if (cartype == 'suv') {

                if (totalseat > 7) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 7 passenger is allowed')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }
                if (no_luggage > 3) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 3  Suitcases can selected')
                    $('input[name=luggage]').val(0)

                }

            } else if (cartype == 'ex-suv') {

                var checktotalseat = true;

                if (totalseat > 7) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 7 passenger is allowed')
                    checktotalseat = false;
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }

                if (no_luggage > 5) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 5 Suitcases can selected')
                    $('input[name=luggage]').val(0)


                } else {
                    if (checktotalseat) {

                        $('input[name=next]').removeClass('hide')
                    } else {
                        $('input[name=next]').addClass('hide')

                    }

                }

            }


        })

        $(document).on('change', '#carselecttour', function() {
            var no_adults = $('input[name=adults]').val();
            var no_luggage = $('input[name=luggage]').val();
            var no_child = $('input[name=children]').val();
            var totalseat = parseFloat(no_adults) + parseFloat(no_child);
            var cartype = $(this).val();
            carchange = cartype;
            makeAjaxCall()
            if (cartype == 'economy') {
                console.log(cartype, 'cartype', totalseat, 'totalseat')
                if (totalseat > 4) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 4 passenger  can selected')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                }

                if (no_luggage > 2) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 2 Suitcases can selected')
                    $('input[name=luggage]').val(0)
                }
            } else if (cartype == 'comfort') {
                console.log(cartype, 'cartype', totalseat, 'totalseat')

                if (totalseat > 4) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 4 passenger can be selected')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }

                if (no_luggage > 3) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 3 Suitcases can be selected')
                    $('input[name=luggage]').val(0)

                }
            } else if (cartype == 'business') {

                if (totalseat > 4) {
                    $("#cancel_popup").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 4 passenger is allowed')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }
                if (no_luggage > 3) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 3 Suitcases can selected')
                    $('input[name=luggage]').val(0)

                }
            } else if (cartype == 'suv') {

                if (totalseat > 7) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 7 passenger is allowed')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }
                if (no_luggage > 3) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 3  Suitcases can selected')
                    $('input[name=luggage]').val(0)

                }

            } else if (cartype == 'ex-suv') {

                var checktotalseat = true;

                if (totalseat > 7) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 7 passenger is allowed')
                    checktotalseat = false;
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }

                if (no_luggage > 5) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 5 Suitcases can selected')
                    $('input[name=luggage]').val(0)


                } else {
                    if (checktotalseat) {

                        $('input[name=next]').removeClass('hide')
                    } else {
                        $('input[name=next]').addClass('hide')

                    }

                }

            }


        })

        $(document).on('change', '#carselectdriver', function() {
            var no_adults = $('input[name=adults]').val();
            var no_luggage = $('input[name=luggage]').val();
            var no_child = $('input[name=children]').val();
            var totalseat = parseFloat(no_adults) + parseFloat(no_child);
            var cartype = $(this).val();
            carchange = cartype;
            makeAjaxCall2()
            if (cartype == 'economy') {
                console.log(cartype, 'cartype', totalseat, 'totalseat')
                if (totalseat > 4) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 4 passenger  can selected')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                }

                if (no_luggage > 2) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 2 Suitcases can selected')
                    $('input[name=luggage]').val(0)
                }
            } else if (cartype == 'comfort') {
                console.log(cartype, 'cartype', totalseat, 'totalseat')

                if (totalseat > 4) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 4 passenger can be selected')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }

                if (no_luggage > 3) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 3 Suitcases can be selected')
                    $('input[name=luggage]').val(0)

                }
            } else if (cartype == 'business') {

                if (totalseat > 4) {
                    $("#cancel_popup").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 4 passenger is allowed')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }
                if (no_luggage > 3) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 3 Suitcases can selected')
                    $('input[name=luggage]').val(0)

                }
            } else if (cartype == 'suv') {

                if (totalseat > 7) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 7 passenger is allowed')
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }
                if (no_luggage > 3) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 3  Suitcases can selected')
                    $('input[name=luggage]').val(0)

                }

            } else if (cartype == 'ex-suv') {

                var checktotalseat = true;

                if (totalseat > 7) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 7 passenger is allowed')
                    checktotalseat = false;
                    $('input[name=adults]').val(0);
                    $('input[name=children]').val(0);
                } else {
                    $('input[name=next]').removeClass('hide')

                }

                if (no_luggage > 5) {
                    $("#exampleModal_cc").modal('show');
                    $('input[name=next]').addClass('hide')
                    $('.error_text').html('maximum 5 Suitcases can selected')
                    $('input[name=luggage]').val(0)


                } else {
                    if (checktotalseat) {

                        $('input[name=next]').removeClass('hide')
                    } else {
                        $('input[name=next]').addClass('hide')

                    }

                }

            }


        })


        function makeAjaxCall() {
            // Check if both source and destination have been changed before making the AJAX call
            $.ajax({
                url: "{{ route('admin.ride-distance') }}",
                method: 'GET',
                data: {
                    // Include data you want to send, for example:
                    source: $('.source').val(),
                    destination: $('.destination').val(),
                    cartype: carchange,
                    id: $('input[name="id"]').val()

                },
                success: function(response) {
                    console.log("AJAX call successful", response);
                    $('input[name=distance]').val(response.distance.distance);
                    $('input[name=duration]').val(response.distance.duration);
                    if (response.ride.payment_method == 'card') {
                        $('input[name=card_price]').val(response.price);
                    } else {
                        $('input[name=cash_price]').val(response.price);
                    }
                    sourceChanged = false;
                    destinationChanged = false;
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error("AJAX call failed", status, error);
                }
            });
        }

        function makeAjaxCall2() {
            // Check if both source and destination have been changed before making the AJAX call
            $.ajax({
                url: "{{ route('admin.ride-distance') }}",
                method: 'GET',
                data: {
                    // Include data you want to send, for example:
                    source: $('.source2').val(),
                    destination: $('.destination2').val(),
                    cartype: carchange,
                    driver_weeks: driver_weeks,
                    driver_days: driver_days,
                    id: $('input[name="id"]').val()

                },
                success: function(response) {
                    console.log("AJAX call successful", response);
                    $('input[name=distance]').val(response.distance.distance);
                    $('input[name=duration]').val(response.distance.duration);

                    if (response.ride.payment_method == 'card') {
                        $('input[name=card_price]').val(response.price);
                    } else {
                        $('input[name=cash_price]').val(response.price);
                    }
                    sourceChanged = false;
                    destinationChanged = false;
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error("AJAX call failed", status, error);
                }
            });
        }

        function makeAjaxCall3() {
            // Check if both source and destination have been changed before making the AJAX call
            $.ajax({
                url: "{{ route('admin.ride-distance') }}",
                method: 'GET',
                data: {
                    // Include data you want to send, for example:
                    source: $('.source3').val(),
                    destination: $('.destination3').val(),
                    cartype: carchange,
                    child_seat: child_seat,
                    id: $('input[name="id"]').val()

                },
                success: function(response) {
                    console.log("AJAX call successful", response);
                    $('input[name=distance]').val(response.distance.distance);
                    $('input[name=duration]').val(response.distance.duration);

                    if (response.ride.payment_method == 'card') {

                        $('input[name=card_price]').val(response.price);
                    } else {
                        $('input[name=cash_price]').val(response.price);
                    }
                    sourceChanged = false;
                    destinationChanged = false;
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error("AJAX call failed", status, error);
                }
            });
        }
        // Initialize flags
        let sourceChanged = false;
        let destinationChanged = false;
        $(document).on('change', '.source', function() {
            sourceChanged = true;
        });
        $(document).on('change', '.destination', function() {
            destinationChanged = true;
        });

        let sourceChanged2 = false;
        let destinationChanged2 = false;
        $(document).on('change', '.source2', function() {
            sourceChanged2 = true;
        });
        $(document).on('change', '.destination2', function() {
            destinationChanged2 = true;
        });

        let sourceChanged3 = false;
        let destinationChanged3 = false;
        $(document).on('change', '.source3', function() {
            sourceChanged3 = true;
        });
        $(document).on('change', '.destination3', function() {
            destinationChanged3 = true;
        });
        $(document).on('click', '.cardw', function() {
            $('input[name=payment_method]').val('card');
        });
        $(document).on('click', '.cash', function() {
            $('input[name=payment_method]').val('cash');
        });

        $(document).on('change', '.cardw', function() {
            $('input[name=cash_price]').val(0);

        });
        $(document).on('change', '.cash', function() {
            $('input[name=card_price]').val(0);
        });
        $("#resetForm").click(function() {
            $('#ride_action_form').attr('method', 'GET');
            $('#ride_action_form').attr('action', '{{ url('admin/booking') }}');
            $('form#ride_action_form').find('[selected]').removeAttr('selected');
            $('form#ride_action_form').find('input').removeAttr('value');
            $('form#ride_action_form').find('input').removeAttr('checked');
            $('#ride_action_form').submit();
        })

        $(".filterbutton").click(function(event) { 

            event.preventDefault();
            $('#ride_action_form input[name="_token"]').remove();

            var rideStatusInputs = $('#ride_action_form select[name="ride_action"]').detach();
            var rideStatusInputs = $('#ride_action_form select[name="ride_status"]').detach();
            $('#ride_action_form').attr('method', 'GET');
            $('#ride_action_form').attr('action', '{{ url('admin/booking') }}');
            $('#ride_action_form').submit();
            $('#ride_action_form').append(rideStatusInputs);
        });

        document.body.addEventListener('click', function(event) {
            if (event.target.closest('.download-icon')) {
                var element = event.target.closest('.download-icon');
                var rideId = element.getAttribute('data-ride-id');

                console.log('Ride ID:', rideId);
                var form = document.createElement('form');
                form.action = '{{ route('admin.invoice.show') }}';
                form.method = 'GET';

                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'ride_id';
                input.value = rideId;
                form.appendChild(input);

                document.body.appendChild(form);
                form.submit();
            }
        });
    </script>
    <script>
        $(document).on('click','#reasons',function(e){
            e.preventDefault();

            var reasons = $(this).data('resons');
            var html_content = "";
            $.each(reasons.split(","),function(){

                html_content += this+"<br>";
            });

            $('#error_text').empty();
            $('.alter-title').text("Cancel Reasons");
            $("#error_text").css({'text-align':'left','font-weight':'bold'});
            $('#error_text').html(html_content);
            $('#error_btn').text('Close it!');
            $("#exampleModal_cc").modal('show');
        });
    </script>

    <script>
        $(document).on('submit','#cancel-form',function(e){
        e.preventDefault();

        var reasons = [];
        var other_remarks = $(this).find("textarea").val();

        $(this).find('input[type="checkbox"]:checked').each(function() {
            reasons.push($(this).val());
        });



        if (reasons.length === 0 && other_remarks.trim() === "") {

            

            alert("Please provide a reason for canceling the ride.");

            e.preventDefault();
            return;

        }
        // $('#loader').show();

        var url = $(this).attr('action');
            $.ajax({
            url: url,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cashe: false,
            processData: false,
            dataType: "json",
            success: function (html) {
                if (html.status == 200) {

                    location.reload();
                    
                } else {
                    // toastr.error(html.message);

                    alert(html.message);
                }
            },
            error: function (xhr, status, error) {
                if (xhr.status === 419) {
                location.reload(true);
                } else {
                console.log("Error:", xhr.responseText);
                alert("Error: " + xhr.responseText);
                }
                $('.outlined_red_btn').removeClass('disabled-button');
            },
        });
    });
    </script>
@endsection
