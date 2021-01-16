<header {{ $attributes->merge(['class' => 'bg-gray-800 pb-24 shadow']) }}>
  <div class="container mx-auto px-4 md:px-0">
    <div class="flex py-8 items-center md:border-b md:border-gray-600 md:shadow">
      <x-logo class="mr-10" />
      <div class="hidden flex-1 mr-4 md:block">
        <a href="{{ route('downloads') }}">
          <x-jet-button class="bg-teal-500 mr-4 hover:bg-teal-600 active:bg-teal-600">Download our client</x-jet-button>
        </a>
      </div>
      <div class="hidden md:block">
        <a href="{{ route('login') }}" class="mr-4">
          <x-jet-button class="bg-teal-500 hover:bg-teal-600 active:bg-teal-600">Login</x-jet-button>
        </a>
        <a href="{{ route('register') }}">
          <x-jet-button class="bg-teal-500 hover:bg-teal-600 active:bg-teal-600">Register</x-jet-button>
        </a>
      </div>
      <div class="block ml-auto md:hidden">
        <x-jet-dropdown align="right" class="w-32">
          <x-slot name="trigger">
            <x-jet-button>
              <i class="text-xl fas fa-bars"></i>
            </x-jet-button>
          </x-slot>
          <x-slot name="content">
            <x-jet-dropdown-link href="{{ route('index') }}">Homepage</x-jet-dropdown-link>
            <x-jet-dropdown-link href="{{ route('news.index') }}">News</x-jet-dropdown-link>
            <x-jet-dropdown-link href="{{ route('highscores') }}">Highscores</x-jet-dropdown-link>
            <x-jet-dropdown-link href="{{ route('staff') }}">Staff</x-jet-dropdown-link>
            <x-jet-dropdown-link href="{{ route('store') }}">Store</x-jet-dropdown-link>
            <x-jet-dropdown-link href="{{ route('login') }}">Login</x-jet-dropdown-link>
            <x-jet-dropdown-link href="{{ route('register') }}">Register</x-jet-dropdown-link>
          </x-slot>
        </x-jet-dropdown>
      </div>
    </div>
    <x-navigation />
  </div>
</header>
