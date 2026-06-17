@props([
  'titleClass' => 'text-[45px]',
  'subtitleClass' => 'text-[20px]',
])
<h1 {{ $attributes->class('flex flex-col text-white') }}>
  <span class="font-bold {{ $titleClass }}">live & work</span>
  <span class="{{ $subtitleClass }}">Zürich-Altstetten</span>
</h1>
