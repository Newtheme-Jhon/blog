
{{-- {{dd($image->url)}} --}}

<div class="form-group">
    <label class="form-label">Titulo</label>
    <input class="form-control" type="text" name="title" id="title" 
    value="@if ($routeName == 'admin.posts.edit') {{$post->title}} @endif">
    @error('title')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Slug</label>
    <input class="form-control" type="text" name="slug" id="slug" 
    value="@if ($routeName == 'admin.posts.edit') {{$post->slug}} @endif" readonly>
    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Categoría</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach ($category as $key =>$item)

        <option value="{{$key}}"
            @if ($routeName == 'admin.posts.edit' && $post->category_id == $key) 
                selected="selected"
                @endif
        >{{$item}}</option>

        @endforeach
    </select>
    @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Etiquetas</label>
    <br>
    
    @foreach ($tags as $key =>$item)  
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" id="tag" value="{{$key}}" 
                @if ($routeName == 'admin.posts.edit')
                    @foreach ($tag_id as $tag)
                        {{ ($tag == $key ? ' checked' : '') }}
                    @endforeach
                @endif
            >
            <label class="form-check-label" for="inlineCheckbox1">{{$item}}</label>
        </div>
    @endforeach

    @error('tags')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    <label for="">Estado</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="status" value="1" 
            @if ($routeName == 'admin.posts.edit')
                {{ ($post->status == 1 ? 'checked' : '') }}
                @else
                checked
            @endif
        >
        <label class="form-check-label" for="radio1">
            Borrador
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="status" value="2" 
            @if ($routeName == 'admin.posts.edit')
                {{ ($post->status == 2 ? 'checked' : '') }}
            @endif
        >
        <label class="form-check-label" for="radio22">
            Publicado
        </label>
    </div>
    @error('status')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<!--image-->
<div class="row post-thumnail my-4">
    <div class="col-lg-6">
        @if($routeName == 'admin.posts.edit')
            @if ($post->image->url)
                <img id="image" class="img-fluid" src="{{ Storage::url($image->url) }}" alt="post-thumbnail">
            @else
                <img id="image" class="img-fluid" src="{{ Storage::url('imagen-post.jpg') }}" alt="post-thumbnail">
            @endif
            
        @else
            <img id="image" class="img-fluid" src="{{ Storage::url('imagen-post.jpg') }}" alt="post-thumbnail">
        @endif
    </div>
    <div class="col-lg-6">
        <h4>Subir imagen del Post</h4>
        <div class="form-group mt-3">
            <input type="file" id="postImage" name="postImage" accept="image/*">
            <p class="mt-3">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                Ad nobis ut, aperiam vero quidem, aspernatur sint pariatur 
                earum officia commodi enim  sint.
            </p>
        </div>
        @error('postImage')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>

<div class="form-group">
    <label class="form-label">Extracto</label>
    <textarea class="form-control" name="extract" id="extract" rows="5">
        @if ($routeName == 'admin.posts.edit')
            {{ ( isset($post->extract) ? $post->extract : '' ) }}
        @endif
    </textarea>
    @error('extract')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label class="form-label">Contenido</label>
    <textarea class="form-control" name="content" id="content" rows="5">
        @if ($routeName == 'admin.posts.edit')
            {{ ( isset($post->content) ? $post->content : '' ) }}
        @endif
    </textarea>
    @error('content')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>