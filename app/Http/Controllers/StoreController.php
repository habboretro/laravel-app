<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('store', [
            'recommended' => new ProductCollection(Product::orderBy('category')->where('recommended', true)->get()),
            'products' => (new ProductCollection(Product::orderBy('category')->get()))
                ->groupBy('category'),
        ]);
    }
}
