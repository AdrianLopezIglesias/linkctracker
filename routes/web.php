<?php

use Illuminate\Support\Facades\Route;


Route::resource('links', App\Http\Controllers\LinkController::class);
Route::resource('linkstatistics', App\Http\Controllers\LinkStatisticController::class);

Route::post('l/create', [App\Http\Controllers\API\LinkAPIController::class, 'create']);
Route::get('l/{url}', [App\Http\Controllers\API\LinkAPIController::class, 'redirect']);
Route::get('e/{url}', [App\Http\Controllers\API\LinkStatisticAPIController::class, 'get']);
Route::put('l/{url}', [App\Http\Controllers\API\LinkAPIController::class, 'invalidate']);



