<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Actions\PasswordValidationRules;
use Illuminate\Validation\ValidationException;

class UpdatePasswordController extends Controller
{
    use PasswordValidationRules;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ]);

        if (!Hash::check($request->get('current_password'), $request->user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The provided password does not match your current password.'],
            ]);
        }

        $request->user()->forceFill([
            'password' => Hash::make($request->get('password')),
        ])->save();

        return Redirect::route('settings.password')->with('success', 'Succesfully updated your password.');
    }
}
