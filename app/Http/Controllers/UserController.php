<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        
        return view("admin.users.index", compact("users"));
    }

    public function create(){
        return view("admin.users.create");
    }

    public function store(StoreUserRequest $request){
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = "0615660810";
        $user->password = $request->password;

        $user->save();
        return redirect()->route("admin.users.index");
    }

    public function edit(User $user){
        return view("admin.users.edit", compact("user"));
    }

    public function update(UpdateUserRequest $request, User $user){
        $user->first_name = $request->first_name;
        $user->preposition = $request->preposition;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        
        if(empty($request->password)){

        }else{
            $user->password = $request->password;
        }

        $user->update();
        return redirect()->route("admin.users.index");
    }

    //delete user
    public function delete(User $user){
        $user->delete();
        return redirect()->back();
    }

    //log out user and destroy session 
    public function destroy(Request $request){
        Auth::guard("web")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
