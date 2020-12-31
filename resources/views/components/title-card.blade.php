<div {{ $attributes->merge(['class' => 'flex items-center px-4 py-2 rounded-lg bg-green-400 shadow mb-4']) }}>
  <span class="font-bold text-white">{{ $slot }}</span>
  @isset ($attributes['icon'])
    <i class="fas fa-{{ $attributes['icon'] }} text-white ml-auto"></i>
  @endisset
</div>