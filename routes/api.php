<?php

use App\Http\Controllers\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        return response()->json(['message' => 'API is working! Hello, '.(\auth('api')->user()->name ?? 'Anonim'). ' =)']);
    });

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/registration', [AuthController::class, 'registration']);
        Route::post('/login', [AuthController::class, 'login']);
    });

    Route::any('/{any}', function () {
        return response()->json(['error' => 'Incorrect Method =('], 404);
    })->where('any', '.*');
});

Route::any('/{any}', function () {
    return response()->json(['error' => 'Incorrect API Version =('], 404);
})->where('any', '.*');