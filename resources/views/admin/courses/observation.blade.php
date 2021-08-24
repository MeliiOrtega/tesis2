@extends('adminlte::page')

@section('title', 'Momment')

@section('content_header')
    <h1>Observaciones de la actividad: {{$course->title}}</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
                <div class="form-group">
                    {!! Form::label('body', 'Observaciones de la actividad')!!}
                    {!! Form::textarea('body', null, ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid'  : '')]) !!}

                    @error('body')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {!! Form::submit('Rechazar actividad', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@stop
