<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\Category;
use App\Models\Changelog;
use App\Models\User;

class DashboardController extends Controller
{
    public $user, $changelog, $category, $api;

    public function view()
    {
        $user = User::all()->count();
        $changelog = Changelog::all()->count();
        $category = Category::all()->count();
        $api = Api::all()->count();
        return view("pages.admin.dashboard", compact('user', 'changelog', 'category', 'api'));
    }
}