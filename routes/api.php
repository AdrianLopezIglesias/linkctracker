<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('l/create', [App\Http\Controllers\API\LinkAPIController::class, 'create']);
Route::get('l/{url}', [App\Http\Controllers\API\LinkAPIController::class, 'redirect']);


Route::resource('link_statistics', App\Http\Controllers\API\LinkStatisticAPIController::class);
