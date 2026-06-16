@props([
  'href' => '',
  'target' => '_self',
  'label' => null,
  'class' => 'underline underline-offset-4 decoration-1 hover:no-underline',
])

<a href="{{ $href }}" target="{{ $target }}" @if($label) aria-label="{{ $label }}" @endif class="{{ $class }}">{{ $slot }}</a>
