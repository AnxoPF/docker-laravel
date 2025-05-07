<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/admin', function () {
        return view('admin');
    })->middleware(AdminMiddleware::class)->name('admin');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:cliente')->prefix('cliente')->name('cliente.')->group(function () {
        Route::resource('citas', App\Http\Controllers\Cliente\CitaController::class)->only(['index', 'create', 'store', 'show']);
    });

    Route::middleware('role:taller')->prefix('taller')->name('taller.')->group(function () {
        Route::resource('citas', App\Http\Controllers\Taller\CitaController::class);
    });
});

require __DIR__.'/auth.php';
