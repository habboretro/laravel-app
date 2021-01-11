<?php

namespace App\Http\Controllers\Box;

use App\Models\Box;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BoxCollection;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return response()->json(new BoxCollection(Box::all()));
    }
}
