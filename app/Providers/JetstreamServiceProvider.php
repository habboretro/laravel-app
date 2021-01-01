<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Actions\AuthenticateUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

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
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where(fn (Builder $query) => $query->where('username', $request->mail)->orWhere('mail', $request->mail))->first();
            if ($user && Hash::check($request->password, $user->password)) {
                $user->update(['ip_current' => $request->ip(), 'last_online' => Carbon::now()->timestamp]);
                return $user;
            }
        });
    }
}
