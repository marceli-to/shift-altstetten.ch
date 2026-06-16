@props(['class' => ''])
<div class="flex flex-col gap-y-20 md:grid md:grid-cols-12 md:gap-20 lg:gap-30 max-w-4xl">

  <div class="md:col-span-3">
    <x-apartments.filter.item 
      label="Verfügbarkeit"
      filter-type="object-state"
      :options="[
        'NULL' => 'Alle',
        'free' => 'frei',
        'reserved' => 'reserviert',
        'taken' => 'vermietet',
      ]"
      selected="NULL"
    />
  </div>
  
  <div class="md:col-span-3">
    <x-apartments.filter.item 
      label="Zimmer"
      filter-type="object-rooms"
      :options="[
        'NULL' => 'Alle',
        '1.0' => '1',
        '1.5' => '1.5',
        '2.5' => '2.5',
        '3.5' => '3.5',
        '4.5' => '4.5',
      ]"
      selected="NULL"
    />
  </div>

  <div class="md:col-span-3">
    <x-apartments.filter.item 
      label="Etage"
      filter-type="object-floor"
      :options="[
        'NULL' => 'Alle',
        '1.OG' => '1. OG',
        '2.OG' => '2. OG',
        '3.OG' => '3. OG',
        '4.OG' => '4. OG',
        '5.OG' => '5. OG',
        '6.OG' => '6. OG',
      ]"
      selected="NULL"
    />
  </div>

  <div class="md:col-span-3 flex items-end">
    <button class="js-btn-reset w-auto bg-mist hover:bg-abyss hover:text-white transition-all uppercase pt-4 pb-6 px-8 min-h-36 leading-none flex items-center">
      Zurücksetzen
    </button>
  </div>
</div>