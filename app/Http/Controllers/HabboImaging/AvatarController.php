<?php

namespace App\Http\Controllers\HabboImaging;

use Illuminate\Http\Request;
use App\Services\HabboService;
use App\Http\Controllers\Controller;

class AvatarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param HabboService $habboService
     * @return void
     */
    public function __invoke(Request $request, HabboService $habboService)
    {
        $avatar = $habboService->getAvatar([
            'figure' => $request->get('figure', $request->user()->look ?? ''),
            'direction' => $request->get('direction', 3),
            'head_direction' => $request->get('head_direction', 3),
            'action' => $request->get('action'),
            'gesture' => $request->get('gesture', 'sml'),
            'headonly' => $request->get('headonly', false),
        ]);

        return response($avatar)
            ->header('Content-type', 'image/png');
    }
}
