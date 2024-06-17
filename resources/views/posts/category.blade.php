<x-app-layout>
    <div class="container py-8">
        <h1 class="text-3xl text-center font-bold mb-6">
            Categoria: {{$category->nombre}}
        </h1>
        @foreach ($posts as $post)

            <x-card-post :post="$post"></x-card-post>

        @endforeach
        <div class="category-paginate-section">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>
