@extends('app')
@section('meta_title', 'Kontakt')
@section('meta_description', 'Kontaktieren Sie uns für weitere Informationen zur Liegenschaft an der Badenerstrasse 587–589 in Zürich Altstetten.')
@section('content')

  <x-layout.section class="py-40 md:py-60 2xl:py-80">

    <x-layout.inner data-reveal>

      <x-headings.h1>
        Kontakt
      </x-headings.h1>

      <x-layout.article>
        <p>Haben wir Ihr Interesse geweckt? Wir sind gerne für Sie da und beantworten Ihre Fragen persönlich.</p>
      </x-layout.article>

      <div class="grid xl:grid-cols-2 gap-y-40 xl:gap-y-0 md:gap-x-60 mt-40 md:mt-60 max-w-8xl" data-reveal-children>

        <x-blocks.person
          image="/img/cavegn-badenerstrasse-profil-o-friedli"
          name="Olivia Friedli"
          role="Immobilienvermarkterin"
          phone="+41 43 537 33 53"
          email="shift@cavegn-immobilien.ch" />

        <x-blocks.person
          image="/img/cavegn-badenerstrasse-profil-l-razzino"
          name="Laura Razzino"
          role="Leiterin Immobilienvermarktung"
          phone="+41 43 537 33 53"
          email="shift@cavegn-immobilien.ch" />

      </div>

    </x-layout.inner>

  </x-layout.section>

@endsection
