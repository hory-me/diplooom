<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('registration');

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'auth'])->name('authorization');

Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');



