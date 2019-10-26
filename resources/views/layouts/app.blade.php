<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div>
    @include('includes.navbar')

    <main class="py-4 container col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11">
        @if (\Illuminate\Support\Facades\Request::route()->getName() == 'index' ||
            \Illuminate\Support\Facades\Request::route()->getName() == 'authors')
            <div id="app"></div>
        @endif
        @yield('content')
    </main>
</div>
</body>
</html>
