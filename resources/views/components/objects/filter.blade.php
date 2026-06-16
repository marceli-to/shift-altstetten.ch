@props(['options' => []])

<div class="flex flex-col gap-15 md:grid md:grid-cols-12 md:gap-20 md:max-w-4xl">

  <div class="md:col-span-4">
    <x-forms.select
      id="availability"
      label="Verfügbarkeit"
      class="js-filter-attribute"
      data-filterType="object-state"
      :options="$options['availability'] ?? []" />
  </div>

  <div class="flex gap-15 md:col-span-8 md:grid md:grid-cols-2 md:gap-20">

    <div class="w-full md:w-auto">
      <x-forms.select
        id="rooms"
        label="Zimmer"
        class="js-filter-attribute"
        data-filterType="object-rooms"
        :options="$options['rooms'] ?? []" />
    </div>

    <div class="w-full md:w-auto">
      <x-forms.select
        id="floor"
        label="Etage"
        class="js-filter-attribute"
        data-filterType="object-floor"
        :options="$options['floors'] ?? []" />
    </div>

  </div>

  <div class="w-full md:col-span-12 flex items-end">
    <x-buttons.primary href="javascript:;" class="js-btn-reset py-8! px-10! text-xxs!" :icon="false">
      Filter zurücksetzen
    </x-buttons.primary>
  </div>

</div>
