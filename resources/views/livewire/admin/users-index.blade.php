<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Escriba el correo o el nombre del usuario">
        </div>
        @if ($users->count())
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td width="20px">
                                <a class="btn btn-warning" href="{{route('admin.users.edit', $user)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        
            <div class="card-footer">
                {{$users->links()}}
            </div>
        @else
            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    No se ha encontrado ningun usuario
                </div>
            </div>
        @endif
    </div>
</div>
