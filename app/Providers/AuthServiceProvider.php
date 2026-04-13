<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

// MODELOS
use App\Models\Producto;
use App\Models\Venta;
use App\Models\User;

// POLICIES
use App\Policies\ProductoPolicy;
use App\Policies\VentaPolicy;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     */
    protected $policies = [
        Producto::class => ProductoPolicy::class,
        Venta::class => VentaPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
