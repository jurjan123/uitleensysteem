<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MessageRequest;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    public function index(){
        return view("auth.login");
    }

    public function store(LoginRequest $request):RedirectResponse{
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        } else{
            return back();
        }
    }

    public function contact(){
        return view("contact");
    }

    public function storeContact(MessageRequest $request){
        $message = new Message;
        $message->name = $request->name;
        $message->email = Auth::user()->email;
        $message->subject = $request->subject;
        $message->message = $request->message;

        $message->save();
        return redirect()->route("index");
    }

    public function categoryView(){
        $categories = Category::latest()->paginate(9);
        return view("categories.index", compact("categories"));
        $url = route('category.show', ['category' => 'technology']);
    }

    public function categoryShow(Request $request, $category){
        
        $categories = Category::where("title", $category)->latest()->paginate(10);
       // Category::exists() ? $message = "" : $message = "Hier is niks te zien";
        foreach($categories as $category){
            $products = $category->products;
        }

        
        return view("categories.show", compact("products"));
    }

    public function cart(Request $request){
        $products = Product::all();
        $cart = $request->session()->get("cart", []);
        $articles = $request->session()->get("articles");
        $subtotal = $request->session()->get("subtotal");
        
        return view("cart", compact("products", "cart", "articles", "subtotal"));
    }
}
