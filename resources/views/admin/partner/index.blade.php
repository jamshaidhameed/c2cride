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

</style>
@endsection
@section('content')
    <!--CONTENT_SECTION_START-->
    <section id="content-section">
        <div class="page-container">
            @include('admin.layout.links')

            <br> <br>

         <div class="table-responsive">

            <button class="btn btn-success" onclick="exportTableToExcel('myTable', '')">Download the Data</button>
            <br> <br>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Emirates</th>
                        <th>Are you ?</th>
                        <th>Registered As</th>
                        <th>Message</th>
                        <th>Files</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partner_list as $become)
                     <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                       <td>{{ $become->first_name." ".$become->last_name}}</td>
                       <td>{{ $become->email }}</td>
                       <td>{{ $become->phone }}</td>
                       <td>{{ $become->address }}</td>
                       <td>{{ $become->emirates }}</td>
                       <td>{{ $become->are_you }}</td>
                       <td>{{ $become->are_you_register }}</td>
                       <td>{{ $become->message}}</td>
                       <td>
                        @php $files = \App\Models\BecomePartnerFiles::where('partner_id',$become->id)->get(); @endphp
                        @foreach ($files as $item)
                            <a target="_blank" href="{{ asset('upload/partners/'.$item->file_path) }}" class="file-link">{{ $item->file_path}}</a> <br>
                        @endforeach
                       </td>
                       <td>{{ $become->created_at->diffForHumans()}}</td>
                     </tr>
                    @endforeach
                </tbody>
            </table>
             <div class="gerenric-pagination">
                <ul class="pagination pagination-lg">
                    {{$partner_list->appends(request()->query())->links()}}
                </ul>
            </div>
         </div>
        </div>

    </section>
    <!--CONTENT_SECTION_END-->

</div>
    @include('modals.success')
    @include('modals.cancel')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
    function exportTableToExcel(tableID, filename = ''){

    let url = `{{ route('admin.export.vendors') }}`;
    window.location.href = url;
}
</script>
@endsection
