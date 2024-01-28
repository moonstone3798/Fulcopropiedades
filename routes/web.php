<?php

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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::view('/inicio', 'inicio');
Route::view('/noticias', 'noticias');
Route::view('/tasacion', 'tasacion');
Route::view('/empresa', 'empresa');
Route::view('/nosotros', 'nosotros');

########################################################CRUD DE NOTICIAS

use App\Http\Controllers\NoticiaController;

Route::get('/noticias', [NoticiaController::class, 'noticias']);
Route::get('/noticia/{id}', [NoticiaController::class, 'mostrar']);
Route::middleware(['auth:sanctum', 'verified'])->get('/adminNoticias', [NoticiaController::class, 'index'])->name('adminNoticias');
Route::middleware(['auth:sanctum', 'verified'])->get('/agregarNoticia', [NoticiaController::class, 'create'])->name('agregarNoticia');
Route::middleware(['auth:sanctum', 'verified'])->post('/agregarNoticia', [NoticiaController::class, 'store'])->name('agregarNoticia');
Route::middleware(['auth:sanctum', 'verified'])->get('/modificarNoticia/{id}', [NoticiaController::class, 'edit'])->name('modificarNoticia');
Route::middleware(['auth:sanctum', 'verified'])->put('/modificarNoticia', [NoticiaController::class, 'update'])->name('modificarNoticia');
Route::middleware(['auth:sanctum', 'verified'])->get('/eliminarNoticia/{id}', [NoticiaController::class, 'confirmar'])->name('eliminarNoticia');
Route::middleware(['auth:sanctum', 'verified'])->delete('/eliminarNoticia', [NoticiaController::class, 'destroy'])->name('eliminarNoticia');



########################################################CRUD DE INMUEBLES

use App\Http\Controllers\InmuebleController;

Route::get('/alquiler', [InmuebleController::class, 'alquiler']);
Route::get('/mostrarpropiedad/{id}', [InmuebleController::class, 'mostrarpropiedad']);
Route::get('/ventas', [InmuebleController::class, 'ventas']);
Route::get('/inicio', [InmuebleController::class, 'inicio']);
Route::get('/', [InmuebleController::class, 'inicio']);
Route::get('/mostrarDestacadas/{id}', [InmuebleController::class, 'mostrarDestacadas']);
Route::middleware(['auth:sanctum', 'verified'])->get('/adminInmuebles', [InmuebleController::class, 'index'])->name('adminInmuebles');
Route::middleware(['auth:sanctum', 'verified'])->get('/agregarInmueble', [InmuebleController::class, 'create'])->name('agregarInmueble');
Route::middleware(['auth:sanctum', 'verified'])->post('/agregarInmueble', [InmuebleController::class, 'store'])->name('agregarInmueble');
Route::middleware(['auth:sanctum', 'verified'])->get('/modificarInmueble/{id}', [InmuebleController::class, 'edit'])->name('modificarInmueble');
Route::middleware(['auth:sanctum', 'verified'])->put('/modificarInmueble', [InmuebleController::class, 'update'])->name('modificarInmueble');
Route::middleware(['auth:sanctum', 'verified'])->get('/eliminarInmueble/{id}', [InmuebleController::class, 'confirmar'])->name('eliminarInmueble');
Route::middleware(['auth:sanctum', 'verified'])->delete('/eliminarInmueble', [InmuebleController::class, 'destroy'])->name('eliminarInmueble');