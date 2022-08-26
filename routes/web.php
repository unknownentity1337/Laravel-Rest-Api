<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ChangelogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {
    // Route Admin
    Route::prefix("admin")->middleware(['isAdmin'])->group(function () {
        Route::view('dashboard', "dashboard")->name('dashboard');

        // Route User
        Route::get('user', [UserController::class, "view"])->name('user');
        Route::view('user/new', "pages.user.user-new")->name('user.new');
        Route::view('user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

        // Route Changelog
        Route::get('changelog', [ChangelogController::class, "view"])->name('changelog');
        Route::view('changelog/new', "pages.changelog.changelog-new")->name('changelog.new');
        Route::view('changelog/edit/{changelogId}', "pages.changelog.changelog-edit")->name('changelog.edit');

        // Route Docs
        Route::get('docs', [UserController::class, "index_view"])->name('docs');
        Route::view('user/docs', "pages.user.user-new")->name('docs.new');
        Route::view('user/edit/{docsId}', "pages.user.user-edit")->name('docs.edit');
    });
    Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {
        Route::get('dashboard', function () {
            return "User";
        });
    });
});

// Route::group(["middleware" => ['auth:sanctum']], function () {
//     Route::view('/dashboard', "dashboard")->name('dashboard');
//     Route::get('/user', [UserController::class, "index_view"])->name('user');
//     Route::view('/user/new', "pages.user.user-new")->name('user.new');
//     Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
// });