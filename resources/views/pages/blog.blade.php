@section('title', 'Blog — Product Updates & Guides')
@section('meta_description',
    'Explore DgnRavePay product updates, tutorials, and money insights to help you save, spend,
    and grow smarter.')
    <x-guest-layout>
        <section class="relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10 md:grid md:grid-cols-5 md:gap-5">
                    <div class="md:col-span-3">
                        <span class="uppercase text-xs md:text-sm">STAY UP TO DATE</span>
                        <h1
                            class="mt-5 capitalize mb-5 bg-clip-text text-transparent bg-gradient-to-r from-black to-primary">
                            The DgnRavePay Blog
                        </h1>
                        <p class="text-base md:text-lg">Dive into our latest product updates, user interviews, finance tips,
                            and strategic insights from the DgnRavePay team.
                        </p>
                        <div class="flex flex-col md:flex-row items-center gap-3 mt-10">
                            <form method="GET" action="/blog" class="flex flex-col md:flex-row items-center gap-3 mt-10">
                                <input type="text" name="q" value="{{ request('q') }}"
                                    class="bg-primary/5 w-full md:w-80 px-3 py-3 rounded-xl border border-primary-2 focus:outline-0"
                                    placeholder="Search for an Article">
                                <button type="submit"
                                    class="block w-full md:w-auto bg-primary text-white py-2 px-4 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                                    Search
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="md:col-span-2 flex flex-col items-end mt-10 md:mt-0">
                        <img src="{{ Vite::asset('resources/images/woman hand holding phone dark.png') }}" alt=""
                            class="h-80 md:h-96 lg:h-[33rem] mx-auto">
                    </div>
                </div>
            </div>
            <div class="">
                <img src="{{ Vite::asset('resources/images/vector line.svg') }}" alt="vector line"
                    class="absolute -z-[10] blur-[5rem] opacity-50 w-full bottom-16 left-0">
            </div>
        </section>
        <section class="bg-stone-200 py-20">
            <div class="custom-container mx-auto  px-5 md:px-10 py-10">
                @if ($posts->currentPage() === 1 && $posts->count() > 0)
                    @if (isset($featured) && $featured)
                        <h6 class="uppercase text-xs md:text-sm">Featured Articles</h6>
                        <div class="mt-5 md:mt-10">
                            <article class="bg-white rounded-xl p-3">
                                <div class="bg-primary-3 rounded-lg md:grid-cols-5 md:grid">
                                    <div class="md:col-span-3 px-5 md:px-7 py-10 md:py-14">
                                        <div
                                            class="bg-primary rounded-full uppercase mb-5 inline-block px-3 md:px-4 py-2 md:py-3">
                                            New Feature</div>
                                        <h2 class="text-white mb-5">
                                            {{ $featured->title }}
                                        </h2>
                                    </div>
                                    <div class="md:col-span-2 flex items-end justify-center overflow-hidden relative">
                                        @php
                                            $featCover = $featured->cover_image_path
                                                ? asset('storage/' . $featured->cover_image_path)
                                                : Vite::asset('resources/images/black hand holding card.png');
                                        @endphp
                                        <img src="{{ $featCover }}" alt="Featured: {{ $featured->title }}"
                                            class="h-[120%] object-contain md:object-cover md:h-full -rotate-[20deg] absolute -bottom-10">
                                    </div>
                                </div>
                                <div class="p-5">
                                    <p>{{ $featured->excerpt ?? '' }}</p>
                                    <div class="flex items-center gap-2 mt-10">
                                        <img src="{{ Vite::asset('resources/images/profile.jpg') }}" alt="Author"
                                            class="w-10 rounded-full">
                                        <p class="text-stone-500 uppercase text-sm md:text-base">
                                            {{ $featured->author ?? 'DgnRavePay Team' }}</p>
                                    </div>
                                    <div class="mt-6">
                                        <a href="/blog/{{ $featured->slug }}"
                                            class="text-primary font-semibold inline-flex items-center gap-2">
                                            <span>Read featured</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endif
                @endif
            </div>
        </section>

        <!-- News -->
        <section class="my-28">
            <div class="custom-container mx-auto  px-5 md:px-10">
                <h6 class="uppercase text-xs md:text-sm">Latest Articles</h6>
                <div class="mt-5 md:mt-10">
                    <div>
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                            @php
                                $collection = $posts->getCollection();
                                $items = $posts->currentPage() === 1 ? $collection->skip(1) : $collection;
                            @endphp
                            @foreach ($items as $post)
                                <article class="space-y-2">
                                    <a href="/blog/{{ $post->slug }}">
                                        @php
                                            $cover = $post->cover_image_path
                                                ? asset('storage/' . $post->cover_image_path)
                                                : Vite::asset('resources/images/article 1.jpg');
                                        @endphp
                                        <img src="{{ $cover }}" alt="{{ $post->title }}"
                                            class="aspect-video rounded-xl object-cover w-full mb-4">
                                        <h6 class="font-bold text-lg md:text-xl mb-2">{{ $post->title }}</h6>
                                        <p class="font-medium">{{ $post->excerpt }}</p>
                                        <div class="flex uppercase text-stone-700">
                                            {{ $post->author ?? 'DgnRavePay Team' }} -
                                            {{ optional(\Illuminate\Support\Carbon::parse($post->published_at))->toFormattedDateString() }}
                                        </div>
                                    </a>
                                </article>
                            @endforeach
                        </div>
                        <div class="flex items-center justify-center mt-20 gap-5">
                            @php
                                // Preserve all current query params except the page number to avoid duplicates
                                $qs = http_build_query(request()->except('page'));
                                $prevUrl = $posts->previousPageUrl();
                                $nextUrl = $posts->nextPageUrl();
                                $prevHref = $prevUrl ? ($qs ? $prevUrl . '&' . $qs : $prevUrl) : '#';
                                $nextHref = $nextUrl ? ($qs ? $nextUrl . '&' . $qs : $nextUrl) : '#';
                            @endphp
                            <a href="{{ $prevHref }}"
                                class="bg-stone-200 rounded-lg py-3 px-3 flex items-center gap-2 {{ $prevUrl ? 'opacity-100' : 'opacity-50 pointer-events-none' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                                <span>Prev</span>
                            </a>
                            <div class="px-5 py-4 rounded-full border border-black">
                                {{ $posts->currentPage() }}/{{ $posts->lastPage() }}</div>
                            <a href="{{ $nextHref }}"
                                class="bg-stone-200 rounded-lg py-3 px-3 flex items-center gap-2 {{ $nextUrl ? 'opacity-100' : 'opacity-50 pointer-events-none' }}">
                                <span>Next</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-guest-layout>
