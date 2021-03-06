<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = array(
            'title' => 'Welcome to our blog!',
            'subtitle' => 'Keep with our latest news',
        );

        // -----
        $posts = Post::latest();

       if ($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

       if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->paginate(5);

        // Above can be refactored as:
        // $posts = Post::latest()
        //     ->filter(request(['month', 'year']))
        //     ->get();

        return view('posts.index', compact('banner', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $banner = array(
            'title' => '',
            'subtitle' => 'Dont forget to replace me later',
        );

        return view('posts.show', compact('post', 'banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
