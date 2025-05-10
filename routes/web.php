<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
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
Route::get('/recurring/success', [RegisterVisitorController::class, 'successRecurring'])->name('success.recurring');

Route::post('/one-time', [RegisterVisitorController::class, 'storeOneTime'])->name('store.one-time');
Route::post('/internship', [RegisterVisitorController::class, 'storeInternship'])->name('store.internship');
Route::post('/recurring', [RegisterVisitorController::class, 'storeRecurring'])->name('store.recurring');


Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/get/visitor/{id}', [DashboardController::class, 'getVisitor'])->name('dashboard.getVisitor');
    Route::post('/export', [DashboardController::class, 'export'])->name('dashboard.export');
    Route::post('/update-status/{id}', [DashboardController::class, 'updateStatus']);
    Route::delete('/destroy/{visitor}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
    Route::post('/process-qr-code', [DashboardController::class, 'process']);



    Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index');
    Route::post('/notifications/read', function () {
        Auth::user()->unreadNotifications->markAsRead();
        return back()->with('success', 'Semua notifikasi telah ditandai sebagai sudah dibaca.');
    })->name('notifications.markAsRead');

    Route::resource('/admin', AdminController::class)->except('show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';