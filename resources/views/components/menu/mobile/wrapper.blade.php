<div
  x-cloak
  x-show="menu"
  class="fixed left-0 top-80 z-50 flex items-center justify-center w-full h-[calc(100svh-80px)] bg-cocoa md:hidden">

  <nav>
    <ul class="flex flex-col gap-y-40 items-center">

      <x-menu.mobile.item
        href="{{ route('page.project') }}"
        active="{{ request()->routeIs('page.project') }}"
        title="Projekt" />

      <x-menu.mobile.item
        href="{{ route('page.living') }}"
        active="{{ request()->routeIs('page.living') }}"
        title="Wohnen" />

      <x-menu.mobile.item
        href="{{ route('page.working') }}"
        active="{{ request()->routeIs('page.working') }}"
        title="Arbeiten" />

      <x-menu.mobile.item
        href="{{ route('page.location') }}"
        active="{{ request()->routeIs('page.location') }}"
        title="Lage" />

      <x-menu.mobile.item
        href="{{ route('page.contact') }}"
        active="{{ request()->routeIs('page.contact') }}"
        title="Kontakt" />

    </ul>
  </nav>
</div>
