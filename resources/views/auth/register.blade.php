<x-guest-layout>
    <x-auth-card>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="first_name" :value="__('First Name')" />
                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                    placeholder="Peter" autofocus />
                @error('first_name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                    placeholder="Doe" autofocus />
                @error('last_name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    placeholder="peterdoe@example.com" />
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                    placeholder="*********" autocomplete="new-password" />
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="*********"
                    name="password_confirmation" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button class="ml-4 bg-gradient-to-tr">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
