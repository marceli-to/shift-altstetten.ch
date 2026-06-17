@extends('app')
@section('meta_title', 'Impressum')
@section('meta_description', 'Impressum von shift in Zürich-Altstetten – Angaben zum Betreiber, Design und Entwicklung.')
@section('content')

<x-layout.section class="py-40">
  <x-layout.inner>
    <x-headings.h1>
      Impressum
    </x-headings.h1>

    <x-headings.h2 class="text-[20px]! md:text-[24px]!">
      Verantwortlich
    </x-headings.h2>
    <p>
      Cavegn Immobilien GmbH<br>
      Auf der Mauer 7<br>
      8001 Zürich
    </p>

    <x-headings.h2 class="text-[20px]! md:text-[24px]!">
      Design und Entwicklung
    </x-headings.h2>
    <p>
      Stoz Werbeagentur AG<br>
      Barzloostrasse 2<br>
      8330 Pfäffikon ZH<br>
      <x-links.styled href="mailto:hello@stoz.ch" label="E-Mail an Stoz">
        hello@stoz.ch
      </x-links.styled><br>
      <x-links.styled href="https://www.stoz.ch" target="_blank" label="Website von Stoz">
        www.stoz.ch
      </x-links.styled><br>
    </p>

    <x-headings.h2 class="text-[20px]! md:text-[24px]!">
      Programmierung
    </x-headings.h2>
    <p>
      Marcel Stadelmann, Zürich<br>
      <x-links.styled href="https://marceli.to" target="_blank" label="Website von Marcel Stadelmann">
        marceli.to
      </x-links.styled>
    </p>
  </x-layout.inner>
</x-layout.section>

@endsection
