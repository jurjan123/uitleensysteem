<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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

    public function storeContact(){
        
    }
}
