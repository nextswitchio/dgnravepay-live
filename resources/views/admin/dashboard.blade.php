@extends('admin.layout')

@section('content')
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-semibold">Welcome back</h2>
            <p class="text-gray-500 mt-1">Quick links to manage your content</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <a href="{{ route('admin.blog-posts.index') }}"
                class="group rounded-2xl bg-white/90 backdrop-blur shadow ring-1 ring-black/5 p-5 hover:shadow-lg transition">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="font-semibold">Blog Posts</h3>
                        <p class="text-gray-500 mt-1">Create, edit, publish</p>
                        <p class="mt-2 text-sm"><span class="font-semibold">{{ $blogCount ?? '0' }}</span> total</p>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-primary/20 text-primary-3 grid place-items-center font-bold">B</div>
                </div>
                <div class="mt-4 inline-flex items-center gap-2 text-primary font-medium">Manage<span aria-hidden>→</span>
                </div>
            </a>
            <a href="{{ route('admin.career-posts.index') }}"
                class="group rounded-2xl bg-white/90 backdrop-blur shadow ring-1 ring-black/5 p-5 hover:shadow-lg transition">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="font-semibold">Career Posts</h3>
                        <p class="text-gray-500 mt-1">Open roles and updates</p>
                        <p class="mt-2 text-sm"><span class="font-semibold">{{ $careerCount ?? '0' }}</span> total</p>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-primary/20 text-primary-3 grid place-items-center font-bold">C</div>
                </div>
                <div class="mt-4 inline-flex items-center gap-2 text-primary font-medium">Manage<span aria-hidden>→</span>
                </div>
            </a>
            <a href="{{ route('admin.faqs.index') }}"
                class="group rounded-2xl bg-white/90 backdrop-blur shadow ring-1 ring-black/5 p-5 hover:shadow-lg transition">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="font-semibold">FAQs</h3>
                        <p class="text-gray-500 mt-1">Common questions</p>
                        <p class="mt-2 text-sm"><span class="font-semibold">{{ $faqCount ?? '0' }}</span> total</p>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-primary/20 text-primary-3 grid place-items-center font-bold">F</div>
                </div>
                <div class="mt-4 inline-flex items-center gap-2 text-primary font-medium">Manage<span aria-hidden>→</span>
                </div>
            </a>
        </div>
    </div>
@endsection
