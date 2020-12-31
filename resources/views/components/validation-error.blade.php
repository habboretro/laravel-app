<div {{ $attributes->merge(['class' => '']) }}>
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <div class="px-4 py-2 bg-red-500 text-white rounded-lg mb-4">{{ $error }}</div>
    @endforeach
  @endif
</div>