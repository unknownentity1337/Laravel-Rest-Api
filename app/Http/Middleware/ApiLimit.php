<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Closure;

class ApiLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$stats)
    {
        $apikey = $request->apikey;
        $key = User::where('api_key', $apikey)->first();
        $status = $key->status;
        $count = $key->limit_count;
        $max = $key->limit_max;
        $expired = $key->expired_at;
        $now = now()->toDateString();
        if ($apikey == "") {
            return response()->json(
                [
                    "status" => false,
                    "msg" => "Fill Apikey Parameter"
                ],
                400
            );
        } else {
            if ($key) {
                if (in_array($status, $stats)) {
                    if ($status == "Free") {
                        if ($count >= $max) {
                            return response()->json(
                                [
                                    "status" => false,
                                    "msg" => "Limit Key Reached , Please Wait Until Reset By System"
                                ],
                                500
                            );
                        } else {
                            User::where('api_key', $apikey)->update(
                                [
                                    "limit_count" => DB::raw('limit_count+1')
                                ]
                            );
                            return $next($request);
                        }
                    } else {
                        if ($now >= $expired) {

                            User::where('api_key', $apikey)->update(
                                [
                                    "status" => "Free",
                                    "is_expired" => 0,
                                    "limit_max" => env("LIMIT_FREE_REQUEST")
                                ]
                            );

                            return response()->json(
                                [
                                    "status" => false,
                                    "msg" => "Premium / Vip Acc Was Expired , Please Contact Admin For Renew , Premium / Vip User Features Now Cannot Be Used & Automatic Change Plan To Free"
                                ],
                                500
                            );
                        } else {
                            if ($count >= $max) {
                                return response()->json(
                                    [
                                        "status" => false,
                                        "msg" => "Limit Key Reached , Please Wait Until Reset By System"
                                    ],
                                    500
                                );
                            } else {
                                User::where('api_key', $apikey)->update(
                                    [
                                        "limit_count" => DB::raw('limit_count+1')
                                    ]
                                );
                                return $next($request);
                            }
                        }
                    }
                } else {
                    return response()->json(
                        [
                            "status" => false,
                            "msg" => "Only For Premium / Vip User"
                        ],
                        403
                    );
                }
            } else {
                return response()->json(
                    [
                        "status" => false,
                        "msg" => "Key Not Found"
                    ],
                    404
                );
            }
        }
    }
}