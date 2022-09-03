<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\Category;
use App\Models\Changelog;
use App\Models\Total;
use App\Models\User;
use App\Models\Utils;

class DashboardController extends Controller
{
    public function view()
    {
        $error = Api::where('status', 0)->count();
        $active = Api::where('status', 1)->count();
        $feature = Api::count();
        $user = User::count();
        $visitor = Utils::count();
        $req = Total::first();
        if (!$req) {
            Total::create(['total_request' => 0, 'today_request' => 0]);
        }
        return view("pages.user.dashboard", compact('error', 'active', 'feature', 'user', 'visitor', 'req'));
    }

    public function changelog()
    {
        $changelogs = Changelog::all()
            ->sortByDesc('created_at');
        return view("pages.user.changelog", compact('changelogs'));
    }

    public function all()
    {
        $all = Api::with(['category'])
            ->get();
        return view("pages.user.all-api", compact('all'));
    }

    public function pricing()
    {
        return view("pages.user.pricing");
    }

    public function category($category)
    {
        $c = Category::with(['api'])
            ->where('slug', $category)
            ->first();
        return view("pages.user.category", compact('c'));
    }
}