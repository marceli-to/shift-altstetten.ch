@extends('app')
@section('content')

<!-- mobile view -->
<section class="min-h-[70vh] md:hidden">

  <div class="relative">
    <img src="/img/shift-bild-gebaeude-mobile.jpg" class="h-full w-full object-contain" />
    <div class="bg-linear-to-b from-transparent to-cocoa absolute z-20 top-[40%] left-0 right-0 h-[60%] opacity-60"></div>
    <h1 class="absolute z-30 bottom-60 left-20 flex flex-col text-white">
      <span class="font-bold text-[45px]">live & work</span>
      <span class="text-[20px]">Zürich-Altstetten</span>
    </h1>
    <x-bars class="absolute z-30 -bottom-62 right-20 h-194 gap-x-10" :count="6" :rounded="true" width="w-5" />
  </div>

  <div class="px-20 py-60 text-[20px]">
    <p>Durch nachhaltiges Bauen im Bestand entsteht an der Badenerstrasse 587-589, 8048 Zürich etwas Besonderes:</p>
    <p>Der ehemalige Electrolux-Standort wird sorgfältig transformiert – in Kleingewerbe und grosszügige Loftwohnungen mit markantem industriellem Flair. Vielleicht schon bald dein neues Zuhause oder dein zukünftiger Gewerbestandort?</p>
  </div>

  <div class="bg-cocoa text-blush px-20 flex justify-between">
    <div class="py-40">
      <h2 class="font-bold text-[20px] mb-30">
        Bis Sommer 2027 entstehen
      </h2>
      <div class="flex flex-col gap-y-20">
        <div class="flex items-center gap-x-12">
          <span class="text-[45px] font-bold w-56 text-right">24</span>
          <span class="text-[18px]">moderne, grosszügige Loftwohnungen</span>
        </div>
        <div class="flex items-center gap-x-12">
          <span class="text-[45px] font-bold w-56 text-right">12</span>
          <span class="text-[18px]">vollständig ausgebaute Kleinbüros</span>
        </div>
        <div class="flex items-center gap-x-12">
          <span class="text-[45px] font-bold w-56 text-right">10</span>
          <span class="text-[18px]">beheizte Lager-/ Hobbyräume mit Tageslicht</span>
        </div>
      </div>
    </div>
    <x-bars class="h-auto gap-x-10" :count="3" width="w-5" />
  </div>

  <div>
    <x-gallery.carousel name="room-gallery" :images="[
      '/img/shift-bild-umgebung-01',
      '/img/shift-bild-umgebung-02',
      '/img/shift-bild-umgebung-03',
      '/img/shift-bild-umgebung-04',
      '/img/shift-bild-umgebung-05',
    ]" />
  </div>

  <div class="px-20 pt-60 pb-40 text-[20px]">
    <h2 class="font-bold text-[30px] leading-[1.2] mb-10">
      Raumkonzepte mit industriellem Charme
    </h2>
    <p>Durch nachhaltiges Bauen im Bestand entsteht an der Badenerstrasse 587-589, 8048 Zürich etwas Besonderes:</p>
    <p>Der ehemalige Electrolux-Standort wird sorgfältig transformiert – in Kleingewerbe und grosszügige Loftwohnungen mit markantem industriellem Flair. Vielleicht schon bald dein neues Zuhause oder dein zukünftiger Gewerbestandort?</p>
  </div>

  <div class="bg-cocoa text-blush px-20">
    <div class="flex justify-between gap-x-40 pb-20">
      <div class="mt-40">
        <h2 class="text-[20px] font-bold text-balance">
          Entdecken Sie das Angebot
        </h2>
      </div>
      <div class="flex gap-x-20">
        <a href="" class="flex gap-x-5 h-auto">
          <span class="w-5 bg-blush rounded-b-full"></span>
          <span class="[writing-mode:vertical-rl] rotate-180 self-end pt-4 pb-5 text-[20px]">Wohnen</span>
        </a>
        <a href="" class="flex gap-x-5 h-auto">
          <span class="w-5 bg-blush rounded-b-full"></span>
          <span class="[writing-mode:vertical-rl] rotate-180 self-end pt-3 pb-5 text-[20px]">Gewerbe</span>
        </a>
      </div>
    </div>
  </div>

  <div class="px-20 pt-60 pb-40 text-[20px]">
    <h2 class="font-bold text-[30px] leading-[1.2] mb-10">
      Kunst am Bau
    </h2>
    <p>Gestalterische Elemente prägen SHIFT über die Architektur hinaus und verleihen dem Projekt zusätzliche Ausdruckskraft.</p>
  </div>

  <div>
    <x-gallery.carousel name="room-gallery" :images="[
      '/img/shift-bild-kunst-am-bau-01',
      '/img/shift-bild-kunst-am-bau-02',
      '/img/shift-bild-kunst-am-bau-03',
      '/img/shift-bild-kunst-am-bau-04',
      '/img/shift-bild-kunst-am-bau-05',
      '/img/shift-bild-kunst-am-bau-06',
    ]" />
  </div>

</section>

<!-- desktop view -->
<section class="hidden md:block">
  <div class="relative">
    <img src="/img/shift-bild-gebaeude.jpg" class="w-full h-[80vh] object-cover" />
    <div class="bg-linear-to-b from-transparent to-cocoa absolute z-20 top-[40%] left-0 right-0 h-[60%]"></div>

    <div class="absolute z-30 bottom-60 px-20 w-full flex flex-col gap-y-100">

      <div class="max-w-page mx-auto w-full">
        <h1 class="flex flex-col text-white">
          <span class="font-bold text-[100px] leading-none">live & work</span>
          <span class="text-[24px]">Zürich-Altstetten</span>
        </h1>
      </div>

      <div class="max-w-page mx-auto w-full text-blush flex justify-between">
        <div class="w-full max-w-[80rem]">
          <h2 class="font-bold text-[22px] mb-20">
            Bis Sommer 2027 entstehen
          </h2>
          <div class="w-full flex flex-wrap gap-40 lg:gap-x-60 lg:justify-between gap-y-20">
            <div class="flex items-center gap-x-12">
              <span class="text-[60px] font-bold w-70 text-right">24</span>
              <span class="text-[22px] leading-[1.1]">moderne, grosszügige<br>Loftwohnungen</span>
            </div>
            <div class="flex items-center gap-x-12">
              <span class="text-[60px] font-bold w-70 text-right">12</span>
              <span class="text-[22px] leading-[1.1]">vollständig<br>ausgebaute Kleinbüros</span>
            </div>
            <div class="flex items-center gap-x-12">
              <span class="text-[60px] font-bold w-70 text-right">10</span>
              <span class="text-[22px] leading-[1.1]">beheizte Lager-/<br>Hobbyräume mit Tageslicht</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
