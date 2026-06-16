<footer class="bg-white md:bg-cocoa text-cocoa md:text-blush pt-90 pb-30 md:py-32 text-[20px] 2xl:text-[24px]">
  <x-layout.inner class="2xl:pl-160">
    <div class="grid grid-cols-12 gap-20 items-end">

      <div class="col-span-2 md:col-span-1 mb-2">
        <a
          href="https://www.cavegn-immobilien.ch"
          target="_blank"
          rel="noopener noreferrer"
          title="Zur Website von Cavegn Immobilien"
          aria-label="Zur Website von Cavegn Immobilien">
          <x-icons.logo-cavegn class="block w-auto h-160 xl:h-180" />
        </a>
      </div>

      <div class="col-span-10 md:col-span-5 lg:col-span-7 sm:grid sm:grid-cols-6 gap-16">
        <div class="mb-16 sm:mb-0 sm:col-span-3 md:col-span-6 lg:col-span-3">
          <strong>Cavegn Immobilien GmbH</strong><br>
          Auf der Mauer 7<br>
          8001 Zürich
        </div>
        <div class="sm:col-span-3 md:col-span-6 lg:col-span-3 flex flex-col">
          <div>
            <a
              href="tel:0435373353"
              aria-label="Telefon 043 537 33 53"
              class="no-underline hover:underline underline-offset-4 decoration-1">
              Telefon 043 537 33 53
            </a>
          </div>
          <div>
            <a
              href="mailto:shift@cavegn-immobilien.ch"
              title="E-Mail an shift@cavegn-immobilien.ch"
              aria-label="E-Mail an shift@cavegn-immobilien.ch"
              class="no-underline hover:underline underline-offset-4 decoration-1">
              shift@cavegn-immobilien.ch
            </a>
          </div>
          <div>
            <a
              href="https://www.cavegn-immobilien.ch"
              target="_blank"
              rel="noopener noreferrer"
              title="Zur Website von Cavegn Immobilien"
              aria-label="Zur Website von Cavegn Immobilien"
              class="no-underline hover:underline underline-offset-4 decoration-1">
              www.cavegn-immobilien.ch
            </a>
          </div>
        </div>
      </div>

      <div class="col-span-6 col-start-3 sm:col-span-5 sm:col-start-3 md:col-span-3 lg:col-span-2 lg:-top-20 2xl:-top-30 lg:relative">
       <strong>Follow us!</strong><br>
        <a
          href="https://www.instagram.com/cavegn_immobilien_zh/"
          target="_blank"
          rel="noopener noreferrer"
          title="Follow us on Instagram!"
          aria-label="Cavegn Immobilien auf Instagram"
          class="block group mt-2 md:mt-4 w-fit">
          <x-icons.instagram class="w-24 md:w-27 h-auto group-hover:rotate-6 transition-transform" />
        </a>
      </div>

      <div class="col-span-6 col-start-3 sm:col-span-5 md:col-span-3 md:col-start-10 lg:col-start-11 md:items-end flex flex-col text-[15px] 2xl:text-[20px]">
        <div class="md:text-right">
          <a 
            href="{{ route('page.imprint') }}" 
            class="no-underline hover:underline underline-offset-4 decoration-1"
            aria-label="Impressum">
            Impressum
          </a>
        </div>
        <div class="md:text-right">
          <a 
            href="{{ route('page.privacy') }}" 
            class="no-underline hover:underline underline-offset-4 decoration-1"
            aria-label="Datenschutz">
            Datenschutz
          </a>
        </div>
        <div class="md:text-right">
          <a 
            href="https://stoz.ch" 
            class="no-underline hover:underline underline-offset-4 decoration-1"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="design by stoz">
            design by stoz
          </a>
        </div>
      </div>

    </div>
  </x-layout.inner>
</footer>
