<header {{ $attributes->merge(['class' => 'relative h-48 bg-blue-100 bg-no-repeat bg-right-bottom']) }} style="background-image: url('/images/banner.png');">
  <div class="inset-0 absolute bg-gray-800 opacity-50 w-full h-full"></div>
  <div class="relative container h-full px-4 mx-auto md:px-0">
    <div class="block w-full h-full md:flex md:justify-between md:items-center">
      <div class="w-full mb-4 pt-4 md:pt-0 md:mb-0 md:w-auto">
        <img src="https://habbofont.net/font/habbo_news/{{ config('habbo.site.shortname') }}.gif" alt="Logo" class="block mx-auto" />
      </div>
      <div class="w-full md:w-auto">
        @guest
          <a href="{{ route('register') }}" class="block w-64 mb-4 mx-auto">
            <x-jet-button class="w-full bg-green-400 justify-center mx-auto hover:bg-green-500 active:bg-green-500 focus:border-green-500">
              <i class="fas fa-plus mr-4"></i>
              <span>Register Now</span>
            </x-jet-button>
          </a> 
        @endguest
        @auth
          <a href="{{ route('game') }}" class="block w-64 mb-4 mx-auto">
            <x-jet-button class="w-full bg-green-400 justify-center mx-auto hover:bg-green-500 active:bg-green-500 focus:border-green-500">
              <i class="fas fa-sign-in-alt mr-4"></i>
              <span>Enter {{ config('habbo.site.shortname') }}</span>
            </x-jet-button>
          </a> 
        @endauth
        <div class="block w-64 mx-auto">
          <x-jet-button class="w-full justify-center mx-auto">
            <i class="fas fa-users mr-4"></i>
            <span>{{ $online_count }} {{ config('habbo.site.shortname') }}'s Online</span>
          </x-jet-button>
        </div>
      </div>
    </div>
  </div>
</header>
