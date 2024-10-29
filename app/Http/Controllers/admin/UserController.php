<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers(){

        $users = User::latest()->get();

        return view('admin.users',['users'=>$users]);
        
    }

    public function showPosts(){
        $posts = Post::latest()->get();
        return view('admin.posts',['posts'=>$posts]);
    }
}
