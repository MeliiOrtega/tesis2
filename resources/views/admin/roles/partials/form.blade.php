<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid'  : ''), 'placeholder' => 'Escriba un nombre']) !!}
    @error('name')
        <span class="invalid-feedback">
            <strong>
                {{$message}}
            </strong>
        </span>
    @enderror
</div>
{{-- OPCIONES DE PERMISOS --}}
<strong> <i class="fas fa-lock mr-2"></i> Permisos</strong>
@error('permissions')
        <br>
        <small class="text-danger">
            <strong> {{$message}} </strong>
        </small>
        <br>
    @enderror

@foreach ($permissions as $permission)
<div>
     <label>
    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' =>'mr-1']) !!}
    {{$permission->name}}
    </label>
</div>
@endforeach
