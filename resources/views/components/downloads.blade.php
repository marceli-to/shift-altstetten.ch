@props([
  'infoblattHref' => '',
  'baubeschriebHref' => '',
])

<p class="flex flex-col gap-y-10">
  <x-links.icon :href="$infoblattHref">
    <x-slot:icon>
      <x-icons.download class="w-18 h-auto" variant="file" />
    </x-slot:icon>
    Infoblatt
  </x-links.icon>
  <x-links.icon :href="$baubeschriebHref">
    <x-slot:icon>
      <x-icons.download class="w-18 h-auto" variant="file" />
    </x-slot:icon>
    Kurzbaubeschrieb
  </x-links.icon>
</p>
