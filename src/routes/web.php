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

require __DIR__.'/auth.php';
