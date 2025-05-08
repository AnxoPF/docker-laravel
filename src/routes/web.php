<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ClienteMiddleware;
use App\Http\Middleware\TallerMiddleware;

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/dashboard', function () {
    return redirect()->route('citas.index');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/users', UserController::class)->middleware(TallerMiddleware::class);
});

Route::middleware(['auth', ClienteMiddleware::class])->group(function () {
    Route::get('/nueva-cita', [CitaController::class, 'create'])->name('citas.create');
    Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');
    Route::get('/citas/{id}/ver', [CitaController::class, 'show'])->name('citas.show');
});

Route::middleware(['auth', TallerMiddleware::class])->group(function () {
    Route::get('/citas/{id}/ver', [CitaController::class, 'show'])->name('citas.show');
    Route::get('/citas/{id}', [CitaController::class, 'edit'])->name('citas.modificar-cita');
    Route::put('/citas/{id}', [CitaController::class, 'update'])->name('citas.update');
    Route::delete('/citas/{id}', [CitaController::class, 'destroy'])->name('citas.eliminar-cita');
    
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');
});

require __DIR__.'/auth.php';
