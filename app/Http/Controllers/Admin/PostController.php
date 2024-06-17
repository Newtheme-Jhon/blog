<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{

    public function __construct(){

        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routeName = request()->route()->getName();

        $categories = Category::all();
        $tags       = Tag::pluck('nombre', 'id');
        $category = [];

        foreach($categories as $cat){
            $category += [$cat->id => $cat->nombre];
        }

        return view('admin.posts.create', compact('category', 'tags', 'routeName'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        if($request->file('postImage')){

            $url = Storage::put('public/posts', $request->file('postImage'));
            $post->image()->create([
                'url' => $url
            ]);
        }

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        Cache::flush();

        return redirect()->route('admin.posts.edit', $post);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //authorize
        $this->authorize('author', $post);

        $routeName = request()->route()->getName();

        $categories = Category::all();
        $tags       = Tag::pluck('nombre', 'id');
        $category = [];

        //Tags post
        $post_tag = $post->tags()->get();
        $tag_id = [];

        //Post image
        $image = $post->image;

        for( $i=0; $i<count($post_tag); $i++){
            $obj = (int) $post_tag[$i]->id;
            array_push($tag_id, $obj);
        }
        
        foreach($categories as $cat){
            $category += [$cat->id => $cat->nombre];
        }

        return view('admin.posts.edit', compact('post', 'category', 'tags', 'routeName', 'tag_id', 'image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        //authorize
        $this->authorize('author', $post);

        $post->update($request->all());

        if($request->file('postImage')){
            $url = Storage::put('public/posts', $request->file('postImage'));

            if($post->image){
                Storage::delete($post->image->url);
                $post->image->update(['url' => $url]);
            }else{
                $post->image->create(['url' => $url]);
            }
        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }

        Cache::flush();

        return redirect()->route('admin.posts.edit', $post)
            ->with('info', 'El post se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //authorize
        $this->authorize('author', $post);
        
        $post->delete();

        Cache::flush();
        
        return redirect()->route('admin.posts.index')
            ->with('info', 'El post se elimino correctamente');
    }

}

