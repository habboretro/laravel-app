<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Header extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if (Route::is('game')) return '';

        $userCount = User::where('online', '1')->count();

        return view('components.header', [
            'online_count' => $userCount,
        ]);
    }
}
