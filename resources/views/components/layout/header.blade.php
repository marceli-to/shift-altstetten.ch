<header class="bg-yellow-500 w-full sticky top-0 z-50 min-h-94 hidden md:block">
  <x-layout.inner class="min-h-94 flex justify-center md:justify-end xl:justify-center items-center relative">
    @if (!request()->routeIs('page.project'))
      <a href="{{ route('page.project') }}" class="absolute top-16 left-24 text-yellow-500!">
        <x-icons.logo class="w-66 h-auto" />
      </a>
    @endif
    <x-menu.desktop.wrapper />
  </x-layout.inner>
</header>

@if (!request()->routeIs('page.project'))
  <header class="md:hidden bg-yellow-500 min-h-80 sticky top-0 left-0 z-50">
    <a href="{{ route('page.project') }}" class="absolute top-16 left-24 text-yellow-500!">
      <x-icons.logo class="w-66 h-auto" />
    </a>  
  </header>
@endif

<x-menu.mobile.button />
<x-menu.mobile.wrapper />

