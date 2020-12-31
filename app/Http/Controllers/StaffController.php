<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

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
            'users' => User::where('rank', '>=', 3)
                ->orderBy('rank', 'DESC')
                ->get(),
        ]);
    }
}
