<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\RconService;
use Illuminate\Http\Request;
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
            $rcon->giveDuckets($request->user(), $product->reward);
        }

        if ($product->type === '5') {
            $rcon->giveDiamonds($request->user(), $product->reward);
        }

        $request->user()->update(['balance' => $request->user()->balance - $product->price]);

        return Redirect::route('store')->with('success', 'You purchase was successful.');
    }
}
