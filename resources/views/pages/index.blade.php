<x-guest-layout>
    <!-- HERO -->
    <section class="min-h-screen relative">
        <div class="pt-20 md:pt-32 lg:pt-40">
            <div class="container mx-auto max-w-6xl px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="capitalize leading-[1.2] text-center mb-5">
                        Take Control of Your Money without Boundaries.</h1>
                    <p class="md:font-[500] md:text-lg lg:text-xl mb-10">One Powerful app to send, save, spend, borrow
                        and
                        live boldly. No paperwork. No friction. Just pure financial freedom on your terms.</p>
                    <div class="">
                        <a href="#"
                            class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">Get
                            the app - It's Free
                        </a>
                    </div>
                </div>

                <img src="{{ Vite::asset('resources/images/hero img 1.png') }}"
                    alt="A happy black lady dressed in bright sunny yellow dress happily stretching her hands forward while holding a phone"
                    class="mx-auto w-full max-w-3xl">
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
                <h2 class="text-center mb-5 leading-[1.2]">One App. Endless <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-primary-2">Freedom</span>
                </h2>
                <p class="text-center">More than a wallet - it's how you pay, save, borrow and explore. Instantly,
                    Securely, Seamlessly.</p>
            </div>
            <div class="space-y-10">
                <!-- Card 1 -->
                <div class="rounded-2xl bg-gradient-to-br from-primary/10 to-primary/30 lg:grid grid-cols-7">
                    <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                        <div>
                            <h6 class="uppercase text-primary-2 text-xs">
                                Send and receive funds
                            </h6>
                            <div class="mt-6 lg:mt-8">
                                <div>
                                    <h4 class="text-xl md:text-2xl lg:text-[36px] font-bold mb-3 leading-[1.2]">
                                        Transfers
                                        that move
                                        at the speed of trust.</h4>
                                    <p>Effortlessly send and receive money across Nigeria whether to other DgnRavePay
                                        wallets
                                        or any local bank account.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <a href="#" class="text-primary font-bold flex items-center gap-2">
                                <span>Send & Receive Instantly</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </a>
                        </div>
                    </div>
                    <div class="md:col-span-3 aspect-[16/12] lg:aspect-square flex justify-center overflow-hidden">
                        <img src="{{ Vite::asset('resources/images/account credited.svg') }}"
                            alt="Mockup of a phone making transanctions" class="w-full object-cover">
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="lg:grid lg:grid-cols-7 gap-5 space-y-10 lg:space-y-0">
                    <div
                        class="bg-primary/30 relative rounded-xl lg:col-span-3 flex justify-center items-center lg:block aspect-video lg:aspect-[auto] overflow-hidden">
                        <img src="{{ Vite::asset('resources/images/black woman smiling while pressing phone.png') }}"
                            alt="a black lady in afro smiling happily while using her phone"
                            class="absolute -top-50 lg:top-0 w-full object-cover lg:h-full" />
                    </div>
                    <div class="bg-gradient-to-br from-secondary/10 to-secondary/60 lg:col-span-4 rounded-xl">
                        <div class="px-5 py-7 md:py-10">
                            <h6 class="uppercase text-primary-2 text-xs">
                                bills payment
                            </h6>
                            <div class="mt-6 md:mt-8">
                                <h4 class="text-xl md:text-2xl lg:text-[36px] font-bold mb-3 leading-[1.2]">One-tap
                                    access to
                                    essential services.</h4>
                                <p>Handle everyday expenses in seconds with DgnRavePay s
                                    smart bill payment system designed for ease, insights, and
                                    rewards.</p>
                                <div class="mt-10">
                                    <a href="#" class="text-primary font-bold flex items-center gap-2">
                                        <span>Pay My Bills</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <img src="{{ Vite::asset('resources/images/pie chart.png') }}" alt="" class="w-full">
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="rounded-2xl bg-gradient-to-br from-green-200/10 to-green-500/30 lg:grid grid-cols-7">
                    <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                        <div>
                            <h6 class="uppercase text-primary-2 text-xs">
                                Virtual Cards
                            </h6>
                            <div class="mt-6 lg:mt-8">
                                <div>
                                    <h4 class="text-xl md:text-2xl lg:text-[36px] font-bold mb-3 leading-[1.2]">Go
                                        global without
                                        leaving your wallet.</h4>
                                    <p>Experience seamless international payments with instant, secure, and flexible
                                        virtual USD cards perfectly designed for Nigerians who shop, subscribe, and
                                        spend globally.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <a href="#" class="text-primary font-bold flex items-center gap-2">
                                <span>Convert money</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </a>
                        </div>
                    </div>
                    <div class="md:col-span-3 aspect-[16/12] lg:aspect-square relative overflow-hidden">
                        <img src="{{ Vite::asset('resources/images/hand holding phone with circle.png') }}"
                            alt="" class="w-[95%] absolute ml-[3rem] md:ml-[4.5rem] lg:mx-[0] object-cover">
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="lg:grid lg:grid-cols-7 gap-5 space-y-10 lg:space-y-0">
                    <div class="bg-gradient-to-br from-red-300/10 to-red-300/60 lg:col-span-4 rounded-xl">
                        <div class="px-5 py-7 md:py-10">
                            <h6 class="uppercase text-primary-2 text-xs">
                                Money Transfer
                            </h6>
                            <div class="mt-6 md:mt-8">
                                <h4 class="text-xl md:text-2xl lg:text-[36px] font-bold mb-3 leading-[1.2]">Get
                                    financial backup
                                    when you need it most.</h4>
                                <p>From small emergencies to life-changing purchases, DgnRavePay provides fast, flexible
                                    loans right from your wallet.</p>
                                <div class="flex gap-5 mt-5 text-sm font-semibold">
                                    <div class="flex items-center">
                                        <img src="{{ Vite::asset('resources/images/chrome-icon.png') }}" alt=""
                                            class="h-4">
                                        <p>Instant Micro-Loans</p>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="{{ Vite::asset('resources/images/chrome-icon.png') }}" alt=""
                                            class="h-4">
                                        <p>Personal Loans</p>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="{{ Vite::asset('resources/images/chrome-icon.png') }}"
                                            alt="" class="h-4">
                                        <p>Car Loans</p>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <a href="#" class="text-primary font-bold flex items-center gap-2">
                                        <span>Make a transfer</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <img src="{{ Vite::asset('resources/images/loan phone.png') }}" alt=""
                                class="w-3/5 lg:w-[70%] ml-20 h-full">
                            <img src="{{ Vite::asset('resources/images/loan cards.png') }}" alt=""
                                class="absolute left-7 bottom-10 h-30 sm:h-36 md:h-44 lg:h-60">
                            <img src="{{ Vite::asset('resources/images/Ongoing loan card.png') }}" alt=""
                                class="absolute right-10 lg:right-0 bottom-20 h-30 sm:h-36 md:h-60">
                        </div>
                    </div>
                    <div
                        class="relative rounded-xl lg:col-span-3 flex justify-center lg:block aspect-video
                                    lg:aspect-[auto] overflow-hidden">
                        <img src="{{ Vite::asset('resources/images/man smiling.png') }}" alt=""
                            class="absolute w-full object-cover h-full" />
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="rounded-2xl bg-gradient-to-br from-purple-200/10 to-purple-500/30 lg:grid grid-cols-7">
                    <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                        <div>
                            <h6 class="uppercase text-primary-2 text-xs">
                                savings
                            </h6>
                            <div class="mt-6 lg:mt-8">
                                <div>
                                    <h4 class="text-xl md:text-2xl lg:text-[36px] font-bold mb-3 leading-[1.2]">Make
                                        your money
                                        work smarter.</h4>
                                    <p>Take control of your financial future with smart, automated savings tools
                                        designed for your lifestyle, goals, and discipline level.</p>
                                    <div class="flex gap-5 mt-5 text-sm font-semibold">
                                        <div class="flex items-center">
                                            <img src="{{ Vite::asset('resources/images/chrome-icon.png') }}"
                                                alt="" class="h-4">
                                            <p>RaveGoals</p>
                                        </div>
                                        <div class="flex items-center">
                                            <img src="{{ Vite::asset('resources/images/chrome-icon.png') }}"
                                                alt="" class="h-4">
                                            <p>RaveFlex</p>
                                        </div>
                                        <div class="flex items-center">
                                            <img src="{{ Vite::asset('resources/images/chrome-icon.png') }}"
                                                alt="" class="h-4">
                                            <p>RaveVault</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <a href="#" class="text-primary font-bold flex items-center gap-2">
                                <span>Convert money</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </a>
                        </div>
                    </div>
                    <div class="md:col-span-3 aspect-[16/12] lg:aspect-square relative overflow-hidden">
                        <img src="{{ Vite::asset('resources/images/hand touching cards.png') }}" alt=""
                            class="w-full top-0 absolute bottom-0 right-5">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dark Section -->
    <section class="bg-accent-black">
        <div class="container mx-auto max-w-6xl px-5 md:px-10 md:grid md:grid-cols-2">
            <div class="pt-20 pb-10 md:py-28 flex flex-col justify-center">
                <h2 class="text-white mb-5 leading-[1.2]">Do more with your Personal
                    Account</h2>
                <p class="text-white">Your lifestyle companion for smart payments, instant gifting, seamless travel,
                    and
                    hassle-free bill management.</p>
                <div class="mt-10">
                    <a href="#"
                        class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                        Get Your Card Now
                    </a>
                </div>

            </div>
            <div class="flex items-end justify-center">
                <img src="{{ Vite::asset('resources/images/woman hand holding phone.png') }}" alt=""
                    class="h-60 md:h-96 lg:h-[30rem]">
            </div>
        </div>
        <div class="w-full border-t border-white/20"></div>
        <div class="container mx-auto max-w-6xl px-5 md:px-10 py-10 md:py-20 grid md:grid-cols-4 gap-5 text-white">
            <div class="bg-white/5 rounded-xl">
                <div class="p-5 pb-7 h-40">
                    <img src="{{ Vite::asset('resources/images/Outbound integrations 1.png') }}" alt=""
                        class="w-full">
                </div>
                <div class="mt-10 md:mt-0 p-5 pb-7">
                    <span class="text-sm text-white/30">01-</span>
                    <h5 class="text-base md:text-lg lg:text-xl">Request Money and Bills with Ease</h5>
                </div>
            </div>
            <div class="bg-white/5 rounded-xl relative -z-[0]">
                <div class="p-5 pb-7 h-40 relative overflow-hidden">
                    <img src="{{ Vite::asset('resources/images/outbound circle logo.png') }}" alt=""
                        class="w-[90%] absolute -top-10 left-0">
                </div>
                <div class="mt-10 md:mt-0 p-5 pb-7">
                    <span class="text-sm text-white/30">02-</span>
                    <h5 class="text-base md:text-lg lg:text-xl">Smart, Fast, and Borderless Gift Cards</h5>
                </div>
            </div>
            <div class="bg-white/5 rounded-xl -z-[0]">
                <div class="pb-7 h-40 relative overflow-hidden">
                    <img src="{{ Vite::asset('resources/images/outbound card circle.png') }}" alt=""
                        class="w-[90%] absolute left-0 -top-5 mx-auto mt-3 z-[103]">
                </div>
                <div class="mt-10 md:mt-0 p-5 pb-7">
                    <span class="text-sm text-white/30">03-</span>
                    <h5 class="text-base md:text-lg lg:text-xl">Smart, Fast, and Borderless Gift Cards</h5>
                </div>
            </div>
            <div class="bg-white/5 rounded-xl">
                <div class="p-5 pb-7 h-40 relative">
                    <img src="{{ Vite::asset('resources/images/world.png') }}" alt="" class="w-4/5 mx-auto">
                </div>
                <div class="mt-10 md:mt-0 p-5 pb-7">
                    <span class="text-sm text-white/30">04-</span>
                    <h5 class="text-base md:text-lg lg:text-xl">Flights and Hotels, in your Pocket</h5>
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
                    <h2 class="text-center mb-5 leading-[1]">Voices of Trust.
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
                    <h2 class="text-center mb-5">Get Savvy About Your
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
            <!-- News -->
            <div class="">
                <div class="mb-10 px-5 md:px-10">
                    <h2 class="text-center mb-5">Get Savvy About Your
                        Financial Life</h2>
                    <p class="text-center">See why over 100,000 Nigerians have made DgnRavePay their go-to financial
                        app.
                        Real reviews, real stories, real results.</p>
                </div>
                <div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                        <article class="space-y-2">
                            <img src="{{ Vite::asset('resources/images/article 1.jpg') }}" alt=""
                                class="aspect-video rounded-xl object-cover">
                            <h6 class="font-bold text-lg">FX-saving strategies every freelancer in Indonesia should
                                know
                            </h6>
                            <p class="font-medium">Reduce your conversion losses as a freelancer in Indonesia with
                                these
                                FX-saving strategies.</p>
                            <div class="flex uppercase text-stone-700">
                                Adeolu Titus Adekunle - July 31, 2025
                            </div>
                        </article>
                        <article class="space-y-2">
                            <img src="{{ Vite::asset('resources/images/article 2.jpg') }}" alt=""
                                class="aspect-video rounded-xl object-cover">
                            <h6 class="font-bold text-lg">How to manage your freelance finances in South Africa
                            </h6>
                            <p class="font-medium">Discover how to manage your freelance finances in South Africa with
                                the right payment system.</p>
                            <div class="flex uppercase text-stone-700">
                                Adeolu Titus Adekunle - July 31, 2025
                            </div>
                        </article>
                        <article class="space-y-2">
                            <img src="{{ Vite::asset('resources/images/article 3.jpg') }}" alt=""
                                class="aspect-video rounded-xl object-cover">
                            <h6 class="font-bold text-lg">How Kenyan creators are earning and saving in multiple
                                currencies
                            </h6>
                            <p class="font-medium">Here is how Kenyan creators are earning and saving in multiple
                                currencies and how to get started with Grey</p>
                            <div class="flex uppercase text-stone-700">
                                Adeolu Titus Adekunle - July 31, 2025
                            </div>
                        </article>
                    </div>
                    <div class="flex items-center justify-end mt-20">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="0.5" stroke="currentColor" class="size-16">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="0.5" stroke="currentColor" class="size-16">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-guest-layout>
