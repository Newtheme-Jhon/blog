<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    //index return data
    public function index(){

        if(request()->page){
            $key = 'posts' . request()->page;
        }else{
            $key = 'posts';
        }

        if(Cache::has($key)){
            $posts = Cache::get($key);
        }else{
            $posts = Post::where('status', 2)->latest('id')->paginate(11);
            Cache::put($key, $posts);
        }
        
        return view('posts.index', compact('posts'));
    }

    //show post data
    public function show(Post $post){

        $this->authorize('published', $post);
        
        //request posts category
        $categoria = Post::where('category_id', $post->category_id)
                            ->where('status', 2)
                            ->where('id', '!=', $post->id)
                            ->latest('id')
                            ->take(4)
                            ->get();

        return view('posts.show', compact('post', 'categoria'));
    }

    public function category(Category $category){
        $posts = Post::where('category_id', $category->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(6);

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag){
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(4);
        return view('posts.tag', compact('posts', 'tag'));
    }

}
