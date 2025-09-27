@section('title', isset($post) && $post->title ? $post->title : 'Blog Post')
@section('meta_description',
    isset($post) && $post->excerpt
    ? $post->excerpt
    : 'Insights, guides, and updates from
    DgnRavePay.')
    <x-guest-layout>
        @php
            $cover =
                isset($post) && $post->cover_image_path
                    ? asset('storage/' . $post->cover_image_path)
                    : asset('images/logo wide.png');
            $pub =
                isset($post) && $post->published_at
                    ? \Illuminate\Support\Carbon::parse($post->published_at)->toIso8601String()
                    : null;
            $articleSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'BlogPosting',
                'headline' => $post->title ?? 'Blog Post',
                'image' => [$cover],
                'author' => [
                    '@type' => 'Person',
                    'name' => $post->author ?? 'DgnRavePay',
                ],
                'datePublished' => $pub,
                'mainEntityOfPage' => url()->current(),
                'description' => $post->excerpt ?? null,
            ];
        @endphp
        @push('head')
            <x-seo :jsonLd="$articleSchema" :title="null" :description="null" :onlyJsonLd="true" />
        @endpush
        <div class="custom-container mx-auto  px-5 md:px-10 pb-10 pt-40 md:pt-52">
            <div class="text-center text-xs md:text-sm">
                {{ $post->author ?? 'DgnRavePay Team' }} •
                <span
                    class="text-stone-400">{{ optional(\Illuminate\Support\Carbon::parse($post->published_at))->toFormattedDateString() }}</span>
            </div>
            <h2 class="max-w-5xl mx-auto font-bold text-center mt-10 mb-20">{{ $post->title }}</h2>
            <img src="{{ $cover }}" alt="{{ $post->title }}" class="w-full rounded-xl aspect-video mb-10 object-cover">

            <div class="md:grid md:grid-cols-10 md:gap-5 border-b border-slate-200 pb-20">
                <div class="col-span-3">
                    <div class="flex items-center gap-3">
                        <img src="{{ Vite::asset('resources/images/profile.jpg') }}" alt="Author"
                            class="h-10 rounded-full">
                        <p class="text-stone-600 text-xs md:text-sm font-semibold">{{ $post->author ?? 'DgnRavePay Team' }}
                        </p>
                    </div>
                    <p class="text-stone-600 text-xs md:text-sm uppercase mt-10 mb-3">share this post</p>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                        class="px-3 py-2 bg-black rounded-full text-white font-medium text-xs md:text-sm items-center gap-1 inline-flex"
                        target="_blank" rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4 stroke-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                        <span>Post</span>
                    </a>
                </div>
                <div class="col-span-7 mt-10 md:mt-0 prose prose-stone max-w-none">
                    @if ($post->relationLoaded('tags') ? $post->tags->isNotEmpty() : $post->tags()->exists())
                        <div class="not-prose mb-6 flex flex-wrap gap-2">
                            @foreach ($post->tags as $tag)
                                <a href="/blog?tag={{ $tag->slug }}"
                                    class="px-3 py-1 rounded-full bg-primary/10 text-primary text-xs uppercase">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    @endif
                    {!! \App\Support\HtmlSanitizer::clean($post->content) !!}
                </div>
            </div>
            <section class="my-20">
                <div>
                    <p class="text-xs md:text-sm text-slate-600 uppercase ml-2">IF YOU ENJOYED THIS, CHECK THESE OUT</p>
                    <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-5 mt-3">
                        @foreach ($related ?? collect() as $r)
                            @php
                                $rCover = $r->cover_image_path
                                    ? asset('storage/' . $r->cover_image_path)
                                    : Vite::asset('resources/images/article 1.jpg');
                            @endphp
                            <article class="space-y-2">
                                <a href="/blog/{{ $r->slug }}">
                                    <img src="{{ $rCover }}" alt="{{ $r->title }}"
                                        class="aspect-video rounded-xl object-cover">
                                    <h6 class="font-bold text-lg">{{ $r->title }}</h6>
                                    <p class="font-medium">{{ $r->excerpt }}</p>
                                    <div class="flex uppercase text-stone-700">
                                        {{ $r->author ?? 'DgnRavePay Team' }} -
                                        {{ optional(\Illuminate\Support\Carbon::parse($r->published_at))->toFormattedDateString() }}
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </x-guest-layout>
