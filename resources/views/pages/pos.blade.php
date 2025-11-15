@section('title', 'POS and Terminal')
@section('meta_description',
    'Accept card and digital payments with our reliable POS terminals — built for merchants who need fast,
    secure, and offline-capable payment acceptance.')

    @php
        $pos_attrs = [
            'Manage all terminals, agents, and sales from one dashboard.',
            'View transactions and settlements in real time on any device.',
            'Get 24/7 dedicated support when you need it.',
            'Add your team, assign roles, and control access easily.',
            'Handle payroll, invoicing, and approvals in one smart dashboard.',
            'Analyze sales in real time and make smarter decisions.',
            'Manage multiple branches and track all collections centrally.',
        ];

        $articles = [
            [
                'title' => 'How to Choose the Right POS Terminal for Your Business',
                'image' => 'resources/images/payroll.png',
                'category' => 'POS Terminal',
                'link' => '#',
            ],
            [
                'title' => 'Top 5 Benefits of Using a POS System for Small Businesses',
                'image' => 'resources/images/payroll.png',
                'category' => 'POS System',
                'link' => '#',
            ],
            [
                'title' => 'Understanding POS Transaction Fees: What You Need to Know',
                'image' => 'resources/images/payroll.png',
                'category' => 'Transaction Fees',
                'link' => '#',
            ],
            [
                'title' => 'The Future of POS Technology: Trends to Watch in 2024',
                'image' => 'resources/images/payroll.png',
                'category' => 'POS Technology',
                'link' => '#',
            ],
        ];
    @endphp

    <x-guest-layout>
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="capitalize mb-5 text-center">
                            Turn Every Sale Into Growth With DgnRavePay POS
                        </h1>
                        <p class="md:font-[500] md:text-lg lg:text-xl mb-10">Whether you run a shop, restaurant, or agent
                            network, our POS makes payments fast, secure, and stress-free while helping you track
                            transactions in real time and scale with ease.</p>
                        <div class="">
                            <a href="#"
                                class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                                Start Managing Smarter
                            </a>
                        </div>
                    </div>

                    <div class="mt-20">
                        <img src="{{ Vite::asset('resources/images/pos_attendant.png') }}" alt=""
                            class="mx-auto h-60 md:h-96 lg:h-[30rem]">
                    </div>
                </div>
            </div>
            <div class="">
                <img src="{{ Vite::asset('resources/images/vector line.svg') }}" alt="vector line"
                    class="absolute -z-[10] blur-[3rem] w-full bottom-28 left-0">
            </div>
        </section>
        <section class="my-28">
            <div class="custom-container mx-auto  px-5 md:px-10">
                <div class="mb-10 px-5 md:px-10">
                    <h2 class="text-center mb-5" data-aos="fade-up">Not Just a Device. A Growth Partner</h2>
                    <div class="grid md:grid-cols-3 gap-5 mt-10">
                        <div class="bg-primary rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Quick, seamless setup</h6>
                                <p>Get your POS device fast and start collecting payments instantly</p>
                            </div>
                            <div class="py-3 relative"><img src="{{ Vite::asset('resources/images/clog_group.png') }}"
                                    alt="" class="w-4/5 mx-auto"></div>
                        </div>
                        <div class="bg-secondary/50 rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Multiple payment options</h6>
                                <p>Accept cards, transfers, USSD, QR, and mobile wallets</p>
                            </div>
                            <div class="py-3 relative"><img src="{{ Vite::asset('resources/images/network.png') }}"
                                    alt="" class="mx-auto w-[70%]"></div>
                        </div>
                        <div class="bg-stone-950 rounded-xl text-white flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Instant settlement</h6>
                                <p>Money reflects directly into your DgnRavePay Business Account.</p>
                            </div>
                            <div class="py-3 relative"><img src="{{ Vite::asset('resources/images/lightning.png') }}"
                                    alt="" class="mx-auto w-4/5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dark Section -->
        <section class="bg-accent-black relative -z-[0]">
            <div class="custom-container mx-auto  px-5 md:px-10 py-20 md:py-28">
                <div class="text-center text-white">
                    <h2 class="text-white mb-5">
                        Built for Businesses, Big or Small
                    </h2>
                    <p class="">Whether you’re a small shop, a growing SME, or a chain with multiple branches,
                        DgnRavePay POS adapts to your business needs.</p>
                </div>
                <div class="flex justify-center gap-3 text-white font-medium mt-10 flex-wrap whitespace-nowrap">
                    @foreach ($pos_attrs as $attr)
                        <div
                            class="rounded-full p-2 md:py-3 text-sm md:text-base bg-white/5 border border-white/10 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 fill-primary stroke-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                            </svg>
                            <span>{{ $attr }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="h-[400px] flex items-center overflow-hidden">
                    <img src="{{ Vite::asset('resources/images/pos.png') }}" alt="POS Image" class="mx-auto mt-10">

                </div>
            </div>
        </section>

        <section class="my-40">
            <div class="custom-container mx-auto  px-5 md:px-10 space-y-20 md:space-y-40">
                <!-- JOIN SECTION -->
                <x-pages.join-section />
                <div class="custom-container mx-auto  px-5 md:px-10 py-20 md:py-28">
                    <div class="flex items-center justify-between gap-4 flex-wrap">
                        <h2 class="text-center mb-5" data-aos="fade-up">Power Beyond Payments </h2>
                        <div class="flex gap-3">
                            <div class="w-12 h-12 p-3 rounded-full border border-black">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                                </svg>
                            </div>
                            <div class="w-12 h-12 p-3 rounded-full border border-black">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <div class="" role="group">
                            <div class="">
                                <ul class="flex gap-5 overflow-hidden splide" data-aos="fade-up">
                                    @foreach ($articles as $article)
                                        <li class="splide__slide">
                                            <a href="{{ $article['link'] }}"
                                                class="h-[24rem] aspect-[16/12] bg-black/30 block border border-gray-200 rounded-lg overflow-hidden transition-shadow relative -z-0"
                                                style="background-image: url('{{ Vite::asset($article['image']) }}'); background-size: cover; background-position: center;">


                                                <div
                                                    class="py-6 px-5 h-full flex flex-col justify-between text-white z-20">
                                                    <p class="uppercase text-sm">{{ $article['category'] }}</p>
                                                    <h5 class="text-lg md:text-xl lg:text-2xl font-semibold">
                                                        {{ $article['title'] }}</h5>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TESTIMONIAL -->
                <x-pages.testimonial-section />
                <!-- FAQ -->
                <x-pages.faq-section />
            </div>

        </section>

    </x-guest-layout>
