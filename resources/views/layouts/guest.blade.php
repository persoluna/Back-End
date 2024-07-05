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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="flex w-full min-h-screen flex-col justify-center items-center bg-cover bg-center bg-slate-50">
        <div class="w-full max-w-6xl mx-auto h-[60vh] my-8">
            <div class="flex w-full h-full overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <div class="hidden bg-cover bg-center lg:block lg:w-1/2" style="background-image: url('{{ asset('storage/loginpage.jpg') }}');"></div>
                <div class="w-full px-8 py-12 overflow-y-auto lg:w-1/2">
                    <div class="flex justify-center mx-auto">
                        <img class="w-auto h-8 sm:h-10" src="{{ asset('storage/login_logo.png')}}" alt=""> <!-- Further increased logo size -->
                    </div>
                    <div class="flex items-center justify-between mt-8">
                        <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>
                        <a href="#" class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline"></a>
                        <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
                    </div>
                    <div class="mt-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>