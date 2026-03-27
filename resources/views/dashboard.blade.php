@extends('layouts.app')

@section('title', 'Dashboard - GoldenWind')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-header">
        <h1><i class="fas fa-chart-line"></i> Dashboard</h1>
        <p>Bienvenido de vuelta, {{ Auth::user()->name ?? 'Usuario' }}</p>
    </div>

    <div class="dashboard-grid">
        <!-- Tarjeta de Órdenes -->
        <div class="dashboard-card">
            <div class="card-icon">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="card-content">
                <h3>Mis Órdenes</h3>
                <p class="card-number">0</p>
                <a href="{{ route('user.orders') }}" class="card-link">Ver todas</a>
            </div>
        </div>

        <!-- Tarjeta de Perfil -->
        <div class="dashboard-card">
            <div class="card-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="card-content">
                <h3>Mi Perfil</h3>
                <p class="card-subtitle">{{ Auth::user()->email }}</p>
                <a href="{{ route('user.profile') }}" class="card-link">Editar</a>
            </div>
        </div>

        <!-- Tarjeta de Favoritos -->
        <div class="dashboard-card">
            <div class="card-icon">
                <i class="fas fa-heart"></i>
            </div>
            <div class="card-content">
                <h3>Favoritos</h3>
                <p class="card-number">0</p>
                <a href="#" class="card-link">Ver favoritos</a>
            </div>
        </div>

        <!-- Tarjeta de Carrito -->
        <div class="dashboard-card">
            <div class="card-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="card-content">
                <h3>Mi Carrito</h3>
                <p class="card-number">0</p>
                <a href="#" class="card-link">Ver carrito</a>
            </div>
        </div>
    </div>

    <!-- Sección de Últimas Órdenes -->
    <div class="dashboard-section">
        <h2>Últimas Órdenes</h2>
        <div class="orders-table">
            <p class="empty-message">No tienes órdenes aún. <a href="{{ route('welcome') }}">Explora nuestros productos</a></p>
        </div>
    </div>

    <!-- Sección de Recomendaciones -->
    <div class="dashboard-section">
        <h2>Productos Recomendados</h2>
        <p class="section-subtitle">Basado en tus intereses</p>
        <div class="products-grid">
            <div class="product-card">
                <div class="product-placeholder">
                    <i class="fas fa-wind"></i>
                </div>
                <h4>Ventilador Premium</h4>
                <p class="product-price">$99.99</p>
            </div>
            <div class="product-card">
                <div class="product-placeholder">
                    <i class="fas fa-snowflake"></i>
                </div>
                <h4>Aire Acondicionado 3000W</h4>
                <p class="product-price">$299.99</p>
            </div>
            <div class="product-card">
                <div class="product-placeholder">
                    <i class="fas fa-parachute-box"></i>
                </div>
                <h4>Paracaídas Profesional</h4>
                <p class="product-price">$1,299.99</p>
            </div>
        </div>
    </div>
</div>

<style>
    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .dashboard-header {
        margin-bottom: 3rem;
    }

    .dashboard-header h1 {
        color: #333;
        font-size: 2rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .dashboard-header p {
        color: #666;
        font-size: 1rem;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .dashboard-card {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        display: flex;
        gap: 1.5rem;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .card-icon {
        font-size: 2.5rem;
        color: #667eea;
        display: flex;
        align-items: center;
        min-width: 60px;
    }

    .card-content h3 {
        color: #333;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .card-number {
        font-size: 1.8rem;
        color: #667eea;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .card-subtitle {
        color: #666;
        font-size: 0.85rem;
        margin-bottom: 0.5rem;
    }

    .card-link {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }

    .card-link:hover {
        color: #764ba2;
    }

    .dashboard-section {
        background: white;
        border-radius: 10px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .dashboard-section h2 {
        color: #333;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .section-subtitle {
        color: #888;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .orders-table {
        padding: 2rem;
        text-align: center;
    }

    .empty-message {
        color: #888;
        font-size: 1rem;
    }

    .empty-message a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
    }

    .empty-message a:hover {
        text-decoration: underline;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1.5rem;
    }

    .product-card {
        text-align: center;
        padding: 1.5rem;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .product-card:hover {
        border-color: #667eea;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.15);
    }

    .product-placeholder {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: #667eea;
        margin: 0 auto 1rem;
    }

    .product-card h4 {
        color: #333;
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
    }

    .product-price {
        color: #667eea;
        font-size: 1.3rem;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 2rem 1rem;
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }
    }
</style>
@endsection