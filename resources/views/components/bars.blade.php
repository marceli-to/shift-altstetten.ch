@props([
  'count' => 8,
  'width' => 'w-[10px]',
  'color' => 'bg-blush',
  'rounded' => false,
])
@php
  $roundedClass = match ($rounded === true ? 'both' : $rounded) {
    'top' => 'rounded-t-full',
    'bottom' => 'rounded-b-full',
    'both' => 'rounded-full',
    default => '',
  };
@endphp
<div {{ $attributes->class('flex gap-x-20') }}>
  @for ($i = 0; $i < $count; $i++)
    <div class="{{ $width }} {{ $color }} {{ $roundedClass }}">
    </div>
  @endfor
</div>
