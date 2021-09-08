@extends('adminlte::page')

@section('title', 'Moment')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
        @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
        @endif

    @livewire('admin-users')
    {{-- @livewire('voluntary.courses-index') --}}
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    @livewireStyles

    <!-- Scripts -->

@stop

@section('js')

     <script src="{{ mix('js/app.js') }}" defer></script>
{{-- @livewireScripts  --}}

@stop
