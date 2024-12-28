<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'turbobought') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Navbar -->
        <nav class="bg-gray-800 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center py-4">
                <!-- Logo i enllaços junts -->
                <div class="flex items-center space-x-8">
                    <x-application-logo class="w-20 h-20" />
                    <a href="{{ url('/') }}" class="text-xl font-bold hover:text-gray-400">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    
                    <div class="flex space-x-4">
                        <a href="{{ route('home') }}" class="hover:text-gray-400">Home</a>
                        <a href="{{ route('dashboard') }}" class="hover:text-gray-400">Dashboard</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <!--<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        --><div class="w-full sm:max-w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        <!--</div>-->
    </body>
    <x-footer></x-footer>
</html>