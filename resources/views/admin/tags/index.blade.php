@extends('adminlte::page')

@section('title', 'Admin Blog')

@section('content_header')
    <h1>Lista de todas las Etiquetas</h1>
    <p class="mt-4">
        <a class="btn btn-primary" href="{{route('admin.tags.create')}}">Crear Etiqueta</a>
    </p>
    
@stop

@section('content')

@if (session('info'))

    <div class="alert alert-info" role="alert">
        {{session('info')}}
    </div>
    
@endif

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <th scope="row">{{$tag->id}}</th>
                    <td>{{$tag->nombre}}</td>
                    <td width="20px">
                        <a class="btn btn-warning" href="{{route('admin.tags.edit', $tag)}}">Editar</a>
                    </td>
                    <td width="20px">
                        <form action="{{route('admin.tags.destroy', $tag)}}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
