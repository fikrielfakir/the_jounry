<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'THE JOURNEY Association') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-navy-950 antialiased">
        <!-- Background with gradient -->
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">
            <!-- Background image/gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-navy-950 via-navy-900 to-navy-800"></div>
            <div class="absolute inset-0 bg-beige-900 opacity-10"></div>
            
            <!-- Content -->
            <div class="relative z-10 w-full flex flex-col items-center">
                <!-- Logo/Brand -->
                <div class="mb-8">
                    <a href="{{ route('welcome') }}" class="flex flex-col items-center text-beige-100 hover:text-beige-300 transition-colors duration-300 group">
                        <div class="w-16 h-16 bg-beige-100 rounded-full flex items-center justify-center mb-3 shadow-2xl group-hover:shadow-beige-500/20 transition-all duration-300">
                            <i class="fas fa-compass text-navy-950 text-2xl"></i>
                        </div>
                        <h1 class="text-2xl font-bold tracking-wide">THE JOURNEY</h1>
                        <p class="text-beige-300 text-sm">Association</p>
                    </a>
                </div>

                <!-- Auth Card -->
                <div class="w-full sm:max-w-md bg-white shadow-2xl overflow-hidden sm:rounded-2xl border border-beige-200">
                    <div class="px-8 py-8">
                        {{ $slot }}
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-8 text-center text-beige-300 text-sm">
                    <p>&copy; {{ date('Y') }} THE JOURNEY Association. All rights reserved.</p>
                </div>
            </div>
        </div>
    </body>
</html>
