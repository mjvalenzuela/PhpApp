<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AplicacionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SolucionController;

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

//Acceder a la vista de Login
Route::get('/', function () {
    return view('auth.login');
});

//Quitar la seccion de recordar contraseña y registrarse
Auth::routes(['reset'=>false]);

//Al pasar la autenticacion debe acceder al Inicio
// Route::resource('inicio',InicioController::class)->middleware(('auth'));
// Route::get('/home', [InicioController::class, 'index'])->name('home');

// Route::group(['middleware'=>'auth'], function (){
//     Route::get('/', [InicioController::class, 'index'])->name('home');
// });

Route::resource('activo',ActivoController::class)->middleware(('auth'));
Route::get('/home', [ActivoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function (){
    Route::get('/', [ActivoController::class, 'index'])->name('home');
});

//Al aplicar la autenticacion debe acceder a Activos
// Route::resource('activo',ActivoController::class)->middleware(('auth'));
Route::resource('inicio',InicioController::class)->middleware(('auth'));
Route::resource('categoria',CategoriaController::class)->middleware(('auth'));
Route::resource('aplicacion',AplicacionController::class)->middleware(('auth'));
Route::resource('cliente',ClienteController::class)->middleware(('auth'));
Route::resource('solucion',SolucionController::class)->middleware(('auth'));
