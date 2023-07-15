<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <link rel="icon" href="{{url('img/brand.png')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-slate-100">
            <div class="w-40 mx-auto py-2 sm:px-6 lg:px-6">
                <a href="/">
                    <x-application-brand class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            <!-- Content -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        <footer class="bg-white text-center lg:text-left">
            <hr>
            <div class="p-4 text-center text-neutral-700 text-sm">
              © 2023 Copyright:
              <a class="text-neutral-700 text-sm" href="https://tailwind-elements.com/">Ofppt - F.Master V 1.00</a>
            </div>
        </footer> 
    </body>
</html>
