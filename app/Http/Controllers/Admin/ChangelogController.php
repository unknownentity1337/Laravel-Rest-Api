<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Changelog;

class ChangelogController extends Controller
{
    public function view()
    {
        return view('pages.changelog.changelog-data', [
            'changelog' => Changelog::class
        ]);
    }
}