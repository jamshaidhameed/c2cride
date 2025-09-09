@extends('admin.layout.app')

@section('content')
    <!--CONTENT_SECTION_START-->
    <section id="content-section">
        <div class="page-container">
            @include('admin.layout.links')

            <div class="gerenric-bulk-actions">
                <ul>
                    <li>
                        <form id="bulk-action-form" method="POST" action="{{ url('admin/ride/action') }}">
                            @csrf
                            <div class="select-bar">
                                <div class="select-block">
                                    <select class="select-input form-select" name="ride_action">
                                        <option value="">Select Options</option>
                                        <option value="booking">Move To Booking</option>
                                        <option value="download">Download</option>
                                        <option value="delete">Delete</option>
                                        <option value="send_invoice">Send Invoice</option>
                                    </select>
                                    <input type="button" class="select-button" value="Apply" id="select_input">
                                </div>
                            </div>
                    </li>
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
                    <li><a data-ride_type="all" href="javascript:void(0)" class="active_ride">View All 3 Rides</a></li>
                    <li><a data-ride_type="city" href="javascript:void(0)"><img
                                src="{{ asset('images/city_rides_link_icon.svg') }}" alt=""> City Rides</a></li>
                    <li><a data-ride_type="tour" href="javascript:void(0)"><img
                                src="{{ asset('images/city_tour_link_icon.svg') }}" alt=""> City Tour</a></li>
                    <li><a data-ride_type="driver" href="javascript:void(0)"><img
                                src="{{ asset('images/personal_driver_link_icon.svg') }}" alt=""> Book Hourly</a></li>
                </ul>
                <div class="city-total">
                    <div class="city-total-label">Total: {{ $rides_count }}</div>
                    <div class="city-total-label">Today</div>
                    <div class="city-total-select">{{ \Carbon\Carbon::now()->format('M-d-Y') }}</div>
                    <form id="ride_action_form">
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
                    </form>
                </div>
            </div>
            <div class="gerenric-ride-status">
                <ul class="status-list">
                    <li><a data-status_id="all" class="active_status" href="javascript:void(0)">
                            <div class="status-title">All</div>
                            <div class="status-value confirmed-color-text all">{{ $all_rides }}</div>
                        </a></li>

                    <li><a data-status_id="1" href="javascript:void(0)">
                            <div class="status-title">Completed</div>
                            <div class="status-value completed-color-text">{{ $complete_rides }}</div>
                        </a></li>
                    <li><a href="javascript:void(0)">
                            <div class="status-title">No Show</div>
                            <div class="status-value no-show-color-text">00</div>
                        </a></li>
                    <li><a data-status_id="3" data-type="admin-cancel" href="javascript:void(0)">
                            <div class="status-title">Admin Cancelled</div>
                            <div class="status-value cancelled-color-text">{{ $cancel_rides }}</div>
                        </a></li>
                    {{-- <li><a href="javascript:void(0)">
                            <div class="status-title">Driver Cancelled</div>
                            <div class="status-value driver-cancelled-color-text">00</div>
                        </a></li> --}}
                    <li><a href="javascript:void(0)" data-status_id="3" data-type="user-cancel">
                            <div class="status-title">User Cancelled</div>
                            <div class="status-value user-cancelled-color-text">{{$user_canceled}}</div>
                        </a></li>
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
                            @include('admin.pastrides.table')
                        </div>

                    </div>
                    <div class="gerenric-pagination">
                        @include('admin.pastrides.pagination')
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('modals.success')
    @include('modals.cancel')
    <!--CONTENT_SECTION_END-->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            function handleSearch() {
                let status = $('.search').val();

                $.ajax({
                    url: "{{ route('admin.past-search-filter') }}",
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
                        $('#error_text').text('Something went wrong.');
                        $('#error_btn').text('Close it!');
                        $("#exampleModal_cc").modal('show');
                    }
                });
            }

            // $(document).on('keyup', '.search', function() {
            //     handleSearch();
            // });

            $(document).on('click', '.search-icon', function() {
                handleSearch();
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


            //$(document).on('change', '.ride_status', function() {
              //  let status = $(this).val();
                //let ride_id = $(this).data("ride_id");
                //$.ajax({
                  //  url: "{{ url('admin/change/ride-status') }}",
                    //data: {
                      //  _token: "{{ csrf_token() }}",
                        //status,
                        //ride_id
                    //},
                    //type: "post",
                    //success: function(data) {
                      //  $('.alter-title').text(data.message);
                       // $('#success_btn').text('Close it!');
                       // $("#exampleModal_ss").modal('show');
                    //},
                    //error: function(data) {
                      //  $('#error_text').text('Something went wrong.');
                       // $('#error_btn').text('Close it!');
                        //$("#exampleModal_cc").modal('show');
                    //}
               // });
            //});


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
                    url: "{{ route('admin.past-filter-status') }}",
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
                    url: "{{ route('admin.past-type-filter') }}",
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



            function bindPaginationLinksRidesSearch() {
                $(document).off('click', '.pagination a').on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    loadRidesSearchType(page);
                });
            }

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

            function loadRides(page) {
                var status = $('.active_status').data(
                    'status_id'); // Assuming this is how you get the current status filter
                $.ajax({
                    url: "{{ route('admin.past-filter-status') }}",
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
                    url: "{{ route('admin.past-type-filter') }}",
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
                    url: "{{ route('admin.past-search-filter') }}",
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
            // bindPaginationLinksRidesSearch();

            $("#resetForm").click(function() {
                $('form#ride_action_form').find('[checked]').removeAttr('selected');
                $('form#ride_action_form').find('input').removeAttr('checked');
                $('form#ride_action_form').find('input').removeAttr('value');
                $('#ride_action_form').submit();
            })

        });

        $(document).ready(function() {
            $('#select_input').click(function() {
                var selectedAction = $('select[name="ride_action"]').val();
                var rideStatusInputs = $(
                    '.admin-page .main-table-checkbox .table-checkbox input[name="ride_id[]"]:checked');
                var rideIds = [];

                rideStatusInputs.each(function() {
                    rideIds.push($(this).val());
                });

                console.log(rideIds);


                if (!selectedAction) {

                    $("#exampleModal_cc").modal('show');
                    $('.error_text').html('Please select a specific action!');
                    return false;

                }

                if (rideIds.length === 0) {

                    $("#exampleModal_cc").modal('show');
                    $('.error_text').html('Please select at least one ride!');
                    return false;

                }


                var $form = $('#bulk-action-form');
                $form.find('input[name="ride_id[]"]')
                    .remove();
                $.each(rideIds, function(index, rideId) {
                    $form.append('<input type="hidden" name="ride_id[]" value="' + rideId + '">');
                });


                if (selectedAction === 'delete') {
                    if (confirm(
                            "Are you sure you want to delete this ride? This action cannot be undone.")) {
                        $form.submit();
                    } else {
                        return false;
                    }
                } else if (selectedAction === 'booking') {
                     
                    let password = prompt("Enter Password to move this ride to the booking ");
                    if (password === null || password === "" || password !="{{ env('USER_EXPORT_PASSWORD') }}") {
                        alert("Please Enter Valid password to move this ride to the booking");
                        return false;
                    }

                    $form.submit();

                }
                // else if (selectedAction === 'download') {
                //     if (confirm(
                //             "Are you sure you want to download that booking? This action cannot be undone."
                //         )) {
                //         $form.submit();
                //     } else {
                //         return false;
                //     }
                // } 
                else {
                    // $form.submit();
                }
            });

            $('#select-all').change(function() {
                $('input[name="ride_id[]"]').prop('checked', this.checked);
            });
        });
        $(document).ready(function() {
            $(".filterbutton").click(function(event) {
                event.preventDefault();

                var start_date = $('[name="start_date"]').val();
                var end_date = $('[name="end_date"]').val();
                var payment_method = $('[name="payment_method"]:checked').val();
                var car_type = $('[name="car_type"]:checked').val();

                var url = '{{ url('admin/past-rides') }}?';

                if (start_date) {
                    url += 'start_date=' + encodeURIComponent(start_date) + '&';
                }
                if (end_date) {
                    url += 'end_date=' + encodeURIComponent(end_date) + '&';
                }
                if (payment_method) {
                    url += 'payment_method=' + encodeURIComponent(payment_method) + '&';
                }
                if (car_type) {
                    url += 'car_type=' + encodeURIComponent(car_type) + '&';
                }
                url = url.slice(0, -1);

                window.location.href = url;
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
@endsection
