<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function check_api(Request $request)
    {
        $user = User::where('api_key', $request->apikey)->first();
        if ($user) {
            $data['status'] = true;
            $data['msg'] = "Success";
            $data['data'] = [
                "username" => $user->name,
                "status" => $user->status,
                "expired" => $user->expired_at ? Carbon::parse($user->expired_at)->toDateString() : false,
                "max_limit" => $user->limit_max,
                "count_limit" => $user->limit_count
            ];
            return response()->json($data, 200, ['Application/json'], JSON_PRETTY_PRINT);
        } else {
            $data["status"] = false;
            $data["msg"] = "Api Key Not Found";
            return response()->json($data, 404, ['Application/json'], JSON_PRETTY_PRINT);
        }
    }
}