<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MatchController;

Route::middleware(['auth', 'guest.access'])->group(function () {
    Route::get('/', [MatchController::class, 'index'])->name('matches.index');
 


    Route::get('/dashboard', function () {
        return redirect()->route('matches.index');
    })->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
 
    Route::resource('teams', TeamController::class);

    
    Route::resource('players', PlayerController::class);

   
    Route::resource('matches', MatchController::class);
});


require __DIR__.'/auth.php';
