@section('title', 'About DgnRavePay')
@section('meta_description',
    'Learn how DgnRavePay is redefining digital finance across Africa—payments, savings,
    credit, and growth in one ecosystem.')
    <x-guest-layout>
        <section class="min-h-screen relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-10">
                    <div class="text-center mb-10">
                        <span class="text-xs md:text-xs text-stone-500 uppercase">About us</span>
                        <h1 class="capitalize mt-2 mb-5">
                            Redefining
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-primary-2">
                                Digital Finance
                            </span>
                            for Africa and Beyond.
                        </h1>
                        <p class="font-medium text-base md:text-lg">
                            We are re-imagining how people and businesses move money, access credit, save smartly, and
                            connect to global
                            opportunities, all from one powerful ecosystem
                        </p>
                    </div>
                </div>
            </div>
            <x-enlarging-img />
        </section>
    <div x-data="{ 
        showPartnershipModal: false,
        form: {
            first_name: '',
            last_name: '',
            company_name: '',
            company_email: '',
            phone: '',
            country: 'Select',
            proposal: ''
        },
        loading: false,
        success: false,
        error: null,
        toast: { show: false, message: '', type: 'success' },
        showToast(message, type = 'success') {
            this.toast.show = true;
            this.toast.message = message;
            this.toast.type = type;
            setTimeout(() => {
                this.toast.show = false;
            }, 5000);
        },
        submitForm() {
            this.loading = true;
            this.error = null;
            
            fetch('/partnership-request', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                body: JSON.stringify(this.form)
            })
            .then(response => {
                if (!response.ok) throw response;
                return response.json();
            })
            .then(data => {
                this.success = true;
                this.showToast('Partnership request submitted successfully!', 'success');
                this.form = {
                    first_name: '',
                    last_name: '',
                    company_name: '',
                    company_email: '',
                    phone: '',
                    country: 'Select',
                    proposal: ''
                };
                setTimeout(() => {
                    this.showPartnershipModal = false;
                    this.success = false;
                }, 3000);
            })
            .catch(error => {
                console.error(error);
                this.error = 'Something went wrong. Please try again.';
                this.showToast('Failed to submit request. Please try again.', 'error');
            })
            .finally(() => {
                this.loading = false;
            });
        }
    }">
        <div class="my-20 md:mt-28 px-5 md:px-10">
            <h2 class="mb-7 md:mb-10 text-center">
                Built for Trust. Designed for Growth
            </h2>
            <section class="splide max-w-7xl mx-auto" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <div class="space-y-5 transition-all ease-in-out duration-300">
                                <img src="{{ Vite::asset('resources/images/article 1.jpg') }}" alt=""
                                    class="aspect-video rounded-lg object-cover w-full mb-5">
                                <span class="uppercase text-xs md:text-sm text-stone-300">evolution</span>
                                <h6 class="text-base md:text-lg font-semibold">Use your currencies in digital payments.</h6>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="space-y-5 md:col-span-2 transition-all ease-in-out duration-300">
                                <img src="{{ Vite::asset('resources/images/article 2.jpg') }}" alt=""
                                    class="aspect-video rounded-lg object-cover w-full mb-5">
                                <span class="uppercase text-xs md:text-sm text-stone-300">evolution</span>
                                <h6 class="text-base md:text-lg font-semibold">Growth from simple transfers to full
                                    financial ecosystem.
                                </h6>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="space-y-5 transition-all ease-in-out duration-300">
                                <img src="{{ Vite::asset('resources/images/article 3.jpg') }}" alt=""
                                    class="aspect-video rounded-lg object-cover w-full mb-5">
                                <span class="uppercase text-xs md:text-sm text-stone-300">promise</span>
                                <h6 class="text-base md:text-lg font-semibold">A platform that scales with you — individual
                                    or
                                    enterprise</h6>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Add the progress bar element -->
                <div class="splide__progress mt-10 md:mt-10">
                    <div class="splide__progress__bar">
                    </div>
                </div>
            </section>
        </div>
        <div class="custom-container mx-auto  px-5 md:px-10 py-10 my-20 md:mt-30 gap-10 grid md:grid-cols-3">
            <div class="">
                <h6 class="text-xs md:text-sm text-stone-500 uppercase">founded</h6>
                <p class="text-base md:text-lg font-medium">2024</p>
            </div>
            <div class="">
                <h6 class="text-xs md:text-sm text-stone-500 uppercase">OUR MISSION</h6>
                <p class="text-base md:text-lg font-medium">
                    To simplify payments and empower people and businesses with seamless and inclusive financial
                    solutioins.
                </p>
            </div>
            <div class="">
                <h6 class="text-xs md:text-sm text-stone-500 uppercase">OUR VISION</h6>
                <p class="text-base md:text-lg font-medium">
                    To be Africa's most trusted digital financial ecosystem for payments, growth and
                    prosperity with a global presence
                </p>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 items-center justify-center my-20 md:my-28 opacity-20">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo" class="w-full">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo" class="w-full">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden md:block">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden md:block">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden lg:block">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden lg:block">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden lg:block">
            <img src="{{ Vite::asset('resources/images/logo black.png') }}" alt="DgnRavePay’s Logo"
                class="w-full hidden lg:block">
        </div>

        <section class="my-20 md:mt-30">
            <div class="custom-container mx-auto  px-5 md:px-10">
                <div class="lg:grid lg:grid-cols-2 space-y-10 lg:space-y-0">
                    <div class="">
                        <h2 class="mb-5 leading-[3] sticky top-32">Our core values</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-5">
                        <article
                            class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden hover:!scale-[1.02] transition-transform">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">001</span>
                                <h6 class="font-bold text-base md:text-lg">Innovation with Purpose</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/innovation.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article
                            class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden hover:!scale-[1.02] transition-transform">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">002</span>
                                <h6 class="font-bold text-base md:text-lg">Trust and Integrity</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/trust.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article
                            class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden hover:!scale-[1.02] transition-transform">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">003</span>
                                <h6 class="font-bold text-base md:text-lg">Excellence at Scale</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/excellence.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article
                            class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden hover:!scale-[1.02] transition-transform">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">004</span>
                                <h6 class="font-bold text-base md:text-lg">Empowerment & Inclusion</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/empowerment.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article
                            class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden hover:!scale-[1.02] transition-transform">
                            <div class="p-5 md:p-10">
                                <span class="text-xs md:text-sm text-stone-300">005</span>
                                <h6 class="font-bold text-base md:text-lg">Empowerment & Inclusion</h6>
                            </div>
                            <img src="{{ Vite::asset('resources/images/inclusion.png') }}" alt=""
                                class="h-36 md:h-44 lg:h-56 mx-auto">
                        </article>
                        <article
                            class="rounded-xl bg-gradient-to-br from-black/50 to-black/70 overflow-hidden hover:!scale-[1.02] transition-transform">
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

        <section class="">
            <div class="custom-container mx-auto  px-5 md:px-10">
                <div class="py-20 flex flex-col justify-center text-center">
                    <h2 class="text-white mb-5">We’re just getting started</h2>
                    <p class="text-white">
                        There’s so much we have to accomplish. Here are a few milestones we’ve crossed so far
                    </p>
                </div>
                <div class="text-center grid md:grid-cols-4 gap-5 border-t border-white/5 p-10">
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

        <div class="w-full overflow-hidden">
            <p class="font-normal text-6xl leading-tight md:text-[151.8px] md:leading-[154.52px] tracking-[-0.1em] text-[#737577] opacity-20 whitespace-nowrap text-center select-none"
               style="font-family: 'Inter', sans-serif;">
                Bank Smarter with DgnRavePay
            </p>
        </div>

        <section class="custom-container mx-auto  px-5 md:px-10 py-10 my-20 gap-10 grid lg:grid-cols-2">
            <!-- Link to Career Page -->
            <a href="/career"
                class="block rounded-xl aspect-[16/12] overflow-hidden bg-gradient-to-b from-black to-stone-900 relative -z-[0] hover:!scale-[1.02] transition-transform cursor-pointer">
                <div class="p-5">
                    <h2 class="text-3xl md:text-4xl font-bold mb-2">Love to be a part of the team?</h2>
                    <p class="text-primary font-light max-w-[400px]">Explore Careers at DgnRavePay</p>
                    <button class="bg-primary text-white mt-5 px-5 py-2 rounded-md">Explore Now</button>
                </div>
                <img src="{{ Vite::asset('resources/images/about-bag.png') }}" alt="" class="ml-auto w-3/5">
                <div class="absolute left-6 bottom-6 p-3 rounded-full bg-black w-14 h-14 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="size-6 stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                    </svg>
                </div>
            </a>
            
            <!-- Partnership Modal Trigger -->
            <div @click="showPartnershipModal = true"
                class="rounded-xl aspect-[16/12] overflow-hidden bg-gradient-to-b from-primary to-primary-2/50 relative -z-[0] hover:!scale-[1.02] transition-transform cursor-pointer">
                <div class="p-5">
                    <h2 class="text-3xl md:text-4xl font-bold mb-2">Partner with us</h2>
                    <p class="font-light max-w-[400px]">Join forces with DgnRavePay to build the future of payments and business solutions.</p>
                    <button class="bg-white text-black mt-5 px-5 py-2 rounded-md">Submit partnership request</button>
                </div>
                <div class="h-full relative overflow-hidden">
                    <img src="{{ Vite::asset('resources/images/about-handshake.png') }}" alt=""
                        class="absolute w-full bottom-10">
                </div>
                <div class="absolute left-6 bottom-6 p-3 rounded-full bg-black w-14 h-14 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="size-6 stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                    </svg>
                </div>
            </div>
        </section>

        <!-- Partnership Modal -->
        <div x-show="showPartnershipModal" style="display: none;" class="fixed inset-0 z-[20000] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showPartnershipModal"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="showPartnershipModal = false"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div x-show="showPartnershipModal"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                    
                     <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" x-show="!success">
                         <form class="space-y-4" @submit.prevent="submitForm">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-primary focus-within:border-primary">
                                    <label class="block text-xs font-medium text-gray-500 mb-1">First name</label>
                                    <input type="text" x-model="form.first_name" required placeholder="Jenny" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-400 focus:ring-0 sm:text-sm">
                                </div>
                                <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-primary focus-within:border-primary">
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Last name</label>
                                    <input type="text" x-model="form.last_name" required placeholder="Lee" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-400 focus:ring-0 sm:text-sm">
                                </div>
                            </div>
                            
                            <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-primary focus-within:border-primary">
                                <label class="block text-xs font-medium text-gray-500 mb-1">Company/Organization Name</label>
                                <input type="text" x-model="form.company_name" required placeholder="Enter Organization Name" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-400 focus:ring-0 sm:text-sm">
                            </div>

                            <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-primary focus-within:border-primary">
                                <label class="block text-xs font-medium text-gray-500 mb-1">Company/Organization Email</label>
                                <input type="email" x-model="form.company_email" required placeholder="Enter Company/ Organization Email" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-400 focus:ring-0 sm:text-sm">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-primary focus-within:border-primary">
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Phone Number</label>
                                    <input type="text" x-model="form.phone" required placeholder="Enter phone number" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-400 focus:ring-0 sm:text-sm">
                                </div>
                                <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-primary focus-within:border-primary">
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Company Country</label>
                                    <select x-model="form.country" class="block w-full border-0 p-0 text-gray-500 placeholder-gray-400 focus:ring-0 sm:text-sm bg-transparent">
                                        <option>Select</option>
                                        <option>Nigeria</option>
                                        <option>United States</option>
                                        <option>United Kingdom</option>
                                    </select>
                                </div>
                            </div>

                            <div class="border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-primary focus-within:border-primary">
                                <label class="block text-xs font-medium text-gray-500 mb-1">Tell Us About Your Business/Proposal</label>
                                <textarea rows="4" x-model="form.proposal" required placeholder="Explain why you'd be a good fit and include any questions you have..." class="block w-full border-0 p-0 text-gray-900 placeholder-gray-400 focus:ring-0 sm:text-sm"></textarea>
                                <div class="text-right text-xs text-gray-400 mt-1" x-text="form.proposal.length + '/1500'">0/1500</div>
                            </div>
                            
                            <div class="text-red-500 text-sm" x-show="error" x-text="error"></div>

                             <div class="flex items-center justify-between pt-4">
                                <div class="text-sm text-gray-500">
                                    By continuing, you agree to our <a href="#" class="underline">Terms of Use</a> and <a href="#" class="underline">Privacy Policy</a>.
                                </div>
                                <button type="submit" :disabled="loading" class="bg-[#FBBB0C] text-white px-6 py-3 rounded-lg font-bold hover:bg-yellow-500 transition-colors disabled:opacity-50 flex items-center gap-2">
                                    <span x-show="loading" class="animate-spin rounded-full h-4 w-4 border-b-2 border-white"></span>
                                    <span>Talk to us</span>
                                </button>
                            </div>
                         </form>
                    </div>
                    
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 text-center" x-show="success" style="display: none;">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                             <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Request Submitted!</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Thank you for your interest. We have received your partnership request and will be in touch shortly.
                        </p>
                         <button @click="showPartnershipModal = false" type="button" class="mt-4 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Toast Notification -->
        <div x-show="toast.show" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2"
            class="fixed bottom-5 right-5 z-[21000] max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden" 
            style="display: none;">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg x-show="toast.type === 'success'" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <svg x-show="toast.type === 'error'" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-gray-900" x-text="toast.message"></p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button @click="toast.show = false" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            <span class="sr-only">Close</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-guest-layout>
