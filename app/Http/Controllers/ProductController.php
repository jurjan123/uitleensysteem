<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with("categories")->latest()->paginate(10);
        return view("admin.products.index", compact("products"));
    }

    public function create(){
        $categories = Category::all();
        return view("admin.products.create", compact("categories"));
    }

    public function store(ProductRequest $request){
        $product = new Product;
        $product->title = $request->title;
        $product->description = strip_tags($request->description);
        $product->max_lease = $request->max_lease;
        $product->warranty = $request->warranty;
        $product->barcode_number = $request->barcode_number;

        if($request->hasFile("image")){
            $image_name = time() . "." . $request->image->extension();
            $request->image->move(public_path("images/"), $image_name);
            $product->image = $image_name;
        }

        if($product->category_id != null){
            $product->category_id = (int)$request->category_id;    
            } else{
                $product->category_id = null;
            }

        $product->save();
        return redirect()->route("admin.products.index");
    }

    public function edit(Product $product){
        $categories = Category::all();
        $product->category_id != null ? $categoryname = $product->categories->title : $categoryname = "";  
        return view("admin.products.edit", compact("product", "categories", "categoryname"));
    }

    public function update(ProductRequest $request, Product $product){
        //dd($request);
        $product->title = $request->title;
        $product->description = strip_tags($request->description);
        $product->max_lease = $request->max_lease;
        $product->warranty = $request->warranty;
        $product->barcode_number = $request->barcode_number;

        if($request->category_id != null){
            $product->category_id = (int)$request->category_id;    
            } else{
                $product->category_id = null;
            }

        if($request->hasFile("image")){
            $image_name = time() . "." . $request->image->extension();
            $request->image->move(public_path("images/"), $image_name);
            $product->image = $image_name;
        }

        $product->update();
        return redirect()->route("admin.products.index");
    }

    public function delete(Product $product){
        $product->delete();
        return back();
    }
}
