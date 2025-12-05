<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO --}}
    <x-seo :title="trim($__env->yieldContent('title') ?? config('app.name', 'Laravel'))" :description="trim($__env->yieldContent('meta_description') ?? '')" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ Vite::asset('resources/images/favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ Vite::asset('resources/images/favicon.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if (request()->is('/') || request()->is('savings') || request()->is('business'))
        @vite(['resources/js/pages/index.js'])
    @elseif (request()->is('about') || request()->is('career'))
        @vite(['resources/js/pages/about.js'])
    @elseif (request()->is('pos') || request()->is('pos'))
        @vite(['resources/js/pages/pos.js'])
    @endif
    @stack('head')
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased {{ request()->is('about') ? 'bg-accent-black text-white' : 'text-gray-900' }}">
    <x-pages.nav />


    <div class="">
        {{ $slot }}
    </div>

    <x-pages.footer />
    @stack('scripts')

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/6849d9a8b344c019092581a0/1itg7ketr';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
