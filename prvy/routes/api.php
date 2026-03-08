<?php

use App\Http\Controllers\BookApiController;
use App\Http\Controllers\BookRestApiController;
use App\Http\Controllers\BookRestController;
use App\Http\Controllers\BookRpcController;
use App\Http\Controllers\BookSacController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Time\TimeApiController;
use App\Http\Controllers\Time\TimeRpcController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
// Route::get('/hello', [TestController::class, "action2"]);

Route::prefix('rpc/books/{id}')->group( function () {
  Route::post('/borrow', [BookRpcController::class, 'borrowBook']);
  Route::post('/return', [BookRpcController::class, 'returnBook']);
});
  
Route::get('sac/books/{id}', BookSacController::class);

Route::prefix('rest')->group(function () {
  Route::resource('books', BookRestController::class);
});

Route::prefix('restapi')->group(function () {
  Route::apiResource('books', BookApiController::class);
});

Route::prefix('rpctime')->group(function () {
  Route::get('get-time', [TimeRpcController::class, 'getTime']);
});
  
Route::prefix('apitime')->group(function () {
  Route::apiResource('time', TimeApiController::class);
});