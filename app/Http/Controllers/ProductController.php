<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10);
        return view("admin.products.index", compact("products"));
    }

    public function create(){
        return view("admin.products.create");
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

        $product->save();
        return redirect()->route("admin.products.index");
    }

    public function edit(Product $product){
        return view("admin.products.edit", compact("product"));
    }

    public function update(ProductRequest $request, Product $product){
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

        $product->update();
        return redirect()->route("admin.products.index");
    }

    public function delete(Product $product){
        $product->delete();
        return back();
    }
}
