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
            <x-title-card icon="user" class="mb-4">Reset Password</x-title-card>
            <x-validation-error class="mb-4" />
            <form method="POST" action="{{ route('password.update') }}">
              @csrf
              <input type="hidden" name="token" value="{{ $request->route('token') }}">
              <x-jet-label for="mail" value="Email" />
              <x-jet-input id="mail" class="block mt-1 w-full mb-4" type="email" name="mail" :value="old('mail', $request->mail)" required autofocus />
              <x-jet-label for="password" value="Password" />
              <x-jet-input id="password" class="block mt-1 w-full mb-4" type="password" name="password" required autocomplete="new-password" />
              <x-jet-label for="password_confirmation" value="Confirm Password" />
              <x-jet-input id="password_confirmation" class="block mt-1 w-full mb-4" type="password" name="password_confirmation" required autocomplete="new-password" />
              <a class="block underline text-sm text-gray-600 hover:text-gray-900 mb-4" href="{{ route('login') }}">Already registered?</a>
              <x-jet-button class="w-full justify-center">Reset Password</x-jet-button>
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
