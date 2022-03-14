<x-shop>

    <h3 style="text-align: center; font-size: small">{{$products->count()}} products are available</h3>
    <hr style="width: 100%"/>

    {{--  FILTER PANEL --}}

        <div class="card" style="border-width: 3px; width:250px; float: left; margin-right: 80px; margin-left: 20px;">
            <article class="card-group-item" style="background-color: lavenderblush">
                <header class="card-header">
                    <h3 class="title">FILTER</h3>
                </header>
            </article>
            <div> <br> </div>

            <a href="{{url("/$category")}}" style="text-align:center;padding: 5px; background-color: lavenderblush; border-width: 2px; text-decoration: none">RESET FILTER</a>
            <div> <br> </div>
        </div>



    {{-- PRODUCT --}}

    <div class="border-gray-100" style="float: left">
        @if($products)
            @foreach($products as $product)
                <div class="img-container">

                    <img src="{{ asset( 'storage/images/' . $product->image->file_name)}}"
                         style="width: 380px; height: 300px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"/>

                    <div class="details" style="margin-top: 20px">
                        <h3>{{ $product->brand . ' ' . $product->model }}</h3>
                        <p>PRICE: {{$product->price }}$</p>
                        <a href="{{ route('products.show',$product)}}" style="color: #4a5568">
                            <button class="button-details">
                                Details
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</x-shop>
