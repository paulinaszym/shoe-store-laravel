<style>
    hr.lav {
       color: lavenderblush;
    }
    .header_text {
        font-family: 'Cinzel', serif;
        font-size: 15px;

    }
</style>

<x-app-layout>
    <x-slot name="header">
            <div class="start_menu">
                <div>
                    <a href="{{ route('mainpage') }}"><img style=" display: block;margin: 10px auto 30px auto;"
                                                           src="{{URL::asset('Images/LOGO.png')}}"
                                                           alt="Shop"/></a>
                </div>
            </div>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="header_text">
                    ACCOUNT INFO
                    </div>
                    <hr class="lav">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Username:
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->username }}</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                First name:
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->firstname }}</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Surname:
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->surname }}</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Phone:
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->phone }}</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                E-mail:
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                            </td>
                        </tr>
                    </table>
                    <br>

                    <div class="header_text">
                        ADDRESS INFO
                    </div>
                    <hr class="lav">
                        <table class="min-w-full divide-y divide-gray-400">
                        <tr>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Street address 1:
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$address->street_address_1}}</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Street address 2:
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$address->street_address_2}}</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Zip code:
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$address->zip_code}}</div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col"
                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                City:
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$address->city}}</div>
                            </td>
                        </tr>
                    </table>
                    <br>
{{--
                    history
--}}
                    <div class="header_text">
                        ORDER HISTORY
                    </div>
                    <hr class="lav">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">ORDER NUMBER</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">DATE</div>
                            </td>

                        </tr>
                       @foreach($orders as $ord)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$ord->id}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$ord->created_at}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('orders.showProducts',$ord->id) }}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <br>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
