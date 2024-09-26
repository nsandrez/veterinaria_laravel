<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('/iniciar-sesion', function () {
    return view('auth.iniciarSesion');
})->name('iniciar_sesion');
