<div class="{{ $class ?? '' }}">
  <nav>
    <ul class="md:grid md:grid-cols-5 md:gap-x-30 xl:gap-x-80 md:text-right xl:text-center w-full">

      <x-menu.desktop.item
        href="{{ route('page.project') }}"
        active="{{ request()->routeIs('page.project') }}"
        title="Projekt" />

      <x-menu.desktop.item
        href="{{ route('page.living') }}"
        active="{{ request()->routeIs('page.living') }}"
        title="Wohnen" />

      <x-menu.desktop.item
        href="{{ route('page.working') }}"
        active="{{ request()->routeIs('page.working') }}"
        title="Arbeiten" />

      <x-menu.desktop.item
        href="{{ route('page.location') }}"
        active="{{ request()->routeIs('page.location') }}"
        title="Lage" />

      <x-menu.desktop.item
        href="{{ route('page.contact') }}"
        active="{{ request()->routeIs('page.contact') }}"
        title="Kontakt" />

    </ul>
  </nav>
</div>
