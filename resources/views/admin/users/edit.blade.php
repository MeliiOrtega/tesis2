@extends('adminlte::page')

@section('title', 'Momment')

@section('content_header')
    <h1>Información personal</h1>
@stop

@section('content')
     <div class="card">
            <div class="card-body">
                {!! Form::model($user, ['route'=>['admin.users.update', $user], 'method'=>'put' ])!!}
                <h1 class="h5">Rol asignado</h1>
               {{--  {!! Form::model($user, ['route'=>['admin.users.update', $user], 'method'=>'put' ])!!} --}}
                    @foreach($roles as $role)
                <div>
                    <label>
                    {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1'])!!}
                    {{$role->name}}
                    </label>
                </div>
                    @endforeach
                    <hr class="text-bold text-xl my-2">
                    <h1 class="h5">Datos personales</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div class="">
                        {!! Form::label('name','Nombre') !!}
                        {!! Form::text('name', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                        @error('name')
                        <span class="text-red-500"> *{{$message}}</span>
                        @enderror
                    </div>

                    <div class="">
                        {!! Form::label('email','Correo electronico') !!}
                        {!! Form::email('email', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                        @error('email')
                        <span class="text-red-500"> *{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        {!! Form::label('fecha','Fecha de nacimiento') !!}
                        {!! Form::date('fecha', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                    </div>

                    <div>
                        {!! Form::label('phone','Celular') !!}
                        {!! Form::number('phone', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                    </div>

                    @if ($user->role == 'voluntario')
                    <div class="">
                        {!! Form::label('cedula','Cedula') !!}
                        {!! Form::number('cedula', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                    </div>


                    <div class="">
                        {!! Form::label('ocupacion','Ocupación') !!}
                        {!! Form::text('ocupacion', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                    </div>


                    <div class="">
                        {!! Form::label('direccion','Dirección') !!}
                        {!! Form::text('direccion', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                    </div>
                    @endif

                </div>

                {!! Form::submit('Actualizar', ['class'=>'btn btn-blue mt-4'])!!}
                {!! Form::close()!!}

            </div>
        </div>


        @if ($user->role == 'voluntario')

            @include('admin.users.show')
        @else


        @endif


@stop

@section('css')
{{--    <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    @livewireStyles

    <!-- Scripts -->

@stop

@section('js')

   {{--  <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireScripts --}}

@stop

