<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function view()
    {
        return view('pages.admin.user.user-data', [
            'user' => User::class
        ]);
    }
}