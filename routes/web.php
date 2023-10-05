<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name("index");
Route::get("/reserveren", [AuthenticatedSessionController::class, "categoryView"])->name("categories");
Route::get("/reserveren/{category}", [AuthenticatedSessionController::class, "categoryShow"])->name("categories.show");


Route::group(["middleware" => "guest"], function(){
    Route::match(["post", "get"], "/register", [RegisterController::class, "index"])->name("register");
    Route::post("/register/store", [RegisterController::class, "store"])->name("register.store");
    Route::get("/login", [AuthenticatedSessionController::class, "index"])->name("login");
    Route::post("/login/store", [AuthenticatedSessionController::class, "store"])->name("login.store");
});

Route::group(["middleware" => "auth"], function(){
    Route::get("/contact", [AuthenticatedSessionController::class, "contact"])->name("contact");
    Route::post("/storecontact", [AuthenticatedSessionController::class, "storeContact"])->name("contact.store");

    Route::group(["prefix" => "cart"], function(){
        Route::get("/", [AuthenticatedSessionController::class, "cart"])->name("cart");
        Route::post("/add/{id}", [CartController::class, "addToCart"])->name("cart.add");
        Route::delete("/delete/{id}", [CartController::class, "deleteFromCart"])->name("cart.delete");
        Route::post("/update/{productId}", [CartController::class, "updateFromCart"])->name("cart.update");
        Route::get("/order", [CartController::class, "storeOrderData"])->name("cart.order");
    });

    Route::post("/logout", [UserController::class, "destroy"])->name("logout");
    
    Route::group(["prefix" => "admin"], function(){
        Route::get("/", function(){
            return view("admin.index");
        })->name("admin.index");

        Route::group(["prefix" => "users"], function(){
            Route::get("",[UserController::class, "index"])->name("admin.users.index");
            Route::get("/create", [UserController::class, "create"])->name("admin.users.create");
            Route::post("/store", [UserController::class, "store"])->name("admin.users.store");
            
            Route::group(["prefix" => "{user}"], function(){
                Route::match(["post", "get"], "/edit", [UserController::class, "edit"])->name("admin.users.edit");
                Route::put("/", [UserController::class, "update"])->name("admin.users.update");
                Route::delete("/delete", [UserController::class, "delete"])->name("admin.users.delete");
            });
        });

        Route::group(["prefix" => "products"], function(){
            Route::get("/", [ProductController::class, "index"])->name("admin.products.index");
            Route::get("/create", [ProductController::class, "create"])->name("admin.products.create");
            Route::post("/store", [ProductController::class, "store"])->name("admin.products.store");
           
            Route::group(["prefix" => "{product}"], function(){
                Route::delete("/", [ProductController::class, "delete"])->name("admin.products.delete");
                Route::match(["get", "post"],"/edit", [ProductController::class, "edit"])->name("admin.products.edit");
                Route::put("/", [ProductController::class, "update"])->name("admin.products.update");
            });
        });

        Route::group(["prefix" => "categories"], function(){
            Route::get("/", [CategoryController::class, "index"])->name("admin.categories.index");
            Route::get("/create", [CategoryController::class, "create"])->name("admin.categories.create");
            Route::post("/store", [CategoryController::class, "store"])->name("admin.categories.store");

            Route::group(["prefix" => "{category}"], function(){
                Route::delete("/delete", [CategoryController::class, "delete"])->name("admin.categories.delete");
                Route::get("/edit", [CategoryController::class, "edit"])->name("admin.categories.edit");
                Route::put("/", [CategoryController::class, "update"])->name("admin.categories.update");
            });
        });
        
    });
    

    Route::get("session", function(Request $request){
        
        echo "<pre>";
        print_r($request->session()->all()) ;
        echo "</pre>";
        echo "<br><br>";
        echo "<pre>";
        print_r($request->session()->get("products"));
        echo "</pre>";

       
    });

});


