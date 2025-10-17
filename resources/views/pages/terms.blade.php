@section('title', 'Terms of Service')
@section('meta_description',
    'DgnRavePay Terms of Service — rules and conditions that govern the use of our platform and services.')
    <x-guest-layout>
        <section class="relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-14 lg:py-16">
                    <div class="text-center mb-10">
                        <h1
                            class="capitalize mb-5 text-center bg-clip-text text-transparent bg-gradient-to-r from-black to-primary">
                            Terms of Service
                        </h1>
                    </div>
                </div>
            </div>
            <div class="">
                <img src="{{ Vite::asset('resources/images/vector line.svg') }}" alt="vector line"
                    class="absolute -z-[10] blur-[5rem] opacity-50 w-full bottom-0 left-0">
            </div>
        </section>
        <div class="custom-container mx-auto  px-5 md:px-10 pb-20 md:mt-10">
            <div class="mb-3">
                <p class="">
                    Welcome to DgnRavePay. These Terms of Service govern your access to and use of our services. By using
                    our platform, you agree to be bound by these Terms.
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">Using Our Services</h3>
            <div class="mb-3">
                <ul class="ml-5 list-disc">
                    <li>You must provide accurate information and keep your account secure.</li>
                    <li>Use of the service must comply with applicable laws and our policies (including KYC/AML rules).</li>
                </ul>
            </div>
            <h3 class="text-xl font-bold mb-4">Fees and Payments</h3>
            <div class="mb-3">
                <p>Fees for services are set out on our pricing pages or communicated during the service flow and may
                    change from time to time.</p>
            </div>
            <h3 class="text-xl font-bold mb-4">Prohibited Conduct</h3>
            <div class="mb-3">
                <p>Activities that facilitate fraud, unauthorized access, or illegal transactions are strictly
                    prohibited.</p>
            </div>
            <h3 class="text-xl font-bold mb-4">Limitation of Liability</h3>
            <div class="mb-3">
                <p>To the extent permitted by law, DgnRavePay will not be liable for indirect, incidental, or
                    consequential damages arising from use of the services.</p>
            </div>
            <h3 class="text-xl font-bold mb-4">Governing Law</h3>
            <div class="mb-3">
                <p>These terms are governed by the laws of the Federal Republic of Nigeria unless otherwise required by
                    applicable regulations.</p>
            </div>
            <h3 class="text-xl font-bold mb-4">Contact</h3>
            <div class="mb-3">
                <p>For questions about these Terms, contact help@DgnRavePay.com.</p>
            </div>
        </div>
    </x-guest-layout>
