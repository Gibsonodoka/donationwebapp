<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProgramSubscriptionController;
use App\Http\Controllers\DonationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Application web routes
|--------------------------------------------------------------------------
*/

// 🏠 Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// 📩 Join Program form — open to everyone
Route::post('/join-program', [ProgramSubscriptionController::class, 'store'])
    ->name('join-program.store');

// 🧑‍💻 Authenticated user routes
Route::middleware('auth')->group(function () {

    // User profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Dashboard
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');
    Route::get('/user/support', [UserDashboardController::class, 'support'])
    ->name('user.support');
});

// 🧠 Admin Dashboard (restricted by admin middleware)
Route::get('/admin', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.index');

// 🎯 Dynamic redirect — takes user to correct dashboard
Route::get('/dashboard', function () {
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login');
    }

    if ($user->role === 'admin') {
        return redirect()->route('admin.index');
    }

    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// 🧑 User Donations
Route::middleware('auth')->group(function () {
    Route::get('/donations', [DonationController::class, 'index'])->name('donations.index');
    Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
});

// 👑 Admin Donation Management
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/donations', [DonationController::class, 'adminIndex'])->name('admin.donations');
    Route::post('/admin/donations/{id}/confirm', [DonationController::class, 'confirm'])->name('admin.donations.confirm');
    Route::post('/admin/donations/{id}/reject', [DonationController::class, 'reject'])->name('admin.donations.reject');
});

// 🔐 Authentication routes (login/register/password reset)
require __DIR__.'/auth.php';
