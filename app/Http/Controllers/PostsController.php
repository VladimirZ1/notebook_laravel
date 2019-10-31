<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('user_id',Auth::user()->id)->get();
        return view('posts',['posts'=>$posts]);
    }

    public function post(Request $request,$id = null)
    {   
        $method = $request->method();

        if ($request->isMethod('get')) {
            $post = null;
            $posts = Post::where('user_id',Auth::user()->id)->get();
            if ($id) {
                $post = Post::where('id',$id)->first();
                if (!$post) return abort(404);
            } 
            return view('post',['posts'=>$posts,'post'=>$post]);
        }

        if ($request->isMethod('post')) {
            $credentials = $request->only('title','post','date');

            $post = Post::create([
                'title'   => $credentials['title'],
                'post'    => $credentials['post'],
                'date'    => $credentials['date'],
                'user_id' => Auth::user()->id
            ]);

            return redirect('posts');;
        }
        
    }
}
