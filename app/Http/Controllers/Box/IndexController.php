<?php

namespace App\Http\Controllers\Box;

use App\Models\Box;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $boxes = Box::all();

        return response()->json($boxes);
    }
}
