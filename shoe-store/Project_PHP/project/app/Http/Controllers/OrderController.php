<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!(Auth::check())){
            return redirect('/');
        }

        $products = User::find(Auth::id())->cart->products;

        $order = new Order();
        $order->user_id = Auth::id();
        $order->save();


        foreach ($products as $p) {

            DB::table('order_products')->insert([
                'order_id' => $order->id,
                'product_id' => $p->id,
                'tot_price' => $p->pivot->total_product_price,
                'tot_amount' => $p->pivot->total_product_amount
            ]);
        }


        return view("orders.show", ['order' => $order,'products'=>$products]);


    }

    public function withoutLoginIndex($cart){
        if($cart == NULL){
            return redirect('/');
        }
        $products=Cart::find($cart)->products;

        $order = new Order();
        $order->user_id = null;
        $order->save();

        foreach ($products as $p) {

            DB::table('order_products')->insert([
                'order_id' => $order->id,
                'product_id' => $p->id,
                'tot_price' => $p->pivot->total_product_price,
                'tot_amount' => $p->pivot->total_product_amount
            ]);
        }

        return view("orders.show", ['order' => $order,'products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    public function showProducts($ord_id){

        $order_products=OrderProduct::where('order_id',$ord_id)->get();
        $products=array();
        foreach ($order_products as $o){
            array_push($products,Product::where('id',$o->product_id)->get());
        }
       return view('orders.showProducts',['products'=>$products]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
