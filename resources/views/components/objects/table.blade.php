@props(['apartments' => collect(), 'accent' => 'blush'])

@php
  $accentBg = $accent === 'sky' ? 'bg-sky' : 'bg-blush';
  $accentBgHover = $accent === 'sky' ? 'hover:bg-sky/20' : 'hover:bg-blush/20';
  // Same tint as the row hover, applied when the matching iso shape is hovered.
  $accentBgActive = $accent === 'sky' ? '[&.is-active]:bg-sky/20' : '[&.is-active]:bg-blush/20';

  // Wohnen shows the Wohnfläche (WFL); Gewerbe keeps its own area label.
  $areaLabel = $accent === 'sky' ? 'BWF' : 'WFL';

  $stateDot = ['free' => 'bg-state-free', 'reserved' => 'bg-state-reserved', 'taken' => 'bg-state-taken'];
  $stateLabel = ['reserved' => 'reserviert', 'taken' => 'vermietet'];

  $roomLabel = fn ($r) => rtrim(rtrim(number_format((float) $r, 1, '.', ''), '0'), '.');
  $price = fn ($v) => $v ? 'CHF ' . number_format($v, 0, '.', '’') : '–';

  // Net rent and incidental costs shown in separate columns. Melon exposes
  // rentalgross_net directly; the mock only has the gross, so derive the net
  // from gross minus incidentals as a fallback.
  $priceParts = function ($apt) {
    $incid = (int) ($apt['incidentals'] ?? 0);
    $net = $apt['rentalgross_net'] ?? (isset($apt['rentalgross']) ? (int) $apt['rentalgross'] - $incid : null);
    return [$net, $incid];
  };
  $chf = fn ($v) => $v !== null ? 'CHF ' . number_format((float) $v, 0, '.', '’') : '–';

  // Shared grid template so the mobile column header and every row stay aligned.
  $mobileGrid = '';
@endphp

