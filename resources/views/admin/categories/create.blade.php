@extends('adminlte::page')

@section('title', 'Momment')

@section('content_header')
    <h1>Crear nueva categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre de la categoria') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba un nombre para la categoria']) !!}

                    @error('name')
                     <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {!! Form::submit('Crear categoria', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
