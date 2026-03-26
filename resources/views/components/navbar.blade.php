//isaac estuvo aqui :D
<nav class="navbar">
    <div class="navbar-container">
        <!-- Logo -->
        <div class="navbar-logo">
            <a href="{{ route('welcome') }}" class="logo-link">
                <i class="fas fa-wind"></i>
                <span>GoldenWind</span>
            </a>
        </div>

        <!-- Hamburger Menu Icon -->
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Navigation Menu -->
        <ul class="navbar-menu" id="navbarMenu">
            <li><a href="{{ route('welcome') }}">Inicio</a></li>
            <li><a href="{{ route('quienes-somos') }}">Quiénes Somos</a></li>
            <li><a href="{{ route('mision') }}">Misión</a></li>
            <li><a href="{{ route('vision') }}">Visión</a></li>
            <li><a href="{{ route('ubicacion') }}">Ubicación</a></li>
            <li><a href="{{ route('contactanos') }}">Contáctanos</a></li>
        </ul>
    </div>
</nav>
