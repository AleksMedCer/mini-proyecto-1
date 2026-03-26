@extends('layouts.app')

@section('title', 'Dashboard Empleado - GoldenWind')

@section('content')
<div class="staff-dashboard staff-dashboard-empleado">
    <header class="staff-hero">
        <div>
            <span class="staff-pill">Empleado</span>
            <h1>Centro operativo de atención y seguimiento</h1>
            <p>Gestiona pedidos, verifica pendientes y mantén el servicio al cliente en movimiento.</p>
        </div>
        <div class="staff-summary">
            <div class="staff-metric">
                <span>Pedidos pendientes</span>
                <strong>12</strong>
            </div>
            <div class="staff-metric">
                <span>Cotizaciones del día</span>
                <strong>7</strong>
            </div>
            <div class="staff-metric">
                <span>Clientes atendidos</span>
                <strong>18</strong>
            </div>
        </div>
    </header>

    @if (session('status'))
        <div class="staff-flash">{{ session('status') }}</div>
    @endif

    <div class="staff-grid">
        <section class="staff-panel">
            <h2><i class="fas fa-clipboard-list"></i> Cola de trabajo</h2>
            <ul class="panel-list">
                <li>Revisar órdenes nuevas pendientes de validación.</li>
                <li>Confirmar disponibilidad de equipos solicitados.</li>
                <li>Actualizar estados de entrega y atención postventa.</li>
            </ul>
        </section>

        <section class="staff-panel">
            <h2><i class="fas fa-comments"></i> Atención al cliente</h2>
            <ul class="panel-list">
                <li>Responder solicitudes enviadas desde Contáctanos.</li>
                <li>Dar seguimiento a garantías y devoluciones.</li>
                <li>Escalar incidencias complejas al gerente.</li>
            </ul>
        </section>

        <section class="staff-panel">
            <h2><i class="fas fa-chart-bar"></i> Indicadores rápidos</h2>
            <div class="mini-bars">
                <div>
                    <span>Tiempo de respuesta</span>
                    <strong>15 min</strong>
                </div>
                <div>
                    <span>Órdenes completadas</span>
                    <strong>34</strong>
                </div>
                <div>
                    <span>Satisfacción</span>
                    <strong>96%</strong>
                </div>
            </div>
        </section>
    </div>

    <section class="staff-actions">
        <article class="quick-card">
            <h3>Acceder al perfil</h3>
            <p>Consulta tus datos de empleado y mantén actualizada tu información.</p>
            <a href="{{ route('user.profile') }}">Ir al perfil</a>
        </article>

        <article class="quick-card">
            <h3>Inicio del catálogo</h3>
            <p>Verifica cómo luce la tienda pública para apoyar a los clientes desde la misma navegación.</p>
            <a href="{{ route('welcome') }}">Ver tienda</a>
        </article>
    </section>
</div>

<style>
    .staff-dashboard {
        max-width: 1180px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .staff-hero {
        display: grid;
        grid-template-columns: 1.8fr 1fr;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .staff-pill {
        display: inline-flex;
        padding: 0.35rem 0.8rem;
        border-radius: 999px;
        background: #edfdf7;
        color: #0f766e;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 0.75rem;
    }

    .staff-hero h1 {
        margin: 1rem 0 0.7rem;
        color: #1f2937;
        font-size: 2.2rem;
    }

    .staff-hero p {
        color: #667085;
        font-size: 1rem;
    }

    .staff-summary,
    .staff-panel,
    .quick-card {
        background: #fff;
        border: 1px solid #e8edf3;
        border-radius: 18px;
        box-shadow: 0 16px 32px rgba(17, 24, 39, 0.08);
    }

    .staff-summary {
        padding: 1.2rem;
        display: grid;
        gap: 0.8rem;
    }

    .staff-metric {
        padding: 0.9rem 1rem;
        background: #f7fafc;
        border-radius: 14px;
    }

    .staff-metric span {
        display: block;
        color: #718096;
        font-size: 0.85rem;
        margin-bottom: 0.3rem;
    }

    .staff-metric strong {
        color: #111827;
        font-size: 1.7rem;
    }

    .staff-flash {
        background: #e8f8ef;
        color: #1e8449;
        border: 1px solid #b6e8c9;
        padding: 0.95rem 1.1rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
    }

    .staff-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.4rem;
        margin-bottom: 1.8rem;
    }

    .staff-panel {
        padding: 1.5rem;
    }

    .staff-panel h2 {
        color: #1f2937;
        font-size: 1.1rem;
        margin-bottom: 1rem;
    }

    .panel-list {
        margin: 0;
        padding-left: 1.2rem;
        color: #667085;
        line-height: 1.7;
    }

    .mini-bars {
        display: grid;
        gap: 0.9rem;
    }

    .mini-bars div {
        padding: 0.95rem 1rem;
        border-radius: 14px;
        background: linear-gradient(135deg, #f0fdf9 0%, #f5fffb 100%);
    }

    .mini-bars span {
        display: block;
        color: #607080;
        font-size: 0.82rem;
        margin-bottom: 0.25rem;
    }

    .mini-bars strong {
        color: #0f766e;
        font-size: 1.35rem;
    }

    .staff-actions {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.4rem;
    }

    .quick-card {
        padding: 1.4rem;
    }

    .quick-card h3 {
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .quick-card p {
        color: #667085;
        margin-bottom: 1rem;
    }

    .quick-card a {
        color: #0f766e;
        font-weight: 700;
        text-decoration: none;
    }

    @media (max-width: 900px) {
        .staff-hero,
        .staff-grid,
        .staff-actions {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .staff-dashboard {
            padding: 2rem 1rem;
        }

        .staff-hero h1 {
            font-size: 1.8rem;
        }
    }
</style>
@endsection
