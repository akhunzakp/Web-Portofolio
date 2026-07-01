<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

// Public Landing Page
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');

// Secure Admin Panel Credentials Login
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Protected Admin Panel Group
Route::middleware([AdminAuth::class])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard (Main Overview & CRUD forms)
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Profile CRUD Update
    Route::post('/profile', [AdminController::class, 'profileUpdate'])->name('profile.update');

    // Projects CRUD
    Route::post('/projects', [AdminController::class, 'projectStore'])->name('projects.store');
    Route::put('/projects/{project}', [AdminController::class, 'projectUpdate'])->name('projects.update');
    Route::delete('/projects/{project}', [AdminController::class, 'projectDestroy'])->name('projects.destroy');

    // Skills CRUD
    Route::post('/skills', [AdminController::class, 'skillStore'])->name('skills.store');
    Route::put('/skills/{skill}', [AdminController::class, 'skillUpdate'])->name('skills.update');
    Route::delete('/skills/{skill}', [AdminController::class, 'skillDestroy'])->name('skills.destroy');
});
