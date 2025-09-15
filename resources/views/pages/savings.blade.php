<x-guest-layout>
    <section class="min-h-screen relative">
        <div class="pt-20 md:pt-32 lg:pt-40">
            <div class="container mx-auto max-w-6xl px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="capitalize leading-[1.2] mb-5 text-center">
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
                    <img src="{{ Vite::asset('resources/images/hand touching cards') }}" alt=""
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
        <div class="container mx-auto max-w-6xl px-5 md:px-10">
            <div class="mb-10 px-5 md:px-10">
                <h2 class="text-center mb-5 leading-[1.2]">
                    Why People Choose DgnRavePay</h2>
                <div class="grid md:grid-cols-3 gap-5 mt-10">
                    <div class="bg-primary rounded-xl">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Save Your Way</h6>
                            <p>Choose a plan that matches your lifestyle, not the other way around.</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/black hand holding phone.png') }}" alt=""
                            class="mx-auto h-40 md:h-52 lg:h-64">
                    </div>
                    <div class="bg-secondary/50 rounded-xl">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">No Excuses</h6>
                            <p>Automated savings keep you consistent, even on busy days.</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/black hand holding phone.png') }}" alt=""
                            class="mx-auto h-40 md:h-52 lg:h-64">
                    </div>
                    <div class="bg-stone-950 rounded-xl text-white">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Grow with Confidence</h6>
                            <p>Earn interest, stay flexible, and keep your funds safe with CBN regulated protection.</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/black hand holding phone.png') }}" alt=""
                            class="mx-auto h-40 md:h-52 lg:h-64">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dark Section -->
    <section class="bg-accent-black relative -z-[0]">
        <div class="container mx-auto max-w-6xl px-5 md:px-10 py-20 md:py-28">
            <div class="text-center text-white">
                <h2 class="text-white mb-5 leading-[1.2]">
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
                <div class="rounded-2xl bg-gradient-to-br from-white to-secondary lg:grid grid-cols-7">
                    <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                        <div>
                            <h6 class="uppercase text-xs text-blue-500">
                                Rave Goals
                            </h6>
                            <div class="mt-6 lg:mt-8">
                                <div>
                                    <h4 class="text-xl md:text-2xl lg:text-[36px] font-bold mb-3 leading-[1.2]">Achieve Your
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
                        <img src="{{ Vite::asset('resources/images/account credited.svg') }}"
                            alt="Mockup of a phone making transanctions" class="w-full object-cover">
                        <div
                            class="absolute bottom-10 right-10 bg-white p-3 rounded-xl inline-flex items-center justify-between gap-5 md:gap-10 shadow-md">
                            <p>RaveGoals</p>
                            <p class="bg-green-500/30 text-green-500 px-3 py-2 rounded-lg">19% Interest p.a</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="rounded-2xl bg-gradient-to-br from-white to-red-200 lg:grid grid-cols-7">
                    <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                        <div>
                            <h6 class="uppercase text-xs text-blue-500">
                                RaveFlex
                            </h6>
                            <div class="mt-6 lg:mt-8">
                                <div>
                                    <h4 class="text-xl md:text-2xl lg:text-[36px] font-bold mb-3 leading-[1.2]">
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
                    <div class="md:col-span-3 aspect-[16/12] lg:aspect-square relative">
                        <img src="{{ Vite::asset('resources/images/account credited.svg') }}"
                            alt="Mockup of a phone making transanctions" class="w-full object-cover">
                        <div
                            class="absolute bottom-10 right-10 bg-white p-3 rounded-xl inline-flex items-center justify-between gap-5 md:gap-10 shadow-md">
                            <p>RaveGoals</p>
                            <p class="bg-green-500/30 text-green-500 px-3 py-2 rounded-lg">19% Interest p.a</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="rounded-2xl bg-gradient-to-br from-white to-green-200 lg:grid grid-cols-7">
                    <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                        <div>
                            <h6 class="uppercase text-xs text-blue-500">
                                RaveVault
                            </h6>
                            <div class="mt-6 lg:mt-8">
                                <div>
                                    <h4 class="text-xl md:text-2xl lg:text-[36px] font-bold mb-3 leading-[1.2]">
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
                    <div class="md:col-span-3 aspect-[16/12] lg:aspect-square relative">
                        <img src="{{ Vite::asset('resources/images/account credited.svg') }}"
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
        <div class="container mx-auto max-w-6xl px-5 md:px-10 space-y-30 md:space-y-40">
            <!-- JOIN SECTION -->
            <div class="md:grid md:grid-cols-5 md:gap-20">
                <div class="md:col-span-3">
                    <h2 class="mb-2 text-center md:text-left leading-[1.2]">Join
                        DgnRavePay in 2 Minutes or Less</h2>
                    <p class="text-center md:text-left">No queues. No paperwork. Just you, your phone, and a few taps
                        to
                        financial freedom.</p>
                    <ul class="mt-3 max-w-2xl">
                        <li class="px-5 py-5 rounded-xl mb-2 cursor-pointer join-option">
                            <div class="flex items-center gap-3 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                <p class="font-semibold text-base">Download the DgnRavePay Personal App</p>
                            </div>
                            <div class="max-h-0 overflow-hidden join-text transition-all">Create a secure
                                PIN, top up your wallet, and start
                                sending, spending,
                                and
                                saving
                                smartly.</div>
                        </li>
                        <li class="px-5 py-5 rounded-xl mb-2 cursor-pointer join-active join-option">
                            <div class="flex items-center gap-3 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                </svg>
                                <p class="font-semibold text-base">Verify Your Identity</p>
                            </div>
                            <div class="overflow-hidden join-text transition-all">Create a secure PIN, top up
                                your wallet, and start sending,
                                spending, and
                                saving
                                smartly.</div>
                        </li>
                        <li class="px-5 py-5 rounded-xl mb-2 cursor-pointer join-option">
                            <div class="flex items-center gap-3 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                <p class="font-semibold text-base">Set PIN & Fund Wallet</p>
                            </div>
                            <div class="max-h-0 overflow-hidden join-text transition-all">Create a secure
                                PIN, top up your wallet, and start
                                sending, spending, and
                                saving
                                smartly.</div>
                        </li>
                    </ul>
                </div>
                <div class="w-full h-full rounded-xl md:col-span-2 overflow-hidden relative bg-primary/40">
                    <img src="{{ Vite::asset('resources/images/face scan.png') }}" alt="DngRavePay App's face scan"
                        class="w-full h-full object-cover rounded-xl absolute" id="join-img">
                </div>
            </div>
            <!-- TESTIMONIAL -->
            <div class="">
                <div class="mb-10 px-5 md:px-10">
                    <h2 class="text-center leading-[1.5]">Voices of Trust.
                        Stories of Impact.</h2>
                    <p class="text-center">See why over 100,000 Nigerians have made DgnRavePay their go-to financial
                        app.
                        Real reviews, real stories, real results.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <!-- Google Play – tall yellow -->
                        <article class="break-inside-avoid rounded-3xl bg-[#fbbb0c] text-white shadow-lg p-6">
                            <header class="flex items-center gap-3">
                                <img class="size-10 rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=200&h=200&fit=crop&crop=faces"
                                    alt="Vivian Smith avatar" />
                                <div>
                                    <p class="font-semibold">Vivian Smith</p>
                                    <div class="flex" aria-label="5 star rating">★★★★★</div>
                                </div>
                                <svg class="ml-auto size-6 opacity-90" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M5 4.6v14.8c0 .5.53.8.95.55l12-7.4a.65.65 0 0 0 0-1.1l-12-7.4A.64.64 0 0 0 5 4.6z" />
                                </svg>
                            </header>
                            <p class="mt-4 leading-6">
                                The tool gives us good insights into what the market says and thinks, on a scale that is
                                almost
                                impossible
                                to do manually. The tool gives us good insights into what the market says and thinks, on
                                a
                                scale
                                that is
                                almost impossible to do manually.
                            </p>
                        </article>

                        <!-- Google Play – small white -->
                        <article class="break-inside-avoid rounded-3xl bg-white shadow-lg ring-1 ring-black/5 p-6">
                            <header class="flex items-center gap-3">
                                <img class="size-10 rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?q=80&w=200&h=200&fit=crop&crop=faces"
                                    alt="Vivian Smith avatar" />
                                <div>
                                    <p class="font-semibold text-gray-900">Vivian Smith</p>
                                    <div class="flex text-yellow-400 text-sm tracking-tight"
                                        aria-label="5 star rating">
                                        ★★★★★
                                    </div>
                                </div>
                                <svg class="ml-auto size-6 text-gray-500" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M5 4.6v14.8c0 .5.53.8.95.55l12-7.4a.65.65 0 0 0 0-1.1l-12-7.4A.64.64 0 0 0 5 4.6z" />
                                </svg>
                            </header>
                            <p class="mt-4 text-gray-700">
                                The tool gives us good insights into what the market says and thinks, on a scale that is
                                almost
                                impossible to do manually.
                            </p>
                        </article>

                        <!-- Facebook – medium yellow -->
                        <article class="break-inside-avoid rounded-3xl bg-[#fbbb0c] text-white shadow-lg p-6">
                            <header class="flex items-center gap-3">
                                <img class="size-10 rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1519340241574-2cec6aef0c01?q=80&w=200&h=200&fit=crop&crop=faces"
                                    alt="Vivian Smith avatar" />
                                <div>
                                    <p class="font-semibold">Vivian Smith</p>
                                    <div class="flex" aria-label="5 star rating">★★★★★</div>
                                </div>
                                <!-- Facebook (f) -->
                                <svg class="ml-auto size-6" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M22 12A10 10 0 1 0 10.3 21.9v-6.9H7.8V12h2.5V9.8c0-2.5 1.5-3.9 3.7-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 3h-2.4v6.9A10 10 0 0 0 22 12Z" />
                                </svg>
                            </header>
                            <p class="mt-4">
                                The tool gives us good insights into what the market says and thinks, on a scale that is
                                almost
                                impossible to do manually.
                            </p>
                        </article>
                    </div>
                    <div class="space-y-6">
                        <!-- Google Play – small white -->
                        <article class="break-inside-avoid rounded-3xl bg-white shadow-lg ring-1 ring-black/5 p-6">
                            <header class="flex items-center gap-3">
                                <img class="size-10 rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=200&h=200&fit=crop&crop=faces"
                                    alt="Vivian Smith avatar" />
                                <div>
                                    <p class="font-semibold text-neutral-900">Vivian Smith</p>
                                    <div class="flex text-yellow-400 text-sm tracking-tight"
                                        aria-label="5 star rating">
                                        ★★★★★
                                    </div>
                                </div>
                                <!-- Play icon -->
                                <svg class="ml-auto size-6 text-neutral-500" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M5 4.6v14.8c0 .5.53.8.95.55l12-7.4a.65.65 0 0 0 0-1.1l-12-7.4A.64.64 0 0 0 5 4.6z" />
                                </svg>
                            </header>
                            <p class="mt-4 text-neutral-700">
                                The tool gives us good insights into what the market says and thinks, on a scale that is
                                almost
                                impossible to do manually.
                            </p>
                        </article>

                        <!-- Apple – tall yellow -->
                        <article class="break-inside-avoid rounded-3xl bg-[#fbbb0c] text-white shadow-lg p-6">
                            <header class="flex items-center gap-3">
                                <img class="size-10 rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?q=80&w=200&h=200&fit=crop&crop=faces"
                                    alt="Vivian Smith avatar" />
                                <div>
                                    <p class="font-semibold">Vivian Smith</p>
                                    <div class="flex" aria-label="5 star rating">★★★★★</div>
                                </div>
                                <!-- "Apple" (bag) icon -->
                                <svg class="ml-auto size-6 opacity-90" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M6 7a3 3 0 0 1 6 0h1a3 3 0 1 1 3 3v8a3 3 0 0 1-3 3H9a3 3 0 0 1-3-3V10a3 3 0 0 1 0-3h0Zm5-1a1 1 0 1 0-2 0h2Z" />
                                </svg>
                            </header>
                            <p class="mt-4 leading-6">
                                The tool gives us good insights into what the market says and thinks, on a scale that is
                                almost
                                impossible
                                to do manually. The tool gives us good insights into what the market says and thinks, on
                                a
                                scale
                                that is
                                almost impossible to do manually. The tool gives us good insights into what the market
                                says
                                and
                                thinks.
                            </p>
                        </article>

                        <!-- Instagram – medium white -->
                        <article class="break-inside-avoid rounded-3xl bg-white shadow-lg ring-1 ring-black/5 p-6">
                            <header class="flex items-center gap-3">
                                <img class="size-10 rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=200&h=200&fit=crop&crop=faces"
                                    alt="Vivian Smith avatar" />
                                <div>
                                    <p class="font-semibold text-gray-900">Vivian Smith</p>
                                    <div class="flex text-yellow-400 text-sm tracking-tight"
                                        aria-label="5 star rating">
                                        ★★★★★
                                    </div>
                                </div>
                                <!-- Instagram (camera) -->
                                <svg class="ml-auto size-6 text-gray-700" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M7.5 3h9A4.5 4.5 0 0 1 21 7.5v9A4.5 4.5 0 0 1 16.5 21h-9A4.5 4.5 0 0 1 3 16.5v-9A4.5 4.5 0 0 1 7.5 3Zm0 1.5A3 3 0 0 0 4.5 7.5v9A3 3 0 0 0 7.5 19.5h9a3 3 0 0 0 3-3v-9a3 3 0 0 0-3-3h-9Zm9 2.25a1.125 1.125 0 1 1 0 2.25 1.125 1.125 0 0 1 0-2.25ZM12 8.25a3.75 3.75 0 1 1 0 7.5 3.75 3.75 0 0 1 0-7.5Z" />
                                </svg>
                            </header>
                            <p class="mt-4 text-gray-700">
                                The tool gives us good insights into what the market says and thinks, on a scale that is
                                almost
                                impossible to do manually.
                                The tool gives us good insights into what the market says and thinks, on a scale that is
                                almost
                                impossible to do manually.
                            </p>
                        </article>
                    </div>
                </div>
            </div>
            <!-- FAQ -->
            <div class="">
                <div class="mb-10 px-5 md:px-10">
                    <h2 class="text-center mb-5 leading-[1.5]">Get Savvy About Your
                        Financial Life</h2>
                    <p class="text-center">See why over 100,000 Nigerians have made DgnRavePay their go-to financial
                        app.
                        Real reviews, real stories, real results.</p>
                </div>
                <ul class="max-w-4xl mx-auto space-y-2 md:space-y-3">
                    <li class="flex items-center justify-between bg-stone-100 rounded-2xl py-3 md:py-4 px-3 md:px-5">
                        <div>
                            <h6 class="font-medium text-sm md:text-lg">Why should I open a DgnRavePay Personal Account?
                            </h6>
                        </div>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="0.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </li>
                    <li class="flex items-center justify-between bg-stone-100 rounded-2xl py-3 md:py-4 px-3 md:px-5">
                        <div>
                            <h6 class="font-medium text-sm md:text-lg">How fast can I start using my account?</h6>
                        </div>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="0.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </li>
                    <li class="flex items-center justify-between bg-stone-100 rounded-2xl py-3 md:py-4 px-3 md:px-5">
                        <div>
                            <h6 class="font-medium text-sm md:text-lg">How fast can I start using my account?</h6>
                        </div>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="0.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </li>
                    <li class="flex items-center justify-between bg-stone-100 rounded-2xl py-3 md:py-4 px-3 md:px-5">
                        <div>
                            <h6 class="font-medium text-sm md:text-lg">What bills can I sort out from my phone?</h6>
                        </div>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="0.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </li>
                    <li class="flex items-center justify-between bg-stone-100 rounded-2xl py-3 md:py-4 px-3 md:px-5">
                        <div>
                            <h6 class="font-medium text-sm md:text-lg">How does saving with DgnRavePay help me grow my
                                money?</h6>
                        </div>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="0.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

    </section>

</x-guest-layout>
