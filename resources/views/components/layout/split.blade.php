@props([
  'class' => '',
  'reverse' => false,
])

<x-layout.section :class="$class">

  <x-layout.inner class="!px-0 !max-w-none">

    <div class="lg:grid lg:grid-cols-2">

      <div @class([
        'py-40 md:py-60 px-20 self-center',
        'xl:pr-60 xl:pl-0 xl:ml-[calc(max(0px,(100vw_-_var(--container-page))/2)_+_30px)]' => ! $reverse,
        'order-last xl:pl-60 xl:pr-0 xl:mr-[calc(max(0px,(100vw_-_var(--container-page))/2)_+_30px)]' => $reverse,
      ])>
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
