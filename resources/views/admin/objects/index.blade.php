@extends('admin.layout')
@section('title', 'Gewerbeobjekte')
@section('subtitle', 'Gewerbeobjekte – Status und Mietzinse')
@section('content')

@php
  $dots = ['free' => 'bg-state-free', 'reserved' => 'bg-state-reserved', 'taken' => 'bg-state-taken'];
  // Kopfzeile und Datenzeilen teilen sich dieselbe Spaltendefinition.
  $grid = 'md:grid md:grid-cols-[3.5rem_4.5rem_4.5rem_8rem_8rem_10rem_1fr] md:items-center md:gap-x-15';
@endphp

@if($objects->isEmpty())

  <p>Es sind keine Gewerbeobjekte erfasst. Anlegen mit <code>php artisan db:seed</code>.</p>

@else

  <form method="POST" action="{{ route('admin.objects.update') }}">
    @csrf
    @method('PUT')

    @if($errors->any())
      <p class="mb-20 bg-state-taken/10 px-15 py-10 text-[15px] text-state-taken">
        Die Eingaben konnten nicht gespeichert werden. Bitte prüfen Sie die markierten Felder.
      </p>
    @endif

    {{-- Spaltenköpfe: erst ab md sinnvoll, darunter stapeln die Objekte als Karten. --}}
    <div class="{{ $grid }} hidden bg-blush px-15 py-8 text-[15px] font-bold">
      <span>Nr</span>
      <span>Etage</span>
      <span class="text-right">Fläche</span>
      <span>Netto/Mt.</span>
      <span>Nebenkosten</span>
      <span>Status</span>
      <span class="text-right">Plan</span>
    </div>

    <div class="border-t border-cocoa md:border-t-0">
      @foreach($objects as $object)
        @php
          // Klammernotation für das HTML-Attribut, Punktnotation für old() und @error.
          $name = "objects[{$object->id}]";
          $field = "objects.{$object->id}";
        @endphp
        <div class="{{ $grid }} border-b border-cocoa px-15 py-12">

          <span class="flex items-center gap-x-8 font-bold">
            <span class="inline-block h-9 w-9 shrink-0 rounded-full {{ $dots[$object->state] ?? 'bg-state-taken' }}"></span>
            {{ $object->title }}
          </span>

          <span class="text-[15px]">
            <span class="md:hidden opacity-70">Etage: </span>{{ $object->floor }}
          </span>

          <span class="text-[15px] md:text-right">
            <span class="md:hidden opacity-70">Fläche: </span>{{ $object->area }} m²
          </span>

          <label class="mt-8 block md:mt-0">
            <span class="mb-3 block text-[14px] opacity-70 md:hidden">Netto/Mt. (CHF)</span>
            <input
              type="number"
              inputmode="numeric"
              min="0"
              step="1"
              name="{{ $name }}[rentalgross_net]"
              value="{{ old("$field.rentalgross_net", $object->rentalgross_net) }}"
              placeholder="CHF"
              class="h-40 w-full border border-cocoa px-8 @error("$field.rentalgross_net") border-state-taken @enderror">
          </label>

          <label class="mt-8 block md:mt-0">
            <span class="mb-3 block text-[14px] opacity-70 md:hidden">Nebenkosten (CHF)</span>
            <input
              type="number"
              inputmode="numeric"
              min="0"
              step="1"
              name="{{ $name }}[incidentals]"
              value="{{ old("$field.incidentals", $object->incidentals) }}"
              placeholder="CHF"
              class="h-40 w-full border border-cocoa px-8 @error("$field.incidentals") border-state-taken @enderror">
          </label>

          <label class="mt-8 block md:mt-0">
            <span class="mb-3 block text-[14px] opacity-70 md:hidden">Status</span>
            <select
              name="{{ $name }}[state]"
              class="h-40 w-full cursor-pointer border border-cocoa bg-white px-8">
              @foreach($states as $value => $label)
                <option value="{{ $value }}" @selected(old("$field.state", $object->state) === $value)>{{ $label }}</option>
              @endforeach
            </select>
          </label>

          <span class="mt-10 block text-[15px] md:mt-0 md:text-right">
            @if($object->layout_plan)
              <a href="{{ $object->layout_plan }}" target="_blank" rel="noopener" class="underline transition-opacity hover:opacity-60">Grundriss</a>
            @else
              <span class="opacity-40">–</span>
            @endif
          </span>

          @if($object->updated_by)
            <span class="col-span-full mt-5 block text-[13px] opacity-50">
              Zuletzt geändert von {{ $object->updated_by }} am {{ $object->updated_at->format('d.m.Y, H:i') }} Uhr
            </span>
          @endif

        </div>
      @endforeach
    </div>

    <div class="mt-25 flex flex-wrap items-center gap-x-20 gap-y-10">
      <button
        type="submit"
        class="h-46 cursor-pointer bg-cocoa px-25 font-bold text-white uppercase transition-opacity hover:opacity-80">
        Speichern
      </button>
      <p class="mb-0! text-[14px] opacity-70">
        Änderungen erscheinen sofort auf <a href="{{ route('page.working') }}" target="_blank" class="underline">Arbeiten</a>.
      </p>
    </div>

  </form>

@endif

@endsection
