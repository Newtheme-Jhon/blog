@extends('adminlte::page')

@section('title', 'Admin Blog')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')

@if (session('info'))

    <div class="alert alert-info" role="alert">
        {{session('info')}}
    </div>
    
@endif

<form action="{{route('admin.categories.update', $category)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="form-label">Nombre</label>
        <input class="form-control" type="text" name="nombre" id="nombre" value="{{$category->nombre}}">
        @error('nombre')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Slug</label>
        <input class="form-control" type="text" name="slug" id="slug" value="{{$category->slug}}" readonly>
        @error('slug')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">
        Submit
    </button>
</form>

@stop

@section('js')
    <script src="{{asset('vendor/stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection