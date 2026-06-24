@props(['title' => ''])
<button
  type="button"
  @click="active = (active === id ? null : id)"
  :aria-expanded="active === id"
  {{ $attributes->class('flex items-start justify-between w-full gap-x-20 py-16 md:py-20 text-left cursor-pointer') }}>
  <span class="font-bold text-[20px] md:text-[22px] leading-[1.25]">{{ $title }}</span>
  <span
    class="shrink-0 mt-6 transition-transform duration-300"
    :class="active === id ? 'rotate-180' : ''">
    <x-icons.chevron-down class="w-18 h-auto" />
  </span>
</button>
