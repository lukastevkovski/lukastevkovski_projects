
<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/form', [UserController::class, 'showForm'])->name('form');
Route::post('/form', [UserController::class, 'submitForm'])->name('form.submit');
Route::get('/info', [UserController::class, 'showInfo'])->name('info');
Route::post('/clear-session', [UserController::class, 'clearSession'])->name('clear.session');