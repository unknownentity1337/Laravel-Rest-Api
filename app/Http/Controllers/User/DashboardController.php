<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Api;
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
        return view("pages.user.dashboard", compact('error', 'active', 'feature', 'user', 'visitor', 'req'));
    }

    public function changelog()
    {
        return view("pages.user.changelog");
    }
}