<?php

namespace App\Http\Controllers;

use App\Models\News;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Resources\NewsCollection;

class IndexController extends Controller
{
    /**
     * Retrieve the view.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return Inertia::render('index', [
            'articles' => new NewsCollection(News::with('user')->latest()->limit(6)->get()),
        ]);
    }
}
