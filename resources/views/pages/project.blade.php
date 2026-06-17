@extends('app')
@section('content')

@php
  $surroundingImages = [
    '/img/shift-bild-umgebung-01',
    '/img/shift-bild-umgebung-02',
    '/img/shift-bild-umgebung-03',
    '/img/shift-bild-umgebung-04',
    '/img/shift-bild-umgebung-05',
  ];
  $artworkImages = [
    '/img/shift-bild-kunst-am-bau-01',
    '/img/shift-bild-kunst-am-bau-02',
    '/img/shift-bild-kunst-am-bau-03',
    '/img/shift-bild-kunst-am-bau-04',
    '/img/shift-bild-kunst-am-bau-05',
    '/img/shift-bild-kunst-am-bau-06',
  ];
  $stats = [
    ['number' => 24, 'label' => "moderne, grosszügige\nLoftwohnungen"],
    ['number' => 12, 'label' => "vollständig\nausgebaute Kleinbüros"],
    ['number' => 10, 'label' => "beheizte Lager-/\nHobbyräume mit Tageslicht"],
  ];

  $introText = [
    '<p>Durch nachhaltiges Bauen im Bestand entsteht an der Badenerstrasse 587-589, 8048 Zürich etwas Besonderes:</p>',
    '<p>Der ehemalige Electrolux-Standort wird sorgfältig transformiert – in Kleingewerbe und grosszügige Loftwohnungen mit markantem industriellem Flair. Vielleicht schon bald dein neues Zuhause oder dein zukünftiger Gewerbestandort?</p>',
  ];

  $conceptTitle = 'Raumkonzepte mit industriellem Charme';
  $conceptText = [
    '<p>Mit dem Projekt SHIFT entsteht ein vollständig saniertes Wohn- und Geschäftshaus mit gemischter Nutzung, das den Wandel moderner Wohn- und Arbeitsformen aufgreift. Flexible Raumkonzepte ermöglichen vielfältige Nutzungen und passen sich individuellen Bedürfnissen an.</p>',
    '<p>Das ehemalige Industriegebäude verbindet seine Geschichte mit klarer architektonischer Gestaltung und hoher baulicher Qualität. Durch die behutsame Umnutzung entstehen hohe, offene Räume mit unverwechselbarem industriellem Charme und einer besonderen Loft-Atmosphäre.</p>',
  ];

  $artTitle = 'Kunst am Bau';
  $artText = [
    '<p>Gestalterische Elemente prägen SHIFT über die Architektur hinaus und verleihen dem Projekt zusätzliche Ausdruckskraft.</p>',
  ];
@endphp

<!-- mobile view -->
<x-layout.section class="md:hidden">

  <div class="relative">
    <x-media.picture
      src="/img/shift-bild-gebaeude-mobile"
      alt="Shift Altstetten Gebäude"
      :width="392"
      :height="614"
      class="h-[calc(100svh-80px)] w-full" />
    <div class="bg-linear-to-b from-transparent to-cocoa absolute z-20 top-[40%] left-0 right-0 h-[60%] opacity-60"></div>
    <x-blocks.hero-title class="absolute z-30 bottom-60 left-20" />
    <x-bars class="absolute z-30 -bottom-62 right-20 h-194 gap-x-10" :count="6" :rounded="true" width="w-5" />
  </div>

  <div class="px-20 py-60">
    @foreach($introText as $line)
      {!! $line !!}
    @endforeach
  </div>

  <div class="bg-cocoa text-blush px-20 flex justify-between">
    <div class="py-40">
      <x-blocks.stats variant="mobile" :stats="$stats" />
    </div>
    <x-bars class="h-auto gap-x-10" :count="3" width="w-5" />
  </div>

  <div>
    <x-gallery.carousel name="room-gallery" :images="$surroundingImages" />
  </div>

  <div class="px-20 pt-60 pb-40">
    <x-headings.h2>
      {{ $conceptTitle }}
    </x-headings.h2>
    @foreach($conceptText as $line)
      {!! $line !!}
    @endforeach
  </div>

  <div class="bg-cocoa text-blush px-20">
    <x-blocks.discover
      class="flex gap-x-100"
      heading-class="mt-40"
      bar-color="bg-blush"
      rounded="bottom"
      text-size="text-[20px]" />
  </div>

  <div class="px-20 pt-60 pb-40">
    <x-headings.h2>
      {{ $artTitle }}
    </x-headings.h2>
    @foreach($artText as $line)
      {!! $line !!}
    @endforeach
  </div>

  <div>
    <x-gallery.carousel name="room-gallery" :images="$artworkImages" />
  </div>

</x-layout.section>

<!-- desktop view -->
<div class="hidden md:block">

  <x-layout.section class="relative">

    <x-media.picture
      src="/img/shift-bild-gebaeude"
      alt="Shift Altstetten Gebäude"
      :width="1920"
      :height="1080"
      class="w-full h-[calc(100vh-94px)]" />
    <div class="bg-linear-to-b from-transparent to-cocoa absolute z-20 top-[40%] left-0 right-0 h-[60%]"></div>

    <div class="absolute z-30 bottom-60 px-20 w-full flex flex-col gap-y-100">

      <div class="max-w-page mx-auto w-full">
        <x-blocks.hero-title title-class="text-[100px] leading-none" subtitle-class="text-[24px]" />
      </div>

      <div class="max-w-page mx-auto w-full text-blush flex justify-between">
        <div class="w-full max-w-[80rem]">
          <x-blocks.stats variant="desktop" :stats="$stats" />
        </div>
      </div>

    </div>

  </x-layout.section>

  <x-layout.split>

    <div>
      @foreach($introText as $line)
        {!! $line !!}
      @endforeach
    </div>

    <x-slot:aside>
      <x-gallery.carousel name="room-gallery" :images="$surroundingImages" />
    </x-slot:aside>

  </x-layout.split>

  <x-layout.section class="py-80 2xl:py-100">

    <x-layout.inner>

      <x-headings.h2>
        {{ $conceptTitle }}
      </x-headings.h2>

      <x-layout.article>
        @foreach($conceptText as $line)
          {!! $line !!}
        @endforeach

        <div class="mt-56 2xl:mt-72">
          <x-blocks.discover
            class="inline-flex items-end gap-x-80 2xl:gap-x-100"
            bar-color="bg-cocoa"
            rounded="top"
            text-size="text-[22px]" />
        </div>
      
      </x-layout.article>

    </x-layout.inner>

  </x-layout.section>

  <x-layout.split :reverse="true">

    <x-headings.h2>
      {{ $artTitle }}
    </x-headings.h2>

    <div>
      @foreach($artText as $line)
        {!! $line !!}
      @endforeach
    </div>

    <x-slot:aside>
      <x-gallery.carousel name="room-gallery" :images="$artworkImages" />
    </x-slot:aside>

  </x-layout.split>

</div>
@endsection
