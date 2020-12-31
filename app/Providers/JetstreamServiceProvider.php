<?php

namespace App\Providers;

use App\Http\Actions\AuthenticateUser;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\ServiceProvider;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::authenticateUsing(fn (Request $request) => (new AuthenticateUser)->authenticate($request));
    }
}
