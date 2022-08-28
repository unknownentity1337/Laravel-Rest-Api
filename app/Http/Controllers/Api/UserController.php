<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function check_api(Request $request)
    {
        $user = User::where('api_key', $request->apikey)->first();
        if ($user) {
            $data = [
                "max_limit" => $user->limit_max,
                "count_limit" => $user->limit_count
            ];
        }
        return response()->json($data, 200);
    }
}