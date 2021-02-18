<?php

namespace App\Providers;

use App\Models\News;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use App\Http\Actions\CreateNewUser;
use App\Http\Resources\NewsCollection;
use App\Http\Actions\ResetUserPassword;
use Illuminate\Support\ServiceProvider;
use App\Http\Actions\UpdateUserPassword;
use App\Http\Actions\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
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
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(fn () => Inertia::render('login', [
            'articles' => new NewsCollection(News::with('user')->latest()->limit(6)->get()),
        ]));

        Fortify::registerView(fn (Request $request) => Inertia::render('register', [
            'referral_code' => $request->route('referral_code'),
            'articles' => new NewsCollection(News::with('user')->latest()->limit(6)->get()),
        ]));
    }
}
