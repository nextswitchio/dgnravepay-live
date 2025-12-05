@section('title', 'Manage Your Entire Business Effortlessly, in One Place')
@section('meta_description',
    'Join the all-in-one business management platform built for Nigerian SMEs, scalable teams
    and multi-unit operators.')

    @php
        $attrs = [
            'Multiple business accounts & switcher',
            'Employee & user management',
            'Roles & permissions builder',
            'Approval workflows (expense, payment, invoice)',
            'Departments & categories setup',
            'Integrated with wallet, POS, invoicing',
        ];
    @endphp

    <x-guest-layout>
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="capitalize text-center mb-5">
                            Manage Your Entire Business Effortlessly, in One Place
                        </h1>
                        <p class="md:font-[500] md:text-lg lg:text-xl mb-10">Join the all-in-one business management platform
                            built for Nigerian SMEs, scalable teams and multi-unit operators.</p>
                        <div class="">
                            <a href="https://app.dgnravepay.com/register"
                                class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                                Create Your Business Account
                            </a>
                        </div>
                    </div>

                    <img src="{{ Vite::asset('resources/images/lady-saying-yes-with-phone.png') }}"
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
                    <h2 class="text-left mb-5">Simplify how you manage multiple businesses & team</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-5 mt-10">
                    <div class="bg-primary rounded-xl flex flex-col justify-between hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Switch between businesses instantly</h6>
                            <p>One dashboard, many enterprises</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/amount circle.png') }}" alt="" class="w-full">
                    </div>
                    <div class="bg-stone-200 rounded-xl flex flex-col justify-between relative overflow-hidden hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Define roles & permissions with ease</h6>
                            <p>Keep control, delegate confidently</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/stats 2.png') }}" alt="" class="w-full">
                    </div>
                    <div class="bg-stone-900 text-white rounded-xl flex flex-col justify-between relative overflow-hidden hover:!scale-[1.02] transition-transform"
                        data-aos="fade-up">
                        <div class="px-4 py-5 md:px-5 md:py-6">
                            <h6 class="font-bold text-xl md:text-2xl mb-1">Automate approvals and structure workflows</h6>
                            <p> Stay compliant, save time</p>
                        </div>
                        <img src="{{ Vite::asset('resources/images/outbound circle logo.png') }}" alt=""
                            class="w-full">
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
                        What you get with DgnRavePay Business Management
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
                <img src="{{ Vite::asset('resources/images/hand-phone-business-management.png') }}" alt="POS Image"
                    class="mx-auto mt-10 w-2xl pl-40 md:pl-52">
            </div>
        </section>

        <section class="my-28 custom-container mx-auto px-5 md:px-10 space-y-20 md:space-y-40">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div class="">
                    <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-5">Manage Multiple Businesses</h4>
                    <p class="">Add all your business units. Give each its own brand, team, and limits but manage
                        everything from one login.</p>
                </div>
                <img src="{{ Vite::asset('resources/images/business-accounts.png') }}" alt="vector line" class="w-full" />
            </div>
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div class="lg:order-2">
                    <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-5">Team, Roles & Permissions</h4>
                    <p class="">Bring your people onboard, assign roles, define permissions so everybody sees only
                        what they need to</p>
                </div>
                <img src="{{ Vite::asset('resources/images/roles-permissions.png') }}" alt="vector line" class="w-full" />
            </div>
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div class="">
                    <h4 class="text-xl md:text-2xl lg:text-[48px] font-bold mb-5">Approvals & Workflows</h4>
                    <p class="">Set up approval flows for payments, invoices, budgets automate steps and keep
                        accountability.</p>
                </div>
                <img src="{{ Vite::asset('resources/images/approvals-workflows.png') }}" alt="vector line"
                    class="w-full" />
            </div>
        </section>

        <section class="my-28">
            <div class="custom-container mx-auto px-5 md:px-10 space-y-20 md:space-y-40">
                <!-- TESTIMONIAL -->
                <x-pages.testimonial-section title="Why Smart Users Trust Our Virtual USD Cards"
                    description="From global shopping to streaming subscriptions, see how thousands of people like you are using DgnRavePay cards to spend securely and without borders." page="business-management" />
                <!-- FAQ -->
                <x-pages.faq-section title="Everything About Your Virtual USD Card, Made Simple"
                    description="We've answered the most common questions so you can get started with confidence no hidden fees, no confusion, just clarity." page="business-management" />
            </div>
        </section>
    </x-guest-layout>
