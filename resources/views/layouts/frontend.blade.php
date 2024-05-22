<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- You can replace the link above with your local Tailwind CSS file if you prefer -->
    <style>
        /* Add custom styles here */
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header Section -->
    <header class="bg-blue-500 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold">My Blog</a>
            </div>
            <nav class="hidden md:block">
                <ul class="flex space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="hover:text-gray-200">{{ Auth::user()->name }}</a>
                        @else
                            <li><a href="#" class="hover:text-gray-200">Home</a></li>
                            <li><a href="#" class="hover:text-gray-200">About</a></li>
                            <li><a href="#" class="hover:text-gray-200">Blog</a></li>
                            <li><a href="#" class="hover:text-gray-200">Contact</a></li>
                            <a href="{{ route('login') }}" class="text-white border rounded-md border-white px-6 py-1">Log in</a>

                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif --}}
                        @endauth
                    @endif
                </ul>
            </nav>
            <div class="md:hidden">
                <!-- Mobile Menu Button -->
                <button class="mobile-menu-button">
                    <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M20 5H4c-1.1 0-2 .9-2 2v2c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 6H4c-1.1 0-2 .9-2 2v2c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-2c0-1.1-.9-2-2-2zm0 6H4c-1.1 0-2 .9-2 2v2c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-2c0-1.1-.9-2-2-2z"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="md:hidden mobile-menu hidden bg-blue-500 text-white">
        <ul class="py-2">
            <li><a href="#" class="block px-4 py-2">Home</a></li>
            <li><a href="#" class="block px-4 py-2">About</a></li>
            <li><a href="#" class="block px-4 py-2">Blog</a></li>
            <li><a href="#" class="block px-4 py-2">Contact</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    @yield('content')

    <script>
        // Toggle mobile menu
        document.querySelector('.mobile-menu-button').addEventListener('click', function() {
            document.querySelector('.mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
