@section('title', 'Masuk')

<x-guest-layout>
    <div class="lg:min-h-screen flex items-center justify-center p-4 ">
        <div class="w-full lg:w-3/4 lg:max-w-4xl rounded-xl shadow-md flex overflow-hidden">
            <!-- Bagian Logo -->
            <div class="lg:w-1/3 bg-primary lg:flex hidden items-center justify-center p-6">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="w-32 h-32 object-contain" />
            </div>

            <!-- Bagian Form Login -->
            <div class="lg:w-2/3 w-full lg:p-8">
                @if ($errors->any())
                <x-alert.error :errors="$errors->all()" />
                @endif

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <x-card.card-default class="static shadow-none p-0">
                    <x-form action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div>
                            <x-input.input-label for="email" :value="__('Email / Username')" />
                            <x-input.text-input id="email" class="mt-1 w-full" type="text" name="email"
                                :value="old('email')" required autofocus autocomplete="email" />
                            <x-input.input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4" x-data="{ show: false }">
                            <x-input.input-label for="password" :value="__('Password')" />

                            <label class="input text-base-content w-full">
                                <input :type="show ? 'text' : 'password'" id="password" name="password" class="grow"
                                    required autocomplete="current-password" />
                                <button type="button" @click="show = !show" class="ml-2 text-sm">
                                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.993 9.993 0 013.065-4.412M6.4 6.4A9.965 9.965 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.974 9.974 0 01-4.205 5.234M15 12a3 3 0 01-4.65 2.55M9.878 9.878A3 3 0 0115 12m-6 0a3 3 0 003 3m9 6l-18-18" />
                                    </svg>
                                </button>
                            </label>

                            <x-input.input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="mt-4">
                            <x-input.input-label for="remember" class="label cursor-pointer mr-3">
                                <x-input.checkbox name="remember" id="remember" :title="__('Remember Me')" />
                            </x-input.input-label>
                        </div>

                        <div class="mt-4">
                            <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-end gap-4">
                                @if (Route::has('password.request'))
                                <a class="underline text-sm link text-start sm:order-1"
                                    href="{{ route('password.request') }}">
                                    {{ __('Lupa kata sandi?') }}
                                </a>
                                @endif

                                <div class="flex gap-4 sm:order-2 justify-start">
                                    <a class="btn btn-primary btn-soft" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                    <x-button.default-button class="btn-primary" type="submit">
                                        {{ __('Log in') }}
                                    </x-button.default-button>
                                </div>


                            </div>


                        </div>
                    </x-form>
                </x-card.card-default>
            </div>
        </div>
    </div>
</x-guest-layout>
