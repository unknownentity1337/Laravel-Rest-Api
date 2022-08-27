<?php

use App\Http\Controllers\Admin\ApiController;
use App\Http\Controllers\Admin\CategoryController;
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

        // Route Category
        Route::get('category', [CategoryController::class, "view"])->name('category');
        Route::view('category/new', "pages.category.category-new")->name('category.new');
        Route::view('category/edit/{categoryId}', "pages.category.category-edit")->name('category.edit');

        // Route Category
        Route::get('api', [ApiController::class, "view"])->name('api');
        Route::view('api/new', "pages.api.api-new")->name('api.new');
        Route::view('api/edit/{apiId}', "pages.api.api-edit")->name('api.edit');
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