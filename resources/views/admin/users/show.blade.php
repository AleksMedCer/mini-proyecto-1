@extends('layouts.app')

@section('title', 'Detalle de Usuario - GoldenWind')

@section('content')
<div class="managed-user-detail-page">
    <header class="detail-header">
        <div>
            <span class="detail-pill">{{ $user->role_label }}</span>
            <h1>{{ $user->name }}</h1>
            <p>Consulta la ficha completa del usuario y continúa con acciones de edición o eliminación.</p>
        </div>
        <div class="detail-header-actions">
            <a href="{{ route('management.users.edit', $user) }}" class="detail-primary-link">Editar usuario</a>
            <a href="{{ route('management.users.index') }}" class="detail-secondary-link">Volver al listado</a>
        </div>
    </header>

    <section class="detail-grid">
        <article class="detail-card">
            <h2><i class="fas fa-id-card"></i> Datos generales</h2>
            <dl class="detail-list">
                <div><dt>ID</dt><dd>#{{ $user->id }}</dd></div>
                <div><dt>Nombre</dt><dd>{{ $user->name }}</dd></div>
                <div><dt>Correo</dt><dd>{{ $user->email }}</dd></div>
                <div><dt>Teléfono</dt><dd>{{ $user->phone ?: 'Sin teléfono registrado' }}</dd></div>
                <div><dt>Rol</dt><dd>{{ $user->role_label }}</dd></div>
                <div><dt>Creado</dt><dd>{{ optional($user->created_at)->format('d/m/Y H:i') ?: 'N/A' }}</dd></div>
            </dl>
        </article>

        <article class="detail-card detail-card-warning">
            <h2><i class="fas fa-shield-alt"></i> Acciones administrativas</h2>
            <p>Desde aquí puedes cambiar el rol, actualizar sus datos o eliminar la cuenta si ya no corresponde mantenerla activa.</p>
            <div class="detail-card-actions">
                <a href="{{ route('management.users.edit', $user) }}">Editar datos</a>
                <form method="POST" action="{{ route('management.users.destroy', $user) }}" onsubmit="return confirm('¿Deseas eliminar este usuario?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar usuario</button>
                </form>
            </div>
        </article>
    </section>
</div>

<style>
    .managed-user-detail-page {
        max-width: 1120px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .detail-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .detail-pill {
        display: inline-flex;
        padding: 0.35rem 0.8rem;
        border-radius: 999px;
        background: #fef3c7;
        color: #b45309;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.75rem;
    }

    .detail-header h1 {
        margin: 1rem 0 0.6rem;
        color: #111827;
        font-size: 2.2rem;
    }

    .detail-header p {
        color: #667085;
    }

    .detail-header-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .detail-primary-link,
    .detail-secondary-link,
    .detail-card-actions a,
    .detail-card-actions button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.85rem 1rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
    }

    .detail-primary-link {
        background: #1d4ed8;
        color: #fff;
    }

    .detail-secondary-link,
    .detail-card-actions a {
        border: 1px solid #dbe3ee;
        color: #1f2937;
        background: #fff;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 1.4rem;
    }

    .detail-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 1.6rem;
        box-shadow: 0 16px 30px rgba(15, 23, 42, 0.07);
    }

    .detail-card h2 {
        color: #111827;
        margin-bottom: 1rem;
    }

    .detail-list {
        display: grid;
        gap: 0.9rem;
        margin: 0;
    }

    .detail-list div {
        display: grid;
        gap: 0.3rem;
        padding-bottom: 0.8rem;
        border-bottom: 1px solid #edf2f7;
    }

    .detail-list dt {
        color: #6b7280;
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .detail-list dd {
        margin: 0;
        color: #1f2937;
        font-weight: 600;
    }

    .detail-card-warning {
        background: linear-gradient(135deg, #fffaf0 0%, #fff7ed 100%);
        border-color: #fdba74;
    }

    .detail-card-warning p {
        color: #7c2d12;
    }

    .detail-card-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.8rem;
        margin-top: 1rem;
    }

    .detail-card-actions button {
        border: 1px solid #fecaca;
        background: #fff;
        color: #b91c1c;
        cursor: pointer;
    }

    @media (max-width: 900px) {
        .detail-header,
        .detail-grid {
            grid-template-columns: 1fr;
            display: grid;
        }
    }

    @media (max-width: 640px) {
        .managed-user-detail-page {
            padding: 2rem 1rem;
        }

        .detail-header h1 {
            font-size: 1.8rem;
        }
    }
</style>
@endsection