{{-- Desktop: full table --}}
<div class="hidden lg:block">
  <table class="w-full text-left text-[16px] xl:text-[18px]" data-objects>
    <thead>
      <tr class="font-bold text-cocoa {{ $accentBg }} [&>th]:h-46 [&>th]:leading-none">
        <th class="pl-20">Nr</th>
        <th>Etage</th>
        <th>Zi</th>
        <th class="text-right">{{ $areaLabel }}</th>
        <th class="text-right">AF</th>
        <th class="text-right">Netto</th>
        <th class="text-right">NK</th>
        <th class="text-center px-20">Plan</th>
        <th class="text-right pr-20">Anmeldung</th>
      </tr>
    </thead>
    <tbody>
      @foreach($apartments as $apartment)
        @php
          $state = $apartment['state'] ?? 'free';
          $apply = $apartment['application_form'] ?? null;
          $outside = $apartment['balcony_area'] ?? $apartment['terrace_area'] ?? $apartment['loggia_area'] ?? null;
        @endphp
        <tr
          data-filterable
          data-object
          data-object-number="{{ \Illuminate\Support\Str::lower($apartment['title']) }}"
          data-object-state="{{ $state }}"
          data-object-rooms="{{ $apartment['rooms'] }}"
          data-object-floor="{{ $apartment['floor'] }}"
          class="border-b border-cocoa [&>td]:h-54 {{ $accentBgHover }} {{ $accentBgActive }}">

          <td class="pl-4">
            <div class="flex items-center gap-x-8">
              <span class="inline-block w-8 h-8 rounded-full align-middle {{ $stateDot[$state] ?? 'bg-state-taken' }}"></span>
              <span>{{ $apartment['title'] }}</span>
            </div>
          </td>

          <td class="whitespace-nowrap">
            {{ $apartment['floor'] ?? '–' }}
          </td>
          
          <td>
            {{ $roomLabel($apartment['rooms'] ?? 0) }}
          </td>

          <td class="text-right">
            {{ $apartment['area'] ?? '–' }}
          </td>

          <td class="text-right">
            {{ $outside ?? '–' }}
          </td>

          @php [$net, $incid] = $priceParts($apartment); @endphp
          <td class="text-right whitespace-nowrap">
            {{ $state === 'free' ? $chf($net) : ($stateLabel[$state] ?? '') }}
          </td>

          <td class="text-right whitespace-nowrap">
            {{ $state === 'free' ? $chf($incid) : '' }}
          </td>

          <td class="text-center">
              <a 
                href="#" 
                target="_blank" 
                rel="noopener"
                class="inline-flex text-cocoa transition-opacity hover:opacity-60" 
                aria-label="Grundriss herunterladen">
                <x-icons.download class="w-20 h-auto" />
              </a>
          </td>

          <td class="text-right pr-20">
            @if($state === 'free')
              <a
                href="#"
                target="_blank" 
                rel="noopener"
                aria-label="Anfrage für Wohnung {{ $apartment['title'] }}"
                @click.stop
                class="inline-flex items-center rounded-full border font-normal uppercase border-cocoa px-10 py-4">
                Anfrage
              </a>
            @else
              &nbsp;
            @endif
          </td>
          
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{-- Mobile: accordion — break out of the page gutter so the bands/lines run edge to edge --}}
<div class="lg:hidden -mx-20 md:mx-0">

  {{-- Column header --}}
  <div class="grid grid-cols-[1fr_1fr_1fr_16px] items-center px-20 h-54 text-[20px] font-bold text-cocoa {{ $accentBg }}">
    <span>Zimmer</span>
    <span>Preis/Mt.</span>
    <span>Anmeldung</span>
    <span></span>
  </div>

  @foreach($apartments as $apartment)
    @php
      $state = $apartment['state'] ?? 'free';
      $plan = $apartment['layout_plan'] ?? null;
      $apply = $apartment['application_form'] ?? null;
      $outside = $apartment['balcony_area'] ?? $apartment['terrace_area'] ?? $apartment['loggia_area'] ?? null;
      [$net, $incid] = $priceParts($apartment);
    @endphp
    <div
      data-filterable
      data-object
      data-object-number="{{ \Illuminate\Support\Str::lower($apartment['title']) }}"
      data-object-state="{{ $state }}"
      data-object-rooms="{{ $apartment['rooms'] }}"
      data-object-floor="{{ $apartment['floor'] }}"
      x-data="{ open: false }"
      class="border-b border-cocoa {{ $accentBgActive }}">

      <div
        @click="open = !open"
        role="button"
        tabindex="0"
        @keydown.enter="open = !open"
        @keydown.space.prevent="open = !open"
        :aria-expanded="open"
        class="grid grid-cols-[1fr_1fr_1fr_16px] items-center px-20 w-full cursor-pointer h-54 text-left text-[20px] font-bold">

        <span class="flex items-center gap-x-8 -ml-10">
          <span class="inline-block w-9 h-9 shrink-0 rounded-full {{ $stateDot[$state] ?? 'bg-state-taken' }}"></span>
          {{ $roomLabel($apartment['rooms'] ?? 0) }}
        </span>

        <span class="font-normal text-[15px] leading-tight">
          @if($state === 'free')
            {{ $chf($net) }}<br><span class="text-cocoa/70">+ {{ number_format($incid, 0, '.', '’') }} NK</span>
          @else
            {{ $stateLabel[$state] ?? '' }}
          @endif
        </span>

        
          <span>
            @if($state === 'free')
              <a
                href="#"
                target="_blank" 
                rel="noopener"
                aria-label="Anfrage für Wohnung {{ $apartment['title'] }}"
                @click.stop
                class="inline-flex items-center rounded-full border font-normal uppercase border-cocoa px-10 py-4">
                Anfrage
              </a>
            @else
              &nbsp;
            @endif
          </span>


        <span class="justify-self-end transition-transform" :class="{ 'rotate-180': open }">
          <x-icons.chevron-down class="w-16 h-auto text-cocoa" />
        </span>

      </div>

      <div 
        x-show="open" 
        x-cloak 
        x-transition.opacity 
        class="pl-25 pr-20 pb-10">

        <dl class="border-t border-cocoa pt-5">
          <div class="flex justify-between py-8">
            <dt>Nr</dt>
            <dd>{{ $apartment['title'] }}</dd>
          </div>
          <div class="flex justify-between py-8">
            <dt>{{ $areaLabel }}:</dt>
            <dd>{{ $apartment['area'] ?? '–' }} m²</dd>
          </div>
          <div class="flex justify-between py-8">
            <dt>Etage:</dt>
            <dd>{{ $apartment['floor'] ?? '–' }}</dd>
          </div>
          <div class="flex justify-between py-8">
            <dt>Aussenfläche:</dt>
            <dd>{{ $outside ?? '–' }} m²</dd>
          </div>
          <div class="flex justify-between py-8">
            <dt>Netto/Mt.:</dt>
            <dd>{{ $chf($net) }}</dd>
          </div>
          <div class="flex justify-between py-8">
            <dt>Nebenkosten:</dt>
            <dd>{{ $chf($incid) }}</dd>
          </div>
        </dl>

        <div class="mt-10 flex justify-end">
          <a
            href="#"
            target="_blank" 
            rel="noopener"
            aria-label="Grundriss für Wohnung {{ $apartment['title'] }}"
            class="inline-flex gap-x-6 items-center rounded-full border font-normal border-cocoa px-12 py-4 uppercase">
            <x-icons.download variant="file" class="w-14 h-auto" />
            Grundriss
          </a>
        </div>

      </div>

    </div>
  @endforeach
</div>
