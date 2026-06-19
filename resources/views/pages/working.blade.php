@extends('app')
@section('meta_title', 'Arbeiten')
@section('meta_description', 'Arbeiten mit urbanem Charakter an der Badenerstrasse 587–589 in Zürich Altstetten: ausgebaute Gewerbeflächen und Kleinbüros mit Parkettböden, Teeküchen und inspirierender Industriearchitektur.')
@section('content')

@php
  $surroundingImages = [
    '/img/shift-bild-umgebung-01',
    '/img/shift-bild-umgebung-02',
    '/img/shift-bild-umgebung-03',
    '/img/shift-bild-umgebung-04',
    '/img/shift-bild-umgebung-05',
  ];

  $extras = [
    ['type' => 'Tiefgaragen-Parkplatz', 'price' => 'CHF 130'],
    ['type' => 'E-Ladestation', 'price' => 'CHF 170'],
    ['type' => 'Motorrad-Parkplatz', 'price' => 'CHF 40'],
    ['type' => 'Lagerraum', 'price' => 'CHF 450'],
    ['type' => 'Hobbyraum', 'price' => 'CHF 450'],
  ];
@endphp

<x-sections.intro class="bg-sky">
  <div data-reveal>

    <x-headings.h1>Arbeiten bekommt hier Qualität</x-headings.h1>
    <p>Die Gewerbeflächen sind integraler Bestandteil des architektonischen Gesamtkonzepts. Sie schaffen eigenständige Arbeitsorte mit urbanem Charakter – attraktiv sowohl für BewohnerInnen des Hauses als auch für externe Nutzer.</p>

    <p>
      <x-links.icon href="#angebot">
        <x-slot:icon>
          <x-icons.briefcase class="w-20 h-auto" />
        </x-slot:icon>
        Zu den Gewerbeflächen
      </x-links.icon>
    </p>

    <p>Die Kleinbüros entlang der Badenerstrasse bieten optimale Voraussetzungen für modernes Arbeiten: Sie werden vollständig ausgebaut vermietet und verfügen über hochwertige Parkettböden sowie integrierte Teeküchen. So entstehen sofort bezugsbereite Flächen, die Funktionalität und Ästhetik verbinden. Die industrielle Architektur mit grosszügigen Raumhöhen, klaren Strukturen und charakteristischen Elementen verleiht den Arbeitsräumen eine inspirierende Atmosphäre. Ob für kreative Tätigkeiten, Dienstleistungen oder konzentriertes Arbeiten – die Flächen bieten vielfältige Nutzungsmöglichkeiten in einem hochwertigen Umfeld.</p>

    <p class="flex flex-col gap-y-10">
      <x-links.icon href="#">
        <x-slot:icon>
          <x-icons.download class="w-18 h-auto" variant="file" />
        </x-slot:icon>
        Infoblatt
      </x-links.icon>
      <x-links.icon href="#">
        <x-slot:icon>
          <x-icons.download class="w-18 h-auto" variant="file" />
        </x-slot:icon>
        Kurzbaubeschrieb
      </x-links.icon>
    </p>

  </div>
  
  <x-slot:aside>
    <x-gallery.carousel name="working-gallery" :images="$surroundingImages" />
  </x-slot:aside>

</x-sections.intro>

<x-sections.feature class="text-sky" barColor="bg-sky">
  <x-headings.h2 class="mb-30! pr-40 md:pr-0">Platz für alles, was dazugehört</x-headings.h2>
  <div class="pr-44 md:pr-0">
    <x-sections.feature-item class="md:max-w-1/2!">
      <x-headings.h3>Hobby-/Lagerräume</x-headings.h3>
      <p>Im Untergeschoss stehen beheizte Lager- und Hobbyräume zur Verfügung. Dank natürlichem Tageslicht gehen sie über klassische Nebenflächen hinaus und eröffnen zusätzlichen Raum für individuelle Nutzung – sei es als Werkstatt, Atelier, Stauraum oder persönlicher Rückzugsort für Hobbys.</p>
    </x-sections.feature-item>
  </div>
</x-sections.feature>

<x-layout.section class="py-40 md:py-60 scroll-mt-80 md:scroll-mt-94" id="angebot">
  <x-layout.inner data-reveal>
    <x-headings.h2 class="scroll-mt-100 mb-20 md:mb-30">Angebot Gewerbe</x-headings.h2>
    <x-objects.wrapper :apartments="$apartments" :filterOptions="$filterOptions" accent="sky" :extras="$extras" />
  </x-layout.inner>
</x-layout.section>

@endsection
