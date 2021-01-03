<?php

namespace App\Http\Actions;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'alpha_dash', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,mail'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
            'mail' => $input['email'],
            'account_created' => time(),
            'credits' => config('habbo.default.credits'),
            'look' => config('habbo.default.look'),
            'motto' => config('habbo.default.motto'),
            'account_day_of_birth' => time(),
            'gender' => 'M',
            'last_login' => time(),
            'ip_register' => request()->ip(),
            'ip_current' => request()->ip(),
        ]);

        foreach (config('habbo.default.currencies') as $currency) {
            $user->currencies()->create($currency);
        }

        $user->settings()->create([
            'daily_respect_points' => config('habbo.default.daily_respect_points'),
            'daily_pet_respect_points' => config('habbo.default.daily_pet_respect_points'),
        ]);

        return $user;
    }
}
