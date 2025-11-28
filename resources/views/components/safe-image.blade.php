@props([
    'src' => '',
    'fallback' => null,
    'alt' => '',
    'class' => '',
    'loading' => 'lazy'
])

@php
    $safeSrc = safe_asset($src, $fallback);
@endphp

<img 
    src="{{ $safeSrc }}" 
    alt="{{ $alt }}" 
    class="{{ $class }}"
    loading="{{ $loading }}"
    {{ $attributes }}
    onerror="this.onerror=null; this.src='{{ asset_fallback($fallback ?? 'static') }}';"
>