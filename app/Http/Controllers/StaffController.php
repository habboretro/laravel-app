<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;

class StaffController extends Controller
{
    /**
     * Retrieve the view.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return Inertia::render('staff', [
            'users' => new UserCollection(User::where('rank', '>=', config('habbo.default.min_rank'))
                ->with('permissions')
                ->orderBy('rank', 'DESC')
                ->get()),
        ]);
    }
}
