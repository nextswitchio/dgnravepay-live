@php
    $setupSteps = [
        [
            'icon' => 'resources/images/setup-icon-1.png',
            'title' => 'Choose Your Savings Plan',
            'description' => 'Pick the option that matches your lifestyle; RaveGoals, RaveFlex, or RaveVault.',
        ],
        [
            'icon' => 'resources/images/setup-icon-2.png',
            'title' => 'Set Your Savings Target',
            'description' => 'Define how much you want to save, frequency, and duration, we guide you along the way.',
        ],
        [
            'icon' => 'resources/images/setup-icon-3.png',
            'title' => 'Automate & Relax',
            'description' => 'Turn on auto-debits for stress-free savings, or save manually at your own pace.',
        ],
        [
            'icon' => 'resources/images/setup-icon-4.png',
            'title' => 'Watch Your Money Grow',
            'description' => 'Earn interest and track your savings growth in real time from your dashboard.',
        ],
    ];
@endphp
<div class="md:grid md:grid-cols-5 md:gap-20 mb-10">
    <div class="md:col-span-3">
        <h2 class="mb-2 text-center md:text-left" data-aos="fade-up">How Saving with DgnRavePay Works</h2>
        <p class="text-center md:text-left">Simple steps, smarter results, we’ve made saving effortless, flexible, and
            rewarding.</p>
        <ul class="mt-3 max-w-2xl">
            @foreach ($setupSteps as $step)
                <li class="px-5 py-5 rounded mb-2 cursor-pointer savings-join-option relative">
                    <div class="flex items-center gap-3 mb-2">
                        <img src="{{ Vite::asset($step['icon']) }}" alt="" class="">
                        <p class="font-semibold text-base">{{ $step['title'] }}</p>
                    </div>
                    <div class="max-h-0 overflow-hidden savings-join-text transition-all">{{ $step['description'] }}</div>
                </li>
            @endforeach
        </ul>
    </div>
    <div
        class="w-full aspect-square md:aspect-auto md:h-full rounded-xl md:col-span-2 overflow-hidden md:relative bg-secondary/40 flex justify-center items-center">
        <img src="{{ Vite::asset('resources/images/face scan.png') }}" alt="Steps personal savings on DgnRavePay"
            class="w-full h-full object-cover rounded-xl md:absolute" id="savings-join-img">
    </div>
</div>
