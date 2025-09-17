<nav class="hidden lg:block fixed z-[10000] w-full {{ request()->is('about') ? 'bg-accent-black' : 'bg-white' }}">
    <div class="container mx-auto  px-5 md:px-10 py-4 flex items-center justify-between gap-10">
        <a href="/">
            @if (request()->is('about'))
                <img src="{{ Vite::asset('resources/images/logo wide white.png') }}" alt="DgnRavePay Logo"
                    class="h-16 pt-3 pb-3">
            @else
                <img src="{{ Vite::asset('resources/images/logo wide.png') }}" alt="DgnRavePay Logo" class="h-20">
            @endif
        </a>
        <div class="hidden lg:flex flex-1 items-center justify-between">
            <div class="bg-primary/50 rounded-full p-1">
                <button
                    class="px-3 py-2 rounded-full transition-all duration-[.5s] ease-in-out {{ !request()->is('business') ? 'tab-active' : '' }}"
                    id="for-individuals">For Individual</button>
                <button
                    class="px-3 py-2 rounded-full transition-all duration-[.5s] ease-in-out {{ request()->is('business') ? 'tab-active' : '' }}"
                    id="for-business">For Business</button>
            </div>
            <ul class="font-medium flex gap-5">
                <li class="group cursor-pointer nav-list">
                    <span>Product</span>
                    <div id="navbar-product"
                        class="group-[.is-open]:visible invisible transition-all absolute top-24 right-40 lg:right-60 text-black bg-slate-100 rounded-xl p-3 grid grid-cols-2">
                        <div class="p-3" id="navbar-select">
                            <button type="button" class="nav-selected rounded-xl p-3 flex items-start gap-5">
                                <img id="nav-product-individual-img"
                                    src="{{ Vite::asset('resources/images/user colored.png') }}" alt="briefcase icon"
                                    class="size-6">
                                <div class="text-left max-w-[11rem]">
                                    <p class="font-bold text-sm mb-1.5 leading-1">For Individuals</p>
                                    <span class="text-black/30 text-xs font-medium">Bank, pay, save,
                                        and
                                        grow</span>
                                </div>
                            </button>
                            <button type="button" class="rounded-xl p-3 flex items-start gap-5">
                                <img id="nav-product-business-img"
                                    src="{{ Vite::asset('resources/images/briefcase.svg') }}" alt="briefcase icon"
                                    class="size-6">

                                <div class="text-left max-w-[11rem]">
                                    <p class="font-bold text-sm mb-1.5 leading-1">For Business</p>
                                    <span class="text-black/30 text-xs font-medium">
                                        Manage, grow, and scale your business
                                    </span>
                                </div>
                            </button>
                        </div>
                        <div class="p-3 bg-white rounded-xl"></div>
                    </div>
                </li>
                <li class="group cursor-pointer nav-list">
                    <span>Company</span>
                    <div id="navbar-company"
                        class="group-[.is-open]:visible invisible transition-all absolute top-24 right-60 lg:right-80 text-black bg-slate-100 rounded-xl p-3">
                        <div class="p-3 bg-white rounded-xl">
                            <a href="/about" class="rounded-xl p-3 flex items-start  gap-5">
                                <img src="{{ Vite::asset('resources/images/dng-about.png') }}" alt="user icon"
                                    class="size-6">
                                <div class="text-left">
                                    <p class="font-bold text-sm mb-1.5 leading-1">About Us</p>
                                    <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                        grow</span>
                                </div>
                            </a>
                            <a href="/career" class="rounded-xl p-3 flex items-start  gap-5">
                                <img src="{{ Vite::asset('resources/images/virtual_card.png') }}"
                                    alt="virtual card icon" class="size-6">
                                <div class="text-left">
                                    <p class="font-bold text-sm mb-1.5 leading-1">Careers</p>
                                    <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                        grow</span>
                                </div>
                            </a>
                            <a href="/contact" class="rounded-xl p-3 flex items-start  gap-5">
                                <img src="{{ Vite::asset('resources/images/location.png') }}" alt="savings icon"
                                    class="size-6">
                                <div class="text-left">
                                    <p class="font-bold text-sm mb-1.5 leading-1">Contact Us</p>
                                    <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                        grow</span>
                                </div>
                            </a>
                            <a href="/press" class="rounded-xl p-3 flex items-start  gap-5">
                                <img src="{{ Vite::asset('resources/images/file.png') }}" alt="loan icon"
                                    class="size-6">
                                <div class="text-left">
                                    <p class="font-bold text-sm mb-1.5 leading-1">Press and Media</p>
                                    <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                        grow</span>
                                </div>
                            </a>

                        </div>
                    </div>
                </li>
                <li class="group cursor-pointer nav-list">
                    <span>Resources</span>
                    <div id="navbar-resources"
                        class="group-[.is-open]:visible invisible transition-all absolute top-24 right-40 lg:right-60 text-black bg-slate-100 rounded-xl p-3">
                        <div class="p-3 bg-white rounded-xl">
                            <a href="/blog" class="rounded-xl p-3 flex items-start  gap-5">
                                <img id="nav-dropdown-resources-blog-img"
                                    src="{{ Vite::asset('resources/images/blogger.png') }}" alt="blogger icon"
                                    class="size-6">
                                <div class="text-left">
                                    <p class="font-bold text-sm mb-1.5 leading-1">DgnRavePay Blog</p>
                                    <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                        grow</span>
                                </div>
                            </a>
                            <a href="#" class="rounded-xl p-3 flex items-start  gap-5">
                                <img id="nav-dropdown-resources-help_center-img"
                                    src="{{ Vite::asset('resources/images/help_center.png') }}" alt="help center icon"
                                    class="size-6">
                                <div class="text-left">
                                    <p class="font-bold text-sm mb-1.5 leading-1">Help Center</p>
                                    <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                        grow</span>
                                </div>
                            </a>
                            <a href="/policy" class="rounded-xl p-3 flex items-start  gap-5">
                                <img id="nav-dropdown-resources-policy-img"
                                    src="{{ Vite::asset('resources/images/policy.png') }}" alt="policy icon"
                                    class="size-6">
                                <div class="text-left">
                                    <p class="font-bold text-sm mb-1.5 leading-1">IMF Policy</p>
                                    <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                        grow</span>
                                </div>
                            </a>
                            <a href="/whistleblower" class="rounded-xl p-3 flex items-start  gap-5">
                                <img id="nav-dropdown-resources-whistleblower-img"
                                    src="{{ Vite::asset('resources/images/whistle.png') }}" alt="whistle icon"
                                    class="size-6">
                                <div class="text-left">
                                    <p class="font-bold text-sm mb-1.5 leading-1">Whistleblower Policy</p>
                                    <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                        grow</span>
                                </div>
                            </a>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="">
            <a href="#"
                class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 font-medium shadow-lg">Get
                Started
            </a>
        </div>
    </div>
