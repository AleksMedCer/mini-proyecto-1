<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GoldenWind - Inicio')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- NAVBAR -->
    @include('components.navbar')

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- FOOTER -->
    @include('components.footer')

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
