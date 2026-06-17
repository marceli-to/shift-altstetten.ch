@extends('app')
@section('meta_title', 'Wohnen')
@section('meta_description', 'Wohnen mit Charakter an der Badenerstrasse 587–589 in Zürich Altstetten: grosszügige Lofts mit hohen Decken, Eichenparkett und dem unverwechselbaren Charme eines ehemaligen Industriegebäudes.')
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

<x-layout.section class="bg-blush">
  <x-layout.split>
    <x-headings.h1>Hier wird Wohnen zum Gefühl</x-headings.h1>
    <p>Die Wohnungen verbinden grosszügige Raumkonzepte mit dem unverwechselbaren Charakter eines ehemaligen Industriegebäudes – und schaffen damit Orte, die nicht nur funktionieren, sondern berühren.</p>

    <p>
      <x-links.styled href="" target="_self" class="flex gap-x-8 items-center" textClass="underline group-hover:no-underline!">
        <x-slot:icon>
          <x-icons.house class="w-20 h-auto" />
        </x-slot:icon>
          Zu den Wohnungen
      </x-links.styled>
    </p>

    <p>Hohe Decken lassen Luft und Freiheit spürbar werden. Grosszügige Fensterfronten holen das Tageslicht tief in den Raum und lassen Innen- und Aussenwelt miteinander verschmelzen. Die sichtbaren Stützen und Träger erzählen von der Geschichte des Gebäudes – roh, ehrlich und voller Identität. Gleichzeitig schafft der warme Eichenparkett einen wohltuenden Kontrast: Er bringt Ruhe, Natürlichkeit und eine spürbare Wohnlichkeit in die offenen Räume und erdet die industrielle Architektur auf eine sinnliche Weise. So entsteht ein Wohngefühl, dass man nicht einfach einrichtet, sondern erlebt: urban, kraftvoll und einzigartig.</p>

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

<x-layout.section class="bg-cocoa py-40 text-blush">

  <x-layout.inner class="relative">
    <x-headings.h2 class="mb-30! pr-40 md:pr-0">
      Wohnen in den Gefühlswelten
    </x-headings.h2>
    <div class="flex flex-col gap-y-30 md:grid md:grid-cols-3 md:gap-20">
      <article class="max-w-[420px] text-balance">
        <x-headings.h3>Loft Living</x-headings.h3>
        <p>Raum, der inspiriert. Architektur, die spürbar wird. Hier lebt das echte Loftgefühl – offen, weit und voller Charakter. Ein Ort für alle, die Grosszügigkeit nicht nur sehen, sondern fühlen wollen.</p>
      </article>
      <article class="max-w-[420px] text-balance">
        <x-headings.h3>Stadt-Oase</x-headings.h3>
        <p>Rückzug mitten im Leben. Die Vier-Jahreszeiten-Zimmer werden zu deinem persönlichen Ruhepol – geschützt, flexibel und immer nutzbar. Hier entsteht ein Raum, der dich durch alle Jahreszeiten begleitet.</p>
      </article>
      <article class="max-w-[420px] text-balance">
        <x-headings.h3>Work-Live-Balance</x-headings.h3>
        <p>Wenn Wohnen und Arbeiten im Einklang sind. Die Räume passen sich deinem Leben an – nicht umgekehrt. Ob konzentriertes Arbeiten, kreatives Denken oder entspanntes Wohnen: Alles findet hier seinen Platz, fliessend und selbstverständlich verbunden.</p>
      </article>
    </div>
    <x-bars class="absolute z-30 top-0 right-20 h-[calc(100%_+_80px)] gap-x-10 md:hidden" :count="3" width="w-5" />
  </x-layout.inner>

</x-layout.section>

  <!--
  <x-objects.wrapper :apartments="$apartments" :buildings="$buildings" :filterOptions="$filterOptions" :labels="$labels" />
  -->

@endsection
