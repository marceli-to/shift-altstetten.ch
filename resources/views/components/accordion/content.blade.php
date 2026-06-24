<div
  x-cloak
  class="grid transition-[grid-template-rows] duration-300 ease-out"
  :class="active === id ? 'grid-rows-[1fr]' : 'grid-rows-[0fr]'">
  <div class="overflow-hidden">
    <div class="pb-16 md:pb-20 text-[18px] md:text-[20px] [&_a]:underline [&_a]:underline-offset-4 [&_a]:decoration-1 [&_a:hover]:no-underline">
      {{ $slot }}
    </div>
  </div>
</div>
