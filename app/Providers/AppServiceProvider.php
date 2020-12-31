<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\HabboService;
use App\Services\FindRetrosService;
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
        Inertia::share('user', fn (Request $request) => $request->user());
        Inertia::share('domain', fn () => config('habbo.site.domain'));
        Inertia::share('shortname', fn () => config('habbo.site.shortname'));
        Inertia::share('sitename', fn () => config('habbo.site.sitename'));
        Inertia::share('socials', fn () => config('habbo.socials'));
    }
}
