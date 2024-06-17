<x-app-layout>

<div class="container py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-3">
        @foreach ($posts as $post)
            <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" 
                style="background-image:url(@if($post->image) {{Storage::url($post->image->url)}} 
                @else {{Storage::url('imagen-post.jpg')}} @endif)">
                <div>
                    @foreach ($post->tags as $tag)
                        <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h6 bg-gray-600 text-white">{{$tag->nombre}}</a>
                    @endforeach
                </div>
                <div class="w-full h-full px-8 flex flex-col justify-center">
                    <h1 class="text-4xl text-white leading-8 font-bold">
                        <a href="{{route('posts.show', $post)}}" target="_blank" rel="noopener noreferrer">
                            {{$post->title}}
                        </a>
                    </h1>
                </div>
            </article>
        @endforeach
    </div>
    <div class="posts-links-paginate mt-4">
        {{$posts->links()}}
    </div>
</div>

</x-app-layout>