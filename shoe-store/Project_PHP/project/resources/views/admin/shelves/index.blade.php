<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shelves') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($shelves->isEmpty())
                        <p class="p-6">Product is not available</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Shelf ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Size
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Save changes
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($shelves as $shelf)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $shelf->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $shelf->size}}</div>
                                    </td>
                                    <form method="post" action="{{ route('shelves.update',['product' => $product, 'shelf' => $shelf]) }}">
                                    <td class="px-6 py-4 whitespace-nowrap">

                                            @csrf
                                            @method("PUT")

                                            <div class="text-sm text-gray-500">
                                                <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="$shelf->amount"/>
                                            </div>


                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <x-button class="ml-4">Save</x-button>
                                    </td>
                                    </form>
                                    <td>
                                        <form method="post" action="{{ route('shelves.destroy', ['product' => $product, 'shelf' => $shelf]) }}">

                                            @csrf
                                            @method("DELETE")

                                            <x-button class="ml-4">
                                                {{ __('Delete') }}
                                            </x-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
                <a class="text-sm text-gray-600 hover:text-gray-900 create-a" href="{{ route('shelves.create', $product) }}">
                    <x-button class="ml-4 create-b">
                        {{ __('Add') }}
                    </x-button>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
