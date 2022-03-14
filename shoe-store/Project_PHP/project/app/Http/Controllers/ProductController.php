<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function index(){

    }
    public function women()
    {


        $products = Product::ofType('Women')->whereHas('shelves', function($query){
            $query->where('amount','>',0);
        })->get();
        return view('products.index', ['products' => $products]);
    }

    public function men()
    {
        $products = Product::ofType('Men')->whereHas('shelves', function($query){
            $query->where('amount','>',0);
        })->get();
        return view('products.index', ['products' => $products]);

    }

    public function search(Request $request, $category){

        $this->validate($request, [
            'brand' => 'required',
            'type' => 'required',
            'size' => 'required',
        ]);
        $products = Product::ofType(ucfirst($category))->whereHas('shelves',function($query) use ($request){
            $query->where('size',$request->size)
                ->where('brand',$request->brand)
                ->where('type',$request->type);
        })->get();
        return view('products.search', ['products' => $products, 'category'=>$category]);

    }

    public function show(Product $product)
    {
        $category=strtolower($product->category->name);

        return view('products.show')->withProduct($product)->withCategory($category);
    }
    public function store(){


    }

}
