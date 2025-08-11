@extends('admin.layout.app')

@section("css")
{{-- <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}"> --}}
<style>
    .form-group{
        padding-bottom: 10px;
        margin-bottom: 10px;
    }
    .form-group label {
        padding-bottom: 10px;
    }
</style>
@endsection
@section('content')
  @php use Carbon\Carbon; @endphp
    <!--CONTENT_SECTION_START-->
    <section id="content-section">
        <div class="page-container">
            @include('admin.layout.links')

             <br> <br> 
            <div class="d-flex justify-content-end mb-2">
                <a href="" data-save_url = "{{ url('admin/copoun/store') }}" class="btn btn-success btn-add float-right"><i class="icon wb-plus-circle"></i>Add New Coupon</a>
            </div>
            <br>
           <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-left">Code</th>
                        <th class="text-center">Ride Type</th>
                        <th class="text-center">Discount Percentage</th>
                        <th class="text-center">Show on Front</th>
                        <th class="text-left">Valid From</th>
                        <th class="text-left">Valid Until</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($copouns_list as $copouns)
                     <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                       <td class="text-left">{{ $copouns->code}}</td>
                       <td class="text-center">
                        {{ !empty($copouns->ride_type->type) ? $copouns->ride_type->type : ''}}
                       </td>
                       <td class="text-center">{{ $copouns->discount_percentage }}</td>
                       <td class="text-center">{{ $copouns->show_at_front }}</td>
                       <td>{{ date_format(date_create($copouns->valid_from),'d-m-Y h:i A') }}</td>
                       <td>{{ date_format(date_create($copouns->valid_until),'d-m-Y h:i A') }}</td>
                       <td class="text-center">
                        @if (Carbon::now()->isBefore(Carbon::parse($copouns->valid_until)))
                        <a href="" class="btn btn-info btn-sm btn-edit" data-id="{{ $copouns->id}}" data-code="{{ $copouns->code }}" data-rideid="{{ $copouns->ride_type_id }}" data-discountper="{{ $copouns->discount_percentage }}" data-validfrom="{{ $copouns->valid_from }}" data-valid_until="{{$copouns->valid_until }}" data-showfront="{{ $copouns-> show_at_front}}" data-updateurl="{{ route('admin.coupon.update',$copouns->id) }}">Edit</a>
                        <a href="{{ route('admin.coupons.delete',$copouns->id) }}" onclick="return confirm(`Are you sure to delete the record ? `);" class="btn btn-danger btn-sm">Delete</a> 
                        @endif
                         
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

 <div class="modal width-1200 fade gerenric-popup"  id="add-copoun-modal" tabindex="-1" aria-labelledby="reschedule_popup" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="reschedule-popup">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Coupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="post">
                    @csrf 
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="" class="form-control-label">Copoun Code</label>
                                <input type="text" name="code" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Discount %</label>
                                <input type="text" name="discount_percentage" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Valid From</label>
                                <input type="datetime-local" name="valid_from" id="" class="form-control">
                            </div>
                            
                             
                        </div>
                        <div class="col col-md-6">
                            
                            <div class="form-group">
                                <label for="" class="form-control-label">Ride Type</label>
                                <select name="ride_type_id" id="" class="form-control">
                                    <option value="">Please Choose</option>
                                    @foreach(\App\Models\RideType::all() as $type)
                                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-control-label">Show on Front</label>
                                <input type="text" name="show_at_front" id="" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="" class="form-control-label">Valid To</label>
                                <input type="datetime-local" name="valid_until" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br> <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-save">Save</button>
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
  <script>
    $(document).on('click','.btn-add',function(e){
        e.preventDefault();

        var url = $(this).data("save_url");

        $('#add-copoun-modal').find('form').attr('action',url);
        $('#add-copoun-modal').modal('show');
    });

    //Edit Coupon

    $(document).on('click','.btn-edit',function(e){
        e.preventDefault();

        debugger;

        var update_url = $(this).data("updateurl"),
            coupon_code = $(this).data("code"),
            discount_per = $(this).data("discountper"),
            valid_from = $(this).data("validfrom"),
            valid_to = $(this).data("valid_until"),
            show_front = $(this).data("showfront"),
            ride_id = $(this).data('rideid');

        $('#add-copoun-modal').find('form').attr('action',update_url);
        $('#add-copoun-modal').find('form').find('[name="code"]').val(coupon_code);
        $('#add-copoun-modal').find('form').find('[name="ride_type_id"]').val(ride_id);
        $('#add-copoun-modal').find('form').find('[name="discount_percentage"]').val(discount_per);
        $('#add-copoun-modal').find('form').find('[name="show_at_front"]').val(show_front);
        $('#add-copoun-modal').find('form').find('[name="valid_from"]').val(valid_from);
        $('#add-copoun-modal').find('form').find('[name="valid_until"]').val(valid_to);
        $('#add-copoun-modal').find('form').find('.btn-save').text("Update");
        $('#add-copoun-modal').find('.modal-title').text("Update Coupon");

        $('#add-copoun-modal').modal('show');
    });
  </script>
@endsection
