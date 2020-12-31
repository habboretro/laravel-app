<?php

namespace App\Http\Controllers;

use App\Models\News;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class MeController extends Controller
{
    /**
     * Retrieve the view.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return Inertia::render('me', [
            'articles' => News::with('user')->latest()->limit(4)->get(),
        ]);
    }
}
