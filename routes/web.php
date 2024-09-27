<?php

use App\Http\Controllers\AutenticacionController;
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

Route::post('/iniciar-sesion/usuario', [AutenticacionController::class, 'iniciarSesion'])->name('iniciarSesion');
Route::post('/cerrar-sesion/usuario', [AutenticacionController::class, 'cerrarSesion'])->name('cerrarSesion');

// Rutas de carga y errores
Route::get('/cargando', function () {
    return view('cargando');
})->name('cargando');

Route::get('/error/403', function () {
    return view('error.403');
})->name('error.403');

Route::get('/error/404', function () {
    return view('error.404');
})->name('error.404');

Route::get('/error/401', function () {
    return view('error.401');
})->name('error.401');



Route::middleware(['auth', 'VerEstado'])->group(function () {

    Route::group(['prefix' => 'administrador', 'middleware' => ['SoloPorRol:Administrador']], function () {

        Route::get('/inicio', function () {
            return view('home.inicioAdministrador');
        })->name('inicio.dashboard_admin');
    });


    Route::group(['prefix' => 'veterinarios', 'middleware' => ['SoloPorRol:Veterinario']], function () {
        Route::get('/inicio', function () {
            return view('home.inicioVeterinario');
        })->name('inicio.dashboard_vet');
    });

    Route::group(['prefix' => 'test', 'middleware' => ['SoloPorRol:Test']], function () {
        Route::get('/inicio', function () {
            return view('home.inicioTest');
        })->name('inicio.dashboard_test');
    });
});
