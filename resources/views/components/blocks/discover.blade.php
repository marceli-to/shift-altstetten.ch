@props([
  'barColor' => 'bg-blush',
  'rounded' => 'bottom',
  'textSize' => 'text-[20px]',
  'headingClass' => '',
])
@php
  $roundedClass = $rounded === 'top' ? 'rounded-t-full' : 'rounded-b-full';
@endphp
<div {{ $attributes->class('justify-between pb-20') }}>
  <div class="{{ $headingClass }}">
    <x-headings.h2 class="{{ $textSize }}! text-balance mb-0!">
      Entdecken Sie<br>unser Angebot
    </x-headings.h2>
  </div>
  <div class="flex gap-x-20">
    <a
      href="{{ route('page.living') }}"
      class="group flex gap-x-5 h-auto"
      aria-label="Zu den Wohnungen">
      <span class="w-5 {{ $barColor }} {{ $roundedClass }} transition-colors group-hover:bg-blush"></span>
      <span class="[writing-mode:vertical-rl] rotate-180 self-end pt-4 pb-5 transition-colors group-hover:text-blush {{ $textSize }}">Wohnen</span>
    </a>
    <a
      href="{{ route('page.working') }}"
      class="group flex gap-x-5 h-auto"
      aria-label="Zu den Gewerberäumen">
      <span class="w-5 {{ $barColor }} {{ $roundedClass }} transition-colors group-hover:bg-blush"></span>
      <span class="[writing-mode:vertical-rl] rotate-180 self-end pt-3 pb-5 transition-colors group-hover:text-blush {{ $textSize }}">Gewerbe</span>
    </a>
  </div>
</div>
