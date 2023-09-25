<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index(){
        return view("auth.register");
    }

    public function store(RegisterRequest $request){
        $user = new User;
        $user->first_name = $request->first_name;
        $user->preposition = $request->preposition;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone_number = "0615660810";
        
        $user->save();
        event(new Registered($user));
        Auth::login($user);
        return redirect()->intended(RouteServiceProvider::HOME);
    }


}
