@extends('auth')

@section('content')
  <x-card class="p-6 mb-12">
    <x-card-title>
      <p class="font-bold text-xl">Reset Password</p>
      <i class="fas fa-user ml-auto"></i>
    </x-card-title>
    <x-validation-error class="mb-4" />
    <form method="POST" action="{{ route('password.update') }}">
      @csrf
      <input type="hidden" name="token" value="{{ $request->route('token') }}">
      <x-jet-label for="mail" value="Email" />
      <x-jet-input id="mail" class="block mt-1 w-full mb-4" type="email" name="mail" :value="old('mail', $request->mail)" required autofocus />
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
      <x-jet-button>Reset Password</x-jet-button>
    </form>
  </x-card>
@endsection
