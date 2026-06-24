<nav class="relative flex items-end min-h-94">
  <ul class="flex gap-30 pb-16">

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
      href="{{ route('page.facts') }}"
      active="{{ request()->routeIs('page.facts') }}"
      title="Facts" />

    <x-menu.desktop.item
      href="{{ route('page.contact') }}"
      active="{{ request()->routeIs('page.contact') }}"
      title="Kontakt" />

  </ul>
  <x-bars class="hidden 2xl:flex h-94 ml-40 gap-x-20" :color="request()->routeIs('page.working') ? 'bg-sky' : 'bg-blush'" :count="4" width="w-10" />

</nav>

