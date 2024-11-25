<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/AVcar.ico') }}">
    <title>{{ config('app.name', 'Auto Vista') }}</title>
    <!-- Fonts -->
     
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Add Bootstrap or your preferred CSS framework -->


    <!-- Add jQuery and date picker JS library (You can use any date picker library, e.g., jQuery UI Datepicker, Flatpickr, or Bootstrap Datepicker) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/welcome.css', 
    'resources/css/usercars.css', 'resources/css/rentprocess.css', 'resources/css/admin-emp.css'])
</head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-black">
            @include('layouts.navigation')


            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-black shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-center text-center">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>


<script>
 
    var modal = document.getElementById("modal");
    var openModalBtn = document.getElementById("openModalBtn");
    var closeModalBtn = document.getElementById("closeModalBtn");


    openModalBtn.onclick = function() {
        modal.style.display = "block";
    }

    closeModalBtn.onclick = function() {
        modal.style.display = "none";
    }


    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


    </body>
</html>
