<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }} <b>{{$user->username}}</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="post" action="{{ route('admin.users.update', $user) }}">

                        @csrf
                        @method("PUT")

                        <div>
                            <x-label for="username" :value="__('Username')" />
                            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="$user->username" autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="firstname" :value="__('Firstname')" />
                            <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="$user->firstname" />
                        </div>

                        <div class="mt-4">
                            <x-label for="surname" :value="__('Surname')" />
                            <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="$user->surname" />
                        </div>

                        <div class="mt-4">
                            <x-label for="phone" :value="__('Phone')" />
                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$user->phone" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$user->email" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />
                            <x-input id="password" class="block mt-1 w-full" type="text" name="password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="role" :value="__('Role')" />
                            <select id="role" name="role">
                                <option value="User" {{ ($user->role->name == "User" ? "selected":"") }}>User</option>
                                <option value="Admin" {{ ($user->role->name == "Admin" ? "selected":"") }}>Admin</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
