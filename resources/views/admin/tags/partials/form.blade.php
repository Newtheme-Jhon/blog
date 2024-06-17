
<div class="form-group">
    <label class="form-label">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" 
    value="@if ($routeName == 'admin.tags.edit') {{$tag->nombre}} @endif">
    @error('nombre')
        <p class="text-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Slug</label>
    <input class="form-control" type="text" name="slug" id="slug" readonly 
    value="@if ($routeName == 'admin.tags.edit') {{$tag->slug}} @endif">
    @error('slug')
        <p class="text-danger">{{$message}}</p>
    @enderror
</div>