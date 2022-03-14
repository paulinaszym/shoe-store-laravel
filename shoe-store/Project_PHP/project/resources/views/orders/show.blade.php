<x-shop>
    <div class="col-sm-6 container shadow sm:rounded-lg border-gray-100" style="padding: 20px;">

        <div class="clearfix" >

            <h3 style="text-align: center">
                THANKS FOR BUYING!
            </h3>
            <hr>


            <h5>Your order number is: {{$order->id}}</h5>
            Hi !
            <div class="details_order">
            Thank you for the order. The order is suspended until the payment is credited.
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
                                <img src="{{ asset( 'storage/images/' . $product->image->file_name) }}"
                                     style="width: 120px; height: 95px; float: left;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
                              0 6px 20px 0 rgba(0, 0, 0, 0.19);"/>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $product->brand }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $product->type }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $product->price }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $product->description }}</div>
                            </td>

                        </tr>

                    @endforeach
                </table>
            <hr>
                <table>
                    <tr>
                        <td style="font-size: 22px; font-weight: bold; color: blueviolet">Bank: </td>
                        <td>ES BANK Bank Spółdzielczy</td>
                    </tr>
                    <tr>
                        <td style="font-size: 22px; font-weight: bold; color: blueviolet">Account number:</td>
                        <td>61 8933 3333 2046 0085 9190 0004</td>
                    </tr>
                </table>
            </div>


        </div>
        <div class="backside" style="background:#E6E6FA;padding: 10px 30px; width: 300px;">
            <a href="{{ route('carts.edit',$products[0])}}">Complete your transaction!</a>
        </div>

{{--
Nie wiadomo jeszcze czy dziala
--}}
      {{--  @if (Auth::check())
        <div class="backside" style="background:#E6E6FA;padding: 10px 30px; width: 300px;">
            <a href="{{ route('dashboard')}}">Go to your account!</a>
        </div>
        @endif--}}


    </div>
</x-shop>
