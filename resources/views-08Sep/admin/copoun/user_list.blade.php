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

            

           <div class="table-responsive">

            <table class="table table-bordered table-sm">

                <thead>

                    <tr>

                        <th class="text-center">Coupon Code</th>

                        <th class="text-center">Ride Code</th>

                        <th class="text-left">Ride Type</th>
                        <th class="text-left">Booking Date</th>

                        <th class="text-center">Ride Date</th>

                        <th>User</th>

                        

                    </tr>

                </thead>

                <tbody>

                    @foreach($copoun_users as $user)

                     <tr>

                        <td class="text-center">{{ !empty($user->code) ? $user->code : '-'}}</td>

                        <td class="text-center">{{ !empty($user->booking_code) ? $user->booking_code : ''}}</td>

                        <td class="text-left">

                            @php $type = \App\Models\RideType::where('id',$user->ride_type_id)->first(); @endphp



                            @if (!empty($type))

                                {{ $type->type }}

                            @endif

                        </td>

                        <td class="text-left">
                            @if(!empty($user->booking_date))
                            {{date('D, M d', strtotime($user->booking_date))}}, {{date('h:i A', strtotime($user->booking_date))}}
                            @endif
                        </td>

                        <td class="text-left">@if(!empty($user->date_time))

                            {{date('D, M d', strtotime($user->date_time))}}, {{date('h:i A', strtotime($user->date_time))}}

                            @endif

                            

                        </td>

                        <td>{{ !empty($user->name) ? $user->name : '' }}</td>

                     </tr>

                    @endforeach

                </tbody>

            </table>

            <div class="gerenric-pagination">

                <ul class="pagination pagination-lg">

                    {{$copoun_users->appends(request()->query())->links()}}

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

