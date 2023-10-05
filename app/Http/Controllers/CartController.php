<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerRequest;
use App\Mail\ConfirmationMail;
use App\Models\Reservation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
   
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $quantity = 1;

        if(!$request->session()->has("cart")){
            $request->session()->put("cart", []);
        }
        
        $cart = $request->session()->get('cart');
        if(!isset($cart[$id])){
            $cart[$id] = [
                "title" => $product->title,
                "warranty" => $product->warranty,
                "quantity" => $quantity,
                "image" => $product->image,
            ];
        } else{
            $cart[$id]["quantity"]++;
        }

        
        
        $subtotal = 0;
        $articles = 0;
        
        foreach($cart as $item => $details){
            $product_total = $details["quantity"] * $details["warranty"]; 
                 // $details["vat"]/100 * ($details["price"] * $details["quantity"]);
           
            $subtotal += $product_total;
            
            $articles += $details["quantity"];
            
        }
       
        $request->session()->put("articles", $articles);
        $request->session()->put("subtotal", $subtotal);
        $request->session()->put('cart', $cart);
        
        return redirect()->route("cart")->with("message", "product toegevoegd");
       
    }

    
   
    public function deleteFromCart(Request $request, $id)
    {
              
        $cart = session()->get('cart');
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            
            $articles = 0;
            $product_total = 0;
            $subtotal = 0;
                
        foreach($cart as $id => $details){
            $product_total = $details["quantity"] * $details["warranty"]; 
            $subtotal += $product_total;
            $articles += $details["quantity"];
        }
                
       
        $request->session()->put("articles", $articles);
        $request->session()->put("subtotal", $subtotal);
       
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product verwijderd uit winkelwagen!');
    }

}
    public function storeOrderData(Request $request)
    {
        $cart = session()->get('cart', []);
        $subtotal = session()->get('subtotal');
       
        $articles = session()->get('articles');
        $ldate = date('Y-m-d H:i:s');

        $reservation = Reservation::create([
            "user_id" => Auth::user()->id,
            "total_warranty" => $subtotal,
            "created_at" => $ldate,
            "updated_at" => $ldate   
        ]);
        $reservation->save();

        foreach($cart as $id => $details){
            DB::table("reservation_details")->insert([
                "reservation_id" => $reservation->id,
                "product_id" => $id,
                "product_name" => $details["title"],
                "product_image" => $details["image"],
                "product_warranty" => $details["warranty"],
                "quantity" => $details["quantity"],
                "total_warranty" => $details["warranty"] * $details["quantity"],
                "created_at" => $ldate,
                "updated_at" => $ldate   
            ]);
        
        }   
       
        $request->session()->forget(["cart",'subtotal','articles',]);
        $request->session()->regenerate();

        return redirect()->route("categories")->with("message", "opgeslagen");

    }

}
