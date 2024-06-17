@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar el rol</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-info" role="alert">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.roles.update', $role)}}" method="post">
                @csrf
                @method('PUT')
                
                @include('admin.roles.partials.form')
        
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </div>
    
@stop
