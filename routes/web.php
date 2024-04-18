<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;

// Route::get('/books', function () {
//     return view('books.index');
// });

Route::get('books', [BookController::class, 'index']);
Route::get('books/create', [BookController::class, 'create']);
Route::post('books/create', [BookController::class, 'store']);
Route::get('books/{id}/edit', [BookController::class, 'edit']);
Route::put('books/{id}/edit', [BookController::class, 'update']);
Route::get('books/{id}/delete', [BookController::class, 'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
