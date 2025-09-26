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
        @if (!empty($post->cover_image_path))
            <div class="w-full max-h-[420px] overflow-hidden bg-gray-100">
                <img src="{{ asset('storage/' . $post->cover_image_path) }}" alt="{{ $post->title }} cover"
                    class="w-full h-[260px] md:h-[360px] object-cover">
            </div>
        @endif
        <div class="custom-container mx-auto px-5 md:px-10 pb-10 md:grid md:grid-cols-10 md:gap-5 pt-20 md:pt-28">
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
                            <span>{{ $post->location ?? 'Nigeria' }}</span>
                            <img src="{{ Vite::asset('resources/images/round-nigerian-flag-of-nigeria-vector.jpg') }}"
                                alt="Nigerian Flag Icon" class="h-4">
                        </span>
                    </li>
                    <li class="">
                        <span class="px-4 py-2 md:py-3 rounded-full bg-primary/20 font-semibold inline-block">
                            {{ $post->department ?? 'General' }}
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-span-7">
                <!-- Header Section -->
                <div class="mb-10">
                    <div>
                        <h2 class="">{{ $post->title }}</h2>
                        <div class="flex items-center mt-5 gap-4">
                            @php
                                $typeMap = [
                                    'full_time' => 'Full-time',
                                    'part_time' => 'Part-time',
                                    'contract' => 'Contract',
                                    'internship' => 'Internship',
                                ];
                                $employmentLabel =
                                    $typeMap[$post->employment_type] ??
                                    ucfirst(str_replace('_', ' ', $post->employment_type ?? ''));
                            @endphp
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 stroke-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 9.563C9 9.252 9.252 9 9.563 9h4.874c.311 0 .563.252.563.563v4.874c0 .311-.252.563-.563.563H9.564A.562.562 0 0 1 9 14.437V9.564Z" />
                            </svg>
                            <span class="text-sm">{{ $employmentLabel }}</span>
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

                <!-- Job Description -->
                <div class="mb-10">
                    <h3 class="text-xl font-semibold mb-4">Job Description</h3>
                    <div class="prose max-w-none text-gray-700">
                        {!! $post->description !!}
                    </div>
                </div>
                @if ($post->published_at)
                    <div class="text-xs text-gray-500">Posted:
                        {{ \Illuminate\Support\Carbon::parse($post->published_at)->toFormattedDateString() }}</div>
                @endif
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
