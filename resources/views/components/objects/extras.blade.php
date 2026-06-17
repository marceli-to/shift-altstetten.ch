@props(['items' => [], 'accent' => 'blush'])

@php
  $accentBg = $accent === 'sky' ? 'bg-sky' : 'bg-blush';
@endphp

<div class="mt-30 md:mt-50">
  <table class="w-full text-left text-sm lg:text-lg">
    <thead>
      <tr class="font-display font-bold uppercase text-cocoa {{ $accentBg }} [&>th]:py-10 [&>th]:px-8 [&>th:first-child]:pl-16 [&>th:last-child]:pr-16">
        <th>Typ</th>
        <th class="text-right">Preis/Mt.</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
        <tr class="border-b border-cocoa font-bold [&>td]:py-10 [&>td]:px-8 [&>td:first-child]:pl-16 [&>td:last-child]:pr-16">
          <td>{{ $item['type'] ?? '' }}</td>
          <td class="text-right whitespace-nowrap">{{ $item['price'] ?? '' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
