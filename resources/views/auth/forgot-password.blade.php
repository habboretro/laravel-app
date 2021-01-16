@extends('auth')

@section('content')
  <x-card class="p-6 mb-12">
    <x-card-title>
      <p class="font-bold text-xl">Forgot Password?</p>
      <i class="fas fa-user ml-auto"></i>
    </x-card-title>
    <x-validation-error class="mb-4" />
    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <x-jet-label for="mail" value="Email" />
      <x-jet-input id="mail" class="block mt-1 w-full mb-4" type="email" name="mail" :value="old('mail')" required />
      <x-jet-button>Email Password Reset Link</x-jet-button>
    </form>
  </x-card>
@endsection
