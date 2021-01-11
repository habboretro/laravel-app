<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;

class ShowController extends Controller
{
    /**
     * Retrieve the view.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request, News $news): Response
    {
        $news->load('user');

        return Inertia::render('news/show', [
            'article' => new NewsResource($news),
        ]);
    }
}
