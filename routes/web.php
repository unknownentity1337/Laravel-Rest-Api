<?php

use App\Http\Controllers\Admin\ApiController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ChangelogController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\User\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [DashboardController::class, 'view'])->name('user.dashboard');
Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {
    // Route Admin
    Route::prefix("admin")->middleware(['isAdmin'])->group(function () {
        Route::get('dashboard', [AdminDashboard::class, 'view'])->name('dashboard');

        // Route User
        Route::get('user', [UserController::class, "view"])->name('user');
        Route::view('user/new', "pages.admin.user.user-new")->name('user.new');
        Route::view('user/edit/{userId}', "pages.admin.user.user-edit")->name('user.edit');

        // Route Changelog
        Route::get('changelog', [ChangelogController::class, "view"])->name('changelog');
        Route::view('changelog/new', "pages.admin.changelog.changelog-new")->name('changelog.new');
        Route::view('changelog/edit/{changelogId}', "pages.admin.changelog.changelog-edit")->name('changelog.edit');

        // Route Category
        Route::get('category', [CategoryController::class, "view"])->name('category');
        Route::view('category/new', "pages.admin.category.category-new")->name('category.new');
        Route::view('category/edit/{categoryId}', "pages.admin.category.category-edit")->name('category.edit');

        // Route Category
        Route::get('api', [ApiController::class, "view"])->name('api');
        Route::view('api/new', "pages.admin.api.api-new")->name('api.new');
        Route::view('api/edit/{apiId}', "pages.admin.api.api-edit")->name('api.edit');
    });

    Route::group(["middleware" => ['auth:sanctum', 'verified', 'visitor']], function () {
        Route::get('dashboard', [DashboardController::class, 'view'])->name('user.dashboard');
        Route::get('changelog', [DashboardController::class, 'changelog'])->name('user.changelog');
        Route::get('pricing', [DashboardController::class, 'changelog'])->name('user.pricing');
    });
});
Route::get('testing', function (Request $request) {
    $header = $request->header('X-API-KEY');
    dd($header);
});

// Route::group(["middleware" => ['auth:sanctum']], function () {
//     Route::view('/dashboard', "dashboard")->name('dashboard');
//     Route::get('/user', [UserController::class, "index_view"])->name('user');
//     Route::view('/user/new', "pages.user.user-new")->name('user.new');
//     Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
// });