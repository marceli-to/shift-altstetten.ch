@props(['items' => [], 'accent' => 'blush'])

@php
  $accentBg = $accent === 'sky' ? 'bg-sky' : 'bg-blush';
@endphp

<div class="mt-30 md:mt-50">

  {{-- Desktop: full table --}}
  <table class="hidden lg:table w-full text-left">
    <thead>
      <tr class="font-bold text-cocoa {{ $accentBg }} [&>th]:h-46">
        <th class="pl-20">Typ</th>
        <th class="pr-20 text-right">Preis/Mt.</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
        <tr class="border-b border-cocoa [&>td]:font-bold [&>td]:h-54">
          <td class="pl-20">{{ $item['type'] ?? '' }}</td>
          <td class="pr-20 text-right whitespace-nowrap">{{ $item['price'] ?? '' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{-- Mobile: grid — break out of the page gutter so the bands/lines run edge to edge --}}
  <div class="lg:hidden -mx-20 md:mx-0">

    {{-- Column header --}}
    <div class="grid grid-cols-[1fr_1fr] items-center px-20 h-50 text-[20px] font-bold text-cocoa {{ $accentBg }}">
      <span>Typ</span>
      <span class="text-right">Preis/Mt.</span>
    </div>

    @foreach($items as $item)
      <div class="grid grid-cols-[1fr_1fr] items-center px-20 h-50 text-[20px] font-bold border-b border-cocoa">
        <span>{{ $item['type'] ?? '' }}</span>
        <span class="whitespace-nowrap text-right">{{ $item['price'] ?? '' }}</span>
      </div>
    @endforeach

  </div>

</div>
