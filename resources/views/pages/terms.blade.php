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
                    Welcome to DgnRavePay. These Terms of Service (“Terms”) govern your access to and use of DgnRavePay’s mobile applications, websites, products, and services (collectively, the “Services”). Please read these Terms carefully before using our Services. By creating an account, accessing, or using our Services, you agree to these Terms and our Privacy Policy. If you do not agree, do not use DgnRavePay.
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">1. Introduction</h3>
            <div class="mb-3">
                <p>
                    <ul class="ml-5 list-disc">
                        <li>1.1 DgnRavePay is a licensed financial technology platform in Nigeria that provides digital wallet services, payments, savings, loans, virtual cards, POS terminals, business accounts, and related financial management tools.</li>
                        <li>1.2 These Terms constitute a legal agreement between you (“User,” “you,” or “your”) and DgnRavePay Limited (“we,” “us,” or “our”).</li>
                        <li>1.3 You must be at least 18 years old and legally capable under Nigerian law to use our Services.</li>
                    </ul>
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">2. Scope of Services</h3>
            <div class="mb-3">
                <p>
                    We provide:
                    <ul class="ml-5 list-disc">
                        <li>Personal Accounts – wallets, money transfers, bill payments, savings, loans, cards, and travel bookings.</li>
                        <li>Business Accounts – higher transaction limits, POS, payroll, invoicing, business management, CAC registration.</li>
                        <li>POS & Merchant Solutions – agent network tools, terminals, and real-time sales tracking.</li>
                        <li>Virtual Cards – multiple USD cards for global payments.</li>
                        <li>Savings & Loans – regulated, CBN-compliant packages and credit facilities.</li>
                        <li>We may add, modify, or discontinue Services at our discretion.</li>
                    </ul>
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">3. Account Registration & Security</h3>
            <div class="mb-3">
                <p>
                    3.1 To use our Services, you must register and provide accurate personal or business information. <br>
                    3.2 You agree to:

                    <ul class="ml-5 list-disc">
                        <li>Provide true, accurate, and complete information.</li>
                        <li>Keep login credentials secure.</li>
                        <li>Notify us immediately of any unauthorized access.</li>
                    </ul>
                    3.3 You are responsible for all activity conducted through your account.
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">4. Verification & Compliance (KYC/AML)</h3>
            <div class="mb-3">
                <p>
                    4.1 We comply with the Central Bank of Nigeria (CBN) regulations, Know Your Customer (KYC), and Anti-Money Laundering (AML) requirements.
                    4.2 Depending on your account tier (Tier 1, Tier 2, Tier 3), you must provide documentation such as:
                    <ul class="ml-5 list-disc">
                        <li>Full name, phone number, BVN.</li>
                        <li>Valid ID (NIN, passport, driver’s license, voter’s card).</li>
                        <li>Proof of address (utility bill, OkHi, etc.).</li>
                        <li>CAC documents for businesses.</li>
                    </ul>
                    4.3 We reserve the right to suspend or terminate accounts that fail verification or breach compliance obligations.
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">5. Use of Services</h3>
            <div class="mb-3">
                <p>
                    You agree not to:
                    <ul class="ml-5 list-disc">
                        <li>Use Services for unlawful, fraudulent, or prohibited activities (e.g., terrorism financing, gambling, scams).</li>
                        <li>Interfere with or disrupt system integrity.</li>
                        <li>Circumvent transaction limits or security controls.</li>
                    </ul>
                    We may monitor transactions and report suspicious activities to regulators.
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">6. Transactions & Payments</h3>
            <div class="mb-3">
                <p>
                   6.1 All transfers, bill payments, card transactions, and POS activities are subject to:
                        <ul class="ml-5 list-disc">
                            <li>Network availability,</li>
                            <li>Daily/transactional limits,</li>
                            <li>Applicable fees and charges.</li>
                        </ul>
                    6.2 Once a transaction is authorized, it cannot be reversed except where mandated by law or our discretion. <br>
                    6.3 You are responsible for ensuring correct transaction details (e.g., account number, recipient details).
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">7. Savings & Loan</h3>
            <div class="mb-3">
                <p>
                    7.1 We offer regulated, CBN-compliant savings and loan products. <br>
                    7.2 Terms and conditions apply to each product, including minimum deposit requirements, interest rates, and withdrawal policies. <br>
                    7.3 We may adjust interest rates and terms based on market conditions and regulatory requirements.
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">8. Virtual Cards</h3>
            <div class="mb-3">
                <p>
                    8.1 We offer multiple USD virtual cards for global payments. <br>
                    8.2 Each card has its own unique card number, expiration date, and CVV. <br>
                    8.3 Transactions are processed in real-time and are subject to the same terms as regular transactions.
                </p>
            </div>
            <h3 class="text-xl font-bold mb-4">9. POS & Merchant Solutions</h3>
            <div class="mb-3">
                <p>
                    9.1 We offer POS terminals and merchant solutions for businesses. <br>
                    9.2 Each merchant account has its own unique merchant ID, API keys, and transaction limits. <br>
                    9.3 Transactions are processed in real-time and are subject to the same terms as regular transactions.
                </p>
            </div>
        </div>
    </x-guest-layout>
