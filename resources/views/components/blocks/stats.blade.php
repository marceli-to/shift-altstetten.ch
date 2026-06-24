@props([
  'stats' => [],
  'variant' => 'mobile',
])
@php
$styles = [
  'mobile' => [
    'heading' => 'text-[20px]! mb-30!',
    'list' => 'flex flex-col gap-y-20',
    'number' => 'text-[45px] w-64',
    'align' => 'text-center',
    'label' => 'text-[18px] text-left',
    'break' => false,
  ],
  'desktop' => [
    'heading' => 'text-[22px]! mb-20!',
    'list' => 'w-full flex flex-wrap gap-40 lg:gap-x-60 lg:justify-between gap-y-20',
    'number' => 'text-[60px] w-70',
    'align' => 'text-right',
    'label' => 'text-[22px] leading-[1.1]',
    'break' => true,
  ],
][$variant];
@endphp
<x-headings.h2 class="{{ $styles['heading'] }}">
  Bis Mai 2027 entstehen
</x-headings.h2>
<div class="{{ $styles['list'] }}">
  @foreach($stats as $stat)
    <div class="flex items-center gap-x-12">
      <span class="font-bold tabular-nums {{ $styles['align'] }} {{ $styles['number'] }}">{{ $stat['number'] }}</span>
      <span class="{{ $styles['label'] }}">{!! str_replace("\n", $styles['break'] ? '<br>' : ' ', e($stat['label'])) !!}</span>
    </div>
  @endforeach
</div>
