<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function otaku(Request $request)
    {
        return response()->json(['param' => $request->q]);
    }
}