<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin · {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('head')
</head>

<body class="bg-gray-50 text-gray-900" data-no-aos="true">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
            class="fixed inset-y-0 left-0 z-40 w-72 transform transition-transform duration-200 ease-in-out bg-accent-black text-white md:translate-x-0">
            <div class="h-full flex flex-col">
                <div class="flex items-center gap-3 px-5 h-16 border-b border-white/10">
                    <a href="/" class="flex items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/logo wide white.png') }}"
                            alt="{{ config('app.name') }}" class="h-8">
                    </a>
                </div>
                <nav class="flex-1 overflow-y-auto py-4 minimal-scrollbar" x-data="{
                    content: true,
                    community: true,
                    locations: true,
                    performance: true,
                    requests: true
                }">
                    @php
                        $linkBase = 'block px-5 py-3 rounded-xl mx-3 mb-1.5 transition hover:bg-white/10';
                        $active = 'bg-white/10 text-white';
                        $inactive = 'text-white/70';
                        $categoryHeader = 'px-5 pt-4 pb-2 text-xs font-semibold text-white/50 uppercase tracking-wider flex items-center justify-between cursor-pointer hover:text-white/70 transition';
                    @endphp
                    
                    <a href="{{ route('admin.dashboard') }}"
                        class="{{ $linkBase }} {{ request()->routeIs('admin.dashboard') ? $active : $inactive }}">
                        <span>Dashboard</span>
                    </a>

                    <!-- Content Section -->
                    <div class="{{ $categoryHeader }} mt-4" @click="content = !content">
                        <span>Content</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transition-transform" :class="content ? '' : 'rotate-180'">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                    <div x-show="content" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-2">
                        <a href="{{ route('admin.blog-posts.index') }}"
                            class="{{ $linkBase }} {{ request()->routeIs('admin.blog-posts.*') ? $active : $inactive }}">
                            <span>Blog Posts</span>
                        </a>
                        <a href="{{ route('admin.career-posts.index') }}"
                            class="{{ $linkBase }} {{ request()->routeIs('admin.career-posts.*') ? $active : $inactive }}">
                            <span>Career Posts</span>
                        </a>
                        <a href="{{ route('admin.press-items.index') }}"
                            class="{{ $linkBase }} {{ request()->routeIs('admin.press-items.*') ? $active : $inactive }}">
                            <span>Press Items</span>
                        </a>
                    </div>

                    <!-- Community Section -->
                    <div class="{{ $categoryHeader }}" @click="community = !community">
                        <span>Community</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transition-transform" :class="community ? '' : 'rotate-180'">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                    <div x-show="community"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-2">
                        <a href="{{ route('admin.faqs.index') }}"
                            class="{{ $linkBase }} {{ request()->routeIs('admin.faqs.*') ? $active : $inactive }}">
                            <span>FAQs</span>
                        </a>
                        <a href="{{ route('admin.testimonials.index') }}"
                            class="{{ $linkBase }} {{ request()->routeIs('admin.testimonials.*') ? $active : $inactive }}">
                            <span>Testimonials</span>
                        </a>
                    </div>

                    <!-- Locations Section -->
                    <div class="{{ $categoryHeader }}" @click="locations = !locations">
                        <span>Locations</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transition-transform" :class="locations ? '' : 'rotate-180'">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                    <div x-show="locations"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-2">
                        <a href="{{ route('admin.states.index') }}"
                            class="{{ $linkBase }} {{ request()->routeIs('admin.states.*') ? $active : $inactive }}">
                            <span>States</span>
                        </a>
                        <a href="{{ route('admin.branches.index') }}"
                            class="{{ $linkBase }} {{ request()->routeIs('admin.branches.*') ? $active : $inactive }}">
                            <span>Branches</span>
                        </a>
                    </div>

                    <!-- Requests Section -->
                    <div class="{{ $categoryHeader }}" @click="requests = !requests">
                        <span>Requests</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transition-transform" :class="requests ? '' : 'rotate-180'">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                    <div x-show="requests"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-2">
                        <a href="{{ route('admin.partnership-requests.index') }}"
                            class="{{ $linkBase }} {{ request()->routeIs('admin.partnership-requests.*') ? $active : $inactive }}">
                            <span>Partnerships</span>
                        </a>
                    </div>

                    <!-- Performance Section -->
                    <div class="{{ $categoryHeader }}" @click="performance = !performance">
                        <span>Performance</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transition-transform" :class="performance ? '' : 'rotate-180'">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                    <div x-show="performance"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-2">
                        <a href="{{ route('admin.assets.dashboard') }}"
                            class="{{ $linkBase }} {{ request()->routeIs('admin.assets.*') ? $active : $inactive }}">
                            <span>Asset Performance</span>
                        </a>
                    </div>
                </nav>
                <div class="p-4 mt-auto border-t border-white/10">
                    <form method="POST" action="{{ route('logout') }}" class="flex">
                        @csrf
                        <button
                            class="w-full inline-flex justify-center items-center gap-2 rounded-lg bg-primary text-primary-3 font-semibold py-2.5 hover:brightness-95 transition">
                            Log out
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main content area -->
        <div class="flex-1 min-w-0 md:ml-72">
            <!-- Top bar -->
            <header class="sticky top-0 z-30 bg-white/80 backdrop-blur border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-5 md:px-8 h-16 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden p-2 rounded-lg hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6 text-gray-700">
                                <path fill-rule="evenodd"
                                    d="M3.75 5.25A.75.75 0 014.5 4.5h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75zm0 7.5a.75.75 0 01.75-.75h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75zm.75 6.75a.75.75 0 000 1.5h15a.75.75 0 000-1.5h-15z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <h1 class="text-lg font-semibold">Admin</h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="hidden sm:block text-sm text-gray-500">{{ auth()->user()->name ?? 'Admin' }}</div>
                        <div class="h-9 w-9 rounded-full bg-gray-200"></div>
                    </div>
                </div>
            </header>

            <!-- Page content -->
            <main class="max-w-7xl mx-auto px-5 md:px-8 py-6">
                @if (session('status'))
                    <div class="p-3 bg-green-50 border border-green-200 text-green-700 rounded mb-4">
                        {{ session('status') }}</div>
                @endif

                @if (trim($__env->yieldContent('page_title')))
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                        <div>
                            <h2 class="text-xl font-semibold">@yield('page_title')</h2>
                            @if (trim($__env->yieldContent('page_subtitle')))
                                <p class="text-gray-500 mt-1 text-sm">@yield('page_subtitle')</p>
                            @endif
                        </div>
                        <div class="flex items-center gap-2">@yield('page_actions')</div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>

@stack('scripts')

</html>
