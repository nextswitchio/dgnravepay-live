<div class="custom-container mx-auto">
    <div class="mb-10 px-5 md:px-10" data-aos="fade-up">
        <h2 class="text-center mb-5">Get Savvy About Your
            Financial Life</h2>
        <p class="text-center">See why over 100,000 Nigerians have made DgnRavePay their go-to financial app. Real
            reviews, real stories, real results.</p>
    </div>
    <div>
        @php
            $posts = \App\Models\BlogPost::where('is_published', true)->latest('published_at')->take(3)->get();
        @endphp
        @if ($posts->isNotEmpty())
            <!-- Mobile carousel (swipeable) -->
            <div class="block md:hidden" x-data>
                <div id="news-carousel-track" class="overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar">
                    <div class="flex gap-5 px-1">
                        @foreach ($posts as $i => $post)
                            @php
                                $cover = $post->cover_image_path
                                    ? storage_asset($post->cover_image_path)
                                    : Vite::asset('resources/images/article ' . (($i % 3) + 1) . '.jpg');
                                $dateSource = $post->published_at ?: $post->created_at;
                                try {
                                    $date = \Illuminate\Support\Carbon::parse($dateSource)->format('M j, Y');
                                } catch (\Throwable $e) {
                                    $date = '';
                                }
                                $excerpt =
                                    $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 140);
                                $url = route('blog.show', $post->slug);
                            @endphp
                            <article class="snap-center shrink-0 w-[85%] first:ml-4 last:mr-4 space-y-2">
                                <a href="{{ $url }}" class="block">
                                    <img src="{{ $cover }}" alt="{{ $post->title }}"
                                        class="aspect-video w-full rounded-xl object-cover">
                                </a>
                                <a href="{{ $url }}" class="block">
                                    <h6 class="font-bold text-lg">{{ $post->title }}</h6>
                                </a>
                                <p class="font-medium">{{ $excerpt }}</p>
                                <div class="flex uppercase text-stone-700">
                                    {{ $post->author ?? 'Admin' }}@if ($date)
                                        - {{ $date }}
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center justify-between mt-6 gap-4 px-4">
                    <a href="{{ route('blog.index') }}"
                        class="inline-flex items-center gap-2 text-stone-700 hover:text-stone-900">
                        <span class="font-semibold">View all</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                    <div class="flex items-center gap-0">
                        <button id="news-prev" type="button" aria-label="Previous"
                            class="p-1 rounded-full hover:bg-stone-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="0.5" stroke="currentColor" class="size-16">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                        <button id="news-next" type="button" aria-label="Next"
                            class="p-1 rounded-full hover:bg-stone-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="0.5" stroke="currentColor" class="size-16">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Desktop grid -->
            <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($posts as $i => $post)
                    @php
                        $cover = $post->cover_image_path
                            ? storage_asset($post->cover_image_path)
                            : Vite::asset('resources/images/article ' . (($i % 3) + 1) . '.jpg');
                        $dateSource = $post->published_at ?: $post->created_at;
                        try {
                            $date = \Illuminate\Support\Carbon::parse($dateSource)->format('M j, Y');
                        } catch (\Throwable $e) {
                            $date = '';
                        }
                        $excerpt = $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 140);
                        $url = route('blog.show', $post->slug);
                    @endphp
                    <article class="space-y-2">
                        <a href="{{ $url }}" class="block">
                            <img src="{{ $cover }}" alt="{{ $post->title }}"
                                class="aspect-video w-full rounded-xl object-cover">
                        </a>
                        <a href="{{ $url }}" class="block">
                            <h6 class="font-bold text-lg">{{ $post->title }}</h6>
                        </a>
                        <p class="font-medium">{{ $excerpt }}</p>
                        <div class="flex uppercase text-stone-700">
                            {{ $post->author ?? 'Admin' }} - {{ $date }}
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="hidden md:flex items-center justify-end mt-20">
                <a href="{{ route('blog.index') }}"
                    class="inline-flex items-center gap-3 text-stone-700 hover:text-stone-900">
                    <span class="font-semibold">View all</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        (function() {
            const track = document.getElementById('news-carousel-track');
            const prevBtn = document.getElementById('news-prev');
            const nextBtn = document.getElementById('news-next');
            if (!track) return;

            const slides = Array.from(track.querySelectorAll('article'));
            if (!slides.length) return;

            let current = 0;

            function clampIndex(i) {
                // Wrap around
                if (i < 0) return slides.length - 1;
                if (i >= slides.length) return 0;
                return i;
            }

            function scrollToIndex(i) {
                current = clampIndex(i);
                const target = slides[current];
                if (!target) return;
                const tRect = target.getBoundingClientRect();
                const cRect = track.getBoundingClientRect();
                const currentScroll = track.scrollLeft;
                const offset = (tRect.left - cRect.left) + currentScroll - 16; // 16px ~ ml-4
                track.scrollTo({
                    left: offset,
                    behavior: 'smooth'
                });
            }

            function updateCurrentFromScroll() {
                const left = track.scrollLeft;
                let bestIdx = 0;
                let bestDist = Infinity;
                for (let i = 0; i < slides.length; i++) {
                    const dist = Math.abs(slides[i].offsetLeft - left);
                    if (dist < bestDist) {
                        bestDist = dist;
                        bestIdx = i;
                    }
                }
                current = bestIdx;
            }

            track.addEventListener('scroll', () => {
                // Debounced-ish update for active index
                if (track._t) cancelAnimationFrame(track._t);
                track._t = requestAnimationFrame(updateCurrentFromScroll);
            });

            prevBtn && prevBtn.addEventListener('click', () => scrollToIndex(current - 1));
            nextBtn && nextBtn.addEventListener('click', () => scrollToIndex(current + 1));

            // Snap to first on load
            window.addEventListener('load', () => scrollToIndex(0));
            window.addEventListener('resize', () => scrollToIndex(current));
        })();
    </script>
@endpush
