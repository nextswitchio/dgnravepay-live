@php
    $setupSteps = [
        [
            'icon' => 'resources/images/setup-icon-1.png',
            'title' => 'Request Your POS',
            'description' => 'Apply instantly by filling a quick request form in minutes',
        ],
        [
            'icon' => 'resources/images/setup-icon-2.png',
            'title' => 'Quick Verification',
            'description' => 'Get verified fast with minimal paperwork.',
        ],
        [
            'icon' => 'resources/images/setup-icon-3.png',
            'title' => 'Fast Delivery or Pickup',
            'description' => 'Receive your POS within 48 hours or collect at a local hub',
        ],
        [
            'icon' => 'resources/images/setup-icon-4.png',
            'title' => 'Start Accepting Payments',
            'description' => 'Plug in, log in, and go live  it’s that simple.',
        ],
    ];
@endphp
<div class="md:grid md:grid-cols-5 md:gap-20 mb-10">
    <div class="md:col-span-3">
        <h2 class="mb-2 text-center md:text-left" data-aos="fade-up">Set Up in Minutes. Earn for Years</h2>
        <p class="text-center md:text-left">Getting started is easy. Apply, activate your POS, and start earning right
            away</p>
        <ul class="mt-3 max-w-2xl">
            @foreach ($setupSteps as $step)
                <li class="px-5 py-5 rounded mb-2 cursor-pointer join-option">
                    <div class="flex items-center gap-3 mb-2">
                        <img src="{{ Vite::asset($step['icon']) }}" alt="" class="">
                        <p class="font-semibold text-base">{{ $step['title'] }}</p>
                    </div>
                    <div class="max-h-0 overflow-hidden join-text transition-all">{{ $step['description'] }}</div>
                </li>
            @endforeach
        </ul>
    </div>
    <div
        class="w-full aspect-square md:aspect-auto md:h-full rounded-xl md:col-span-2 overflow-hidden md:relative bg-primary/40 flex justify-center items-center">
        <img src="{{ Vite::asset('resources/images/setup-img-1.png') }}" alt="Steps to setup your pos on DgnRavePay"
            class="w-full h-full object-cover rounded-xl md:absolute" id="join-img">
    </div>
</div>
