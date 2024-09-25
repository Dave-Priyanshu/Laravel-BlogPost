<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

        event(new Registered($User));
        

        //Redirect
        // return redirect()->route('posts.index');
        return redirect()->route('dashboard');

    }

    //email verification
    public function verifyNotice(){
        return view('auth.verify-email');
    }
    
    //email verification handler
    public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect()->route('dashboard');
    }

     //Resending the Verification Email
     public function verifyhandler(Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
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
