<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&family=poppins:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#0B0B0B]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#0B0B0B]">
            <div class="mb-8">
                <a href="/" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Mama2s Gym" class="h-12 w-auto brightness-0 invert group-hover:brightness-100 group-hover:invert-0 transition-all duration-300">
                    <span class="text-3xl font-bold text-white group-hover:text-[#FFC107] transition-colors duration-300">Mama2s</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 card border-2 border-[#2A2A2A] fade-in">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
