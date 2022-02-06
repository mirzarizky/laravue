<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('dist/js/app.js') }}" defer></script>
        @inertiaHead
    </head>

    <body class="antialiased">
        @inertia

        @env ('local')
        <script src="http://localhost:8080/js/bundle.js"></script>
        @endenv
    </body>

</html>
