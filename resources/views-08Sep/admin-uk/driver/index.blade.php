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
            <h3><strong>Drivers List</strong></h3>
            <div class="d-flex justify-content-end mb-2">
                <a href="javascript(0)" data-store_url="{{ url('admin/driver/insert') }}" data-save_url = "" class="btn btn-success btn-add float-right"><i class="icon wb-plus-circle"></i>Add Driver</a>
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
                        <th class="text-center">Rides</th>
                        <th class="text-center">Earning</th>
                        <th class="text-left">Registered At</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($drivers_list as $driver)
                     <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $driver->name}}</td>
                        <td>{{ $driver->nick_name }}</td>
                        <td>{{ $driver->company_name }}</td>
                        <td class="text-center">{{ $driver->mobile_number }}</td>
                        <td class="text-left">{{ $driver->emirate }}</td>
                        <td class="text-left">{{ $driver->car_details}}</td>
                        <td class="text-center">
                            {{ \App\Models\Ride::driver_rides($driver->id) }}
                        </td>
                        <td class="text-center">
                            {{ number_format(\App\Models\Ride::driver_earning($driver->id),2)}} AED
                        </td>
                        <td>
                            {{ date_format(date_create($driver->created_at),'d-m-Y h:i A')}}
                        </td>
                        <td>
                            <a href="" data-update_url ="{{ url('admin/driver/update/'.$driver->id) }}" data-id="{{ $driver->id}}" data-get_url="{{ url('admin/driver/'.$driver->id)}}" type="button" class="btn btn-primary driver-edit">Edit</a>
                                <a href="{{ route('admin.driver.delete',$driver->id) }}" onclick="return confirm(`Are you sure to Delete the Record ? `)" type="button" class="btn btn-danger">Delete</a>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
        </div>

    </section>
    <!--CONTENT_SECTION_END-->

</div>
    @include('modals.success')
    @include('modals.cancel')
    {{-- Add Driver Modal Start --}}
    <div class="modal fade gerenric-popup"  id="driver" tabindex="-1" aria-labelledby="reschedule_popup" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="reschedule-popup">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Driver</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <form action="" method="post" autocomplete="off">
                    @csrf
                     <div class="row">
                        <div class="col col-md-6">
                            {{-- Start --}}
                            <div class="form-group">
                                <label for="" class="form-control-label">Name</label>
                                <input type="text" name="name" id="" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Company Name</label>
                                <input type="text" name="company_name" id="" class="form-control" value="" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="" class="form-control-label">Emirate</label>
                                <input type="text" name="emirate" id="" class="form-control" value="">
                            </div>
                            {{-- End --}}
                        </div>
                        <div class="col col-md-6">
                            {{-- Start --}}
                            <div class="form-group">
                                <label for="" class="form-control-label">Nick Name</label>
                                <input type="text" name="nick_name" id="" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Mobile</label>
                                <input type="text" name="mobile_number" id="" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                            <label for="" class="form-control-label">Car Details</label>
                            {{-- <input type="text" name="car_details" id="" class="form-control" value=""> --}}
                            <textarea name="car_details" class="form-control" id="" cols="5" rows="3"></textarea>
                        </div>
                            {{-- <div class="form-group">
                                <label for="" class="form-control-label">Email</label>
                                <input type="email" name="email" id="" class="form-control" value="" required>
                            </div> --}}

                              {{-- <div class="form-group">
                                <label for="" class="form-control-label">Watsapp</label>
                                <input type="text" name="whatsapp" id="" class="form-control" value="" required>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="" class="form-control-label"></label>
                                <input type="text" name="emirate" class="form-control">
                            </div> --}}
                            
                            {{-- End --}}
                        </div>
                     </div>
                     
                    <div class="form-group mt-2 mb-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Add Driver Modal End --}}
@endsection

@section('js')
  <script>
    $(document).on('click','.btn-add',function(e){
        e.preventDefault();
        var url = $(this).data('store_url');

        $('#driver').find('form').attr('action',url);
        $('#driver').find('.modal-title').text('Add New Driver');
        $('#driver').find('.btn-primary').text("Save");
        $('#driver').modal('show');
    });
    $(document).on('submit','form',function(e){
        e.preventDefault();
        var url = $(this).attr('action'),
            form_data = new FormData(this);

        $.ajax({
            url: url,
            type: "POST",
            data: form_data,
            contentType: false,
            cashe: false,
            processData: false,
            dataType: "json",
            success: function (html) {
            if (html.success) {
               window.location.reload(true);
            } else {
                alert(html.message);
            }
            },
            error: function (xhr, status, error) {
                if (xhr.status === 419) {
                location.reload(true);
                } else if(xhr.status === 422) {
                
                // alert("Error: " + xhr.responseText);
                    var error_text = "";
                    $.each(xhr.responseJSON.errors, function (index, value) {
                        // $('.errorMsgntainer').append('<span class="text-danger">'+value+'<span>'+'<br>');
                        error_text += value+"\n";
                    });
                    
                    alert(error_text);

                }else{
                    alert("Error: " + xhr.responseText);
                }
            },
        });
    });


    //Edit Driver 
    $(document).on('click','.driver-edit',function(e){
        e.preventDefault();

       var get_url = $(this).data('get_url'),
           update_url  = $(this).data('update_url');

        $('#driver').find('form').attr('action',update_url)
        
        $.ajax(
            {
                type:'get',
                url:get_url,
                dataType:'json',
                success:function(data){

                    if (data) {
                        
                        $('#driver').find('form').find('[name="name"]').val(data.name);
                        $('#driver').find('form').find('[name="nick_name"]').val(data.nick_name);
                        $('#driver').find('form').find('[name="mobile_number"]').val(data.mobile_number);
                        $('#driver').find('form').find('[name="company_name"]').val(data.company_name);
                        $('#driver').find('form').find('[name="emirate"]').val(data.emirate);
                        $('#driver').find('form').find('[name="car_details"]').val(data.car_details);
                        $('#driver').find('.modal-title').text('Update Driver Informations');
                        $('#driver').find('.btn-primary').text("Update");
                        $('#driver').modal('show');
                    }
                }
            }
        )
    });
  </script>
@endsection
