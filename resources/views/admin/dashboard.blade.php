@extends('admin.layout')

@section('content')
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-semibold">Welcome back</h2>
            <p class="text-gray-500 mt-1">Overview and quick actions</p>
        </div>

        <!-- KPI cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
            <div
                class="group h-full rounded-2xl bg-white/90 backdrop-blur shadow ring-1 ring-black/5 p-5 hover:shadow-lg transition flex flex-col">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <div class="text-xs uppercase tracking-wide text-gray-500">Blog Posts</div>
                        <div class="mt-1 text-2xl font-semibold">{{ $blogCount ?? '0' }}</div>
                        <div class="mt-1 text-xs text-gray-500">Total posts</div>
                        <div class="mt-2 flex flex-wrap gap-2 text-xs">
                            <span
                                class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-green-50 text-green-700 border border-green-200">Published
                                {{ $blogPublished ?? 0 }}</span>
                            <span
                                class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-amber-50 text-amber-800 border border-amber-200">Draft
                                {{ $blogDraft ?? 0 }}</span>
                            <span
                                class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-primary/10 text-primary-3 border border-primary/20">Featured
                                {{ $blogFeatured ?? 0 }}</span>
                        </div>
                    </div>
                    <div
                        class="h-10 w-10 shrink-0 rounded-xl bg-primary/20 text-primary-3 grid place-items-center font-bold">
                        B</div>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-100 flex items-center gap-2 text-primary font-medium">
                    <a class="inline-flex items-center gap-2" href="{{ route('admin.blog-posts.index') }}">Manage<span
                            aria-hidden>→</span></a>
                    <span class="text-gray-300">·</span>
                    <a class="inline-flex items-center gap-2" href="{{ route('admin.blog-posts.create') }}">New Post</a>
                </div>
            </div>

            <div
                class="group h-full rounded-2xl bg-white/90 backdrop-blur shadow ring-1 ring-black/5 p-5 hover:shadow-lg transition flex flex-col">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <div class="text-xs uppercase tracking-wide text-gray-500">Career Posts</div>
                        <div class="mt-1 text-2xl font-semibold">{{ $careerCount ?? '0' }}</div>
                        <div class="mt-1 text-xs text-gray-500">Total openings</div>
                        <div class="mt-2 flex flex-wrap gap-2 text-xs">
                            <span
                                class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-green-50 text-green-700 border border-green-200">Published
                                {{ $careerPublished ?? 0 }}</span>
                            <span
                                class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-amber-50 text-amber-800 border border-amber-200">Draft
                                {{ $careerDraft ?? 0 }}</span>
                        </div>
                    </div>
                    <div
                        class="h-10 w-10 shrink-0 rounded-xl bg-primary/20 text-primary-3 grid place-items-center font-bold">
                        C</div>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-100 flex items-center gap-2 text-primary font-medium">
                    <a class="inline-flex items-center gap-2" href="{{ route('admin.career-posts.index') }}">Manage<span
                            aria-hidden>→</span></a>
                    <span class="text-gray-300">·</span>
                    <a class="inline-flex items-center gap-2" href="{{ route('admin.career-posts.create') }}">New
                        Career</a>
                </div>
            </div>

            <div
                class="group h-full rounded-2xl bg-white/90 backdrop-blur shadow ring-1 ring-black/5 p-5 hover:shadow-lg transition flex flex-col">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <div class="text-xs uppercase tracking-wide text-gray-500">FAQs</div>
                        <div class="mt-1 text-2xl font-semibold">{{ $faqCount ?? '0' }}</div>
                        <div class="mt-1 text-xs text-gray-500">Total questions</div>
                        <div class="mt-2 flex flex-wrap gap-2 text-xs">
                            <span
                                class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-green-50 text-green-700 border border-green-200">Published
                                {{ $faqPublished ?? 0 }}</span>
                            <span
                                class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-amber-50 text-amber-800 border border-amber-200">Draft
                                {{ $faqDraft ?? 0 }}</span>
                        </div>
                    </div>
                    <div
                        class="h-10 w-10 shrink-0 rounded-xl bg-primary/20 text-primary-3 grid place-items-center font-bold">
                        F</div>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-100 flex items-center gap-2 text-primary font-medium">
                    <a class="inline-flex items-center gap-2" href="{{ route('admin.faqs.index') }}">Manage<span
                            aria-hidden>→</span></a>
                    <span class="text-gray-300">·</span>
                    <a class="inline-flex items-center gap-2" href="{{ route('admin.faqs.create') }}">New FAQ</a>
                </div>
            </div>

            <div
                class="group h-full rounded-2xl bg-white/90 backdrop-blur shadow ring-1 ring-black/5 p-5 hover:shadow-lg transition flex flex-col">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <div class="text-xs uppercase tracking-wide text-gray-500">Testimonials</div>
                        <div class="mt-1 text-2xl font-semibold">{{ $testimonialCount ?? '—' }}</div>
                        <div class="mt-1 text-xs text-gray-500">Total testimonials</div>
                    </div>
                    <div
                        class="h-10 w-10 shrink-0 rounded-xl bg-primary/20 text-primary-3 grid place-items-center font-bold">
                        T</div>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-100 flex items-center gap-2 text-primary font-medium">
                    <a class="inline-flex items-center gap-2" href="{{ route('admin.testimonials.index') }}">Manage<span
                            aria-hidden>→</span></a>
                </div>
            </div>
        </div>

        <!-- Analytics and right column -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            <!-- Simple analytics card -->
            <div class="rounded-2xl bg-white/90 backdrop-blur shadow ring-1 ring-black/5 p-5 lg:col-span-2"
                x-data='{"data": @json($trend7), "initial7": @json($trend7), "data30": @json($trend30)}'>
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-semibold">Content activity (last 7 days)</h4>
                        <p class="text-gray-500 text-sm">Newly created or updated items</p>
                    </div>
                    <div class="text-sm text-gray-500">Live trend</div>
                </div>
                <div class="mt-4">
                    <div class="grid grid-cols-7 gap-2 h-28 items-end">
                        <template x-for="(d,i) in data" :key="i">
                            <div class="space-y-1">
                                <div class="flex items-end gap-1 h-24">
                                    <div class="w-2 bg-primary/30 rounded" :style="`height:${Math.min(100, d.posts*20)}%`">
                                    </div>
                                    <div class="w-2 bg-green-400/40 rounded"
                                        :style="`height:${Math.min(100, d.careers*20)}%`"></div>
                                    <div class="w-2 bg-amber-400/40 rounded" :style="`height:${Math.min(100, d.faqs*20)}%`">
                                    </div>
                                </div>
                                <div class="text-xs text-gray-500" x-text="d.label"></div>
                            </div>
                        </template>
                    </div>
                    <div class="mt-3 flex items-center gap-4 text-xs text-gray-600">
                        <span class="inline-flex items-center gap-1"><span class="w-3 h-3 bg-primary/30 rounded"></span>
                            Posts</span>
                        <span class="inline-flex items-center gap-1"><span class="w-3 h-3 bg-green-400/40 rounded"></span>
                            Careers</span>
                        <span class="inline-flex items-center gap-1"><span class="w-3 h-3 bg-amber-400/40 rounded"></span>
                            FAQs</span>
                        <span class="ml-auto text-gray-500">
                            <button class="px-2 py-1 rounded hover:bg-gray-100" @click="data = data30">Last 30 days</button>
                            <span class="text-gray-300">|</span>
                            <button class="px-2 py-1 rounded hover:bg-gray-100" @click="data = initial7">Last 7
                                days</button>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Right column: recent + tags stacked -->
            <div class="flex flex-col gap-6">
                <div class="rounded-2xl bg-white backdrop-blur shadow ring-1 ring-black/5 p-5">
                    <h4 class="font-semibold">Recent updates</h4>
                    <ul class="mt-3 text-sm divide-y divide-gray-100">
                        @foreach ($recent ?? [] as $item)
                            <li class="flex items-center justify-between gap-3 py-2 first:pt-0 last:pb-0">
                                <div class="min-w-0 flex items-center gap-2.5">
                                    <span
                                        class="shrink-0 inline-flex items-center justify-center h-5 w-5 rounded-full bg-gray-100 text-gray-700">
                                        @php($t = strtolower($item['type'] ?? ''))
                                        @if ($t === 'post')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="w-4 h-4">
                                                <path
                                                    d="M4.5 5.25A2.25 2.25 0 016.75 3h6.879c.597 0 1.17.237 1.592.659l3.12 3.121c.422.422.659.995.659 1.591V18a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 18V5.25z" />
                                                <path
                                                    d="M9 7.5h3.75a.75.75 0 010 1.5H9a.75.75 0 010-1.5zM9 10.5h6a.75.75 0 010 1.5H9a.75.75 0 010-1.5zM9 13.5h6a.75.75 0 010 1.5H9a.75.75 0 010-1.5z" />
                                            </svg>
                                        @elseif($t === 'career')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4">
                                                <path
                                                    d="M9 6a3 3 0 016 0v1h3.25A2.75 2.75 0 0121 9.75v.75H3v-.75A2.75 2.75 0 015.75 7H9V6zM3 12.75V17A2.75 2.75 0 005.75 19.75h12.5A2.75 2.75 0 0021 17v-4.25H3z" />
                                            </svg>
                                        @elseif($t === 'faq')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4">
                                                <path fill-rule="evenodd"
                                                    d="M4.5 4.5A2.25 2.25 0 016.75 2.25h10.5A2.25 2.25 0 0119.5 4.5v10.5a2.25 2.25 0 01-2.25 2.25H8.31l-3.28 3.28A.75.75 0 013 19.5V4.5zM9 7.5a.75.75 0 000 1.5h6a.75.75 0 000-1.5H9zm0 3a.75.75 0 000 1.5h3a.75.75 0 000-1.5H9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        @elseif($t === 'testimonial')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4">
                                                <path
                                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.75 20.25a8.25 8.25 0 0116.5 0v.75H3.75v-.75z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4">
                                                <path
                                                    d="M12 2.25a.75.75 0 01.75.75v17.19l3.47-3.47a.75.75 0 111.06 1.06l-4.75 4.75a.75.75 0 01-1.06 0L6.72 17.78a.75.75 0 011.06-1.06l3.47 3.47V3a.75.75 0 01.75-.75z" />
                                            </svg>
                                        @endif
                                    </span>
                                    <div class="truncate">
                                        <span class="font-medium text-gray-900 truncate">{{ $item['title'] }}</span>
                                    </div>
                                </div>
                                <span class="shrink-0 text-xs text-gray-500 whitespace-nowrap"
                                    title="{{ $item['when'] }}">{{ $item['when'] }}</span>
                            </li>
                        @endforeach
                        @if (empty($recent))
                            <li class="text-gray-500">No recent activity</li>
                        @endif
                    </ul>
                </div>

                <div class="rounded-2xl bg-white/90 backdrop-blur shadow ring-1 ring-black/5 p-5">
                    <h4 class="font-semibold">Top tags</h4>
                    <ul class="mt-3 space-y-2 text-sm">
                        @forelse(($topTags ?? []) as $tag)
                            <li class="flex items-center justify-between">
                                <div class="truncate">{{ data_get($tag, 'name') }}</div>
                                <span
                                    class="ml-3 inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-gray-100 text-gray-700 border border-gray-200">{{ data_get($tag, 'posts_count', 0) }}</span>
                            </li>
                        @empty
                            <li class="text-gray-500">No tags yet</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
