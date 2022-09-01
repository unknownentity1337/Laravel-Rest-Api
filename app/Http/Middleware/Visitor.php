<?php

namespace App\Http\Middleware;

use App\Models\Utils;
use Closure;
use Illuminate\Http\Request;

class Visitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        Utils::updateOrInsert([
            'ip_address' => request()->ip(), 'user_agent' => request()->userAgent()
        ]);
        return $next($request);
    }
}