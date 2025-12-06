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
                        <p class="text-lg text-gray-600 mt-4 mb-8">Last Updated: [Insert Date]</p>
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
                <h3 class="text-xl font-bold mb-4">1. Introduction</h3>
                <p class="">
                    Welcome to DgnRavePay ("we", "us", "our"). Your privacy matters to us. This Privacy Policy explains how we collect, use, disclose, and protect your information when you:
                    <ol class="mb-3 list-decimal ml-5">
                        <li>Use our website(s) or mobile application(s) ("Sites"),</li>
                        <li>Access our personal or business app services ("Services"), or</li>
                        <li>Interact with any product connected with DgnRavePay.</li>
                    </ol>
                    By using our Sites or Services, you agree to this Privacy Policy. If you do not agree, please discontinue use immediately.
                </p>
            </div>

            <h3 class="text-xl font-bold mb-4">2. Information We Collect</h3>
            <ol class="mb-3 list-decimal ml-5">
                <li class="mb-3">
                    <h6 class="text-base font-bold mb-4">Personal Information</h6>
                    <p class="mb-2">We may collect the following information to create and manage your account:</p>
                    <ul class="ml-5 list-disc">
                        <li>Full name, phone number, email address, and physical address</li>
                        <li>Government-issued ID or selfie for identity verification (KYC)</li>
                        <li>Bank details, transaction history, and account information</li>
                    </ul>
                </li>
                <li class="mb-3">
                    <h6 class="text-base font-bold mb-4">Technical & Usage Data</h6>
                    <p class="mb-2">We automatically collect technical data such as:</p>
                    <ul class="ml-5 list-disc">
                        <li>Device identifiers, operating system, browser type, and app version</li>
                        <li>Interaction data (app screens viewed, buttons tapped, feature usage)</li>
                        <li>Crash logs and performance diagnostics (through Firebase or similar tools)</li>
                    </ul>
                </li>
                <li class="mb-3">
                    <h6 class="text-base font-bold mb-4">Location Data</h6>
                    <p class="mb-2">With your permission, we collect precise location data to verify addresses and enhance security using OkHi and similar verification tools. Location data is collected only as needed for functionality and is not shared for marketing purposes.</p>
                </li>
                <li class="mb-3">
                    <h6 class="text-base font-bold mb-4">Biometric & Sensitive Data</h6>
                    <p class="mb-2">We use biometric authentication (Face ID or fingerprint) for secure login and identity verification. Biometric data is processed securely on your device's hardware (Secure Enclave) and is never stored or transmitted to DgnRavePay servers.</p>
                </li>
                <li class="mb-3">
                    <h6 class="text-base font-bold mb-4">TrueDepth and Face Data</h6>
                    <p class="mb-2">Our app may use Apple's <strong>TrueDepth camera APIs</strong> to enable secure and seamless authentication experiences such as <strong>Face ID login</strong> or <strong>facial verification during KYC (Know Your Customer)</strong> processes.</p>
                    <ul class="ml-5 list-disc mt-2 space-y-2">
                        <li><strong>Data Collection:</strong> The TrueDepth camera analyzes facial features to confirm identity or enable authentication. This information is processed <em>in real time</em> on your device.</li>
                        <li><strong>Data Usage:</strong> The facial data captured by the TrueDepth camera is <strong>used only for verification or authentication purposes</strong> and is <strong>not stored, shared, or transmitted</strong> to DgnRavePay's servers or any third parties.</li>
                        <li><strong>Data Storage:</strong> TrueDepth and Face ID data are <strong>secured within Apple's Secure Enclave</strong> and remain fully controlled by your device's operating system. DgnRavePay <strong>cannot access</strong> or <strong>store</strong> this information.</li>
                        <li><strong>Third-Party Access:</strong> None. TrueDepth data is processed locally and never leaves your device.</li>
                    </ul>
                    <p class="mt-2">By using Face ID or facial recognition features, you consent to this local processing for secure authentication.</p>
                </li>
                <li class="mb-3">
                    <h6 class="text-base font-bold mb-4">Contacts Access</h6>
                    <p class="mb-2">With your consent, we access your phone's contact list to:</p>
                    <ul class="ml-5 list-disc">
                        <li>Help you send or request payments to existing users, and</li>
                        <li>Invite contacts who are not yet registered.</li>
                    </ul>
                    <p class="mt-2">Contact information is used only for this purpose and is not stored or shared externally.</p>
                </li>
                <li class="mb-3">
                    <h6 class="text-base font-bold mb-4">Cookies and Similar Technologies</h6>
                    <p class="mb-2">We use cookies and local storage to remember your preferences, analyze traffic, and improve user experience.</p>
                </li>
            </ol>

            <h3 class="text-xl font-bold mb-4">3. How We Use Your Information</h3>
            <div class="mb-3">
                <p class="mb-3">We use collected data to:</p>
                <ul class="ml-5 list-disc">
                    <li>Provide, operate, and improve our products and services</li>
                    <li>Verify identity and comply with KYC/AML regulations</li>
                    <li>Detect and prevent fraud or unauthorized activity</li>
                    <li>Respond to customer support requests</li>
                    <li>Send transactional notifications and updates</li>
                    <li>Analyze performance and usage to enhance reliability</li>
                </ul>
            </div>

            <h3 class="text-xl font-bold mb-4">4. Third-Party Service Providers</h3>
            <div class="mb-3">
                <p class="mb-3">We partner with trusted third parties who process limited data on our behalf to enable key features of the app. These partners act as data processors under strict confidentiality and data protection agreements. None of these providers use your information for advertising or marketing purposes.</p>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left">Provider</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Purpose</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Privacy Policy</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Firebase (Google LLC)</td>
                                <td class="border border-gray-300 px-4 py-2">Analytics, crash reporting, and performance monitoring</td>
                                <td class="border border-gray-300 px-4 py-2"><a href="https://policies.google.com/privacy" class="text-blue-600 hover:text-blue-800">Google Privacy Policy</a></td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="border border-gray-300 px-4 py-2">OkHi</td>
                                <td class="border border-gray-300 px-4 py-2">Address verification and precise location validation for user safety and compliance</td>
                                <td class="border border-gray-300 px-4 py-2"><a href="https://docs.google.com/document/u/1/d/e/2PACX-1vQo9j4FEw0R2ftDpOHjgWpCDRVuYMgZG7N-dscrkRo9KqGbvGCi6Z7tDwnapVdce52gYR1SpiL1xR3s/pub" class="text-blue-600 hover:text-blue-800">OkHi Privacy Policy</a></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Smile ID</td>
                                <td class="border border-gray-300 px-4 py-2">Biometric identity verification (KYC)</td>
                                <td class="border border-gray-300 px-4 py-2"><a href="https://www.usesmileid.com/privacy-policy" class="text-blue-600 hover:text-blue-800">Smile ID Privacy Policy</a></td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="border border-gray-300 px-4 py-2">Cloud Hosting Providers</td>
                                <td class="border border-gray-300 px-4 py-2">Secure data storage and system uptime management</td>
                                <td class="border border-gray-300 px-4 py-2">Not applicable</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="mt-3">Each third-party provider processes user data solely to support DgnRavePay's core financial, verification, and compliance features. You can review their privacy policies for more details on how data is handled securely.</p>
            </div>

            <h3 class="text-xl font-bold mb-4">5. Data Sharing & Disclosure</h3>
            <div class="mb-3">
                <p>We may share your information only:</p>
                <ul class="ml-5 list-disc">
                    <li>With service providers, financial institutions, and regulators as required by law</li>
                    <li>To complete transactions or verify identity</li>
                    <li>To comply with legal obligations, court orders, or government requests</li>
                </ul>
                <p class="mt-3">We never sell or rent your personal information to third parties.</p>
            </div>

            <h3 class="text-xl font-bold mb-4">6. Data Retention</h3>
            <div class="mb-3">
                <p>We retain your data only for as long as necessary to:</p>
                <ul class="ml-5 list-disc">
                    <li>Provide our services</li>
                    <li>Fulfill legal and regulatory obligations (e.g., financial record-keeping)</li>
                    <li>Resolve disputes and enforce agreements</li>
                </ul>
                <p class="mt-3">When data is no longer needed, it is securely deleted or anonymized.</p>
            </div>

            <h3 class="text-xl font-bold mb-4">7. Security</h3>
            <div class="mb-3">
                <p>We use administrative, technical, and physical safeguards — including encryption, access controls, and secure data transmission — to protect your information. However, no system is completely secure. Please report any security concerns to
                    <a href="mailto:help@DgnRavePay.com" class="text-blue-600 hover:text-blue-800">help@DgnRavePay.com</a>.</p>
            </div>

            <h3 class="text-xl font-bold mb-4">8. International Data Transfers</h3>
            <div class="mb-3">
                <p>Your data may be processed or stored on secure servers located outside your country of residence. Where applicable, we ensure adequate protection through legal safeguards such as data protection agreements or standard contractual clauses.</p>
            </div>

            <h3 class="text-xl font-bold mb-4">9. Your Rights & Choices</h3>
            <div class="mb-3">
                <p>Depending on your location, you may have the right to:</p>
                <ul class="ml-5 list-disc">
                    <li>Access, correct, or delete your personal information</li>
                    <li>Withdraw consent for optional data collection (such as contacts or location)</li>
                    <li>Request a copy of your data or restrict certain processing activities</li>
                </ul>
                <p class="mt-3">To exercise these rights, contact <a href="mailto:help@DgnRavePay.com" class="text-blue-600 hover:text-blue-800">help@DgnRavePay.com</a>.</p>
            </div>

            <h3 class="text-xl font-bold mb-4">10. Children's Privacy</h3>
            <div class="mb-3">
                <p>Our Services are intended for users aged 18 and older. We do not knowingly collect or store information from minors. If such data is identified, it will be deleted promptly.</p>
            </div>

            <h3 class="text-xl font-bold mb-4">11. Policy Updates</h3>
            <div class="mb-3">
                <p>We may revise this Privacy Policy periodically. Material updates will be posted on this page and, where appropriate, communicated through in-app notifications.</p>
            </div>

            <h3 id="loan-services" class="text-xl font-bold mb-4">12. Lender Information & Regulatory Compliance</h3>
            <div class="mb-3">
                <p class="mb-3">DgnRavePay loan services available within the DgnRavePay mobile application are provided by:</p>
                <p class="mb-3">
                    <strong>DgnRavePay Technologies Ltd</strong><br>
                    Registered in Nigeria<br>
                    Address: No. 4, Bashiru Olusesi Street, off Conservation Road, Lekki Phase 2, Lagos State.
                </p>
                <p class="mb-3">DgnRavePay Technologies Ltd is the licensed lender responsible for offering and managing loan products within the DgnRavePay app.</p>
                <p class="mb-3"><strong>Regulatory Authorisation:</strong></p>
                <p class="mb-3">DgnRavePay Technologies Ltd holds the required authorisations to offer digital lending services in Nigeria, including:</p>
                <ul class="space-y-2 ml-5 list-disc">
                    <li class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-primary mt-1 flex-shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        <div>
                            <a href="{{ asset('docs/FCCPC APPROVAL DGNRAVEPAY.pdf') }}" target="_blank" class="text-gray-700 hover:text-primary underline">FCCPC Approval for Digital Lending</a>
                            <p class="text-sm text-gray-500 mt-1">Reference No: FCCPC/DSI/INV/ML/605</p>
                            <p class="text-sm text-gray-500">Issued: 16 June 2025</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-primary mt-1 flex-shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        <div>
                            <a href="{{ asset('docs/DgnRavePay Loan License Document 176.pdf') }}" target="_blank" class="text-gray-700 hover:text-primary underline">Money Lender's License</a>
                            <p class="text-sm text-gray-500 mt-1">License No: MLA/WZ2/1542025</p>
                            <p class="text-sm text-gray-500">Issued by: Magistrate of Abuja, Magisterial District</p>
                            <p class="text-sm text-gray-500">Issued: 20th May 2025</p>
                        </div>
                    </li>
                </ul>
                <p class="mb-3">These documents authorise DgnRavePay to operate loan services in accordance with Nigerian financial and consumer protection regulations.</p>
                <p>All lending operations, data collection, and loan decision processes are carried out solely by DgnRavePay Technologies Ltd.</p>
            </div>

            <h3 class="text-xl font-bold mb-4">13. Contact Us</h3>
            <div class="mb-3">
                <p>If you have questions or requests regarding this Privacy Policy, please contact:</p>
                <ul class="ml-5 list-disc mt-3">
                    <li><strong>Email:</strong> <a href="mailto:help@DgnRavePay.com" class="text-blue-600 hover:text-blue-800">help@DgnRavePay.com</a></li>
                    <li><strong>Address:</strong> DgnRavePay HQ, No. 4, Bashiru Olusesi Street, off Conservation Road, Lekki Please 2, Lagos State.</li>
                </ul>
            </div>
        </div>
        
    </x-guest-layout>