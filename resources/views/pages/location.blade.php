@extends('app')
@section('meta_title', 'Lage')
@section('meta_description', 'Die Liegenschaft an der Badenerstrasse 587–589 liegt mitten im lebendigen Zürcher Quartier Altstetten – und verbindet zentrale Lage mit einer Leichtigkeit im Alltag, die man sofort spürt.')
@section('content')

@php
  $locationImages = [
    '/img/shift-bild-umgebung-01',
    '/img/shift-bild-umgebung-02',
    '/img/shift-bild-umgebung-03',
    '/img/shift-bild-umgebung-04',
    '/img/shift-bild-umgebung-05',
    '/img/shift-bild-umgebung-06',
  ];

  $transitTable = [
    'columns' => ['Ort', 'Auto', 'ÖV'],
    'rows' => [
      ['Zürich HB', '15 Min.', '20 Min.'],
      ['Zürich Flughafen', '20 Min.', '35 Min.'],
      ['Schlieren', '10 Min.', '10 Min.'],
    ],
  ];

  $localTable = [
    'columns' => ['Ort', 'Fahrrad', 'zu Fuss'],
    'rows' => [
      ['Bahnhof Altstetten', '4 Min.', '14 Min.'],
      ['Coop Pronto', '1 Min.', '1 Min.'],
      ['ALDI Suisse', '1 Min.', '4 Min.'],
      ['Primar-/Sekundarschule Kappeli', '2 Min.', '5 Min.'],
      ['Einkaufszentrum Letzipark', '3 Min.', '5 Min.'],
      ['Stadion Letzigrund', '4 Min.', '11 Min.'],
      ['Freibad Letzigraben', '6 Min.', '17 Min.'],
      ['Freibad Altstetten', '8 Min.', '17 Min.'],
    ],
  ];
@endphp

  <x-layout.split>

    <div data-reveal>
      <x-headings.h1 class="font-bold text-[30px] md:text-[40px] mb-10">
        Lage
      </x-headings.h1>

      <div class="text-[20px] md:text-[22px]">
        <p>Die Liegenschaft an der Badenerstrasse 587–589 liegt mitten im lebendigen Zürcher Quartier Altstetten – und verbindet zentrale Lage mit einer Leichtigkeit im Alltag, die man sofort spürt.</p>
        <p>Die Tramhaltestelle «Kappeli» befindet sich direkt vor der Haustür. Von hier aus bist du in wenigen Minuten in der Zürcher Innenstadt. Auch der Bahnhof Altstetten ist schnell erreichbar und eröffnet zusätzliche Mobilität: Mit direkten Anschlüssen an das S-Bahnnetz erreichst du wichtige Destinationen wie den Flughafen Zürich, Zug, Luzern oder Basel bequem und ohne Umwege. Gleichzeitig sorgen die nahegelegenen Autobahnanschlüsse A1 und A3 für eine optimale Erschliessung im Individualverkehr.</p>
        <p>Doch die Qualität dieser Lage zeigt sich vor allem im Alltag: Einkaufsmöglichkeiten, Cafés, Restaurants und Dienstleistungen liegen in unmittelbarer Gehdistanz. Gleichzeitig bietet das Quartier mit seiner Mischung aus Wohnen, Arbeiten und Freizeit ein lebendiges und vielseitiges Umfeld mit städtischem Charakter.</p>
      </div>

    </div>

    <x-slot:aside>
      <x-gallery.carousel name="location-gallery" :images="$locationImages" />
    </x-slot:aside>

  </x-layout.split>

  <x-layout.section class="py-40 md:py-100">
    <x-layout.inner class="px-0! md:px-20!" data-reveal>

      <x-headings.h2 class="mb-30! md:mb-40! px-20 md:px-0!">
        Mobilität und Anschlüsse
      </x-headings.h2>

      <div class="flex flex-col gap-y-30">
        <x-blocks.distance-table :columns="$transitTable['columns']" :rows="$transitTable['rows']" />
        <x-blocks.distance-table :columns="$localTable['columns']" :rows="$localTable['rows']" />
      </div>

    </x-layout.inner>
  </x-layout.section>

  <x-layout.section data-reveal>
    <div
      id="map"
      data-zoom="15"
      class="w-full aspect-[4/3] md:aspect-[16/7] 2xl:aspect-[16/6] bg-cocoa/5"></div>
  </x-layout.section>

@endsection
