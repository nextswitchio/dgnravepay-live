@section('title', 'Contact DgnRavePay')
@section('meta_description',
    'Reach DgnRavePay team across Nigeria—contact details for offices, support, and
    partnerships.')
    <x-guest-layout>
        <section class="relative pt-10">
            <div class="pt-28 md:pt-40 lg:pt-52 pb-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center">
                        <h2
                            class="capitalize mb-5 text-center bg-clip-text text-transparent bg-gradient-to-r from-black to-primary">
                            We’re closer to you across Nigeria.<br />
                            Reach us at any of our state offices</h2>
                    </div>
                </div>
            </div>
            <div class="">
                <img src="{{ Vite::asset('resources/images/vector line.svg') }}" alt="vector line"
                    class="absolute -z-[10] blur-[5rem] opacity-50 w-full bottom-16 left-0">
            </div>
        </section>
        <!-- Dark Section -->
        <section class="bg-accent-black relative -z-[0]">
            <div class="custom-container mx-auto  px-5 md:px-10 py-20 md:py-28">
                <div class="text-center">
                    <h2 class="text-white mb-5">
                        Want to meet our team in your state? <br />
                        Come say hello near you.
                    </h2>
                    <div class="mt-5 inline-flex bg-white rounded-full p-2">
                        <button class="border border-primary px-3 py-2 rounded-full flex gap-2 fount-semibold">
                            <img src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                alt="" class="w-5 rounded-full">
                            <span>Lagos</span>
                        </button>
                        <button class="px-3 py-2 rounded-full flex gap-2 fount-semibold">
                            <img src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                alt="" class="w-5 rounded-full">
                            <span>Abakaliki</span>
                        </button>
                        <button class="px-3 py-2 rounded-full flex gap-2 fount-semibold">
                            <img src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                alt="" class="w-5 rounded-full">
                            <span>Abuja</span>
                        </button>
                    </div>
                </div>
                <div class="md:grid gap-10 md:grid-cols-7 mt-20">
                    <div class="md:col-span-3 text-white font-medium space-y-5">
                        <div class="bg-primary rounded-xl p-5 divide-y divide-white/30">
                            <p class="flex items-center gap-2 pb-5">
                                <img src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                    alt="" class="w-10 rounded-full">
                                <span class="text-lg md:text-xl font-semibold">Lagos ( Headquarters)</span>
                            </p>
                            <ul class="pt-5 space-y-3">
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                    </span>
                                    <p>No. 4, Bashiru Olusesi Street, off Conservation Road, Lekki Phase 2, Lagos State.</p>
                                </li>
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                                        </svg>
                                    </span>
                                    <a href="mailto:hello@dgnravepay.com">
                                        <p>hello@dgnravepay.com</p>
                                    </a>
                                </li>
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="size-5">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                        </svg>
                                    </span>
                                    <a href="https://wa.me/2349160006956" target="_blank">
                                        <p>+234 9160006956</p>
                                    </a>
                                </li>
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                    </span>
                                    <a href="tel:+2342013306189">
                                        <p>+234 2013306189</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="bg-primary rounded-xl p-5 divide-y divide-white/30">
                            <p class="flex items-center gap-2 pb-5">
                                <img src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                    alt="" class="w-10 rounded-full">
                                <span class="text-lg md:text-xl font-semibold">Kings Plaza</span>
                            </p>
                            <ul class="pt-5 space-y-3">
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                    </span>
                                    <p>No 80, Adeniran Ogunsanya Street, Surulere, Lagos State.</p>
                                </li>
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                                        </svg>
                                    </span>
                                    <a href="mailto:aria@dgnravepay.com">
                                        <p>aria@dgnravepay.com</p>
                                    </a>
                                </li>
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="size-5">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                        </svg>
                                    </span>
                                    <a href="https://wa.me/2349160005387" target="_blank">
                                        <p>+234 9160005387</p>
                                    </a>
                                </li>
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                    </span>
                                    <a href="tel:+2342013306026">
                                        <p>+234 2013306026</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="bg-primary rounded-xl p-5 divide-y divide-white/30">
                            <p class="flex items-center gap-2 pb-5">
                                <img src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                    alt="" class="w-10 rounded-full">
                                <span class="text-lg md:text-xl font-semibold">Abakaliki</span>
                            </p>
                            <ul class="pt-5 space-y-3">
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                    </span>
                                    <p>No. 1, Leach Road, off Waterworks Road, by Fire Service Abakaliki, Ebonyi State.</p>
                                </li>
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                                        </svg>
                                    </span>
                                    <a href="mailto:amelia@dgnravepay.com">
                                        <p>amelia@dgnravepay.com</p>
                                    </a>
                                </li>
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="size-5">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                        </svg>
                                    </span>
                                    <a href="https://wa.me/2349160006954" target="_blank">
                                        <p>+234 9160006954</p>
                                    </a>
                                </li>
                                <li class="flex gap-3 items-center">
                                    <span class="bg-primary-2/80 p-3 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                    </span>
                                    <a href="tel:+2342013306103">
                                        <p>+234 2013306103</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:col-span-4">
                        <img src="{{ Vite::asset('resources/images/nigeria map.png') }}" alt="" class="w-full">
                    </div>
                </div>
            </div>
        </section>

        <!-- Loan Services Support Section -->
        <section class="bg-white relative py-20 md:py-28">
            <div class="custom-container mx-auto px-5 md:px-10">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="capitalize mb-5 text-center bg-clip-text text-transparent bg-gradient-to-r from-black to-primary">
                            Loan Services Support
                        </h2>
                        <p class="text-gray-600 text-lg">
                            DgnRavePay loan products are provided by DgnRavePay Technologies Ltd, a licensed digital lender in Nigeria.
                        </p>
                    </div>

                    <div class="bg-gradient-to-br from-primary/5 to-primary/10 rounded-2xl p-8 md:p-10 space-y-8">
                        <!-- Regulatory Status -->
                        <div>
                            <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                </svg>
                                Regulatory Status
                            </h3>
                            <p class="text-gray-700 mb-3">DgnRavePay Technologies Ltd is authorised to offer loan services under:</p>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-primary mt-1 flex-shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <div>
                                        <a href="{{ asset('docs/FCCPC APPROVAL DGNRAVEPAY.pdf') }}" target="_blank" class="text-gray-700 hover:text-primary underline">FCCPC Approval for Digital Lending</a>
                                        <p class="text-sm text-gray-500 mt-1">Reference No: FCCPC/DSI/INV/ML/605</p>
                                        <p class="text-sm text-gray-500">Issued: 16 June 2025</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-primary mt-1 flex-shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <div>
                                        <a href="{{ asset('docs/DgnRavePay Loan License Document 176.pdf') }}" target="_blank" class="text-gray-700 hover:text-primary underline">Money Lender's License</a>
                                        <p class="text-sm text-gray-500 mt-1">License No: MLA/WZ2/1542025</p>
                                        <p class="text-sm text-gray-500">Issued by: Magistrate of Abuja, Magisterial District</p>
                                        <p class="text-sm text-gray-500">Issued: 20th May 2025</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Loan Privacy Policy -->
                        <div class="border-t border-gray-300 pt-8">
                            <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                Loan Privacy Policy
                            </h3>
                            <p class="text-gray-700">
                                Read our Loan Services Privacy Policy here: 
                                <a href="{{ route('privacy') }}#loan-services" class="text-primary hover:text-primary-2 underline font-medium">
                                    https://dgnravepay.com/privacy
                                </a>
                            </p>
                        </div>

                        <!-- Contact Support -->
                        <div class="border-t border-gray-300 pt-8">
                            <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                                </svg>
                                Loan Support Contact
                            </h3>
                            <p class="text-gray-700 mb-3">For loan-related support, please contact:</p>
                            <a href="mailto:hello@dgnravepay.com" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-2 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                                </svg>
                                hello@dgnravepay.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-guest-layout>
