<?php

/**
 * ============================================
 * RUTAS DE GOLDENWIND E-COMMERCE
 * ============================================
 * 
 * Avance 1: Páginas estáticas básicas
 * Avance 2: Rutas públicas, login y registro
 * Avance 3: Inicio de sesión real y dashboards por rol
 * 
 * Desarrollado por:
 * - Julio: Liderazgo del acceso, rutas protegidas y redirección por rol
 * - Oscar: Dashboards de Cliente y Empleado
 * - Isacc: Dashboard de Gerente y experiencia de logout
 */

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// ============================================
// 1. RUTAS PÚBLICAS - Accesibles para todos
// ============================================

// Página principal / Home
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Páginas estáticas de información
Route::get('/quienes-somos', function () {
    return view('pages.quienes-somos');
})->name('quienes-somos');

Route::get('/mision', function () {
    return view('pages.mision');
})->name('mision');

Route::get('/vision', function () {
    return view('pages.vision');
})->name('vision');

Route::get('/ubicacion', function () {
    return view('pages.ubicacion');
})->name('ubicacion');

Route::get('/contactanos', function () {
    return view('pages.contactanos');
})->name('contactanos');

// ============================================
// 2. RUTAS DE AUTENTICACIÓN (Avance 3)
// ============================================

Route::middleware('guest')->group(function () {
    // Rutas de Login - Julio implementa la verificación real
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    // Rutas de Registro - cliente por defecto
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

// ============================================
// 3. RUTAS PRIVADAS (Requieren autenticación y rol)
// ============================================

Route::middleware('auth')->group(function () {
    // Dashboard central: Julio decide la redirección según rol
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Dashboards especializados por rol
    Route::get('/dashboard/cliente', [DashboardController::class, 'cliente'])
        ->name('dashboard.cliente')
        ->middleware('role:cliente');

    Route::get('/dashboard/empleado', [DashboardController::class, 'empleado'])
        ->name('dashboard.empleado')
        ->middleware('role:empleado');

    Route::get('/dashboard/gerente', [DashboardController::class, 'gerente'])
        ->name('dashboard.gerente')
        ->middleware('role:gerente');

    // Perfil del usuario
    Route::get('/perfil', [DashboardController::class, 'profile'])->name('user.profile');

    // Mis órdenes / Carrito
    Route::get('/mis-ordenes', [DashboardController::class, 'orders'])
        ->name('user.orders')
        ->middleware('role:cliente');

    Route::middleware('role:gerente')
        ->prefix('gerencia')
        ->name('management.')
        ->group(function () {
            Route::get('/usuarios', [UserManagementController::class, 'index'])->name('users.index');
            Route::get('/usuarios/crear', [UserManagementController::class, 'create'])->name('users.create');
            Route::post('/usuarios', [UserManagementController::class, 'store'])->name('users.store');
            Route::get('/usuarios/{user}', [UserManagementController::class, 'show'])->name('users.show');
            Route::get('/usuarios/{user}/editar', [UserManagementController::class, 'edit'])->name('users.edit');
            Route::put('/usuarios/{user}', [UserManagementController::class, 'update'])->name('users.update');
            Route::delete('/usuarios/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
        });

    // Logout
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});

// ============================================
// 4. REDIRECCIONES BÁSICAS
// ============================================

// Redireccionar usuario autenticado que intenta ir a home
Route::get('/home', function () {
    return redirect()->route('dashboard');
});

// ============================================
// NOTAS IMPORTANTES
// ============================================
/*
 * Middlewares utilizados:
 * - 'guest': Solo usuarios NO autenticados
 * - 'auth': Solo usuarios autenticados
 * - 'role': Restringe dashboards por rol
 * 
 * Roles implementados:
 * - cliente
 * - empleado
 * - gerente
 * 
 * Cambios realizados en Avance 3:
 * 1. Login con verificación real de credenciales
 * 2. Registro con asignación automática de rol Cliente
 * 3. Redirección automática a dashboard según rol
 * 4. Logout seguro con invalidación de sesión
 * 5. Dashboards separados para Cliente, Empleado y Gerente
 */
