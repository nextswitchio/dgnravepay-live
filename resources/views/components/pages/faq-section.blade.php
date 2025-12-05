@props([
    'title' => 'Get Savvy About Your Financial Life',
    'description' =>
        'See why over 100,000 Nigerians have made DgnRavePay their go-to financial app. Real reviews, real stories, real results.',
    'limit' => null,
    // Optional: pass a $faqs collection from a controller to override internal query.
    'faqs' => null,
    'page' => null,
])

@php
    // Load published FAQs if not provided, preserving the current design style
    if (!isset($faqs) || $faqs === null) {
        $query = \App\Models\Faq::query()->where('is_published', true);
        
        if ($page) {
            $query->where('page', $page);
        } else {
             // If no page specified, show global FAQs (page is null) or default to home if desired?
             // Requirement says "admin will have to choose the page".
             // Let's assume if page is not passed, we show global ones (null).
             // But wait, existing ones are null.
             // Let's filter where page is null OR page matches if page is not provided?
             // Actually, for specific pages, we want specific FAQs.
             // If I'm on 'loan' page, I want 'loan' FAQs.
             // If I'm on 'home' page, I want 'home' FAQs.
             // If the component is used without page prop, maybe it should show global (null)?
             // Let's stick to: if page is provided, filter by that page.
             // If page is NOT provided, maybe show all? Or show global?
             // Let's show global (null) if no page provided.
             $query->whereNull('page');
        }

        $query->latest('updated_at');

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
