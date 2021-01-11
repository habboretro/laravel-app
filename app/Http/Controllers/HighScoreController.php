<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\UserCurrency;
use App\Models\UserSettings;
use Illuminate\Http\Request;

class HighScoreController extends Controller
{
    /**
     * Retrieve the view.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return Inertia::render('highscores', [
            'duckets' => UserCurrency::select('username', 'amount', 'look')
                ->join('users', 'users.id', '=', 'users_currency.user_id')
                ->where('rank', '<', config('habbo.default.min_rank'))
                ->where('type', 0)
                ->orderBy('amount', 'DESC')
                ->limit(6)
                ->get(),

            'diamonds' => UserCurrency::select('username', 'amount', 'look')
                ->join('users', 'users.id', '=', 'users_currency.user_id')
                ->where('rank', '<', config('habbo.default.min_rank'))
                ->where('type', 5)
                ->orderBy('amount', 'DESC')
                ->limit(6)
                ->get(),

            'credits' => User::select('username', 'credits as amount', 'look')
                ->where('rank', '<', config('habbo.default.min_rank'))
                ->orderBy('credits', 'DESC')
                ->limit(6)
                ->get(),

            'achievements' => UserSettings::select('username', 'achievement_score as amount', 'look')
                ->join('users', 'users.id', '=', 'users_settings.user_id')
                ->where('rank', '<', config('habbo.default.min_rank'))
                ->orderBy('achievement_score', 'DESC')
                ->limit(6)
                ->get(),

            'respects' => UserSettings::select('username', 'respects_received as amount', 'look')
                ->join('users', 'users.id', '=', 'users_settings.user_id')
                ->where('rank', '<', config('habbo.default.min_rank'))
                ->orderBy('respects_received', 'DESC')
                ->limit(6)
                ->get(),
        ]);
    }
}
