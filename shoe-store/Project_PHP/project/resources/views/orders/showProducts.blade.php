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


    <div class="col-sm-6 container shadow sm:rounded-lg border-gray-100" style="padding: 20px;">
        <div class="clearfix" >

            <h4 style="text-align: center">
                YOUR PRODUCTS IN ORDER
            </h4>
            <hr>
    <table>
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
               PHOTO
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                BRAND
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
               TYPE
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
               PRICE
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                DESCRIPTION
            </td>
        </tr>
    @foreach($products as $product)

        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <img src="{{ asset( 'storage/images/' . $product->first()->image->file_name) }}"
                     style="width: 120px; height: 95px; float: left;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
                              0 6px 20px 0 rgba(0, 0, 0, 0.19);"/>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $product->first()->brand }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $product->first()->type }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $product->first()->price }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $product->first()->description }}</div>
            </td>

        </tr>

    @endforeach
    </table>
        </div>

    </div>
</x-app-layout>
