<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative mt-1">
                <x-text-input id="password" class="block w-full ps-10"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                <button type="button" id="toggle-password" class="absolute inset-y-0 start-0 grid w-10 place-items-center text-gray-500 hover:text-gray-900" aria-label="Tampilkan password" aria-pressed="false" onclick="togglePassword()">
                    <svg id="password-eye" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z" />
                        <circle cx="12" cy="12" r="2.5" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('register'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __('Create an account') }}
            </a>
            @endif

            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const button = document.getElementById('toggle-password');
            const eye = document.getElementById('password-eye');
            const isVisible = password.type === 'text';

            password.type = isVisible ? 'password' : 'text';
            button.setAttribute('aria-label', isVisible ? 'Tampilkan password' : 'Sembunyikan password');
            button.setAttribute('aria-pressed', String(!isVisible));
            eye.innerHTML = isVisible ?
                '<path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z" /><circle cx="12" cy="12" r="2.5" />' :
                '<path d="m3 3 18 18" /><path d="M10.6 5.2A10.8 10.8 0 0 1 12 5c6 0 9.5 7 9.5 7a17.6 17.6 0 0 1-3.1 3.8M6.2 6.2C3.8 7.8 2.5 12 2.5 12s3.5 7 9.5 7c1.4 0 2.6-.3 3.7-.8" />';
        }
    </script>
</x-guest-layout>
