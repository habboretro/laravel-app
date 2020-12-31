<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Navigation extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if (Route::is('game')) return '';

        return view('components.navigation', [
            'user' => request()->user(),
        ]);
    }
}
