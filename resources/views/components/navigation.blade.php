<div {{ $attributes->merge(['class' => 'bg-white shadow uppercase font-bold py-4']) }}>
  <div class="container px-4 mx-auto md:px-0">
    <div class="flex items-center">
      <x-jet-dropdown align="left" width="48">
        <x-slot name="trigger">
          <button class="block px-4 md:hidden focus:outline-none">
            <i class="fas fa-bars cursor-pointer"></i>
          </block>
        </x-slot>
        <x-slot name="content">
          <x-jet-dropdown-link href="{{ is_null(request()->user()) ? route('index') : route('me') }}">Homepage</x-jet-dropdown-link>
          <x-jet-dropdown-link href="{{ route('news.index') }}">News</x-jet-dropdown-link>
          <x-jet-dropdown-link href="{{ route('highscores') }}">Highscores</x-jet-dropdown-link>
          <x-jet-dropdown-link href="{{ route('staff') }}">Staff</x-jet-dropdown-link>
          <x-jet-dropdown-link href="{{ route('index') }}">Store</x-jet-dropdown-link>
        </x-slot>
      </x-jet-dropdown>
      <a href="{{ is_null(request()->user()) ? route('index') : route('me') }}" class="hidden text-sm hover:text-green-500 mr-8 md:block">Homepage</a>
      <a href="{{ route('news.index') }}" class="hidden text-sm hover:text-green-500 mr-8 md:block">News</a>
      <a href="{{ route('highscores') }}" class="hidden text-sm hover:text-green-500 mr-8 md:block">Highscores</a>
      <a href="{{ route('staff') }}" class="hidden text-sm hover:text-green-500 mr-8 md:block">Staff</a>
      <a href="{{ route('index') }}" class="hidden text-sm hover:text-green-500 mr-8 md:block">Store</a>
      @guest
        <a href="{{ route('register') }}" class="ml-auto">
          <x-jet-button>Register</x-jet-button>
        </a>
      @endguest
      @auth
        <div class="ml-auto">
          <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button class="flex items-center px-4 focus:outline-none">
                <img src="/habbo-imaging/avatarimage?headonly=true" alt="{{ $user->username }}" class="mr-4 h-12" />
                <i class="fas fa-chevron-down text-sm"></i>
              </button>
            </x-slot>
            <x-slot name="content">
              <x-jet-dropdown-link href="{{ route('index') }}">Account Settings</x-jet-dropdown-link>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left block px-4 py-2 text-sm leading-5 text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:bg-red-600 transition duration-150 ease-in-out focus:outline-none">
                  <span class="uppercase font-bold">Logout</span>
                </button>
              </form>
              </form>
            </x-slot>
          </x-jet-dropdown>
        </div>
      @endauth
    </div>
  </div>
</div>