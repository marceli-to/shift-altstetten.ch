@props([
  'stats' => [],
  'variant' => 'mobile',
])
@php
$styles = [
  'mobile' => [
    'heading' => 'text-[20px]! mb-30!',
    'list' => 'flex flex-col gap-y-20',
    'number' => 'text-[45px] w-56',
    'label' => 'text-[18px]',
    'break' => false,
  ],
  'desktop' => [
    'heading' => 'text-[22px]! mb-20!',
    'list' => 'w-full flex flex-wrap gap-40 lg:gap-x-60 lg:justify-between gap-y-20',
    'number' => 'text-[60px] w-70',
    'label' => 'text-[22px] leading-[1.1]',
    'break' => true,
  ],
][$variant];
@endphp
<x-headings.h2 class="{{ $styles['heading'] }}">
  Bis Sommer 2027 entstehen
</x-headings.h2>
<div class="{{ $styles['list'] }}">
  @foreach($stats as $stat)
    <div class="flex items-center gap-x-12">
      <span class="font-bold text-right {{ $styles['number'] }}">{{ $stat['number'] }}</span>
      <span class="{{ $styles['label'] }}">{!! str_replace("\n", $styles['break'] ? '<br>' : ' ', e($stat['label'])) !!}</span>
    </div>
  @endforeach
</div>
