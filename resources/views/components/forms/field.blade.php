@props([
  'name',
  'type' => 'text',
  'placeholder' => '',
  'required' => false,
  'value' => null,
])

<input
  type="{{ $type }}"
  name="{{ $name }}"
  id="{{ $name }}"
  value="{{ old($name, $value) }}"
  placeholder="{{ $placeholder }}"
  @if($required) required @endif
  @error($name) aria-invalid="true" @enderror
  {{ $attributes->class([
    'w-full border bg-transparent h-52 px-14 text-xl leading-none outline-none text-cocoa placeholder:text-cocoa/50 transition-colors focus:bg-cocoa/[0.04]',
    'border-cocoa' => ! $errors->has($name),
    'border-state-taken' => $errors->has($name),
  ]) }}>
