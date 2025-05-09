<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
        @stack('styles')
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        
        <!-- Header (optional, bisa disesuaikan penempatannya) -->
        <header class="absolute top-0 left-0 right-0 z-10 bg-white/90 border-b">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                @include('components.header')
            </div>
        </header>
        <div class="pt-24">
            {{ $slot }}

        </div>

        <script src="{{ asset('assets/vendors/fontawesome/js/all.min.js') }}" defer></script>

    </body>
</html>
