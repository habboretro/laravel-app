<?php

namespace App\Providers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\RconService;
use App\Services\HabboService;
use App\Services\FindRetrosService;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        $this->app->bind(HabboService::class, fn () => new HabboService);
        $this->app->bind(FindRetrosService::class, fn () => new FindRetrosService);
        $this->app->bind(RconService::class, fn () => new RconService);

        Inertia::share('me', fn (Request $request) => !is_null($request->user()) ? new UserResource($request->user()) : null);
        Inertia::share('referral_link', fn (Request $request) => !is_null($request->user()) ? route('register.referral', ['username' => $request->user()->username, 'referral_code' => $request->user()->referral_code]) : null);
        Inertia::share('user_count', fn () => User::where('online', '1')->count());
        Inertia::share('domain', fn () => config('habbo.site.domain'));
        Inertia::share('shortname', fn () => config('habbo.site.shortname'));
        Inertia::share('cpath', fn () => config('habbo.site.cpath'));
        Inertia::share('sitename', fn () => config('habbo.site.sitename'));
        Inertia::share('socials', fn () => config('habbo.socials'));
        Inertia::share('csrf_token', fn (Request $request) => $request->session()->token());
        Inertia::share('discord_id', fn () => config('habbo.site.discord_id'));
        Inertia::share('flash', fn () => [
            'success' => Session::get('success'),
            'error' => Session::get('error'),
        ]);
    }
}
