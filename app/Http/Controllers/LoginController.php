<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request){
        // dd($request->all());
        if(Auth::attempt($request->only('email','pn','password'))){
            return redirect('/home');
        }
        return redirect('login');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
