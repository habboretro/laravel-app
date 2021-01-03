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
        $bans = Ban::where(fn (Builder $query) => $query->where(['type' => 'ip', 'ip' => $request->ip()])->orWhere(['type' => 'account', 'user_id' => $request->user()->id ?? null])->orWhere(['type' => 'machine', 'machine_id' => $request->user()->machine_id ?? null]))
            ->count();

        if ($bans > 0) {
            return Redirect::route('banned');
        }

        return $next($request);
    }
}
