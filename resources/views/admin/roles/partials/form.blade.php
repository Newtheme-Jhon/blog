
<div class="form-group">
    <label class="form-label">Rol</label>
    <input class="form-control" type="text" name="name" id="name" 
    value="@if ($routeName == 'admin.roles.edit') {{$role->name}} @endif">
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">Lista de Permisos</label>
    <br>
    
    @foreach ($permissions as $key => $permission)  
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="permissions[]" id="permissions" value="{{$permission->id}}" 
                @if ($routeName == 'admin.roles.edit')
                   @foreach ($role_permissions as $item)
                       {{ ($item->id == $permission->id) ? 'checked' : '' }}
                   @endforeach
                @endif
            >
            <label class="form-check-label" for="inlineCheckbox1">{{$permission->description}}</label>
        </div>
    @endforeach

</div>
