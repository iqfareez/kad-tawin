<?php

use App\Http\Controllers\KadKahwinController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fareez-najwa', [KadKahwinController::class, 'sanding'])->name('kenduri.sanding');
Route::get('/najwa-fareez', [KadKahwinController::class, 'tandang'])->name('kenduri.tandang');