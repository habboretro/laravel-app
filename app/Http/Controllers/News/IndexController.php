<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return Inertia::render('news/index', [
            'articles' => News::with('user')->latest()->paginate(),
        ]);
    }
}
