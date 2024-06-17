@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <p><b>Nombre: </b></p>
            <p>{{$user->name}}</p>
            <form action="{{route('admin.users.update', $user)}}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Roles</label>
                    <br>
                    @foreach ($roles as $rol)  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="roles[]" id="rol" 
                                value="{{$rol->id}}" 
                                @if (count($rolesUser) > 0)
                                    @foreach ($rolesUser as $key => $role)
                                    {{($rol->id == $key ? ' checked' : '') }}
                                    @endforeach
                                @endif
                            >
                            <label class="form-check-label" for="inlineCheckbox1">{{$rol->name}}</label>
                        </div>
                    @endforeach
                </div>
                {{-- Boton Submit --}}
                <div class="form-group my-4">
                    <button type="submit" class="btn btn-primary">Asignar Rol</button>
                </div>
            </form>
        </div>
    </div>

@stop
