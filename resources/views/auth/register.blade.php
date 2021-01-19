@extends('auth')

@section('content')
  <x-card class="p-6 mb-12">
    <x-card-title>
      <p class="font-bold text-xl">Register to {{ config('habbo.site.shortname') }}</p>
      <i class="fas fa-user ml-auto"></i>
    </x-card-title>
    <x-validation-error class="mb-4" />
    <form method="POST" action="{{ route('register') }}">
      @csrf
      @if (!is_null(Request::route('referral_code')))
        <input type="hidden" name="referral_code" value="{{ Request::route('referral_code') }}" />
      @endif
      <div class="flex items-center justify-between -mx-4">
        <fieldset class='w-full md:w-1/2 px-4 mb-4'>
          <x-jet-label for="username" value="Username" />
          <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
        </fieldset>
        <fieldset class='w-full md:w-1/2 px-4 mb-4'>
          <x-jet-label for="email" value="Email" />
          <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </fieldset>
      </div>
      <div class="flex items-center justify-between -mx-4">
        <fieldset class='w-full md:w-1/2 px-4 mb-4'>
          <x-jet-label for="password" value="Password" />
          <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        </fieldset>
        <fieldset class='w-full md:w-1/2 px-4 mb-4'>
          <x-jet-label for="password_confirmation" value="Confirm Password" />
          <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
        </fieldset>
      </div>
      <a class="block underline text-sm text-gray-600 hover:text-gray-900 mb-4" href="{{ route('login') }}">Already registered?</a>
      <x-jet-button>Register</x-jet-button>
    </form>
  </x-card>
@endsection
