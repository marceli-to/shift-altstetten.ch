@props([
  'name',
  'placeholder' => '',
  'value' => null,
])

<textarea
  name="{{ $name }}"
  id="{{ $name }}"
  placeholder="{{ $placeholder }}"
  @error($name) aria-invalid="true" @enderror
  {{ $attributes->class([
    'w-full border bg-transparent min-h-[180px] p-14 text-xl leading-[1.35] outline-none text-cocoa placeholder:text-cocoa/50 transition-colors focus:bg-cocoa/[0.04]',
    'border-cocoa' => ! $errors->has($name),
    'border-state-taken' => $errors->has($name),
  ]) }}>{{ old($name, $value) }}</textarea>
