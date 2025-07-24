<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $name = 'Amelia pond';
        // $age = 23;
        // $posts_list = ['article 1','article 2','article 3'];
        // return view('posts.index', ['username' => $name , 'age' => $age]); // resources/views/posts/index.blade.php
        // return view('posts.index', compact('name', 'age','posts_list'));  // resources/views/posts/index.blade.php

        $posts = Post::all();
        return view('posts.index',compact('posts')); //=['post]
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //로그인 하지 않은 자를 로그인 화면에 던짐
        if (!auth()->check()) {
            return to_route('login');
        }
        return view('posts.create'); //resoures/views/posts/create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Post::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        // ]);
        
        $validated = $request->validate([
            'title' => ['required','min:3',"max:200"],
            'content'=>['required','min:5'],
        ]);

        $validated['user_id'] = auth()->id(); // 현재 로그인한 사용자의 ID를 추가
        Post::create($validated);
        // auth()->user()->posts()->create($validated);

        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Post $post)
    // {
    //     //
    //     return view('posts.show',compact('post'))
    // }
    //일단 데이터가 없으니까 화면만 나오도록 아래와 같이 설정
    public function show(Post $post)
    {
        //
        // $post = Post::findOrFail($id); //이렇게 직접 $id로 받는 것보다 Post로 모델을 직접 받는 게 좋다
        return view('posts.show', compact('post'));
    }
    
    /**
     * Show the form for editing the specified resource.
    */
        public function edit(Post $post)
        {   
            return view('posts.edit', compact('post'));

        }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required','min:3',"max:200"],
            'content'=>['required','min:5'],
        ]);
        $post->update($validated);
        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }
}
