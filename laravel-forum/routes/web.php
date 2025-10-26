<?php
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DiscussionController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('discussions', DiscussionController::class)->only(['create', 'store', 'show']);
    Route::post('discussions/{discussion}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::middleware(['admin'])->group(function () {
        Route::get('admin/discussions/pending', [AdminController::class, 'pending'])->name('admin.pending');
        Route::put('admin/discussions/{discussion}/approve', [AdminController::class, 'approve'])->name('admin.approve');
    });
});

require __DIR__.'/auth.php';