<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EditorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::redirect('/','posts');

Route::resource('posts',PostController::class);

Route::get('/{user}/posts',[DashboardController::class,'userPosts'])->name('posts.user');

Route::middleware('auth')->group(function(){

    //dashboard route
    Route::get('/dashboard',[DashboardController::class,'index'])->middleware('verified')->name('dashboard');
    
    //logout
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

    //email verificaiton notice route
    Route::get('/email/verify',[AuthController::class,'verifyNotice'])->name('verification.notice');

    //email verification handler
    Route::get('/email/verify/{id}/{hash}', [AuthController::class,'verifyEmail'])->middleware('signed')->name('verification.verify');

    //Resending the Verification Email
    Route::post('/email/verification-notification', [AuthController::class,'verifyhandler'])->middleware( 'throttle:6,1')->name('verification.send');
});

Route::middleware('guest')->group(function() {

    // display register form only & get form data
    Route::view('/register','auth.register')->name('register');
    Route::post('/register',[AuthController::class,'register']);
    
    Route::view('/login','auth.login')->name('login');
    Route::post('/login',[AuthController::class,'login']);
});

Route::get('/editor', function(){
    return view('editor');
});

Route::get('/about', function () {
    return view('about');
});


//google login page
Route::get('/googlelogin', function () {
    return view('googleLogin');
})->name('googlelogin');

// ! dashboard chart route
// Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

// Route::get('/editor', [EditorController::class, 'show']);
