<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AnimeController;
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

Route::get('check', [UserController::class, 'check_api'])->name('check_api');
Route::group(['middleware' => 'ApiLimit:Free,Vip,Premium'], function () {
    Route::get('anime', [AnimeController::class, 'otaku'])->name('api.otaku');
});