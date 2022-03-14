<x-shop>
    <div class="col-sm-6 container shadow sm:rounded-lg border-gray-100" style="padding: 20px;">

        <div class="clearfix" >
            <div class="error" style="background: #d34343; color: white">
                @if($errors->any())
                    <p>{{$errors->first()}}</p>
                @endif
            </div>

            <img src="{{ asset( 'storage/images/' . $product->image->file_name) }}" style="width: 380px; height: 300px; float: left;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"/>
            <form  method="post" action ="{{route('carts.store', $product,Request::path())}}">
                @csrf
            <div class="description" style="float: left; margin: 30px;" >
                <h2>{{ $product->brand . ' ' . $product->model }}</h2>
                <h5 style="font-family: Apple,serif">${{$product->price }}</h5>
               {{-- <p>Quantity available: {{$product->amount}}</p>--}}
                {{-- <p>Size: {{$product->size}}</p>--}}
                <hr>
                <h4>PRODUCT INFO</h4>
                <h6 style="font-size: small">{{ $product->description }}</h6>

                <br>
                <label class='muted'>Quantity:</label>
                <div class="input-amount">
                    <input class="amount" type="number" id="amount" name="amount" value="1"  min="1" max="10" style="background-color:#f6d8df;">
                </div>

                <br>
                <label class='muted'>Select your size: </label>
                <label for="#size">
                    <select class="custom-select mr-sm-2 sm:rounded-lg" id="ddlShoes" name="size" style="background-color:#f6d8df;">
                        <option value="" >Select:</option>
                        @foreach( \App\Models\Shelf::where('product_id', $product->id)->get() as $row)
                            <option id="size" name="size" value="{{$row->size}}">{{$row->size}}</option>
                        @endforeach
                    </select>
                </label>
                <br>
                <br>

                <a href="{{ route('products.reviews.index', $product)}}" style="color: #4a5568; background-color:#d4a8ec; padding: 10px 30px;">SEE OPINIONS</a>
                <br>
                <br>

                <a href="{{ url("/$category") }}" style="background:#E6E6FA;padding: 10px 30px; width: 600px;">Return to products list</a>

            </div>



            <div class="Cart">
                <button class="button-53" role="button" onclick="return Validate()">ADD TO CART</button>
            </div>

                <script type="text/javascript">
                    function Validate() {
                        var ddlShoes = document.getElementById("ddlShoes");
                        if (ddlShoes.value == "") {

                            alert("Please choose shoe size ");
                            return false;
                        }
                        return true;
                    }
                </script>
            </form>

            <br>
            <br>

        </div>


    </div>

</x-shop>
