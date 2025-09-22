@section('title', 'Virtual USD Cards that Work')
@section('meta_description',
    'Create a secure virtual dollar card in minutes—shop globally, pay subscriptions, and track
    spending in real time with DgnRavePay.')
    <x-guest-layout>
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="capitalize leading-[1.2] text-center mb-5">
                            Spend worldwide, stay secure, with a dollar card that works.
                        </h1>
                        <p class="md:font-[500] md:text-lg lg:text-xl mb-10">Unlock global spending power with DgnRavePay s
                            secure Virtual USD Card
                            shop, subscribe, and pay anywhere with confidence.</p>
                        <div class="">
                            <a href="#"
                                class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                                Start Managing Smarter
                            </a>
                        </div>
                    </div>

                    <img src="{{ Vite::asset('resources/images/woman hand holding phone dark.png') }}"
                        alt="A happy black lady dressed in bright sunny yellow dress happily stretching her hands forward while holding a phone"
                        class="mx-auto h-60 md:h-96 lg:h-[30rem]">
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
                    <h2 class="text-center mb-5 leading-[1.2]">Your Passport to Safe,
                        Smarter
                        Worldwide Spending</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-5 mt-10">
                    <div class="bg-primary rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">A zero maintenance card</h6>
                            <p>Get debited only for your purchases. No maintenance and hidden fees.</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/amount circle.png') }}" alt="" class="w-full">
                    </div>
                    <div class="bg-stone-200 rounded-xl flex flex-col justify-between relative overflow-hidden hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Real-Time Tracking</h6>
                            <p>Get instant notifications, detailed spend insights, and downloadable statements.</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/stats 2.png') }}" alt=""
                            class="h-64 object-cover mx-auto">
                    </div>
                    <div class="bg-stone-900 text-white rounded-xl flex flex-col justify-between relative overflow-hidden hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Global Acceptance</h6>
                            <p>Pay for shopping, subscriptions, travel, and services anywhere USD is accepted.</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/outbound circle logo.png') }}" alt=""
                            class="w-full">
                    </div>
                    <div class="bg-indigo-200 rounded-xl flex flex-col justify-between relative overflow-hidden hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Instant Issuance</h6>
                            <p>Create your card in less than 2 minutes, directly in the DgnRavePay app.</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/world circle cards.png') }}" alt=""
                            class="w-full">
                    </div>
                    <div class="bg-indigo-200 rounded-xl flex flex-col justify-between relative overflow-hidden hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Easy Funding</h6>
                            <p>Top up from your DgnRavePay wallet using Naira, automatically converted to USD.</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/amount notification.png') }}" alt=""
                            class="w-full">
                    </div>
                    <div class="bg-teal-100 rounded-xl flex flex-col justify-between relative overflow-hidden hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Secure & Protected</h6>
                            <p>Freeze/unfreeze instantly, set spending limits, and enjoy advanced fraud detection.</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/safe-box.png') }}" alt="" class="w-full">
                    </div>
                </div>
        </section>

        <!-- Dark Section -->
        <section class="bg-accent-black">
            <div class="custom-container mx-auto  px-5 md:px-10">
                <div class="grid md:grid-cols-7 gap-7 pt-20">
                    <div class="md:col-span-4">
                        <h2 class="text-white mb-5 leading-[1.2]">Why choose
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-slate-200 to-slate-400">DgnRavePay’s
                                virtual dollar</span>
                            Mastercard?
                        </h2>
                        <div class="flex gap-3 text-white font-medium mt-10 flex-wrap whitespace-nowrap">
                            <div
                                class="rounded-full p-2 md:py-3 tex-sm md:text-base bg-white/5 border border-white/10 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 fill-primary stroke-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                </svg>
                                <span>Fund Easily in Naira</span>
                            </div>
                            <div
                                class="rounded-full p-2 md:py-3 tex-sm md:text-base bg-white/5 border border-white/10 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 fill-primary stroke-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                </svg>
                                <span>Multiple Cards, One App</span>
                            </div>
                            <div
                                class="rounded-full p-2 md:py-3 tex-sm md:text-base bg-white/5 border border-white/10 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 fill-primary stroke-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                </svg>
                                <span>Withdraw Back Anytime</span>
                            </div>
                            <div
                                class="rounded-full p-2 md:py-3 tex-sm md:text-base bg-white/5 border border-white/10 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 fill-primary stroke-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                </svg>
                                <span>Smart Spending Insights</span>
                            </div>
                            <div
                                class="rounded-full p-2 md:py-3 tex-sm md:text-base bg-white/5 border border-white/10 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 fill-primary stroke-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                </svg>
                                <span>Real-Time Alerts</span>
                            </div>
                            <div
                                class="rounded-full p-2 md:py-3 tex-sm md:text-base bg-white/5 border border-white/10 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 fill-primary stroke-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                </svg>
                                <span>Merchant Management</span>
                            </div>
                            <div
                                class="rounded-full p-2 md:py-3 tex-sm md:text-base bg-white/5 border border-white/10 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 fill-primary stroke-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                </svg>
                                <span>Advanced Security</span>
                            </div>
                            <div
                                class="rounded-full p-2 md:py-3 tex-sm md:text-base bg-white/5 border border-white/10 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 fill-primary stroke-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                                </svg>
                                <span>Zero Surprise Charges</span>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-3 flex items-end justify-center">
                        <img src="{{ Vite::asset('resources/images/black hand holding card.png') }}" alt=""
                            class="h-60 md:h-96 lg:h-[30rem]">
                    </div>
                </div>
            </div>

            <div class="bg-black/20 -z-[0] overflow-hidden py-20 flex flex-col items-center relative">
                <div
                    class="rounded-xl aspect-square inline-flex items-center justify-center p-3 mb-10 bg-white-/5 border border-white/10">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="DgnRavePay’s Logo"
                        class="h-8 md:h-10">
                </div>
                <h3 class="text-white text-center mb-3 max-w-4xl mx-auto leading-[1]">
                    Stay in control of every payment with your DgnRavePay Dollar Card.
                </h3>
                <div class="mt-10 text-center">
                    <a href="#"
                        class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                        Get Your Card Now
                    </a>
                </div>
                <img src="{{ Vite::asset('resources/images/vector line.svg') }}" alt="vector line"
                    class="absolute blur-[5rem] w-full bottom-30 left-0 -z-[1]">
            </div>
        </section>

        <section class="my-28">
            <div class="custom-container mx-auto px-5 md:px-10 space-y-20 md:space-y-40">
                <!-- TESTIMONIAL -->
                <x-pages.testimonial-section title="Why Smart Users Trust Our Virtual USD Cards"
                    description="From global shopping to streaming subscriptions, see how thousands of people like you are using DgnRavePay cards to spend securely and without borders." />
                <!-- FAQ -->
                <x-pages.faq-section title="Everything About Your Virtual USD Card, Made Simple"
                    description="We've answered the most common questions so you can get started with confidence no hidden fees, no confusion, just clarity." />
            </div>
        </section>
    </x-guest-layout>
