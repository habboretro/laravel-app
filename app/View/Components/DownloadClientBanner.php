<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class DownloadClientBanner extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if (Route::is('game')) return '';
        if (request()->header('User-Agent') === 'Game Client') return '';

        return view('components.download-client-banner');
    }
}
