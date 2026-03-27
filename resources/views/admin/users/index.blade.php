@extends('layouts.app')

@section('title', 'Gestión de Usuarios - GoldenWind')

@section('content')
<div class="admin-users-page">
    <header class="admin-users-hero">
        <div>
            <span class="admin-users-pill">Gerencia</span>
            <h1>Gestión administrativa de usuarios</h1>
            <p>Consulta el padrón de cuentas, revisa roles y accede al CRUD completo del sistema.</p>
        </div>

        <div class="admin-users-actions">
            <a href="{{ route('management.users.create') }}" class="admin-primary-btn">
                <i class="fas fa-user-plus"></i>
                Crear usuario
            </a>
        </div>
    </header>

    <section class="admin-users-stats">
        <article class="stat-card">
            <span>Total de usuarios</span>
            <strong>{{ $totals['total'] }}</strong>
        </article>
        <article class="stat-card">
            <span>Clientes</span>
            <strong>{{ $totals['clientes'] }}</strong>
        </article>
        <article class="stat-card">
            <span>Empleados</span>
            <strong>{{ $totals['empleados'] }}</strong>
        </article>
        <article class="stat-card">
            <span>Gerentes</span>
            <strong>{{ $totals['gerentes'] }}</strong>
        </article>
    </section>

    <section class="admin-users-table-wrap">
        <div class="table-header">
            <div>
                <h2><i class="fas fa-list"></i> Listado de usuarios</h2>
                <p>{{ $users->count() }} registros disponibles para administración.</p>
            </div>
            <a href="{{ route('dashboard.gerente') }}" class="admin-secondary-link">Volver al dashboard gerente</a>
        </div>

        <div class="table-scroll">
            <table class="admin-users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>#{{ $user->id }}</td>
                            <td>
                                <div class="user-name-cell">
                                    <strong>{{ $user->name }}</strong>
                                    @if (auth()->id() === $user->id)
                                        <span class="self-badge">Tu cuenta</span>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?: 'Sin teléfono' }}</td>
                            <td>
                                <span class="role-chip role-{{ $user->role }}">{{ $user->role_label }}</span>
                            </td>
                            <td>{{ optional($user->created_at)->format('d/m/Y H:i') ?: 'N/A' }}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('management.users.show', $user) }}">Ver</a>
                                    <a href="{{ route('management.users.edit', $user) }}">Editar</a>
                                    <form method="POST" action="{{ route('management.users.destroy', $user) }}" onsubmit="return confirm('¿Deseas eliminar este usuario?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty-row">No hay usuarios registrados todavía.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>

<style>
    .admin-users-page {
        max-width: 1220px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .admin-users-hero {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .admin-users-pill {
        display: inline-flex;
        padding: 0.35rem 0.8rem;
        border-radius: 999px;
        background: #eff6ff;
        color: #1d4ed8;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 0.75rem;
    }

    .admin-users-hero h1 {
        color: #172033;
        font-size: 2.2rem;
        margin: 1rem 0 0.7rem;
    }

    .admin-users-hero p {
        color: #667085;
        max-width: 760px;
    }

    .admin-primary-btn,
    .admin-secondary-link {
        display: inline-flex;
        align-items: center;
        gap: 0.65rem;
        text-decoration: none;
        font-weight: 700;
        border-radius: 14px;
    }

    .admin-primary-btn {
        padding: 0.95rem 1.2rem;
        background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
        color: #fff;
        box-shadow: 0 14px 28px rgba(37, 99, 235, 0.22);
    }

    .admin-users-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .stat-card,
    .admin-users-table-wrap {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        box-shadow: 0 16px 30px rgba(15, 23, 42, 0.07);
    }

    .stat-card {
        padding: 1.3rem;
    }

    .stat-card span {
        display: block;
        color: #6b7280;
        font-size: 0.84rem;
        margin-bottom: 0.4rem;
    }

    .stat-card strong {
        color: #111827;
        font-size: 1.95rem;
    }

    .admin-users-table-wrap {
        padding: 1.4rem;
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .table-header h2 {
        margin: 0 0 0.35rem;
        color: #172033;
    }

    .table-header p {
        margin: 0;
        color: #667085;
    }

    .admin-secondary-link {
        padding: 0.85rem 1rem;
        background: #f8fafc;
        color: #1f2937;
        border: 1px solid #e5e7eb;
    }

    .table-scroll {
        overflow-x: auto;
    }

    .admin-users-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 920px;
    }

    .admin-users-table th,
    .admin-users-table td {
        padding: 0.95rem 0.8rem;
        border-bottom: 1px solid #edf2f7;
        text-align: left;
        vertical-align: top;
    }

    .admin-users-table th {
        color: #4b5563;
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .user-name-cell {
        display: grid;
        gap: 0.4rem;
    }

    .self-badge,
    .role-chip {
        display: inline-flex;
        width: fit-content;
        padding: 0.2rem 0.6rem;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
    }

    .self-badge {
        background: #fff7ed;
        color: #c2410c;
    }

    .role-chip.role-cliente {
        background: #eef2ff;
        color: #4338ca;
    }

    .role-chip.role-empleado {
        background: #ecfeff;
        color: #0f766e;
    }

    .role-chip.role-gerente {
        background: #fef3c7;
        color: #b45309;
    }

    .table-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.65rem;
    }

    .table-actions a,
    .table-actions button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.55rem 0.8rem;
        border-radius: 10px;
        border: 1px solid #dbe3ee;
        background: #fff;
        color: #1f2937;
        text-decoration: none;
        font-weight: 600;
        cursor: pointer;
    }

    .table-actions button {
        color: #b91c1c;
    }

    .empty-row {
        text-align: center;
        color: #6b7280;
        padding: 2rem 1rem;
    }

    @media (max-width: 900px) {
        .admin-users-hero,
        .table-header {
            flex-direction: column;
        }

        .admin-users-stats {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 640px) {
        .admin-users-page {
            padding: 2rem 1rem;
        }

        .admin-users-stats {
            grid-template-columns: 1fr;
        }

        .admin-users-hero h1 {
            font-size: 1.8rem;
        }
    }
</style>
@endsection
