<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index(){
        if(Auth::id()){
        $cart = User::find(Auth::id())->cart;
        $products=Cart::find($cart->id)->products;
    }
        else {
            $cart=Cart::find(1);
            $products=Cart::find(1)->products;
        }

        return view('carts.index', ['cart'=>$cart, 'products'=>$products]);

    }

    public function store(Request $request, Product $product) //add product to cart
    {
        $row=\App\Models\Shelf::where('product_id', $product->id)->where('size',$request->size)->get();
       if($row->first()->amount < $request->amount){
            return Redirect::back()->withErrors(['msg'=>"We do not have as many pairs of shoes as you want to buy, please reduce the number of pairs"]);
        }

      if(Auth::id()) $cart = User::find(Auth::id())->cart;
        else $cart=Cart::find(1);

        $qty=$request->amount;

        $a=0;
        if($cart->products->contains($product->id)){
            $products=Cart::find($cart->id)->products;
            foreach($products as $p){
                if($p->pivot->product_size==$request->size && $p->pivot->product_id==$product->id ) {
                    $tpp = $p->pivot->total_product_price + ($product->price) * $qty;
                    $tpa = $p->pivot->total_product_amount + $qty;
                    $cart->products()->wherePivot('product_size','=',$request->size)
                        ->wherePivot('product_id','=',$product->id)
                        ->updateExistingPivot($product->id, ['total_product_price' => $tpp, 'total_product_amount' => $tpa]);
                    $a=1;
                    break;
                }
            }
            if($a==0){
                $cart->products()->attach($product->id, ['total_product_price' => ($product->price)*$qty,
                    'total_product_amount' => $qty, 'product_size'=>$request->size]);
            }
        }
        else{
            $cart->products()->attach($product->id, ['total_product_price' => ($product->price)*$qty,
                'total_product_amount' => $qty, 'product_size'=>$request->size]);
        }

        $cart->total_price+=($product->price)*$qty;
        $cart->total_amount+=$qty;
        $cart->save();
        $x=$row->first()->amount-$qty;
        \App\Models\Shelf::where('product_id', $product->id)->where('size',$request->size)->update(['amount' => $x]);
        $product->save();
        $products=Cart::find($cart->id)->products;
        return redirect()->route('carts.index', ['cart' => $cart, 'products'=>$products]);

    }

    public function edit(Product $product){ //delete product from cart
        if(Auth::id()) $cart = User::find(Auth::id())->cart;
        else $cart=Cart::find(1);

        $products2=Cart::find($cart->id)->products;
        foreach($products2 as $p){
            $row=\App\Models\Shelf::where('product_id', $p->pivot->product_id)->where('size',$p->pivot->product_size)->get();
            $x=$row->first()->amount+$p->pivot->total_product_amount;
            \App\Models\Shelf::where('product_id', $p->pivot->product_id)->where('size',$p->pivot->product_size)->update(['amount' => $x]);
            \App\Models\Shelf::where('product_id', $p->pivot->product_id)->where('size',$p->pivot->product_size)->get()->first()->save();
        }
        $cart->total_amount=0;
        $cart->total_price=0;
        $cart->save();

        $products=Cart::find($cart->id)->products;
        $cart->products()->detach($product->id);

        if(Auth::id()) {
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('carts.index', ['cart' => $cart, 'products'=>$products]);
        }
    }

    public function show($cart)
    {
        $products=Cart::find($cart)->products;

        if(!count($products)){
            return Redirect::back()->withErrors(['msg'=>"You have empty cards! Back to main website to buy something! :)"]);
        }
        else{
            $this->edit($products[0]);
                return view("carts.show");
        }

    }


    public function create()
    {
        //
    }



    public function update(Request $request, Cart $cart)
    {

            if (!strcmp($request->discount, "WINTER")) {
                $cart->total_price = $cart->total_price * 0.8;
                $cart->save();
                return redirect()->route('carts.index', ['cart' => $cart])->with('success', 'DISCOUNT CODE ACCEPTED :)');;
            } else {

                return Redirect::back()->withErrors(['msg' => "This code is invalid"]);
            }
    }


    public function destroy(Request $request,Product $product)
    {

    }
}
