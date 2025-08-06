<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\UsuariosController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/showCategoria/{categoria}', [ProductosController::class, 'showCategoria'] )->name('showCategoria');
Route::post('/productosBuscar', [ProductosController::class, 'buscar'])->name('productos-buscar');

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contactoEnviar', [ContactoController::class, 'enviar'])->name('contactoEnviar');

Route::get('/cuenta', [UsuariosController::class, 'index'])->name('cuenta');
Route::get('/olvidoPassword', [UsuariosController::class, 'olvidoPassword'])->name('olvidoPassword');
Route::post('/cuenta-registro', [UsuariosController::class, 'registro'])->name('cuenta-registro');
Route::post('/cuenta-acceso', [UsuariosController::class, 'acceso'])->name('cuenta-acceso');

Route::post('/olvidoPasswordEnvioCorreo', [UsuariosController::class, 'olvidoPasswordEnvioCorreo'])->name('olvidoPasswordEnvioCorreo');