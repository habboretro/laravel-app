<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class Navigation extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navigation', [
            'onlineCount' => User::where('online', '1')
                ->count(),
        ]);
    }
}
