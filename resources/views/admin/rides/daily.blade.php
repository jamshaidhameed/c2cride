@extends('admin.layout.app')

@section("css")
<!--<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">-->
<style>
  
  .file-link {
    color: blue;
    text-decoration: underline;
  }

  .file-link:hover{
    text-decoration: none;
    color: red;
  }

  .flex {
    display: flex;
    justify-content: space-between;
    flex-flow: row;
  }
  #largeModal , #largeModal .modal-content {
    color: black;
  }
  #largeModal form .form-group label {
        float: left;
  }
  .table tbody tr td {
        vertical-align: middle;
  }
 

</style>
@endsection
@section('content')
    <!--CONTENT_SECTION_START-->
    <section id="content-section">
        <div class="page-container">
            @include('admin.layout.links')

            <br> <br>

         <div class="table-responsive">

              <div class="flex">

                <button class="btn btn-success" onclick="exportTableToExcel('myTable', '')">Download the Data</button>
                <form action="{{ route('admin.rides.apply.filters') }}" method="post" id="apply_filters">
                    @csrf
                    <div class="row">
                        <div class="col col-md-3">
                            <label for="" class="form-control-label">Booking Number</label>
                            <input type="text" name="booking_number" id="" class="form-control">
                        </div>
                        <div class="col col-md-3">
                            <label for="" class="form-control-label">From Date</label>
                            <input type="date" name="from_date" id="" class="form-control">
                        </div>
                        <div class="col col-md-3">
                            <label for="" class="form-control-label">To Date</label>
                            <input type="date" name="to_date" id="" class="form-control">
                        </div>
                        <div class="col col-md-3">
                            <button type="submit" class="btn btn-success btn-sm" style="    margin-top: 23px;">Apply Filter</button>
                        </div>
                    </div>
                </form>
              </div>
            
            <br> <br>
            @include('admin.rides.table')
             <div class="gerenric-pagination">
                <ul class="pagination pagination-lg">
                    
                </ul>
            </div>
         </div>
        </div>

    </section>
    <!--CONTENT_SECTION_END-->

   {{-- Modal Starts --}}
    <div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- modal-lg makes it large -->
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Edit Ride</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.update.ride.informaitons') }}" method="POST">
                @csrf 
                <input type="hidden" name="ride_id" value="">
                <input type="hidden" name="ride_from" value="">
            <div class="modal-body">
               <div class="row">

                <div class="col col-md-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Tve Booking Number</label>
                        <input type="text" name="tve_booking_number" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Payment link confirmation</label>
                        <input type="text" name="payment_link_confirmation" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Remark by c2c team</label>
                        <input type="text" name="remarks_by_c2c_team" id="" class="form-control" value="">
                    </div>
                </div>

                <div class="col col-md-6">
                    <div class="form-group">
                        <label for="" class="form-control-label">Fine Amount	</label>
                        <input type="number" min="0" name="fine_amount" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Source</label>
                        {{-- <input type="text" name="source_report" id="" class="form-control" value=""> --}}
                        <select name="source_report" id="" class="form-control">
                            <option value="">Please Choose</option>
                            <option value="watsapp">Watsapp</option>
                            <option value="b2b">B2B</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Extra Details</label>
                        <input type="text" name="ride_extra_details" id="" class="form-control" value="">
                    </div>
                </div>

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
   {{-- Modal Ends --}}

</div>
    @include('modals.success')
    @include('modals.cancel')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
    function exportTableToExcel(tableID, filename = ''){

    var from_date = $('[name="from_date"]').val(),
        to_date = $('[name="to_date"]').val();

    let url = `{{ route('admin.export.rides') }}?from_date=${from_date}&to_date=${to_date}`;
    window.location.href = url;
}
</script>
<script>
    $(document).on('submit','#apply_filters',function(e){
        e.preventDefault();

        var url = $(this).attr('action');

        $.ajax({
            type:"post",
            url:url,
            dataType:'json',
            data:new FormData(this),
            contentType: false,
            cashe: false,
            processData: false,
            success:function(html){
                if (html.status == 200) {
                    
                    $('.tablelist').html(html.response);
                }
            },
            error: function(data) {
                alert(data.message);
            }
        })
    });
</script>
<script>
    $(document).on('click','.edit-booking',function(e){
        e.preventDefault();

        var id = $(this).data("ride_id"),
            tve_booking_number = $(this).data("tve_booking_number"),
            fine_amount = $(this).data("fine_amount"),
            payment_link_confirmation = $(this).data("payment_link_confirmation"),
            source_report = $(this).data("source_report"),
            remarks_by_c2c_team = $(this).data("remarks_by_c2c_team"),
            ride_extra_details = $(this).data("ride_extra_details"),
            ride_from = $(this).data("ride_from");
        $('#largeModal').find('form').find('[name="ride_id"]').val(id);
        $('#largeModal').find('form').find('[name="tve_booking_number"]').val(tve_booking_number);
        $('#largeModal').find('form').find('[name="fine_amount"]').val(fine_amount);
        $('#largeModal').find('form').find('[name="payment_link_confirmation"]').val(payment_link_confirmation);
        $('#largeModal').find('form').find('[name="source_report"]').val(source_report);
        $('#largeModal').find('form').find('[name="remarks_by_c2c_team"]').val(remarks_by_c2c_team);
        $('#largeModal').find('form').find('[name="ride_extra_details"]').val(ride_extra_details);
        $("#largeModal").find("form").find('[name="ride_from"]').val(ride_from);
        $('#largeModal').modal('show');
    })
</script>

@endsection
