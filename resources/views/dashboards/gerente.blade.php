@extends('layouts.app')

@section('title', 'Dashboard Gerente - GoldenWind')

@section('content')
<div class="manager-dashboard">
    <header class="manager-hero">
        <div class="manager-intro">
            <span class="manager-pill">Gerente</span>
            <h1>Panel ejecutivo de operación y decisiones</h1>
            <p>Supervisa ventas, equipos de trabajo y prioridades estratégicas desde un dashboard dedicado.</p>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="manager-logout-form">
            @csrf
            <button type="submit" class="manager-logout">
                <i class="fas fa-sign-out-alt"></i>
                Cerrar sesión
            </button>
        </form>
    </header>

    @if (session('status'))
        <div class="manager-flash">{{ session('status') }}</div>
    @endif

    <section class="manager-kpis">
        <article class="kpi-card">
            <span>Ventas del día</span>
            <strong>$18,450</strong>
            <p>+12% frente al último corte</p>
        </article>
        <article class="kpi-card">
            <span>Órdenes en revisión</span>
            <strong>9</strong>
            <p>3 requieren aprobación directa</p>
        </article>
        <article class="kpi-card">
            <span>Equipo activo</span>
            <strong>14</strong>
            <p>Atención, almacén y soporte operando</p>
        </article>
    </section>

    <div class="manager-grid">
        <section class="manager-panel">
            <h2><i class="fas fa-users-cog"></i> Coordinación de equipo</h2>
            <ul>
                <li>Asignar prioridades al personal de atención y logística.</li>
                <li>Revisar incidencias elevadas por empleados.</li>
                <li>Validar cambios de rol y accesos especiales.</li>
            </ul>
        </section>

        <section class="manager-panel">
            <h2><i class="fas fa-clipboard-check"></i> Pendientes críticos</h2>
            <ul>
                <li>Aprobar dos cotizaciones empresariales de alto valor.</li>
                <li>Revisar stock bajo en aires acondicionados premium.</li>
                <li>Confirmar política de descuentos para temporada alta.</li>
            </ul>
        </section>

        <section class="manager-panel manager-panel-highlight">
            <h2><i class="fas fa-route"></i> Accesos rápidos</h2>
            <div class="manager-links">
                <a href="{{ route('dashboard') }}">Redirección principal por rol</a>
                <a href="{{ route('user.profile') }}">Ver perfil</a>
                <a href="{{ route('welcome') }}">Ir a la tienda pública</a>
            </div>
        </section>
    </div>
</div>

<style>
    .manager-dashboard {
        max-width: 1180px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .manager-hero {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .manager-pill {
        display: inline-flex;
        padding: 0.35rem 0.8rem;
        border-radius: 999px;
        background: #fff2e8;
        color: #c05621;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 0.75rem;
    }

    .manager-intro h1 {
        margin: 1rem 0 0.7rem;
        color: #1f2937;
        font-size: 2.2rem;
    }

    .manager-intro p {
        color: #667085;
        max-width: 760px;
    }

    .manager-logout-form {
        margin: 0;
    }

    .manager-logout {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.9rem 1.2rem;
        border: none;
        border-radius: 14px;
        background: linear-gradient(135deg, #e53e3e 0%, #c53030 100%);
        color: #fff;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 14px 28px rgba(197, 48, 48, 0.25);
    }

    .manager-flash {
        background: #e8f8ef;
        color: #1e8449;
        border: 1px solid #b6e8c9;
        padding: 0.95rem 1.1rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
    }

    .manager-kpis {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.3rem;
        margin-bottom: 1.6rem;
    }

    .kpi-card,
    .manager-panel {
        background: #fff;
        border: 1px solid #eceff3;
        border-radius: 18px;
        box-shadow: 0 18px 36px rgba(15, 23, 42, 0.08);
    }

    .kpi-card {
        padding: 1.4rem;
    }

    .kpi-card span {
        display: block;
        color: #718096;
        font-size: 0.85rem;
        margin-bottom: 0.35rem;
    }

    .kpi-card strong {
        display: block;
        color: #1f2937;
        font-size: 2rem;
        margin-bottom: 0.35rem;
    }

    .kpi-card p {
        color: #667085;
        margin: 0;
    }

    .manager-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.3rem;
    }

    .manager-panel {
        padding: 1.5rem;
    }

    .manager-panel h2 {
        color: #1f2937;
        font-size: 1.1rem;
        margin-bottom: 1rem;
    }

    .manager-panel ul {
        margin: 0;
        padding-left: 1.2rem;
        color: #667085;
        line-height: 1.7;
    }

    .manager-panel-highlight {
        background: linear-gradient(135deg, #fff8f1 0%, #fff4e6 100%);
        border-color: #f6d2b4;
    }

    .manager-links {
        display: grid;
        gap: 0.85rem;
    }

    .manager-links a {
        display: block;
        padding: 0.9rem 1rem;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.78);
        color: #9c4221;
        text-decoration: none;
        font-weight: 700;
    }

    @media (max-width: 960px) {
        .manager-hero,
        .manager-kpis,
        .manager-grid {
            grid-template-columns: 1fr;
            display: grid;
        }

        .manager-hero {
            align-items: stretch;
        }
    }

    @media (max-width: 640px) {
        .manager-dashboard {
            padding: 2rem 1rem;
        }

        .manager-intro h1 {
            font-size: 1.8rem;
        }

        .manager-logout {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection
