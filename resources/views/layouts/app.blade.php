<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GoldenWind - Inicio')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .flash-wrapper {
            max-width: 1200px;
            margin: 1.5rem auto 0;
            padding: 0 1rem;
        }

        .flash-message {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-radius: 10px;
            padding: 1rem 1.25rem;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            font-weight: 500;
        }

        .flash-success {
            background: #ecfdf3;
            border: 1px solid #a7f3d0;
            color: #166534;
        }

        .flash-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    @include('components.navbar')

    @if (session('status') || session('error'))
        <div class="flash-wrapper">
            @if (session('status'))
                <div class="flash-message flash-success">
                    <i class="fas fa-circle-check"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="flash-message flash-error">
                    <i class="fas fa-triangle-exclamation"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
        </div>
    @endif

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- FOOTER -->
    @include('components.footer')

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
