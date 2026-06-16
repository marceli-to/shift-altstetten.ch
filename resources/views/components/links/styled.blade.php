@props([
  'href' => '',
  'target' => '_self',
  'class' => 'underline underline-offset-4 decoration-1 hover:no-underline',
])

<a href="{{ $href }}" target="{{ $target }}" class="{{ $class }}">{{ $slot }}</a>
