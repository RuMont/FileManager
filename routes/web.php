<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rutas de Auth Controller (Login)
Route::controller(AuthController::class)->group(function () {
    Route::post('auth', 'authenticate');
    Route::middleware('auth')->get('logout', 'logout');
});

// Ruta principal
Route::get('/', function () {
    if (Auth::user()) {
        return redirect()->route('dashboard');
    } else {
        return view('home');
    }
})->name('login');

// Ruta de tablero, generador de ficheros
Route::middleware('auth')->get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Para poder hacer cuentas hay que estar logeado y ser administrador
Route::middleware('auth')->controller(UsersController::class)->group(function () {
    Route::get('register', 'index')->name('register');
    Route::post('register', 'store');
});

Route::middleware('auth')->post('files', [DashboardController::class, 'request']);





