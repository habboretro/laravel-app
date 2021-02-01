<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NitroController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = request()->user();
        $user->auth_ticket = sprintf('HABBO-%s', Str::random(20));
        $user->save();

        return view('nitro', [
	    'auth_ticket' => $user->auth_ticket,
	]);
    }
}
