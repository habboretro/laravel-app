<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ config('app.url') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" />
    @include('partials.favicon')
  </head>
  <body class="font-spacemono bg-gray-100 text-gray-800 antialiased min-h-screen">
    <app-root></app-root>
    <script>
      var NitroConfig = {
        configurationUrl: "{{ asset('nitro-assets/configuration.json') }}",
        sso: '{{ $auth_ticket }}',
      };
    </script>
    <script src="{{ asset('nitro-assets/runtime.js') }}" defer></script>
    <script src="{{ asset('nitro-assets/polyfills.js') }}" defer></script>
    <script src="{{ asset('nitro-assets/vendor.js') }}" defer></script>
    <script src="{{ asset('nitro-assets/styles.js') }}" defer></script>
    <script src="{{ asset('nitro-assets/main.js') }}" defer></script>
  </body>
</html>
