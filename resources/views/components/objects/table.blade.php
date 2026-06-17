@props(['apartments' => collect(), 'accent' => 'blush'])

@php
  $accentBg = $accent === 'sky' ? 'bg-sky' : 'bg-blush';
  $accentHover = $accent === 'sky' ? 'hover:text-sky' : 'hover:text-blush';

  $stateDot = ['free' => 'bg-state-free', 'reserved' => 'bg-state-reserved', 'taken' => 'bg-state-taken'];
  $stateLabel = ['reserved' => 'reserviert', 'taken' => 'vermietet'];

  $roomLabel = fn ($r) => rtrim(rtrim(number_format((float) $r, 1, '.', ''), '0'), '.');
  $price = fn ($v) => $v ? 'CHF ' . number_format($v, 0, '.', '’') : '–';
@endphp

{{-- Desktop: full table --}}
<div class="hidden md:block">
  <table class="w-full text-left text-sm lg:text-lg" data-objects>
    <thead>
      <tr class="font-display font-bold uppercase text-cocoa {{ $accentBg }} [&>th]:py-10 [&>th]:px-8 [&>th:first-child]:pl-16 [&>th:last-child]:pr-16">
        <th>Nr</th>
        <th>Etage</th>
        <th>Zi</th>
        <th class="text-right">BWF</th>
        <th class="text-right">AF</th>
        <th class="text-right">Preis/Mt.</th>
        <th class="text-center">Plan</th>
        <th class="text-center">Anmeldung</th>
      </tr>
    </thead>
    <tbody>
      @foreach($apartments as $apartment)
        @php
          $state = $apartment['state'] ?? 'free';
          $plan = $apartment['layout_plan'] ?? null;
          $apply = $apartment['application_form'] ?? null;
          $outside = $apartment['balcony_area'] ?? $apartment['terrace_area'] ?? $apartment['loggia_area'] ?? null;
        @endphp
        <tr
          data-filterable
          data-object
          data-object-state="{{ $state }}"
          data-object-rooms="{{ $apartment['rooms'] }}"
          data-object-floor="{{ $apartment['floor'] }}"
          class="border-b border-cocoa [&>td]:py-10 [&>td]:px-8 [&>td:first-child]:pl-16 [&>td:last-child]:pr-16">
          <td class="font-bold whitespace-nowrap">
            <span class="mr-8 inline-block w-8 h-8 rounded-full align-middle {{ $stateDot[$state] ?? 'bg-state-taken' }}"></span>{{ $apartment['title'] }}
          </td>
          <td class="whitespace-nowrap">{{ $apartment['floor'] ?? '–' }}</td>
          <td>{{ $roomLabel($apartment['rooms'] ?? 0) }}</td>
          <td class="text-right">{{ $apartment['area'] ?? '–' }}</td>
          <td class="text-right">{{ $outside ?? '–' }}</td>
          <td class="text-right font-bold whitespace-nowrap">
            {{ $state === 'free' ? $price($apartment['rentalgross'] ?? null) : ($stateLabel[$state] ?? '') }}
          </td>
          <td class="text-center">
            @if($plan && $plan !== '#')
              <a href="{{ $plan }}" target="_blank" rel="noopener"
                class="inline-flex text-cocoa transition-opacity hover:opacity-60" aria-label="Grundriss herunterladen">
                <x-icons.download class="w-18 h-auto" />
              </a>
            @else
              –
            @endif
          </td>
          <td class="text-center">
            @if($state === 'free')
              <a
                href="{{ $apply && $apply !== '#' ? $apply : 'javascript:;' }}"
                @if($apply && $apply !== '#') target="_blank" rel="noopener" @endif
                class="inline-flex items-center rounded-full border border-cocoa px-14 py-4 text-xs uppercase tracking-wide transition-colors hover:bg-cocoa {{ $accentHover }}">
                Anfrage
              </a>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{-- Mobile: accordion --}}
<div class="md:hidden">
  @foreach($apartments as $apartment)
    @php
      $state = $apartment['state'] ?? 'free';
      $plan = $apartment['layout_plan'] ?? null;
      $apply = $apartment['application_form'] ?? null;
      $outside = $apartment['balcony_area'] ?? $apartment['terrace_area'] ?? $apartment['loggia_area'] ?? null;
    @endphp
    <div
      data-filterable
      data-object
      data-object-state="{{ $state }}"
      data-object-rooms="{{ $apartment['rooms'] }}"
      data-object-floor="{{ $apartment['floor'] }}"
      x-data="{ open: false }"
      class="border-b border-cocoa">

      <div
        @click="open = !open"
        role="button"
        tabindex="0"
        @keydown.enter="open = !open"
        @keydown.space.prevent="open = !open"
        :aria-expanded="open"
        class="flex w-full cursor-pointer items-center gap-x-12 py-14 text-left">
        <span class="flex w-[56px] shrink-0 items-center gap-x-8 font-bold">
          <span class="inline-block w-8 h-8 shrink-0 rounded-full {{ $stateDot[$state] ?? 'bg-state-taken' }}"></span>
          {{ $roomLabel($apartment['rooms'] ?? 0) }}
        </span>
        <span class="flex-1 font-bold whitespace-nowrap">
          {{ $state === 'free' ? $price($apartment['rentalgross'] ?? null) : ($stateLabel[$state] ?? '') }}
        </span>
        @if($state === 'free')
          <a
            href="{{ $apply && $apply !== '#' ? $apply : 'javascript:;' }}"
            @if($apply && $apply !== '#') target="_blank" rel="noopener" @endif
            @click.stop
            class="inline-flex shrink-0 items-center rounded-full border border-cocoa px-12 py-3 text-xs uppercase tracking-wide">
            Anfrage
          </a>
        @endif
        <span class="shrink-0 transition-transform" :class="{ 'rotate-180': open }">
          <x-icons.chevron-down class="w-22 h-22 text-cocoa" />
        </span>
      </div>

      <div x-show="open" x-cloak x-transition.opacity class="pb-16">
        <dl class="text-sm">
          <div class="flex justify-between border-t border-cocoa/30 py-6">
            <dt>Nr</dt><dd class="font-medium">{{ $apartment['title'] }}</dd>
          </div>
          <div class="flex justify-between border-t border-cocoa/30 py-6">
            <dt>BWF:</dt><dd class="font-medium">{{ $apartment['area'] ?? '–' }} m²</dd>
          </div>
          <div class="flex justify-between border-t border-cocoa/30 py-6">
            <dt>Etage:</dt><dd class="font-medium">{{ $apartment['floor'] ?? '–' }}</dd>
          </div>
          <div class="flex justify-between border-t border-cocoa/30 py-6">
            <dt>Aussenfläche:</dt><dd class="font-medium">{{ $outside ?? '–' }} m²</dd>
          </div>
        </dl>
        @if($plan && $plan !== '#')
          <div class="mt-12">
            <a href="{{ $plan }}" target="_blank" rel="noopener"
              class="inline-flex items-center gap-x-8 rounded-full border border-cocoa px-14 py-6 text-xs uppercase tracking-wide">
              <x-icons.download variant="file" class="w-14 h-auto" />
              Grundriss
            </a>
          </div>
        @endif
      </div>

    </div>
  @endforeach
</div>
