<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User dashboard route
    Route::middleware(['verified', 'role:user'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    // Admin dashboard route
    Route::middleware(['verified', 'role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admindashboard');
        })->name('admindashboard');
    });

    // Doctor dashboard route
    Route::middleware(['verified', 'role:doctor'])->group(function () {
        Route::get('/doctor/dashboard', function () {
            return view('doctordashboard');
        })->name('doctordashboard');
    });
});

/* Route::middleware('auth')->group(function(){
    Route::get('/admin/dashboard',[AuthenticatedSessionController::class,'store'])->name('admindashboard');
}); */
require __DIR__.'/auth.php';
