<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', function () {
        return response()->json(['message' => 'Hello '. Auth::id()]);
    });
});

Route::get('/{any}', function () {
    return response()->json(['message' =>  'Wrong URL or method 🙁']);
})->where('any', '.*');



