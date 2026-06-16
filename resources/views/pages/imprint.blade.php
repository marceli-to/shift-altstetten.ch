@extends('app')
@section('meta_title', 'Impressum')
@section('meta_description', 'Impressum der Pappelstrasse 2/4 in Dietlikon – Angaben zum Betreiber, Design und Entwicklung.')
@section('content')

<x-sections.legal title="Impressum">

  <p>
    <strong>Verantwortlich</strong><br>
    Cavegn Immobilien GmbH<br>
    Auf der Mauer 7<br>
    8001 Zürich
  </p>

  <p>
    <strong>Design und Entwicklung</strong><br>
    Stoz Werbeagentur AG<br>
    Barzloostrasse 2<br>
    8330 Pfäffikon ZH<br>
    <x-links.styled href="mailto:hello@stoz.ch">
      hello@stoz.ch
    </x-links.styled><br>
    <x-links.styled href="https://www.stoz.ch" target="_blank">
      www.stoz.ch
    </x-links.styled><br>
  </p>

  <p>
    <strong>Programmierung</strong><br>
    Marcel Stadelmann, Zürich<br>
    <x-links.styled href="https://marceli.to" target="_blank">
      marceli.to
    </x-links.styled>
  </p>
</x-sections.legal>

@endsection
