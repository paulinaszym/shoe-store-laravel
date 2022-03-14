<x-shop>

    <div class="col-sm-6 container shadow sm:rounded-lg border-gray-100" style="padding: 20px;">

        <div class="clearfix" >
            <h4 style="text-align: center">LIST OF REVIEWS</h4>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @if($reviews->isEmpty())
                    <p class="p-6">No reviews in database.</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Author</span>
                            </th>
                            <th scope="col"
                                class="relative px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Reviews</span>
                            </th>

                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($reviews as $review)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $review->author }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $review->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $review->text }}</div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4 px-4 pb-5">
                <form method="post" action="{{ route('products.reviews.create', $product) }}">
                    @METHOD('get')
                    <button style="color: #4a5568">
                        {{ __('Create new review...') }}
                    </button>
                </form>
                <br>

            </div>

            <div class="backside" style="background:#E6E6FA;padding: 10px 30px; width: 300px;">
                <a href="{{ route('products', ['products' => $product->id])}}">Back to the product...</a>
            </div>


            <div class="error" style="background: #d34343; color: #a0aec0">
                @if($errors->any())
                    <p>{{$errors->first()}}</p>
                @endif
            </div>

        </div>
    </div>
</x-shop>



















