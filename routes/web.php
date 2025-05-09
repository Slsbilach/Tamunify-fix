<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterVisitorController;

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/check-in', function () {
    return view('check-in');
})->name('checkin');
Route::get('/one-time', [RegisterVisitorController::class, 'registerOneTime'])->name('register.one-time');
Route::get('/recurring', [RegisterVisitorController::class, 'registerRecurring'])->name('register.recurring');
Route::get('/internship', [RegisterVisitorController::class, 'registerInternship'])->name('register.internship');

Route::get('/one-time/success', [RegisterVisitorController::class, 'successOneTime'])->name('success.one-time');
Route::get('/internship/success', [RegisterVisitorController::class, 'successInternship'])->name('success.internship');

Route::post('/one-time', [RegisterVisitorController::class, 'storeOneTime'])->name('store.one-time');
Route::post('/internship', [RegisterVisitorController::class, 'storeInternship'])->name('store.internship');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';