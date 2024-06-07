<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
      .active {
              background: linear-gradient(270deg, #2b2e3a, #4c515b, #422456, #4f4673, #536878, #2b2e3a);
              background-size: 800% 800%;
              /* Combine both animations into one with separate keyframes */
              animation: gradientAnimation 20s ease infinite alternate;
            }

            @keyframes gradientAnimation {
              /* First half: 0% to 100% - Moves from left to right */
                  0% {
                    background-position: 0% 50%;
              }
                  50% {
                    background-position: 100% 50%;
              }

              /* Second half: 50% to 100% - Moves from right to left (opposite direction) */
                  50% {
                    background-position: 100% 50%;
              }
                  100% {
                    background-position: 0% 50%;
              }
            }

            .parent-active {
                border-bottom: 2px solid #ffffff;
            }
    </style>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="sm:ml-64 pt-14">
            {{ $slot }}
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.1/apexcharts.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    {{-- ! Livewire Scripts --}}
    @livewireScripts

    {{-- ! For the Alert Message --}}
    @stack('scripts')
</body>

</html>
