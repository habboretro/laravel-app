@extends('app')

@section('content')
  <x-jet-authentication-card>
    <x-slot name="logo">
      <a href="/">
        <img src="/images/logo.png" alt="Logo" class="h-14" />
      </a>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('password.update') }}">
      @csrf

      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <div class="block">
        <x-jet-label for="email" value="Email" />
        <x-jet-input id="email" class="text-gray-800 block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
      </div>

      <div class="mt-4">
        <x-jet-label for="password" value="Password" />
        <x-jet-input id="password" class="text-gray-800 block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
      </div>

      <div class="mt-4">
        <x-jet-label for="password_confirmation" value="Confirm Password" />
        <x-jet-input id="password_confirmation" class="text-gray-800 block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-jet-button>Reset Password</x-jet-button>
      </div>
    </form>
  </x-jet-authentication-card>
@endsection
