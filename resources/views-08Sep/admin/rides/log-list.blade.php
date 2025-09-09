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

  .table-action {
    display: flex;
    justify-content: center;
  }
  .table-action a {
    margin-left: 12px;
  }

</style>
@endsection
@section('content')
    <!--CONTENT_SECTION_START-->
    <section id="content-section">
        <div class="page-container">
            @include('admin.layout.links')

         <div class="table-responsive">
            <br>
            <h3 class="text text-primary">Ride# {{ $ride->booking_code }} Change Logs</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>User</th>
                        <th>Date </th>
                        <th>Ip Address</th>
                        <th>Changes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $item)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ !empty($item->user->name) ? $item->user->name : "" }}</td>
                           <td>{{ \Carbon\Carbon::parse($item->created_at)->format("Y-m-d h:i A")}}</td>
                           <td>{{ $item->ip_address}}</td>
                           <td>
                              <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Column</th>
                                        <th>Value</th>
                                    </tr>
                                    @php
                                        $activity_arr = json_decode($item->activity,true);
                                    @endphp
                                    @foreach($activity_arr as $index => $value)
                                      <tr>
                                        <td>{{ ucwords(str_replace('_', ' ', $index)) }}</td>
                                        <td>{{ $value }}</td>
                                      </tr>
                                    @endforeach
                                </tbody>
                              </table>
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
@endsection

@section('js')

@endsection
