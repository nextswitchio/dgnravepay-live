@props([
    'title' => 'Get Savvy About Your Financial Life',
    'description' =>
        'See why over 100,000 Nigerians have made DgnRavePay their go-to financial app. Real reviews, real stories, real results.',
    'limit' => null,
    // Optional: pass a $faqs collection from a controller to override internal query.
    'faqs' => null,
])

@php
    // Load published FAQs if not provided, preserving the current design style
    if (!isset($faqs) || $faqs === null) {
        $query = \App\Models\Faq::query()->where('is_published', true)->latest('updated_at');
        if (!empty($limit)) {
            $query->limit((int) $limit);
        }
        $faqs = $query->get();
    }
@endphp

<div id="faqs">
    <div class="mb-10 px-5 md:px-10" data-aos="fade-up">
        <h2 class="text-center mb-5">{{ $title }}</h2>
        <p class="text-center">{{ $description }}</p>
    </div>
    <ul class="max-w-4xl mx-auto space-y-2 md:space-y-3">
        @forelse ($faqs as $faq)
            <li class="flex items-center justify-between bg-stone-100 rounded-2xl py-3 md:py-4 px-3 md:px-5">
                <details>
                    <summary class="font-medium text-sm md:text-lg">{{ $faq->question }}</summary>
                    <p class="mt-2">{!! nl2br(e($faq->answer)) !!}</p>
                </details>
            </li>
        @empty
            <li class="text-center text-gray-500 py-6">No FAQs available at the moment.</li>
        @endforelse
    </ul>
</div>
