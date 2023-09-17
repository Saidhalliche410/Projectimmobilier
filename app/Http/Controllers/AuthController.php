<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
     return view('auth.login');
    }
    public function dologin(LoginRequest $request){
                   $donnes=$request->validated();
                   if(Auth::attempt($donnes)){
                       $request->session()->regenerate();
                       return redirect()->intended(route('admin.property.index'));
                   }
                   return back()->withErrors([
                     'email'=>'Identifiant inccorecte'
                   ])->onlyInput('email');
    }
    public function logout(){
Auth::logout();
return to_route('login')->with('success','Vous etes maintenant déconnécté');
    }
}
