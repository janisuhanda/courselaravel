<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\facades\Storage;
use Illuminate\Support\facades\Validator;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::latest()->get();
        return new PostResource(True,'daftar post',$posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation form
        $validator = Validator::make($request->all(),[
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required|min:3',
            'content' =>'required|min:10'
        ]);

        // check if validation failed
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        // upload file
        $image = $request->file('image');
        // $extension = $image->getClientOriginalExtension();
        $image->storeAs('public/posts',$image->hashName());
        // $image->storeAs('public/posts','posting-image'.$extension());

        // create ke database
        $post= Post::create([
            'image' =>$image->hashName(),
            'title' => $request->title,
            'content' => $request->content
        ]);

        // return reponnya
        return new PostResource(True,'creater post',$post);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::findOrFail($id);
        // return reponnya
        return new PostResource(True,'show post detail',$post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validation form
        $validator = Validator::make($request->all(),[
            // 'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required|min:3',
            'content' =>'required|min:10'
        ]);

        // check if validation failed
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }
        $post=Post::findOrFail($id);

        if ($request->hasFile('image')) {
            //upload image
            // upload file
            $image = $request->file('image');
            // $extension = $image->getClientOriginalExtension();
            $image->storeAs('public/posts',$image->hashName());
            // $image->storeAs('public/posts','posting-image'.$extension());
            //update database

            // update ke database
            $post->update([
                'image' =>$image->hashName(),
                'title' => $request->title,
                'content' => $request->content
            ]);

        }else{
            //update database selain image
            $post->update([
                'title' => $request->title,
                'content' => $request->content
            ]);
        }
        // return reponnya
        return new PostResource(True,'updated',$post);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // cari yg mau di delete
        $post=Post::findOrFail($id);

        //delete file
        Storage::delete('public/posts/'.$post->image);

        // delete row data dalam database
        $post->delete();

        // return reponnya
        return new PostResource(True,'deleted',$post);

    }
}
