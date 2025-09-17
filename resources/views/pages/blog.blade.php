<x-guest-layout>
    <section class="relative">
        <div class="pt-20 md:pt-32 lg:pt-40">
            <div class="container mx-auto  px-5 md:px-10 md:grid md:grid-cols-5 md:gap-5">
                <div class="md:col-span-3">
                    <span class="uppercase text-xs md:text-sm">STAY UP TO DATE</span>
                    <h1
                        class="mt-5 capitalize leading-[1.2] mb-5 bg-clip-text text-transparent bg-gradient-to-r from-black to-primary">
                        The DgnRavePay Blog
                    </h1>
                    <p class="text-base md:text-lg">Dive into our latest product updates, user interviews, finance tips,
                        and
                        strategic insights from the Grey team.
                    </p>
                    <div class="flex flex-col md:flex-row items-center gap-3 mt-10">
                        <input type="text"
                            class="bg-primary/5 w-full md:w-80 px-3 py-3 rounded-xl border border-primary-2 focus:outline-0"
                            placeholder="Search for an Article">
                        <button
                            class="block w-full md:w-auto bg-primary text-white py-2 px-4 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg">
                            Search
                        </button>
                    </div>
                </div>
                <div class="md:col-span-2 flex flex-col items-end mt-10 md:mt-0">
                    <img src="{{ Vite::asset('resources/images/woman hand holding phone dark.png') }}" alt=""
                        class="h-80 md:h-96 lg:h-[33rem] mx-auto">
                </div>
            </div>
        </div>
        <div class="">
            <img src="{{ Vite::asset('resources/images/vector line.svg') }}" alt="vector line"
                class="absolute -z-[10] blur-[5rem] opacity-50 w-full bottom-16 left-0">
        </div>
    </section>
    <section class="bg-stone-200 py-20">
        <div class="container mx-auto  px-5 md:px-10 py-10">
            <h6 class="uppercase text-xs md:text-sm">Featured Articles</h6>
            <div class="mt-5 md:mt-10">
                <article class="bg-white rounded-xl p-3">
                    <div class="bg-primary-3 rounded-lg md:grid-cols-5 md:grid">
                        <div class="md:col-span-3 px-5 md:px-7 py-10 md:py-14">
                            <div class="bg-primary rounded-full uppercase mb-5 inline-block px-3 md:px-4 py-2 md:py-3">
                                New Feature</div>
                            <h2 class="text-white mb-5 leading-[1.5]">Why choose
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-slate-200 to-slate-400">DgnRavePay’s
                                    virtual dollar</span>
                                Mastercard?
                            </h2>
                        </div>
                        <div class="md:col-span-2 flex items-end justify-center overflow-hidden relative">
                            <img src="{{ Vite::asset('resources/images/black hand holding card.png') }}" alt=""
                                class="h-[120%] -rotate-[20deg] absolute -bottom-10">
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="mb-3 leading-[1]">
                            The Smarter Way to Spend Online: DgnRavePay’s Virtual Dollar Mastercard
                        </h3>
                        <p>From international shopping to subscriptions, here’s why our card keeps you ahead.</p>
                        <div class="flex items-center gap-2 mt-10">
                            <img src="{{ Vite::asset('resources/images/profile.jpg') }}" alt="Author's picture"
                                class="w-10 rounded-full">
                            <p class="text-stone-500 uppercase text-sm md:text-base">Toluwani Omotesho</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- News -->
    <section class="my-28">
        <div class="container mx-auto  px-5 md:px-10">
            <h6 class="uppercase text-xs md:text-sm">Featured Articles</h6>
            <div class="mt-5 md:mt-10">
                <div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                        <article class="space-y-2">
                            <a href="/blog/fx-saving-strategies-every-freelancer-in-indonesia-should-know">
                                <img src="{{ Vite::asset('resources/images/article 1.jpg') }}" alt=""
                                    class="aspect-video rounded-xl object-cover w-full mb-4">
                                <h6 class="font-bold text-lg md:text-xl mb-2">FX-saving strategies every freelancer in
                                    Indonesia should
                                    know
                                </h6>
                                <p class="font-medium">Reduce your conversion losses as a freelancer in Indonesia with
                                    these
                                    FX-saving strategies.</p>
                                <div class="flex uppercase text-stone-700">
                                    Adeolu Titus Adekunle - July 31, 2025
                                </div>
                            </a>
                        </article>
                        <article class="space-y-2">
                            <a href="/blog/how-to-manage-your-freelance-finances-in-south-africa">
                                <img src="{{ Vite::asset('resources/images/article 2.jpg') }}" alt=""
                                    class="aspect-video rounded-xl object-cover w-full mb-4">
                                <h6 class="font-bold text-lg md:text-xl mb-2">How to manage your freelance finances in
                                    South Africa
                                </h6>
                                <p class="font-medium">Discover how to manage your freelance finances in South Africa
                                    with
                                    the right payment system.</p>
                                <div class="flex uppercase text-stone-700">
                                    Adeolu Titus Adekunle - July 31, 2025
                                </div>
                            </a>
                        </article>
                        <article class="space-y-2">
                            <a href="/blog/how-to-manage-your-freelance-finances-in-south-africa">
                                <img src="{{ Vite::asset('resources/images/article 3.jpg') }}" alt=""
                                    class="aspect-video rounded-xl object-cover w-full mb-4">
                                <h6 class="font-bold text-lg md:text-xl mb-2">How Kenyan creators are earning and saving
                                    in multiple
                                    currencies
                                </h6>
                                <p class="font-medium">Here is how Kenyan creators are earning and saving in multiple
                                    currencies and how to get started with Grey</p>
                                <div class="flex uppercase text-stone-700">
                                    Adeolu Titus Adekunle - July 31, 2025
                                </div>
                            </a>
                        </article>
                        <article class="space-y-2">
                            <a href="/blog/how-to-manage-your-freelance-finances-in-south-africa">
                                <img src="{{ Vite::asset('resources/images/article 1.jpg') }}" alt=""
                                    class="aspect-video rounded-xl object-cover w-full mb-4">
                                <h6 class="font-bold text-lg md:text-xl mb-2">FX-saving strategies every freelancer in
                                    Indonesia should
                                    know
                                </h6>
                                <p class="font-medium">Reduce your conversion losses as a freelancer in Indonesia with
                                    these
                                    FX-saving strategies.</p>
                                <div class="flex uppercase text-stone-700">
                                    Adeolu Titus Adekunle - July 31, 2025
                                </div>
                            </a>
                        </article>
                        <article class="space-y-2">
                            <a href="/blog/how-to-manage-your-freelance-finances-in-south-africa">
                                <img src="{{ Vite::asset('resources/images/article 2.jpg') }}" alt=""
                                    class="aspect-video rounded-xl object-cover w-full mb-4">
                                <h6 class="font-bold text-lg md:text-xl mb-2">How to manage your freelance finances in
                                    South Africa
                                </h6>
                                <p class="font-medium">Discover how to manage your freelance finances in South Africa
                                    with
                                    the right payment system.</p>
                                <div class="flex uppercase text-stone-700">
                                    Adeolu Titus Adekunle - July 31, 2025
                                </div>
                            </a>
                        </article>
                        <article class="space-y-2">
                            <a href="/blog/how-to-manage-your-freelance-finances-in-south-africa">
                                <img src="{{ Vite::asset('resources/images/article 3.jpg') }}" alt=""
                                    class="aspect-video rounded-xl object-cover w-full mb-4">
                                <h6 class="font-bold text-lg md:text-xl mb-2">How Kenyan creators are earning and saving
                                    in multiple
                                    currencies
                                </h6>
                                <p class="font-medium">Here is how Kenyan creators are earning and saving in multiple
                                    currencies and how to get started with Grey</p>
                                <div class="flex uppercase text-stone-700">
                                    Adeolu Titus Adekunle - July 31, 2025
                                </div>
                            </a>
                        </article>
                    </div>
                    <div class="flex items-center justify-center mt-20 gap-5">
                        <button class="bg-stone-200 rounded-lg py-3 px-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                            <span class="">Prev</span>
                        </button>
                        <div class="px-5 py-4 rounded-full border border-black">1/90</div>
                        <button class="bg-stone-200 rounded-lg py-3 px-3 flex items-center gap-2">
                            <span class="">Prev</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
