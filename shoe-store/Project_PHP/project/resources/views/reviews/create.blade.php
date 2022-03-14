<x-shop>


    <div class="col-sm-6 container shadow sm:rounded-lg border-gray-100" style="padding: 20px;">

        <div class="clearfix" >
            <h2>Adding a review</h2>

            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="post" action="{{ route('products.reviews.store', $product) }}">
                @csrf
                <div>
                    <h4>TITLE</h4>
                    <label for="title" :value="__('Title')" style="border-width: 2px" />
                    <input id="title" type="text" name="title" :value="old('title')"/>
                </div>
                <br>
                <div>
                    <h4>TEXT</h4>
                    <label for="text" :value="__('Text')" style="border-width: 2px"/>
                    <input id="text"  type="text" name="text" :value="old('text')" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <br>
                    <br>
                    <button style="color: #4a5568">
                        {{ __('Add_review') }}
                    </button>
                </div>

            </form>

        </div>

    </div>


</x-shop>
