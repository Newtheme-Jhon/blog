<x-app-layout>

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->title}}</h1>
        <div class="text-lg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- contenido del post --}}
            <div class="post-content lg:col-span-2">
                <figure>

                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" 
                        src="{{Storage::url($post->image->url)}}" alt="imagen post">
                    @else
                        <img class="w-full h-80 object-cover object-center" 
                        src="{{Storage::url('imagen-post.jpg')}}" alt="imagen post">
                    @endif

                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!! $post->content !!}
                </div>
            </div>

            {{-- sidebar --}}
            <aside class="post-sidebar">
                <h1 class="text-3xl font-bold text-gray-600 mb-4">
                    Ver otras entradas de {{$post->category->nombre}}
                </h1>
                <ul class="post-sidebar-list">
                    @foreach ($categoria as $item)
                        <li class="mb-4">
                            <a class="flex" href="{{route('posts.show', $item)}}">

                                @if($item->image)
                                    <img src="{{Storage::url($item->image->url)}}" alt="imagen entrada">
                                @else
                                    <img src="{{Storage::url('imagen-post.jpg')}}" alt="imagen entrada">
                                @endif

                                <span class="ml-2 text-gray-600">{{$item->title}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>

</x-app-layout>
