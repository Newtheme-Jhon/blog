@extends('adminlte::page')

@section('title', 'Admin Blog')

@section('content_header')
    <h1>Crear nueva categoría</h1>
@stop

@section('content')

<form action="{{route('admin.categories.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label class="form-label">Nombre</label>
        <input class="form-control" type="text" name="nombre" id="nombre">
        @error('nombre')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Slug</label>
        <input class="form-control" type="text" name="slug" id="slug" readonly>
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