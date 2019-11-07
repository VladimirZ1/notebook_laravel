<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePost;

class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $posts = Post::where('user_id',Auth::user()->id)->get();
        return view('posts',['posts'=>$posts]);
    }

    public function postGet($id = null)
    {   
        $post = null;
        $posts = Post::where('user_id',Auth::user()->id)->get();
        if ($id) {
            $post = Post::where('id',$id)->first();
            if (!$post) return abort(404);
        } 

        return view('post', ['posts' => $posts, 'post' => $post]);
    }

    public function postSave(StorePost $request)
    { 
        $credentials = $request->only('id','title','post','date');

        if ($credentials['id']) {

            $post = Post::where('id',$credentials['id'])->first();
            $post->title = $credentials['title'];
            $post->post  = $credentials['post'];
            $post->date  = $credentials['date'];
            $post->save();

        } else {

            $post = Post::create([
                'title'   => $credentials['title'],
                'post'    => $credentials['post'],
                'date'    => $credentials['date'],
                'user_id' => Auth::user()->id
            ]);

        }

        return redirect('posts');

    }

     public function postDelete($id = null)
    { 
        Post::where('id',$id)->delete();

        return redirect('posts');
    }
}
