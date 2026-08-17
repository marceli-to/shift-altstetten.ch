@props([
  'titleClass' => 'text-[45px]',
  'subtitleClass' => 'text-[20px]',
])
<h1 {{ $attributes->class('flex flex-col text-white') }}>
  {{-- "live" und "work" führen einzeln auf Wohnen bzw. Arbeiten; das "&" bleibt Text. --}}
  <span class="font-bold {{ $titleClass }}">
    <a href="{{ route('page.living') }}" class="transition-colors hover:text-blush" aria-label="Zu den Wohnungen">live</a>
    &amp;
    <a href="{{ route('page.working') }}" class="transition-colors hover:text-sky" aria-label="Zu den Gewerbeflächen">work</a>
  </span>
  <span class="{{ $subtitleClass }}">Zürich-Altstetten</span>
</h1>
