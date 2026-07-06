@extends('app')
@section('meta_title', 'Wohnen')
@section('meta_description', 'Wohnen mit Charakter an der Badenerstrasse 587–589 in Zürich Altstetten: grosszügige Lofts mit hohen Decken, Eichenparkett und dem unverwechselbaren Charme eines ehemaligen Industriegebäudes.')
@section('content')

@php
  $livingImages = [
    '/img/cavegn-badenerstrasse-int-c01',
    '/img/cavegn-badenerstrasse-int-c02',
    '/img/cavegn-badenerstrasse-int-c04',
    '/img/cavegn-badenerstrasse-int-c05',
    '/img/cavegn-badenerstrasse-int-c06',
    '/img/cavegn-badenerstrasse-int-c07',
    '/img/cavegn-badenerstrasse-int-c08',
  ];

  $extras = [
    ['type' => 'Tiefgaragen-Parkplatz', 'price' => 'CHF 130'],
    ['type' => 'E-Ladestation', 'price' => 'CHF 170'],
    ['type' => 'Motorrad-Parkplatz', 'price' => 'CHF 40'],
  ];
@endphp

<x-sections.intro class="bg-blush">
  <div data-reveal>
    <x-headings.h1>Hier wird Wohnen zum Gefühl.</x-headings.h1>
    <p>Durch die sorgfältige Transformation entstehen 45 lichtdurchflutete Loftwohnungen mit 1.5, 2.5 und 3.5 Zimmern.</p>

    <p>
      <x-links.icon href="#angebot">
        <x-slot:icon>
          <x-icons.house class="w-20 h-auto" />
        </x-slot:icon>
        Zu den Wohnungen
      </x-links.icon>
    </p>

    <p>Hohe Decken und grossflächige Fenster lassen Licht und Weite in jeden Raum fliessen. Die sichtbaren Stützen und Träger erzählen von der Geschichte des Gebäudes – roh, authentisch und voller Identität. Warmes Eichenparkett und eine fein abgestimmte Farb- und Materialwelt in sanften Naturtönen schaffen dazu einen harmonischen Kontrast und verleihen den Räumen Ruhe, Wärme und zeitlose Eleganz. Die als Vier-Jahreszeiten-Zimmer konzipierten Loggien erweitern den Wohnraum auf natürliche Weise. Als geschützte Rückzugsorte bieten sie das ganze Jahr über vielfältige Nutzungsmöglichkeiten und bereichern die Wohnqualität zu jeder Jahreszeit.</p>
  </div>
  <x-slot:aside>
    <x-gallery.carousel name="living-gallery" :images="$livingImages" />
  </x-slot:aside>
</x-sections.intro>

<x-sections.feature class="text-blush" barColor="bg-blush">
  <x-headings.h2 class="mb-30! pr-40 md:pr-0">Wohnen in den Gefühlswelten</x-headings.h2>
  <div class="flex flex-col gap-y-30 md:grid md:grid-cols-3 md:gap-20 pr-44 md:pr-0">
    <x-sections.feature-item>
      <x-headings.h3>Weite.</x-headings.h3>
      <p>Vergangenes wird bewahrt, Neues mit Sorgfalt ergänzt. So entstehen Lofts mit eigenem Ausdruck. Hohe Decken, viel Licht und die unverwechselbare Handschrift des Hauses verleihen den Räumen eine besondere Präsenz. Ein Zuhause, das Raum zum Leben gibt.</p>
    </x-sections.feature-item>
    <x-sections.feature-item>
      <x-headings.h3>Ruhe.</x-headings.h3>
      <p>Rückzug mitten im Leben.<br>Die Loggia wird zum Lieblingsplatz und die Dachterrasse zum Fenster über die Stadt. Zwischen urbaner Energie und stillen Momenten entsteht eine neue Form von Geborgenheit – ein Rückzugsort, der mit den Jahreszeiten lebt und Raum für kleine Auszeiten schafft.</p>
    </x-sections.feature-item>
    <x-sections.feature-item>
      <x-headings.h3>Möglichkeit.</x-headings.h3>
      <p>Wo Ideen entstehen und Zuhause beginnt.<br>Arbeiten, wo das Leben stattfindet. Denken, ohne Wege. Zusätzliche Büroflächen schaffen Raum für Kreativität, Fokus und neue Perspektiven. Und wenn der Tag endet, wartet das Zuhause nur wenige Schritte entfernt. Weil sich Leben und Arbeiten nicht trennen müssen – wenn beides am richtigen Ort zusammenkommt.</p>
    </x-sections.feature-item>
  </div>
  <div class="mt-30 md:mt-40 flex flex-col gap-y-10">
    <x-links.icon href="#">
      <x-slot:icon>
        <x-icons.download class="w-18 h-auto" variant="file" />
      </x-slot:icon>
      Infoblatt Vier-Jahreszeiten-Zimmer
    </x-links.icon>
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
    <x-headings.h2 class="scroll-mt-100 mb-20 md:mb-30">Angebot Wohnen</x-headings.h2>
    <div class="mb-30 md:mb-50 max-w-[640px]">
      Je nach Geschoss entfalten die Räume ihren eigenen Charakter: Unten das echte Loft – weit, offen, beeindruckend.<br>Weiter oben eine ruhigere, fein proportionierte Wohnqualität.<br>Und ganz oben: ein Wohnerlebnis über den Dächern der Stadt.
    </div>
    <x-objects.wrapper :apartments="$apartments" :filterOptions="$filterOptions" accent="blush" :extras="$extras" />
  </x-layout.inner>
</x-layout.section>
@endsection
