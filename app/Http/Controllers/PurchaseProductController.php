<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Services\RconService;
use Illuminate\Support\Facades\Redirect;

class PurchaseProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, RconService $rcon, Product $product)
    {
        if ($request->user()->balance - $product->price < 0) {
            return Redirect::route('store')->with('error', 'You do not have enough balance in your acccount.');
        }

        if ($product->type === '0') {
            // $rcon->giveDuckets($request->user(), $product->reward);
	        // $rcon->alertUser($request->user(), sprintf('%s duckets have been added to your account.', $product->reward));
        }

        if (in_array($product->type, ['vip', 'diamond_vip'])) {
            // $request->user()->update(['rank' => $product->reward]);
            // $rcon->setRank($request->user(), Permission::find($product->reward));
        }

        if ($product->type === '5') {
            // $rcon->giveDiamonds($request->user(), $product->reward);
            // $rcon->alertUser($request->user(), sprintf('%s diamonds have been added to your account.', $product->reward));
        }

        if ($product->type === '4') {
            // $rcon->givePoints($request->user(), 4, $product->reward);
            // $rcon->alertUser($request->user(), sprintf('%s tokens have been added to your account.', $product->reward));
        }

        $previousBalance = $request->user()->balance;
        $request->user()->update(['balance' => $previousBalance - $product->price]);
        $request->user()->logs()->create([
            'type' => 'product_purchase',
            'data' => ['previous_balance' => $previousBalance, 'product' => $product->toArray()],
        ]);

        return Redirect::route('store')->with('success', 'You purchase was successful.');
    }
}
