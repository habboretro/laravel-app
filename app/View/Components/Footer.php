<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;
use App\Http\Resources\UserCollection;

class Footer extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
