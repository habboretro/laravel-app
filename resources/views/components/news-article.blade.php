@props(['article'])

<a href="{{ route('news.show', [ 'news' => $article->slug ]) }}" {{ $attributes->merge(['class' => 'w-full px-4 pb-4 md:w-1/3']) }}>
  <article>
    <x-card class="cursor-pointer overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
      <div class="relative overflow-hidden h-32">
        <p class="absolute right-0 top-0 bg-white text-xs px-2 py-1 rounded-lg shadow m-4">{{ $article->created_at->diffForHumans() }}</p>
        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->slug }}" class="object-cover min-w-full min-h-full" />
      </div>
      <div class="p-4">
        <p class="text-purple-900 text-lg font-bold mb-2">{{ $article->title }}</p>
        <p class="text-sm italic">{{ $article->short_story }}</p>
      </div>
    </x-card>
  </article>
</a>

