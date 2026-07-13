@props([
  'apartments' => collect(),
  'filterOptions' => [],
  'accent' => 'blush',
  'extras' => [],
  'labels' => [],
])

@if($apartments->isEmpty())
  <p>Aktuell sind keine Objekte verfügbar.</p>
@else

  <div class="mb-30 lg:mb-40 2xl:mb-50">
    <x-objects.filter :options="$filterOptions" :accent="$accent" />
  </div>

  <div class="lg:grid lg:grid-cols-12 lg:gap-x-60 xl:gap-x-80 lg:items-start">

    {{-- Isometry --}}
    <div class="mb-20 lg:mb-0 lg:order-2 lg:col-span-5 sticky top-80 lg:top-120 bg-white z-40 -mx-20 lg:mx-0 p-20 lg:p-0">
      <x-objects.iso class="block w-full h-auto overflow-visible lg:mt-120 xl:mt-160 max-w-[70%] xl:max-w-[80%] mx-auto" />
    </div>

    {{-- Object tables --}}
    <div class="lg:order-1 lg:col-span-7 relative z-20">
      <x-objects.table :apartments="$apartments" :accent="$accent" />

      @if(!empty($extras))
        {{-- <x-objects.extras :items="$extras" :accent="$accent" /> --}}
      @endif
    </div>

  </div>

@endif
