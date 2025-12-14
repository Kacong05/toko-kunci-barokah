<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NotificationController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/pemesanan', [PemesananController::class, 'index'])
        ->middleware(['verified'])
        ->name('pemesanan.index');

    Route::post('/pemesanan', [PemesananController::class, 'store'])
        ->middleware(['verified'])
        ->name('pemesanan.store');

    Route::get('/rating', [RatingController::class, 'index'])
        ->middleware(['verified'])
        ->name('rating.index');
    Route::post('/rating', [RatingController::class, 'store'])
        ->middleware(['verified'])
        ->name('rating.store');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    // Admin Routes
    Route::middleware(['verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
        Route::patch('/orders/{order}', [AdminController::class, 'updateOrderStatus'])->name('orders.update');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/ratings', [AdminController::class, 'ratings'])->name('ratings');
        Route::delete('/ratings/{rating}', [AdminController::class, 'deleteRating'])->name('ratings.delete');
        Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts');
        Route::delete('/contacts/{contact}', [AdminController::class, 'deleteContact'])->name('contacts.delete');
    });
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // ... existing routes ...

    // Notification routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.delete');
    Route::get('/notifications/unread-count', [NotificationController::class, 'getUnreadCount'])->name('notifications.unread-count');
});

require __DIR__.'/auth.php';
