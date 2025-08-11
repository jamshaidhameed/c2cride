<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.png')}}"> --}}
    <link rel="icon" type="image/png" href="{{ asset('front/images/favicon/favicon-96x96.png') }}" sizes="96x96" />

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->
    <!-- Scripts -->
    @include('admin.layout.css')
    @yield('css')
    

</head>

<body>
<div id="js-settings" data-utils-path="{{ asset('assets/plugins/phone_number_api/build/js/utils.js') }}"></div>

<div id="container" align="center">
    @include('admin.layout.header')

    <main>
        @yield('content')
    </main>
</div>
@include('admin.layout.footer')

@include('admin.layout.js')

@yield('js')

<script>
    $(document).on('click','#earning-btn',function(e){

        let password = prompt("Enter Password To See Earning Records ");
        if (password === null || password === "" || password !="{{ env('USER_EXPORT_PASSWORD') }}") {
            alert("Please Enter Valid password");
            return false;
        }
    });
</script>
</body>

</html>
