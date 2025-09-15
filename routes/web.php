<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact');

// Additional pages
Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');
Route::post('/events/{event}/register', [App\Http\Controllers\EventController::class, 'register'])->name('events.register')->middleware('auth');

Route::get('/clubs', [App\Http\Controllers\ClubController::class, 'index'])->name('clubs.index');
Route::get('/clubs/{club}', [App\Http\Controllers\ClubController::class, 'show'])->name('clubs.show');

Route::get('/partners', [HomeController::class, 'partners'])->name('partners');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
