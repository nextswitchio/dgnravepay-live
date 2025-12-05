@section('title', 'Press, Media and Brand Assets')
@section('meta_description',
    'Download DgnRavePay logos, media kits, product screenshots, and brand guidelines for press
    and partners.')
    <x-guest-layout>
        <section class="relative pt-10">
            <div class="py-20 md:py-32 lg:py-40">
                <div class="custom-container mx-auto  px-5 md:px-14">
                    <div class="text-center">
                        <h1
                            class="capitalize text-center mb-5 bg-clip-text text-transparent bg-gradient-to-r from-black to-primary">
                            DgnRavePay Brand &amp; Media Resources
                        </h1>
                        <p class="font-medium text-base md:text-lg">
                            Access official DgnRavePay logos, media kits, product screenshots, and brand guidelines.
                            Whether you're a journalist, partner, or collaborator, our press resources are designed to
                            help you tell our story with accuracy and impact
                        </p>
                    </div>
                </div>
            </div>
            <div class="">
                <img src="{{ Vite::asset('resources/images/vector line.svg') }}" alt="vector line"
                    class="absolute -z-[10] blur-[5rem] opacity-50 w-full bottom-0 left-0">
            </div>
        </section>
        <div class="custom-container mx-auto  px-5 md:px-10 pb-28 md:grid md:grid-cols-10 md:gap-5">
            <div class="col-span-3">
                <ul class="inline-flex flex-wrap md:flex-col gap-3 text-xs md:text-sm mb-5 md:mb-0 p-5">
                    <li class="ml-3">
                        <button id="tab-btn-news" type="button" role="tab" aria-selected="true"
                            aria-controls="tab-news" data-tab="news"
                            class="py-2 md:py-2 px-3 rounded-full bg-stone-100 text-primary font-semibold whitespace-nowrap">
                            Inside the news
                        </button>
                    </li>
                    <li class="ml-3">
                        <button id="tab-btn-logo" type="button" role="tab" aria-selected="false"
                            aria-controls="tab-logo" data-tab="logo"
                            class="py-2 md:py-2 px-3 rounded-full text-[#1a1a1c] hover:text-primary font-semibold whitespace-nowrap">
                            Logo
                        </button>
                    </li>
                    <li class="ml-3">
                        <button id="tab-btn-team" type="button" role="tab" aria-selected="false"
                            aria-controls="tab-team" data-tab="team"
                            class="py-2 md:py-2 px-3 rounded-full text-[#1a1a1c] hover:text-primary font-semibold whitespace-nowrap">
                            Team Pictures
                        </button>
                    </li>
                    <li class="ml-3">
                        <button id="tab-btn-product" type="button" role="tab" aria-selected="false"
                            aria-controls="tab-product" data-tab="product"
                            class="py-2 md:py-2 px-3 rounded-full text-[#1a1a1c] hover:text-primary font-semibold whitespace-nowrap">
                            Product images
                        </button>
                    </li>
                    <li class="ml-3">
                        <button id="tab-btn-featured" type="button" role="tab" aria-selected="false"
                            aria-controls="tab-featured" data-tab="featured"
                            class="py-2 md:py-2 px-3 rounded-full text-[#1a1a1c] hover:text-primary font-semibold whitespace-nowrap">
                            Featured businesses
                        </button>
                    </li>
                </ul>
            </div>
            <div class="col-span-7">
                <!-- Tab Panel: Inside the news -->
                <section id="tab-news" data-tab-panel role="tabpanel" aria-labelledby="tab-btn-news">
                    <h2 class="font-bold text-[#1a1a1c] mb-6 md:md-10 leading-[1]">Inside the news</h2>
                    <div class="grid md:grid-cols-2 gap-5">
                        @forelse ($newsItems as $item)
                            <article class="space-y-3 {{ $item->url ? 'cursor-pointer group' : '' }}">
                                @if ($item->url)
                                    <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer" class="block">
                                @endif
                                        @if ($item->image_path)
                                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                                class="aspect-video rounded object-cover {{ $item->url ? 'group-hover:opacity-90 transition' : '' }}">
                                        @endif
                                        <h6 class="font-bold text-[#1a1a1c] text-base md:text-lg {{ $item->url ? 'group-hover:text-primary transition' : '' }}">
                                            {{ $item->title }}
                                            @if ($item->url)
                                                <svg class="inline-block w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                </svg>
                                            @endif
                                        </h6>
                                        @if ($item->description)
                                            <p class="text-s md:text-sm text-stone-500">{{ $item->description }}</p>
                                        @endif
                                @if ($item->url)
                                    </a>
                                @endif
                            </article>
                        @empty
                            <div class="col-span-2 text-center py-12 text-stone-500">
                                <p>No news items available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </section>

                <!-- Tab Panel: Logo -->
                <section id="tab-logo" data-tab-panel role="tabpanel" class="hidden" aria-labelledby="tab-btn-logo">
                    <h2 class="font-bold text-[#1a1a1c] mb-6 md:md-10 leading-[1]">Logo</h2>
                    <div class="grid sm:grid-cols-2 gap-5">
                        @forelse ($logoItems as $item)
                            <div class="rounded-xl p-6 bg-white border">
                                @if ($item->image_path)
                                    <div class="aspect-[3/1] rounded flex items-center justify-center bg-neutral-100">
                                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                            class="max-h-full max-w-full object-contain">
                                    </div>
                                @endif
                                <div class="mt-4">
                                    <h6 class="font-semibold text-sm mb-2">{{ $item->title }}</h6>
                                    @if ($item->image_path)
                                        <a href="{{ asset('storage/' . $item->image_path) }}" download
                                            class="px-3 py-2 rounded-lg bg-primary text-white font-semibold text-sm inline-block">Download</a>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-span-2 text-center py-12 text-stone-500">
                                <p>No logo files available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </section>

                <!-- Tab Panel: Team Pictures -->
                <section id="tab-team" data-tab-panel role="tabpanel" class="hidden" aria-labelledby="tab-btn-team">
                    <h2 class="font-bold text-[#1a1a1c] mb-6 md:md-10 leading-[1]">Team Pictures</h2>
                    <div class="grid md:grid-cols-2 gap-5">
                        @forelse ($teamItems as $item)
                            @if ($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                    class="aspect-video rounded object-cover">
                            @endif
                        @empty
                            <div class="col-span-2 text-center py-12 text-stone-500">
                                <p>No team pictures available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </section>

                <!-- Tab Panel: Product Images -->
                <section id="tab-product" data-tab-panel role="tabpanel" class="hidden"
                    aria-labelledby="tab-btn-product">
                    <h2 class="font-bold text-[#1a1a1c] mb-6 md:md-10 leading-[1]">Product images</h2>
                    <div class="grid md:grid-cols-2 gap-5">
                        @forelse ($productItems as $item)
                            @if ($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                    class="aspect-video rounded object-cover">
                            @endif
                        @empty
                            <div class="col-span-2 text-center py-12 text-stone-500">
                                <p>No product images available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </section>

                <!-- Tab Panel: Featured Businesses -->
                <section id="tab-featured" data-tab-panel role="tabpanel" class="hidden"
                    aria-labelledby="tab-btn-featured">
                    <h2 class="font-bold text-[#1a1a1c] mb-6 md:md-10 leading-[1]">Featured businesses</h2>
                    <div class="grid md:grid-cols-2 gap-5">
                        @forelse ($featuredItems as $item)
                            <article class="space-y-3">
                                @if ($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                        class="aspect-video rounded object-cover">
                                @endif
                                <h6 class="font-bold text-[#1a1a1c] text-base md:text-lg">{{ $item->title }}</h6>
                                @if ($item->description)
                                    <p class="text-s md:text-sm text-stone-500">{{ $item->description }}</p>
                                @endif
                            </article>
                        @empty
                            <div class="col-span-2 text-center py-12 text-stone-500">
                                <p>No featured business items available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const tabButtons = Array.from(document.querySelectorAll('[data-tab]'));
                    const tabPanels = Array.from(document.querySelectorAll('[data-tab-panel]'));
                    const ACTIVE_BTN = ['bg-stone-100', 'text-primary'];
                    const INACTIVE_BTN = ['text-[#1a1a1c]'];

                    function setActiveTab(name) {
                        // Panels
                        tabPanels.forEach(p => {
                            p.classList.add('hidden');
                        });
                        const activePanel = document.getElementById(`tab-${name}`);
                        if (activePanel) activePanel.classList.remove('hidden');

                        // Buttons
                        tabButtons.forEach(btn => {
                            const isActive = btn.getAttribute('data-tab') === name;
                            btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
                            btn.classList.remove(...ACTIVE_BTN);
                            if (isActive) {
                                btn.classList.add(...ACTIVE_BTN);
                            } else {
                                // Ensure inactive color baseline
                                if (!btn.classList.contains('hover:text-primary')) {
                                    btn.classList.add('hover:text-primary');
                                }
                            }
                        });
                    }

                    // Initial from hash if present
                    const hash = window.location.hash.replace('#', '');
                    const valid = ['news', 'logo', 'team', 'product', 'featured'];
                    setActiveTab(valid.includes(hash) ? hash : 'news');

                    tabButtons.forEach(btn => {
                        btn.addEventListener('click', () => {
                            const name = btn.getAttribute('data-tab');
                            setActiveTab(name);
                            history.replaceState(null, '', `#${name}`);
                        });
                    });
                });
            </script>
        @endpush
    </x-guest-layout>
