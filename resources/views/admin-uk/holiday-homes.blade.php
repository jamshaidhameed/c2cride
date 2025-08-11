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

            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Watsapp</th>
                        <th>Business Name</th>
                        <th>Company Website</th>
                        <th>Position/Designation</th>
                        <th>Country of Registration</th>
                        <th>Anticipated Booking Volume (Monthly)</th>
                        <th>Proposed Start Date for Collaboration</th>
                        <th>Head Office Address</th>
                        <th>Specific requirements or operational expectations from C2C Ride</th>
                        <th>Files</th>
                        <th>Requested At </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration}}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->watsapp }}</td>
                            <td>{{ $item->business_name}}</td>
                            <td>{{ $item->company_website}}</td>
                            <td>{{ $item->position}}</td>
                            <td>{{ $item->country_of_registration}}</td>
                            <td>{{ $item->anticipated_booking}}</td>
                            <td>{{ $item->proposed_date}}</td>
                            <td>{{ $item->address}}</td>
                            <td>{{ $item->message}}</td>
                            <td>
                                @if (!empty($item->files))
                                    @php
                                        $file_list = explode(",",$item->files);
                                    @endphp
                                    @foreach ($file_list as $f)
                                        <a class="file-link" href="{{ asset('upload/custom-form/'.$f) }}">{{ $f }}</a>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $item->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
             <div class="gerenric-pagination">
                <ul class="pagination pagination-lg">
                    {{$data->appends(request()->query())->links()}}
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

@endsection
