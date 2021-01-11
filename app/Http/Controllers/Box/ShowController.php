<?php

namespace App\Http\Controllers\Box;

use App\Models\Box;
use Illuminate\Http\Request;
use App\Http\Resources\BoxResource;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Box $box)
    {
        $box->load('prizes');

        return response()->json(new BoxResource($box));
    }
}
