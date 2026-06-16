@props(['class' => ''])
<thead class="border-b-2 sm:border-b-3 border-b-cloud sm:sticky sm:top-0 sm:bg-white sm:z-40 {{ $class ?? '' }}">
  <tr class="md:top-0 z-60 [&>th]:py-5 [&>th]:sm:py-10 [&>th]:align-bottom [&>th]:pr-5 [&>th]:sm:pr-10 [&>th]:font-sans-bold [&>th]:font-bold [&>th]:text-xs [&>th]:sm:text-sm [&>th]:leading-[1.2]">
    <th class="text-left">
      Nr.
    </th>
    <th class="text-left">
      Etage
    </th>
    <th class="text-left">
      Zi.
    </th>
    <th class="text-left">
      <span class="block lg:hidden">Fläche<br>m<sup>2</sup></span>
      <span class="hidden lg:block">Wohnfläche<br>Netto m<sup>2</sup></span>
    </th>
    <th class="text-left">
      <span class="block lg:hidden">Aussen<br>m<sup>2</sup></span>
      <span class="hidden lg:block">Aussen-<br>fläche&nbsp;m<sup>2</sup></span>
    </th>
    <th class="text-left">
      Bruttomiete<br>inkl. NK
    </th>
    <th class="text-left">
      NK
    </th>
    <th class="text-center">
      <span class="block lg:hidden">Plan</span>
      <span class="hidden lg:block">Grundriss</span>
    </th>
    <th class="text-right !pr-0">
      Status
    </th>
  </tr>
</thead>