{{--
  Eigenständiges Layout für die Gewerbeverwaltung: gleiche Schriften und Farben
  wie die Website, aber ohne deren Navigation und ohne app.js (Swiper, Mapbox
  und ScrollReveal werden hier nicht gebraucht).
--}}
<!DOCTYPE html>
<html lang="de" class="overflow-y-scroll">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>@yield('title', 'Verwaltung') – Shift Altstetten</title>
  <link rel="icon" type="image/svg+xml" href="/favicon.svg">
  <link rel="shortcut icon" href="/favicon.ico">
  @vite(['resources/css/app.css'])
</head>
<body class="bg-white text-cocoa">

  <div class="mx-auto w-full max-w-[80rem] px-20 py-30 md:px-30 md:py-40">

    <header class="mb-30 flex flex-wrap items-center justify-between gap-x-20 gap-y-10 border-b border-cocoa pb-15">
      <div>
        <a href="{{ route('admin.objects.index') }}" class="text-[24px] font-bold leading-none">SHIFT Verwaltung</a>
        @hasSection('subtitle')
          <p class="mb-0! text-[15px] opacity-70">@yield('subtitle')</p>
        @endif
      </div>

      @auth
        <div class="flex items-center gap-x-15 text-[15px]">
          <span class="opacity-70">{{ auth()->user()->name }}</span>
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="cursor-pointer underline transition-opacity hover:opacity-60">Abmelden</button>
          </form>
        </div>
      @endauth
    </header>

    @if(session('status'))
      <p class="mb-25 bg-blush px-15 py-10 text-[15px]">{{ session('status') }}</p>
    @endif

    @yield('content')

  </div>

</body>
</html>
