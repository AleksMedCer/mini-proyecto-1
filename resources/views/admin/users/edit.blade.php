@extends('layouts.app')

@section('title', 'Editar Usuario - GoldenWind')

@section('content')
<div class="managed-user-form-page">
    <div class="managed-user-shell">
        <div class="managed-user-copy">
            <span class="managed-user-pill">Edición</span>
            <h1>Actualizar datos de {{ $user->name }}</h1>
            <p>Modifica la información del usuario, cambia su rol o establece una nueva contraseña.</p>
            <div class="managed-user-notes">
                <article>
                    <h3>Rol sensible</h3>
                    <p>El gerente puede administrar roles, pero no puede quitarse a sí mismo el acceso gerente desde este panel.</p>
                </article>
                <article>
                    <h3>Contraseña opcional</h3>
                    <p>Si dejas la contraseña vacía, el sistema conservará la actual del usuario.</p>
                </article>
            </div>
        </div>

        <div class="managed-user-card">
            <div class="managed-user-card-header">
                <h2><i class="fas fa-user-pen"></i> Editar usuario</h2>
                <a href="{{ route('management.users.show', $user) }}">Ver detalle</a>
            </div>

            @if ($errors->any())
                <div class="managed-user-alert">
                    Hay datos que necesitan corrección antes de actualizar el usuario.
                </div>
            @endif

            <form method="POST" action="{{ route('management.users.update', $user) }}" class="managed-user-form">
                @csrf
                @method('PUT')

                <div class="form-field">
                    <label for="name">Nombre completo</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" class="@error('name') field-error @enderror" required>
                    @error('name')<span class="field-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-field">
                    <label for="email">Correo electrónico</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="@error('email') field-error @enderror" required>
                    @error('email')<span class="field-message">{{ $message }}</span>@enderror
                </div>

                <div class="form-grid">
                    <div class="form-field">
                        <label for="phone">Teléfono</label>
                        <input id="phone" name="phone" type="tel" value="{{ old('phone', $user->phone) }}" class="@error('phone') field-error @enderror">
                        @error('phone')<span class="field-message">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-field">
                        <label for="role">Rol</label>
                        <select id="role" name="role" class="@error('role') field-error @enderror" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" @selected(old('role', $user->role) === $role)>{{ ucfirst($role) }}</option>
                            @endforeach
                        </select>
                        @error('role')<span class="field-message">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-field">
                        <label for="password">Nueva contraseña</label>
                        <input id="password" name="password" type="password" class="@error('password') field-error @enderror">
                        @error('password')<span class="field-message">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-field">
                        <label for="password_confirmation">Confirmar nueva contraseña</label>
                        <input id="password_confirmation" name="password_confirmation" type="password">
                    </div>
                </div>

                <div class="managed-user-form-actions">
                    <button type="submit" class="managed-user-submit">Guardar cambios</button>
                    <a href="{{ route('management.users.show', $user) }}" class="managed-user-cancel">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .managed-user-form-page {
        max-width: 1220px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .managed-user-shell {
        display: grid;
        grid-template-columns: 1.05fr 1fr;
        gap: 1.5rem;
    }

    .managed-user-copy,
    .managed-user-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 20px;
        box-shadow: 0 18px 36px rgba(15, 23, 42, 0.08);
    }

    .managed-user-copy {
        padding: 2rem;
    }

    .managed-user-pill {
        display: inline-flex;
        padding: 0.35rem 0.8rem;
        border-radius: 999px;
        background: #eff6ff;
        color: #1d4ed8;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.75rem;
    }

    .managed-user-copy h1 {
        color: #172033;
        font-size: 2.1rem;
        margin: 1rem 0 0.7rem;
    }

    .managed-user-copy p {
        color: #667085;
    }

    .managed-user-notes {
        display: grid;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .managed-user-notes article {
        padding: 1rem 1.1rem;
        border-radius: 16px;
        background: linear-gradient(135deg, #fffaf0 0%, #fff7ed 100%);
    }

    .managed-user-notes h3 {
        color: #7c2d12;
        margin-bottom: 0.4rem;
    }

    .managed-user-notes p {
        margin: 0;
    }

    .managed-user-card {
        padding: 1.8rem;
    }

    .managed-user-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .managed-user-card-header h2 {
        margin: 0;
        color: #172033;
    }

    .managed-user-card-header a {
        color: #1d4ed8;
        font-weight: 700;
        text-decoration: none;
    }

    .managed-user-alert {
        padding: 0.95rem 1rem;
        border-radius: 12px;
        background: #fef2f2;
        color: #b91c1c;
        margin-bottom: 1rem;
    }

    .managed-user-form {
        display: grid;
        gap: 1rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .form-field {
        display: grid;
        gap: 0.45rem;
    }

    .form-field label {
        color: #374151;
        font-weight: 700;
    }

    .form-field input,
    .form-field select {
        padding: 0.85rem 1rem;
        border-radius: 12px;
        border: 1px solid #d9e2ec;
        font: inherit;
    }

    .field-error {
        border-color: #dc2626 !important;
    }

    .field-message {
        color: #dc2626;
        font-size: 0.88rem;
    }

    .managed-user-form-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.8rem;
        margin-top: 0.5rem;
    }

    .managed-user-submit,
    .managed-user-cancel {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.9rem 1.2rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
    }

    .managed-user-submit {
        border: none;
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        color: #fff;
        cursor: pointer;
    }

    .managed-user-cancel {
        border: 1px solid #d9e2ec;
        color: #1f2937;
        background: #fff;
    }

    @media (max-width: 960px) {
        .managed-user-shell,
        .form-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .managed-user-form-page {
            padding: 2rem 1rem;
        }

        .managed-user-copy h1 {
            font-size: 1.8rem;
        }
    }
</style>
@endsection
