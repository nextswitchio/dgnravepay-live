@props([
    'title' => config('app.name'),
    'description' => null,
    'canonical' => null,
    'image' => null,
    'type' => 'website',
    'noindex' => false,
    'jsonLd' => null,
    'onlyJsonLd' => false,
])

@php
    $siteName = config('app.name');
    $fullTitle = $title ? $title . ' | ' . $siteName : $siteName;
    $url = $canonical ?? url()->current();
    $desc = $description ?? strip_tags($description ?? '');
    $img = $image ?? Vite::asset('resources/images/logo wide.png');

    // Provide sensible default JSON-LD (Organization + WebSite) if none supplied
    $appUrl = config('app.url') ?? url('/');
    $defaultJsonLd = [
        [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $siteName,
            'url' => $appUrl,
        ],
        [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $siteName,
            'url' => $appUrl,
        ],
    ];
    $schemaToRender = $jsonLd ?? $defaultJsonLd;
@endphp

@unless ($onlyJsonLd)
    <title>{{ $fullTitle }}</title>
    @if ($desc)
        <meta name="description" content="{{ $desc }}">
    @endif
    <link rel="canonical" href="{{ $url }}" />
    @if ($noindex)
        <meta name="robots" content="noindex,nofollow" />
    @endif

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ $type }}">
    <meta property="og:title" content="{{ $fullTitle }}">
    @if ($desc)
        <meta property="og:description" content="{{ $desc }}">
    @endif
    <meta property="og:url" content="{{ $url }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    @if ($img)
        <meta property="og:image" content="{{ $img }}">
    @endif

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $fullTitle }}">
    @if ($desc)
        <meta name="twitter:description" content="{{ $desc }}">
    @endif
    @if ($img)
        <meta name="twitter:image" content="{{ $img }}">
    @endif
@endunless

@if (!empty($schemaToRender))
    <script type="application/ld+json">{!! json_encode($schemaToRender, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endif
