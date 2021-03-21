<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
                font-family: 'Nunito', sans-serif;
            }
            .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            }
            .widget {
                margin-bottom: 40px;
                padding: 30px;
                border: 1px solid #eee;
            }
    </style>
</head>
<body class="layout-fixed layout-navbar-fixed">
    <div id="app" class="wrapper">
        @include('includes.header')
        <main class="py-4">
            @yield('content')
        </main>
        @include('includes.footer')
</body>
</html>
