@extends('auth')

@section('content')
  <x-card class="p-6 mb-12">
    <x-card-title>
      <p class="font-bold text-xl">Login to {{ config('habbo.site.shortname') }}</p>
      <i class="fas fa-user ml-auto"></i>
    </x-card-title>
    <x-validation-error class="mb-4" />
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <x-jet-label for="username" value="Username or Email" />
      <x-jet-input id="username" class="block mt-1 w-full mb-4" type="text" name="mail" :value="old('mail')" required autofocus />
      <x-jet-label for="password" value="Password" />
      <x-jet-input id="password" class="block mt-1 w-full mb-4" type="password" name="password" required />
      <a class="block underline text-sm text-gray-600 hover:text-gray-900 mb-4" href="{{ route('password.request') }}">Forgot your password?</a>
      <x-jet-button>Login</x-jet-button>
    </form>
  </x-card>
@endsection
