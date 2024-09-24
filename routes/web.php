<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EditorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// !long way 
// Route::get('/', function () {
//     return view('posts.index');
// })->name('home');

//! simple way if you only wanted to return a view file
Route::view('/','posts.index')->name('home');

// display register form only & get form data
Route::view('/register','auth.register')->name('register');
Route::post('/register',[AuthController::class,'register']);


Route::get('/editor', function(){
    return view('editor');
});

Route::get('/about', function () {
    return view('about');
});


// ! dashboard chart route
// Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

// Route::get('/editor', [EditorController::class, 'show']);
