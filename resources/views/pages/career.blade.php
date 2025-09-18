@section('title', 'Careers at DgnRavePay')
@section('meta_description',
    'Join a mission-driven fintech building trusted payments, savings, and global access—see
    open roles and our culture.')
    <x-guest-layout>
        <section class="pt-28 pb-20 relative">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1
                            class="capitalize leading-[1.2] mb-5 text-center text-5xl md:text-6xl lg:text-[74px] bg-clip-text text-transparent bg-gradient-to-r from-black to-primary">
                            Build the Future of Finance With Us.
                        </h1>
                        <p class="font-medium text-base md:text-lg">We’re not just building financial technology, we’re
                            creating opportunities for millions of
                            people. Join a team where your impact goes beyond work.
                        </p>
                        <div class="flex flex-col md:flex-row items-center justify-center gap-3 mt-10">
                            <a href="#"
                                class="w-full md:w-auto bg-primary text-white py-3 px-4 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                                Explore Opportunities
                            </a>
                            <a href="#"
                                class="bg-primary/5 w-full md:w-auto px-4 py-4 rounded-xl border border-primary-2 hover:bg-amber-100 transition-all">Discover
                                Our Culture</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <img src="{{ Vite::asset('resources/images/vector line.svg') }}" alt="vector line"
                    class="absolute -z-[10] blur-[5rem] opacity-50 w-full bottom-16 left-0">
            </div>
        </section>
        <section class="pb-20">
            <div class="custom-container mx-auto  px-5 md:px-10 py-10">
                <div class="md:grid md:grid-cols-2 md:items-center justify-between">
                    <h2 class="mb-3 leading-[1.2]">Don’t Just Work. Disrupt.
                        Redefine Fintech with
                        DgnRavePay.</h2>
                    <p class="md:font-medium text-base md:text-lg">We’re on a mission to break barriers in
                        digital payments,
                        savings, and global financial access. At DgnRavePay,
                        you’re not hired to fit in you’re here to stand out. Build
                        revolutionary products, grow in a culture that thrives on
                        bold ideas, and make history with us.</p>
                </div>
            </div>
            <x-enlarging-img />
        </section>

        <section class="py-20 bg-slate-200">
            <div class="custom-container mx-auto  px-5 md:px-10 py-10">
                <div class="lg:grid lg:grid-cols-2 space-y-10 lg:space-y-0">
                    <div class="">
                        <h2 class="mb-3 leading-[1] sticky top-32">Our core values</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-5">
                        <article class="rounded-xl bg-gradient-to-br from-amber-50 to-amber-200 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">001</span>
                                <h6 class="font-bold text-base md:text-lg">Innovation with Purpose</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/innovation.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-fuchsia-50 to-fuchsia-200 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">002</span>
                                <h6 class="font-bold text-base md:text-lg">Trust and Integrity</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/trust.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-violet-50 to-violet-200 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">003</span>
                                <h6 class="font-bold text-base md:text-lg">Excellence at Scale</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/excellence.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-sky-50 to-sky-200 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">004</span>
                                <h6 class="font-bold text-base md:text-lg">Empowerment & Inclusion</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/empowerment.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-stone-50 to-stone-200 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">005</span>
                                <h6 class="font-bold text-base md:text-lg">Empowerment & Inclusion</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/innovation.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-lime-50 to-lime-200 overflow-hidden">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">006</span>
                                <h6 class="font-bold text-base md:text-lg">Sustainable Growth</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/growth.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20">
            <div class="custom-container mx-auto  px-5 md:px-10 py-10">
                <div class="lg:grid lg:grid-cols-2 space-y-10 lg:space-y-0">
                    <div class="">
                        <h2 class="mb-3 leading-[1] sticky top-32">Perks we enjoy</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-5">
                        <article class="rounded-xl bg-gradient-to-br from-rose-50 to-rose-200">
                            <div class="p-5 md:p-7">
                                <img src="{{ Vite::asset('resources/images/competitive.png') }}" alt=""
                                    class="h-16 md:h-24 lg:h-32 mb-5">
                                <h6 class="font-bold text-lg md:text-lg">Competitive Pay & Performance Bonuses</h6>
                                <span class="text-base md:text-sm">Earn industry leading compensation with
                                    performance driven bonuses that reward your impact in shaping Africa’s financial future.
                                </span>
                            </div>
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-cyan-50 to-cyan-200">
                            <div class="p-5 md:p-7">
                                <img src="{{ Vite::asset('resources/images/health.png') }}" alt=""
                                    class="h-16 md:h-24 lg:h-32 mb-5">
                                <h6 class="font-bold text-lg md:text-lg">Health & Family Support</h6>
                                <span class="text-base md:text-sm">Stay protected with robust health insurance covering you
                                    and your dependents, plus wellness programs tailored for balance and peace of mind.
                                </span>
                            </div>
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-amber-50 to-amber-200">
                            <div class="p-5 md:p-7">
                                <img src="{{ Vite::asset('resources/images/learning.png') }}" alt=""
                                    class="h-16 md:h-24 lg:h-32 mb-5">
                                <h6 class="font-bold text-lg md:text-lg">Learning & Career Growth</h6>
                                <span class="text-base md:text-sm">Level up with access to global fintech courses, sponsored
                                    certifications, leadership tracks, and mentorship programs to help you grow faster.
                                </span>
                            </div>
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-lime-50 to-lime-200">
                            <div class="p-5 md:p-7">
                                <img src="{{ Vite::asset('resources/images/flexible.png') }}" alt=""
                                    class="h-16 md:h-24 lg:h-32 mb-5">
                                <h6 class="font-bold text-lg md:text-lg">Flexible & Hybrid Work</h6>
                                <span class="text-base md:text-sm">Level up with access to global fintech
                                    courses, sponsored certifications, leadership tracks, and mentorship programs to help
                                    you grow faster.
                                </span>
                            </div>
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-teal-50 to-teal-200">
                            <div class="p-5 md:p-7">
                                <img src="{{ Vite::asset('resources/images/lifestyle.png') }}" alt=""
                                    class="h-16 md:h-24 lg:h-32 mb-5">
                                <h6 class="font-bold text-lg md:text-lg">Lifestyle & Team Culture</h6>
                                <span class="text-base md:text-sm">Enjoy vibrant team retreats, hackathons,
                                    and cultural events that keep work
                                    exciting while fostering a sense of
                                    belonging.
                                </span>
                            </div>
                        </article>
                        <article class="rounded-xl bg-gradient-to-br from-violet-50 to-violet-200">
                            <div class="p-5 md:p-7">
                                <img src="{{ Vite::asset('resources/images/exclusive.png') }}" alt=""
                                    class="h-16 md:h-24 lg:h-32 mb-5">
                                <h6 class="font-bold text-lg md:text-lg">Exclusive Financial Perks</h6>
                                <span class="text-base md:text-sm">Benefit from staff loans, savings
                                    schemes, discounted bill payments, and early access to DgnRavePay’s newest financial
                                    products.
                                </span>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- Available roles -->
        <section class="py-20 bg-slate-200">
            <div class="custom-container mx-auto  px-5 md:px-10 py-10">
                <div class="mb-10 px-5 md:px-10">
                    <h2 class="mb-3 leading-[1] text-center">
                        Your Next Big Career Move Starts Here
                    </h2>
                    <p class="text-center">
                        Come join a team that s redefining the financial experience for millions of people in emerging
                        markets.
                    </p>
                </div>
                <div
                    class="py-6 px-6 rounded-xl bg-white text-slate-600 space-y-3 md:space-y-0 md:flex md:items-center md:gap-3">
                    <div
                        class="flex items-center bg-slate-200 rounded-lg border border-gray-300 px-4 gap-2 w-full lg:w-[140%]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 stroke-slate-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <input type="text" class="py-3 w-full border-none focus:ring-0 focus:outline-0 bg-transparent">
                    </div>
                    <select
                        class="flex items-center bg-slate-200 rounded-lg border border-gray-300 px-4 gap-2 py-3 w-full">
                        <option class="py-3 w-full border-none focus:outline-0">All</option>
                    </select>
                    <select
                        class="flex items-center bg-slate-200 rounded-lg border border-gray-300 px-4 gap-2 py-3 w-full">
                        <option class="py-3 w-full border-none focus:outline-0">All</option>
                    </select>
                    <button class="bg-blue-600 rounded-lg text-white py-3 px-6">Search</button>
                </div>
                <div class="mt-10">
                    <!-- Header: Available Roles + badge -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <h3 class="font-bold text-gray-800">Available Roles</h3>
                            <span
                                class="inline-flex items-center justify-center text-xs font-semibold bg-yellow-400 text-gray-900 px-2 py-1 rounded-full shadow-sm">93</span>
                        </div>
                    </div>

                    <!-- Rounded custom-container -->
                    <div class="rounded-2xl overflow-hidden bg-red-100">
                        <!-- Inner padding area -->
                        <div class="p-6">
                            <!-- Column headings row -->
                            <div class="hidden md:grid grid-cols-12 gap-4 items-center mb-4 text-xs text-gray-500 px-1">
                                <div class="col-span-5 font-semibold">Role</div>
                                <div class="col-span-4 font-semibold">Team</div>
                                <div class="col-span-2 font-semibold">Office</div>
                                <div class="col-span-1"></div>
                            </div>

                            <!-- List -->
                            <div class="space-y-4 h-88 md:h-[20rem] lg:h-[30rem] overflow-y-auto minimal-scrollbar">
                                <a href="/career/admin-officer" class="block">
                                    <div
                                        class="bg-white rounded-lg shadow-sm px-4 py-3 md:grid md:grid-cols-12 md:items-center hover:shadow-md transition-shadow">
                                        <div class="md:col-span-5">
                                            <div class="text-sm font-semibold text-gray-800">Admin Officer (Kano)</div>
                                        </div>
                                        <div class="md:col-span-4 mt-2 md:mt-0">
                                            <div class="text-xs text-gray-500 md:text-sm">People Operations</div>
                                        </div>
                                        <div class="md:col-span-2 mt-2 md:mt-0">
                                            <div class="flex items-center gap-2 text-xs text-gray-600 md:text-sm">
                                                <span>Kano, Nigeria</span>
                                                <!-- small round flag-like dot (uses emoji) -->
                                                <span class="text-base"><img
                                                        src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                                        alt="Nigerian flag" class="h-4"></span>
                                            </div>
                                        </div>
                                        <div class="md:col-span-1 flex justify-end mt-2 md:mt-0">
                                            <div class="w-8 h-8 flex items-center justify-center rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="/career/business-development-executive" class="block">
                                    <div
                                        class="bg-white rounded-lg shadow-sm px-4 py-3 md:grid md:grid-cols-12 md:items-center hover:shadow-md transition-shadow">
                                        <div class="md:col-span-5">
                                            <div class="text-sm font-semibold text-gray-800">Business Development Executive
                                            </div>
                                        </div>
                                        <div class="md:col-span-4 mt-2 md:mt-0">
                                            <div class="text-xs text-gray-500 md:text-sm">Enterprise Sales</div>
                                        </div>
                                        <div class="md:col-span-2 mt-2 md:mt-0">
                                            <div class="flex items-center gap-2 text-xs text-gray-600 md:text-sm">
                                                <span>Lagos, Nigeria</span>
                                                <span class="text-base"><img
                                                        src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                                        alt="Nigerian flag" class="h-4"></span>
                                            </div>
                                        </div>
                                        <div class="md:col-span-1 flex justify-end mt-2 md:mt-0">
                                            <div class="w-8 h-8 flex items-center justify-center rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="block">
                                    <div
                                        class="bg-white rounded-lg shadow-sm px-4 py-3 md:grid md:grid-cols-12 md:items-center hover:shadow-md transition-shadow">
                                        <div class="md:col-span-5">
                                            <div class="text-sm font-semibold text-gray-800">Business Relationship Manager
                                                (Abuja)
                                            </div>
                                        </div>
                                        <div class="md:col-span-4 mt-2 md:mt-0">
                                            <div class="text-xs text-gray-500 md:text-sm">Enterprise Sales</div>
                                        </div>
                                        <div class="md:col-span-2 mt-2 md:mt-0">
                                            <div class="flex items-center gap-2 text-xs text-gray-600 md:text-sm">
                                                <span>FCT, Nigeria</span>
                                                <span class="text-base"><img
                                                        src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                                        alt="Nigerian flag" class="h-4"></span>
                                            </div>
                                        </div>
                                        <div class="md:col-span-1 flex justify-end mt-2 md:mt-0">
                                            <div class="w-8 h-8 flex items-center justify-center rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="block">
                                    <div
                                        class="bg-white rounded-lg shadow-sm px-4 py-3 md:grid md:grid-cols-12 md:items-center hover:shadow-md transition-shadow">
                                        <div class="md:col-span-5">
                                            <div class="text-sm font-semibold text-gray-800">Business Relationship Manager
                                                (Anambra)
                                            </div>
                                        </div>
                                        <div class="md:col-span-4 mt-2 md:mt-0">
                                            <div class="text-xs text-gray-500 md:text-sm">Enterprise Sales</div>
                                        </div>
                                        <div class="md:col-span-2 mt-2 md:mt-0">
                                            <div class="flex items-center gap-2 text-xs text-gray-600 md:text-sm">
                                                <span>Remote, Nigeria</span>
                                                <span class="text-base"><img
                                                        src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                                        alt="Nigerian flag" class="h-4"></span>
                                            </div>
                                        </div>
                                        <div class="md:col-span-1 flex justify-end mt-2 md:mt-0">
                                            <div class="w-8 h-8 flex items-center justify-center rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="block">
                                    <div
                                        class="bg-white rounded-lg shadow-sm px-4 py-3 md:grid md:grid-cols-12 md:items-center hover:shadow-md transition-shadow">
                                        <div class="md:col-span-5">
                                            <div class="text-sm font-semibold text-gray-800">Business Relationship Manager
                                                (Benue)
                                            </div>
                                        </div>
                                        <div class="md:col-span-4 mt-2 md:mt-0">
                                            <div class="text-xs text-gray-500 md:text-sm">Enterprise Sales</div>
                                        </div>
                                        <div class="md:col-span-2 mt-2 md:mt-0">
                                            <div class="flex items-center gap-2 text-xs text-gray-600 md:text-sm">
                                                <span>Benue, Nigeria</span>
                                                <span class="text-base"><img
                                                        src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                                        alt="Nigerian flag" class="h-4"></span>
                                            </div>
                                        </div>
                                        <div class="md:col-span-1 flex justify-end mt-2 md:mt-0">
                                            <div class="w-8 h-8 flex items-center justify-center rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="block">
                                    <div
                                        class="bg-white rounded-lg shadow-sm px-4 py-3 md:grid md:grid-cols-12 md:items-center hover:shadow-md transition-shadow">
                                        <div class="md:col-span-5">
                                            <div class="text-sm font-semibold text-gray-800">Business Relationship Manager
                                                (Borno)
                                            </div>
                                        </div>
                                        <div class="md:col-span-4 mt-2 md:mt-0">
                                            <div class="text-xs text-gray-500 md:text-sm">Enterprise Sales</div>
                                        </div>
                                        <div class="md:col-span-2 mt-2 md:mt-0">
                                            <div class="flex items-center gap-2 text-xs text-gray-600 md:text-sm">
                                                <span>Borno, Nigeria</span>
                                                <span class="text-base"><img
                                                        src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                                        alt="Nigerian flag" class="h-4"></span>
                                            </div>
                                        </div>
                                        <div class="md:col-span-1 flex justify-end mt-2 md:mt-0">
                                            <div class="w-8 h-8 flex items-center justify-center rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="block">
                                    <div
                                        class="bg-white rounded-lg shadow-sm px-4 py-3 md:grid md:grid-cols-12 md:items-center hover:shadow-md transition-shadow">
                                        <div class="md:col-span-5">
                                            <div class="text-sm font-semibold text-gray-800">Business Relationship Manager
                                                (Lagos)
                                            </div>
                                        </div>
                                        <div class="md:col-span-4 mt-2 md:mt-0">
                                            <div class="text-xs text-gray-500 md:text-sm">Enterprise Sales</div>
                                        </div>
                                        <div class="md:col-span-2 mt-2 md:mt-0">
                                            <div class="flex items-center gap-2 text-xs text-gray-600 md:text-sm">
                                                <span>Lagos, Nigeria</span>
                                                <span class="text-base"><img
                                                        src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                                        alt="Nigerian flag" class="h-4"></span>
                                            </div>
                                        </div>
                                        <div class="md:col-span-1 flex justify-end mt-2 md:mt-0">
                                            <div class="w-8 h-8 flex items-center justify-center rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dark Section -->
        <section class="bg-accent-black">
            <div class="custom-container mx-auto  px-5 md:px-10">
                <div class="py-20 md:pt-28 flex flex-col justify-center text-center">
                    <h2 class="text-white mb-5 leading-[1]">We’re just getting started
                    </h2>
                    <p class="text-white">
                        There’s so much we have to accomplish. Here are a few milestones we’ve crossed so far
                    </p>
                </div>
                <div class="text-center grid md:grid-cols-4 gap-5 border-t border-white/50 p-10">
                    <div class="text-neutral-200 p-10">
                        <h6
                            class="text-4xl font-bold text-transparent bg-gradient-to-br from-neutral-100 to-neutral-700 bg-clip-text">
                            4.7</h6>
                        <span class="uppercase text-xs md:text-sm">Stars on App stores</span>
                    </div>
                    <div class="text-neutral-200 p-10">
                        <h6
                            class="text-4xl font-bold text-transparent bg-gradient-to-br from-neutral-100 to-neutral-700 bg-clip-text">
                            2M+</h6>
                        <span class="uppercase text-xs md:text-sm">REGISTERED USERS</span>
                    </div>
                    <div class="text-neutral-200 p-10">
                        <h6
                            class="text-4xl font-bold text-transparent bg-gradient-to-br from-neutral-100 to-neutral-700 bg-clip-text">
                            500,000+</h6>
                        <span class="uppercase text-xs md:text-sm">Micro business users</span>
                    </div>
                    <div class="text-neutral-200 p-10">
                        <h6
                            class="text-4xl font-bold text-transparent bg-gradient-to-br from-neutral-100 to-neutral-700 bg-clip-text">
                            100+</h6>
                        <span class="uppercase text-xs md:text-sm">employees</span>
                    </div>
                </div>
            </div>
        </section>
    </x-guest-layout>
