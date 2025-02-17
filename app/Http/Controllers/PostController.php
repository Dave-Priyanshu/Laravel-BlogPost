<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Mail\WelcomeMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements HasMiddleware
{

    public static function middleware():array
    {
        return([
            new Middleware(['auth','verified'],except:['index','show']),
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $posts = Post::orderBy('created_at','desc')->get();
        $posts = Post::latest()->paginate(6);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //vadlidate
        $request->validate([
            'title'=>['required','max:255'],
            'body'=>['required'],
            'image'=>['nullable','file','max:3000','mimes:png,jpg,webp']
            ]);
        
        //store image 
        $path =null;
        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('/posts_images',$request->image);
        }

        //create post
        $post = Auth::user()->posts()->create([
            'title'=>$request->title,
            'body'=>$request->body,
            'image'=>$path
       ]);

       // send email
       Mail::to(Auth::user())->send(new WelcomeMail(Auth::user(),$post));
        //redirect user to dashboard
        return back()->with('success','Your post was created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('modify',$post);
        
        return view('posts.edit',['post'=>$post]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('modify',$post);
        //vadlidate
        $fields = $request->validate([
            'title'=>['required','max:255'],
            'body'=>['required'],
            'image'=>['nullable','file','max:3000','mimes:png,jpg,webp']
            ]);

        //store image 
        $path =$post->image ?? null;
        if($request->hasFile('image')){
            if($post->image){
                Storage::disk('public')->delete($post->image);
            }
            $path = Storage::disk('public')->put('/posts_images',$request->image);
        }
            
            //Update post
            $post->update([
                'title'=>$request->title,
                'body'=>$request->body,
                'image'=>$path
           ]);
            
            //redirect user to dashboard
            return redirect()->route('dashboard')->with('success','Your post is updated successfully');
        }
        
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Post $post)
        {
            // dd('ok');
            Gate::authorize('modify',$post);

            //delete post image
            if($post->image){
                Storage::disk('public')->delete($post->image);
            }
            $post->delete();

        return back()->with('delete','Your post is deleted.');
    }
}
