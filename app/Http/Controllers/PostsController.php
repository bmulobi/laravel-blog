<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public  function index()
    {
//        $posts = Post::all();
        // also available - oldest() ASC
        // $posts = Post::latest()->get(); // DESC

       /* $posts = Post::latest();

        if ($month = request('month')) {
            $posts->whereMonth('created_at', $month);
        }

        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->get();
       */

       $posts = Post::latest()
           ->filter(request(['month', 'year']))
           ->get();

        return view('posts.index', compact('posts'));
    }

//    public  function show($id)
//    {
//        $post = Post::find($id);
//        return view('posts.show', compact('post'));
//    }
    public  function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public  function create()
    {
        return view('posts.create');
    }

    public  function store()
    {
        // can do this outside the controller when you have many fields
        // i.e from request classes in App\Http via cli
        $this->validate(request(),
            [
                'title' => 'required|min:4|max:20',
                'body' => 'required|min:5|max:100'
            ]);

        // dd(request()->all()); request('title') || request('body') || request(['title', 'body'])

        /*$post = new Post;

        $post->title = request('title');
        $post->body = request('body');

        $post->save();

        return redirect('/');
        */

//        Post::create([
//            'title' => request('title'),
//            'body' => request('body'),
//            'user_id' => auth()->id()
//        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash('message', 'New post created');

        return redirect('/');
    }
}
