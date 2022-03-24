<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    // Si el usuario se ha logeado previamente, no tiene que volver a logearse
    // Funciona con sesiones
    if (Auth::user()) {
        return redirect()->route('dashboard');
    } else {
        return view('home');
    }
    // name('login') se debe poner donde esté el formulario de logeo
})->name('login');

// Rutas de Auth Controller (Login)
Route::controller(AuthController::class)->group(function () {
    Route::post('auth', 'authenticate');
    Route::middleware('auth')->get('logout', 'logout');
});

// Para poder hacer cuentas hay que estar logeado y ser administrador
// Para crear una cuenta se puede usar bcrypt online para hashear las passwords
// Las cuentas admin solo se crean con un user admin o con phpmyadmin
Route::middleware('auth')->controller(UsersController::class)->group(function () {
    Route::get('register', 'index')->name('register');
    Route::post('register', 'store');
});

// Rutas del dashboard
Route::middleware('auth')->controller(DashboardController::class)->prefix('dashboard')->group(function () {
    Route::get('/', 'index')->name('dashboard');
    // Generación de archivos, se llama por AJAX
    Route::post('files', 'request');
});





