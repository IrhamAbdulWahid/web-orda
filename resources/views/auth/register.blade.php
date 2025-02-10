<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center mb-6">Register</h2>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" class="block text-sm font-medium text-gray-700" />
                    <x-text-input id="name" class="w-full border border-gray-300 p-2 rounded" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />      
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />
                    <x-text-input id="email" class="w-full border border-gray-300 p-2 rounded" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
                    <x-text-input id="password" class="w-full border border-gray-300 p-2 rounded" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-gray-700" />
                    <x-text-input id="password_confirmation" class="w-full border border-gray-300 p-2 rounded" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a class="text-sm text-blue-500 hover:underline" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
