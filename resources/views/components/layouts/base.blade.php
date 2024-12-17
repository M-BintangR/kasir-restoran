<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CORE -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>@yield('title') - {{ setting('name') ? setting('name') : env('APP_NAME') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Filament Styles -->
    @filamentStyles
    @vite('resources/css/app.css')

    <!-- Component Style -->
    @stack('styles')
</head>

<body class="@yield('body-class') antialiased">>
    @yield('content')

    <!--  Filament Styles -->
    @filamentScripts
    @vite('resources/js/app.js')

    <!-- Component Script -->
    <script>
        console.log('DEVELOPED BY RYOOGE MEDIA @fukigen.media')
    </script>

    @stack('scripts')
</body>

</html>
