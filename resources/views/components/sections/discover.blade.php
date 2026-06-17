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
      class="flex gap-x-5 h-auto"
      aria-label="Zu den Wohnungen">
      <span class="w-5 {{ $barColor }} {{ $roundedClass }}"></span>
      <span class="[writing-mode:vertical-rl] rotate-180 self-end pt-4 pb-5 {{ $textSize }}">Wohnen</span>
    </a>
    <a
      href="{{ route('page.working') }}"
      class="flex gap-x-5 h-auto"
      aria-label="Zu den Gewerberäumen">
      <span class="w-5 {{ $barColor }} {{ $roundedClass }}"></span>
      <span class="[writing-mode:vertical-rl] rotate-180 self-end pt-3 pb-5 {{ $textSize }}">Gewerbe</span>
    </a>
  </div>
</div>
