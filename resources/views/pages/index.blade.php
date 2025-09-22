@section('title', 'Money without Boundaries')
@section('meta_description',
    'Send, save, spend, and borrow effortlessly with DgnRavePay — secure, fast, and built for
    financial freedom.')
    <x-guest-layout>
        <!-- HERO -->
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="capitalize leading-[1.2] text-center mb-5">
                            Take Control of Your Money without Boundaries.</h1>
                        <p class="md:font-[500] md:text-lg lg:text-xl mb-10">One Powerful app to send, save, spend, borrow
                            and
                            live boldly. No paperwork. No friction.<br>Just pure financial freedom on your terms.</p>
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
            <div class="custom-container mx-auto  px-5 md:px-10">
                <div class="mb-10 px-5 md:px-10" data-aos="fade-up">
                    <h2 class="text-center mb-5 leading-[1.2]">One App. Endless <span
                            class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-primary-2">Freedom</span>
                    </h2>
                    <p class="text-center">More than a wallet - it's how you pay, save, borrow and explore. Instantly,
                        Securely, Seamlessly.</p>
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
                    <div class="lg:grid lg:grid-cols-7 gap-5 space-y-10 lg:space-y-0" data-aos="zoom-in">
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
                    <div class="rounded-2xl bg-gradient-to-br from-green-200/10 to-green-500/30 lg:grid grid-cols-7"
                        data-aos="zoom-in">
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
                    <div class="lg:grid lg:grid-cols-7 gap-5 space-y-10 lg:space-y-0" data-aos="zoom-in">
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
                                            <img src="{{ Vite::asset('resources/images/chrome-icon.png') }}"
                                                alt="" class="h-4">
                                            <p>Instant Micro-Loans</p>
                                        </div>
                                        <div class="flex items-center">
                                            <img src="{{ Vite::asset('resources/images/chrome-icon.png') }}"
                                                alt="" class="h-4">
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
                    <div class="rounded-2xl bg-gradient-to-br from-purple-200/10 to-purple-500/30 lg:grid grid-cols-7"
                        data-aos="zoom-in">
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
            <div class="custom-container mx-auto  px-5 md:px-10 md:grid md:grid-cols-2">
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
            <div class="custom-container mx-auto  px-5 md:px-10 py-10 md:py-20 grid md:grid-cols-3 gap-5 text-white">
                <div class="bg-white/5 rounded-xl">
                    <div class="p-5 pb-7">
                        <img src="{{ Vite::asset('resources/images/Outbound integrations 1.png') }}" alt=""
                            class="w-full">
                    </div>
                    <div class="mt-10 md:mt-0 p-5 pb-7">
                        <span class="text-sm text-white/30">01-</span>
                        <h5 class="text-base md:text-xl lg:text-2xl">Request Money and Bills with Ease</h5>
                    </div>
                </div>
                <div class="bg-white/5 rounded-xl flex flex-col relative -z-[0]">
                    <div class="p-5 pb-7 relative overflow-hidden">
                        <img src="{{ Vite::asset('resources/images/outbound circle logo.png') }}" alt=""
                            class="w-[90%] -mt-20">
                    </div>
                    <div class="mt-10 md:mt-0 p-5 pb-7">
                        <span class="text-sm text-white/30">02-</span>
                        <h5 class="text-base md:text-xl lg:text-2xl">Smart, Fast, and Borderless Gift Cards</h5>
                    </div>
                </div>
                <div class="bg-white/5 rounded-xl">
                    <div class="p-5 pb-7 relative">
                        <img src="{{ Vite::asset('resources/images/world.png') }}" alt="" class="w-4/5 mx-auto">
                    </div>
                    <div class="mt-10 md:mt-0 p-5 pb-7">
                        <span class="text-sm text-white/30">03-</span>
                        <h5 class="text-base md:text-xl lg:text-2xl">Flights and Hotels, in your Pocket</h5>
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
