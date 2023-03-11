<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\AllPostsCollection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
             $posts=Post::orderBy('created_at','desc')->get();
            return Inertia::render('Posts',[
                'posts'=>new AllPostsCollection($posts),
            ]);
    
    }

 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 'text' => 'required' ]);
        $post = new Post;

        if ($request->hasFile('image')) {
            $request->validate([ 'image' => 'required|mimes:jpg,jpeg,png' ]);
            $post = (new ImageService)->updateImage($post, $request);
        }

        $post->user_id = auth()->user()->id;
        $post->text = $request->input('text');
        $post->save();
    }

   


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!empty($post->image)) {
            $currentImage = public_path() . $post->image;

            if (file_exists($currentImage)) {
                unlink($currentImage);
            }
        }
        $post->delete();
    
    }
}
