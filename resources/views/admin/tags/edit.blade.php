@extends('adminlte::page')

@section('title', 'Admin Blog')

@section('content_header')
    <h1>Editar Etiqueta</h1>
@stop

@section('content')

@if (session('info'))

    <div class="alert alert-info" role="alert">
        {{session('info')}}
    </div>
    
@endif

<form action="{{route('admin.tags.update', $tag)}}" method="post">
    @csrf
    @method('put')

    @include('admin.tags.partials.form')

    <button type="submit" class="btn btn-primary">
        Actualizar Etiqueta
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