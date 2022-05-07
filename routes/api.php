<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        return response()->json(['message' => 'API is working 🙂']);
    });

    Route::get('/{any}', function (Request $request) {
        return response()->json(['error' => 'Incorrect URL ❌'], 404);
    })->where('any', '.*');
});

Route::get('/{any}', function (Request $request) {
    return redirect('v1'.$request->getRequestUri());
})->where('any', '.*');