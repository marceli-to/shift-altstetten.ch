@props([
  'image' => '',
  'name' => '',
  'role' => '',
  'phone' => '',
  'email' => '',
])
<div {{ $attributes->class('flex flex-col md:flex-row md:items-center gap-20 md:gap-30') }}>

  <x-media.picture
    :src="$image"
    :alt="$name"
    :width="800"
    :height="800"
    class="w-full h-auto aspect-square md:max-w-[375px]" />

  <article class="md:self-end">

    <x-headings.h2 class="text-[20px]! md:text-[22px]! mb-0!">
      {{ $name }}
    </x-headings.h2>

    {{ $role }}<br>
    <a 
      href="tel:{{ str_replace(' ', '', $phone) }}" 
      class="block no-underline hover:underline underline-offset-4 decoration-1"
      aria-label="Telefon an {{ $name }}">
      {{ $phone }}
    </a>
    <a 
      href="mailto:{{ $email }}" 
      class="block no-underline hover:underline underline-offset-4 decoration-1"
      aria-label="E-Mail an {{ $name }}">
      {{ $email }}
    </a>
  </article>

</div>
