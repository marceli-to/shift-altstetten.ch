@extends('app')
@section('meta_title', 'Arbeiten')
@section('meta_description', 'Arbeiten mit urbanem Charakter an der Badenerstrasse 587–589 in Zürich Altstetten: ausgebaute Gewerbeflächen und Kleinbüros mit Parkettböden, Teeküchen und inspirierender Industriearchitektur.')
@section('content')

@php
  $workingImages = [
    '/img/cavegn-badenerstrasse-int-c09',
    '/img/cavegn-badenerstrasse-int-c03',
    '/img/cavegn-badenerstrasse-int-c01',
  ];

  $extras = [
    ['type' => 'Tiefgaragen-Parkplatz', 'price' => 'CHF 130'],
    ['type' => 'E-Ladestation', 'price' => 'CHF 170'],
    ['type' => 'Motorrad-Parkplatz', 'price' => 'CHF 40'],
  ];
@endphp

<x-sections.intro class="bg-sky">
  <div data-reveal>

    <x-headings.h1>Wo Ideen Raum bekommen.</x-headings.h1>
    <p>Die Kleinbüros entlang der Badenerstrasse sind Teil eines Gesamtkonzepts, das Wohnen und Arbeiten auf natürliche Weise miteinander verbindet – für Bewohnerinnen und Bewohner ebenso wie für externe Nutzer. Die vollständig ausgebauten Räume mit hochwertigem Parkett und integrierten Teeküchen bieten Platz für Ideen. Ob Homeoffice, Start-up oder eigenes KMU – hier findet Arbeit ihren Platz und Inspiration ihren Raum.</p>

    <p>
      <x-links.icon href="#angebot">
        <x-slot:icon>
          <x-icons.briefcase class="w-20 h-auto" />
        </x-slot:icon>
        Zu den Gewerbeflächen
      </x-links.icon>
    </p>

  </div>
  
  <x-slot:aside>
    <x-gallery.carousel name="working-gallery" :images="$workingImages" />
  </x-slot:aside>

</x-sections.intro>

<x-sections.feature class="text-sky" barColor="bg-sky">
  <x-headings.h2 class="mb-30! pr-40 md:pr-0">Platz für alles, was dazugehört</x-headings.h2>
  <div class="pr-44 md:pr-0">
    <x-sections.feature-item class="md:max-w-1/2!">
      <x-headings.h3>Hobby-/Lagerräume</x-headings.h3>
      <p>Im Untergeschoss stehen beheizte Lager- und Hobbyräume mit natürlichem Tageslicht zur Verfügung. Weit mehr als klassische Nebenräume, schaffen sie Platz für Kreativität, Handwerk und persönliche Leidenschaften. Ein Ort zum Werkeln, Gestalten, Sammeln oder einfach für all das, was im Alltag seinen eigenen Platz braucht.</p>
    </x-sections.feature-item>
  </div>

  <div class="mt-30 md:mt-40 flex flex-col gap-y-10">
    <x-links.icon href="#">
      <x-slot:icon>
        <x-icons.download class="w-18 h-auto" variant="file" />
      </x-slot:icon>
      Kurzbaubeschrieb
    </x-links.icon>
  </div>
</x-sections.feature>

<x-layout.section class="py-40 md:py-60 scroll-mt-80 md:scroll-mt-94" id="angebot">
  <x-layout.inner data-reveal>
    <x-headings.h2 class="scroll-mt-100 mb-20 md:mb-30">Angebot Gewerbe</x-headings.h2>
    <x-objects.wrapper :apartments="$apartments" :filterOptions="$filterOptions" accent="sky" :extras="$extras" />
  </x-layout.inner>
</x-layout.section>

@endsection
