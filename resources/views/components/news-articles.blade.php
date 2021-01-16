@if ($articles->count() > 0)
  <section {{ $attributes->merge(['class' => 'mb-12']) }}>
    <div class="flex items-center mb-12">
      <h1 class="font-bold text-4xl">Latest Articles</h1>
      <a href="{{ route('news.index') }}" class="ml-auto">
        <x-jet-button>
          <span class="mr-4">View More</span>
          <i class="fas fa-chevron-right"></i>
        </x-jet-button>
      </a>
    </div>

    <div class="flex flex-wrap -mx-4">
      @foreach ($articles as $article)
        <x-news-article :article="$article" />
      @endforeach
    </div>
  </section>
@endif
