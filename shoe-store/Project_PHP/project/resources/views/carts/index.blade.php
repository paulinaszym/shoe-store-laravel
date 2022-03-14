<x-shop>

    <div class="col-sm-6 container shadow sm:rounded-lg border-gray-100" style="padding: 20px;">

        <div class="clearfix" >

            <h3 style="text-align: center">
                CART
            </h3>
            <hr class="lav">

            @if(!count($products))

                <h5 style="text-align: center">
                    Cart is currently empty
                </h5>
            @else


                <div class="px-6 py-4 whitespace-nowrap" >
                    <a class="button" style="margin-right: 10px" href="{{route("carts.edit",$products[0])}}">Clear cart</a>
                </div>

                <table class="min-w-full bg-white divide-y divide-gray-200">

                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Brand:
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Type:
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Size:
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Total price:
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Total amount:
                    </th>
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
                        <div class="text-sm text-gray-900">{{ $product->pivot->product_size }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $product->pivot->total_product_price }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $product->pivot->total_product_amount }}</div>
                    </td>

                </tr>
            @endforeach
            </table>
            @endif
            <table >
                <tr >
                    <td  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Total price of items:
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap" >
                        <div  class="min-w-full bg-white divide-y divide-gray-200" >{{ $cart->total_price }}</div>
                    </td>

                    <td  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Total amount of items:
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div  class="min-w-full bg-white divide-y divide-gray-200">{{ $cart->total_amount }}</div>
                    </td>
                </tr>
            </table>
          {{--  <table>--}}
            @if(count($products))
            @if (!\Session::has('success'))
                <form method="post" action="{{ route('carts.update', $cart) }}">
                    @csrf
                    @method("PUT")
                    <table>
                    <tr>
                     <td class="px-6 py-4 whitespace-nowrap">
                        <label for="discount">Discount Code:</label>
                        <input type="text" id="discount" name="discount" style="border-width: 2px; " placeholder="Enter..." >
                     </td>
                     <td>
                     <td>
                        <input type="submit" value="Submit" >
                     </td>
                    </tr>
                    </table>
                </form>
            @endif

{{--
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
--}}
                <div class="error" style="background: #d34343; color: white">
                    @if($errors->any())
                        <p>{{$errors->first()}}</p>
                    @endif
                </div>

                @if (\Session::has('success'))
                    <div class="alert alert-success">

                        {!! \Session::get('success') !!}

                    </div>
                @endif

            @if (!(Auth::check()))
                <form method="post" action="{{route("orders.withoutLoginIndex",$cart)}}">
                    @csrf

                    <div>
                        <x-label for="street_address_1" :value="__('Street Address')" />

                        <x-input id="street_address_1" class="block mt-1 w-full" type="text" name="street_address_1" :value="old('street_address_1')"  required  autofocus />
                    </div>
                    <!-- Street Address 2 -->
                    <div>
                        <x-label for="street_address_2" :value="__('Street Address-more info')" />

                        <x-input id="street_address_2" class="block mt-1 w-full" type="text" name="street_address_2" :value="old('street_address_2')"   autofocus />
                    </div>

                    <!-- Zip code -->
                    <div>
                        <x-label for="zip_code" :value="__('Zip code')" />

                        <x-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code')" required  autofocus />
                    </div>

                    <!-- City -->
                    <div>
                        <x-label for="city" :value="__('City')" />

                        <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required  autofocus />
                    </div>

                    <!-- Phone -->
                    <div>
                        <x-label for="phone" :value="__('Phone')" />

                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                    </div>
                    <div><br></div>

                    <x-button  >
                        <a class="button2">Order</a>
                    </x-button>

                </form>
            @endif


            @if ((Auth::check()))
                <div class="px-6 py-4 whitespace-nowrap">

                        <a class="button" href="{{route("orders.index")}}">Order</a>

                </div>
            @endif
            @endif




        </div>
    </div>

</x-shop>

