<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){
        return view("auth.register");
    }
    public function handleRegister(RegisterRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->userName = $request->userName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::login($user);
        return redirect()->route('home');
    }
    public function loginForm(){
        return view('auth.login');
    }
    public function handleLogin(LoginRequest $request){
        $user = User::where('email' , $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect()->route('home');
        }else{
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('loginForm');
    }
}
