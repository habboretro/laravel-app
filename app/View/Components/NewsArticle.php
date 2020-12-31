<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NewsArticle extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(object $article)
    {
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.news-article', [
            'article' => $this->article,
        ]);
    }
}
