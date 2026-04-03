<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::middleware('throttle:5,1')
        ->post('/login', [AuthController::class, 'login']);
        
    Route::middleware(['auth:sanctum', 'verified'])
        ->get('/verified', function () {
            return 'ok';
        });

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/removeAll', [AuthController::class, 'removeAll']);
        Route::patch('/changePass', [AuthController::class, 'changePass']);
        Route::patch('/changeProfile', [AuthController::class, 'changeProfile']);
    });
});

Route::prefix('restapi')->group(function () {
    Route::apiResource('notes', NoteController::class);
    Route::get('notes/stats/status', [NoteController::class, 'statsByStatus']);
    Route::patch('notes/actions/archive-old-drafts', [NoteController::class, 'archiveOldDrafts']);
    Route::get('users/{user}/notes', [NoteController::class, 'userNotesWithCategories']);
    Route::get('notes-actions/search', [NoteController::class, 'search']);
    Route::post('/notes/{id}/duplicate', [NoteController::class, 'duplicate']);
    Route::patch('notes/{id}/publish', [NoteController::class, 'publish']);
    Route::patch('notes/{id}/archive', [NoteController::class, 'archive']);
    Route::patch('notes/{id}/pin', [NoteController::class, 'pin']);
    Route::patch('notes/{id}/unpin', [NoteController::class, 'unpin']);

    Route::apiResource('notes.tasks', TaskController::class)->scoped();
});

Route::prefix('restapicat')->group(function () {
    Route::apiResource('categories', CategoryController::class);
});