<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Services\RconService;
use Illuminate\Support\Facades\Redirect;

class PurchaseVipController extends Controller
{
    /**
     * List of VIP Types.
     *
     * @return array
     */
    protected array $vips = [
        [
            'type' => 'standard',
            'rank' => 2,
            'price' => 10,
        ],
        [
            'type' => 'diamond',
            'rank' => 3,
            'price' => 20,
        ],
    ];

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, string $type, RconService $rcon)
    {
        $vip = collect($this->vips)
            ->where('type', $type)
            ->first();

        if (is_null($vip)) {
            return Redirect::route('store')->with('error', 'That VIP rank does not exist.');
        }


        if ($request->user()->balance - $vip['price'] < 0) {
            return Redirect::route('store')->with('error', 'You do not have enough balance in your acccount.');
        }

        $request->user()->update([
            'balance' => $request->user()->balance - $vip['price'],
            'rank' => $vip['rank'],
        ]);

        $rcon->setRank($request->user(), Permission::find($vip['rank']));

        return Redirect::route('store')->with('success', 'You purchase was successful.');
    }
}
