<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $reviews = $product->reviews()->where('product_id', $product->id)->get();
        $list='';
        return view('reviews.index', compact('product', 'reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {

        $user_idd=Auth::id();
        $product2=$product->id;
        $czyjest = Review::query()->where('user_id', $user_idd)->where('product_id',$product2)->count();
        if($czyjest>0){


               return Redirect::back()->withErrors(['msg'=>"Sorry,you cannot add a review,you have already posted a comment about this product"]);
        }
        else{

            return view('reviews.create', ['product'=>$product]);
        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);
        $product = Product::query()->where('id', $product_id)->first();

        $review = new Review;
        $review->author=Auth::user()->username;
        $review->title = $request->title;
        $review->text = $request->text;
        $review->user_id= Auth::id();

        $p = $product->reviews()->save($review);

       return redirect()->route('products.reviews.index',compact('product'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Review $review)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
