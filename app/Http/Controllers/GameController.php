<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Retrieve the view.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $user = request()->user();
        $user->auth_ticket = sprintf('HABBO-%s', Str::random(20));
        $user->save();

        return Inertia::render('game', [
            'habbo_swf' => sprintf('%s/%s/%s?v=2', config('habbo.site.cpath'), config('habbo.client.external_base'), config('habbo.client.swf')),
            'variables' => [
                'client.allow.cross.domain' => 1,
                'client.notify.cross.domain' => 0,
                'connection.info.host' => config('habbo.client.host'),
                'connection.info.port' => config('habbo.client.port'),
                'site.url' => config('habbo.site.cpath'),
                'url.prefix' => config('habbo.site.cpath'),
                'client.reload.url' => route('me'),
                'client.fatal.error.url' => route('me'),
                'client.connection.failed.url' => route('me'),
                'external.override.texts.txt' => sprintf('%s/%s', config('habbo.site.cpath'), config('habbo.client.external_override_texts')),
                'external.override.variables.txt' => sprintf('%s/%s', config('habbo.site.cpath'), config('habbo.client.external_override_variables')),
                'external.variables.txt' => sprintf('%s/%s', config('habbo.site.cpath'), config('habbo.client.external_variables')),
                'external.texts.txt' => sprintf('%s/%s', config('habbo.site.cpath'), config('habbo.client.external_texts')),
                'external.figurepartlist.txt' => sprintf('%s/%s', config('habbo.site.cpath'), config('habbo.client.external_figurepartlist')),
                'flash.dynamic.avatar.download.configuration' => sprintf('%s/%s', config('habbo.site.cpath'), config('habbo.client.external_figuremap')),
                'productdata.load.url' => sprintf('%s/%s', config('habbo.site.cpath'), config('habbo.client.external_productdata')),
                'furnidata.load.url' => sprintf('%s/%s?v=1', config('habbo.site.cpath'), config('habbo.client.external_figuredata')),
                'sso.ticket' => $user->auth_ticket,
                'account_id' => $user->id,
                'client.starting' => sprintf('%s loading....', config('habbo.site.shortname')),
                'ads.domain' => '',
                'processlog.enabled' => 0,
                'flash.client.url' => sprintf('%s/%s/', config('habbo.site.cpath'), config('habbo.client.external_base')),
                'flash.client.origin' => 'popup',
            ],
            'params' => [
                'base' => sprintf('%s/%s/', config('habbo.site.cpath'), config('habbo.client.external_base')),
                'allowScriptAccess' => 'always',
                'menu' => false,
                'wmode' => 'opaque'
            ]
        ]);
    }
}
