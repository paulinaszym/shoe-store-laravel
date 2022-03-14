<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $women_products = Product::ofType('Women')->get();
        $men_products = Product::ofType('Men')->get();

        return view('admin.products.index')->with('women_products', $women_products)->with('men_products', $men_products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'price' => ['required','integer'],
            'description'=>['required'],
        ]);

        if($request->hasFile('image')){
            $destination_path = 'public/images';
            $img = $request->file('image');
            $img_name = $request->category .'/'. $img->getClientOriginalName();
            $request->file('image')->storeAs($destination_path,$img_name);


            $image= new Image();
            $image->file_name =  $img_name;
            $image->save();
        }else{
            if($request->category == "Women")
                $img_name = "Women/Women.jpg";
            else  $img_name = "Men/Men.jpg";
        }


        $product = new Product();
        $product->brand = $request->brand;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = Category::where('name',$request->category)->get()->first()->id;
        $product->image_id = Image::where('file_name', $img_name)->get()->first()->id;
        $product->save();



        return redirect()->route('admin.products.show', $product);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit')->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'brand' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'price' => ['required','integer'],
            'description'=>['required'],
        ]);

        if($request->hasFile('image')) {
            $destination_path = 'public/images/' . $request->category;
            $img = $request->file('image');
            $img_name = $img->getClientOriginalName();
            $request->file('image')->storeAs($destination_path, $img_name);


            $image = new Image();
            $image->file_name = $request->category . '/' . $img_name;
            $image->save();

            $product->image_id = $image->id;
        }

        $product->brand = $request->brand;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = Category::where('name',$request->category)->get()->first()->id;

        $product->save();

        return redirect()->route('admin.products.show', $product);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
