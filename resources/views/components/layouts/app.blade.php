@props(['title' => null])

@php
    $seoTitle = $title ?? config('book.seo.title');
    $seoDescription = config('book.seo.description');
@endphp

<!DOCTYPE html>
<html lang="uk" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <link rel="canonical" href="{{ url()->current() }}">

    @if ($gv = config('book.google_site_verification'))
        <meta name="google-site-verification" content="{{ $gv }}">
    @endif

    {{-- LCP: пріоритетне завантаження фону героя (адаптивно: мобільним легша версія) --}}
    <link rel="preload" as="image" href="{{ asset('images/День2-sm.webp') }}" media="(max-width: 767px)" fetchpriority="high">
    <link rel="preload" as="image" href="{{ asset('images/День2.webp') }}" media="(min-width: 768px)" fetchpriority="high">

    {{-- Open Graph --}}
    <meta property="og:type" content="book">
    <meta property="og:site_name" content="ЗМОВА">
    <meta property="og:locale" content="uk_UA">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:image" content="{{ asset('images/og.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:alt" content="ЗМОВА — книга-роман. День, коли зло переможе...">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ asset('images/og.png') }}">

    <link rel="icon" href="/favicon.ico" sizes="32x32">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32.png">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    {{-- schema.org: Book + FAQPage (rich-сніпети в пошуку) --}}
    <x-structured-data />

    {{-- Шрифти (Bunny, з кирилицею): вантажимо асинхронно, щоб не блокувати відрисовку --}}
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=montserrat:300,400,500,700|mulish:400,500,700|oswald:400,600|caveat:400&display=swap" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://fonts.bunny.net/css?family=montserrat:300,400,500,700|mulish:400,500,700|oswald:400,600|caveat:400&display=swap"></noscript>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800 antialiased">
    {{ $slot }}
</body>
</html>
