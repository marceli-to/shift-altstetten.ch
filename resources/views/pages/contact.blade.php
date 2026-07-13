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

      <div id="formular" class="scroll-mt-100 mt-60 md:mt-80 max-w-4xl">

        <x-headings.h2>
          Kontaktformular
        </x-headings.h2>

        <x-layout.article>
          <p>Sie interessieren sich für eine Wohnung oder Gewerbefläche in SHIFT? Füllen Sie das Formular aus und wir senden Ihnen gerne weiterführende Informationen zu.</p>
        </x-layout.article>

        @if(session('success'))
          <div class="mt-30 md:mt-40 border border-state-free bg-state-free/10 text-cocoa px-20 py-16">
            Vielen Dank für Ihre Anfrage. Wir melden uns baldmöglichst bei Ihnen.
          </div>
        @else

          @if($errors->any())
            <div class="mt-30 md:mt-40 border border-state-taken bg-state-taken/10 text-cocoa px-20 py-16">
              Bitte überprüfen Sie Ihre Eingaben.
            </div>
          @endif

          <form
            method="POST"
            action="{{ route('contact.send') }}"
            class="mt-30 md:mt-40 grid gap-y-16">
            @csrf

            {{-- Honeypot: hidden from real users --}}
            <div class="hidden" aria-hidden="true">
              <label>Website <input type="text" name="webs1te" tabindex="-1" autocomplete="off"></label>
            </div>

            <div class="grid sm:grid-cols-2 gap-x-20 gap-y-16">
              <x-forms.field name="firstname" placeholder="Vorname*" required />
              <x-forms.field name="name" placeholder="Name*" required />
              <x-forms.field name="street_number" placeholder="Strasse/Nr.*" required />
              <x-forms.field name="location" placeholder="PLZ/Ort*" required />
              <x-forms.field name="email" type="email" placeholder="E-Mail*" required />
              <x-forms.field name="phone" type="tel" placeholder="Telefon*" required />
            </div>

            <x-forms.textarea name="message" placeholder="Nachricht" />

            <div class="mt-4">
              <x-forms.checkbox name="privacy" required />
            </div>

            <div class="mt-10">
              <x-buttons.primary tag="button" type="submit" :icon="false" title="Formular absenden">
                Absenden
              </x-buttons.primary>
            </div>

          </form>

        @endif

      </div>

    </x-layout.inner>

  </x-layout.section>

@endsection
