<?php

namespace App\Http\Middleware;

use App\Models\Total;
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
        $apikey = $request->header('X-API-KEY');
        if ($request->hasHeader('X-API-KEY')) {
            $key = User::getByKey($apikey);
            $valid = User::isValidKey($apikey);
            if ($valid) {
                $status = $key->status;
                $count = $key->limit_count;
                $max = $key->limit_max;
                $expired = $key->expired_at;
                $now = now()->toDateString();
                if (in_array($status, $stats)) {
                    if ($status == "Free") {
                        if ($count >= $max) {
                            return response()->json([
                                "status" => false,
                                "msg" => "Limit Key Reached , Please Wait Reset Every Day"
                            ], 500, ["Application/json"]);
                        } else {
                            User::where('api_key', $apikey)->update([
                                "limit_count" => DB::raw('limit_count+1')
                            ]);
                            Total::first()->update([
                                "total_request" => DB::raw('total_request+1'),
                                "today_request" =>  DB::raw('today_request+1')
                            ]);
                            return $next($request);
                        }
                    } else {
                        if ($now >= $expired) {
                            User::where('api_key', $apikey)->update([
                                "status" => "Free",
                                "is_expired" => 0,
                                "limit_max" => env("LIMIT_FREE_REQUEST")
                            ]);
                            return response()->json([
                                "status" => false,
                                "msg" => "Premium / Vip Acc Was Expired , Please Contact Admin For Renew , Premium / Vip User Features Now Cannot Be Used & Automatic Change Plan To Free"
                            ], 500, ["Application/json"]);
                        } else {
                            if ($count >= $max) {
                                return response()->json([
                                    "status" => false,
                                    "msg" => "Limit Key Reached , Please Wait Reset Every Day"
                                ], 500, ["Application/json"]);
                            } else {
                                User::where('api_key', $apikey)->update(["limit_count" => DB::raw('limit_count+1')]);
                                Total::first()->update([
                                    "total_request" => DB::raw('total_request+1'),
                                    "today_request" =>  DB::raw('today_request+1')
                                ]);
                                return $next($request);
                            }
                        }
                    }
                } else {
                    return response()->json([
                        "status" => false,
                        "msg" => "Only For Premium / Vip User"
                    ], 403, ["Application/json"]);
                }
            } else {
                return response()->json([
                    "status" => false,
                    "msg" => "Apikey Not Found"
                ], 404, ["Application/json"]);
            }
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Access Denied , X-API-KEY Parameter Cannot Be Empty"
            ], 403, ["Application/json"]);
        }
    }
}