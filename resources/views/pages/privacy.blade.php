@section('title', 'Privacy Policy')
@section('meta_description',
    'DgnRavePay’s privacy policy describing how we collect, use, store and protect personal data in line with
    NDPR and global best practices.')
    <x-guest-layout>
        <section class="relative pt-10">
            <div class="pt-20 md:pt-32 lg:pt-40">
                <div class="custom-container mx-auto  px-5 md:px-14 lg:py-16">
                    <div class="text-center mb-10">
                        <h1
                            class="capitalize mb-5 text-center bg-clip-text text-transparent bg-gradient-to-r from-black to-primary">
                            Privacy Policy
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
                <h3 class="text-xl font-bold mb-4">Introduction</h3>
                <p class="">
                    Welcome to DgnRavePay (“we”, “us”, “our”). Your privacy matters to us. This Privacy Policy describes how we collect, use, disclose, store, and protect your personal information when you:
                    <ol class="mb-3 list-decimal ml-5">
                        <li>use our website(s) and mobile application(s) (“Sites”),</li>
                        <li>use our Personal or Business app services (“Services”),</li>
                        <li>access or use any other products connected with DgnRavePay.</li>
                    </ol>
                    By using our Sites or the Services, or by otherwise providing us your personal information, you agree to the terms of this Privacy Policy. If you do not agree, please do not use our Sites or Services.
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">Information We Collect</h3>
            <ol class="mb-3 list-decimal ml-5">
                <li class="mb-3">
                    <h6 class="text-base font-bold mb-4">Personal Information</h6>
                    <ul class="ml-5 list-disc">
                        <li>Identifiers such as name, email address, phone number, and national identification where
                            required for KYC.</li>
                        <li>Account and transaction details necessary to provide our services.</li>
                    </ul>
                </li>
                <li class="mb-3">
                    <h6 class="text-base font-bold mb-4">Technical & Usage Data</h6>
                    <ul class="ml-5 list-disc">
                        <li>Device, browser, and usage information to help us improve platform performance and security.</li>
                        <li>Cookies and similar technologies used to personalise your experience and analyse site traffic.</li>
                    </ul>
                </li>
            </ol>
            <h3 class="text-xl font-bold mb-4">How We Use Your Information</h3>
            <div class="mb-3">
                <ul class="ml-5 list-disc">
                    <li>To provide, maintain and improve our products and services.</li>
                    <li>To verify identity, perform KYC/AML checks, and comply with legal obligations.</li>
                    <li>To detect and prevent fraud, abuse, and other security issues.</li>
                    <li>To send transactional communications and customer support.</li>
                </ul>
            </div>
            <h3 class="text-xl font-bold mb-4">Data Sharing & Disclosure</h3>
            <div class="mb-3">
                <p>We may share information with licensed partners, service providers, regulators, and as required by law.
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">Your Rights & Choices</h3>
            <div class="mb-3">
                <p>You may access, correct, or request deletion of your personal data where applicable. For requests,
                    contact help@DgnRavePay.com.</p>
            </div>
            <h3 class="text-xl font-bold mb-4">Security</h3>
            <div class="mb-3">
                <p>We implement security measures to protect your data, including encryption and access controls. However,
                    no system is completely secure; report concerns to help@DgnRavePay.com.</p>
            </div>
            <h3 class="text-xl font-bold mb-4">Policy Updates</h3>
            <div class="mb-3">
                <p>We may update this Privacy Policy periodically. Significant changes will be published on this page and
                    where appropriate notified to users.</p>
            </div>
        </div>
    </x-guest-layout>
