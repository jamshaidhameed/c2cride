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
</style>
@endsection
@section('content')
    <!--CONTENT_SECTION_START-->
    <section id="content-section">
        <div class="page-container">
            @include('admin.layout.links') 
            
            <br> <br>
            {{-- Car Pricing Module --}}
            {{-- City Rides Pricing --}}
            <h2>City Rides Pricing</h2>
            <div class="d-flex justify-content-end mb-2">
                <a href="javascript(0)" data-store_url="{{ url('admin/car/pricing/store') }}" data-save_url = "" class="btn btn-success btn-add float-right"><i class="icon wb-plus-circle"></i>Add Pricing</a>
            </div>
            <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-left">Car</th>
                        <th class="text-center">Base Price</th>
                        <th class="text-center">Above Twenty</th>
                        <th class="text-center">Above Thirty</th>
                        <th class="text-center">Above Fifty</th>
                        <th class="text-center">Above Seventy</th>
                        <th class="text-center">Above Hundred</th>
                        <th class="text-center">Above Hundred Thirty</th>
                        <th class="text-center">Airport Additional</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($car_types as $price)
                        
                        @if (!empty($price->car->title))
                            
                        
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</th>
                            <td class="text-left">{{ !empty($price->car->title) ? $price->car->title : '' }}</td>
                            <td class="text-center">{{ number_format($price->fixed_price,2) }}</td>
                            <td class="text-center">{{ number_format($price->above_twenty,2) }}</td>
                            <td class="text-center">{{ number_format($price->above_thirty,2) }}</td>
                            <td class="text-center">{{ number_format($price->above_fifty,2) }}</td>
                            <td class="text-center">{{ number_format($price->above_seventy,2) }}</td>
                            <td class="text-center">{{ number_format($price->above_hundred,2) }}</td>
                            <td class="text-center">{{ number_format($price->above_hundred_thirty,2) }}</td>
                            <td class="text-center">{{ number_format($price->ariport_additional,2) }}</td>
                            <td class="text-center">
                                <a href="" data-update_url ="{{ url('admin/car/pricing/update/'.$price->id) }}" data-id="{{ $price->id}}" data-get_url="{{ url('admin/car/pricing/get/'.$price->id)}}" type="button" class="btn btn-primary btn-edit">Edit</a>
                                <a href="{{ route('admin.car.pricing.delete',$price->id) }}" onclick="return confirm(`Are you sure to Delete the Record ? `)" type="button" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            </div>

            <hr>
            {{-- Hourly Tour Booking --}}
            <h2>Book Hourly Pricing</h2>
            <div class="d-flex justify-content-end mb-2">
                <a href="javascript(0)" data-store_url="{{ url('admin/hourly/pricing/store') }}" data-save_url = "" class="btn btn-success btn-add-hourly float-right"><i class="icon wb-plus-circle"></i>Add Pricing</a>
            </div>
            <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-left">Car</th>
                        <th class="text-center">Km Increment</th>
                        <th class="text-center">Price Increment</th>
                        <th class="text-center">Per Hour Price</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hourly_bookings as $hourly)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-left">{{ !empty($hourly->car->title) ? $hourly->car->title : ''}}</td>
                            <td class="text-center">{{ $hourly->km}}</td>
                            <td class="text-center">{{ $hourly->increment}}</td>
                            <td class="text-center">{{ $hourly->hourly_price}}</td>
                            <td class="text-center">
                                <a href="" data-update_url ="{{ url('admin/hourly/pricing/update/'.$hourly->id) }}" data-id="{{ $price->id}}" data-get_url="{{ url('admin/hourly/pricing/get/'.$hourly->id)}}" type="button" class="btn btn-primary btn-hourly-edit">Edit</a>
                                <a href="{{ route('admin.hourly.pricing.delete',$hourly->id) }}" onclick="return confirm(`Are you sure to Delete the Record ? `)" type="button" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <hr>
            {{-- City Tour Pricing --}}
            <h2>City Tour Pricing</h2>
            <div class="d-flex justify-content-end mb-2">
                <a href="javascript(0)" data-store_url="{{ url('admin/citytour/pricing/store') }}" data-save_url = "" class="btn btn-success btn-add-citytour float-right"><i class="icon wb-plus-circle"></i>Add Pricing</a>
            </div>

            <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-left">Car</th>
                        <th class="text-center">Five Hour Price</th>
                        <th class="text-center">Ten Hour Price</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citytour_ride_type_bookings as $hourly)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-left">{{ !empty($hourly->car->title) ? $hourly->car->title : ''}}</td>
                            <td class="text-center">{{ $hourly->five_hour_price}}</td>
                            <td class="text-center">{{ $hourly->ten_hour_price}}</td>
                            <td class="text-center">
                                <a href="" data-update_url ="{{ url('admin/citytour/pricing/update/'.$hourly->id) }}" data-id="{{ $price->id}}" data-get_url="{{ url('admin/citytour/pricing/get/'.$hourly->id)}}" type="button" class="btn btn-primary btn-citytour-edit">Edit</a>
                                <a href="{{ route('admin.citytour.pricing.delete',$hourly->id) }}" onclick="return confirm(`Are you sure to Delete the Record ? `)" type="button" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <hr>
            {{-- End City Rides --}}
        </div>

    </section>
    <!--CONTENT_SECTION_END-->

    <div class="modal fade gerenric-popup"  id="city-rides" tabindex="-1" aria-labelledby="reschedule_popup" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="reschedule-popup">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">City Rides Pricing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <form action="" method="post" id="pricing-form">
                    @csrf
                     <div class="form-group">
                        <label for="" class="form-control-label">Car</label>
                        <select name="car" id="" class="form-control" required>
                            <option value="">Please Choose</option>
                            @foreach (\App\Models\Vehicle::all() as $item)
                                <option value="{{ $item->slug}}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                         <label for="" class="form-control-label">Base Price</label>
                         <input type="number" min="0" step="any" name="base_price" id="" class="form-control">
                    </div> 
                     <div class="form-group">
                         <label for="" class="form-control-label">Above Twenty</label>
                         <input type="number" min="0" step="any" name="above_twenty" id="" class="form-control">
                    </div> 
                    <div class="form-group">
                         <label for="" class="form-control-label">Above Thirty</label>
                         <input type="number" min="0" step="any" name="above_thirty" id="" class="form-control">
                    </div> 
                    <div class="form-group">
                         <label for="" class="form-control-label">Above Fifty</label>
                         <input type="number" min="0" step="any" name="above_fifty" id="" class="form-control">
                    </div> 
                     <div class="form-group">
                         <label for="" class="form-control-label">Above Seventy</label>
                         <input type="number" min="0" step="any" name="above_seventy" id="" class="form-control">
                    </div>
                     <div class="form-group">
                         <label for="" class="form-control-label">Above Hundred</label>
                         <input type="number" min="0" step="any" name="above_hundred" id="" class="form-control">
                    </div>
                     <div class="form-group">
                         <label for="" class="form-control-label">Above Hundred & Thirty</label>
                         <input type="number" min="0" step="any" name="above_hundred_thirty" id="" class="form-control">
                    </div>
                     <div class="form-group">
                         <label for="" class="form-control-label">Airport Additional</label>
                         <input type="number" min="0" step="any" name="ariport_additional" id="" class="form-control">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                   </form>

                   {{-- hourly Pricing --}}
                   <form action="" method="post" id="hourly-pricing-form">
                    @csrf

                    <input type="hidden" name="ride_type_id" value="{{ $hourly_ride_type->id }}">
                     <div class="form-group">
                        <label for="" class="form-control-label">Car</label>
                        <select name="car" id="" class="form-control" required>
                            <option value="">Please Choose</option>
                            @foreach (\App\Models\Vehicle::all() as $item)
                                <option value="{{ $item->id}}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                         <label for="" class="form-control-label">KM Increment</label>
                         <input type="number" min="0" step="any" name="km" id="" class="form-control">
                    </div> 
                     <div class="form-group">
                         <label for="" class="form-control-label">Price Increment</label>
                         <input type="number" min="0" step="any" name="increment" id="" class="form-control">
                    </div>
                     <div class="form-group">
                         <label for="" class="form-control-label">Hourly Price</label>
                         <input type="number" min="0" step="any" name="hourly_price" id="" class="form-control">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                   </form>
                   {{-- End Hourly Pricing --}}

                   {{-- City Tour Form Start --}}
                    <form action="" method="post" id="citytour-pricing-form">
                    @csrf

                    <input type="hidden" name="ride_type_id" value="{{ $citytour_ride_type->id }}">
                     <div class="form-group">
                        <label for="" class="form-control-label">Car</label>
                        <select name="car" id="" class="form-control" required>
                            <option value="">Please Choose</option>
                            @foreach (\App\Models\Vehicle::all() as $item)
                                <option value="{{ $item->id}}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                         <label for="" class="form-control-label">Five Hour Price</label>
                         <input type="number" min="0" step="any" name="five_hour_price" id="" class="form-control">
                    </div> 
                     <div class="form-group">
                         <label for="" class="form-control-label">Ten Hour Price</label>
                         <input type="number" min="0" step="any" name="ten_hour_price" id="" class="form-control">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                   </form>
                   {{-- City Tour Form End --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Book Hourly Price Modal --}}
    <div class="modal fade gerenric-popup"  id="hourly-pricing" tabindex="-1" aria-labelledby="reschedule_popup" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="reschedule-popup">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">City Rides Pricing</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   
                </div>
            </div>
        </div>
    </div>
    {{-- End Book Hourly Price Modal --}}
