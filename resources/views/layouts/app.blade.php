<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">

    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('style')
</head>
<body>
    <div id="app">
        <!-- sidebar -->
        @include('partials.aside')
        <!-- End sidebar -->

        <!-- page-aside-layer -->
        <div class="page-aside-layer"></div>


        <div class="mainbar">
            @include('partials.header')

            <div class="main-container">
                <div class="container">
                    @include('partials.alert')
                    @include('partials.errors')
                </div>
                @yield('content')
            </div>

        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function asideExpand(){
            document.querySelector(".page-aside").classList.toggle("hide")
            document.querySelector(".mainbar").classList.toggle("expand")
            document.querySelector(".page-aside-layer").classList.toggle("show")
        }

        document.querySelector(".page-aside-layer").addEventListener("click", function() {
            document.querySelector(".page-aside-layer").classList.remove("show")
            document.querySelector(".page-aside").classList.remove("hide")
            document.querySelector(".mainbar").classList.remove("expand")
        })
    </script>
    @stack('script')
</body>
</html>
