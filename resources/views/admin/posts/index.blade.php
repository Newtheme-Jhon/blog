@extends('adminlte::page')

@section('title', 'Admin Blog')

@section('content_header')

    <h1>Lista de todos los posts</h1>
    <a class="btn btn-primary my-4" href="{{route('admin.posts.create')}}">Crear nuevo post</a>
 
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-info" role="alert">
            {{session('info')}}
        </div>
    @endif
    @livewire('admin.post-index')

@stop

@section('js')

@endsection
