@props([
  'class' => '',
  'reverse' => false,
])

<x-layout.section :class="$class">

  <x-layout.inner class="!px-0 !max-w-none">

    <div class="lg:grid lg:grid-cols-2">

      <div class="py-40 md:py-60 px-20 xl:pr-60 self-center xl:ml-page-gutter xl:pl-0 {{ $reverse ? 'order-last' : '' }}">
        {{ $slot }}
      </div>

      @if(isset($aside))
      <div class="{{ $reverse ? 'order-first' : '' }}">
        {{ $aside }}
      </div>
      @endif

    </div>

  </x-layout.inner>

</x-layout.section>
