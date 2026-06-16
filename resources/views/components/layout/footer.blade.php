<footer class="bg-cocoa text-yellow-500! leading-[1.3] pt-30 pb-30 lg:pt-40 lg:pb-40">
  <x-layout.inner>
    <div class="grid grid-cols-12 gap-16 items-end text-base">

      <div class="col-span-2 md:col-span-1 mb-2">
        <a
          href="https://www.cavegn-immobilien.ch"
          target="_blank"
          rel="noopener noreferrer"
          title="Zur Website von Cavegn Immobilien">
          <x-icons.logo-cavegn class="block w-auto h-100 md:h-120" />
        </a>
      </div>

      <div class="col-span-10 md:col-span-5 lg:col-span-6 sm:grid sm:grid-cols-6 gap-16">
        <div class="mb-16 sm:mb-0 sm:col-span-3 md:col-span-6 lg:col-span-3">
          Cavegn Immobilien GmbH<br>
          Auf der Mauer 7<br>
          8001 Zürich
        </div>
        <div class="sm:col-span-3 md:col-span-6 lg:col-span-3">
          <a
            href="tel:0435373353"
            class="no-underline hover:underline underline-offset-4 decoration-1">
            Telefon 043 537 33 53
          </a><br>
          <a
            href="mailto:shift@cavegn-immobilien.ch"
            title="E-Mail an shift@cavegn-immobilien.ch"
            class="no-underline hover:underline underline-offset-4 decoration-1">
            shift@cavegn-immobilien.ch
          </a><br>
          <a
            href="https://www.cavegn-immobilien.ch"
            target="_blank"
            rel="noopener noreferrer"
            title="Zur Website von Cavegn Immobilien"
            class="no-underline hover:underline underline-offset-4 decoration-1">
            www.cavegn-immobilien.ch
          </a>
        </div>
      </div>

      <div class="col-span-3 col-start-3 sm:col-span-5 sm:col-start-3 md:col-span-3 lg:col-span-2 lg:mb-15">
        Follow us!<br>
        <a
          href="https://www.instagram.com/cavegn_immobilien_zh/"
          target="_blank"
          rel="noopener noreferrer"
          title="Follow us on Instagram!"
          class="block group mt-2 w-fit">
          <x-icons.instagram class="w-24 h-auto group-hover:rotate-6 transition-transform" />
        </a>
      </div>

      <div class="col-span-3 sm:col-span-5 md:col-span-3 md:col-start-10 lg:col-start-11 lg:mb-20">
        <a href="{{ route('page.imprint') }}" class="no-underline hover:underline underline-offset-4 decoration-1">Impressum</a><br>
        <a href="{{ route('page.privacy') }}" class="no-underline hover:underline underline-offset-4 decoration-1">Datenschutz</a><br>
      </div>

    </div>
  </x-layout.inner>
</footer>
