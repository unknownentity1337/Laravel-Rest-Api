<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AnimeController;
use App\Http\Controllers\Api\DownloaderController;
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

// Free Api
Route::group(['middleware' => 'ApiLimit:Free'], function () {
    Route::prefix('downloader')->group(function () {
        Route::get('tiktok-downloader', [DownloaderController::class, 'tiktok_downloader'])->name('downloader.tiktok');
    });
});

// // Premium Api
// Route::group(['middleware' => 'ApiLimit:Free,Premium'], function () {
//     Route::get('anime', [AnimeController::class, 'otaku'])->name('api.otaku');
// });

// // Vip Api
// Route::group(['middleware' => 'ApiLimit:Free,Vip,Premium'], function () {
//     Route::get('anime', [AnimeController::class, 'otaku'])->name('api.otaku');
// });