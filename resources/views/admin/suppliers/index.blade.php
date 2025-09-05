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
            <h3><strong>Suppliers List</strong></h3>
            <div class="d-flex justify-content-end mb-2">
                <a href="javascript(0)" data-store_url="{{ route('admin.supplier.store') }}" data-save_url = "" class="btn btn-success btn-add float-right"><i class="icon wb-plus-circle"></i>Add Supplier</a>
            </div>
           
         <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th>Name (Contact Person)</th>
                        <th>Company</th>
                        <th class="text-left">Phone</th>
                        <th class="text-left">Email Address</th>
                        <th class="text-left">Address</th>
                        <th class="text-center">Status</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                     <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $supplier->name}}</td>
                        <td>{{ $supplier->company_name }}</td>
                        <td class="text-left">{{ $supplier->contact }}</td>
                        <td class="text-left">{{ $supplier->email }}</td>
                        <td class="text-left">{{ $supplier->address}}</td>
                        <td class="text-center">
                            <div class="gerenric-table-desktop">
                            @if($supplier->status == 1)
                            <span class="confirm-ride cmpt-green" style=" color:aliceblue !important;min-width: 35px;padding: 10px;">Active</span>
                            @else
                            <span class="confirm-ride pending-yellow" style=" color:aliceblue !important;min-width: 35px;padding: 10px;">Inactive</span>
                            @endif
                            </div>
                        </td>
                        <td>
                            <a href="" data-update_url ="{{ route('admin.supplier.update',$supplier->id) }}" data-id="{{ $supplier->id}}" data-get_url="{{ route('admin.supplier.show',$supplier->id) }}" type="button" class="btn btn-primary vendor-edit">Edit</a>
                                <a href="{{ route('admin.supplier.destroy',$supplier->id) }}" type="button" class="btn btn-danger" id="delete-record">Delete</a>
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
                                <label for="" class="form-control-label">Name (Contact Person)</label>
                                <input type="text" name="name" id="" class="form-control" value="" required>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="" class="form-control-label">Email Address</label>
                                <input type="email" name="email" id="" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Status</label>
                                <select name="status" id="" class="form-control" required>
                                    <option value="">Please Choose</option>
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                            </div>
                            {{-- End --}}
                        </div>
                        <div class="col col-md-6">
                            {{-- Start --}}
                            <div class="form-group">
                                <label for="" class="form-control-label">Company Name</label>
                                <input type="text" name="company_name" id="" class="form-control" value="" required>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-control-label">Phone</label>
                                <input type="text" name="contact" id="" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                            <label for="" class="form-control-label">Address</label>
                            {{-- <input type="text" name="car_details" id="" class="form-control" value=""> --}}
                            <textarea name="address" class="form-control" id="" cols="5" rows="3"></textarea>
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
        $('#driver').find('.modal-title').text('Add New Supplier');
        $('#driver').find('.btn-primary').text("Save");
        $('#driver').modal('show');
    });
    $(document).on('submit','form',function(e){
        e.preventDefault();
        var url = $(this).attr('action'),
            form_data = new FormData(this);

        $.ajax({
            url: url,
            type: 'POST',
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
    $(document).on('click','.vendor-edit',function(e){
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
                        $('#driver').find('form').find('[name="contact"]').val(data.contact);
                        $('#driver').find('form').find('[name="company_name"]').val(data.company_name);
                        $('#driver').find('form').find('[name="address"]').val(data.address);
                        $('#driver').find('form').find('[name="email"]').val(data.email);
                        $('#driver').find('form').find('[name="status"]').val(data.status);
                        $('#driver').find('form').attr('method','put');
                        $('#driver').find('.modal-title').text('Update Supplier Informations');
                        $('#driver').find('.btn-primary').text("Update");
                        $('#driver').find('form').append('<input type="hidden" name="_method" value="PUT">');
                        $('#driver').modal('show');
                    }
                }
            }
        )
    });
  </script>
  <script>
    $(document).on('click','#delete-record',function(e){
        e.preventDefault();

        let url = $(this).attr('href');

        var confirmation = confirm("Are you sure you want to delete this item?");

        if (!confirmation) {
            return;
        }

        $.ajax({
            type:'delete',
            url:url,
            dataType:'json',
            data:{
                _token:"{{ csrf_token() }}"
            },
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
        })
    });
  </script>
@endsection
