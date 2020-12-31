<?php

namespace App\Http\Middleware;

use App\Services\FindRetrosService;
use Closure;
use Illuminate\Http\Request;

class FindRetrosRedirect
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
        $findRetrosService = new FindRetrosService;
        if (!$findRetrosService->checkHasVoted()) return redirect($findRetrosService->getRedirectUri());
        return $next($request);
    }
}
