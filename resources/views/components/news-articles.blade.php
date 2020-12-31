<div {{ $attributes->merge(['class' => '']) }}>
  @if ($articles->count() === 0)
    <x-card class="bg-gray-300 text-white text-center font-bold p-4 mb-4">There are no news articles to display</x-card>
  @endif

  @foreach ($articles as $article)
    <x-news-article :article="$article" class="mb-4" />
  @endforeach
</div>