</div>
    @include('modals.success')
    @include('modals.cancel')
@endsection

@section('js')
   <script>
    $(document).on('click','.btn-add',function(e){
        e.preventDefault();

        var url = $(this).data('store_url');
        $('#citytour-pricing-form').hide();
        $('#hourly-pricing-form').hide();
        $('#pricing-form').show();
        $('#city-rides').find("#exampleModalLabel").text("Ride Pricing");

        $('#city-rides').find('#pricing-form').attr("action",url);
        $('#city-rides').modal('show');
    });
   </script>
   <script>
    $(document).on('submit','#pricing-form',function(e){
        e.preventDefault();

        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cashe: false,
            processData: false,
            dataType: "json",
            success: function (data) {
            if (data.success) {
                //generateTranscript(data,transcript_modal);
                // location.reload();
                window.location.reload(true);
            } else if(data.errors) {
                
                var message = "";
                $.each(data.errors, function () {
                    message += this.toLocaleString() + "\n";
                });
                alert(message);
            }
            },
        });

    });
   </script>
   <script>
    $(document).on('click','.btn-edit',function(e){
        e.preventDefault();
        var get_url = $(this).data('get_url'),
           form = $('#pricing-form'),
           update_url = $(this).data('update_url');
           $('#hourly-pricing-form').hide();
           $('#citytour-pricing-form').hide();
           $('#pricing-form').show();
        $.ajax({
            type:'get',
            url:get_url, 
            dataType: 'json',
            success: function(data){

                if (data) {
                    
                    $(form).find('[name="car"]').val(data.slug);
                    $(form).find('[name="base_price"]').val(data.fixed_price);
                    $(form).find('[name="above_twenty"]').val(data.above_twenty);
                    $(form).find('[name="above_thirty"]').val(data.above_thirty);
                    $(form).find('[name="above_fifty"]').val(data.above_fifty);
                    $(form).find('[name="above_seventy"]').val(data.above_seventy);
                    $(form).find('[name="above_hundred"]').val(data.above_hundred);
                    $(form).find('[name="above_hundred_thirty"]').val(data.above_hundred_thirty);
                    $(form).find('[name="ariport_additional"]').val(data.ariport_additional);
                    $('#city-rides').find('form').attr("action",update_url);
                    $('#city-rides').find("#exampleModalLabel").text("Ride Pricing");
                    $('#city-rides').modal('show');
                }
            }
        })
    });
   </script>

   <script>
    $(document).on('click','.btn-add-hourly',function(e){
        e.preventDefault();

        var url = $(this).data('store_url');

        $('#pricing-form').hide();
        $('#citytour-pricing-form').hide();
        $('#hourly-pricing-form').show();
        $('#city-rides').find("#exampleModalLabel").text("Add Hourly Booking Pricing");

         $('#city-rides').find('#hourly-pricing-form').attr("action",url);
         $('#city-rides').find("#exampleModalLabel").text("Hourly Booking Pricing");
         $('#city-rides').modal('show');
    })
   </script>
   <script>
    $(document).on('submit','#hourly-pricing-form',function(e){
        e.preventDefault();

        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cashe: false,
            processData: false,
            dataType: "json",
            success: function (data) {
            if (data.success) {
                //generateTranscript(data,transcript_modal);
                // location.reload();
                window.location.reload(true);
            } else if(data.errors) {
                
                var message = "";
                $.each(data.errors, function () {
                    message += this.toLocaleString() + "\n";
                });
                alert(message);
            }
            },
        });

    });
   </script>
   <script>
    $(document).on('click','.btn-hourly-edit',function(e){
        e.preventDefault();
        var get_url = $(this).data('get_url'),
           form = $('#hourly-pricing-form'),
           update_url = $(this).data('update_url');
           $('#pricing-form').hide();
           $('#citytour-pricing-form').hide();
           
        $('#hourly-pricing-form').show();
        $.ajax({
            type:'get',
            url:get_url,
            dataType: 'json',
            success: function(data){

                if (data) {
                    
                    $(form).find('[name="car"]').val(data.car_id);
                    $(form).find('[name="km"]').val(data.km);
                    $(form).find('[name="increment"]').val(data.increment);
                    $(form).find('[name="hourly_price"]').val(data.hourly_price);
                    $(form).attr('action',update_url);
                    $('#city-rides').find("#exampleModalLabel").text("Edit Hourly Booking Pricing");
                    $('#city-rides').modal('show');
                }
            }
        })
    });
   </script>


