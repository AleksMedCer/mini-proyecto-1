<?php

// Rutas para Avance 1 - GoldenWind
// Desarrollado por: Julio, Oscar e Isacc

// Home/Welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Páginas estáticas - Oscar
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

// Rutas adicionales puede ser añadidas aquí para Avance 2 y siguiente
