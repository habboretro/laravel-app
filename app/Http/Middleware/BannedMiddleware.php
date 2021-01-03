<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Ban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder;

class BannedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ips = Ban::where('type', 'ip')
            ->where('ip', $request->ip())
            ->count();

        $accounts = Ban::where('type', 'account')
            ->where('user_id', $request->user()->id ?? null)
            ->count();

        if ($ips > 0 || $accounts > 0) {
            return Redirect::route('banned');
        }

        return $next($request);
    }
}
