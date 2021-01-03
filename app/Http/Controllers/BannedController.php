<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BannedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $ipBan = Ban::where('type', 'ip')
            ->where('ip', $request->ip())
            ->first();

        $accountBan = Ban::where('user_id', $request->user()->id ?? null)
            ->first();

        return Inertia::render('banned', [
            'ban' => $ipBan ?: $accountBan,

            'chatlogs' => $request->user()
                ->chatlogs()
                ->orderBy('timestamp', 'DESC')
                ->limit(10)
                ->get(),
        ]);
    }
}
