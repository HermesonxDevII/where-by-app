<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\{ MeetingsController };

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/meetings/history', [MeetingsController::class, 'history'])->name('meetings.history');
    Route::get('/meetings/recovery-history', [MeetingsController::class, 'recovery_history'])->name('meetings.recovery_history');
    Route::get('/meetings/info/{meeting}', [MeetingsController::class, 'info'])->name('meetings.info');
    Route::post('/meetings/change-color/{meeting}', [MeetingsController::class, 'change_color'])->name('meetings.change_color');
    Route::resource('/meetings', MeetingsController::class);
});

require __DIR__.'/auth.php';
