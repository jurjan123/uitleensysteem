<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

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

Route::group(["middleware" => "guest"], function(){
    Route::match(["post", "get"], "/register", [RegisterController::class, "index"])->name("register");
    Route::post("/register/store", [RegisterController::class, "store"])->name("register.store");
});

Route::group(["middleware" => "auth"], function(){
    Route::post("/logout", [UserController::class, "destroy"])->name("logout");

    Route::group(["prefix" => "admin"], function(){

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
        
    });
    
});


