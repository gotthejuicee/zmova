@php
    $book = config('book');

    $bookSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Book',
        'name' => $book['title'],
        'alternativeHeadline' => $book['tagline'],
        'author' => array_map(fn ($name) => ['@type' => 'Person', 'name' => $name], $book['authors']),
        'inLanguage' => $book['language'],
        'numberOfPages' => $book['pages'],
        'bookFormat' => 'https://schema.org/Hardcover',
        'genre' => $book['genre'],
        'image' => asset('images/og.png'),
        'url' => url('/'),
        'offers' => [
            '@type' => 'Offer',
            'price' => (string) $book['price'],
            'priceCurrency' => $book['currency'],
            'availability' => 'https://schema.org/InStock',
            'url' => url('/#order'),
        ],
    ];

    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(fn ($item) => [
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['a']],
        ], $book['faq']),
    ];

    $flags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;
@endphp

<script type="application/ld+json">{!! json_encode($bookSchema, $flags) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema, $flags) !!}</script>
