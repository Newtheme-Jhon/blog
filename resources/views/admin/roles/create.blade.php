@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear un nuevo Rol</h1>
@stop

@section('content')
    <form action="{{route('admin.roles.store')}}" method="post">
        @csrf

        @include('admin.roles.partials.form')

        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop