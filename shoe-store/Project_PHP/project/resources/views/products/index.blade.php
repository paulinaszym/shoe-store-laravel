<x-shop>

    <h3 style="text-align: center; font-size: small">{{$products->count()}} products are available</h3>
    <hr style="width: 100%"/>

    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    {{--  FILTER PANEL --}}
        <form method="post" action="{{ route('products.search', Request::path()) }}">
            @csrf

                <div class="card" style="border-width: 3px; width:250px; float: left; margin-right: 80px; margin-left: 20px;">
                    <article class="card-group-item" style="background-color: lavenderblush">
                        <header class="card-header">
                            <h3 class="title">FILTER</h3>
                        </header>
                    </article>
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Brand</h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="brand" value="lasocki">
                                    <span class="form-check-label">
			    Lasocki
			  </span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="brand" value="deezee">
                                    <span class="form-check-label">
			    Deezee
			  </span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="brand" value="nike">
                                    <span class="form-check-label">
			    Nike
			  </span>
                                </label>
                            </div>
                        </div>
                    </article>

                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Type</h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="boots">
                                    <span class="form-check-label">
			    Boots
			  </span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="sneakers">
                                    <span class="form-check-label">
			    Sneakers
			  </span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="elegant">
                                    <span class="form-check-label">
			    Elegant
			  </span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="high-heels">
                                    <span class="form-check-label">
			    High-heels
			  </span>
                                </label>
                            </div>
                        </div>
                    </article>
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Size</h6>
                        </header>
                        <div class="filter-content">

                                <label for="#size">
                                    <select class="custom-select mr-sm-2 sm:rounded-lg" name="size"
                                            style="border-width: 2px; margin: 20px 65px">
                                        <option value="" >Select:</option>
                                        <option name="size" value="37">37</option>
                                        <option name="size" value="38">38</option>
                                        <option name="size" value="39">39</option>
                                        <option name="size" value="40">40</option>
                                        <option name="size" value="41">41</option>
                                        <option name="size" value="42">42</option>
                                        <option name="size" value="43">43</option>
                                    </select>
                                </label>

                        </div>
                    </article>
                    <div class="submit" style="margin: 20px 50px; padding: 10px 30px;">
                        <button id="but" style="background-color: lavenderblush; border-width: 2px" >SEARCH</button>
                    </div>




            </div>
        </form>


        {{-- PRODUCT --}}

        <div class="border-gray-100" style="float: left">
                @if($products)
                    @foreach($products as $product)
                        <div class="img-container">

                        <img src="{{ asset( 'storage/images/' . $product->image->file_name) }}"
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
