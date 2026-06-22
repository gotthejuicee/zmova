@props(['title' => 'ЗМОВА — День, коли зло переможе...'])

<!DOCTYPE html>
<html lang="uk" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>
    <meta name="description" content="Поринь у світ змови, де кожна сторінка тримає в напрузі. Замов зараз.">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="ЗМОВА — День, коли зло переможе...">
    <meta property="og:description" content="Поринь у світ змови, де кожна сторінка тримає в напрузі. Замов зараз.">
    <meta property="og:image" content="{{ asset('images/preview(1).jpg') }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:title" content="ЗМОВА — День, коли зло переможе...">
    <meta name="twitter:description" content="Поринь у світ змови, де кожна сторінка тримає в напрузі. Замов зараз.">
    <meta name="twitter:image" content="{{ asset('images/preview(1).jpg') }}">

    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📖</text></svg>">

    {{-- schema.org: Book + FAQPage (rich-сніпети в пошуку) --}}
    <x-structured-data />

    {{-- Шрифти: self-hosted дзеркало Google Fonts (без трекінгу), з кириличними сабсетами --}}
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=montserrat:300,400,500,700|mulish:400,500,700|oswald:400,600|caveat:400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800 antialiased">
    {{ $slot }}
</body>
</html>
