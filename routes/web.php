<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/check-in', function () {
    return view('check-in');
});
Route::get('/register/internship', function () {
    return view('register.internship');
});
Route::get('/register/recurring', function () {
    return view('register.recurring');
});
Route::get('/register/one-time', function () {
    return view('register.one-time');
});

Route::view('/internship/success', 'register.success.internship')->name('internship.success');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
