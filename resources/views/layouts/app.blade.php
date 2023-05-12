<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projet réservations - @yield('title')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
