@extends('front.layouts.master')
@section('title')
C2CRides
@endsection
@section('style')
    <style>
       /* Base .table class */
        .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        vertical-align: top;
        border-color: #dee2e6;
        border-collapse: collapse;
        }

        .table > thead {
        vertical-align: bottom;
        }

        .table > tbody {
        vertical-align: inherit;
        }

        /* Padding and border for cells */

        .table th{
            text-align: left;
        }

        .table th,
        .table td {
        padding: 0.5rem;
        border-top: 1px solid #dee2e6;
        }

        /* Optional header background (Bootstrap class: table-light) */
        .table-light {
        background-color: #f8f9fa;
        }

        /* Bordered version */
        .table-bordered {
        border: 1px solid #dee2e6;
        }

        .table-bordered > thead > tr > th,
        .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > th,
        .table-bordered > tbody > tr > td,
        .table-bordered > tfoot > tr > th,
        .table-bordered > tfoot > tr > td {
        border: 1px solid #dee2e6;
        }

    </style>
@endsection
@section('content')
<div class="content">

            <div class="thanks_main gradiantParent">
                <div class="gradiantChild">
                    <div class="thanks_auto">
                        <div class="thanks_box animatedParent animateOnce">
                            <div class="thanks_text">
                                <i class="animated growIn slow"> 
                                    <svg width="184" height="134" viewBox="0 0 184 134" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M69.2744 57.6233L69.7244 67.4557C72.7538 63.4742 74.4502 57.052 80.6647 57.6059C87.4678 58.2118 84.1268 70.5196 84.4557 74.83C84.4903 75.3147 84.2134 76.3187 85.1135 75.9378C85.9098 75.6089 89.5623 71.1601 89.7354 70.26C89.9259 69.256 88.1256 64.8418 88.0044 62.7991C87.312 52.0492 95.3095 44.7961 106.007 46.5791C109.054 47.0811 113.001 50.1451 111.46 53.6072C109.556 57.8829 106.457 52.0839 105.021 51.1318C99.9141 47.7562 96.0192 56.8789 96.0365 60.9815C96.0365 62.5568 97.5425 67.6115 98.5465 68.7886C99.1351 69.4983 98.9274 69.1348 99.4294 68.7886C103.999 65.7765 100.918 59.1466 106.561 57.1559C112.551 55.0267 110.006 59.3889 109.902 62.3144C109.833 64.4609 111.201 69.6022 113.711 69.7233C114.853 69.7753 115.978 69.256 116.099 68.0269C115.719 62.6606 112.932 48.414 121.327 48.2236C121.881 48.2236 122.539 48.1544 123.041 48.3275C125.378 49.1238 123.837 58.7138 123.768 60.9642C123.768 61.4662 123.491 62.6606 124.235 62.5395C125.205 58.7138 127.767 50.7336 131.696 49.2449C133.86 48.414 136.734 48.466 138.344 50.4567C141.061 53.8322 137.876 65.2745 138.067 69.9311C138.326 76.1975 142.1 74.4491 143.519 69.983C146.081 61.899 142.688 52.5859 147.276 43.8094C150.842 37.0064 164.257 32.6441 169.347 39.551C174.436 46.4579 166.819 56.55 159.532 58.0906C159.445 58.9215 160.466 58.4542 160.968 58.4022C164.967 58.0214 169.676 58.6965 167.46 63.9935C166.075 67.2999 162.976 67.7499 160.432 69.6887C166.958 71.8872 171.736 85.926 179.404 84.42C180.235 84.2642 184.632 79.5557 183.922 84.0046C183.282 88.0033 177.448 88.713 174.124 88.4014C169.641 87.9687 166.231 85.424 163.34 82.2043C161.384 80.0231 155.879 71.3852 153.958 70.5889C152.815 70.1042 153.508 73.2374 153.075 74.1548C152.227 75.9205 148.695 76.0071 147.155 75.1589C146.289 74.6742 145.787 73.3413 145.475 73.272C144.991 73.1508 142.256 76.3533 140.023 76.7341C125.88 79.1576 131.748 60.8949 132.302 53.1744L128.65 59.5793L124.634 71.1947C121.968 75.2973 117.761 70.6754 117.346 70.6754C117.19 70.6754 115.459 72.1468 114.68 72.4238C111.876 73.4105 109.071 72.8392 106.44 71.6967C105.748 71.4025 104.761 70.2946 104.311 70.2253C104.017 70.1734 100.416 72.5969 99.0139 72.8219C96.5385 73.2201 93.8207 72.7873 91.6742 71.5063C90.7741 76.1629 83.2786 82.7928 78.9163 78.6729C74.5541 74.553 78.0162 66.9883 78.1547 62.2106C78.1547 61.7432 78.1893 60.7738 77.6007 60.7911C77.1334 60.7911 74.104 64.5302 73.6193 65.2918C72.0267 67.7153 71.1093 70.5369 69.8283 73.1162C64.2197 75.8513 62.1251 71.9391 61.7269 66.8325C61.1557 59.4755 61.2249 45.0212 66.4874 39.3952C71.2131 34.3405 84.1614 31.3977 87.5543 39.2221C91.83 49.0545 78.4836 59.1639 69.3263 57.6579L69.2744 57.6233ZM77.5142 53.3475C81.5302 50.4221 85.8752 44.398 82.0322 39.7587C77.9296 34.7906 71.9056 39.1702 70.313 44.1383C69.5859 46.406 68.8762 51.5819 69.2917 53.8495C69.7764 56.4461 75.1253 55.0613 76.7698 54.1958C77.2718 53.9361 77.3065 53.5206 77.5142 53.3649V53.3475ZM159.393 39.4125C153.733 40.2434 152.123 47.7908 151.898 52.4647C151.828 53.7803 151.517 55.9614 152.659 56.6539C158.251 60.0987 170.437 47.6177 164.621 41.1263C163.323 39.6722 161.297 39.1356 159.41 39.4125H159.393ZM160.241 64.6167C160.916 63.9589 162.613 61.2065 161.02 60.7738C158.96 60.2025 154.892 64.9976 153.698 66.5555C155.896 66.8671 158.649 66.2093 160.241 64.6167Z"
                                            fill="#0FA85B" />
                                        <path
                                            d="M33.4252 81.8752C33.9792 82.4118 34.8447 85.3546 34.4465 85.7701C30.517 85.7354 24.9777 84.9738 24.2679 90.1323C23.6794 94.4254 28.6994 97.7836 32.4905 98.2337C39.8821 99.0992 48.1046 93.9926 53.6613 89.5784C55.9982 87.7262 56.7253 85.3373 60.2566 84.9738C61.8838 84.818 64.515 85.4066 64.8266 87.3626C65.1728 89.6303 62.7147 96.0006 62.7666 99.4627C62.8705 107.547 67.9944 102.804 69.8293 98.5799C71.4565 94.8408 70.5737 90.4093 71.7681 87.5531C72.7029 85.3373 76.719 85.7181 78.0346 87.9685C81.4274 93.7502 80.4407 104.015 79.1251 110.316C85.9974 111.701 92.9216 113.155 99.8978 113.882C111.929 115.146 130.312 115.579 140.716 108.707C145.442 105.591 150.133 97.2643 144.784 92.6597C142.239 90.4785 138.362 91.7422 138.985 87.3453C139.383 84.5064 142.516 82.6888 145.096 82.2906C158.148 80.2134 164.553 92.5558 158.684 103.479C149.718 120.201 120.861 120.997 104.399 119.197C96.453 118.331 87.7285 115.042 80.1638 114.402C75.8881 114.038 76.0092 116.877 73.5165 119.716C65.3632 129.012 54.1114 134.967 41.4054 133.513C38.6876 133.201 33.3214 131.02 32.2481 128.371C29.5823 121.759 36.6277 117.206 41.5785 114.558C50.5454 109.78 60.1354 109.555 70.1236 109.382L71.0584 103.617C67.9252 106.387 64.4977 107.754 60.222 107.079C51.6186 105.712 53.644 98.9261 54.5268 92.452C46.1831 98.1817 33.7195 103.929 23.9217 98.2683C15.855 93.6118 17.1187 83.035 25.8432 80.5077C27.9551 79.9018 31.8327 80.2826 33.4252 81.8579V81.8752ZM62.8705 124.026C64.3419 122.59 69.3966 115.371 69.2581 113.675C69.2235 113.346 68.5484 113.069 68.1675 113.017C60.5336 111.788 48.1392 113.484 41.5266 117.656C31.5384 123.94 34.9659 132.716 46.7197 131.782C51.861 131.366 59.2007 127.627 62.8705 124.044V124.026Z"
                                            fill="#0FA85B" />
                                        <path
                                            d="M16.304 17.1558C9.65679 24.9455 7.09482 38.5689 14.1575 46.878C21.653 55.6891 35.0168 50.5305 32.2125 38.8805C37.5268 39.9538 35.6746 47.7782 33.1126 50.721C28.5945 55.9141 20.7875 54.8582 15.1269 52.6251C-5.00526 44.6449 -3.74159 16.9134 14.6249 7.66958C35.9688 -3.06297 56.8454 14.8015 76.1294 21.5353C81.963 23.578 95.6038 26.8497 94.2535 16.3595C93.613 11.3221 86.5503 9.08905 86.2387 6.90791C85.7021 3.06497 92.7129 0.0356197 95.8807 0.000998592C111.928 -0.172107 113.953 22.2105 100.503 28.3211C86.1349 34.8645 70.6246 22.4701 57.9706 16.8961C45.3166 11.3221 26.725 4.9172 16.304 17.1385V17.1558Z"
                                            fill="#0FA85B" />
                                        <path
                                            d="M133.948 103.725C135.662 106.685 128.893 105.767 127.335 105.196C125.379 104.469 123.337 102.08 122.869 100.055C119.805 104.607 113.21 106.754 108.882 102.651C104.053 98.0986 107.792 90.3089 109.021 84.8734C108.328 84.3714 102.824 86.1717 102.772 86.8814C107.722 94.8962 103.914 107.239 93.1643 107.239C76.0961 107.239 81.999 82.7269 98.0459 84.0252C98.9633 84.0944 99.8635 84.8387 100.694 84.7695C102.114 84.6483 105.178 82.9519 107.515 82.7095C109.488 82.5018 115.98 82.1729 117.087 83.7309C119.096 86.5698 112.864 98.9122 115.495 102.738C119.546 100.764 122.073 96.5407 122.817 92.1957C123.337 89.2529 122.627 83.2116 126.747 82.2941C127.993 82.0171 132.702 81.7228 133.031 83.3673C133.256 84.5618 131.905 90.3608 131.801 92.2477C131.68 94.4461 131.438 101.163 132.494 102.721C132.927 103.378 133.827 103.534 133.948 103.707V103.725ZM94.3068 102.738C99.223 100.055 101.248 91.1744 97.1977 87.1064C93.926 90.8801 91.4852 98.2544 94.3068 102.738Z"
                                            fill="#0FA85B" />
                                        <path
                                            d="M46.8225 80.5669C46.9783 80.6708 46.9783 81.0689 46.961 81.2939C47.2553 81.5882 48.467 79.3205 48.6402 78.7493C50.5443 73.0022 46.0436 57.3707 45.6108 50.2561C45.178 43.1414 46.8572 21.8321 56.5857 20.6031C57.3647 20.4992 60.2555 20.2742 59.892 21.6763C55.5298 24.7922 54.82 33.1186 54.5084 38.1906C53.816 49.806 56.7588 57.5265 57.6416 68.1379C58.3514 76.7586 55.5817 86.3313 44.953 84.8426C39.0674 84.0117 42.9796 78.0396 46.7879 80.5842L46.8225 80.5669Z"
                                            fill="#0FA85B" />
                                        <g opacity="0.1">
                                            <path d="M131.367 7.26172L116.045 39.603L144.474 21.3895L131.367 7.26172Z"
                                                fill="#383938" />
                                            <path d="M114.172 9.8125L114.511 33.9848L123.81 14.4881L114.172 9.8125Z"
                                                fill="#575958" />
                                            <path d="M125.072 37.0543L148.05 34.4998L144.4 28.2617L125.072 37.0543Z"
                                                fill="#575958" />
                                        </g>
                                    </svg>

                                </i>
                                <strong class="animated fadeInUpShort slow delay-250">We Received Your Request</strong>
                                <p class="animated fadeInUpShort slow delay-500" style="font-size:10px">Your request has been successfully received. Get ready to experience luxury, comfort, and reliability like never before. <br> Sit back, relax, and let us take care of the journey. We look forward to serving you!</p>
                            </div>
                           <!-- <div class="thanks_tracking animated fadeInUpShort slow delay-750">
                                {{-- <label class="error_text">Tracking #</label> --}}
                                 <h4 class="error_text">Tracking # {{ $ride->booking_code}}</h4>
                               
                                @if (!empty($child_ride))
                                    {{-- <br> <span>{{$child_ride->booking_code }}</span> --}}
                                @endif
                            </div> -->
                            <div class="thanks_actions animated fadeInUpShort slow delay-1000">
                                <ul>
                                    <li>
                                        <button type="button"
                                            class="all_btn icon_btn uppercase outlined_grey_btn w_100 justify_content_center">
                                            <i>
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.08398 5.3475H11.5704V3.98194C11.5704 2.61638 11.0583 1.93359 9.52207 1.93359H7.13233C5.59607 1.93359 5.08398 2.61638 5.08398 3.98194V5.3475Z"
                                                        stroke="#292D32" stroke-width="1.22901" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M11.058 10.8086V13.5397C11.058 14.9053 10.3752 15.5881 9.00961 15.5881H7.64405C6.27849 15.5881 5.5957 14.9053 5.5957 13.5397V10.8086H11.058Z"
                                                        stroke="#292D32" stroke-width="1.22901" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M14.4737 7.3921V10.806C14.4737 12.1716 13.7909 12.8544 12.4253 12.8544H11.0598V10.806H5.5975V12.8544H4.23194C2.86638 12.8544 2.18359 12.1716 2.18359 10.806V7.3921C2.18359 6.02653 2.86638 5.34375 4.23194 5.34375H12.4253C13.7909 5.34375 14.4737 6.02653 14.4737 7.3921Z"
                                                        stroke="#292D32" stroke-width="1.22901" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11.7419 10.8086H10.9157H4.91406" stroke="#292D32"
                                                        stroke-width="1.22901" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M4.91406 8.07812H6.96241" stroke="#292D32"
                                                        stroke-width="1.22901" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <span>Download PDF</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="all_btn icon_btn uppercase outlined_grey_btn w_100 justify_content_center">
                                            <i>
                                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.08398 5.3475H11.5704V3.98194C11.5704 2.61638 11.0583 1.93359 9.52207 1.93359H7.13233C5.59607 1.93359 5.08398 2.61638 5.08398 3.98194V5.3475Z"
                                                        stroke="#292D32" stroke-width="1.22901" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M11.058 10.8086V13.5397C11.058 14.9053 10.3752 15.5881 9.00961 15.5881H7.64405C6.27849 15.5881 5.5957 14.9053 5.5957 13.5397V10.8086H11.058Z"
                                                        stroke="#292D32" stroke-width="1.22901" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M14.4737 7.3921V10.806C14.4737 12.1716 13.7909 12.8544 12.4253 12.8544H11.0598V10.806H5.5975V12.8544H4.23194C2.86638 12.8544 2.18359 12.1716 2.18359 10.806V7.3921C2.18359 6.02653 2.86638 5.34375 4.23194 5.34375H12.4253C13.7909 5.34375 14.4737 6.02653 14.4737 7.3921Z"
                                                        stroke="#292D32" stroke-width="1.22901" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11.7419 10.8086H10.9157H4.91406" stroke="#292D32"
                                                        stroke-width="1.22901" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M4.91406 8.07812H6.96241" stroke="#292D32"
                                                        stroke-width="1.22901" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <span>Print</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="all_btn icon_btn uppercase outlined_grey_btn w_100 justify_content_center">
                                            <i>
                                                <svg width="13" height="15" viewBox="0 0 13 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="3.41163" cy="7.76319" r="2.04835" stroke="#292D32"
                                                        stroke-width="1.31094" stroke-linejoin="round" />
                                                    <circle cx="10.2398" cy="3.66553" r="2.04835" stroke="#292D32"
                                                        stroke-width="1.31094" stroke-linejoin="round" />
                                                    <circle cx="10.2398" cy="11.8608" r="2.04835" stroke="#292D32"
                                                        stroke-width="1.31094" stroke-linejoin="round" />
                                                    <path d="M8.87485 11.1773L5.46094 9.12891" stroke="#292D32"
                                                        stroke-width="1.31094" stroke-linejoin="round" />
                                                    <path d="M8.87404 4.34766L4.77734 7.07878" stroke="#292D32"
                                                        stroke-width="1.31094" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <span>Share</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            <?php

                                 if(empty($child_ride)) {
                            ?>
                            <table class="table table-bordered" >
                                <tbody>

                                    <tr>
                                        <th colspan="2" style="text-align: center;"> 
                                            
                                        
                                    <h4 class="error_text" style="font-size:16px; color:green; font-size:16px; font-weight:bold">Tracking # {{ $ride->booking_code}}</h4>
                                
                                        </th>
                                    </tr>


                                    <tr>
                                        <td>Customer Name</td>
                                        <td>{{ !empty($ride->user->name) ? $ride->user->name : ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>Customer Email</td>
                                        <td>{{ $ride->email }}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td>Fair Amount</td>
                                        <td>{{ number_format($ride->price,2) }} AED</td>
                                    </tr>
                                    <!--<tr>
                                        <th>Pickup Location</th>
                                        <th>Drop Location</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $ride->source }}</td>
                                        <td>{{ $ride->destination }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pickup Time</th>
                                        <th>Payment Type</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            @php $time = Carbon\Carbon::parse($ride->date_time); @endphp
                                            {{ $time->format('d F Y, g:i A') }}
                                        </td>
                                        <td>
                                            {{ ucwords($ride->payment_method) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Payment Status</th>
                                        <th>Paid Amount</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if($ride->payment_method == 'cash')
                                               Pending
                                            @else 
                                              Paid
                                            @endif
                                        </td>
                                        <td>
                                            @if($ride->payment_method == 'cash')
                                              0 AED 
                                            @else 
                                            {{ number_format($ride->price,2) }} AED
                                            @endif
                                        </td>
                                    </tr>-->
                                </tbody>
                            </table>

                            <?php } ?>
                            @if (!empty($child_ride))


                             <div class="thanks_tracking animated fadeInUpShort slow delay-750">
                               
                                 
                               
                                
                            </div>

                            <table class="table table-bordered" width="50%">
                                <tbody>
                                    <tr>
                                        <th colspan="2" style="text-align: center;">Return Ride</th>
                                    </tr>

                                    <tr>
                                        <th colspan="2" style="text-align: center;"> 
                                            
                                        @if (!empty($child_ride))
                                    <h4 class="error_text" style="font-size:16px; color:green; font-size:16px; font-weight:bold">Tracking # {{$child_ride->booking_code }}</h4>
                                @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Customer Name</td>
                                        <td>{{ !empty($child_ride->user->name) ? $child_ride->user->name : ''}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Customer Email</td>
                                        <td>{{ $child_ride->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fair Amount</td>
                                        <td>{{ number_format($child_ride->price,2) }} AED</td>
                                    </tr>
                                    <!--<tr>
                                        <th>Pickup Location</th>
                                        <th>Drop Location</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $child_ride->source }}</td>
                                        <td>{{ $child_ride->destination }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pickup Time</th>
                                        <th>Payment Type</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            @php $time = Carbon\Carbon::parse($child_ride->date_time); @endphp
                                            {{ $time->format('d F Y, g:i A') }}
                                        </td>
                                        <td>
                                            {{ ucwords($child_ride->payment_method) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Payment Status</th>
                                        <th>Paid Amount</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if($child_ride->payment_method == 'cash')
                                               Pending
                                            @else 
                                              Paid
                                            @endif
                                        </td>
                                        <td>
                                            @if($child_ride->payment_method == 'cash')
                                              0 AED 
                                            @else 
                                            {{ number_format($child_ride->price,2) }} AED
                                            @endif
                                        </td>
                                    </tr>-->
                                </tbody>
                            </table>
                            @endif
                            <div class="thanks_goback animated fadeInUpShort slow delay-1250">
                                <a href="{{ route('front.index') }}" class="all_btn icon_btn uppercase w_100 justify_content_center">
                                    <i>
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 11.25V9.375" stroke="white" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M6.79184 1.76485L2.46059 5.2336C1.97309 5.6211 1.66059 6.43985 1.76684 7.05235L2.59809 12.0273C2.74809 12.9148 3.59809 13.6336 4.49809 13.6336H11.4981C12.3918 13.6336 13.2481 12.9086 13.3981 12.0273L14.2293 7.05235C14.3293 6.43985 14.0168 5.6211 13.5356 5.2336L9.20434 1.7711C8.53559 1.2336 7.45434 1.2336 6.79184 1.76485Z"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </i>
                                    <span>Go back to home</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection