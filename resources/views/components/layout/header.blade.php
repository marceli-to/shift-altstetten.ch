<header class="bg-cocoa w-full sticky top-0 z-50 hidden md:block">
  <x-layout.inner >
    <div class="min-h-94 flex items-center justify-between xl:justify-start xl:grid xl:grid-cols-2">
      <div class="w-full">
        <a 
          href="{{ route('page.project') }}" 
          aria-label="Zur Startseite" 
          class="w-170 h-auto block">
          <x-icons.logo class="w-full h-auto text-blush" />
        </a>
      </div>
      <div class="pl-20">
        <x-menu.desktop.wrapper />
      </div>
    </div>
  </x-layout.inner>
</header>

<header class="md:hidden bg-cocoa min-h-80 sticky top-0 left-0 z-50 flex items-center justify-between px-20">
  <a 
    href="{{ route('page.project') }}" 
    aria-label="Zur Startseite">
    <x-icons.logo class="w-120 h-auto text-blush" />
  </a>  
  <x-menu.mobile.button />
</header>

<x-menu.mobile.wrapper />

