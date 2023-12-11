<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        // get posts
        $posts=Post::latest()->get();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        // create posts
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        // validation form
        $this->validate($request,[
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required|min:3',
            'content' =>'required|min:10'
        ]);

        // upload file
        $image = $request->file('image');
        $image->storeAs('public/posts',$image->hashName());

        // create ke database
        Post::create([
            'image' =>$image->hashName(),
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //tampilkan post berdasarkan id
        $post=Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // cari data yg mau di edit berdasarkan id
        $post=Post::findOrFail($id);
        return view('posts.edit',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validasi
        $this->validate($request,[
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required|min:3',
            'content' =>'required|min:10'
        ]);

        // cari yg mau di edit
        $post=Post::findOrFail($id);

        // cek ada upload image apa nggak
        if ($request->hasFile('image')){
            // upload file
            $image = $request->file('image');
            $image->storeAs('public/posts',$image->hashName());

            // update ke database
            $post->update([
                'image' =>$image->hashName(),
                'title' => $request->title,
                'content' => $request->content
            ]);
        }else{
            // update ke database
            $post->update([
                'title' => $request->title,
                'content' => $request->content
            ]);
        }

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // cari yg mau di delete
        $post=Post::findOrFail($id);

        //delete file
        Storage::delete('public/posts'.$post->image);

        // delete row data dalam database
        $post->delete();

        return redirect()->route('posts.index');
    }
}
