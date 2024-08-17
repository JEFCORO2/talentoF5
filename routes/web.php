<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PrincipalController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/{user:name}/perfil', [PerfilController::class, 'index'])->name('perfil.index')->defaults('vista', 'index')->middleware('auth');
Route::get('/{user:name}/editar-perfil', [PerfilController::class, 'index'])->name('perfil.editar')->defaults('vista', 'editar')->middleware('auth');
Route::post('/{user:name}/subir', [PerfilController::class, 'subir'])->name('perfil.subir');
Route::delete('/{user:name}/eliminarCV', [PerfilController::class, 'eliminar'])->name('perfil.eliminarCV');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

Route::get('/{user:name}/usuarios', [AdminController::class, 'index'])->name('admin.usuarios');
Route::post('/{user:name}/usuarios/actualizar/{id}', [AdminController::class, 'actualizar'])->name('admin.actualizar');
Route::delete('/{user:name}/usuarios/eliminar/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::post('/{user:name}/mensaje', [MensajeController::class, 'store'])->name('mensaje.store');

Route::get('/{user:name}/raven', [PruebaController::class, 'index'])->name('prueba.index')->defaults('vista', 'test');
Route::get('/{user:name}/video', [PruebaController::class, 'index'])->name('prueba.video')->defaults('vista', 'video');
Route::get('/{user:name}/color', [PruebaController::class, 'index'])->name('prueba.color')->defaults('vista', 'color');
Route::post('/{user:name}/subirVideo', [PruebaController::class, 'subirVideo'])->name('prueba.subir');
Route::post('/{user:name}/guardarNota', [PruebaController::class, 'guardarNota'])->name('prueba.nota');

Route::get('/{user:name}', [PrincipalController::class, 'index'])->name('principal.index')->middleware('auth');