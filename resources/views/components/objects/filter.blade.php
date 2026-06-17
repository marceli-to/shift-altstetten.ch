@props(['options' => [], 'accent' => 'blush'])

@php
  $accentBg = $accent === 'sky' ? 'bg-sky' : 'bg-blush';

  // Reuse the data-driven options, but relabel the default ("Alle") entry per
  // dropdown so the closed select reads as a self-explanatory placeholder.
  $availability = collect($options['availability'] ?? [])->replace(['NULL' => 'Alle Wohnungen'])->all();
  $rooms = collect($options['rooms'] ?? [])->replace(['NULL' => 'Alle Zimmer'])->all();
  $floors = collect($options['floors'] ?? [])->replace(['NULL' => 'Alle Etagen'])->all();
@endphp

<div class="flex flex-col gap-15 md:grid md:grid-cols-12 md:gap-20">

  <div class="md:col-span-3">
    <x-forms.select
      id="availability"
      label="Verfügbarkeit"
      class="js-filter-attribute"
      data-filterType="object-state"
      :options="$availability"
      :accent="$accent" />
  </div>

  <div class="flex gap-15 md:contents">
    <div class="w-full md:col-span-3">
      <x-forms.select
        id="rooms"
        label="Zimmer"
        class="js-filter-attribute"
        data-filterType="object-rooms"
        :options="$rooms"
        :accent="$accent" />
    </div>

    <div class="w-full md:col-span-3">
      <x-forms.select
        id="floor"
        label="Etage"
        class="js-filter-attribute"
        data-filterType="object-floor"
        :options="$floors"
        :accent="$accent" />
    </div>
  </div>

  <div class="md:col-span-3">
    <button
      type="button"
      class="js-btn-reset block w-full px-20 py-14 text-left text-md md:text-lg font-bold uppercase text-cocoa transition-opacity hover:opacity-80 {{ $accentBg }}">
      Filter zurücksetzen
    </button>
  </div>

</div>
