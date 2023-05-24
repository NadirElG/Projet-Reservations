<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projet réservations - @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.0-alpha3/dist/css/bootstrap.min.css') }}">
        <style>
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }
            main {
                flex: 1;
            }
        </style>
    </head>

    <body>
        @include('layouts.navbar')
        <main class="container mt-5 mb-5" ">
            @yield('content')
        </main>
        @include('layouts.footer')
    </body>
</html>
