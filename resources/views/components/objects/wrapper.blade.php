@props([
  'buildings' => collect(),
  'filterOptions' => [],
  'apartments' => null,
  'labels' => [],
])

@if($buildings->flatten(1)->isEmpty())

  <p>Aktuell sind keine Objekte verfügbar.</p>

@else

  <div class="mb-30 md:mb-50">
    <x-objects.filter :options="$filterOptions" />
  </div>

  <div class="md:grid md:grid-cols-12 md:gap-x-24 lg:gap-x-48">

    {{-- Isometry (desktop) --}}
    <div class="hidden md:block md:col-span-5 lg:col-span-6">
      <x-objects.iso class="sticky top-120 w-full h-auto block overflow-visible" />
    </div>

    {{-- Object tables, grouped by building --}}
    <div class="md:col-span-7 lg:col-span-6 relative z-20">
      @foreach($buildings as $title => $apartments)
        <x-objects.building :apartments="$apartments" :building="$title" />
      @endforeach
    </div>

  </div>

@endif
