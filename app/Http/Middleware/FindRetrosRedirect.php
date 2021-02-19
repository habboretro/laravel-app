<?php

namespace App\Http\Middleware;

use App\Services\FindRetrosService;
use Closure;
use Inertia\Inertia;
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

        if (!$findRetrosService->checkHasVoted()) {
            if ($request->isJson()) return Inertia::location($findRetrosService->getRedirectUri());
            return redirect($findRetrosService->getRedirectUri());
        }

        return $next($request);
    }
}
