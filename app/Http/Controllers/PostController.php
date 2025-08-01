<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $posts = Post::all(); // 모든 게시글을 가져와서 posts.index 뷰에 전달
        $posts = Post::paginate(4);
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
        // 파일 업로드 처리
        if ($request->hasFile('file_input')) {
            $validated['uploadedFiles'] = $request->file('file_input')->store('uploads', 'public'); // 'uploads' 디렉토리에 저장

            // $file = $request->file('file_input');
            // $filePath = $file->store('uploads', 'public'); // 'uploads' 디렉토리에 저장
            // $validated['uploadedFiles'] = $filePath; // 파일 경로를 validated 배열에 추가
        } else {
            $validated['uploadedFiles'] = null; // 파일이 없으면 null로 설정
        }
        // 위의 코드는 파일이 업로드 되었는지 확인하고, 업로드된 파일을 'uploads' 디렉토리에 저장합니다.
        // 그리고 그 파일의 경로를 $validated 배열에 'uploadedFiles' 키로 추가합니다.
        // 만약 파일이 업로드되지 않았다면, 'uploadedFiles' 키에는 null을 할당합니다.
        $validated['user_id'] = auth()->id(); // 현재 로그인한 사용자의 ID를 추가
        Post::create($validated);
        // auth()->user()->posts()->create($validated);

        return to_route('posts.index')->with('success','post created successfully');
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
           Gate::authorize('update', $post);
           
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
            // 'uploadedFiles' => ['nullable', 'file'],
        ]);
        if ($request -> hasFile('file_input')){
            File::delete(storage_path('app/public/'.$post->uploadedFiles)); // 기존 파일 삭제
            $validated['uploadedFiles'] = $request->file('file_input')->store('uploads', 'public');
        } else {
            $validated['uploadedFiles'] = $post->uploadedFiles; // 파일이 없으면 기존 파일 유지
        }
        $post->update($validated);
        return to_route('posts.index')->with('success','post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        File::delete(storage_path('app/public/'.$post->uploadedFiles)); // 파일 삭제
        return to_route('posts.index')->with('info','post deleted successfully');
    }
}