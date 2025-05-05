<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-sm">
            <!-- Profile Image -->
            <div class="flex justify-center mb-6">
                <div class="w-28 h-28 bg-gray-100 flex items-center justify-center rounded">
                    <img id="profile-img"
                        class="w-16 h-16 text-gray-600"
                        src="{{ asset('images/avatar.png') }}"
                        alt="Profile Image">
                </div>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Reset Password Form -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-text-input id="email"
                        class="block w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-200 focus:border-blue-200"
                        type="email"
                        name="email"
                        placeholder="E-mail"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Reset Password Button -->
                <div class="flex flex-col gap-3 mt-4">
                    <x-primary-button class="w-full bg-[#5d8ea7] hover:bg-[#507e94] text-white font-semibold py-2 px-4 rounded">
                        {{ __('Reset Your Password') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Cancel Button (outside the form) -->
            <div class="mt-4">
                <a href="{{ route('login') }}">
                    <x-primary-button class="w-full bg-[#5d8ea7] hover:bg-[#507e94] text-white font-semibold py-2 px-4 rounded">
                        {{ __('Cancel') }}
                    </x-primary-button>
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