<script>
    $(document).on('click','.btn-add-citytour',function(e){
        e.preventDefault();

        var url = $(this).data('store_url');

        $('#pricing-form').hide();
        $('#hourly-pricing-form').hide();
        $('#citytour-pricing-form').show();

         $('#city-rides').find('#citytour-pricing-form').attr("action",url);
         $('#city-rides').find("#exampleModalLabel").text("City Tour Pricing");
         $('#city-rides').modal('show');
    })
   </script>
   <script>
    $(document).on('submit','#citytour-pricing-form',function(e){
        e.preventDefault();

        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cashe: false,
            processData: false,
            dataType: "json",
            success: function (data) {
            if (data.success) {
                //generateTranscript(data,transcript_modal);
                // location.reload();
                window.location.reload(true);
            } else if(data.errors) {
                
                var message = "";
                $.each(data.errors, function () {
                    message += this.toLocaleString() + "\n";
                });
                alert(message);
            }
            },
        });

    });
   </script>
   <script>
    $(document).on('click','.btn-citytour-edit',function(e){
        e.preventDefault();
        var get_url = $(this).data('get_url'),
           form = $('#citytour-pricing-form'),
           update_url = $(this).data('update_url');
           $('#pricing-form').hide();
           $('#hourly-pricing-form').hide();
           $('#citytour-pricing-form').show();
        $.ajax({
            type:'get',
            url:get_url,
            dataType: 'json',
            success: function(data){

                if (data) {
                    
                    $(form).find('[name="car"]').val(data.car_id);
                    $(form).find('[name="five_hour_price"]').val(data.five_hour_price);
                    $(form).find('[name="ten_hour_price"]').val(data.ten_hour_price);
                    $(form).attr('action',update_url);
                    $('#city-rides').find("#exampleModalLabel").text("Edit City Tour Pricing");
                    $('#city-rides').modal('show');
                }
            }
        })
    });
   </script>
@endsection
