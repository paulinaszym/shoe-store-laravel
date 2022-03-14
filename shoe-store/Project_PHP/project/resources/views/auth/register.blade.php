<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Username -->
                <div>
                    <x-label for="username" :value="__('Username')" />

                    <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" autofocus />
                </div>

                <!-- Firstname -->
                <div>
                    <x-label for="firstname" :value="__('Firstname')" />

                    <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')"  autofocus />
                </div>

                <!-- Surname -->
                <div>
                    <x-label for="surname" :value="__('Surname')" />

                    <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')"  autofocus />
                </div>

                <!-- Street Address 1 -->
                <div>
                    <x-label for="street_address_1" :value="__('Street Address')" />

                    <x-input id="street_address_1" class="block mt-1 w-full" type="text" name="street_address_1" :value="old('street_address_1')"  autofocus />
                </div>

                <!-- Street Address 2 -->
                <div>
                    <x-label for="street_address_2" :value="__('')" />

                    <x-input id="street_address_2" class="block mt-1 w-full" type="text" name="street_address_2" :value="old('street_address_2')"  autofocus />
                </div>

                <!-- Zip code -->
                <div>
                    <x-label for="zip_code" :value="__('Zip code')" />

                    <x-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code')"  autofocus />
                </div>

                <!-- City -->
                <div>
                    <x-label for="city" :value="__('City')" />

                    <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"  autofocus />
                </div>

                <!-- Phone -->
                <div>
                    <x-label for="phone" :value="__('Phone')" />

                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"  autofocus />
                </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
