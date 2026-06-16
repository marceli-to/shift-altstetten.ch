@php
  $appName = config('app.name', 'Shift Altstetten');
  $defaultDescription = 'Shift Altstetten – leben und arbeiten an einem Ort.';
@endphp
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="view-transition" content="same-origin">
<title>@hasSection('meta_title')@yield('meta_title') – {{ $appName }}@else{{ $appName }}@endif</title>
<meta name="description" content="@yield('meta_description', $defaultDescription)">
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="Shift Altstetten" />
<link rel="manifest" href="/site.webmanifest" />
<meta property="og:title" content="@hasSection('meta_title')@yield('meta_title') – {{ $appName }}@else{{ $appName }}@endif" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ asset('opengraph.jpg') }}" />
<meta property="og:description" content="@yield('meta_description', $defaultDescription)" />
<meta property="og:site_name" content="{{ $appName }}" />
<meta property="og:locale" content="de_CH" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="@hasSection('meta_title')@yield('meta_title') – {{ $appName }}@else{{ $appName }}@endif" />
<meta name="twitter:description" content="@yield('meta_description', $defaultDescription)" />
<meta name="twitter:image" content="{{ asset('opengraph.jpg') }}" />
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
