<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-sm">
            <!-- Logo -->
            <div class="text-center mb-6">
                <div class="inline-block leading-tight">
                    <div class="text-4xl font-extrabold">
                        <span class="text-orange-600">m.</span>
                        <span class="text-black">guest</span>
                    </div>
                    <div class="text-black text-xl font-light -mt-1">pro</div>
                </div>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf


                <!-- Email -->
                <div class="mb-4">
                    <x-text-input
                        type="email"
                        name="email"
                        placeholder="E-mail"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-200 focus:border-blue-200 focus:shadow-sm focus:shadow-blue-100"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Password"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-200 focus:border-blue-200 focus:shadow-sm focus:shadow-blue-100"
                        required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


                <!-- Login Button -->
                <div class="mb-4">
                    <x-primary-button type="submit"
                        class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold py-2 px-4 rounded flex justify-center items-center">
                        Login
                    </x-primary-button>
                </div>

                <!-- Forgot Password -->
                <div>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sky-600 hover:underline text-sm">
                        Forgot the password?
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- <form method="POST" action="{{ route('login') }}">
        @csrf

        Email Address -->
    <!-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> -->

    <!-- Password -->
    <!-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> -->

    <!-- Remember Me -->
    <!-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> -->

    <!-- <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> -->
</x-guest-layout>