<nav {{ $attributes->merge(['class' => 'py-4 hidden items-center md:flex']) }}>
  <a href="{{ route('news.index') }}" class="mr-2">
    <x-jet-button>News</x-jet-button>
  </a>
  <a href="{{ route('highscores') }}" class="mr-2">
    <x-jet-button>Highscores</x-jet-button>
  </a>
  <a href="{{ route('staff') }}" class="mr-2">
    <x-jet-button>Staff</x-jet-button>
  </a>
  <a href="{{ route('store') }}" class="mr-2">
    <x-jet-button>Store</x-jet-button>
  </a>
  <div class="ml-auto">
    <x-jet-button>
      <i class="fas fa-users mr-2"></i>
      <span>{{ sprintf("%s %s's Online", $onlineCount, config('habbo.site.shortname')) }}</span>
    </x-jet-button>
  </div>
</nav>
