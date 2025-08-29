<?php

namespace App\Http\Controllers;

use App\Models\Streams;
use Illuminate\Http\Request;

class StreamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $streams = Streams::paginate(4); // 페이지네이션을 사용하여 4개씩 가져오기
        return view('streams.index',compact('streams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('streams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
                // Post::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        // ]);
        
        $validated = $request->validate([
            'title' => ['required','min:3',"max:20"],
            'details'=>['required','min:5'],
            'url' => ['sometimes', 'url'],
        ]);
        
        // $validated['user_id'] = auth()->id(); // 현재 로그인한 사용자의 ID를 추가
        Streams::create($validated);
        // auth()->user()->posts()->create($validated);

        return to_route('streams.index')->with('success','stream created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Streams $streams)
    {
        //
        return view('streams.show',compact('streams'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Streams $streams)
    {
        //

        return view('streams.edit',compact('streams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Streams $streams)
    {
        //
        $validated = $request->validate([
            'title' => ['required','min:3',"max:20"],
            'details'=>['required','min:5'],
            'url' => ['sometimes', 'url'],
        ]);
        $streams->update($validated);
        return to_route('streams.index')->with('success','post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Streams $streams)
    {
        //
        $streams->delete();
        return to_route('streams.index')->with('info','post deleted successfully');
    }
}
