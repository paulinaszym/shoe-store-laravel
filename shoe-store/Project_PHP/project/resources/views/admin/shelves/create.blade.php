<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creating a new shelf') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="post" action="{{ route('shelves.store',$product) }}">

                        @csrf
                        @method('POST')

                        <div>
                            <x-label for="size" :value="__('Size')" />
                            <x-input id="size" class="block mt-1 w-full" type="number" name="size" min="37" max="43" :value="old('size')" autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="amount" :value="__('Amount')" />
                            <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
