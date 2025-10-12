<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

// Frontend
Route::get('/', [ProjectController::class, 'index'])->name('home');

// Admin login/logout
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin project CRUD
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function() {
    Route::resource('projects', AdminProjectController::class);
});
