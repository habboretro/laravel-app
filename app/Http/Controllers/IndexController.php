<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginViewResponse;

class IndexController extends Controller
{
    /**
     * Retrieve the view.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }
}
