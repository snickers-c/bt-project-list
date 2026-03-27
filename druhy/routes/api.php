<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

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