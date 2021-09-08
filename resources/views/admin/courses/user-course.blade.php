@extends('adminlte::page')

@section('title', 'Moment')

@section('content_header')
    <h1>{{$course->title}}</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    @livewire('admin.user-course', ['course' => $course], key($course->id))

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
