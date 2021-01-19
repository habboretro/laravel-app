<?php

namespace App\Http\Actions;

use App\Models\User;
use Illuminate\Support\Str;
use App\Services\RconService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
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
        $users = User::where(fn (Builder $query) => $query->where('ip_register', request()->ip())->orWhere('ip_current', request()->ip()))
            ->count();

        if ($users > 3) {
            throw ValidationException::withMessages([
                'username' => ['You can only have a maximum of 3 accounts.'],
            ]);
        }

        Validator::make($input, [
            'username' => ['required', 'string', 'alpha_dash', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,mail'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
            'mail' => $input['email'],
            'account_created' => Carbon::now()->timestamp,
            'credits' => config('habbo.default.credits'),
            'look' => config('habbo.default.look'),
            'motto' => config('habbo.default.motto'),
            'account_day_of_birth' => Carbon::now()->timestamp,
            'gender' => 'M',
            'last_login' => Carbon::now()->timestamp,
            'ip_register' => request()->ip(),
            'ip_current' => request()->ip(),
            'referral_code' => Str::random(20),
        ]);

        foreach (config('habbo.default.currencies') as $currency) {
            $user->currencies()->create($currency);
        }

        $user->settings()->create([
            'daily_respect_points' => config('habbo.default.daily_respect_points'),
            'daily_pet_respect_points' => config('habbo.default.daily_pet_respect_points'),
        ]);

        if (isset($input['referral_code'])) {
            $referralUser = User::whereReferralCode($input['referral_code'])
                ->first();

            if (!is_null($referralUser)) {
                $rcon = new RconService;
                $rcon->giveDiamonds($referralUser, 100);
                $rcon->alertUser($referralUser, sprintf('The users you invited %s, has just register, here is 100 Diamonds!', $user->username));
            }
        }

        return $user;
    }
}
