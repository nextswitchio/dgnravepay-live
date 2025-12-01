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
                            DgnRavePay Brand & Media Resources
                        </h1>
                        <p class="font-medium text-base md:text-lg">
                            Access official DgnRavePay logos, media kits, product screenshots, and brand guidelines.
                            Whether you’re a journalist, partner, or collaborator, our press resources are designed to
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
                        <article class="space-y-3">
                            <img src="{{ Vite::asset('resources/images/press-official-logo.png') }}" alt="Business feature article"
                                class="aspect-video rounded object-cover">
                            <h6 class="font-bold text-[#1a1a1c] text-base md:text-lg">The ranking: Africa’s Fastest Growing
                                Companies 2025</h6>
                            <p class="text-s md:text-sm text-stone-500">Punch Newspapers</p>
                        </article>
                        <article class="space-y-3">
                            <img src="{{ Vite::asset('resources/images/press-img-money.jpg') }}" alt="Fintech growth story"
                                class="aspect-video rounded object-cover">
                            <h6 class="font-bold text-[#1a1a1c] text-base md:text-lg">Nigerian businesses increasingly skip traditional banks and turn to DgnRavePay</h6>
                            <p class="text-s md:text-sm text-stone-500">Punch Newspapers</p>
                        </article>
                        <article class="space-y-3">
                            <img src="{{ Vite::asset('resources/images/press-official-logo.png') }}" alt="Industry news article"
                                class="aspect-video rounded object-cover">
                            <h6 class="font-bold text-[#1a1a1c] text-base md:text-lg"> The ranking: Africa’s Fastest Growing
                                Companies 2025</h6>
                            <p class="text-s md:text-sm text-stone-500">Punch Newspapers</p>
                        </article>
                        <article class="space-y-3">
                            <img src="{{ Vite::asset('resources/images/press-img-money.jpg') }}" alt="Feature article"
                                class="aspect-video rounded object-cover">
                            <h6 class="font-bold text-[#1a1a1c] text-base md:text-lg">The ranking: Africa’s Fastest Growing
                                Companies 2025</h6>
                            <p class="text-s md:text-sm text-stone-500">Punch Newspapers</p>
                        </article>
                    </div>
                </section>

                <!-- Tab Panel: Logo -->
                <section id="tab-logo" data-tab-panel role="tabpanel" class="hidden" aria-labelledby="tab-btn-logo">
                    <h2 class="font-bold text-[#1a1a1c] mb-6 md:md-10 leading-[1]">Logo</h2>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div class="rounded-xl p-6 bg-white border">
                            <div class="aspect-[3/1] rounded flex items-center justify-center bg-neutral-900">
                                <img src="{{ Vite::asset('resources/images/logo wide white.png') }}"
                                    alt="DgnRavePay logo white" class="h-10">
                            </div>
                            <div class="mt-4 flex gap-3 text-sm">
                                <a href="{{ Vite::asset('resources/images/logo wide white.png') }}" download
                                    class="px-3 py-2 rounded-lg bg-primary text-white font-semibold">PNG</a>
                            </div>
                        </div>
                        <div class="rounded-xl p-6 bg-white border">
                            <div class="aspect-[3/1] rounded flex items-center justify-center bg-neutral-100">
                                <img src="{{ Vite::asset('resources/images/logo wide white.png') }}" alt="DgnRavePay logo"
                                    class="h-10 invert brightness-0">
                            </div>
                            <div class="mt-4 flex gap-3 text-sm">
                                <a href="{{ Vite::asset('resources/images/logo wide white.png') }}" download
                                    class="px-3 py-2 rounded-lg bg-primary text-white font-semibold">PNG</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Tab Panel: Team Pictures -->
                <section id="tab-team" data-tab-panel role="tabpanel" class="hidden" aria-labelledby="tab-btn-team">
                    <h2 class="font-bold text-[#1a1a1c] mb-6 md:md-10 leading-[1]">Team Pictures</h2>
                    <div class="grid md:grid-cols-2 gap-5">
                        <img src="{{ Vite::asset('resources/images/black woman smiling while pressing phone.png') }}"
                            alt="Team member smiling using phone" class="aspect-video rounded object-cover">
                        <img src="{{ Vite::asset('resources/images/man smiling.png') }}" alt="Team member portrait"
                            class="aspect-video rounded object-cover">
                        <img src="{{ Vite::asset('resources/images/woman hand holding phone.png') }}"
                            alt="Team mobile demo" class="aspect-video rounded object-cover">
                        <img src="{{ Vite::asset('resources/images/outbound circle logo.png') }}" alt="Brand graphic"
                            class="aspect-video rounded object-cover">
                    </div>
                </section>

                <!-- Tab Panel: Product Images -->
                <section id="tab-product" data-tab-panel role="tabpanel" class="hidden"
                    aria-labelledby="tab-btn-product">
                    <h2 class="font-bold text-[#1a1a1c] mb-6 md:md-10 leading-[1]">Product images</h2>
                    <div class="grid md:grid-cols-2 gap-5">
                        <img src="{{ Vite::asset('resources/images/loan phone.png') }}" alt="Loan feature mockup"
                            class="aspect-video rounded object-cover">
                        <img src="{{ Vite::asset('resources/images/loan cards.png') }}" alt="Loan cards"
                            class="aspect-video rounded object-cover">
                        <img src="{{ Vite::asset('resources/images/hand touching cards.png') }}" alt="Cards UI"
                            class="aspect-video rounded object-cover">
                        <img src="{{ Vite::asset('resources/images/hand holding phone with circle.png') }}"
                            alt="Product in hand" class="aspect-video rounded object-cover">
                        <img src="{{ Vite::asset('resources/images/account credited.svg') }}"
                            alt="Account credited illustration" class="aspect-video rounded object-cover bg-white p-4">
                        <img src="{{ Vite::asset('resources/images/pie chart.png') }}" alt="Analytics pie chart"
                            class="aspect-video rounded object-cover">
                    </div>
                </section>

                <!-- Tab Panel: Featured Businesses -->
                <section id="tab-featured" data-tab-panel role="tabpanel" class="hidden"
                    aria-labelledby="tab-btn-featured">
                    <h2 class="font-bold text-[#1a1a1c] mb-6 md:md-10 leading-[1]">Featured businesses</h2>
                    <div class="grid md:grid-cols-2 gap-5">
                        <article class="space-y-3">
                            <img src="{{ Vite::asset('resources/images/world.png') }}" alt="Global reach"
                                class="aspect-video rounded object-cover">
                            <h6 class="font-bold text-[#1a1a1c] text-base md:text-lg">Empowering merchants worldwide</h6>
                            <p class="text-s md:text-sm text-stone-500">Case study</p>
                        </article>
                        <article class="space-y-3">
                            <img src="{{ Vite::asset('resources/images/Outbound integrations 1.png') }}"
                                alt="Integrations" class="aspect-video rounded object-cover">
                            <h6 class="font-bold text-[#1a1a1c] text-base md:text-lg">Seamless integrations at scale</h6>
                            <p class="text-s md:text-sm text-stone-500">Case study</p>
                        </article>
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
