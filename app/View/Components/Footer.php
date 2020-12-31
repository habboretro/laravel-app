<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Footer extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if (Route::is('game')) return '';

        return view('components.footer', [
            'users' => User::inRandomOrder()->where('online', true)->limit(30)->get(),
        ]);
    }
}
