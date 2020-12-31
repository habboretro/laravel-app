<?php

namespace App\Http\Actions;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;

class AuthenticateUser
{
    /**
     * Authenticate the user.
     */
    public function authenticate(Request $request)
    {
        $user = User::where(fn (Builder $query) => $query->where('username', $request->mail)->orWhere('mail', $request->mail))
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $user->update(['ip_current' => $request->ip(), 'last_online' => Carbon::now()->timestamp]);

            return $user;
        }
    }
}
