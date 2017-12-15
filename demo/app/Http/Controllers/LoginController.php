<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            $user = User::where('email',$request->email)->first();
            if($user->isAdmin()){
                    return redirect()->intended('product/viewProduct');
            }
                    return redirect()->intended('home');
        }

        return redirect()->back();
    }
}
