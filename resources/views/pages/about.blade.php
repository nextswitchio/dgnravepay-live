@section('title', 'About DgnRavePay')
@section('meta_description',
    'Learn how DgnRavePay is redefining digital finance across Africa—payments, savings,
    credit, and growth in one ecosystem.')
    <x-guest-layout>
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <span class="text-xs md:text-xs text-stone-500 uppercase">About us</span>
                        <h1 class="capitalize leading-[1.2] mt-2 mb-5">
                            Redefining
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-primary-2">
                                Digital Finance
                            </span>
                            for Africa and Beyond.
                        </h1>
                        <p class="font-medium text-base md:text-lg">
                            We are re-imagining how people and businesses move money, access credit, save smartly, and
                            connect to global
                            opportunities, all from one powerful ecosystem
                        </p>
                    </div>
                </div>
            </div>
            <x-enlarging-img />
        </section>
        <div class="my-20 md:mt-28 px-5 md:px-10">
            <h2 class="mb-7 md:mb-10 leading-[1.5] text-center">
                Built for Trust. Designed for Growth
            </h2>
            <section class="splide max-w-7xl mx-auto" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <div class="space-y-5 transition-all ease-in-out duration-300">
                                <img src="{{ Vite::asset('resources/images/article 1.jpg') }}" alt=""
                                    class="aspect-video rounded-lg object-cover w-full mb-5">
                                <span class="uppercase text-xs md:text-sm text-stone-300">evolution</span>
                                <h6 class="text-base md:text-lg font-semibold">Use your currencies in digital payments.</h6>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="space-y-5 md:col-span-2 transition-all ease-in-out duration-300">
                                <img src="{{ Vite::asset('resources/images/article 2.jpg') }}" alt=""
                                    class="aspect-video rounded-lg object-cover w-full mb-5">
                                <span class="uppercase text-xs md:text-sm text-stone-300">evolution</span>
                                <h6 class="text-base md:text-lg font-semibold">Growth from simple transfers to full
                                    financial ecosystem.
                                </h6>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="space-y-5 transition-all ease-in-out duration-300">
                                <img src="{{ Vite::asset('resources/images/article 3.jpg') }}" alt=""
                                    class="aspect-video rounded-lg object-cover w-full mb-5">
                                <span class="uppercase text-xs md:text-sm text-stone-300">promise</span>
                                <h6 class="text-base md:text-lg font-semibold">A platform that scales with you — individual
                                    or
                                    enterprise</h6>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Add the progress bar element -->
                <div class="splide__progress mt-10 md:mt-20">
                    <div class="splide__progress__bar">
                    </div>
                </div>
            </section>
        </div>
        <div class="custom-container mx-auto  px-5 md:px-10 py-10 my-20 md:mt-30 gap-10 grid md:grid-cols-3">
            <div class="">
                <h6 class="text-xs md:text-sm text-stone-500 uppercase">founded</h6>
                <p class="text-base md:text-lg font-medium">2024</p>
            </div>
            <div class="">
                <h6 class="text-xs md:text-sm text-stone-500 uppercase">OUR MISSION</h6>
                <p class="text-base md:text-lg font-medium">
                    To simplify payments and empower people and businesses with seamless and inclusive financial
                    solutions that inspire confidence and enable growth.
                </p>
            </div>
            <div class="">
                <h6 class="text-xs md:text-sm text-stone-500 uppercase">OUR VISION</h6>
                <p class="text-base md:text-lg font-medium">
                    To be Africa's most trusted digital financial ecosystem for payments, growth and
                    prosperity with a global presence
                </p>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 items-center justify-center my-20 md:my-28 opacity-20">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo" class="w-full">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo" class="w-full">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden md:block">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden md:block">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden lg:block">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden lg:block">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden lg:block">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden lg:block">
        </div>
        <section class="my-20 md:mt-30">
            <div class="custom-container mx-auto  px-5 md:px-10 py-10">
                <div class="lg:grid lg:grid-cols-2 space-y-10 lg:space-y-0">
                    <div class="">
                        <h2 class="mb-5 leading-[1] sticky top-32">Our core values</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-5">
                        <article class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">001</span>
                                <h6 class="font-bold text-base md:text-lg">Innovation with Purpose</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/innovation.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">002</span>
                                <h6 class="font-bold text-base md:text-lg">Trust and Integrity</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/trust.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">003</span>
                                <h6 class="font-bold text-base md:text-lg">Excellence at Scale</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/excellence.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">004</span>
                                <h6 class="font-bold text-base md:text-lg">Empowerment & Inclusion</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/empowerment.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">005</span>
                                <h6 class="font-bold text-base md:text-lg">Empowerment & Inclusion</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/inclusion.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">006</span>
                                <h6 class="font-bold text-base md:text-lg">Sustainable Growth</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/growth.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <div class="custom-container mx-auto  px-5 md:px-10">
                <div class="py-20 flex flex-col justify-center text-center">
                    <h2 class="text-white mb-5 leading-[1.5]">We’re just getting started</h2>
                    <p class="text-white">
                        There’s so much we have to accomplish. Here are a few milestones we’ve crossed so far
                    </p>
                </div>
                <div class="text-center grid md:grid-cols-4 gap-5 border-t border-white/50 p-10">
                    <div class="text-neutral-200 p-10">
                        <h6
                            class="text-4xl font-bold text-transparent bg-gradient-to-br from-neutral-100 to-neutral-700 bg-clip-text">
                            4.7</h6>
                        <span class="uppercase text-xs md:text-sm">Stars on App stores</span>
                    </div>
                    <div class="text-neutral-200 p-10">
                        <h6
                            class="text-4xl font-bold text-transparent bg-gradient-to-br from-neutral-100 to-neutral-700 bg-clip-text">
                            2M+</h6>
                        <span class="uppercase text-xs md:text-sm">REGISTERED USERS</span>
                    </div>
                    <div class="text-neutral-200 p-10">
                        <h6
                            class="text-4xl font-bold text-transparent bg-gradient-to-br from-neutral-100 to-neutral-700 bg-clip-text">
                            500,000+</h6>
                        <span class="uppercase text-xs md:text-sm">Micro business users</span>
                    </div>
                    <div class="text-neutral-200 p-10">
                        <h6
                            class="text-4xl font-bold text-transparent bg-gradient-to-br from-neutral-100 to-neutral-700 bg-clip-text">
                            100+</h6>
                        <span class="uppercase text-xs md:text-sm">employees</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="custom-container mx-auto  px-5 md:px-10 py-10 my-20 gap-10 grid lg:grid-cols-2">
            <div
                class="rounded-xl aspect-[16/12] overflow-hidden bg-gradient-to-b from-black to-stone-900 relative -z-[0]">
                <div class="p-5">
                    <h2 class="text-3xl md:text-4xl font-bold mb-2">Love to be a part of the team?</h2>
                    <p class="text-primary font-semibold">Explore Careers at DngRavePay</p>
                </div>
                <img src="{{ Vite::asset('resources/images/about-bag.png') }}" alt="" class="ml-auto w-3/5">
                <div class="absolute left-6 bottom-6 p-3 rounded-full bg-black w-14 h-14 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="size-6 stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                    </svg>
                </div>
                {{-- <img src="{{ Vite::asset('resources/images/hand-card-grid-bg.png') }}" alt=""
                class="w-full absolute top-0 left-0 -z-[1]"> --}}
            </div>
            <div
                class="rounded-xl aspect-[16/12] overflow-hidden bg-gradient-to-b from-primary to-primary-2/50 relative -z-[0]">
                <div class="p-5">
                    <h2 class="text-3xl md:text-4xl font-bold mb-2">Love to be a part of the team?</h2>
                    <p class="font-semibold">Explore Careers at DngRavePay</p>
                </div>
                <div class="h-full relative overflow-hidden">
                    <img src="{{ Vite::asset('resources/images/about-handshake.png') }}" alt=""
                        class="absolute w-full bottom-10">
                </div>
                <div class="absolute left-6 bottom-6 p-3 rounded-full bg-black w-14 h-14 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="size-6 stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                    </svg>
                </div>
                {{-- <img src="{{ Vite::asset('resources/images/hand-card-grid-bg.png') }}" alt=""
                class="w-full absolute top-0 left-0 -z-[1]"> --}}
            </div>
        </section>
    </x-guest-layout>
