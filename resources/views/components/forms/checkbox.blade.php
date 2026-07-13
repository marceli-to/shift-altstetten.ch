@props([
  'name',
  'id' => null,
])

@php $id ??= $name; @endphp

<label
  for="{{ $id }}"
  class="flex items-start gap-10 text-md md:text-lg leading-[1.35] {{ $errors->has($name) ? 'text-state-taken' : '' }}">
  <input
    type="checkbox"
    name="{{ $name }}"
    id="{{ $id }}"
    value="1"
    @checked(old($name))
    class="mt-3 w-18 h-18 shrink-0 accent-cocoa">
  <span>Ich habe die <a href="{{ route('page.privacy') }}" target="_blank" class="underline underline-offset-4 decoration-1 hover:no-underline">Datenschutzerklärung</a> gelesen und akzeptiere diese.</span>
</label>
