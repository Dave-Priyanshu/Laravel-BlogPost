<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //register user
    public function register(Request $request){
        //validate
        $feilds = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required','max:255','email','unique:users'],
            'password' => ['required', 'min:3','confirmed'],
        ]);

        //Register
        $User = User::create($feilds);

        //Login
        Auth::login($User);

        //Redirect
        return redirect()->route('home');
    }
}
