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
      ['Zürich Altstetten', '7 Min.', '10 Min.'],
      ['Zürich HB', '15 Min.', '20 Min.'],
      ['Zürich Flughafen', '20 Min.', '35 Min.'],
      ['Schlieren', '10 Min.', '10 Min.'],
    ],
  ];

  $localTable = [
    'columns' => ['Ort', 'Fahrrad', 'zu Fuss'],
    'rows' => [
      ['Coop Pronto', '1 Min.', '1 Min.'],
      ['ALDI Suisse', '1 Min.', '4 Min.'],
      ['Primar-/Sekundarschule Kappeli', '2 Min.', '5 Min.'],
      ['Einkaufszentrum Letzipark', '3 Min.', '5 Min.'],
      ['Stadion Letzigrund', '4 Min.', '11 Min.'],
      ['Freibad Letzigraben', '6 Min.', '17 Min.'],
      ['Hallenbad Altstetten', '8 Min.', '17 Min.'],
      ['Swiss Life Arena', '8 Min.', '25 Min.'],
    ],
  ];
@endphp

  <x-layout.split>

    <div data-reveal>
      <x-headings.h1 class="font-bold text-[30px] md:text-[40px] mb-10">
        Lage
      </x-headings.h1>

      <div class="text-[20px] md:text-[22px]">
        <p>SHIFT liegt mitten im lebendigen Zürcher Quartier Altstetten. Hier ist vieles nur wenige Schritte entfernt: Der erste Kaffee am Morgen, der spontane Einkauf, das Lieblingsrestaurant oder der Weg ins Grüne.</p>
        <p>Direkt vor der Haustür verbindet die Tramhaltestelle «Kappeli» das Quartier mit dem Zürcher Stadtzentrum. Über den Bahnhof Altstetten gelangen Sie bequem zum Flughafen Zürich sowie nach Zug, Luzern oder Basel. Auch die Autobahnanschlüsse A1 und A3 sind schnell erreichbar. Doch die wahre Qualität dieses Standorts zeigt sich im Alltag. In den kurzen Wegen. In der Vielfalt des Quartiers. Und in dem Gefühl, genau dort zu sein, wo sich Leben, Arbeiten und Freizeit auf natürliche Weise verbinden.</p>
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
