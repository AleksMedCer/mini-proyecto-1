@extends('layouts.app')

@section('title', 'Dashboard Cliente - GoldenWind')

@section('content')
<div class="role-dashboard role-dashboard-cliente">
    <div class="role-hero">
        <div>
            <span class="role-pill">Cliente</span>
            <h1>Tu espacio de compra y seguimiento</h1>
            <p>Revisa tus órdenes, completa tu perfil y descubre productos recomendados según tu actividad.</p>
        </div>
        <div class="role-hero-stats">
            <div class="stat-card">
                <span>Órdenes</span>
                <strong>0</strong>
            </div>
            <div class="stat-card">
                <span>Favoritos</span>
                <strong>0</strong>
            </div>
            <div class="stat-card">
                <span>Perfil</span>
                <strong>60%</strong>
            </div>
        </div>
    </div>

    @if (session('status'))
        <div class="role-flash">{{ session('status') }}</div>
    @endif

    <div class="role-grid">
        <article class="role-card">
            <h2><i class="fas fa-shopping-bag"></i> Mis órdenes</h2>
            <p>Accede al historial completo de compras y al estado de tus entregas.</p>
            <a href="{{ route('user.orders') }}" class="role-link">Ir a mis órdenes</a>
        </article>

        <article class="role-card">
            <h2><i class="fas fa-user-cog"></i> Mi perfil</h2>
            <p>Actualiza tus datos de contacto y mantén lista tu información para futuras compras.</p>
            <a href="{{ route('user.profile') }}" class="role-link">Editar perfil</a>
        </article>

        <article class="role-card">
            <h2><i class="fas fa-box-open"></i> Recomendaciones</h2>
            <p>GoldenWind te sugiere ventiladores, aire acondicionado y accesorios de alto rendimiento.</p>
            <a href="{{ route('welcome') }}" class="role-link">Explorar catálogo</a>
        </article>
    </div>

    <section class="role-section">
        <h2>Acciones rápidas del cliente</h2>
        <div class="action-list">
            <div class="action-item">
                <i class="fas fa-heart"></i>
                <div>
                    <h3>Guardar productos</h3>
                    <p>Crea una lista de favoritos para comparar equipos y volver después.</p>
                </div>
            </div>
            <div class="action-item">
                <i class="fas fa-truck"></i>
                <div>
                    <h3>Rastrear pedidos</h3>
                    <p>Consulta entregas en curso y fechas estimadas desde una sola vista.</p>
                </div>
            </div>
            <div class="action-item">
                <i class="fas fa-headset"></i>
                <div>
                    <h3>Solicitar soporte</h3>
                    <p>Contacta al equipo cuando necesites ayuda con instalación o cotización.</p>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .role-dashboard {
        max-width: 1180px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .role-hero {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1.5rem;
        align-items: stretch;
        margin-bottom: 2rem;
    }

    .role-pill {
        display: inline-block;
        padding: 0.35rem 0.75rem;
        border-radius: 999px;
        background: #eef2ff;
        color: #4b59c4;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 0.75rem;
    }

    .role-hero h1 {
        color: #222;
        font-size: 2.3rem;
        margin: 1rem 0 0.75rem;
    }

    .role-hero p {
        color: #5f6575;
        font-size: 1rem;
        max-width: 700px;
    }

    .role-hero-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    .stat-card,
    .role-card,
    .role-section {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 18px 40px rgba(44, 62, 80, 0.08);
        border: 1px solid #eef1f6;
    }

    .stat-card {
        padding: 1.2rem;
        text-align: center;
    }

    .stat-card span {
        display: block;
        color: #718096;
        font-size: 0.85rem;
        margin-bottom: 0.5rem;
    }

    .stat-card strong {
        color: #2d3748;
        font-size: 1.9rem;
    }

    .role-flash {
        background: #e8f8ef;
        color: #1e8449;
        border: 1px solid #b6e8c9;
        padding: 0.95rem 1.1rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
    }

    .role-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .role-card {
        padding: 1.6rem;
    }

    .role-card h2 {
        color: #2d3748;
        font-size: 1.15rem;
        margin-bottom: 0.8rem;
    }

    .role-card p {
        color: #667085;
        min-height: 72px;
    }

    .role-link {
        display: inline-block;
        margin-top: 1rem;
        color: #4c51bf;
        font-weight: 700;
        text-decoration: none;
    }

    .role-section {
        padding: 1.8rem;
    }

    .role-section h2 {
        color: #2d3748;
        margin-bottom: 1.25rem;
    }

    .action-list {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
    }

    .action-item {
        background: linear-gradient(135deg, #fafbff 0%, #f4f7ff 100%);
        border-radius: 14px;
        padding: 1.2rem;
        display: flex;
        gap: 0.9rem;
    }

    .action-item i {
        color: #667eea;
        font-size: 1.3rem;
        margin-top: 0.2rem;
    }

    .action-item h3 {
        color: #2d3748;
        margin-bottom: 0.35rem;
        font-size: 1rem;
    }

    .action-item p {
        color: #667085;
        font-size: 0.92rem;
        margin: 0;
    }

    @media (max-width: 900px) {
        .role-hero,
        .role-grid,
        .action-list {
            grid-template-columns: 1fr;
        }

        .role-hero-stats {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 640px) {
        .role-dashboard {
            padding: 2rem 1rem;
        }

        .role-hero h1 {
            font-size: 1.8rem;
        }

        .role-hero-stats {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
