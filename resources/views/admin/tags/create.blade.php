@extends('adminlte::page')

@section('title', 'Admin Blog')

@section('content_header')
    <h1>Crear Etiqueta</h1>
@stop

@section('content')

<form action="{{route('admin.tags.store')}}" method="post">
    @csrf

    @include('admin.tags.partials.form')

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