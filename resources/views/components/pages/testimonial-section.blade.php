@props([
    'title' => 'Voices of Trust. Stories of Impact.',
    'description' =>
        'See why over 100,000 Nigerians have made DgnRavePay their go-to financial app. Real reviews, real stories, real results.',
    'page' => null,
])
<div class="container mx-auto py-16 md:py-24 lg:py-32">
    <div class="mb-10 px-5 md:px-10" data-aos="fade-up">
        <h2 class="text-center mb-5 leading-[1]">{{ $title }}</h2>
        <p class="text-center">{{ $description }}</p>
    </div>
    <div id="testimonials-marquee" class="grid grid-cols-1 md:grid-cols-2 gap-6 relative">
        @php
            $query = \App\Models\Testimonial::published();
            if ($page) {
                $query->where('page', $page);
            } else {
                $query->whereNull('page');
            }
            $testimonials = $query->orderBy('sort_order')->orderByDesc('id')->get();
        @endphp
        @if ($testimonials->isNotEmpty())

            <div id="bottom-to-top-slide" class="overflow-hidden" data-interval="3500" data-duration="650" data-gap="24"
                data-step="1">
                <div class="bottom-to-top-list space-y-6">
                    @foreach ($testimonials as $t)
                        @php
                            $isYellow = $t->variant === 'yellow';
                            $cardClasses = $isYellow
                                ? 'bg-[#fbbb0c] text-white p-6'
                                : 'bg-neutral-100 ring-1 ring-black/5 p-6';
                            $nameClasses = $isYellow ? 'font-semibold' : 'font-semibold text-neutral-900';
                            $textClasses = $isYellow ? '' : 'text-neutral-700';
                        @endphp
                        <article class="break-inside-avoid rounded-3xl {{ $cardClasses }}">
                            <header class="flex items-center gap-3">
                                @if ($t->avatar_url)
                                    <img class="size-10 rounded-full object-cover" src="{{ $t->avatar_url }}"
                                        alt="{{ $t->name }} avatar" />
                                @endif
                                <div>
                                    <p class="{{ $nameClasses }}">{{ $t->name }}</p>
                                    <div class="flex {{ $isYellow ? '' : 'text-yellow-400 text-sm tracking-tight' }}"
                                        aria-label="{{ $t->rating }} star rating">
                                        {{ str_repeat('★', (int) $t->rating) }}
                                    </div>
                                </div>
                                @if ($t->icon)
                                    @switch($t->icon)
                                        @case('play')
                                            <svg class="ml-auto size-6 {{ $isYellow ? 'opacity-90' : 'text-neutral-500' }}"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M5 4.6v14.8c0 .5.53.8.95.55l12-7.4a.65.65 0 0 0 0-1.1l-12-7.4A.64.64 0 0 0 5 4.6z" />
                                            </svg>
                                        @break

                                        @case('bag')
                                            <svg class="ml-auto size-6 {{ $isYellow ? 'opacity-90' : 'text-neutral-500' }}"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M6 7a3 3 0 0 1 6 0h1a3 3 0 1 1 3 3v8a3 3 0 0 1-3 3H9a3 3 0 0 1-3-3V10a3 3 0 0 1 0-3h0Zm5-1a1 1 0 1 0-2 0h2Z" />
                                            </svg>
                                        @break

                                        @case('instagram')
                                            <svg class="ml-auto size-6 {{ $isYellow ? 'opacity-90' : 'text-gray-700' }}"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M7.5 3h9A4.5 4.5 0 0 1 21 7.5v9A4.5 4.5 0 0 1 16.5 21h-9A4.5 4.5 0 0 1 3 16.5v-9A4.5 4.5 0 0 1 7.5 3Zm0 1.5A3 3 0 0 0 4.5 7.5v9A3 3 0 0 0 7.5 19.5h9a3 3 0 0 0 3-3v-9a3 3 0 0 0-3-3h-9Zm9 2.25a1.125 1.125 0 1 1 0 2.25 1.125 1.125 0 0 1 0-2.25ZM12 8.25a3.75 3.75 0 1 1 0 7.5 3.75 3.75 0 0 1 0-7.5Z" />
                                            </svg>
                                        @break

                                        @case('facebook')
                                            <svg class="ml-auto size-6 {{ $isYellow ? 'opacity-90' : 'text-neutral-500' }}"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M22 12A10 10 0 1 0 10.3 21.9v-6.9H7.8V12h2.5V9.8c0-2.5 1.5-3.9 3.7-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 3h-2.4v6.9A10 10 0 0 0 22 12Z" />
                                            </svg>
                                        @break
                                    @endswitch
                                @endif
                            </header>
                            <p class="mt-4 {{ $textClasses }}">{!! $t->content !!}</p>
                        </article>
                    @endforeach
                </div>
            </div>

            <div id="bottom-to-bottom-slide" class="overflow-hidden hidden md:block" data-interval="3800"
                data-duration="700" data-gap="24" data-step="1">
                <div class="bottom-to-bottom-list space-y-6">
                    @foreach ($testimonials as $t)
                        @php
                            $isYellow = $t->variant === 'yellow';
                            $cardClasses = $isYellow
                                ? 'bg-[#fbbb0c] text-white p-6'
                                : 'bg-neutral-100  ring-1 ring-black/5 p-6';
                            $nameClasses = $isYellow ? 'font-semibold' : 'font-semibold text-neutral-900';
                            $textClasses = $isYellow ? '' : 'text-gray-700';
                        @endphp
                        <article class="break-inside-avoid rounded-3xl {{ $cardClasses }}">
                            <header class="flex items-center gap-3">
                                @if ($t->avatar_url)
                                    <img class="size-10 rounded-full object-cover" src="{{ $t->avatar_url }}"
                                        alt="{{ $t->name }} avatar" />
                                @endif
                                <div>
                                    <p class="{{ $nameClasses }}">{{ $t->name }}</p>
                                    <div class="flex {{ $isYellow ? '' : 'text-yellow-400 text-sm tracking-tight' }}"
                                        aria-label="{{ $t->rating }} star rating">
                                        {{ str_repeat('★', (int) $t->rating) }}
                                    </div>
                                </div>
                                @if ($t->icon)
                                    @switch($t->icon)
                                        @case('play')
                                            <svg class="ml-auto size-6 {{ $isYellow ? 'opacity-90' : 'text-neutral-500' }}"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M5 4.6v14.8c0 .5.53.8.95.55l12-7.4a.65.65 0 0 0 0-1.1l-12-7.4A.64.64 0 0 0 5 4.6z" />
                                            </svg>
                                        @break

                                        @case('bag')
                                            <svg class="ml-auto size-6 {{ $isYellow ? 'opacity-90' : 'text-neutral-500' }}"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M6 7a3 3 0 0 1 6 0h1a3 3 0 1 1 3 3v8a3 3 0 0 1-3 3H9a3 3 0 0 1-3-3V10a3 3 0 0 1 0-3h0Zm5-1a1 1 0 1 0-2 0h2Z" />
                                            </svg>
                                        @break

                                        @case('instagram')
                                            <svg class="ml-auto size-6 {{ $isYellow ? 'opacity-90' : 'text-gray-700' }}"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M7.5 3h9A4.5 4.5 0 0 1 21 7.5v9A4.5 4.5 0 0 1 16.5 21h-9A4.5 4.5 0 0 1 3 16.5v-9A4.5 4.5 0 0 1 7.5 3Zm0 1.5A3 3 0 0 0 4.5 7.5v9A3 3 0 0 0 7.5 19.5h9a3 3 0 0 0 3-3v-9a3 3 0 0 0-3-3h-9Zm9 2.25a1.125 1.125 0 1 1 0 2.25 1.125 1.125 0 0 1 0-2.25ZM12 8.25a3.75 3.75 0 1 1 0 7.5 3.75 3.75 0 0 1 0-7.5Z" />
                                            </svg>
                                        @break

                                        @case('facebook')
                                            <svg class="ml-auto size-6 {{ $isYellow ? 'opacity-90' : 'text-neutral-500' }}"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M22 12A10 10 0 1 0 10.3 21.9v-6.9H7.8V12h2.5V9.8c0-2.5 1.5-3.9 3.7-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 3h-2.4v6.9A10 10 0 0 0 22 12Z" />
                                            </svg>
                                        @break
                                    @endswitch
                                @endif
                            </header>
                            <p class="mt-4 {{ $textClasses }}">{!! $t->content !!}</p>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="absolute top-0 w-full h-40 bg-gradient-to-b from-white to-transparent"></div>
            <div class="absolute bottom-0 w-full h-40 bg-gradient-to-t from-white to-transparent"></div>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        (function() {
            const root = document.getElementById('testimonials-marquee');
            const topWrap = document.getElementById('bottom-to-top-slide');
            const topList = topWrap ? topWrap.querySelector('.bottom-to-top-list') : null;
            const bottomWrap = document.getElementById('bottom-to-bottom-slide');
            const bottomList = bottomWrap ? bottomWrap.querySelector('.bottom-to-bottom-list') : null;

            const controllers = [];

            function startMarquee(container, list, direction = 'up') {
                if (!container || !list) return;
                const items = Array.from(list.children);
                if (items.length === 0) return;

                // Read tuning options
                const interval = parseInt(container.dataset.interval || '4000', 10);
                const duration = parseInt(container.dataset.duration || '700', 10);
                const gap = parseInt(container.dataset.gap || '24', 10);
                const step = parseInt(container.dataset.step || '1', 10); // items to advance per tick

                // Duplicate for seamless loop
                items.forEach((el) => list.appendChild(el.cloneNode(true)));

                // Compute height; re-compute on resize in case content wraps differently
                let itemHeight = (items[0].offsetHeight || 0) + gap;
                if (itemHeight === gap) {
                    // If height measurement failed (not yet laid out), measure after frame
                    requestAnimationFrame(() => {
                        itemHeight = (items[0].offsetHeight || 0) + gap;
                    });
                }

                let index = 0;
                let paused = false;
                let timerId = null;

                function applyTransform() {
                    const distance = itemHeight * index;
                    list.style.transition = `transform ${duration}ms cubic-bezier(0.4, 0, 0.2, 1)`;
                    list.style.transform = `translateY(${direction === 'up' ? -distance : distance}px)`;
                }

                function resetTransform() {
                    list.style.transition = 'none';
                    list.style.transform = 'translateY(0)';
                    index = 0;
                }

                function tick() {
                    if (paused) return;
                    index += step;
                    applyTransform();
                    if (index >= items.length) {
                        // After the motion finishes, jump back
                        setTimeout(() => {
                            if (!paused) resetTransform();
                        }, duration);
                    }
                }

                function start() {
                    stop();
                    timerId = setInterval(tick, interval);
                }

                function stop() {
                    if (timerId) {
                        clearInterval(timerId);
                        timerId = null;
                    }
                }

                // Expose controller to pause/resume via root events
                function setPaused(v) {
                    paused = v;
                    if (!paused && !timerId) {
                        start();
                    }
                }
                controllers.push({
                    setPaused
                });

                // Keep measurement in sync with responsive layout changes
                const resizeObs = new ResizeObserver(() => {
                    const newHeight = (items[0].offsetHeight || 0) + gap;
                    if (newHeight && newHeight !== itemHeight) {
                        itemHeight = newHeight;
                        resetTransform();
                    }
                });
                resizeObs.observe(container);

                // Kick off
                start();
            }

            window.addEventListener('load', function() {
                startMarquee(topWrap, topList, 'up');
                startMarquee(bottomWrap, bottomList, 'down');

                if (root) {
                    const pauseAll = () => controllers.forEach(c => c.setPaused(true));
                    const resumeAll = () => controllers.forEach(c => c.setPaused(false));

                    // Pause both columns when hovering the whole section
                    root.addEventListener('mouseenter', pauseAll);
                    root.addEventListener('mouseleave', resumeAll);

                    // Pause-on-touch for mobile
                    root.addEventListener('touchstart', pauseAll, {
                        passive: true
                    });
                    root.addEventListener('touchend', resumeAll);
                    root.addEventListener('touchcancel', resumeAll);
                }
            });
        })();
    </script>
@endpush
