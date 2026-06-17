@extends('app')
@section('meta_title', 'Working')
@section('content')

@php
  $surroundingImages = [
    '/img/shift-bild-umgebung-01',
    '/img/shift-bild-umgebung-02',
    '/img/shift-bild-umgebung-03',
    '/img/shift-bild-umgebung-04',
    '/img/shift-bild-umgebung-05',
  ];
@endphp

<x-layout.section class="bg-sky">
  <x-layout.split>
    <x-headings.h1>Arbeiten bekommt hier Qualität</x-headings.h1>
    <p>Die Gewerbeflächen sind integraler Bestandteil des architektonischen Gesamtkonzepts. Sie schaffen eigenständige Arbeitsorte mit urbanem Charakter – attraktiv sowohl für BewohnerInnen des Hauses als auch für externe Nutzer.</p>

    <p>
      <x-links.styled href="" target="_self" class="flex gap-x-8 items-center" textClass="underline group-hover:no-underline!">
        <x-slot:icon>
          <x-icons.briefcase class="w-20 h-auto" />
        </x-slot:icon>
          Zu den Gewerbeflächen
      </x-links.styled>
    </p>

    <p>Die Kleinbüros entlang der Badenerstrasse bieten optimale Voraussetzungen für modernes Arbeiten: Sie werden vollständig ausgebaut vermietet und verfügen über hochwertige Parkettböden sowie integrierte Teeküchen. So entstehen sofort bezugsbereite Flächen, die Funktionalität und Ästhetik verbinden. Die industrielle Architektur mit grosszügigen Raumhöhen, klaren Strukturen und charakteristischen Elementen verleiht den Arbeitsräumen eine inspirierende Atmosphäre. Ob für kreative Tätigkeiten, Dienstleistungen oder konzentriertes Arbeiten – die Flächen bieten vielfältige Nutzungsmöglichkeiten in einem hochwertigen Umfeld.</p>

    <p class="flex flex-col gap-y-10">
      <x-links.styled href="" target="_self" class="flex gap-x-8 items-center" textClass="underline group-hover:no-underline!">
        <x-slot:icon>
          <x-icons.download class="w-18 h-auto" variant="file" />
        </x-slot:icon>
          Infoblatt
      </x-links.styled>
      <x-links.styled href="" target="_self" class="flex gap-x-8 items-center" textClass="underline group-hover:no-underline!">
        <x-slot:icon>
          <x-icons.download class="w-18 h-auto" variant="file" />
        </x-slot:icon>
          Kurzbaubeschrieb
      </x-links.styled>
    </p>



    <x-slot:aside>
      <x-gallery.carousel name="living-gallery" :images="$surroundingImages" />
    </x-slot:aside>

  </x-layout.split>
</x-layout.section>

<x-layout.section class="bg-cocoa py-40 text-sky">

  <x-layout.inner class="relative">
    <x-headings.h2 class="mb-30! pr-40 md:pr-0">
      Platz für alles, was dazugehört
    </x-headings.h2>
    <div class="flex flex-col gap-y-30 md:grid md:grid-cols-3 md:gap-20">
      <article class="max-w-[420px] text-balance">
        <x-headings.h3>Hobby-/Lagerräume</x-headings.h3>
        <p>Im Untergeschoss stehen beheizte Lager- und Hobbyräume zur Verfügung. Dank natürlichem Tageslicht gehen sie über klassische Nebenflächen hinaus und eröffnen zusätzlichen Raum für individuelle Nutzung – sei es als Werkstatt, Atelier, Stauraum oder persönlicher Rückzugsort für Hobbys.</p>
      </article>
    </div>
    <x-bars class="absolute z-30 top-0 right-20 h-[calc(100%_+_80px)] gap-x-10 md:hidden" :count="3" width="w-5" />
  </x-layout.inner>

</x-layout.section>

  <!--
  <x-objects.wrapper :apartments="$apartments" :buildings="$buildings" :filterOptions="$filterOptions" :labels="$labels" />
  -->

@endsection
