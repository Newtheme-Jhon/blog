<div class="card">

    <div class="card-header">
        <div class="form-group">
            <label for="Buscar Post">Buscar Post</label>
            <input wire:model="search" type="text" class="form-control" placeholder="Escriba el nombre del post">
        </div>
    </div>

    @if ($posts->count())
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
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td width="20px">
                            <a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}">Editar</a>
                        </td>
                        <td width="20px">
                            <form action="{{route('admin.posts.destroy', $post)}}" method="post">
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

        <div class="card-footer">
            {{$posts->links()}}
        </div>
    @else
        <div class="card-body">
            <p><b>No se encontro ningun post</b></p>
        </div>
    @endif

</div>
