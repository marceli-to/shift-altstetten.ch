@extends('app')
@section('meta_title', 'Kontakt')
@section('meta_description', 'Kontaktieren Sie uns für weitere Informationen zur Liegenschaft an der Badenerstrasse 587–589 in Zürich Altstetten.')
@section('content')

  <x-layout.section class="py-40 md:py-60 2xl:py-80">

    <x-layout.inner>

      <x-headings.h1 class="font-bold text-[30px] md:text-[40px] mb-10">
        Kontakt
      </x-headings.h1>

      <x-layout.article>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </x-layout.article>

      <div class="grid xl:grid-cols-2 gap-y-40 xl:gap-y-0 md:gap-x-60 mt-40 md:mt-60 max-w-8xl">

        <x-blocks.person
          image="/img/shift-bild-profil-l-razzino"
          name="L. Razzino"
          role="Leiterin Immobilienvermarktung"
          phone="043 537 33 53"
          email="shift@cavegn-immobilien.ch" />

        <x-blocks.person
          image="/img/shift-bild-profil-o-friedli"
          name="O. Friedli"
          role="Immobilienvermarkerin"
          phone="043 537 33 53"
          email="shift@cavegn-immobilien.ch" />

      </div>

    </x-layout.inner>

  </x-layout.section>

@endsection
