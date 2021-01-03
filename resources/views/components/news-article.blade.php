@props(['article'])

<a href="{{ route('news.show', [ 'news' => $article->slug ]) }}">
  <article {{ $attributes->merge(['class' => '']) }}>
    <x-card>
      <div class="overflow-hidden h-32">
        <img src="/storage/{{ $article->image }}" alt="{{ $article->slug }}" class="object-cover min-w-full min-h-full" />
      </div>
      <div class="p-4">
        <p class="text-green-500 font-bold mb-4">{{ $article->title }}</p>
        <p class="text-gray-500 font-light text-sm">{{ $article->short_story }}</p>
      </div>
      <div class="flex items-center px-4 py-2 bg-gray-200 rounded-b">
        <p class="font-bold text-xs">{{ $article->user->username ?? sprintf('%s Staff', config('habbo.site.shortname')) }}</p>
        <p class="text-xs ml-auto">{{ $article->created_at->diffForHumans() }}</p>
      </div>
    </x-card>
  </article>
</a>