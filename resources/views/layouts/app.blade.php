<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/flash.js')
    <title>{{ $title }}</title>
</head>
<body>
            <!-- Memasukkan Navbar -->
            @include('partials.navbar')

            <main class="py-4">
                @yield('content') <!-- Menampilkan konten halaman lain -->
            </main>

</html>
