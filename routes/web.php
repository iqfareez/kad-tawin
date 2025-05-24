<?php

use App\Http\Controllers\KadKahwinController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/fareez-najwa', [KadKahwinController::class, 'tandang'])->name('kenduri.tandang');
Route::post('/fareez-najwa/hantar-ucapan', [KadKahwinController::class, 'hantar_ucapan'])->name('hantar_ucapan.store');
Route::get('/fareez-najwa/semua-ucapan', [KadKahwinController::class, 'semua_ucapan'])->name('semua_ucapan');
Route::get('/najwa-fareez', [KadKahwinController::class, 'sanding'])->name('kenduri.sanding');