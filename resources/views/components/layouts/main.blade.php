<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />

    <meta name="application-name" content="{{ $meta['app_name'] ?? config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="application-description" content="{{ $meta['app_desc'] ?? '' }}" />

    @hasSection('title')
        <title>@yield('title') - {{ $meta['app_name'] ?? config('app.name') }}</title>
    @else
        <title>{{ $meta['app_name'] ?? config('app.name') }}</title>
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @livewireStyles

    @filamentStyles

    @vite('resources/css/app.css')
</head>

<body class="antialiased">

    {{ $slot }}

    @livewireScripts

    @filamentScripts

    @vite('resources/js/app.js')
</body>

</html>
