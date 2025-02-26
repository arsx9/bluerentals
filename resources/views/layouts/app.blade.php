<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BlueRentals') }}</title>

    <link rel="icon" href="{{ asset('/img/favicon.png')}}" sizes="32x32" />
    <link rel="apple-touch-icon" href="{{ asset('/img/favicon.png')}}" />
    <meta name="msapplication-TileImage" content="{{ asset('/img/favicon.png')}}" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,300,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Voltaire:400,300,700" rel="stylesheet"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.3/venobox.css" integrity="sha512-QNXKinXDUMic9CFhTKRcc6oVgQctTz1ctZ0enkJrPKwA2aOeYbXxBjDqneUMlor7kGPp+qzbyN6jQrMO+ZsGsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/36b79bec9b.js" crossorigin="anonymous"></script>
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.3/venobox.js" integrity="sha512-58KxhG+wNkjwSa3ejC6PlVoQLjD5wxRxfpjB24/L7TXByQIEXE04/JKWeD17pTAOIERUMAnj7+3ff/L45ZNQlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

    <script type="text/javascript" src="{{ asset('js/signature_pad.min.js') }}"></script>

    <!-- Main App Styling -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    @yield('css')
</head>
<body>
    @guest
    @include('inc.navbar')
    <!-- page-content" -->
    @yield('content')
        @else
        <div class="page-wrapper chiller-theme toggled">
            <a id="show-sidebar" class="btn btn-sm btn-light bg-light text-pink" href="#">
                <i class="fas fa-bars"></i>
            </a>

            <!-- sidebar-wrapper  -->
            @include('inc.sidebar')
            <main class="page-content">
                {{-- @include('inc.navbar') --}}
                <!-- page-content" -->
                @yield('content')
            </main>
        </div>
    @endguest
</body>
@yield('scripts')
</html>
