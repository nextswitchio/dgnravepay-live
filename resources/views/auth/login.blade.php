<x-guest-layout>
    <section class="min-h-screen pt-24 lg:pt-28 flex items-center">
        <div class="container mx-auto  px-5 md:px-10 w-full">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <!-- Visual/Brand panel -->
                <div class="hidden lg:block">
                    <div class="relative overflow-hidden rounded-3xl shadow-xl ring-1 ring-black/5">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary to-primary-2 opacity-90"></div>
                        <img src="{{ Vite::asset('resources/images/phone-mockup-dark.png') }}" alt="App preview"
                            class="relative z-10 w-full object-cover mix-blend-multiply">
                        <div class="absolute z-20 inset-0 p-8 flex flex-col justify-end text-primary-3">
                            <img src="{{ Vite::asset('resources/images/logo wide white.png') }}" alt="DgnRavePay"
                                class="h-8 mb-4 opacity-80">
                            <h2 class="text-white/95 text-3xl font-semibold leading-tight">Welcome back</h2>
                            <p class="text-white/80 mt-2">Sign in to manage your accounts, cards and payments in one
                                place.</p>
                        </div>
                    </div>
                </div>

                <!-- Auth form card -->
                <div>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="bg-white/80 backdrop-blur-sm shadow-2xl ring-1 ring-black/5 rounded-2xl p-6 sm:p-8">
                        <div class="mb-6">
                            <h1 class="text-2xl font-semibold">Log in</h1>
                            <p class="text-gray-500 mt-1">Don't have an account?
                                <a href="{{ route('register') }}"
                                    class="text-primary hover:underline font-medium">Create one</a>
                            </p>
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="space-y-5">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email address')" class="text-gray-700" />
                                <x-text-input id="email" name="email" type="email" :value="old('email')" required
                                    autofocus autocomplete="username"
                                    class="block mt-1 w-full rounded-xl border-gray-200 focus:border-primary focus:ring-primary/40" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div>
                                <div class="flex items-center justify-between">
                                    <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}"
                                            class="text-sm text-primary hover:underline">Forgot?</a>
                                    @endif
                                </div>

                                <x-text-input id="password" name="password" type="password" required
                                    autocomplete="current-password"
                                    class="block mt-1 w-full rounded-xl border-gray-200 focus:border-primary focus:ring-primary/40" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="flex items-center justify-between">
                                <label for="remember_me" class="inline-flex items-center gap-2 text-gray-600">
                                    <input id="remember_me" type="checkbox" name="remember"
                                        class="rounded-md border-gray-300 text-primary focus:ring-primary/40">
                                    <span class="text-sm">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="pt-2">
                                <button type="submit"
                                    class="w-full inline-flex justify-center items-center gap-2 rounded-xl bg-primary text-primary-3 font-semibold py-3 shadow hover:brightness-95 transition focus:outline-none focus:ring-2 focus:ring-primary/40">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
