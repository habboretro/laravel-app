@extends('app')

@section('content')
  <main class="py-12">
    <div class="container mx-auto px-4 md:px-0">
      <div class="flex flex-col md:flex-row md:items-start md:justify-between md:-mx-4">
        <div class="mb-4 order-2 md:w-1/3 md:mx-4 md:mb-0 md:order-1">
          <x-title-card icon="newspaper" class="mb-4">Latest Articles</x-title-card>
          <x-news-articles limit="3" />
        </div>

        <div class="mb-4 order-1 md:w-1/3 md:mx-4 md:mb-0 md:order-2">
          <x-card class="p-4 mb-4">
            <x-title-card icon="user" class="mb-4">Forgot Password?</x-title-card>
            <x-validation-error class="mb-4" />
            <form method="POST" action="{{ route('password.email') }}">
              @csrf
              <x-jet-label for="mail" value="Email" />
              <x-jet-input id="mail" class="block mt-1 w-full mb-4" type="email" name="mail" :value="old('mail')" required />
              <x-jet-button class="w-full justify-center">Email Password Reset Link</x-jet-button>
            </form>
          </x-card>
        </div>

        <div class="mb-4 md:w-1/3 md:mx-4 md:mb-0 order-3">
          <iframe src="https://discordapp.com/widget?id={{ config('habbo.site.discord_id') }}&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
        </div>
      </div>
    </div>
  </main>
@endsection

{{-- @extends('app')

@section('content')
  <x-jet-authentication-card>
    <x-slot name="logo">
      <a href="/">
        <img src="/images/logo.png" alt="Logo" class="h-14" />
      </a>
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</div>

    @if (session('status'))
      <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
      </div>
    @endif

    <x-jet-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="mt-4">
        <x-jet-label for="email" value="Email" />
        <x-jet-input id="email" class="text-gray-800 block mt-1 w-full" type="email" name="email" :value="old('email')" required />
      </div>
      <div class="flex items-center justify-end mt-4">
          <x-jet-button class="ml-4"></x-jet-button>
      </div>
    </form>
  </x-jet-authentication-card>
@endsection --}}
