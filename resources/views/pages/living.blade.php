@extends('app')
@section('meta_title', 'Wohnen')
@section('content')

  <section class="py-60 md:py-100">
    <x-layout.inner>
      <x-headings.h1>Wohnen</x-headings.h1>

      {{-- Residential objects (Melon) + isometry --}}
      <x-objects.wrapper :apartments="$apartments" :buildings="$buildings" :filterOptions="$filterOptions" :labels="$labels" />
    </x-layout.inner>
  </section>

@endsection
