<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Api;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function view()
    {
        return view('pages.api.api-data', [
            'api' => Api::class
        ]);
    }
}