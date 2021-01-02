<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class UpdateEmailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,mail,' . $request->user()->id],
            'current_password' => ['required', 'string'],
        ]);

        if (!Hash::check($request->get('current_password'), $request->user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The provided password does not match your current password.'],
            ]);
        }

        $request->user()->forceFill([
            'mail' => $request->get('email')
        ])->save();

        return Redirect::route('settings.email')->with('success', 'Succesfully updated your email address.');
    }
}
