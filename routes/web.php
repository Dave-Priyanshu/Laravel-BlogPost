<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EditorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::redirect('/','posts');

Route::resource('posts',PostController::class);

Route::get('/{user}/posts',[DashboardController::class,'userPosts'])->name('posts.user');


//routes for auth users
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


//route for guest users
Route::middleware('guest')->group(function() {
    
    // display register form only & get form data
    Route::view('/register','auth.register')->name('register');
    Route::post('/register',[AuthController::class,'register']);
    
    Route::view('/login','auth.login')->name('login');
    Route::post('/login',[AuthController::class,'login']);

    //forgot password route
    Route::view('/forgot-password','auth.forgot-password')->name('password.request');

    //Handling the Form Submission
    Route::post('/forgot-password', [ResetPasswordController::class,'passwordEmail']);

    Route::get('/reset-password/{token}', [ResetPasswordController::class,'passwordReset'])->name('password.reset');


    Route::post('/reset-password',[ResetPasswordController::class,'passwordUpdate'])->name('password.update');
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
