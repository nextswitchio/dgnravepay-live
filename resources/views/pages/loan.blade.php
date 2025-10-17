@section('title', 'Loan')
@section('meta_description',
    'Access business and personal loans tailored to your needs with competitive rates and flexible repayment options.')
    <x-guest-layout>
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="capitalize mb-5 text-center">
                            Loan
                        </h1>
                        <p class="md:font-[500] md:text-lg lg:text-xl mb-10">Flexible personal and business loans with fast
                            approval and clear repayment plans.</p>
                        <div class="">
                            <a href="#"
                                class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                                Apply for a Loan
                            </a>
                        </div>
                    </div>

                    <div class="mt-20">
                        <img src="{{ Vite::asset('resources/images/loan.png') }}" alt=""
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
                        Loan options that suit your goals</h2>
                    <div class="grid md:grid-cols-3 gap-5 mt-10">
                        <div class="bg-primary rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Quick Approval</h6>
                                <p>Get timely decisions with minimal paperwork so you can focus on growth.</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/loan.png') }}" alt="" class="w-4/5">
                        </div>
                        <div class="bg-secondary/50 rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Flexible Terms</h6>
                                <p>Choose repayment plans that match your cashflow and business cycle.</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/hand money save.png') }}" alt=""
                                class="ml-auto w-[70%]">
                        </div>
                        <div class="bg-stone-950 rounded-xl text-white flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                            data-aos="fade-up">
                            <div class="px-4 py-5 md:px-5 md:py-6">
                                <h6 class="font-bold text-xl md:text-2xl mb-1">Transparent Fees</h6>
                                <p>Clear, upfront fees and terms so you can plan with confidence.</p>
                            </div>
                            <img src="{{ Vite::asset('resources/images/graph-up.png') }}" alt=""
                                class="mx-auto w-4/5">
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
