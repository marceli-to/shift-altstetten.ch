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

  $extras = [
    ['type' => 'Tiefgaragen-Parkplatz', 'price' => 'CHF 130'],
    ['type' => 'E-Ladestation', 'price' => 'CHF 170'],
    ['type' => 'Motorrad-Parkplatz', 'price' => 'CHF 40'],
  ];
@endphp

<x-sections.intro class="bg-blush">
  <div data-reveal>
    <x-headings.h1>Hier wird Wohnen zum Gefühl</x-headings.h1>
    <p>Die Wohnungen verbinden grosszügige Raumkonzepte mit dem unverwechselbaren Charakter eines ehemaligen Industriegebäudes – und schaffen damit Orte, die nicht nur funktionieren, sondern berühren.</p>

    <p>
      <x-links.icon href="#angebot">
        <x-slot:icon>
          <x-icons.house class="w-20 h-auto" />
        </x-slot:icon>
        Zu den Wohnungen
      </x-links.icon>
    </p>

    <p>Hohe Decken lassen Luft und Freiheit spürbar werden. Grosszügige Fensterfronten holen das Tageslicht tief in den Raum und lassen Innen- und Aussenwelt miteinander verschmelzen. Die sichtbaren Stützen und Träger erzählen von der Geschichte des Gebäudes – roh, ehrlich und voller Identität. Gleichzeitig schafft der warme Eichenparkett einen wohltuenden Kontrast: Er bringt Ruhe, Natürlichkeit und eine spürbare Wohnlichkeit in die offenen Räume und erdet die industrielle Architektur auf eine sinnliche Weise. So entsteht ein Wohngefühl, dass man nicht einfach einrichtet, sondern erlebt: urban, kraftvoll und einzigartig.</p>
  </div>
  <x-slot:aside>
    <x-gallery.carousel name="living-gallery" :images="$surroundingImages" />
  </x-slot:aside>
</x-sections.intro>

<x-sections.feature class="text-blush" barColor="bg-blush">
  <x-headings.h2 class="mb-30! pr-40 md:pr-0">Wohnen in den Gefühlswelten</x-headings.h2>
  <div class="flex flex-col gap-y-30 md:grid md:grid-cols-3 md:gap-20 pr-44 md:pr-0">
    <x-sections.feature-item>
      <x-headings.h3>Loft Living</x-headings.h3>
      <p>Raum, der inspiriert. Architektur, die spürbar wird. Hier lebt das echte Loftgefühl – offen, weit und voller Charakter. Ein Ort für alle, die Grosszügigkeit nicht nur sehen, sondern fühlen wollen.</p>
    </x-sections.feature-item>
    <x-sections.feature-item>
      <x-headings.h3>Stadt-Oase</x-headings.h3>
      <p>Rückzug mitten im Leben. Die Vier-Jahreszeiten-Zimmer werden zu deinem persönlichen Ruhepol – geschützt, flexibel und immer nutzbar. Hier entsteht ein Raum, der dich durch alle Jahreszeiten begleitet.</p>
    </x-sections.feature-item>
    <x-sections.feature-item>
      <x-headings.h3>Work-Live-Balance</x-headings.h3>
      <p>Wenn Wohnen und Arbeiten im Einklang sind. Die Räume passen sich deinem Leben an – nicht umgekehrt. Ob konzentriertes Arbeiten, kreatives Denken oder entspanntes Wohnen: Alles findet hier seinen Platz, fliessend und selbstverständlich verbunden.</p>
    </x-sections.feature-item>
  </div>
</x-sections.feature>

<x-layout.section class="py-40 md:py-60 scroll-mt-80 md:scroll-mt-94" id="angebot">
  <x-layout.inner data-reveal>
    <x-headings.h2 class="scroll-mt-100 mb-20 md:mb-30">Angebot Wohnen</x-headings.h2>
    <div class="mb-30 md:mb-50 max-w-[640px]">
      Je nach Geschoss entfalten die Räume ihren eigenen Charakter: Unten das echte Loft – weit, offen, beeindruckend.<br>Weiter oben eine ruhigere, fein proportionierte Wohnqualität.<br>Und ganz oben: ein Wohnerlebnis über den Dächern der Stadt.
    </div>
    <x-objects.wrapper :apartments="$apartments" :filterOptions="$filterOptions" accent="blush" :extras="$extras" />
  </x-layout.inner>
</x-layout.section>
@endsection
