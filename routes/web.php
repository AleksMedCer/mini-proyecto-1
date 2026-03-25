<?php

/**
 * ============================================
 * RUTAS DE GOLDENWIND E-COMMERCE
 * ============================================
 * 
 * Avance 1: Páginas estáticas básicas
 * Avance 2: Rutas públicas, login y registro
 * 
 * Desarrollado por:
 * - Julio: Definición de rutas públicas y privadas
 * - Oscar: Vista de formularios
 * - Isacc: Navegación y flujo
 */

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
// 2. RUTAS DE AUTENTICACIÓN (Avance 2)
// ============================================

// Rutas de Login - Formulario y procesamiento
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', function () {
    // Procesamiento de login (se implementará en Avance 3)
    return redirect('/dashboard');
})->middleware('guest');

// Rutas de Registro - Formulario y procesamiento
Route::get('/register', function () {
    return view('auth.register');
})->name('register')->middleware('guest');

Route::post('/register', function () {
    // Procesamiento de registro (se implementará en Avance 3)
    return redirect('/login');
})->middleware('guest');

// ============================================
// 3. RUTAS PRIVADAS (Requieren autenticación)
// ============================================

Route::middleware('auth')->group(function () {
    
    // Dashboard del usuario
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Perfil del usuario
    Route::get('/perfil', function () {
        return view('user.profile');
    })->name('user.profile');
    
    // Mis órdenes / Carrito
    Route::get('/mis-ordenes', function () {
        return view('user.orders');
    })->name('user.orders');
    
    // Logout
    Route::post('/logout', function () {
        // Logout (se implementará en Avance 3)
        return redirect('/');
    })->name('logout');
});

// ============================================
// 4. REDIRECCIONES BÁSICAS
// ============================================

// Redireccionar usuario autenticado que intenta ir a home
Route::get('/home', function () {
    return redirect('/dashboard');
});

// ============================================
// NOTAS IMPORTANTES
// ============================================
/*
 * Middlewares utilizados:
 * - 'guest': Solo usuarios NO autenticados
 * - 'auth': Solo usuarios autenticados
 * 
 * Próximos avances:
 * - Avance 3: Implementar lógica de autenticación con controladores
 * - Avance 4: Agregar rutas de productos y carrito
 * - Avance 5: Rutas de administración
 * 
 * Cambios realizados en Avance 2:
 * 1. Agregadas rutas de login y registro
 * 2. Creadas rutas protegidas con middleware
 * 3. Añadidas redirecciones básicas
 * 4. Documentación completa de la estructura
 */
