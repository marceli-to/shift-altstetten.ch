@props([
  'barColor' => 'bg-blush',
  'rounded' => 'bottom',
  'textSize' => 'text-[20px]',
  // Die beiden Buttons "Wohnen"/"Gewerbe" werden bewusst grösser gesetzt als die
  // Überschrift; ohne eigenen Prop würde `textSize` beides zugleich skalieren.
  'linkSize' => null,
  'barWidth' => 'w-7',
  'headingClass' => '',
])
@php
  $roundedClass = $rounded === 'top' ? 'rounded-t-full' : 'rounded-b-full';
  $linkSize ??= $textSize;
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
      <span class="{{ $barWidth }} {{ $barColor }} {{ $roundedClass }} transition-colors group-hover:bg-blush"></span>
      <span class="[writing-mode:vertical-rl] rotate-180 self-end pt-4 pb-5 transition-colors group-hover:text-blush {{ $linkSize }}">Wohnen</span>
    </a>
    <a
      href="{{ route('page.working') }}"
      class="group flex gap-x-5 h-auto"
      aria-label="Zu den Gewerberäumen">
      <span class="{{ $barWidth }} {{ $barColor }} {{ $roundedClass }} transition-colors group-hover:bg-sky"></span>
      <span class="[writing-mode:vertical-rl] rotate-180 self-end pt-3 pb-5 transition-colors group-hover:text-sky {{ $linkSize }}">Gewerbe</span>
    </a>
  </div>
</div>
