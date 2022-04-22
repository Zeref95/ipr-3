<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        return response()->json(['message' => 'Api is working 🙂']);
    });
});

Route::get('/{any}', function () {
    return response()->json(['message' =>  'Wrong URL or method 🙁']);
})->where('any', '.*');


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
