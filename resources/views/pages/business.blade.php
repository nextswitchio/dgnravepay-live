@section('title', 'Business Banking for Growth')
@section('meta_description',
    'Open a CAC-backed business wallet, accept payments, automate payouts, and manage teams
    with CBN‑compliant tools built for scale.')
    <x-guest-layout>
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="capitalize text-center mb-5">
                            Simplify Business Banking.
                            Accelerate Growth
                        </h1>
                        <p class="md:font-[500] md:text-lg lg:text-xl mb-10">Open a business account in minutes and access
                            powerful tools built to
                            help you thrive<br>whether you re just starting or scaling fast.</p>
                        <div class="">
                            <a href="#"
                                class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                                Start Managing Smarter
                            </a>
                        </div>
                    </div>

                    <img src="{{ Vite::asset('resources/images/hero img 2.png') }}"
                        alt="A happy black lady dressed in bright sunny yellow dress happily stretching her hands forward while holding a phone"
                        class="mx-auto w-full max-w-3xl">
                </div>
            </div>
            <div class="">
                <img src="{{ Vite::asset('resources/images/vector line 2.svg') }}" alt="vector line"
                    class="absolute -z-[10] blur-[3rem] w-full bottom-28 left-0">
            </div>
        </section>
        <section class="my-28">
            <div class="custom-container mx-auto  px-5 md:px-10">
                <div class="mb-10 px-5 md:px-10" data-aos="fade-up">
                    <h2 class="text-center mb-5">Why DgnRavePay <span
                            class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-primary-2">Business?</span>
                    </h2>
                    <p class="text-center">All-in-One. CBN-Compliant. Everything your business needs.</p>
                </div>
                <div class="space-y-10">
                    <!-- Card 1 -->
                    <div class="rounded-2xl bg-gradient-to-br from-primary/10 to-primary/30 lg:grid grid-cols-7"
                        data-aos="zoom-in">
                        <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                            <div>
                                <h6 class="uppercase text-primary-2 text-xs">
                                    Send and receive funds
                                </h6>
                                <div class="mt-6 lg:mt-8">
                                    <div>
                                        <h3 class="mb-3 leading-[1]">
                                            Business Accounts
                                            Built for Growth
                                        </h3>
                                        <p>
                                            Create a CAC-backed business wallet in your
                                            brand name, process high-value transactions with
                                            ease, and take full control of your business
                                            finances all in one place.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <a href="#" class="text-primary font-bold flex items-center gap-2">
                                    <span>Open Business Wallet</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                        <div class="md:col-span-3 aspect-[16/12] lg:aspect-square overflow-hidden">
                            <img src="{{ Vite::asset('resources/images/phone-mockup-dark.png') }}"
                                alt="Mockup of a phone making transanctions" class="w-full object-cover">
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="rounded-2xl bg-gradient-to-br from-green-200/10 to-green-500/30 lg:grid grid-cols-7"
                        data-aos="zoom-in">
                        <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                            <div>
                                <h6 class="uppercase text-primary-2 text-xs">
                                    pos
                                </h6>
                                <div class="mt-6 lg:mt-8">
                                    <div>
                                        <h3 class="mb-3 leading-[1]">Sell. Track. Grow.
                                            All in One</h3>
                                        <p>Request, assign, and control multiple POS
                                            devices with advanced monitoring and fraud
                                            protection. Perfect for agents, retail locations,
                                            and field teams
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <a href="#" class="text-primary font-bold flex items-center gap-2">
                                    <span>Request for POS</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                        <div class="md:col-span-3 aspect-[16/12] lg:aspect-square relative">
                            <img src="{{ Vite::asset('resources/images/black hand holding phone.png') }}" alt=""
                                class="w-4/5 object-cover">
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="lg:grid lg:grid-cols-7 gap-5 space-y-10 lg:space-y-0" data-aos="zoom-in">
                        <div
                            class="bg-primary/30 rounded-xl lg:col-span-3 flex justify-center lg:block aspect-video lg:aspect-[auto] overflow-hidden relative">
                            <img src="{{ Vite::asset('resources/images/lady-holding-card.png') }}" alt=""
                                class="w-full object-cover h-full absolute" />
                        </div>
                        <div class="bg-gradient-to-br from-secondary/10 to-secondary/60 lg:col-span-4 rounded-xl">
                            <div class="px-5 py-7 md:py-10">
                                <h6 class="uppercase text-primary-2 text-xs">
                                    VIRTUAL CARD
                                </h6>
                                <div class="mt-6 md:mt-8">
                                    <h3 class="mb-3 leading-[1]">
                                        Pay Globally, Securely. Anytime.
                                    </h3>
                                    <p>
                                        Create and manage multiple virtual USD cards for online
                                        payments, subscriptions, and international transactions.
                                    </p>
                                    <div class="mt-10">
                                        <a href="#" class="text-primary font-bold flex items-center gap-2">
                                            <span>Create Virtual Card</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>

                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="relative overflow-hidden aspect-[16/12]">

                                <img src="{{ Vite::asset('resources/images/company logo circle.png') }}" alt=""
                                    class="w-full left-1/2 -translate-x-1/2 absolute bottom-0">
                                <img src="{{ Vite::asset('resources/images/black hand holding card.png') }}" alt=""
                                    class="w-3/5 left-1/2 -translate-x-1/2 absolute -bottom-24 -rotate-[20deg]">
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="lg:grid lg:grid-cols-7 gap-5 space-y-10 lg:space-y-0" data-aos="zoom-in">
                        <div class="bg-gradient-to-br from-red-300/10 to-red-300/60 lg:col-span-4 rounded-xl">
                            <div class="px-5 py-7 md:py-10">
                                <h6 class="uppercase text-primary-2 text-xs">
                                    BUSINESS LOAN
                                </h6>
                                <div class="mt-6 md:mt-8">
                                    <h3 class="mb-3 leading-[1]">
                                        Fuel Growth with Fast,
                                        Flexible Credit
                                    </h3>
                                    <p>
                                        Get quick, tailored funding to expand operations, restock
                                        inventory, or manage cash flow based on your real business
                                        activity.
                                    </p>
                                    <div class="mt-10">
                                        <a href="#" class="text-primary font-bold flex items-center gap-2">
                                            <span>Apply now</span>
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
                                <img src="{{ Vite::asset('resources/images/phone app mockup.png') }}" alt=""
                                    class="w-4/5 mx-auto">
                            </div>
                        </div>
                        <div
                            class="bg-primary/30 rounded-xl lg:col-span-3 flex justify-center lg:block aspect-video
                                        lg:aspect-[auto] overflow-hidden relative">
                            <img src="{{ Vite::asset('resources/images/man smiling.png') }}" alt=""
                                class="w-full object-cover h-full absolute" />
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="rounded-2xl bg-gradient-to-br from-purple-200/10 to-purple-500/30 lg:grid grid-cols-7"
                        data-aos="zoom-in">
                        <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                            <div>
                                <h6 class="uppercase text-primary-2 text-xs">
                                    PAYROLL
                                </h6>
                                <div class="mt-6 lg:mt-8">
                                    <div>
                                        <h3 class="mb-3 leading-[1]">
                                            Get Paid Faster. Look
                                            More Professional.
                                        </h3>
                                        <p>
                                            Send beautiful, branded invoices and get
                                            notified instantly when payment hits your
                                            wallet.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <a href="#" class="text-primary font-bold flex items-center gap-2">
                                    <span>Send My First Invoice</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                        <div class="md:col-span-3 aspect-[16/12] lg:aspect-square relative flex place-items-center">
                            <img src="{{ Vite::asset('resources/images/dashboard mobile.png') }}" alt=""
                                class="w-4/5">
                        </div>
                    </div>
                    <!-- Card 6 -->
                    <div class="rounded-2xl bg-gradient-to-br from-lime-200/10 to-lime-500/30 lg:grid grid-cols-7"
                        data-aos="zoom-in">
                        <div class="lg:col-span-4 px-5 md:px-10 flex flex-col justify-between py-7 md:py-10">
                            <div>
                                <h6 class="uppercase text-primary-2 text-xs">
                                    INVOICE
                                </h6>
                                <div class="mt-6 lg:mt-8">
                                    <div>
                                        <h3 class="mb-3 leading-[1]">
                                            Run Payroll, Payslips
                                            & Compliance in
                                            Minutes
                                        </h3>
                                        <p>
                                            Take control of your financial future with smart,
                                            automated savings tools designed for your
                                            lifestyle, goals, and discipline level.
                                        </p>
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
                            <img src="{{ Vite::asset('resources/images/phone app mockup.png') }}" alt=""
                                class="w-full absolute -bottom-20">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dark Section -->
        <section class="bg-accent-black">
            <div class="custom-container mx-auto  px-5 md:px-10 md:grid md:grid-cols-2">
                <div class="pt-20 pb-10 md:py-32 flex flex-col justify-center">
                    <h2 class="text-white mb-5 leading-[1.4]">
                        Do more with your
                        Business Account
                    </h2>
                    <p class="text-white">Your lifestyle companion for smart payments, instant gifting, seamless travel,
                        and
                        hassle-free bill management.</p>
                    <div class="mt-10">
                        <a href="#"
                            class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                            Get Your Personal Account
                        </a>
                    </div>

                </div>
                <div class="flex items-end justify-center">
                    <img src="{{ Vite::asset('resources/images/woman hand holding phone dark.png') }}" alt=""
                        class="h-60 md:h-96 lg:h-[30rem]">
                </div>
            </div>
            <div class="w-full border-t border-white/20"></div>
            <div class="custom-container mx-auto  px-5 md:px-10 py-10 md:py-20 grid md:grid-cols-3 gap-5 text-white">
                <div class="hover:scale-105 transition-all bg-white/5 rounded-xl p-5 pb-7 flex flex-col justify-between">
                    <img src="{{ Vite::asset('resources/images/statistics.png') }}" alt=""
                        class="w-full object-cover mx-auto">
                    <div class="mt-10 md:mt-0">
                        <span class="text-sm text-white/40">01-</span>
                        <h5 class="text-xl md:text-2xl lg:text-3xl">Smart Business Insight
                            in Real Time</h5>
                    </div>
                </div>
                <div class="hover:scale-105 transition-all bg-white/5 rounded-xl p-5 pb-7 flex flex-col justify-between">
                    <img src="{{ Vite::asset('resources/images/cards stack.png') }}" alt="" class="w-full">
                    <div class="mt-10 md:mt-0">
                        <span class="text-sm text-white/40">02-</span>
                        <h5 class="text-xl md:text-2xl lg:text-3xl">
                            Smart Savings,
                            Smarter Business
                        </h5>
                    </div>
                </div>
                <div class="hover:scale-105 transition-all bg-white/5 rounded-xl p-5 pb-7 flex flex-col justify-between">
                    <img src="{{ Vite::asset('resources/images/pie chart dark.png') }}" alt="" class="w-full">
                    <div class="mt-10 md:mt-0">
                        <span class="text-sm text-white/40">03-</span>
                        <h5 class="text-xl md:text-2xl lg:text-3xl">
                            No Queues. Bills Paid
                            Instantly
                        </h5>
                    </div>
                </div>
                <div class="hover:scale-105 transition-all bg-white/5 rounded-xl p-5 pb-7 flex flex-col justify-between">
                    <img src="{{ Vite::asset('resources/images/world.png') }}" alt="" class="w-4/5 mx-auto">
                    <div class="mt-10">
                        <span class="text-sm text-white/40">04-</span>
                        <h5 class="text-xl md:text-2xl lg:text-3xl">
                            Flights, Stays, All in
                            One.
                        </h5>
                    </div>
                </div>
                <div class="hover:scale-105 transition-all bg-white/5 rounded-xl p-5 pb-7 flex flex-col justify-between">
                    <img src="{{ Vite::asset('resources/images/outbound card circle dark.png') }}" alt=""
                        class="w-full">
                    <div class="mt-10 md:mt-0">
                        <span class="text-sm text-white/40">05-</span>
                        <h5 class="text-xl md:text-2xl lg:text-3xl">
                            Automate Payouts and
                            Recurring Payments
                        </h5>
                    </div>
                </div>
                <div
                    class="hover:scale-105 transition-all bg-white/5 rounded-xl p-5 pb-7 flex flex-col justify-between relative">
                    {{-- <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DngRavePay Logo black colored"
                    class="absolute w-full top-0 left-0 -z-[1]"> --}}
                    <img src="{{ Vite::asset('resources/images/outbound circle logo.png') }}" alt=""
                        class="w-full">
                    <div class="mt-10 md:mt-0">
                        <span class="text-sm text-white/40">02-</span>
                        <h5 class="text-xl md:text-2xl lg:text-3xl">
                            Digital Gift Cards,
                            Simple and Fast
                        </h5>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-32">
            <div class="custom-container mx-auto px-5 md:px-10 space-y-20 md:space-y-40">
                <!-- JOIN SECTION -->
                <x-pages.join-section />
                <!-- TESTIMONIAL -->
                <x-pages.testimonial-section />
                <!-- FAQ -->
                <x-pages.faq-section />
                <!-- News -->
                <x-pages.news-section />
            </div>
        </section>
    </x-guest-layout>
