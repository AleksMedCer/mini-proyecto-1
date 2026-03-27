<!-- 
    ================================================
    NAVBAR DE GOLDENWIND - Avance 2
    ================================================
    
    Componente de navegación con soporte para:
    - Rutas públicas (Julio)
    - Autenticación (Oscar/Isacc)
    - Navegación dinámica basada en estado de usuario
    
    Desarrollado por: Isacc (flujo de navegación)
-->

<nav class="navbar">
    @php($currentUser = Auth::user())

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
            <!-- Menú público (siempre visible) -->
            <li><a href="{{ route('welcome') }}">Inicio</a></li>
            <li><a href="{{ route('quienes-somos') }}">Quiénes Somos</a></li>
            <li><a href="{{ route('mision') }}">Misión</a></li>
            <li><a href="{{ route('vision') }}">Visión</a></li>
            <li><a href="{{ route('ubicacion') }}">Ubicación</a></li>
            <li><a href="{{ route('contactanos') }}">Contáctanos</a></li>
            
            <!-- Separador -->
            <li class="navbar-separator"></li>
            
            <!-- Menú de autenticación - Condicional basado en estado (Avance 3) -->
            @if ($currentUser)
                <!-- Usuario autenticado -->
                <li class="navbar-user-menu">
                    <div class="user-profile">
                        <i class="fas fa-user-circle"></i>
                        <div class="user-profile-copy">
                            <span class="user-name">{{ $currentUser->name ?? 'Usuario' }}</span>
                            <span class="user-role-badge">{{ $currentUser->role_label ?? ucfirst($currentUser->role ?? 'cliente') }}</span>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    
                    <!-- Submenu desplegable -->
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('user.profile') }}" class="submenu-link">
                                <i class="fas fa-cog"></i> Mi Perfil
                            </a>
                        </li>
                        @if (($currentUser->role ?? null) === \App\Models\User::ROLE_CLIENTE)
                            <li>
                                <a href="{{ route('user.orders') }}" class="submenu-link">
                                    <i class="fas fa-shopping-bag"></i> Mis Órdenes
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('dashboard') }}" class="submenu-link submenu-link-primary">
                                <i class="fas fa-chart-line"></i> Dashboard de {{ $currentUser->role_label ?? 'Usuario' }}
                            </a>
                        </li>
                        @if ($currentUser->isGerente())
                            <li>
                                <a href="{{ route('management.users.index') }}" class="submenu-link">
                                    <i class="fas fa-users-cog"></i> Administrar Usuarios
                                </a>
                            </li>
                        @endif
                        <li class="submenu-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                                @csrf
                                <button type="submit" class="submenu-link logout-btn logout-btn-prominent">
                                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión Segura
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <!-- Usuario no autenticado -->
                <li><a href="{{ route('login') }}" class="nav-auth-link nav-login">
                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                </a></li>
                <li><a href="{{ route('register') }}" class="nav-auth-link nav-register">
                    <i class="fas fa-user-plus"></i> Registrarse
                </a></li>
            @endif
        </ul>
    </div>
</nav>

<style>
    /* Agregué estilos para los nuevos elementos de autenticación */
    
    .navbar-separator {
        width: 1px;
        height: 20px;
        background: rgba(255, 255, 255, 0.3);
        margin: 0 0.5rem;
        list-style: none;
    }

    .navbar-user-menu {
        position: relative;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        cursor: pointer;
        border-radius: 6px;
        transition: background-color 0.3s ease;
        color: white;
        font-weight: 500;
    }

    .user-profile-copy {
        display: flex;
        flex-direction: column;
        line-height: 1.1;
    }

    .user-role-badge {
        display: inline-flex;
        align-items: center;
        width: fit-content;
        padding: 0.15rem 0.45rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.18);
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .user-profile:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .user-profile i:last-child {
        font-size: 0.75rem;
        transition: transform 0.3s ease;
    }

    .navbar-user-menu.active .user-profile i:last-child {
        transform: rotate(180deg);
    }

    .submenu {
        position: absolute;
        top: calc(100% + 0.5rem);
        right: 0;
        background: white;
        border-radius: 8px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        min-width: 200px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .navbar-user-menu.active .submenu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .submenu li {
        list-style: none;
        margin: 0;
    }

    .submenu-link {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.75rem 1.2rem;
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
        font-size: 0.9rem;
        border: none;
        background: none;
        cursor: pointer;
        width: 100%;
        text-align: left;
    }

    .submenu-link:hover {
        background-color: #f5f5f5;
        padding-left: 1.4rem;
    }

    .submenu-link i {
        color: #667eea;
        width: 16px;
        text-align: center;
    }

    .submenu-link-primary {
        color: #3b4db7;
        font-weight: 700;
    }

    .submenu-link-primary:hover {
        background: #eef2ff;
    }

    .submenu-divider {
        height: 1px;
        background-color: #e0e0e0;
        margin: 0.5rem 0;
        list-style: none;
    }

    .logout-form {
        width: 100%;
    }

    .logout-btn {
        color: #e74c3c;
    }

    .logout-btn:hover {
        background-color: #ffe0e0;
    }

    .logout-btn-prominent {
        font-weight: 700;
        background: linear-gradient(135deg, #fff1f1 0%, #ffe5e5 100%);
    }

    .nav-auth-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s ease;
        color: white;
        text-decoration: none;
    }

    .nav-login {
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .nav-login:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .nav-register {
        background-color: rgba(102, 126, 234, 0.8);
    }

    .nav-register:hover {
        background-color: rgb(102, 126, 234);
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .navbar-separator {
            margin: 0.5rem 0;
        }

        .user-profile {
            padding: 0.75rem 0;
            justify-content: flex-start;
        }

        .submenu {
            position: static;
            opacity: 1;
            visibility: visible;
            transform: none;
            box-shadow: none;
            background-color: #f9f9f9;
            border-left: 3px solid #667eea;
            margin-top: 0.5rem;
        }

        .navbar-user-menu.active .submenu {
            box-shadow: none;
        }

        .submenu-link {
            padding: 0.5rem 0 0.5rem 1rem;
        }
    }
</style>

<script>
    /**
     * Control interactivo del menú de usuario (Isacc)
     * ============================================
     */
    document.addEventListener('DOMContentLoaded', function() {
        const userMenu = document.querySelector('.navbar-user-menu');
        if (!userMenu) return;

        const userProfile = userMenu.querySelector('.user-profile');
        
        // Toggle del menú al hacer click
        userProfile.addEventListener('click', function(e) {
            e.stopPropagation();
            userMenu.classList.toggle('active');
        });

        // Cerrar menú si hacemos click en otro lugar
        document.addEventListener('click', function(e) {
            if (!userMenu.contains(e.target)) {
                userMenu.classList.remove('active');
            }
        });

        // Cerrar menú al seleccionar un enlace
        const submenuLinks = userMenu.querySelectorAll('.submenu-link');
        submenuLinks.forEach(link => {
            link.addEventListener('click', function() {
                userMenu.classList.remove('active');
            });
        });
    });
</script>
