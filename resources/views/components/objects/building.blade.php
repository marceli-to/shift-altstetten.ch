@props(['apartments', 'building'])

@php
  $first = $apartments->first();
  $heading = trim(($first['building']['address'] ?? '') . ' ' . ($first['building']['house_number'] ?? ''));
  $heading = $heading !== '' ? $heading : ('Haus ' . $building);

  $stateLabels = ['free' => 'frei', 'reserved' => 'reserviert', 'taken' => 'vermietet'];
  $stateColors = ['free' => 'bg-state-free', 'reserved' => 'bg-state-reserved', 'taken' => 'bg-state-taken'];

  $roomLabel = fn ($r) => rtrim(rtrim(number_format((float) $r, 1, '.', ''), '0'), '.');
  $price = fn ($v) => $v ? number_format($v, 0, '.', "’") : '–';
@endphp

<div data-building="{{ $building }}" class="mb-30 lg:mb-50">

  <x-headings.h2 class="mb-12">{{ $heading }}</x-headings.h2>

  <div class="w-full overflow-x-auto">
    <table class="w-full text-left" data-objects>
      <thead>
        <tr class="bg-cocoa text-cocoa font-display font-bold uppercase tracking-wider text-sm lg:text-lg [&>th]:py-8 [&>th]:px-5 [&>th]:align-bottom">
          <th>Nr.</th>
          <th>Etage</th>
          <th>Zi.</th>
          <th class="text-right">Fläche&nbsp;m²</th>
          <th class="text-right">Aussen&nbsp;m²</th>
          <th class="text-right">Brutto&nbsp;CHF</th>
          <th class="text-right">NK&nbsp;CHF</th>
          <th class="text-center">Plan</th>
          <th class="text-right">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($apartments as $apartment)
          @php
            $state = $apartment['state'] ?? 'free';
            $plan = $apartment['layout_plan'] ?? null;
            $outside = $apartment['balcony_area'] ?? $apartment['terrace_area'] ?? $apartment['loggia_area'] ?? null;
          @endphp
          <tr
            data-filterable
            data-object
            data-object-number="{{ $apartment['title'] }}"
            data-object-state="{{ $state }}"
            data-object-rooms="{{ $apartment['rooms'] }}"
            data-object-floor="{{ $apartment['floor'] }}"
            class="border-b border-cocoa text-sm lg:text-lg hover:bg-cocoa/50 transition-colors [&>td]:py-8 [&>td]:px-5">
            <td class="font-bold">{{ $apartment['title'] }}</td>
            <td>{{ $apartment['floor'] ?? '–' }}</td>
            <td>{{ $roomLabel($apartment['rooms'] ?? 0) }}</td>
            <td class="text-right">{{ $apartment['area'] ?? '–' }}</td>
            <td class="text-right">{{ $outside ?? '–' }}</td>
            <td class="text-right">{{ $price($apartment['rentalgross'] ?? null) }}</td>
            <td class="text-right">{{ $price($apartment['incidentals'] ?? null) }}</td>
            <td class="text-center">
              @if($plan && $plan !== '#')
                <a href="{{ $plan }}" target="_blank" rel="noopener"
                  class="inline-flex text-cocoa hover:text-cocoa/70" aria-label="Grundriss herunterladen">
                  <x-icons.file class="w-20 h-20" />
                </a>
              @else
                –
              @endif
            </td>
            <td>
              <div class="flex items-center justify-end gap-8 whitespace-nowrap">
                <span class="block w-8 h-8 rounded-full {{ $stateColors[$state] ?? 'bg-state-taken' }} shrink-0"></span>
                {{ $stateLabels[$state] ?? '' }}
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
