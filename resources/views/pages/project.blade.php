@extends('app')
@section('content')

@php
  $sliderImages = [
    '/img/cavegn-badenerstrasse-ext-c01',
    '/img/cavegn-badenerstrasse-int-c08',
    '/img/cavegn-badenerstrasse-int-c09',
    '/img/cavegn-badenerstrasse-int-c07',
  ];
  $artworkImages = [
    '/img/cavegn-badenerstrasse-kunst-am-bau-07',
    '/img/cavegn-badenerstrasse-kunst-am-bau-01',
    '/img/cavegn-badenerstrasse-kunst-am-bau-02',
    '/img/cavegn-badenerstrasse-kunst-am-bau-03',
    '/img/cavegn-badenerstrasse-kunst-am-bau-04',
    '/img/cavegn-badenerstrasse-kunst-am-bau-05',
    '/img/cavegn-badenerstrasse-kunst-am-bau-06',
    '/img/cavegn-badenerstrasse-kunst-am-bau-08',
    '/img/cavegn-badenerstrasse-kunst-am-bau-09',
  ];
  $stats = [
    ['number' => 45, 'label' => "moderne, lichtdurchflutete\nLoftwohnungen"],
    ['number' => 12, 'label' => "vollständig\nausgebaute Kleinbüros"],
    ['number' => 10, 'label' => "beheizte Lager-/\nHobbyräume mit Tageslicht"],
  ];

  $introTitle = 'SHIFT. Zürich Altstetten';
  $introText = [
    '<p>Wo einst gearbeitet wurde, entsteht heute Raum zum Leben, Arbeiten und Ankommen. Die ehemalige Gewerbeliegenschaft an der Badenerstrasse 587–589 wird sorgfältig in grosszügige Loftwohnungen und Kleingewerbeflächen mit industriellem Flair transformiert.</p>',
    '<p>Urban. Charakterstark. Unverwechselbar.<br>Vielleicht schon bald Ihr neues Zuhause.<br>Oder der Ort, an dem aus Ideen Wirklichkeit wird.</p>',
  ];

  $conceptTitle = 'Raumkonzepte mit industriellem Charme';
  $conceptText = [
    '<p>Manche Orte haben eine Geschichte – und genau darin liegt ihr Charakter.</p>',
    '<p>Mit SHIFT entsteht ein Wohn- und Geschäftshaus, das den Wandel unserer Zeit widerspiegelt. Ein Ort für Menschen, die Arbeit und Leben nicht trennen wollen, sondern beides harmonisch miteinander verbinden möchten. Räume, die sich mit ihren Bewohnern verändern, Freiraum schaffen und individuelle Lebensentwürfe ermöglichen. Durch die behutsame Umnutzung entstehen lichtdurchflutete Lofts und charaktervolle Gewerbeflächen. Sie zeichnen sich durch hohe Räume, rohe Materialien und die sichtbaren Spuren des ehemaligen Industriegebäudes aus.</p>',
  ];

  $artTitle = 'Kunst, die Begegnungen sichtbar macht';
  $artText = [
    '<p>Für SHIFT hat die Schweizer Künstlerin Anuschka Schiess ein eigens für das Projekt geschaffenes Kunstwerk entwickelt. Die rund 10 m² grosse Bauwand wird dabei zur lebendigen Leinwand – zu einem Ausdruck dessen, was diesen Ort ausmacht und künftig prägen wird.</p>',
    '<p>Farben, Formen und Bewegung erzählen von Vielfalt, Dynamik und dem Zusammenspiel unterschiedlichster Lebens- und Arbeitswelten. Sie stehen für Menschen, die sich begegnen, Ideen, die entstehen, und Geschichten, die hier neu geschrieben werden.</p>',
  ];
@endphp

<!-- mobile view -->
<x-layout.section class="md:hidden">

  <div class="relative">
    <x-media.picture
      src="/img/cavegn-badenerstrasse-ext-c02-mobile"
      alt="Shift Altstetten Gebäude"
      :width="392"
      :height="614"
      class="h-[calc(100svh-80px)] w-full" />
    <div class="bg-linear-to-b from-transparent to-cocoa absolute z-20 top-[40%] left-0 right-0 h-[60%] opacity-60"></div>
    <x-blocks.hero-title class="absolute z-30 bottom-60 left-20" />
    <x-bars class="absolute z-30 -bottom-62 right-20 h-194 gap-x-10" :count="6" :rounded="true" width="w-5" />
  </div>

  <div class="px-20 py-60" data-reveal>
    <x-headings.h2>
      {{ $introTitle }}
    </x-headings.h2>
    @foreach($introText as $line)
      {!! $line !!}
    @endforeach
  </div>

  <div class="bg-cocoa text-blush px-20 flex justify-between">
    <div class="py-40" data-reveal>
      <x-blocks.stats variant="mobile" :stats="$stats" />
    </div>
    <x-bars class="h-auto gap-x-10" :count="3" width="w-5" />
  </div>

  <div>
    <x-gallery.carousel name="room-gallery" :images="$sliderImages" />
  </div>

  <div class="px-20 pt-60 pb-40" data-reveal>
    <x-headings.h2>
      {{ $conceptTitle }}
    </x-headings.h2>
    @foreach($conceptText as $line)
      {!! $line !!}
    @endforeach
  </div>

  <div class="bg-cocoa text-blush px-20" data-reveal>
    <x-blocks.discover
      class="flex gap-x-100"
      heading-class="mt-40"
      bar-color="bg-blush"
      rounded="bottom"
      text-size="text-[20px]" />
  </div>

  <div class="px-20 pt-60 pb-40" data-reveal>
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
      src="/img/cavegn-badenerstrasse-ext-c02"
      alt="Shift Altstetten Gebäude"
      :width="1920"
      :height="1080"
      class="w-full h-[calc(100vh-94px)]" />
    <div class="bg-linear-to-b from-transparent to-cocoa absolute z-20 top-[40%] left-0 right-0 h-[60%]"></div>

    <div class="absolute z-30 bottom-60 w-full flex flex-col gap-y-100">

      <div class="max-w-page mx-auto w-full px-20 xl:px-30" data-reveal>
        <x-blocks.hero-title title-class="text-[100px] leading-none" subtitle-class="text-[24px]" />
      </div>

      <div class="max-w-page mx-auto w-full px-20 xl:px-30 text-blush flex justify-between">
        <div class="w-full max-w-[80rem]" data-reveal>
          <x-blocks.stats variant="desktop" :stats="$stats" />
        </div>
      </div>

    </div>

  </x-layout.section>

  <x-layout.split>

    <div data-reveal>
      <x-headings.h2>
        {{ $introTitle }}
      </x-headings.h2>
      @foreach($introText as $line)
        {!! $line !!}
      @endforeach
    </div>

    <x-slot:aside>
      <x-gallery.carousel name="room-gallery" :images="$sliderImages" />
    </x-slot:aside>

  </x-layout.split>

  <x-layout.section class="py-80 2xl:py-100">

    <x-layout.inner data-reveal>

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

    <div data-reveal>

      <x-headings.h2>
        {{ $artTitle }}
      </x-headings.h2>

      <div>
        @foreach($artText as $line)
          {!! $line !!}
        @endforeach
      </div>

    </div>

    <x-slot:aside>
      <x-gallery.carousel name="room-gallery" :images="$artworkImages" />
    </x-slot:aside>

  </x-layout.split>

</div>
@endsection
