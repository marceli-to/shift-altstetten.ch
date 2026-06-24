@extends('app')
@section('meta_title', 'Facts')
@section('meta_description', 'Die wichtigsten Fakten zum Projekt SHIFT an der Badenerstrasse 587/589 in Zürich Altstetten – Angebot, Bezugstermin, Bewerbung und mehr.')
@section('content')

  <x-layout.section class="py-40 md:py-60 2xl:py-80">
    <x-layout.inner data-reveal>

      <div class="max-w-4xl">

        <x-headings.h1>
          Facts
        </x-headings.h1>

        <x-accordion.wrapper>

          <x-accordion.item id="angebot">
            <x-accordion.button title="Angebot" />
            <x-accordion.content>
              <ul>
                <li>45 Mietwohnungen mit 1.5-, 2.5- und 3.5-Zimmerwohnungen</li>
                <li>12 Büros/Ateliers</li>
                <li>10 Lagerflächen/Gewerberäume</li>
                <li>Begrenzte Anzahl Parkplätze vorhanden</li>
              </ul>
            </x-accordion.content>
          </x-accordion.item>

          <x-accordion.item id="adresse">
            <x-accordion.button title="Adresse" />
            <x-accordion.content>
              <p>Badenerstrasse 587/589, 8048 Zürich</p>
            </x-accordion.content>
          </x-accordion.item>

          <x-accordion.item id="bezugstermin">
            <x-accordion.button title="Bezugstermin" />
            <x-accordion.content>
              <p>voraussichtlich 1. Mai 2027</p>
            </x-accordion.content>
          </x-accordion.item>

          <x-accordion.item id="erstvermietung">
            <x-accordion.button title="Erstvermietung" />
            <x-accordion.content>
              <p>Cavegn Immobilien GmbH<br>Auf der Mauer 7<br>8001 Zürich</p>
            </x-accordion.content>
          </x-accordion.item>

          <x-accordion.item id="bewirtschaftung">
            <x-accordion.button title="Bewirtschaftung" />
            <x-accordion.content>
              <p>Apleona Schweiz AG<br>Industriestrasse 21<br>8304 Wallisellen</p>
            </x-accordion.content>
          </x-accordion.item>

          <x-accordion.item id="kuendigungsfristen">
            <x-accordion.button title="Kündigungsfristen" />
            <x-accordion.content>
              <p>Es besteht eine Mindestmietdauer von einem Jahr. Zudem gilt eine Kündigungsfrist von drei Monaten. Kündbar jeweils auf Ende jedes Monats, ausser im Dezember.</p>
            </x-accordion.content>
          </x-accordion.item>

          <x-accordion.item id="mietzinsdepot">
            <x-accordion.button title="Mietzinsdepot (Wohnen)" />
            <x-accordion.content>
              <p>Die Kaution in Höhe von drei Bruttomietzinsen ist auf einem Mieterkautionssparkonto der ZKB zu hinterlegen. Alternativ kann auch eine Kautionsversicherung abgeschlossen werden.</p>
            </x-accordion.content>
          </x-accordion.item>

          <x-accordion.item id="besichtigungen">
            <x-accordion.button title="Besichtigungen" />
            <x-accordion.content>
              <p>Die Baustelle darf aus versicherungstechnischen Gründen nicht selbständig betreten werden.</p>
            </x-accordion.content>
          </x-accordion.item>

          <x-accordion.item id="bewerbung">
            <x-accordion.button title="Bewerbung" />
            <x-accordion.content>
              <p>Bewerbungen für Büros, Ateliers oder Lagerräume erfolgen über das Bewerbungsformular im Downloadbereich (PDF zum Ausfüllen).</p>
              <p>Wohnungsbewerbungen werden ausschliesslich elektronisch über die Webseite entgegengenommen. Der Bewerbung sind folgende Unterlagen beizulegen:</p>
              <ul>
                <li>aktuelle Betreibungsauszüge (nicht älter als zwei Monate und über die letzten zwei Jahre)</li>
                <li>Lohnausweis bzw. Einkommensnachweis</li>
                <li>Ausweiskopien aller Wohninteressent:innen (inkl. allfällige Kopie des Ausländerausweises)</li>
              </ul>
            </x-accordion.content>
          </x-accordion.item>

        </x-accordion.wrapper>

      </div>

    </x-layout.inner>
  </x-layout.section>

@endsection
