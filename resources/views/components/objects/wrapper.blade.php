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

  <div class="mb-30 md:mb-50">
    <x-objects.filter :options="$filterOptions" :accent="$accent" />
  </div>

  <div class="md:grid md:grid-cols-12 md:gap-x-24 lg:gap-x-48 md:items-start">

    {{-- Isometry --}}
    <div class="mb-30 md:mb-0 md:order-2 md:col-span-5 lg:col-span-6">
      <x-objects.iso class="sticky top-120 block w-full h-auto overflow-visible" />
    </div>

    {{-- Object tables --}}
    <div class="md:order-1 md:col-span-7 lg:col-span-6 relative z-20">
      <x-objects.table :apartments="$apartments" :accent="$accent" />

      @if(!empty($extras))
        <x-objects.extras :items="$extras" :accent="$accent" />
      @endif
    </div>

  </div>

@endif
