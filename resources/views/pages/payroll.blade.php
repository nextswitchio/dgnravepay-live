@section('title', 'Pay your team. On time. Every time')
@section('meta_description',
    'Automate payroll, manage deductions, taxes, and payslips all inside DgnRavePay Business
    Suite.')

    @php
        $attrs = [
            'Employee Salary Management',
            'Allowances & Deductions',
            'Payslips & Reports',
            'Integration with DgnRavePay Wallet',
            'Multi-Branch Payroll Support',
            'Compliance Automation',
        ];
    @endphp

    <x-guest-layout>
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="capitalize text-center mb-5">
                            Pay your team. On time. Every time
                        </h1>
                        <p class="md:font-[500] md:text-lg lg:text-xl mb-10">Automate payroll, manage deductions, taxes, and
                            payslips all inside DgnRavePay Business Suite.</p>
                        <div class="">
                            <a href="https://app.dgnravepay.com/register"
                                class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                                Create Your Business Account
                            </a>
                        </div>
                    </div>

                    <img src="{{ Vite::asset('resources/images/payroll-man.png') }}"
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
                    <h2 class="text-left mb-5">Payroll shouldn’t be stressful</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-5 mt-10">
                    <div class="bg-primary rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Automated Salary Payments</h6>
                            <p>Process hundreds of payments in minutes</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/sync.png') }}" alt=""
                            class="w-3/5 mx-auto mb-10">
                    </div>
                    <div class="bg-stone-200 rounded-xl flex flex-col justify-between relative overflow-hidden hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Payslips & Reports</h6>
                            <p>Generate and share digital payslips instantly.</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/reports.png') }}" alt=""
                            class="w-3/5 mx-auto mb-10">
                    </div>
                    <div class="bg-stone-900 text-white rounded-xl flex flex-col justify-between relative overflow-hidden hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Taxes, Deductions & Deductions</h6>
                            <p class="text-stone-200">Handle PAYE, pensions, and benefits effortlessly.</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/circle-percentage.png') }}" alt=""
                            class="w-3/5 mx-auto mb-10">
                    </div>
                </div>
        </section>

        <!-- Dark Section -->
        <section class="bg-accent-black relative -z-[0]">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="POS Image"
                class="w-52 md:w-80 absolute top-0 left-0 opacity-30 -z-[1]">
            <div class="custom-container mx-auto  px-5 md:px-10 pt-20 md:pt-28">
                <div class="text-center text-white">
                    <h2 class="text-white mb-5">
                        Everything you need for seamless payroll in one platform
                    </h2>
                </div>
                <div class="flex justify-center gap-3 text-white font-medium mt-10 flex-wrap whitespace-nowrap">
                    @foreach ($attrs as $attr)
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
                <img src="{{ Vite::asset('resources/images/hand-phone-payroll.png') }}" alt="POS Image"
                    class="mx-auto mt-10 w-2xl pl-40 md:pl-52">
            </div>
        </section>

        <section class="my-28 custom-container mx-auto px-5 md:px-10 space-y-20 md:space-y-40">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div class="">
                    <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-5">Automate Salary Disbursements</h4>
                    <p class="">Upload your payroll sheet or sync employees directly payments happen instantly and
                        securely.</p>
                </div>
                <img src="{{ Vite::asset('resources/images/automate-salary.png') }}" alt="vector line" class="w-full" />
            </div>
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div class="lg:order-2">
                    <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-5">Generate Digital Payslips</h4>
                    <p class="">One click, branded payslips emailed to staff or downloaded in bulk.</p>
                </div>
                <img src="{{ Vite::asset('resources/images/generate-payslips.png') }}" alt="vector line" class="w-full" />
            </div>
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div class="">
                    <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-5">Handle Taxes & Deductions Automatically
                    </h4>
                    <p class="">Never miss compliance. PAYE, pension, and NHF handled automatically.</p>
                </div>
                <img src="{{ Vite::asset('resources/images/handle-taxes.png') }}" alt="vector line" class="w-full" />
            </div>
        </section>

        <section class="my-28">
            <div class="custom-container mx-auto px-5 md:px-10 space-y-20 md:space-y-40">
                <!-- TESTIMONIAL -->
                <x-pages.testimonial-section title="Why Smart Users Trust Our Virtual USD Cards"
                    description="From global shopping to streaming subscriptions, see how thousands of people like you are using DgnRavePay cards to spend securely and without borders."
                    page="payroll" />
                <!-- FAQ -->
                <x-pages.faq-section title="Everything About Your Virtual USD Card, Made Simple"
                    description="We've answered the most common questions so you can get started with confidence no hidden fees, no confusion, just clarity."
                    page="payroll" />
            </div>
        </section>
    </x-guest-layout>
