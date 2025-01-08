<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', \App\Http\Controllers\Api\Auth\LoginCotroller::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



//dashboard route
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
   
    Route::apiResources([
        
    ]);
    
});

//frontend route
Route::prefix('frontend')->group(function () {
    
});

Route::get('/storage', fn() => \Illuminate\Support\Facades\Artisan::call('storage:link'));
