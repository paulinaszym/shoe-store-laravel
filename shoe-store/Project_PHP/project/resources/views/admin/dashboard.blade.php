<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Hello Admin! You're logged in!
                </div>
            </div>
        </div>
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.users.index') }}">
                <x-button class="ml-4">
                {{ __('Users managment') }}
                </x-button>
            </a>
            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.products.index') }}">
                <x-button class="ml-4">
                    {{ __('Products managment') }}
                </x-button>
            </a>


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <br>
                <b>Statistics</b>
                <br>
                Number of users:
                {{$users->count()}}
                <br><br>
                Number of users registered today:
                {{$todays_users->count()}}
                <br><br>
                Number of orders made today:
                {{$orders->count()}}
                <br><br>
                Number of products sold today:
                {{$products_amount}}
                <br><br>
                Revenue from today's orders:
                <b>{{$orders_value}} $</b>

            </div>

        </div>
    </div>
</x-app-layout>
