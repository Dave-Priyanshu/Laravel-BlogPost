<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

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


    //user login
    public function login(Request $request){
        //validate
        $feilds = $request->validate([
            'email' => ['required','max:255','email'],
            'password' => ['required'],
        ]);

        //try to login as user
        if(Auth::attempt($feilds,$request->remember)){
            return redirect()->intended();
        }else{
            return back()->withErrors([
                'failed' => 'The credentials you entered do not match our records. Please double-check your email and password and try again.'
            ]);
        }
    }

    //logout user
    public function logout(Request $request){
        //Logout the user
        Auth::logout();

        //invalidate user's session
        $request->session()->invalidate();
        //regenerate CSRF token
        $request->session()->regenerateToken();
        
        return redirect('/');

    }
}
