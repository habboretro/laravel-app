<?php

namespace App\View\Components;

use App\Models\News;
use Illuminate\View\Component;

class NewsArticles extends Component
{
    /**
     * Limit of news articles
     */
    protected int $limit = 3;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $limit = 3)
    {
        $this->limit = $limit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.news-articles', [
            'articles' => News::with('user')
                ->latest()
                ->limit($this->limit)
                ->get(),
        ]);
    }
}