</nav>

<nav class="shadow-lg lg:hidden {{ request()->is('about') ? 'bg-accent-black' : 'bg-white' }}">
    <!-- Top bar with logo and hamburger -->
    <div class="flex justify-between items-center px-4 py-3">
        <!-- Logo -->
        <a href="/">
            @if (request()->is('about'))
                <img src="{{ Vite::asset('resources/images/logo wide white.png') }}" alt="DgnRavePay Logo"
                    class="h-16 pt-3 pb-3">
            @else
                <img src="{{ Vite::asset('resources/images/logo wide.png') }}" alt="DgnRavePay Logo" class="h-20">
            @endif
        </a>

        <!-- Hamburger Menu Button -->
        <button id="hamburger"
            class="p-2 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary">
            <div class="hamburger-lines">
                <span class="line line1 block w-6 h-0.5 bg-gray-800 mb-1 transition-all duration-300"></span>
                <span class="line line2 block w-6 h-0.5 bg-gray-800 mb-1 transition-all duration-300"></span>
                <span class="line line3 block w-6 h-0.5 bg-gray-800 transition-all duration-300"></span>
            </div>
        </button>
    </div>

    <!-- Mobile Menu Content -->
    <div id="mobile-menu"
        class="overflow-y-scroll transition-all duration-300 max-h-0 bg-white border-t border-gray-200">
        <div class="px-4 py-4 space-y-4">
            <!-- First Dropdown - Products (2 column style) -->
            <div class="border-b border-gray-200 pb-4">
                <button id="dropdown1-btn"
                    class="flex items-center justify-between w-full px-3 py-2 text-left text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-md transition-colors duration-200">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                        </svg>
                        <span class="font-medium">Product</span>
                    </div>
                    <svg id="dropdown1-arrow" class="w-4 h-4 transition-transform duration-200" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div id="dropdown1-content" class="overflow-hidden transition-all duration-300 max-h-0 ml-4 mt-2">
                    <!-- Toggle Buttons -->
                    <div class="flex space-x-2 mb-3">
                        <button id="products-btn1"
                            class="px-3 py-1 text-sm bg-primary text-white rounded-md transition-colors duration-200">
                            For Individuals
                        </button>
                        <button id="products-btn2"
                            class="px-3 py-1 text-sm bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                            For Business
                        </button>
                    </div>

                    <!-- Products Content -->
                    <div id="products-content1" class="space-y-2">
                        <a href="/" class="p-2 flex items-start  gap-5">
                            <img src="{{ Vite::asset('resources/images/user.png') }}" alt="user icon"
                                class="size-6">
                            <div class="text-left">
                                <p class="font-bold text-sm mb-1.5 leading-1">Personal Account</p>
                                <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                    grow</span>
                            </div>
                        </a>
                        <a href="/virtual" class="p-2 flex items-start  gap-5">
                            <img src="{{ Vite::asset('resources/images/pos_terminal.png') }}" alt="pos terminal icon"
                                class="size-6">

                            <div class="text-left">
                                <p class="font-bold text-sm mb-1.5 leading-1">Virtual Cards</p>
                                <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                    grow</span>
                            </div>
                        </a>
                        <a href="/savings" class="p-2 flex items-start  gap-5">
                            <img src="{{ Vite::asset('resources/images/savings.png') }}" alt="savings icon"
                                class="size-6">

                            <div class="text-left">
                                <p class="font-bold text-sm mb-1.5 leading-1">Savings</p>
                                <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                    grow</span>
                            </div>
                        </a>
                        <a href="#" class="p-2 flex items-start  gap-5">
                            <img src="{{ Vite::asset('resources/images/loan.png') }}" alt="loan icon"
                                class="size-6">

                            <div class="text-left">
                                <p class="font-bold text-sm mb-1.5 leading-1">Loan</p>
                                <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                    grow</span>
                            </div>
                        </a>
                        <a href="#" class="p-2 flex items-start  gap-5">
                            <img src="{{ Vite::asset('resources/images/hotel-bed.png') }}" alt="hotel bed icon"
                                class="size-6">

                            <div class="text-left">
                                <p class="font-bold text-sm mb-1.5 leading-1">Travel and Hotel</p>
                                <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                    grow</span>
                            </div>
                        </a>
                    </div>

                    <div id="products-content2" class="space-y-2 hidden">
                        <a href="/business" class="p-2 flex items-start  gap-5">
                            <img src="{{ Vite::asset('resources/images/briefcase.png') }}" alt="briefcase icon"
                                class="size-6">
                            <div class="text-left">
                                <p class="font-bold text-sm mb-1.5 leading-1">Business Account</p>
                                <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                    grow</span>
                            </div>
                        </a>
                        <a href="#" class="p-2 flex items-start  gap-5">
                            <img src="{{ Vite::asset('resources/images/pos_terminal.png') }}"
                                alt="POS & Terminals icon" class="size-6">

                            <div class="text-left">
                                <p class="font-bold text-sm mb-1.5 leading-1">POS & Terminals</p>
                                <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                    grow</span>
                            </div>
                        </a>
                        <a href="#" class="p-2 flex items-start  gap-5">
                            <img src="{{ Vite::asset('resources/images/graph-up.png') }}"
                                alt="Business graph up icon" class="size-6">

                            <div class="text-left">
                                <p class="font-bold text-sm mb-1.5 leading-1">Business Management</p>
                                <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                    grow</span>
                            </div>
                        </a>
                        <a href="#" class="p-2 flex items-start  gap-5">
                            <img src="{{ Vite::asset('resources/images/loan.png') }}" alt="loan icon"
                                class="size-6">


                            <div class="text-left">
                                <p class="font-bold text-sm mb-1.5 leading-1">Payroll</p>
                                <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                    grow</span>
                            </div>
                        </a>
                        <a href="#" class="p-2 flex items-start  gap-5">
                            <img src="{{ Vite::asset('resources/images/invoice.png') }}" alt="invoice icon"
                                class="size-6">


                            <div class="text-left">
                                <p class="font-bold text-sm mb-1.5 leading-1">Invoicing</p>
                                <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                    grow</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Second Dropdown - Company -->
            <div class="border-b border-gray-200 pb-4">
                <button id="dropdown2-btn"
                    class="flex items-center justify-between w-full px-3 py-2 text-left text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-md transition-colors duration-200">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium">Company</span>
                    </div>
                    <svg id="dropdown2-arrow" class="w-4 h-4 transition-transform duration-200" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div id="dropdown2-content"
                    class="overflow-hidden transition-all duration-300 max-h-0 ml-4 mt-2 space-y-2">
                    <a href="/about" class="p-2 flex items-start  gap-5">
                        <img src="{{ Vite::asset('resources/images/user.png') }}" alt="user icon" class="size-6">
                        <div class="text-left">
                            <p class="font-bold text-sm mb-1.5 leading-1">About Us</p>
                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                grow</span>
                        </div>
                    </a>
                    <a href="/career" class="p-2 flex items-start  gap-5">
                        <img src="{{ Vite::asset('resources/images/virtual_card.png') }}" alt="virtual card icon"
                            class="size-6">
                        <div class="text-left">
                            <p class="font-bold text-sm mb-1.5 leading-1">Careers</p>
                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                grow</span>
                        </div>
                    </a>
                    <a href="/contact" class="p-2 flex items-start  gap-5">
                        <img src="{{ Vite::asset('resources/images/savings.png') }}" alt="savings icon"
                            class="size-6">
                        <div class="text-left">
                            <p class="font-bold text-sm mb-1.5 leading-1">Contact Us</p>
                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                grow</span>
                        </div>
                    </a>
                    <a href="/press" class="rounded-xl p-3 flex items-start  gap-5">
                        <img src="{{ Vite::asset('resources/images/loan.png') }}" alt="loan icon" class="size-6">
                        <div class="text-left">
                            <p class="font-bold text-sm mb-1.5 leading-1">Press and Media</p>
                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                grow</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Third Dropdown - Resources -->
            <div class="border-b border-gray-200 pb-4">
                <button id="dropdown3-btn"
                    class="flex items-center justify-between w-full px-3 py-2 text-left text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 rounded-md transition-colors duration-200">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                        </svg>
                        <span class="font-medium">Resources</span>
                    </div>
                    <svg id="dropdown3-arrow" class="w-4 h-4 transition-transform duration-200" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div id="dropdown3-content"
                    class="overflow-hidden transition-all duration-300 max-h-0 ml-4 mt-2 space-y-2">
                    <a href="/blog" class="p-2 flex items-start  gap-5">
                        <img src="{{ Vite::asset('resources/images/blogger.png') }}" alt="blogger icon"
                            class="size-6">
                        <div class="text-left">
                            <p class="font-bold text-sm mb-1.5 leading-1">DgnRavePay Blog</p>
                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                grow</span>
                        </div>
                    </a>
                    <a href="#" class="p-2 flex items-start  gap-5">
                        <img src="{{ Vite::asset('resources/images/help_center.png') }}" alt="help center icon"
                            class="size-6">
                        <div class="text-left">
                            <p class="font-bold text-sm mb-1.5 leading-1">Help Center</p>
                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                grow</span>
                        </div>
                    </a>
                    <a href="/policy" class="p-2 flex items-start  gap-5">
                        <img src="{{ Vite::asset('resources/images/policy.png') }}" alt="policy icon"
                            class="size-6">
                        <div class="text-left">
                            <p class="font-bold text-sm mb-1.5 leading-1">IMF Policy</p>
                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                grow</span>
                        </div>
                    </a>
                    <a href="/whistleblower" class="p-2 flex items-start  gap-5">
                        <img src="{{ Vite::asset('resources/images/whistle.png') }}" alt="whistle icon"
                            class="size-6">
                        <div class="text-left">
                            <p class="font-bold text-sm mb-1.5 leading-1">Whistleblower Policy</p>
                            <span class="text-black/30 text-xs font-medium">Bank, pay, save, and
                                grow</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Get Started Button -->
            <div class="pt-4">
                <a href="#"
                    class="block w-full px-4 py-3 bg-primary text-white text-center font-medium rounded-md hover:bg-yellow-500 transition-colors duration-200">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</nav>
