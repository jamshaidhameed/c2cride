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
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('admin.car.create') }}" class="btn btn-success btn-add float-right"><i class="icon wb-plus-circle"></i>Add New Car</a>
            </div>
           <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th>Car Name</th>
                        <th>Type</th>
                        <th class="text-center">Passengers</th>
                        <th class="text-center">Suitcases</th>
                        <th class="text-center">Discount % <br>Applied</th>
                        <th>Images</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                     <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $car->title}}</td>
                        <td>{{ $car->type }}</td>
                        <td class="text-center">{{ $car->passengers }}</td>
                        <td class="text-center">{{ $car->suitcases }}</td>
                        <td class="text-center">{{ number_format($car->discount,2) }}  %
                            <div class="gerenric-table-desktop">
                            @if($car->apply_discount == 1)
                            <span class="confirm-ride cmpt-green" style=" color:aliceblue !important;min-width: 35px;padding: 10px;">Yes</span>
                            @else
                            <span class="confirm-ride pending-yellow" style=" color:aliceblue !important;min-width: 35px;padding: 10px;">No</span>
                            @endif
                            </div>
                        </td>
                        <td>

                            @php $product_images = $car->image_list; @endphp
                            @if (count($product_images) > 0)
                                <img src="{{ asset('front/images/'.$product_images[0]->image_path) }}" alt="" class="car-img">
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.car.edit',$car->id) }}" data-id="{{ $car->id }}" class="edit"><img src="{{ asset('images/edit_icon_t.svg')}}" alt=""></a>
                            <a href="{{ route('admin.car.delete',$car->id) }}" onclick="return confirm(`Are you Sure to delete the record ? `);"><img src="{{ asset('images/delete.png') }}" alt="" style="width: 34px;"></a>
                        </td>
                     </tr>
                    @endforeach
                </tbody>
            </table>
                <ul class="pagination pagination-lg">
                    {{$cars->appends(request()->query())->links()}}
                </ul>
            </div>
        </div>

    </section>
    <!--CONTENT_SECTION_END-->

    <div class="modal width-1200 fade gerenric-popup"  id="edit-modal" tabindex="-1" aria-labelledby="reschedule_popup" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="reschedule-popup">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Car</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="car-form" action="" method="post" enctype="multipart/form-data">
                     @csrf
                      <div class="row">
                        {{-- First Column Start --}}
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="" class="form-control-label">Car Title</label>
                                <input type="text" class="form-control" name="title" id="" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Short Descriptions</label>
                                <input type="text" name="short_descriptions" id="" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Max Passengers</label>
                                <input type="number" min="0" class="form-control" name="passengers" id="" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Free Waiting Time</label>
                                <input type="text" class="form-control" name="free_waiting_time" id="" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Discount %</label>
                                <input type="number" name="discount" min="0" id="" class="form-control" value="" required>
                            </div>

                           

                        </div>
                        {{-- Second Column Start --}}
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="" class="form-control-label">Car Type</label>
                                <input type="text" class="form-control" name="type" id="" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Max Suitcases</label>
                                <input type="number" min="0" class="form-control" name="suitcases" id="" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Porter Service</label>
                                <select name="porter_service" id="" class="form-control" required>
                                    <option value="">Please Choose</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="" class="form-control-label">Price</label>
                                <input type="number" name="price" id="" class="form-control" value="" min="0">
                            </div> --}}
                            <div class="form-group">
                                <label for="" class="form-control-label">Apply Discount</label>
                                <select name="apply_discount" id="" class="form-control" required>
                                    <option value="">Please Choose</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                             <div class="form-group">
                                <label for="" class="form-control-label">Images</label>
                                <input type="file" name="images[]" id="" class="form-control" multiple>
                            </div>
                            
                        </div>
                      </div>
                      <div class="form-group mt-5 mb-5 float-start">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                  </form> 
                </div>
            </div>
        </div>
    </div>
</div>
    @include('modals.success')
    @include('modals.cancel')
@endsection

@section('js')
   {{-- <script>
    $(document).on('click','.edit',function(e){
        e.preventDefault();
        var get_url = $(this).data("get_url"),
            id = $(this).data("id"),
            form = $('.car-form'),
            update_url = $(this).data("update_url");
        $.ajax({
            type:'get',
            url:get_url+"/"+id,
            dataType: 'json',
            success:function(data){

                if (data) {
                   $(form).find('[name="title"]').val(data.title),
                   $(form).find('[name="type"]').val(data.type),
                   $(form).find('[name="short_descriptions"]').val(data.short_descriptions),
                   $(form).find('[name="passengers"]').val(data.passengers),
                   $(form).find('[name="suitcases"]').val(data.suitcases),
                   $(form).find('[name="porter_service"]').val(data.porter_service),
                   $(form).find('[name="free_waiting_time"]').val(data.free_waiting_time),
                   $(form).find('[name="price"]').val(data.price),
                   $(form).find('[name="discount"]').val(data.discount),
                   $(form).find('[name="apply_discount"]').val(data.apply_discount);
                   $(form).attr('action',update_url);
                   $('#edit-modal').modal('show');
                }else{

                    alert("Something went wrong");
                }
            }
        })
        
    })
   </script>
   <script>
    $(document).on('submit','.car-form',function(e){
      
         e.preventDefault();
         var formData  = new FormData(this),
             url = $(this).attr("action");
        
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
                location.reload();
            } else {
                alert("Something went wrong");
            }
            },
        });

    });
   </script>

   <script>
    $(document).on('click','.btn-add',function(e){
        e.preventDefault();

        $('#edit-modal').find('form').attr('action',$(this).data("save_url"));
        $('#edit-modal').modal('show');
    })
   </script> --}}
@endsection
