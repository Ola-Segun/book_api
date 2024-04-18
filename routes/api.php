<?php

use App\Http\Controllers\Api\bookController;
use App\Http\Controllers\Api\ExternalBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/external-books', [ExternalBookController::class, 'index']);
// Route::get('/external-books', [ExternalBookController::class]);

Route::get('/v1/books', [bookController::class, 'index']);
Route::post('/v1/books', [bookController::class, 'store']);
Route::get('/v1/books/{id}', [bookController::class, 'show']);
Route::patch('/v1/books/{id}', [bookController::class, 'update']);
Route::delete('/v1/books/{id}', [bookController::class, 'destroy']);
// Route::delete('/v1/books/{id}/delete', [bookController::class, 'destroy']);
