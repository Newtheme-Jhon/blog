@extends('adminlte::page')

@section('title', 'Admin Blog')

@section('content_header')
    <h1>Lista de todas las Categorías</h1>
@stop

@section('content')

@if (session('info'))

    <div class="alert alert-info" role="alert">
        {{session('info')}}
    </div>
    
@endif

<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{route('admin.categories.create')}}">
            <i class="fas fa-plus"></i> Crear Categoría
        </a>
    </div>
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
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->nombre}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.categories.edit', $category)}}">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('admin.categories.destroy', $category)}}" method="post">
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
