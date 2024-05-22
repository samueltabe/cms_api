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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- for trix -->
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

        <!--flatpickr -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <!-- select2 for fancier select option-->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->

            <!-- Page Content -->
            <main class="relative">
                @if (session()->has('success'))
                <div id="flash-message" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-green-600 bg-opacity-75 p-4 max-w-sm text-white">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                <div id="flash-message" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-red-600 bg-opacity-75 p-4 max-w-sm text-white">
                        {{ session()->get('error') }}
                    </div>
                @endif
                {{ $slot }}
            </main>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- for trix -->
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

        <!--- select2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <!--flatpickr -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr('#published_at', {
                enableTime: true
            });
        </script>

        <!--select2-->
        <script>
            $(document).ready(function() {
                $('.tags-selector').select2();
            });
        </script>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    // Fade out the flash message
                    $('#flash-message').fadeOut(1000);
                }, 2500); // 2 seconds
            });
        </script>
    </body>
</html>
