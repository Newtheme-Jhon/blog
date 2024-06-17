@props(['post'])

<article class="category-post-content mb-6 grid md:grid-cols-2 bg-white shadow-lg">
    <figure>
        @if ($post->image)
            <img class="h-72 sm:h-96 md:h-auto w-full md:w-72 lg:w-96 object-cover" 
            src="{{Storage::url($post->image->url)}}" alt="post image">
        @else
            <img class="h-72 sm:h-96 md:h-auto w-full md:w-72 lg:w-96 object-cover" 
            src="{{Storage::url('imagen-post.jpg')}}" alt="post image">
        @endif
    </figure>
    <div class="category-content-section py-6 px-3">
        <h3 class="text-2xl font-bold mb-3">{{$post->title}}</h3>
        <p>{{$post->extract}}</p>
        <p class="category-tags-list mt-3">
            @foreach ($post->tags as $tag)

                <a href="{{route('posts.tag', $tag)}}" class="inline-block bg-gray-200 px-3 py-1 hover:bg-gray-400">{{$tag->nombre}}</a>

            @endforeach
        </p>
    </div>
</article>