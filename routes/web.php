<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\CourtController as AdminCourtController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ExportController as AdminExportController;
use App\Models\Court;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/lapangan', function () {
    $courts = Court::all();
    return view('courts', compact('courts'));
});

Route::get('/boking', [BookingController::class, 'index'])->name('booking.index');
Route::post('/boking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/jadwal', function () {
    return view('schedule');
})->name('schedule');

Route::get('/kontak', function () {
    return view('contact');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
    Route::post('/admin/bookings/{id}/confirm', [AdminBookingController::class, 'confirm'])->name('admin.bookings.confirm');
    Route::post('/admin/bookings/{id}/cancel', [AdminBookingController::class, 'cancel'])->name('admin.bookings.cancel');

    Route::resource('admin/courts', AdminCourtController::class)->names([
        'index' => 'admin.courts.index',
        'create' => 'admin.courts.create',
        'store' => 'admin.courts.store',
        'edit' => 'admin.courts.edit',
        'update' => 'admin.courts.update',
        'destroy' => 'admin.courts.destroy',
    ]);

    Route::resource('admin/users', AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);

    // Proper routes for other menus
    Route::get('/admin/finance', function () { return view('admin.finance'); })->name('admin.finance');
    Route::get('/admin/reports', function () { return view('admin.reports'); })->name('admin.reports');
    Route::get('/admin/settings', function () { return view('admin.settings'); })->name('admin.settings');

    // Export Routes
    Route::get('/admin/export/csv', [AdminExportController::class, 'exportBookingsCsv'])->name('admin.export.csv');
});
