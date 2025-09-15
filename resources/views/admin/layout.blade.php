<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin · {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-50 text-gray-900">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
            class="fixed md:static inset-y-0 left-0 z-40 w-72 transform transition-transform duration-200 ease-in-out bg-accent-black text-white md:translate-x-0">
            <div class="h-full flex flex-col">
                <div class="flex items-center gap-3 px-5 h-16 border-b border-white/10">
                    <a href="/" class="flex items-center gap-2">
                        <img src="{{ Vite::asset('resources/images/logo wide white.png') }}"
                            alt="{{ config('app.name') }}" class="h-8">
                    </a>
                </div>
                <nav class="flex-1 overflow-y-auto py-4 minimal-scrollbar">
                    @php
                        $linkBase = 'block px-5 py-3 rounded-xl mx-3 mb-1.5 transition hover:bg-white/10';
                        $active = 'bg-white/10 text-white';
                        $inactive = 'text-white/70';
                    @endphp
                    <a href="{{ route('admin.dashboard') }}"
                        class="{{ $linkBase }} {{ request()->routeIs('admin.dashboard') ? $active : $inactive }}">
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.blog-posts.index') }}"
                        class="{{ $linkBase }} {{ request()->routeIs('admin.blog-posts.*') ? $active : $inactive }}">
                        <span>Blog Posts</span>
                    </a>
                    <a href="{{ route('admin.career-posts.index') }}"
                        class="{{ $linkBase }} {{ request()->routeIs('admin.career-posts.*') ? $active : $inactive }}">
                        <span>Career Posts</span>
                    </a>
                    <a href="{{ route('admin.faqs.index') }}"
                        class="{{ $linkBase }} {{ request()->routeIs('admin.faqs.*') ? $active : $inactive }}">
                        <span>FAQs</span>
                    </a>
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
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
