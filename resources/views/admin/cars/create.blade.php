@extends('admin.layout.app')

@section("css")
<style>
    .form-control-label {
     padding: 10px 0 10px 
    }
</style>
<style>
    .image-container {
            position: relative;
            display: inline-block;
        }

        .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: bold;
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

</style>
@endsection
@section('content')
    <!--CONTENT_SECTION_START-->
    <section id="content-section">
        <div class="page-container">
            @include('admin.layout.links')
            <form action="{{ isset($car) ? route('admin.car.update',$car->id) : route('admin.car.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
              <div class="card card-primary">
                
                <div class="card-body">
                    <div class="card-title">Car Informations</div>
                    <div class="card-text">
                        {{-- Panel Body Starts --}}
                     <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="" class="form-control-label">Car Title</label>
                                <input type="text" name="title" class="form-control" value="{{ isset($car) ? $car->title : old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Max Passengers</label>
                                <input type="number" min="0" class="form-control" name="passengers" id="" value="{{ isset($car) ? $car->passengers : old('passengers') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Free Waiting Time</label>
                                <input type="text" class="form-control" name="free_waiting_time" id="" value="{{ isset($car) ? $car->free_waiting_time : old('free_waiting_time') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Discount %</label>
                                <input type="number" name="discount" min="0" id="" class="form-control" value="{{ isset($car) ? $car->discount : old('discount') }}" required>
                            </div>
                        </div>
                        {{-- End First Column --}}
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="" class="form-control-label">Car Type</label>
                                <input type="text" class="form-control" name="type" id="" value="{{ isset($car) ? $car->type : old('type') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Max Suitcases</label>
                                <input type="number" min="0" class="form-control" name="suitcases" id="" value="{{ isset($car) ? $car->suitcases : old('suitcases') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Porter Service</label>
                                <select name="porter_service" id="" class="form-control" required>
                                    <option value="">Please Choose</option>
                                    <option value="1" @if(isset($car) && $car->porter_service == 1) selected @endif>Yes</option>
                                    <option value="0" @if(isset($car) && $car->porter_service == 0) selected @endif>No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Apply Discount</label>
                                <select name="apply_discount" id="" class="form-control" required>
                                    <option value="">Please Choose</option>
                                    <option value="1" @if(isset($car) && $car->apply_discount == 1) selected @endif>Yes</option>
                                    <option value="0" @if(isset($car) && $car->apply_discount == 0) selected @endif>No</option>
                                </select>
                            </div>
                        </div>
                        {{-- End of Second Column --}}
                     </div>
                    {{-- Panel Body Ends --}}
                    </div>
                </div>
              </div>
              <br>
              {{-- Image Card --}}
              <div class="card">
                <div class="card-body">
                    <div class="card-title">Car Images</div>
                    <div class="card-text">
                        {{-- Card Text Start --}}
                        <div id="image-fields">
                        <div class="image-group">
                            <input type="file" name="images[]" class="form-control" accept="image/*"> <br>
                            <input type="text" name="descriptions[]" class="form-control" placeholder="Image Description"> <br>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary btn-sm" onclick="addImageField()">Add More Images</button><br><br>
                        {{-- Card Text End --}}
                    </div>
                </div>
              </div>
              {{-- Image Card End --}}
              <br> <br> 
              <div class="card card-primary">
                <div class="card-body">
                    <card class="title">
                        <div class="form-group">
                            <button type="submit" class="btn  btn-success"> 
                                @if (isset($car))
                                    Update record
                                 @else 
                                 Save Record
                                @endif
                            </button>
                        </div>
                    </card>
                </div>
              </div>
              <br> <br> 
            </form>
            @if (!empty($car) && count($car->image_list) > 0)
                <div class="row gallery">

                    @foreach ($car->image_list as $item)
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class=" image-container">
                            <a href="{{ route('admin.car.delete.image',$item->id) }}" class="close-btn btn-r-img" data-removelink="" >&times;</a>
                            <img src="{{ asset('front/images/'.$item->image_path) }}" class="img-fluid rounded">
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@include('modals.success')
@include('modals.cancel')
@endsection
@section('js')
<script>
function addImageField() {
    const container = document.getElementById('image-fields');
    const group = document.createElement('div');
    group.classList.add('image-group');
    group.innerHTML = `
        <input type="file" class="form-control" name="images[]" accept="image/*" required> <br>
        <input type="text" class="form-control" name="descriptions[]" placeholder="Image Description"> <br>
    `;
    container.appendChild(group);
}
</script>
<script>
    $(document).on('keydown', '.form-control', function(e) {
    if (e.key === 'Tab' || e.which === 9) {
        e.preventDefault();

        // Get all inputs in desired left-to-right order
        let inputs = $('.form-control'); // or more specific selector
        let idx = inputs.index(this);

        if (idx >= 0 && idx < inputs.length - 1) {
            inputs.eq(idx + 1).focus();
        }
    }
});
</script>
<script>
    $(document).on('click','.btn-r-img',function(e){
        e.preventDefault();

      var url = $(this).attr('href');
      var parent = $(this).parent().parent();

      $('#loader').show();

      $.ajax(
        {
            type:'get',
            url:url,
            dataType:'json',
            success:function(data){
                if (data.success) {
                    
                    $('#loader').hide();
                    parent.remove();
                }
            },
            error: function (xhr, status, error) {
            if (xhr.status === 419) {
              location.reload(true);
            } else {
                $('#loader').hide();
              console.log("Error:", xhr.responseText);
              alert("Error: " + xhr.responseText);
            }
          },
        }
      )
    });
</script>
@endsection