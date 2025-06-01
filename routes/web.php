<?php

use App\Http\Controllers\CalendarInvitationController;
use App\Http\Controllers\KadKahwinController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('calendar')->group(function () {
    Route::get('/get-google-link/{slug}', [CalendarInvitationController::class, 'getGoogleCalendar'])->name('calendar.google');
    Route::get('/get-yahoo-link/{slug}', [CalendarInvitationController::class, 'getYahooCalendar'])->name('calendar.yahoo');
    Route::get('/get-outlook-link/{slug}', [CalendarInvitationController::class, 'getOutlookCalendar'])->name('calendar.outlook');
    Route::get('/get-ics/{slug}', [CalendarInvitationController::class, 'downloadIcs'])->name('calendar.ics');
});

// The route below is like a catch-all for all routes, which can cause conflict with
// the other routes. So, keep it at the bottom.
Route::get('/{slug}', [KadKahwinController::class, 'show'])
    ->where('slug', '[a-z\-]+')
    ->name('kenduri.show');
Route::post('/hantar-ucapan', [KadKahwinController::class, 'hantar_ucapan'])->name('hantar_ucapan.store');
Route::get('/{slug}/semua-ucapan', [KadKahwinController::class, 'semua_ucapan'])->name('semua_ucapan');
Route::post('/rsvp', [KadKahwinController::class, 'hantar_rsvp'])->name('rsvp.store');
