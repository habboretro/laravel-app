<footer class="py-4 text-white bg-gray-700">
  <div class="text-center container mx-auto px-4 md:px-0">
    <img src="https://habbofont.net/font/habbo_news/{{ config('habbo.site.shortname') }}.gif" alt="Logo" class="block mx-auto mb-4" />
    <div class="text-center mx-auto">
      <a href="https://github.com/foo" target="_blank" rel="noopener noreferrer" class="text-xl mr-4">
        <i class="fab fa-github"></i>
      </a>
      @foreach (config('habbo.socials') as $social)
        <a href="{{ $social['link'] }}" target="_blank" rel="noopener noreferrer" class="text-xl mr-4">
          <i class="{{ $social['icon'] }}"></i>
        </a>
      @endforeach
    </div>
  </div>
</footer>

<div class="py-4 text-white bg-gray-800">
  <div class="text-center container mx-auto px-4 md:px-0">
    <p class="font-bold text-sm">{{ config('habbo.site.sitename') }} is a not for profit educational project.</p>
  </div>
</div>