<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers(){

        $users = User::latest()->latest()->paginate(6);

        return view('admin.users',['users'=>$users]);
        
    }

    public function showPosts(){
        $posts = Post::latest()->get();
        return view('admin.posts',['posts'=>$posts]);
    }
    
    public function toggleAdmin(User $user){

        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()->route('admin.users')->with('message','User admin status updated successfully.');
    }

    public function userPost(User $user){
        $userPosts = $user->posts()->with('user')->latest()->paginate(6);
        return view('admin.singlepost',[
            'posts'=> $userPosts,
            'user'=>$user
            ]);
    }

    public function destroy($id){

        //check if the authenticated user is admin
        if(!auth()->user() || !auth()->user()->is_admin){
            return redirect()->route('admin.posts')->with('error','You do not have permission to delete posts.');
        }
        //find the post by id
        $post = Post::find($id);

        if($post){
            $post->delete();
            // Redirect with success message
            return redirect()->route('admin.posts')->with('success', 'Post deleted successfully.');
        }
        // Redirect with error message if not found
        return redirect()->route('admin.posts')->with('error', 'Post not found.');
    }
}

