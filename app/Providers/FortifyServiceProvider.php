<?php

namespace App\Providers;

use Laravel\Fortify\Fortify;
use App\Http\Actions\CreateNewUser;
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
    }
}
