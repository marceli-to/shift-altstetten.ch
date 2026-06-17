@extends('app')
@section('content')

<!-- mobile view -->
<x-layout.section class="min-h-[70vh] md:hidden">

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
    <div class="flex justify-between gap-x-100 pb-20">
      <div class="mt-40">
        <h2 class="text-[20px] font-bold text-balance">
          Entdecken Sie<br>unser Angebot
        </h2>
      </div>
      <div class="flex gap-x-20">
        <a 
          href="{{ route('page.living') }}" 
          class="flex gap-x-5 h-auto" 
          aria-label="Zu den Wohnungen">
          <span class="w-5 bg-blush rounded-b-full"></span>
          <span class="[writing-mode:vertical-rl] rotate-180 self-end pt-4 pb-5 text-[20px]">Wohnen</span>
        </a>
        <a 
          href="{{ route('page.working') }}" 
          class="flex gap-x-5 h-auto" 
          aria-label="Zu den Gewerberäumen">
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

</x-layout.section>

<!-- desktop view -->
<div class="hidden md:block">

  <x-layout.section class="relative">

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

  </x-layout.section>

  <x-layout.split>

    <div class="text-[22px]">
      <p>Durch nachhaltiges Bauen im Bestand entsteht an der Badenerstrasse 587-589, 8048 Zürich etwas Besonderes:</p>
      <p>Der ehemalige Electrolux-Standort wird sorgfältig transformiert – in Kleingewerbe und grosszügige Loftwohnungen mit markantem industriellem Flair. Vielleicht schon bald dein neues Zuhause oder dein zukünftiger Gewerbestandort?</p>
    </div>

    <x-slot:aside>
      <x-gallery.carousel name="room-gallery" :images="[
        '/img/shift-bild-umgebung-01',
        '/img/shift-bild-umgebung-02',
        '/img/shift-bild-umgebung-03',
        '/img/shift-bild-umgebung-04',
        '/img/shift-bild-umgebung-05',
      ]" />
    </x-slot:aside>

  </x-layout.split>

  <x-layout.section class="py-80 2xl:py-100">

    <x-layout.inner>

      <h2 class="font-bold text-[40px] mb-10">
        Raumkonzepte mit industriellem Charme
      </h2>

      <x-layout.article class="text-[22px]">
        <p>Mit dem Projekt SHIFT entsteht ein vollständig saniertes Wohn- und Geschäftshaus mit gemischter Nutzung, das den Wandel moderner Wohn- und Arbeitsformen aufgreift. Flexible Raumkonzepte ermöglichen vielfältige Nutzungen und passen sich individuellen Bedürfnissen an.</p>
        <p>Das ehemalige Industriegebäude verbindet seine Geschichte mit klarer architektonischer Gestaltung und hoher baulicher Qualität. Durch die behutsame Umnutzung entstehen hohe, offene Räume mit unverwechselbarem industriellem Charme und einer besonderen Loft-Atmosphäre.</p>
        
        <div class="mt-56 2xl:mt-72">
          <div class="inline-flex justify-between items-end gap-x-80 2xl:gap-x-100 pb-20">
            <div class="bg-blue-100">
              <h2 class="text-[22px] font-bold text-balance">
                Entdecken Sie<br>unser Angebot
              </h2>
            </div>
            <div class="flex gap-x-20">
              <a 
                href="{{ route('page.living') }}" 
                class="flex gap-x-5 h-auto" 
                aria-label="Zu den Wohnungen">
                <span class="w-5 bg-cocoa rounded-t-full"></span>
                <span class="[writing-mode:vertical-rl] rotate-180 self-end pt-4 pb-5 text-[22px]">Wohnen</span>
              </a>
              <a 
                href="{{ route('page.working') }}" 
                class="flex gap-x-5 h-auto" 
                aria-label="Zu den Gewerberäumen">
                <span class="w-5 bg-cocoa rounded-t-full"></span>
                <span class="[writing-mode:vertical-rl] rotate-180 self-end pt-3 pb-5 text-[22px]">Gewerbe</span>
              </a>
            </div>
          </div>
        </div>      
      
      </x-layout.article>

    </x-layout.inner>

  </x-layout.section>

  <x-layout.split :reverse="true">

    <h2 class="font-bold text-[40px] mb-10">
      Kunst am Bau
    </h2>

    <div class="text-[22px]">
      <p>Gestalterische Elemente prägen SHIFT über die Architektur hinaus und verleihen dem Projekt zusätzliche Ausdruckskraft.</p>
    </div>

    <x-slot:aside>
      <x-gallery.carousel name="room-gallery" :images="[
        '/img/shift-bild-umgebung-01',
        '/img/shift-bild-umgebung-02',
        '/img/shift-bild-umgebung-03',
        '/img/shift-bild-umgebung-04',
        '/img/shift-bild-umgebung-05',
      ]" />
    </x-slot:aside>

  </x-layout.split>

</div>
@endsection
