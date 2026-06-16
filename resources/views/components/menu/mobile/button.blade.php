<button
  @click="menu = !menu"
  type="button"
  :aria-label="menu ? 'Menü schliessen' : 'Menü öffnen'"
  :aria-expanded="menu"
  class="fixed top-25 right-25 z-80 w-48 h-48 cursor-pointer flex items-center justify-center border border-yellow-500 rounded-full bg-yellow-500 md:hidden {{ $class ?? '' }}">
  <x-icons.burger class="w-26 h-auto text-yellow-500!" />
</button>