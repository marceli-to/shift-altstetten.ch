@props(['options' => [], 'accent' => 'blush'])

@php
  $availability = collect($options['availability'] ?? [])->replace(['NULL' => 'Alle Wohnungen'])->all();
  $rooms = collect($options['rooms'] ?? [])->replace(['NULL' => 'Alle Zimmer'])->all();
  $floors = collect($options['floors'] ?? [])->replace(['NULL' => 'Alle Etagen'])->all();
@endphp

<div class="grid grid-cols-1 gap-15 sm:grid-cols-2 lg:grid-cols-12 lg:gap-20">

  <div class="lg:col-span-3">
    <x-forms.select
      id="availability"
      label="Verfügbarkeit"
      class="js-filter-attribute"
      data-filterType="object-state"
      :options="$availability"
      :accent="$accent" />
  </div>

  <div class="lg:col-span-3">
    <x-forms.select
      id="rooms"
      label="Zimmer"
      class="js-filter-attribute"
      data-filterType="object-rooms"
      :options="$rooms"
      :accent="$accent" />
  </div>

  <div class="lg:col-span-3">
    <x-forms.select
      id="floor"
      label="Etage"
      class="js-filter-attribute"
      data-filterType="object-floor"
      :options="$floors"
      :accent="$accent" />
  </div>

  <div class="lg:col-span-3">
    <button
      type="button"
      class="js-btn-reset flex h-50 lg:h-46 w-full cursor-pointer items-center px-10 font-bold text-cocoa transition-opacity hover:opacity-80 {{ $accent === 'sky' ? 'bg-sky' : 'bg-blush' }}">
      Filter zurücksetzen
    </button>
  </div>

</div>
