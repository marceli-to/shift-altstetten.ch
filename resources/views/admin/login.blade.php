@extends('admin.layout')
@section('title', 'Anmelden')
@section('content')

<div class="max-w-[36rem]">

  <h1 class="mb-20 text-[26px] font-bold leading-tight">Anmelden</h1>

  <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-y-15">
    @csrf

    <div>
      <label for="email" class="mb-5 block text-[15px]">E-Mail</label>
      <input
        id="email"
        type="email"
        name="email"
        value="{{ old('email') }}"
        required
        autofocus
        autocomplete="username"
        class="h-46 w-full border border-cocoa px-10">
      @error('email')
        <p class="mt-5 mb-0! text-[14px] text-state-taken">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="password" class="mb-5 block text-[15px]">Passwort</label>
      <input
        id="password"
        type="password"
        name="password"
        required
        autocomplete="current-password"
        class="h-46 w-full border border-cocoa px-10">
      @error('password')
        <p class="mt-5 mb-0! text-[14px] text-state-taken">{{ $message }}</p>
      @enderror
    </div>

    <label for="remember" class="flex items-center gap-x-8 text-[15px]">
      <input id="remember" type="checkbox" name="remember" value="1" class="h-15 w-15">
      Angemeldet bleiben
    </label>

    <div>
      <button
        type="submit"
        class="h-46 cursor-pointer bg-cocoa px-25 font-bold text-white uppercase transition-opacity hover:opacity-80">
        Anmelden
      </button>
    </div>

  </form>

</div>

@endsection
