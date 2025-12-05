@section('title', 'Loan')
@section('meta_description',
    'Access business and personal loans tailored to your needs with competitive rates and
    flexible repayment options.')

    @php
        $pos_attrs = [
            'Flexible loan amounts & tenures',
            'Instant credit decision & disbursal',
            'Transparent interest & fees breakdown',
            'Support for multi-business owners (business loan)',
            'Salary advance capability (salary loan)',
            'Easy early-repayment option',
            'Car-loan specific: vehicle registration support, collateral optional',
            'Instant credit decision & disbursal',
            'Transparent interest & fees breakdown',
        ];

        $cards = [
            [
                'category' => 'BUSINESS LOAN',
                'title' => 'Fuel Your Growth With Smart Business Funding',
                'description' =>
                    'Scale operations, restock inventory, or expand your branch network all without disrupting your cash flow. ',
                'image' => 'resources/images/loan-card-image.jpg',
                'bg-color' => 'to-indigo-200',
                'list' => [
                    'Access up to ₦10 million with flexible tenures.',
                    'Integrated with your DgnRavePay POS, Wallet, and Analytics.',
                    'Quick eligibility check using your business account data.',
                ],
            ],
            [
                'category' => 'SALARY LOAN',
                'title' => 'Instant Salary Support When You Need It',
                'description' => 'Handle emergencies, school fees, or personal expenses with confidence. ',
                'image' => 'resources/images/loan-woman-money.jpg',
                'bg-color' => 'to-amber-200',
                'list' => [
                    'Get up to 70% of your monthly income.',
                    'Approval tied to verified payroll data',
                    'Instant credit to your DgnRavePay wallet',
                    'Zero paperwork, fully digital process.',
                ],
            ],
            [
                'category' => 'CAR LOAN',
                'title' => 'Own The Car You’ve Been Dreaming Of',
                'description' =>
                    'Whether for personal comfort or business mobility, DgnRavePay Car Loan gets you behind the wheel with flexible repayment plans and clear ownership terms no hidden fees.',
                'image' => 'resources/images/loan-woman-key.jpg',
                'bg-color' => 'to-teal-200',
                'list' => [
                    'Finance up to 80% of your vehicle cost.',
                    'Optional collateral or guarantor system.',
                    'Get registration and insurance assistance.',
                    'Track loan health directly in-app.',
                ],
            ],
        ];
    @endphp
    <x-guest-layout>
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="capitalize mb-5 text-center">
                            Access the funds you need. When you need them
                        </h1>
                        <p class="md:font-[500] md:text-lg lg:text-xl mb-10">Business, salary, or car loan one platform,
                            instant approval, seamless disbursal.</p>
                        <div class="">
                            <a href="https://app.dgnravepay.com/register"
                                class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                                Apply in 2 minutes
                            </a>
                        </div>
                    </div>

                    <div class="mt-20">
                        <img src="{{ Vite::asset('resources/images/happy-young-woman.png') }}" alt=""
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
                        Loans should empower not restrict</h2>
                    <div class="grid md:grid-cols-3 gap-5 mt-10">
                        <div class="bg-primary rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1"> Instant Access</h6>
                                <p>Loans disbursed in minutes.</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/instant_access.png') }}" alt=""
                                class="w-full">
                        </div>
                        <div class="bg-secondary/50 rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Flexible Repayment</h6>
                                <p>Pay back on your terms</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/sync_colored.png') }}" alt=""
                                class="mx-auto w-4/5 mb-2">
                        </div>
                        <div class="bg-stone-950 rounded-xl text-white flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Transparent</h6>
                                <p>No hidden fees, clear interest</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/amount circle-orange.png') }}" alt=""
                                class="w-full">
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
                        Features built for your success.
                    </h2>
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
                <img src="{{ Vite::asset('resources/images/hand-white.png') }}" alt="POS Image" class="mx-auto mt-10 w-2xl">
                <div class="mt-20 space-y-10">
                    <!-- Card 1 -->
                    @foreach ($cards as $card)
                        <div class="rounded-2xl bg-gradient-to-br from-white {{ $card['bg-color'] }} lg:grid grid-cols-2 hover:!scale-[1.02] transition-transform"
                            @ data-aos="zoom-in">
                            <div class="px-5 md:px-10 py-7 md:py-10">
                                <div>
                                    <h6 class="uppercase text-xs text-blue-500">{{ $card['category'] }}</h6>
                                    <div class="mt-6 lg:mt-8">
                                        <div>
                                            <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-3">
                                                {{ $card['title'] }}</h4>
                                            <p>{{ $card['description'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <ul class="mt-10 space-y-2">
                                    @foreach ($card['list'] as $list)
                                        <li class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" class="text-primary"
                                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <span>{{ $list }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="p-5 md:p-10">
                                <img src="{{ Vite::asset($card['image']) }}" alt="{{ $card['title'] }}"
                                    class="w-full h-full object-cover rounded-2xl">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="my-20">
            <div class="custom-container mx-auto  px-5 md:px-10 space-y-20 md:space-y-40">
                <!-- TESTIMONIAL -->
                <x-pages.testimonial-section page="loan" />
                <!-- FAQ -->
                <x-pages.faq-section page="loan" />
            </div>

        </section>

    </x-guest-layout>
