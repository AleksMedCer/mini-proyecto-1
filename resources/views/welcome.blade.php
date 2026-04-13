@extends('layouts.app')

@section('title', 'GoldenWind - Tienda de Climatización y Seguridad')

@section('content')
@php
    $featuredProducts = [
        [
            'title' => 'Ventiladores',
            'description' => 'Ventiladores de piso, turbo y de techo. Modelos eficientes y silenciosos.',
            'icon' => 'fas fa-fan',
            'image' => 'images/products/ventiladores.jpg',
            'alt' => 'Ventiladores GoldenWind',
        ],
        [
            'title' => 'Aires Acondicionados',
            'description' => 'Equipos split y portátiles con tecnología inverter de bajo consumo.',
            'icon' => 'fas fa-snowflake',
            'image' => 'images/products/aires-acondicionados.jpg',
            'alt' => 'Aires acondicionados GoldenWind',
        ],
        [
            'title' => 'Paracaídas',
            'description' => 'Equipos de seguridad de alta performance para deportes extremos.',
            'icon' => 'fas fa-parachute-box',
            'image' => 'images/products/paracaidas.jpg',
            'alt' => 'Paracaidas GoldenWind',
        ],
    ];
@endphp

<div class="hero">
    <div class="hero-content">
        <h1 class="hero-title">Bienvenido a <span class="brand-gold">GoldenWind</span></h1>
        <p class="hero-subtitle">Tu Tienda de Soluciones de Climatización y Seguridad</p>
        <div class="hero-buttons">
            <a href="{{ route('quienes-somos') }}" class="btn btn-primary">Conoce Nuestros Productos</a>
            <a href="{{ route('contactanos') }}" class="btn btn-secondary">Solicita Cotización</a>
        </div>
    </div>
</div>

<section class="features">
    <div class="container">
        <h2>¿Por qué Elegir GoldenWind?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-wind"></i>
                <h3>Productos de Calidad</h3>
                <p>Ventiladores, aires acondicionados y paracaídas de las mejores marcas internacionales.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shipping-fast"></i>
                <h3>Envío Rápido</h3>
                <p>Entrega garantizada en toda la región. Empaques seguros y rastreo en tiempo real.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Garantía Certificada</h3>
                <p>Todos nuestros productos incluyen garantía extendida y servicio técnico en línea.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-headset"></i>
                <h3>Soporte 24/7</h3>
                <p>Equipo de atención al cliente disponible para resolver todas tus dudas.</p>
            </div>
        </div>
    </div>
</section>

<section class="products-preview">
    <div class="container">
        <h2>Nuestros Productos Destacados</h2>
        <p class="products-subtitle">Agrega tus fotos en <strong>public/images/products</strong> y aparecerán aquí automáticamente.</p>
        <div class="products-grid">
            @foreach ($featuredProducts as $product)
                <div class="product-card">
                    <div class="product-media">
                        @if (file_exists(public_path($product['image'])))
                            <img src="{{ asset($product['image']) }}" alt="{{ $product['alt'] }}">
                        @else
                            <div class="product-placeholder" aria-hidden="true">
                                <i class="{{ $product['icon'] }}"></i>
                            </div>
                        @endif
                    </div>

                    <div class="product-copy">
                        <h3>{{ $product['title'] }}</h3>
                        <p>{{ $product['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <h2>¿Buscas Soluciones de Climatización?</h2>
        <p>Tenemos las mejores opciones para tu hogar, oficina o negocio</p>
        <a href="{{ route('contactanos') }}" class="btn btn-primary btn-large">Solicitar Cotización Ahora</a>
    </div>
</section>
@endsection
