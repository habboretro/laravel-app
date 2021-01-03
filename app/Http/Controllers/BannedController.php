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
        return Inertia::render('banned', [
            'ban' => Ban::where(fn (Builder $query) => $query->where(['type' => 'ip', 'ip' => $request->ip()])->orWhere(['type' => 'account', 'user_id' => $request->user()->id ?? null])->orWhere(['type' => 'machine', 'machine_id' => $request->user()->machine_id ?? null]))
                ->orderBy('timestamp', 'DESC')
                ->first(),

            'chatlogs' => $request->user()
                ->chatlogs()
                ->orderBy('timestamp', 'DESC')
                ->limit(10)
                ->get(),
        ]);
    }
}
