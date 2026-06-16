@extends('app')
@section('meta_title', 'Arbeiten')
@section('content')

  <section class="py-60 md:py-100">
    <x-layout.inner>
      <x-headings.h1>Arbeiten</x-headings.h1>

      {{-- Commercial objects (Melon) + isometry --}}
      <x-objects.wrapper :apartments="$apartments" :buildings="$buildings" :filterOptions="$filterOptions" :labels="$labels" />
    </x-layout.inner>
  </section>

@endsection
