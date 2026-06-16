<button
  @click="menu = !menu"
  type="button"
  :aria-label="menu ? 'Menü schliessen' : 'Menü öffnen'"
  :aria-expanded="menu"
  class="w-40 h-20 flex items-center justify-center cursor-pointer md:hidden {{ $class ?? '' }}">
  <x-icons.burger class="w-full h-auto text-blush" />
</button>