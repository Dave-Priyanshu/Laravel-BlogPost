<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EditorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\admin\UserController;
use App\Http\Middleware\RedirectIfAdmin;
use App\Http\Middleware\RedirectIfUser;

// Redirect from root to posts
Route::redirect('/', 'posts');

// Resource routes for posts
Route::resource('posts', PostController::class);

// User's posts route
Route::get('/{user}/posts', [DashboardController::class, 'userPosts'])->name('posts.user');

// Admin side routes
Route::middleware(['auth', 'admin', 'redirectIfUser'])->group(function() {
    Route::view('/admin-dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::get('/admin-users', [UserController::class, 'showUsers'])->name('admin.users');
    Route::get('/admin-users-posts', [UserController::class, 'showPosts'])->name('admin.posts');
    Route::patch('/admin/users/{user}/toggle', [UserController::class, 'toggleAdmin'])->name('admin.toggleAdmin');
    Route::get('/{user}/singlepost', [UserController::class, 'userPost'])->name('adUser.post');
    Route::delete('/admin/posts/{id}',[UserController::class,'destroy'])->name('admin.posts.destroy');

    // Admin email verification routes
    Route::get('/admin/email/verify', [AuthController::class, 'verifyNotice'])->name('admin.verification.notice');
    Route::post('/admin/email/verification-notification', [AuthController::class, 'verifyhandler'])
        ->middleware('throttle:6,1')->name('admin.verification.send');
    Route::get('/admin/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->middleware('signed')->name('admin.verification.verify');

    // Admin password reset routes
    Route::view('/admin/forgot-password', 'auth.admin.forgot-password')->name('admin.password.request');
    Route::post('/admin/forgot-password', [ResetPasswordController::class, 'passwordEmail'])->name('admin.password.email');
    Route::get('/admin/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('admin.password.reset');
    Route::post('/admin/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('admin.password.update');
});

// Routes for authenticated users
Route::middleware('auth')->group(function() {
    // User dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');

    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Email verification routes
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'verifyhandler'])
        ->middleware('throttle:6,1')->name('verification.send');
});

// Routes for guest users
Route::middleware('guest')->group(function() {
    // Display register form and handle form data
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Rules route
    Route::view('/rules', 'rules')->name('rules');

    // Upcoming features route
    Route::get('/upcoming-features', function() {
        return view('upcomingFeatures');
    })->name('upcomingFeatures');

    // Forgot password route
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail']);
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
});

// Other routes
Route::get('/editor', function() {
    return view('editor');
});

Route::get('/about', function() {
    return view('about');
});

// Google login page
Route::get('/googlelogin', function() {
    return view('googleLogin');
})->name('googlelogin');


// ! dashboard chart route
// Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

// Route::get('/editor', [EditorController::class, 'show']);
