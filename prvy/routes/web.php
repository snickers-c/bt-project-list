<?php

// use App\Http\Controllers\ExampleController;
// use App\Http\Controllers\TestController;
// use App\Http\Controllers\FormController;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function () {
//     return 'Hello worl!';
// });

// Route::get('/controller', [TestController::class, "retrieve"]);
// Route::get('/name', [TestController::class, "getName"]);

// Route::get('profile/create', [FormController::class, "showForm"]);
// Route::post('profile/result', [FormController::class, "processForm"]);

// Route::prefix('profile')->group(function () {
//     Route::get('/create', [FormController::class, "showForm"]);
//     Route::post('/result', [FormController::class, "processForm"]);
// }); 
Route::redirect('/', 'example/create');

Route::prefix('example')->group(function () {
    Route::get('/create', function () {
        return view("example.form");
    });
    Route::post('/result', function (HttpRequest $request) {
        $number = $request->input("number");

        $data = [$number, $number];

        for ($i = 0; $i < 8; $i++) {
            $data[] = $data[$i] + $data[$i+1];
        }

        return view("example.show", [
            'data' => $data,
        ]);
    });
});

// Route::prefix('example')->group(function () {
//     Route::get('/create', [ExampleController::class, "showForm"]);
//     Route::post('/result', [ExampleController::class, "processForm"]);
// });
            