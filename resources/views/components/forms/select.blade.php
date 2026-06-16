@props(['id', 'label', 'name' => null, 'options' => []])

<div class="w-full">

  <div class="relative">
    <label for="{{ $id }}" class="pointer-events-none absolute left-20 md:left-25 top-10 z-10 text-md md:text-xl font-medium uppercase">
      {{ $label }}
    </label>

    <select
      id="{{ $id }}"
      name="{{ $name ?? $id }}"
      {{ $attributes->merge(['class' => 'block w-full appearance-none rounded-full border border-yellow-500 px-20 md:px-25 pb-10 pt-30 md:pt-35 text-sm md:text-lg text-yellow-500! outline-none transition']) }}>
      @foreach($options as $value => $text)
        <option value="{{ $value }}">{{ $text }}</option>
      @endforeach
    </select>

    <x-icons.chevron-down class="pointer-events-none absolute right-20 md:right-16 top-1/2 w-24 h-24 md:w-32 md:h-32 shrink-0 -translate-y-1/2 text-yellow-500!" />
    
  </div>
</div>
