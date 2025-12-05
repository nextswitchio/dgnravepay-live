@section('title', 'Smart Savings in Nigeria')
@section('meta_description',
    'Automate savings with RaveGoals, stay flexible with RaveFlex, and lock value with
    RaveVault—earn more and stay in control.')
    <x-guest-layout>
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="capitalize mb-5 text-center">
                            Turn every Naira into
                            tomorrow’s possibilities.
                        </h1>
                        <p class="md:font-[500] md:text-lg lg:text-xl mb-10">With RaveGoals, RaveFlex, and RaveVault, you
                            choose how you save, how you grow, and when
                            you access your money.</p>
                        <div class="">
                            <a href="#"
                                class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                                Start Saving Now
                            </a>
                        </div>
                    </div>

                    <div class="mt-20">
                        <img src="{{ Vite::asset('resources/images/pig safe.png') }}" alt=""
                            class="mx-auto h-60 md:h-96 lg:h-[30rem]">
                    </div>
                    {{-- <img src="{{ Vite::asset('resources/images/hand-card-grid-bg.png') }}" alt=""
                    class="absolute bottom-0 left-1/2 -translate-x-1/2 h-60 md:h-96 lg:h-[30rem] -z-[1]"> --}}
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
                        Why People Choose DgnRavePay</h2>
                    <div class="grid md:grid-cols-3 gap-5 mt-10">
                        <div class="bg-primary rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Save Your Way</h6>
                                <p>Choose a plan that matches your lifestyle, not the other way around.</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/hand coin save.png') }}" alt=""
                                class="w-4/5">
                        </div>
                        <div class="bg-secondary/50 rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">No Excuses</h6>
                                <p>Automated savings keep you consistent, even on busy days.</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/hand money save.png') }}" alt=""
                                class="ml-auto w-[70%]">
                        </div>
                        <div class="bg-stone-950 rounded-xl text-white flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Grow with Confidence</h6>
                                <p>Earn interest, stay flexible, and keep your funds safe with CBN regulated protection.</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/growth savings.png') }}" alt=""
                                class="mx-auto w-4/5">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dark Section -->
        <section class="bg-accent-black relative -z-[0]">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="POS Image"
                class="w-52 md:w-80 absolute top-0 left-0 opacity-30 -z-[1]">
            <div class="custom-container mx-auto  px-5 md:px-10 py-20 md:py-28">
                <div class="text-center text-white">
                    <h2 class="text-white mb-5">
                        Find the Savings Plan That Works for You
                    </h2>
                    <p class="">Whether you’re saving for a dream, building financial discipline, or securing your
                        future,
                        DgnRavePay offers flexible savings tailored to your life</p>
                    <div class="mt-10">
                        <a href="#"
                            class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                            Compare Plans
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
                                    Rave Goals
                                </h6>
                                <div class="mt-6 lg:mt-8">
                                    <div>
                                        <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-3">Achieve
                                            Your
                                            Dreams,
                                            One Goal at a Time</h4>
                                        <p>Create personalized savings goals (e.g., rent, gadgets, tuition,
                                            travel) with deadlines and automatic contributions. Stay
                                            disciplined while tracking your progress in real time.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <a href="#" class="text-primary font-bold flex items-center gap-2">
                                    <span>Send & Your First Goal</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                        <div class="md:col-span-3 aspect-[16/12] lg:aspect-square relative">
                            <img src="{{ Vite::asset('resources/images/treasure-box.png') }}" alt="treasure box"
                                class="w-full object-cover">
                            <div
                                class="absolute bottom-10 right-10 bg-white p-3 rounded-xl inline-flex items-center justify-between gap-5 md:gap-10 shadow-md">
                                <p>RaveGoals</p>
                                <p class="bg-green-500/30 text-green-500 px-3 py-2 rounded-lg">19% Interest p.a</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="rounded-2xl bg-gradient-to-br from-white to-red-200 lg:grid grid-cols-7 hover:!scale-[1.02] transition-transform"
                        data-aos="zoom-in">
                        <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                            <div>
                                <h6 class="uppercase text-xs text-blue-500">
                                    RaveFlex
                                </h6>
                                <div class="mt-6 lg:mt-8">
                                    <div>
                                        <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-3">
                                            Your Money, Flexible & Always Accessible</h4>
                                        <p>
                                            Enjoy the freedom to save at your pace without lock-ins. Add
                                            or withdraw funds anytime while still earning competitive
                                            interest.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <a href="#" class="text-primary font-bold flex items-center gap-2">
                                    <span>Start Flexible Saving</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                        <div class="md:col-span-3 aspect-[16/12] lg:aspect-square relative overflow-hidden">
                            <img src="{{ Vite::asset('resources/images/yellow pig.png') }}" alt="yellow savings pig"
                                class="h-[80%] object-cover absolute -bottom-10">
                            <div
                                class="absolute bottom-10 right-10 bg-white p-3 rounded-xl inline-flex items-center justify-between gap-5 md:gap-10 shadow-md">
                                <p>RaveGoals</p>
                                <p class="bg-green-500/30 text-green-500 px-3 py-2 rounded-lg">19% Interest p.a</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="rounded-2xl bg-gradient-to-br from-white to-green-200 lg:grid grid-cols-7 hover:!scale-[1.02] transition-transform"
                        data-aos="zoom-in">
                        <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                            <div>
                                <h6 class="uppercase text-xs text-blue-500">
                                    RaveVault
                                </h6>
                                <div class="mt-6 lg:mt-8">
                                    <div>
                                        <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-3">
                                            Lock Your Savings.
                                            Unlock Higher Returns.
                                        </h4>
                                        <p>Designed for serious savers. Fix your money for
                                            a set period and enjoy higher, guaranteed
                                            returns perfect for long term financial security.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <a href="#" class="text-primary font-bold flex items-center gap-2">
                                    <span>Lock & Earn More</span>
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
                            <img src="{{ Vite::asset('resources/images/safe-box.png') }}"
                                alt="Mockup of a phone making transanctions" class="w-full object-cover">
                            <div
                                class="absolute bottom-10 right-10 bg-white p-3 rounded-xl inline-flex items-center justify-between gap-5 md:gap-10 shadow-md">
                                <p>RaveVault</p>
                                <p class="bg-amber-500/30 text-amber-500 px-3 py-2 rounded-lg">15% Interest p.a</p>
                            </div>
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
                <x-pages.testimonial-section page="savings" />
                <!-- FAQ -->
                <x-pages.faq-section page="savings" />
            </div>

        </section>

    </x-guest-layout>
