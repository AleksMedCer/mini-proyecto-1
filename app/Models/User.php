<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const ROLE_CLIENTE = 'cliente';
    public const ROLE_EMPLEADO = 'empleado';
    public const ROLE_GERENTE = 'gerente';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function availableRoles(): array
    {
        return [
            self::ROLE_CLIENTE,
            self::ROLE_EMPLEADO,
            self::ROLE_GERENTE,
        ];
    }

    public function hasRole($roles): bool
    {
        if (!is_array($roles)) {
            $roles = [$roles];
        }

        return in_array($this->role, $roles, true);
    }

    public function isCliente(): bool
    {
        return $this->role === self::ROLE_CLIENTE;
    }

    public function isEmpleado(): bool
    {
        return $this->role === self::ROLE_EMPLEADO;
    }

    public function isGerente(): bool
    {
        return $this->role === self::ROLE_GERENTE;
    }

    public function dashboardRouteName(): string
    {
        switch ($this->role) {
            case self::ROLE_EMPLEADO:
                return 'dashboard.empleado';
            case self::ROLE_GERENTE:
                return 'dashboard.gerente';
            case self::ROLE_CLIENTE:
            default:
                return 'dashboard.cliente';
        }
    }

    public function getRoleLabelAttribute(): string
    {
        switch ($this->role) {
            case self::ROLE_EMPLEADO:
                return 'Empleado';
            case self::ROLE_GERENTE:
                return 'Gerente';
            case self::ROLE_CLIENTE:
            default:
                return 'Cliente';
        }
    }
}
