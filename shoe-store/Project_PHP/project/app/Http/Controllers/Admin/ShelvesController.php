<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shelf;
use App\Models\Category;
use Illuminate\Http\Request;

class ShelvesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $shelves = Shelf::where('product_id', $product->id)->get();
        return view('admin.shelves.index')->with('product', $product)->with('shelves', $shelves);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.shelves.create')->withProduct($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'size' => ['required', 'integer','between:37,43'],
            'amount' => ['required', 'integer']
        ]);

        $shelf = Shelf::where('product_id',$product->id)->where('size', $request->size)->first();
        if($shelf == ""){
            Shelf::create([
                'product_id' => $product->id,
                'size' => $request->size,
                'amount' => $request->amount
            ]);
        }else{
            $shelf->amount = $shelf->amount + $request->amount;
            $shelf->save();
        }


        return redirect()->route('shelves.index', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Shelf $shelf)
    {
        $request->validate([
            'amount' => ['required', 'numeric']
        ]);

        $shelf->amount = $request->amount;
        $shelf->save();

        return redirect()->route('shelves.index', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Shelf $shelf)
    {
        $shelf->delete();

        return redirect()->route('shelves.index', $product);
    }
}
