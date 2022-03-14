<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit a product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="post" action="{{ route('admin.products.update',$product) }}" enctype="multipart/form-data">

                        @csrf
                        @method("PUT")

                        <div>
                            <x-label for="BRAND" :value="__('Brand')" />
                            <x-input id="brand" class="block mt-1 w-full" type="text" name="brand" :value="$product->brand" autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="type" :value="__('Type')" />
                            <x-input id="type" class="block mt-1 w-full" type="text" name="type" :value="$product->type" />
                        </div>

                        <div class="mt-4">
                            <x-label for="price" :value="__('Price $')" />
                            <x-input id="price" class="block mt-1 w-full" type="number" min="0" max="10000000" name="price" :value="$product->price"/>
                        </div>

                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$product->description" />
                        </div>

                        <div class="mt-4">
                            <x-label for="category" :value="__('Category')" />
                            <select id="category" name="category" value="$product->category">
                                <option value="Women">Women</option>
                                <option value="Men">Men</option>
                            </select>
                        </div>


                        <div class="mt-4">
                            <x-label for="image" :value="__('Image')" />
                            <x-input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
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
