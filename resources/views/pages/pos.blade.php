@section('title', 'POS and Terminal')
@section('meta_description',
    'Accept card and digital payments with our reliable POS terminals — built for merchants who need fast,
    secure, and offline-capable payment acceptance.')
    <x-guest-layout>
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="capitalize mb-5 text-center">
                            POS & Terminal
                        </h1>
                        <p class="md:font-[500] md:text-lg lg:text-xl mb-10">Accept payments at the checkout or on the go with
                            reliable terminals, fast settlement, and robust offline capabilities.</p>
                        <div class="">
                            <a href="#"
                                class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                                Get POS Terminal
                            </a>
                        </div>
                    </div>

                    <div class="mt-20">
                        <img src="{{ Vite::asset('resources/images/pos_terminal.png') }}" alt=""
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
                    <h2 class="text-center mb-5" data-aos="fade-up">
                        Why Merchants Choose DgnRavePay</h2>
                    <div class="grid md:grid-cols-3 gap-5 mt-10">
                        <div class="bg-primary rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Reliable Payments</h6>
                                <p>Fast card acceptance and offline retry to keep your sales flowing even with
                                    intermittent connectivity.</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/pos_terminal colored.png') }}" alt=""
                                class="w-4/5">
                        </div>
                        <div class="bg-secondary/50 rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Easy Integration</h6>
                                <p>Connect via API or use plug-and-play hardware to reconcile sales with minimal fuss.</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/outbound cards.png') }}" alt=""
                                class="ml-auto w-[70%]">
                        </div>
                        <div class="bg-stone-950 rounded-xl text-white flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Secure & Supported</h6>
                                <p>EMV-compliant terminals, end-to-end encryption, and 24/7 merchant support.</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/shield.png') }}" alt=""
                                class="mx-auto w-4/5">
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
                        POS Solutions Built for Your Business
                    </h2>
                    <p class="">From micro merchants to large retailers, our terminals are flexible and simple to
                        manage. Fast settlements and clear reporting make it easy to run your business.</p>
                    <div class="mt-10">
                        <a href="#"
                            class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                            Request a Terminal
                        </a>
                    </div>
                </div>
                <div class="mt-20 space-y-10">
                    <!-- Card 1 -->
                    <div class="rounded-2xl bg-gradient-to-br from-white to-secondary lg:grid grid-cols-7 hover:!scale-[1.02] transition-transform"
                        data-aos="zoom-in">
                        <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                            <div>
                                <h6 class="uppercase text-xs text-blue-500">
                                    Accept Payments
                                </h6>
                                <div class="mt-6 lg:mt-8">
                                    <div>
                                        <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-3">Card, QR,
                                            and Contactless Payments</h4>
                                        <p>Support for all major card schemes, QR codes, and contactless NFC payments with
                                            seamless reconciliation.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <a href="#" class="text-primary font-bold flex items-center gap-2">
                                    <span>Start Accepting Payments</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                        <div class="md:col-span-3 aspect-[16/12] lg:aspect-square relative">
                            <img src="{{ Vite::asset('resources/images/pos_terminal.png') }}" alt="pos terminal"
                                class="w-full object-cover">
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="rounded-2xl bg-gradient-to-br from-white to-red-200 lg:grid grid-cols-7 hover:!scale-[1.02] transition-transform"
                        data-aos="zoom-in">
                        <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                            <div>
                                <h6 class="uppercase text-xs text-blue-500">
                                    Easy Settlement
                                </h6>
                                <div class="mt-6 lg:mt-8">
                                    <div>
                                        <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-3">
                                            Fast Settlement & Reporting</h4>
                                        <p>
                                            Daily settlements, concise receipts, and merchant dashboards for easy
                                            reconciliation.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <a href="#" class="text-primary font-bold flex items-center gap-2">
                                    <span>View Settlement Options</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                        <div class="md:col-span-3 aspect-[16/12] lg:aspect-square relative overflow-hidden">
                            <img src="{{ Vite::asset('resources/images/one time.png') }}" alt="" class="h-[80%] object-cover absolute -bottom-10">
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="rounded-2xl bg-gradient-to-br from-white to-green-200 lg:grid grid-cols-7 hover:!scale-[1.02] transition-transform"
                        data-aos="zoom-in">
                        <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                            <div>
                                <h6 class="uppercase text-xs text-blue-500">
                                    Support & Security
                                </h6>
                                <div class="mt-6 lg:mt-8">
                                    <div>
                                        <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-3">
                                            24/7 Support & EMV Security
                                        </h4>
                                        <p>We provide device management, software updates, and responsive merchant support to
                                            keep your terminals running.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <a href="#" class="text-primary font-bold flex items-center gap-2">
                                    <span>Contact Sales</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                        <div
                            class="md:col-span-3 aspect-[16/12] lg:aspect-square relative flex items-center justify-center">
                            <img src="{{ Vite::asset('resources/images/qr.png') }}"
                                alt="QR payments" class="w-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-40">
            <div class="custom-container mx-auto  px-5 md:px-10 space-y-20 md:space-y-40">
                <!-- JOIN SECTION -->
                <x-pages.join-section />
                <!-- TESTIMONIAL -->
                <x-pages.testimonial-section />
                <!-- FAQ -->
                <x-pages.faq-section />
            </div>

        </section>

    </x-guest-layout>
