@props([
  'variant' => 'button',
  'class' => '',
])

@if($variant === 'file')
  <svg viewBox="0 0 37 46" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="{{ $class }}">
    <path d="M34.2 43.4H2V2H22.7L34.2 13.5V43.4Z" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M18.1 16.5084V32.5072" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M12.6628 27.07L18.1 32.5072L23.5372 27.07" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
@else
  <svg viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="{{ $class }}">
    <path d="M22.7 2V29.6" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M31.9 20.4L22.7 29.6L13.5 20.4" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M2 34.2V38.8C2 40.02 2.48464 41.19 3.34731 42.0527C4.20998 42.9154 5.38001 43.4 6.6 43.4H38.8C40.02 43.4 41.19 42.9154 42.0527 42.0527C42.9154 41.19 43.4 40.02 43.4 38.8V34.2" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
@endif
