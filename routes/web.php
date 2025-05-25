<?php

use App\Http\Controllers\KadKahwinController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{slug}', [KadKahwinController::class, 'show'])
    ->where('slug', '[a-z\-]+')
    ->name('kenduri.show');
Route::post('/hantar-ucapan', [KadKahwinController::class, 'hantar_ucapan'])->name('hantar_ucapan.store');
Route::get('/{slug}/semua-ucapan', [KadKahwinController::class, 'semua_ucapan'])->name('semua_ucapan');
Route::post('/rsvp', [KadKahwinController::class, 'hantar_rsvp'])->name('rsvp.store');