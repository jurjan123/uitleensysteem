<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->paginate(10);
        return view("admin.categories.index", compact("categories"));
    }

    public function create(){
        return view("admin.categories.create");
    }

    public function store(CategoryRequest $request){
        $category = new Category;
        $category->title = $request->title;
        $category->description = strip_tags($request->description);

        if($request->hasFile("image")){
            $image_name = time() . "." . $request->image->extension();
            $request->image->move(public_path("images/"), $image_name);
            $category->image = $image_name;
        }

        $category->save();
        return redirect()->route("admin.categories.index");
    }

    public function edit(Category $category){
        return view("admin.categories.edit", compact("category"));
    }

    public function update(CategoryRequest $request, Category $category){
        $category->title = $request->title;
        $category->description = strip_tags($request->description);
        
        if($request->hasFile("image")){
            $image_name = time() . "." . $request->image->extension();
            $request->image->move(public_path("images/"), $image_name);
            $category->image = $image_name;
        }

        $category->update();
        return redirect()->route("admin.categories.index");

    }

    public function delete(Category $category){
        $category->delete();
        return back();
    }
}
