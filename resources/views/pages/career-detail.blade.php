@section('title', isset($post) && $post->title ? $post->title . ' — Careers at DgnRavePay' : 'Careers at DgnRavePay')
@section('meta_description',
    isset($post) && $post->summary
    ? $post->summary
    : 'Open roles at DgnRavePay. Mission-driven
    fintech careers across Africa.')
    <x-guest-layout>
        @php
            $jobSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'JobPosting',
                'title' => $post->title ?? 'Open Role',
                'description' => $post->summary ?? strip_tags($post->description ?? ''),
                'datePosted' =>
                    isset($post) && $post->published_at
                        ? \Illuminate\Support\Carbon::parse($post->published_at)->toIso8601String()
                        : null,
                'hiringOrganization' => [
                    '@type' => 'Organization',
                    'name' => config('app.name'),
                    'sameAs' => config('app.url'),
                ],
                'jobLocation' => [
                    '@type' => 'Place',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'addressLocality' => $post->location ?? 'Nigeria',
                        'addressCountry' => 'NG',
                    ],
                ],
                'employmentType' => $post->employment_type ?? 'FULL_TIME',
            ];
        @endphp
        @push('head')
            <x-seo :jsonLd="$jobSchema" :title="null" :description="null" :onlyJsonLd="true" />
        @endpush
        <div class="custom-container mx-auto px-5 md:px-10 pb-10 md:grid md:grid-cols-10 md:gap-5 pt-40 md:pt-52">
            <div class="col-span-3">
                <a href="/career" class="flex items-center gap-2 text-primary font-semibold text-sm md:text-base">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 stroke-primary">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>Back to Careers</span>
                </a>
                <ul class="mt-10 flex md:flex-col gap-3 text-xs md:text-sm mb-5 md:mb-0">
                    <li class="">
                        <span
                            class="px-4 py-2 md:py-3 rounded-full bg-primary/20 font-semibold items-center gap-2 inline-flex">
                            <span>Kano, Nigeria</span>
                            <img src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                alt="Nigerian Flag Icon" class="h-4">
                        </span>
                    </li>
                    <li class="">
                        <span class="px-4 py-2 md:py-3 rounded-full bg-primary/20 font-semibold inline-block">
                            People Operations
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-span-7">
                <!-- Header Section -->
                <div class="mb-10">
                    <div>
                        <h2 class="">Admin Officer (Kano)</h2>
                        <div class="flex items-center mt-5 gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 stroke-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.564A.562.562 0 0 1 9 14.437V9.564Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 stroke-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.564A.562.562 0 0 1 9 14.437V9.564Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 stroke-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.564A.562.562 0 0 1 9 14.437V9.564Z" />
                            </svg>
                            <button
                                class="bg-primary/20 hover:bg-primary-2/10 font-medium py-2 px-4 rounded-lg transition duration-200 inline-flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                </svg>
                                <span>Copy this link</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Who we are Section -->
                <div class="mb-10">
                    <h3 class="font-semibold text-darkblue mb-4">Who we are</h3>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Moniepoint is a financial technology company digitizing Africa's real economy by building a
                        financial ecosystem for businesses, providing them with all the payment, banking, credit and
                        business
                        management tools they need to succeed.
                    </p>
                    <a href="#" class="text-primary italic leading-relaxed">
                        Check out posts on how we cultivate a culture of innovation, teamwork, and growth.
                    </a>
                </div>

                <!-- About the role Section -->
                <div class="mb-10">
                    <h3 class="text-xl font-semibold mb-4">About the role</h3>
                    <div class="mb-10">
                        <h4 class="font-medium text-gray-700">Location: <span class="text-gray-900">Kano</span></h4>
                    </div>

                    <div class="mb-10">
                        <h3 class="text-xl font-semibold mb-4">Job Summary</h3>
                        <p class="text-gray-600 leading-relaxed">
                            To facilitate the smooth operation of the company and the execution of its projects, the Admin
                            Officer is responsible for the professional and efficient management of the company's inventory,
                            logistics, and operations.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold mb-4">Principal Duties and Responsibilities</h3>
                        <ul class="list-disc pl-5">
                            <li class="text-gray-600">Coordinating and tracking the distribution, location, condition,
                                maintenance and care of, allocation and use of the company's inventory and goods at all
                                times
                                and ensuring appropriate levels are available in the store for the efficient execution of
                                all
                                projects and running of the business at all times.</li>
                            <li class="text-gray-600">Effective and efficient record keeping and reporting including
                                cataloguing
                                new inventory; managing it in an efficient database thereafter; and, preparing accurate
                                reports
                                for management regularly, including interim reports as required. Planning and managing the
                                company's international and domestic logistics.</li>
                            <li class="text-gray-600">Working with other units to support the projects' logistics from
                                proposal
                                through to delivery and evaluation and follow-up; on time and within budget.</li>
                            <li class="text-gray-600">Arranging the logistics and liaising with other staff and third
                                parties.
                            </li>
                            <li class="text-gray-600">Liaising with suppliers and managing them through to the completion of
                                the
                                project and beyond for follow-up activities and reports.</li>
                            <li class="text-gray-600">Handling all aspects of the tracking of the timing and movement of
                                people,
                                equipment, materials, freight, etc., from origin to the final destination in a timely
                                manner.
                            </li>
                            <li class="text-gray-600">Responsibility for and management of office information systems;
                                utilities
                                and resources; vehicles; sundries; and premises, at all times to address the company's
                                needs.
                            </li>
                            <li class="text-gray-600">Responsibility for ticket booking, expatriate quota, visa preparation
                                and
                                office purchases, and general processes involved in immigration handling for the company's
                                expatriates and international guests.</li>
                        </ul>

                        <h4 class="font-semibold text-gray-800 mt-6 mb-2">General:</h4>
                        <ul class="list-disc pl-5">
                            <li class="text-gray-600">Constantly communicating with all stakeholders to keep them updated,
                                including attending meetings and preparing regular reports for the management team.</li>
                            <li class="text-gray-600">Undertaking any necessary duties to ensure a first-class service is
                                provided at all times.</li>
                        </ul>
                    </div>
                </div>

                <!-- Qualifications Section -->
                <div class="mb-10">
                    <h3 class="text-xl font-semibold text-darkblue mb-4">Qualifications, Competency & Skills Required</h3>
                    <ul class="list-disc pl-5">
                        <li class="text-gray-600">Graduate degree or equivalent qualification in Administration or Mass
                            Communications or minimum of three years previous travel, logistics, inventory management,
                            operations or office administration experience.</li>
                        <li class="text-gray-600">Experienced Microsoft Office user, particularly Word, Excel, PowerPoint
                            and
                            Outlook.</li>
                        <li class="text-gray-600">Experienced database and financial software user e.g. Excel, Sage,
                            QuickBooks.
                        </li>
                        <li class="text-gray-600">Competent Internet, email and Google applications user.</li>
                        <li class="text-gray-600">Sound knowledge of the entertainment industry within Nigeria.</li>
                    </ul>
                </div>

                <!-- Candidate Abilities Section -->
                <div class="mb-10">
                    <h3 class="text-xl font-semibold text-darkblue mb-4">Candidate Abilities & Personality Profile</h3>
                    <ul class="list-disc pl-5">
                        <li class="text-gray-600">An organized and assertive individual who is proactive, creative, and
                            resourceful.</li>
                        <li class="text-gray-600">An outstanding team player and self-starter, able to work with minimum
                            supervision.</li>
                        <li class="text-gray-600">Great at staying calm and diplomatic under intense pressure.</li>
                        <li class="text-gray-600">Able to manage own time and prioritize work to ensure deadlines are met
                            and
                            targets achieved, and take personal responsibility for own work and actions.</li>
                        <li class="text-gray-600">Able to work within a secure and confidential environment, maintain
                            confidentiality and demonstrate tact and diplomacy at all times.</li>
                        <li class="text-gray-600">Able to use own initiative and make simple or business-critical decisions
                            as
                            required.</li>
                        <li class="text-gray-600">Clear verbal communicator with excellent telephone manners.</li>
                        <li class="text-gray-600">Able to work accurately with excellent attention to detail at all times.
                        </li>
                        <li class="text-gray-600">Ability to liaise with staff at all levels, both internally and
                            externally.
                        </li>
                        <li class="text-gray-600">Able to develop excellent working relationships both internally and
                            externally.</li>
                        <li class="text-gray-600">Excellent organizational skills.</li>
                        <li class="text-gray-600">Demonstrates strong interpersonal skills and a professional manner and
                            approach at all times including an equable temperament and a neat appearance.</li>
                        <li class="text-gray-600">Able to cope well when under pressure from competing priorities,
                            unpredictable
                            requests and interruptions.</li>
                        <li class="text-gray-600">Keenly interested in the FinTech, hospitality and logistics industries in
                            Nigeria.</li>
                    </ul>
                </div>

                <!-- What we offer Section -->
                <div class="mb-10">
                    <h3 class="text-xl font-semibold text-darkblue mb-4">What we can offer you</h3>

                    <div class="mb-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Culture</h3>
                            <p class="text-gray-600">
                                We put our people first and prioritize the well-being of every team member. We've built a
                                company
                                where all opinions carry weight and where all voices are heard. We value and respect each
                                other
                                and
                                always look out for one another. Above all, we are human.
                            </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Learning</h3>
                            <p class="text-gray-600">
                                We have a learning and development-focused environment with an emphasis on knowledge
                                sharing,
                                training, and regular internal technical talks.
                            </p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-800 mb-2">Compensation</h3>
                            <p class="text-gray-600">
                                You'll receive an attractive salary, pension, health insurance, Employee Stock Options,
                                annual
                                bonus, plus other benefits.
                            </p>
                    </div>
                </div>

                <!-- Hiring process Section -->
                <div class="mb-10">
                    <h3 class="text-xl font-semibold text-darkblue mb-4">What to expect in the hiring process</h3>
                    <ul class="list-disc pl-5">
                        <li class="text-gray-600">A preliminary phone call with the Recruiter</li>
                        <li class="text-gray-600">An interview with the Hiring Manager</li>
                        <li class="text-gray-600">An interview with a member of our Executive team.</li>
                    </ul>

                    <div class="mt-8">
                        <a href="#"
                            class="bg-primary text-white py-2 px-4 md:py-4 md:px-5 hover:bg-primary/70 transition-all rounded-lg border-b-2 border-primary-2 md:text-base font-medium shadow-lg inline-flex items-center gap-2">
                            <span>Apply for this role</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4 fill-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark Section -->
        <section class="bg-accent-black">
            <div class="custom-container mx-auto  px-5 md:px-10">
                <div class="py-20 md:pt-28 flex flex-col justify-center text-center">
                    <h3 class="text-white mb-5 text-3xl md:text-5xl lg:text-[48px] leading-[1]">We’re just getting started
                    </h3>
                    <p class="text-white">
                        There’s so much we have to accomplish. Here are a few milestones we’ve crossed so far
                    </p>
                </div>
                <div class="text-center grid grid-cols-4 gap-5 border-t border-white/50 p-10">
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
